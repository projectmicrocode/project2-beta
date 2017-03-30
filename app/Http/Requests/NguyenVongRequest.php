<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NguyenVongRequest extends FormRequest
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
           'nguyenvong1'=>'required',
            'nguyenvong1'!='--- Nguyện Vọng ---"' =>'notequal'
            
        ];
    }
    ublic function messages()
    {
        return [
            'txtName.required' => 'Vui lòng nhập họ tên',
            // 'txtName.unique'  => 'Đề tài đã tồn tại',
            'txtMssv.required'=>'Vui lòng nhập email',
            'txtMssv.unique'=>'mssv đã tồn tại',
            // 'txtDinhHuong.required'=>'Vui lòng nhập định hướng',
            
           
        ];
    }
}
