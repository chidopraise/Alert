<div class="header text-center mt-5 pt-5">
	<h1>Report Missing Person</h1>
	<p>Your Trusted Partner in Locating Missing Persons</p>
</div>

<div class="container content">
	<div class="form-section">
		<h2 class="text-center">Report a Missing Person</h2>
		<form action="../lib/report_missing.php" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="type">Type</label>
				<select class="form-control" id="type" name="type">
					<option>Choose Type Of Report</option>
					<option>missing</option>
					<option>wanted</option>
				</select>
			</div>
			<div class="form-group">
				<label for="name">Name of Missing Person</label>
				<input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
			</div>
			<div class="form-group">
				<label for="description">Description</label>
				<textarea class="form-control" id="description" rows="3" name="desc" placeholder="Enter description (100 words)"></textarea>
			</div>
			<div class="form-group">
				<label for="height">Height</label>
				<input type="number" class="form-control" id="height" name="height" placeholder="Enter Height In Feet">
			</div>
			<div class="form-group">
				<label for="complexion">Complexion</label>
				<select class="form-control" id="complexion" name="complexion">
					<option>Select Skin Color</option>
					<option>Pale Skin</option>
					<option>Fair Skin</option>
					<option>Brown Skin</option>
					<option>Chocolate Skin</option>
					<option>Dark Skin</option>
				</select>
			</div>
			<div class="form-group">
				<label for="last-seen">Date/Time Last Seen</label>
				<input type="date" class="form-control" id="last-seen" name="l_s_d" placeholder="Enter date and time">
			</div>
			<div class="form-group">
				<label for="location">Location Last Seen</label>
				<input type="text" class="form-control" id="location" name="l_s_l" placeholder="Enter location">
			</div>
			<div class="form-group">
				<label for="contact">Contact Information</label>
				<input type="text" class="form-control" id="contact" name="contact" placeholder="Enter contact information">
			</div>
			<div class="form-group">
				<label for="photo">Upload Photo</label>
				<input type="file" class="form-control-file" id="photo" name="file">
			</div>
			<div class="form-group">
				<label for="reward">Reward</label>
				<input type="number" class="form-control" id="reward" name="reward" value="0" placeholder="Enter Reward In Dollars. if Any">
			</div>
			<button type="submit" class="btn btn-primary btn-block" name="submit_report">Submit Report</button>
		</form>
	</div>
</div>