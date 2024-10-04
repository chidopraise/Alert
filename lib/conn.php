<?php
	class conn extends page_info{
		//public $host = "localhost";
		//public $user = "Alert";
		//public $pass = "08109214791Alert#";
		//public $db   = "alert";
		//public $email = "alert@abrahamlivinus.tech";
		//public $email_1 = "admin@abrahamlivinus.tech";
		//public $app_name = "alert";
		
		public $host = "localhost:3306";
		public $user = "root";
		public $pass = "";
		public $db   = "alert";
		public $email = "abrahamlivinus@gmail.com";
		public $email_i = "abrahamlivinus@gmail.com";
		public $app_name = "alert";
		
		
		public function conn(){
			return mysqli_connect($this->host,$this->user,$this->pass,$this->db);
		}
		
	}
	$conn = new conn;
		
?>