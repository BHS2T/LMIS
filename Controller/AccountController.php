<?php

if (isset($_GET['logout'])) {
    session_destroy();
    header("location: ../View/index");
}
?>
<?php
include '../Model/Member.php';
class AccountManager extends Member {
    public function authenticate($username, $password) {
        $password = md5($password);
        $this->findUser($username, $password);
        $user_data = $this->findUser($username, $password);
        $count_user = count($user_data);
        echo $count_user;
        if ($count_user == 1) {
            session_start();
            $_SESSION['login'] = true;
            $_SESSION['userIDs'] = $user_data[0]['memberId'];
            $_SESSION['userType'] = $user_data[0]['typeofuser'];
            $_SESSION['userDepartment'] = $user_data[0]['department'];
            
          return true;
        } else {
            return false;
        }
    }

    public function logout() {
        session_destroy();
        header("location: ../View/homepageH");
    }

    public function searchMember($idorusername) {
        $search_result = $this->findUserById($idorusername);
        return $search_result;
    }

    public function resetPassword($idorusername) {
       
        $info = $this->findUserById($idorusername);
        if(empty($info)){
            echo '<h3 class = "inError">USER NOT FOUND</h3>';
        }else{
            $email_address= $info[0]['email'];
            echo $email_address; 
            $newpa = "sth";
            $newPassset['password'] = md5($newpa);;
            $newPassset['username'] = $info[0]['username'];
            $newPassset['memberid'] = $info[0]['memberid'];
            $this->updatePassword($newPassset);
            Mail($email_address, "Reset password", $newpa);
            header("location: ResetPassword.php");
//        return $newPassset;
    }}
    public function changePassword($pass){
        
    }

    public function enterCode($code) {
        if ($code == "sth") {
            header("location: changePassword.php");
        }
    }
    
    public function addMember($memberA) {
        
        $this->setMember($memberA['username']);
        $this->setFirstname($memberA['firstname']);
        $this->setLastName($memberA['lastname']);
        $this->setDateOfBirth($memberA['dob']);
        $this->setSex($memberA['sex']);
        $this->setPhoneNo($memberA['phone']);
        $this->setEmail($memberA['email']);
        $this->setAddress($memberA['address']);
        $this->setDepartment($memberA['dept']);
        $this->setTypeOfUser($memberA['tou']);
        $this->setPassword($this->generatePassword());
        $member_result = array();
        $member_result['member'] = $this->getMember();
        $member_result['firstname'] = $this->getFirstname();
        $member_result['lastname'] = $this->getLastName();
        $member_result['dob'] = $this->getDateOfBirth();
        $member_result['sex'] = $this->getSex();
        $member_result['phone'] = $this->getPhoneNo();
        $member_result['email'] = $this->getEmail();
        $member_result['address'] = $this->getAddress();
        $member_result['dept'] = $this->getDepartment();
        $member_result['tou'] = $this->getTypeOfUser();
        $member_result['pass'] = md5($this->getPassword());
        $re = $this->insertMember($member_result);   
        if($re['success']==true){
            echo $this->getPassword();
            mail($this->getEmail(), "LIMS confirmation", $this->getPassword());
            $re['pass'] = $this->getPassword();
        }
        return $re;
    }

    public function generatePassword() {
        $keyLen = 5;
        $str = "1234567890abcdefghijklmnopqrstuvwxyz";
        $randPass = substr(str_shuffle($str), 0, $keyLen);
        return $randPass;
    }
    public function viewMemberInDepartment($dept) {
        $all_users = $this->getUsersInDept($dept);
        return $all_users;
    }
    public function viewMember() {
        $all_users = $this->getAllUsers();
        return $all_users;
    }

    public function editUser($memberA) {
        $member_result = array();
        $member_result['userid'] = $memberA['userid'];
        
        if ($memberA['email'] != "") {
           $isValidInput = $this->setEmail($memberA['email']);
            $member_result['email'] = $this->getEmail();
        }
        if ($memberA['phone'] != "") {
           $isValidInput = $this->setPhoneNo($memberA['phone']);
            $member_result['phone'] = $this->getPhoneNo();
        }
        if ($memberA['address'] != "") {
           $isValidInput = $this->setAddress($memberA['address']);
            $member_result['address'] = $this->getAddress();
        }
        if($isValidInput){
        $this->updateMember($member_result);}
        
    }

}
