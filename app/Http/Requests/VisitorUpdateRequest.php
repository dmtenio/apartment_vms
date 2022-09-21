<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisitorUpdateRequest extends FormRequest
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
            //visitor update validation
            // 'apartment_num' => ['required', 'max:255','unique:apartments,apartment_num,'.$this->apartment->id],
            'remarks' => ['required']
        ];
    }
      //visitor update validation custom message
      public function messages()
      {
          return[
          'remarks.required' => 'Please input a remark', 
         ];
      } 
}
