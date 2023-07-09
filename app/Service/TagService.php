<?php

namespace App\Service;
use App\DTO\TagAttributesDTO;
use App\Models\Tag;
use App\Repositories\TagRepository;
use voku\helper\ASCII;

class TagService
{
    public function index(TagRepository $repository): object
    {
        return $repository->findAllTags();
    }
    public function store(TagAttributesDTO $tagAttributesDTO): void
    {
        Tag::create(['title' => $tagAttributesDTO->getTitle()]);
    }

    public function update(Tag $tagId, TagAttributesDTO $tagElementsToUpdate): void
    {
        Tag::where('id', $tagId) ->update(['title' => $tagElementsToUpdate->getTitle()]);
    }

    public function delete($tagId): void
    {
        Tag::where('id', $tagId)->delete();
    }
}
