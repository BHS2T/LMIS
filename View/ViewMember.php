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
    include 'authorizeAdmin.php';?>
    <div class = "header">

    <img src ="img/logo22.png" class="logoImg">
    <form  class="searchForm" method ="post" action = "search.php">
        <input class = "searchBox" placeholder="Search" type="text" name ="searchText" id="dept" size="30" maxlength="25">
        
                                      
<input type = "submit" id = "searchBtn" value = "" name = "searchBtn" class  ="searchBtn">
</form>

</div>
<?php
    include 'header.php';
    include '../Controller/AccountController.php';

//$URL = $_GET['url'];
    $users = new AccountManager();
    $mydata = $users->viewMember();
//    $users->viewMemberInDepartment($_SESSION['userDepartment']);

if($mydata){

    echo '<div class = "viewTable">';
    echo '<div class = "allViewContainer"><div id="member" class = "tth"><strong>View Member</strong></div></div>';
    echo ' <table><tr>
                <th>Member ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Sex</th>';
                if ($_SESSION['userType'] == "IT head") {
                    echo '<th>Department</th>';
                }
    echo '      <th>Email</th>
                <th>DateOFBirth</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Remove</th>
                
                <th>Edit</th>
            </tr>';
    foreach ($mydata as $value) {


        echo '
                <tr>
                    <td>';
        echo $value['memberid'];
        echo '</td><td>';
        echo $value['firstname'];
        echo '</td><td>';
        echo $value['lastname'];
        echo'</td><td>';
        echo $value['sex'];
        echo '</td><td>';
        if ($_SESSION['userType'] == "IT head") {
            echo $value['department'];
            echo '</td><td>';
        }
        echo $value['email'];
        echo '</td><td>';
        echo $value['dateofbirth'];
        echo '</td><td>';
        echo $value['phone'];
        echo '</td><td>';
        echo $value['address'];
        echo '</td>
            <td><a class  ="primaryBtn"   href = "deleteMember.php?userID=' . $value['memberid'] . '">Remove</a><br/></td>
            <td><a class  ="primaryBtn"   href = "editMember.php?userID=' . $value['memberid'] . '">Edit</a>
                    </td>
                </tr>
                ';
    }
    echo
    '    </table>';
echo '</div>';}
 else {
    echo 'NO MEMBER FOUND IN DEPARTMENT';
}
    ?>
</body>
</html>
