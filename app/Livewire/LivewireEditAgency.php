<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Agency;
use App\Livewire\Forms\CreateAgentForm;
use App\Models\Skill;
use App\Services\Agency\AgencyService;

class LivewireEditAgency extends Component
{
    public $selectedOptions=[];
    public $skills=[];
    public $agency;
    public $id;
    public CreateAgentForm $form;

    public function mount($id){
        $this->id = $id;
        $allSkills =  Skill::all();
        $this->skills =  $allSkills->toArray();
        $this->agency = Agency::find($this->id);
        $this->selectedOptions = $this->agency->skills->toArray();
        $this->form->setValue($this->agency);
    }

    public function save(){
        $this->form->selectedOptions = $this->selectedOptions;
        $this->form->store($this->id, $this->agency->feature_img);
        session()->flash('success', 'Agency successfully created.');
        return redirect()->route('agency.list');
    }

    public function delete(AgencyService $agencyService){
        $agencyService->delete($this->id);
        session()->flash('success', 'Agency successfully deleted.');
        return redirect()->route('agency.list');
    }

    public function render()
    {
        return view('livewire.livewire-edit-agency', [
            'agency' => $this->agency
        ])
        ->layout('layouts.app');
    }
}
