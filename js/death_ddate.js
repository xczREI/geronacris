$(document).ready(function(){

var x = new Date($('#d_date').val());
var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
var m = months[x.getMonth()];
var d = x.getDate();
var y = x.getFullYear();
document.getElementById("death_date").value = m + ' ' + d + ', ' + y;

});