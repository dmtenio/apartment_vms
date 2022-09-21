<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApartmentUpdateRequest extends FormRequest
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
            //apartment update validation
            'apartment_num' => ['required', 'max:255','unique:apartments,apartment_num,'.$this->apartment->id],
            'building_num' => ['required'],
            'status' => ['required']
        ];
    }
     //apartment update validation custom message
     public function messages()
     {
         return[
         'apartment_num.required' => 'Please input an apartment number', 
         'apartment_num.unique' => 'Apartment number is already taken',
         'building_num.required' => 'Please select a building number',
         'status.required' => 'Please select a status',
        ];
     } 
}
