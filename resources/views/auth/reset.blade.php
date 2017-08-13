@extends('auth.layout.auth')
@section('reset')
<form action="{{url('/updatePasswd')}}" class="fh5co-form animate-box"  method="post" id='theform'>
 {{ csrf_field() }}
	<h2>重置密码</h2>
	<div class="form-group">
		<label for="password" class="sr-only">密码</label>
		<input type="password" class="form-control" id="password" name='password' placeholder="密码">
	</div>
	<div class="form-group">
		<label for="repassword" class="sr-only" >再次输入</label>
		<input type="password" class="form-control" id="repassword" name="repassword" placeholder="再次输入">
	</div>
	<div class="hidden">
		<input type="text" name="email" value="{{$email}}">
	</div>
	<div class="hidden">
		<input type="text" name="code" value="{{$code}}">
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

	<div class="form-group">
		<button value="重置密码并登录" type="button" class="btn btn-primary" id='login-btn' onclick="updatePass()">重置密码并登录</button>
	</div>
</form>
<script type="text/javascript">
	function updatePass()
	{
		if($('#password').val()!=$('#repassword').val())
		{
			layer.msg('两次输入密码不一致');
			return ;
		}
		else if(!isPasswd($('#password').val()))
		{
			layer.msg('密码为6-20位')
		}
		else
		{
			$('#theform').submit()
		}
	}
</script>
@endsection