<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangKiDeTaiRequest extends FormRequest
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
            'numSV'=>'required',
            'txtKiNang'=>'required',
            'txtNoiDung'=>'required',
            'txtTiengAnh'=>'required'
            
        ];
    }
    public function messages()
    {
        return [
            'txtName.required' => 'Vui lòng nhập tên đề tài',
            // 'txtName.unique'  => 'Đề tài đã tồn tại',
            'numSV.required'=>'Vui lòng nhập số lượng sinh viên nhận',
            'txtKiNang.required'=>'Vui lòng nhập yêu cầu ngôn ngữ',
            // 'txtDinhHuong.required'=>'Vui lòng nhập định hướng',
            'txtTiengAnh.required'=>'Vui lòng nhập chứng chỉ ielts',
            'txtNoiDung.required'=>'Vui lòng nhập nội dung công việc'
        ];
    }
}
