<!-- Add -->
<div class="modal fade" id="profile">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
              <h4 class="modal-title"><b>Admin Profile</b></h4>
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="profile_update.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
          		  <div class="form-group">
                  	<label for="username" class="control-label">Username</label>
                    	<input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>">
                </div>
                <div class="form-group">
                    <label for="password" class="control-label">Password</label>
                      <input type="password" class="form-control" id="password" name="password" value="<?php echo $user['password']; ?>">
                </div>
                <div class="form-group">
                  	<label for="firstname" class="control-label">Firstname</label>
                    	<input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $user['firstname']; ?>">
                </div>
                <div class="form-group">
                  	<label for="lastname" class="control-label">Lastname</label>
                    	<input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $user['lastname']; ?>">
                </div>
                <div class="form-group">
                    <label for="photo" class="control-label">Photo:</label>
                      <input type="file" id="photo" name="photo">
                </div>
                <hr>
                <div class="form-group">
                    <label for="curr_password" class="control-label">Current Password:</label>
                      <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="input current password to save changes" required>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="save"><i class="fas fa-save"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
