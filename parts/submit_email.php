<div class="profile-header text-center mt-5 pt-5">
	<h1>Change Your Password</h1>
</div>

<div class="container search-section">
	<h2 class="text-center">Enter Your Email</h2>
	<form action="../lib/signup.php?page=submit_password" method="post" id="se">
		<div class="form-group">
			<input type="email" class="form-control" id="location" name="email" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];} ?>" placeholder="Enter The Account's Email Address">
		</div>
		<button type="submit" class="btn btn-primary btn-block" name="submit_email">Submit Email</button>
	</form>
</div>