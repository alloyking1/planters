<?php

namespace App\DataTransferObjects;

class PortfolioProjectDto {
    public function __construct(
        public readonly string $portfolio_id,
        public readonly string $name,
        public readonly string $description,
        public readonly string $img,
        public readonly string $link,
    ){
    }

    public static function fromPostRequest(array $formValue, ...$moreValue){
        return new self(
            portfolio_id: $moreValue[0],
            name: $formValue['project_name'] ?? '',
            description: $formValue['about_project'] ?? '',
            img: $formValue['project_img'] ?? '',
            link: $formValue['project_link'] ?? '',
        );
    }
}
