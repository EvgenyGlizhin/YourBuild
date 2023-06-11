<?php

namespace App\Http\Controllers;

use App\Http\Requests\Article\StoreRequest;
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use App\Repositories\ArticleRepository;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(ArticleRepository $articleRepository)
    {
        $articles = $articleRepository->index();
        return view('articles.index', ['articles' => $articles]);
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }
}
