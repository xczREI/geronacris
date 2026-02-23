$(document).ready(function(){

  $("#attenda").click(function(){
  	document.getElementById("attendb").checked = false;
    document.getElementById("attendc").checked = false;
    document.getElementById("attendd").checked = false;
    document.getElementById("attende").checked = false;
  });
  $("#attendb").click(function(){
    document.getElementById("attenda").checked = false;
    document.getElementById("attendc").checked = false;
    document.getElementById("attendd").checked = false;
    document.getElementById("attende").checked = false;
  });
  $("#attendc").click(function(){
  	document.getElementById("attenda").checked = false;
    document.getElementById("attendb").checked = false;
    document.getElementById("attendd").checked = false;
    document.getElementById("attende").checked = false;
  });
  $("#attendd").click(function(){
  	document.getElementById("attenda").checked = false;
    document.getElementById("attendb").checked = false;
    document.getElementById("attendc").checked = false;
    document.getElementById("attende").checked = false;

  });
  $("#attende").click(function(){
    document.getElementById("attenda").checked = false;
    document.getElementById("attendb").checked = false;
    document.getElementById("attendc").checked = false;
    document.getElementById("attendd").checked = false;
  });

});