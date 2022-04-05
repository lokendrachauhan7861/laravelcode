<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
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
        'author_name' => 'required',
        'description' => 'required',
        'status' => 'required',
    ];
 
}
public function messages()
{
    return [
        'name.required' => 'Please Enter Testimonial Name.',
        'author_name.required' => 'Please Enter Author Name.',
        'description.required' => 'Please Enter Description.',
        'status.required' => 'Please Select Status.',
    ];
}
}
