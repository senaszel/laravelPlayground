<?php

namespace App\Enums;

class UserRole
{
    const NURSE = 'NURSE';
    const PATIENT = 'PATIENT';
    const DOCTOR = 'DOCTOR';
    const ADMIN = 'ADMIN';

    const TYPES = [
        self::NURSE,
        self::PATIENT,
        self::DOCTOR,
        self::ADMIN,
    ];
}
