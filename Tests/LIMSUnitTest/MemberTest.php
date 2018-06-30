<?php

include '../Model/Member.php';
include 'DbConnectionTest.php';
class MemberTest extends DatabaseTest {

    protected $object;
    
    public function setUp() {
        $this->object = new Member;
    }
 
    public function testGetAllUsers() {
       
        $get = $this->object-> getAllUsers();
        $expected = $this->createFlatXMLDataSet(dirname(__FILE__) . '/updateUser.xml');
        $this->assertEquals($expected, $this->object-> getAllUsers());
        
    }

    public function testSetMember() {
        //        $this->object->setMember("somebody");
        $this->assertTrue($this->object->setMember("somebody"));
        $this->assertFalse($this->object->setMember("som.76ebody"));
                
            }
    public function testGetMember() {
        
        $this->object->setMember('username88');
        $this->assertEquals($this->object->getMember(), 'username88');
     
    }

    public function testSetPassword() {
        $this->assertTrue($this->object->setPassword("somebody"));
        $this->assertFalse($this->object->setPassword("som.76ebofsfsdfsfdy"));
    }

    public function testGetPassword() {
        
        $this->object->setPassword('test123');
        $this->assertEquals($this->object->getPassword(), 'test123');
        
    }

    public function testSetFirstname() {
        $this->assertTrue($this->object->setFirstname("somebody"));
        $this->assertFalse($this->object->setFirstname("som.76ebody"));
    }

    public function testGetFirstname() {
        
        $this->object->setFirstname('FirstName');
        $this->assertEquals($this->object->getFirstname(), 'FirstName');
       
    }
    public function testSetLastName() {
        $this->assertTrue($this->object->setLastName("somebody"));
        $this->assertFalse($this->object->setLastName("som.76ebody"));
    }
    public function testGetLastName() {
        
        $this->object->setLastName('LastName');
        $this->assertEquals($this->object->getLastName(), 'LastName');
        
    }
    public function testSetDateOfBirth() {
        $this->assertTrue($this->object->setDateOfBirth('2017-3-3'));
        $this->assertFalse($this->object->setDateOfBirth("day-year"));
            
    }

    public function testGetDateOfBirth() {
        
        $this->object->setDateOfBirth('2018-10-10');
        $this->assertEquals($this->object->getDateOfBirth(), '2018-10-10');

    }

    public function testSetSex() {
        $this->assertTrue($this->object->setSex("Female"));
        $this->assertFalse($this->object->setSex("som.76ebody"));
    }

    public function testGetSex() {    
        $this->object->setSex('female');
        $this->assertEquals($this->object->getSex(), 'female');
        
    }

    public function testSetPhoneNo() {
        $this->assertTrue($this->object->setPhoneNo("0909090909"));
        $this->assertFalse($this->object->setPhoneNo("09090909090909"));
    }
    public function testGetPhoneNo() {
        
        $this->object->setPhoneNo('0abcd99999');
        $this->assertEquals($this->object->getPhoneNo(), '0abcd99999');
        
    }
    public function testSetEmail() {
        $this->assertTrue($this->object->setEmail("somebody@gmail.com"));
        $this->assertFalse($this->object->setEmail("som.76ebody"));
    }
    
    public function testGetEmail() {
        
        $this->object->setEmail('samrawitmulu88@sammm.ooo');
        $this->assertEquals($this->object->getEmail(), 'samrawitmulu88@sammm.ooo');
        
    }
    public function testSetAddress() {
        $this->assertTrue($this->object->setAddress("somebody"));
        $this->assertFalse($this->object->setAddress("som.76ebo,34fdfdy"));
    }
    public function testGetAddress() {
        
        $this->object->setAddress('gulelea');
        $this->assertEquals($this->object->getAddress(), 'gulelea');
        
    }
    public function testSetDepartment() {
        $this->assertTrue($this->object->setDepartment("somebody"));
        $this->assertFalse($this->object->setDepartment("address.address"));
    }
    
    public function testGetDepartment() {
        
        $this->object->setDepartment('software111');
        $this->assertEquals($this->object->getDepartment(), 'software111');
        
    }
    public function testSetTypeOfUser() {
        $this->assertTrue($this->object->setTypeOfUser("IT head"));
        $this->assertFalse($this->object->setTypeOfUser("other dep't"));
    }

    public function testGetTypeOfUser() {
        
        $this->object->setTypeOfUser('technicial');
        $this->assertEquals($this->object->getTypeOfUser(), 'technicial');
        
    }

    
    public function testDeleteUser() {
        
        $memberid = '23242557';
        $result = $this->object->deleteUser($memberid);
        $expected = NULL;
        $this->assertEquals($expected, $result);

    }
    
    
    public function testUpdatePassword() {
        
        $expectedPasswordset = array();
        $expectedPasswordset['password'] = 'updatedPassword';
        $expectedPasswordset['memberid'] = '1';
        $expectedPasswordset['username'] = 'username';
        $updatePassword = $this->object->updatePassword($expectedPasswordset);
        $this->assertEquals(md5($expectedPasswordset['password']), md5($updatePassword));
    }
    
    
    public function testInsertMember() {
        
        $member_result = array();
        $member_result['memberid'] = '1';
        $member_result['username'] = 'user88';
        $member_result['firstname'] = 'kirubel';
        $member_result['lastname'] = 'mewa';
        $member_result['dob'] = '1997-02-06';
        $member_result['sex'] = 'Male';
        $member_result['phone'] = '0923242554';
        $member_result['email'] = 'kiru88@gmail.com';
        $member_result['address'] = 'shromeda';
        $member_result['dept'] = 'software';
        $member_result['tou'] = 'Admin';
        $member_result['pass'] = 'kiru';
 
        $this->object->insertMember($member_result);
        $tableName = 'member';
        
        // Assuming there already exist one entry, 
        // then after inserting the above member -> assert the row count is 2
        $this->assertEquals(2, $this->getConnection()->getRowCount($tableName), "Inserting failed");
        
    }
    public function testUpdateMember(){
        
        $memberInfo = array();
        $memberInfo['email'] = 'updateduser@gmail.com';
        $memberInfo['address'] = 'updatedshromeda';
        $memberInfo['phone'] = '0923232353';
        $memberInfo['userid'] = '1';
        $this->object->updateMember($memberInfo);
        $xml_dataset = $this->createFlatXMLDataSet(dirname(__FILE__) . '/updateUser.xml');
        $this->assertDataSetsEqual($xml_dataset,$this->getConnection()->createDataSet(array('member')));
        
    }
   
    public function testFindUser() {
        
        $usernameM = 'updateduser@gmail.com';
        $passwordM = 'passthis';
        $findUser = $this->object->findUser($usernameM, $passwordM);
        $expected = $this->createFlatXmlDataSet(dirname(__FILE__) . '/fetchUser.xml');
        $this->assertDataSetsEqual($expected, $this->getConnection()->$findUser);
        
    }

   
    public function testFindUserById() {
        
        $memberid = '1';
        $fetchUser = $this->object->findUserById($memberid);
        $expected = $this->createFlatXmlDataSet(dirname(__FILE__) . '/fetchUser.xml');
        $this->assertDataSetsEqual($expected, $this->getConnection()->$fetchUser);
       
    }

}
