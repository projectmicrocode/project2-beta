<!-- nopdecuongchitiet.blade.php -->
@extends('layouts.master')

@section('content')



<div class="col-lg-8">
		<ul class="nav nav-tabs">
  			<li role="presentation"  class="active"><a href="{{url('chitietdecuong')}}">Giao Nhiệm Vụ</a></li>
  			<li role="presentation"><a href="{{url('chitietdecuong')}}">Bảng Chấm Công</a></li>
  			<li role="presentation"><a href="{{url('chitietdecuong')}}">Bảng Đánh Giá</a></li>
		</ul>
    <br>
   
            @include('layouts.error.error')
     
        
    <br>
        <form name  ="frmSinhVien" class="form-horizontal" action="nopdecuong" method="POST" enctype="multipart/form-data">
					<input type ="hidden" name="_token" value="{{ csrf_token() }}">
					

					<div class  ="form-group">
						<label for  ="inputEmail3" class="col-sm-3 control-label">Nội Dung Công việc</label>
						<div class  ="col-sm-9">
							<input type ="text" class="form-control" id="noidung" name="txtnoidung" placeholder="Vui lòng nhập nội dung"  required/>
							@if ($errors->has('txtnoidung'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('txtnoidung')}}</strong>
                                    </span>
                             @endif
						</div>
					</div>
					<div class  ="form-group">
						<label for  ="inputEmail3" class="col-sm-3 control-label">Yêu Cầu Đầu Ra</label>
						<div class  ="col-sm-9">
							<input type ="text" class="form-control" id="yeucaudaura" name="txtyeucaudaura" placeholder="Vui lòng nhập yêu cầu đầu ra" required />
							@if ($errors->has('txtyeucaudaura'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('txtyeucaudaura')}}</strong>
                                    </span>
                             @endif
						</div>
					</div>
					<div class  ="form-group"  style="margin-bottom: 0px">
						<label for  ="inputEmail3" class="col-sm-3 control-label">Thời Gian Bắt Đầu</label>
						<div class  ="col-sm-9">
							<input type ="date" class="form-control" id="thoigianbatdau" name="txtthoigianbatdau"  />

						<div class  ="col-sm-12	""><span id="helpBlock2" class="help-block" >Vui lòng nhập theo mẫu DD-MM-YYY</span></div>
								
						</div>
					</div>
					
					<div class  ="form-group" style="margin-bottom: 0px">
						<label for  ="inputEmail3" class="col-sm-3 control-label">Thời Gian Kết Thúc</label>
						<div class  ="col-sm-9">
							<input type ="date" class="form-control" id="thoigiannop" name="txtthoigianketthuc"  />
							<div  class  ="col-sm-12"><span id="helpBlock2" class="help-block" >Vui lòng nhập theo mẫu DD-MM-YYY </span>
							</div>
								
						</div>
					</div>
									
					<div class  ="form-group">
						<label for  ="inputEmail3" class="col-sm-3 control-label">Sinh Viên Thực Tập</label>
						<div class  ="col-sm-9">
							<select name="sltSV" class="form-control" >
							
								<option value="0">--- Sinh Viên Thực Tập ---</option>
									@foreach($data as $val)
											@foreach($val as $value)
											<option value="{{$value->name}}">{{$value->name}}</option>
											
											@endforeach
									@endforeach
							
							</select>
								
						</div>
					</div>
					@if (session('status'))
					<div class="alert alert-success">
						{{ session('status') }}
					</div>
					@endif
						
					
					<div class="modal-footer">
						<div class="col-md-3 col-md-offset-5">
							<input type ="submit" name="submit" id="dangkidetai" class="btn btn-primary btn-lg btn-block" value="Gửi">
						</div>
					</div>     
			</form>
        
	</div>
<div class="col-lg-4">
		<div class="panel panel-primary">
  			<div class="panel-heading">
    			<h3 class="panel-title">Thông Tin Giao Nhiệm Vụ</h3>
  			</div>
  			<div class="panel-body">
    		@foreach($datanhiemvu as $val)
				<ul class ="list-group">
						<li class ="list-group-item"><span>Nội Dung Công Việc: </span>{{$val->noidungcv}}</li>
						<li class ="list-group-item"><span>Yêu Cầu Đầu Ra: </span>{{$val->yeucaudaura}}</li>
						<li class ="list-group-item"><span>Thời Gian Bắt Đầu: </span>{{$val->thoigianbatdau}}</li>
						<li class ="list-group-item"><span>Thời Gian Kết Thúc: </span>{{$val->thoigianketthuc}}</li>
						<li class ="list-group-item"><span>Tên Sinh Viên: </span>{{$val->tensvthuctap}}</li>

					</ul>
    		@endforeach
  			</div>
      
        
        
           
		</div>
</div>

@endsection





<!-- <div class="col-lg-8">
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
	 -->

