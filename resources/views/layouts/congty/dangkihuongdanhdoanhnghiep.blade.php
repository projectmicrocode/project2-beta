<!-- dangkihuongdanhdoanhnghiep.blade.php -->

@extends('layouts.master')

@section('content')
<div class="col-lg-8">
		<ul class="nav nav-tabs">
  			<li role="presentation" ><a href="{!!url('chitietdetai')!!}">Đăng Kí Đề Tài</a></li>

  			<li role="presentation" class="active"><a href="{!!url('chitiethddn')!!}">Đăng Kí Hướng Dẫn Doanh Nghệp</a></li>
  			<li role="presentation"><a href="{!!url('chitietsinhviendacbiet')!!}">Đăng Kí Sinh Viên Trực Tiếp</a></li>
  			<li role="presentation"><a href="{!!url('danhsachsinhvienphancong')!!}">Phân Công</a></li>
		</ul>
    <br>
   
            @include('layouts.error.error')
     
        
    <br>
     
        <form name  ="frmSinhVien" class="form-horizontal" action="dangkihddn" method="POST">
          <input type ="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="content-panel">
          <div class  ="form-group">
            <label for  ="inputEmail3" class="col-sm-3 control-label">Họ Và Tên</label>
            <div class  ="col-sm-9">
              <input type ="text" class="form-control" id="name" name="txtName" placeholder="Vui lòng nhập họ tên" />
                            
            </div >
          </div>
          <div class  ="form-group">
            <label for  ="inputEmail3" class="col-sm-3 control-label">Email</label>
            <div class  ="col-sm-9">
            <input type ="email" class="form-control" id="email" name="txtEmail" placeholder="Vui lòng nhập số lượng" >
                            
            </div>
          </div>
          <div class  ="form-group">
            <label for  ="inputEmail3" class="col-sm-3 control-label">Password</label>
            <div class  ="col-sm-9">
              <input type ="Password" class="form-control" id="pass" name="txtPass" placeholder="Vui lòng nhập ngôn ngữ" >
                            
            </div>
          </div>
          <div class  ="form-group">
            <label for  ="inputEmail3" class="col-sm-3 control-label">Số Điện Thoại</label>
            <div class  ="col-sm-9">
              <input type ="text" class="form-control" id="phone" name="txtPhone" placeholder="Vui lòng nhập nội dung thực tập" />
                            
            </div>
          </div>
          </div>
          <!-- <div class  ="form-group">
            <label for  ="inputEmail3" class="col-sm-3 control-label">Chứng chỉ Ielts</label>
            <div class  ="col-sm-9">
              <input type ="text" class="form-control" id="tienganh" name="txtTiengAnh" placeholder="Vui lòng nhập yêu cầu ngoại ngữ" />
                            
            </div>    
          </div> -->
           @if (session('status'))
          <div class="alert alert-success">
          {{ session('status') }}
          </div>
          @endif

          <div class="modal-footer">
          <div class="col-md-3 col-md-offset-5">
            <input type ="submit" name="submit" id="dangkidetai" class="btn btn-primary btn-lg btn-block" value="Đăng Kí">
          </div>
           </div>     
        </form>

		
	</div>
<div class="col-lg-4">
		<div class="panel panel-primary">
  			<div class="panel-heading">
    			<h3 class="panel-title">Danh Sách Hướng Dẫn Doanh Nghiệp</h3>
  			</div>
  			<div class="panel-body">
    		@foreach($data as $val)
          <ul>
            <li><span>Họ và tên: </span>{{$val->hoten}}</li>
            <li><span>Email: </span>{{$val->email}}</li>
            <li><span>Tên Công Ty: </span>{{$val->name}}</li>
            <li><span>Thời gian được đăng kí: </span>{{$val->created_at}}</li>

          </ul>
        @endforeach
  			</div>
         <div class="modal-footer">{{$data ->render()}}</div>
		</div>
</div>
@endsection