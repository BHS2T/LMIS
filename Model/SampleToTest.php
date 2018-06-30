<?php

//include 'database.php';
//include_once 'Member.php';

class SampleToTest {

    private $customerId;
    private $sampleNameToBeTested;
    private $parameterToBeTested;
    private $standardReferencesToBeTested;
    private $amountToBeTested;
    private $typeOfSampleToBeTested;
    private $checkOutNo;
    private $labDesignatedNo;
    private $department;

    public function __construct() {
        $this->db = new Database();
    }

    //customer id
    public function setCustomerId($customerId) {
        if (!preg_match("/^[0-9]*$/", $customerId)) {

            return false;
        }
        if (strlen($customerId) >= 11) {
            return false;
        }
        $this->customerId = $customerId;
        return true;
    }

    public function getCustomerId() {
        return $this->customerId;
    }

    //sample name to be tested
    public function setSampleNameToBeTested($sampleNameToBeTested) {
        if (!preg_match("/^[a-zA-Z]*$/", $sampleNameToBeTested)) {

            return false;
        }
        if (strlen($sampleNameToBeTested) >= 21) {
            return false;
        }
        $this->sampleNameToBeTested = $sampleNameToBeTested;
        return true;
    }

    public function getSampleNameToBeTested() {
        return $this->sampleNameToBeTested;
    }

    //sample id is set
    public function setSampleId($sampleId) {
                if (!preg_match("/^[a-zA-Z0-9]*$/", $sampleId)) {

            return false;
        }
        if (strlen($sampleId) >= 20) {
            return false;
        }
        $this->sampleId = $sampleId;
        return true;
    }

    //sample id
    public function getSampleId() {
        return $this->sampleId;
    }


    //parameter to be tested
    public function setParameterToBeTested($parameterToBeTested) {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $parameterToBeTested)) {

            return false;
        }
        if (strlen($parameterToBeTested) >= 11) {
            return false;
        }
        $this->parameterToBeTested = $parameterToBeTested;
        return true;
    }

    public function getParameterToBeTested() {
        return $this->parameterToBeTested;
    }

    //standard references to be tested
    public function setStandardReferencesToBeTested($standardReferencesToBeTested) {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $standardReferencesToBeTested)) {

            return false;
        }
        if (strlen($standardReferencesToBeTested) >= 11) {
            return false;
        }
        
        $this->standardReferencesToBeTested = $standardReferencesToBeTested;
        return true;
    }

    public function getStandardReferencesToBeTested() {
        return $this->standardReferencesToBeTested;
    }

    //amount to be tested
    public function setAmountToBeTested($amountToBeTested) {
        $this->amountToBeTested = $amountToBeTested;
    }

    public function getAmountToBeTested() {
        return $this->amountToBeTested;
    }

    //amount to be tested
    public function setDueDate($duedate) {
        $this->duedate = $duedate;
    }

    public function getDueDate() {
        return $this->duedate;
    }

    //type of sample to be tested
    public function setTypeOfSampleTested($typeOfSampleToBeTested) {
        $this->typeOfSampleToBeTested = $typeOfSampleToBeTested;
    }

    public function getTypeOfSampleTested() {
        return $this->typeOfSampleToBeTested;
    }    
        //department
    public function setDepartment($dept) {
        $this->department = $dept;
    }

    public function getDepartment() {
        return $this->department;
    }
    
    public function getSampleToTest() {
        $stmt = $this->db->connect()->query("SELECT * FROM sampletotest");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function searchSTTByLDN($ldn){
                $stmt = $this->db->connect()->query("SELECT * FROM sampletotest WHERE labDesignatedNo = '$ldn'");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function generateCheckOutNo() {
//        $letLen = 3;
//        $str = "abcdefghijklmnopqrstuvwxyz";
//        $randLet = substr(str_shuffle($str), 0, $letLen);
        $checkOutNo = uniqid();
        return $checkOutNo;
    }

    public function generateLabDesignatedNo() {

        $labDesignatedNo = uniqid();
        return $labDesignatedNo;
    }

    public function getCheckOutNo() {
        return $this->generateCheckOutNo();
    }

    public function getLabDesignatedNo() {
        return $this->generateLabDesignatedNo();
    }


    public function deleteSampleTest($id) {
        $query = "DELETE FROM Sampletotest WHERE checkOutNo = '" . $id . "';";
        $this->db->connect()->query($query);
    }

    public function insertSampleTest($sampleToTest_list) {
        // $sampleT = new SampleToTest();
        $ins = $this->db->connect()->query
                ("INSERT INTO Sampletotest (customerId,duedate,department, sampleNameToBeTested,standardReferencesToBeTested, amountToBeTested, typeOfSampleToBeTested, checkOutNo, labDesignatedNo) VALUES ('"
                . $sampleToTest_list['customerId'] .
                "','" . $sampleToTest_list['duedate'] .
                "','" . $sampleToTest_list['department'] .
                "','" . $sampleToTest_list['sampleNameToBeTested'] .
                "','" . $sampleToTest_list['standardReferencesToBeTested'] .
                "','" . $sampleToTest_list['amountToBeTested'] .
                "','" . $sampleToTest_list['typeOfSampleToBeTested'] .
                "','" . $sampleToTest_list['checkOutNo'] .
                "','" . $sampleToTest_list['labDesignatedNo'] .
                "');");

        return $sampleToTest_list['checkOutNo'];
    }

    public function insertParamL($sampleTTL) {
        $params = $sampleTTL['parameterToBeTested'];
        $ldn = $sampleTTL['labDN'];
        for ($i = 0; $i < count($params); $i++) {
            $this->db->connect()->query("INSERT INTO paramsLDN (labdesignatedno,parameter)"
                    . " VALUES ('" . $ldn . "','" . $params[$i] . "')");
        }
    }

    public function findSample($sampleName, $sampleId) {

        $spl = $this->db->connect()->query
                ("SELECT * FROM SAMPLE WHERE "
                . "sampleName = '$sampleName' and sampleId = '$sampleId'");
        $info = array();
        while ($row = $spl->fetch()) {
            $info[] = $row;
        }
//        print_r($info);
        return $info;
    }

    public function findParam($sampleNamee) {
        $spl = $this->db->connect()->query
                ("SELECT * FROM params WHERE "
                . "samplename = '$sampleNamee'");
        $info = array();
        while ($row = $spl->fetch()) {
            $info[] = $row;
        }
//        print_r($info);
        return $info;
    }



}
