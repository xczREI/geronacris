<?php
require 'C:/laragon/www/GERONA/files/death/login_db_death.php';
$conn = new mysqli($hn, $un, $pw, $db);
$res = $conn->query('SHOW COLUMNS FROM person_tbl');
while($row = $res->fetch_assoc()) echo $row['Field']."\n";
?>