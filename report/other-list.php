<?php

  $yy = $_POST['year'];
  $mm = $_POST['month'];
  $xx = ("$yy-$mm-01");
  $zz = ("$yy-$mm-31");

  if (!empty($yy) && empty($mm) || !empty($yy) && $mm == 'All') {
?>
<div class="col-sm-4">
  <div class="table-responsive">
  <h5 class="text-center">BIRTH</h5>
  <h6 class="text-center"><span style="font-size:12px;">Month/Year:</span><br><?php echo $yy; ?></h6>
    <table class="table table-sm">
      <thead class="">
        <tr align="center">
          <th>User</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody id="myTable">
      <?php
        require '../php/login_db_birth.php';
        $connB = new mysqli($hn, $un, $pw, $db);
        if ($connB->connect_error) die($connB->connect_error);

        $sql = "SELECT * FROM registration_tbl WHERE reg_date LIKE '$yy%'";
        $result = $connB->query($sql);  
        if (!$result) die ("Database access failed: " . $connB->error);
        $rows = $result->num_rows;

        $sql = "SELECT COUNT(*) AS xx, reg_user FROM registration_tbl WHERE reg_date LIKE '$yy%' GROUP BY reg_user";
        $result = $connB->query($sql);  
        if (!$result) die ("Database access failed: " . $connB->error);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) { 
            echo '<tr>';
            echo '<td align="center">'.$row['reg_user'].'</td>';
            echo '<td align="right">'.$row['xx'].'</td>';
            echo '</tr>';
          }
        }  
        echo '<tr>';
        echo '<td></td>';
        echo '<td align="right" style="font-weight:bold;">Total: '.$rows.'</td>';
        echo '</tr>';   
        $connB->close();         
      ?>
      </tbody>
    </table>
  </div>
</div>
<div class="col-sm-4">
  <div class="table-responsive">
  <h5 class="text-center">DEATH</h5>
  <h6 class="text-center"><span style="font-size:12px;">Month/Year:</span><br><?php echo $yy; ?></h6>
    <table class="table table-sm">
      <thead class="">
        <tr align="center">
          <th>User</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody id="myTable">
      <?php
        require '../php/login_db_death.php';
        $connD = new mysqli($hn, $un, $pw, $db);
        if ($connD->connect_error) die($connD->connect_error);

        $sql = "SELECT * FROM registration_tbl WHERE reg_date LIKE '$yy%'";
        $result = $connD->query($sql);  
        if (!$result) die ("Database access failed: " . $connD->error);
        $rows = $result->num_rows;

        $sql = "SELECT COUNT(*) AS xx, reg_user FROM registration_tbl WHERE reg_date LIKE '$yy%' GROUP BY reg_user";
        $result = $connD->query($sql);  
        if (!$result) die ("Database access failed: " . $connD->error);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) { 
            echo '<tr>';
            echo '<td align="center">'.$row['reg_user'].'</td>';
            echo '<td align="right">'.$row['xx'].'</td>';
            echo '</tr>';
          }
        }  
        echo '<tr>';
        echo '<td></td>';
        echo '<td align="right" style="font-weight:bold;">Total: '.$rows.'</td>';
        echo '</tr>';            
        $connD->close();
      ?>
      </tbody>
    </table>
  </div>
</div>
<div class="col-sm-4">
  <div class="table-responsive">
  <h5 class="text-center">MARRIAGE</h5>
  <h6 class="text-center"><span style="font-size:12px;">Month/Year:</span><br><?php echo $yy; ?></h6>
    <table class="table table-sm">
      <thead class="">
        <tr align="center">
          <th>User</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody id="myTable">
      <?php
        require '../php/login_db_mrg.php';
        $connM = new mysqli($hn, $un, $pw, $db);
        if ($connM->connect_error) die($connM->connect_error);

        $sql = "SELECT * FROM registration_tbl WHERE reg_date LIKE '$yy%'";
        $result = $connM->query($sql);  
        if (!$result) die ("Database access failed: " . $connM->error);
        $rows = $result->num_rows;

        $sql = "SELECT COUNT(*) AS xx, reg_user FROM registration_tbl WHERE reg_date LIKE '$yy%' GROUP BY reg_user";
        $result = $connM->query($sql);  
        if (!$result) die ("Database access failed: " . $connM->error);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) { 
            echo '<tr>';
            echo '<td align="center">'.$row['reg_user'].'</td>';
            echo '<td align="right">'.$row['xx'].'</td>';
            echo '</tr>';
          }
        }  
        echo '<tr>';
        echo '<td></td>';
        echo '<td align="right" style="font-weight:bold;">Total: '.$rows.'</td>';
        echo '</tr>';            
        $connM->close();
      ?>
      </tbody>
    </table>
  </div>
</div>
 <?php 
  } else if (!empty($yy) && $mm != 'All') {
?>
<div class="col-sm-4">
  <div class="table-responsive">
  <h5 class="text-center">BIRTH</h5>
  <h6 class="text-center"><span style="font-size:12px;">Month/Year:</span><br><?php echo date_format(date_create($xx),'F').' '.$yy; ?></h6>
    <table class="table table-sm">
      <thead class="">
        <tr align="center">
          <th>User</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody id="myTable">
      <?php
        require '../php/login_db_birth.php';
        $connB = new mysqli($hn, $un, $pw, $db);
        if ($connB->connect_error) die($connB->connect_error);

        $sql = "SELECT * FROM registration_tbl WHERE reg_date BETWEEN '$xx' AND '$zz'";
        $result = $connB->query($sql);  
        if (!$result) die ("Database access failed: " . $connB->error);
        $rows = $result->num_rows;

        $sql = "SELECT COUNT(*) AS xx, reg_user FROM registration_tbl WHERE reg_date BETWEEN '$xx' AND '$zz' GROUP BY reg_user";
        $result = $connB->query($sql);  
        if (!$result) die ("Database access failed: " . $connB->error);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) { 
            echo '<tr>';
            echo '<td align="center">'.$row['reg_user'].'</td>';
            echo '<td align="right">'.$row['xx'].'</td>';
            echo '</tr>';
          }
        }  
        echo '<tr>';
        echo '<td></td>';
        echo '<td align="right" style="font-weight:bold;">Total: '.$rows.'</td>';
        echo '</tr>';   
        $connB->close();         
      ?>
      </tbody>
    </table>
  </div>
</div>
<div class="col-sm-4">
  <div class="table-responsive">
  <h5 class="text-center">DEATH</h5>
  <h6 class="text-center"><span style="font-size:12px;">Month/Year:</span><br><?php echo date_format(date_create($xx),'F').' '.$yy; ?></h6>
    <table class="table table-sm">
      <thead class="">
        <tr align="center">
          <th>User</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody id="myTable">
      <?php
        require '../php/login_db_death.php';
        $connD = new mysqli($hn, $un, $pw, $db);
        if ($connD->connect_error) die($connD->connect_error);

        $sql = "SELECT * FROM registration_tbl WHERE reg_date BETWEEN '$xx' AND '$zz'";
        $result = $connD->query($sql);  
        if (!$result) die ("Database access failed: " . $connD->error);
        $rows = $result->num_rows;

        $sql = "SELECT COUNT(*) AS xx, reg_user FROM registration_tbl WHERE reg_date BETWEEN '$xx' AND '$zz' GROUP BY reg_user";
        $result = $connD->query($sql);  
        if (!$result) die ("Database access failed: " . $connD->error);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) { 
            echo '<tr>';
            echo '<td align="center">'.$row['reg_user'].'</td>';
            echo '<td align="right">'.$row['xx'].'</td>';
            echo '</tr>';
          }
        }  
        echo '<tr>';
        echo '<td></td>';
        echo '<td align="right" style="font-weight:bold;">Total: '.$rows.'</td>';
        echo '</tr>';   
        $connD->close();         
      ?>
      </tbody>
    </table>
  </div>
</div>
<div class="col-sm-4">
  <div class="table-responsive">
  <h5 class="text-center">MARRIAGE</h5>
  <h6 class="text-center"><span style="font-size:12px;">Month/Year:</span><br><?php echo date_format(date_create($xx),'F').' '.$yy; ?></h6>
    <table class="table table-sm">
      <thead class="">
        <tr align="center">
          <th>User</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody id="myTable">
      <?php
        require '../php/login_db_mrg.php';
        $connM = new mysqli($hn, $un, $pw, $db);
        if ($connM->connect_error) die($connM->connect_error);

        $sql = "SELECT * FROM registration_tbl WHERE reg_date BETWEEN '$xx' AND '$zz'";
        $result = $connM->query($sql);  
        if (!$result) die ("Database access failed: " . $connM->error);
        $rows = $result->num_rows;

        $sql = "SELECT COUNT(*) AS xx, reg_user FROM registration_tbl WHERE reg_date BETWEEN '$xx' AND '$zz' GROUP BY reg_user";
        $result = $connM->query($sql);  
        if (!$result) die ("Database access failed: " . $connM->error);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) { 
            echo '<tr>';
            echo '<td align="center">'.$row['reg_user'].'</td>';
            echo '<td align="right">'.$row['xx'].'</td>';
            echo '</tr>';
          }
        }  
        echo '<tr>';
        echo '<td></td>';
        echo '<td align="right" style="font-weight:bold;">Total: '.$rows.'</td>';
        echo '</tr>';            
        $connM->close();
      ?>
      </tbody>
    </table>
  </div>
</div>
<?php
  }
?>
