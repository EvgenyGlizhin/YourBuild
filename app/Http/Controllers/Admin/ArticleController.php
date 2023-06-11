<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Article\StoreRequest;
use App\Models\Article;
use App\Service\ArticleService;

class ArticleController
{
    public function index()
    {
        $articles = Article::all();
        return view('admin.articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('admin.articles.show', compact('article'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(StoreRequest $request, ArticleService $service)
    {
        $articleElementsToCreate = $request->validated();
        $service->store($request, $articleElementsToCreate);
        return view('admin.main.index');
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(StoreRequest $request, Article $article, ArticleService $service)
    {
        $articleElementsToUpdate = $request->validated();
        $service->update($article, $articleElementsToUpdate);
        return redirect()->route('admin.articles.index');
    }

    public function delete(Article $article, ArticleService $service)
    {
        $service->delete($article);
        return redirect()->route('admin.articles.index');
    }
}
