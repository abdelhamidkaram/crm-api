<?php

namespace App\Http\Controllers;

use Crm\User\Services\userServices;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{

    private userServices $userServices;

    public function __construct(userServices $userServices)
    {
        $this->userServices =  $userServices;
    }


    public function signup(Request $request)
    {
        return response()->json($this->userServices->signup($request));

    }

    public function login(Request $request)
    {
        return response()->json($this->userServices->login($request));

    }

    public function all()
    {
        return $this->userServices->all();
    }

    public function update(Request $request , $id)
    {
        return $this->userServices->update($id,$request->toArray());
    }

    public function delete($id)
    {
        return $this->userServices->delete($id);
    }
}
