<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\RequestResource;
use App\Models\Requests;
use Illuminate\Http\Request;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return RequestResource::collection(Requests::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requests = new Requests;
        $requests->user_id_send = $request->input('user_id_send');
        $requests->user_id_received = $request->input('user_id_received');
        $requests->accepted = $request->input('accepted');

        $res = $requests->save();

        if ($res) {
            return response()->json(['message' => 'Request create succesfully'], 201);
        }
        return response()->json(['message' => 'Error to create Request'], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Requests $requests)
    {
        return new RequestResource($requests);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Requests $requests)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Requests $requests)
    {
        if ($requests->delete()) {
            return response()->json([
                'message' => 'success'
            ], 204);
        }
        return response()->json([
            'message' => 'Not found'
        ], 404);
    }
}
