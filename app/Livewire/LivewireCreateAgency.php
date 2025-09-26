<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Skill;
use App\Livewire\Forms\CreateAgentForm;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class LivewireCreateAgency extends Component
{
    use WithFileUploads;

    public $selectedOptions=[];
    public $skills=[];
    public $logo;

    public CreateAgentForm $form;

    public function boot()
    {
        $allSkills =  Skill::all();
        $this->skills =  $allSkills->toArray();
    }

    public function save(){
        
        $this->form->feature_img = $this->logo;
        $this->form->selectedOptions = $this->selectedOptions;
        $this->form->store();

        session()->flash('success', 'Agency successfully created.');
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.livewire-create-agency',[
            'userAgency' => Auth::user()->load(['agency' => function($query){
                $query->orderBy('created_at', 'desc');
            }])
        ]);
    }
}
