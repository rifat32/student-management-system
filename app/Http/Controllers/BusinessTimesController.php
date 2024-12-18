<?php

namespace App\Http\Controllers;

use App\Http\Requests\BusinessTimesUpdateRequest;
use App\Http\Utils\BusinessUtil;
use App\Http\Utils\ErrorUtil;
use App\Http\Utils\UserActivityUtil;
use App\Models\Business;
use App\Models\BusinessTime;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusinessTimesController extends Controller
{
    use ErrorUtil,BusinessUtil,UserActivityUtil;
    /**
     *
     * @OA\Patch(
     *      path="/v1.0/business-times",
     *      operationId="updateBusinessTimes",
     *      tags={"business_times_management"},
     *       security={
     *           {"bearerAuth": {}}
     *       },
     *      summary="This method is to update business times",
     *      description="This method is to update business times",
     *
     *  @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"business_id","times"},
     *    @OA\Property(property="times", type="string", format="array",example={
    *{"day":0,"start_at":"10:10:00","end_at":"10:15:00","is_weekend":true},
    *{"day":1,"start_at":"10:10:00","end_at":"10:15:00","is_weekend":true},
    *{"day":2,"start_at":"10:10:00","end_at":"10:15:00","is_weekend":true},
     *{"day":3,"start_at":"10:10:00","end_at":"10:15:00","is_weekend":true},
    *{"day":4,"start_at":"10:10:00","end_at":"10:15:00","is_weekend":true},
    *{"day":5,"start_at":"10:10:00","end_at":"10:15:00","is_weekend":true},
    *{"day":6,"start_at":"10:10:00","end_at":"10:15:00","is_weekend":true}
     *
     * }),

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

    public function updateBusinessTimes(BusinessTimesUpdateRequest $request)
    {
        try {
            $this->storeActivity($request,"");
            return  DB::transaction(function () use ($request) {
                if (!$request->user()->hasPermissionTo('business_times_update')) {
                    return response()->json([
                        "message" => "You can not perform this action"
                    ], 401);
                }
                $request_data = $request->validated();

                $timesArray = collect($request_data["times"])->unique("day");





              BusinessTime::where([
                "business_id" => auth()->user()->business_id
               ])
               ->delete();
               foreach($timesArray as $business_time) {
                BusinessTime::create([
                    "business_id" => auth()->user()->business_id,
                    "day"=> $business_time["day"],
                    "start_at"=> $business_time["start_at"],
                    "end_at"=> $business_time["end_at"],
                    "is_weekend"=> $business_time["is_weekend"],
                ]);

               }



                return response(["message" => "data inserted"], 201);
            });
        } catch (Exception $e) {
            error_log($e->getMessage());
            return $this->sendError($e, 500,$request);
        }
    }


     /**
        *
     * @OA\Get(
     *      path="/v1.0/business-times",
     *      operationId="getBusinessTimes",
     *      tags={"business_times_management"},
    *       security={
     *           {"bearerAuth": {}}
     *       },


     *      summary="This method is to get business times ",
     *      description="This method is to get business times",
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

    public function getBusinessTimes(Request $request) {
        try{
            $this->storeActivity($request, "DUMMY activity","DUMMY description");
            if(!$request->user()->hasPermissionTo('business_times_view')){
                return response()->json([
                   "message" => "You can not perform this action"
                ],401);
           }


            $business_times = BusinessTime::where([
                "business_id" => auth()->user()->business_id
            ])->orderByDesc("id")->get();


            return response()->json($business_times, 200);
        } catch(Exception $e){

        return $this->sendError($e,500,$request);
        }
    }
}
