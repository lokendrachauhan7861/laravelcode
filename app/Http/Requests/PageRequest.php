<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
        'p_name' => 'required',
        'p_slug' => 'required',
        'description' => 'required',
        'status' => 'required',
    ];
 
}
public function messages()
{
    return [
        'p_name.required' => 'Please Enter Page Name.',
        'p_slug.required' => 'Please Enter Slug Name.',
        'description.required' => 'Please Enter Description.',
        'status.required' => 'Please Select Status.',
    ];
}
}
