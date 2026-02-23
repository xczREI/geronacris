function pswfunction1() {
  var message, x, y, z, adps, adpassid;

      message = document.getElementById("psw1error");
      message.innerHTML = "";

      x = $("#psw1").val();
      y = $("#psw22").val();

      if(x.length < 3){ message.innerHTML = "Atleast 4 characters"; }
      else{ message.innerHTML = ""; }
 }

   function pswfunction2() {
      var message, x, y, z;

      message = document.getElementById("psw1error");
      message.innerHTML = "";
      
      x = document.getElementById("psw1").value;
      y = document.getElementById("psw22").value;

      if(x == y){ message.innerHTML = "Password match"; }
      else{ message.innerHTML = "Password do not match"; }
}

$(document).ready(function(){
  $("#psw22").keyup(pswfunction2);
})

$("#addusrs_form").submit(function(){
	var message, x, y, z, adps, adpassid;

      message = document.getElementById("psw1error");
      message.innerHTML = "";

      adps = $("#adps").val();
      adpassid = $("#adpassid").val();
      x = $("#psw1").val();
      y = $("#psw22").val();

      if(adps != adpassid){ 
        alertify.dialog('alert').set({transition:'zoom',message: 'Admin password not correct!'}).show(); 
        return false;
      }
      else{ 
         alertify.success('Ok'); 
        return true;
      }
});

$("#admin").click(function(){
	document.getElementById("staff").checked = false;
});
$("#staff").click(function(){
	document.getElementById("admin").checked = false;
});
$("#male").click(function(){
	document.getElementById("female").checked = false;
});
$("#female").click(function(){
	document.getElementById("male").checked = false;
});