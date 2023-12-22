-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: articleManagement
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(8,'2023_12_13_130106_create_posts_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (2,'Tiêu đề bài viết 2','tieu-de-bai-viet-2','Mô tả cho bài viết 2','image2.jpg','Nội dung của bài viết 2','2023-12-15 11:28:20','2023-12-15 11:28:20'),(3,'Tiêu đề bài viết 3','tieu-de-bai-viet-3','Mô tả cho bài viết 3','image3.jpg','Nội dung của bài viết 3','2023-12-15 11:28:20','2023-12-15 11:28:20'),(4,'Tiêu đề bài viết 4','tieu-de-bai-viet-4','Mô tả cho bài viết 4','image4.jpg','Nội dung của bài viết 4','2023-12-15 11:28:20','2023-12-15 11:28:20'),(5,'Tiêu đề bài viết 5','tieu-de-bai-viet-5','Mô tả cho bài viết 5','image5.jpg','Nội dung của bài viết 5','2023-12-15 11:28:20','2023-12-15 11:28:20'),(6,'Tiêu đề bài viết 6','tieu-de-bai-viet-6','Mô tả cho bài viết 6','image6.jpg','Nội dung của bài viết 6','2023-12-15 11:28:20','2023-12-15 11:28:20'),(7,'Tiêu đề bài viết 7','tieu-de-bai-viet-7','Mô tả cho bài viết 7','image7.jpg','Nội dung của bài viết 7','2023-12-15 11:28:20','2023-12-15 11:28:20'),(8,'Tiêu đề bài viết 8','tieu-de-bai-viet-8','Mô tả cho bài viết 8','image8.jpg','Nội dung của bài viết 8','2023-12-15 11:28:20','2023-12-15 11:28:20'),(9,'Tiêu đề bài viết 9','tieu-de-bai-viet-9','Mô tả cho bài viết 9','image9.jpg','Nội dung của bài viết 9','2023-12-15 11:28:20','2023-12-15 11:28:20'),(10,'Tiêu đề bài viết 10','tieu-de-bai-viet-10','Mô tả cho bài viết 10','image10.jpg','Nội dung của bài viết 10','2023-12-15 11:28:20','2023-12-15 11:28:20'),(11,'Tiêu đề bài viết 11','tieu-de-bai-viet-11','Mô tả cho bài viết 11','image11.jpg','Nội dung của bài viết 11','2023-12-15 11:28:20','2023-12-15 11:28:20'),(12,'Tiêu đề bài viết 12','tieu-de-bai-viet-12','Mô tả cho bài viết 12','image12.jpg','Nội dung của bài viết 12','2023-12-15 11:28:20','2023-12-15 11:28:20');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seos`
--

DROP TABLE IF EXISTS `seos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `seo_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seos`
--

LOCK TABLES `seos` WRITE;
/*!40000 ALTER TABLE `seos` DISABLE KEYS */;
INSERT INTO `seos` VALUES (2,'Từ khóa SEO cho Tiêu đề bài viết 2','Mô tả SEO cho Tiêu đề bài viết 2','Tiêu đề SEO cho Tiêu đề bài viết 2',2,'2023-12-15 11:28:23','2023-12-15 11:28:23'),(3,'Từ khóa SEO cho Tiêu đề bài viết 3','Mô tả SEO cho Tiêu đề bài viết 3','Tiêu đề SEO cho Tiêu đề bài viết 3',3,'2023-12-15 11:28:23','2023-12-15 11:28:23'),(4,'Từ khóa SEO cho Tiêu đề bài viết 4','Mô tả SEO cho Tiêu đề bài viết 4','Tiêu đề SEO cho Tiêu đề bài viết 4',4,'2023-12-15 11:28:23','2023-12-15 11:28:23'),(5,'Từ khóa SEO cho Tiêu đề bài viết 5','Mô tả SEO cho Tiêu đề bài viết 5','Tiêu đề SEO cho Tiêu đề bài viết 5',5,'2023-12-15 11:28:23','2023-12-15 11:28:23'),(6,'Từ khóa SEO cho Tiêu đề bài viết 6','Mô tả SEO cho Tiêu đề bài viết 6','Tiêu đề SEO cho Tiêu đề bài viết 6',6,'2023-12-15 11:28:23','2023-12-15 11:28:23'),(7,'Từ khóa SEO cho Tiêu đề bài viết 7','Mô tả SEO cho Tiêu đề bài viết 7','Tiêu đề SEO cho Tiêu đề bài viết 7',7,'2023-12-15 11:28:23','2023-12-15 11:28:23'),(8,'Từ khóa SEO cho Tiêu đề bài viết 8','Mô tả SEO cho Tiêu đề bài viết 8','Tiêu đề SEO cho Tiêu đề bài viết 8',8,'2023-12-15 11:28:23','2023-12-15 11:28:23'),(9,'Từ khóa SEO cho Tiêu đề bài viết 9','Mô tả SEO cho Tiêu đề bài viết 9','Tiêu đề SEO cho Tiêu đề bài viết 9',9,'2023-12-15 11:28:23','2023-12-15 11:28:23'),(10,'Từ khóa SEO cho Tiêu đề bài viết 10','Mô tả SEO cho Tiêu đề bài viết 10','Tiêu đề SEO cho Tiêu đề bài viết 10',10,'2023-12-15 11:28:23','2023-12-15 11:28:23'),(11,'Từ khóa SEO cho Tiêu đề bài viết 11','Mô tả SEO cho Tiêu đề bài viết 11','Tiêu đề SEO cho Tiêu đề bài viết 11',11,'2023-12-15 11:28:23','2023-12-15 11:28:23'),(12,'Từ khóa SEO cho Tiêu đề bài viết 12','Mô tả SEO cho Tiêu đề bài viết 12','Tiêu đề SEO cho Tiêu đề bài viết 12',12,'2023-12-15 11:28:23','2023-12-15 11:28:23');
/*!40000 ALTER TABLE `seos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2023-12-15 21:40:47
