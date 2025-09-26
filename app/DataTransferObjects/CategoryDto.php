<?php

namespace App\DataTransferObjects;

use App\Http\Requests\CategoryRequest;

class CategoryDto
{
    public function __construct(public string $title, public string $description)
    {
    }

    public static function fromCategoryRequest(CategoryRequest $request)
    {
        return new self(
            title: $request->validated('title'),
            description: $request->validated('description'),
        );
    }
}
