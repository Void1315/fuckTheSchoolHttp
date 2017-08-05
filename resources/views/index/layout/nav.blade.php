
<li><a href="{{url('/index')}}" class="{{$nav['index'] or ''}}"><i class="lnr lnr-home"></i> <span>主页</span></a></li>
	<li>
		<a href="#subPages" data-toggle="collapse" class="{{$nav['edu']['eval'] or 'collapsed'}}"><i class="lnr lnr-file-empty"></i> <span>教务处理</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
		<div id="subPages" class="collapse {{$nav['edu']['edu'] or ''}}">
			<ul class="nav">
				<li><a href="#" class="{{$nav['edu']['eval'] or ''}}" onclick="nomore()">评教</a></li>
				<li><a href="#" class="{{$nav['edu']['course'] or ''}}" onclick="nomore()">选课</a></li>
				<li><a href="#" class="{{$nav['edu']['other'] or ''}}" onclick="nomore()">还有啥?</a></li>
			</ul>
		</div>
	</li>
	<li><a href="{{url('/message')}}" class="{{$nav['message'] or ''}}"><i class="lnr lnr-highlight"></i> <span>留言板</span></a></li>
	<li><a href="{{asset('/config')}}" class="{{$nav['cofig'] or ''}}" ><i class="lnr lnr-cog"></i> <span>账号管理</span></a></li>
<li><a href="####" class="{{$nav['about'] or ''}}" onclick="theabout()"><i class="lnr lnr-smile"></i> <span>关于本站</span></a></li>
<script type="text/javascript">
	function theabout()
	{
		index = layer.open({
			type:2,
			title:'关于本站',
			area:['auto', '300px'],
			content:"{{url('/about')}}",
			shade:0.3,
			shadeClose:true,
			resize:true,
			scrollbar:false,

		})
	}
</script>