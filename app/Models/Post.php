<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'excerpt', 'slog', 'body', 'image_path', 'is_published', 'min_to_read'
    ];

    protected $cast = [
        'is_published' => 'boolean'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class, 'post_tag')->withTimestamps();
    }

    public function category()
    {
        return $this->belongsToMany(Category::class, 'post_category')->withTimestamps();
    }

    public function meta()
    {
        return $this->hasOne(PostMeta::class);
    }

    public function grade()
    {
        return $this->hasOne(PostGrade::class, 'post_id');
    }
}
