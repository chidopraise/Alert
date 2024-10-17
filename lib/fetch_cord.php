<?php
session_start();

	class page_info{
		public $page_id = 2;
		public $page_name = 'cordinate';
		
	}
	include_once "control.php";
	
	class cord extends control{
		public function cordnate(){
			//echo"love";
			if(isset($_SESSION["user_id"])){
				$user = $_REQUEST["q"];
				$sql = "SELECT * FROM users WHERE user_name = '$user'";
				$retval = mysqli_query($this->conn(),$sql);
				if(mysqli_num_rows($retval)){
					$row = mysqli_fetch_assoc($retval);
					echo $row["cordnate"];
				}
			}
		}
	}
	$cord = new cord;
	$cord->cordnate();
?>