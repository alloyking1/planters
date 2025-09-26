<?php

namespace App\Services\Blog;

use App\DataTransferObjects\TagDto;
use App\Models\Tag;
use App\Models\Post;

class BlogPostTagService
{
    public function allTags()
    {
        return Tag::get();
    }

    public function postSelectedTags($id)
    {
        $value = [];
        $tags = Post::with('tag')->where('id', $id)->get();
        foreach ($tags as $val) {
            foreach ($val->tag as $each) {
                array_push($value, $each->title);
            }
        }
        return $value;
    }

    public function updateOrCreate(TagDto $dto, $id = null)
    {
        return Tag::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'title' => $dto->title,
                'description' => $dto->description
            ]
        );
    }
}
