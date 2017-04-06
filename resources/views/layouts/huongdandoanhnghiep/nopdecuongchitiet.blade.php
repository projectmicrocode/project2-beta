<!-- nopdecuongchitiet.blade.php -->

@extends('layouts.master')

@section('content')



<div class="col-lg-8">
		<ul class="nav nav-tabs">
  			<li role="presentation"  class="active"><a href="{{url('chitietdecuong')}}">Nộp Đề Cương</a></li>
  			<li role="presentation"><a href="{{url('chitietdecuong')}}">Bảng Chấm Công</a></li>
  			<li role="presentation"><a href="{{url('chitietdecuong')}}">Bảng Đánh Giá</a></li>


  			
  			
		</ul>
		<br>
		@include('layouts.error.error')
		<br>

		<div class="content-list" >
			<form name  ="frmSinhVien" class="form-horizontal" action="nopdecuong" method="POST" enctype="multipart/form-data">
					<input type ="hidden" name="_token" value="{{ csrf_token() }}">
					

					<div class  ="form-group">
						<label for  ="inputEmail3" class="col-sm-3 control-label">Nội Dung Công việc</label>
						<div class  ="col-sm-9">
							<input type ="text" class="form-control" id="noidung" name="txtnoidung" placeholder="Vui lòng nhập nội dung" />
							
						</div>
					</div>
					<div class  ="form-group">
						<label for  ="inputEmail3" class="col-sm-3 control-label">Yêu Cầu Đầu Ra</label>
						<div class  ="col-sm-9">
							<input type ="text" class="form-control" id="yeucaudaura" name="txtyeucaudaura" placeholder="Vui lòng nhập yêu cầu đầu ra" />
							
						</div>
					</div>
					<div class  ="form-group">
						<label for  ="inputEmail3" class="col-sm-3 control-label">Thời Gian Bắt Đầu</label>
						<div class  ="col-sm-9">
							<input type ="text" class="form-control" id="thoigianbatdau" name="txtthoigianbatdau" placeholder="Vui lòng nhập thời gian bắt đầu DD-MM-YYYY H:M:S" />
							
						</div>
					</div>
					<div class  ="col-sm-12"><span id="helpBlock2" class="help-block" >Vui lòng nhập theo mẫu DD-MM/-YYY H:M:S </span></div>
								</div>
					<div class  ="form-group">
						<label for  ="inputEmail3" class="col-sm-3 control-label">Thời Gian Nộp</label>
						<div class  ="col-sm-9">
							<input type ="text" class="form-control" id="thoigiannop" name="txtthoigiannop" placeholder="Vui lòng nhập thời gian nộp DD-MM-YYYY H:M:S" />
							
						</div>
					</div>
					<div  class  ="col-sm-12"><span id="helpBlock2" class="help-block" >Vui lòng nhập theo mẫu DD-MM/-YYY H:M:S </span></div>
								</div>
						
					
					
					
					<div class="modal-footer">
						<div class="col-md-3 col-md-offset-5">
							<input type ="submit" name="submit" id="dangkidetai" class="btn btn-primary btn-lg btn-block" value="Nộp">
						</div>
					</div>     
			</form>
			
		</div>
		

   		
	</div>
<div class="col-lg-4">
		<div class="panel panel-primary">
  			<div class="panel-heading">
    			<h3 class="panel-title">Thông Tin Đề Cương</h3>
  			</div>
  			<div class="panel-body">
				@foreach($data as $val)
				 <ul class="list-group">
				<li class="list-group-item"><span></span>{{$val->tendecuong}}</li>
				
				<li class="list-group-item"><span></span>{{$val->name}}</li>
				<li class="list-group-item"><span></span>{{$val->created_at}}</li>
				</ul>
				@endforeach
  			</div>
		</div>
</div>
@endsection