function addAlert(str)
{
	var alert_ = "<div class='alert alert-danger' id='alert-box'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>警告</strong>"+str+"</div>";
	console.log(alert_)
	return alert_;
}