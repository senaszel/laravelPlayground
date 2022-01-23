<?php

namespace App\Http\Requests\User;

use App\Helpers\RoleTitleMatcher;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'username' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'role' => ['required'],
        ];
    }

    public function validated()
    {
        return [
            array_merge(
                $this->safe()->except('password'),
                [
                    'title' => RoleTitleMatcher::cast($this->role),
                    'password' => bcrypt($this->password),
                ]
            )
        ];
    }
}
