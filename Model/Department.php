<?php

include_once 'database.php';

class Department {

    private $departmentName;

    public function __construct() {
        $this->db = new Database();
    }

    public function setDepartment($department) {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $department)) {

            return false;
        }
        if (strlen($department) > 10) {

            return false;
        }

        $this->departmentName = $department;
        return true;
    }

    public function getDepartment() {
        return $this->departmentName;
    }

    public function getAllDepartment() {

        try {
            $stmt = $this->db->connect()->query("SELECT * FROM department");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $ex) {
            echo 'Something Wrong';
        }
    }

    public function deleteDepartment($id) {
        try {
            $query = "DELETE FROM department WHERE departmentid = '" . $id . "' or departmentname = '" . $id . "';";
            $this->db->connect()->query($query);

            return "DEPARTMENT " . $id . " DELETED SUCCESSFULLY";
        } catch (Exception $ex) {

            return "DEPARTMENT " . $id . " IS NOT DELETED";
        }
    }

    public function insertDepartment($departmentname) {
        $departmentt = new Department();
        try {
            $insst = $this->db->connect()->query
                    ("INSERT INTO department (departmentid, departmentname) VALUES (NULL,'"
                    . $departmentname['department'] .
                    "');");
            return "DEPARTMENT" . $departmentname['department'] . " INSERTED SUCCESSFULLY";
        } catch (Exception $ex) {
            return "DEPARTMENT " . $departmentname['department'] . " EXISTS";
        }
    }
    public function findParamLDN($id) {

        $sth = $this->db->connect()->query
                ("SELECT * FROM paramsldn WHERE "
                . "labdesignatedno = '$id'");
        $datas = array();
        while ($row = $sth->fetch()) {
            $datas[] = $row;
        }
//        print_r($datas);
        return $datas;
    }

    public function findDepartmentById($id) {

        $sth = $this->db->connect()->query
                ("SELECT * FROM department WHERE "
                . "departmentid = '$id' OR departmentname ='$id'");
        $datas = array();
        while ($row = $sth->fetch()) {
            $datas[] = $row;
        }
//        print_r($datas);
        return $datas;
    }

}
