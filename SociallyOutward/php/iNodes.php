<?php
require_once('orm/iNode.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
        if(!is_null($_GET['child']))
        {
          $childID = $_GET['child'];
          $child = iNode::findByID($childID);
          $parentID = $child->getParent();
          header("Content-type: application/json");
          print(json_encode($parentID));
          exit();
        }
        else if(!is_null($_GET['parent']))
        {
          $par = $_GET['parent'];
          $children = iNode::findChildren($par);
          if (is_null($children))
          {
            header("HTTP/1.1 404 Not Found");
            print("iNode has no children");
            exit();
          }
          else
          {
            header("Content-type: application/json");
            print(json_encode($children));
            exit();
          }
        }
        else
        {
        $in_id = $_GET['id'];
        $in = iNode::findByID($in_id);
        if (is_null($in))
        {
            header("HTTP/1.1 404 Not Found");
            print("iNode id specified either not found or not legal");
            exit();
        }
        else
        {
            header("Content-type: application/json");
            print(json_encode($in->getJSON()));
            exit();
        } 
      }
    
}
else if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $name = $_POST['name'];
    if ($name == "") {
      header("HTTP/1.1 400 Bad Request");
      print("No name passed");
      exit();
    }

    $parent = $_POST['parent'];
    if ($parent <= "") {
      header("HTTP/1.1 400 Bad Request");
      print("No parent passed");
      exit();
    }

    $in = iNode::create($name, $parent);
    if (is_null($in)) {
      header("HTTP/1.1 400 Bad Request");
      print("iNode failed at database");
      exit();
    }
    else
    {
    header("Content-type: application/json");
    print(json_encode($in->getJSON()));
    exit();
    }
}
header("HTTP/1.1 400 Bad Request");
print("URL did not match any known action.");
?>
