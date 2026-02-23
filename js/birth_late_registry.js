$(document).ready(function(){

$("#married").click(function(){
    document.getElementById("not_married").checked = false;
  });
$("#not_married").click(function(){
	document.getElementById("married").checked = false;
  });

$("#my_birth").click(function(){
    document.getElementById("the_birth").checked = false;
  });

$("#the_birth").click(function(){
    document.getElementById("my_birth").checked = false;
  });


});