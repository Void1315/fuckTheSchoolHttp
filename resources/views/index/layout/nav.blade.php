
<li><a href="{{url('/index')}}" class="{{$nav['index'] or ''}}"><i class="lnr lnr-home"></i> <span>主页</span></a></li>
	<li>
		<a href="#subPages" data-toggle="collapse" class="{{$nav['edu']['eval'] or 'collapsed'}}"><i class="lnr lnr-file-empty"></i> <span>教务处理</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
		<div id="subPages" class="collapse {{$nav['edu']['edu'] or ''}}">
			<ul class="nav">
				<li><a href="#" class="{{$nav['edu']['eval'] or ''}}">评教</a></li>
				<li><a href="#" class="{{$nav['edu']['course'] or ''}}" >选课</a></li>
				<li><a href="#" class="{{$nav['edu']['other'] or ''}}" >还有啥?</a></li>
			</ul>
		</div>
	</li>
	<li><a href="notifications.html" class="{{$nav['message'] or ''}}" ><i class="lnr lnr-highlight"></i> <span>留言板</span></a></li>
	<li><a href="{{asset('/config')}}" class="{{$nav['cofig'] or ''}}" ><i class="lnr lnr-cog"></i> <span>账号管理</span></a></li>
<li><a href="icons.html" class="{{$nav['about'] or ''}}" ><i class="lnr lnr-smile"></i> <span>关于本站</span></a></li>
