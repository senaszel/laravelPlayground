<?php

namespace App\Helpers;

use App\Models\Vaccine;

class VaccName
{
    public static function getById($id) {
        $vacc = Vaccine::where('id', $id)->first();
        return $vacc->name;
    }
}
