@extends('index.layout.layout')
@section('index')
<script type="text/javascript" src="{{asset('/js/index/base.js')}}"></script>
<h3 class="page-title">成绩</h3>
	<div class="panel panel-headline demo-icons" id='sim_table'>
			<div class="panel-body">
				<div class="">
					<div class="panel-heading">
						<form role="form"  class="form-inline center-block the-form" >
							<button onclick="transform_table(this);return false;" name='sim_table' class="btn btn-info btn-lg" style="background-color: #5bc0de;border-color: #46b8da;border: 1px solid transparent;">换至详图</button>
							<div class="form-group the-from-div ">
								<label for="name" class="">选择学期</label>
							    <select class="form-control the-tb-select" data='s_table' id='a_l_sel' onchange="changeTable(this)">
							    @if(isset($years))
									@foreach($years as $year)
											@if($terms[$loop->index]==1)
											<option value="{{$year}}-{{$terms[$loop->index]}}">
												{{$year}}-{{$year+1}}学年第二学期
											</option>
											@else
											<option value="{{$year}}-{{$terms[$loop->index]}}">
												{{$year}}-{{$year+1}}学年第一学期
											</option>
											@endif
									@endforeach
								@endif
							    </select>
							</div>
							<div class="form-group the-from-div">
								<label for="name" class="control-label">筛选条件</label>
							    <select class="form-control">
									<option>无</option>
								    <option>只看及格</option>
								    <option>只看挂科</option>
							    </select>
							</div>
						</form>
					</div>
					<div class="table-responsive">
						<table class=" table table-striped table-responsive table-hover" id='s_table'>
							<label>最后更新:{{$time}}</label>
							<thead>
							    <tr>
							      <th>课程名称</th>
							      <th>考核方式</th>
							      <th>修读性质</th>
							      <th>成绩</th>
							      <th>取得学分</th>
							    </tr>
							</thead>
							<tbody>
							@if(isset($results))
							    @foreach($results as $result)
	    				  		@if($result[8]==0)
					  			<tr class="danger">
						  		@else
							  		<tr>
							  	@endif
								@foreach($result as $i)
								@if(in_array($loop->index,[1,3,5,6,8]))
										<td>
											{{$i}}
										</td>
									@endif
								@endforeach
									</tr>
								@endforeach
							@endif
							</tbody>
						</table>
					</div>
				</div>
			</div>
	</div>
	
	<div class="panel panel-headline demo-icons" id='the_table' style="display: none;">
		<div class="panel-body">
			<div class="">
				<div class="panel-heading">
					<form role="form"  class="form-inline center-block the-form" >
						<button onclick="transform_table(this);return false;" name='the_table' class="btn btn-info btn-lg" style="background-color: #5bc0de;border-color: #46b8da;border: 1px solid transparent;">换至简图</button>
						<div class="form-group the-from-div ">
							<label for="name" class="">选择学期</label>
						    <select class="form-control the-tb-select" data='b_table' onchange="changeTable(this)">
						    @if(isset($years))
								@foreach($years as $year)
								@foreach($terms as $term)
								@if($term==1)
								<option value="{{$year}}-{{$term}}">
									{{$year}}-{{$year+1}}学年第二学期
								</option>
								@else
								<option value="{{$year}}-{{$term}}">
									{{$year}}-{{$year+1}}学年第一学期
								</option>
								@endif
								@endforeach
								@endforeach
							@endif
						    </select>
						</div>
						<div class="form-group the-from-div">
							<label for="name" class="control-label">筛选条件</label>
						    <select class="form-control">
						      <option>无</option>
						      <option>只看及格</option>
						      <option>只看挂科</option>
						    </select>
						</div>
					</form>
				</div>
				<div class="table-responsive">
					<table class=" table table-striped table-responsive table-hover" id='b_table'>
						<label>最后更新:{{$time}}</label>
						<thead>
						    <tr>
						      <th>课程名称</th>
						      <th>学分</th>
						      <th>类别</th>
						      <th>考核方式</th>
						      <th>修读性质</th>
						      <th>成绩</th>
						      <th>取得学分</th>
						      <th>绩点</th>
						      <th>学分绩点</th>
						      <th>备注</th>
						    </tr>
						</thead>
					  	<tbody>
				  	@if(isset($results))
				  		@foreach($results as $result)
				  		@if($result[9]==0)
				  			<tr class="danger">
				  		@else
					  		<tr>
					  	@endif
							@foreach($result as $i)
							@if(!$loop->first)
								<td>
									{{$i}}
								</td>
							@endif
							@endforeach
							</tr>
						@endforeach
					@endif
					    </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	
	<script type="text/javascript">

		
		function addSelect(year,term,$select_obj,first)
		{

			str = "<option value="+year+"-"+term+">"+year+"-"+(Number(year)+1)+"学年第二学期</option>"
			if(first)
			{
				str = "<option selected='selected' value='"+year+"-"+term+"''>"+year+"-"+(Number(year)+1)+"学年第"+term+"学期</option>"
			}
			$select_obj.append(str)
		}
		function changeTable(obj)
		{
			data = obj.value;
			console.log(data)
			$.ajax({
				url:"{{url('/')}}/",
				type:'post',
				data:{'_token':'{{csrf_token()}}','time':data},
				dataType:'json',
				success:function(data)
				{
					if(data.type=='success')
					{
						time = data.updated_at
						data = data.result
						data = JSON.parse(data);
						the_obj = new TableReplace(data,$("#"+obj.getAttribute('data')));
						the_obj.repalce();
						the_obj.setTime(time);
					}
				},
				error:function(data)
				{
					console.log(data);
				}
			});
		}

		function setTime()
		{
			$.ajax({
				url:"{{url('/settime')}}",
				type:'post',
				data:{'_token':'{{csrf_token()}}'},
				dataType:'json',
				success:function(data)
				{
					if(data.type=='success')
					{
						for(i=0;i<data.year.length;i++)
							addSelect(data.year[i],data.term[i],$(".the-tb-select"),true)
					}
				}
			})
		}
	    $('#b_table').DataTable(
	    	{
	    		"info": false,
	    		"jQueryUI": true,
	    		"paging": false,
	    		"searching": false,
	    		"processing": true
	    	});

	    $('#s_table').DataTable(
	    	{
	    		"info": false,
	    		"jQueryUI": true,
	    		"paging": false,
	    		"searching": false,
	    		"processing": true
	    	});
		function transform_table(obj) 
		{
			delay = '1.5s';
			table = $('#'+obj.name)
			table.css('transition',delay)
			table.css('transform','rotateY(90deg)')
			setTimeout(function()
				{
					table.css('display','none')
					add_table = (obj.name=='sim_table'?'the_table':'sim_table')
					addTable(add_table)
				},1500)
		}
		function addTable(the_table)
		{
			the_table = $('#'+the_table)
			the_table.css('transform','rotateY(90deg)')
			the_table.css('transition','1.5s')
			the_table.css('display','block')
			the_table.css('display')
			the_table.css('transform','rotateY(0deg)')
		}
		function getData_(index)
			{
				$.ajax({
					url:"{{url('/getResults')}}",
					data:{'_token':'{{csrf_token()}}'},
					type:'get',
					dataType:'json',
					success:function(data)
					{
						layer.close(index)
						setTime()
						changeTable($('#a_l_sel')[0])
						if(data.type=='error')
							layer.msg('密码错误',{icon:5})
					},
					error:function(data)
					{
						layer.close(index)
						layer.msg('错误，请刷新',{icon:5})
					}
				})
			}
		function ajaxGetReuslt()
		{
			var index;
			var i_ = $('#s_table>tbody').children();
			if(i_.length==1)
			{
				index = layer.msg('初次读取成绩可能需要1-2分钟',{
						icon: 16,
						shade: 0.3,
						time:120*1000
						});
				getData_(index);
			}
		}
		ajaxGetReuslt()
	</script>
@endsection