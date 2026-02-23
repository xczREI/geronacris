function isTextNoKey(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode
	if(charCode > 62 && (charCode > 65 || charCode < 122))
		return false;

	return true;
}