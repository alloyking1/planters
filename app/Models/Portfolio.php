<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','url','greeting','about','skills','linkedin','twitter','github','skills','profile_img','cv','status','next_step','published'];

    protected $casts = [
        'skills' => 'array'
    ];

    public function projects(){
        return $this->hasMany(PortfolioProject::class, 'portfolio_id');
    }

    public function services(){
        return $this->hasMany(PortfolioService::class, 'portfolio_id');
    }
}
