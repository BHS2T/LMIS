<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Assign Task1</title>
        <link rel="stylesheet" href="CSS/common.css">
        <link rel="stylesheet" href="CSS/signupCSS.css">
    </head>
    <body>

        <div class="body">
            <?php
            include 'authorizeLM.php';?>
            <div class = "header">
                <img src ="img/logo22.png" class="logoImg">
            </div>        
                
            <?php
            $usernameErr = "";
            $username = "";

            include_once '../Controller/AccountController.php';
            include_once '../Controller/DepartmentController.php';
            include_once '../Controller/TaskController.php';

            $accountController22 = new AccountManager();
            $taskController = new TaskController();

            if (isset($_POST['submit'])) {
                extract($_POST);

                $info = $taskController->getSTTByLDN($_GET['LDN']);
                if ($info) {
//                 print_r($info);
                    if ($_GET['LDN']) {
                        $toTask = array();
                        $toTask['sampleName'] = $info[0]["sampleNameToBeTested"];
                        $toTask['customerId'] = $info[0]["customerId"];
                        $toTask['duedate'] = $info[0]["duedate"];
                        $toTask['standardReference'] = $info[0]["standardReferencesToBeTested"];
                        $toTask['amountToBeTested'] = $info[0]["amountToBeTested"];
                        $toTask['sampleType'] = $info[0]["typeOfSampleToBeTested"];
                        $toTask['labDesignatedNo'] = $info[0]["labDesignatedNo"];
                        $toTask['checkOutNo'] = $info[0]["checkOutNo"];
                        $toTask['department'] = $_SESSION['userDepartment'];
                        $toTask['userType'] = $_SESSION['userType'];
                        $usersId = array();

                        for ($i = 0; $i < count($member); $i++) {
                            $s = $accountController22->searchMember($member[$i]);
//                    echo $s[0][0];
                            $usersId[$i] = $s[0][0];
                        }
//                print_r($info);
                        $toTask['userIds'] = $usersId;
                        $taskController->addTask($toTask);
                    }
                } else {
                    echo 'noooooooooooooooo';
                }
            }
            ?>
            <?php
            include 'header.php';
            ?>

            <div class="box">
                <form name = "form" method = "post" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> class="form-horizontal">

                    <br/>
                    <div class="contentL">
                        <div class="boxHeader">
                            <h2>Assign Task</h2>
                        </div>
                        <div class="boxContent">
                        <?php
                        $vstt = new DepartmentController();
                        $labDN = $_GET['LDN'];
                        $param_result = $vstt->getParamByLDN($labDN);
                        echo '<p>Lab Designated no: ' . $labDN . '</p>';
                        echo '<span>Parameter: </span>';
                        foreach ($param_result as $param) {
                            echo" <p>" . $param['parameter'] . "</p>";
                        }
                        ?>
                        <label for="fullname" >Full Name:</label>  
                        <br/>                          
                        <?php
                        $member = new AccountManager();
                        $mydata = $member->viewMemberInDepartment($_SESSION['userDepartment']);

                        foreach ($mydata as $value) {
                            echo'<input name = "member[]" type = "checkbox" value="' . $value['username'] . '">' . $value['firstname'] . " " . $value['lastname'] . '</option><br/>';
                        }
                        ?>                   
                        <span class="error">*<?php echo $usernameErr; ?></span><br/><br/>
                        <input type = "submit" name="submit" value="Assign" class="primaryBtn floatRightBtn">

                        <br/>
                        <br/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
