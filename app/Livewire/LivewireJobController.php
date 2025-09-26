<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\Job\JobPostingService;

class LivewireJobController extends Component
{
    public function render(JobPostingService $job)
    {
        return view('livewire.livewire-job-controller',[
            'jobs' => $job->all(),
        ])
        ->layout('layouts.guest');
    }
}
