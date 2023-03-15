<?php

namespace App\Http\Controllers;

use App\Http\Requests\Article\StoreRequest;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;

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
        $articleElementsToCreate = $request->validated();

        $imagePath = $request->file('image_url')->store('uploads', 'public');

        $articleElementsToCreate['image_url'] = $imagePath;
        $articleElementsToCreate['user_id'] = auth()->user()->id;

        Article::create($articleElementsToCreate);
        return redirect('home');
    }
}
