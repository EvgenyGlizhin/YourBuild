<?php

namespace App\Http\Controllers\Admin;

use App\DTO\ArticleAttributesDTO;
use App\Http\Requests\Article\StoreRequest;
use App\Models\Article;
use App\Repositories\ArticleRepository;
use App\Service\ArticleService;
use App\Service\ImageService;

class ArticleController
{
    public function index(ArticleService $service, ArticleRepository $repository)
    {
        $articles = $service->index($repository);
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

    public function store(StoreRequest $request, ArticleService $service, ImageService $imageService)
    {
        $title = $request->getTitle();
        $text = $request->getText();
        $userId = auth()->user()->id;
        $imageUrl = $imageService->store($request->file('image_url'));

        $articleAttributesDTO = new ArticleAttributesDTO($title, $text, $imageUrl, $userId);
        $service->store($articleAttributesDTO);

        return view('admin.main.index');
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(StoreRequest $request, Article $article, ArticleService $service, ImageService $imageService)
    {

        $title = $request->getTitle();
        $text = $request->getText();
        $userId = auth()->user()->id;
        $imageUrl = $imageService->update($request->file('image_url'));

        $articleAttributesToUpdateDTO = new ArticleAttributesDTO($title, $text, $imageUrl, $userId);
        $service->update($article, $articleAttributesToUpdateDTO);

        return redirect()->route('admin.articles.index');
    }

    public function delete($article, ArticleService $service)
    {
        $service->delete($article);

        return redirect()->route('admin.articles.index');
    }
}
