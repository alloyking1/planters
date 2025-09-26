<?php 
namespace App\Enums;

enum TeamSizeEnum: string 
{
    case Micro = '1-9 employees';
    case Small = '10-50 employees';
    case Medium = '51-250 employees';
    case Large = '251-500 employees';
    case Enterprise = '501+ employees';
}