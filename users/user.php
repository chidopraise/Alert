<?php
session_start();
	class page_info{
		public $page_id = 2;
		public $page_name = 'user';
		
	}
	//if(!isset($_SESSION['first_name'])){
		//header('location:../menu/discount');
		//5199 1107 9113 9246/0824/837
	//}
	include("../lib/control.php");
	include("../parts/start.php");
	$fetcher->fetch("update");
	//$fetcher->compactibility("com_1","",$_SESSION['user_id']);
	$fetcher->del();
	include("../parts/head.php");
	include("../parts/hand.php");
	//include("../parts/foot.php");
	include("../parts/end.php");
?>