<?php

namespace App\Enums;

class UserTitle
{
    const NURSE = 'Nurse.';
    const PATIENT = 'Patient.';
    const DOCTOR = 'Doctor.';
    const ADMIN = 'Admin.';

    const TYPES = [
        self::NURSE,
        self::PATIENT,
        self::DOCTOR,
        self::ADMIN,
    ];
}
