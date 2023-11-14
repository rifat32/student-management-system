<?php

namespace App\Http\Utils;


use App\Models\Business;
use App\Models\Department;
use App\Models\Designation;
use App\Models\EmploymentStatus;
use App\Models\User;
use Exception;

trait BusinessUtil
{
    // this function do all the task and returns transaction id or -1



    public function businessOwnerCheck($business_id) {

        $businessQuery  = Business::where(["id" => $business_id]);
        if(!auth()->user()->hasRole('superadmin')) {
            $businessQuery = $businessQuery->where(function ($query) {
                $query->where('created_by', auth()->user()->id)
                      ->orWhere('owner_id', auth()->user()->id);
            });
        }

        $business =  $businessQuery->first();
        if (!$business) {
            return false;
        }
        return $business;
    }



    public function checkManager($id) {
        $user  = User::where(["id" => $id])->first();
        if (!$user){
            return [
                "ok" => false,
                "status" => 400,
                "message" => "Manager does not exists."
            ];
        }

        if ($user->business_id != auth()->user()->business_id) {
            return [
                "ok" => false,
                "status" => 403,
                "message" => "Manager belongs to another business."
            ];
        }
        if (!$user->hasRole("business_admin")){
            return [
                "ok" => false,
                "status" => 403,
                "message" => "The user is not a manager"
            ];
        }
        return [
            "ok" => true,
        ];
    }

    public function checkEmployees($ids) {
        $users = User::whereIn("id", $ids)->get();
        foreach ($users as $user) {
            if (!$user){
                return [
                    "ok" => false,
                    "status" => 400,
                    "message" => "Employee does not exists."
                ];
            }

            if ($user->business_id != auth()->user()->business_id) {
                return [
                    "ok" => false,
                    "status" => 403,
                    "message" => "Employee belongs to another business."
                ];
            }
            if (!$user->hasRole("business_admin") &&  !$user->hasRole("business_employee")){
                return [
                    "ok" => false,
                    "status" => 403,
                    "message" => "The user is not a employee"
                ];
            }
        }

        return [
            "ok" => true,
        ];
    }


    public function checkDepartment($id) {
        $department  = Department::where(["id" => $id])->first();
        if (!$department){
            return [
                "ok" => false,
                "status" => 400,
                "message" => "Department does not exists."
            ];
        }

        if ($department->business_id != auth()->user()->business_id) {
            return [
                "ok" => false,
                "status" => 403,
                "message" => "Department belongs to another business."
            ];
        }
        return [
            "ok" => true,
        ];
    }
    public function checkDepartments($ids) {
        $departments = Department::whereIn("id", $ids)->get();

        foreach ($departments as $department) {
            if (!$department) {
                return [
                    "ok" => false,
                    "status" => 400,
                    "message" => "Department does not exists."
                ];
            }

            if ($department->business_id != auth()->user()->business_id) {
                return [
                    "ok" => false,
                    "status" => 403,
                    "message" => "Department belongs to another business."
                ];
            }
        }

        return [
            "ok" => true,
        ];
    }



    public function storeDefaultsToBusiness($business_id) {
        $defaultDesignations = Designation::where([
            "business_id" => NULL,
            "is_default" => true
          ])->get();

          foreach($defaultDesignations as $defaultDesignation) {
              $insertableData = [
                'name'  => $defaultDesignation->name,
                'description'  => $defaultDesignation->description,
                "is_active" => true,
                "is_default" => true,
                "business_id" => $business_id,
              ];
           $designation  = Designation::create($insertableData);
          }

          $defaultEmploymentStatuses = EmploymentStatus::where([
            "business_id" => NULL,
            "is_default" => true
          ])->get();

          foreach($defaultEmploymentStatuses as $defaultEmploymentStatus) {
              $insertableData = [
                'name'  => $defaultEmploymentStatus->name,
                'color'  => $defaultEmploymentStatus->color,
                'description'  => $defaultEmploymentStatus->description,
                "is_active" => true,
                "is_default" => true,
                "business_id" => $business_id,
              ];
           $employment_status  = EmploymentStatus::create($insertableData);
          }


    }



}
