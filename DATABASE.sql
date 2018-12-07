CREATE DATABASE restaurant;
use restaurant;

DROP TABLE IF EXISTS chef;
DROP TABLE IF EXISTS choose;
DROP TABLE IF EXISTS customer;
DROP TABLE IF EXISTS dining_table;
DROP TABLE IF EXISTS employch;
DROP TABLE IF EXISTS employwa;
DROP TABLE IF EXISTS food_item;
DROP TABLE IF EXISTS orderlist;
DROP TABLE IF EXISTS owners;
DROP TABLE IF EXISTS waitor;
DROP TABLE IF EXISTS Classroom;

CREATE TABLE chef (
  chID char(5) NOT NULL,
  chname varchar(20) DEFAULT NULL,
  chsalary int(11) DEFAULT NULL,
  chgender char(1) DEFAULT NULL,
  PRIMARY KEY (chID)
) ;

CREATE TABLE food_item (
  FID char(3) NOT NULL,
  ftype char(1) DEFAULT NULL,
  fname varchar(20) DEFAULT NULL,
  price int(11) DEFAULT NULL,
  chefID char(5) DEFAULT NULL,
  PRIMARY KEY (FID),
  KEY chefID_idx (chefID),
  CONSTRAINT chefID FOREIGN KEY (chefID) REFERENCES chef (chID) ON DELETE CASCADE
) ;

CREATE TABLE orderlist (
  onumber char(4) NOT NULL,
  fee int(11) DEFAULT NULL,
  feedback varchar(50) DEFAULT NULL,
  payment char(1) DEFAULT NULL,
  ddate date DEFAULT NULL,
  PRIMARY KEY (onumber)
) ;

CREATE TABLE owners (
  SSN char(9) NOT NULL,
  owner_name varchar(20) DEFAULT NULL,
  pho_num char(11) DEFAULT NULL,
  PRIMARY KEY (SSN)
) ;

CREATE TABLE waitor (
  waID char(5) NOT NULL,
  waname varchar(20) DEFAULT NULL,
  wasalary int(11) DEFAULT NULL,
  wagender char(1) DEFAULT NULL,
  PRIMARY KEY (waID)
) ;

CREATE TABLE dining_table (
  tnumber char(3) NOT NULL,
  dtime time DEFAULT NULL,
  num_seats int(11) DEFAULT NULL,
  order_number char(4) DEFAULT NULL,
  waitorID char(5) DEFAULT NULL,
  PRIMARY KEY (tnumber),
  KEY order_number_idx (order_number),
  KEY waitorID_idx (waitorID),
  CONSTRAINT order_number FOREIGN KEY (order_number) REFERENCES orderlist (onumber) ON DELETE CASCADE,
  CONSTRAINT waitorID FOREIGN KEY (waitorID) REFERENCES waitor (waid) ON DELETE CASCADE
) ;

CREATE TABLE choose (
  tnumber char(3) NOT NULL,
  FID char(3),
  PRIMARY KEY (tnumber,FID),
  KEY FID_idx (FID),
  FOREIGN KEY (FID) REFERENCES food_item(FID) ON DELETE CASCADE
) ;

CREATE TABLE customer (
  cuSSN char(9) NOT NULL,
  cuname varchar(20) DEFAULT NULL,
  cupho_num char(11) DEFAULT NULL,
  address varchar(50) DEFAULT NULL,
  table_number char(3) DEFAULT NULL,
  PRIMARY KEY (cuSSN),
  KEY table_number_idx (table_number),
  FOREIGN KEY (table_number) REFERENCES dining_table (tnumber) ON DELETE CASCADE
) ;

CREATE TABLE employch (
  SSN char(9) NOT NULL,
  chID char(5) NOT NULL,
  PRIMARY KEY (SSN,chID),
  KEY chID_idx (chID),
  CONSTRAINT chID FOREIGN KEY (chID) REFERENCES chef (chid) ON DELETE CASCADE,
  CONSTRAINT chSSN FOREIGN KEY (SSN) REFERENCES owners (ssn) ON DELETE CASCADE
) ;

CREATE TABLE employwa (
  SSN char(9) NOT NULL,
  waID char(5) NOT NULL,
  PRIMARY KEY (SSN,waID),
  KEY waID_idx (waID),
  CONSTRAINT waID FOREIGN KEY (waID) REFERENCES waitor (waid) ON DELETE CASCADE,
  CONSTRAINT waSSN FOREIGN KEY (SSN) REFERENCES owners (ssn) ON DELETE CASCADE
) ;

insert chef values 
('33732','Ella',5300,'F'),
('34240','Wendy',5000,'F'),
('38967','James',5500,'M'),
('59172','Lorry',5000,'M');

insert food_item values
('123','B','Bacon bomb',7,'33732'),
('258','M','Crispy chicken',8,'34240'),
('379','B','Shrimp bomb',8,'59172'),
('626','R','Jollof rice',11,'38967'),
('657','B','Double bomb',10,'33732');

insert orderlist values
('0001',22,'Very good!','C','2018-11-11'),
('0002',21,'Nice dishes.','V','2018-10-25'),
('0003',10,'Delicious.','C','2018-11-13'),
('0004',15,'Clean environment.','V','2018-10-14'),
('0005',18,'Tasty!','C','2018-11-29'),
('0006',16,'Yummy!','V','2018-10-31');

insert owners values
('111111111','Jackie','01042429804'),
('123456789','John','01034536898'),
('999999999','Green','01047567412');

insert waitor values 
('09967','Ben',4500,'M'),
('12138','Mary',4000,'F'),
('13120','Lucy',4000,'F'),
('97134','Dan',5000,'M');

insert dining_table values
('295','14:30:28',2,'0002','13120'),
('531','12:25:01',3,'0004','97134'),
('565','13:45:51',3,'0005','13120'),
('634','10:55:33',3,'0003','12138'),
('747','11:33:21',5,'0001','12138'),
('841','12:26:47',5,'0006','09967');

insert choose values
('531','123'),
('565','258'),
('841','258'),
('531','379'),
('841','379'),
('295','626'),
('747','626'),
('295','657'),
('565','657'),
('634','657');

insert customer values
('121380996','Sheen','01082680131','763 Rose Avenue','747'),
('534086704','Jordan','01082324044','3734 Meadow Drive','841'),
('670809253','Curry','01081279881','1114 Black Oak Road','295'),
('786275161','Kobe','01083562721','1026 Skips Lane','634'),
('807965964','Thomas','01020908451','751 Brown Street','565'),
('971341312','Ball','01022728517','66 Morgan Street','531');

insert employch values
('111111111','33732'),
('123456789','34240'),
('999999999','34240'),
('111111111','38967'),
('123456789','59172'),
('999999999','59172');

insert employwa values
('111111111','09967'),
('111111111','12138'),
('123456789','12138'),
('999999999','12138'),
('111111111','13120'),
('123456789','97134'),
('999999999','97134');