<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
                       
            'IDno' => 'required  | integer | min:1 | max:99',
            'name'=> 'required | regex:/^[a-zA-Z]+((\s)*[a-zA-Z])*+$/u | min:3 | max:25',
            'age' => 'integer | min:18 | max:26'
            // ,[
            //     'IDno.required' => "IDno is required, don't miss it" 
            // ]
        
        ];
    }
}
