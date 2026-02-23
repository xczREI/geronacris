<?php
  session_start();
  if (!isset($_SESSION['user']) || !isset($_SESSION['ps'])) {
    header("location: ../../index.php");
  }

 ?>