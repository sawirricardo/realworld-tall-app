<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(Request $request)
    {
        $user = User::find(auth()->id());
        $user->token = $request->bearerToken();
        return new UserResource($user);
    }

    public function update(Request $request)
    {
        $request->validate();
    }
}
