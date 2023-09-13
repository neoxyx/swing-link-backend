<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function getUsers()
    {
        $users = User::get();

        return response()->json(['users' => $users]);
    }
    public function getUser($user_id = null)
    {
        $user = User::where('id', $user_id)->get();

        return response()->json($user);
    }
}
