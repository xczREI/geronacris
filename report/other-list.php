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
        require_once '../php/login_db_birth.php';
        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die($conn->connect_error);

        $sql = "SELECT * FROM registration_tbl WHERE reg_date LIKE '$yy%'";
        $result = $conn->query($sql);  
        if (!$result) die ("Database access failed: " . $conn->error);
        $rows = $result->num_rows;

        $sql = "SELECT COUNT(*) AS xx, reg_user FROM registration_tbl WHERE reg_date LIKE '$yy%' GROUP BY reg_user";
        $result = $conn->query($sql);  
        if (!$result) die ("Database access failed: " . $conn->error);

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
        require_once '../php/login_db_death.php';
        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die($conn->connect_error);

        $sql = "SELECT * FROM registration_tbl WHERE reg_date LIKE '$yy%'";
        $result = $conn->query($sql);  
        if (!$result) die ("Database access failed: " . $conn->error);
        $rows = $result->num_rows;

        $sql = "SELECT COUNT(*) AS xx, reg_user FROM registration_tbl WHERE reg_date LIKE '$yy%' GROUP BY reg_user";
        $result = $conn->query($sql);  
        if (!$result) die ("Database access failed: " . $conn->error);

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
        require_once '../php/login_db_mrg.php';
        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die($conn->connect_error);

        $sql = "SELECT * FROM registration_tbl WHERE reg_date LIKE '$yy%'";
        $result = $conn->query($sql);  
        if (!$result) die ("Database access failed: " . $conn->error);
        $rows = $result->num_rows;

        $sql = "SELECT COUNT(*) AS xx, reg_user FROM registration_tbl WHERE reg_date LIKE '$yy%' GROUP BY reg_user";
        $result = $conn->query($sql);  
        if (!$result) die ("Database access failed: " . $conn->error);

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
        require_once '../php/login_db_birth.php';
        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die($conn->connect_error);

        $sql = "SELECT * FROM registration_tbl WHERE reg_date BETWEEN '$xx' AND '$zz'";
        $result = $conn->query($sql);  
        if (!$result) die ("Database access failed: " . $conn->error);
        $rows = $result->num_rows;

        $sql = "SELECT COUNT(*) AS xx, reg_user FROM registration_tbl WHERE reg_date BETWEEN '$xx' AND '$zz' GROUP BY reg_user";
        $result = $conn->query($sql);  
        if (!$result) die ("Database access failed: " . $conn->error);

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
        require_once '../php/login_db_death.php';
        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die($conn->connect_error);

        $sql = "SELECT * FROM registration_tbl WHERE reg_date BETWEEN '$xx' AND '$zz'";
        $result = $conn->query($sql);  
        if (!$result) die ("Database access failed: " . $conn->error);
        $rows = $result->num_rows;

        $sql = "SELECT COUNT(*) AS xx, reg_user FROM registration_tbl WHERE reg_date BETWEEN '$xx' AND '$zz' GROUP BY reg_user";
        $result = $conn->query($sql);  
        if (!$result) die ("Database access failed: " . $conn->error);

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
        require_once '../php/login_db_mrg.php';
        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die($conn->connect_error);

        $sql = "SELECT * FROM registration_tbl WHERE reg_date BETWEEN '$xx' AND '$zz'";
        $result = $conn->query($sql);  
        if (!$result) die ("Database access failed: " . $conn->error);
        $rows = $result->num_rows;

        $sql = "SELECT COUNT(*) AS xx, reg_user FROM registration_tbl WHERE reg_date BETWEEN '$xx' AND '$zz' GROUP BY reg_user";
        $result = $conn->query($sql);  
        if (!$result) die ("Database access failed: " . $conn->error);

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
      ?>
      </tbody>
    </table>
  </div>
</div>
<?php
  }
?>
