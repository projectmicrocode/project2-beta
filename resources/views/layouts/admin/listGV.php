<!DOCTYPE html>
<html lang="en" ng-app = "my-app">
<head>
	<meta charset="UTF-8" />
	<meta name="copyright" content="QuocTuan.Info" />
	<meta name="author" content="Vũ Quốc Tuấn" />
	<title>Quản lý Giảng Viên</title>
	<!-- Load Bootstrap CSS -->
	<link type="text/css" rel="stylesheet" href="template/css/bootstrap.min.css" />
	<link type="text/css" rel="stylesheet" href="template/css/style.css" />
</head>
<body>
<div>
	<?php include("menuBar.blade.php");?>
	<br>
	<br>
	<div class="container" ng-controller="GiangVienController" role="main">

		<center><h2>Danh Sách Giáo Viên</h2></center>
		<table class="table table-bordered">
			<thead>
				<tr>
					
					<th width="30%">Họ và Tên</th>
					<th>Chức Vụ</th>
					<th>Email</th>
					<!-- <th>Password</th> -->
					<th>Số Điện Thoại</th>

					<th width="10%"><button id="btn-add" class="btn btn-primary btn-xs" ng-click="modal('add')">Thêm Sinh Viên</button></th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="gv in giangviens">
					
					<td>{{gv.hoten}}</td>
					<td>{{gv.chucvu}}</td>
					<td>{{gv.email}}</td>
					<!-- <td>{{gv.password}}</td> -->
					<td>{{gv.phone}}</td>
					<td>
						<button class="btn btn-default btn-xs btn-detail" id="btn-edit" ng-click="modal('edit')">Sửa</button>
						<button class="btn btn-danger btn-xs btn-delete" ng-click="delete(gv.id)">Xóa</button>
					</td>
				</tr>
			</tbody>
		</table>
		
		<!-- Modal -->
		<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">{{ frmTitle }}</h4>
			  </div>
			  <div class="modal-body">
				<form name="frmSinhVien" class="form-horizontal">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Họ tên</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="name" name="name" placeholder="Vui lòng nhập họ tên" ng-model="giangvien.name" ng-required="true"/>
							<span id="helpBlock2" class="help-block" ng-show="frmSinhVien.name.$error.required">Vui lòng nhập họ tên</span>
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Chức Vụ</label>
						<div class="col-sm-9">
							<!-- <input type="text" class="form-control" id="age" name="age" placeholder="Vui lòng nhập tuổi" >
							<span id="helpBlock2" class="help-block">Vui lòng nhập tuổi</span> -->
							
							<span class="form_item">
								<select name="sltCate" class="form-control" ng-model="giangvien.sltCate" ng-required="true">
									<option value="0">--- Chức Vụ ---</option>
									<option value="Giảng viên hướng dẫn">Giảng viên hướng dẫn</option>
									<option value="Giảng viên phụ trách">Giảng viên phụ trách</option>
									
									
								</select>
							</span>
							<span id="helpBlock2" class="help-block" ng-show="frmSinhVien.sltCate.$error.required">Vui lòng chọn chức vụ</span> 
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Email</label>
						<div class="col-sm-9">
							<input type="email" class="form-control" id="email" name="txtEmail" placeholder="Vui lòng nhập Email" ng-model="giangvien.txtEmail" ng-required="true" />
							<span id="helpBlock2" class="help-block" ng-show="frmSinhVien.txtEmail.$error.required">Vui lòng nhập Email</span>
							<span id="helpBlock2" class="help-block" ng-show="frmSinhVien.txtEmail.$error.email">Đây không phải là Email</span>
							


						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Phone</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="phone" name="txtPhone" placeholder="Vui lòng nhập số điện thoại" ng-model="giangvien.txtPhone" ng-required="true" />
							<span id="helpBlock2" class="help-block" ng-show="frmSinhVien.txtPhone.$error.required">Vui lòng nhập Email</span>
							
							


						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Password</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="password" name="txtPass" placeholder="Vui lòng nhập password" ng-model="giangvien.txtPass" ng-required="true" />
							<span id="helpBlock2" class="help-block" ng-show="frmSinhVien.txtPass.$error.required">Vui lòng nhập Password</span>
							


						</div>
					</div>
					
					
				</form>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-primary" ng-disabled="frmSinhVien.$invalid" ng-click="save(state,id)">Lưu</button>
			  </div>
			</div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</div>
</div>
	<!-- Load Bootstrap JS -->
	<script type="text/javascript" src="template/js/jquery.min.js"></script>
	<script type="text/javascript" src="template/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="app/lib/angular.min.js"></script>
	<script type="text/javascript" src="app/app.js"></script>
	<script type="text/javascript" src="app/controller/GiangVienController.js"></script>

	<script type="text/javascript">
	$(document).ready(function () {
		$("#btn-add,#btn-edit").click(function () {
			$('#myModal').modal('show')
		});
	});
	</script>
</body>
</html>