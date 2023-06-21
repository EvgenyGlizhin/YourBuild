<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public  function findAllUsers(): object
    {
       return User::paginate(20);
    }
}
