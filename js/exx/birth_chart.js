$(document).ready(function(){

    $.ajax({
    url: "http://localhost/Civil3/php/birth_chart.php",
    method: "GET",
    success:function(data){
      console.log(data);
      var child_sex = [];
      var number = [];
      var i;

      for(i in data){
        child_sex.push(data[i].child_sex);
        number.push(data[i].number);
      }

      var chartdata = {
        labels: child_sex,
        datasets:[{
          label:"Sex",
          backgroundColor:[
            "rgba(255, 99, 132, 0.6)",
            "rgba(153, 102, 255, 0.6)"
          ],
          borderColor:"black",
          data: number
        }]
      };
      var ctx = $("#myChart");

      var barGraph = new Chart(ctx, {
        type:'doughnut',
        data:chartdata,
      });

      
    },
    error: function(data){
      console.log(data);
    }
  });

})