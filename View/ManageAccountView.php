<?php
session_start();
?>

<html>
    <head>
        <title>Manage account</title>
        <link rel="stylesheet" href="CSS/maView.css">
        <link rel="stylesheet" href="CSS/common.css">
    </head>
    <body>
  
        <div class = "header">
            <img src ="img/logo22.png" class="logoImg">
        </div>
       <?php
       include 'header.php';
       ?>

        <div class="body">
            
            <div class="box">
                <form name = "form" method = "post" class="form-horizontal" action = "../Controller/AccountController.php">
                  
                        </br>
                        <div class="contentL">
                            <div class="boxHeader">
                                <h2>Manage Account</h2>
                            </div>
                            <div class="boxContent">
                                <p class = "redTxt">*Change password</p>
                                <input placeholder="Current password" name = "userid" id="oldpass" type="text" size="30" maxlength="100"></br></br></br>
                                <input placeholder="New password" type="text" name ="newpass1" id="newpass1" size="30" maxlength="100"></br></br>
                                <input placeholder="Re-enter password" type="text" name ="newpass2" id="newpass2" size="30" maxlength="100"></br>
                                <button class="primaryBtn rightBtn">Change</button></br>
                                
                                <p class="redTxt">*Change username</p>
                                <input placeholder="Username" type="text" name ="username3" id="username3" size="30" maxlength="100"></br>
                                <button class="primaryBtn rightBtn">Change</button>                                </br>
                                </br>
                            </div>
                        </div>
                                        
                </form>
            </div>

        </div>
    </body>
</html>
