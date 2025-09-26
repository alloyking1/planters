<?php

namespace App\DataTransferObjects;

class PortfolioDto {
    public function __construct(
        public readonly string $user_id,
        public readonly string $url,
        public readonly string $greeting,
        public readonly string $about_you,
        public readonly string $linkedin,
        public readonly string $twitter,
        public readonly string $github,
        public readonly array $skills,
    ){
    }

    public static function fromPostRequest(array $formValue, ...$moreValue){
        return new self(
            user_id: auth()->user()->id,
            url: $formValue['url'] ?? '',
            greeting: $formValue['greeting'] ?? '',
            about_you: $formValue['about_you'] ?? '',
            linkedin: $formValue['linkedin'] ?? '',
            twitter: $formValue['twitter'] ?? '',
            github: $formValue['github'] ?? '',
            skills: array_map('trim', explode(',',$formValue['skills'])) ?? '',
        );
    }
}
