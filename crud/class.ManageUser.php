<?php
	include_once('class.database.php');

	/**
	* 
	*/
	class ManageUsers {

		public $link;
		
		function __construct()
		{
			$db_connection = new DbConnection();
			$this->link = $db_connection->connect();
			return $this->link;
		}

		function registerUsers($username, $email, $password, $ip_address, $date, $time){
			$query = $this->link->prepare("INSERT INTO users (username,email, password,ip_addr,reg_date,time) VALUES (?,?,?,?,?,?)");
			$values = array($username,$email, $password, $ip_address, $date, $time);
			$query->execute($values);
			$counts = $query->rowCount();
			return $counts;
		}

		function loginUsers(){
			$query = $this->link->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
			$rowCount = $query->rowCount();
			return $rowCount;
		}

		function getUserInfo($username){
			$query = $this->link->query("SELECT * FROM users WHERE username = '$username' ");
			$rowCount = $query->rowCount();
			if($rowCount == 1){
				$result = $query->fetchAll();
				
				session_start();
				$_SESSION['username'] = $username;
				return $result;
			} else {
				return $rowCount;
			}
		}
	}

	$users = new ManageUsers();
	//echo $users->registerUsers('Gabby', '123jesy', '127.0.0.1', '12-04-2016', '12.00');
?>
