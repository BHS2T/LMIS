<?php

include '../Controller/ViewDepartmentController.php';
include 'DbConnectionTest.php';

class DepartmentTest extends DatabaseTest {

    protected $object;
    
    
    public function setUp() {
        
        $this->object = new Department;
    }
  
    public function testSetGetDepartment() {
     
        $this->object->setDepartment('software');
        $this->assertEquals($this->object->getDepartment(), 'software');
     
    }
    
    

    public function testGetAllDepartment() {
        
        $xml_dataset = $this->createFlatXMLDataSet(dirname(__FILE__) . '/expectedDepartment.xml');
        $this->assertEquals($xml_dataset, $this->getConnection()->$this->object->getAllDepartment());
              
    }

    
    public function testDeleteDepartment() {
        
        $departmentid = '1';
        $result = $this->object->deleteDepartment($departmentid);
        $expected = "DEPARTMENT " . $departmentid . " DELETED SUCCESSFULLY";;
        $this->assertEquals($expected, $result);
    }

    
    public function testInsertDepartment() {
        
     $dep_list = array();
     $dep_list['department']  = 'civil';
     $this->object->insertDepartment($dep_list);
     $tableName = 'department';
     
     // Assuming there are four entries in department table, 
     // after inserting the above one, five entries will be available
     $this->assertEquals(5, $this->getConnection()->getRowCount($tableName), "Inserting failed");

    }

    
    public function testFindDepartmentById() {
     
        $departmentid = '1';
        $fetchDept = $this->object->findDepartmentById($departmentid);
        $expected = $this->createFlatXMLDataSet(dirname(__FILE__) . '/expectedDepartment.xml');
        $this->assertDataSetsEqual($fetchDept, $this->getConnection()->$expected);
        
    }
    public function testFindParamLDN(){
        
        $labdesignatedno = '1';
        $listOfParamLDN = $this->object->findParamLDN($labdesignatedno);
        $expected = $this->createFlatXMLDataSet(dirname(__FILE__) . '/expectedDepartment.xml');
        $this->assertDataSetsEqual($listOfParamLDN, $this->getConnection()->$expected);
        
    }

}
