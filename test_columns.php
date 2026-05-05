<?php
require 'C:/laragon/www/GERONA/files/birth/login_db_birth.php';
$conn = new mysqli($hn, $un, $pw, $db);
$res = $conn->query('SHOW COLUMNS FROM att_inf_tbl');
while($row = $res->fetch_assoc()) echo $row['Field']."\n";
?>