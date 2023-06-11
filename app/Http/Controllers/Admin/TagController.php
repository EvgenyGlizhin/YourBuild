<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Tag\StoreRequest;
use App\Models\Tag;
use App\Service\TagService;

class TagController
{
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tag.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tag.create');
    }

    public function store(StoreRequest $request, TagService $service)
    {
        $service->store($request);
        return redirect()->route('admin.tag.index');
    }

    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));
    }

    public function update(StoreRequest $request, Tag $tag, TagService $service)
    {
        $elementTagToCreate = $request->validated();
        $service->update($tag, $elementTagToCreate);
        return redirect()->route('admin.tag.index');
    }

    public function delete(Tag $tag, TagService $service)
    {
        $service->delete($tag);
        return redirect()->route('admin.tag.index');
    }
}
