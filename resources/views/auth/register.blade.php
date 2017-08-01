@extends('auth.layout.auth')
@section('register')
<form action="{{url('register')}}" class="fh5co-form animate-box" data-animate-effect="fadeInRight" method="post">
 	{{ csrf_field() }}
	<h2>注册</h2>
	<div class="form-group">
		<label for="name" class="sr-only">昵称</label>
		<input type="text" class="form-control"  value="{{ old('name') }}" name="name" id="name" placeholder="昵称" autocomplete="off">
	</div>
	<div class="form-group">
		<label for="email" class="sr-only">邮箱</label>
		<input type="email" class="form-control" value="{{ old('email') }}" name="email" id="email" placeholder="邮箱" autocomplete="off">
	</div>
	<div class="form-group">
		<label for="password" class="sr-only">密码</label>
		<input type="password" class="form-control" name="password" id="password" placeholder="密码" autocomplete="off">
	</div>
	<div class="form-group">
		<label for="re-password" class="sr-only">再次输入密码</label>
		<input type="password" class="form-control" name='repassword' id="re-password" placeholder="再次输入密码" autocomplete="off">
	</div>
	<div class="form-group">
			<label for="stu_num" class="sr-only">学号</label>
            <input id="stu_num" type="text" class="form-control " value="{{ old('stu_num') }}" name="stu_num" required placeholder="学号" autocomplete="off">
    </div>
    <div class="form-group">
    	<label for="stu_passwd" class="sr-only">校园网密码</label>
            <input id="stu_passwd" type="password" class="form-control" name="stu_passwd" required placeholder="校园网密码" autocomplete="off">
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
		<p>已经注册？ <a href="{{url('/login')}}">登录</a></p>
	</div>
	<div class="form-group">
		<input type="submit" value="立即注册" class="btn btn-primary">
	</div>
</form>
@endsection