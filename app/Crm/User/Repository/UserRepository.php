<?php

namespace Crm\User\Repository;

use Crm\Base\BaseRepository\BaseRepository;
use Crm\User\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserRepository extends BaseRepository
{
    public function __construct(User $user)
    {
        $this->setModel($user);
    }

    public function signup(Request $request): ?User
    {
        $user =  User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]
        );

        //        event(new welcome($user));

        return $user;
    }

    public function login(Request $request): ?User
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        
        return $user;
    }


}
