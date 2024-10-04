<?php
session_start();

	class page_info{
		public $page_id = 2;
		public $page_name = 'signup';
		
	}
	include_once "control.php";
	
	class signup extends control{
		public function reg(){
			if(isset($_POST["signup"])){
				$code = $this->random_numbers();
				
				$sql = "INSERT INTO users(first_name, last_name, user_name, email, password, phone, presence, date) VALUES('$_POST[first_name]','$_POST[last_name]','$_POST[user_name]','$_POST[email]','$_POST[password]', '$_POST[phone]','$code','$this->ddate')";
				
				$link = "https://alert.abrahamlivinus.tech/lib/confirmation.php?user_name=".$_POST['user_name'];
				
				$re = $_POST['email'];
				$rn = $_POST['first_name']." ".$_POST['last_name'];
				$es = "Email / Account Confirmation.";
				
				$eb = "<h2>Welcome ".$_POST['first_name']." ".$_POST['last_name']."</h2> <p>We At Alert Are Glad To Have You Onboard.</p> <p>Use This Code (".$code.") Or The Link Below To Confirm Your Email And Alert Account.</p> <p><b>Confirmation Link</b>: ".$link."<br> You Can Also Copy The Link And Paste It On Your Browser if Not Clickable In Your Inbox.</p>";
				
				$eab = "Welcome ".$_POST['first_name']." ".$_POST['last_name'].", We At Alert Are Glad To Have You Onboard. Use This Code (".$code.") Or The Link Below To Confirm Your Email And Alert Account. Confirmation Link: (".$link.") You Can Also Copy The Link And Paste It On Your Browser if Not Clickable In Your Inbox.";
				
				if(mysqli_query($this->conn(), $sql)){
					echo"<script type='text/javascript'> window.location.href= 'mail.php?re=".$re."&rn=".$rn."&es=".$es."&eb=".$eb."&eab=".$eab."'; </script>";
				}else{
					echo"<script type='text/javascript'> alert('ERROR: <DATABASE ISSUE> Acount Could Not Bet Created Unfortunatly. Contact Support on 08109214791.'); window.location.href= '../index.php'; </script>";
				}
			}
		}
		
		public function login(){
			if(isset($_POST["login"])){
				$sql = "SELECT * FROM users WHERE email = '$_POST[email]' && password = '$_POST[password]' OR user_name = '$_POST[email]' && password = '$_POST[password]' OR phone = '$_POST[email]' && password = '$_POST[password]'";
				
				$this->sql_query("login",$sql);
			}
		}
		
		public function logout(){
			if($_REQUEST["page"] == "logout"){
				$sql = "UPDATE users SET presence = '0' WHERE id = '".$_SESSION['user_id']."'";
				if(mysqli_query($this->conn(),$sql) == true){
					echo"updated";
				}
				
				echo"<script type='text/javascript'> alert('(".$this->app_name."): Good bye ".$_SESSION['first_name']." ".$_SESSION['last_name'].", We Hope To See You Soon !!!'); </script>";
				
				unset($_SESSION['user_id']);
				unset($_SESSION['first_name']);
				unset($_SESSION['last_name']);
				unset($_SESSION['middle_name']);
				unset($_SESSION['user_name']);
				unset($_SESSION['password']);
				session_destroy();
				//header('location:../index');
				echo"<script type='text/javascript'> window.location.href= '../index.php'; </script>";
			}
		}
		
		public function submit_email(){
			if(isset($_POST["submit_email"])){
				
				$sql = "SELECT * FROM users WHERE email = '$_POST[email]'";
				$retval = mysqli_query($this->conn(), $sql);
				if(mysqli_num_rows($retval)){
					$row = mysqli_fetch_assoc($retval);
					$link = "https://alert.abrahamlivinus.tech/menu/change_password.php?id=".$row['id'];
				
					$re = $_POST['email'];
					$rn = $row['first_name']." ".$row['last_name'];
					$es = "Email / Account Confirmation.";
					
					$eb = "<h2>Hello ".$row['first_name']." ".$row['last_name']."</h2> <p>We See You Forgot Your Password And Have Decided To Change It.</p> <p>Use This The Link Below To Change Your Account Password.</p> <p><b>Click The Link</b>: ".$link."<br> You Can Also Copy The Link And Paste It On Your Browser if Not Clickable In Your Inbox.</p>";
					
					$eab = "Welcome ".$row['first_name']." ".$row['last_name'].", We See You Forgot Your Password And Have Decided To Change It. Use This The Link Below To Change Your Account Password. Click The Link: (".$link.") You Can Also Copy The Link And Paste It On Your Browser if Not Clickable In Your Inbox.";
					
					echo"<script type='text/javascript'> window.location.href= 'mail.php?re=".$re."&rn=".$rn."&es=".$es."&eb=".$eb."&eab=".$eab."'; </script>";
				}else{
					echo"<script type='text/javascript'> alert('ERROR: Unfortunatly, Email Address Doest not Exist.'); window.location.href= '../menu/submit_email.php'; </script>";
				}
			}
		}
	}
	$signup = new signup;
	$signup->reg();
	$signup->login();
	$signup->logout();
	$signup->submit_email();
?>