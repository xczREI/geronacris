$(document).ready(function(){
  document.getElementById('btnadd').disabled=true;
  document.getElementById('regno').disabled=true;

   $(".pageNo").blur(function(){
  var registryno = $("#regno").val()
  var bookno = $("#bookno").val();
  var pageno = $(this).val();
  // alert("This input field has lost its focus.");
  $.ajax({
      url:"http://localhost/Civil3/files/birth/birth_check_BPno1.php",
      method:"POST",
      data:{registry_no:registryno, book_no:bookno, page_no:pageno},
      dataType:"text",
      success:function(html){
        $("#error").html(html);
      }
    });
  });

});