<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NopDeCuongRequest extends FormRequest
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
           'chondecuong'=>'required'
            
        ];
    }
    public function messages()
    {
        return [
            'chondecuong.required' => 'Vui lòng chọn File'
            
            
            
        ];
    }
}
