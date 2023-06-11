<?php

namespace App\Service;
use App\Models\Tag;

class TagService
{
    public function store($request)
    {
        $tagElementsToCreate = $request->validated();
        Tag::create(['title' => $tagElementsToCreate['title']]);
    }

    public function update($tag, $tagElementsToUpdate)
    {
        $tag->update($tagElementsToUpdate);
    }

    public function delete($tag)
    {
        $tag->delete();
    }
}
