<?php
include_once '../Controller/AccountController.php';
$accountController = new AccountManager();
if(isset($_POST['submit'])){
    extract($_POST);
    $login=$accountController->authenticate($username,$password);

    if($login){
        echo 'LOGGED IN .........';
        header("location:homepageH.php");
    }
 else {
        echo '<h1 style="color:red; text-align: center">Wrong username or password</h1>';    
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>login</title>
        <link rel="stylesheet" href="CSS/loginCSS.css">
        <link rel="stylesheet" href="CSS/common.css">
    </head>
    <body>
        <div class="body">
            <div class="box">
                <form name = "form" method = "post" class="form-horizontal"><br/>
                    <div class="contentL">
                        <div class="logo31">
                            <img class="logoM" src="img/logo0.png">
                        </div>
                        <div class="boxHeader">
                            <h1>Welcome</h1>
                        </div>    
                        <div class="boxContent">
                            <input placeholder="Username" name = "username" id="username" type="text" size="30" maxlength="100"><br/><br/><br/>
                            <input placeholder="Password" type="password" name ="password" id="password" size="30" maxlength="100"><br/><br/><br/><br/>
                            <input name="submit" id="loginBtn" type = "submit" value="LOGIN" class="primaryBtn ">
                            <br/><div id="forget"> <a href="ForgetPassword.php">forgetPassword?</a></div>
                            <br/>
                            <br/>
                        </div>
                    </div>                    
                </form>
            </div>
        </div>
    </body>
</html>