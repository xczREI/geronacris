$(document).ready(function(){


    $("#psw1").keypress(function(){

    var x = $("#psw1").val();

	  if(x.length != 3){ $("span").text("*Password minimum only of 4 lenght!"); }
	  else if(x.length == 3){ $("span").text(""); }

   });

     $("#psw22").keypress(function(){

    var x = $("#psw1").val();
    var y = $("#psw22").val();
    
	  if(x != y){  document.getElementById("btnadd").disabled = true; }
	  else if(x == y){ document.getElementById("btnadd").disabled = false; }

   });

});



