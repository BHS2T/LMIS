<?php

include_once 'database.php';

class Task {

    private $taskId;
    private $taskName;
    private $userId;
    private $sampleId;
    private $labdesignatednumber;
    private $status;
    private $deadline;

    public function __construct() {
        $this->db = new Database();
    }

    public function setTaskName($taskname) {
        if (!preg_match("/^[a-zA-Z]*$/", $taskname)) {

            return false;
        }
        if (strlen($taskname) > 10) {

            return false;
        }

        $this->taskName = $taskname;
        return true;
    }

    public function getTaskName() {
        return $this->taskName;
    }

    public function getUserId() {
        return $this->password;
    }

    public function getSampleId() {
        return $this->sampleId;
    }

    public function setSampleId($sampleid) {
        $this->sampleId = $sampleid;
    }

    public function getLDN() {
        return $this->labdesignatednumber;
    }

    public function setLDN($ldn) {
        $this->labdesignatednumber = $ldn;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        if ($status == 'assigned') {
            $this->status = $status;
        }
        if ($status == 'waiting') {
            $this->status = $status;
        }
        if ($status == 'inprogress') {
            $this->status = $status;
        }
        if ($status == 'completed') {
            $this->status = $status;
        }
    }

    public function setDeadline($deadline) {
        $this->deadline = $deadline;
    }

    public function getDeadline() {
        return $this->deadline;
    }

    public function findParamLDN2($ldn) {
        $sth = $this->db->connect()->query
                ("SELECT * FROM paramsldn WHERE "
                . "labDesignatedNo= '$ldn'");
        $datas = array();
        while ($row = $sth->fetch()) {
            $datas[] = $row;
        }
//        print_r($datas);
        return $datas;
    }

    public function insertTask($task_result) {
        try {

            $this->db->connect()->query
                    ("INSERT INTO task (taskid , userid, taskname,samplename,labdesignatedno,status, deadline) VALUES (NULL,"
                    . $task_result['userid'] .
                    ",'" . $task_result['taskname'] .
                    "','" . $task_result['sampleName'] .
                    "','" . $task_result['labDesignatedNo'] .
                    "','" . $task_result['status'] .
                    "','" . $task_result['deadline'] .
                    "');");
        } catch (Exception $ex) {
            echo $ex;
        }
    }
    public function getCheckOut($ldn){
                $sth = $this->db->connect()->query
                ("SELECT checkOutNo FROM sampletotest WHERE "
                . "labDesignatedNo= '$ldn'");
        $datas = array();
        while ($row = $sth->fetch()) {
            $datas[] = $row;
        }
//        print_r($datas);
        return $datas;
    }



    public function findSTTByLDN($ldn) {
        $spl = $this->db->connect()->query
                ("SELECT * FROM sampletotest WHERE "
                . "labDesignatedNo = '$ldn'");
        $info = array();
        while ($row = $spl->fetch()) {
            $info[] = $row;
        }
//        print_r($info);
        return $info;
    }

    public function completeTaskOfLM($department, $ldn) {
        $managerIDs = $this->getManager($department, "Lab manager");
        for ($i = 0; $i < count($managerIDs); $i++) {

            $queryw = "DELETE FROM task WHERE userId = '" . $managerIDs[$i][0] . "' AND labDesignatedNo = '" . $ldn . "';";
            $this->db->connect()->query($queryw);
        }
    }

    public function getManager($dept, $type) {
        $st = $this->db->connect()->query(
                "SELECT memberId FROM member WHERE department = '$dept'and typeofuser = '$type'");
        while ($row = $st->fetch()) {
            $datas[] = $row;
        }
//        print_r($datas);
        return $datas;
    }
    public function getTaskByLDNUI($userId,$ldn){
      
        $sth = $this->db->connect()->query
                ("SELECT * FROM task WHERE "
                . "userid = '$userId' AND labDesignatedNo ='$ldn'");
        $datas = array();
        while ($row = $sth->fetch()) {
            $datas[] = $row;
        }
//        print_r($datas);
        return $datas;  
    }
    public function updateStatus($status) {
        $query = "UPDATE task SET status='" . $status['state'] . "' WHERE taskid=" . $status['taskid'] . "';";
        $this->db->connect()->query($query);
    }

    public function updateStatus1($labDesignatedNo) {
        $query = "UPDATE task SET status='Assigned' where labDesignatedNo='" . $labDesignatedNo . "'";
        $result = $this->db->connect()->query($query);
    }

    public function updateStatus2($labDesignatedNo) {
        $query = "UPDATE task SET status='In Progress',taskName='Feed Result' where labDesignatedNo='$labDesignatedNo'";
        $result = $this->db->connect()->query($query);
    }

    public function getMyTask($id) {

        $sth = $this->db->connect()->query
                ("SELECT * FROM task WHERE "
                . "userid = '$id'");
        $datas = array();
        while ($row = $sth->fetch()) {
            $datas[] = $row;
        }
//        print_r($datas);
        return $datas;
    }

    public function setUserId($userid) {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $userid)) {

            return false;
        }
        if (strlen($userid) >= 20) {
            return false;
        }
        $this->userId = $userid;
        return true;
    }

}

?>