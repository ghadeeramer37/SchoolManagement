<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeStudent extends FormRequest
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
            'my_parent_id' => 'required',
            'user_id' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'Name.required' => trans('validation.required'),

        ];
    }
}