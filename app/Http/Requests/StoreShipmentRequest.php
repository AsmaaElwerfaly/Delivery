<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShipmentRequest extends FormRequest
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
 
 
             'customer_name' => 'required|regex:/^[\p{Arabic}\p{Latin} ]+$/u',
             'customer_code'=>'required',
             'sender_name' => 'required|regex:/^[\p{Arabic}\p{Latin} ]+$/u',
             'represent_name' => 'required|regex:/^[\p{Arabic}\p{Latin} ]+$/u',
             'sender_num'=>'required|string|regex:/^[0-9]+$/|digits:10|', 
             'represent_num'=>'required|string|regex:/^[0-9]+$/|digits:10|', 

             'openable' => 'required',
             'condition_cargo' => 'required',
             'count_cargo' => 'required',
             'balance_cargo' => 'required|numeric',
             'balance_commossion' => 'required|numeric',
             'balance_order' => 'required|numeric',

             'cargo_code' => 'required',
             'city' => 'required|regex:/^[\p{Arabic}\p{Latin} ]+$/u',
             'part' => 'required|regex:/^[\p{Arabic}\p{Latin} ]+$/u',
             'city_code' => 'required',
             'branche_id' => 'required',

         ];
     }
 
 
 
     public function messages(): array
     {
         return [
 
            'customer_name.required' => 'يجب إدخال  اسم العميل',
            'customer_name.regex' => ' يجب إدخال اسم العميل  نص',
            'customer_code.required' => 'يجب إدخال الكود ',
            'sender_name.required' => 'يجب إدخال  اسم المرسل',
            'sender_name.regex' => ' يجب إدخال اسم المرسل  نص',
            'represent_name.required' => 'يجب إدخال  اسم المستلم',
            'represent_name.regex' => ' يجب إدخال اسم المستلم  نص',

            'sender_num.required'=>'يجب إدخال رقم الهاتف',   
            'sender_num.digits'=>'يجب ادخال  رقم الهاتف 10 ارقام', 
            'sender_num.regex'=>' يجب إدخال رقم الهاتف كرقم ',         

            'represent_num.required'=>'يجب إدخال رقم الهاتف',   
            'represent_num.digits'=>'يجب ادخال  رقم الهاتف 10 ارقام', 
            'represent_num.regex'=>' يجب إدخال رقم الهاتف كرقم ',  

            'openable.required' => 'يجب إختيار نعم/لا ',

            'condition_cargo.required' => 'يجب إختيار  حالة الطرد',
            'count_cargo.required' => 'يجب إدخال عدد الطرود ',


            'branche_id.required' => 'يجب اختيار الفرع   ',
 
            'balance_cargo.required' => 'يجب إدخال  رصيد البضائع ',
            'balance_cargo.numeric'=>'يجب إدخال الرصيد كرقم ',         

            'balance_commossion.required' => 'يجب إدخال  رصيد العموله ',
            'balance_commossion.numeric'=>'يجب إدخال الرصيد كرقم ',  

            'balance_order.required' => 'يجب إدخال  رصيد الطلب ',
            'balance_order.numeric'=>'يجب إدخال الرصيد كرقم ', 

            'cargo_code.required' => 'يجب إدخال كود الطرد ',

            'city.required' => ' يجب إدخال  اسم المدينة',
            'city.regex' => ' يجب إدخال اسم المدينة  نص',

            'part.required' => ' يجب إدخال  اسم المنطقة',
            'part.regex' => ' يجب إدخال اسم المنطقة  نص',

            'city_code.required' => 'يجب إدخال كود المدينة ',

 
         ];
     }
 }
 
