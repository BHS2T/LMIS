<?php
session_start();

?>
<?php
                 include '../Controller/SampleToTestController.php';
                 
    //  $sample  = new SampleToTestController();
    //  $rand = $sample->getCheckOutNo();
    //  echo $rand;
?>
<html>
<head>

    <title>
        LIMS
    </title>
    <link rel="stylesheet" href="CSS/common.css">
    <link rel="stylesheet" href="CSS/viewCSS.css">
</head>
<body>
    <?php
                 include 'authorizeLO.php';?>
                                         <div class = "header">

        <img src ="img/logo22.png" class="logoImg">
        <form  class="searchForm" method ="post" action = "searchSTT.php">
            <input class = "searchBox" placeholder="Search(Lab Designated No)" type="text" name ="searchText" id="dept" size="30" maxlength="25">                                     
            <input type = "submit" id = "searchBtn" value = "" name = "searchBtn" class  ="searchBtn">
        </form> 
                 
                 <?php
            include 'header.php';
            include '../Model/database.php';
            if($_POST['searchText']){
                $ldn = $_POST['searchText'];
                $sample  = new SampleToTestController();
                $mydata = $sample->searchSTT($ldn);
                if($mydata){
//                print_r($mydata);
                echo '<div class = "viewTable">';
                echo '<div id ="searchTitle"  class = "tth"><strong>View Sample To Test</strong></div>';
                echo ' <table>
                    <tr><th>Customer Id</th>
                    <th>Sample Name To<br/>Be Tested</th>
                    <th>Standard Refer<br/>To Be Tested</th>
                    <th>Amount To<br/>Be Tested</th>
                    <th>Type Of Sample<br/>To Be Tested</th>
                    <th>CheckOutNo</th>
                    <th>labDesignatedNo</th>
                    <th>Action</th>
                    </tr>';
            foreach($mydata as $myd){
                echo '
                <tr>
                    <td>';
                    echo $myd['customerId'];
                    echo '</td>
                    <td>';
                    echo $myd['sampleNameToBeTested'];
                    echo '</td><td>';
                        echo $myd['standardReferencesToBeTested'];
                    echo '</td><td>';
                    echo $myd['amountToBeTested'];
                    echo '</td><td>';
                    echo $myd['typeOfSampleToBeTested'];
                    echo '</td><td>';
                    echo $myd['checkOutNo'];
                    echo '</td><td>';
                    echo $myd['labDesignatedNo'];
                    echo '</td>
                    <td><a href="ViewSttDelete.php?checkOutNo='.$myd['checkOutNo'].'" class="action">Delete</a><br/>
                    <a href="updatePage.php?checkOutNo='.$myd['checkOutNo'].'"  class="action">Edit</a>
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
    echo 'NO RELATED DATA FOUND';
}
            }

        ?>
    </body>
</html>