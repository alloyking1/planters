<?php

namespace App\DataTransferObjects;

class AgencyDto {
    public function __construct(
        public readonly string $user_id,
        public readonly string $name,
        public readonly string $email,
        public readonly string $type,
        public readonly string $headquarters,
        public readonly string $size,
        public readonly string $project_size,
        public readonly string $website,
        public readonly string $video = '',
        public readonly string $feature_img = '',
        public readonly string $short_description,
        public readonly string $about_company,
        public readonly string $about_video = '',
        public readonly array $skills,
        public readonly string $logo = '',
    ){
    }

    public static function fromPostRequest(array $formValue, ...$moreValue){
        return new self(
            user_id: auth()->user()->id,
            name: $formValue['name'],
            email: $formValue['email'],
            type: $formValue['type'],
            headquarters: $formValue['headquarters'],
            size: $formValue['size'],
            project_size: $formValue['project_size'],
            website: $formValue['website'],
            video: $formValue['video'] ?? '',
            feature_img: $formValue['feature_img'] ?? '',
            short_description: $formValue['short_description'],
            about_company: $formValue['about_company'],
            about_video: $formValue['about_video'] ?? '',
            skills: $formValue['selectedOptions'] ?? '',
            logo: $formValue['logo'],
        );
    }
}