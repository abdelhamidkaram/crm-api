<?php

namespace Crm\User\Services;


use Crm\User\Models\User;
use Crm\User\Repository\UserRepository;
use Illuminate\Http\Request;

class userServices
{
    private UserRepository $userRepository;
    const TOKEN_NAME = 'personal';

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function signup(Request $request): ?array
    {
        $user = $this->userRepository->signup($request);
        $token = $user->createToken(self::TOKEN_NAME)->plainTextToken;
        return [
            'user' => $user,
            'token' => $token,
        ];
    }

    public function login(Request $request): ?array
    {
        $user = $this->userRepository->login($request);
        $user->tokens()->delete();
        $token = $user->createToken(self::TOKEN_NAME)->plainTextToken;
        $data = [
            'user' => $user,
            'token' => $token
        ];
        return $data;
    }

    public function all()
    {
        return $this->userRepository->all();
    }
    public function show($id)
    {
        return $this->userRepository->show($id);
    }
    public function update($id, array $date)
    {
        return $this->userRepository->update($date, $id);
    }
    public function delete($id)
    {
        return $this->userRepository->delete($id);
    }
}
