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

class CreatePortfolioFormStepThree extends Form
{
    use WithFileUploads ; 

    #[Validate('string')]
    public $profile_img = '';
    #[Validate('string')]
    public $cv = '';

    public function updateImage($id){
        $this->validate();
        $portfolio = Portfolio::find($id)->update([
            'profile_img' => $this->profile_img,
        ]);
    }

    public function updateCv($id){
        $this->validate();
        $portfolio = Portfolio::find($id)->update([
            'cv' => $this->cv,
        ]);
    }

    public function publish($id){
        return $portfolio = Portfolio::find($id)->update([
            'published' => 1,
            'next_step' => 1
        ]);
    }

}
