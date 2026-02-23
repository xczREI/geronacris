   function pswfunction2() {
      var message, x, y, z;

      message = document.getElementById("psw1error");
      message.innerHTML = "";
      
      x = document.getElementById("psw1").value;
      y = document.getElementById("psw2").value;

      if(x == y){ message.innerHTML = "Password match"; message.style.color = "blue"; }
      else{ message.innerHTML = "Password do not match"; message.style.color = "red"; }
}

$(document).ready(function(){
  $("#psw2").keyup(pswfunction2);
});