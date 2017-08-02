addCss()
configCarousel();
function addCss()
{
	$li_list = $('.the-carousel li');
	for(var i=0;i<$li_list.length;i++)
	{
		$($li_list[i]).css('background-image',"url({{asset('/img/Carousel/"+i+".jpg')}})");
	}
}
function configCarousel()//轮播
{
	$li_list = $('.the-carousel li');
	$li_list.css('opacity','0');
	var i = parseInt(Math.random()*5);
	$($li_list[i]).css('display','block');
	setTimeout(function()
		{
			$($li_list[i]).css('opacity','1');
		}
		,0)
	setTimeout("configCarousel()",5000);
}