<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeSubject extends FormRequest
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
            'name' => 'required',
            'max_mark' => 'required',
            'min_mark' => 'required',
            'class_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'Name.required' => trans('validation.required'),

        ];
    }
}