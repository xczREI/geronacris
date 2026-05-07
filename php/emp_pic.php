<?php 
    $gender = $row['gender'] ?? '';
    $type = $row['usertype'] ?? '';
          
    if($gender == 'Male' && $type == 'Admin'){ ?>
	  	&emsp;<img src="../images/img_avatar3.png" class="mr-3 mt-0 rounded-circle" style="width:40px;">
	<?php }else if($gender == 'Male' && $type == 'Staff'){ ?>
		&emsp;<img src="../images/img_avatar3.png" class="mr-3 mt-0 rounded-circle" style="width:40px;">
    <?php }else if($gender == 'Female' && $type == 'Admin'){ ?>
        &emsp;<img src="../images/img_avatar6.png" class="mr-3 mt-0 rounded-circle" style="width:40px;">
    <?php }else if($gender == 'Female' && $type == 'Staff'){ ?>
        &emsp;<img src="../images/img_avatar6.png" class="mr-3 mt-0 rounded-circle" style="width:40px;">
    <?php } else { ?>
        &emsp;<img src="../images/img_avatar1.png" class="mr-3 mt-0 rounded-circle" style="width:40px;">
    <?php } ?>