<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;
use App\Services\Job\JobPostingService;
use App\DataTransferObjects\JobPostingDto;
use App\Models\JobPosting;

class CreateJobForm extends Form
{
    use WithFileUploads;

    #[Validate('required|string|min:5')]
    public $company_name = '';

    #[Validate('required|string|min:5')]
    public $title = '';
    #[Validate('required|string|min:5')]
    public $contract = '';
    #[Validate('required|string|min:5')]
    public $location = '';


    #[Validate('required|string|min:5')]
    public $description = '';
    #[Validate('required|string|min:5')]
    public $about_company ='';
    #[Validate('required|string|min:2')]
    public $salary ='';
    #[Validate('required|string|min:5')]
    public $application_link ='';
    #[Validate('nullable|sometimes|image|max:1024')]
    public $logo = '';
    #[Validate('required|array|max:1024')]
    public $selectedOptions = [];

    public function setValue(JobPosting $jobPosting)
    {
        $this->jobPosting = $jobPosting; //remove later
        $this->company_name = $jobPosting->company_name;

        $this->title = $jobPosting->title;
        $this->contract = $jobPosting->contract;
        $this->location = $jobPosting->location;

        $this->description = $jobPosting->description;
        $this->type = $jobPosting->type;
        $this->about_company = $jobPosting->about_company;
        $this->salary = $jobPosting->salary;
        $this->application_link = $jobPosting->application_link;
    }

    public function store($id = NULL, $logo = NULL) 
    {
        $this->validate();
        if($id === NULL){
            $imgPath = $this->imgUpload(); //move into a trait
        }else{
            $this->logo = $logo;
        }

        $agencyService = new JobPostingService();
        $agencyService->create(JobPostingDto::fromPostRequest($this->all()), $id);
        $this->reset(); 
    }

    public function imgUpload(){
        return $this->logo = $this->logo->store('logo', 'public');
        
    }
}
