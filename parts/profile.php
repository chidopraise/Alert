<div class="profile-header mt-5">
	<h1>User Profile</h1>
	<p>Manage your account information and activity</p>
</div>

<div class="container">
	<div class="profile-section">
		<div class="row">
			<div class="col-md-4">
				<h2 class="section-title">Personal Information</h2>
				<form action="../lib/profile.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="firstname">First Name</label>
						<input type="text" class="form-control" id="firstname" name="first_name" value="<?php echo $control->first_name; ?>">
					</div>
					<div class="form-group">
						<label for="lastname">Last Name</label>
						<input type="text" class="form-control" id="lastname" name="last_name" value="<?php echo $control->last_name; ?>">
					</div>
					<div class="form-group">
						<label for="middlename">middle Name</label>
						<input type="text" class="form-control" id="middlename" name="middle_name" value="<?php echo $control->middle_name; ?>">
					</div>
					<div class="form-group">
						<label for="username">User Name</label>
						<input type="text" class="form-control" id="username" name="user_name" value="<?php echo $control->user_name; ?>" disabled>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" value="<?php echo $control->email; ?>">
					</div>
					<div class="form-group">
						<label for="phone">Phone</label>
						<input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $control->phone; ?>">
					</div>
					<div class="form-group">
						<label for="address">Address</label>
						<input type="text" class="form-control" id="address" name="address" value="<?php echo $control->address; ?>">
					</div>
					<div class="form-group">
						<label for="sex">Sex</label>
						<select type="text" class="form-control" id="sex" name="sex">
							<option><?php echo $control->sex; ?></option>
							<option>Male</option>
							<option>Female</option>
						</select>
					</div>
					<div class="form-group">
						<label for="country">Country</label>
						<input type="text" class="form-control" id="country" name="country" value="<?php echo $control->country; ?>">
					</div>
					<div class="form-group">
						<label for="state">State</label>
						<input type="text" class="form-control" id="state" name="state" value="<?php echo $control->state; ?>">
					</div>
					<div class="form-group">
						<label for="d_o_b">Date Of Birth</label>
						<input type="date" class="form-control" id="d_o_b" name="d_o_b" value="<?php echo $control->date_of_birth; ?>">
					</div>
					<div class="form-group">
						<label for="postal_code">Postal Code</label>
						<input type="number" class="form-control" id="postal_code" name="postal_code" value="<?php echo $control->postal_code; ?>">
					</div>
					<div class="form-group">
						<label for="profession">Profession</label>
						<input type="text" class="form-control" id="profession" name="profession" value="<?php echo $control->profession; ?>">
					</div>
					<div class="form-group">
						<label for="date">Regisrtation Date</label>
						<input type="text" class="form-control" id="date" value="<?php echo $control->date; ?>" disabled>
					</div>
					<button type="submit" class="btn btn-primary" name="update">Update Info</button>
				</form>
			</div>
			<div class="col-md-8 mt-5">
				<h2 class="section-title">Recent Activity</h2>
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Missing Person Reported</h5>
						<p class="card-text">John Doe reported a missing person named Jane Doe on 2024-06-01.</p>
						<a href="#" class="btn btn-primary">View Details</a>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Search Joined</h5>
						<p class="card-text">John Doe joined a search for a missing person in New York on 2024-05-28.</p>
						<a href="#" class="btn btn-primary">View Details</a>
					</div>
				</div>
			</div>
		</div>

		<div class="row mt-5">
			<div class="col-12">
				<h2 class="section-title">Account Settings</h2>
				<form action="../menu/submit_email.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="password">Change Password</label>
						<input type="password" class="form-control" id="password" placeholder="Click On Update Password" disabled>
					</div>
					<button type="submit" class="btn btn-primary">Update Password</button>
				</form>
			</div>
		</div>
	</div>
</div>