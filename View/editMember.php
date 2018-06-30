<?php
session_start();
?>

<html>
    <head>
        <style>
        </style>
        <title>Edit Member</title>
        <link rel="stylesheet" href="CSS/common.css">
        <link rel="stylesheet" href="CSS/signupCSS.css">
    </head>
    <body>

        <div class="body">

            
            <?php
include_once '../Controller/AccountController.php';
//include_once '../Model/Member.php';

$accountController22 = new AccountManager();



if (isset($_POST['submit'])) {
    
if(isset($_GET['userID'])){
    $userid = $_GET['userID'];
    echo $userid;

    
}
    extract($_POST);
    echo $address;

//if($email || $phone || $address == null){
//    header("location: updateError.php");
//}
    $member = array();
    $member['email'] = $email;
    $member['phone'] = $phone;
    $member['address'] = $address;
    $member['userid'] = $userid;
    $accountController22->editUser($member);
//    header("location: ../Controller/AddMemberController.php");
//echo $member->getAddress();

}


?>
            <?php
            include 'header.php';
            ?>
<?php
if(isset($_GET['userID'])){
    $userid = $_GET['userID'];
    echo $userid;

    
}
$res = $accountController22->searchMember($userid);
//$user_data = $member->findUser($username, $password);
        $count_user = count($res);
        echo $count_user;
if ($count_user == 1) {

echo '            <div class="box">
                <form name = "form" method = "post" class="form-horizontal">

                    </br>
                    <div class="contentL">
                        <div class="boxHeader">
                            <h2>Edit Member</h2>
                        </div>
                        <div class="boxContent">
                            Email: <input value="'.$res[0]['email'].'" placeholder="Email" name = "email" id="email" type="text" size="30" maxlength="100">
                            </br></br>
                            Phone: <input value ="'.$res[0]['phone'].'" placeholder="Phone" type="text" name ="phone" id="phone" size="30" maxlength="100">
                            </br></br>
                            Address: <input value ="'.$res[0]['address'].'"  placeholder="Address" name = "address" id="address" type="text" size="30" maxlength="100">
                            </br></br>
                           <input type = "submit" name="submit" value="EDIT" class="primaryBtn floatRightBtn">
                            <!--<button class="primaryBtn floatRightBtn">Cancel</button>-->
                            </br>
                            </br>
                        </div>
                    </div>

                </form>
            </div>';
}
else{
        echo ' <form method = "post" ><div id="id01" class="myPopup">
                <div class="popupContent">
                    <div class="container">
                     
                        <button onclick="homepage.php" class="closebtn">×</button>
                        <br/>
                        <h2 class="centerP">USER NOT FOUND</h2>
                        <br/>
                        <br/>
                      
                        <a  href= "homepage.php" class="primaryBtn ">OK</a>

                    </div>
                </div>
</div></form>';
}
?>

        </div>
    </body>
</html>
