<?php

namespace App\Http\Controllers;

use Crm\User\Services\userServices;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    const TOKEN_NAME = 'personal';
    private userServices $userServices;

    public function __construct(userServices $userServices)
    {
        $this->userServices =  $userServices;
    }

    public function signup(Request $request)
    {
        $user = $this->userServices->signup($request);
        $token = $user->createToken(self::TOKEN_NAME)->plainTextToken;
        return response()->json(
            [
                'user' => $user,
                'token' => $token,
            ],
        );
    }

        public function login(Request $request)
    {
        $user = $this->userServices->login($request);
        $token = $user->createToken(self::TOKEN_NAME)->plainTextToken;
        
        return response()->json(
            [
                'user' => $user,
                'token'=>$token
            ],
        );
    }

    
}
