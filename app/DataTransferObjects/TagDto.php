<?php

namespace App\DataTransferObjects;

use App\Http\Requests\TagRequest;

class TagDto
{

    public function __construct(public string $title, public string $description)
    {
    }

    public static function fromTagRequest(TagRequest $request)
    {
        return new self(
            title: $request->validated('title'),
            description: $request->validated('description')
        );
    }
}
