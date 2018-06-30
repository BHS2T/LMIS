<?php
session_start();
?>
<html>
    <head>
        <title>Edit Member</title>
        <link rel="stylesheet" href="CSS/common.css">
    </head>
    <body>
        <div class = "header">
            <img src ="img/logo22.png" class="logoImg">
        </div>
        <?php
        include 'header.php';  
        ?>
        <?php
        if (isset($_POST['submit'])) {
            header("location: editMember?userID=".$_POST['userid']);
        }
        ?>
        <div class="body">
            <div class="box">
                <form name = "form" method = "post" class="form-horizontal" ><br/>
                    <div class="contentL">
                        <div class="boxHeader">
                            <h2>Edit Member</h2>
                        </div>
                        <div class="boxContent">
                            <input placeholder="User ID" name = "userid" id="userid" type="text" size="30" maxlength="100"><br/><br/><br/>
                            <input type = "submit" value="Edit" name ="submit" class="primaryBtn floatRightBtn">                            <br/><br/>
                            </div>
                        </div>            
                </form>
            </div>
        </div>
    </body>
</html>
