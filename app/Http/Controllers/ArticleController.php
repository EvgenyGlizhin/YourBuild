<?php

namespace App\Http\Controllers;

use App\Http\Requests\Article\StoreRequest;
use App\Models\Article;
use App\Models\Comment;
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
        return view('articles.create');
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
        ON a.user_id = u.id
        ORDER BY a.created_at DESC
        LIMIT 20 OFFSET 0 // или OFFSET 20, 40 для второй и третьей страницы
         *
         * На чистом php, чтобы это происходило динамически нужно добавить код.
        LIMIT . '$perPage' . OFFSET . '$offset';
        $perPage = 20;
        $currentPage = $_GET['page'] ?? 1;
        $offset = ($currentPage - 1) * $perPage;
         */
        $articles = Article::with('user')
            ->select('id', 'title', 'text', 'image_url', 'created_at', 'user_id')
            ->selectRaw('SUBSTR(text, 1, 500) AS text')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('articles.index', ['articles' => $articles]);
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }
}
