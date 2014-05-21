<?php

class Member
{
	private $id;
	private $first;
	private $last;
	private $username;
	private $password;

	public static function create($first, $last, $username, $password) {
		$mysqli = new mysqli("localhost", "socia150", "socially2013!", "socia150_sodb");
		

		if ($stmt = $mysqli->prepare("SELECT first FROM Member WHERE username=?")) {

			// Bind a variable to the parameter as a string. 
		    $stmt->bind_param("s", $username);
		    // Execute the statement.
		    
		    $stmt->execute();
		 
		    // Get the variables from the query.
		    $stmt->bind_result($f);
		 	
		 	//
		    $stmt->fetch(); 

		    // Close the prepared statement.
		    $stmt->close();

		}
		

		if (is_null($f)){
			if($stmt = $mysqli->prepare("INSERT INTO Member VALUES (0,?,?,?,?)")) {
 
		    // Bind the variables to the parameter as strings. 
		    $stmt->bind_param("ssss", $first, $last, $username, $password);
		 
		    // Execute the statement.
		    $stmt->execute();
		 
		    // Close the prepared statement.
		    $stmt->close();
		 	
		 	$new_id = $mysqli->insert_id;
		 	return new Member($new_id, $first, $last, $username, $password);
			}
		}
		else 
			return(json_encode(-1));


		//old method
		// $result = $mysqli->query("insert into Member values (0, '$first', '$last', '$username' ,'$password')");
		
		// if ($result) {
		// 	$new_id = $mysqli->insert_id;
		// 	return new Member($new_id, $first, $last, $username, $password);
		// }
		// return null;
	}
	
	public static function findByID($id) {
		$mysqli = new mysqli("localhost", "socia150", "socially2013!", "socia150_sodb");
		$result = $mysqli->query("select * from Member where id = " . $id);
		if ($result) {
		  if ($result->num_rows == 0){
		    return null;
		  }
		  $member_info = $result->fetch_array();
		  return new Member(intval($member_info[0]),
				   $member_info[1],
				   $member_info[2],
				   $member_info[3],
				   $member_info[4]);	
		}
		return null;
	      }

	 public static function upmatch($username, $password) {
		$mysqli = new mysqli("localhost", "socia150", "socially2013!", "socia150_sodb");
		
		if ($stmt = $mysqli->prepare("SELECT * FROM Member WHERE username=? and password=?")) {
 
		    // Bind a variable to the parameter as a string. 
		    $stmt->bind_param("ss", $username, $password);
		 
		    // Execute the statement.
		    $stmt->execute();
		 
		    // Get the variables from the query.
		    $stmt->bind_result($id,$f,$l,$u,$p);
		 	
		 	//
		    $stmt->fetch(); 

		    // Close the prepared statement.
		    $stmt->close();

		    if(is_null($u))
		    	return null;
		    else
		  		return new Member(intval($id),$f,$l,$u,$p);
		 
		}

		//old method
		// $result = $mysqli->query("select * from Member where username =  '$username' and password = '$password'");
		// if ($result) {
		//   if ($result->num_rows == 0){
		//     return null;
		//   }
		//  	
		// }
		// return null;
	    }	
      
	
	      
	     private function __construct($id, $first, $last, $username, $password) {
		$this->id = $id;
		$this->first = $first;
		$this->last = $last;
		$this->username = $username;
		$this->password = $password;
		
	      }
	    
	      public function getID() {
		return $this->id;
	      }
	    
	      public function getFirst() {
		return $this->first;
	      }
	    
	      public function getLast() {
		return $this->last;
	      }
	    
	      public function getUsername() {
		return $this->mother;
	      }
	      
	      public function getPassword() {
		return $this->father;
	      }
	    
	      public function getJSON() {
		$json_rep = array();
		$json_rep['id'] = $this->id;
		$json_rep['first'] = $this->first;
		$json_rep['last'] = $this->last;
		$json_rep['username'] = $this->username;
		$json_rep['password'] = $this->password;
		return $json_rep;
	      }
}
?>