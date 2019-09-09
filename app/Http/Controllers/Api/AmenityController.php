<?php

namespace App\Http\Controllers\Api;

use App\Models\Amenity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\AmenityResource;

class AmenityController extends Controller
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
            return AmenityResource::collection(Amenity::all());
        }
        return abort(403);
    }

    /**
     * Display the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param  \App\Models\Amenity  $amenity
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Amenity $amenity)
    {
        if($request->ajax())
        {
            return new AmenityResource($amenity);
        }
        return abort(403);
    }
}
