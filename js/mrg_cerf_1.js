$(document).ready(function(){

$("#mrg_license").click(function(){
    document.getElementById("no_license").checked = false;
    document.getElementById("the_marriage").checked= false;
  });
$("#no_license").click(function(){
	document.getElementById("mrg_license").checked = false;
    document.getElementById("the_marriage").checked= false;
  });
$("#the_marriage").click(function(){
	document.getElementById("mrg_license").checked = false;
    document.getElementById("no_license").checked= false;
  });
$("#have_enter").click(function(){
	document.getElementById("not_enter").checked = false;
  });
$("#not_enter").click(function(){
	document.getElementById("have_enter").checked = false;
  });
 
});