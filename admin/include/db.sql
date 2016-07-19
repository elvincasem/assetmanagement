/*
SQLyog Ultimate - MySQL GUI v8.2 
MySQL - 5.5.34 : Database - supply_office
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `audit` */

DROP TABLE IF EXISTS `audit`;

CREATE TABLE `audit` (
  `auditid` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NULL DEFAULT NULL,
  `sample` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`auditid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `audit` */

insert  into `audit`(`auditid`,`timestamp`,`sample`) values (1,NULL,'sadasd'),(2,NULL,'ddddd');

/*Table structure for table `employee` */

DROP TABLE IF EXISTS `employee`;

CREATE TABLE `employee` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `empNo` varchar(10) NOT NULL DEFAULT 'NONE',
  `lname` varchar(80) NOT NULL,
  `fname` varchar(80) NOT NULL,
  `mname` varchar(80) NOT NULL,
  `ename` varbinary(100) DEFAULT NULL,
  `designation` varchar(100) NOT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `employee` */

insert  into `employee`(`eid`,`empNo`,`lname`,`fname`,`mname`,`ename`,`designation`) values (2,'3065','Casem','Elvin','Estoque',NULL,'Instructor I'),(4,'NONE','Buenio','Nympha','N.','','Chief Administrative Officer'),(5,'NONE','Galera Jr.','Rogelio','T',NULL,'ES II / Supply Officer Designate'),(7,'NONE','Diego','Cherrie Melanie','A.','Ed. D.','Director IV'),(9,'10001','Cabanban','Christianne Lynnette','G','','Education Supervisor II');

/*Table structure for table `inventory` */

DROP TABLE IF EXISTS `inventory`;

CREATE TABLE `inventory` (
  `inventoryid` int(11) NOT NULL AUTO_INCREMENT,
  `itemNo` int(11) DEFAULT NULL,
  `unit` varchar(20) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`inventoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `inventory` */

insert  into `inventory`(`inventoryid`,`itemNo`,`unit`,`qty`,`time_stamp`) values (19,30,'PC',50,'2016-07-11 07:43:34'),(20,3,'PC',5,'2016-07-11 07:43:59');

/*Table structure for table `items` */

DROP TABLE IF EXISTS `items`;

CREATE TABLE `items` (
  `itemNo` bigint(20) NOT NULL AUTO_INCREMENT,
  `description` varchar(200) NOT NULL,
  `category` varchar(100) NOT NULL DEFAULT 'Equipment',
  `unit` varchar(20) NOT NULL DEFAULT 'PC',
  `pc_per_unit` int(11) DEFAULT NULL,
  `unitCost` double(10,2) NOT NULL,
  `inventory_qty` int(11) DEFAULT '0',
  `supplierID` int(11) DEFAULT '0',
  PRIMARY KEY (`itemNo`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

/*Data for the table `items` */

insert  into `items`(`itemNo`,`description`,`category`,`unit`,`pc_per_unit`,`unitCost`,`inventory_qty`,`supplierID`) values (2,'Red Sign Pen','Office Supply','PC',1,15.00,0,0),(3,'21\" Philips LCD Monitor','Equipment','PC',1,15.50,5,3),(4,'A4tech Keyboard','Equipment','PC',1,250.75,0,0),(18,'Certificate Holder','Office Supply','PC',1,100.50,0,0),(19,'Parchment Paper','Office Supply','PC',1,50.00,0,0),(24,'Pencils','Office Supply','BOX',12,25.00,0,0),(26,'Coupon Bond Long','Office Supply','REAM',500,180.00,0,0),(27,'Ballpen','Equipment','PC',1,10.00,0,2),(30,'Eraser','Office Supply','PC',1,25.00,100,1),(31,'Coupon Bond Short','Office Supply','REAM',1,150.00,0,1);

/*Table structure for table `offices` */

DROP TABLE IF EXISTS `offices`;

CREATE TABLE `offices` (
  `transid` bigint(20) NOT NULL AUTO_INCREMENT,
  `code` varchar(15) DEFAULT NULL,
  `office` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`transid`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

/*Data for the table `offices` */

insert  into `offices`(`transid`,`code`,`office`) values (1,'CAS','COLLEGE OF ARTS AND SCIENCES'),(2,'CE','COLLEGE OF EDUCATION'),(3,'CCS','COLLEGE OF COMPUTER SCIENCE'),(4,'CGS','COLLEGE OF GRADUATE STUDIES'),(5,'IA','INSTITUTE OF AGRICULTURE'),(6,'IF','INSTITUTE OF FISHERIES'),(7,'CHANC','CHANCELLOR'),(8,'PRES','PRESIDENT'),(10,'AO','ADMINISTRATIVE OFFICE'),(11,'AUX','AUXILLARY'),(13,'BAO','BUSINESS AFFAIRS OFFICE'),(14,'COA','COMMISSION ON AUDIT'),(15,'CUL','CULTURAL'),(16,'DORM','DORMITORY'),(17,'FIN','FINANCE'),(18,'HI','HEAD OF INSTRUCTION'),(19,'HRMO','HUMAN RESOURCE MANAGEMENT OFFICE'),(20,'LIB','LIBRARY'),(21,'MIS','MANAGEMENT INFORMATION SYSTEM'),(22,'MED','MEDICAL/DENTAL'),(23,'MPOOL','MOTORPOOL'),(24,'NSTP','NATIONAL SERVICE TRAINING PROGRAM'),(25,'OTH','OTHERS'),(26,'PCC','PHILIPPINE CARABAO CENTER'),(27,'PLAN','PLANNING/INFRA'),(28,'RO','RECORDS OFFICE'),(29,'REG','REGISTRAR'),(30,'R&E','RESEARCH AND EXTENSION'),(31,'SEC','SECURITY OFFICE'),(32,'SPORT','SPORTS'),(33,'SAS','STUDENT AFFAIRS SERVICES'),(34,'SUPPLY','SUPPLY OFFICE'),(36,'ICH','ICHAMS'),(39,'NTA','NON-TEACHING ASSOCIATION'),(40,'FAD','FACULTY ASSOCIATION OF DMMMSU'),(44,'OUS','OPEN UNIVERSITY SYSTEM'),(46,'BAC','BIDS AND AWARDS COMMITTEE'),(53,'BOT','BOTIKA'),(54,'ALUM','DMMMSU ALUMNI ASSOCIATION'),(56,'PUB','SCHOOL PUBLICATION'),(65,'EXT','EXTENSION'),(81,'DZAG','DZAG RADIO STATION');

/*Table structure for table `pr_list` */

DROP TABLE IF EXISTS `pr_list`;

CREATE TABLE `pr_list` (
  `transID` bigint(20) NOT NULL AUTO_INCREMENT,
  `prNo` varchar(20) NOT NULL,
  `department` varchar(80) NOT NULL,
  `section` varchar(80) NOT NULL,
  `prDate` date NOT NULL,
  `purpose` varchar(200) NOT NULL,
  `requestedbyeid` varchar(50) DEFAULT NULL,
  `requestedBy` varchar(80) NOT NULL,
  `designation` varchar(35) NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`transID`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;

/*Data for the table `pr_list` */

insert  into `pr_list`(`transID`,`prNo`,`department`,`section`,`prDate`,`purpose`,`requestedbyeid`,`requestedBy`,`designation`,`status`) values (75,'2014-27','DMMMSU-SLUC','COLLEGE OF ARTS AND SCIENCES','2015-04-06','asd',NULL,'Jerome Petonio Songcuan','MIS Head','PENDING'),(76,'2015-28','DMMMSU-SLUC','COLLEGE OF COMPUTER SCIENCE','2015-04-06','asd',NULL,'Elvin Estoque Casem','Instructor I','PENDING'),(78,'2015-30','DMMMSU-SLUC','COLLEGE OF EDUCATION','2015-04-06','asd',NULL,'Jerome Petonio Songcuan','MIS Head','PENDING'),(80,'2015-32','DMMMSU-SLUC','COLLEGE OF COMPUTER SCIENCE','2015-04-06','asf',NULL,'Elvin Estoque Casem','Instructor I','PENDING'),(83,'2015-35','DMMMSU-SLUC','COLLEGE OF GRADUATE STUDIES','2015-04-06','asd',NULL,'Elvin Estoque Casem','Instructor I','PENDING'),(87,'2015-39','DMMMSU-SLUC','COLLEGE OF COMPUTER SCIENCE','2015-04-06','asd',NULL,'Elvin Estoque Casem','Instructor I','PENDING'),(88,'2016-40','MIS','MIS','2016-05-16','for office use',NULL,'','',''),(90,'2016-41','tttt','rrrr','2016-05-16','sasdfa',NULL,'','',''),(91,'2016-42','sdfsd','fsdf','2016-07-10','dfsdf',NULL,'','',''),(92,'2016-43','sdsd','sdsd','2016-07-12','sdsd',NULL,'','','');

/*Table structure for table `suppliers` */

DROP TABLE IF EXISTS `suppliers`;

CREATE TABLE `suppliers` (
  `supplierID` bigint(20) NOT NULL AUTO_INCREMENT,
  `supName` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL DEFAULT 'NONE',
  `contactNo` varchar(30) NOT NULL DEFAULT 'NONE',
  `TIN` varchar(20) NOT NULL DEFAULT 'NONE',
  PRIMARY KEY (`supplierID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `suppliers` */

insert  into `suppliers`(`supplierID`,`supName`,`address`,`contactNo`,`TIN`) values (1,'Morning Star General Merchandise','Governor Ortigas, San Fernando, 2500 La Union, Philippine','+63 72 242 5115','NONE'),(2,'National Bookstore','Manna Mall, Pagdaraoan Biday Road, San Fernando, La Union','NONE','NONE'),(3,'PC 4 Me','San Fernando City La Union','NONE','NONE'),(4,'SKM','Sevilla San Fernando City, La Union','1234567','NONE');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `userType` varchar(10) NOT NULL DEFAULT 'staff',
  `status` varchar(1) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`userID`,`userName`,`password`,`userType`,`status`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3','admin','1'),(5,'lynnette','5f4dcc3b5aa765d61d8327deb882cf99','admin','1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
