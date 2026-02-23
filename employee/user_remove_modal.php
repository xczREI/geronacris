
<div class="modal fade" id="user_remove_<?php echo $row['emp_id']; ?>">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Delete Account</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
          <p class="text-center">Are you sure you want to Delete?</p>
          <h4 style="font-family:century gothic; text-align:center; font-weight:bold;"><?php echo $row['lastname'] .", ". $row['firstname']; ?></h4>
          <br>
          <a href="user_remove_action.php?id=<?php echo $row['emp_id']; ?>" id="remove" class='btn btn-outline-danger btn-block btn-sm'>DELETE</a>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

      </div>
    </div>
  </div>
</div>


