<?php

namespace App\Http\Controllers\Admin;

use App\DTO\TagAttributesDTO;
use App\Http\Requests\Tag\StoreRequest;
use App\Models\Tag;
use App\Repositories\TagRepository;
use App\Service\TagService;

class TagController
{
    public function index(TagService $service, TagRepository $repository)
    {
        $tags = $service->index($repository);
        return view('admin.tag.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tag.create');
    }

    public function store(StoreRequest $request, TagService $service)
    {
        $title = $request->getTitle();
        $tagAttributesDTO = new TagAttributesDTO($title);
        $service->store($tagAttributesDTO);

        return redirect()->route('admin.tag.index');
    }

    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));
    }

    public function update($tagId, StoreRequest $request, TagService $service)
    {
        $title = $request->getTitle();
        $elementsTagToUpdateDTO = new TagAttributesDTO($title);
        $service->update($tagId, $elementsTagToUpdateDTO);
        return redirect()->route('admin.tag.index');
    }

    public function delete($tagId, TagService $service)
    {
        $service->delete($tagId);
        return redirect()->route('admin.tag.index');
    }
}
