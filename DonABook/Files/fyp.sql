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
CREATE DATABASE /*!32312 IF NOT EXISTS*/`fyp` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `fyp`;

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

insert  into `book_subcats`(`subcat_id`,`subcat_name`,`cat_id`) values (1,'Algebra',1),(2,'Calculus',1),(3,'Discrete Mathematics',1),(4,'Geometry',1),(5,'Laplace Transform',1),(6,'Statistics',1),(7,'Basic Maths',1),(8,'Physics',3),(9,'Chemistry',3),(10,'Biology',3),(11,'Botany',3),(12,'Anatomy',3),(13,'Astrology',3),(14,'Bsic English',3),(15,'Grammer',2),(16,'Literature',2),(17,'Novel',2),(18,'Accounting',4),(19,'Economics',4),(20,'Principals Of Commerce',4),(21,'C++',6),(22,'Java',6),(23,'ASP.NET',6),(24,'PHP',6),(25,'Python',6),(26,'Hardware',5),(27,'Software',5),(28,'System Networking',5),(29,'System Security',5);

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
  `photo` varchar(255) DEFAULT NULL,
  `posting_date` date DEFAULT NULL,
  `posting_time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ad_id`),
  KEY `user_id` (`user_id`),
  KEY `subcats_id` (`subcat_id`),
  CONSTRAINT `books_ad_table_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `login` (`user_id`),
  CONSTRAINT `books_ad_table_ibfk_2` FOREIGN KEY (`subcat_id`) REFERENCES `book_subcats` (`subcat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;

/*Data for the table `books_ad_table` */

insert  into `books_ad_table`(`ad_id`,`title`,`author`,`edition`,`copy`,`cond`,`des`,`cat_id`,`subcat_id`,`user_id`,`photo`,`posting_date`,`posting_time`) values (122,'Social Affairs','Abdul Tahir','2nd','on','on','Cover almost all the topics of social issues.',4,19,2,'uploaded_files/image03.jpg','2016-09-01','23:50:48pm'),(123,'English Grammer','Umar Sheikh','2nd','on','on','Easy to understand English.',2,15,2,'uploaded_files/image-best03.jpg','2016-09-02','20:51:21pm');

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `login` */

insert  into `login`(`user_id`,`name`,`email`,`password`,`contact`) values (1,'sumeet','sumeetkhetpal13@gmail.com','1234','0900'),(2,'sameer','sameerdodai@hotmail.com','1234','0800'),(3,'paras','paraslal@yahoo.com','1234','0700'),(4,'umar','umarsheikh@gmail.com','1234','0600');

/*Table structure for table `notifications` */

DROP TABLE IF EXISTS `notifications`;

CREATE TABLE `notifications` (
  `ntf_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `ruser_id` int(11) DEFAULT NULL,
  `ad_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ntf_id`),
  KEY `ad_id` (`ad_id`),
  KEY `user_id` (`user_id`),
  KEY `ruser_id` (`ruser_id`),
  CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`ad_id`) REFERENCES `books_ad_table` (`ad_id`),
  CONSTRAINT `notifications_ibfk_4` FOREIGN KEY (`ruser_id`) REFERENCES `login` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `notifications` */

insert  into `notifications`(`ntf_id`,`user_id`,`ruser_id`,`ad_id`,`date`,`time`) values (7,2,2,122,'2016-09-02','00:42:18am'),(8,2,2,123,'2016-09-02','21:00:43pm');

/*Table structure for table `responses` */

DROP TABLE IF EXISTS `responses`;

CREATE TABLE `responses` (
  `ntf_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `cnt_via` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `res_date` date DEFAULT NULL,
  `res_time` varchar(255) DEFAULT NULL,
  KEY `nf_id` (`ntf_id`),
  CONSTRAINT `responses_ibfk_3` FOREIGN KEY (`ntf_id`) REFERENCES `notifications` (`ntf_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `responses` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
