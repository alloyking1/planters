<?php
namespace App\Enums;

enum ProjectSizeEnum: string 
{
    case Micro = '$1,000';
    case Small = '$10,000';
    case Medium = '$25,000';
    case Large = '$50,000';
    case Enterprise = '$100,000';
}