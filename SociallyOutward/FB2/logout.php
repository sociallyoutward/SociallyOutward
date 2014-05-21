<?php 
require 'fbconfig.php';
$facebook->destroySession();  // to destroy facebook sesssion
setcookie('user', '', 0, '/', 'sociallyoutward.com', false);
header("Location: " ."http://sociallyoutward.com");        // you can enter home page here ( Eg : header("Location: " ."http://www.krizna.com"); 
?>