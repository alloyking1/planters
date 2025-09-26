<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Services\Agency\AgencyService;
use App\DataTransferObjects\AgencyDto;
use App\Models\Agency;
use Livewire\WithFileUploads;

class CreateAgentForm extends Form
{
    use WithFileUploads;

    #[Validate('required|string|min:5')]
    public $name = '';
    #[Validate('required|email|min:5')]
    public $email = '';
    #[Validate('required|string|min:5')]
    public $type ='';
    #[Validate('required|string|min:2')]
    public $headquarters ='';
    #[Validate('required|string|min:5')]
    public $size ='';
    #[Validate('required|string|min:5')]
    public $project_size ='';
    #[Validate('required|string|min:5')]
    public $website ='';
    #[Validate('sometimes|string|min:5')]
    public $video = '';
    #[Validate('nullable|sometimes|image|max:1024')]
    public $feature_img = '';
    #[Validate('required|string|min:5')]
    public $short_description ='';
    #[Validate('required|string|min:5')]
    public $about_company ='';
    #[Validate('string|max:1024')]
    public $logo = '';
    #[Validate('required|array|max:1024')]
    public $selectedOptions = [];

    public ?Agency $agency;

    public function setValue(Agency $agency)
    {
        $this->agency = $agency; //remove later
        $this->name = $agency->name;
        $this->email = $agency->email;
        $this->type = $agency->type;
        $this->headquarters = $agency->headquarters;
        $this->size = $agency->size;
        $this->project_size = $agency->project_size;
        $this->website = $agency->website;
        $this->video = $agency->video;
        // $this->feature_img = $agency->feature_img;
        $this->short_description = $agency->short_description;
        $this->about_company = $agency->about_company;
        $this->logo = $agency->logo;
    }

    public function store($id = NULL, $featuredImg = NULL) 
    {
        $this->validate();
        if($id === NULL){
            $imgPath = $this->imgUpload(); //move into a trait
        }else{
            $this->feature_img = $featuredImg;
        }
        $agencyService = new AgencyService();
        $agencyService->create(AgencyDto::fromPostRequest($this->all()), $id);

        $this->reset(); 
    }

    public function imgUpload(){
        return $this->feature_img = $this->feature_img->store('logo', 'public');
        
    }
}
