<?php

namespace App\Enums;

class ApplicationStatus
{
    const ISSUED = 'issued';
    const PENDING = 'pending';
    const DONE = 'done';
    const SKIPPED = 'skipped';

    const TYPES = [
        self::ISSUED,
        self::PENDING,
        self::DONE,
        self::SKIPPED,
    ];
}
