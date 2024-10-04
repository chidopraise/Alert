<?php
session_start();

	class page_info{
		public $page_id = 2;
		public $page_name = 'confirmation';
		
	}
	include_once "control.php";
	
	class confirm extends control{
		function email(){
			if($_POST["user_name"] != "" && isset($_POST["code"])){
				$sql = "SELECT * FROM users where user_name = '$_POST[user_name]' AND presence = '$_POST[code]'";
				$retval = mysqli_query($this->conn(),$sql);
				if(mysqli_num_rows($retval)){
					$sql_1 = "UPDATE users SET presence = '1' where user_name = '$_POST[user_name]'";
					if(mysqli_query($this->conn(),$sql_1)){
						echo"<script type='text/javascript'> alert('Email CONFIRMATION SUCCESSFULL !!! Click OK To Login Without Interroption.'); window.location.href= '../lib/signup.php?page=logout'; </script>";
					}else{
						echo"<script type='text/javascript'> alert('ERROR: Contact Support On 08109214791 For A Manual Confirmation...'); window.location.href= '../menu/login.php'; </script>";
					}
				}else{
					echo"<script type='text/javascript'>alert('ERROR: Incorrect Confirmation Code. Check The Code And Try Again!!!'); window.location.href= '../menu/confirm_email.php';</script>";
				}
			}elseif($_REQUEST["user_name"] != ""){
				$sql = "SELECT * FROM users where user_name = '$_REQUEST[user_name]'";
				$retval = mysqli_query($this->conn(),$sql);
				if(mysqli_num_rows($retval)){
					$sql_1 = "UPDATE users SET presence = '0' where user_name = '$_REQUEST[user_name]'";
					if(mysqli_query($this->conn(),$sql_1)){
						echo"<script type='text/javascript'> alert('Email CONFIRMATION SUCCESSFULL !!! Click OK To Login Without Interroption.'); window.location.href= '../menu/login.php'; </script>";
					}else{
						echo"<script type='text/javascript'> alert('ERROR: Contact Support On 08109214791 For A Manual Review...'); window.location.href= '../menu/login.php'; </script>";
					}
				}else{
					echo"<script type='text/javascript'>alert('ERROR: <ILLIGAL LINK> Link Expired Or Never Issued, Signup To Get A New Confirmation Link!!!'); window.location.href= '../menu/login.php';</script>";
				}
			}elseif(isset($_POST['change_password'])){
				$sql = "UPDATE users SET password = '$_POST[password]' WHERE id = '$_POST[user_id]'";
				if(mysqli_query($this->conn(), $sql)){
					echo"<script type='text/javascript'> alert('Password Change SUCCESSFULL !!! Click OK To Login with Your New Password.'); window.location.href= '../menu/login.php'; </script>";
				}else{
					echo"<script type='text/javascript'>alert('ERROR: Could Not Change Password, Try Again Later But Contact Support On 08109214791 If Problem Persists'); window.location.href= '../index.php';</script>";
				}
			}
		}
	}
	$confirm = new confirm;
	$confirm->email();
	
?>