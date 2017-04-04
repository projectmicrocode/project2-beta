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
use App\NguyenVong;
use Excel;
use App\PhanCong;


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
        $user->phancong = 0;
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
        $id = Auth::id();
        $data = DB::table('cv')->where('id_user',$id)->select('*')->get();


        return view('layouts/sinhvien/cv',['data'=>$data]);
    }
    public function getdangkinguyenvong(){
        $id = Auth::id();
        $data = DB::table('detai')
        ->join('users','users.id','=','detai.id_user')
        ->where('detai.tinhtrang',1)
        ->select('detai.*','users.name')->get();
        // return $data;
        $datanv = DB::table('nguyenvong')->where('id_user',$id)->select('*')->get();
        
        // return view('layouts/congty/dangkisinhvientructiep',['data'=>$data]);
         return view('layouts/sinhvien/dangkinguyenvong',['data'=>$data,'datanv'=>$datanv]);
    }
    public function postthemnguyenvong(Request $request){

        $id = Auth::id();
       

        
        if($request->nguyenvong1 =='0'){
                return redirect()->route('getdangkinguyenvong')->with('status', 'Đăng Kí Thất Bại! Bạn Phải Đăng Kí Nguyện Vọng 1');
            }
            else if($request->nguyenvong1 == $request->nguyenvong2 
                    || $request->nguyenvong1 == $request->nguyenvong3
                    ){
                return redirect()->route('getdangkinguyenvong')->with('status', 'Tồn Tại Hai Nguyện Vọng Trùng Nhau');
            }
            else if($request->nguyenvong1 !='0' && $request->nguyenvong2 == $request->nguyenvong3 && $request->nguyenvong2 != '0'&& $request->nguyenvong3!='0'){
                return redirect()->route('getdangkinguyenvong')->with('status', 'Tồn Tại Hai Nguyện Vọng Trùng Nhau');
            }
            else if($request->nguyenvong2 == '0'&& $request->nguyenvong3=='0'){
                $nguyenvong = new NguyenVong;
                $nguyenvong->nguyenvong1 = $request->nguyenvong1;
                $nguyenvong->id_user = $id;
                $nguyenvong->created_at = new DateTime();
                $nguyenvong->save();
                return redirect()->route('getdangkinguyenvong')->with('status', 'Thêm Thành Công');
            }
            else {
                 $nguyenvong = new NguyenVong;
                 $nguyenvong->nguyenvong1 = $request->nguyenvong1;
                 $nguyenvong->nguyenvong2 = $request->nguyenvong2;
                 $nguyenvong->nguyenvong3 = $request->nguyenvong3;
                $nguyenvong->id_user = $id;
                 $nguyenvong->created_at = new DateTime();
                 $nguyenvong->save();
                 return redirect()->route('getdangkinguyenvong')->with('status', 'Thêm Thành Công');
            }
               
        
           
       
        
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
        return redirect()->route('getdiencv')->with('status', 'Thêm Thành Công!');
    }
    public function getdanhsachsinhvienphancong(){
        $id = Auth::id();
         $data = DB::table('users')
        ->select('users.*')->get();
        $datahddn = DB::table('huongdandoanhnghiep')->where('id_user',$id)->select('hoten')->get();
        $dataphancong = DB::table('phancong')->select('*')->get();
        
        
        // return $datasv;
        return view('layouts/congty/phancongsinhvien',['data'=>$data,'datahddn'=>$datahddn,'dataphancong'=>$dataphancong]);
    }
    public function postchonhddn(Request $request,$id){
        if($request->sltHddn == '0'){
            return redirect()->back()->with('status', 'Lỗi! Phải Chọn Người Hướng Dẫn Doanh Nghiệp');
        }else
        {
           
            $phancong = new PhanCong;
            $phancong->id_user_sv = $id;
            $phancong->hotenhddn= $request->sltHddn;
            $phancong->created_at = new DateTime();
            $phancong->save();

            DB::table('users')->where('id',$id)->update(['phancong'=>1]);
            return redirect()->route('getdanhsachsinhvienphancong')->with('status', 'Phân Công Thành Công!');
        }
        
        
       
    }
    public function postxuatcv($id){
        $cv = CV::select('ten','mssv','diachi','kinang','kinangmem','ngoaingu')->where('id_user',$id)->get();
        foreach ($cv as $value) {
           $name =  $value->ten;
           $mssv = $value->mssv;
        }
        $filename = $name."_".$mssv;
             
        Excel::create( $filename,function($excel)use($cv)
            {
                $excel->sheet('sinhvien',function($sheet)use($cv)
                    {           
                        $sheet->mergeCells('A2:F3');           
                        $data = array(array('CV SINH VIEN'),
                        array(''));
                        $sheet->fromArray($data);
                        $sheet->cell('A2',function($cell){
                        $cell->setAlignment('center');
                        $cell->setValignment('center');
                        $cell->setFont(array(
                            'size'       => '16',
                            'bold'       =>  true
                            ));
                        }); 
                        $sheet->fromArray($cv);          
                    }
                );
            }
         ) ->export('xls');
        
    }
}
