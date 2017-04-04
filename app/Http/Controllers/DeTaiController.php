<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DangKiDeTaiRequest;
use Illuminate\Support\Facades\Auth;
use App\DeTai;
use App\User;
use DateTime;
use Illuminate\Support\Facades\DB;
use App\DeadLine;
use Carbon\Carbon;

class DeTaiController extends Controller
{
    public function postThemDeTai(DangKiDeTaiRequest $request){
        $id = Auth::id(); 
        $datatime = DB::table('deadline')->select('thoigian')->get();
        foreach ($datatime as $value) {
           $time = $value->thoigian;
        }
       
        $dateLocale = Carbon::createFromFormat('d-m-Y H:i:s',$time);
        $dt = $dateLocale->timestamp;
        $thoiGianHienTai = Carbon::now();
        $dtht = $thoiGianHienTai->timestamp;
       
         if($dtht < $dt){
        $detai = new DeTai;
        $detai->tendetai = $request->txtName;
        $detai->soluong = $request->numSV;
        $detai->ngonngu = $request->txtKiNang;
        $detai->noidungcv = $request->txtNoiDung;
        $detai->tienganh = $request->txtTiengAnh;
        $detai->tinhtrang = 0;
        $detai->id_user = $id;
        $detai->created_at =  new DateTime();
        $detai->save();
        return redirect()->route('getChiTietDeTai')->with('status', 'Thêm Thành Công!');
        }
        else{
        return redirect()->route('getChiTietDeTai')->with('status', 'Đăng nhập Thất Bại! Đã Quá Hạn Nộp Đề Tài');    
        }
    	     
    	
    	
        
    }
    public function getChiTietDeTai(){
        $id = Auth::id(); 
        $data = DB::table('detai')
                ->join('users','users.id','=','detai.id_user')
                ->where('detai.id_user','=',$id)
                ->select('detai.*','users.name')
                ->paginate(2);

        $datadl = DB::table('deadline')->where('loai',1)->select('thoigian')->get();

       
               // return $datacongty;
        return view('layouts/congty/dangkidetai',['data'=>$data,'datadl'=>$datadl]);
    }
    public function getChiTietDeTaiChoDuyet(){
         // $id = Auth::id(); 

        $data = DB::table('detai')
                ->join('users','users.id','=','detai.id_user')
                
                ->select('detai.*','users.name')->get();
        // $detai = DB::table('detai')
        //         ->select('*')
        //         ->paginate(2);
                
                $datacongty = DB::table('users')->where('id_doituong',4)->select('name')->get();
                // return $datacongty;
        return view('layouts/giangvienphutrach/danhsachdetaichoduyet',['data'=>$data,'datacongty'=>$datacongty]);
    }
    public function postDuyetDeTai($id){
        DB::table('detai')->where('id',$id)->update(['tinhtrang'=>1]);
        
        return redirect()->route('getChiTietDeTaiChoDuyet');
    }
    public function postChiTietDeTaiChoDuyet($id){
         $data = DB::table('detai')
                ->join('users','users.id','=','detai.id_user')
                ->where('detai.id',$id)
                ->select('detai.*','users.name')->get();
        // return $data;
       return view('layouts/chitietdetai',['data'=>$data]);
    }
}
