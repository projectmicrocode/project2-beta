<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quy Trinh Thực Tập Sinh Viên</title>
	<!-- Latest compiled and minified CSS & JS -->
  <!-- Latest compiled and minified CSS & JS -->
  <link rel="stylesheet" href="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css')}}" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  
	<link rel="stylesheet" type="text/css" href="{{asset('css/myWeb.css')}}">
	
</head>
<body>
<div>
<div class="header">
	<nav class="navbar navbar-default">
  		<div class="container-fluid">
    		<div class="navbar-header">
      			<a class="navbar-brand" href="#">
        			<img  src="{{asset('/storage/img/logo.png')}}"" style="height:100%">

      			</a>
      			<a class="navbar-brand" href="#" >QT P2_04</a>

    		</div>
        
        
    		<ul class="nav navbar-nav navbar-right">
        
        		<li class="dropdown">
          			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          			<span class="glyphicon glyphicon-user"></span>
          			User
          			<span class="caret"></span>
          			</a>
          			<ul class="dropdown-menu">
            			<li><a href="{{url('user')}}" id="showModal"><span class="glyphicon glyphicon-user" ></span> User Profile</a></li>
            			<li><a href="#"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
            			
            			<li role="separator" class="divider"></li>
            			<li><a href="{{url('logout')}}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          			</ul>
        		</li>
      		</ul>
  		</div>
	</nav>
</div>


	<!-- navigation -->

<div class="container">
  @yield('content')
  
</div>
	

<br>
<br>
<br>
<br>
<div class="footer-bottom">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; QT P2_04 2017</p>
                </div>
            </div>
            <!-- /.row -->
</div>
</div>	
  
  
	

<script src="{{asset('//code.jquery.com/jquery.js')}}"></script>
  <script src="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js')}}" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


	
  <script type="text/javascript">
  $(document).ready(function () {
    $("#showModal,#btnChiTietDeTai").click(function () {

      $('#myModal').modal('show')
    });
  });
  </script>

</body>
</html>