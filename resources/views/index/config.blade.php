@extends('index.layout.layout')
@section('config')
<link rel="stylesheet" type="text/css" href="{{asset('css/index/config/base.css')}}">
<div class="container">
	<div class="">
		<div class="panel panel-primary">
			<div class=" panel-heading">
				修改你的个人资料
			</div>
			<div class="panel-body">
				<div class="info">
				<br>
					<form  role="form" class="form-horizontal" id='config-form'>
					{{ csrf_field() }}
						<div class="form-group config-box">
							<label for="name" class="col-sm-2 control-label">名称</label>
							<div class="col-sm-10">
								<span class="control-label the-data">
									{{$user->name}}
								</span>
								<span class="control-label config-pen">
									<a href="####" class="lnr lnr-pencil">修改</a>
								</span>
								<input type="text" class="form-control config-input" name='name' value="{{$user->name}}" id="name">
							</div>
						</div>
						<div class="form-group config-box">
							<label for="email" class="col-sm-2 control-label">电子邮箱</label>
							<div class="col-sm-10">
								<span class="control-label the-data">
									{{$user->email}}
								</span>
							</div>
						</div>
						<div class="form-group config-box">
							<label for="stu_num" class="col-sm-2 control-label">校园网账号</label>
							<div class="col-sm-10">
								<span class="control-label the-data">
									{{$user->stu_num}}
								</span>
								<span class="control-label config-pen">
									<a href="####" class="lnr lnr-pencil">修改</a>
								</span>
								<input type="text" class="form-control config-input" name='stu_num' value="{{$user->stu_num}}" id="stu_num">
							</div>
						</div>
						<div class="form-group config-box">
							<label for="stu_passwd" class="col-sm-2 control-label">校园网密码</label>
							<div class="col-sm-10">
								<span class="control-label the-data">
									**********
								</span>
								<span class="control-label config-pen">
									<a href="####" class="lnr lnr-pencil">修改</a>
								</span>
								<input type="password" class="form-control config-input" name='stu_passwd' value="{{$user->stu_passwd}}" id="stu_passwd">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$a_list = $('.config-pen>a')
	$input_list = $('.config-input')
	$input_list.blur(function()//失去焦点
	{
		$(this).css('display','none')
		$(this).prev().css('display','')
		$(this).prev().prev().css('display','block')
		post_ajax()
	})
	$a_list.click(function()//修改事件
	{
		$input = $(this).parent().next()
		$input.css('display','block')
		$input.focus()
		$(this).parent().prev().css('display','none')
		$(this).parent().css('display','none')
	})
	function post_ajax()
	{
		$.ajax(
		{
			url:"{{url('/config')}}",
			type:"post",
			dataType: "json",
			data:$('#config-form').serialize(),
			success:function(msg)
			{
				addAlertSuccess($('#config-form'),msg)
			},
			error:function(msg)
			{
				msg = JSON.parse(msg.responseText)
				addAlertError($('#config-form'),msg)
				
			},
		})
	}
	function addAlertError($obj,text)
	{
		$obj.prepend(
			" <div class='alert alert-danger  alert-dismissable'>"
						   +"<button type='button' class='close' data-dismiss='alert'"
	                    	+"aria-hidden='true'>"
	                    	+"&times;</button>"
	                    	+text
	                    	+"</div>"
			)
	}
	function addAlertSuccess($obj,text)
	{
		$obj_ = $obj.prepend(
			" <div class='alert alert-success  alert-dismissable'>"
						   +"<button type='button' class='close' data-dismiss='alert'"
	                    	+"aria-hidden='true'>"
	                    	+"&times;</button>"
	                    	+text
	                    	+"</div>"
			)
	}
</script>
@endsection