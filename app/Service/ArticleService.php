<?php

namespace App\Service;

use App\DTO\ArticleAttributesDTO;
use App\Models\Article;
use App\Repositories\ArticleRepository;
use Illuminate\Support\Facades\Storage;

class ArticleService
{
    public function index(ArticleRepository $repository): object
    {
        $articles = $repository->getAllArticles();
        return $articles;
    }

    public function store(ArticleAttributesDTO $articleAttributesDTO): void
    {
        Article::create([
            'title' => $articleAttributesDTO->getTitle(),
            'text' => $articleAttributesDTO->getText(),
            'image_url' => $articleAttributesDTO->getImageUrl(),
            'user_id' => $articleAttributesDTO->getUserId()
        ]);
    }

    public function update(Article $article, ArticleAttributesDTO $articleElementsToUpdate): void
    {
        Article::where('id', $article['id'])->update([
            'title' => $articleElementsToUpdate->getTitle(),
            'text' => $articleElementsToUpdate->getText(),
            'image_url' => $articleElementsToUpdate->getImageUrl(),
            'user_id' => $articleElementsToUpdate->getUserId()
        ]);
    }

    public function delete(Article $article): void
    {
        $article['image_url'] = public_path('storage/' . $article->image_url);
        if (file_exists($article['image_url'])) {
            unlink($article['image_url']);
        }
        Article::where('id', $article['id'])->delete();
    }

    public function findArticlesForIndexPage(ArticleRepository $repository): object
    {
        return $repository->findArticlesForIndexPage();
    }
}
