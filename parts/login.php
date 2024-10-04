<div class="header mt-5">
	<h1>Alert</h1>
	<p>Your Trusted Partner in Locating Missing Persons</p>
</div>

<div class="container">
	<ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Login</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="signup-tab" data-toggle="tab" href="#signup" role="tab" aria-controls="signup" aria-selected="false">Signup</a>
		</li>
	</ul>
	<div class="tab-content" id="myTabContent">
		<div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
			<div class="card">
				<h3 class="card-title">Login</h3>
				<form action="../lib/signup.php?page=login" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="loginUsername">Username</label>
						<input type="text" class="form-control" id="loginUsername" name="email" placeholder="Enter Email / Phone No. /username">
					</div>
					<div class="form-group">
						<label for="loginPassword">Password</label>
						<input type="password" class="form-control" id="loginPassword" name="password" placeholder="Enter your password">
					</div>
					<button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
				</form>
				<div><a href="submit_email.php" style="float:right;">Forgot Password</a></div>
			</div>
		</div>
		<div class="tab-pane fade" id="signup" role="tabpanel" aria-labelledby="signup-tab">
			<div class="card">
				<h3 class="card-title">Signup</h3>
				<form action="../lib/signup.php?page=signup" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="signupFirstname">First Name</label>
						<input type="text" class="form-control" id="signupFirstname" name="first_name" placeholder="Enter Your First Name">
					</div>
					<div class="form-group">
						<label for="signupLastname">Last Name</label>
						<input type="text" class="form-control" id="signupLastname" name="last_name" placeholder="Enter Your Last Name">
					</div>
					<div class="form-group">
						<label for="signupUsername">Username</label>
						<input type="text" class="form-control" id="signupUsername" name="user_name" placeholder="Choose a unique username">
					</div>
					<div class="form-group">
						<label for="signupphone">Phone no.</label>
						<input type="tel" class="form-control" id="signupPhone" name="phone" placeholder="Enter Your Phone No.">
					</div>
					<div class="form-group">
						<label for="signupEmail">Email address</label>
						<input type="email" class="form-control" id="signupEmail" name="email" placeholder="Enter your email">
					</div>
					<div class="form-group">
						<label for="signupPassword">Password</label>
						<input type="password" class="form-control" id="signupPassword" name="password" placeholder="Choose a password">
					</div>
					<button type="submit" class="btn btn-primary btn-block" name="signup">Signup</button>
				</form>
			</div>
		</div>
	</div>
</div>