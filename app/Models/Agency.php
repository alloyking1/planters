<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'type',
        'headquarters',
        'size',
        'project_size',
        'website',
        'video',
        'feature_img',
        'short_description',
        'about_company',
        'about_video',
        'logo',
    ];
    protected $cast = [
        'status' => 'boolean'
    ];

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'agencie_skill');
    }
}
