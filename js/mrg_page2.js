$(document).ready(function(){
/*	$("#h_mname").keyup(function(){		
		document.getElementById("h_mo_lname").value = $("#h_mname").val();
	});
	$("#h_mo_lname").keyup(function(){		
		document.getElementById("h_mname").value = $("#h_mo_lname").val();
	});
	
	$("#h_lname").keyup(function(){		
		document.getElementById("h_fa_lname").value = $("#h_lname").val();
	});
	$("#h_fa_lname").keyup(function(){		
		document.getElementById("h_lname").value = $("#h_fa_lname").val();
	});

	$("#w_mname").keyup(function(){		
		document.getElementById("w_mo_lname").value = $("#w_mname").val();
	});
	$("#w_mo_lname").keyup(function(){		
		document.getElementById("w_mname").value = $("#w_mo_lname").val();
	});
	
	$("#w_lname").keyup(function(){		
		document.getElementById("w_fa_lname").value = $("#w_lname").val();
	});
	$("#w_fa_lname").keyup(function(){		
		document.getElementById("w_lname").value = $("#w_fa_lname").val();
	});

	$("#h_fname").keyup(function(){	
      document.getElementById("husband_name").value = $("#h_fname").val();
  	});
	$("#h_mname").keyup(function(){	
      document.getElementById("husband_name").value = $("#h_fname").val() + ' ' + 
      $("#h_mname").val().charAt(0);
  	});
	$("#h_lname").keyup(function(){	
      document.getElementById("husband_name").value = $("#h_fname").val() + ' ' + 
      $("#h_mname").val().charAt(0) +'. ' + $("#h_lname").val();
  	});

  	$("#w_fname").keyup(function(){	
      document.getElementById("wife_name").value = $("#w_fname").val();
  	});
	$("#w_mname").keyup(function(){	
      document.getElementById("wife_name").value = $("#w_fname").val() + ' ' + 
      $("#w_mname").val().charAt(0);
  	});
	$("#w_lname").keyup(function(){	
      document.getElementById("wife_name").value = $("#w_fname").val() + ' ' + 
      $("#w_mname").val().charAt(0) +'. ' + $("#w_lname").val();
  	});
*/
  	$("#mrg_day").keyup(function(){	
      document.getElementById("mrg_days").value = $("#mrg_day").val();
  	});
  	$("#mrg_month").keyup(function(){	
      document.getElementById("mrg_months").value = $("#mrg_month").val();
  	});
  	$("#mrg_year").keyup(function(){	
      document.getElementById("mrg_years").value = $("#mrg_year").val();
  	});

  	$("#rec_date").keyup(function(){	
      document.getElementById("civil_date").value = $("#rec_date").val();
  	});
  	$("#civil_date").keyup(function(){	
      document.getElementById("rec_date").value = $("#civil_date").val();
  	});

  	$("#my_mrg").click(function(){
    	document.getElementById("the_mrg").checked = false;
	 });
	$("#the_mrg").click(function(){
		document.getElementById("my_mrg").checked = false;
	 });

	$("#religious").click(function(){
    	document.getElementById("civil").checked = false;
    	document.getElementById("muslim").checked = false;
    	document.getElementById("tribal").checked = false;
	 });
	$("#civil").click(function(){
		document.getElementById("religious").checked = false;
		document.getElementById("muslim").checked = false;
    	document.getElementById("tribal").checked = false;
	 });
	$("#muslim").click(function(){
		document.getElementById("religious").checked = false;
		document.getElementById("civil").checked = false;
    	document.getElementById("tribal").checked = false;
	 });
	$("#tribal").click(function(){
		document.getElementById("religious").checked = false;
		document.getElementById("civil").checked = false;
		document.getElementById("muslim").checked = false;
	 });

	$("#marriage").click(function(){
    	document.getElementById("article").checked = false;
	 });
	$("#article").click(function(){
		document.getElementById("marriage").checked = false;
	 });

});
	
