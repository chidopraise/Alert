<?php
date_default_timezone_set("africa/lagos");

	$page_info = new page_info;
	if($page_info->page_id == '1'){
		include("lib/conn.php");
	}elseif($page_info->page_id == '2'){
		include("../lib/conn.php");
	}elseif($page_info->page_id == '3'){
		include("../../lib/conn.php");
	}	
	

	
	
	#[AllowDynamicProperties]
	class control extends conn{
		
		public $url = NULL;
		
		public function __construct(){
			if(isset($_SESSION["user_id"])){
				$this->ddate = date("h:i d/m/y");
				$sql = "SELECT * FROM users WHERE id = '$_SESSION[user_id]'";
				$retval = mysqli_query($this->conn(),$sql);
				if(mysqli_num_rows($retval)){
					$row = mysqli_fetch_assoc($retval);
					$this->first_name = $row["first_name"];
					$this->last_name = $row["last_name"];
					$this->middle_name = $row["middle_name"];
					$this->user_name = $row["user_name"];
					$this->email = $row["email"];
					$this->phone = $row["phone"];
					$this->profile_pics = $row["profile_pics"];
					$this->address = $row["address"];
					$this->sex = $row["sex"];
					$this->country = $row["country"];
					$this->state = $row["state"];
					$this->date_of_birth = $row["date_of_birth"];
					$this->postal_code = $row["postal_code"];
					$this->lga = $row["lga"];
					$this->profession = $row["profession"];
					$this->marital_status = $row["marital_status"];
					$this->religion = $row["religion"];
					$this->nk_name = $row["nk_name"];
					$this->nk_phone = $row["nk_phone"];
					$this->presence = $row["presence"];
					$this->date = $row["date"];
				}
			}
		}
		
		function check(){
			if($this->conn() == true){
				echo"<font color='green'>Database is connected</code>";
			}else{
				echo"<code>Database not connected</code>";
			}
		}
		
		function random_numbers(){
			return mt_rand(100000, 999999);
		}
		
		function path($url){
			$this->url = $url;
			if($this->page_id == 1){
				echo $this->url;
			}elseif($this->page_id == 2){
				echo"../".$this->url;
			}elseif($this->page_id == 3){
				echo"../../".$this->url;
			}
		}
		
		
		function selector($option1,$option2,$option0){
			$this->option1 = $option1;
			$this->option2 = $option2;
			$this->option0 = $option0;
			
			if(isset($_SESSION["first_name"]) AND $_SESSION["user_id"] == 1){
				echo $this->option1;
			}elseif(isset($_SESSION["first_name"])){
				echo $this->option2;
			}else{
				echo $this->option0;
			}
		}
		
		
		function home(){
			if(isset($_SESSION["first_name"])){
				$this->path('users/'.$_SESSION['user_name']);
			}else{
				$this->path('menu/discount');
			}
		}
		
		function profile(){
			if(isset($_SESSION["first_name"])){
				echo "<li id='li'><a href='";$this->path('menu/profile');echo"' class='a'>profile</a></li>";
			}else{
				
			}
		}
		
		function profile1(){
			if(isset($_SESSION["first_name"])){
				echo "<li id='li2'><a href='";$this->path('menu/profile');echo"' class='a2'>PROFILE</a></li>";
			}else{
				
			}
		}
		
		function match(){
			if(isset($_SESSION["first_name"])){
				echo "<li id='li'><a href='";$this->path('menu/match');echo"' class='a'>match</a></li>";
			}else{
				
			}
		}
		
		function purchase(){
			if(isset($_SESSION["first_name"])){
				echo "<li id='li'><a href='";$this->path('menu/purchase');echo"' class='a'>make purchase with 50% discount</a></li>";
			}else{
				
			}
		}
		
		function still_on(){
			if(isset($_SESSION["first_name"])){
				echo"<script>window.location.href = '../users/$_SESSION[user_name]';</script>";
			}
		}
		
		function check_email_confirmation(){
			if(isset($_SESSION['user_name']) && $this->page_id == 1){
				if($_SESSION['presence'] != 1){
					echo"<script type='text/javascript'> window.location.href= 'menu/confirm_email.php'; </script>";
				}
			}elseif(isset($_SESSION['user_name']) && $this->page_id == 2){
				if($_SESSION['presence'] != 1){
					echo"<script type='text/javascript'> window.location.href= '../menu/confirm_email.php'; </script>";
				}
			}
		}
		
		public function sql_query($order,$sql){
			if($order == 'table'){
				if(mysqli_query($this->conn(),$sql)){
					echo("TABLE SUCCESFULLY CREATED");
				}else{
					echo("could not create table".mysqli_error($this->conn()));
				}
			}elseif($order == 'insert'){
				if(mysqli_query($this->conn(),$sql)){
					echo("YOUR RECORD/ DATA HAS BEEN SUCCESFULLY INSERTED");
					if(isset($_SESSION['first_name'])){
						echo"<script type='text/javascript'> alert('".$_SESSION['first_name']." congratulations,you have succesfully signed the NEW user in. '); window.location.href = '../index.php';</script>";
						}else{
							echo"<script type='text/javascript'> alert('CONGRATULATIONS: YOU HAVE SUCCEFULLY CREATED AN ACCOUNT WITH ".$this->app_name.", THANK YOU. '); window.location.href = '../index.php';</script>";
						}
					
				}else{
					die("could not insert record".mysqli_error($this->conn()));
					if(isset($_SESSION['first_name'])){
						echo"<script type='text/javascript'> alert(' so sorry ".$_SESSION['first_name'].", you were unable to sign in that user please try again '); window.location.href = '../index.php';</script>";
						}else{
							echo "<script type='text/javascript'> alert('could not create account please try again '); window.location.href = '../index.php';</script>";
						}
				}
			}elseif($order == 'update'){
				if(mysqli_query($this->conn(),$sql)){
					echo'YOUR DATA HAS BEEN SUCCESFULLY UPDATED';
					echo"<script> alert('YOUR UPDATE IS SUCCESFUL...'); window.location.href='setting';</script>";
				}else{
					//echo'ERROR!!! data could not be updated'.mysqli_error($conn);
					echo"<script> alert('ERROR!!!, could not update you data...'); window.location.href='setting';</script>";
				}
			}elseif($order == 'select'){
				if($retval = mysqli_query($this->conn(),$sql)){
					echo'<table><tr><td>CONNECTION SUCCEFUL<td><td style="width:30px;"><marquee direction="right">.....</marquee></td></tr></table><br />';
					echo"<table><tr><td><div style='width:50px'><marquee>.....</marquee></div></td><td><font color='green'>ready to deliver(retreiving)</td><td><div style='width:50px'><marquee direction='right'>.....</marquee></div></font></td></tr></table><br>";
					
					while($row = mysqli_fetch_assoc($retval)){
						
					echo"<table border='1'>";
					echo"<thead><tr><th>ID</th><th>FIRST NAME</th><th>LAST NAME</th><th>OTHER NAME</th><th>USER NAME</th><th>EMAIL</th><th>PHONE</th><th>PASSWORD</th><th>ADDRESS</th><th>SEX</th><th>COUNTRY</th><th>SEX</th><th>LGA</th><th>REFERAL CODE</th></tr></thead>";
					echo'<tbody>';
						echo "<tr><td>00 ".$row['id'].'</td><td>  '.$row['f_name'].' </td><td> '.$row['l_name'].' </td><td> '.$row['o_name'].' </td><td> '.$row['u_name'].' </td><td> '.$row['email'].' </td><td> '.$row['phone'].' </td><td> '.$row['password'].' </td><td> '.$row['address'].' </td><td> '.$row['sex'].' </td><td> '.$row['country'].' </td><td> '.$row['state'].' </td><td> '.$row['lga']."</td><td>".$row['r_code']."</td></tr>";
						echo'</tbody>';
						echo'</table>';
					}
				}else{
					echo'could not retrieve your data';
				}
			}elseif($order == 'login'){
					if(mysqli_num_rows($retval = mysqli_query($this->conn(),$sql)) > 0){
						$row = mysqli_fetch_assoc($retval);
						//session_start();
						
						$_SESSION['user_id'] = $row['id'];
						$_SESSION['first_name'] = $row['first_name'];
						$_SESSION['middle_name'] = $row['middle_name'];
						$_SESSION['last_name'] = $row['last_name'];
						$_SESSION['user_name'] = $row['user_name'];
						$_SESSION['email'] = $row['email'];
						$_SESSION['phone'] = $row['phone'];
						$_SESSION['password'] = $row['password'];
						$_SESSION['address'] = $row['address'];
						$_SESSION['sex'] = $row['sex'];
						$_SESSION['country'] = $row['country'];
						$_SESSION['state'] = $row['state'];
						$_SESSION['lga'] = $row['lga'];
						$_SESSION['date_of_birth'] = $row['date_of_birth'];
						$_SESSION['postal_code'] = $row['postal_code'];
						$_SESSION['profession'] = $row['profession'];
						$_SESSION['marital_status'] = $row['marital_status'];
						$_SESSION['religion'] = $row['religion'];
						$_SESSION['nk_name'] = $row['nk_name'];
						$_SESSION['nk_phone'] = $row['nk_phone'];
						//$_SESSION['presence'] = $row['presence'];
						
						if($row['presence'] == 1 OR $row['presence'] == 0){
							$sql = "UPDATE users SET presence = '1' WHERE id = '$_SESSION[user_id]'";
							mysqli_query($this->conn(),$sql);
						}
						
						$sql_1 = "SELECT * FROM users WHERE id = '$_SESSION[user_id]'";
						if(mysqli_num_rows($retval_1 = mysqli_query($this->conn(),$sql_1)) > 0){
							$row_1 = mysqli_fetch_assoc($retval_1);
							$_SESSION['presence'] = $row_1['presence'];
						}
						
						echo"<script type='text/javascript'> alert('WELCOME $_SESSION[first_name] $_SESSION[last_name]'); window.location.href='../index.php?app_name=".$this->app_name."';  </script>";	
						
					}else{
						echo"<script type='text/javascript'> alert('user doesnt exist please check your email,username & password or create an account'); window.location.href='../index.php?app_name=".$_REQUEST['app_name']."';  </script>";	
					}
			}
		}


	}
	$control = new control;
	
	
	#[AllowDynamicProperties]
	class fetcher extends control{
		function users_table(){
			$sql = "create table IF NOT EXISTS users(id INT AUTO_INCREMENT, first_name VARCHAR(30) NOT NULL,last_name VARCHAR(30) NOT NULL,middle_name VARCHAR(30) NULL, user_name VARCHAR(20) NOT NULL,email VARCHAR(60) NOT NULL,phone VARCHAR(20) NULL,password VARCHAR(50) NOT NULL,profile_pics VARCHAR(100) NULL,address VARCHAR(100) NULL,sex CHAR(20) NULL,country VARCHAR(50) NULL,state CHAR(50) NULL,date_of_birth VARCHAR(30) NULL,postal_code INT NULL,lga VARCHAR(50) NULL,profession VARCHAR(50) NUll,marital_status VARCHAR(50) NULL,religion VARCHAR(50) NULL,nk_name VARCHAR(50) NULL,nk_phone VARCHAR(20) NULL, presence INT NULL, date CHAR(30) NULL, sign char(20) NULL, primary key(id))";
			$this->sql_query("table",$sql);
		}
		
		public function menu(){
			$sql = "CREATE TABLE IF NOT EXISTS menu(id INT AUTO_INCREMENT, user_id INT NOT NULL, menu_type VARCHAR(30) NOT NULL, picture VARCHAR(150) NULL, text VARCHAR(1500) NULL, height VARCHAR(15) NULL, complection VARCHAR(15) NULL, finder_id INT NULL, name_2 VARCHAR(30) NULL, last_seen VARCHAR(30) NULL, location VARCHAR(50) NULL, found_date VARCHAR(30) NULL, reward VARCHAR(30) NULL, Authorize INT NULL, primary key(id))";
			$this->sql_query("table",$sql);
		}
		
		
		function missing(){
			$sql = "SELECT * FROM menu WHERE menu_type = 'missing' && Authorize = '1' ORDER BY id DESC";
			$retval = mysqli_query($this->conn(),$sql);
			if(mysqli_num_rows($retval)){
				while($row = mysqli_fetch_assoc($retval)){
					echo'
						<div class="col-md-4">
							<div class="missing-person-card">
								<img src="'.$row['picture'].'" alt="Missing Person">
								<h2>'.$row['name_2'].'</h2>
								<p style="color: #000;">Last seen: '.$row['last_seen'].'</p>
								<p style="color: #000;">Location: '.$row['location'].'</p>
								<p style="color: #000;">Description: '.$row['text'].'</p>
								<p class="reward">Reward: $'.$row['reward'].'</p>
							</div>
						</div>
					';
				}
			}
		}
		
		function wanted(){
			$sql = "SELECT * FROM menu WHERE menu_type = 'wanted' && Authorize = '1' ORDER BY id DESC";
			$retval = mysqli_query($this->conn(),$sql);
			if(mysqli_num_rows($retval)){
				while($row = mysqli_fetch_assoc($retval)){
					echo'
						<div class="col-md-4">
							<div class="missing-person-card">
								<img src="'.$row['picture'].'" alt="Missing Person">
								<h2>'.$row['name_2'].'</h2>
								<p style="color: #000;">Last seen: '.$row['last_seen'].'</p>
								<p style="color: #000;">Location: '.$row['location'].'</p>
								<p style="color: #000;">Description: '.$row['text'].'</p>
								<p class="reward">Reward: $'.$row['reward'].'</p>
							</div>
						</div>
					';
				}
			}
		}
		
		public function fix(){
			$sql = "ALTER TABLE users ADD cordnate VARCHAR(50) NULL";
			$this->sql_query("table",$sql);
		}
	}
	$fetcher = new fetcher;
	
	//$fetcher->users_table();
	//$fetcher->random_numbers();
	//$fetcher->menu();
	$fetcher->fix();
	
?>