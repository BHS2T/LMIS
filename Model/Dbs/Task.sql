CREATE TABLE `lims`.`task` 
( `taskid` INT NOT NULL AUTO_INCREMENT ,
 `taskname` INT NOT NULL , 
 `userid` INT NOT NULL , 
 `sampleid` INT NOT NULL ,
 `labdesignatedno` VARCHAR(30) NOT NULL ,
 `status` ENUM('Waiting','In Progress','Assigned','Completed') NOT NULL ,
 `deadline` DATE NOT NULL , PRIMARY KEY (`taskid`)) 
 ENGINE = MyISAM; 