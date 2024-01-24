<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetIdRequest;
use App\Http\Requests\WorkLocationCreateRequest;
use App\Http\Requests\WorkLocationUpdateRequest;
use App\Http\Utils\BusinessUtil;
use App\Http\Utils\ErrorUtil;
use App\Http\Utils\UserActivityUtil;
use App\Models\DisabledWorkLocation;
use App\Models\User;
use App\Models\WorkLocation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkLocationController extends Controller
{
    use ErrorUtil, UserActivityUtil, BusinessUtil;
    /**
     *
     * @OA\Post(
     *      path="/v1.0/work-locations",
     *      operationId="createWorkLocation",
     *      tags={"work_locations"},
     *       security={
     *           {"bearerAuth": {}}
     *       },
     *      summary="This method is to store work location",
     *      description="This method is to store work location",
     *
     *  @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     * @OA\Property(property="name", type="string", format="string", example="tttttt"),
     * @OA\Property(property="description", type="string", format="string", example="erg ear ga&nbsp;")
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

    public function createWorkLocation(WorkLocationCreateRequest $request)
    {

        try {
            $this->storeActivity($request, "DUMMY activity", "DUMMY description");
            return DB::transaction(function () use ($request) {
                if (!$request->user()->hasPermissionTo('work_location_create')) {
                    return response()->json([
                        "message" => "You can not perform this action"
                    ], 401);
                }

                $request_data = $request->validated();

                $request_data["is_active"] = 1;
                $request_data["is_default"] = 0;
                $request_data["created_by"] = $request->user()->id;
                $request_data["business_id"] = $request->user()->business_id;

                if (empty($request->user()->business_id)) {
                    $request_data["business_id"] = NULL;
                    if ($request->user()->hasRole('superadmin')) {
                        $request_data["is_default"] = 1;
                    }
                }




                $work_location =  WorkLocation::create($request_data);




                return response($work_location, 201);
            });
        } catch (Exception $e) {
            error_log($e->getMessage());
            return $this->sendError($e, 500, $request);
        }
    }

    /**
     *
     * @OA\Put(
     *      path="/v1.0/work-locations",
     *      operationId="updateWorkLocation",
     *      tags={"work_locations"},
     *       security={
     *           {"bearerAuth": {}}
     *       },
     *      summary="This method is to update work location ",
     *      description="This method is to update work location",
     *
     *  @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *      @OA\Property(property="id", type="number", format="number", example="Updated Christmas"),
     * @OA\Property(property="name", type="string", format="string", example="tttttt"),
     * @OA\Property(property="description", type="string", format="string", example="erg ear ga&nbsp;")

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

    public function updateWorkLocation(WorkLocationUpdateRequest $request)
    {

        try {
            $this->storeActivity($request, "DUMMY activity", "DUMMY description");
            return DB::transaction(function () use ($request) {
                if (!$request->user()->hasPermissionTo('work_location_update')) {
                    return response()->json([
                        "message" => "You can not perform this action"
                    ], 401);
                }
                $request_data = $request->validated();



                $work_location_query_params = [
                    "id" => $request_data["id"],
                ];

                $work_location  =  tap(WorkLocation::where($work_location_query_params))->update(
                    collect($request_data)->only([
                        'name',
                        'description',
                        // "is_default",
                        // "is_active",
                        // "business_id",
                        // "created_by"

                    ])->toArray()
                )
                    // ->with("somthing")

                    ->first();
                if (!$work_location) {
                    return response()->json([
                        "message" => "something went wrong."
                    ], 500);
                }




                return response($work_location, 201);
            });
        } catch (Exception $e) {
            error_log($e->getMessage());
            return $this->sendError($e, 500, $request);
        }
    }
    /**
     *
     * @OA\Put(
     *      path="/v1.0/work-locations/toggle-active",
     *      operationId="toggleActiveWorkLocation",
     *      tags={"work_locations"},
     *       security={
     *           {"bearerAuth": {}}
     *       },
     *      summary="This method is to toggle work location",
     *      description="This method is to toggle work location",
     *
     *  @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(

     *           @OA\Property(property="id", type="string", format="number",example="1"),
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

    public function toggleActiveWorkLocation(GetIdRequest $request)
    {

        try {
            $this->storeActivity($request, "DUMMY activity", "DUMMY description");
            if (!$request->user()->hasPermissionTo('work_location_activate')) {
                return response()->json([
                    "message" => "You can not perform this action"
                ], 401);
            }
            $request_data = $request->validated();

            $work_location =  WorkLocation::where([
                "id" => $request_data["id"],
            ])
                ->first();
            if (!$work_location) {
                return response()->json([
                    "message" => "no data found"
                ], 404);
            }
            $should_update = 0;
            $should_disable = 0;
            if (empty(auth()->user()->business_id)) {

                if (auth()->user()->hasRole('superadmin')) {
                    if (($work_location->business_id != NULL || $work_location->is_default != 1)) {
                        $this->storeError(
                            "You do not have permission to update this due to role restrictions.",
                            403,
                            "front end error",
                            "front end error"
                           );
                        return response()->json([
                            "message" => "You do not have permission to update this work location due to role restrictions."
                        ], 403);
                    } else {
                        $should_update = 1;
                    }
                } else {
                    if ($work_location->business_id != NULL) {
                        $this->storeError(
                            "You do not have permission to update this due to role restrictions.",
                            403,
                            "front end error",
                            "front end error"
                           );
                        return response()->json([
                            "message" => "You do not have permission to update this work location due to role restrictions."
                        ], 403);
                    } else if ($work_location->is_default == 0) {

                        if($work_location->created_by != auth()->user()->id) {
                            $this->storeError(
                                "You do not have permission to update this due to role restrictions.",
                                403,
                                "front end error",
                                "front end error"
                               );
                            return response()->json([
                                "message" => "You do not have permission to update this work location due to role restrictions."
                            ], 403);
                        }
                        else {
                            $should_update = 1;
                        }



                    }
                    else {
                     $should_disable = 1;

                    }
                }
            } else {
                if ($work_location->business_id != NULL) {
                    if (($work_location->business_id != auth()->user()->business_id)) {
                        $this->storeError(
                            "You do not have permission to update this due to role restrictions.",
                            403,
                            "front end error",
                            "front end error"
                           );
                        return response()->json([
                            "message" => "You do not have permission to update this work location due to role restrictions."
                        ], 403);
                    } else {
                        $should_update = 1;
                    }
                } else {
                    if ($work_location->is_default == 0) {
                        if ($work_location->created_by != auth()->user()->created_by) {
                            $this->storeError(
                                "You do not have permission to update this due to role restrictions.",
                                403,
                                "front end error",
                                "front end error"
                               );
                            return response()->json([
                                "message" => "You do not have permission to update this work location due to role restrictions."
                            ], 403);
                        } else {
                            $should_disable = 1;

                        }
                    } else {
                        $should_disable = 1;

                    }
                }
            }

            if ($should_update) {
                $work_location->update([
                    'is_active' => !$work_location->is_active
                ]);
            }

            if($should_disable) {

                $disabled_work_location =    DisabledWorkLocation::where([
                    'work_location_id' => $work_location->id,
                    'business_id' => auth()->user()->business_id,
                    'created_by' => auth()->user()->id,
                ])->first();
                if(!$disabled_work_location) {
                    DisabledWorkLocation::create([
                        'work_location_id' => $work_location->id,
                        'business_id' => auth()->user()->business_id,
                        'created_by' => auth()->user()->id,
                    ]);
                } else {
                    $disabled_work_location->delete();
                }
            }


            return response()->json(['message' => 'WorkLocation status updated successfully'], 200);
        } catch (Exception $e) {
            error_log($e->getMessage());
            return $this->sendError($e, 500, $request);
        }
    }

    /**
     *
     * @OA\Get(
     *      path="/v1.0/work-locations",
     *      operationId="getWorkLocations",
     *      tags={"work_locations"},
     *       security={
     *           {"bearerAuth": {}}
     *       },

     *              @OA\Parameter(
     *         name="per_page",
     *         in="query",
     *         description="per_page",
     *         required=true,
     *  example="6"
     *      ),
*      * *  @OA\Parameter(
     * name="is_active",
     * in="query",
     * description="is_active",
     * required=true,
     * example="1"
     * ),
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

     *      summary="This method is to get work locations  ",
     *      description="This method is to get work locations ",
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

    public function getWorkLocations(Request $request)
    {
        try {
            $this->storeActivity($request, "DUMMY activity", "DUMMY description");
            if (!$request->user()->hasPermissionTo('work_location_view')) {
                return response()->json([
                    "message" => "You can not perform this action"
                ], 401);
            }
            $created_by  = NULL;
            if(auth()->user()->business) {
                $created_by = auth()->user()->business->created_by;
            }



            $work_locations = WorkLocation::when(empty($request->user()->business_id), function ($query) use ($request, $created_by) {
                if (auth()->user()->hasRole('superadmin')) {
                    return $query->where('work_locations.business_id', NULL)
                        ->where('work_locations.is_default', 1)
                        ->when(isset($request->is_active), function ($query) use ($request) {
                            return $query->where('work_locations.is_active', intval($request->is_active));
                        });
                } else {
                    return $query

                    ->where(function($query) use($request) {
                        $query->where('work_locations.business_id', NULL)
                        ->where('work_locations.is_default', 1)
                        ->where('work_locations.is_active', 1)
                        ->when(isset($request->is_active), function ($query) use ($request) {
                            if(intval($request->is_active)) {
                                return $query->whereDoesntHave("disabled", function($q) {
                                    $q->whereIn("disabled_work_locations.created_by", [auth()->user()->id]);
                                });
                            }

                        })
                        ->orWhere(function ($query) use ($request) {
                            $query->where('work_locations.business_id', NULL)
                                ->where('work_locations.is_default', 0)
                                ->where('work_locations.created_by', auth()->user()->id)
                                ->when(isset($request->is_active), function ($query) use ($request) {
                                    return $query->where('work_locations.is_active', intval($request->is_active));
                                });
                        });

                    });
                }
            })
                ->when(!empty($request->user()->business_id), function ($query) use ($request, $created_by) {
                    return $query
                    ->where(function($query) use($request, $created_by) {


                        $query->where('work_locations.business_id', NULL)
                        ->where('work_locations.is_default', 1)
                        ->where('work_locations.is_active', 1)
                        ->whereDoesntHave("disabled", function($q) use($created_by) {
                            $q->whereIn("disabled_work_locations.created_by", [$created_by]);
                        })
                        ->when(isset($request->is_active), function ($query) use ($request, $created_by)  {
                            if(intval($request->is_active)) {
                                return $query->whereDoesntHave("disabled", function($q) use($created_by) {
                                    $q->whereIn("disabled_work_locations.business_id",[auth()->user()->business_id]);
                                });
                            }

                        })


                        ->orWhere(function ($query) use($request, $created_by){
                            $query->where('work_locations.business_id', NULL)
                                ->where('work_locations.is_default', 0)
                                ->where('work_locations.created_by', $created_by)
                                ->where('work_locations.is_active', 1)

                                ->when(isset($request->is_active), function ($query) use ($request) {
                                    if(intval($request->is_active)) {
                                        return $query->whereDoesntHave("disabled", function($q) {
                                            $q->whereIn("disabled_work_locations.business_id",[auth()->user()->business_id]);
                                        });
                                    }

                                })


                                ;
                        })
                        ->orWhere(function ($query) use($request) {
                            $query->where('work_locations.business_id', auth()->user()->business_id)
                                // ->where('work_locations.is_default', 0)
                                ->when(isset($request->is_active), function ($query) use ($request) {
                                    return $query->where('work_locations.is_active', intval($request->is_active));
                                });;
                        });
                    });


                })
                ->when(!empty($request->search_key), function ($query) use ($request) {
                    return $query->where(function ($query) use ($request) {
                        $term = $request->search_key;
                        $query->where("work_locations.name", "like", "%" . $term . "%")
                            ->orWhere("work_locations.description", "like", "%" . $term . "%");
                    });
                })
                //    ->when(!empty($request->product_category_id), function ($query) use ($request) {
                //        return $query->where('product_category_id', $request->product_category_id);
                //    })
                ->when(!empty($request->start_date), function ($query) use ($request) {
                    return $query->where('work_locations.created_at', ">=", $request->start_date);
                })
                ->when(!empty($request->end_date), function ($query) use ($request) {
                    return $query->where('work_locations.created_at', "<=", ($request->end_date . ' 23:59:59'));
                })
                ->when(!empty($request->order_by) && in_array(strtoupper($request->order_by), ['ASC', 'DESC']), function ($query) use ($request) {
                    return $query->orderBy("work_locations.id", $request->order_by);
                }, function ($query) {
                    return $query->orderBy("work_locations.id", "DESC");
                })
                ->when(!empty($request->per_page), function ($query) use ($request) {
                    return $query->paginate($request->per_page);
                }, function ($query) {
                    return $query->get();
                });;



            return response()->json($work_locations, 200);
        } catch (Exception $e) {

            return $this->sendError($e, 500, $request);
        }
    }

    /**
     *
     * @OA\Get(
     *      path="/v1.0/work-locations/{id}",
     *      operationId="getWorkLocationById",
     *      tags={"work_locations"},
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
     *      summary="This method is to get work location by id",
     *      description="This method is to get work location by id",
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


    public function getWorkLocationById($id, Request $request)
    {
        try {
            $this->storeActivity($request, "DUMMY activity", "DUMMY description");
            if (!$request->user()->hasPermissionTo('work_location_view')) {
                return response()->json([
                    "message" => "You can not perform this action"
                ], 401);
            }

            $work_location =  WorkLocation::where([
                "work_locations.id" => $id,
            ])

                ->first();

                if (!$work_location) {
                    return response()->json([
                        "message" => "no data found"
                    ], 404);
                }

                if (empty(auth()->user()->business_id)) {

                    if (auth()->user()->hasRole('superadmin')) {
                        if (($work_location->business_id != NULL || $work_location->is_default != 1)) {
                            $this->storeError(
                                "You do not have permission to update this due to role restrictions.",
                                403,
                                "front end error",
                                "front end error"
                               );
                            return response()->json([
                                "message" => "You do not have permission to update this work location due to role restrictions."
                            ], 403);
                        }
                    } else {
                        if ($work_location->business_id != NULL) {
                            $this->storeError(
                                "You do not have permission to update this due to role restrictions.",
                                403,
                                "front end error",
                                "front end error"
                               );
                            return response()->json([
                                "message" => "You do not have permission to update this work location due to role restrictions."
                            ], 403);
                        } else if ($work_location->is_default == 0 && $work_location->created_by != auth()->user()->id) {
                            $this->storeError(
                                "You do not have permission to update this due to role restrictions.",
                                403,
                                "front end error",
                                "front end error"
                               );
                                return response()->json([
                                    "message" => "You do not have permission to update this work location due to role restrictions."
                                ], 403);

                        }
                    }
                } else {
                    if ($work_location->business_id != NULL) {
                        if (($work_location->business_id != auth()->user()->business_id)) {
                            $this->storeError(
                                "You do not have permission to update this due to role restrictions.",
                                403,
                                "front end error",
                                "front end error"
                               );
                            return response()->json([
                                "message" => "You do not have permission to update this work location due to role restrictions."
                            ], 403);
                        }
                    } else {
                        if ($work_location->is_default == 0) {
                            if ($work_location->created_by != auth()->user()->created_by) {
                                $this->storeError(
                                    "You do not have permission to update this due to role restrictions.",
                                    403,
                                    "front end error",
                                    "front end error"
                                   );
                                return response()->json([
                                    "message" => "You do not have permission to update this work location due to role restrictions."
                                ], 403);
                            }
                        }
                    }
                }



            return response()->json($work_location, 200);
        } catch (Exception $e) {

            return $this->sendError($e, 500, $request);
        }
    }


    /**
     *
     *     @OA\Delete(
     *      path="/v1.0/work-locations/{ids}",
     *      operationId="deleteWorkLocationsByIds",
     *      tags={"work_locations"},
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
     *      summary="This method is to delete work location by id",
     *      description="This method is to delete work location by id",
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

    public function deleteWorkLocationsByIds(Request $request, $ids)
    {

        try {
            $this->storeActivity($request, "DUMMY activity", "DUMMY description");
            if (!$request->user()->hasPermissionTo('work_location_delete')) {
                return response()->json([
                    "message" => "You can not perform this action"
                ], 401);
            }

            $idsArray = explode(',', $ids);
            $existingIds = WorkLocation::whereIn('id', $idsArray)
                ->when(empty($request->user()->business_id), function ($query) use ($request) {
                    if ($request->user()->hasRole("superadmin")) {
                        return $query->where('work_locations.business_id', NULL)
                            ->where('work_locations.is_default', 1);
                    } else {
                        return $query->where('work_locations.business_id', NULL)
                            ->where('work_locations.is_default', 0)
                            ->where('work_locations.created_by', $request->user()->id);
                    }
                })
                ->when(!empty($request->user()->business_id), function ($query) use ($request) {
                    return $query->where('work_locations.business_id', $request->user()->business_id)
                        ->where('work_locations.is_default', 0);
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

            $user_exists =  User::whereIn("work_location_id", $existingIds)->exists();
            if ($user_exists) {
                $conflictingUsers = User::whereIn("work_location_id", $existingIds)->get([
                    'id', 'first_Name',
                    'last_Name',
                ]);

                return response()->json([
                    "message" => "Some users are associated with the specified work_locations",
                    "conflicting_users" => $conflictingUsers
                ], 409);
            }

            WorkLocation::destroy($existingIds);


            return response()->json(["message" => "data deleted sussfully", "deleted_ids" => $existingIds], 200);
        } catch (Exception $e) {

            return $this->sendError($e, 500, $request);
        }
    }
}

