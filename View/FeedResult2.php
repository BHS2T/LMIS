<?php
session_start();
?>
<?php
if (!$_SESSION['login']) {
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
    <head>

        <title>Feed Result2</title>
        <link rel="stylesheet" href="CSS/common.css">
        <link rel="stylesheet" href="CSS/viewCSS.css">
    </head>
    <body>
        <?php
        include 'authorizeLT.php';
        ?>
        <div class = "header">
            <img src ="img/logo22.png" class="logoImg">
        </div>
        <?php
        include 'header.php';

//    include '../Controller/ViewTaskController.php';
        include '../Controller/ResultController.php';
        include '../Controller/TaskController.php';
        $resultController = new ResultController();
        $myTask = new TaskController();
        $toInsertTask = new TaskController();
        if (isset($_GET['LDN'])) {
            if (isset($_GET['Parameter'])) {
                $ldn = $_GET['LDN'];
                $parame = $_GET['Parameter'];
            }

            $taskParam = $myTask->getSTTByLDN($ldn);
//        if ($taskParam) {
            $task = $myTask->viewTaskP($_SESSION['userIDs'], $ldn);
//            if ($task) {
            echo '<div class = "box">';

            echo '  <div class = "form-horizontal">';
            echo '   
                            <div class="contentL">
                                <div class="boxHeader">
                                    <h2>FEED RESULT</h2>
                                </div>
                            <div class="boxContent fr">';
            echo '<p><label for="sntbt">Sample Name: </label>';
            echo $taskParam[0]['sampleNameToBeTested'];
            echo '</p>';
            echo '<p><label for="sr">Standard Reference: </label>';
            echo $taskParam[0]['standardReferencesToBeTested'];
            echo '</p>';
            echo '<p><label for="sampletype">Sample Type</label>';
            echo $taskParam[0]['typeOfSampleToBeTested'];
            echo '</p>';
            echo '<p><label for="ldn">Lab Designated No</label>';
            echo $taskParam[0]['labDesignatedNo'];
            echo '</p>';
            echo '<p><label for="param">Parameter</label>';
            echo $parame;
            echo '</p>';
            if ($_SESSION['userType'] == "Lab technician") {
                if ($task[0]['taskName'] == "Check Out") {
                    echo'<a class  ="primaryBtn2"     href = "CheckoutForm.php?LDN=' . $taskParam[0]['labDesignatedNo'] . '">Start</a><br/><br/>';
                }
            }if ($_SESSION['userType'] == "Lab manager" && $task['status'] == "Waiting") {
                echo'<a class  ="primaryBtn2"     href = "AssignTask1.php?LDN=' . $taskParam[0]['labDesignatedNo'] . '">Assign</a><br/><br/>';
            }
        }
            else {
                echo '<h3 class = "inError">NO PARAMS</h3>';
                echo '<a class = "primaryBtn3" href = ViewTask.php>OK</a>';
            }
//        }
//        else {
//            echo '<h3 class = "inError" >UNKNOWN LDN</h3>';
//            echo '<a class = "primaryBtn3" href = ViewTask.php>OK</a>';
//        }
//    } else {
//        echo '<h3 class = "inError">INVALID LDN</h3>';
//    }
        $result_set = array();
        $viewTaskController = new TaskController();
//    print_r($taskParam);
        if (isset($_POST['submit'])) {

            extract($_POST);
            $result_set['memberId'] = $_SESSION['userIDs'];
            $result_set['samplename'] = $taskParam[0]['sampleNameToBeTested'];
            $result_set['validationStatus'] = $validation;
            $result_set['parameter'] = $parame;
            $result_set['standardReference'] = $taskParam[0]['standardReferencesToBeTested'];
            $result_set['result'] = $result;
            $result_set['resultdescription'] = $resultDescription;
            $result_set['labdesignatedno'] = $taskParam[0]['labDesignatedNo'];
            $result_set['duedate'] = $taskParam[0]['duedate'];
//        print_r($result_set);
//        echo $resultController->deletePar($ldn,$parame);

            $resultController->feedresult($result_set);
            if ($resultController->deletePar($ldn, $parame)) {
//          echo 'hhhhhhhhhhhhhh';

                $sampleToTest_list['department'] = $_SESSION['userDepartment'];
                $sampleToTest_list['sampleName'] = $taskParam[0]['sampleNameToBeTested'];
                $sampleToTest_list['labDesignatedNo'] = $taskParam[0]['labDesignatedNo'];
                $sampleToTest_list['duedate'] = $taskParam[0]['duedate'];
//        $sampleToTest_list['userType']      ="Lab manager";
                $toTaskk = $toInsertTask->addTaskTLM($sampleToTest_list, "Verify Result", "Completed");
            }
//      
        }
        ?>
        <form method="post" class="form-horizontal">
            <label for="result">Result: </label><input name ="result" placeholder="Result" type ="text" ><br/><br/>
            <label for="validation">Validation:</label><input name="validation" placeholder="Validation(If any)" type="text"><br/><br/>
            <label for="result Description">Result Description: </label>  <textarea name="resultDescription" placeholder="Description"></textarea><br/><br/>
            <input class="primaryBtn" name="submit" type="submit" value="Submit"></form>
    </div>
</body>
</html>