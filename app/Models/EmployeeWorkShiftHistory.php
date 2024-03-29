<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeWorkShiftHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        "break_type",
        "break_hours",
        'type',
        "description",
        'attendances_count',
        'is_business_default',
        'is_personal',

        'start_date',
        'end_date',


        "is_default",
        "is_active",
        "business_id",
        "created_by",



        "from_date",
        "to_date",
        "work_shift_id",


    ];

    protected $dates = ['start_date',
    'end_date'];


    public function details(){
        return $this->hasMany(EmployeeWorkShiftDetailHistory::class,'work_shift_id', 'id');
    }

    public function departments() {
        return $this->belongsToMany(Department::class, 'employee_department_work_shift_histories', 'work_shift_id', 'department_id');
    }


    public function users() {
        return $this->belongsToMany(User::class, 'employee_user_work_shift_histories', 'work_shift_id', 'user_id');
    }


    public function getCreatedAtAttribute($value)
    {

        return (new Carbon($value))->format('d-m-Y');
    }
    public function getUpdatedAtAttribute($value)
    {

        return (new Carbon($value))->format('d-m-Y');
    }

    public function getStartDateAttribute($value)
    {

        return (new Carbon($value))->format('d-m-Y');
    }

    public function getEndDateAttribute($value)
    {

        return (new Carbon($value))->format('d-m-Y');
    }

    public function getFromDateAttribute($value)
    {
        return (new Carbon($value))->format('d-m-Y');
    }
    public function getToDateAttribute($value)
    {
        return (new Carbon($value))->format('d-m-Y');
    }



}
