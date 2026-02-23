$(document).ready(function(){
	
	var d = new Date();
	var months = ["January","Febrary","March","April","May","June","July","August","September","October","November","December"];

	document.getElementById("date").value = months[d.getMonth()] + ' ' + d.getDate() + ', ' + d.getFullYear();

});
