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
    include 'header.php';
    include '../Controller/SampleController.php';
//$URL = $_GET['url'];
    $samples = new SampleController();
    $sample = $samples->viewSample();
    if($sample){
        echo '  <div class = "viewTable">';
        echo '  <div class = "allViewContainer"><div class = "tth"><strong>View Sample</strong></div></div>';
        echo '      <table>
                        <th>Sample Id</th>
                        <th>Sample Name</th>
                        <th>Parameter</th>
                        <th>Sample Type</th>
                        <th>Amount</th>
                        <th>Time To Test(minute)</th>
                        <th>Remove</th>
                        <th>Edit</th>
                    </tr>';
    foreach ($sample as $eachSample) {
        echo '
                <tr>
                    <td>';
        echo $eachSample['sampleid'];
        echo '</td>
                    <td>';
        echo $eachSample['samplename'];
        echo '</td><td>';
        echo $eachSample['parameter'];
        echo'</td><td>';
        echo $eachSample['sampletype'];
        echo '</td><td>';
        // echo $myd['department'];
        // echo '</td><td>';
        echo $eachSample['amount'];
        echo '</td><td>';
        echo $eachSample['testtime'];
        echo '</td>
                    
    <td><a class  ="primaryBtn"     href = "deleteSample.php?sampleID='.$eachSample['sampleid'].'">Remove</a><br/>
    </td><td>
                                        
<a class  ="primaryBtn"         href = "editSample.php?sampleID='.$eachSample['sampleid'].'">Edit</a>
                    </td>
                </tr>
                ';
    }
    echo
    '
            </table>

            ';
    echo '</div>';}
    else{
    echo 'NO SAMPLE FOUND';
    }
    ?>
</body>
</html>