@extends('auth.layout.auth')
@section('forgot')
	<form role='form' action="{{url('forgot')}}" class="fh5co-form animate-box" data-animate-effect="fadeInRight" method="post" id='forgot-form'>
	 {{ csrf_field() }}
		<h2>忘记密码</h2>
		<div class="form-group">
			<div class="alert alert-success" role="alert">把你的邮箱让我康康(震声)</div>
		</div>
		<div class="form-group">
			<label for="email" class="sr-only">邮箱</label>
			<input type="email" class="form-control" name="email" id="email" placeholder="邮箱" autocomplete="off">
		</div>
	<div class="form-group">
			<label for="stu_num" class="sr-only">学号</label>
			<input id="stu_num" type="text" class="form-control " value="{{ old('stu_num') }}" name="stu_num"  placeholder="学号(例2016010321)" autocomplete="off">
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
			<p><a href="{{url('login')}}">登录</a> or <a href="{{url('register')}}">注册</a></p>
		</div>
		<div class="form-group">
			<input type="button" id="forgotPasswd" value="重置密码" class="btn btn-primary" onclick="sendCode()">
		</div>
	</form>
<script type="text/javascript">
	function sendCode()
	{
		if(isEmail($('#email').val())&&isStunum($('#stu_num').val()))
		{
			$.ajax({
				url:"{{url('/forgot')}}",
				data:{'_token':"{{csrf_token()}}",'email':$('#email').val(),'stu_num':$('#stu_num').val()},
				type:'post',
				dataType:'json',
				success:function(data)
				{
					console.log(data)
					if(data.type=='error')
					{
						layer.alert('邮箱与学号不匹配', {icon: 5});
					}
					else//匹配成功
					{
						layer.alert('邮件已发送，请在邮箱中确认')
					}
				},
				error:function(data)
				{
					data = JSON.parse(data.responseText)
					for(var i in data)
						addAlertError($('#forgot-form'),data[i].toString())
				}
			})
		}
		else
		{
			layer.msg('请按规则填写')
		}
	}
</script>
@endsection