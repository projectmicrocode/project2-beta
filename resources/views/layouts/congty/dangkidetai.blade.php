
@extends('layouts.master')

@section('content')



<div class="col-lg-8">
		<ul class="nav nav-tabs">
  			<li role="presentation" class="active"><a href="{!!url('chitietdetai')!!}">Đăng Kí Đề Tài</a></li>

  			<li role="presentation" "><a href="{!!url('chitiethddn')!!}">Đăng Kí Hướng Dẫn Doanh Nghiệp</a></li>
  			<li role="presentation"><a href="{!!url('chitietsinhviendacbiet')!!}">Đăng Kí Sinh Viên Trực Tiếp</a></li>
  			<li role="presentation"><a href="{!!url('danhsachsinhvienphancong')!!}">Phân Công</a></li>
		</ul>
    <br>
   
            @include('layouts.error.error')
     
        
    <br>
        <form name  ="frmSinhVien" class="form-horizontal" action="themdetai" method="POST">
          <input type ="hidden" name="_token" value="{{ csrf_token() }}">
          <div class  ="form-group">
            <label for  ="inputEmail3" class="col-sm-3 control-label">Tên Đề Tài</label>
            <div class  ="col-sm-9">
              <input type ="text" class="form-control" id="name" name="txtName" placeholder="Vui lòng nhập họ tên" />
                            
            </div>
          </div>
          <div class  ="form-group">
            <label for  ="inputEmail3" class="col-sm-3 control-label">Số lượng Sinh Viên nhận</label>
            <div class  ="col-sm-9">
            <input type ="text" class="form-control" id="numSV" name="numSV" placeholder="Vui lòng nhập số lượng" >
                            
            </div>
          </div>
          <div class  ="form-group">
            <label for  ="inputEmail3" class="col-sm-3 control-label">Kĩ năng</label>
            <div class  ="col-sm-9">
              <input type ="text" class="form-control" id="kinang" name="txtKiNang" placeholder="Vui lòng nhập ngôn ngữ" >
                            
            </div>
          </div>
          <div class  ="form-group">
            <label for  ="inputEmail3" class="col-sm-3 control-label">Nội Dung Thực Tập</label>
            <div class  ="col-sm-9">
              <input type ="text" class="form-control" id="noidung" name="txtNoiDung" placeholder="Vui lòng nhập nội dung thực tập" />
                            
            </div>
          </div>
          <div class  ="form-group">
            <label for  ="inputEmail3" class="col-sm-3 control-label">Chứng chỉ Ielts</label>
            <div class  ="col-sm-9">
              <input type ="text" class="form-control" id="tienganh" name="txtTiengAnh" placeholder="Vui lòng nhập yêu cầu ngoại ngữ" />
                            
            </div>    
          </div>
          <div class  ="form-group">
             <label class="col-sm-3 control-label">Deadline Nộp Đề Tài:</label>
             <label class="col-sm-3 ">
             <h4> @foreach($datadl as $val)
                  {{$val->thoigian}}
                @endforeach</h4>
               
             </label>
          </div>
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
    			<h3 class="panel-title">Danh Sách Đề Tài Đã Gửi</h3>
  			</div>
  			<div class="panel-body">
    		@foreach($data as $val)
          <ul>
            <li><span>Tên đề tài: </span>{{$val->tendetai}}</li>
            <li><span>Số SV nhận: </span>{{$val->soluong}}</li>
            <li><span>Tên Công Ty: </span>{{$val->name}}</li>
            <li><span>Thời gian gửi: </span>{{$val->created_at}}</li>

          </ul>
        @endforeach
  			</div>
        <div class="modal-footer">{{$data ->render()}}</div>
        
        
           
		</div>
</div>

@endsection

