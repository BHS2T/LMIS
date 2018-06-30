<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>

        <title>Feed Result</title>
        <link rel="stylesheet" href="CSS/common.css">
        <link rel="stylesheet" href="CSS/viewCSS.css">
    </head>
    <?php
    include 'authorizeLT.php';
    ?>
    <div class = "header">
        <img src ="img/logo22.png" class="logoImg">
    </div>
    <?php
    include 'header.php';
    include '../Controller/TaskController.php';

    $myTask = new TaskController();
    if (isset($_GET['LDN'])) {
        $ldn = $_GET['LDN'];
    }
    $taskParam = $myTask->getParamByLDN($ldn);
    if ($taskParam) {
        echo '<div class = "viewTable">';
        echo '<div class = "allViewContainer"><div class = "tth"><strong>View Parameters</strong></div></div>';
        echo ' <table class = "taskT">
                <th>Task ID</th>
                <th>Task Name</th>
                <th>Sample Name</th>
                <th>Parametr</th>    
                <th>Lab Designated No</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Action</th>
            </tr>';
//   echo $task[0][1];
//   echo $task[1][1];

        $task = $myTask->viewTaskP($_SESSION['userIDs'], $ldn);
//    echo $userid;
//print_r($task);
        if ($task) {
            foreach ($taskParam as $taskp) {

                echo '
                <tr>
                    <td>';
                echo $task[0]['taskId'];
                echo '</td>
                    <td>';
                echo $task[0]['taskName'];
                echo '</td><td>';
                echo $task[0]['samplename'];
                echo '</td><td>';
                echo $taskp['parameter'];

                echo'</td><td>';
                echo $task[0]['labDesignatedNo'];
                echo '</td><td>';
                echo $task[0]['status'];
                echo '</td><td>';
                echo $task[0]['Deadline'];
                echo '</td>
                    
    <td>';
                if ($_SESSION['userType'] == "Lab technician") {
                    if ($task[0]['taskName'] == "Check Out") {
                        echo'<a class  ="primaryBtn2"     href = "CheckoutForm.php?LDN=' . $task[0]['labDesignatedNo'] . '">Start</a><br/><br/>';
                    }
                }
                if ($_SESSION['userType'] == "Lab manager" && $task['status'] == "Waiting") {
                    echo'<a class  ="primaryBtn2"     href = "AssignTask1.php?LDN=' . $task[0]['labDesignatedNo'] . '">Assign</a><br/><br/>';
                }
                if ($task[0]['taskName'] == 'Feed Result') {
                    echo'<a class  ="primaryBtn2"     href = "FeedResult2.php?LDN=' . $task[0]['labDesignatedNo'] . '&&Parameter=' . $taskp['parameter'] . '">FeedResult</a><br/><br/>';
                }

                echo '
                    </td>
                </tr>
                ';
            }
            echo
            '
            </table>

            ';
            echo '</div>';
        } else {
            echo '<h3 class = "inError">NO PARAMS</h3>';

            echo '<a class = "primaryBtn3" href = ViewTask.php>OK</a>';
        }
    } else {
        echo '<h3 class = "inError" >UNKNOWN LDN</h3>';
        echo '<a class = "primaryBtn3" href = ViewTask.php>OK</a>';
    }
    ?>
</body>
</html>