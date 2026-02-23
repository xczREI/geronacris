function isTextKey(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode
	if(charCode < 60 &&(charCode > 47 && charCode < 60))
		return false;

	return true;
}