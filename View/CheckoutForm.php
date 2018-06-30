<?php
session_start();
if (isset($_GET['LDN'])) {
}
?>
<?php
    include 'authorizeLT.php';
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Check out</title>
        <link rel="stylesheet" href="CSS/loginCSS.css">
        <link rel="stylesheet" href="CSS/common.css">
    </head>
    <body>
        <div class="body">
        <div class = "header">
                <img src ="img/logo22.png" class="logoImg">
        </div>
            <?php
            include 'header.php';
            ?>
            <?php
            include '../Controller/TaskController.php';
            $taskController = new TaskController();
            if(isset($_POST['submit'])){
                extract($_POST);
                if(isset($_GET['LDN'])){
                    $ldn = $_GET['LDN'];
                if($taskController->compareCheckout($checkout,$ldn)){
                    header("location: ViewTask.php");
                
                }
 else {
                    echo '<h2>Incorrect Checkout No</h2>';        
 }
 }          
 }          
            ?>          
            <div class="box">
                <form name = "form" method = "post" class="form-horizontal">
                    <br/>
                    <div class="contentL">
                        <div class="boxHeader">
                            <h2>Checkout</h2>
                        </div>
                        <div class="boxContent">
                            <input placeholder="Checkout no" name = "checkout" id="checkout" type="text" size="30" maxlength="20"><br/><br/><br/>
                            <input name="submit" id="checkoutBtn" type = "submit" value="Checkout" class="primaryBtn floatRightBtn">
                            <br/>
                            <br/>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </body>
</html>
