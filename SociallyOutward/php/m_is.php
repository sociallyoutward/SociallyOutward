<?php
require_once('orm/m_i.php');
require_once('orm/iNode.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if(!is_null($_GET['parent']))
        {
          $par = $_GET['parent'];
          $mid = $_GET['member'];
          $initial = $_GET['initial'];
          $children = m_i::findChildren($mid,$par,$initial);
          if (is_null($children))
          {
            header("HTTP/1.1 404 Not Found");
            print("member_interest has no children");
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
        if(!is_null($_GET['mid']))
        {
          $mid = $_GET['mid'];
          $interests = m_i::findByMID($mid);
          if (is_null($interests))
          {
            header("HTTP/1.1 404 Not Found");
            print("Member has no interests");
            exit();
          }
          else
          {
            header("Content-type: application/json");
            print(json_encode($interests));
            exit();
          }
        }
      }
    }
else if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(!is_null($_POST['clear']))
    {
      m_i::clearInterests($_POST['mid']);
      exit();
    }

    else if(!is_null($_POST['pid']))
    {
      m_i::updateParent($_POST['mid'],$_POST['iid'],$_POST['pid']);
      exit();
    }
    else
    {
      $mid = intval($_POST['mid']);
      if ($mid<1) {
        header("HTTP/1.1 400 Bad Request");
        print($mid);
        exit();
      }

      $iid = $_POST['iid'];
      if ($iid<1) {
        header("HTTP/1.1 400 Bad Request");
        print("Illegal interest id passed");
        exit();
    }
    addNode($mid,$iid);
    }
}
header("HTTP/1.1 400 Bad Request");
print("URL did not match any known action.");


function addNode($mid,$iid)
{
  $myNode = iNode::findByID($iid);
  $nodeParent = $myNode -> getParent();

  $mi = m_i::create($mid,$iid,$nodeParent,false);
  if (is_null($mi)) {
      header("HTTP/1.1 400 Bad Request");
      print("Failed at database");
      exit();
    }
    else if($mi==-1)
    {
        header("HTTP/1.1 400 Bad Request");
        print("Interest already added");
        exit();
    }
    

      $parentFinder = true;
      
      while($parentFinder)
      {
        if($nodeParent!=1)
        {
          $parentInTree = m_i::CheckInTree($mid,$nodeParent);
          if($parentInTree=="true")
          {
            $parentFinder=false;
          }
          else
          {
            $myNode = iNode::findByID($nodeParent);
            $toCreate = $nodeParent;
            $nodeParent = $myNode -> getParent();

            $mi = m_i::create($mid,$toCreate,$nodeParent,false);
          }
        }
        else
        {
          $parentFinder=false;
        }
      }
}
?>
