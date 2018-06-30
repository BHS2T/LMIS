<?php

include '../Model/SampleToTest.php';
include 'DbConnectionTest.php';

class SampleToTestTest extends DatabaseTest {

    protected $object;
    
    public function setUp() {
        $this->object = new SampleToTest;
    }

    
    public function testSetGetCustomerId() {
        
        $this->object->setCustomerId('1234567890');
        $this->assertEquals(
                $this->object->getCustomerId(), '1234567890'
        );
        
    }

    
    public function testSetGetSampleNameToBeTested() {
        
        $this->object->setSampleNameToBeTested('soap');
        $this->assertEquals(
                $this->object->getSampleNameToBeTested(), 'soap');
        
    }

    
    public function testSetGetSampleId() {
        
        $this->object->setSampleId('abc123456');
        $this->assertEquals(
                $this->object->getSampleId(), 'abc123456');
        
    }

    public function testSetGetDepartment() {
        
        $this->object->setParameterToBeTested('mechanical');
        $this->assertEquals(
                $this->object->getParameterToBeTested(), 'mechanical');
        
    }

    public function testSetGetParameterToBeTested() {
        
        $this->object->setParameterToBeTested('ph');
        $this->assertEquals(
                $this->object->getParameterToBeTested(), 'ph');
        
    }

    
    public function testSetGetStandardReferencesToBeTested() {
        
        $this->object->setStandardReferencesToBeTested('iso');
        $this->assertEquals(
                $this->object->getStandardReferencesToBeTested(), 'iso');
        
    }

    public function testSetGetAmountToBeTested() {
        
        $this->object->setAmountToBeTested(20.5);
        $this->assertEquals(
                $this->object->getAmountToBeTested(), 20.5);
        
    }

 
    public function testSetGetDueDate() {
        
        $this->object->setTypeOfSampleTested('2018-02-02');
        $this->assertEquals(
                $this->object->getTypeOfSampleTested(), '2018-02-02');
        
    }

    
    public function testSetGetTypeOfSampleTested() {
        
        $this->object->setTypeOfSampleTested('liquid');
        $this->assertEquals(
                $this->object->getTypeOfSampleTested(), 'liquid');
        
    }

   
    public function testGetSampleToTest() {
        
        $viewSampleTest = $this->object->getSampleToTest();
        $xml_dataset = $this->createFlatXMLDataSet(dirname(__FILE__) . '/getSampleToTest.xml');
        $raw = json_encode($xml_dataset);
        $this->assertEquals($raw, $viewSampleTest);
        
    }
    
    
    public function testGetCheckOutNo() {
        
        $checkoutno = $this->object->generateCheckOutNo();
        $expectedcheckoutno = $this->object->getCheckOutNo();
        $this->assertEquals($expectedcheckoutno, $checkoutno);
        
    }

    public function testGetLabDesignatedNo() {
        
        $ldn = $this->object->generateLabDesignatedNo();
        $expectedldn = $this->object->getLabDesignatedNo();
        $this->assertEquals($ldn, $expectedldn);
        
    }

    
    public function testDeleteSampleTest() {
       
        $checkoutno = '5457678787';
        $result = $this->object->deleteSampleTest($checkoutno);
        $expected = NULL;
        $this->assertEquals($expected, $result);
        
    }

    
    public function testInsertSampleTest() {
        
        $sampleToTest_list = array();
        $sampleToTest_list['customerId'] = '1234567876';
        $sampleToTest_list['duedate'] = '2018-02-02';
        $sampleToTest_list['department'] = 'chemical';
        $sampleToTest_list['sampleNameToBeTested'] = 'water';
        $sampleToTest_list['standardReferencesToBeTested'] = 'iso';
        $sampleToTest_list['amountToBeTested'] = '22.2';
        $sampleToTest_list['typeOfSampleToBeTested'] = 'Random';
        $sampleToTest_list['checkOutNo'] ='5457678787';
        $sampleToTest_list['labDesignatedNo'] = '6676655654';
        $this->object->insertSampleTest($sampleToTest_list);
        $tableName = '$sampleToTest_list';
        
             
     // Assuming no inputs found in result table, 
     // after inserting the above one, single entry will be available
     $this->assertEquals(1, $this->getConnection()->getRowCount($tableName), "Inserting failed");
     
        
    }

    
    public function testInsertParamL() {
        
        $sampleTTL = array();
        $sampleTTL['parameterToBeTested'] = 'ph';
        $sampleTTL['labDN'] = '6676655654';
        $this->object->insertParamL($sampleTTL);
        $tableName = 'paramsldn';
        
             
     // Assuming no inputs found in sampleToTest table, 
     // after inserting the above one, single entry will be available
     $this->assertEquals(1, $this->getConnection()->getRowCount($tableName), "Inserting failed");

        
    }

    
    public function testFindSample() {
        
        $samplename = 'oil';
        $sampleid = 'oil12345';
        $findSampleT = $this->object->findSample($samplename, $sampleid);
        $expected = $this->createFlatXMLDataSet(dirname(__FILE__) . '/viewresult.xml');
        $this->assertDataSetsEqual($findSampleT, $this->getConnection()->$expected);

        
    }

    
    public function testFindParam() {
        
        $samplename = 'oil';
        $findParam = $this->object->findParam($samplename);
        $expected = $this->createFlatXMLDataSet(dirname(__FILE__) . '/viewresult.xml');
        $this->assertDataSetsEqual($findParam, $this->getConnection()->$expected);

    }

    
    public function testGetAllResults() {
        
        $memberid = '1';
        $viewResult = $this->object->getAllResults($memberid);
        $expected = $this->createFlatXMLDataSet(dirname(__FILE__) . '/viewresult.xml');
        $this->assertDataSetsEqual($viewResult, $this->getConnection()->$expected);
        
    }

}
