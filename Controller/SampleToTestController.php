<?php

include '../Model/SampleToTest.php';

class SampleToTestController extends SampleToTest {

    protected $labDesignatedNo;
    public function getNewLDN(){
        return $this->generateLabDesignatedNo();
    }
    public function getNewCON(){
       return $this->generateCheckOutNo();
    }

    public function viewSampleToTest() {
        $sampleToTest = new SampleToTest();
        $all_sample = $sampleToTest->getSampleToTest();
        return $all_sample;
    }

    public function addSampleToTest($sampleTestC) {
        $sampleTest = new SampleToTest();
        $sampleTest->setCustomerId($sampleTestC['customerId']);
        $sampleTest->setSampleNameToBeTested($sampleTestC['sampleNameToBeTested']);
        $sampleTest->setDueDate($sampleTestC['duedate']);
        $sampleTest->setStandardReferencesToBeTested($sampleTestC['standardReferencesToBeTested']);
        $sampleTest->setAmountToBeTested($sampleTestC['amountToBeTested']);
        $sampleTest->setTypeOfSampleTested($sampleTestC['typeOfSampleToBeTested']);
        $sampleTest->setDepartment($sampleTestC['department']);
        $sampleToTest_list = array();
        $sampleToTest_list['customerId'] = $sampleTest->getCustomerId();
        $sampleToTest_list['sampleNameToBeTested'] = $sampleTest->getSampleNameToBeTested();
        $sampleToTest_list['duedate'] = $sampleTest->getDueDate();
        $sampleToTest_list['standardReferencesToBeTested'] = $sampleTest->getStandardReferencesToBeTested();
        $sampleToTest_list['amountToBeTested'] = $sampleTest->getAmountToBeTested();
        $sampleToTest_list['typeOfSampleToBeTested'] = $sampleTest->getTypeOfSampleTested();
        $sampleToTest_list['checkOutNo'] = $sampleTestC["checkOutNo"];
        $sampleToTest_list['labDesignatedNo'] = $sampleTestC["labDesignatedNo"];
        $sampleToTest_list['department'] = $sampleTest->getDepartment();

        $sampleTest->insertSampleTest($sampleToTest_list);

        header("location: AddSampleToTest2.php?sn=" . $sampleToTest_list['sampleNameToBeTested'] . "&&ldn=" . $sampleToTest_list['labDesignatedNo']);
    }

    public function addPLDN($sampleTTL) {
      
        $sampleToTest = new SampleToTest();
        $param = $sampleTTL['parameterToBeTested'];
//        print_r($param);
        $ldn = $sampleTTL['labDN'];
        $sendldn['parameterToBeTested'] = $param;
        $sendldn['labDN'] = $ldn;
        $sendldn['parameterToBeTested'] = $param;
        $sampleToTest->insertParamL($sendldn);
        header("location: AddSampleToTest.php");

        
    }    public function insertSTT($sampleToTest_list) {

        $ins = $this->db->connect()->query
                ("INSERT INTO Sampletotest (customerId,duedate,department, sampleNameToBeTested,standardReferencesToBeTested, amountToBeTested, typeOfSampleToBeTested, checkOutNo, labDesignatedNo) VALUES ('"
                . $sampleToTest_list['customerId'] .
                "','" . $sampleToTest_list['deadline'] .
                "','" . $sampleToTest_list['department'] .
                "','" . $sampleToTest_list['sampleName'] .
                "','" . $sampleToTest_list['standardReference'] .
                "','" . $sampleToTest_list['amountToBeTested'] .
                "','" . $sampleToTest_list['sampleType'] .
                "','" . $sampleToTest_list['checkOutNo'] .
                "','" . $sampleToTest_list['labDesignatedNo'] .
                "');");

        return $sampleToTest_list['checkOutNo'];
    }
    public function searchSTT($ldn){
        return $this->searchSTTByLDN($ldn);
    }


}
