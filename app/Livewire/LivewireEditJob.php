<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\JobPosting;
use App\Livewire\Forms\CreateJobForm;
use App\Models\Skill;
use App\Services\Job\JobPostingService;

class LivewireEditJob extends Component
{
    public $selectedOptions=[];
    public $skills=[];
    public $jobPosting;
    public $id;
    public CreateJobForm $form;

    public function mount($id){
        $this->id = $id;
        $allSkills =  Skill::all();
        $this->skills =  $allSkills->toArray();
        $this->jobPosting = JobPosting::find($this->id);
        $this->selectedOptions = $this->jobPosting->skills->toArray();
        $this->form->setValue($this->jobPosting);
    }

    public function save(){
        $this->form->selectedOptions = $this->selectedOptions;
        $this->form->store($this->id, $this->jobPosting->logo);
        session()->flash('success', 'Agency successfully created.');
        return redirect()->route('jobs.list');
    }

    public function delete(JobPostingService $jobPostingService){
        $jobPostingService->delete($this->id);
        session()->flash('success', 'Job successfully deleted.');
        return redirect()->route('jobs.list');
    }

    public function render()
    {
        return view('livewire.livewire-edit-job',[
            'jobPosting' => $this->jobPosting
        ]);
    }
}
