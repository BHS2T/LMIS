<?php
session_start();
?>
<!DOCTYPE html>

<html>
    <head>

        <title>
            LIMS
        </title>
        <!--<link rel="stylesheet" href="CSS/common.css">-->
        <link rel="stylesheet" href="CSS/viewCSS.css">
    </head>

    <?php
    include 'header.php';
    include '../Controller/TaskController.php';

//$URL = $_GET['url'];
   
    $myTask = new TaskController();
    $userid = $_SESSION['userIDs'];
    $task = $myTask->viewTask($userid);
//    echo $userid;
if($task){
//$memberid = $_SESSION['userID'];
//$department = $_SESSION['department'];
    echo '<div class = "viewTable">';
    echo '<div class = "allViewContainer"><div class = "tth"><strong>View Member</strong></div></div>';
    echo ' <table>
                <th>Task ID</th>
                <th>Task Name</th>
                <th>Sample ID</th>
                <th>Status</th>
                <th>Lab Designated No</th>
                <th>Due date</th>   
            </tr>';
    foreach ($task as $value) {
        echo '
                <tr>
                    <td>';
        echo $value['taskId'];
        echo '</td>
                    <td>';
        echo $value['taskName'];
        echo '</td><td>';
        echo $value['sampleId'];
        echo'</td><td>';
        echo $value['status'];
        echo '</td><td>';
        // echo $myd['department'];
        // echo '</td><td>';
        echo $value['labDesignatedNo'];
        echo '</td><td>';
        echo $value['Deadline'];
        echo '</td>
                    
    <td><a class  ="primaryBtn"   href = "AssignTask1.php?LDN=' . $value['labDesignatedNo'] . '">Start</a><br/><br/>
    
                          </td>
                </tr>
                ';
    }
    echo
    '
            </table>

            ';
echo '</div>';}
echo 'YOU HAVENT ANY TASK YET';
    ?>
</body>
</html>
