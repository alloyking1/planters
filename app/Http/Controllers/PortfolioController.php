<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Portfolio\PortfolioService;

class PortfolioController extends Controller
{
    public function show($url){
        $portfolio = PortfolioService::view($url);
        if($portfolio->count() <= 0){
            return view('errors.404');
        }
        return view('portfolio.site', [
            'portfolio' => $portfolio
        ]);
    }

    public function homePage(){
        return view('portfolio.homePage', [
            // 'portfolio' => $portfolio
        ]);
    }
}
