<?php
session_start();
	class page_info{
		public $page_id = 1;
		public $page_name = 'index';
		public $app_name = 'alert';
	}
	$page_info = new page_info;

	include("lib/control.php");
	include("parts/start.php");
	include("parts/head.php");
	include("parts/shoulder.php");
	include("parts/chest.php");
	include("parts/waist.php");
	include("parts/lap.php");
	include("parts/leg.php");
	include("parts/stop.php");
?>
