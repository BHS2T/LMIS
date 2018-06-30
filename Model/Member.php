<?php

include_once 'database.php';

class Member {

    private $memberId;
    private $password;
    private $firstName;
    private $lastName;
    private $dateOfBirth;
    private $sex;
    private $phoneNo;
    private $email;
    private $department;
    private $address;
    private $typeOfUser;
    private $username;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllUsers() {

        try {
            $stmt = $this->db->connect()->query("SELECT * FROM member");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $ex) {
            echo 'something wrong';
        }
    }

    public function getUsersInDept($dept) {
        $stmt = $this->db->connect()->query("SELECT * FROM member where department = '" . $dept . "';");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function setMember($username) {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {

            return false;
        }
        if (strlen($username) > 20) {

            return false;
        }

        $this->username = $username;
        return true;
    }

    public function getMember() {
        return $this->username;
    }

    //passowrd
    public function setPassword($newPassword) {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $newPassword)) {

            return false;
        }
        if (strlen($newPassword) >= 20) {
            return false;
        }
        $this->password = $newPassword;
        return true;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getMemberId() {
        return $this->memberId;
    }

    //firstname
    public function setFirstname($firstName) {
        if (!preg_match("/^[a-zA-Z]*$/", $firstName)) {
            return false;
        }
        $this->firstName = $firstName;
        return true;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    //lastname
    public function setLastName($lastName) {
        if (!preg_match("/^[a-zA-Z]*$/", $lastName)) {
            return false;
        }
        $this->lastName = $lastName;
        return true;
    }

    public function getLastName() {
        return $this->lastName;
    }

    //date of birth
    public function setDateOfBirth($dateOfBirth) {
//        $test_date = '2017/03/03';
//        $date =  DateTime::createFromFormat('y/m/d', $test_date);
//        $date_err = DateTime::getLastErrors();
//        if(DateTime::createFromFormat('y/m/d', $test_date) == false){
//            return false;
//        }
//        $datearray = explode('/', $dateOfBirth);
//        if(count($datearray)<3){
//            return false;
//        }
//       else if(checkdate($datearray[1], $datearray[2], $datearray[0])){
//           return true;
//       }
        $this->dateOfBirth = $dateOfBirth;

        return true;
//        return false;
    }

    public function getDateOfBirth() {
        return $this->dateOfBirth;
    }

    //sex
    public function setSex($sex) {

        if (!preg_match("/^[a-zA-Z]*$/", $sex)) {

            return false;
        }

        if (strlen($sex) >= 7) {
            return false;
        }
        $this->sex = $sex;
        return true;
    }

    public function getSex() {
        return $this->sex;
    }

    //phoneNo
    public function setPhoneNo($phoneNo) {

        if (!preg_match("/[^0-9]/", $phoneNo) && strlen($phoneNo) != 10) {
            return false;
        }
        $this->phoneNo = $phoneNo;
        return true;
    }

    public function getPhoneNo() {
        return $this->phoneNo;
    }

    //email
    public function setEmail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        $this->email = $email;
        return true;
    }

    public function getEmail() {
        return $this->email;
    }

    //address
    public function setAddress($address) {
        if (!preg_match("/^[a-zA-Z0-9,]*$/", $address)) {

            return false;
        }
        if (strlen($address) >= 20) {
            return false;
        }
        $this->address = $address;

        return true;
    }

    public function getAddress() {
        return $this->address;
    }

    //department
    public function setDepartment($department) {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $department)) {

            return false;
        }

        if (strlen($department) >= 20) {
            return false;
        }
        $this->department = $department;
        return true;
    }

    public function getDepartment() {
        return $this->department;
    }

    //type of user
    public function setTypeOfUser($typeOfUser) {
        if (!preg_match("/^[a-zA-Z ]*$/", $typeOfUser)) {

            return false;
        }

        if (strlen($typeOfUser) >= 20) {
            return false;
        }
        $this->typeOfUser = $typeOfUser;
        return true;
    }

    public function getTypeOfUser() {
        return $this->typeOfUser;
    }

    public function deleteUser($id) {
        $queryw = "DELETE FROM member WHERE memberid = '" . $id . "';";
//        echo $queryw;
        $this->db->connect()->query($queryw);
    }

    public function updateMember($memberInfo) {
        $query = "UPDATE member SET email='" . $memberInfo['email'] . "',address='" . $memberInfo['address'] . "' ,phone ='" . $memberInfo['phone'] . "'  where memberid=" . $memberInfo['userid'] . ";";
        $this->db->connect()->query($query);
    }

    public function updatePassword($newpasswordset) {
        $query = "UPDATE member SET password='" . $newpasswordset['password'] . "' WHERE memberid=" . $newpasswordset['memberid'] . " OR username='" . $newpasswordset['username'] . "';";
        $this->db->connect()->query($query);
    }

    public function insertMember($member_result) {
        $member = new Member();
        $retur = array();
        try {

            $insst = $this->db->connect()->query
                    ("INSERT INTO member (memberid, username,firstname,lastname,dateofbirth, sex, phone, email, address, department, typeofuser, password) VALUES (NULL,'"

//                . $member->getMemberId() .
                    . $member_result['member'] .
                    "','" . $member_result['firstname'] .
                    "','" . $member_result['lastname'] .
                    "','" . $member_result['dob'] .
                    "','" . $member_result['sex'] .
                    "','" . $member_result['phone'] .
                    "','" . $member_result['email'] .
                    "','" . $member_result['address'] .
                    "','" . $member_result['dept'] .
                    "','" . $member_result['tou'] .
                    "','" . $member_result['pass'] .
                    "');");
            $retur['emails'] = $member_result['email'];
            $retur['success'] = true;
        } catch (Exception $ex) {
            $retur['success'] = false;
        }
        return $retur;
    }

    public function findUser($usernameM, $passwordM) {

        $sth = $this->db->connect()->query
                ("SELECT memberId,userName,typeofuser,department FROM member WHERE "
                . "userName = '$usernameM' and password = '$passwordM'");
        $datas = array();
        while ($row = $sth->fetch()) {
            $datas[] = $row;
        }
//        print_r($datas);
        return $datas;
    }

    public function findUserById($id) {

        $sth = $this->db->connect()->query
                ("SELECT * FROM member WHERE "
                . "memberid = '$id' or username = '$id'");
        $datas = array();
        while ($row = $sth->fetch()) {
            $datas[] = $row;
        }
//        print_r($datas);
        return $datas;
    }

}