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

        return ClassGroupResource::collection(ClassGroup::all());
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

        return new ClassGroupResource($classGroup);
    }
}
