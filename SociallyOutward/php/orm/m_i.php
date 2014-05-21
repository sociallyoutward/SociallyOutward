<?php

class m_i
{
	private $memberID;
	private $interestID;
	private $interestPID;
	private $conglomerate;

	public static function create($mid, $iid, $ipid, $cong) {
		
		$mysqli = new mysqli("localhost", "socia150", "socially2013!", "socia150_sodb");
		//checks if user already has interest
		if ($stmt = $mysqli->prepare("SELECT memberid FROM member_interest WHERE memberid=? and interestid=?")) {

			// Bind a variable to the parameter as a string. 
		    $stmt->bind_param("ii", $mid, $iid);
		    // Execute the statement.
		    
		    $stmt->execute();
		 
		    // Get the variables from the query.
		    $stmt->bind_result($f);
		 	
		 	//
		    $stmt->fetch(); 

		    // Close the prepared statement.
		    $stmt->close();

		}



		if($f==0)
		{

		$mysqli = new mysqli("localhost", "socia150", "socially2013!", "socia150_sodb");
		
			if($stmt = $mysqli->prepare("INSERT INTO member_interest VALUES (?,?,?,?)")) {
 
		    // Bind the variables to the parameter as strings. 
		    $stmt->bind_param("iiii", $mid, $iid, $ipid, $cong);
		 
		    // Execute the statement.
		    $stmt->execute();
		 
		    // Close the prepared statement.
		    $stmt->close();
		 	return new m_i(intval($mid), intval($iid),intval($ipid),intval($cong));
			}
		}
		else
			return -1;
	}
	
	public static function findByMID($mid) {
		$mysqli = new mysqli("localhost", "socia150", "socially2013!", "socia150_sodb");
		$result = $mysqli->query("select * from member_interest where memberid = " . $mid . " and conglomerate = 0");
		if ($result) {
		  if ($result->num_rows == 0){
		    return null;
		  }
		  $next_row = $result->fetch_row();
		  	while ($next_row) 
		 	{
				$child_List[] = $next_row;
				$next_row = $result->fetch_row();
		  	}
		  	return $child_List;	
		}
		return null;
	}

	public static function CheckInTree($mid,$iid) {
		$mysqli = new mysqli("localhost", "socia150", "socially2013!", "socia150_sodb");
		$result = $mysqli->query("select * from member_interest where memberid = " . $mid . " and interestid = " . $iid);
		if ($result) {
		  if ($result->num_rows == 0){
		    return "false";
		  }
		  $next_row = $result->fetch_row();
		  return "true";
		}
		return "false";
	}

	public static function findChildren($member,$parent,$initial) {
		$mysqli = new mysqli("localhost", "socia150", "socially2013!", "socia150_sodb");
		 if($initial=="false")
		 {
		 $result = $mysqli->query("select * from member_interest where memberid = " . $member . " and interestid = " . $parent);
		 $child_List[] = $result->fetch_row();
		 }

		 if($initial||!is_null($child_List))
		 {
			$result = $mysqli->query("select * from member_interest where memberid = " . $member . " and interestPid = " . $parent);
			if ($result) {
			  if ($result->num_rows == 0){
			    return $child_List;
			  }
			  
			  	$next_row = $result->fetch_row();
			  	while ($next_row) 
			 	{
					$child_List[] = $next_row;
					$next_row = $result->fetch_row();
			  	}
			  	return $child_List;
			}
		 }
		return null;
	}

	public static function updateParent($mid,$iid, $newParent) {
		$mysqli = new mysqli("localhost", "socia150", "socially2013!", "socia150_sodb");
		$result = $mysqli->query("update member_interest set interestPid =" . $newParent . " where memberid = ". $mid ." and interestid = " . $iid);
		if ($result) {
		  if ($result->num_rows == 0){
		    return null;
		  }
		  return true;
		}
		return null;
	     }


	public static function clearInterests($mid) {
		$mysqli = new mysqli("localhost", "socia150", "socially2013!", "socia150_sodb");
		$result = $mysqli->query("DELETE FROM `member_interest` WHERE memberid =".$mid);
		if ($result) {
		  return(json_encode("sucess"));
		}
		return null;
	}

	    private function __construct($mid, $iid, $ipid, $cong) {
		$this->memberID = $mid;
		$this->interestID = $iid;
		$this->interestPID = $ipid;
		$this->conglomerate = $cong;
	      }
	    
	      public function getMID() {
		return $this->memberID;
	      }
	    
	      public function getIID() {
		return $this->interestID;
	      }
	      public function getIPID() {
		return $this->interestPID;
	      }
	    	public function getCong() {
		return $this->conglomerate;
	      }

	    public function getJSON() {
		$json_rep = array();
		$json_rep['mid'] = $this->memberID;
		$json_rep['iid'] = $this->interestID;
		$json_rep['ipid'] = $this->interestPID;
		$json_rep['cong'] = $this->conglomerate;
		return $json_rep;
	      }
}
?>