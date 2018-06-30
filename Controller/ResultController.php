<?php

include '../Model/Result.php';

class ResultController extends Result {

    //protected $labDesignatedNumber;

    public function feedresult($result_list) {
//        print_r($result_list);
        $this->feedresultt($result_list);
    }

    public function deletePar($ldn, $param) {
        $s = $this->getParamRowCount($ldn);
        $this->deleteParameterBYLDN($ldn, $param);
//        echo $s;
        return $s;
    }

    public function viewResult($memberid) {

        $all_result = $this->getAllResults($memberid);

        return $all_result;
    }
    public function searchResult($userid,$resultid){
        return $this->getResultbyUIaRI($userid, $resultid);
        
    }

    public function findResult($resultId) {
        $sql = "SELECT sampleId,sampleName,result,resultDescription,labDesignatedno from RESULT Where resultId =" . $resultId . ';';
        $result = $this->connect()->query($sql);
        // $numRows = $result->num_rows;
        //  if($numRows >0){
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;

        // }
    }

    public function deleteResult($resultId) {
        $sql = "DELETE from RESULT WHERE resultId =' " . $resultId . "';";
        $result = $this->connect()->query($sql);
        if ($result) {
            echo "Data succsessfully deleted";
            header("Location: ../View/viewResult.php");
        } else {
            echo 'data not deleted';
        }
    }

}
