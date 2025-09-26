<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Services\Job\JobPostingService;
use App\Models\JobPosting;

class LivewireUpdateJobLogo extends Component
{
    use WithFileUploads;
    public $id;
    public $currentLogo;
    #[Validate('required|image|max:1024')]
    public $photo; 

    public function mount($id, JobPostingService $jobPostingService){
        $this->id = $id;
        $jobLogo = $jobPostingService->find($id)->toArray();
        $this->currentLogo = $jobLogo['logo'];
    }

    public function update(){
        $photoUrl = $this->photo->store('logo', 'public');
        JobPosting::find($this->id)->update([
            'logo' => $photoUrl
        ]);
        session()->flash('success', 'Image upload successful');
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.livewire-update-job-logo');
    }
}
