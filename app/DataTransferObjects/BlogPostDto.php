<?php

namespace App\DataTransferObjects;

use App\Http\Requests\BlogPostRequest;

class BlogPostDto
{
    public function __construct(
        public readonly string $title,
        public readonly string $slog,
        public readonly string $excerpt,
        public readonly string $min_to_read,
        public readonly string $category,
        public readonly string $tag,
        public readonly string $body,
        public readonly string $meta_description,
        public readonly string $meta_keywords,
        public readonly string $meta_robots,
        public readonly string $grade,
    ) {
    }

    public static function fromPostRequest(BlogPostRequest $request)
    {
        return new self(
            title: $request->validated('title'),
            slog: $request->validated('slog'),
            excerpt: $request->validated('excerpt'),
            min_to_read: $request->validated('min_to_read'),
            category: $request->validated('category'),
            tag: $request->validated('tag'),
            body: $request->validated('body'),
            meta_description: $request->validated('meta_description'),
            meta_keywords: $request->validated('meta_keywords'),
            meta_robots: $request->validated('meta_robots'),
            grade: $request->validated('grade'),
        );
    }
}
