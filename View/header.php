<?php
//session_start();
?>
<?php
if (!$_SESSION['login']) {
    header("location: index.php");
}
?>
<link rel="stylesheet" href="CSS/commonHead.css">

<div>
    <?php
    if ($_SESSION['login'] == true) {
        
    }
    echo'    <ul>
                <li>
                    <a href="homepageH.php">Homepage</a>
                </li>
                <li>
                    <a href="ViewTask.php">My Task</a>
                </li>';
    ?>
    <?php
    if ($_SESSION['userType'] == "Admin") {
        echo'   <li class="dropdown">
                    <a href="#" class="dropbtn">Member</a>
                    <div class="dropdown-content">
                        <a href="ViewMember.php">View Member</a>
                        <a href="AddMemberView.php">Add Member</a>
                        <a href="EditMemberView1.php">Edit Profile</a>
                    </div>
                </li>
                                
                <li class="dropdown">
                    <a href="#" class="dropbtn">Sample</a>
                    <div class="dropdown-content">
                        <a href="ViewSample">View Sample</a>
                        <a href="AddSampleView">Add Sample</a>
                        <a href="#">Edit Sample</a>
                    </div>
                </li> ';

        echo'   <li class = "dropdown">
                    <input class = "dropbtn me" href = "">
                    <div class = "dropdown-content">
                        <a href = "manageaccountview.php" name = "manageaccount">ManageAccount</a>
                        <a href = "viewprofile.php" name = "profile">My profile</a>
                        <a href = "index.php" name = "logout">LOGOUT</a>
                    </div>
                </li>';
        
    } 
    
    elseif ($_SESSION['userType'] == 'IT head') {
        echo'   <li class="dropdown">
                    <a href="#" class="dropbtn">Department</a>
                    <div class="dropdown-content">
                        <a href="ViewDepartment.php">View Department</a>
                        <a href="AddDepartment.php">Add Department</a>
                    </div>
                </li>';
        
        echo'   <li class="dropdown">
                    <a href="#" class="dropbtn">Member</a>
                    <div class="dropdown-content">
                        <a href="ViewMember.php">View Member</a>
                        <a href="AddMemberView.php">Add Member</a>
                        <a href="EditMemberView1.php">Edit Profile</a>
                    </div>
                </li>';
        
        echo'   <li class = "dropdown">
                    <input class = "dropbtn me" href = "">
                    <div class = "dropdown-content">
                        <a href = "manageaccountview.php" name = "manageaccount">ManageAccount</a>
                        <a href = "viewprofile.php" name = "profile">My profile</a>
                        <a href = "index.php" name = "logout">LOGOUT</a>
                    </div>  
                </li>';
    } 
    
    elseif($_SESSION['userType'] == 'Lab organizer') {
        echo'   <li>
                    <a href="AddSampleToTest.php" class="dropbtn">New Order</a>
                </li>';

        echo '  <li class = "dropdown">
                    <a href = "" class = "dropbtn">Sample To Test</a>
                    <div class = "dropdown-content">
                        <a href = "ViewSampleToTest.php" name = "viewstt">View Sample To Test</a>
                        <a href ="TrackSample.php" name ="track">Track Sample</a>
                    </div>
                </li>';
        
        echo '  <li class = "dropdown">
                    <input class = "dropbtn me" href = "">
                        <div class = "dropdown-content">
                            <a href = "manageaccountview.php" name = "manageaccount">ManageAccount</a>
                            <a href = "viewprofile.php" name = "profile">My profile</a>
                            <a href = "index.php" name = "logout">LOGOUT</a></div>
                        </div>
                </li>';
    }
    else {
        echo '  <li class = "dropdown">
                    <a>Result</a>
                    <div class = "dropdown-content">
                        <a href = "ViewResult.php" name = "viewresult">View Result</a>
                    </div>
                </li>';

        echo ' <li class = "dropdown">
                    <input class = "dropbtn me" href = "">
                    <div class = "dropdown-content">
                        <a href = "manageaccountview.php" name = "manageaccount">ManageAccount</a>
                        <a href = "viewprofile.php" name = "profile">My profile</a>
                        <a href = "index.php" name = "logout">LOGOUT</a>
                    </div>
                </li>';
    }
    ?>

        </ul>
</div>