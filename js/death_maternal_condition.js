$(document).ready(function(){

  $("#not_labour").click(function(){
  	document.getElementById("in_labour").checked = false;
    document.getElementById("less_than_42").checked = false;
    document.getElementById("42_days").checked = false;
    document.getElementById("none_choices").checked = false;
  });
  $("#in_labour").click(function(){
    document.getElementById("not_labour").checked = false;
    document.getElementById("less_than_42").checked = false;
    document.getElementById("42_days").checked = false;
    document.getElementById("none_choices").checked = false;
  });
  $("#less_than_42").click(function(){
  	document.getElementById("not_labour").checked = false;
    document.getElementById("in_labour").checked = false;
    document.getElementById("42_days").checked = false;
    document.getElementById("none_choices").checked = false;
  });
  $("#42_days").click(function(){
  	document.getElementById("not_labour").checked = false;
    document.getElementById("in_labour").checked = false;
    document.getElementById("less_than_42").checked = false;
    document.getElementById("none_choices").checked = false;
  });
  $("#none_choices").click(function(){
    document.getElementById("not_labour").checked = false;
    document.getElementById("in_labour").checked = false;
    document.getElementById("less_than_42").checked = false;
    document.getElementById("42_days").checked = false;
  });

/*  $("#defaultCheck1lbl").click(function(){
        $("#defaultCheck1lbl").css("color", "red");
  });*/


});