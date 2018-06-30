<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>

        <title>
            LIMS
        </title>
        <link rel="stylesheet" href="CSS/common.css">
        <link rel="stylesheet" href="CSS/viewCSS.css">
    </head>
    <?php include 'header.php'; ?>
    <div class = "header">

        <img src ="img/logo22.png" class="logoImg">
        <form  class="searchForm" method ="post" action = "searchTask.php">
            <input class = "searchBox" placeholder="Search" type="text" name ="searchText" id="dept" size="30" maxlength="25">                                     
            <input type = "submit" id = "searchBtn" value = "" name = "searchBtn" class  ="searchBtn">
        </form>  
    </div>

    <?php
    include '../Controller/TaskController.php';
//$URL = $_GET['url'];

    $myTask = new TaskController();
    $userid = $_SESSION['userIDs'];
    $task = $myTask->viewTask($userid);
if($task){
//    echo $userid;

    echo '<div class = "viewTable">';
    echo '<div class = "allViewContainer"><div class = "tth"><strong>My Task</strong></div></div>';
    echo ' <table class = "taskT">
                <th>Task ID</th>
                <th>Task Name</th>
                <th>Sample Name</th>';

    echo '<th>Lab Designated No</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Action</th>
            </tr>';
//   echo $task[0][1];
//   echo $task[1][1];
//print_r($task);
    foreach ($task as $eachTask) {
        $taskParam = $myTask->getParamByLDN($eachTask['labDesignatedNo']);
        if ($taskParam) {
            echo '
                <tr>
                    <td>';
            echo $eachTask['taskId'];
            echo '</td>
                    <td>';
            echo $eachTask['taskName'];
            echo '</td><td>';
            echo $eachTask['samplename'];
            echo'</td><td>';
            echo $eachTask['labDesignatedNo'];
            echo '</td><td>';
            echo $eachTask['status'];
            echo '</td><td>';
            echo $eachTask['Deadline'];
            echo '</td>
                    
    <td>';
            if ($_SESSION['userType'] == "Lab technician") {
                if ($eachTask['taskName'] == "Check Out") {
                    echo'<a class  ="primaryBtn2"     href = "CheckoutForm.php?LDN=' . $eachTask['labDesignatedNo'] . '">Start</a><br/><br/>';
                }
            }
            if ($_SESSION['userType'] == "Lab manager" && $eachTask['status'] == "Waiting") {
                echo'<a class  ="primaryBtn2"     href = "AssignTask1.php?LDN=' . $eachTask['labDesignatedNo'] . '">Assign</a><br/><br/>';
            }
            if ($eachTask['taskName'] == 'Feed Result') {
                echo'<a class  ="primaryBtn2"     href = "FeedResult.php?LDN=' . $eachTask['labDesignatedNo'] . '">FeedResult</a><br/><br/>';
            }
            if ($eachTask['taskName'] == 'Verify Result') {
                echo'<a class  ="primaryBtn2"     href = "AlterResult.php?LDN=' . $eachTask['labDesignatedNo'] . '">FeedResult</a><br/><br/>';
            }
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
    echo '</div>';}
else {
echo 'YOU HAVENT ANY TASK YET';
}
    ?>
    
</body>
</html>