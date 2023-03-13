<?php

namespace App\Http\Controllers;

use App\Http\Requests\Article\StoreRequest;
use App\Models\Article;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('article');
    }

    public function store(StoreRequest $request)
    {
        $articleCreate = $request->validated();
        $articleCreate['user_id'] = auth()->user()->id;
        Article::create($articleCreate);
        return redirect('home');
    }
}
