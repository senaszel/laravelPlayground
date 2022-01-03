<?php

namespace App\Helpers;

use App\Enums\UserRole;
use App\Enums\UserTitle;

class RoleTitleMatcher
{
    public static function cast($role) : string
    {
        $title = null;
        switch ($role) {
            case UserRole::ADMIN :
                $title = UserTitle::ADMIN;
                break;
            case UserRole::NURSE :
                $title = UserTitle::NURSE;
                break;
            case UserRole::DOCTOR :
                $title = UserTitle::DOCTOR;
                break;
            case UserRole::PATIENT :
                $title = UserTitle::PATIENT;
                break;
        }

        return $title;
    }
}
