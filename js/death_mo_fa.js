$(document).ready(function(){
	$("#person_lname").keyup(function(){	
      document.getElementById("father_name").value = $("#person_lname").val();
  	});

  	$("#person_mname").keyup(function(){	
      document.getElementById("mother_name").value = $("#person_mname").val();
  	});
});
	
