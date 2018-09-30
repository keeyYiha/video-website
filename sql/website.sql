-- MySQL dump 10.13  Distrib 5.7.22, for macos10.13 (x86_64)
--
-- Host: localhost    Database: website
-- ------------------------------------------------------
-- Server version	5.7.22

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
-- Table structure for table `admin_menu`
--

DROP TABLE IF EXISTS `admin_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  CONSTRAINT `admin_menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `admin_menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_menu`
--

LOCK TABLES `admin_menu` WRITE;
/*!40000 ALTER TABLE `admin_menu` DISABLE KEYS */;
INSERT INTO `admin_menu` VALUES (8,'首页',NULL,NULL,NULL,NULL,1538192954,1538192954),(9,'用户设置',8,NULL,NULL,NULL,1538203424,1538283117),(11,'GII',8,'/gii/default/index',10,NULL,1538275385,1538283219),(12,'首页',8,'/site/index',NULL,NULL,1538278100,1538281139),(13,'菜单管理',9,'/admin/menu/index',NULL,NULL,1538282615,1538282615),(14,'权限管理',9,'/admin/permission/index',NULL,NULL,1538282777,1538282777),(15,'角色管理',9,'/admin/role/index',NULL,NULL,1538282826,1538282826),(16,'规则管理',9,'/admin/rule/index',NULL,NULL,1538282897,1538282897),(17,'用户作业',9,'/admin/assignment/index',NULL,NULL,1538282966,1538282966),(18,'路由管理',9,'/admin/route/index',NULL,NULL,1538283070,1538283070),(19,'用户管理',9,'/admin/user/index',NULL,NULL,1538283142,1538283142);
/*!40000 ALTER TABLE `admin_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_user`
--

DROP TABLE IF EXISTS `admin_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT '0',
  `updated_at` int(11) DEFAULT '0',
  `email` varchar(255) DEFAULT '',
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_user`
--

LOCK TABLES `admin_user` WRITE;
/*!40000 ALTER TABLE `admin_user` DISABLE KEYS */;
INSERT INTO `admin_user` VALUES (1,'bayer.hudson','HP187Mvq7Mmm3CTU80dLkGmni_FUH_lR','$2y$13$EjaPFBnZOQsHdGuHI.xvhuDp1fHpo8hKRSk6yshqa9c5EG8s3C3lO','ExzkCOaYc1L8IOBs4wdTGGbgNiG3Wz1I_1402312317',1499900000,1499900000,'',10);
/*!40000 ALTER TABLE `admin_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_assignment`
--

LOCK TABLES `auth_assignment` WRITE;
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;
INSERT INTO `auth_assignment` VALUES ('admin','1',1536570804),('author','2',1536570804);
/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item`
--

LOCK TABLES `auth_item` WRITE;
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;
INSERT INTO `auth_item` VALUES ('/*',2,NULL,NULL,NULL,1538182939,1538182939),('/admin/*',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/assignment/*',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/assignment/assign',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/assignment/index',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/assignment/revoke',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/assignment/view',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/menu/*',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/menu/create',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/menu/delete',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/menu/index',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/menu/update',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/menu/view',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/permission/*',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/permission/assign',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/permission/create',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/permission/delete',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/permission/index',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/permission/remove',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/permission/update',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/permission/view',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/role/*',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/role/assign',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/role/create',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/role/delete',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/role/index',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/role/remove',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/role/update',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/role/view',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/route/*',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/route/assign',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/route/create',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/route/index',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/route/refresh',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/route/remove',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/rule/*',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/rule/create',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/rule/delete',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/rule/index',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/rule/update',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/rule/view',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/user/*',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/user/activate',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/user/change-password',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/user/delete',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/user/index',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/user/login',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/user/logout',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/user/request-password-reset',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/user/reset-password',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/user/signup',2,NULL,NULL,NULL,1538191815,1538191815),('/admin/user/view',2,NULL,NULL,NULL,1538191815,1538191815),('/content/*',2,NULL,NULL,NULL,1538191815,1538191815),('/content/actor/*',2,NULL,NULL,NULL,1538191815,1538191815),('/content/actor/create',2,NULL,NULL,NULL,1538191815,1538191815),('/content/actor/delete',2,NULL,NULL,NULL,1538191815,1538191815),('/content/actor/index',2,NULL,NULL,NULL,1538191815,1538191815),('/content/actor/update',2,NULL,NULL,NULL,1538191815,1538191815),('/content/actor/view',2,NULL,NULL,NULL,1538191815,1538191815),('/content/video/*',2,NULL,NULL,NULL,1538191815,1538191815),('/content/video/index',2,NULL,NULL,NULL,1538191815,1538191815),('/content/video/upload',2,NULL,NULL,NULL,1538191815,1538191815),('/debug/*',2,NULL,NULL,NULL,1538191815,1538191815),('/debug/default/*',2,NULL,NULL,NULL,1538191815,1538191815),('/debug/default/db-explain',2,NULL,NULL,NULL,1538191815,1538191815),('/debug/default/download-mail',2,NULL,NULL,NULL,1538191815,1538191815),('/debug/default/index',2,NULL,NULL,NULL,1538191815,1538191815),('/debug/default/toolbar',2,NULL,NULL,NULL,1538191815,1538191815),('/debug/default/view',2,NULL,NULL,NULL,1538191815,1538191815),('/debug/user/*',2,NULL,NULL,NULL,1538191815,1538191815),('/debug/user/reset-identity',2,NULL,NULL,NULL,1538191815,1538191815),('/debug/user/set-identity',2,NULL,NULL,NULL,1538191815,1538191815),('/gii/*',2,NULL,NULL,NULL,1538191815,1538191815),('/gii/default/*',2,NULL,NULL,NULL,1538191815,1538191815),('/gii/default/action',2,NULL,NULL,NULL,1538191815,1538191815),('/gii/default/diff',2,NULL,NULL,NULL,1538191815,1538191815),('/gii/default/index',2,NULL,NULL,NULL,1538191815,1538191815),('/gii/default/preview',2,NULL,NULL,NULL,1538191815,1538191815),('/gii/default/view',2,NULL,NULL,NULL,1538191815,1538191815),('/site/*',2,NULL,NULL,NULL,1538191815,1538191815),('/site/error',2,NULL,NULL,NULL,1538191815,1538191815),('/site/index',2,NULL,NULL,NULL,1538191815,1538191815),('/site/login',2,NULL,NULL,NULL,1538191815,1538191815),('/site/logout',2,NULL,NULL,NULL,1538191815,1538191815),('admin',1,NULL,NULL,NULL,1536570804,1536570804),('author',1,NULL,NULL,NULL,1536570804,1536570804),('createPost',2,'Create a post',NULL,NULL,1536570804,1536570804),('updatePost',2,'Update post',NULL,NULL,1536570804,1536570804);
/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item_child`
--

LOCK TABLES `auth_item_child` WRITE;
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;
INSERT INTO `auth_item_child` VALUES ('admin','/*'),('author','createPost');
/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_rule`
--

LOCK TABLES `auth_rule` WRITE;
/*!40000 ALTER TABLE `auth_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_rule` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-30 14:40:10
