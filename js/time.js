$(document).ready(function(){
	
	var x = setInterval(function(){

		var now = new Date().getTime();

		//hours
		var hrs = Math.floor((now % (1000 * 60 * 60 * 12)) / (1000 * 60 * 60));
		document.getElementById("hrs").innerHTML = hrs;

		var hours = ["08","09","10","11","12","01","02","03","04","05","06","07"];
		document.getElementById("hrs").innerHTML = hours[hrs];
		
		//minutes
		var min = Math.floor((now % (1000 * 60 * 60)) / (1000 * 60));
		if(min < 10){
			document.getElementById("min").innerHTML = "0" + min;
		}else if(min > 9){
			document.getElementById("min").innerHTML = min;
		}

		//seconds
		var sec = Math.floor((now % (1000 * 60)) / 1000);
		if(sec < 10){
			document.getElementById("sec").innerHTML = "0" + sec;
		}else if(sec > 9){
			document.getElementById("sec").innerHTML = sec;
		}
		
	})
});
