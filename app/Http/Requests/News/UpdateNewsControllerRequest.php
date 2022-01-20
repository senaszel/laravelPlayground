<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateNewsControllerRequest extends FormRequest
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
            'title' => ['required', 'max:150'],
            'description' => ['required', 'max:150'],
            'content' => ['required', 'max:2000'],
        ];
    }

    public function validated() : array
    {
        return array_merge(parent::validated(), [
            'author' => $this->author ?? Auth::user()->username,
            'publisher_id' => Auth::user()->id,
        ]);
    }
}
