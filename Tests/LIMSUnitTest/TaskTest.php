<?php

include '../Model/Task.php';
include 'DbConnectionTest.php';

class TaskTest extends DatabaseTest {

    protected $object;

    public function setUp() {
        $this->object = new Task;
    }

   
    
    public function testGetMyTask() {
        
        $task = array();
        $task['userid'] = '1';
        $viewtask = $this->object->getMyTask($task['userid']);
        $expected = $this->createFlatXMLDataSet(dirname(__FILE__) . '/task.xml');
        $this->assertDataSetsEqual($viewtask, $this->getConnection()->$expected);
        
    }

    
    public function testSetGetTaskName() {
        
        $this->object->setTaskName('assigned');
        $this->assertEquals($this->object->getTaskName(), 'assigned');
        
    }

    
    public function testSetGetSampleId() {
        
        $this->object->setSampleId('123456');
        $this->assertEquals($this->object->getSampleId(), '123456');
        
    }

    
    public function testSetGetLDN() {
       
        $this->object->setLDN('655565675776');
        $this->assertEquals($this->object->getLDN(), '655565675776');
        
    }

    
    
    public function testSetGetStatus() {
        
        $this->object->setStatus('completed');
        $this->assertEquals($this->object->getStatus(), 'completed');
        
    }

    
    public function testSeGettDeadline() {
        
        $this->object->setDeadline('2018-02-02');
        $this->assertEquals($this->object->getDeadline(), '2018-02-02');
        
    }

    
    public function testFindParamLDN2() {
       
        $ldn = '1234567654';
        $param = $this->object->findParamLDN2($ldn);
        $expected = $this->createFlatXMLDataSet(dirname(__FILE__) . '/task.xml');
        $this->assertDataSetsEqual($param, $this->getConnection()->$expected);
    }

    
    public function testInsertTask() {
        
        $task_result = array();
        $task_result['userid'] = '12345';
        $task_result['taskname'] = 'assigned';
        $task_result['sampleName'] = 'oil';
        $task_result['labDesignatedNo'] = '6676655654'; 
        $task_result['status'] = 'completed';
        $task_result['deadline'] = '2018-02-02';
        
        $this->object->insertTask($task_result);
        $tableName = 'task';
        
        // Assuming there already exist one entry, 
        // then after inserting the above task -> assert the row count is 2
        $this->assertEquals(2, $this->getConnection()->getRowCount($tableName), "Inserting failed");
        
    }

    
    public function testFindSTTByLDN() {
        
        $ldn = '6676655654';
        $findStt = $this->object->findSTTByLDN($ldn);
        $expected = $this->createFlatXMLDataSet(dirname(__FILE__) . '/getSampleToTest.xml');
        $this->assertDataSetsEqual($findStt, $this->getConnection()->$expected);
    }

    
    public function testCompleteTaskOfLM() {
        
        $department = 'software';
        $ldn = '134556566767';
        $completedtask = $this->object->completeTaskOfLM($department, $ldn);
        $expected  = NULL;
        $this->assertEquals($expected, $completedtask);
    }

    
    public function testGetManager() {
        
        $dept = 'software';
        $type = 'lab manager';
        $memberid = $this->object->getManager($dept, $type);
        $expectedmid = '12345';
        $this->assertEquals($memberid, $expectedmid);
    }

    
    public function testUpdateStatus() {
        
        $status = array();
        $status['taskid'] = '1';
        $status['state'] = 'Waiting';
        $updatestatus = $this->object->updateStatus($status);
        $this->assertEquals($status['state'], $updatestatus);
        
    }

    
    public function testUpdateStatus1() {
        
        $labDesignatedNo = '134556566767';
        $this->object->updateStatus1($labDesignatedNo);
        $expected = 'Assigned';
        $sql = "SELECT status from task where labDesignatedNo='".$labDesignatedNo."'";
        $db = new Database();
        $updated = $db->connect()->query($sql);
        $this->assertEquals($expected, $updated);
                
    }

    
    public function testUpdateStatus2() {
        
        $labDesignatedNo = '134556566767';
        $this->object->updateStatus2($labDesignatedNo);
        $expected['status'] = 'In Progress';
        $sql = "SELECT status from task where labDesignatedNo='".$labDesignatedNo."'";
        $db = new Database();
        $updated = $db->connect()->query($sql);
        $this->assertEquals($expected['status'], $updated);
        
    }

}
