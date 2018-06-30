<?php

class DatabaseTest extends PHPUnit_Extensions_Database_TestCase {

    protected $object;
    private $conn = null;

    public function setUp() {
        $this->object = $this->testConnect();
    }
   
    // implements PHPUnit_Extensions_Database_DataSet_IDataSet
    public function getConnection()
    {
        
       if ($this->conn == null) {
           try {
                $pdo = new PDO('mysql:host=localhost;dbname=lims', 'root', '');
                $this->conn = $this->createDefaultDBConnection($pdo, 'lims');
               } catch (PDOException $e) {
                   echo $e->getMessage();
            }
        }
        return $this->conn;
    }

    public function getDataSet()
    {        
        return $this->createFlatXMLDataSet(dirname(__FILE__).'/expectedUser.xml');
    }

}