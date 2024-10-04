<?php
session_start();
	class page_info{
		public $page_id = 2;
		public $page_name = "wanted";
	}
	include("../lib/control.php");
	include("../parts/start.php");
	include("../parts/head.php");
	include("../parts/shoulder.php");
	include("../parts/wanted.php");
	//include("../parts/lap.php");
	include("../parts/leg.php");
	include("../parts/stop.php");
?>