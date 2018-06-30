<?php
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>

        <title>
            LIMS
        </title>
        <link rel="stylesheet" href="CSS/common.css">
        <link rel="stylesheet" href="CSS/viewCSS.css">
    </head>
<?php
include '../Controller/AccountController.php';
    include 'header.php';


        
if(isset($_POST["searchText"])){
//   echo 'displayed here';
    $useridorname = $_POST["searchText"];
//    echo $useridorname;
    $accountControler = new AccountManager();
    $mydata = $accountControler->searchMember($useridorname);
//    header("location: searchResult.php");
//    return $result;

//    include '../Controller/ViewMemberController.php';
//$URL = $_GET['url'];
    
    

    echo '<div class = "viewTable">';
    echo '<div class = "allViewContainer"><div id ="searchTitle" class = "tth"><strong>Search Result</strong></div></div>';
    echo ' <table>
                <th>Member ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Sex</th>
 
                <th>Email</th>
                <th>DateOFBirth</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Action</th>
            </tr>';
    foreach ($mydata as $value) {
        echo '
                <tr>
                    <td>';
        echo $value['memberid'];
        echo '</td>
                    <td>';
        echo $value['firstname'];
        echo '</td><td>';
        echo $value['lastname'];
        echo'</td><td>';
        echo $value['sex'];
        echo '</td><td>';
        // echo $myd['department'];
        // echo '</td><td>';
        echo $value['email'];
        echo '</td><td>';
        echo $value['dateofbirth'];
        echo '</td><td>';
        echo $value['phone'];
        echo '</td><td>';
        echo $value['address'];
        echo '</td>
                    
    <td><a class  ="inTableBtn"     href = "deleteMember.php?userID='.$value['memberid'].'">Remove</a><br/>
    
                                        
<a class  ="inTableBtn"         href = "editMember.php?userID='.$value['memberid'].'">Esdit</a>
                    </td>
                </tr>
                ';
    }
    echo
    '
            </table>

            ';
    echo '</div>';
}


else{
    echo 'not set';
}
    
    
    

?>