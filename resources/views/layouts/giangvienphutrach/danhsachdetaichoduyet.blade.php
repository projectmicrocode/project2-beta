<!-- danhsachdetaichoduyet.blade.php -->


@extends('layouts.master')

@section('content')



<div class="col-lg-8">
		<ul class="nav nav-tabs">
  			<li role="presentation" class="active"><a href="{{url('chitietdetaichoduyet')}}">Danh sách đề tài chờ duyệt</a></li>

  			<li role="presentation" "><a href="{{url('danhsachsinhvienchoduyet')}}">Danh sách sinh viên chờ duyệt</a></li>
  			<li role="presentation"><a href="{{url('danhsachsinhviendacbietchoduyet')}}">Danh sách sinh viên đặc biệt</a></li>
  			
		</ul>

		<div class="content-list" >
		@foreach ($data as $retrieve)
        @if($retrieve->tinhtrang == 0)
      
            <ul>
			<li>
				<h4>
					<span>Tên Đề Tài: </span><b><a href="#">{{$retrieve->tendetai}}</a></b>
					

				</h4>
			</li>
			<li>
			<span>Số Sinh Viên Nhận: </span>{{$retrieve->soluong}}
		
			</li><br>
			<li>
			<span>Công Ty: </span>{{$retrieve->name}}
		
			</li><br>
			<li><span>Thời Gian Tạo: </span>{{$retrieve->created_at}}
			</li>
			<br>
			<div class="col-xs-1">
				<form action="duyetDeTai/<?php echo $retrieve->id?>" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<button class="btn btn-primary" href="#" id="btnDuyet">Duyệt</button>
				
				</form>
			</div>
			
            <div class="col-xs-2">
            	 <form action="chitietdetaichoduyet/<?php echo $retrieve->id?>" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button name="btnChiTietDeTai" class="btn btn-primary"> Chi Tiết</button>
					
			</form>
            </div>
           
			</ul>
			<br>
			<br>

          
        @endif
        @endforeach

			
		</div>
		

   		
	</div>
		<div class="col-lg-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Danh sách đề tài đã được duyệt</h3>
				</div>
				<div class="panel-body">
						
					@foreach ($data as $retrieve)
						@if($retrieve->tinhtrang == 1)
							<ul class="list-group">
								<li class="list-group-item"><span></span>{{$retrieve->tendetai}}</li>
								<li class="list-group-item"><span></span>{{$retrieve->name}}</li>
							</ul>
						@endif
					@endforeach
						
				</div>

			</div>
			<br>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Deadline Công Ty Nộp Đề Tài</h3>
				</div>
				<div class="panel-body">
							<form name  ="frmSinhVien" class="form-horizontal" action="datdeadline" method="POST">
							<input type ="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="content-panel">
							<div class  ="form-group">
							<label for  ="inputEmail3" class="col-sm-4 control-label">Thời Gian</label>
							<div class  ="col-sm-7">
							<input type ="text" class="form-control" id="txtdeadline" name="txtdeadline" placeholder="DD-MM-YYYY H:M:S" />
							
							</div >

							<div style="padding-left: 40px" class  ="col-sm-12"><span id="helpBlock2" class="help-block" >Vui lòng nhập theo mẫu DD-MM/-YYY H:M:S </span></div>
							</div>
							
							<div class="form-group">
								<label for  ="inputEmail3" class="col-sm-4 control-label">Công Ty</label>
								<div class="col-sm-7">
									
									<select name="sltCongTy" class="form-control" >
										<option value="0">Công Ty</option>
										@foreach($datacongty as $val)
											<option value="{{$val->name}}">{{$val->name}}</option>
										@endforeach
										
										
									</select>
								
								</div>
								
							</div>
							
							
							
							
							
							<div class="modal-footer">
							
							<input type ="submit" name="submit" id="dangkidetai" class="btn btn-primary btn-lg btn-block" value="Đặt">
							
							</div>     
							</form>
				</div>
			</div>
</div>



@endsection

