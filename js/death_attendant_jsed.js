$(document).ready(function(){

  $("#physician").click(function(){
  	document.getElementById("health").checked = false;
    document.getElementById("hospital").checked = false;
    document.getElementById("none").checked = false;
    document.getElementById("others").checked = false;
  });
  $("#health").click(function(){
    document.getElementById("physician").checked = false;
    document.getElementById("hospital").checked = false;
    document.getElementById("none").checked = false;
    document.getElementById("others").checked = false;
  });
  $("#hospital").click(function(){
  	document.getElementById("physician").checked = false;
    document.getElementById("health").checked = false;
    document.getElementById("none").checked = false;
    document.getElementById("others").checked = false;
  });
  $("#none").click(function(){
  	document.getElementById("physician").checked = false;
    document.getElementById("health").checked = false;
    document.getElementById("hospital").checked = false;
    document.getElementById("others").checked = false;
  });
  $("#others").click(function(){
    document.getElementById("physician").checked = false;
    document.getElementById("health").checked = false;
    document.getElementById("hospital").checked = false;
    document.getElementById("none").checked = false;
  });

  $("#attendant_date").keyup(function(){   
    document.getElementById("informant_date").value = $("#attendant_date").val();
    document.getElementById("prepared_date").value = $("#attendant_date").val();
    document.getElementById("reviewed_date").value = $("#attendant_date").val();
    });
  $("#informant_date").keyup(function(){   
    document.getElementById("attendant_date").value = $("#informant_date").val();
    document.getElementById("prepared_date").value = $("#informant_date").val();
    document.getElementById("reviewed_date").value = $("#informant_date").val();
    });
  $("#prepared_date").keyup(function(){   
    document.getElementById("attendant_date").value = $("#prepared_date").val();
    document.getElementById("informant_date").value = $("#prepared_date").val();
    document.getElementById("reviewed_date").value = $("#prepared_date").val();
    });
  $("#reviewed_date").keyup(function(){   
    document.getElementById("attendant_date").value = $("#reviewed_date").val();
    document.getElementById("informant_date").value = $("#reviewed_date").val();
    document.getElementById("prepared_date").value = $("#reviewed_date").val();
    });

  $("#received_date").keyup(function(){   
    document.getElementById("civil_date").value = $("#received_date").val();
    });
  $("#civil_date").keyup(function(){   
    document.getElementById("received_date").value = $("#civil_date").val();
    });


});