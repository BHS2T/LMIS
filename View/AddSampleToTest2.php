<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Sample To Be Tested2</title>
        <link rel="stylesheet" href="CSS/common.css">
        <link rel="stylesheet" href="CSS/signupCSS.css">
    </head>
    <body>
        <div class="body">
            <?php
            include 'authorizeLO.php';?>
            <div class = "header">
                <img src ="img/logo22.png" class="logoImg">
            </div>    
            <?php
            include 'header.php';
            $parameterErr = "";
            $parameterToBeTested = "";

            $isValid = true;
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                if (empty($_POST["parameterToBeTested"])) {
                    $parameterErr = "Parameter is required";
                    $isValid = false;
                } else {
                    $parameterToBeTested = $_POST["parameterToBeTested"];
//                    echo $parameterToBeTested;
                    $isValid = true;
                }
            }
            include_once '../Controller/SampleToTestController.php';
            include_once '../Controller/TaskController.php';

            $astt = new SampleToTestController();
            $taskController = new TaskController();

            if (isset($_POST['submit']) && $isValid == true) {
                extract($_POST);
                $sampleTest = array();
                $sampleTest['parameterToBeTested'] = $parameterToBeTested;
                $sampleTest['labDN'] = $_GET['ldn'];
                $astt->addPLDN($sampleTest);
            }
            ?>
            <div class="box">
                <form name = "form" method = "post" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> class="form-horizontal">
                    <br/>
                    <div class="contentL">
                        <div class="boxHeader">
                            <h2 class="page2">Add Sample To Be Tested 2</h2>
                        </div>
                        <div class="boxContent">
                            <label for="samplename" >Sample Name:</label><br/> 
                            <?php
                            include_once '../Controller/SampleController.php';
                            if (isset($_GET['sn']) && $_GET['ldn']) {
                                $samplen = new SampleController();
                                $mydata = $samplen->getParameters($_GET['sn']);
                                foreach ($mydata as $value) {
                                    echo' 
                                    <input name = "parameterToBeTested[]" type  ="checkbox" value="' . $value['parameter'] . '">' . $value['parameter'] . '</option><br/>';
                                }
                                echo'  <input type = "submit" name = "submit" value ="Enter"';
                            } else {
                                echo '<h2>INVALID PAGE</h2>';
                            }
                            ?>  
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>