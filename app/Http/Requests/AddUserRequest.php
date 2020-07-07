<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AddUserRequest extends FormRequest
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
    public function rules(Request $request)
    {   
        
        $rules =  [
            
            'name'          => "required",
            'mno'           => "required|numeric|min:10|unique:user",
            'email'         => "required|email|unique:user",
            'birth_date'    => "required",
            'gender'        => "required",
            'qualification' => "required",
            'salary'        => "required|numeric",
            'address'       => "required",
        
        ];

        return $rules;
    }

    public function messages(){

        $messages =  [
            'mno.required'          => 'The mobile number field is required.',
            'mno.numeric'           => 'The mobile number must be a number.',
            'birth_date.required'   => 'The birthdate field is required.',
        ];

        return $messages;
    }
}
