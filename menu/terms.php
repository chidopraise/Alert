<?php
session_start();
	class page_info{
		public $page_id = 2;
		public $page_name = "terms and condition";
	}
	include("../lib/control.php");
	include("../parts/start.php");
	include("../parts/head.php");
	include("../parts/hand.php");
	//include("../parts/foot.php");
	include("../parts/end.php");
?>