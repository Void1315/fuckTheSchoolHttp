<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>登录</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="Robots" contect= "all">
	<meta name="KEYWords" contect="河南科技学院教务管理">
  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('css/auth/animate.css')}}">
	<link rel="stylesheet" href="{{asset('css/auth/style.css')}}">
	<!-- jQuery -->
	<script type="text/javascript">
		isRegister_url = "{{url('/validity')}}"
	</script>


	
	<script src="{{asset('js/jquery.min.js')}}"></script>
	<!-- Bootstrap -->
	<script type="text/javascript" src="{{asset('js/base.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<!-- Modernizr JS -->
	<script src="{{asset('js/auth/modernizr-2.6.2.min.js')}}"></script>

	<script type="text/javascript" src="{{asset('js/yanzheng/gt.js')}}"></script>

	<script type="text/javascript" src="{{asset('js/layer/layer.js')}}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<script type="text/javascript" src="{{asset('js/auth/validity.js')}}"></script>

	<style type="text/css">
		body.style-3 {
		  background: #ffffff url({{asset('img/auth/geometry2.png')}}) repeat;
		}
	</style>

	</head>
	<body class="style-3">

		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-push-8">
					<!-- Start Sign In Form -->
					@yield('register')
					@yield('sign')
					@yield('forgot')
					<!-- END Sign In Form -->
				</div>
			</div>

		</div>
	
	<!-- Placeholder -->
	<script src="{{asset('js/auth/jquery.placeholder.min.js')}}"></script>
	<!-- Waypoints -->
	<script src="{{asset('js/auth/jquery.waypoints.min.js')}}"></script>
	<!-- Main JS -->
	<script src="{{asset('js/auth/main.js')}}"></script>
	</body>
</html>

