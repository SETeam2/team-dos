-- MySQL dump 10.13  Distrib 5.5.46, for Linux (x86_64)
--
-- Host: localhost    Database: nan
-- ------------------------------------------------------
-- Server version	5.5.46

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `chat_logs`
--

DROP TABLE IF EXISTS `chat_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chat_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author` varchar(16) NOT NULL,
  `email` varchar(32) NOT NULL,
  `text` varchar(255) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `project_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat_logs`
--

LOCK TABLES `chat_logs` WRITE;
/*!40000 ALTER TABLE `chat_logs` DISABLE KEYS */;
INSERT INTO `chat_logs` VALUES (1,'nsun1989','','test','2016-07-05 23:14:10',1),(2,'nansun','','Helloworld','2016-07-05 23:18:56',1),(3,'nansun','','blahblah','2016-07-05 23:42:23',1),(4,'nansun','','can anyone hear me?','2016-07-05 23:56:33',1),(5,'welcome123','','test','2016-07-06 01:25:02',1),(6,'adam','','hello!','2016-07-06 03:33:42',1),(7,'adam','','this is pretty awesome','2016-07-06 03:33:54',1),(8,'abc','','Hi!','2016-07-06 13:13:43',1),(9,'abc','','Looks great!','2016-07-06 13:13:57',1),(10,'albert','','Any way we can add a date eventually?','2016-07-06 15:58:29',1),(11,'albert','','this is great!','2016-07-06 15:59:07',1),(12,'nansun','','sure, why not. ill add it','2016-07-06 15:59:07',1),(13,'albert','','great job man','2016-07-06 15:59:21',1),(14,'nansun','','thanks. ','2016-07-06 15:59:36',1),(15,'nansun','','test','2016-07-07 19:07:15',1),(16,'nansun','','test date July 7 2016, 03:02 PM','2016-07-07 19:08:09',1),(17,'nansun','','test 4','2016-07-07 19:15:22',1),(18,'nansun','','test date 2 July 7 2016, 03:15 PM','2016-07-07 19:15:43',1),(19,'nansun','','test date 3 July 7 2016, 03:15 PM','2016-07-07 19:17:53',1),(20,'nansun','','test date 4 July 7 2016, 03:19 PM','2016-07-07 19:19:20',1),(21,'nansun','','long message test, maxlength for each message are curentily set to 255.  Boston University (most commonly referred to as BU or otherwise known as Boston U.) is a private research university located in Boston, Massachusetts. The university is nonsectarian,','2016-07-07 19:27:31',1),(22,'nansun','','test for weird symbol, ~!@#$%^&amp;*(){}|&quot;:&gt;?[]\\;\',./&lt;&gt;?=/*-+.`','2016-07-07 19:28:55',1),(23,'nansun','','&quot;','2016-07-07 19:29:03',1),(24,'nansun','','\' ','2016-07-07 19:29:09',1),(25,'nansun','','sql injection test','2016-07-07 19:30:35',1),(26,'nansun','','DROP users;-- ','2016-07-07 19:30:46',1),(27,'nansun','',' SELECT /*!32302 1/0, */ 1 FROM users','2016-07-07 19:31:48',1),(28,'Nan Sun','sunnan1989@gmail.com','test, login use facebook','2016-07-07 21:12:54',1),(29,'Nan Sun','sunnan1989@gmail.com','test, logout ','2016-07-07 21:16:27',1),(30,'sunnan1989','','test new account user name','2016-07-08 18:11:49',1),(31,'sunnan1989','','password reset test2','2016-07-08 18:13:49',1),(32,'sunnan1989','','success','2016-07-08 18:13:53',1),(33,'nansun','','chat test','2016-07-08 19:51:55',1),(34,'nansun','','test test','2016-07-08 21:29:21',1),(35,'Henry Huang','omgitshenry@gmail.com','Hey guys','2016-07-08 22:56:23',1),(36,'Henry Huang','omgitshenry@gmail.com','Noice. ','2016-07-08 22:56:29',1),(38,'Henry Huang','omgitshenry@gmail.com','test','2016-07-08 22:57:09',1),(39,'Henry Huang','omgitshenry@gmail.com','probably need to delete my stupid comment','2016-07-08 22:57:24',1),(40,'Henry Huang','omgitshenry@gmail.com','now we have a scroll bar','2016-07-08 22:57:28',1),(41,'Nan Sun','sunnan1989@gmail.com','no worry i hidde it now','2016-07-08 22:58:00',1),(42,'Nan Sun','sunnan1989@gmail.com','the only reason why this is happen is your comment dont have a space in it.','2016-07-08 23:01:59',1),(43,'rec1','','kjsdf;lkjdoijopijxpoijsn oijpoijdkno;ijsdofijo ;ixjopzidjfovp980u534jinv98pxn p98hjefinuvp98x np98hreklsnv899elnvl89er8uoxic n989epn p98hjpdso8efjo9 no978eshfnilu nxl8elfnilv 89jlxenl8i j','2016-07-09 00:32:09',1),(44,'rec1','','nice chat','2016-07-09 00:32:20',1),(45,'rec1','','very cool','2016-07-09 00:32:50',1),(46,'nansun','','hello thank you','2016-07-09 00:32:55',1),(47,'rec1','','no problem','2016-07-09 00:33:00',1),(48,'Albert Lee','alee3@bu.edu','I uploaded the Quad Report','2016-07-09 00:53:24',1),(49,'Adam Mullarkey','acmullarkey@gmail.com','http://ondras.zarovi.cz/sql/demo/','2016-07-09 01:25:05',1),(50,'Nan Sun','sunnan1989@gmail.com','for now on, the master branch is http://52.203.18.172/master/','2016-07-09 01:41:29',1),(52,'Nan Sun','sunnan1989@gmail.com','Hi','2016-07-11 16:50:54',1),(53,'Albert Lee','alee3@bu.edu','cd','2016-07-12 01:27:21',1),(54,'nansun','','test message for chat2','2016-07-15 19:52:07',0),(55,'nansun','','test','2016-07-15 19:56:52',0),(56,'nansun','','test','2016-07-15 19:57:43',0),(59,'nansun','','1','2016-07-15 20:04:37',2),(60,'nansun','','test message for project 2','2016-07-15 20:06:01',2),(61,'nansun','','1','2016-07-15 20:08:12',1),(62,'nansun','','test message for goup chat','2016-07-15 20:08:40',1),(63,'nansun','','welcome guys, this is the public chat room available for all the users and guest.','2016-07-15 20:10:50',0),(64,'Henry Huang','omgitshenry@gmail.com','hey guys','2016-07-18 04:36:47',0),(65,'Henry Huang','omgitshenry@gmail.com','we really need a single db now - i\'m running into bugs just b/c i\'m confusing databases','2016-07-18 04:37:12',0),(66,'Henry Huang','omgitshenry@gmail.com','we\'re pretty much set with the fields in issues/task, may set them as strings instead of ints','2016-07-18 04:37:47',0),(67,'Henry Huang','omgitshenry@gmail.com','we can talk tomorrow','2016-07-18 04:37:51',0),(68,'nansun','nsun1989@gmail.com','hello','2016-07-18 22:41:38',0),(69,'Henry Huang','omgitshenry@gmail.com','yo','2016-07-18 23:39:08',0),(70,'nansun','nsun1989@gmail.com','hey','2016-07-18 23:40:30',0),(71,'nansun','nsun1989@gmail.com','you use facebook login right?','2016-07-18 23:40:49',0),(72,'Henry Huang','omgitshenry@gmail.com','yes','2016-07-18 23:52:43',0);
/*!40000 ALTER TABLE `chat_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `parent_post_id` int(11) NOT NULL,
  `comment_text` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by_developer` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_post_id` (`parent_post_id`),
  KEY `created_by_developer` (`created_by_developer`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`parent_post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`created_by_developer`) REFERENCES `posts` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `messages_text` varchar(255) NOT NULL,
  `created_by_developer` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `created_by_developer` (`created_by_developer`),
  CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`created_by_developer`) REFERENCES `posts` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `project_developers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_developers`
--

DROP TABLE IF EXISTS `project_developers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_developers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `project_id` (`project_id`),
  CONSTRAINT `project_developers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `project_developers_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_developers`
--

LOCK TABLES `project_developers` WRITE;
/*!40000 ALTER TABLE `project_developers` DISABLE KEYS */;
INSERT INTO `project_developers` VALUES (1,1,1),(2,6,1),(3,5,1),(4,8,1),(5,9,1),(6,13,1),(7,14,1),(8,15,1),(9,1,2),(10,17,1);
/*!40000 ALTER TABLE `project_developers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'teamdos'),(2,'teamdos-chat'),(3,'teamdos-project'),(4,'teamdos-story');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stories`
--

DROP TABLE IF EXISTS `stories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stories` (
  `id` int(11) NOT NULL,
  `story_name` varchar(128) NOT NULL,
  `story_description` varchar(4096) NOT NULL,
  `created_by_developer` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `created_by_developer` (`created_by_developer`),
  CONSTRAINT `stories_ibfk_1` FOREIGN KEY (`created_by_developer`) REFERENCES `posts` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stories`
--

LOCK TABLES `stories` WRITE;
/*!40000 ALTER TABLE `stories` DISABLE KEYS */;
/*!40000 ALTER TABLE `stories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `story_id` int(11) DEFAULT NULL,
  `task_name` varchar(128) NOT NULL,
  `task_description` varchar(4096) NOT NULL,
  `created_by_developer` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `created_by_developer` (`created_by_developer`),
  KEY `story_id` (`story_id`),
  CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`created_by_developer`) REFERENCES `posts` (`created_by`),
  CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`story_id`) REFERENCES `stories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(36) NOT NULL,
  `password` varchar(24) NOT NULL,
  `email` varchar(255) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'nansun','54321','nsun1989@gmail.com','2016-07-05 23:18:29'),(2,'welcome123','welcome123','example@bu.edu','2016-07-06 01:23:56'),(3,'adam','password','adam@adam.com','2016-07-06 03:33:20'),(4,'abc','abc','a@b.c','2016-07-06 13:12:57'),(5,'albert','password','alee3@bu.edu','2016-07-06 15:52:51'),(6,'henry_test','test','hhuang991@gmail.com','2016-07-08 01:22:18'),(8,'patq','welcome123','pquerido@bu.edu','2016-07-08 21:54:38'),(9,'rec1','rec1','rec@bu.edu','2016-07-09 00:30:17'),(10,'sjl','1234','sangjlee@bu.edu','2016-07-11 18:55:45'),(11,'letester','changee','letest@bu.edu','2016-07-11 21:54:12'),(12,'changeme','changeme','changeme@bu.edu','2016-07-11 21:54:51'),(13,'wan','hello123','wan.chen1@gmail.com','2016-07-12 01:28:39'),(14,'Adam Mullarkey','12345','acmullarkey@gmail.com','2016-07-14 19:24:06'),(15,'Philippe Bouzy','12345','pbouzy@gmail.com','2016-07-14 19:24:54'),(16,'Nan Sun','facebook','sunnan1989@gmail.com','2016-07-18 23:23:09'),(17,'Henry Huang','facebook','omgitshenry@gmail.com','2016-07-18 23:35:58');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-18 23:53:31
