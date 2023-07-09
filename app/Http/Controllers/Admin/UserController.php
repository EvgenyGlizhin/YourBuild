<?php

namespace App\Http\Controllers\Admin;

use App\DTO\UserAttributesForCreateDTO;
use App\Http\Requests\User\StoreUserRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Service\UserService;


class UserController
{
    public function index(UserService $service, UserRepository $repository)
    {
        $users = $service->index($repository);
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(StoreUserRequest $request, UserService $service)
    {
        $name = $request->getName();
        $email = $request->getEmail();
        $password = $request->getPassword();
        $isAdmin = $request->getIsAdmin();

        $userAttributesForCreateDTO = new UserAttributesForCreateDTO($name, $email, $password, $isAdmin);
        $service->store($userAttributesForCreateDTO);

        return redirect()->route('admin.user.index');
    }

    public function delete($userId, UserService $service)
    {
        $service->delete($userId);
        return redirect()->route('admin.user.index');
    }
}
