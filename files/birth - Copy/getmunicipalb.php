<?php
     require 'mycon.php';
     $mypid = $_POST['bprovID'];
     $output ='';
     $sqlg = "SELECT * from tblmunicipals where  province='".$_POST['bprovID']."'";
     $resultg = mysqli_query($connx,$sqlg);
     
     while($row=mysqli_fetch_array($resultg)){
          $output .='<option value = "'.$row['municipals'].'">'.$row["municipals"].'</option>';
     }
     echo $output;
?>