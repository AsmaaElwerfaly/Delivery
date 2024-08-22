<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateRepresentRequest extends FormRequest
{
    
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
 
 
             'name_represent' => 'required|regex:/^[\p{Arabic}\p{Latin} ]+$/u',
             'branche_name' => 'required',
             'code' => 'required',
             'password' => 'required',
 
         ];
     }
 
 
 
     public function messages(): array
     {
         return [
 
             'name_represent.required' => 'يجب إدخال  اسم المندوب',
             'name_represent.regex' => ' يجب إدخال اسم المندوب  نص',
 
             'branche_name.required' => 'يجب اختيار الفرع   ',
  
             'code.required' => 'يجب إدخال الكود ',
             'password.required' => 'يجب إدخال كلمة السر ',

 
         ];
     }
}
