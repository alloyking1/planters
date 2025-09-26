<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Forms\CreateJobForm;
use App\Models\Skill;
use Livewire\WithFileUploads;
use App\Services\Job\JobPostingService;

class LivewireCreateJob extends Component
{
    use WithFileUploads;

    public CreateJobForm $form;
    public $logo;
    public $selectedOptions=[];
    public $skills=[];

    public function boot()
    {
        $allSkills =  Skill::all();
        $this->skills =  $allSkills->toArray();
    }

    public function save(){
        
        $this->form->logo = $this->logo;
        $this->form->selectedOptions = $this->selectedOptions;
        $this->form->store();

        session()->flash('success', 'Job successfully created.');
        return redirect()->back();
    }


    public function render(JobPostingService $job)
    {
        return view('livewire.livewire-create-job',[
            'userJobs' => Auth::user()->load(['jobs' => function($query){
                $query->orderBy('created_at', 'desc');
            }]),
            'jobs' => $job->all(),
        ])
        ->layout('layouts.app');
    }
}
