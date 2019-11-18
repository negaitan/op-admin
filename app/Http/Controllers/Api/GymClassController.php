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
            if($request->has('club') || $request->has('day')) {
                $query_keys = [
                    'club' => 'club_id',
                    'day' => 'club_id',
                ];

                $query = GymClass::query();

                if($request->has('club')) {
                    $query->orWhere('club_id', $request->club);
                }

                if($request->has('day')) {
                    $query->orWhere('week_days', 'like', "%$request->day%");
                }

                return GymClassResource::collection($query->get());
            }

            return GymClassResource::collection(GymClass::all());
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
