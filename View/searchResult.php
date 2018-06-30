<?php
session_start();
?>
<!DOCTYPE html>

<html>
    <head>

        <title>View Result</title>
        <link rel="stylesheet" href="CSS/common.css">
        <link rel="stylesheet" href="CSS/viewCSS.css">
    </head>

    <?php include 'authorizeAdmin.php'; ?>
    <div class = "header">

        <img src ="img/logo22.png" class="logoImg">
        <form  class="searchForm" method ="post" action = "searchResult.php">
            <input class = "searchBox" placeholder="Search" type="text" name ="searchText" id="dept" size="30" maxlength="25">                                     
            <input type = "submit" id = "searchBtn" value = "" name = "searchBtn" class  ="searchBtn">
        </form>  
        <?php
        include 'header.php';
        include '../Controller/ResultController.php';
        if ($_POST['searchText']) {
            $resultId = $_POST['searchText'];
            $users = new ResultController();
            $mydata = $users->searchResult($_SESSION['userIDs'], $resultId);
            echo '<div class = "viewTable">';
            echo '<div class = "allViewContainer"><div id ="searchTitle"  class = "tth"><strong>View Result</strong></div></div>';
            echo ' <table><tr>
                <th>result ID</th>
                <th>Sample Name</th>
                <th>Parameter</th>
                <th>Result</th>
                <th>Standard</th>
                <th>Validation Status</th>
                <th>Lab Designated No</th>
               
                <th>View</th>
                
            </tr>';
            if($mydata){
            foreach ($mydata as $value) {
                echo '
                <tr>
                    <td>';
                echo $value['resultId'];
                echo '</td>
                    <td>';
                echo $value['samplename'];
                echo '</td><td>';
                echo $value['parameter'];
                echo'</td><td>';
                echo $value['result'];
                echo '</td><td>';
                echo $value['standardReference'];
                echo '</td><td>';
                echo $value['validationStatus'];
                echo '</td><td>';
                echo $value['labdesignatedno'];
                echo '</td>;            
    <td><a class  ="primaryBtn"   href = "ViewResult.php">View</a><br/></td>

                </tr>
                ';
            }
            echo
            '
            </table>

            ';
            echo '</div>';}
            else {
    echo 'NO RELATED RESULT FOUND';
            }
        }
        ?>
    </body>
</html>
