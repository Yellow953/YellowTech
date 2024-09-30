-- MySQL dump 10.13  Distrib 8.0.37, for Linux (x86_64)
--
-- Host: localhost    Database: yellowtech
-- ------------------------------------------------------
-- Server version	8.0.37-0ubuntu0.22.04.3

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
-- Table structure for table `attachments`
--

DROP TABLE IF EXISTS `attachments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attachments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `project_id` bigint unsigned DEFAULT NULL,
  `ticket_id` bigint unsigned DEFAULT NULL,
  `product_id` bigint unsigned DEFAULT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attachments_project_id_foreign` (`project_id`),
  KEY `attachments_ticket_id_foreign` (`ticket_id`),
  KEY `attachments_product_id_foreign` (`product_id`),
  CONSTRAINT `attachments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `attachments_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  CONSTRAINT `attachments_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attachments`
--

LOCK TABLES `attachments` WRITE;
/*!40000 ALTER TABLE `attachments` DISABLE KEYS */;
/*!40000 ALTER TABLE `attachments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Software','This is a software category','2024-07-14 14:23:02','2024-07-14 14:23:02'),(2,'Hardware','This is a hardware category','2024-07-14 14:23:02','2024-07-14 14:23:02');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `events_user_id_foreign` (`user_id`),
  CONSTRAINT `events_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `invoice_items`
--

DROP TABLE IF EXISTS `invoice_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoice_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `invoice_id` bigint unsigned NOT NULL,
  `item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` double NOT NULL DEFAULT '1',
  `unit_price` double NOT NULL DEFAULT '0',
  `total_price` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoice_items_invoice_id_foreign` (`invoice_id`),
  CONSTRAINT `invoice_items_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_items`
--

LOCK TABLES `invoice_items` WRITE;
/*!40000 ALTER TABLE `invoice_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoice_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoices` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `invoice_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `due_date` date DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USD',
  `rate` double NOT NULL DEFAULT '1',
  `project_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `sub_total` double NOT NULL DEFAULT '0',
  `total_price` double NOT NULL DEFAULT '0',
  `note` text COLLATE utf8mb4_unicode_ci,
  `discount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoices_project_id_foreign` (`project_id`),
  KEY `invoices_user_id_foreign` (`user_id`),
  CONSTRAINT `invoices_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  CONSTRAINT `invoices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices`
--

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `logs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(6,'2024_02_13_181052_create_logs_table',1),(7,'2024_03_08_233529_create_todos_table',1),(8,'2024_03_09_230010_create_events_table',1),(9,'2024_03_13_133452_create_projects_table',1),(10,'2024_03_13_133500_create_tickets_table',1),(11,'2024_03_13_133506_create_invoices_table',1),(12,'2024_03_13_134916_create_invoice_items_table',1),(13,'2024_03_20_204426_create_categories_table',1),(14,'2024_03_20_204452_create_products_table',1),(15,'2024_03_20_204508_create_promos_table',1),(16,'2024_03_20_204509_create_orders_table',1),(17,'2024_03_20_205727_create_product_order_table',1),(18,'2024_03_20_905415_create_attachements_table',1),(19,'2024_07_08_081500_create_search_routes_table',1),(20,'2024_07_11_115011_create_trackings_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `total_price` double unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `product_order`
--

DROP TABLE IF EXISTS `product_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_order` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `order_id` bigint unsigned NOT NULL,
  `quantity` double NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_order_product_id_foreign` (`product_id`),
  KEY `product_order_order_id_foreign` (`order_id`),
  CONSTRAINT `product_order_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_order_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_order`
--

LOCK TABLES `product_order` WRITE;
/*!40000 ALTER TABLE `product_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` double NOT NULL DEFAULT '0',
  `unit_cost` double unsigned NOT NULL DEFAULT '0',
  `unit_price` double unsigned NOT NULL DEFAULT '0',
  `compare_price` double unsigned DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `keywords` text COLLATE utf8mb4_unicode_ci,
  `condition` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'assets/images/no_img.png',
  `category_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_name_unique` (`name`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'YellowPOS',1000,0,200,250,'YellowPOS is the all in 1 tool to run your sales business...','YellowPOS, POS Lebanon, software lebanon','new','uploads/products/Banner.jpg',1,'2024-07-14 14:23:02','2024-07-14 14:23:02'),(2,'Stockify',1000,0,1000,1500,'Stockify is a cloud based inventory management software, accounting system, invoicing system with digital signature and excell integrations and more...','Stockify, accounting system Lebanon, software lebanon, inventory management system','new','uploads/products/Banner.jpg',1,'2024-07-14 14:23:02','2024-07-14 14:23:02'),(3,'Barcode Scanner',1000,20,30,50,'Barcode Reader/Scanner, 2D/3D, USB/Wired/Wireless','Barcode Scanner, Barcode Scanner Lebanon, POS, 3D barcode','new','uploads/products/final-barcode-scanner.png',2,'2024-07-14 14:23:02','2024-07-14 14:23:02'),(4,'Mouse Pen',1000,10,20,25,'Ever wanted a precise tool to paint? Introducing the new digital mouse pen that allows you to perform very precise and easy mouse clicks...','mouse pen, mouse pen lebanon, mouse, painting, digital tool','new','uploads/products/pocket-mouse-pen.jpg',2,'2024-07-14 14:23:02','2024-07-14 14:23:02');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `projects` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `delivery_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `projects_name_unique` (`name`),
  KEY `projects_user_id_foreign` (`user_id`),
  CONSTRAINT `projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promos`
--

DROP TABLE IF EXISTS `promos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `promos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `promos_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promos`
--

LOCK TABLES `promos` WRITE;
/*!40000 ALTER TABLE `promos` DISABLE KEYS */;
INSERT INTO `promos` VALUES (1,'disc10',10,'2024-07-14 14:23:02','2024-07-14 14:23:02');
/*!40000 ALTER TABLE `promos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `search_routes`
--

DROP TABLE IF EXISTS `search_routes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `search_routes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `search_routes_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `search_routes`
--

LOCK TABLES `search_routes` WRITE;
/*!40000 ALTER TABLE `search_routes` DISABLE KEYS */;
INSERT INTO `search_routes` VALUES (1,'Dashboard','dashboard','','2024-07-14 14:23:02','2024-07-14 14:23:02'),(2,'Users','users','','2024-07-14 14:23:02','2024-07-14 14:23:02'),(3,'New User','users.new','','2024-07-14 14:23:02','2024-07-14 14:23:02'),(4,'Invoices','invoices','','2024-07-14 14:23:02','2024-07-14 14:23:02'),(5,'New Invoice','invoices.new','','2024-07-14 14:23:02','2024-07-14 14:23:02'),(6,'Projects','projects','','2024-07-14 14:23:02','2024-07-14 14:23:02'),(7,'New Project','projects.new','','2024-07-14 14:23:02','2024-07-14 14:23:02'),(8,'Tickets','tickets','','2024-07-14 14:23:02','2024-07-14 14:23:02'),(9,'New Ticket','tickets.new','','2024-07-14 14:23:02','2024-07-14 14:23:02'),(10,'Logs','logs','','2024-07-14 14:23:02','2024-07-14 14:23:02'),(11,'Notification','notifications','','2024-07-14 14:23:02','2024-07-14 14:23:02'),(12,'Backup','backup','','2024-07-14 14:23:02','2024-07-14 14:23:02'),(13,'Todos','todo','','2024-07-14 14:23:02','2024-07-14 14:23:02'),(14,'Calendar','calendar','','2024-07-14 14:23:02','2024-07-14 14:23:02'),(15,'Categories','categories','','2024-07-14 14:23:02','2024-07-14 14:23:02'),(16,'New Category','categories.new','','2024-07-14 14:23:02','2024-07-14 14:23:02'),(17,'Products','products','','2024-07-14 14:23:02','2024-07-14 14:23:02'),(18,'New Product','products.new','','2024-07-14 14:23:02','2024-07-14 14:23:02'),(19,'Orders','orders','','2024-07-14 14:23:02','2024-07-14 14:23:02'),(20,'New Order','orders.new','','2024-07-14 14:23:02','2024-07-14 14:23:02'),(21,'Promos','promos','','2024-07-14 14:23:02','2024-07-14 14:23:02'),(22,'New Promo','promos.new','','2024-07-14 14:23:02','2024-07-14 14:23:02');
/*!40000 ALTER TABLE `search_routes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tickets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `todos`
--

DROP TABLE IF EXISTS `todos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `todos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('ongoing','completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ongoing',
  `user_id` bigint unsigned NOT NULL,
  `public` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `todos_user_id_foreign` (`user_id`),
  CONSTRAINT `todos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `todos`
--

LOCK TABLES `todos` WRITE;
/*!40000 ALTER TABLE `todos` DISABLE KEYS */;
/*!40000 ALTER TABLE `todos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trackings`
--

DROP TABLE IF EXISTS `trackings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trackings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visited_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trackings`
--

LOCK TABLES `trackings` WRITE;
/*!40000 ALTER TABLE `trackings` DISABLE KEYS */;
INSERT INTO `trackings` VALUES (1,'http://localhost:8000','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36',NULL,NULL,'2024-07-16 20:10:50');
/*!40000 ALTER TABLE `trackings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'test','test@test.com','2024-07-14 14:23:01','$2y$12$zLk/aN2IvwTP6Vz4WoyoP.irwl4gB8xTTv6vY.PMJRKUR/feFh916',NULL,'2024-07-14 14:23:01','2024-07-14 14:23:01','admin','+4915204820649',NULL,NULL),(2,'client','client@client.com','2024-07-14 14:23:02','$2y$12$THvhsRlQ4i61r5wez8AffegTY0EsgEvtsbm4aaA.EnKtEdS3bA0Za',NULL,'2024-07-14 14:23:02','2024-07-14 14:23:02','client','+4915204820649','Gronau','werkstrasse 2, 31028'),(3,'staff','staff@staff.com','2024-07-14 14:23:02','$2y$12$y5LMVEYV3RvYa5T3eYXU..n2PZZRKjVRMeFzfoeQYuGCbm1VcxiQS',NULL,'2024-07-14 14:23:02','2024-07-14 14:23:02','staff','+4915204820649','Gronau','werkstrasse 2, 31028');
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

-- Dump completed on 2024-07-16 22:11:08
