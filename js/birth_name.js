$(document).ready(function(){

document.getElementById("child").value = $('#child_fname').val() 
  + ' ' + $('#child_mname').val().charAt(0) 
  +'. ' + $('#child_lname').val();

document.getElementById("mother").value = $('#mother_fname').val() 
  + ' ' + $('#mother_mname').val().charAt(0) 
  +'. ' + $('#mother_lname').val();

document.getElementById("father").value = $('#father_fname').val() 
  + ' ' + $('#father_mname').val().charAt(0) 
  +'. ' + $('#father_lname').val();

document.getElementById("c_name").innerHTML = $('#child_fname').val() 
  + ' ' + $('#child_mname').val().charAt(0) 
  +'. ' + $('#child_lname').val();
});