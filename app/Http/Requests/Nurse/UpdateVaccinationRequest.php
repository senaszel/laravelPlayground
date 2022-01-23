<?php

namespace App\Http\Requests\Nurse;

use App\Enums\ApplicationStatus;
use Illuminate\Foundation\Http\FormRequest;


class UpdateVaccinationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'doctor_id' => ['required', 'exists:users,id'],
            'date_vaccination' => ['required', 'date'],
        ];
    }

    public function validated()
    {
        return array_merge(
            parent::validated(),
            [
                'status' => ApplicationStatus::PENDING,
                'updated_at' => now(),
            ]
        );
    }
}
