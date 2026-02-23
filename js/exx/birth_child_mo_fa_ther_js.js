$(document).ready(function(){
	$("#child_mname").keyup(function(){		
		document.getElementById("mother_lname").value = $("#child_mname").val();
	});
	$("#mother_lname").keyup(function(){		
		document.getElementById("child_mname").value = $("#mother_lname").val();
	});
	
	$("#child_lname").keyup(function(){		
		document.getElementById("father_lname").value = $("#child_lname").val();
	});
	$("#father_lname").keyup(function(){		
		document.getElementById("child_lname").value = $("#father_lname").val();
	});


});
	
