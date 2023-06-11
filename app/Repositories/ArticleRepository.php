<?php

namespace App\Repositories;

use App\Models\Article;

class ArticleRepository
{
    public function index()
    {
        return Article::with('user')
            ->select('id', 'title', 'text', 'image_url', 'created_at', 'user_id')
            ->selectRaw('SUBSTR(text, 1, 500) AS text')
            ->orderBy('created_at', 'desc')
            ->paginate(20);
    }
}
