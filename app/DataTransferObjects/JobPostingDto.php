<?php

namespace App\DataTransferObjects;

class JobPostingDto {
    public function __construct(
        public readonly string $user_id,

        public readonly string $company_name,

        public readonly string $title,
        public readonly string $contract,
        public readonly string $location,

        public readonly string $description,
        public readonly string $about_company,
        public readonly string $salary,
        public readonly string $application_link,
        public readonly array $skills,
        public readonly string $logo,
    ){
    }

    public static function fromPostRequest(array $formValue, ...$moreValue){
        return new self(
            user_id: auth()->user()->id,
            company_name: $formValue['company_name'],
            title: $formValue['title'],
            contract: $formValue['contract'],
            location: $formValue['location'],
            
            description: $formValue['description'],
            about_company: $formValue['about_company'],
            salary: $formValue['salary'],
            application_link: $formValue['application_link'],
            skills: $formValue['selectedOptions'] ?? '',
            logo: $formValue['logo'],
        );
    }
}