<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\Agency\AgencyService;
use Livewire\WithFileUploads;
use App\Models\Agency;

class LivewireUpdateAgencyLogo extends Component
{
    use WithFileUploads;

    public $id;
    public $currentLogo;
    #[Validate('required|image|max:1024')]
    public $photo; 

    public function mount($id, AgencyService $agencyService){
        $this->id = $id;
        $agencyLogo = $agencyService->find($id)->toArray();
        $this->currentLogo = $agencyLogo['feature_img'];
    }

    public function update(){
        $photoUrl = $this->photo->store('logo', 'public');
        Agency::find($this->id)->update([
            'feature_img' => $photoUrl
        ]);
        session()->flash('success', 'Image upload successful');
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.livewire-update-agency-logo');
    }
}
