<!-- nopbaocao.blade.php -->
@extends('layouts.master')

@section('content')



<div class="col-lg-8">
		<ul class="nav nav-tabs">
  			<li role="presentation"><a href="{{url('diencv')}}">Hồ Sơ Lý Lịch</a></li>
  			<li role="presentation"><a href="{{url('dangkinguyenvong')}}">Đăng Kí Nguyện Vọng</a></li>
  			<li role="presentation" class="active"><a href="{{url('danhsachbaocaodanop')}}">Nộp Báo Cáo</a></li>


  			
  			
		</ul>
		
		@include('layouts.error.error')
	

		<div class="content-list" >
			<form name  ="frmSinhVien" class="form-horizontal" action="nopbaocao" method="POST" enctype="multipart/form-data">
					<input type ="hidden" name="_token" value="{{ csrf_token() }}">
					

					<input style="padding-bottom: 50px" type ="file" class="" id="chonFile" name="chonFile" value="Chọn file" >
						
					<div>
						<span class="form_item">
								<select name="hinhthuc" class="form-control" ng-model="sinhvien.sltCate" ng-required="true">
									<option value="0">--- Hình Thức ---</option>
									<option value="Giữa Kì">Giữa Kì</option>
									<option value="Cuối Kì">Cuối Kì</option>
									
									
								</select>
							</span>
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
    			<h3 class="panel-title">Thông Tin</h3>
  			</div>
  			<div class="panel-body">
				@foreach($data as $val)
				 <ul class="list-group">
				<li class="list-group-item"><span></span>{{$val->tenfile}}</li>
				<li class="list-group-item"><span></span>{{$val->hinhthuc}}</li>
				<li class="list-group-item"><span></span>{{$val->name}}</li>
				<li class="list-group-item"><span></span>{{$val->created_at}}</li>
				</ul>
				@endforeach
  			</div>
		</div>
</div>
@endsection