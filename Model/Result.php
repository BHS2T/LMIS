<?php

include 'database.php';

class Result {

    private $sampleId;
    private $verifierId;
    private $parameter;
    private $labDesignatedNumber;
    private $reslultDescription;
    private $validation;

    public function __construct() {

        $this->db = new Database();
    }

    public function setParameter($newParameter) {
        if (!preg_match("/^[a-zA-Z]*$/", $newParameter)) {

            return false;
        }
        if (strlen($newParameter) >= 20) {
            return false;
        }
        $this->parameter = $newParameter;
        return true;
    }

    public function getParameter() {
        return $this->parameter;
    }

    public function setSampleId($newSampleId) {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $newSampleId)) {

            return false;
        }
        if (strlen($newSampleId) >= 20) {
            return false;
        }
        $this->sampleId = $newSampleId;
        return true;
    }

    public function getSampleId() {
        return $this->sampleId;
    }

    public function setValidation($newValidation) {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $newValidation)) {

            return false;
        }
        if (strlen($newValidation) >= 20) {
            return false;
        }
        $this->validation = $newValidation;
        return true;
    }

    public function getValidation() {
        return $this->validation;
    }

    public function setResultDescription($newResultDescription) {
        $this->reslultDescription = $newResultDescription;
        return true;
    }

    public function getResultDescription() {

        return $this->reslultDescription;
    }



    public function feedresultt($result_list) {
//        $resultId = "RS".date("dmys").  rand(0, 9);
        $sql = "INSERT INTO RESULT (resultId,memberId,samplename,validationStatus,parameter,"
                . "result,resultdescription,labdesignatedno,standardReference) VALUES (NULL" .
                ",'" . $result_list['memberId'] .
                "','" . $result_list['samplename'] .
                "','" . $result_list['validationStatus'] .
                "','" . $result_list['parameter'] .
                "','" . $result_list['result'] .
                "','" . $result_list['resultdescription'] .
                "','" . $result_list['labdesignatedno'] .
                "','" . $result_list['standardReference'] .
                "');";
        $result = $this->db->connect()->query($sql);
        if ($result) {
            echo "enterd to database";
//            header("Location: ../View/viewResult");
        } else {
            echo 'not entered to database';
            echo $resultId;
        }
    }

    public function getParamRowCount($ldn) {

        $sql = "SELECT * FROM paramsldn where labDesignatedNo = '$ldn'";
        $stm = $this->db->connect()->query($sql);
        $rowcount = $stm->rowCount();
        if ($rowcount <= 1) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteParameterBYLDN($ldn, $param) {
        $sql = "DELETE FROM paramsldn WHERE labDesignatedNo = '$ldn' AND parameter ='$param' ";
        try {
            $sql = $this->db->connect()->query($sql);
        } catch (Exception $ex) {
//    echo $ex;
            echo 'Deletion not successfull';
        }
    }

    public function viewResultt() {
        $sql = "SELECT resultId,sampleId,sampleName,result,resultDescription from RESULT ";
        $result = $this->db->connect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function getAllResults($memberid) {
        $spl = $this->db->connect()->query
                ("SELECT * FROM result WHERE "
                . "memberid = '$memberid'");
        $info = array();
        while ($row = $spl->fetch()) {
            $info[] = $row;
        }
//        print_r($info);
        return $info;
    }
    public function getResultbyUIaRI($userid, $resultid){
                $spl = $this->db->connect()->query
                ("SELECT * FROM result WHERE "
                . "memberid = '$userid' and resultId = '$resultid'");
        $info = array();
        while ($row = $spl->fetch()) {
            $info[] = $row;
        }
//        print_r($info);
        return $info;
    }

    public function findResultt($labDesignatedNumber) {
        $sql = "SELECT resultId,sampleId,sampleName,result,resultDescription from RESULT Where labDesignatedno =" . $labDesignatedNumber;
        $result = $this->db->connect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function deleteResultt($resultId) {
        $sql = "Delete from RESULT Where resultId =" . $resultId;
        $result = $this->db->connect()->query($sql);
        if ($result) {
            echo "Data succsessfully deleted";
        } else {
            echo 'data not deleted';
        }
    }

}
