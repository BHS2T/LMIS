<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Sample</title>
        <link rel="stylesheet" href="CSS/common.css">
        <link rel="stylesheet" href="CSS/signupCSS.css">
    </head>
    <body>
        <div class="body">
            <?php
            include 'authorizeAdmin.php';?>
            <div class = "header">
                <img src ="img/logo22.png" class="logoImg">
            </div>    
            <?php
            include 'header.php';

            $samplenameErr = $parameterErr = $amountErr = $sampletypeErr = $testtimeErr = "";
            $samplename = $parameter = $amount = $sampletype = $testtime = "";
            $isValid = true;

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["samplename"])) {
                    $samplenameErr = "Sample name is required";
                    $isValid = false;
                } else {
                    $samplename = test_input($_POST["samplename"]);
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z]*$/", $samplename)) {
                        $samplenameErr = "Only letters are allowed";
                        $isValid = false;
                    }
                }
                if (empty($_POST["parameter"])) {
                    $parameterErr = "Parameter is required";
                    $isValid = false;
                } else {
                    $parameter = test_input($_POST["parameter"]);
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z]*$/", $parameter)) {
                        $parameter = "Only letters are allowed";
                        $isValid = false;
                    }
                } if (empty($_POST["amount"])) {
                    $amountErr = "Amount is required";
                    $isValid = false;
                } else {
                    $amount = test_input($_POST["amount"]);
                    // check if amount only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z]*$/", $amount)) {
                        $amountErr = "Only letters are allowed";
                        $isValid = false;
                    }
                }
                if (empty($_POST["testtime"])) {
                    $testtimeErr = "Test time is required(minutes)";
                    $isValid = false;
                } else {
                    $testtime = test_input($_POST["testtime"]);
                    if (!preg_match("/^[0-9]*$/", $testtime)) {
                        $testtimeErr = "Only numbers are allowed(minutes)";
                        $isValid = false;
                    }
                }
                if (empty($_POST["sampletype"])) {
                    $testtimeErr = "sample type is required";
                    $isValid = false;
                } else {
                    $sampletype = test_input($_POST["sampletype"]);
                    if (!preg_match("/^[a-zA-Z]*$/", $sampletype)) {
                        $sampletypeErr = "Only letters are allowed";
                        $isValid = false;
                    }
                }
            }

            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            include_once '../Controller/SampleController.php';
            $sampleController = new AddSampleC();
            if (isset($_POST['submit']) && $isValid == true) {
                extract($_POST);
                $sample = array();
                $sample['samplename'] = $samplename;
                $sample['sampletype'] = $sampletype;
                $sample['parameter'] = $parameter;
                $sample['amount'] = $amount;
                $sample['testtime'] = $testtime;
                $sampleController->addSample($sample);
            }
            ?>
            <div class="box">
                <form name = "form" method = "post" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> class="form-horizontal">

                    </br>
                    <div class="contentL">
                        <div class="boxHeader">
                            <h2>Add Sample</h2>
                        </div>
                        <div class="boxContent">
                            <label for="samplename"> Sample Name:</label> <input placeholder="Sample Name" name = "samplename" id="samplename" type="text" size="30" maxlength="100">
                            <span class="error">* <?php echo $samplenameErr; ?></span><br/><br/>
                            <label for="paramete">Parameter:</label> <input placeholder="Parameter" type="text" name ="parameter" id="parameter" size="30" maxlength="100">
                            <span class="error">* <?php echo $parameterErr; ?></span><br/><br/>
                            <label for="amount">Amount:</label> <input placeholder="Amount" type="text" name ="amount" id="amount" size="30" maxlength="100">
                            <span class="error">* <?php echo $amountErr; ?></span><br/><br/>
                            <label for="sampletype">Sample Type:</label> <input placeholder="Sample Type" name = "sampletype" id="sampletype" type="text" size="30" maxlength="100">
                            <span class="error">* <?php echo $sampletypeErr; ?></span><br/><br/>
                            <label for="timetotest">Time to test:</label> <input placeholder="Time(minutes)" type="text" name ="testtime" id="time" size="30" maxlength="100">
                            <span class="error">* <?php echo $testtimeErr; ?></span><br/><br/>
                            <input type = "submit" name="submit" value="Add Sample" class="primaryBtn floatRightBtn">
                            <br/>
                            <br/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>