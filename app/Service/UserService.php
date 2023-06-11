<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function store($request)
    {
        $name = $request->getName();
        $email = $request->getEmail();
        $password = $request->getPassword();
        $is_admin = $request->getIsAdmin();

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'is_admin' => $is_admin
        ]);
    }

    public function delete($user)
    {
        $user->delete();
    }
}
