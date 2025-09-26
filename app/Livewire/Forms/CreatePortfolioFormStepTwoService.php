<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;
use App\Traits\Livewire;
use App\Models\PortfolioService;

class CreatePortfolioFormStepTwoService extends Form
{
    use WithFileUploads ; 

    #[Validate('required|string|min:5')]
    public $name = '';
    #[Validate('required|string|min:5')]
    public $description = '';

    public function addPortfolioService($portfolio_id = NULL, $id = NULL, $logo = NULL) 
    {
        $this->validate();
        $portfolioServices = PortfolioService::create([
            'portfolio_id' => $portfolio_id,
            'name'=> $this->name,
            'description'=> $this->description,
        ]);
        $this->reset(); 
    }

    public function savePortfolioProject($id){
       return Portfolio::find($id)->update([
            'next_step' => '3'
        ]);
    }

}
