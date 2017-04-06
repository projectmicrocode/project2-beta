<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DangKiHDDNRequest;
use App\HuongDanDoanhNghiep;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;
use App\Http\Requests\NopDeCuongRequest;
use App\DeCuong;
use App\Http\Requests;
use App\NhiemVu;



class HDDNController extends Controller
{
    public function postDangKiHddn(DangKiHDDNRequest $request){
    	$id = Auth::id();      
    	$hddn = new HuongDanDoanhNghiep;
    	$hddn->hoten = $request->txtName;
    	$hddn->email = $request->txtEmail;
    	$hddn->password = $request->txtPass;
    	$hddn->phone = $request->txtPhone;
    	$hddn->id_user = $id;
    	$hddn->created_at =  new DateTime();
    	$hddn->save();

    	$user = new User;
    	$user->name = $request->txtName;
    	$user->email = $request->txtEmail;
    	$user->password = bcrypt($request->txtPass);
    	$user->id_doituong = 5;
        $user->tinhtrang = 0;
        $user->phancong = 0;
    	$user->created_at =  new DateTime();
    	$user->save();

    	return redirect()->route('getChitiethddn')->with('status', 'Thêm Thành Công!');
    }
    public function getChitiethddn(){
    	$id = Auth::id(); 
        $data = DB::table('huongdandoanhnghiep')
                ->join('users','users.id','=','huongdandoanhnghiep.id_user')
                ->where('huongdandoanhnghiep.id_user','=',$id)
                ->select('huongdandoanhnghiep.*','users.name')
                ->paginate(2);
        // return $data; 
        return view('layouts/congty/dangkihuongdanhdoanhnghiep',['data'=>$data]);
    }
    public function getchitietdecuong(){
        $id = Auth::id();
        $hddnname = DB::table('users')->where('id',$id)->select('name')->get();
        foreach ($hddnname as  $value) {
            $name = $value->name;
        }
        
        $id_sv =  DB::table('phancong')->where('hotenhddn',$name)->select('id_user_sv')->get();
        foreach ($id_sv as $value) {
            $data[] = DB::table('users')->where('id',$value->id_user_sv)->select('name')->get();
        }
        $datanhiemvu = DB::table('nhiemvu')->where('id_user',$id)->select('*')->get();
        // return $datanhiemvu;

        return view('layouts/huongdandoanhnghiep/nopdecuongchitiet',['data'=>$data,'datanhiemvu'=>$datanhiemvu]);
    }
    public function postnopdecuong(Request $request){
        $id = Auth::id();
        if($request->sltSV == '0'){
            return redirect()->route('getchitietdecuong')->with('status', 'Gửi Thất Bại! Vui Lòng Chọn Sinh Viên Thực Tập');
        }else
        {
            $nhiemvu = new NhiemVu;
            $nhiemvu->noidungcv = $request->txtnoidung;
            $nhiemvu->yeucaudaura = $request->txtyeucaudaura;
            $nhiemvu->thoigianbatdau = $request->txtthoigianbatdau;
            $nhiemvu->thoigianketthuc = $request->txtthoigianketthuc;
            $nhiemvu->tensvthuctap = $request->sltSV;
            $nhiemvu->id_user = $id;
            $nhiemvu->created_at = new DateTime();
            $nhiemvu->save();
            return redirect()->route('getchitietdecuong')->with('status', 'Gửi Thành Công!');
        }

        
    }
}
