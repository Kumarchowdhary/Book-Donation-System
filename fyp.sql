/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.6.24 : Database - fyp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`id3631372_donabook` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `id3631372_donabook`;

/*Table structure for table `blood_members_table` */

DROP TABLE IF EXISTS `blood_members_table`;

CREATE TABLE `blood_members_table` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `question` varchar(255) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `nic` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `blood_members_table` */

insert  into `blood_members_table`(`user_id`,`fname`,`lname`,`email`,`password`,`question`,`answer`,`status`,`city`,`contact`,`gender`,`address`,`nic`) values (1,'vikas','chander','vikas@yahoo.com','11749eb9160710bdaae4a2edc065283d51ddcea6','Who Is Your Favourite Uncle','bhawani',0,'karachi','0331-3278590','male','flat no 4b ward a junaid plaza.','44106-5888888-8');

/*Table structure for table `book_cats` */

DROP TABLE IF EXISTS `book_cats`;

CREATE TABLE `book_cats` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `book_cats` */

insert  into `book_cats`(`cat_id`,`cat_name`) values (1,'Mathematics'),(2,'English'),(3,'Science'),(4,'Commerce'),(5,'Computer'),(6,'Programming'),(7,'Miscellineous');

/*Table structure for table `book_subcats` */

DROP TABLE IF EXISTS `book_subcats`;

CREATE TABLE `book_subcats` (
  `subcat_id` int(11) NOT NULL AUTO_INCREMENT,
  `subcat_name` varchar(255) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`subcat_id`),
  KEY `cat_id` (`cat_id`),
  CONSTRAINT `book_subcats_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `book_cats` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `book_subcats` */

insert  into `book_subcats`(`subcat_id`,`subcat_name`,`cat_id`) values (1,'Algebra',1),(2,'Calculus',1),(3,'Discrete Mathematics',1),(4,'Geometry',1),(5,'Laplace Transform',1),(6,'Statistics',1),(7,'Basic Maths',1),(8,'Physics',3),(9,'Chemistry',3),(10,'Biology',3),(11,'Botany',3),(12,'Anatomy',3),(13,'Astrology',3),(14,'Basic English',3),(15,'Grammer',2),(16,'Literature',2),(17,'Novel',2),(18,'Accounting',4),(19,'Economics',4),(20,'Principals Of Commerce',4),(21,'C++',6),(22,'Java',6),(23,'ASP.NET',6),(24,'PHP',6),(25,'Python',6),(26,'Hardware',5),(27,'Software',5),(28,'System Networking',5),(29,'System Security',5);

/*Table structure for table `bookmarks` */

DROP TABLE IF EXISTS `bookmarks`;

CREATE TABLE `bookmarks` (
  `user_id` int(11) DEFAULT NULL,
  `ad_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  KEY `bookmark_id` (`ad_id`),
  CONSTRAINT `bookmarks_ibfk_1` FOREIGN KEY (`ad_id`) REFERENCES `books_ad_table` (`ad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `bookmarks` */

insert  into `bookmarks`(`user_id`,`ad_id`,`date`) values (45,143,'2016-11-00'),(46,144,'2016-11-30'),(45,141,'0000-00-00'),(46,140,'0000-00-00'),(47,147,'0000-00-00'),(47,157,'0000-00-00'),(47,149,'0000-00-00'),(46,151,'2016-11-11');

/*Table structure for table `books_ad_table` */

DROP TABLE IF EXISTS `books_ad_table`;

CREATE TABLE `books_ad_table` (
  `ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `edition` varchar(255) DEFAULT NULL,
  `copy` varchar(255) DEFAULT NULL,
  `cond` varchar(255) DEFAULT NULL,
  `des` varchar(255) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `subcat_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `photo` text,
  `posting_date` date DEFAULT NULL,
  `posting_time` varchar(255) DEFAULT NULL,
  `ad_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`ad_id`),
  KEY `subcats_id` (`subcat_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `books_ad_table_ibfk_2` FOREIGN KEY (`subcat_id`) REFERENCES `book_subcats` (`subcat_id`),
  CONSTRAINT `books_ad_table_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `members_table` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=latin1;

/*Data for the table `books_ad_table` */

insert  into `books_ad_table`(`ad_id`,`title`,`author`,`edition`,`copy`,`cond`,`des`,`cat_id`,`subcat_id`,`user_id`,`photo`,`posting_date`,`posting_time`,`ad_status`) values (139,'Discovery of Science','William Robert','2','original','Old','Very clearly defined.',3,13,45,'uploaded_files/517hUCFPAsL._SX329_BO1,204,203,200_.jpg','2016-09-14','01:16:48am',1),(140,'The Biology & its branches','Williams M.R','1','copy','Old','It is very simple to understand,some daily life examples are also given.',3,11,45,'uploaded_files/510Q6zqk5-L._SX330_BO1,204,203,200_.jpg','2016-09-14','01:19:20am',1),(141,'Planet Earth','John Moro','3','original','Old','Topics are well explained.',3,8,46,'uploaded_files/6a00e398228361883301b7c88d56bc970b-200wi.png','2016-09-21','01:26:39am',1),(142,'Software Re-Engineering','Williams R.K','2','original','New','Great!.',5,27,46,'uploaded_files/how-its-made-season-14-dvd-669_272.jpg','2016-09-22','22:16:03pm',1),(143,'Home Science','Shahnawaz Bhutto','3','copy','Old','Nice!',3,10,46,'uploaded_files/9788170631880.jpg','2016-09-22','22:17:17pm',2),(144,'Origin of Life','Charles Darwin','2','original','Old','Origin of Life is defined in a very beautiful manner.',3,10,45,'uploaded_files/00084924-295005_1000.jpg','2016-10-17','22:20:43pm',0),(146,'Great Big Book Of Germs','Henry Lord','4','original','Old','So helpful for beginners.',6,22,45,'uploaded_files/51Slf5+HDOL._AC_UL320_SR256,320_.jpg','2016-10-17','22:30:44pm',0),(147,'Media Influence on Society','Hyder Ali Rehman','2','copy','New','Very Well explained.',4,20,45,'uploaded_files/1.jpg','2016-11-12','16:35:00pm',0),(148,'Web Developer','henry kellton','2','original','New','this book for web developing',6,24,45,'uploaded_files/php.jpg','2016-11-19','23:27:35pm',0),(149,'Applied Calculus','urs shaikh','1','copy','Old','this is book is all about calculus.',1,2,50,'uploaded_files/book-ed2.jpg','2016-11-26','01:29:19am',1),(150,'Laplace Transform','Urs shaikh','3','original','Old','The Laplace transform is a wonderful tool for solving ordinary and partial differential equations and has enjoyed much success in this realm',1,5,50,'uploaded_files/laplace.jpg','2016-11-26','01:34:29am',1),(151,'Statistics and Probability','Jay L Devore','4','copy','Old','Statistics is about gaining information from sets of data.\r\nStatistics is intimately linked to probability theory. You can use statistics to work out the probability.',1,6,50,'uploaded_files/statistics.jpg','2016-11-26','01:41:21am',1),(152,'Differential Equation','Urs Shaikh','2','original','New','an equation involving derivatives of a function or functions.',1,3,45,'uploaded_files/differential.jpg','2016-11-26','01:47:05am',1),(153,'Head First Java','Kathy Sierra','2','copy','New','This is Programming subject.',6,22,45,'uploaded_files/Head_First_Java_Kathy_Sierra_Be.jpg','2016-11-26','01:55:32am',1),(154,'Computer Fundamental','Satish jain','3','original','Old','This book contain basic concept of computer.',5,27,46,'uploaded_files/digital computer fundamental.jpg','2016-11-26','02:05:17am',1),(155,'Digital Logic and Computer Design ','M Morris Mano','4','copy','New','From the name of book you can get concept.',5,27,46,'uploaded_files/download.jpg','2016-11-26','02:10:39am',1),(156,'Business Technology Society','kenneth C Laudon','2','original','New','E-Commerce Book.',4,19,47,'uploaded_files/commerce2.jpg','2016-11-26','02:18:40am',1),(157,'Basic English Grammer','Betty S Azar','2','copy','New','Grammer book.',2,15,47,'uploaded_files/basic english grammer.jpg','2016-11-26','02:23:21am',1);

/*Table structure for table `books_borrow` */

DROP TABLE IF EXISTS `books_borrow`;

CREATE TABLE `books_borrow` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `counter` int(11) DEFAULT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `books_borrow` */

/*Table structure for table `books_limit` */

DROP TABLE IF EXISTS `books_limit`;

CREATE TABLE `books_limit` (
  `limit_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `start` varchar(255) DEFAULT NULL,
  `end` varchar(255) DEFAULT NULL,
  `counter` int(11) DEFAULT NULL,
  PRIMARY KEY (`limit_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `books_limit_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `members_table` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `books_limit` */

/*Table structure for table `members_table` */

DROP TABLE IF EXISTS `members_table`;

CREATE TABLE `members_table` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `password` text,
  `contact` varchar(255) DEFAULT NULL,
  `photo` text,
  `city` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `nic` varchar(255) DEFAULT NULL,
  `aboutme` longtext,
  `question` varchar(255) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

/*Data for the table `members_table` */

insert  into `members_table`(`user_id`,`fname`,`lname`,`email`,`gender`,`password`,`contact`,`photo`,`city`,`time`,`date`,`nic`,`aboutme`,`question`,`answer`) values (45,'Sumeet','Khetpal','sumeetkhetpal13@gmail.com','male','509d3044576d44d8106421952f8090c4aa53700d','0331-2457844','uploaded_files/sumeet.png','Shikarpur','01:06:48am','2016-09-14','43304-8270356-3','I am a student and i believe that sharing is an only way to get inner peace. ','What is Your Nick Name','sumi'),(46,'Mehtab','Soomro','mehtabsoomro@hotmail.com','female','8c102922414e0c8ce108468014966dbe96d88fda','0332-3589849','uploaded_files/umer.jpg','Sukkur','01:12:14am','2016-09-14','43303-8984523-9','I love to serve humanity.\r\n','Who is your best friend','paras'),(47,'Ali','Memon','alimemon@yahoo.com','male','121e66c08ff5b99b6a4e048401dea478dcc46309','0331-3274859','uploaded_files/male_icon.png','karachi','11:46:02pm','2016-11-19','44152-0566878-9','i am a software engineer.','Who Is Your Favourite Uncle','khadam'),(50,'Vikas','Chander','vikas@yahoo.com','male','e20570ed2a33a90cbc872fee527d7043aed9e4b6','0312-4785999','uploaded_files/male_icon.png','hyderabad','06:46:15pm','2016-11-23','78596-6665555-4','hey i am software engineer.','Who Is Your Favourite Uncle','bhawani'),(51,'Umar','Shaikh','umarshaikh13@gmail.com','male','3c2bda6c9791e85f0b5ea4347082ebe68a1e9a04','0347-4086677','uploaded_files/male_icon.png','Hyderabad','10:30:17pm','2016-11-26','44106-9085653-2','Sharing is a best way to help others.','What is Your Nick Name','Salman');

/*Table structure for table `notifications` */

DROP TABLE IF EXISTS `notifications`;

CREATE TABLE `notifications` (
  `ntf_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `ruser_id` int(11) DEFAULT NULL,
  `ad_id` int(11) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `msg_status` int(11) DEFAULT NULL,
  `ntf_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`ntf_id`),
  KEY `ad_id` (`ad_id`),
  KEY `user_id` (`user_id`),
  KEY `ruser_id` (`ruser_id`),
  CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`ad_id`) REFERENCES `books_ad_table` (`ad_id`),
  CONSTRAINT `notifications_ibfk_5` FOREIGN KEY (`ruser_id`) REFERENCES `members_table` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=latin1;

/*Data for the table `notifications` */

/*Table structure for table `responses` */

DROP TABLE IF EXISTS `responses`;

CREATE TABLE `responses` (
  `ntf_id` int(11) DEFAULT NULL,
  `cnt_via` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `res_date` date DEFAULT NULL,
  `res_time` varchar(255) DEFAULT NULL,
  KEY `nf_id` (`ntf_id`),
  CONSTRAINT `responses_ibfk_3` FOREIGN KEY (`ntf_id`) REFERENCES `notifications` (`ntf_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `responses` */

insert  into `responses`(`ntf_id`,`cnt_via`,`contact`,`res_date`,`res_time`) values (140,'mobile','0332-3589849','2016-12-02','22:07:54pm'),(141,'email','mehtabsoomro@hotmail.com','2016-12-02','22:08:11pm'),(142,'mobile','0332-3589849','2016-12-02','22:08:26pm'),(143,NULL,NULL,'2016-12-02','18:45:20pm');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
