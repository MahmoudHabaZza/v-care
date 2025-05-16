<?php

namespace App\Http\Responses;

use App\Http\Resources\UserResource;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Laravel\Fortify\Fortify;

class CustomLoginResponse implements LoginResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {

        $user = $request->user() ?? $request->user;
        $user->tokens()->where('name','mobile_token')->delete();
        $token = $user->createToken('mobile_token'); // mobile_token => token name

        return response()->json(['user' => new UserResource($user),'token' => $token->plainTextToken]);
    }
}
