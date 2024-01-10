<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserSponsorshipHistoryCreateRequest;
use App\Http\Requests\UserSponsorshipHistoryUpdateRequest;
use App\Http\Utils\BusinessUtil;
use App\Http\Utils\ErrorUtil;
use App\Http\Utils\UserActivityUtil;
use App\Models\Department;
use App\Models\EmloyeeSponsorshipHistory;
use App\Models\EmployeeSponsorshipHistory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserSponsorshipHistoryController extends Controller
{
    use ErrorUtil, UserActivityUtil, BusinessUtil;






    /**
     *
     * @OA\Post(
     *      path="/v1.0/user-sponsorship-histories",
     *      operationId="createUserSponsorshipHistory",
     *      tags={"user_sponsorship_histories"},
     *       security={
     *           {"bearerAuth": {}}
     *       },
     *      summary="This method is to store user sponsorship history",
     *      description="This method is to store user sponsorship history",
     *
     *  @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *  * @OA\Property(property="employee_id", type="string", format="string", example="Your Employee ID"),
 *      @OA\Property(property="date_assigned", type="string", format="date", example="Your Date Assigned"),
 *      @OA\Property(property="expiry_date", type="string", format="date", example="Your Expiry Date"),
 *      @OA\Property(property="status", type="string", format="string", example="Your Status"),
 *      @OA\Property(property="note", type="string", format="string", example="Your Note"),
 *      @OA\Property(property="certificate_number", type="string", format="string", example="Your Certificate Number"),
 *      @OA\Property(property="current_certificate_status", type="string", format="string", example="Your Current Certificate Status"),
 *      @OA\Property(property="is_sponsorship_withdrawn", type="string", format="string", example="Your Is Sponsorship Withdrawn"),
 *      @OA\Property(property="sponsorship_id", type="string", format="string", example="Your Sponsorship ID"),
 *      @OA\Property(property="from_date", type="string", format="date", example="Your From Date"),
 *      @OA\Property(property="to_date", type="string", format="date", example="Your To Date")

 *
 *
 *
     *
     *         ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       @OA\JsonContent(),
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     * @OA\JsonContent(),
     *      ),
     *        @OA\Response(
     *          response=422,
     *          description="Unprocesseble Content",
     *    @OA\JsonContent(),
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden",
     *   @OA\JsonContent()
     * ),
     *  * @OA\Response(
     *      response=400,
     *      description="Bad Request",
     *   *@OA\JsonContent()
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found",
     *   *@OA\JsonContent()
     *   )
     *      )
     *     )
     */

    public function createUserSponsorshipHistory(UserSponsorshipHistoryCreateRequest $request)
    {
        try {
            $this->storeActivity($request, "DUMMY activity","DUMMY description");
            return DB::transaction(function () use ($request) {
                if (!$request->user()->hasPermissionTo('employee_sponsorship_history_create')) {
                    return response()->json([
                        "message" => "You can not perform this action"
                    ], 401);
                }

                $request_data = $request->validated();

                $request_data["created_by"] = $request->user()->id;

                $user_sponsorship_history =  EmployeeSponsorshipHistory::create($request_data);



                return response($user_sponsorship_history, 201);
            });
        } catch (Exception $e) {
            error_log($e->getMessage());
            return $this->sendError($e, 500, $request);
        }
    }

    /**
     *
     * @OA\Put(
     *      path="/v1.0/user-sponsorship-histories",
     *      operationId="updateUserSponsorshipHistory",
     *      tags={"user_sponsorship_histories"},
     *       security={
     *           {"bearerAuth": {}}
     *       },
     *      summary="This method is to update  user sponsorship history ",
     *      description="This method is to update user sponsorship history",
     *
     *  @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
*      @OA\Property(property="id", type="number", format="number", example="Updated Christmas"),
     *  * @OA\Property(property="employee_id", type="string", format="string", example="Your Employee ID"),
 *      @OA\Property(property="date_assigned", type="string", format="date", example="Your Date Assigned"),
 *      @OA\Property(property="expiry_date", type="string", format="date", example="Your Expiry Date"),
 *      @OA\Property(property="status", type="string", format="string", example="Your Status"),
 *      @OA\Property(property="note", type="string", format="string", example="Your Note"),
 *      @OA\Property(property="certificate_number", type="string", format="string", example="Your Certificate Number"),
 *      @OA\Property(property="current_certificate_status", type="string", format="string", example="Your Current Certificate Status"),
 *      @OA\Property(property="is_sponsorship_withdrawn", type="string", format="string", example="Your Is Sponsorship Withdrawn"),
 *      @OA\Property(property="sponsorship_id", type="string", format="string", example="Your Sponsorship ID"),
 *      @OA\Property(property="from_date", type="string", format="date", example="Your From Date"),
 *      @OA\Property(property="to_date", type="string", format="date", example="Your To Date")
 *
 *
 *

     *
     *         ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       @OA\JsonContent(),
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     * @OA\JsonContent(),
     *      ),
     *        @OA\Response(
     *          response=422,
     *          description="Unprocesseble Content",
     *    @OA\JsonContent(),
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden",
     *   @OA\JsonContent()
     * ),
     *  * @OA\Response(
     *      response=400,
     *      description="Bad Request",
     *   *@OA\JsonContent()
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found",
     *   *@OA\JsonContent()
     *   )
     *      )
     *     )
     */

    public function updateUserSponsorshipHistory(UserSponsorshipHistoryUpdateRequest $request)
    {

        try {
            $this->storeActivity($request, "DUMMY activity","DUMMY description");
            return DB::transaction(function () use ($request) {
                if (!$request->user()->hasPermissionTo('employee_sponsorship_history_update')) {
                    return response()->json([
                        "message" => "You can not perform this action"
                    ], 401);
                }

                $request_data = $request->validated();




                $user_sponsorship_history_query_params = [
                    "id" => $request_data["id"],
                    "is_manual" => 1
                ];
                // $user_sponsorship_history_prev = UserSponsorshipHistory::where($user_sponsorship_history_query_params)
                //     ->first();
                // if (!$user_sponsorship_history_prev) {
                //     return response()->json([
                //         "message" => "no user sponsorship history found"
                //     ], 404);
                // }

                $user_sponsorship_history  =  tap(EmployeeSponsorshipHistory::where($user_sponsorship_history_query_params))->update(
                    collect($request_data)->only([
                        "address_line_1",
                        "address_line_2",
                        "country",
                        "city",
                        "postcode",
                        "lat",
                        "long",
                        'employee_id',
                        "from_date",
                        "to_date",

                    ])->toArray()
                )
                    // ->with("somthing")

                    ->first();
                if (!$user_sponsorship_history) {
                    return response()->json([
                        "message" => "something went wrong."
                    ], 500);
                }

                return response($user_sponsorship_history, 201);
            });
        } catch (Exception $e) {
            error_log($e->getMessage());
            return $this->sendError($e, 500, $request);
        }
    }


    /**
     *
     * @OA\Get(
     *      path="/v1.0/user-sponsorship-histories",
     *      operationId="getUserSponsorshipHistories",
     *      tags={"user_sponsorship_histories"},
     *       security={
     *           {"bearerAuth": {}}
     *       },
     *              @OA\Parameter(
     *         name="employee_id",
     *         in="query",
     *         description="employee_id",
     *         required=true,
     *  example="1"
     *      ),
     *              @OA\Parameter(
     *         name="per_page",
     *         in="query",
     *         description="per_page",
     *         required=true,
     *  example="6"
     *      ),

     *      * *  @OA\Parameter(
     * name="start_date",
     * in="query",
     * description="start_date",
     * required=true,
     * example="2019-06-29"
     * ),
     * *  @OA\Parameter(
     * name="end_date",
     * in="query",
     * description="end_date",
     * required=true,
     * example="2019-06-29"
     * ),
     * *  @OA\Parameter(
     * name="search_key",
     * in="query",
     * description="search_key",
     * required=true,
     * example="search_key"
     * ),
     * *  @OA\Parameter(
     * name="order_by",
     * in="query",
     * description="order_by",
     * required=true,
     * example="ASC"
     * ),

     *      summary="This method is to get user sponsorship histories  ",
     *      description="This method is to get user sponsorship histories ",
     *

     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       @OA\JsonContent(),
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     * @OA\JsonContent(),
     *      ),
     *        @OA\Response(
     *          response=422,
     *          description="Unprocesseble Content",
     *    @OA\JsonContent(),
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden",
     *   @OA\JsonContent()
     * ),
     *  * @OA\Response(
     *      response=400,
     *      description="Bad Request",
     *   *@OA\JsonContent()
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found",
     *   *@OA\JsonContent()
     *   )
     *      )
     *     )
     */

    public function getUserSponsorshipHistories(Request $request)
    {
        try {
            $this->storeActivity($request, "DUMMY activity","DUMMY description");
            if (!$request->user()->hasPermissionTo('employee_sponsorship_history_view')) {
                return response()->json([
                    "message" => "You can not perform this action"
                ], 401);
            }
            $business_id =  $request->user()->business_id;
            $all_manager_department_ids = [];
            $manager_departments = Department::where("manager_id", $request->user()->id)->get();
            foreach ($manager_departments as $manager_department) {
                $all_manager_department_ids[] = $manager_department->id;
                $all_manager_department_ids = array_merge($all_manager_department_ids, $manager_department->getAllDescendantIds());
            }
            $user_sponsorship_histories = EmployeeSponsorshipHistory::with([
                "creator" => function ($query) {
                    $query->select('users.id', 'users.first_Name','users.middle_Name',
                    'users.last_Name');
                },

            ])
            // ->where(["is_manual" => 1])
            ->whereHas("employee.departments", function($query) use($all_manager_department_ids) {
              $query->whereIn("departments.id",$all_manager_department_ids);
           })
            ->when(!empty($request->search_key), function ($query) use ($request) {
                    return $query->where(function ($query) use ($request) {
                        $term = $request->search_key;
                        $query->where("employee_sponsorship_histories.name", "like", "%" . $term . "%");
                        //     ->orWhere("employee_sponsorship_histories.description", "like", "%" . $term . "%");
                    });
                })
                //    ->when(!empty($request->product_category_id), function ($query) use ($request) {
                //        return $query->where('product_category_id', $request->product_category_id);
                //    })

                ->when(!empty($request->employee_id), function ($query) use ($request) {
                    return $query->where('employee_sponsorship_histories.employee_id', $request->employee_id);
                })
                ->when(empty($request->employee_id), function ($query) use ($request) {
                    return $query->where('employee_sponsorship_histories.employee_id', $request->user()->id);
                })
                ->when(!empty($request->start_date), function ($query) use ($request) {
                    return $query->where('employee_sponsorship_histories.created_at', ">=", $request->start_date);
                })
                ->when(!empty($request->end_date), function ($query) use ($request) {
                    return $query->where('employee_sponsorship_histories.created_at', "<=", ($request->end_date . ' 23:59:59'));
                })
                ->when(!empty($request->order_by) && in_array(strtoupper($request->order_by), ['ASC', 'DESC']), function ($query) use ($request) {
                    return $query->orderBy("employee_sponsorship_histories.id", $request->order_by);
                }, function ($query) {
                    return $query->orderBy("employee_sponsorship_histories.id", "DESC");
                })
                ->when(!empty($request->per_page), function ($query) use ($request) {
                    return $query->paginate($request->per_page);
                }, function ($query) {
                    return $query->get();
                });;



            return response()->json($user_sponsorship_histories, 200);
        } catch (Exception $e) {

            return $this->sendError($e, 500, $request);
        }
    }

    /**
     *
     * @OA\Get(
     *      path="/v1.0/user-sponsorship-histories/{id}",
     *      operationId="getUserSponsorshipHistoryById",
     *      tags={"user_sponsorship_histories"},
     *       security={
     *           {"bearerAuth": {}}
     *       },
     *              @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="id",
     *         required=true,
     *  example="6"
     *      ),
     *      summary="This method is to get user sponsorship history by id",
     *      description="This method is to get user sponsorship history by id",
     *

     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       @OA\JsonContent(),
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     * @OA\JsonContent(),
     *      ),
     *        @OA\Response(
     *          response=422,
     *          description="Unprocesseble Content",
     *    @OA\JsonContent(),
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden",
     *   @OA\JsonContent()
     * ),
     *  * @OA\Response(
     *      response=400,
     *      description="Bad Request",
     *   *@OA\JsonContent()
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found",
     *   *@OA\JsonContent()
     *   )
     *      )
     *     )
     */


    public function getUserSponsorshipHistoryById($id, Request $request)
    {
        try {
            $this->storeActivity($request, "DUMMY activity","DUMMY description");
            if (!$request->user()->hasPermissionTo('employee_sponsorship_history_view')) {
                return response()->json([
                    "message" => "You can not perform this action"
                ], 401);
            }
            $business_id =  $request->user()->business_id;
            $all_manager_department_ids = [];
            $manager_departments = Department::where("manager_id", $request->user()->id)->get();
            foreach ($manager_departments as $manager_department) {
                $all_manager_department_ids[] = $manager_department->id;
                $all_manager_department_ids = array_merge($all_manager_department_ids, $manager_department->getAllDescendantIds());
            }
            $user_sponsorship_history =  EmployeeSponsorshipHistory::where([
                "id" => $id,
                "is_manual" => 1
            ])

            ->whereHas("employee.departments", function($query) use($all_manager_department_ids) {
              $query->whereIn("departments.id",$all_manager_department_ids);
           })
                ->first();
            if (!$user_sponsorship_history) {
                return response()->json([
                    "message" => "no data found"
                ], 404);
            }

            return response()->json($user_sponsorship_history, 200);
        } catch (Exception $e) {

            return $this->sendError($e, 500, $request);
        }
    }



    /**
     *
     *     @OA\Delete(
     *      path="/v1.0/user-sponsorship-histories/{ids}",
     *      operationId="deleteUserSponsorshipHistoriesByIds",
     *      tags={"user_sponsorship_histories"},
     *       security={
     *           {"bearerAuth": {}}
     *       },
     *              @OA\Parameter(
     *         name="ids",
     *         in="path",
     *         description="ids",
     *         required=true,
     *  example="1,2,3"
     *      ),
     *      summary="This method is to delete user sponsorship history by id",
     *      description="This method is to delete user sponsorship history by id",
     *

     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       @OA\JsonContent(),
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     * @OA\JsonContent(),
     *      ),
     *        @OA\Response(
     *          response=422,
     *          description="Unprocesseble Content",
     *    @OA\JsonContent(),
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden",
     *   @OA\JsonContent()
     * ),
     *  * @OA\Response(
     *      response=400,
     *      description="Bad Request",
     *   *@OA\JsonContent()
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found",
     *   *@OA\JsonContent()
     *   )
     *      )
     *     )
     */

    public function deleteUserSponsorshipHistoriesByIds(Request $request, $ids)
    {

        try {
            $this->storeActivity($request, "DUMMY activity","DUMMY description");
            if (!$request->user()->hasPermissionTo('employee_sponsorship_history_delete')) {
                return response()->json([
                    "message" => "You can not perform this action"
                ], 401);
            }
            $business_id =  $request->user()->business_id;
            $all_manager_department_ids = [];
            $manager_departments = Department::where("manager_id", $request->user()->id)->get();
            foreach ($manager_departments as $manager_department) {
                $all_manager_department_ids[] = $manager_department->id;
                $all_manager_department_ids = array_merge($all_manager_department_ids, $manager_department->getAllDescendantIds());
            }
            $idsArray = explode(',', $ids);
            $existingIds = EmployeeSponsorshipHistory::whereIn('id', $idsArray)
            // ->where(["is_manual" => 1])
            ->whereHas("employee.departments", function($query) use($all_manager_department_ids) {
              $query->whereIn("departments.id",$all_manager_department_ids);
           })
                ->select('id')
                ->get()
                ->pluck('id')
                ->toArray();
            $nonExistingIds = array_diff($idsArray, $existingIds);

            if (!empty($nonExistingIds)) {
                return response()->json([
                    "message" => "Some or all of the specified data do not exist."
                ], 404);
            }
            EmployeeSponsorshipHistory::destroy($existingIds);


            return response()->json(["message" => "data deleted sussfully","deleted_ids" => $existingIds], 200);
        } catch (Exception $e) {

            return $this->sendError($e, 500, $request);
        }
    }
}
