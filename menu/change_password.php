<?php
session_start();
	class page_info{
		public $page_id = 2;
		public $page_name = "change_password";
	}
	include("../lib/control.php");
	include("../parts/start.php");
	include("../parts/change_password.php");
	//include("../parts/leg.php");
	include("../parts/stop.php");
?>