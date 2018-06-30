<?php

include '../Model/Sample.php';
include 'DbConnectionTest.php';

class SampleTest extends DatabaseTest {

    
    protected $object;
      
    public function setUp() {
        $this->object = new Sample;
    }

    
    protected function tearDown() {
        
    }

   
    public function testGetAllSample() {
        
        $viewSample = $this->object->getAllSample();
        $expected = $this->createFlatXMLDataSet(dirname(__FILE__) . '/getSample.xml');
        $this->assertDataSetsEqual($viewSample, $this->getConnection()->$expected);

        
    }

    
    public function testSetGetTime() {
        
        $this->object->setTime('1997-02-06');
        $this->assertEquals($this->object->getTime(), '1997-02-06');
        
    }

    
    public function testSetGetSamplename() {
        
        $this->object->setSamplename('soap');
        $this->assertEquals($this->object->getSamplename(), 'soap');
        
    }

   
    public function testSetGetParameter() {
       
        $this->object->setParameter('phvalue');
        $this->assertEquals($this->object->getParameter(), 'phvalue');
        
    }


    public function testSetGetAmount() {
        
        $this->object->setAmount('55');
        $this->assertEquals($this->object->getAmount(), '55');
        
    }

    
    public function testSetGetSampletype() {
        
        $this->object->setSampletype('availability');
        $this->assertEquals($this->object->getSampletype(), 'availability');
        
    }

    public function testDeleteSample() {
        
        $sampleid = 'oil1234';
        $result = $this->object->deleteSample($sampleid);
        $expected = NULL;
        $this->assertEquals($expected, $result);
        
    }

    
    public function testInsertSample() {
        
        $sample_list = array();
        $sample_list['sampleid'] = 'wat12321';
        $sample_list['testtime'] = '2018-02-02';
        $sample_list['samplename'] = 'water';
        $sample_list['amount'] = '2.0';
        $sample_list['parameter'] = 'ph';
        $sample_list['sampletype'] = 'Random';
        $this->object->insertSample($sample_list);
        $tableName = 'sample';
     
     // Assuming no inputs found in result table, 
     // after inserting the above one, single entry will be available
     $this->assertEquals(1, $this->getConnection()->getRowCount($tableName), "Inserting failed");
        
    }

    
    public function testFindSampleBy() {
        
        $sampleid = 'oil12345';
        $findSample = $this->object->findSampleBy($sampleid);
        $expected = $this->createFlatXMLDataSet(dirname(__FILE__) . '/getSample.xml');
        $this->assertDataSetsEqual($findSample, $this->getConnection()->$expected);
    }

}
