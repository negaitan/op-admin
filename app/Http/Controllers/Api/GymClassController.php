<?php

namespace App\Http\Controllers\Api;

use App\Models\GymClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\GymClassResource;

class GymClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $query = GymClass::query();

            if($request->has('club') || $request->has('day')) {

                if($request->has('club')) {
                    $query->orWhere('club_id', $request->club);
                }

                if($request->has('day')) {
                    $query->orWhere('week_days', 'like', "%$request->day%");
                }

            }

            if($request->has('by_daytime')) {
                $data = $query->get()->groupBy('day_time');

                $response = [];

                if($data->has('0')) {
                    $response['morning'] = GymClassResource::collection($data['0']);
                }
                if($data->has('1')) {
                    $response['evening'] = GymClassResource::collection($data['1']);
                }
                if($data->has('2')) {
                    $response['night'] = GymClassResource::collection($data['2']);
                }

                return response()->json($response);
            }

            return GymClassResource::collection($query->get());
        }
        return abort(403);
    }

    /**
     * Display the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param  \App\Models\GymClass  $gymClass
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, GymClass $gymClass)
    {
        if($request->ajax())
        {
            return new GymClassResource($gymClass);
        }
        return abort(403);
    }
}
