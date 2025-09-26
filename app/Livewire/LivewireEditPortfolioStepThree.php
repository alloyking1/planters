<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Portfolio;
use App\Livewire\Forms\CreatePortfolioFormStepThree;
use Livewire\WithFileUploads;

class LivewireEditPortfolioStepThree extends Component
{
    use WithFileUploads;

    public CreatePortfolioFormStepThree $stepThreeForm;
    public $portfolio;
    public $profile_img;
    public $cv;

    public function mount($id){
        $this->id = $id;
        $this->portfolio = Portfolio::with(['projects','services'])->find($this->id);
    }

    public function save(){
        $this->stepThreeForm->profile_img = $this->profile_img->store('portfolio', 'public');
        $this->stepThreeForm->updateImage($this->portfolio->id);
        return redirect()->back()->with('success', 'Profile image saved successfully');
    }

    public function saveCv(){
        $this->stepThreeForm->cv = $this->cv->store('portfolio', 'public');
        $this->stepThreeForm->updateCv($this->portfolio->id);
        return redirect()->back()->with('success', 'File saved successfully');
    }

    public function publish(){
        $this->stepThreeForm->publish($this->portfolio->id);
        return redirect()->route('portfolio.list')->with('success', 'Your portfolio site is published');
    }
    
    
    public function render()
    {
        return view('livewire.livewire-edit-portfolio-step-three',[
            'portfolio' => $this->portfolio
        ]);
    }
}
