<!-- dangkinguyenvong.blade.php -->
@extends('layouts.master')

@section('content')



<div class="col-lg-8">
		<ul class="nav nav-tabs">
  			<li role="presentation"><a href="{{url('diencv')}}">Hồ Sơ Lý Lịch</a></li>
  			<li role="presentation" class="active"><a href="{{url('dangkinguyenvong')}}">Đăng Kí Nguyện Vọng</a></li>
  			<li role="presentation"><a href="{{url('danhsachbaocaodanop')}}">Nộp Báo Cáo</a></li>


  			
  			
		</ul>
		<br>
		<br>

		<div class="content-list" >
			<form name  ="frmSinhVien" class="form-horizontal" action="themnguyenvong" method="POST">
					<input type ="hidden" name="_token" value="{{ csrf_token() }}">
					<div class  ="form-group">
						<label for  ="inputEmail3" class="col-sm-3 control-label">Nguyện Vọng 1</label>
						<div class  ="col-sm-9">
							
						@if(count($data) > 0)
							<select name="nguyenvong1" class="form-control" >
							<option value="0">--- Nguyện Vọng ---</option>	
								@foreach($data as $val)
									<option value="{{$val->tendetai}}">{{$val->tendetai}} - {{$val->name}}</option>
								@endforeach
							</select>
						@else
							<div class  ="col-sm-9"  ><span class="glyphicon glyphicon-alert" style="color: #F4FA58"></span><?php echo " Không có đề tài đăng kí" ?></div>
						@endif
						</div>
					</div>
					<div class  ="form-group">
						<label for  ="inputEmail3" class="col-sm-3 control-label">Nguyện Vọng 2</label>
						<div class  ="col-sm-9">
							@if(count($data) > 1)
								<select name="nguyenvong2" class="form-control" ng-model="sinhvien.sltCate" ng-required="true">
								<option value="0">--- Nguyện Vọng ---</option>	
									@foreach($data as $val)
										<option value="{{$val->tendetai}}">{{$val->tendetai}} - {{$val->name}}}</option>
									@endforeach
								</select>
							@else
								<div class  ="col-sm-9"><span class="glyphicon glyphicon-alert" style="color: #F4FA58"></span><?php echo " Không đủ đề tài đăng kí" ?></div>
									
							@endif
							
						</div>
					</div>
					<div class  ="form-group">
						<label for  ="inputEmail3" class="col-sm-3 control-label">Nguyện Vọng 3</label>
						<div class  ="col-sm-9">
							@if(count($data) > 2)
								<select name="nguyenvong3" class="form-control" ng-model="sinhvien.sltCate" ng-required="true">
								<option value="0">--- Nguyện Vọng ---</option>	
									@foreach($data as $val)
										<option value="{{$val->tendetai}}">{{$val->tendetai}} - {{$val->name}}</option>
									@endforeach
								</select>
							@else
							<div class  ="col-sm-9"><span class="glyphicon glyphicon-alert" style="color: #F4FA58"></span><?php echo " Không đủ đề tài đăng kí" ?></div>
								
									
							@endif
							
						</div>
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
		

   		
	</div>
<div class="col-lg-4">
		<div class="panel panel-primary">
  			<div class="panel-heading">
    			<h3 class="panel-title">Thông Tin</h3>
  			</div>
  			<div class="panel-body">
				
  						
     

  					
        
           
		</div>
</div>
@endsection