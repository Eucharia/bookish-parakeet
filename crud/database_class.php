<?php
	class Database{

		private $dbUsername = "root";
		private $dbpass = "monkey";
		private $dbhost = "localhost";
		private $dbname = "chatdb";
		private $conn = false ; // check to see if database is connected
		private $result = array(); // result of a query will be solved here
		private $myQuery = ""; // used for debugging process for sql
		private $numRows = ""; // Used for returning number of rows
	
		
		public function connect()
		{	
			
			if(!$this->conn){
			 $dbConn =  mysql_connect( $this->dbhost, $this->dbUsername, $this->dbpass);

				if($dbConn){ 
					 $dbsel = mysql_select_db( $this->dbname, $dbConn);
					 $this->conn = true;
				         return true;
				 } else {
				     die("Could not connet to the database: " . mysql_error());
					return false;				
				}
			} 
		}
		// disconnct from the database
		
		public function disconnect()
		{
			if($this->conn) {
			mysql_close();
			// set the connection variable to false again
			$this->conn = false;
			return true;
			} else {
			     return false ;
			}
		}

		public function sql($sql)
		{
			$query = mysql_query($sql);
			$this->myQuery = $sql;
			
			if($query){
				$this->numResults = mysql_num_rows($query);
				for($i = 0; $i < count($this->numResults); $i++)
				{
					$r = mysql_fetch_array($query);
					$key = array_keys($r);
					for($x = 0; $x < count($key); $x++)
					{
						// sanitize the keys
						if(!is_int($key[$x])){
							if(mysqli_num_rows($query) >= 1){
								$this->result[$i][$key[$x]] = $r[$key][$x];
							} else {
								$this->result = null;
							}
						}
					}
					return true; //query was succssful
				}
			} else {
				array_push($this->result,mysql_error());
				return false; // No rows where returned
			}
		}
		
		
		// Select a query from a database table		
		
				// Function to SELECT from the database
		public function select($table, $rows = '*'){
			// Create query from the variables passed to the function
			$q = 'SELECT '.$rows.' FROM '.$table;
		
	        	$query = mysql_query($q);
				$numRes = mysql_num_rows($query);
				$res = array();
				//for($i = 0; $i < $numRes; $i++){
				while( $arryObj = mysql_fetch_array($query))
			
					//$arryObj = mysql_fetch_array($query)
				 	array_push($res, array('name' => $arryObj[1], 'email' => $arryObj[2] )  );
					echo json_encode(array( 'result' => $res ));
					
				//}
		}

		public function array_keys_prefix($arr, $pref = "") {
			    $rarr = array();
			    if (is_array($arr)){
				 foreach ($arr as $key => $val) {
			        $rarr[$pref.$key] = $val;
			   	 }
			   }		
		    	return $rarr;
		}

		public function array_keys_prefix_multi($arr, $pref = "") {
		    $rarr = array();
		    foreach ($arr as $key => $val) {
		        $rarr[] = $this->array_keys_prefix($val, $pref);
		    }
		    return $rarr;
		}
	
		//check if table exists in a database
		
		public function tableExists($table)
		{

			$tableInDB = mysql_query( "SHOW TABLES FROM '.$this->dbname.' LIKE  '.$table' ");
			if($tableInDB == 1){
				return true;	
			} else {
				return false;
			}
		}
		
		
		// Function to insert into the database
	    public function insert($table, $params=array()){
	    	// Check to see if the table exists
	    	 	$sql='INSERT INTO '.$table.  '('.implode(', ',array_keys($params)).') VALUES ("' . implode('", "', $params) . '")';
	            
	            // Make the query to insert to the database
	            if($ins = mysql_query($sql)){
	                return true; // The data has been inserted
	            }else{
	                return false; // The data has not been inserted
	            }
	  	}
		
		//Function to delete table or row(s) from database

		    public function delete($table, $where = null){
		    	// Check to see if table exists
		    	 if($this->tableExists($table)){
		    	 	// The table exists check to see if we are deleting rows or table
		    	 	if($where == null){
		                $delete = 'DROP TABLE '.$table; // Create query to delete table
		            }else{
		                $delete = 'DELETE FROM '.$table.' WHERE '.$where; // Create query to delete rows
		            }
		            // Submit query to database
		            if($del = mysql_query($delete)){
		            	array_push($this->result,mysql_affected_rows());
		                $this->myQuery = $delete; // Pass back the SQL
		                return true; // The query exectued correctly
		            }else{
		            	array_push($this->result,mysql_error());
		               	return false; // The query did not execute correctly
		            }
		        }else{
		            return false; // The table does not exist
		        }
		    }
			
		
		    public function update($table,$params=array(),$where){
		    	// Check to see if table exists
		    	if($this->tableExists($table)){
		    		// Create Array to hold all the columns to update
		            $args=array();
					foreach($params as $field=>$value){
						// Seperate each column out with it's corresponding value
						$args[]=$field.'="'.$value.'"';
					}
					// Create the query
					$sql='UPDATE '.$table.' SET '.implode(',',$args).' WHERE '.$where;
					// Make query to database
		            $this->myQuery = $sql; // Pass back the SQL
		            if($query = @mysql_query($sql)){
		            	array_push($this->result,mysql_affected_rows());
		            	return true; // Update has been successful
		            }else{
		            	array_push($this->result,mysql_error());
		                return false; // Update has not been successful
		            }
		        }else{
		            return false; // The table does not exist
       			 }
   		 }

		public function getResult(){
		        $val = $this->result;
		        $this->result = array();
		        return $val;
	   	 }
	
		    //Pass the SQL back for debugging
		    public function getSql(){
		        $val = $this->myQuery;
		        $this->myQuery = array();
		        return $val;
		    }
		    //Pass the number of rows back
		    public function numRows(){
		        $val = $this->numResults;
		        $this->numResults = array();
		        return $val;
		    }
		    // Escape your string
		    public function escapeString($data){
		        return mysql_real_escape_string($data);
	   }
}
?>
