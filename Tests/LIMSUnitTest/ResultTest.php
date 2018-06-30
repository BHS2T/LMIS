<?php

include '../Model/Result.php';
include 'DbConnectionTest.php';

class ResultTest extends DatabaseTest {

  
    protected $object;

    public function setUp() {
        $this->object = new Result;
    }

    
   
    
    public function testSetGetParameter() {
       
       $this->object->setParameter("parameter");
       $this->assertEquals($this->object->getParameter(), "parameter");
    }

    public function testSetGetSampleId() {
       
        $this->object->setSampleId("wat12356");
        $this->assertEquals($this->object->getSampleId(), "wat12356");
    }

   
    public function testSetGetValidation() {
        
        $this->object->setValidation("Valid");
        $this->assertEquals($this->object->getValidation(), "Valid");
    }

   
    public function testSetGetResultDescription() {
        
        $this->object->setValidation("This is description of the result");
        $this->assertEquals($this->object->getValidation(), "This is description of the result");
        
    }

   
    public function testSetGetResultRangeOfSample() {
        
        $this->object->setResultRangeOfSample("New Result Range");
        $this->assertEquals($this->object->getResultRangeOfSample(),"New Result Range");
        
    }

    public function testFeedresultt() {
       
     $res_list = array();
     $res_list['memberId']  = '2';
     $res_list['samplename'] = 'water';
     $res_list['validationStatus']  = 'valid';
     $res_list['parameter'] = 'ph';
     $res_list['result']  = 'title';
     $res_list['resultdescription'] = 'description her';
     $res_list['labdesignatedno'] = '0987654321';
     $res_list['standardReference'] = 'Random';
     $res_list['sampleId'] = 'wat12345';
     $this->object->feedresultt($res_list);
     $tableName = 'Result';
     
     // Assuming empty values in result table, 
     // after inserting the above one, single entry will be available
     $this->assertEquals(1, $this->getConnection()->getRowCount($tableName), "Inserting failed");
    }

  
    public function testGetParamRowCount() {
       
        $ldn = '1234567890';
        $getParamRowCount = $this->object->getParamRowCount($ldn);
        $tru = true;
        $this->assertEquals($getParamRowCount, $tru);
        
    }

    
    public function testDeleteParameterBYLDN() {
        
        $ldn = '1234567890';
        $param = 'ph';
        $result = $this->object->deleteParameterBYLDN($ldn, $param);
        $expected = NULL;
        $this->assertEquals($expected, $result);
        
    }

   
    public function testViewResultt() {
       
        $viewResult = $this->object->viewResultt();
        $expected = $this->createFlatXMLDataSet(dirname(__FILE__) . '/viewresult.xml');
        $this->assertDataSetsEqual($viewResult, $this->getConnection()->$expected);
        
    }

    
    public function testFindResultt() {
        
        $labDesignatedNumber = '1234567890';
        $findResult = $this->object->findResultt($labDesignatedNumber);
        $expected = $this->createFlatXMLDataSet(dirname(__FILE__) . '/viewresult.xml');
        $this->assertDataSetsEqual($findResult, $expected);
    }

    
    public function testDeleteResultt() {
        
        $resultId = '2';
        $result = $this->object->deleteResultt($resultId);
        $expected = NULL;
        $this->assertEquals($expected, $result);
        
    }

}
