  <?php
              session_start();
              unset($_SESSION["un"]);
              unset($_SESSION["ps"]);
              header("location: ../index.php");
?>