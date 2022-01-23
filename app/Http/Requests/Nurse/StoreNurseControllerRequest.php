<?php

namespace App\Http\Requests\Nurse;

use App\Enums\UserRole;
use App\Enums\UserTitle;
use App\Helpers\RoleTitleMatcher;
use Illuminate\Foundation\Http\FormRequest;

class StoreNurseControllerRequest extends FormRequest
{
    /**
     * The route that users should be redirected to if validation fails.
     *
     * @var string
     */
    protected $redirectRoute = 'nurse.create-patient';

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

    public function validated() : array
    {
        $bytes = openssl_random_pseudo_bytes(4);
        $generatedPassword = bin2hex($bytes);

        return array_merge(
            parent::validated(),
            [
                'password' => bcrypt($generatedPassword),
                'role' => UserRole::PATIENT,
                'title' => UserTitle::PATIENT,
            ]);
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
