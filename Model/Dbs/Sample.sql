
use LIMS;
CREATE TABLE IF NOT EXISTS `Sample`
 ( `sampleid` INT NOT NULL AUTO_INCREMENT ,
 `testtime` INT NOT NULL ,
 `samplename` VARCHAR(20) NOT NULL ,
 `parameter` VARCHAR(20) NOT NULL , 
 `amount` VARCHAR(20) NOT NULL , 
 `sampleType` VARCHAR(20) NOT NULL , 
 
 PRIMARY KEY (`sampleid`)) ENGINE = MyISAM;
 
 
