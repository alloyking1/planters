<?php
namespace App\Services\Portfolio;
use App\Models\Portfolio;
use App\DataTransferObjects\PortfolioDto;
use App\DataTransferObjects\PortfolioProjectDto;
use App\Models\PortfolioProject;

class PortfolioService {

    public static function nameCheck($url){
        if(Portfolio::where('url', $url)->count() <= 0) {
            return true;
        }

        return false;
    }

    public static function save(PortfolioDto $portfolioDto, $id = NULL){
        $portfolio = Portfolio::updateOrCreate([
            'id' => $id
        ],[
            'user_id' => $portfolioDto->user_id,
            'url' => $portfolioDto->url ?? '',
            'greeting'  => $portfolioDto->greeting ?? '', 
            'about' => $portfolioDto->about_you ?? '',
            'linkedin'=> $portfolioDto->linkedin ?? '',
            'twitter'=> $portfolioDto->twitter ?? '',
            'github'=> $portfolioDto->github ?? '',
            'skills'=> $portfolioDto->skills ?? '',
            'next_step'=> '2',
        ]);

        return $portfolio;
    }

    public static function addPortfolioProject(PortfolioProjectDto $portfolioProjectDto, $id = NULL){

        $portfolioProjects = PortfolioProject::updateOrCreate([
            'id' => $id
        ],[
            'portfolio_id' => $portfolioProjectDto->portfolio_id ?? '',
            'name' => $portfolioProjectDto->name ?? '',
            'description' => $portfolioProjectDto->description ?? '',
            'img' => $portfolioProjectDto->img ?? '',
            'link' => $portfolioProjectDto->link ?? '',
        ]);

        return $portfolioProjects;
    }

    public static function view($url = NULL, $id = NULL, $user_id = NULL){
        return Portfolio::with('projects')->where('url',$url)->orWhere('user_id', $user_id)->orWhere('url', $id)->get();
    }

}