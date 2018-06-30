<?php

include '../Model/Department.php';

class DepartmentController extends Department {
    public function __construct() {
        $this->department = new Department();
    }

    public function addDepartment($departmentA) {
        $this->department->setDepartment($departmentA['department']);
        $department_result = array();
        $department_result['department'] = $this->department->getDepartment();
        $re = $this->department->insertDepartment($department_result);
        return $re;
    }        
    public function viewDepartment() {
        $all_departments = $this->department->getAllDepartment();
        return $all_departments;
    }
    public function getParamByLDN($ldn){
        
        $ldn_r = $this->department->findParamLDN($ldn);
        return $ldn_r;
                
    }
    public function searchDepartment($id){
        return $this->department->findDepartmentById($id);
    }

}
