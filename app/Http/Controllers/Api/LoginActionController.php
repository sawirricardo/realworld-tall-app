<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginActionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'user.email' => ['required', 'email'],
            'user.password' => ['required']
        ]);

        $credentials = $request->json('user');

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Auth::attempt($credentials)) {
            return new UserResource($user->append('token'));
        }

        throw ValidationException::withMessages(['email' => ['The provided credentials are incorrect.'],]);
    }
}
