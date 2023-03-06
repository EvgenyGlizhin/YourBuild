<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('tags');
    }

    public function store()
    {
        $tagTitle = request()->validate([
            'title' => ['required', 'unique:tags', 'max:20', 'regex:/^([^0-9]*)$/']
        ]);
        Tag::Create(['title' => $tagTitle['title']]);
        return redirect()->route('home');
    }
}
