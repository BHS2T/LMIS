<?php

include_once 'database.php';

class Sample {

    private $durationoftestingtime;
    private $samplename;
    private $parameter;
    private $amount;
    private $sampletype;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllSample() {

        $stmt = $this->db->connect()->query("SELECT * FROM sample");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function setTime($time) {
        if (!preg_match("/^[0-9]*$/", $time)) {

            return false;
        }
        if (strlen($time) > 10) {

            return false;
        }

        $this->durationoftestingtime = $time;
        return true;
    }

    public function getTime() {
        return $this->durationoftestingtime;
    }

    public function setSamplename($samplename) {
        if (!preg_match("/^[a-zA-Z]*$/", $samplename)) {

            return false;
        }
        if (strlen($samplename) >= 20) {
            return false;
        }
        $this->samplename = $samplename;
        return true;
    }

    public function getSamplename() {
        return $this->samplename;
    }

    public function setParameter($parameter) {
        if (!preg_match("/^[a-zA-Z]*$/", $parameter)) {

            return false;
        }
        if (strlen($parameter) >= 20) {
            return false;
        }
        $this->parameter = $parameter;
        return true;
    }

    public function getParameter() {
        return $this->parameter;
    }

    public function setAmount($amount) {
        if (!preg_match("/^[a-zA-Z]*$/", $amount)) {

            return false;
        }
        if (strlen($amount) >= 20) {
            return false;
        }
        $this->amount = $amount;
        return true;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function setSampletype($sampletype) {
        if (!preg_match("/^[a-zA-Z]*$/", $sampletype)) {

            return false;
        }
        if (strlen($sampletype) >= 20) {
            return false;
        }
        $this->sampletype = $sampletype;
        return true;
    }

    public function getSampleType() {
        return $this->sampletype;
    }

    public function deleteSample($id) {
        $query = "DELETE FROM sample WHERE sampleid = '" . $id . "';";
        $this->db->connect()->query($query);
    }

    public function updateSample($sample) {
        
    }

    public function insertSample($sample_result) {
        $sample = new Sample();
        $insst = $this->db->connect()->query
                ("INSERT INTO sample (sampleid,testtime ,samplename,amount,parameter, sampletype) VALUES (NULL,"
                . $sample_result['testtime'] .
                ",'" . $sample_result['samplename'] .
                "','" . $sample_result['amount'] .
                "','" . $sample_result['parameter'] .
                "','" . $sample_result['sampletype'] .
                "');");
    }

    public function findSampleBy($id) {

        $sth = $this->db->connect()->query
                ("SELECT * FROM sample WHERE "
                . "sampleid = '$id'");
        $datas = array();
        while ($row = $sth->fetch()) {
            $datas[] = $row;
        }
        return $datas;
    }

}
