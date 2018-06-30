<?php
session_start();
?>
<?php


?>



<html>
    <head>
        <style>
        </style>
        <title>Edit Sample</title>
        <link rel="stylesheet" href="CSS/common.css">
        <link rel="stylesheet" href="CSS/signupCSS.css">
    </head>
    <body>

        <div class="body">

            
            <?php

include_once '../Controller/SampleController.php';
//include_once '../Model/Member.php';

$sampleController = new AddSampleC();


if(isset($_GET['sampleID'])){
    $sampleid = $_GET['sampleID'];
    echo $sampleid;
}
//$member = new Member();
if (isset($_POST['submit'])) {
    extract($_POST);
   
    $samle = array();
    $samle['email'] = $email;
    $samle['phone'] = $phone;
    $samle['dept'] = $dept;
    $samle['tou'] = $tou;
    $samle['address'] = $address;
    $samle['userID'] = $userid;
    $sampleController->editSample($sample);
}



?>
            <?php
            include 'header.php';
            ?>

            <div class="box">
                <form name = "form" method = "post" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> class="form-horizontal">

                    </br>
                    <div class="contentL">
                        <div class="boxHeader">
                            <h2>Edit Sample</h2>
                        </div>
                        <div class="boxContent">
                            Sample Name: <input placeholder="Sample Name" name = "samplename" id="samplename" type="text" size="30" maxlength="100">
                            <!--<span class="error">* <?php echo $samplenameErr; ?></span>-->
                            <br><br>
                            Parameter: <input placeholder="Parameter" type="text" name ="parameter" id="parameter" size="30" maxlength="100">
                            <!--<span class="error">* <?php echo $parameterErr; ?></span>-->
                            </br></br>
                             Amount: <input placeholder="Amount" type="text" name ="amount" id="amount" size="30" maxlength="100">
                            <!--<span class="error">* <?php echo $amountErr; ?></span>-->
                            </br></br>
                            Sample Type: <input placeholder="Sample Type" name = "sampletype" id="sampletype" type="text" size="30" maxlength="100">
                            <!--<span class="error">* <?php echo $sampletypeErr; ?></span>-->
                            </br></br>
                            Time to test: <input placeholder="Time(minutes)" type="text" name ="testtime" id="time" size="30" maxlength="100">
                            <!--<span class="error">* <?php echo $testtimeErr; ?></span>-->
                            </br></br>
                            <input type = "submit" name="submit" value="Add Sample" class="primaryBtn floatRightBtn">
                            </br>
                            </br>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </body>
</html>
