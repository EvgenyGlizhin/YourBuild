<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use App\Service\UserService;


class UserController
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(StoreRequest $request, UserService $service)
    {
        $service->store($request);
        return redirect()->route('admin.user.index');
    }

    public function delete(User $user, UserService $service)
    {
        $service->delete($user);
        return redirect()->route('admin.user.index');
    }
}
