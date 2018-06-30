
use LIMS;
CREATE TABLE IF NOT EXISTS `Result`
 ( `resultId` INT NOT NULL AUTO_INCREMENT ,
 `samplename` VARCHAR(20) NOT NULL ,
 `validationStatus` VARCHAR(20) NOT NULL ,
 `Parameter` VARCHAR(20) NOT NULL , 
 `result` VARCHAR(20) NOT NULL , 
 `resultdescription` TEXT NOT NULL , 
 `labdesignatedno` VARCHAR(30) NOT NULL ,
 `StandardReference` VARCHAR(10) NOT NULL , 
  
 PRIMARY KEY (`resultId`)) ENGINE = MyISAM;
 
 
