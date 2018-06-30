

<!DOCTYPE html>

<html>

    <head>
        <title>Reset Password</title>
        <link rel="stylesheet" href="CSS/loginCSS.css">
        <link rel="stylesheet" href="CSS/common.css">
    </head>
    <body>
        <div class = "header">
            <img src ="img/logo22.png" class="logoImg">
        </div>
        <div class="body">
            <div class="box">
                <br/>
                <div class="contentL">
                    <div class="boxHeader">
                        <h2>Reset Password</h2>
                    </div>
                    <?php
                    include_once '../Controller/AccountController.php';
                    $accountController = new AccountManager();
                    if (isset($_POST['submit'])) {
                        extract($_POST);
                        if (empty($username)) {
                            echo '<h3 class = "inError">INVALID CODE ENTERED</h3>';
                        } else {
                            $reset = $accountController->resetPassword($username);
                        }
                    }
                    ?>
                    <form name = "form" method = "post" class="form-horizontal">

                        <div class="boxContent">
                            <input placeholder="Username/ID" name = "username" id="username" type="text" size="30" maxlength="20"></br></br></br>
                            <input name="submit" id="resetBtn" type = "submit" value="Reset" class="primaryBtn floatRightBtn">
                            </br>
                            </br>
                        </div>

                    </form>
                </div>
            </div>
        </div>
</body>
</html>
