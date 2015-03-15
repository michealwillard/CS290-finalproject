CREATE TABLE  `willardm-db`.`userAccounts` (
`id` INT( 11 ) NOT NULL ,
`username` VARCHAR( 255 ) NOT NULL ,
`password` VARCHAR( 255 ) NOT NULL ,
`firstname` VARCHAR( 255 ) NOT NULL ,
`lastname` VARCHAR( 255 ) NOT NULL ,
INDEX (  `id` ) ,
UNIQUE (
`username` ,
`password`
)
) ENGINE = INNODB

CREATE TABLE  `willardm-db`.`teamRoster` (
`id` INT NOT NULL AUTO_INCREMENT ,
`firstName` VARCHAR( 20 ) NOT NULL ,
`lastName` VARCHAR( 20 ) NOT NULL ,
`jerseyNum` INT NOT NULL ,
`age` INT NOT NULL ,
PRIMARY KEY (  `id` ) ,
INDEX (  `id` ) ,
UNIQUE (
`jerseyNum`
)
) ENGINE = INNODB

CREATE TABLE  `willardm-db`.`messageBoard` (
`id` INT NOT NULL AUTO_INCREMENT ,
`name` VARCHAR( 20 ) NOT NULL ,
`message` VARCHAR( 255 ) NOT NULL ,
`ts` TIMESTAMP NOT NULL ,
PRIMARY KEY (  `id` ) ,
INDEX (  `id` )
) ENGINE = INNODB

INSERT INTO events (ts,description) VALUES (CURRENT_TIMESTAMP,'disc full');

CREATE TABLE  `willardm-db`.`teamSchedule` (
`id` INT NOT NULL AUTO_INCREMENT ,
`type` VARCHAR( 25 ) NOT NULL ,
`opponent` VARCHAR( 25 ) NOT NULL ,
`date` DATE NOT NULL ,
`time` TIME NOT NULL ,
`location` VARCHAR( 255 ) NOT NULL ,
PRIMARY KEY (  `id` ) ,
INDEX (  `id` )
) ENGINE = INNODB
