<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use function view;

class AdminController
{
    public function index()
    {
        return view('admin.main.index');
    }
}
