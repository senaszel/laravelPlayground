<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $id)
 */
class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'vaccine_id',
        'doctor_id',
        'status',
        'date_vaccination',
    ];
}
