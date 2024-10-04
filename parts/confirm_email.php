<div class="profile-header text-center mt-5 pt-5">
	<h1>Confirm Your Email Address</h1>
</div>

<div class="container search-section">
	<h2 class="text-center">Enter Confirmation Code</h2>
	<form action="../lib/confirmation.php" method="post" id="se">
		<div class="form-group">
			<input type="text" class="form-control" id="location" name="code" placeholder="Enter The Code">
			<input type="hidden" class="form-control" id="user_name" name="user_name" value="<?php echo $_SESSION['user_name']; ?>">
		</div>
		<button type="submit" class="btn btn-primary btn-block">confirm</button>
	</form>
</div>