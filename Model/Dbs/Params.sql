CREATE TABLE `lims`.`params` 
( `sampleid` INT NOT NULL,
 `parameter` VARCHAR(20) NOT NULL , PRIMARY KEY (`sampleid`,`parameter`)
 ) ENGINE = MyISAM;