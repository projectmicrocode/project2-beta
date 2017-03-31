<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NopBaoCaoRequest extends FormRequest
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
            'chonFile'=>'required',
            'hinhthuc'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'chonFile.required' => 'Vui lòng chọn File',
            'hinhthuc.required' => 'Vui lòng chọn hình thức'
            
            
        ];
    }
}
