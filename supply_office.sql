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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

/*Data for the table `employee` */

insert  into `employee`(`eid`,`empNo`,`lname`,`fname`,`mname`,`ename`,`designation`) values (12,'','ANCHETA-DIEGO','CHERRIE MELANIE','','','Director IV'),(13,'','CASIPIT','MA. GERALDINE','F','','Supervising Education Program Specialist'),(14,'','BUENIO','NYMPHA','N','','Chief Administrative Officer'),(15,'','ADQUILEN','EVELYN','C','','Administrative Officer III'),(16,'','AGCAOILI','REYNALDO','D','','Education Supervisor II'),(17,'','AGLUGUB','RODOLFO','E','','Education Supervisor II'),(18,'','ANCHETA','ARNOLD','V','','Education Supervisor II'),(19,'','BOSE','DANILO','B','','Education Supervisor II'),(20,'','CABANBAN','CHRISTIANNE LYNNETTE','G','','Education Supervisor II'),(21,'','CANTOR','MARK ANTHONY','L','','Administrative Aide VI'),(22,'','CHAN','CATHERINE','C','','Education Supervisor II'),(23,'','DOLORES','ANGELICA','Q','','Education Supervisor II'),(24,'','DULUEÃ‘A','PERFECTO','A','','Administrative Aide VI'),(25,'','FERRER','ANGELA','F','','Education Program Specialist II'),(26,'','GALERA JR.','ROGELIO','T','','Education Supervisor II'),(27,'','INIGO','KRIZZANE','C','','Administrative Assistant III'),(28,'','MENDOZA','MARVIN','I','','Administrative Aide IV'),(29,'','MINA','MYRELLE FAITH','D','','Education Supervisor II'),(30,'','MOLINA','FLORANTE','F','','Administrative Aide III'),(31,'','MONTEMAYOR','DIANNE JOYCE','B','','Administrative Officer III'),(32,'','OLI','CORNELIO','T','','Administrative Aide III'),(33,'','QUEZON','MAYROSE','L','','Education Supervisor II'),(34,'','NARCEDA','ARGIELYN','','','Job Order'),(35,'','PASCUA','CHARLES VINCENT','','','Job Order'),(36,'','TACTACAN','CIELITO','','','Job Order'),(37,'','VALENCIA','NASTASHA','A','','Job Order'),(38,'','YAMSON','VIC','','','Guard'),(39,'','OLPINDO','AUDIE','','','Guard'),(40,'','ESCAÃ‘O','MELODY','G','','Job Order'),(41,'','ANCHETA','MELQUIDES','','','PTS III'),(42,'','JONARD\r\n','GAVO\r\n','','','OJT'),(43,'','FRANCIA\r\n','POLIDO\r\n','','','OJT'),(44,'','CASEM','ELVIN','E','','PTS III'),(45,'','TAGUIBA','TEOTICIA','C','DR.','');

/*Table structure for table `equipments` */

DROP TABLE IF EXISTS `equipments`;

CREATE TABLE `equipments` (
  `equipNo` bigint(20) NOT NULL AUTO_INCREMENT,
  `propertyNo` varchar(100) NOT NULL,
  `article` varchar(100) DEFAULT NULL,
  `particulars` text NOT NULL,
  `dateacquired` date NOT NULL DEFAULT '0000-00-00',
  `totalcost` double(10,2) NOT NULL DEFAULT '0.00',
  `eid` int(11) DEFAULT '0',
  `classification` varchar(200) DEFAULT NULL,
  `accountcode` varchar(100) DEFAULT NULL,
  `service` varchar(100) DEFAULT NULL,
  `whereabout` text,
  `remarks` text,
  `inventorytag` varchar(100) DEFAULT NULL,
  `supplierID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`equipNo`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

/*Data for the table `equipments` */

insert  into `equipments`(`equipNo`,`propertyNo`,`article`,`particulars`,`dateacquired`,`totalcost`,`eid`,`classification`,`accountcode`,`service`,`whereabout`,`remarks`,`inventorytag`,`supplierID`) values (1,'13-007','Netbook','HP Pavilion 14 B132TX Touch Core 13-3227 - JCP3240RQK','2014-01-01',29899.00,18,'IT Equipment and Software','223','Servicable',' Arnold V. Ancheta ','','',0),(2,'13-008','Netbook','HP Pavilion DV - 6 SN CH1420V','2014-01-01',29899.00,28,'IT Equipment and Software','223','Servicable','','Test Update','',4),(3,'13-009','Laptop','Acer Aspire (from Dr. Abuan) 47436 SN LXRL010011240ED342000','2012-01-01',0.00,28,'IT Equipment and Software','223','Servicable','','','',0),(4,'13-010','Laptop','Lenovo G480 SN WB07587307','2012-01-01',0.00,12,'IT Equipment and Software','223','Servicable',' Dr. Cherrie Melanie A. Diego ','','',0),(5,'13-011','Netbook','HP Pavilion 14 B132TX Touch Core 13-3227 - SN 5CD3151XGF','2014-01-01',29899.00,13,'IT Equipment and Software','223','Servicable','','','',0),(6,'13-011','Laptop','Lenovo Ideapad S680 with charger, SN WB0052106','2012-01-01',0.00,14,'IT Equipment and Software','223','Servicable','',' Nympha N. Buenio (transferred from Dolores Apostol) ','',0),(7,'13-012','Netbook','HP Pavilion 14 B132TX Touch Core 13-3227, SN 5CD3151X8Q','2014-01-01',29899.00,0,'IT Equipment and Software','223','Servicable','',' From Teoticia C. Taguibao ','',0),(8,'13-012','Netbook','ee-PC','2011-01-01',0.00,19,'IT Equipment and Software','223','Servicable','','','',0),(9,'13-013','Laptop','Lenovo Ideapad DAD460 Core i3 SN WB00153139','2011-01-01',30000.00,28,'IT Equipment and Software','223','Servicable','','','',0),(10,'13-014','Netbook','Gateway, white notebook, SN:NUWZVSP002290766D7614','2011-01-01',0.00,0,'IT Equipment and Software','223','Servicable','','','',0),(11,'13-015','Laptop','Lenovo','2011-01-01',0.00,22,'IT Equipment and Software','223','Servicable','','','',0),(12,'13-016','Laptop','Lenovo Ideapad Z470 SN 1B03976237 with charger, battery, mouse, external drive','2011-01-01',0.00,25,'IT Equipment and Software','223','Servicable','','','',0),(13,'13-017','Netbook','ee-PC SN SAOAAS689566','2011-01-01',0.00,14,'IT Equipment and Software','223','Unservicable','',' Nympha N. Buenio (transferred from Dolores Apostol) ','',0),(14,'13-018','Laptop','Lenovo ThinkPad','0000-00-00',0.00,0,'IT Equipment and Software','223','Unservicable','',' Transferred from Manila ','',0),(15,'13-019','Laptop','Acer Travel Mate, SN NXV7MSP00940902ED66600 with Mouse, DVD Lite-on','2014-01-01',46550.00,26,'IT Equipment and Software','223','Servicable','Laptop','Transferred from Manila, MITHI','',0),(16,'13-020','Laptop','Acer Travel Mate, SN NXV7MSP00940902EA88600 with Mouse, DVD Lite-on','2014-01-01',46550.00,16,'IT Equipment and Software','223','Servicable','Laptop','Transferred from Manila, MITHI','',0),(17,'13-021','Laptop','Acer Travel Mate, SN NXV7MSP00940902EA26600 with Mouse, DVD Lite-on','2014-01-01',46550.00,33,'IT Equipment and Software','223','Servicable','Laptop','Transferred from Manila, MITHI','',0),(18,'13-022','Laptop','Acer Travel Mate, SN NXV7MSP00940902EA96600 with Mouse, DVD Lite-on','2014-01-01',46550.00,29,'IT Equipment and Software','223','Servicable','Laptop','Transferred from Manila, MITHI','',0),(19,'13-023','Laptop','Acer Travel Mate, SN NXV7MSP00940902EA46600 with Mouse, DVD Lite-on','2014-01-01',46550.00,23,'IT Equipment and Software','223','Servicable','Laptop','Transferred from Manila, MITHI','',0),(20,'13-024','Laptop','Lenovo ideapad Yoga 13 SN EB34499491 with Genius Optical Mouse, Lite on 8x External DVDCD Writer SN 666346403531','2014-01-01',71000.00,49,'IT Equipment and Software','223','Servicable','Laptop','Transferred from Manila, MITHI','',0),(21,'13-025','Laptop','Acer Travelmate TMPG245-MMG-74508G1TMnkk Laptop, SN NXV9CSP01042806B9B6600, with Acer carrying bag, External Mouse-A4 Tech','2014-01-01',46280.00,17,'IT Equipment and Software','223','Servicable','','','2015-001',0),(22,'13-026','Laptop','Acer Travelmate TMPG245-MMG-74508G1TMnkk Laptop, SN NXV9CSP01042806BCB6600, with Acer carrying bag, External Mouse-A4 Tech','2014-01-01',46280.00,27,'IT Equipment and Software','223','Servicable','','','2015-002',0),(23,'13-027','Laptop','Acer Travelmate TMPG245-MMG-74508G1TMnkk Laptop, SN NXV9CSP01042806B366600, with Acer carrying bag, External Mouse-A4 Tech','2014-01-01',46280.00,22,'IT Equipment and Software','223','Servicable','','','',0),(24,'13-028','Server','IBM System X 3500 M4 Server SN S6ZECH9','2014-01-01',371800.00,49,'IT Equipment and Software','223','Servicable','Server','Transferred from Manila, MITHI','',0),(25,'13-029','Scanner','Kodak i2600 Scanner SN 48790100','2014-01-01',206000.00,28,'IT Equipment and Software','223','Servicable','Server','Transferred from Manila, MITHI','',0),(26,'13-030','Printer','Samsung ML 3310ND Laser Print SN Z5R7BJAD60000V','2014-01-01',14390.00,28,'IT Equipment and Software','223','Servicable','Projector','Transferred from Manila, MITHI','',0),(27,'13-031','Projector','BENQ MX520 DLP Projector','2014-01-01',47990.00,31,'IT Equipment and Software','223','Servicable','Projector','Transferred from Manila, MITHI','',0),(28,'13-032','Laptop','Acer TravelMate Intel Core i3, SN NXVA8SP00444612AAB7500 with Bag, 4GB DDR3, 1 TB HDD, Windows 8 with Bag','2015-01-01',29230.00,61,'IT Equipment and Software','223','Servicable','Laptop','Purchased from Insystech','',0),(29,'13-033','Netbook','Gateway, white notebook, SN:NUWZBSP002229076187614','2011-01-01',0.00,0,'IT Equipment and Software','223','Servicable','','','',0),(30,'13-034','Netbook','HP Pavilion 14 B132TX Touch Core 13-3227 - 5CD3N7XGT','2014-01-01',29899.00,19,'IT Equipment and Software','223','Servicable','','','',0),(31,'13-035','Laptop','Acer Aspire E14 SN NXMN6SPOO34351B7EF7600 with charger, battery, bag, mouse, cooler pad, color white','2014-01-01',16000.00,0,'IT Equipment and Software','223','Servicable','','Gender and Development ','',0),(32,'13-036','Laptop','Acer Aspire E14 SN NXMLQSP003429093877600','2014-01-01',16000.00,15,'IT Equipment and Software','223','Servicable','','','',0),(33,'13-037','Laptop','Lenovo Yoga 500-15 80n6000LPH','2015-01-01',49999.00,12,'IT Equipment and Software','223','Servicable','','','',0),(34,'13-038','Desktop','Desktop Computer with Monitor, Speaker, Keyboard and Mouses, AVR (SN-Motherboard 16366015046, Processor SN MC605252A2793, HDD SN 46F6WINFS, Monitor SN AKXG81H009260','2016-01-01',21980.00,15,'IT Equipment and Software','223','Servicable','Cashier','','2016-01',5),(35,'TestProperty','','kdjshf824ykjdsf','2017-02-02',100000.00,0,'','','','','','',0);

/*Table structure for table `equipments_details` */

DROP TABLE IF EXISTS `equipments_details`;

CREATE TABLE `equipments_details` (
  `equipdetailsid` bigint(20) NOT NULL AUTO_INCREMENT,
  `equipNo` bigint(20) NOT NULL,
  `processor` varchar(200) NOT NULL DEFAULT 'NONE',
  `ram` varchar(100) NOT NULL DEFAULT 'NONE',
  `hd` varchar(100) NOT NULL DEFAULT 'NONE',
  `operatingsystem` varchar(100) NOT NULL DEFAULT 'NONE',
  `brand` varchar(200) NOT NULL DEFAULT 'NONE',
  `color` varchar(100) NOT NULL DEFAULT 'NONE',
  `others` text NOT NULL,
  `equipsn` varchar(500) DEFAULT NULL,
  `processorsn` varchar(500) DEFAULT NULL,
  `monitorsn` varchar(500) DEFAULT NULL,
  `keyboardsn` varchar(500) DEFAULT NULL,
  `mousesn` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`equipdetailsid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `equipments_details` */

insert  into `equipments_details`(`equipdetailsid`,`equipNo`,`processor`,`ram`,`hd`,`operatingsystem`,`brand`,`color`,`others`,`equipsn`,`processorsn`,`monitorsn`,`keyboardsn`,`mousesn`) values (1,35,'pro','ram','hd','os','NONE','NONE','','sn','prco','','','');

/*Table structure for table `equipments_items` */

DROP TABLE IF EXISTS `equipments_items`;

CREATE TABLE `equipments_items` (
  `equipNo` bigint(20) NOT NULL AUTO_INCREMENT,
  `equipName` varchar(200) NOT NULL,
  `tagno` varchar(200) DEFAULT 'NONE',
  `propertyno` varchar(200) DEFAULT 'NONE',
  `serialno` varchar(200) DEFAULT 'NONE',
  `unitcost` double(10,2) NOT NULL DEFAULT '0.00',
  `dateacquired` date DEFAULT '2016-01-01',
  `supplierID` int(11) DEFAULT '0',
  `color` varchar(100) DEFAULT 'NONE',
  `category` varchar(100) DEFAULT 'NONE',
  PRIMARY KEY (`equipNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `equipments_items` */

/*Table structure for table `inventory` */

DROP TABLE IF EXISTS `inventory`;

CREATE TABLE `inventory` (
  `inventoryid` int(11) NOT NULL AUTO_INCREMENT,
  `itemNo` int(11) DEFAULT NULL,
  `unit` varchar(20) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `datereceived` date DEFAULT NULL,
  `drno` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`inventoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `inventory` */

insert  into `inventory`(`inventoryid`,`itemNo`,`unit`,`qty`,`status`,`time_stamp`,`datereceived`,`drno`) values (1,15,'PC',1,0,'2016-11-10 13:56:08',NULL,NULL),(2,137,'REAM',1,0,'2016-11-16 15:13:55','0000-00-00',''),(3,137,'REAM',1,0,'2016-11-16 15:16:42','2016-11-16','ROI-29378251');

/*Table structure for table `items` */

DROP TABLE IF EXISTS `items`;

CREATE TABLE `items` (
  `itemNo` bigint(20) NOT NULL AUTO_INCREMENT,
  `description` varchar(200) NOT NULL,
  `category` varchar(100) NOT NULL DEFAULT 'Office Supply',
  `unit` varchar(20) NOT NULL DEFAULT 'PC',
  `unitCost` double(10,2) NOT NULL DEFAULT '0.00',
  `inventory_qty` int(11) DEFAULT '0',
  `supplierID` int(11) DEFAULT '0',
  `brand` varchar(200) DEFAULT 'NONE',
  PRIMARY KEY (`itemNo`)
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=utf8;

/*Data for the table `items` */

insert  into `items`(`itemNo`,`description`,`category`,`unit`,`unitCost`,`inventory_qty`,`supplierID`,`brand`) values (1,'Alcohol','Office Supply','PC',0.00,10,0,'CLEENE'),(2,'Tissue','Office Supply','PC',0.00,172,0,'ECO HYGIENE'),(3,'Glue','Office Supply','PC',0.00,2,0,'STICK-EE'),(4,'Double Clip 2 inch','Office Supply','PC',0.00,109,0,'PRINCE'),(5,'Jumbo clip','Office Supply','PC',0.00,400,0,'PRINCE'),(6,'Paper clip','Office Supply','BOX',0.00,5,0,'PRINCE'),(7,'Ruler 12 inch','Office Supply','PC',0.00,35,0,'CRYSTAL'),(8,'Ruler 17 inch','Office Supply','PC',0.00,2,0,'PRINCE'),(9,'Binder clips 1 inch','Office Supply','PC',0.00,84,0,'JOY'),(10,'Binder clips 3/4 inch','Office Supply','PC',0.00,36,0,'JOY'),(11,'Staple Remover','Office Supply','BOX',0.00,5,0,'JIVLI'),(12,'Tape dispenser','Office Supply','BOX',0.00,6,0,'PRINCE'),(13,'Safety paper fastener','Office Supply','BOX',0.00,29,0,'APPLE'),(14,'Stamp pad','Office Supply','PC',0.00,37,0,'MPC CLASSIQUE/JOY'),(15,'Stamp pad ink','Office Supply','PC',0.00,11,0,'PADMATE'),(16,'Typewriter Ribbon','Office Supply','PC',0.00,24,0,'NONE'),(17,'Tape packaging','Office Supply','PC',0.00,14,0,'CROCO TAPE'),(18,'Tape Masking','Office Supply','PC',0.00,2,0,'CROCO TAPE'),(19,'Scotch tape','Office Supply','PC',0.00,6,0,'CROCO TAPE'),(20,'Stencil Paper','Office Supply','BOX',0.00,3,0,'PRINCE'),(21,'Log book (300)','Office Supply','PC',0.00,30,0,'MULTI-ZERO'),(22,'Log book (500)','Office Supply','PC',0.00,5,0,'NONE'),(23,'Puncher','Office Supply','BOX',0.00,1,0,'PRINCE'),(24,'Correction Tape','Office Supply','Pc',0.00,45,0,'JOY'),(25,'Fax film','Office Supply','BOX',0.00,4,0,'KODAK GOLD'),(26,'Cartolina (assorted)','Office Supply','PC',0.00,20,0,'NONE'),(27,'Cartolina (White)','Office Supply','PC',0.00,8,0,'NONE'),(28,'Adjustable Punch','Office Supply','BOX',0.00,1,0,'KW-TRIO'),(29,'Staple ','Office Supply','PC',0.00,2,0,'ARROW'),(30,'Sharpener','Office Supply','PC',0.00,1,0,'ACURA5'),(31,'Scissors','Office Supply','PC',0.00,4,0,'AMSPEE'),(32,'Staple Wire 1/2 x 12mm','Office Supply','Box',0.00,1,0,'ARROW'),(33,'Long Bond Paper (Double A)','Office Supply','REAM',0.00,18,0,'DOUBLE A/LAMCO PAPER'),(34,'Photo Paper','Office Supply','REAM',0.00,15,0,'ACACIA/BERKELEY'),(35,'Parchment Paper','Office Supply','REAM',0.00,4,0,'EMERSON/BESTBUY'),(36,'Sticker Paper (3x4)','Office Supply','PC',0.00,10,0,'POST IT'),(37,'Sticker Paper (3x3)','Office Supply','PC',0.00,2,0,'HBW OFFICE'),(38,'Sticker Paper (8x11)','Office Supply','PC',0.00,12,0,'STRATAKOLOUR/JOLLY'),(39,'Specialty Paper','Office Supply','PC',0.00,12,0,'SQI/SUN'),(40,'Notebooks','Office Supply','PC',0.00,11,0,'DYNAMIC'),(41,'Columnar Books','Office Supply','PC',0.00,4,0,'VECO PRODUCT'),(42,'Board Paper','Office Supply','PC',0.00,10,0,'VECO'),(43,'Carbon Paper','Office Supply','PC',0.00,22,0,'COSH/CLUB'),(44,'Long Folder (Orange)','Office Supply','PC',0.00,50,0,'ADVANCE'),(45,'Long Folder (Blue)','Office Supply','PC',0.00,50,0,'ADVANCE'),(46,'Long Folder (Black)','Office Supply','PC',0.00,4,0,'ADVANCE'),(47,'Long Folder (Yellow)','Office Supply','PC',0.00,17,0,'ADVANCE'),(48,'Long Folder (Dark Blue)','Office Supply','PC',0.00,8,0,'ADVANCE'),(49,'Long Folder (Red)','Office Supply','PC',0.00,1,0,'ADVANCE'),(50,'Long Folder (Violet)','Office Supply','PC',0.00,1,0,'ADVANCE'),(51,'Short Folder (Dark Blue)','Office Supply','PC',0.00,6,0,'ADVANCE'),(52,'Short Folder (Orange)','Office Supply','PC',0.00,4,0,'ADVANCE'),(53,'Short Folder (Red)','Office Supply','PC',0.00,4,0,'ADVANCE'),(54,'Short Folder (Pink)','Office Supply','PC',0.00,3,0,'ADVANCE'),(55,'Short Folder (Green)','Office Supply','PC',0.00,5,0,'ADVANCE'),(56,'Short Folder (Violet)','Office Supply','PC',0.00,2,0,'ADVANCE'),(57,'Plastic Folder','Office Supply','PC',0.00,2,0,'EXPRESSIONS'),(58,'Clear Folder','Office Supply','PC',0.00,1,0,'NONE'),(59,'Pencil','Office Supply','BOX',0.00,4,0,'CHALLENGE'),(60,'Highlighter ','Office Supply','PC',0.00,8,0,'MARVY UCHIDA'),(61,'Permanent Marker (Red)','Office Supply','PC',0.00,13,0,'PILOT'),(62,'Permanent Marker (Black)','Office Supply','PC',0.00,14,0,'PILOT'),(63,'White Board Marker ','Office Supply','PC',0.00,29,0,'MONAMI'),(64,'Crayons','Office Supply','BOX',0.00,4,0,'AMSPEC'),(65,'Coloring Pen','Office Supply','PC',0.00,5,0,'LION CITY'),(66,'Ballpen (Blue)','Office Supply','PC',0.00,2,0,'PILOT'),(67,'Ballpen (Green)','Office Supply','PC',0.00,8,0,'PILOT'),(68,'Ballpen (Red)','Office Supply','PC',0.00,14,0,'PILOT'),(69,'Ballpen (Nataraj)','Office Supply','BOX',0.00,5,0,'NATARAJ'),(70,'Sign Pen (Blue)','Office Supply','PC',0.00,119,0,'PILOT/UNI-BALL/PENTEL'),(71,'Sign Pen (Black)','Office Supply','PC',0.00,84,0,'PENTEL/UNI0BALL'),(72,'Sign Pen (Red)','Office Supply','PC',0.00,22,0,'PENTEL'),(73,'Clear Book (Black)','Office Supply','PC',0.00,13,0,'BINDEMAX'),(74,'Clear Book (White)','Office Supply','PC',0.00,1,0,'BINDEMAX'),(75,'Clear Book (Green)','Office Supply','PC',0.00,20,0,'BINDEMAX'),(76,'Clear Book (Dark Green)','Office Supply','PC',0.00,4,0,'BINDEMAX'),(77,'Clear Book (Brown)','Office Supply','PC',0.00,2,0,'BINDEMAX'),(78,'View Binders','Office Supply','PC',0.00,2,0,'COMICS'),(79,'Transparent Zip Bag','Office Supply','PC',0.00,7,0,'DELI'),(80,'Long Envelope','Office Supply','PC',0.00,500,0,'NONE'),(81,'Short Envelope','Office Supply','PC',0.00,500,0,'NONE'),(82,'CD Case','Office Supply','BOX',0.00,1,0,'FILMAXEL/IMATION'),(83,'CD-R 700MB','Office Supply','PC',0.00,149,0,'SONY'),(84,'Printer Ribbon','Office Supply','BOX',0.00,4,0,'FUJITSU'),(85,'AVR','Office Supply','PC',0.00,1,0,'NONE'),(86,'Toner Kit (TK 354)','Office Supply','PC',0.00,1,0,'KYOCERA'),(87,'Toner (PNG 08 Toner)','Office Supply','PC',0.00,2,0,'CANON'),(88,'Ribbon Cartridge','Office Supply','PC',0.00,1,0,'EPSON'),(89,'Keyboard (4Tech)','Office Supply','PC',0.00,4,0,'A4TECH'),(90,'Trident','Office Supply','PC',0.00,1,0,'NONE'),(91,'APC (Battery Backup)','Office Supply','PC',0.00,1,0,'APC'),(92,'HP Deskjet 1000','Office Supply','PC',0.00,1,0,'HP'),(93,'Mouse Pad','Office Supply','PC',0.00,11,0,'MICROSOFT'),(94,'CD Sleeve','Office Supply','PC',0.00,140,0,'CHENSIN'),(95,'Canon 40','Office Supply','PC',0.00,3,0,'PIXMA CANON'),(96,'Canon 811','Office Supply','PC',0.00,3,0,'PIXMA CANON'),(97,'Canon 88','Office Supply','PC',0.00,7,0,'PIXMA CANON'),(98,'Canon 98','Office Supply','PC',0.00,6,0,'PIXMA CANON'),(99,'Media Pointer','Office Supply','PC',0.00,1,0,'GENIUS'),(100,'Integrative Presenter','Office Supply','PC',0.00,1,0,'ACER'),(101,'Envelope Pay Kraft','Office Supply','PC',0.00,17,0,'POINTER'),(102,'Printer Ink (T6641 Black)','Office Supply','PC',0.00,14,0,'EPSON'),(103,'Printer Ink (T6642 Cyan)','Office Supply','PC',0.00,2,0,'EPSON'),(104,'Printer Ink (T6643 Magenta)','Office Supply','PC',0.00,2,0,'EPSON'),(105,'Printer Ink (T6644 Yellow)','Office Supply','PC',0.00,6,0,'EPSON'),(106,'Diskettes','Office Supply','PC',0.00,150,0,'EMTEK/IMATION'),(107,'Mailing Long Window Envelope','Office Supply','BOX',0.00,16,0,'PAPERFOX'),(108,'Kliche','Office Supply','PC',0.00,1,0,'NON'),(109,'Photo Frames (Blue)','Office Supply','PC',0.00,10,0,'CRAFTIDEAS'),(110,'Photo Frames (Red)','Office Supply','PC',0.00,5,0,'CRAFTIDEAS'),(111,'Name Badge','Office Supply','BOX',0.00,3,0,'NONE'),(112,'Speaker (BXRB21)','Office Supply','BOX',0.00,1,0,'ALTEC'),(113,'Photo Album','Office Supply','PC',0.00,2,0,'K EVERYDAY'),(114,'Paper Weight','Office Supply','PC',0.00,43,0,'NONE'),(115,'Fire Extinguisher','Office Supply','PC',0.00,5,0,'SHUTTER - NEROMU ENTERPRISES COMPANY'),(116,'Glue Gun','Office Supply','PC',0.00,5,0,'NONE'),(117,'Poly Ribbon','Office Supply','PC',0.00,6,0,'WENDY'),(118,'Pail','Office Supply','PC',0.00,3,0,'HI-TOP'),(119,'MegaPhone (XV-`11 S/R)','Office Supply','PC',0.00,1,0,'MAX TECH'),(120,'Coffee Maker','Office Supply','PC',0.00,1,0,'DOWELL'),(121,'Duplicating Ink','Office Supply','PC',0.00,6,0,'NONE'),(122,'Liquid Wax','Office Supply','PC',0.00,3,0,'JOHNSON'),(123,'Mr. Muscle','Office Supply','PC',0.00,2,0,'NONE'),(124,'Air Freshener','Office Supply','PC',0.00,11,0,'NONE'),(125,'Dust Mask','Office Supply','PC',0.00,2,0,'GREENE USA'),(126,'Brush','Office Supply','PC',0.00,4,0,'HOUSEWELL'),(127,'Crosscut Saw','Office Supply','PC',0.00,1,0,'STANLEY'),(128,'Certification','Office Supply','PC',0.00,61,0,'NONE'),(129,'Printer (Epson)','Office Supply','PC',0.00,4,0,'EPSON/CANON'),(130,'Handle Bag','Office Supply','PC',0.00,13,0,'NONE'),(131,'Toilet Brush','Office Supply','PC',0.00,3,0,'CSI'),(132,'Wall Clock','Office Supply','PC',0.00,3,0,'QUARTZ'),(133,'Trash Can','Office Supply','PC',0.00,2,0,'NONE'),(134,'Map Handle','Office Supply','PC',0.00,16,0,'PENGUIN'),(135,'Map Head','Office Supply','PC',0.00,16,0,'PENGUIN'),(136,'Deeper','Office Supply','PC',0.00,2,0,'COSTSAVERS'),(137,'A4 Bond Paper','Office Supply','REAM',0.00,1,0,'ADVANCE/CLEARCOPY'),(138,'CORRECTION FLUID\r\n','Office Supply','PC',0.00,0,0,'NONE'),(139,'Mouse (Optical)\r\n','Office Supply\r\n','PC',0.00,1,0,'GENIUS'),(140,'Flash Drive\r\n','Office Supply\r\n','PC',0.00,9,0,'KINGSTON'),(141,'Rubber Band\r\n','Office Supply\r\n','PC',0.00,3,0,'POINTER'),(142,'Maxell Alkaline Battery (AAA)\r\n','Office Supply\r\n','PC',0.00,118,0,'MAXELL'),(143,'Maxell Alkaline Battery (AA)\r\n','Office Supply\r\n','PC',0.00,38,0,'MAXELL'),(144,'HDD\r\n','Office Supply\r\n','PC',0.00,0,0,'NONE'),(145,'Yellow Paper\r\n','Office Supply\r\n','REAM',0.00,0,0,'NONE'),(146,'Short Bond Paper\r\n','Office Supply\r\n','REAM',0.00,0,0,'ADVANCE'),(147,'Gloves\r\n','Office Supply\r\n','PC',0.00,0,0,'NONE'),(148,'Cutter\r\n','Office Supply\r\n','PC',0.00,0,0,'POINTER'),(149,'Calculator\r\n','Office Supply\r\n','PC',0.00,0,0,'CANON'),(150,'File Rack\r\n','Office Supply\r\n','PC',0.00,0,0,'NONE'),(151,'Ring Border\r\n','Office Supply\r\n','PC',0.00,0,0,'NONE'),(152,'Colored Paper\r\n','Office Supply\r\n','REAM',0.00,0,0,'SQI/SUN'),(153,'Storage Box','Office Supply','PC',0.00,0,0,'NONE'),(154,'Post It','Office Supply','PC',0.00,12,0,'POST IT'),(155,'Push Pins','Office Supply','PC',0.00,0,0,'NONE');

/*Table structure for table `items_buom` */

DROP TABLE IF EXISTS `items_buom`;

CREATE TABLE `items_buom` (
  `item_buom_id` int(11) NOT NULL AUTO_INCREMENT,
  `itemNo` int(11) DEFAULT NULL,
  `base_qty` int(11) DEFAULT NULL,
  `base_unit` varchar(50) DEFAULT NULL,
  `equiv_qty` int(11) DEFAULT NULL,
  `equiv_unit` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`item_buom_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `items_buom` */

insert  into `items_buom`(`item_buom_id`,`itemNo`,`base_qty`,`base_unit`,`equiv_qty`,`equiv_unit`) values (1,39,10,'PC',1,'PACK'),(3,39,100,'PC',1,'BOX'),(4,70,12,'PC',1,'BOX'),(5,71,12,'PC',1,'BOX'),(6,72,12,'PC',1,'BOX'),(10,10,12,'PC',1,'BOX'),(11,5,100,'PC',1,'BOX'),(12,83,50,'PC',1,'REAM'),(13,94,100,'PC',1,'REAM'),(14,106,10,'PC',1,'BOX'),(15,9,12,'PC',1,'BOX'),(16,0,0,'',0,'BOX'),(17,2,12,'PC',1,'BOX');

/*Table structure for table `items_buom_list` */

DROP TABLE IF EXISTS `items_buom_list`;

CREATE TABLE `items_buom_list` (
  `uomid` int(11) NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(50) DEFAULT NULL,
  `unit_description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`uomid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `items_buom_list` */

insert  into `items_buom_list`(`uomid`,`unit_name`,`unit_description`) values (1,'BOX','Box'),(2,'REAM','Ream'),(3,'PC','Piece');

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
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

/*Data for the table `pr_list` */

insert  into `pr_list`(`transID`,`prNo`,`department`,`section`,`prDate`,`purpose`,`requestedbyeid`,`requestedBy`,`designation`,`status`) values (75,'2014-27','DMMMSU-SLUC','COLLEGE OF ARTS AND SCIENCES','2015-04-06','asd',NULL,'Jerome Petonio Songcuan','MIS Head','PENDING'),(76,'2015-28','DMMMSU-SLUC','COLLEGE OF COMPUTER SCIENCE','2015-04-06','asd',NULL,'Elvin Estoque Casem','Instructor I','PENDING'),(78,'2015-30','DMMMSU-SLUC','COLLEGE OF EDUCATION','2015-04-06','asd',NULL,'Jerome Petonio Songcuan','MIS Head','PENDING');

/*Table structure for table `requisition_details` */

DROP TABLE IF EXISTS `requisition_details`;

CREATE TABLE `requisition_details` (
  `reqid` bigint(20) NOT NULL AUTO_INCREMENT,
  `requisition_no` varchar(100) DEFAULT NULL,
  `requisition_date` date DEFAULT NULL,
  `eid` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `logtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `requisition_status` varchar(100) NOT NULL DEFAULT 'NONE',
  PRIMARY KEY (`reqid`)
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=utf8;

/*Data for the table `requisition_details` */

insert  into `requisition_details`(`reqid`,`requisition_no`,`requisition_date`,`eid`,`userID`,`logtime`,`requisition_status`) values (1,'RIS2016-00001','2016-01-05',42,1,'2016-11-08 00:00:00','NONE'),(2,'RIS2016-00002','2016-01-05',26,1,'2016-11-08 00:00:00','NONE'),(3,'RIS2016-00003','2016-01-05',23,1,'2016-11-08 00:00:00','NONE'),(4,'RIS2016-00004','2016-01-05',20,1,'2016-11-08 00:00:00','NONE'),(5,'RIS2016-00005','2016-01-05',30,1,'2016-11-08 00:00:00','NONE'),(6,'RIS2016-00006','2016-01-06',17,1,'2016-11-08 00:00:00','NONE'),(7,'RIS2016-00007','2016-01-06',28,1,'2016-11-08 00:00:00','NONE'),(8,'RIS2016-00008','2016-01-07',13,1,'2016-11-08 00:00:00','NONE'),(9,'RIS2016-00009','2016-01-13',28,1,'2016-11-08 00:00:00','NONE'),(10,'RIS2016-00010','2016-01-08',20,1,'2016-11-08 00:00:00','NONE'),(11,'RIS2016-00011','2016-01-12',27,1,'2016-11-08 00:00:00','NONE'),(12,'RIS2016-00012','2016-01-12',15,1,'2016-11-08 00:00:00','NONE'),(13,'RIS2016-00013','2016-01-14',29,1,'2016-11-08 00:00:00','NONE'),(14,'RIS2016-00014','2016-01-14',37,1,'2016-11-08 00:00:00','NONE'),(15,'RIS2016-00015','2016-01-18',20,1,'2016-11-08 00:00:00','NONE'),(16,'RIS2016-00016','2016-01-15',14,1,'2016-11-08 00:00:00','NONE'),(17,'RIS2016-00017','2016-01-22',37,1,'2016-11-08 00:00:00','NONE'),(18,'RIS2016-00018','2016-01-25',31,1,'2016-11-08 00:00:00','NONE'),(19,'RIS2016-00019','2016-01-26',20,1,'2016-11-08 00:00:00','NONE'),(20,'RIS2016-00020','2016-01-26',13,1,'2016-11-08 00:00:00','NONE'),(21,'RIS2016-00021','2016-02-01',28,1,'2016-11-08 00:00:00','NONE'),(22,'RIS2016-00022','2016-02-01',12,1,'2016-11-08 00:00:00','NONE'),(23,'RIS2016-00023','2016-02-01',20,1,'2016-11-08 00:00:00','NONE'),(24,'RIS2016-00024','2016-02-01',15,1,'2016-11-08 00:00:00','NONE'),(25,'RIS2016-00025','2016-02-05',29,1,'2016-11-08 00:00:00','NONE'),(26,'RIS2016-00026','2016-02-09',22,1,'2016-11-08 00:00:00','NONE'),(27,'RIS2016-00027','2016-02-16',18,1,'2016-11-08 00:00:00','NONE'),(28,'RIS2016-00028','2016-02-16',25,1,'2016-11-08 00:00:00','NONE'),(29,'RIS2016-00029','2016-02-11',28,1,'2016-11-08 00:00:00','NONE'),(30,'RIS2016-00030','2016-02-01',29,1,'2016-11-08 00:00:00','NONE'),(31,'RIS2016-00031','2016-02-11',31,1,'2016-11-08 00:00:00','NONE'),(32,'RIS2016-00032','2016-02-22',15,1,'2016-11-08 00:00:00','NONE'),(33,'RIS2016-00033','2016-02-22',31,1,'2016-11-08 00:00:00','NONE'),(34,'RIS2016-00034','2016-02-24',37,1,'2016-11-08 00:00:00','NONE'),(35,'RIS2016-00035','2016-02-29',37,1,'2016-11-08 00:00:00','NONE'),(36,'RIS2016-00036','2016-03-08',17,1,'2016-11-08 00:00:00','NONE'),(37,'RIS2016-00037','2016-02-08',15,1,'2016-11-08 00:00:00','NONE'),(38,'RIS2016-00038','2016-03-31',42,1,'2016-11-08 00:00:00','NONE'),(39,'RIS2016-00039','2016-03-31',37,1,'2016-11-08 00:00:00','NONE'),(40,'RIS2016-00040','2016-04-12',25,1,'2016-11-08 00:00:00','NONE'),(41,'RIS2016-00041','2016-04-12',41,1,'2016-11-08 00:00:00','NONE'),(42,'RIS2016-00042','2016-04-12',17,1,'2016-11-08 00:00:00','NONE'),(43,'RIS2016-00043','2016-04-22',26,1,'2016-11-08 00:00:00','NONE'),(44,'RIS2016-00044','2016-04-22',24,1,'2016-11-08 00:00:00','NONE'),(45,'RIS2016-00045','2016-04-25',29,1,'2016-11-08 00:00:00','NONE'),(46,'RIS2016-00046','2016-04-25',33,1,'2016-11-08 00:00:00','NONE'),(47,'RIS2016-00047','2016-05-04',26,1,'2016-11-08 00:00:00','NONE'),(48,'RIS2016-00048','2016-05-05',37,1,'2016-11-08 00:00:00','NONE'),(49,'RIS2016-00049','2016-05-05',17,1,'2016-11-08 00:00:00','NONE'),(50,'RIS2016-00050','2016-04-23',18,1,'2016-11-08 00:00:00','NONE'),(51,'RIS2016-00051','2016-05-24',37,1,'2016-11-08 00:00:00','NONE'),(52,'RIS2016-00052','2016-06-11',35,1,'2016-11-08 00:00:00','NONE'),(53,'RIS2016-00053','2016-08-01',37,1,'2016-11-08 00:00:00','NONE'),(54,'RIS2016-00054','2016-08-02',37,1,'2016-11-08 00:00:00','NONE'),(55,'RIS2016-00055','2016-05-03',15,1,'2016-11-08 00:00:00','NONE'),(56,'RIS2016-00056','2016-05-16',25,1,'2016-11-08 00:00:00','NONE'),(57,'RIS2016-00057','2016-05-23',42,1,'2016-11-08 00:00:00','NONE'),(58,'RIS2016-00058','2016-05-26',43,1,'2016-11-08 00:00:00','NONE'),(59,'RIS2016-00059','2016-05-26',27,1,'2016-11-08 00:00:00','NONE'),(60,'RIS2016-00060','2016-05-27',31,1,'2016-11-08 00:00:00','NONE'),(61,'RIS2016-00061','2016-05-27',20,1,'2016-11-08 00:00:00','NONE'),(62,'RIS2016-00062','2016-05-27',26,1,'2016-11-08 00:00:00','NONE'),(63,'RIS2016-00063','2016-06-06',29,1,'2016-11-08 00:00:00','NONE'),(64,'RIS2016-00064','2016-06-13',21,1,'2016-11-08 00:00:00','NONE'),(65,'RIS2016-00065','2016-06-13',26,1,'2016-11-08 00:00:00','NONE'),(66,'RIS2016-00066','2016-06-14',12,1,'2016-11-08 00:00:00','NONE'),(67,'RIS2016-00067','2016-06-14',24,1,'2016-11-08 00:00:00','NONE'),(68,'RIS2016-00068','2016-06-14',28,1,'2016-11-08 00:00:00','NONE'),(69,'RIS2016-00069','2016-06-14',42,1,'2016-11-08 00:00:00','NONE'),(70,'RIS2016-00070','2016-05-16',31,1,'2016-11-08 00:00:00','NONE'),(71,'RIS2016-00071','2016-06-17',25,1,'2016-11-08 00:00:00','NONE'),(72,'RIS2016-00072','2016-06-17',37,1,'2016-11-08 00:00:00','NONE'),(73,'RIS2016-00073','2016-06-17',26,1,'2016-11-08 00:00:00','NONE'),(74,'RIS2016-00074','2016-06-22',25,1,'2016-11-08 00:00:00','NONE'),(75,'RIS2016-00075','2016-06-23',18,1,'2016-11-08 00:00:00','NONE'),(76,'RIS2016-00076','2016-06-23',12,1,'2016-11-08 00:00:00','NONE'),(77,'RIS2016-00077','2016-06-23',29,1,'2016-11-08 00:00:00','NONE'),(78,'RIS2016-00078','2016-06-28',15,1,'2016-11-08 00:00:00','NONE'),(79,'RIS2016-00079','2016-06-28',22,1,'2016-11-08 00:00:00','NONE'),(80,'RIS2016-00080','2016-07-01',22,1,'2016-11-08 00:00:00','NONE'),(81,'RIS2016-00081','2016-07-11',25,1,'2016-11-08 00:00:00','NONE'),(82,'RIS2016-00082','2016-07-12',35,1,'2016-11-08 00:00:00','NONE'),(83,'RIS2016-00083','2016-07-13',37,1,'2016-11-08 00:00:00','NONE'),(84,'RIS2016-00084','2016-07-13',18,1,'2016-11-08 00:00:00','NONE'),(85,'RIS2016-00085','2016-07-19',37,1,'2016-11-08 00:00:00','NONE'),(86,'RIS2016-00086','2016-07-19',30,1,'2016-11-08 00:00:00','NONE'),(87,'RIS2016-00087','2016-07-19',30,1,'2016-11-08 00:00:00','NONE'),(88,'RIS2016-00088','2016-07-19',29,1,'2016-11-08 00:00:00','NONE'),(89,'RIS2016-00089','2016-07-21',35,1,'2016-11-08 00:00:00','NONE'),(90,'RIS2016-00090','2016-08-03',37,1,'2016-11-08 00:00:00','NONE'),(91,'RIS2016-00091','2016-08-03',20,1,'2016-11-08 00:00:00','NONE'),(92,'RIS2016-00092','2016-08-05',37,1,'2016-11-08 00:00:00','NONE'),(93,'RIS2016-00093','2016-05-08',18,1,'2016-11-08 00:00:00','NONE'),(94,'RIS2016-00094','2016-08-10',31,1,'2016-11-08 00:00:00','NONE'),(95,'RIS2016-00095','2016-08-12',37,1,'2016-11-08 00:00:00','NONE'),(96,'RIS2016-00096','2016-08-15',15,1,'2016-11-08 00:00:00','NONE'),(97,'RIS2016-00097','2016-08-15',20,1,'2016-11-08 00:00:00','NONE'),(98,'RIS2016-00098','2016-09-20',29,1,'2016-11-08 00:00:00','NONE'),(99,'RIS2016-00099','2016-09-20',16,1,'2016-11-08 00:00:00','NONE'),(100,'RIS2016-00100','2016-09-15',20,1,'2016-11-08 00:00:00','NONE'),(101,'RIS2016-00101','2016-09-15',20,1,'2016-11-08 00:00:00','NONE'),(102,'RIS2016-00102','2016-01-09',23,1,'2016-11-08 00:00:00','NONE'),(103,'RIS2016-00103','2016-09-08',26,1,'2016-11-08 00:00:00','NONE'),(104,'RIS2016-00104','2016-09-14',18,1,'2016-11-08 00:00:00','NONE'),(105,'RIS2016-00105','2016-09-09',33,1,'2016-11-08 00:00:00','NONE'),(106,'RIS2016-00106','2016-09-09',36,1,'2016-11-08 00:00:00','NONE'),(107,'RIS2016-00107','2016-09-20',37,1,'2016-11-08 00:00:00','NONE'),(108,'RIS2016-00108','2016-09-20',29,1,'2016-11-08 00:00:00','NONE'),(109,'RIS2016-00109','2016-09-14',28,1,'2016-11-08 00:00:00','NONE'),(110,'RIS2016-00110','2016-09-14',22,1,'2016-11-08 00:00:00','NONE'),(111,'RIS2016-00111','2016-09-14',20,1,'2016-11-08 00:00:00','NONE'),(112,'RIS2016-00112','2016-09-20',25,1,'2016-11-08 00:00:00','NONE'),(113,'RIS2016-00113','2016-09-22',22,1,'2016-11-08 00:00:00','NONE'),(114,'RIS2016-00114','2016-09-22',33,1,'2016-11-08 00:00:00','NONE'),(115,'RIS2016-00115','2016-10-13',22,1,'2016-11-08 00:00:00','NONE'),(116,'RIS2016-00116','2016-10-18',31,1,'2016-11-08 00:00:00','NONE'),(117,'RIS2016-00117','2016-10-17',29,1,'2016-11-08 00:00:00','NONE'),(118,'RIS2016-00118','2016-10-17',33,1,'2016-11-08 00:00:00','NONE'),(119,'RIS2016-00119','2016-10-18',37,1,'2016-11-08 00:00:00','NONE'),(128,'RIS2016-00120','2016-10-19',41,1,'2016-11-08 00:00:00','NONE'),(129,'RIS2016-00121','2016-10-25',26,1,'2016-11-08 00:00:00','NONE'),(130,'RIS2016-00122','2016-11-02',20,1,'2016-11-08 00:00:00','NONE'),(131,'RIS2016-00123','2016-10-26',44,1,'2016-11-08 00:00:00','NONE'),(132,'RIS2016-00124','2016-11-02',30,1,'2016-11-08 00:00:00','NONE'),(133,'RIS2016-00125','2016-11-02',31,1,'2016-11-08 00:00:00','NONE'),(138,'RIS2016-00126','2016-11-08',44,1,'2016-12-29 09:11:51','CANCELLED'),(139,'RIS2016-00127','2016-11-08',44,1,'2016-12-29 09:07:39','CANCELLED'),(140,'RIS2017-00002','2017-01-12',44,1,'2017-01-12 12:10:55','NONE');

/*Table structure for table `requisition_items` */

DROP TABLE IF EXISTS `requisition_items`;

CREATE TABLE `requisition_items` (
  `reqitemsid` bigint(20) NOT NULL AUTO_INCREMENT,
  `requisition_no` varchar(100) DEFAULT NULL,
  `itemno` bigint(20) DEFAULT NULL,
  `unit` varchar(20) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `update_status` int(11) DEFAULT '0',
  PRIMARY KEY (`reqitemsid`)
) ENGINE=InnoDB AUTO_INCREMENT=536 DEFAULT CHARSET=utf8;

/*Data for the table `requisition_items` */

insert  into `requisition_items`(`reqitemsid`,`requisition_no`,`itemno`,`unit`,`qty`,`update_status`) values (1,'RIS2016-00001',44,'PC',2,1),(2,'RIS2016-00002',133,'PC',2,1),(3,'RIS2016-00003',148,'PC',1,1),(4,'RIS2016-00004',80,'PC',5,1),(5,'RIS2016-00005',23,'PC',1,1),(6,'RIS2016-00006',33,'REAM',1,1),(7,'RIS2016-00006',146,'REAM',1,1),(8,'RIS2016-00006',137,'BOX',1,1),(9,'RIS2016-00007',137,'REAM',2,1),(10,'RIS2016-00007',33,'REAM',2,1),(11,'RIS2016-00008',44,'PC',20,1),(12,'RIS2016-00008',13,'BOX',1,1),(13,'RIS2016-00008',138,'PC',1,1),(14,'RIS2016-00008',22,'PC',1,1),(15,'RIS2016-00009',33,'REAM',1,1),(16,'RIS2016-00010',18,'PC',1,1),(17,'RIS2016-00011',44,'PC',1,1),(18,'RIS2016-00012',44,'PC',100,1),(19,'RIS2016-00012',33,'REAM',2,1),(20,'RIS2016-00012',102,'PC',2,1),(21,'RIS2016-00012',32,'BOX',2,1),(22,'RIS2016-00012',13,'BOX',1,1),(23,'RIS2016-00013',33,'REAM',1,1),(24,'RIS2016-00014',33,'REAM',2,1),(25,'RIS2016-00015',139,'PC',1,1),(26,'RIS2016-00016',140,'PC',1,1),(27,'RIS2016-00017',33,'REAM',1,1),(28,'RIS2016-00017',137,'REAM',1,1),(29,'RIS2016-00018',33,'REAM',3,1),(30,'RIS2016-00019',101,'PC',4,1),(31,'RIS2016-00019',44,'PC',4,1),(32,'RIS2016-00019',44,'PC',4,1),(33,'RIS2016-00020',59,'PC',2,1),(34,'RIS2016-00020',13,'BOX',1,1),(35,'RIS2016-00021',143,'PC',4,1),(36,'RIS2016-00022',144,'PC',1,1),(37,'RIS2016-00023',102,'PC',1,1),(38,'RIS2016-00024',44,'PC',12,1),(39,'RIS2016-00024',24,'PC',1,1),(40,'RIS2016-00025',33,'REAM',1,1),(41,'RIS2016-00025',24,'PC',1,1),(42,'RIS2016-00026',137,'REAM',6,1),(43,'RIS2016-00026',137,'BOX',1,1),(44,'RIS2016-00026',102,'PC',1,1),(45,'RIS2016-00026',32,'BOX',1,1),(46,'RIS2016-00026',29,'PC',1,1),(47,'RIS2016-00026',84,'BOX',1,1),(48,'RIS2016-00027',102,'PC',2,1),(49,'RIS2016-00027',59,'PC',1,1),(50,'RIS2016-00028',137,'BOX',1,1),(51,'RIS2016-00028',19,'PC',1,1),(52,'RIS2016-00028',62,'PC',1,1),(53,'RIS2016-00028',32,'BOX',1,1),(54,'RIS2016-00028',71,'PC',1,1),(55,'RIS2016-00028',3,'PC',1,1),(56,'RIS2016-00029',33,'REAM',2,1),(57,'RIS2016-00029',137,'REAM',2,1),(58,'RIS2016-00030',33,'REAM',2,1),(59,'RIS2016-00030',152,'REAM',2,1),(60,'RIS2016-00030',151,'PC',1,1),(61,'RIS2016-00031',33,'REAM',3,1),(62,'RIS2016-00031',137,'REAM',3,1),(63,'RIS2016-00031',24,'PC',2,1),(64,'RIS2016-00032',71,'PC',5,1),(65,'RIS2016-00032',32,'BOX',5,1),(66,'RIS2016-00032',137,'REAM',2,1),(67,'RIS2016-00032',33,'REAM',4,1),(68,'RIS2016-00032',15,'PC',1,1),(69,'RIS2016-00032',13,'BOX',2,1),(70,'RIS2016-00033',71,'PC',2,1),(71,'RIS2016-00034',44,'PC',2,1),(72,'RIS2016-00035',33,'REAM',3,1),(73,'RIS2016-00035',146,'REAM',3,1),(74,'RIS2016-00036',146,'BOX',1,1),(75,'RIS2016-00036',24,'PC',5,1),(76,'RIS2016-00036',32,'BOX',2,1),(77,'RIS2016-00036',70,'PC',3,1),(78,'RIS2016-00036',146,'BOX',1,1),(79,'RIS2016-00037',33,'REAM',2,1),(80,'RIS2016-00037',146,'REAM',1,1),(81,'RIS2016-00037',29,'PC',1,1),(82,'RIS2016-00038',33,'REAM',2,1),(83,'RIS2016-00038',44,'PC',10,1),(84,'RIS2016-00038',152,'PC',10,1),(85,'RIS2016-00038',150,'PC',3,1),(86,'RIS2016-00038',32,'BOX',1,1),(87,'RIS2016-00038',13,'BOX',1,1),(88,'RIS2016-00038',6,'BOX',1,1),(89,'RIS2016-00038',1,'PC',1,1),(90,'RIS2016-00038',149,'PC',1,1),(91,'RIS2016-00038',154,'PC',1,1),(92,'RIS2016-00038',24,'PC',3,1),(93,'RIS2016-00039',102,'PC',1,1),(94,'RIS2016-00039',146,'REAM',3,1),(95,'RIS2016-00040',83,'PC',1,1),(96,'RIS2016-00040',146,'REAM',2,1),(97,'RIS2016-00040',107,'BOX',1,1),(98,'RIS2016-00041',36,'PC',3,1),(99,'RIS2016-00041',80,'PC',250,1),(100,'RIS2016-00041',62,'PC',6,1),(101,'RIS2016-00041',128,'PC',3,1),(102,'RIS2016-00041',33,'REAM',4,1),(103,'RIS2016-00041',66,'PC',230,1),(104,'RIS2016-00041',42,'PC',70,1),(105,'RIS2016-00042',137,'REAM',1,1),(106,'RIS2016-00042',33,'REAM',1,1),(107,'RIS2016-00042',137,'REAM',1,1),(108,'RIS2016-00042',137,'REAM',1,1),(109,'RIS2016-00042',32,'BOX',1,1),(110,'RIS2016-00042',2,'BOX',1,1),(111,'RIS2016-00042',137,'REAM',1,1),(112,'RIS2016-00043',29,'PC',1,1),(113,'RIS2016-00043',102,'BOX',1,1),(114,'RIS2016-00044',29,'PC',1,1),(115,'RIS2016-00045',102,'PC',1,1),(116,'RIS2016-00045',103,'PC',1,1),(117,'RIS2016-00045',104,'PC',1,1),(118,'RIS2016-00045',105,'PC',1,1),(119,'RIS2016-00045',6,'BOX',1,1),(120,'RIS2016-00045',146,'REAM',1,1),(121,'RIS2016-00045',9,'BOX',1,1),(122,'RIS2016-00045',42,'PC',1,1),(123,'RIS2016-00046',102,'PC',1,1),(124,'RIS2016-00046',6,'BOX',1,1),(125,'RIS2016-00046',33,'REAM',1,1),(126,'RIS2016-00046',137,'REAM',1,1),(127,'RIS2016-00046',9,'BOX',1,1),(128,'RIS2016-00046',10,'BOX',1,1),(129,'RIS2016-00047',33,'REAM',1,1),(130,'RIS2016-00048',63,'PC',1,1),(131,'RIS2016-00049',80,'PC',2,1),(132,'RIS2016-00050',139,'PC',1,1),(133,'RIS2016-00051',33,'REAM',3,1),(134,'RIS2016-00051',146,'REAM',4,1),(135,'RIS2016-00052',33,'REAM',1,1),(136,'RIS2016-00052',83,'PC',1,1),(137,'RIS2016-00052',102,'PC',1,1),(138,'RIS2016-00053',137,'REAM',1,1),(139,'RIS2016-00054',70,'PC',2,1),(140,'RIS2016-00055',137,'REAM',5,1),(141,'RIS2016-00055',33,'REAM',5,1),(142,'RIS2016-00055',13,'BOX',5,1),(143,'RIS2016-00055',32,'BOX',3,1),(144,'RIS2016-00056',70,'PC',1,1),(145,'RIS2016-00056',71,'PC',1,1),(146,'RIS2016-00056',66,'PC',1,1),(147,'RIS2016-00056',1,'PC',1,1),(148,'RIS2016-00056',9,'PC',4,1),(149,'RIS2016-00056',4,'PC',1,1),(150,'RIS2016-00057',137,'REAM',1,1),(151,'RIS2016-00058',146,'REAM',1,1),(152,'RIS2016-00059',33,'REAM',5,1),(153,'RIS2016-00059',102,'PC',1,1),(154,'RIS2016-00059',32,'BOX',1,1),(155,'RIS2016-00059',70,'PC',2,1),(156,'RIS2016-00059',1,'PC',1,1),(157,'RIS2016-00059',36,'PC',1,1),(158,'RIS2016-00059',2,'PC',2,1),(159,'RIS2016-00059',7,'PC',1,1),(160,'RIS2016-00059',148,'PC',1,1),(161,'RIS2016-00060',39,'PC',10,1),(162,'RIS2016-00060',1,'PC',1,1),(163,'RIS2016-00060',2,'PC',1,1),(164,'RIS2016-00061',42,'PC',4,1),(165,'RIS2016-00062',72,'PC',1,1),(166,'RIS2016-00063',80,'PC',200,1),(167,'RIS2016-00064',32,'BOX',2,1),(168,'RIS2016-00064',24,'PC',1,1),(169,'RIS2016-00064',32,'BOX',2,1),(170,'RIS2016-00065',32,'PC',1,1),(171,'RIS2016-00066',2,'PC',12,1),(172,'RIS2016-00067',2,'PC',1,1),(173,'RIS2016-00067',70,'PC',1,1),(174,'RIS2016-00067',59,'PC',1,1),(175,'RIS2016-00067',66,'PC',1,1),(176,'RIS2016-00068',14,'PC',1,1),(177,'RIS2016-00069',6,'BOX',2,1),(178,'RIS2016-00070',102,'PC',2,1),(179,'RIS2016-00070',103,'PC',1,1),(180,'RIS2016-00070',104,'PC',1,1),(181,'RIS2016-00070',105,'PC',1,1),(182,'RIS2016-00070',2,'PC',1,1),(183,'RIS2016-00070',137,'REAM',1,1),(184,'RIS2016-00071',102,'PC',1,1),(185,'RIS2016-00071',70,'PC',1,1),(186,'RIS2016-00071',66,'PC',1,1),(187,'RIS2016-00072',137,'REAM',1,1),(188,'RIS2016-00073',19,'PC',1,1),(189,'RIS2016-00073',24,'PC',1,1),(190,'RIS2016-00073',140,'PC',1,1),(191,'RIS2016-00074',137,'REAM',1,1),(192,'RIS2016-00074',3,'PC',1,1),(193,'RIS2016-00074',59,'PC',1,1),(194,'RIS2016-00074',102,'PC',2,1),(195,'RIS2016-00075',33,'REAM',3,1),(196,'RIS2016-00076',66,'PC',4,1),(197,'RIS2016-00076',59,'PC',3,1),(198,'RIS2016-00077',154,'PC',1,1),(199,'RIS2016-00078',154,'PC',1,1),(200,'RIS2016-00078',33,'REAM',4,1),(201,'RIS2016-00078',146,'REAM',2,1),(202,'RIS2016-00078',32,'BOX',4,1),(203,'RIS2016-00078',11,'PC',1,1),(204,'RIS2016-00079',146,'REAM',5,1),(205,'RIS2016-00079',33,'REAM',1,1),(206,'RIS2016-00079',83,'PC',3,1),(207,'RIS2016-00079',128,'PC',2,1),(208,'RIS2016-00079',102,'PC',2,1),(209,'RIS2016-00080',146,'REAM',5,1),(210,'RIS2016-00081',137,'REAM',2,1),(211,'RIS2016-00082',137,'REAM',1,1),(212,'RIS2016-00082',102,'PC',1,1),(213,'RIS2016-00083',137,'REAM',2,1),(214,'RIS2016-00083',33,'REAM',1,1),(215,'RIS2016-00084',33,'REAM',1,1),(216,'RIS2016-00085',66,'PC',3,1),(217,'RIS2016-00086',135,'PC',4,1),(218,'RIS2016-00086',124,'PC',2,1),(219,'RIS2016-00086',122,'PC',2,1),(220,'RIS2016-00086',131,'PC',2,1),(221,'RIS2016-00086',147,'PC',1,1),(222,'RIS2016-00086',123,'PC',1,1),(223,'RIS2016-00087',51,'PC',10,1),(224,'RIS2016-00087',62,'PC',1,1),(225,'RIS2016-00087',70,'PC',1,1),(226,'RIS2016-00087',32,'BOX',1,1),(227,'RIS2016-00087',154,'PC',2,1),(228,'RIS2016-00087',3,'PC',1,1),(229,'RIS2016-00087',19,'PC',1,1),(230,'RIS2016-00088',42,'PC',10,1),(231,'RIS2016-00089',137,'BOX',1,1),(232,'RIS2016-00089',83,'PC',3,1),(233,'RIS2016-00089',33,'REAM',6,1),(234,'RIS2016-00089',137,'REAM',3,1),(235,'RIS2016-00089',85,'PC',1,1),(236,'RIS2016-00089',137,'BOX',1,1),(237,'RIS2016-00089',71,'PC',2,1),(238,'RIS2016-00089',36,'PC',2,1),(239,'RIS2016-00089',24,'PC',1,1),(240,'RIS2016-00090',88,'BOX',3,1),(241,'RIS2016-00090',154,'REAM',1,1),(242,'RIS2016-00091',73,'PC',6,1),(243,'RIS2016-00091',40,'PC',6,1),(244,'RIS2016-00091',70,'PC',6,1),(245,'RIS2016-00092',2,'PC',12,1),(246,'RIS2016-00092',1,'PC',2,1),(247,'RIS2016-00093',33,'REAM',2,1),(248,'RIS2016-00093',32,'BOX',1,1),(249,'RIS2016-00094',137,'REAM',2,1),(250,'RIS2016-00094',33,'REAM',2,1),(251,'RIS2016-00094',19,'PC',1,1),(252,'RIS2016-00094',2,'PC',1,1),(253,'RIS2016-00094',33,'REAM',2,1),(254,'RIS2016-00094',146,'REAM',2,1),(255,'RIS2016-00094',102,'PC',1,1),(256,'RIS2016-00094',81,'PC',100,1),(257,'RIS2016-00095',137,'REAM',2,1),(258,'RIS2016-00095',33,'REAM',2,1),(259,'RIS2016-00096',33,'REAM',3,1),(260,'RIS2016-00096',137,'REAM',2,1),(261,'RIS2016-00096',32,'BOX',2,1),(262,'RIS2016-00096',113,'BOX',2,1),(263,'RIS2016-00096',13,'BOX',2,1),(264,'RIS2016-00097',103,'PC',2,1),(265,'RIS2016-00097',105,'PC',2,1),(266,'RIS2016-00097',104,'PC',2,1),(267,'RIS2016-00097',102,'PC',2,1),(268,'RIS2016-00098',128,'PC',4,1),(269,'RIS2016-00098',81,'PC',200,1),(270,'RIS2016-00098',33,'REAM',1,1),(271,'RIS2016-00098',137,'REAM',1,1),(272,'RIS2016-00098',36,'PC',10,1),(273,'RIS2016-00098',42,'PC',15,1),(274,'RIS2016-00098',102,'PC',1,1),(275,'RIS2016-00099',102,'PC',1,1),(276,'RIS2016-00100',153,'PC',1,1),(277,'RIS2016-00101',155,'PC',1,1),(278,'RIS2016-00102',34,'REAM',1,1),(279,'RIS2016-00103',80,'PC',4,1),(280,'RIS2016-00103',5,'PC',3,1),(281,'RIS2016-00104',24,'PC',2,1),(282,'RIS2016-00105',33,'REAM',1,1),(283,'RIS2016-00105',102,'PC',1,1),(284,'RIS2016-00105',32,'BOX',1,1),(285,'RIS2016-00105',5,'PC',10,1),(286,'RIS2016-00106',33,'REAM',4,1),(287,'RIS2016-00106',137,'REAM',1,1),(288,'RIS2016-00106',102,'PC',1,1),(289,'RIS2016-00106',105,'PC',1,1),(290,'RIS2016-00106',102,'PC',1,1),(291,'RIS2016-00106',137,'REAM',6,1),(292,'RIS2016-00107',33,'REAM',3,1),(293,'RIS2016-00107',137,'REAM',4,1),(294,'RIS2016-00108',137,'REAM',1,1),(295,'RIS2016-00108',33,'REAM',1,1),(296,'RIS2016-00109',73,'PC',1,1),(297,'RIS2016-00110',32,'BOX',3,1),(298,'RIS2016-00111',34,'PC',4,1),(299,'RIS2016-00112',83,'PC',1,1),(300,'RIS2016-00112',62,'PC',1,1),(301,'RIS2016-00112',70,'PC',1,1),(302,'RIS2016-00113',71,'PC',1,1),(303,'RIS2016-00114',31,'PC',1,1),(304,'RIS2016-00114',19,'PC',1,1),(305,'RIS2016-00114',80,'PC',4,1),(306,'RIS2016-00115',22,'PC',2,1),(307,'RIS2016-00115',81,'PC',1,1),(308,'RIS2016-00116',137,'REAM',2,1),(309,'RIS2016-00116',33,'REAM',2,1),(310,'RIS2016-00116',102,'PC',1,1),(311,'RIS2016-00116',104,'PC',1,1),(312,'RIS2016-00116',103,'PC',1,1),(313,'RIS2016-00116',105,'PC',1,1),(314,'RIS2016-00117',140,'PC',1,1),(315,'RIS2016-00118',81,'PC',6,1),(316,'RIS2016-00118',145,'PC',1,1),(317,'RIS2016-00118',114,'PC',2,1),(318,'RIS2016-00118',128,'PC',6,1),(319,'RIS2016-00119',33,'REAM',1,1),(320,'RIS2016-00119',137,'REAM',2,1),(321,'RIS2016-00119',24,'PC',1,1),(322,'RIS2016-00119',63,'PC',1,1),(521,'RIS2016-00120',33,'REAM',1,1),(523,'RIS2016-00121',104,'PC',1,0),(524,'RIS2016-00121',103,'PC',1,0),(525,'RIS2016-00121',105,'PC',1,0),(527,'RIS2016-00121',71,'PC',3,0),(528,'RIS2016-00121',70,'PC',1,0),(530,'RIS2016-00122',94,'PC',1,1),(531,'RIS2016-00122',83,'PC',1,1),(532,'RIS2016-00123',140,'PC',2,1),(533,'RIS2016-00124',76,'PC',3,1),(534,'RIS2016-00125',3,'PC',1,1),(535,'RIS2017-00002',137,'REAM',3,0);

/*Table structure for table `suppliers` */

DROP TABLE IF EXISTS `suppliers`;

CREATE TABLE `suppliers` (
  `supplierID` bigint(20) NOT NULL AUTO_INCREMENT,
  `supName` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL DEFAULT 'NONE',
  `contactNo` varchar(30) NOT NULL DEFAULT 'NONE',
  `TIN` varchar(20) NOT NULL DEFAULT 'NONE',
  PRIMARY KEY (`supplierID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `suppliers` */

insert  into `suppliers`(`supplierID`,`supName`,`address`,`contactNo`,`TIN`) values (1,'Morning Star General Merchandise','Governor Ortigas, San Fernando, 2500 La Union, Philippine','+63 72 242 5115','NONE'),(2,'National Bookstore','Manna Mall, Pagdaraoan Biday Road, San Fernando, La Union','NONE','NONE'),(3,'PC 4 Me','San Fernando City La Union','NONE','NONE'),(4,'SKM','Sevilla San Fernando City, La Union','','NONE'),(5,'Insystech (Aquino Square)','Aquino Square, City of San Fernando La Union','','NONE');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `userType` varchar(10) NOT NULL DEFAULT 'staff',
  `status` varchar(1) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`userID`,`userName`,`password`,`userType`,`status`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3','admin','1'),(5,'lynnette','5f4dcc3b5aa765d61d8327deb882cf99','admin','1'),(7,'genesis','289ffeb2a745ccf51ca89a297f47e382','staff','1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
