<?php

namespace App\Http\Requests\Nurse;

use App\Enums\UserRole;
use Illuminate\Foundation\Http\FormRequest;

class StoreNurseControllerRequest extends FormRequest
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
            'username' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'min:7'],
        ];
    }

    /*
     * Get the error messages for the defined validation rules.
    *
    * @return array
    */
    public function messages()
    {
        return [
            'username.required' => 'Nazwa konta jest konieczna do załozenia konta pacjentowi.',
            'username.min' => 'Nazwa konta jest zbyt krótka (min 3 znaki).',
            'username.max' => 'Nazwa konta jest zbyt długa (max 255 znaków).',
            'email.required' => 'email jest konieczny do załozenia konta pacjentowi.',
            'email.min' => 'email jest zbyt krótki (min 3 znaki).',
            'email.email' => 'email musi być poprawnie wprowadzony.',
        ];
    }
}
