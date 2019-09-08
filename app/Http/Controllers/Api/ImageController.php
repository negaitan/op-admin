<?php

namespace App\Http\Controllers\Api;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ImageResource;

class ImageController extends Controller
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
            return ImageResource::collection(Image::all());
        }
        return abort(403);
    }

    /**
     * Display the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Image $image)
    {
        if($request->ajax())
        {
            return new ImageResource($image);
        }
        return abort(403);
    }
}
