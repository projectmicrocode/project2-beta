<!-- dangkisinhvientructiep.blade.php -->


@extends('layouts.master')

@section('content')
<div class="col-lg-9">
		<ul class="nav nav-tabs">
  			<li role="presentation" ><a href="{!!url('chitietdetai')!!}">Đăng Kí Đề Tài</a></li>

  			<li role="presentation"><a href="{!!url('chitiethddn')!!}">Đăng Kí Hướng Dẫn Doanh Nghệp</a></li>
  			<li role="presentation" class="active"><a href="{!!url('chitietsinhviendacbiet')!!}">Đăng Kí Sinh Viên Trực Tiếp</a></li>
  			<li role="presentation"><a href="{!!url('getPhanCongSinhVien')!!}">Phân Công</a></li>
		</ul>
  <br>
   
            @include('layouts.error.error')
     
        
    <br>
     
        <form name  ="frmSinhVien" class="form-horizontal" action="dangkisinhvientructiep" method="POST">
          <input type ="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="content-panel">
          <div class  ="form-group">
            <label for  ="inputEmail3" class="col-sm-3 control-label">Họ Và Tên</label>
            <div class  ="col-sm-9">
              <input type ="text" class="form-control" id="name" name="txtName" placeholder="Vui lòng nhập họ tên" />
                            
            </div >
          </div>
          <div class  ="form-group">
            <label for  ="inputEmail3" class="col-sm-3 control-label">Mã số sinh viên</label>
            <div class  ="col-sm-9">
            <input type ="text" class="form-control" id="mss" name="txtMssv" placeholder="Vui lòng nhập số lượng" >
                            
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Đề Tài</label>
            <div class="col-sm-9">
              <!-- <input type="text" class="form-control" id="age" name="age" placeholder="Vui lòng nhập tuổi" >
              <span id="helpBlock2" class="help-block">Vui lòng nhập tuổi</span> -->
              
              <span class="form_item">
                <select name="sltDeTai" class="form-control" >
                <option value="0">--- Đề Tài ---</option>
                @foreach($datadetai as $val)
                <option value="{{$val->tendetai}}">{{$val->tendetai}}</option>
                
                @endforeach
              
                </select>
              </span>
              
            </div>
          </div>
          
          </div>
          <brs>
      

          <div class="modal-footer">
          <div class="col-md-3 col-md-offset-5">
            <input type ="submit" name="submit" id="dangkidetai" class="btn btn-primary btn-lg btn-block" value="Đăng Kí">
          </div>
           </div>     
        </form>

  
		
</div>
<div class="col-lg-3">
		<div class="panel panel-primary">
  			<div class="panel-heading">
    			<h3 class="panel-title">Trạng Thái</h3>
  			</div>
  			<div class="panel-body">

        @foreach($datasv as $val)
    	   <ul>
            <li><span>Họ và tên: </span>{{$val->hoten}}</li>
            <li><span>Mã số Sinh Viên: </span>{{$val->mssv}}</li>
            <li><span>Đề Tài: </span>{{$val->detai}}</li>
           </ul>
        @endforeach
  			</div>

        <div class="modal-footer">{{$datasv ->render()}}</div>
		</div>
</div>
@endsection