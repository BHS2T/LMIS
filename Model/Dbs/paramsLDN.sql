
 CREATE TABLE `lims`.`paramsLDN` 
( `labdesignatedno` INT NOT NULL,
 `parameter` VARCHAR(15) NOT NULL , PRIMARY KEY (`labdesignatedno`,`parameter`)
 ) ENGINE = MyISAM;