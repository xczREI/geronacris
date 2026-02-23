$(document).ready(function(){

$("#attend").click(function(){
    document.getElementById("notattend").checked = false;
  });
$("#notattend").click(function(){
	document.getElementById("attend").checked = false;
  });
 
});