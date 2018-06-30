CREATE TABLE `lims`.`department` 
( `departmentid` INT NOT NULL AUTO_INCREMENT ,
 `departmentname` VARCHAR(20) NOT NULL , PRIMARY KEY (`departmentid`),
 UNIQUE (`departmentname`)) ENGINE = MyISAM;