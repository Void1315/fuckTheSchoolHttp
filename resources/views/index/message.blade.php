@extends('index.layout.layout')
@section('message')
<link rel="stylesheet" type="text/css" href="{{url('css/index/message/message.css')}}">
	<div class="main-content">
	    @if (count($errors) > 0)
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-heading serch-box">
						<div class="message-item clearfix ">
							<div class="col-lg-8">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="搜索留言" aria-label="搜索留言" id='serch-input'>
									<span class="input-group-btn">
										<button class="btn btn-primary" type="button" onclick="serch_msg($('#serch-input'))">走你</button>
									</span>
								</div>
							</div>
						</div>
							<button class="btn btn-default" type="button" onclick="wirteMessage()">
								写留言
							</button>
					</div>
				</div>
			</div>
			@foreach($messages as $message)
				@php
					if(!isset($index)||$index==0)
					{
						$index = rand(2,4);
						$conten = 12;
						$min = 2;
						$max = $conten-($index-1)*2;
						$first = true;
					}
				@endphp
				@if($index>0)
					@php
						$max = $conten-($index-1)*2;
						$j = rand($min,$max);
						if($index==1)
						{
							$j = $conten;
						}
						$conten = $conten-$j;
						$index = $index-1;
					@endphp
					@php
						if($first)
						{
							$first = false;
							echo "<div class='row'>";
						}
					@endphp
					<div class="col-md-{{$j}}">
						<div class="panel panel-headline">
							<div class="panel-heading">
								<div class="right">
									<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
									<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
								</div>
								<h3 class="panel-title">{{$message->title}}</h3>
								<p class="panel-subtitle">最后更新于:{{$message->updated_at}}</p>
							</div>
							<div class="panel-body">
								<p>{{$message->content}}</p>
							</div>
						</div>
					</div>
					@php
						if($index==0)
						{
							echo "</div>";
						}
					@endphp
				@endif
			@endforeach
		</div>
	</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">添加留言</h4>
            </div>
            <div class="modal-body">
            	<form role='form' method="post" action="{{url('/addMessage')}}">
            		{{ csrf_field() }}
            		<div class="form-group">
					    <label for="title">标题</label>
					    <input type="text" class="form-control" id="title" name="title" placeholder="请输入标题">
					</div>
					<div class="form-group">
						<label for="text">内容</label>
					    <textarea class="form-control" rows="3" placeholder="请输入内容" name='text'></textarea>
					</div>
					<button type="submit" class="btn btn-primary">添加留言</button>
            	</form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<script type="text/javascript">
	function wirteMessage()
	{
		$('#myModal').modal()
	}
	function serch_msg($obj)
	{
		// var str = $obj.val().trim()//去首尾空格
		// $.ajax({
		// 	url:"{{url('/')}}",
		// 	type:'post',
		// 	dataType:'json',
		// 	success:function()
		// 	{

		// 	},
		// 	error:function()
		// 	{
				
		// 	}
		// })
		layer.msg('这个功能还没写...')
	}
</script>
@endsection