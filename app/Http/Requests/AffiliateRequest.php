<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class AffiliateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string|min:3',
            'last_name'=>'required|string',
            'email'=>'required|email|unique:affiliates',
            'country'=>'required|string|min:2',
            'ip_address'=>'required|string',
            'phone'=>'required|string',
            'external_id'=>'required|string',
        ];
    }
    public function failedValidation(Validator $validator)
    {
     throw new HttpResponseException(response()->json([
       'success'   => false,
       'message'   => 'Validation errors',
       'data'      => $validator->errors()
   ]));

 }

}
