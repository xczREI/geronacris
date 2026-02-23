$(document).ready(function(){
  document.getElementById('btn_add').disabled=true;
  document.getElementById('regno').disabled=true;

   $("#pageno").blur(function(){
  var registryno = $("#regno").val()
  var bookno = $("#bookno").val();
  var pageno = $(this).val();
  // alert("This input field has lost its focus.");
  $.ajax({
      url:"http://localhost/Civil3/files/marriage/marriage_check_BPno1.php",
      method:"POST",
      data:{registry_no:registryno, book_no:bookno, page_no:pageno},
      dataType:"text",
      success:function(html){
        $("#error").html(html);
      }
    });
  });

});