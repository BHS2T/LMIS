<?php

#session_start()
?>
<?php

if($_SESSION['userType']!="Lab manager"){
    header("location: notAuthorized.php");
}
    

?>