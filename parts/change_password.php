<div class="profile-header text-center mt-5 pt-5">
	<h1>Change Your Password</h1>
</div>

<div class="container search-section">
	<h2 class="text-center">Enter Your New Password</h2>
	<form action="../lib/confirmation.php" method="post" id="se">
		<div class="form-group">
			<input type="password" class="form-control" id="location" name="password" placeholder="Enter New Password">
			<input type="password" class="form-control" id="location" name="password1" placeholder="Confirm New Password">
			<input type="hidden" class="form-control" id="user_id" name="user_id" value="<?php echo $_REQUEST['id']; ?>">
		</div>
		<button type="submit" class="btn btn-primary btn-block" name="change_password">Change Password</button>
	</form>
</div>