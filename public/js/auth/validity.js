b_name = false;
b_email = false;
b_passwd = false;
b_rePasswd = false;
b_stunum = false;
b_stuPasswd = true;


function isEmail(str)//是否是邮箱
{
	var pattern = /\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}/;
	return pattern.test(str);
}
function isName(str)//昵称是否合法
{
	var pattern = /^[A-Za-z0-9_\-\u4e00-\u9fa5]{2,20}$/;
	return pattern.test(str);
}
function isPasswd(str)//密码6-20位
{
	var pattern = /^.{6,20}$/;
	return pattern.test(str);
}
function isRePasswd(str,str1)
{
	return (str==str);
}
function isStunum(str)
{
	var pattern = /^[20].[0-9]{8}$/;
	return pattern.test(str);
}
function isRegister(str,obj)//邮箱是否被注册
{
	if(isEmail(str))
	{
		$.ajax({
			url:isRegister_url,
			type:'post',
			data:{'email':str},
			dataType:'json',
			success:function(data)
			{
				if(data.type=='error')
				{
					if($(obj).next().attr('id')!='alert-box')
					{
						$(obj).after(addAlert('邮箱已被注册!'))
						b_email = false;
					}
				}
				else
				{
					b_email = true;
					$('#alert-box').remove();
				}
			},
			error:function(data)
			{
				layer.msg('出现了一些错误，请刷新!')
			},
		})
	}
	// console.log(str)
}
