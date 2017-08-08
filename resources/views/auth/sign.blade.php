@extends('auth.layout.auth')
@section('sign')
<form action="{{url('login')}}" class="fh5co-form animate-box"  method="post" id='theform'>
 {{ csrf_field() }}
	<h2>登录</h2>
	<div class="form-group">
		<label for="email" class="sr-only">邮箱</label>
		<input type="email" class="form-control" id="email" name='email' value="{{ old('email') }}" placeholder="邮箱" autocomplete="off">
	</div>
	<div class="form-group">
		<label for="password" class="sr-only" >密码</label>
		<input type="password" class="form-control" id="password" name="password" placeholder="密码" autocomplete="off" >
	</div>
	<div class="form-group"  id='a'>
		
	</div>
	    @if (count($errors) > 0)
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
	<div class="form-group"  >
		<label for="remember"><input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> 记住我</label>
	</div>
	<div class="form-group">
		<p>没有注册？现在 <a href="{{url('/register')}}">注册</a> | <a href="{{url('/forgot')}}">忘记密码？点这里</a></p>
	</div>
	<div class="form-group">
		<button value="登录" type="button" class="btn btn-primary" id='login-btn' onclick="verification()">登录</button>
	</div>
</form>
<script type="text/javascript">
		isverifica = false;
		var handlerEmbed = function (captchaObj) {
	        // 将验证码加到id为captcha的元素里，同时会有三个input的值：geetest_challenge, geetest_validate, geetest_seccode
	        captchaObj.appendTo("#a");
	        captchaObj.bindForm('#theform');
	        captchaObj.onSuccess(function(){
	        	isverifica = true;
	        })
	    };
		 $.ajax({
        // 获取id，challenge，success（是否启用failback）
        url: "{{url('/geet')}}?t=" + (new Date()).getTime(), // 加随机数防止缓存
        type: "get",
        dataType: "json",
        success: function (data) {
            // 使用initGeetest接口
            // 参数1：配置参数
            // 参数2：回调，回调的第一个参数验证码对象，之后可以使用它做appendTo之类的事件
            initGeetest({
                gt: data.gt,
                challenge: data.challenge,
                new_captcha: data.new_captcha,
                 width: '100%',
                product: "embed", // 产品形式，包括：float，embed，popup。注意只对PC版验证码有效
                offline: !data.success // 表示用户后台检测极验服务器是否宕机，一般不需要关注
                // 更多配置参数请参见：http://www.geetest.com/install/sections/idx-client-sdk.html#config
            }, handlerEmbed);
        }
    });
	function verification()
	{
		if(!isverifica)
		{
			layer.msg('请先完成验证')
		}
		else
		{
			$('#theform').submit();
		}
	}
</script>
@endsection