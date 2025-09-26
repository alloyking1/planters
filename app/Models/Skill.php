<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type'
    ];

    public function agency()
    {
        return $this->belongsToMany(Agency::class, 'agency_id');
    }

    public function jobs()
    {
        return $this->belongsToMany(JobPosting::class, 'job_posting_id');
    }
}
