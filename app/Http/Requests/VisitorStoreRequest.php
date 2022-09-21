<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisitorStoreRequest extends FormRequest
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
            //visitor store validation
            // 'apartment_num' => ['required', 'max:255','unique:apartments,apartment_num'],
            'visitor_name' => ['required'],
            'mobile_num' => ['required'],
            'address' => ['required'],
            'gender' => ['required'],
            'apartment_num' => ['required'],
            'whom_to_meet' => ['required'],
            'reason' => ['required']

        ];
    }
     //visitor store validation custom message
     public function messages()
     {
         return[
         'visitor_name.required' => 'Please input visitor name', 
         'mobile_num.required' => 'Please input mobile number',
         'address.required' => 'Please input address',
         'gender.required' => 'Please select a gender', 
         'apartment_num.required' => 'Please select an apartment number',
         'whom_to_meet.required' => 'Please input whom to visit', 
         'reason.required' =>  'Please input reason of visit'
         ];
     } 
}
