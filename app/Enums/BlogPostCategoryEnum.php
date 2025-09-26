<?php

namespace App\Enums;

enum BlogPostCategoryEnum: string
{
    case TUTORIAL = 'tutorial';
    case BLOG = 'blog';
    case PACKAGES = 'packages';
    case LARAVEL_THE_RIGHT_WAY = 'laravel_the_right_way';
}
