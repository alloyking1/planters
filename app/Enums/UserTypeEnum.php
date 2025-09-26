<?php

namespace App\Enums;

enum UserTypeEnum : string {
    case Admin = 'admin' ;
    case Author = 'author' ;
    case Guest = 'guest' ;
}
