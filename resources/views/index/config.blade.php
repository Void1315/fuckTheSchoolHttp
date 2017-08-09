@extends('index.layout.layout')
@section('config')
<link rel="stylesheet" type="text/css" href="{{asset('css/index/config/base.css')}}">
<script type="text/javascript">

function configClick(obj)
	{
		//修改事件\a
		alert(1);
		if($(obj).attr("id")!='a_passwd')
		{
			$input = $(obj).parent().next();
			$input.css('display','block');
			$input.focus();
			$(obj).parent().prev().css('display','none');
			$(obj).parent().css('display','none');
		}
	}


</script>
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
									<a class="lnr lnr-pencil" onclick="configClick(this)">修改</a>
								</span>
								<input type="text" class="form-control config-input" name='name' value="{{$user->name}}" id="name" onblur="inputBlur(this)">
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
									<a class="lnr lnr-pencil" onclick="configClick(this)">修改</a>
								</span>
								<input type="text" class="form-control config-input" name='stu_num' value="{{$user->stu_num}}" id="stu_num" onblur="inputBlur(this)">
							</div>
						</div>
					</form>
					<form role="form" class="form-horizontal" id='stu-from'>
						{{ csrf_field() }}
						<div class="form-group config-box">
							<label for="stu_passwd" class="col-sm-2 control-label">校园网密码</label>
							<div class="col-sm-10">
								<span class="control-label the-data">
									**********
								</span>
								<span class="control-label config-pen">
									<a class="lnr lnr-pencil" onclick="stu_pass(this)">修改</a>
								</span>
								<input type="text" class="form-control config-input" name='stu_passwd' id="stu_passwd" onblur="inputBlur(this)">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function inputBlur(obj)
	{
		$(obj).css('display','none');
		$(obj).prev().css('display','');
		$(obj).prev().prev().css('display','block');
		if($(obj).attr("id")!='stu_passwd')
			post_ajax(url="{{url('/config')}}",obj);
		else
			post_ajax(url="{{url('/config/stupasswd')}}",obj,"stu-from");
	}
	

	function stu_pass(data)
	{
		$input = $('#stu_passwd');
		$input.css('display','block');
		$input.val(data);
		$input.focus();
		
		$input.prev().prev().css('display','none');
		$input.prev().css('display','none');
	}
	function config_stu()
	{
		layer.prompt({
			title: '输入您的登录密码:', 
			formType: 0,
			},function(pass, index){
				index_ = layer.open({
					type:3,
					time: 10*1000,
				})
				$.ajax({
					url:"{{url('/auth')}}",
					data:{'_token':'{{csrf_token()}}','passwd':pass},
					type:'post',
					success:function(data){
						layer.close(index_);
						layer.msg("成功验证！");
						layer.close(index);
						stu_pass(data);
					},
					error:function(data)
					{
						data = JSON.parse(data.responseText);
						layer.close(index_);
						layer.msg(data.name);
					}
				})
			  }
			);
	}
	function post_ajax(url,obj,from='config-form')
	{
		$.ajax(
		{
			url:url,
			type:"post",
			dataType: "json",
			data:$('#'+from).serialize(),
			success:function(msg)
			{
				addAlertSuccess($('#config-form'),msg);
				val = $(obj).val();
				$obj = $(obj).prev().prev();
				$obj[0].innerText=val;
			},
			error:function(msg)
			{
				msg = JSON.parse(msg.responseText);
				addAlertError($('#config-form'),msg);
			},
		});
	}
</script>
@endsection