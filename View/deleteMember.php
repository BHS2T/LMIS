<?php
session_start();
?>


<link rel="stylesheet" href="CSS/common.css">
<link rel="stylesheet" href="CSS/signupCSS.css">
<?php
include '../Model/Member.php';

$memberModel = new Member();
if (isset($_GET['userID'])) {
    $userid = $_GET['userID'];
    echo $userid;

    echo ' <form method = "post" ><div id="id01" class="myPopup">
                <div class="popupContent">
                    <div class="container">
                     
                        <a href="ViewMember.php" class="closebtn">×</a>
                        <br/>
                        <h2 style = "color:gray" class="centerP">SURE TO DELETE USER?</h2>
                        
                        <br/>
 <p class = "centerP">username: ' . $userid . '</p>
                           
                        <input type = "submit" name="submit2" value="Delete" class="secondaryBtn floatRightBtn">

                        <a  href= "ViewMember.php" class="secondaryBtn ">CANCEL</a>

                    </div>
                </div>
</div></form>';
}
if (isset($_POST['submit2'])) {

    $memberModel->deleteUser($userid);
    header("location: homepageH.php");
}
if ($_SESSION["userType"] == "Admin") {
    //can only delete users not admin
} elseif ($_SESSION["userType"] == "IT head") {
    //can delete only admin
} else {
    //cant delete
}
?>

