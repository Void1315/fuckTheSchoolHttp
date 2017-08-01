@extends('auth.layout.auth')
@section('forgot')
	<form action="{{url('forgot')}}" class="fh5co-form animate-box" data-animate-effect="fadeInRight" method="post">
	 {{ csrf_field() }}
		<h2>忘记密码</h2>
		<div class="form-group">
			<div class="alert alert-success" role="alert">把你的邮箱让我康康(震声)</div>
		</div>
		<div class="form-group">
			<label for="email" class="sr-only">邮箱</label>
			<input type="email" class="form-control" name="email" id="email" placeholder="邮箱" autocomplete="off">
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
			<p><a href="{{url('login')}}">登录</a> or <a href="{{url('login')}}">Sign Up</a></p>
		</div>
		<div class="form-group">
			<input type="submit" value="Send Email" class="btn btn-primary">
		</div>
	</form>
@endsection