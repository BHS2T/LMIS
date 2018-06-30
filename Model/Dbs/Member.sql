
use LIMS;
CREATE TABLE IF NOT EXISTS `Member`
 ( `memberid` INT NOT NULL AUTO_INCREMENT ,
 `username` VARCHAR(20) NOT NULL ,
 `firstname` VARCHAR(20) NOT NULL ,
 `lastname` VARCHAR(20) NOT NULL , 
 `dateofbirth` DATE NOT NULL , 
 `sex` ENUM('Female','Male') NOT NULL , 
 `phone` VARCHAR(15) NOT NULL ,
 `email` TEXT NOT NULL , 
 `address` TEXT NOT NULL ,
 `department` VARCHAR(20) NOT NULL ,
 `typeofuser` ENUM('Lab manager','IT head','Lab technician','Lab organizer','Admin') NOT NULL ,
 `password` TEXT NOT NULL , 
 PRIMARY KEY (`memberid`)) ENGINE = MyISAM;
 
 
