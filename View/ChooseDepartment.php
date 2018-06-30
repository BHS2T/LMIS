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
            <?php
            $departmentErr = "";
//            $department = "";

            if (isset($_POST['submit'])) {
                header("location: AddSampleToTest.php?department=" . $_POST[dept]);
            }
            ?>
            <div class = "header">
                <img src ="img/logo22.png" class="logoImg">
            </div>
            <?php
            include 'header.php';
            ?>
            <div class="box">
                <form name = "form" method = "post" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> class="form-horizontal"><br/>
                    <div class="contentL">
                        <div class="boxHeader">
                            <h2>Add Department</h2>
                        </div>
                        <div class="boxContent">

                            <?php
                            include_once '../Controller/DepartmentController.php';
                            $department = new DepartmentController();
                            $mydata = $department->viewDepartment();

                            echo'<select name = "dept" class  ="centerO">';
                            foreach ($mydata as $value) {
                                echo'<option value="' . $value['departmentname'] . '">' . $value['departmentname'] . '</option>';
                            }
                            echo'</select>';
                            echo'<input type = "submit" name="submit" value = "GO" class="primaryBtn floatRightBtn">';
                            ?>                 
                            <br/>
                            <br/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
