$(document).ready(function(){

    $.ajax({
    url: "http://localhost/Civil3/php/dash_chart_dyear.php",
    method: "GET",
    success:function(data){
      console.log(data);
      var sex = [];
      var number = [];
      var reg_date = [];
      var i;

      for(i in data){
        sex.push(data[i].sex);
        number.push(data[i].number);
      }
      if(i in data){
        reg_date.push(data[i].reg_date);
        var d = new Date(reg_date);
        var year = d.getFullYear();
      }

      var chartdata = {
        labels: sex,
        datasets:[{
          label:"Sex",
          backgroundColor:[
            "rgba(31, 213, 229, 0.6)",
            "rgba(241, 94, 43, 0.6)"
          ],
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'black',
          data: number
        }]
      };
      var ctx = $("#myChart1");

      var barGraph = new Chart(ctx, {
        type:'pie',
        data:chartdata,
        options:{
          title:{
            display:true,
            text:"Yearly Chart of Death (" + year + ")",
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