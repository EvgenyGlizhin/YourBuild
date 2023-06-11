<?php

namespace App\Service;

use App\Models\Article;
use Illuminate\Support\Facades\Storage;

class ArticleService
{
    public function store($request, $articleElementsToCreate)
    {
        $imagePath = $request->file('image_url')->store('uploads', 'public');
        $articleElementsToCreate['image_url'] = $imagePath;
        $articleElementsToCreate['user_id'] = auth()->user()->id;
        Article::create($articleElementsToCreate);
    }

    public function update(Article $article, $articleElementsToUpdate)
    {
        if (isset($articleElementsToUpdate['image_url'])) {
            $articleElementsToUpdate['image_url'] = Storage::disk('public')->put('/images', $articleElementsToUpdate['image_url']);
        }
        $article->update($articleElementsToUpdate);
    }

    public function delete(Article $article)
    {
        $article['image_url'] = public_path('storage/' . $article->image_url);
        if(file_exists($article['image_url'])){
            unlink($article['image_url']);
        }
        $article->delete();
    }
}
