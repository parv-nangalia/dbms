-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 14, 2013 at 09:55 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pharmacy`
--
CREATE DATABASE IF NOT EXISTS `pharmacy` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pharmacy`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS 'ADMINISTRATOR'(
  'Admin_Fname' VARCHAR(15) NOT NULL AUTO_INCREMENT,
  'Admin_Lname' VARCHAR(15),
  'Admin_Sex' CHAR(1),
  'Admin_id' VARCHAR(10) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  'Phone_no' INT NOT NULL,
  PRIMARY KEY('Admin_id')
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO 'ADMINISTRATOR' ('Admin-Fname','Admin_Lname','Admin_Sex','Admin_id','username','password','Phone_no') VALUES
('DAVID','BENIOFF','M','ADMIN1320','david','davidl123',897123458);
('DB','WEISS','M','ADMIN1501','db','weiss123',865322677);

-- --------------------------------------------------------

--
-- Table structure for table `cashier`
--

CREATE TABLE IF NOT EXISTS 'CASHIER' (
  'Cashier_id' VARCHAR(12) NOT NULL,
  'Cashier_Name' VARCHAR(15) NOT NULL,
  'Cashier_Sex' CHAR(1),
  'Cashier_Phone' INT NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  'Admin_id' VARCHAR(10) NOT NULL,
  PRIMARY KEY(Cashier_id),
  FOREIGN KEY(Admin_id)REFERENCES ADMINISTRATOR(Admin_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;


--
-- Dumping data for table `cashier`
--

INSERT INTO `CASHIER` (`cashier_id`, `Cashier_Name`, `Cashier_Sex`, `Cashier_Phone`,'username', `password`, `Admin_id`) VALUES
('CASHIER1002','ROBERT','M',654341324,'robert','robert123','ADMIN1320');
('CASHIER1021','NED','M',852642324,'ned','ned123','ADMIN1501');
('CASHIER2116','SKYLER','F',873465422,'skyler','sky123','ADMIN1320');
('CASHIER3105','AEGON','M',811349828,'aegon','aegon123','ADMIN1501');


-- --------------------------------------------------------

--
-- Table structure for table `supplier` 
CREATE TABLE IF NOT EXISTS 'SUPPLIER'(
  'Supplier_ID' VARCHAR(9) NOT NULL,
  'Supplier_Name' VARCHAR(15) NOT NULL,
  'Suppl_Gender' CHAR(1),
  'Supplier_phone' INT NOT NULL,
  'Cashiers_ID' VARCHAR(12) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY(Supplier_ID),
  FOREIGN KEY(Cashiers_ID)REFERENCES CASHIER(Cashier_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `SUPPLIER` (`Supplier_ID`, `Supplier_Name`, `Suppl_Gender`, `Supplier_phone`, `cashier_id`,`username`,`password`) VALUES
('SUPPL2081','WATSON','M',852399213,'CASHIER2116','watson','watson123');
('SUPPL3123','OBERYN','M',851292763,'CASHIER1002','oberyn','oberyn123');
('SUPPL1987','DUSTIN','M',793359211,'CASHIER3105','dustin','dustin123');
('SUPPL1742','NANCY','F',852399213,'CASHIER3105','nancy','nancy123');
('SUPPL2342','CERSEI','F',782365912,'CASHIER1002','cersei','cersei123');
('SUPPL9876','PETYR','M',978659874,'CASHIER1021','petyr','petyr123');

-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS 'CUSTOMER'(
  'Cust_ID' VARCHAR(10) NOT NULL,
  'Cust_Fname' VARCHAR(25) NOT NULL,
  'Cust_Lname' VARCHAR(25),
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  'Cust_Email_id' VARCHAR(25),
  'Cust_Phone_no' INT NOT NULL,
  'Gender' CHAR(1) NOT NULL,
  'Age' INT,
  'Cust_Address' VARCHAR(60) NOT NULL,
  UNIQUE(Cust_Address),
  PRIMARY KEY(Cust_ID)
  )ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;


INSERT INTO 'CUSTOMER' ('Cust_ID','Cust_Fname','Cust_Lname','username','password','Cust_Email_id','Cust_Phone_no','Gender','Age','Cust_Address') VALUES
('CUST1903','JON','SNOW','jon','jon123','jon@gmail.com',824756897,'M',47,'No 10 Avenue Street Winterfell');
('CUST2102','JAIME','LANNISTER','jaime','jaime123','jaime@gmail.com',824756898,'M',30,'241 OldTown Casterly Rock');
('CUST1190','SHERLOCK','HOLMES','sherlock','sherlock123','sherlock@gmail.com',822114897,'M',42,'221B Baker Street London');
('CUST2001','STANNIS','B','stannis','stannis123','stannis@gmail.com',824756224,'M',47,'No 132 6th Avenue Storms End');
('CUST4322','DAENERYS','T','daenerys','daenerys123','dany@gmail.com',824756899,'F',57,'32B Royal Street KingsLanding');
('CUST9831','AARYA','STARK','aarya','aarya123','aarya@gmail.com',824756111,'F',31,'56A Churchil Broadway Winterfell');
('CUST8687','TYRION','L','tyrion','tyrion123','tyrion@gmail.com',786756891,'M',32,'No 31 Park.Ave Casterly Rock');
('CUST9898','WALTER','WHITE','walter','walter123','wwhite@gmail.com',924256877,'M',34,'308 Negra Arroyo Lane Albuquerque');
('CUST5621','CATELYN','NED','catelyn','catelyn123','catelyn@gmail.com',821243897,'F',29,'212A HighTower Alley Riverrun');
('CUST2185','Mary','Castillo','mary','mary123','Mary21@gmail.com',989829568,'F',21,'7934 Dalton Crossing Ashleymouth, PA 16384');
('CUST3525','Barrett','Boden','barrett','barrett123','Barrett31@gmail.com',875811535,'M',31,'4027 Perkins Via Suite 382 West Johnmouth, MD 47755');
('CUST1192','Araceli','Green','araceli','araceli123','Araceli35@gmail.com',93534940,'F',35,'925 Sandra Centers Suite 307 Lake Cheyennehaven, PA 74398');
('CUST9684','Gaynell','Martin','gaynell','gaynell123','Gaynell36@gmail.com',947350396,'F',36,'7057 Johnson Pines North Thomasview, WV 88668');
('CUST2956','Jeanette','Sacco','jeanette','jeanette123','Jeanette31@gmail.com',852362061,'F',31,'94935 Brett Trail Johnsonfurt, DC 70179');
('CUST2676','Wayne','Gillam','wayne','wayne123','Wayne33@gmail.com',947276126,'M',33,'38915 Martinez Squares Port Melissa, MO 02852');
('CUST4087','Terry','Davis','terry','terry123','Terry33@gmail.com',8462454915,'M',33,'7164 Kayla Street Port Tammy, IN 93040');
('CUST3854','Dustin','Stalder','dustin','dustin123','Dustin30@gmail.com',989129310,'M',30,'5491 Harris Neck Cohenmouth, MO 34799');
('CUST7041','Edmond','Richmond','edmond','edmond123','Edmond32@gmail.com',976282316,'M',32,'079 Linda Plain Powellmouth, MD 62941');
('CUST9240','Evelyn','Goforth','evelyn','evelyn123','Evelyn19@gmail.com',930180396,'F',19,'PSC 9508, Box 4431 APO AP 96806');
('CUST2821','Pablo','Warnke','pablo','pablo123','Pablo28@gmail.com',984908771,'M',28,'537 Stuart Fords Apt. 863 Whiteport, SD 56835');
('CUST5627','Michael','Vichidvongsa','michael','michael123','Michael22@gmail.com',824928573,'M',22,'7014 Jennings Walk Port Anna, NY 68646');
('CUST6783','Margaret','Kearney','margerat','margerat123','Margaret43@gmail.com',945839380,'F',43,'55244 Mendoza Estate West Teresaport, NH 11645');
('CUST8063','Lawrence','Dooley','lawrence','lawrence1123','Lawrence22@gmail.com',937022078,'M',22,'43759 Joshua Port Apt. 863 Tonyaborough, DE 30170');
('CUST9455','David','Fitzpatrick','david','david123','David18@gmail.com',931945810,'M',18,'26345 Bell Road West Aaronville, AR 22358');
('CUST8981','Jesus','Negron','jesus','jesus123','Jesus25@gmail.com',967965917,'M',25,'9667 Eric Stream Jameston, LA 33710');
('CUST3710','Jeanette','Mitchell','jeanettem','jeanettem123','Jeanette42@gmail.com',975398134,'F',42,'222 Penny Mountains Suite 316 Gomezborough, VA 85751');
('CUST9241','Andrea','Desorcy','andrea','andrea123','Andrea30@gmail.com',910474436,'F',30,'7520 Rangel Point Suite 467 New Joanne, MI 52563');
('CUST5572','Christopher','Robinson','christopher','christopher123','Christopher26@gmail.com',890691407,'M',26,'35728 Crystal Place Suite 463 Lake Kyle, IA 23358');
('CUST1316','Robert','Hazlett','robert','robert123','Robert31@gmail.com',891657445,'M',31,'244 Smith Parkways Port Carolinetown, HI 85674');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE IF NOT EXISTS 'PRESCRIPTION'(
  `Prescription_ID` VARCHAR(10) NOT NULL,
  `Order_date` DATE NOT NULL,
  `Customer_id` VARCHAR(10) NOT NULL,
  `Customer_name` VARCHAR(15) NOT NULL,
  `Drug_name` VARCHAR(15) NOT NULL,
  `Drug_Quantity` INT NOT NULL,
  `Cust_Phone` INT NOT NULL,
  PRIMARY KEY(Prescription_ID)
  )ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `prescription`
--

INSERT INTO `PRESCRIPTION` (`Prescription_ID`, `Order_date`, `Customer_id`, `Customer_name`, `Drug_name`,'Drug_Quantity','Cust_Phone') VALUES
('123001','2019-02-13','CUST1903','JON','opioid',3,824756897);
('123003','2019-03-21','CUST2102','JAIME','zopiclone',7,824756898);
('123004','2019-03-12','CUST1190','SHERLOCK','codeine',4,822114897);
('123005','2019-01-18','CUST2001','STANNIS','trazodone',10,824756224);
('123007','2019-03-13','CUST4322','DAENERYS','opioid',3,824756899);
('123009','2019-01-31','CUST9831','AARYA','trazodone',6,824756111);
('123011','2019-03-22','CUST8687','TYRION','diazepam',7,786756891);
('123012','2019-03-16','CUST9898','WALTER','hyoscine',4,924256877);
('123013','2019-02-24','CUST5621','CATELYN','zopiclone',10,821243897);
('123014','2019-03-19','CUST2185','Mary','diazepam',1,989829568);
('123015','2019-02-15','CUST3525','Barrett','trazodone',3,875811535);
('123018','2019-02-15','CUST1192','Araceli','diazepam',2,93534940);
('123019','2019-01-22','CUST9684','Gaynell','codeine',9,947350396);
('123020','2019-01-28','CUST2956','Jeanette','codeine',5,852362061);
('123021','2019-03-17','CUST2676','Wayne','codeine',6,947276126);
('123022','2019-02-12','CUST4087','Terry','hyoscine',10,8462454915);
('123023','2019-03-09','CUST3854','Dustin','zopiclone',5,989129310);
('123024','2019-01-27','CUST7041','Edmond','hyoscine',7,976282316);
('123027','2019-01-16','CUST9240','Evelyn','crocin',7,930180396);
('123028','2019-01-12','CUST2821','Pablo','zopiclone',4,984908771);
('123029','2019-02-25','CUST5627','Michael','trazodone',5,824928573);
('123030','2019-01-12','CUST6783','Margaret','diazepam',8,945839380);
('123031','2019-02-26','CUST8063','Lawrence','diazepam',5,937022078);
('123032','2019-01-17','CUST9455','David','crocin',6,931945810);
('123033','2019-02-20','CUST8981','Jesus','diazepam',3,967965917);
('123034','2019-03-01','CUST3710','Jeanette','trazodone',8,975398134);
('123035','2019-02-11','CUST9241','Andrea','trazodone',9,910474436);
('123036','2019-03-09','CUST5572','Christopher','codeine',1,890691407);
('123037','2019-02-13','CUST1316','Robert','trazodone',10,891657445);


--
-- Triggers `prescription`  (just added this don't know its use)
--
DROP TRIGGER IF EXISTS `taree`;
DELIMITER //
CREATE TRIGGER `taree` AFTER INSERT ON `PRESCRIPTION`
 FOR EACH ROW BEGIN
SET@date=NOW();
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS 'STOCK'(
  `Stock_ID` VARCHAR(10) NOT NULL,
  `Drug` VARCHAR(25) NOT NULL,
  `Quantity` INT,
  `Company` VARCHAR(25) NOT NULL,
  `Cost` INT,
  `Description` VARCHAR(50),
  `Expiry_Date` DATE,
  PRIMARY KEY(Stock_ID)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2;


--
-- Dumping data for table `stock`
--

INSERT INTO `STOCK` (`Stock_ID`, `Drug`, `Quantity`, `Company`, `Cost`, `Description`, `Expiry_Date`) VALUES
('CG32012','dolo 650',0,'Micro Labs',3,'Treat cold,cough,fever','2018-12-26');
('AB12001','opioid',10,'Purdue Pharma',3,'Pain relief','2020-03-30');
('CB12002','codeine',15,'Aesica',8,'Treat pain,cough,diarrhea','2020-04-15');
('AA42003','zopiclone',25,'Actavis',10,'Treatment of insomania','2025-12-30');
('DE15008','glucobay',4,'Bayer Pharma',5,'Diabeties','2019-01-27');
('CB12012','trazodone',16,'Watson Labs',5,'Anti-depressent medicine','2021-08-05');
('AB14006','hyoscine',14,'Alchem International',13,'Treat Motion Sickness','2021-09-05');
('DB12018','diazepam',26,'Aesica',9,'Cause memory loss during medical procedure','2022-04-10');
('CH32008','crocin',5,'GSK',2,'Treat cold,cough,fever','2018-12-31');



-- --------------------------------------------------------

--
-- Table structure for table `BILL`
--

CREATE TABLE IF NOT EXISTS `BILL` (
  'Invoice_no' INT NOT NULL,
  'bill_date' DATE,
  'Cost' INT,
  'address' VARCHAR(60) NOT NULL,
  'Cash_ID' VARCHAR(12) NOT NULL,
  'Suppl_id' VARCHAR(9) NOT NULL,
  PRIMARY KEY(Invoice_no),
  FOREIGN KEY(address)REFERENCES CUSTOMER(Cust_Address),
  FOREIGN KEY(Cash_ID)REFERENCES CASHIER(Cashier_id),
  FOREIGN KEY(Suppl_id)REFERENCES SUPPLIER(Supplier_ID));
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `BILL`
--

INSERT INTO `BILL` (`Invoice_no`, `bill_date`,'Cost','address','Cash_ID','Suppl_id') VALUES
('123653','2019-02-15',25,'No 10 Avenue Street Winterfell','CASHIER1002','SUPPL2081');
('123661',NULL,70,'241 OldTown Casterly Rock','CASHIER1021','SUPPL3123');
('123663','2019-03-15',32,'221B Baker Street London','CASHIER1021','SUPPL1987');
('123674','2019-01-20',50,'No 132 6th Avenue Storms End','CASHIER1002','SUPPL1742');
('123677','2019-03-15',182,'32B Royal Street KingsLanding','CASHIER1002','SUPPL9876');
('123678','2019-02-02',30,'56A Churchil Broadway Winterfell','CASHIER3105','SUPPL2081');
('123682',NULL,95,'No 31 Park.Ave Casterly Rock','CASHIER3105','SUPPL3123');
('123683','2019-03-17',52,'308 Negra Arroyo Lane Albuquerque','CASHIER1021','SUPPL2342');
('123691','2019-02-27',100,'212A HighTower Alley Riverrun','CASHIER1002','SUPPL9876');
('123601',NULL,29,'7934 Dalton Crossing Ashleymouth, PA 16384','CASHIER1002','SUPPL3123');
('123602','2019-02-15',78,'4027 Perkins Via Suite 382 West Johnmouth, MD 47755','CASHIER1002','SUPPL2081');
('123618','2019-02-15',58,'925 Sandra Centers Suite 307 Lake Cheyennehaven, PA 74398','CASHIER1021','SUPPL9876');
('123619','2019-01-22',324,'7057 Johnson Pines North Thomasview, WV 88668','CASHIER2116','SUPPL3123');
('123620','2019-01-28',180,'94935 Brett Trail Johnsonfurt, DC 70179','CASHIER1002','SUPPL1987');
('123621',NULL,216,'38915 Martinez Squares Port Melissa, MO 02852','CASHIER1002','SUPPL1987');
('123623',NULL,205,'5491 Harris Neck Cohenmouth, MO 34799','CASHIER1002','SUPPL3123');
('123624','2019-01-27',105,'079 Linda Plain Powellmouth, MD 62941','CASHIER1021','SUPPL1742');
('123627','2019-01-16',217,'PSC 9508, Box 4431 APO AP 96806','CASHIER3105','SUPPL1742');
('123628','2019-01-12',164,'537 Stuart Fords Apt. 863 Whiteport, SD 56835','CASHIER2116','SUPPL1742');
('123629','2019-02-25',130,'7014 Jennings Walk Port Anna, NY 68646','CASHIER3105','SUPPL9876');
('123630','2019-01-12',232,'55244 Mendoza Estate West Teresaport, NH 11645','CASHIER2116','SUPPL3123');
('123631','2019-02-26',145,'43759 Joshua Port Apt. 863 Tonyaborough, DE 30170','CASHIER2116','SUPPL2081');
('123632','2019-01-17',186,'26345 Bell Road West Aaronville, AR 22358','CASHIER2116','SUPPL2081');
('123633','2019-02-20',87,'9667 Eric Stream Jameston, LA 33710','CASHIER1021','SUPPL2342');
('123634','2019-03-01',208,'222 Penny Mountains Suite 316 Gomezborough, VA 85751','CASHIER3105','SUPPL1742');
('123635','2019-02-11',234,'7520 Rangel Point Suite 467 New Joanne, MI 52563','CASHIER3105','SUPPL9876');
('123636','2019-03-09',36,'35728 Crystal Place Suite 463 Lake Kyle, IA 23358','CASHIER1021','SUPPL9876');
('123637',NULL,98,'244 Smith Parkways Port Carolinetown, HI 85674','CASHIER1021','SUPPL9876');


-- --------------------------------------------------------

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoices` FOREIGN KEY (`invoice`) REFERENCES `invoice` (`invoice_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stocks` FOREIGN KEY (`drug`) REFERENCES `stock` (`stock_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prescription_details`
--
ALTER TABLE `prescription_details`
  ADD CONSTRAINT `dsfd` FOREIGN KEY (`drug_name`) REFERENCES `stock` (`stock_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
