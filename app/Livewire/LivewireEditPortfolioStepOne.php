<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\Portfolio\PortfolioService;
use App\Livewire\Forms\CreatePortfolioForm;
use App\Models\Portfolio;

class LivewireEditPortfolioStepOne extends Component
{
    public $portfolio;

    // public $step;
    public $id;
    public $url;
    public $availableName;
    
    public CreatePortfolioForm $form;

    public function mount($id){
        $this->id = $id;
        $this->portfolio = Portfolio::with('projects')->find($this->id);
        $this->form->setvalue($this->portfolio);
        $this->url = $this->form->url;
    }

    public function urlCheck(){
        $available = PortfolioService::nameCheck($this->url);

        if($available){
            return $this->availableName = true;
        }
        return $this->availableName = false;
    }

    public function save(){
        if($this->availableName || $this->url == $this->portfolio->url){
            $this->form->url = $this->url;
            $this->form->store($this->id);
            return redirect()->route('portfolio.step-two.edit', ['id' => $this->id]);
        }else{
            return redirect()->back()->with('error', 'url already in use');
        }
    }

    public function delete($id){
        portfolio::find($id)->delete();
        return redirect()->route('portfolio.list')->with('success', 'portfolio deleted successfully');
    }

    public function render()
    {
        return view('livewire.livewire-edit-portfolio-step-one',[
            'portfolio' => $this->portfolio
        ]);
    }
}
