
use LIMS;
CREATE TABLE IF NOT EXISTS `sampletotest`
 ( `customerid` INT NOT NULL ,
 `sampleNameToBeTested` VARCHAR(20) NOT NULL ,
 `standardReferencesToBeTested` VARCHAR(20) NOT NULL ,
 `checkOutNo` VARCHAR(30) NOT NULL , 
 `labDesignatedNo` VARCHAR(30) NOT NULL , 
 `typeOfSampleToBeTested` VARCHAR(20) NOT NULL , 
 `amountToBeTested` VARCHAR(15) NOT NULL ,
 `department` VARCHAR(20) NOT NULL , 
 `duedate` DATE NOT NULL ,
  PRIMARY KEY (`labDesignatedNo`)) ENGINE = MyISAM;
 
 
