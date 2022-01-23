<?php

namespace App\Http\Requests\User;

use App\Helpers\RoleTitleMatcher;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class UpdateUserControllerRequest extends FormRequest
{
    /**
     * The route that users should be redirected to if validation fails.
     *
     * @var string
     */
    protected $redirectRoute = 'edit-user';

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
        return array_merge(
            Arr::except(parent::validated(),'password'),
            [
                'password' => bcrypt($this->password),
                'title' => RoleTitleMatcher::cast($this->role),
            ]
        );
    }
}
