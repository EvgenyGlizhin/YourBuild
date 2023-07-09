<?php

namespace App\Repositories;

use App\Models\Tag;

class TagRepository
{
    public function findAllTags(): object
    {
        return Tag::paginate(20);
    }
}
