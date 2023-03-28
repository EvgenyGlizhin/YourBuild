<?php

namespace App\Http\Controllers;

use App\Http\Requests\Article\StoreRequest;
use App\Models\Article;
use App\Models\User;
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
        /**
        SELECT a.title, SUBSTR(text, 1, 500) AS text, a.image_url, a.created_at, a.user_id, u.name
        FROM articles AS a
        JOIN users AS u
        WHERE a.user_id = u.id
        ORDER BY a.created_at DESC
        LIMIT 20
         */
        $articles = Article::with('user')
            ->select('articles.title', 'articles.text','articles.image_url','articles.created_at','articles.user_id', 'users.name')
            ->selectRaw('SUBSTR(text, 1, 500) AS text')
            ->join('users', 'articles.user_id', '=', 'users.id')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('articles', ['articles' => $articles]);
    }
}
