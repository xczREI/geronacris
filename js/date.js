$(document).ready(function(){
	
	var d = new Date();

	//months
	var months = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
	document.getElementById("m").innerHTML = months[d.getMonth()];
	//days
	document.getElementById("d").innerHTML = d.getDate();
	var days = ["(Sun)", "(Mon)", "(Tue)", "(Wed)", "(Thu)", "(Fri)", "(Sat)"];
	document.getElementById("dd").innerHTML = days[d.getDay()];
	//years
	document.getElementById("y").innerHTML = d.getFullYear();

});
