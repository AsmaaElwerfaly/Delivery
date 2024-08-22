<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBranchRequest extends FormRequest
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
 
 
             'branche_name' => 'required|regex:/^[\p{Arabic}\p{Latin} ]+$/u',
             'code' => 'required',
             'password' => 'required',
 
         ];
     }
 
 
 
     public function messages(): array
     {
         return [
 
            'branche_name.required' => 'يجب إدخال  اسم الفرع',
            'branche_name.regex' => ' يجب إدخال اسم الفرع  نص',


            'code.required' => 'يجب إدخال الكود ',
            'password.required' => 'يجب إدخال كلمة السر ',

 
 
         ];
     }
 }
 
