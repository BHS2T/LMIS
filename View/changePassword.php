<?php
session_start();
?><?php
include_once '../Controller/AccountController.php';

$accountController = new AccountManager();
if(isset($_POST['submit'])){
    extract($_POST);
    $code=$accountController->enterCode($changepass);
    
}
?>

<html>
    <head>
        <title>Edit Member</title>
        <link rel="stylesheet" href="CSS/loginCSS.css">
        <link rel="stylesheet" href="CSS/common.css">
    </head>
    <body>
       <?php
       include 'header.php';
       
       ?>

        <div class="body">
            <div class="box">
                <form name = "form" method = "post" class="form-horizontal">
                  
                        </br>
                        <div class="contentL">
                            <div class="boxHeader">
                                <h2>Change Password</h2>
                            </div>
                            <div class="boxContent">
                                <input placeholder="New Password" name = "newpass" id="newpass" type="text" size="30" maxlength="100"></br></br></br>
                                <input type = "submit" value="Change" name="changepass" class="primaryBtn floatRightBtn">
                                </br>
                                </br>
                            </div>
                        </div>
                                        
                </form>
            </div>

        </div>
    </body>
</html>
