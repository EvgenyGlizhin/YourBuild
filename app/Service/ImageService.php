<?php

namespace App\Service;

use App\Http\Requests\Article\StoreRequest;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    public function store(object $request): string
    {
        return $request->store('uploads', 'public');
    }

    public function update(object $request): string
    {
        return Storage::disk('public')->put('/images', $request);
    }
}
