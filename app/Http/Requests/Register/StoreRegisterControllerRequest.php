<?php

namespace App\Http\Requests\Register;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class StoreRegisterControllerRequest extends FormRequest
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
            'username' => ['bail', 'required', 'min:3,', 'max:15'],
            'email' => ['bail', 'required', 'unique:users', 'email', 'min:9', 'max:255'],
            'password' => ['bail', 'required', 'min:7', 'max:255']
        ];
    }

    public function validated()
    {
        return array_merge(
            Arr::except(parent::validated(), 'password'),
            [
                'password' => bcrypt($this->password),
            ]
        );
    }
}
