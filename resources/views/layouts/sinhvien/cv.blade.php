<!-- cv.blade.php -->
@extends('layouts.master')

@section('content')



<div class="col-lg-8">
		<ul class="nav nav-tabs">
  			<li role="presentation" class="active"><a href="{{url('diencv')}}">Hồ Sơ Lý Lịch</a></li>
  			<li role="presentation" ><a href="{{url('dangkinguyenvong')}}">Đăng Kí Nguyện Vọng</a></li>
			<li role="presentation"><a href="{{url('danhsachbaocaodanop')}}">Nộp Báo Cáo</a></li>
  			
  			
		</ul>
		
		@include('layouts.error.error')
		<div class="content-list" >
			<form name  ="frmSinhVien" class="form-horizontal" action="themcv" method="POST">
					<input type ="hidden" name="_token" value="{{ csrf_token() }}">
					<div class  ="form-group">
						<label for  ="inputEmail3" class="col-sm-3 control-label">MSSV</label>
						<div class  ="col-sm-9">
							<input type ="text" class="form-control" id="mssv" name="txtMssv" placeholder="Vui lòng nhập mssv" />
							
						</div>
					</div>
					<div class  ="form-group">
						<label for  ="inputEmail3" class="col-sm-3 control-label">Lớp</label>
						<div class="col-sm-9">
							<select name="sltLop" class="form-control" >
										<option value="0">--- Lớp ---</option>
										<option value="LTU11A">LTU11A</option>
										<option value="LTU11B">LTU11B</option>
										<option value="LTU12A">LTU12A</option>
										<option value="LTU13A">LTU13A</option>
										<option value="INPG12">INPG12</option>
										<option value="VUWIT12B">VUWIT12B</option>
										
									</select>
						</div>
						
						
					</div>
					<div class  ="form-group">
						<label for  ="inputEmail3" class="col-sm-3 control-label">Địa Chỉ</label>
						<div class  ="col-sm-9">
							<input type ="text" class="form-control" id="diachi" name="txtdiachi" placeholder="Vui lòng nhập địa chỉ" >
							
						</div>
					</div>
					<div class  ="form-group">
						<label for  ="inputEmail3" class="col-sm-3 control-label">Kĩ năng</label>
						<div class  ="col-sm-9">
							<input type ="text" class="form-control" id="kinang" name="txtKiNang" placeholder="Vui lòng nhập ngôn ngữ" >
							
						</div>
					</div>
					<div class  ="form-group">
						<label for  ="inputEmail3" class="col-sm-3 control-label">Kĩ năng mềm</label>
						<div class  ="col-sm-9">
							<input type ="text" class="form-control" id="kinangmem" name="txtkinangmem" placeholder="Vui lòng nhập kĩ năng mềm" />
							
						</div>
					</div>
					<div class  ="form-group">
						<label for  ="inputEmail3" class="col-sm-3 control-label">Chứng chỉ Ielts</label>
						<div class  ="col-sm-9">
							<input type ="text" class="form-control" id="tienganh" name="txtTiengAnh" placeholder="Vui lòng nhập yêu cầu ngoại ngữ" />
							
						</div>    
					</div>
						@if (session('status'))
						<div class="alert alert-success">
						{{ session('status') }}
						</div>
						@endif
					<div class="modal-footer">
						<div class="col-md-3 col-md-offset-5">
							<input type ="submit" name="nopvc" id="nopvc" class="btn btn-primary btn-lg btn-block" value="Gửi">
						</div>
					</div>     
			</form>
			
		</div>
		

   		
	</div>
<div class="col-lg-4">
		<div class="panel panel-primary">
  			<div class="panel-heading">
    			<h3 class="panel-title">Thông Tin CV</h3>
  			</div>
  			<div class="panel-body">
				@foreach ($data as $retrieve)
						
							<ul class="list-group">
								<li class="list-group-item"><span>Họ Và Tên: </span>{{$retrieve->ten}}</li>
								<li class="list-group-item"><span>Mssv: </span>{{$retrieve->mssv}}</li>
								<li class="list-group-item"><span>Lớp: </span>{{$retrieve->lop}}</li>
								<li class="list-group-item"><span>Địa Chỉ: </span>{{$retrieve->diachi}}</li>
								<li class="list-group-item"><span>Thời gian đăng: </span>{{$retrieve->created_at}}</li>
							</ul>
						
					@endforeach   
		</div>
</div>
@endsection