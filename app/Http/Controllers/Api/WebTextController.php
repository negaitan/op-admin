<?php

namespace App\Http\Controllers\Api;

use App\Models\WebText;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\WebTextResource;

class WebTextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return WebTextResource::collection(WebText::exposed()->get());
    }

    /**
     * Display the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param  \App\Models\WebText  $webText
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, WebText $webText)
    {

        return new WebTextResource($webText);
    }
}
