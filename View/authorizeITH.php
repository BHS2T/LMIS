<?php

#session_start()
?>
<?php
//$url = $_SERVER['REQUEST_URI'];
//$url = rtrim($url,'/');
//$url = explode('/', $url);
//echo $url[3];
if($_SESSION['userType'] != "IT head"){
    header("location: notAuthorized.php");
}
   
?>