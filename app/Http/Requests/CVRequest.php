<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CVRequest extends FormRequest
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
             'txtMssv'=>'required',
            'sltLop'=>'required',
            'txtdiachi'=>'required',
            'txtKiNang'=>'required',
            'txtkinangmem'=>'required',
            'txtTiengAnh'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'txtMssv.required' => 'Vui lòng điền Mssv',
            'sltLop.required' => 'Vui lòng điền lớp',
            'txtdiachi.required' => 'Vui lòng điền địa chỉ',
            'txtKiNang.required' => 'Vui lòng điền ngôn ngữ',
            'txtkinangmem.required' => 'Vui lòng điền kĩ năng mềm',
            'txtTiengAnh.required' => 'Vui lòng điền chứng chỉ ngoại ngữ'
            
            
        ];
    }
}
