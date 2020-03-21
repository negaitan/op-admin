<?php

namespace App\Http\Controllers\Api;

use App\Models\Flash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\FlashResource;

class FlashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return FlashResource::collection(Flash::all());
    }

    /**
     * Display the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param  \App\Models\Flash  $flash
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Flash $flash)
    {
        return new FlashResource($flash);
    }
}
