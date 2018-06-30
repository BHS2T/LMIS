<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add Department</title>
        <link rel="stylesheet" href="CSS/common.css">
        <link rel="stylesheet" href="CSS/signupCSS.css">
    </head>
    <body>
        <div class="body">
            <?php include 'authorizeITH.php'; ?>
            <div class = "header">
                <img src ="img/logo22.png" class="logoImg">
            </div>
                <?php
                include 'header.php';

                $departmentErr = "";
                $department = "";
                $isValid = true;

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (empty($_POST["department"])) {
                        $departmentErr = "Enter Department name";
                        $isValid = false;
                    } else {
                        $department = test_input($_POST["department"]);
                        // check if name only contains letters and whitespace
                        if (!preg_match("/^[a-zA-Z]*$/", $department)) {
                            $departmentErr = "Only letters are allowed";
                            $isValid = false;
                        }
                    }
                }

                function test_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                include_once '../Controller/DepartmentController.php';
                $departmentController = new DepartmentController();
                if (isset($_POST['submit']) && $isValid == true) {
                    extract($_POST);
                    echo '  <form method = "post" ><div id="id01" class="myPopup">
                            <div class="popupContent">
                                <div class="container">
                                    <button onclick="AddDepartment.php" class="closebtn">×</button>
                                    <br/>
                                    <h2 style = "color:gray" class="centerP">SURE TO ADD DEPARTMENT?</h2>
                                    <br/>
                                    <br/>
                                    <label for ="department">Department:</label>
                                    <input placeholder="Department" value = "' . $department . '" name = "department" id="departmentF" type="text" size="20" maxlength="20"> 
                                    <input id = "confirmAdditionD" type = "submit" name="submit2" value="ADD" class="secondaryBtn floatRightBtn">
                                    <button onClick= "AddDepartment.php" class="secondaryBtn ">CANCEL</button>

                                </div>
                            </div>
                        </form>';
                } if (isset($_POST['submit2'])) {
                    $departmentA = array();
                    $departmentA['department'] = $department;

                    $success = $departmentController->addDepartment($departmentA);
                    echo '
                    <form>
                        <div id="id01" class="myPopup">
                            <div class="popupContent">
                                <div class="container">
                                    <button onclick="AddDepartment.php" class="closebtn">×</button>
                                    <br/><br/><br/>
                                    <h2 id = "successfulInsertion" style = "color:gray" class="centerP">' . $success . '</h2>
                                    <button onClick= "AddDepartment.php" class="primaryBtn floatRightBtn">OK</button>

                                </div>
                            </div>
                        </div>
                    </form>';
                }
                ?>
                <div class="box">
                    <form name = "form" method = "post" class="form-horizontal">

                        <br/>
                        <div class="contentL">
                            <div class="boxHeader">
                                <h2>Add Department</h2>
                            </div>
                            <div class="boxContent">
                                <label for="department"> Department: </label><input required placeholder="Department" name = "department" id="department" type="text" size="30" maxlength="100">
                                <span class="error"><?php echo $departmentErr ?></span> 
                                <br/><br/>
                                <div class="butun">
                                    <input id ="addDept" type = "submit" name="submit" value="Add Department" class="primaryBtn floatRightBtn">
                                </div>
                                </br>
                                </br>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </body>
</html>