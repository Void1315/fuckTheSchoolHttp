@extends('index.layout.layout')
@section('message')
<link rel="stylesheet" type="text/css" href="{{url('css/index/message/message.css')}}">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-heading serch-box">
						<div class="message-item clearfix ">
							<div class="col-lg-8">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="搜索留言" aria-label="搜索留言">
									<span class="input-group-btn">
										<button class="btn btn-primary" type="button">走你</button>
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
	<script type="text/javascript">
		function wirteMessage()
		{
			index = layer.open({
				type:1,
				content:,
				
			})
		}
	</script>
@endsection