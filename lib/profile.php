<?php
session_start();

	class page_info{
		public $page_id = 2;
		public $page_name = 'profile';
		
	}
	include_once "control.php";
	
	class profile extends control{
		public function update(){
			if(isset($_SESSION["user_id"])){
				if(isset($_POST["update"])){
					$sql = "UPDATE users SET first_name = '$_POST[first_name]',last_name = '$_POST[last_name]',middle_name = '$_POST[middle_name]',email = '$_POST[email]',phone = '$_POST[phone]',address = '$_POST[address]',sex = '$_POST[sex]',country = '$_POST[country]',state = '$_POST[state]',date_of_birth = '$_POST[d_o_b]',postal_code = '$_POST[postal_code]',profession = '$_POST[profession]' WHERE id = '$_SESSION[user_id]'";
					if(mysqli_query($this->conn(),$sql)){
						echo"
							<script type='text/javascript'>alert('SUSSESS!!!: ".$_SESSION['first_name']." Your Profile Was Upadated Succesfully'); window.location.href = '../menu/profile'</script>
						";
					}else{
						echo"
							<script type='text/javascript'>alert('ERROR!!!: Unable To Update Profile Due To Some Technical Issues, check the input and query'); window.location.href = '../menu/profile'</script>
						";
						//die("error".mysqli_error($this->conn));
					}
				}
			}
		}
		
		public function cordnate(){
			if(isset($_SESSION["user_id"])){
				$cord = $_REQUEST["q"];
				$sql = "SELECT * FROM users WHERE id = '$_SESSION[user_id]'";
				$retval = mysqli_query($this->conn(),$sql);
				if(mysqli_num_rows($retval)){
					$sql_1 = "UPDATE users SET cordnate = '$cord' WHERE id = '$_SESSION[user_id]'";
					if(mysqli_query($this->conn(),$sql_1)){
						echo $cord;
					}else{
						echo"An Error Occured During Upadate...";
					}
				}
			}
		}
	}
	$profile = new profile;
	$profile->update();
	$profile->cordnate();
?>