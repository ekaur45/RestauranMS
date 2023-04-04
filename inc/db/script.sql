CREATE DATABASE  IF NOT EXISTS `restaurantms` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `restaurantms`;
-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: restaurantms
-- ------------------------------------------------------
-- Server version	8.0.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `restaurant_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `party_size` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (1,7,1,'2023-04-03','23:36:00',3),(2,7,1,'2023-04-04','09:08:00',2);
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restaurant_images`
--

DROP TABLE IF EXISTS `restaurant_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `restaurant_images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `restaurant_id` int DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurant_images`
--

LOCK TABLES `restaurant_images` WRITE;
/*!40000 ALTER TABLE `restaurant_images` DISABLE KEYS */;
INSERT INTO `restaurant_images` VALUES (1,6,'uploads/kallisto.jpg'),(2,7,'uploads/ta-img-20170125-172119.jpg'),(3,8,'uploads/kallisto.jpg'),(4,9,'uploads/vege-fried-rice.jpg'),(5,9,'uploads/img-840e5f2a3e17a8f60eae0c8f9f.jpg'),(6,9,'uploads/img-8cf813fd3bdc1205115b079e3e.jpg');
/*!40000 ALTER TABLE `restaurant_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restaurants`
--

DROP TABLE IF EXISTS `restaurants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `restaurants` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `cuisine` varchar(255) DEFAULT NULL,
  `price_range` enum('cheap','moderate','expensive') DEFAULT NULL,
  `menu` text,
  `photos` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurants`
--

LOCK TABLES `restaurants` WRITE;
/*!40000 ALTER TABLE `restaurants` DISABLE KEYS */;
INSERT INTO `restaurants` VALUES (7,'Tehzeeb Bakers','41-A Hospital Road, Rawalpindi 46000 Pakistan','Pizza, Grill, Pakistani','moderate',NULL,NULL),(6,'Kallisto','Barbecue','Barbecue','expensive',NULL,NULL),(9,'Mei Kong - old','Saddar, Rawalpindi Pakistan','Chinese, Soups','expensive',NULL,NULL);
/*!40000 ALTER TABLE `restaurants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `restaurant_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `rating` int DEFAULT NULL,
  `comments` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,2,1,5,'comment'),(2,2,1,3,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries'),(3,4,1,1,'I bought a couple of cakes from Tehzeeb recently and they were the worst cakes I ever tasted. Their service was already crappy and so is their cakes now. Their sponge is super dry and hard, loaded with tons of sugar. Don\'t recommend this place for cakes at least.'),(4,9,2,4,'MeiKong is getting expensive day by day.I visited it today 28th july and found the food pathetic food specially fish and fried rice.Worst experience ever in MeiKong saddar.'),(5,7,0,5,'Tehzeeb bakers has different branches in Rawalpindi now, i visited satellite town branch, it has good pizza available compare to any other in the town, now they also have limited seating available outside the bakery so if you get the seat you can enjoy it but its all self service.\r\nYou can buy fresh bakery items, even it might look expensive but quality matters. If you are coming to Rawalpindi do try it.\r\nPizza will be ready in 15 to 20 mins'),(6,7,0,5,'Tehzeeb bakers has different branches in Rawalpindi now, i visited satellite town branch, it has good pizza available compare to any other in the town, now they also have limited seating available outside the bakery so if you get the seat you can enjoy it but its all self service.'),(7,7,3,2,'Tehzeeb bakers has different branches in Rawalpindi now, i visited satellite town branch, it has good pizza available compare to any other in the town, now they also have limited seating available outside the bakery so if you get the seat you can enjoy it but its all self service.\r\nYou can buy fresh bakery items, even it might look expensive but quality matters. If you are coming to Rawalpindi do try it.\r\nPizza will be ready in 15 to 20 mins'),(8,7,3,5,'Tehzeeb bakers has different branches in Rawalpindi now, i visited satellite town branch, it has good pizza available compare to any other in the town, now they also have limited seating available outside the bakery so if you get the seat you can enjoy it but its all self service.\r\nYou can buy fresh bakery items, even it might look expensive but quality matters. If you are coming to Rawalpindi do try it.\r\nPizza will be ready in 15 to 20 mins'),(10,7,3,4,'Tehzeeb bakers has different branches in Rawalpindi now, i visited satellite town branch, it has good pizza available compare to any other in the town, now they also have limited seating');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `role` enum('user','admin') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'waqas','waqas@email.com','70b4269b412a8af42b1f7b0d26eceff2','admin'),(2,'ali','ali@email.com','e10adc3949ba59abbe56e057f20f883e','user'),(3,'Aakash','aakash@email.com','e10adc3949ba59abbe56e057f20f883e','user');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'restaurantms'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-04 14:38:36
