app.controller('GiangVienController',function($scope,$http,API){
	$http.get(API+'danhsachGVjson').then(successCallback);
	function successCallback(response){
		$scope.giangviens = response.data;
	}
	$scope.modal = function(state,id){
		$scope.state = state;
		switch (state){
			case "add":
				$scope.frmTitle = "Thêm Sinh Viên";
				break;
			case "edit":
				$scope.frmTitle = "Sửa Sinh Viên";
				break;
			default: 
				$scope.frmTitle = "Không Biết";
				break;
		}
		

		$("#myModal").modal('show');
	}
	$scope.save = function(state){
		if (state == "add") {
			
			var data = $.param($scope.giangvien);
			var req = {
			 	method: 'POST',
 				url: API + 'themgiangvien',
 				headers: {
   					'Content-Type': 'application/x-www-form-urlencoded'
 				},
 				data: data
			}

			$http(req).then(function(response){
				console.log(response);
				location.reload();
			}, function(response){
				console.log(response);
				alert('Xảy ra lỗi vui lòng kiểm tra log');
			});
		}
		
	}
	$scope.delete = function (id) {
		var isConfirmDelete = confirm('Bạn có chắc muốn xóa Sinh Viên này không');
		if (isConfirmDelete) {
			$http.get(API+'deleteGV/'+id).then(successCallback,errorCallback);
			function successCallback(response){
					console.log(response);
					location.reload();
			}
			function errorCallback(response){
				console.log(response);
				alert("Delete Fail!");
			}
		} else {
			return false;

		}
	}
});