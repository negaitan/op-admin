<?php

namespace App\Http\Controllers\Api;

use App\Models\Club;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ClubResource;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            return ClubResource::collection(Club::all());
        }
        return abort(403);
    }

    /**
     * Display the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Club $club)
    {
        if($request->ajax())
        {
            return new ClubResource($club);
        }
        return abort(403);
    }
}
