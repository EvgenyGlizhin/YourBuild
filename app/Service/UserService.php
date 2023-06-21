<?php

namespace App\Service;

use App\DTO\UserAttributesForCreateDTO;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function index(UserRepository $repository): object
    {
        return $repository->findAllUsers();
    }
    public function store(UserAttributesForCreateDTO $userAttributesForCreate): void
    {
        User::create([
            'name' => $userAttributesForCreate->getName(),
            'email' => $userAttributesForCreate->getEmail(),
            'password' => Hash::make($userAttributesForCreate->getPassword()),
            'is_admin' => $userAttributesForCreate->getIsAdmin()
        ]);
    }

    public function delete(User $userId): void
    {
        User::where('id', $userId)->delete();
    }
}
