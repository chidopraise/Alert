<?php
session_start();
	class page_info{
		public $page_id = 2;
		public $page_name = "missing";
	}
	include("../lib/control.php");
	include("../parts/start.php");
	include("../parts/head.php");
	include("../parts/shoulder.php");
	include("../parts/missing.php");
	//include("../parts/lap.php");
	include("../parts/leg.php");
	include("../parts/stop.php");
?>