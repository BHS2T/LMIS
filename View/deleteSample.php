<?php
session_start();
?>

<link rel="stylesheet" href="CSS/common.css">
<link rel="stylesheet" href="CSS/signupCSS.css">
<?php

include '../Model/Sample.php';
$sampleModel = new Sample();
if (isset($_GET['sampleID'])) {
    $sampleid = $_GET['sampleID'];
    echo $sampleid;

    echo ' <form method = "post" ><div id="id01" class="myPopup">
                <div class="popupContent">
                    <div class="container">
                     
                        <button onclick="ViewSample.php" class="closebtn">×</button>
                        <br/>
                        <h2 class="centerP">SURE TO DELETE SAMPLE?</h2>
                        <br/>
                        <br/>
 username: <p>' . $sampleid . '</p>
                           
                        <input type = "submit" name="submit2" value="Delete" class="primaryBtn floatRightBtn">

                        <a  href= "ViewSample.php" class="primaryBtn ">CANCEL</a>

                    </div>
                </div>
</div></form>';
}
if (isset($_POST['submit2'])) {

    $sampleModel->deleteSample($sampleid);
    header("location: homepage.php");
}
if ($_SESSION["userType"] == "Admin") {
    //can only delete users not admin
} elseif ($_SESSION["userType"] == "IT head") {
    //can delete only admin
} else {
    //cant delete
}
?>