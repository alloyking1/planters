<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;
use App\Services\Portfolio\PortfolioService;
use App\DataTransferObjects\PortfolioDto;
use App\Models\Portfolio;

class CreatePortfolioForm extends Form
{
    use WithFileUploads;

    #[Validate('required|string')]
    public $url = '';
    #[Validate('required|string|min:5')]
    public $greeting = '';
    #[Validate('required|string|min:5')]
    public $about_you = '';
    #[Validate('required|string|min:5')]
    public $linkedin = '';
    #[Validate('required|string|min:5')]
    public $twitter = '';
    #[Validate('required|string|min:5')]
    public $github = '';
    #[Validate('required|string|min:3')]
    public $skills = '';

    public function setValue(Portfolio $portfolio)
    {
        $this->url = $portfolio->url;
        $this->greeting = $portfolio->greeting;
        $this->about_you = $portfolio->about;
        $this->linkedin = $portfolio->linkedin;
        $this->twitter = $portfolio->twitter;
        $this->github = $portfolio->github;
        $this->skills = implode(',',$portfolio->skills);
    }

    public function store($id = NULL, $logo = NULL) 
    {
        $this->validate();
        $agencyService = PortfolioService::save(PortfolioDto::fromPostRequest($this->all()), $id);
        $this->reset();
        return redirect()->route('portfolio.step-two.edit',['id' => $agencyService->id]); 
    }
}
