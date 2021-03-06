<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangKiSinhVienDacBietRequest extends FormRequest
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
            
            'txtName'=>'required',
            'txtEmail'=>'required|unique:sinhviendacbiet,email',
            'sltDeTai'=>'required',
            
            
        ];
      
    }
    public function messages()
    {
        return [
            'txtName.required' => 'Vui lòng nhập họ tên',
            // 'txtName.unique'  => 'Đề tài đã tồn tại',
            'txtEmail.required'=>'Vui lòng nhập email',
            'txtEmail.unique'=>'Email đã tồn tại',
            // 'txtDinhHuong.required'=>'Vui lòng nhập định hướng',
            
           
        ];
    }
}
