<?php

namespace App\Helpers;

use App\Enums\ApplicationStatus;
use function Sodium\version_string;

class StatusForPatientsMatcher
{
    public static function cast($status) : string
    {
        $versionForPatients = null;
        switch ($status) {
            case ApplicationStatus::ISSUED :
                $versionForPatients = 'złożony';
                break;
            case ApplicationStatus::PENDING :
                $versionForPatients = 'przetwarzamy';
                break;
            case ApplicationStatus::DONE :
                $versionForPatients = 'odbyty';
                break;
            case ApplicationStatus::SKIPPED :
                $versionForPatients = 'niebyły';
                break;
        }

        return $versionForPatients;
    }
}
