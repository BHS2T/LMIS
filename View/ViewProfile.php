<?php
session_start();
?>
<html>
    <head>
        <title>my profile</title>

        <link rel="stylesheet" href="CSS/common.css">
        <link rel="stylesheet" href="CSS/signupCSS.css">


        <!--<link rel="stylesheet" href="CSS/.css">-->
    </head>
    <body>
        <?php
        
        include 'header.php';
        ?>
<div class="box2">
     <div class="card">
  <img src="img/d.jpg" alt="Img" style="width:100%">
                                <h2>Profile</h2>
                         
       
        <div class ="profileContent">
            

            <?php
                include '../Controller/AccountController.php';
                $aManage = new AccountManager();
                $uid = $_SESSION['userIDs'];
                $user_info = $aManage->searchMember($uid);
                foreach ($user_info as $value) {

                    echo '<p  class ="fullname"><span class = "boldTxt">';
                    echo $value['firstname'];
                    echo '</span> <span class = "boldTxt">';
                    echo $value['lastname'];
                    echo '</span></p>';
                    
                    echo '<p>User ID: <span class = "boldTxt">';
                    echo $value['memberid'];
                    echo '</span></p><p>Username: <span class = "boldTxt">
                    ';
                    echo $value['username'];
                    echo'</span></p><p>Sex: <span class = "boldTxt">';
                    echo $value['sex'];
                    echo '</span></p><p>Department: <span class = "boldTxt">';
                    echo $_SESSION['userDepartment'];
                    echo '</span></p><p>User Type: <span class = "boldTxt">';
                    echo $_SESSION['userType'];
                    echo '</span></p><p>Email: <span class = "boldTxt">';
                    echo $value['email'];
                    echo '</span></p><p>Date OF birth: <span class = "boldTxt">';
                    echo $value['dateofbirth'];
                    echo '</span></p><p>Phone: <span class = "boldTxt">';
                    echo $value['phone'];
                    echo '</span></p><p>Address: <span class = "boldTxt">';
                    echo $value['address'];
                    echo '</span></p>
                            </br>
<a class  ="primaryBtn"    href = "editMember.php?userID=' . $value['memberid'] . '">Edit</a>
                    </td>';
                }
                ?>
           
            </div>
        </div>
            </div>
            </div>
    </body>
</html>

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

