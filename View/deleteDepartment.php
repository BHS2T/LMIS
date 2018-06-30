<?php
session_start();
?>

<link rel="stylesheet" href="CSS/common.css">
<link rel="stylesheet" href="CSS/signupCSS.css">
<?php

include '../Model/Department.php';
$departmentModel = new Department();
if (isset($_GET['departmentID'])) {
    $deID = $_GET['departmentID'];
    echo $deID;

    echo ' <form method = "post" ><div id="id01" class="myPopup">
                <div class="popupContent">
                    <div class="container">
                     
                        <a href="ViewDepartment.php" class="closebtn">×</a>
                        <br/>
                        <h2 style = "color:gray" class="centerP">SURE TO DELETE DEPARTMENT?</h2>
                       
 <p class="centerP">DepartmentID: ' . $deID . '</p>
                           
                        <input type = "submit" name="submit2" value="Delete" class="secondaryBtn floatRightBtn">

                        <a  href= "ViewDepartment.php" class="secondaryBtn">CANCEL</a>

                    </div>
                </div>
</div></form>';
}
if (isset($_POST['submit2'])) {

    $departmentModel->deleteDepartment($deID);
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