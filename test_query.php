<?php
$c = new mysqli('localhost', 'root', '', 'geronacris'); 
if ($c->connect_error) die($c->connect_error); 
$q = "SELECT DISTINCT YEAR(child_birth_date) AS yr FROM child_tbl WHERE child_birth_date IS NOT NULL ORDER BY yr DESC"; 
$r = $c->query($q); 
if(!$r) echo $c->error; 
else {
    echo 'Rows: '.$r->num_rows."\n"; 
    while($row = $r->fetch_assoc()) echo $row['yr']."\n";
}
$c->close();
?>