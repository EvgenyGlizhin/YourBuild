<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tag\StoreRequest;
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

    public function store(StoreRequest $request)
    {
        $tagCreate = $request->validated();
        Tag::create(['title' => $tagCreate['title']]);
        return redirect()->route('home');
    }
}
