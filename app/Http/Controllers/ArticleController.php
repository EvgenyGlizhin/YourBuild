<?php

namespace App\Http\Controllers;

use App\Http\Requests\Article\StoreRequest;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

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

    public function index()
    {
        $articles = DB::table('articles')
            ->select('articles.title', 'articles.text','articles.image_url','articles.created_at','articles.user_id', 'users.name')
            ->selectRaw('SUBSTR(text, 1, 500) AS text')
            ->join('users', 'users.id', '=', 'articles.user_id')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('articles', array('articles' => $articles));
    }
}
