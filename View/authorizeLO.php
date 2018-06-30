<?php

#session_start()
?>
<?php
$url = $_SERVER['REQUEST_URI'];
//$url = rtrim($url,'/');
$url = explode('/', $url);
if($_SESSION['userType']!="Lab organizer"){
    header("location: notAuthorized.php");
}
    

?>