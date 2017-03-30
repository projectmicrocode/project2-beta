<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
})->name('login');
Route::get('user',['uses'=>'LoginController@getDataUser'])->name('getDataUser');
Route::get('chitietuser',function(){
	return view('layouts/chitietuser');
})->name('chitietuser')->middleware('auth');
//cong ty


Route::get('getDangKiHDDN',function(){
	return view('layouts/congty/dangkihuongdanhdoanhnghiep');
})->name('getDangKiHDDN')->middleware('auth');
Route::get('getDangKiSVTrucTiep',function(){
	return view('layouts/congty/dangkisinhvientructiep');
})->name('getDangKiSVTrucTiep')->middleware('auth');
Route::get('getPhanCongSinhVien',function(){
	return view('layouts/congty/phancongsinhvien');
})->name('getPhanCongSinhVien')->middleware('auth');

//cong ty nop de tai
Route::post('themdetai',['as'=>'postThemDeTai','uses'=>'DeTaiController@postThemDeTai']);
Route::get('chitietdetai',['as'=>'getChiTietDeTai','uses'=>'DeTaiController@getChiTietDeTai'])->middleware('auth');
//công ty đăng kí hddn
Route::post('dangkihddn',['as'=>'postDangKiHddn','uses'=>'HDDNController@postDangKiHddn']);
Route::get('chitiethddn',['as'=>'getChitiethddn','uses'=>'HDDNController@getChitiethddn']);
//login & logout
Auth::routes();

Route::get('/home', 'HomeController@index');

Route::post('login',['as'=>'postLogin','uses'=>'LoginController@postLogin']);
Route::get('logout',['uses'=>'LoginController@getLogout']);

// đăng kí công ty
Route::post('dangkicongty',['as'=>'postDangCongTy','uses'=>'DangKiCongTyController@postDangCongTy']);

// quản lý sih viên giảng viên
Route::get('danhsachSVjson',['as'=>'getDanhSachSVjson','uses'=>'SinhVienController@getDanhSachSVjson']);
Route::get('danhsachSV',['as'=>'getDanhSachSV',function(){
	return view('layouts/admin/listSV');
}])->middleware('auth');

Route::post('themsinhvien',['as'=>'postThemSinhVien','uses'=>'SinhVienController@postThemSinhVien']);

Route::get('editSV/{id}',['as'=>'getEdit','uses'=>'SinhVienController@getEditSV']);
Route::post('posteditSV/{id}',['as'=>'posteditSV','uses'=>'SinhVienController@postEditSV']);

Route::get('deleteSV/{id}',['as'=>'getDelete','uses'=>'SinhVienController@getDelete']);

Route::get('danhsachGV',['as'=>'getDanhSachGV',function(){
	return view('layouts/admin/listGV');
}])->middleware('auth');

Route::get('danhsachGVjson',['as'=>'getDanhSachGVjson','uses'=>'GiangVienController@getDanhSachGVjson']);
Route::post('themgiangvien',['as'=>'postThemGiangVien','uses'=>'GiangVienController@postThemGiangVien']);

Route::get('deleteGV/{id}',['as'=>'getDelete','uses'=>'GiangVienController@getDelete']);

// công ty đăng kí sinh viên đặc biệt
Route::get('danhsachdetaidacbiet',['as'=>'getDanhSachDeTaiDacBiet','uses'=>'DangKiSinhVienDacBietController@getDanhSachDeTaiDacBiet']);
Route::post('dangkisinhvientructiep',['as'=>'postDangKiSVTrucTiep','uses'=>'DangKiSinhVienDacBietController@postDangKiSVTrucTiep']);
Route::get('chitietsinhviendacbiet',['as'=>'getChiTietSVDacBiet','uses'=>'DangKiSinhVienDacBietController@getChiTietSVDacBiet'])->middleware('auth');

//danh sách đề tài chờ duyệt
Route::get('chitietdetaichoduyet',['as'=>'getChiTietDeTaiChoDuyet','uses'=>'DeTaiController@getChiTietDeTaiChoDuyet'])->middleware('auth');
Route::post('duyetDeTai/{id}',['as'=>'postDuyetDeTai','uses'=>'DeTaiController@postDuyetDeTai']);
Route::post('chitietdetaichoduyet/{id}',['as'=>'postChiTietDeTaiChoDuyet','uses'=>'DeTaiController@postChiTietDeTaiChoDuyet'])->middleware('auth');

//danh sách sinh viên đặc biệt chờ duyệt
Route::get('danhsachsinhviendacbietchoduyet',['as'=>'getdanhsachsinhviendacbietchoduyet','uses'=>'SinhVienDacBietController@getdanhsachsinhviendacbietchoduyet'])->middleware('auth');
Route::post('duyetsinhviendacbiet/{id}',['as'=>'postduyetsinhviendacbiet','uses'=>'SinhVienDacBietController@postduyetsinhviendacbiet'])->middleware('auth');
//danh sách sinh viên đặc biệt chờ duyệt
Route::get('danhsachsinhvienchoduyet',['as'=>'getdanhsachsinhvienchoduyet','uses'=>'SinhVienController@getdanhsachsinhvienchoduyet'])->middleware('auth');
Route::post('duyetsinhvien/{id}',['as'=>'postduyetsinhvien','uses'=>'SinhVienController@postduyetsinhvien'])->middleware('auth');

// Điền CV
Route::get('diencv',['as'=>'getdiencv','uses'=>'SinhVienController@getdiencv'])->middleware('auth');
Route::post('themcv',['as'=>'postthemcv','uses'=>'SinhVienController@postthemcv']);

//Sinh Viên Đăng Kí Nguyện Vọng
Route::get('dangkinguyenvong',['as'=>'getdangkinguyenvong','uses'=>'SinhVienController@getdangkinguyenvong'])->middleware('auth');
Route::post('themnguyenvong',['as'=>'postthemnguyenvong','uses'=>'SinhVienController@postthemnguyenvong']);

// Sinh Viên Nộp Báo cáo
Route::get('nopbaocao',['as'=>'getnopbaocao','uses'=>'SinhVienController@getnopbaocao'])->middleware('auth');
Route::post('nopbaocao',['as'=>'postnopbaocao','uses'=>'SinhVienController@postnopbaocao'])->middleware('auth');

Route::get('danhsachbaocaodanop',['as'=>'getdanhsachbaocaodanop','uses'=>'SinhVienController@getdanhsachbaocaodanop']);
//huong dan doanh nghiep nop de cuong
Route::get('chitietdecuong',['as'=>'getchitietdecuong','uses'=>'HDDNController@getchitietdecuong']);
Route::post('nopdecuong',['as'=>'postnopdecuong','uses'=>'HDDNController@postnopdecuong']);

//gvhd xem danh sách sinh viên đang thực tập
Route::get('danhsachsinhviendangthuctap',['as'=>'getdanhsachsinhviendangthuctap','uses'=>'GiangVienHuongDanController@getdanhsachsinhviendangthuctap']);

//gvhd xuất báo cáo
Route::post('xuatcuoiki/{id}',['as'=>'postxuatcuoiki','uses'=>'GiangVienHuongDanController@postxuatcuoiki']);
Route::post('xuatgiuaki/{id}',['as'=>'postxuatgiuaki','uses'=>'GiangVienHuongDanController@postxuatgiuaki']);

//gvpt đặt deadline cho công ty nộp đề tài
Route::post('datdeadline',['as'=>'postdatdeadline','uses'=>'GiangVienPhuTrachController@postdatdeadline']);
