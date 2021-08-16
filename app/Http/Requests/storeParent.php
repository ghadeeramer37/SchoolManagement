<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeParent extends FormRequest
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
            'father_name' => 'required',
            'mother_name' => 'required',
            'user_id' => 'required',
            'father_phone' => 'required',
            'mother_phone' => 'required',
            'parent_email' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'Name.required' => trans('validation.required'),

        ];
    }
}
