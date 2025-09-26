<?php
namespace App\Services\Job;
use App\Models\JobPosting;
use App\DataTransferObjects\JobPostingDto;

class JobPostingService {

    public function create(JobPostingDto $jobDto, $id = NULL){
        $job = JobPosting::updateOrCreate([
            'id' => $id
        ],[
            'user_id' => $jobDto->user_id,
            'company_name' =>  $jobDto->company_name,
            'title' =>  $jobDto->title,
            'contract' =>  $jobDto->contract,
            'location' =>  $jobDto->location,
            'description' =>  $jobDto->description,
            'about_company' =>  $jobDto->about_company,
            'salary' =>  $jobDto->salary,
            'application_link' =>  $jobDto->application_link,
            'logo' =>  $jobDto->logo,
        ]);

        $skillsCollection = collect($jobDto->skills);
        $skillsId = $skillsCollection->pluck('id')->all();

        $job->skills()->sync($skillsId);
        return $job;
    }

    public function find($id){
        return  JobPosting::find($id);
    }

    public function delete($id){
        $job = JobPosting::find($id);
        $job->delete();
        return $job;
    }

    public function all(){
       return JobPosting::with('skills')->orderBy('created_at', 'desc')->get();
    }

    public function recentJobs($limit){
        return JobPosting::latest()->limit($limit)->get();
    }
}