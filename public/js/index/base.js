function TableReplace(data,$the_table)//表格替换类
{
	this.data = data
	this.$the_body = $the_table.find('tbody')
	this.delet = function()
	{
		this.$the_body.empty()//移除全部节点
	}
	this.addSimple = function()
	{
		for(i in this.data)
		{
			if(this.data[i][8]==0)
				this.$the_body.append("<tr class='danger'></tr>")
			else
				this.$the_body.append("<tr></tr>")
			tr = this.$the_body[0].lastChild
			console.log(tr)
			for(j in this.data[i])
			{
				if($.inArray(j,['1','3','5','6','8'])<=-1)
					continue
				$(tr).append("<td>"+this.data[i][j]+"</td>")
			}
		}
	}
	this.addComplex = function()
	{
		for(i in this.data)
		{
			if(this.data[i][9]==0)
				this.$the_body.append("<tr class='danger'></tr>")
			else
				this.$the_body.append("<tr></tr>")
			tr = this.$the_body[0].lastChild
			console.log(tr)
			for(j in this.data[i])
			{
				if(j==0)
					continue
				$(tr).append("<td>"+this.data[i][j]+"</td>")
			}
		}
	}
	this.add = function()
	{
		if($the_table.find('th').length<10)
			this.addSimple()
		else
			this.addComplex()
	}
	this.setTime = function(time_obj)
	{
		lable = $($the_table.parent()).prev()
		lable[0].innerHTML = "最后更新:"+time_obj.date.split('.')[0]
		console.log(time_obj)
	}
	this.repalce = function()//替换
	{
		this.delet()
		this.add()
	}
}
