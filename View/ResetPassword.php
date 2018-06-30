<?php

include_once '../Controller/AccountController.php';

$accountController = new AccountManager();
if(isset($_POST['submit'])){
    extract($_POST);
    if(empty($codeP)){
        echo '<h2>INCORRECT CODE</h2>';
    }
 else {
    $code=$accountController->enterCode($codeP);
        
    }
    
}
?>

<!DOCTYPE html>


<html>
 
    <head>
        <title>ResetPASSWORD</title>
        <link rel="stylesheet" href="CSS/loginCSS.css">
        <link rel="stylesheet" href="CSS/common.css">
    </head>
    <body>
    <div class = "header">
        <img src ="img/logo0.png" class="logoImg">  
    </div>
        <div class="body">
            <hr>
            <div class="box">
                
                
                <form name = "form" method = "post" class="form-horizontal">
                  
                        </br>
                        <div class="contentL">
                            <div class="boxHeader">
                                <h2>Reset Password</h2>
                            </div>
                            <div class="boxContent">
                                <h3>Enter The Code We have Sent You with your email</h3>
                                <input placeholder="Username/ID" name = "codeP" id="username" type="text" size="30" maxlength="20"></br></br></br>
                                <input name="submit" id="resetBtn" type = "submit" value="Enter" class="primaryBtn floatRightBtn">
                                </br>
                                </br>
                            </div>
                        </div>
                                        
                </form>
            </div>

        </div>
    </body>
</html>
