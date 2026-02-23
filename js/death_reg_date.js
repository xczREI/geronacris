$(document).ready(function(){

var x = new Date($('#reg_date').val());
var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
var m = months[x.getMonth()];
var y = x.getFullYear();
document.getElementById("regdate").value = m + ' ' + y;

});