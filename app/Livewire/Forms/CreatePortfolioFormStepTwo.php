<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;
use App\Services\Portfolio\PortfolioService;
use App\DataTransferObjects\PortfolioProjectDto;
use App\DataTransferObjects\PortfolioDto;
use App\Traits\Livewire;
use App\Models\PortfolioProject;
use App\Models\Portfolio;

class CreatePortfolioFormStepTwo extends Form
{
    use WithFileUploads ; 

    #[Validate('required|string|min:5')]
    public $project_name = '';
    #[Validate('required|string|url|min:5')]
    public $project_link = '';
    #[Validate('required|string|min:5')]
    public $about_project = '';
    #[Validate('required|string|max:1024')]
    public $project_img = '';

    public function addPortfolioProject($portfolio_id = NULL, $id = NULL, $logo = NULL) 
    {
        $this->validate();
        $agencyService = PortfolioService::addPortfolioProject(PortfolioProjectDto::fromPostRequest($this->all(), $portfolio_id), $id);
        $this->reset(); 
    }

    public function savePortfolioProject($id){
       return Portfolio::find($id)->update([
            'next_step' => '3'
        ]);
    }

}
