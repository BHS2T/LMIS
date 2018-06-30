<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Member</title>
        <link rel="stylesheet" href="CSS/common.css">
        <link rel="stylesheet" href="CSS/signupCSS.css">
        <link rel="stylesheet" href="CSS/commonHead.css">
    </head>
    <body>

        <?php
        include 'authorizeAdmin.php';?>
            <div class = "header">
                <img src ="img/logo22.png" class="logoImg">
            </div>
            <?php
        include 'header.php';

        $usernameErr = $emailErr = $sexErr = $phoneErr = $touErr = $deptErr = $addressErr = $firstnameErr = $dobErr = $lastnameErr = "";
        $username = $email = $sex = $phone = $tou = $dept = $address = $firstname = $dob = $lastname = "";
        $isValid = true;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["username"])) {
                $nameErr = "Username is required";
                $isValid = false;
            } else {
                $username = test_input($_POST["username"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
                    $usernameErr = "Only letters are allowed";
                    $isValid = false;
                }
            }

            if (empty($_POST["firstname"])) {
                $firstnameErr = "First name is required";
                $isValid = false;
            } else {
                $firstname = test_input($_POST["firstname"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z]*$/", $firstname)) {
                    $firstnameErr = "Only letters are space allowed";
                    $isValid = false;
                }
            } if (empty($_POST["lastname"])) {
                $lastnameErr = "lastname is required";
                $isValid = false;
            } else {
                $lastname = test_input($_POST["lastname"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z]*$/", $lastname)) {
                    $lastnameErr = "Only letters and white space allowed";
                    $isValid = false;
                }
            }
            if (empty($_POST["email"])) {
                $emailErr = "Email is required";
                $isValid = false;
            } else {
                $email = test_input($_POST["email"]);
                // check if e-mail address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format";
                    $isValid = false;
                }
            }
            if (empty($_POST["sex"])) {
                $sexErr = "Sex is required";
                $isValid = false;
            } else {
                $sex = test_input($_POST["sex"]);
            }
            if (empty($_POST["dob"])) {
                $dobErr = "Date of birth is required";
                $isValid = false;
            } else {
                $dob = test_input($_POST["dob"]);
            }


            if (empty($_POST["address"])) {
                $addressErr = "Address is required";
                $isValid = false;
            } else {
                $address = test_input($_POST["address"]);
            }
            if (empty($_POST["dept"])) {
                $deptErr = "Department is required";
                $isValid = false;
            }



            if (empty($_POST["tou"])) {
                $touErr = "User Type is required";

                $isValid = false;
            } else {
                $tou = test_input($_POST["tou"]);
            }
            if (empty($_POST["phone"])) {
                $phoneErr = "Phone no is required";
                $isValid = false;
            } else {
                if (!preg_match("/[^0-9]/", $lastname) && strlen($_POST['phone']) != 10) {
                    $phoneErr = "Invalid phone no";
                    $isValid = false;
                }
                $phone = test_input($_POST["phone"]);
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>
        <?php
        include_once '../Controller/AccountController.php';
        $addMemberController = new AccountManager();
        if (isset($_POST['submit']) && $isValid == true) {
           extract($_POST);
           echo'<form method = "post" class = "form-horizontal" ><div id="id01" class="myPopup">
                    <div class="popupContentA">
                        <div class="container">
                            <a href="AddMemberView.php" class="closebtn">×</a>
                            <h2 style ="color:gray" class="d centerP">Sure to add Member?</h2>
                            <label for="firstname">First Name:</label>
                            <input class = "minInput" placeholder="First Name" value = "' . $firstname . '"name = "firstname" id="firstname" type="text" size="30" maxlength="100"><br/> 
                            <label for="lastname">Last Name:</label>
                            <input class = "minInput" placeholder="Last Name" value = "' . $lastname . '"type="text" name ="lastname" id="lastname" size="30" maxlength="100"><br/>
                            <label for="username">Username:</label>
                            <input class = "minInput" placeholder="Username" value = "' . $username . '"type="text" name ="username" id="username1" size="30" maxlength="100"><br/> 
                            <label for="email">Email:</label> 
                            <input class = "minInput" placeholder="Email" value = "' . $email . '"name = "email" id="email" type="text" size="30" maxlength="100"><br/>
                            <label for="phone">Phone:</label> 
                            <input class = "minInput" placeholder="Phone" value = "' . $phone . '"type="text" name ="phone" id="phone" size="30" maxlength="100"><br/>
                            <label for="ge">Sex:</label>
                            <input type="radio" checked name="sex" id = "sex"  value = "' . $sex . '">' . $sex . '<br/><br/>
                            <label for="dob">Date Of Birth:</label>
                            <input placeholder="Date Of Birth" value = "' . $dob . '"type="date" name ="dob" id="dob" size="30" maxlength="100"><br/><br/>
                            <label for="add">Address:</label>
                            <input class = "minInput" placeholder="Address" value = "' . $address . '"name = "address" id="address" type="text" size="30" maxlength="100"><br/><br/>
                            <label for="dept">Department:</label>
                            <select name = "dept">
                                <option id = "sth" value="' . $dept . '">' . $dept . '</option>
                            </select><br/><br/>
                            <label for ="tou">TypeOfUser: </label>
                            <select name = "tou">
                                <option value="' . $tou . '">' . $tou . '</option>
                            </select>
                            <input id = "signupF" type = "submit" name="submit2" value="ADD" class="secondaryBtn floatRightBtn">
                            <button onClick= "AddMemberView.php" class="secondaryBtn ">CANCEL</button>
                        </div>
                    </div>
                </form>';
        } if (isset($_POST['submit2'])) {
//                extract($_POST);
//            include_once '../Controller/AddMemberController.php';

            $accountController22 = new AccountManager();

            $member = array();
            $member['firstname'] = $firstname;
            $member['lastname'] = $lastname;
            $member['username'] = $username;
            $member['email'] = $email;
            $member['phone'] = $phone;
            $member['dept'] = $dept;
            $member['tou'] = $tou;
            $member['dob'] = $dob;
            $member['sex'] = $sex;
            $member['address'] = $address;
            $ret = $accountController22->addMember($member);

            echo '
                    <form>
                        <div id="id01" class="myPopup">
                            <div class="popupContent">
                                <div class="container">
                                    <button onclick="AddDepartment.php" class="closebtn">×</button>
                                    <br/>';

                                    if ($ret['success'] == true) {
                                        $success = "User Registered Successfully";
                                        $ss = "Confirmation code has been sent to: ";
                                        $emailr = $ret['emails'];
                                        $passwordd = $ret['pass'];
                                        echo'  <h2 style = "color:gray" class="centerP">' . $success . '</h2>
                                               <h2 style = "color:gray"  class=centerP"><span>' . $ss . '</span> ' . $emailr . '</h2>
                                               <h2>The Comfirmation code is: ' . $passwordd . '</h2>';
                                    } else {
                                        $success = "USER EXISTS";
                                        echo '<h2 style = "color:gray"  class = "centerP">' . $success . '</h2>';
                                    }
                                    echo'
                                    <button onClick= "AddDepartment.php" class="primaryBtn floatRightBtn">OK</button>
                                </div>
                            </div>
                        </div>
                    </form>';
            }
        ?>


        <div class="box">
            <form name = "form" method = "post" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> class="form-horizontal"><br/>
                <div class="contentL">
                    <div class="boxHeader">
                        <h2>Add Member</h2>
                    </div>
                    <div class="boxContent">
                        <label for="firstname">First Name:</label><input class="maxInput" placeholder="First Name" name = "firstname" id="firstname" type="text" size="30" maxlength="100">
                        <span class="error"><?php echo $firstnameErr; ?></span><br/><br/>
                        <label for="lastname">Last Name:</label> <input  class="maxInput" placeholder="Last Name" type="text" name ="lastname" id="lastname" size="30" maxlength="100">
                        <span class="error"><?php echo $lastnameErr; ?></span><br/><br/>
                        <label for="username">UserName:</label> <input class="maxInput"  placeholder="Username" type="text" name ="username" id="username1" size="30" maxlength="100">
                        <span class="error"><?php echo $usernameErr; ?></span><br/><br/>
                        <label for="email">Email: </label><input class="maxInput"  placeholder="Email" name = "email" id="email" type="text" size="30" maxlength="100">
                        <span class="error"><?php echo $emailErr; ?></span><br/><br/>
                        <label for="phone"> Phone: </label><input class="maxInput"  placeholder="Phone" type="text" name ="phone" id="phone" size="30" maxlength="100">
                        <span class="error"><?php echo $phoneErr; ?></span><br/><br/>
                        <label for="sex">Sex: </label> <input type="radio" name="sex" id="female" value="Female">Female
                        <input type="radio" name="sex" id="male" value="Male">Male
                        <span class="error"><?php echo $sexErr; ?></span><br/><br/>
                        <label for="dob">Date of birth  </label><input placeholder="Date Of Birth" type="date" name ="dob" id="dob" size="30" maxlength="100">
                        <span class="error"><?php echo $dobErr; ?></span><br/><br/>
                        <label for="address" >Address:</label> <input class="maxInput"  placeholder="Address" name = "address" id="address" type="text" size="30" maxlength="100">
                        <span class="error"><?php echo $addressErr; ?></span><br/><br/>
                        <label for="department" >Department:</label>
                        <?php
                            include_once '../Controller/DepartmentController.php';
                            $department = new DepartmentController();
                            $mydataa = $department->viewDepartment();
                            echo'<select name = "dept">
                                    <option disabled selected value> -- </option>';
                            foreach ($mydataa as $value) {
                                echo'<option value="' . $value['departmentname'] . '">' . $value['departmentname'] . '</option>';
                            }
                            echo'</select>';
                        ?>                   
                        <span class="error"><?php echo $deptErr; ?></span></br></br>
                        <label for="tou"> Type of user</label>
                        <select name="tou">
                        <?php
                        if ($_SESSION['userType'] == "Admin") {
                        echo '  <option disabled selected value> -- </option>
                                <option value="Lab technician">Lab technician</option>
                                <option value="Lab manager">Lab manager</option>
                                <option value ="Lab organizer">Lab organizer</option>';
                        }
                        if ($_SESSION['userType'] == "IT head") {
                        echo'   <option disabled selected value> -- </option>
                                <option value="Admin">Admin</option>
                                <option value="IT head">IT head</option>';
                        }
                        ?> 
                        </select>
                        <span class="error"><?php echo $touErr; ?></span> </br></br>                               
                        <input id ="signupBtn" type = "submit" name="submit" value="Sign UP" class="primaryBtn floatRightBtn">

                        <br/>
                        <br/>
                    </div>
                </div>
            </form>
        </div>
</body>
</html>