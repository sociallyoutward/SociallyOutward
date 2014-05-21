<?php

class iNode
{
	private $id;
	private $name;
	private $parent;

	public static function create($name, $parent) {
		$mysqli = new mysqli("localhost", "socia150", "socially2013!", "socia150_sodb");
		
			if($stmt = $mysqli->prepare("INSERT INTO iNode VALUES (0,?,?)")) {
 
		    // Bind the variables to the parameter as strings. 
		    $stmt->bind_param("si", $name, $parent);
		 
		    // Execute the statement.
		    $stmt->execute();
		 
		    // Close the prepared statement.
		    $stmt->close();
		 	
		 	$new_id = $mysqli->insert_id;
		 	return new iNode($new_id, $name, intval($parent));
			}
	}
	
	public static function findByID($id) {
		$mysqli = new mysqli("localhost", "socia150", "socially2013!", "socia150_sodb");
		$result = $mysqli->query("select * from iNode where id = " . $id);
		if ($result) {
		  if ($result->num_rows == 0){
		    return null;
		  }
		  $iNode_info = $result->fetch_array();
		  return new iNode(intval($iNode_info[0]),
				   $iNode_info[1],
				   intval($iNode_info[2]));	
		}
		return null;
	      }

    public static function findChildren($parent) {
		$mysqli = new mysqli("localhost", "socia150", "socially2013!", "socia150_sodb");
		$result = $mysqli->query("select * from iNode where id = ". $parent);
		$child_List[] = $result->fetch_row();

		if(!is_null($child_List))
		{
			$result = $mysqli->query("select * from iNode where parent = ". $parent);
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
	    private function __construct($id, $name, $parent) {
		$this->id = $id;
		$this->name = $name;
		$this->parent = $parent;
	      }
	    
	      public function getID() {
		return $this->id;
	      }
	    
	      public function getName() {
		return $this->name;
	      }
	    
	      public function getParent() {
		return $this->parent;
	      }
	    
	    public function getJSON() {
		$json_rep = array();
		$json_rep['id'] = $this->id;
		$json_rep['name'] = $this->name;
		$json_rep['parent'] = $this->parent;
		return $json_rep;
	      }
}
?>