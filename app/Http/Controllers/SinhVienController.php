<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SinhVien;
use App\User;
use App\Http\Requests;
use DateTime;
use App\DeTai;
use App\File;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\NguyenVongRequest;
use App\Http\Requests\NopBaoCaoRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CVRequest;
use App\CV;


class SinhVienController extends Controller
{
    public function getDanhSachSVjson(){
    	return SinhVien::orderBy('id','DESC')->get();
    }
    public function postThemSinhVien(Request $request){

    	$sinhvien = new SinhVien;
    	$sinhvien->hoten = $request->name;
    	$sinhvien->mssv = $request->txtMssv;
    	$sinhvien->email = $request->txtMssv."@student.hust.edu.vn";
    	$sinhvien->lop = $request->sltCate;
        $sinhvien->tinhtrang = 0;
    	$sinhvien->created_at = new DateTime();
    	$sinhvien->save();

    	$user = new User;
    	$user->name = $request->name;
    	$user->email = $request->txtMssv."@student.hust.edu.vn";
    	$user->password = bcrypt($request->txtMssv);
    	$user->id_doituong = 1;
        $user->tinhtrang = 0;
    	$user->created_at =  new DateTime();
    	$user->save();
    }
     public function getEditSV($id){
        return SinhVien::findOrFail($id);
    }
    public function postEditSV(){
       
        $sinhvien = SinhVien::findOrFail($id);
        $sinhvien = new SinhVien;
        $sinhvien->hoten = $request->name;
        $sinhvien->mssv = $request->txtMssv;
        $sinhvien->email = $request->txtMssv."@student.hust.edu.vn";
        $sinhvien->lop = $request->sltCate;

        $sinhvien->updated_at = new DateTime();
        $sinhvien->save();
        return "Sửa Thành Công";

        // DB::table('sinhvien')
        // 	->where('id',$id)
        // 	->update([
        // 			['hoten'=>$request->name]
        // 			// ['updated_ad'=>new DateTime()]
        // 		]);

        return "data";
    }
     public function getDelete($id){
        $sinhvien = SinhVien::findOrFail($id);
        $sinhvien->delete();

        
        
        return "Xóa Thành Công";
    }
    public function getdanhsachsinhvienchoduyet(){
        $data = DB::table('users')
        ->select('users.*')->get();
        // return $data;
        return view('layouts/giangvienphutrach/danhsachsinhvienchoduyet',['data'=>$data]);
    }
    public function postduyetsinhvien($id){
        // return $id;
            DB::table('users')->where('id',$id)->update(['tinhtrang'=>1]);
        return redirect()->route('getdanhsachsinhvienchoduyet');
    }
    public function getdiencv(){
        return view('layouts/sinhvien/cv');
    }
    public function getdangkinguyenvong(){
        $data = DB::table('detai')
        ->join('users','users.id','=','detai.id_user')
        ->where('detai.tinhtrang',1)
        ->select('detai.*','users.name')->get();
        // return $data;
        
        // return view('layouts/congty/dangkisinhvientructiep',['data'=>$data]);
         return view('layouts/sinhvien/dangkinguyenvong',['data'=>$data]);
    }
    public function postthemnguyenvong(NguyenVongRequest $request){

        
   
        
    }
    public function getnopbaocao(){
        return view('layouts/sinhvien/nopbaocao');
    }
    public function postnopbaocao(NopBaoCaoRequest $request){
            $id = Auth::id();
        
            $name =$request->file('chonFile')->getClientOriginalName();
            $request->file('chonFile')->move('../storage/baocao',$name);
            $file = new File;
            $file->tenfile = $request->file('chonFile')->getClientOriginalName();
            $file->hinhthuc = $request->hinhthuc;
             $file->id_user = $id;
            $file->created_at = new DateTime;

            $file->save();
            return redirect()->route('getdanhsachbaocaodanop');
            
      
    }
    public function getdanhsachbaocaodanop(){
        $id = Auth::id();
        $data =  DB::table('file')
                ->join('users','users.id','=','file.id_user')
                ->where('users.id',$id)
                ->select('file.*','users.name')
                ->get();
        return view('layouts/sinhvien/nopbaocao',['data'=>$data]);
    }
    public function postthemcv(CVRequest $request){
        $data = Auth::user();

        $name = $data->name;
        $cv = new CV;
        $cv->ten = $name;
        $cv->mssv = $request->txtMssv;
        $cv->lop = $request->sltLop;
        $cv->diachi = $request->txtdiachi;
        $cv->kinang = $request->txtKiNang;
        $cv->kinangmem = $request->txtkinangmem;
        $cv->ngoaingu = $request->txtTiengAnh;
        $cv->id_user = $data->id;
        $cv->created_at = new DateTime();
        $cv->save();
        return "gửi thành công!";
    }
}
