$(document).ready(function(){
  document.getElementById('btnadd').disabled=true;
  $("#regno").blur(function(){
  var registryno = $(this).val();
  // alert("This input field has lost its focus.");
  $.ajax({
      url:"http://localhost/Civil3/files/birth/birth_check_regNo.php",
      method:"POST",
      data:{registry_no:registryno},
      dataType:"text",
      success:function(html){
        $("#error").html(html);
      }
    });
  });

});