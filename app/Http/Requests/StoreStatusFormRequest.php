<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStatusFormRequest extends FormRequest
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
            'name'              =>  'required',
            'order_index'       =>  'required| max:3',
            'color'             =>  'required',
            'color_alt_1'       =>  'required',
            'color_alt_2'       =>  'required',
            'default'           =>  'required | max:1',
        ];

    }

    public function messages(){
        return [
            'name.required'         => 'Please enter Name information',
            'order_index.required'  => 'Please enter Order Index information',
            'order_index.max'       => 'Only 3 characters are allowed',
            'color.required'        => 'Please enter Color information',
            'color_alt_1.required'  => 'Please enter Color Alt 1 information',
            'color_alt_2.required'  => 'Please enter Color Alt 2 information',
            'default.required'      => 'Please enter Default information',
            'default.max'           => 'Only 1 character can be entered',
            'icon_url.required'     => 'Please enter Icon information',
            'icon_url.mimes'        => 'Invalid image extension',
        ];
    }
}
