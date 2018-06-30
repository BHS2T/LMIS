<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Sample To Be Tested</title>
        <link rel="stylesheet" href="CSS/common.css">
        <link rel="stylesheet" href="CSS/signupCSS.css">
    </head>
    <body>

        <div class="body">

            <?php
            include 'authorizeLO.php';
            ?>
            <div class = "header">
                <img src ="img/logo22.png" class="logoImg">
            </div>
            <?php
            $customerIdErr = $sampleNameErr = $amountErr = $conErr = $standRefErr = $tosErr = "";
            $customerId = $sampleNameToBeTested = $standardReferencesToBeTested = $amountToBeTested = $typeOfSampleToBeTested = $checkOutNo = $labDesignatedNo = "";
            $isValid = true;
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["customerId"])) {
                    $customerIdErr = "Customer Id is required";
                    $isValid = false;
                } else {
                    if (!is_numeric($customerId) && strlen($_POST['customerId']) != 10) {
                        $customerIdErr = "Invalid customer Id ";
                        $isValid = false;
                    } else if (strlen($_POST['customerId']) != 10) {
                        $customerIdErr = "Should be length of ten";
                        $isValid = false;
                    }
                    $customerId = test_input($_POST["customerId"]);
                    echo $customerId;
                    $isValid = true;
                }

                if (empty($_POST["sampleNameToBeTested"])) {
                    $sampleNameErr = "sample name is required";
                    $isValid = false;
                } else {
                    $sampleNameToBeTested = test_input($_POST["sampleNameToBeTested"]);
                    echo $sampleNameToBeTested;
                    // $isValid = true;
                    if (!preg_match("/^[a-zA-Z ]*$/", $sampleNameToBeTested)) {
                        $sampleNameErr = "Only letters and space allowed";
                        $isValid = false;
                    }
                }

                if (empty($_POST["duedate"])) {
//                    $dobErr = "Date of birth is required";
//                    $isValid = false;
                } else {
                    $duedate = test_input($_POST["duedate"]);
                }


                if (empty($_POST["standardReferencesToBeTested"])) {
                    $standRefErr = "Choose from the standards";
                    $isValid = false;
                } else {
                    $standardReferencesToBeTested = test_input($_POST["standardReferencesToBeTested"]);
                    echo $standardReferencesToBeTested;
                    // $isValid = true;  
                }

                if (empty($_POST["amountToBeTested"])) {
                    $amountErr = "amount is required";
                    $isValid = false;
                } else {
                    $amountToBeTested = test_input($_POST["amountToBeTested"]);
                    echo $amountToBeTested;
                }
                if (empty($_POST["typeOfSampleToBeTested"])) {
                    $tosErr = "Choose sampling type";
                    $isValid = false;
                } else {
                    $typeOfSampleToBeTested = test_input($_POST["typeOfSampleToBeTested"]);
                    echo $typeOfSampleToBeTested;
                    $isValid = true;
                }
            }

            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            include_once '../Controller/TaskController.php';
            include_once '../Controller/SampleToTestController.php';

            $addSttC = new SampleToTestController();
            $taskController = new TaskController();

            if (isset($_POST['submit']) && $isValid == true) {
                extract($_POST);
                $labDesignatedNo1 = $addSttC->generateLabDesignatedNo();
                $checkOutNo1 = $addSttC->generateCheckOutNo();
                $sampleTest = array();
                $toTask = array();
                $sampleTest['customerId'] = $customerId;
                $sampleTest['sampleNameToBeTested'] = $sampleNameToBeTested;
                $sampleTest['duedate'] = $duedate;
                $sampleTest['standardReferencesToBeTested'] = $standardReferencesToBeTested;
                $sampleTest['amountToBeTested'] = $amountToBeTested;
                $sampleTest['typeOfSampleToBeTested'] = $typeOfSampleToBeTested;
                $sampleTest['checkOutNo'] = $checkOutNo1;
                $sampleTest['labDesignatedNo'] = $labDesignatedNo1;
                $sampleTest['department'] = $_SESSION['userDepartment'];
                $toTask['customerId'] = $customerId;
                $toTask['sampleName'] = $sampleNameToBeTested;
                $toTask['duedate'] = $duedate;
                $toTask['customerId'] = $customerId;
                $toTask['standardReference'] = $standardReferencesToBeTested;
                $toTask['amountToBeTested'] = $amountToBeTested;
                $toTask['sampleType'] = $typeOfSampleToBeTested;
                $toTask['labDesignatedNo'] = $labDesignatedNo1;
                $toTask['checkOutNo'] = $checkOutNo;
                $toTask['department'] = $_SESSION['userDepartment'];
                $toTask['userType'] = $_SESSION['userType'];
//                echo '___________';
//                print_r($sampleTest);
                $allparams = $addSttC->addSampleToTest($sampleTest);
                $taskController->addTaskTLM($toTask, "Assign", "Waiting");

            }
            ?>
            <?php
            include 'header.php';
            ?>

            <div class="box">
                <form name = "form" method = "post" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> class="form-horizontal">

                    <br/>
                    <div class="contentL">
                        <div class="boxHeader">
                            <h2>Add Sample To Be Tested</h2>
                        </div>
                        <div class="boxContent">
                            <label for="department">   Department:</label> <span><?php
                                echo $_SESSION['userDepartment'];
                                ?></span><br/><br/>
                            <label for="customerid">  Customer Id:</label> <input placeholder="Customer ID" name = "customerId" id="customerId" type="text" size="10" maxlength="10">
                            <span class="error">* <?php echo $customerIdErr; ?></span><br/><br/>
                            <label for="samplename">  Sample Name:</label><?php
                            include_once '../Controller/SampleController.php';
                            $samplen = new SampleController();
                            $mydata = $samplen->viewSample();
                            echo'<select name = "sampleNameToBeTested" >';
                            foreach ($mydata as $value) {
                                echo' 
                                    <option value="' . $value['samplename'] . '">' . $value['samplename'] . '</option>';
                            }
                            echo'</select>';
                            ?>  
                            <p id="you"></p>
                             <br/> <label for="standardreference">  Standard Reference:</label> <select required name="standardReferencesToBeTested" id="standardReferencesToBeTested" style="width: 120px;">
                                <option disabled selected value> -- </option>
                                <option value="ISO">ISO</option>
                                <option value="IEEE">IEEE</option>
                                <option value="IEC">IEC</option>
                                <option value="CDA">CDA</option>
                                <option value="ITU">ITU</option>
                                <option value="SAE">SAE</option>
                                <option value="OSHA">OSHA</option>
                            </select>


<span class="error">* <?php echo $standRefErr; ?></span></br></br>
                            <label for="amount">   Amount:</label> <input placeholder="Amount" name = "amountToBeTested" id="amountToBeTested" type="number" step="any" size="30" maxlength="100">
                            <span class="error">* <?php echo $amountErr; ?></span></br></br>
                            <label for="duedate"> Due Date:</label> <input type="date" name="duedate">
                            <br/><br/> <label for="samplingtype"> Sampling type: </label><select required name="typeOfSampleToBeTested" id="typeOfSampleToBeTested" style="width: 120px;">
                                <option disabled selected value> -- </option>
                                <option value="Random">Random</option>
                                <option value="Stratified">Stratified</option>
                                <option value="Systematic">Systematic</option>
                                <option value="Cluster">Cluster</option>
                                <option value="Nonprobability">Nonprobability</option>
                                <option value="Availability">Availability</option>
                                <option value="Quota">Quota</option>
                                <option value="Purposive">Purposive</option>
                                <option value="Snowball">Snowball</option>

                            </select>
                            <span class="error">* <?php echo $tosErr; ?></span></br></br>
                            <!-- Check Out No: <input placeholder="Check Out Number" type="text" name ="checkOutNo" id="checkOutNo" size="30" maxlength="100"></br>
                            <span class="error">* <?php echo $conErr; ?></span></br></br>                            -->
                            <input id ="addsttBtn" type = "submit" name="submit" value="Add SampleTest" class="primaryBtn floatRightBtn">
                            <!--<button class="primaryBtn floatRightBtn">Cancel</button>-->
                            </br>
                            </br>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </body>
</html>


