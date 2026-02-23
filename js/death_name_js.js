$(document).ready(function(){

  document.getElementById("name_death").value = $('#person_fname').val() 
  + ' ' + $('#person_mname').val().charAt(0) 
  +'. ' + $('#person_lname').val();

});