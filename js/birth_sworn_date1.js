$(document).ready(function(){

	$("#sign_day").keyup(function(){   
	    document.getElementById("sworn_day").value = $("#sign_day").val();
	});
	$("#sign_month").keyup(function(){   
	    document.getElementById("sworn_month").value = $("#sign_month").val();
	});
	$("#sign_year").keyup(function(){   
	    document.getElementById("sworn_year").value = $("#sign_year").val();
	});
	$("#sign_at").keyup(function(){   
	    document.getElementById("sworn_at").value = $("#sign_at").val();
	});

	$("#sworn_day").keyup(function(){   
	    document.getElementById("sign_day").value = $("#sworn_day").val();
	});
	$("#sworn_month").keyup(function(){   
	    document.getElementById("sign_month").value = $("#sworn_month").val();
	});
	$("#sworn_year").keyup(function(){   
	    document.getElementById("sign_year").value = $("#sworn_year").val();
	});
	$("#sworn_at").keyup(function(){   
	    document.getElementById("sign_at").value = $("#sworn_at").val();
	});


});