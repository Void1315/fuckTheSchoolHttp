<!doctype html>
<html>
<head>
	<title>Dashboard | Klorofil - Free Bootstrap Dashboard Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	
	
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('/assets/vendor/linearicons/style.css')}}">
	<link rel="stylesheet" href="{{asset('/assets/vendor/chartist/css/chartist-custom.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('/assets/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{asset('/assets/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('/assets/img/apple-icon.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('/assets/img/favicon.png')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('/css/base.css')}}">
	<!-- 表格排序插件 -->
	<script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="{{asset('/css/table/jquery.dataTables.css')}}">
	<script type="text/javascript" charset="utf8" src="{{asset('/js/table/jquery.dataTables.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{asset('/css/index/base.css')}}">
	<script type="text/javascript" src="{{asset('js/layer/layer.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/index/layout.js')}}"></script>
</head>
<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="{{url('/index')}}"><img src="{{asset('img/index/logo-dark.png')}}" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>帮助</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#">关于查成绩</a></li>
								<li><a href="#">关于评教</a></li>
								<li><a href="#">关于选课</a></li>
								<li><a href="#">关于作者</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('img/index/user.png')}}" class="img-circle" alt="Avatar"> <span>{{$user->name}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="{{asset('/config')}}"><i class="lnr lnr-cog"></i> <span>账号设置</span></a></li>
								<li><a href="####" onclick="isLogout()"><i class="lnr lnr-exit"></i> <span>退出</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						@include('index.layout.nav')
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					@yield('index')
					@yield('config')


				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="#" target="_blank">Theme I Need</a>. All Rights Reserved. More Templates  - Collect from </p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
	<script src="{{asset('/assets/vendor/chartist/js/chartist.min.js')}}"></script>
	<script src="{{asset('/assets/scripts/klorofil-common.js')}}"></script>
	<script type="text/javascript">
		function isLogout()//是否退出
		{
			layer.confirm('是否退出?', {icon: 3, title:'提示'}, function(index){
			  layer.close(index);
			  window.location.href="{{url('/logout')}}"; 
			});
		}
	</script>
</body>

</html>
