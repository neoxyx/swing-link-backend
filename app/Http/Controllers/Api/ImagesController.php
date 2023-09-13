<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ImageResource;
use App\Models\Images;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ImageResource::collection(Images::latest()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = new Images;
        $image->type = $request->input('type');
        $image->image = $request->input('image');
        $image->name = $request->input('name');
        $image->user_id = $request->input('user_id');

        $res = $image->save();

        if ($res) {
            return response()->json(['message' => 'Image create succesfully'], 201);
        }
        return response()->json(['message' => 'Error to create Image'], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Images $images)
    {
        return new ImageResource($images);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Images $images)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Images $images)
    {
        if ($images->delete()) {
            return response()->json([
                'message' => 'success'
            ], 204);
        }
        return response()->json([
            'message' => 'Not found'
        ], 404);
    }
}
