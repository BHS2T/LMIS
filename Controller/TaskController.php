<?php

include '../Model/Task.php';

class TaskController extends Task {

    protected $status;
    protected $taskName;
    protected $labDesignatedNo;

    public function startTask($labDesignatedNo) {

        return $this->updateStatus1($labDesignatedNo);
    }

    public function submitTask($labDesignatedNo) {

        return $this->updateStatus2($labDesignatedNo);
    }

    //add task to lab managers

    public function addTaskTLM($sampleToTest_list, $taskname, $taskstatus) {

        $department = $sampleToTest_list['department'];
        $useridA = $this->getManager($department, "Lab manager");
        for ($i = 0; $i < count($useridA); $i++) {
//            echo $useridA[$i][0];
            $task_result['department'] = $sampleToTest_list['department'];
            $task_result['userid'] = $useridA[$i][0];
            $task_result['taskname'] = $taskname;
            $task_result['sampleName'] = $sampleToTest_list['sampleName'];
            $task_result['labDesignatedNo'] = $sampleToTest_list['labDesignatedNo'];
            $task_result['status'] = $taskstatus;
            $task_result['deadline'] = $sampleToTest_list['duedate'];
//        print_r($task_result);
            $this->insertTask($task_result);
        }
    }

    public function addTask($sampleToTest_list) {
//        echo 'got it';
        $userType = $sampleToTest_list['userType'];
        $department = $sampleToTest_list['department'];
        $useridA = $sampleToTest_list['userIds'];
//        print_r($useridA);
        for ($i = 0; $i < count($useridA); $i++) {
//            echo $useridA[$i][0];
            echo 'here too';
            $task_result['department'] = $sampleToTest_list['department'];
            $task_result['userid'] = $useridA[$i];
            $task_result['taskname'] = "Check Out";
            $task_result['sampleName'] = $sampleToTest_list['sampleName'];
            $task_result['labDesignatedNo'] = $sampleToTest_list['labDesignatedNo'];
            $task_result['status'] = "Assigned";
            $task_result['deadline'] = $sampleToTest_list['duedate'];
            $task_result['checkOutNo'] = $sampleToTest_list['checkOutNo'];
            $task_result['standardReference'] = $sampleToTest_list['standardReference'];
            $task_result['amountToBeTested'] = $sampleToTest_list['amountToBeTested'];
            $task_result['sampleType'] = $sampleToTest_list['sampleType'];
            $task_result['customerId'] = $sampleToTest_list['customerId'];

//        print_r($task_result);
            $this->insertTask($task_result);
            $this->updateStatus1($sampleToTest_list['labDesignatedNo']);
            $this->completeTaskOfLM($task_result['department'], $task_result['labDesignatedNo']);
            header("location: ViewTask.php");
        }
        $this->insertSTT($task_result);
    }

    public function viewTaskP($userId, $ldn) {

        $all_task = $this->getTaskByLDNUI($userId, $ldn);

        return $all_task;
    }

    public function getSTTByLDN($ldn) {

        $stt_info = $this->findSTTByLDN($ldn);
        return $stt_info;
    }

    public function getParamByLDN($ldn) {

        return $this->findParamLDN2($ldn);
    }

    public function viewTask($userId) {

        $all_task = $this->getMyTask($userId);

        return $all_task;
    }

    public function searchTask($userid, $ldn) {
        return $this->getTaskByLDNUI($userid, $ldn);
    }

    public function compareCheckout($chno, $ldn) {

//       echo 'here';
        $chechout = $this->getCheckOut($ldn);
        if ($chechout[0][0] != $chno) {
            return false;
        } else {

            $this->updateStatus2($ldn);
            return true;
        }
    }

}
