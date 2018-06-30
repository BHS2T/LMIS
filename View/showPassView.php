<?php
session_start();
?>
<html>
    <?php
    include 'header.php';?>
        <link rel="stylesheet" href="CSS/common.css">
    <h2>DONT FOR GET YOUR PASSWORD HERE IT IS</h2>
    <div>
        <?php

        $password = $_GET['password'];
//        $success = $_GET['success'];
        $username = $_GET['username'];
//        echo 'Success: ';echo $success;
        echo 'Username: ';echo $username;
        echo '</br>';
        echo 'Password: ';echo $password;
        ?>
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>
        
        <a class="primaryBtn" href="AddMemberView.php">OK</a>
    </div>
</html>









<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class ShowPass {
    public function show($pass){
        
    }
            

}
