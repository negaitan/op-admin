<?php

namespace App\Http\Controllers\Api;

use App\Models\ClassGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ClassGroupResource;

class ClassGroupController extends Controller
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
            return ClassGroupResource::collection(ClassGroup::all());
        }
        return abort(403);
    }

    /**
     * Display the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param  \App\Models\ClassGroup  $classGroup
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ClassGroup $classGroup)
    {
        if($request->ajax())
        {
            return new ClassGroupResource($classGroup);
        }
        return abort(403);
    }
}
