<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostGrade extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'post_id'];

    public function post()
    {
        return $this->hasMany(Post::class, 'post_id');
    }
}
