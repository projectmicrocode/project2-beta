<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\DoiTuong;
use Illuminate\Support\Facades\DB;
class LoginController extends Controller
{
    public function postLogin(Request $request){
    	$email = $request->email;
    	$password = $request->password;
    	
    	
    	if (Auth::attempt(['email' => $email, 'password' => $password])) {
    		$data = Auth::user();
    		switch ($data->id_doituong) {
    			case 1:
    				return "đây là trang của sinh viên";
    				break;
    			case 2:
    				return redirect()->route('getChiTietDeTaiChoDuyet');
    				break;
    			case 3:
    				return "đây là trang của Giảng Viên hướng dẫn";
    				break;
    			case 4:
                     return redirect()->route('getChiTietDeTai');
    				break;
    			case 5:
    				return "đây là trang của hướng dẫn doanh nghiệp";
    				break;
    			case 6:
    				return redirect()->route('getDanhSachSV');
    				break;
    			
    			default:
    				# code...
    				break;
    		}
    		
    	}else{
            return redirect()->route('login');
        }
    	
}
    public function getLogout(){
        Auth::logout();
        return redirect()->route('login');
    }
    public function getDataUser(){
        $id = Auth::id();
        $data = User::findOrFail($id);
        // return $data;
        return view('layouts/chitietuser',['data'=>$data]);

                     
    }
}