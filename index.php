<!DOCTYPE html>
<html>
<head>
	<title>GERONA CRIS</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
	  <link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.min.css"/>
    <script src="bootstrap4/jquery/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="bootstrap4/js/bootstrap.min.js"></script>
    <link href="bootstrap4/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="alertifyjs/css/alertify.min.css"/>
    <link rel="stylesheet" href="alertifyjs/css/themes/default.min.css"/>
    <link href="css/style.css" rel="stylesheet" type="text/css">

    <style>
    #navbar{ display: none; }
    .hero-wrap{
    	background-image: url('images/logo.png'); background-size: 50%;opacity: 0.9; 
		background-position: center;
		background-repeat: no-repeat;
		height: 100vh;
    }
    #cld{ display: none; }
    #cld1{ display: none; }
    #logo{ width:35%; }
    
    @media only screen and (max-width: 768px) {
                /* For mobile phones: */
      [class*="col-"] {
        width: 100%;
      }
      
      #navbar{ display: block; display: flex;}
      #topbar{ display: none;  }
      #sidebar{ display: none; }
      .loginform{
		position: absolute;
		top: 50%;
		left: 50%;
		margin-top: -50px;
		margin-left: -50px;
		width: 100px;
		height: 100px;
		}
      .navbar-collapse {
        padding: 0;
        width: 50%;
        position: center;
        top: 72px;
        right: 20px;
        z-index: 1000;
      }
	  #logoss {
		display: flex;
		flex-direction: row;
		justify-content: center;
		}
      #logo{ width:20%; }
      .navbar-brand h3{ font-size: 15px; margin-top: 5%; }
      .navbar-brand p{ font-size: 10px; }
      .crs{ font-size: 25px; text-align: center; padding-top: 8%; }
      .crs1{ font-size: 15px; text-align: center; }
      #clock { display: none; }
      #date { display: none; }
      #cld{ display: block; font-size: 20px; text-align: center; color: black; font-family: century gothic; font-weight: bold; }
      #cld1{ display: block; font-size: 20px; text-align: center; color: black; font-family: century gothic; font-weight: bold; }
    }
  </style>
</head>
<body>

<!-- Container -->
<div class="hero-wrap">
    <div class="container" style="padding: 12% 0 5% 0;">
        <div class="row">
          
      
          <div class="col-sm-6"  style="position: absolute; top: 25%; left: 25%;">
          	<form action="php/emp_login.php" method="post" class="request-form">
				<center><h5 style="color: green;">POWERED BY</h5></center>
				<table width="100%" border="0">
				<tr>    
				
				<td style="width: 100%;" align="center"><img src="images/logo.png" alt="" align="center" width="100px" height="100px" /><img src="images/tsu.png" alt="" align="center" width="100px" height="100px"/><img src="images/ccs.png" alt="" align="center" width="100px" height="100px"/></td>
				
				</tr>
				</table>
				<hr>
	    		<div class="form-group">
	    			<label style="font-family:century gothic;font-weight:bold;color:black;">Username:</label>
	    			<input type="text" class="form-control" name="un" placeholder="Enter your Username">
	    		</div>
	    		<div class="form-group">
	    			<label style="font-family:century gothic;font-weight:bold;color:black;">Password:</label>
	    			<input type="password" class="form-control" name="ps" placeholder="Enter your Password">
	    		</div><hr>
	            <div class="form-group">
	            	<button type="submit" name="search" class="btn btn-primary btn-lg btn-block text-uppercase">Log in</button>
	            </div>
	    	</form>
          </div>
    </div>
</div> 
</div>


<!--javascript-->
<script type="text/javascript" src="js/date.js"></script>
<script type="text/javascript" src="js/time.js"></script>

<script>
	$(document).ready(function(){

		var x = setInterval(function(){

		var now = new Date().getTime();

		//hours
		var hrs = Math.floor((now % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

		var hours = ["08","09","10","11","12","01","02","03","04","05","06","07","08","09","10","11","12","01","02","03","04","05","06","07"];
      	var hrss = hours[hrs];

      	if (hrs <= '3' || hrs >= '16'){ var txt = 'am'; } else if (hrs >= '4' || hrs <= '15'){ var txt = 'pm'; }
		
		//minutes
		var min = Math.floor((now % (1000 * 60 * 60)) / (1000 * 60));
		if(min < 10){
			var mins = "0" + min;
		}else if(min > 9){
			var mins = min;
		}

		//seconds
		var sec = Math.floor((now % (1000 * 60)) / 1000);
		if(sec < 10){
			var secs = "0" + sec;
		}else if(sec > 9){
			var secs = sec;
		}
		document.getElementById("cld").innerHTML = hrss +':' +mins+ ':' +secs +' '+ txt;
	})
	
	var d = new Date();

	//months
	var months = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
	//days
	var days = ["(Sun)", "(Mon)", "(Tue)", "(Wed)", "(Thu)", "(Fri)", "(Sat)"];
	//years
	document.getElementById("cld1").innerHTML = months[d.getMonth()] +' ' +d.getDay()+ ', ' +d.getFullYear();

});
</script>

</body>
</html>