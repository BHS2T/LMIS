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

    <?php
    include 'authorizeITH.php';?>
    <div class = "header">

        <img src ="img/logo22.png" class="logoImg">
        <form  class="searchForm" method ="post" action = "searchDept.php">
            <input class = "searchBox" placeholder="Search" type="text" name ="searchText" id="dept" size="30" maxlength="25">                                     
            <input type = "submit" id = "searchBtn" value = "" name = "searchBtn" class  ="searchBtn">
        </form>    
    <?php
    include 'header.php';
    include '../Controller/DepartmentController.php';
//$URL = $_GET['url'];
    $departments = new DepartmentController();
    $mydata = $departments->viewDepartment();
if($mydata){
    echo '<div class = "viewTable">';
    echo '<div class = "allViewContainer"><div class = "tth"><strong>View department</strong></div></div>';
    echo ' <table>
                <th>Department ID</th>
                <th>Department Name</th>
                <th>Remove</th>
            </tr>';
    foreach ($mydata as $value) {
        echo '
                <tr>
                    <td>';
        echo $value['departmentid'];
        echo '</td>
                    <td>';
        echo $value['departmentname'];
        echo '</td>
                    
    <td><a class  ="primaryBtn"   href = "deleteDepartment.php?departmentID=' . $value['departmentid'] . '">Remove</a>
    </td><td>
                                        
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
    echo 'NO DEPARTMENT FOUND';
}
    ?>
</body>
</html>
