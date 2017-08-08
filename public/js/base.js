function addAlert(str)
{
	var alert_ = "<div class='alert alert-danger' id='alert-box'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>警告</strong>"+str+"</div>";
	return alert_;
}
function addAlertError($obj,text)
{
	$obj.prepend(
		" <div class='alert alert-danger  alert-dismissable'>"
					   +"<button type='button' class='close' data-dismiss='alert'"
                    	+"aria-hidden='true'>"
                    	+"&times;</button>"
                    	+text
                    	+"</div>"
		)
}
function addAlertSuccess($obj,text)
{
	$obj_ = $obj.prepend(
		" <div class='alert alert-success  alert-dismissable'>"
					   +"<button type='button' class='close' data-dismiss='alert'"
                    	+"aria-hidden='true'>"
                    	+"&times;</button>"
                    	+text
                    	+"</div>"
		)
}