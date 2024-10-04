<?php
session_start();

	class page_info{
		public $page_id = 2;
		public $page_name = 'report_missing';
		
	}
	include_once "control.php";
	
	class report_missing extends control{
		function report(){
			if(isset($_POST["submit_report"])){
				$text = addslashes($_POST["desc"]);
				$path = "../images/media/".$_FILES["file"]["name"];
				$target_dir = "../images/media/";
				$target_file = $target_dir.basename($_FILES["file"]["name"]);
				$uploadok = 1;
				$imagefiletype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				///////////////check if file is an actual image///////////////////////////////////////
				if(isset($_POST["pps"])){
					$check = getimagesize($_FILES["file"]["tmp_name"],$target_dir);
					if($check !== false){
						"file is an image -".$check["mime"]
						.".";
						$uploadok= 1;
					}else{
						echo "file is not an image.";
						$uploadok = 0;
					}
				}
				//////////////////////////check if file already exist//////////////////////////
				if(file_exists($target_file)){
					$sql = "INSERT INTO menu(user_id, menu_type, picture, text, height, complection, name_2, last_seen, location, reward, Authorize) VALUES('$_SESSION[user_id]','$_POST[type]','$path','$text','$_POST[height]','$_POST[complexion]','$_POST[name]','$_POST[l_s_d]','$_POST[l_s_l]','$_POST[reward]','1')";
					$retval = mysqli_query($this->conn(),$sql);
					if($retval == true){
						echo"<img src='../images/suc2.png' height='100%' width='100%'>";
						echo"<script>alert('SUCCESSFUL: You Have Listed A Person As Missing !!!'); window.location.href= '../index.php';</script>";
						die("could not list the missing person").mysqli_error($this->conn());
					}else{
						echo"<script>alert('ERROR: Could Not Listed A Person As Missing, Please Contact Support For Assistance !!!'); window.location.href= '../menu/report.php';</script>";
					}
					
				}else {
					//////////////////////check file size////////////////
					if ($_FILES["file"]["size"] > 1000000) {
						echo "sorry, your file is too large.";
						$uploadok = 0;
					}
					////////////////////////////////allow certain file format//////////////////////////
					if ($imagefiletype != "jpg" && $imagefiletype != "png" && $imagefiletype != "jpeg" && $imagefiletype != "ico" && $imagefiletype != "gif" && $imagefiletype != "PNG" && $imagefiletype != "jfif") {
						echo "sorry, only JPG,JPEG,PNG,& GIF files are allowed.";
						$uploadok = 0;
					}
					////////// check if $uploadok is set to 0 by an error/////////////////////////////
					if ($uploadok == 0) {
						echo "your file was not uploaded.";
					} else {

						///////////////////////if everything is ok,try uploading the file ///////////////////

						if (move_uploaded_file($_FILES["file"]['tmp_name'], $target_file)) {
							$sql = "INSERT INTO menu(user_id, menu_type, picture, text, height, complection, name_2, last_seen, location, reward, Authorize) VALUES('$_SESSION[user_id]','$_POST[type]','$path','$text','$_POST[height]','$_POST[complexion]','$_POST[name]','$_POST[l_s_d]','$_POST[l_s_l]','$_POST[reward]','1')";
							if(mysqli_query($this->conn(),$sql)){
								echo"<img src='../images/suc2.png' height='100%' width='100%'>";
								echo"<script>alert('SUCCESSFUL: You Have Listed A Person As Missing !!!'); window.location.href= '../index.php';</script>";
							}else{
								echo"<script>alert('ERROR: Could Not Listed A Person As Missing, Please Contact Support For Assistance !!!'); window.location.href= '../menu/report.php';</script>";
								die("could not list the missing person").mysqli_connect($this->conn());
							}
						} else {
							echo"<script>alert('Move_uploaded_file ERROR: Could Not Upload Photo. !!!'); window.location.href= '../menu/report.php';</script>";
						}
					}
				}
			}
		}
	}
	$report_missing = new report_missing;
	$report_missing->report();
?>