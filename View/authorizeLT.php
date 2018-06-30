<?php

#session_start()
?>
<?php
$url = $_SERVER['REQUEST_URI'];
$url = explode('/', $url);
//echo $url[3];
if($_SESSION['userType']!="Lab technician"){
    header("location: notAuthorized.php");
}
    

?>