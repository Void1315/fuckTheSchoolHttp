<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Free Bootstrap Error Template</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <!-- FONT AWESOME CSS -->
    <link href="{{asset('css/404/font-awesome.min.css')}}" rel="stylesheet" />
    <!--GOOGLE FONT -->
    <!-- custom CSS here -->
    <link href="{{asset('css/404/style.css')}}" rel="stylesheet" />
</head>
<body>
    
   
<div class="container">
      
          <div class="row pad-top text-center">
                 <div class="col-md-6 col-md-offset-3 text-center">
                  <h1> 你做了什么</h1>
                   <h5> 现在返回正确网页</h5> 
              <span id="error-link"></span>
                     <h2>! 警告！出错了 !</h2>
</div>
        </div>

            <div class="row text-center">
                 <div class="col-md-8 col-md-offset-2">
                     <h3> <i  class="fa fa-lightbulb-o fa-5x"></i> </h3>
               <a href="{{url('/')}}" class="btn btn-primary">回到主页</a> 
             <br/><br/>
</div>
        </div>
    </div>
    <!-- /.container -->
    <!--Core JavaScript file  -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <!--bootstrap JavaScript file  -->
    <script src="{{asset('js/bootstrap.js')}}"></script>
     <!--Count Number JavaScript file  -->
    <script src="{{asset('js/404/countUp.js')}}"></script>
       <!--Custom JavaScript file  -->
    <script src="{{asset('js/404/custom.js')}}"></script>
</body>
</html>
