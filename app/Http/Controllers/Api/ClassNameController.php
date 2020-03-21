<?php

namespace App\Http\Controllers\Api;

use App\Models\ClassName;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ClassNameResource;

class ClassNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return ClassNameResource::collection(ClassName::exposed()->get());
        }
        return abort(403);
    }

    /**
     * Display the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param  \App\Models\ClassName  $className
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ClassName $className)
    {
        if ($request->ajax()) {
            return new ClassNameResource($className);
        }
        return abort(403);
    }
}
