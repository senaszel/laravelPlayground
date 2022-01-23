<?php

namespace App\Http\Requests\User;

use App\Helpers\RoleTitleMatcher;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class StoreUserControllerRequest extends FormRequest
{
    /**
     * The route that users should be redirected to if validation fails.
     *
     * @var string
     */
    protected $redirectRoute = 'create-user';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'username' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'role' => ['required'],
        ];
    }

    public function validated() : array
    {
        return array_merge(
            Arr::except(parent::validated(), 'password'),
            [
                'password' => bcrypt($this->password),
                'title' => RoleTitleMatcher::cast($this->role),
            ]);
    }
}
