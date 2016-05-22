<?php
	class DbConnection{
		protected $db_conn;
		public $db_name = "chatdb";
		public $db_pass = "monkey";
		public $db_username = "root";
		public $db_host = "localhost";

		function connect(){
			try{
				$this->db_conn = new PDO("mysql:host=$this->db_host;dbname=$this->db_name",$this->db_username,$this->db_pass);
				return $this->db_conn;
			}
			catch(PDOException $e) 
			{
				echo 'Connection failed'.$e->getMessage();
				//return $e->getMessage();
			}
		}
	}
?>
