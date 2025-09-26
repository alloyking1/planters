<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\Agency\AgencyService;

class LivewireAgencyController extends Component
{
    public function render(AgencyService $agency)
    {
        return view('livewire.livewire-agency-controller', [
            'agencies' => $agency->all()
        ])->layout('layouts.guest');
    }
}
