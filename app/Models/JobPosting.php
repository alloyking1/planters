<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'company_name',
        'title',
        'contract',
        'location',
        'description',
        'about_company',
        'salary',
        'application_link',
        'logo',
    ];

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'job_postings_skill');
    }
}
