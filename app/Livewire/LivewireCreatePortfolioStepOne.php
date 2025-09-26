<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Portfolio;
use App\Services\Portfolio\PortfolioService;
use Livewire\WithFileUploads;
use App\Livewire\Forms\CreatePortfolioForm;
use App\Livewire\Forms\CreatePortfolioFormStepTwo;
use App\Livewire\Forms\CreatePortfolioFormStepThree;

class LivewireCreatePortfolioStepOne extends Component
{
    use WithFileUploads;
    
    public $step;
    public $url;
    public $availableName;
    public $portfolio;
    public $project_img;
    public $profile_img;
    public $cv;
    public CreatePortfolioForm $form;
    public CreatePortfolioFormStepTwo $stepTwoForm;
    public CreatePortfolioFormStepThree $stepThreeForm;

    public function mount(){
        $this->portfolio = Portfolio::where('user_id', auth()->id())->first();
        if($this->portfolio ==  null){
            $this->step = 1;
        }else{
            $this->step = $this->portfolio->next_step;
        }
    }

    public function urlCheck(){
        $available = PortfolioService::nameCheck($this->url);

        if($available){
            return $this->availableName = true;
        }
        return $this->availableName = false;
    }

    public function addProject(){
        $this->stepTwoForm->project_img = $this->project_img->store('portfolio', 'public');
        $this->stepTwoForm->addPortfolioProject($this->portfolio->id);
    }

    public function save(){
        if($this->step == 1){
            if($this->availableName){
                $this->form->url = $this->url;
                $this->form->store();
            }else{
                return redirect()->back()->with('error', 'url already in use');
            }
        }elseif($this->step == 2){ //remove later as this line is no longer needed
            $this->stepTwoForm->savePortfolioProject($this->portfolio->id);
        }elseif($this->step == 3){
            $this->stepThreeForm->profile_img = $this->profile_img->store('portfolio', 'public');
            // $this->stepThreeForm->cv = $this->cv;
            $this->stepThreeForm->updateFiles($this->portfolio->id);
        }
    }

    public function render()
    {
        return view('livewire.livewire-create-portfolio-step-one',[
            'portfolios' =>  PortfolioService::view(null, null, auth()->id())
        ]);
    }
}
