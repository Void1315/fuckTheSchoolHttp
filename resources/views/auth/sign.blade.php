@extends('auth.layout.auth')
@section('sign')
<form action="{{url('login')}}" class="fh5co-form animate-box" data-animate-effect="fadeInRight" method="post">
 {{ csrf_field() }}
	<h2>登录</h2>
	<div class="form-group">
		<label for="email" class="sr-only">邮箱</label>
		<input type="email" class="form-control" id="email" name='email' value="{{ old('email') }}" placeholder="邮箱" autocomplete="off">
	</div>
	<div class="form-group">
		<label for="password" class="sr-only">密码</label>
		<input type="password" class="form-control" id="password" name="password" placeholder="密码" autocomplete="off">
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
		<label for="remember"><input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> 记住我</label>
	</div>
	<div class="form-group">
		<p>没有注册？现在 <a href="{{url('/register')}}">注册</a> | <a href="{{url('/forgot')}}">忘记密码？点这里</a></p>
	</div>
	<div class="form-group">
		<input type="submit" value="登录" class="btn btn-primary">
	</div>
</form>
@endsection