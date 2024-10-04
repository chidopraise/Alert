<?php
session_start();
	class page_info{
		public $page_id = 2;
		public $page_name = "confirm_email";
	}
	include("../lib/control.php");
	include("../parts/start.php");
	include("../parts/confirm_email.php");
	//include("../parts/leg.php");
	include("../parts/stop.php");
?>