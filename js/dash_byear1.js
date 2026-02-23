$(document).ready(function(){

    $.ajax({
    url: "http://localhost/Civil3/php/dash_chart_year.php",
    method: "GET",
    success:function(data){
      console.log(data);
      var child_sex = [];
      var number = [];
      var reg_date = [];
      var i;

      for(i in data){
        child_sex.push(data[i].child_sex);
        number.push(data[i].number);
      }
      if(i in data){
        reg_date.push(data[i].reg_date);
        var d = new Date(reg_date);
        var year = d.getFullYear();
      }

      var chartdata = {
        labels: child_sex,
        datasets:[{
          label:"Sex",
          backgroundColor:[
            "rgba(255, 99, 132, 0.6)",
            "rgba(153, 102, 255, 0.6)"
          ],
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'black',
          data: number
        }]
      };
      var ctx = $("#myChart");

      var barGraph = new Chart(ctx, {
        type:'pie',
        data:chartdata,
        options:{
          title:{
            display:true,
            text:"Yearly Chart of Birth (" + year + ")",
            fontSize:18
          },
  				legend:{
  					display:true,
  					position:"right",
  					labels:{
  						fontColor:"#000"
  					}
  				}
  			}
      });
    },
    error: function(data){
      console.log(data);
    }
  });

});