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
					

					<input style="padding-bottom: 50px" type ="file" class="" id="chondecuong" name="chondecuong" value="Chọn file" >
						
					
					
					
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