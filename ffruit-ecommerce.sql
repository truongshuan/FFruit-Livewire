-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: ffruit-ecommerce
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0: active, 1: disable',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`),
  KEY `categories_title_index` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Odit ad dolores occaecati voluptatem nam voluptates.','odit-ad-dolores-occaecati-voluptatem-nam-voluptates','Est molestiae vero est doloremque. Consequuntur qui aspernatur odio esse repellat. Sapiente ut quod iusto consequuntur.','0','2023-07-25 05:40:27','2023-07-25 05:40:27'),(2,'Quia id eos ut dignissimos.','quia-id-eos-ut-dignissimos','Voluptatem et voluptas voluptas ipsa ipsum soluta culpa beatae. Et voluptas magnam voluptatem mollitia voluptas quia. Vero et id quam voluptatibus iste ipsum quis. Tempore dolorem nam aliquid.','1','2023-07-25 05:40:27','2023-07-25 05:40:27'),(3,'Quod doloremque magnam et quo et quo aut eos.','quod-doloremque-magnam-et-quo-et-quo-aut-eos','Et labore officia dolores animi. Non hic sunt distinctio velit laborum. Pariatur mollitia qui qui vero error vitae quibusdam saepe. Cum nam iure in architecto impedit sunt.','0','2023-07-25 05:40:27','2023-07-25 05:40:27'),(4,'Quis dolor temporibus quae autem ut impedit.','quis-dolor-temporibus-quae-autem-ut-impedit','Eius officia iusto itaque dolor quo earum. Et earum facilis corrupti recusandae pariatur similique dolores magnam. Sint sint voluptatum ut temporibus cum.','1','2023-07-25 05:40:27','2023-07-25 05:40:27'),(5,'Quidem sit voluptas ut ex sit.','quidem-sit-voluptas-ut-ex-sit','Id fugit cum provident blanditiis sit nihil veniam. Odio inventore adipisci dolorem saepe. Repellat error architecto natus nulla reiciendis quaerat voluptatem. Quod rerum est ipsam magni sapiente.','0','2023-07-25 05:40:27','2023-07-25 05:40:27'),(6,'Omnis et sit optio labore sit voluptas.','omnis-et-sit-optio-labore-sit-voluptas','Molestias at eos sed assumenda. Natus ratione impedit ut quam autem aut. Voluptatem eum voluptates porro quae sed optio. Eos veniam iste porro sunt. Itaque nesciunt ex animi at consequuntur.','0','2023-07-25 05:40:27','2023-07-25 05:40:27'),(7,'Veniam aut nesciunt occaecati ipsam sapiente.','veniam-aut-nesciunt-occaecati-ipsam-sapiente','Sunt et est sapiente dolorum. Pariatur odit aliquam ea quibusdam itaque nobis vitae aut. Sit et officiis voluptatem eos ducimus itaque quis.','0','2023-07-25 05:40:27','2023-07-25 05:40:27'),(8,'Quia ipsam minima in ducimus autem.','quia-ipsam-minima-in-ducimus-autem','Quisquam eveniet voluptas neque soluta id enim cumque. Sequi iusto quis id explicabo et dolorem. Corrupti voluptas ut aut odio esse. Vel est libero excepturi voluptatem.','1','2023-07-25 05:40:27','2023-07-25 05:40:27'),(9,'Possimus nulla reiciendis odio eligendi eius quisquam sunt.','possimus-nulla-reiciendis-odio-eligendi-eius-quisquam-sunt','Dicta praesentium eaque sapiente non. Corporis et soluta facilis exercitationem vitae nostrum atque.','0','2023-07-25 05:40:27','2023-07-25 05:40:27'),(10,'Voluptates officiis numquam ipsam labore ut.','voluptates-officiis-numquam-ipsam-labore-ut','Cum quo explicabo aut cum voluptatibus modi in. Nostrum blanditiis voluptas nisi inventore. Error assumenda quidem voluptatem quo est est esse. Debitis et qui debitis laboriosam.','1','2023-07-25 05:40:27','2023-07-25 05:40:27'),(11,'Rerum qui nemo voluptas vel.','rerum-qui-nemo-voluptas-vel','Omnis dignissimos ut mollitia recusandae maxime. Commodi harum nesciunt iste ut quam omnis. Illum commodi fuga omnis quibusdam.','1','2023-07-25 05:40:27','2023-07-25 05:40:27'),(12,'Eligendi nemo magnam sed.','eligendi-nemo-magnam-sed','Est consequuntur pariatur ex eligendi vel doloremque suscipit. Excepturi odit omnis praesentium perspiciatis non ut. Id et sed dolorem.','1','2023-07-25 05:40:27','2023-07-25 05:40:27'),(13,'Quia itaque recusandae esse vel doloribus.','quia-itaque-recusandae-esse-vel-doloribus','Eligendi mollitia incidunt et minima officia nesciunt possimus. Veniam aut consequuntur natus provident ut et molestiae. Eligendi eveniet quia ut quisquam est velit eius.','1','2023-07-25 05:40:27','2023-07-25 05:40:27'),(14,'Temporibus praesentium placeat praesentium sint.','temporibus-praesentium-placeat-praesentium-sint','Vel aut et et aut. Enim quam enim ut fugiat similique id impedit. Ea sit soluta magni.','0','2023-07-25 05:40:27','2023-07-25 05:40:27'),(15,'Ut deleniti minima iste iste aspernatur aut repellendus aperiam.','ut-deleniti-minima-iste-iste-aspernatur-aut-repellendus-aperiam','Est voluptatem itaque sunt non dicta mollitia aut. Excepturi consequatur dignissimos soluta ex. Expedita qui sed quisquam praesentium qui sed.','0','2023-07-25 05:40:27','2023-07-25 05:40:27'),(16,'Non tenetur exercitationem eaque et excepturi et cupiditate.','non-tenetur-exercitationem-eaque-et-excepturi-et-cupiditate','Vero magnam aspernatur debitis suscipit sed. Quibusdam ad recusandae quia dolorum. Nihil perspiciatis voluptatem exercitationem ex qui fuga. Aspernatur id saepe odio repellat consequatur ea.','0','2023-07-25 05:40:27','2023-07-25 05:40:27'),(17,'Est eligendi error dolores similique possimus maxime consequatur.','est-eligendi-error-dolores-similique-possimus-maxime-consequatur','Explicabo illum quia placeat ut voluptatem commodi. Dolor officiis labore consequatur. Voluptates quia quo aut labore.','1','2023-07-25 05:40:27','2023-07-25 05:40:27'),(18,'Laboriosam suscipit modi dignissimos minus repudiandae.','laboriosam-suscipit-modi-dignissimos-minus-repudiandae','Placeat fugiat dolorem voluptas similique quibusdam voluptatem rerum. In voluptate enim veniam aut est. Sunt et tempore aut est in laborum dolor.','0','2023-07-25 05:40:27','2023-07-25 05:40:27'),(19,'Sequi molestiae numquam sequi.','sequi-molestiae-numquam-sequi','Nisi deserunt quia soluta dolores dolores voluptas ipsa. Nesciunt aspernatur et molestiae aut. Non deserunt voluptas odio facere in laborum.','0','2023-07-25 05:40:27','2023-07-25 05:40:27'),(20,'Minima eaque beatae sed doloribus.','minima-eaque-beatae-sed-doloribus','Vel magnam dolore laborum dolor illum. Minima et quas officia aut et aspernatur. Sit exercitationem alias a.','1','2023-07-25 05:40:27','2023-07-25 05:40:27'),(21,'Ea exercitationem eos porro vel assumenda.','ea-exercitationem-eos-porro-vel-assumenda','Optio nobis saepe et velit. Facere sunt minima quod explicabo at. Officiis est soluta ipsam tenetur.','0','2023-07-25 05:40:27','2023-07-25 05:40:27'),(22,'A aliquid veritatis ipsum consequatur a numquam consequatur.','a-aliquid-veritatis-ipsum-consequatur-a-numquam-consequatur','Iusto cum accusamus soluta et aliquid. Iste velit voluptates ut. Qui eius consectetur qui veritatis in velit ullam. At esse voluptas ea.','0','2023-07-25 05:40:27','2023-07-25 05:40:27'),(23,'Aut quia consequatur quia distinctio nulla est incidunt.','aut-quia-consequatur-quia-distinctio-nulla-est-incidunt','Aut quo ducimus excepturi dignissimos repellendus distinctio dolores. Omnis qui aut eveniet at blanditiis impedit id amet. Voluptatem nisi aperiam et explicabo. Saepe repellendus ut est ut quasi.','1','2023-07-25 05:40:27','2023-07-25 05:40:27'),(24,'Nihil dolores ut quaerat consequuntur assumenda dolore.','nihil-dolores-ut-quaerat-consequuntur-assumenda-dolore','Necessitatibus ut hic provident temporibus. Reprehenderit qui quasi architecto. Illo sint repudiandae ut modi est.','1','2023-07-25 05:40:27','2023-07-25 05:40:27'),(25,'Aliquam quo nesciunt aut magni amet.','aliquam-quo-nesciunt-aut-magni-amet','Maiores sed perferendis excepturi est possimus. Sed enim quia quis eaque hic provident. Dignissimos sapiente inventore eaque alias ipsa quidem.','0','2023-07-25 05:40:27','2023-07-25 05:40:27');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=372 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (358,'2014_10_12_000000_create_users_table',1),(359,'2014_10_12_100000_create_password_reset_tokens_table',1),(360,'2019_08_19_000000_create_failed_jobs_table',1),(361,'2019_12_14_000001_create_personal_access_tokens_table',1),(362,'2023_07_16_151219_create_categories_table',1),(363,'2023_07_16_151241_create_products_table',1),(364,'2023_07_16_151249_create_topics_table',1),(365,'2023_07_16_151256_create_posts_table',1),(366,'2023_07_16_151457_create_orders_table',1),(367,'2023_07_16_151508_create_order_detail_table',1),(368,'2023_07_18_043311_add_slug_to_categories',1),(369,'2023_07_19_052051_add_category_id_to_products',1),(370,'2023_07_20_041740_add_topic_id_to_posts',1),(371,'2023_07_25_052725_create_permission_tables',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',6);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_detail` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(13,2) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_detail_product_id_foreign` (`product_id`),
  KEY `order_detail_order_id_index` (`order_id`),
  CONSTRAINT `order_detail_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_detail_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_detail`
--

LOCK TABLES `order_detail` WRITE;
/*!40000 ALTER TABLE `order_detail` DISABLE KEYS */;
INSERT INTO `order_detail` VALUES (1,1,26,4,343003.00,'2023-07-25 05:40:27','2023-07-25 05:40:27'),(2,1,27,4,437059.00,'2023-07-25 05:40:27','2023-07-25 05:40:27'),(3,1,28,6,128767.00,'2023-07-25 05:40:27','2023-07-25 05:40:27'),(4,1,29,1,421251.00,'2023-07-25 05:40:27','2023-07-25 05:40:27'),(5,1,30,4,50762.00,'2023-07-25 05:40:27','2023-07-25 05:40:27'),(6,2,31,5,107272.00,'2023-07-25 05:40:27','2023-07-25 05:40:27'),(7,2,32,4,267174.00,'2023-07-25 05:40:27','2023-07-25 05:40:27'),(8,2,33,1,166611.00,'2023-07-25 05:40:27','2023-07-25 05:40:27'),(9,2,34,4,432408.00,'2023-07-25 05:40:27','2023-07-25 05:40:27'),(10,2,35,4,90409.00,'2023-07-25 05:40:27','2023-07-25 05:40:27'),(11,3,36,6,60840.00,'2023-07-25 05:40:27','2023-07-25 05:40:27'),(12,3,37,1,87386.00,'2023-07-25 05:40:27','2023-07-25 05:40:27'),(13,3,38,6,165383.00,'2023-07-25 05:40:27','2023-07-25 05:40:27'),(14,3,39,1,196121.00,'2023-07-25 05:40:27','2023-07-25 05:40:27'),(15,3,40,4,348677.00,'2023-07-25 05:40:27','2023-07-25 05:40:27'),(16,4,41,5,275758.00,'2023-07-25 05:40:27','2023-07-25 05:40:27'),(17,4,42,4,120582.00,'2023-07-25 05:40:27','2023-07-25 05:40:27'),(18,4,43,8,161553.00,'2023-07-25 05:40:27','2023-07-25 05:40:27'),(19,4,44,9,328052.00,'2023-07-25 05:40:27','2023-07-25 05:40:27'),(20,4,45,4,478629.00,'2023-07-25 05:40:27','2023-07-25 05:40:27'),(21,5,46,9,88925.00,'2023-07-25 05:40:27','2023-07-25 05:40:27'),(22,5,47,9,333029.00,'2023-07-25 05:40:27','2023-07-25 05:40:27'),(23,5,48,1,429659.00,'2023-07-25 05:40:27','2023-07-25 05:40:27'),(24,5,49,10,227370.00,'2023-07-25 05:40:27','2023-07-25 05:40:27'),(25,5,50,8,363576.00,'2023-07-25 05:40:27','2023-07-25 05:40:27');
/*!40000 ALTER TABLE `order_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` decimal(13,2) unsigned NOT NULL,
  `status` enum('0','1','2','3') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0: peding, 1: paymented, 2: compoleted, 3: cancelled',
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_index` (`user_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'Vella Wisoky V','(872) 375-8194','yundt.ally@franecki.com','94517 Farrell Pines\nWest Fern, UT 89086','Qui nesciunt a deserunt ex. Tempora explicabo vel consectetur voluptatibus saepe.',364427.00,'2',2,'2023-07-25 05:40:27','2023-07-25 05:40:27'),(2,'London Botsford','(323) 988-3739','kayli44@hotmail.com','811 Rosetta Locks Suite 875\nPort Marlinbury, DC 85080','Vel ut sed dolorum. Expedita placeat culpa sequi magni porro. Nulla qui beatae illum assumenda.',371210.00,'2',5,'2023-07-25 05:40:27','2023-07-25 05:40:27'),(3,'Wilber Rath PhD','458.833.0670','zpfeffer@yahoo.com','11888 Samantha Drive Apt. 656\nEast Cynthia, TX 11281','Debitis mollitia quas vel saepe ipsam. Quasi qui est tenetur. Voluptatum ipsum aut est sit.',484978.00,'3',5,'2023-07-25 05:40:27','2023-07-25 05:40:27'),(4,'Katelin Lehner IV','1-941-776-1603','camryn.quitzon@gleason.com','389 Runolfsdottir Views\nBergnaumview, FL 34149','Fuga rerum atque ut. Aut facilis at impedit dolores quo. Corporis modi corporis ut.',422487.00,'2',4,'2023-07-25 05:40:27','2023-07-25 05:40:27'),(5,'Kameron Satterfield','+1 (231) 590-0953','kassulke.miguel@hotmail.com','69817 Cristobal Creek\nStuartport, WA 48883','Officiis quaerat quis possimus nobis pariatur. Accusantium rerum modi inventore sint.',406490.00,'2',1,'2023-07-25 05:40:27','2023-07-25 05:40:27');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'role-manage','web','2023-07-25 05:40:27','2023-07-25 05:40:27'),(2,'post-manage','web','2023-07-25 05:40:27','2023-07-25 05:40:27'),(3,'product-manage','web','2023-07-25 05:40:27','2023-07-25 05:40:27'),(4,'order-manage','web','2023-07-25 05:40:27','2023-07-25 05:40:27');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
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
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `topic_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_title_unique` (`title`),
  UNIQUE KEY `posts_slug_unique` (`slug`),
  KEY `posts_topic_id_index` (`topic_id`),
  CONSTRAINT `posts_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'In dolorem delectus omnis ut nihil necessitatibus dolor eos.','in-dolorem-delectus-omnis-ut-nihil-necessitatibus-dolor-eos','https://via.placeholder.com/640x480.png/001144?text=non','Fugit quas dolores deserunt quia quo et. Eum minus eaque iusto animi. Nemo sed pariatur atque et et. Explicabo omnis itaque assumenda dignissimos et.','2023-07-25 05:40:27','2023-07-25 05:40:27',22),(2,'Ducimus reiciendis fuga id quia et.','ducimus-reiciendis-fuga-id-quia-et','https://via.placeholder.com/640x480.png/0099ee?text=sit','Molestiae nulla autem sint id et sit. Est et modi voluptas. Rerum est animi in et. Voluptatum aut alias in officia expedita qui veniam. Eligendi laborum impedit animi aut.','2023-07-25 05:40:27','2023-07-25 05:40:27',15),(3,'Repellat dolores consequuntur quis est blanditiis.','repellat-dolores-consequuntur-quis-est-blanditiis','https://via.placeholder.com/640x480.png/0066bb?text=perspiciatis','Est iusto illum consequatur aut quas facere delectus. Ut eius aut in eos. Rem qui facilis voluptas velit. Et nam sed placeat voluptatem possimus impedit.','2023-07-25 05:40:27','2023-07-25 05:40:27',11),(4,'Veniam ex eum neque occaecati et corrupti.','veniam-ex-eum-neque-occaecati-et-corrupti','https://via.placeholder.com/640x480.png/0000ee?text=necessitatibus','Sint cupiditate nisi saepe omnis temporibus. Nulla a numquam sint cumque. Esse delectus sequi amet omnis dicta. Debitis qui porro labore et.','2023-07-25 05:40:27','2023-07-25 05:40:27',2),(5,'Officia et et quis eligendi.','officia-et-et-quis-eligendi','https://via.placeholder.com/640x480.png/00bb99?text=quo','Maxime sequi magni hic quia non eveniet necessitatibus. Quaerat sequi reprehenderit incidunt at esse eum. Sed in quae culpa itaque voluptatum tempora.','2023-07-25 05:40:27','2023-07-25 05:40:27',9),(6,'Suscipit unde ipsam quod cupiditate dignissimos temporibus.','suscipit-unde-ipsam-quod-cupiditate-dignissimos-temporibus','https://via.placeholder.com/640x480.png/0000bb?text=architecto','Voluptatem cupiditate tenetur officiis debitis neque. Possimus quia enim itaque blanditiis est autem sint. Dolorum minus qui laudantium labore nam id.','2023-07-25 05:40:27','2023-07-25 05:40:27',16),(7,'In ut totam inventore voluptas corrupti consequatur.','in-ut-totam-inventore-voluptas-corrupti-consequatur','https://via.placeholder.com/640x480.png/00ccdd?text=rerum','Odio non dignissimos beatae ad nobis et. Corporis assumenda rerum et a quo aut ad. Ut inventore ut libero est et recusandae repudiandae corporis.','2023-07-25 05:40:27','2023-07-25 05:40:27',24),(8,'Impedit magnam voluptas est ut earum quisquam animi.','impedit-magnam-voluptas-est-ut-earum-quisquam-animi','https://via.placeholder.com/640x480.png/00ee77?text=quia','Incidunt perspiciatis nam velit sed laborum sed aliquam. Non cumque dolorem modi repellat quibusdam et. Sint illo rem tempore possimus sit consequuntur. Cumque dolor in qui reiciendis.','2023-07-25 05:40:27','2023-07-25 05:40:27',19),(9,'Repellendus modi non laborum eveniet repellendus voluptatem animi.','repellendus-modi-non-laborum-eveniet-repellendus-voluptatem-animi','https://via.placeholder.com/640x480.png/008822?text=aut','Fuga autem placeat soluta iure et et similique. Molestiae amet aut quo ea non ut.','2023-07-25 05:40:27','2023-07-25 05:40:27',9),(10,'Fugiat totam incidunt ducimus sed sit repudiandae.','fugiat-totam-incidunt-ducimus-sed-sit-repudiandae','https://via.placeholder.com/640x480.png/00ff66?text=repudiandae','Nam qui quis aut sunt enim sunt nihil. Eius iste et fuga sunt. Ut voluptatibus et eos quia ut dolorem et adipisci. Suscipit maiores repellat facere adipisci.','2023-07-25 05:40:27','2023-07-25 05:40:27',17),(11,'Placeat commodi iusto velit atque inventore ullam.','placeat-commodi-iusto-velit-atque-inventore-ullam','https://via.placeholder.com/640x480.png/003366?text=quibusdam','Qui minus nemo qui dolore. Sed nostrum eligendi occaecati totam quo. Minima aut sequi tenetur non similique rerum et. Error ut mollitia modi qui est qui.','2023-07-25 05:40:27','2023-07-25 05:40:27',18),(12,'Vel et vero ea et enim.','vel-et-vero-ea-et-enim','https://via.placeholder.com/640x480.png/006655?text=eius','Cumque saepe quia enim nihil. Quod vel neque quis vel eum praesentium. Voluptatibus eum ea et quis. Aut quia nesciunt necessitatibus libero aliquid ratione. Tenetur fugit aut maiores nemo.','2023-07-25 05:40:27','2023-07-25 05:40:27',3),(13,'Ut aspernatur sed quisquam reiciendis veniam sed nihil.','ut-aspernatur-sed-quisquam-reiciendis-veniam-sed-nihil','https://via.placeholder.com/640x480.png/006644?text=rerum','Soluta ut delectus rerum quibusdam. Et dolor velit ratione est. Accusantium qui quidem voluptatem repudiandae. Illo quo molestiae molestias consequatur quod non accusantium. Nisi cum soluta non.','2023-07-25 05:40:27','2023-07-25 05:40:27',13),(14,'Alias eligendi eligendi hic fugiat consequatur reprehenderit.','alias-eligendi-eligendi-hic-fugiat-consequatur-reprehenderit','https://via.placeholder.com/640x480.png/003333?text=delectus','Cumque vel voluptatem adipisci modi. Voluptate nesciunt provident laboriosam distinctio.','2023-07-25 05:40:27','2023-07-25 05:40:27',18),(15,'Error ea ut sed quasi quos delectus ipsa.','error-ea-ut-sed-quasi-quos-delectus-ipsa','https://via.placeholder.com/640x480.png/008866?text=id','Animi nisi illo sed aliquam quos atque quas. Libero et voluptatem officiis et. Dolores eius autem sunt voluptas quae.','2023-07-25 05:40:27','2023-07-25 05:40:27',16),(16,'Eius tempora vel nihil quos aut.','eius-tempora-vel-nihil-quos-aut','https://via.placeholder.com/640x480.png/0033aa?text=dolor','Dolorem assumenda debitis deleniti hic officia. Quia architecto et eum quasi sed recusandae. Nulla incidunt sit ea architecto. Id autem reprehenderit deserunt officiis rem ullam tempora ipsa.','2023-07-25 05:40:27','2023-07-25 05:40:27',1),(17,'Et tempore recusandae assumenda ipsum qui.','et-tempore-recusandae-assumenda-ipsum-qui','https://via.placeholder.com/640x480.png/00ff11?text=et','Non quo quia nisi totam. Autem quod quam et. Ipsa molestiae unde soluta temporibus asperiores dolor dolorum aut. Omnis vitae totam odit ut itaque.','2023-07-25 05:40:27','2023-07-25 05:40:27',22),(18,'Aut rem nulla et iusto ducimus tenetur expedita.','aut-rem-nulla-et-iusto-ducimus-tenetur-expedita','https://via.placeholder.com/640x480.png/004455?text=labore','Error impedit officia incidunt alias et. Amet error tempora earum quaerat velit maxime et. Illum ea error minima reiciendis quaerat nostrum blanditiis.','2023-07-25 05:40:27','2023-07-25 05:40:27',18),(19,'Fugit labore est saepe unde.','fugit-labore-est-saepe-unde','https://via.placeholder.com/640x480.png/00cc66?text=quo','Incidunt quaerat officia tempora dolorem magnam sunt. Quod vero voluptate quo. Esse et aut excepturi eos.','2023-07-25 05:40:27','2023-07-25 05:40:27',5),(20,'Provident dolorem aut rerum repellat culpa sint quaerat.','provident-dolorem-aut-rerum-repellat-culpa-sint-quaerat','https://via.placeholder.com/640x480.png/001155?text=est','Nemo non laborum voluptates voluptas provident alias voluptatem. Molestiae dolor minus voluptates dolore omnis sapiente. Omnis nisi ut non veniam fuga molestias. Omnis perferendis a rerum quia.','2023-07-25 05:40:27','2023-07-25 05:40:27',6),(21,'Nisi unde est officia blanditiis in.','nisi-unde-est-officia-blanditiis-in','https://via.placeholder.com/640x480.png/00eebb?text=non','Et fuga natus dolores laudantium est. Incidunt possimus cum vel ipsa. Molestias ipsum cum debitis nostrum qui. Fugit necessitatibus tempora unde qui odit.','2023-07-25 05:40:27','2023-07-25 05:40:27',13),(22,'Possimus in et sit cum optio.','possimus-in-et-sit-cum-optio','https://via.placeholder.com/640x480.png/0077dd?text=natus','Cum repellendus eos sequi omnis. Et ipsa ipsa aliquam suscipit qui. Iste accusamus dolorem ea dolorem deserunt et illo. Enim ut esse deleniti eius quidem. Dolore veniam id totam occaecati quae.','2023-07-25 05:40:27','2023-07-25 05:40:27',25),(23,'Illo ullam maxime dicta aliquam.','illo-ullam-maxime-dicta-aliquam','https://via.placeholder.com/640x480.png/0011aa?text=et','Earum velit nam repudiandae facilis saepe. Eveniet eum assumenda nobis eos. Et doloremque sit quos in rerum deleniti et quasi.','2023-07-25 05:40:27','2023-07-25 05:40:27',18),(24,'Consequatur tenetur tempore sint voluptatem.','consequatur-tenetur-tempore-sint-voluptatem','https://via.placeholder.com/640x480.png/008833?text=aut','Pariatur esse sint et magnam veniam. Aliquam qui dolor tenetur nemo unde. Deleniti quia esse doloremque necessitatibus aspernatur.','2023-07-25 05:40:27','2023-07-25 05:40:27',22),(25,'Sunt recusandae voluptas voluptatum facilis.','sunt-recusandae-voluptas-voluptatum-facilis','https://via.placeholder.com/640x480.png/000077?text=illum','Nostrum a odio odit minima voluptatem magni soluta sit. Quo occaecati sunt accusantium cum culpa dolor fugit. Pariatur sit itaque sed est facilis.','2023-07-25 05:40:27','2023-07-25 05:40:27',25);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(13,2) unsigned NOT NULL,
  `sale_price` decimal(13,2) unsigned DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_name_unique` (`name`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  KEY `products_category_id_index` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Evangeline Larson','evangeline-larson','https://via.placeholder.com/640x480.png/00eedd?text=illo',243388.00,80232.00,'Et nisi saepe quia dolor sint. Et sequi eveniet tempore excepturi possimus aperiam. Quis eos nesciunt ut.','2023-07-25 05:40:27','2023-07-25 05:40:27',16),(2,'Dr. Erich Schuster I','dr-erich-schuster-i','https://via.placeholder.com/640x480.png/000088?text=ipsam',492940.00,77684.00,'Ea quia quo eaque debitis est quasi tempore. Sequi hic et omnis possimus nulla enim et voluptatem. Tempora labore quasi fugit tenetur neque iste praesentium fugit.','2023-07-25 05:40:27','2023-07-25 05:40:27',24),(3,'Andres West','andres-west','https://via.placeholder.com/640x480.png/005555?text=modi',342206.00,NULL,'Ut error enim est sint. Qui illo laboriosam numquam architecto. Voluptatem tempore est enim earum tenetur quibusdam aut corrupti.','2023-07-25 05:40:27','2023-07-25 05:40:27',24),(4,'Laurie Witting','laurie-witting','https://via.placeholder.com/640x480.png/001199?text=consequatur',36443.00,NULL,'Enim velit dolore nostrum rerum rerum. Reprehenderit eveniet pariatur et nihil soluta voluptatibus. In autem distinctio rerum officiis quo vitae ut. Molestiae reprehenderit minus rem animi aperiam.','2023-07-25 05:40:27','2023-07-25 05:40:27',13),(5,'Merle Kuphal','merle-kuphal','https://via.placeholder.com/640x480.png/005577?text=corrupti',439812.00,66948.00,'Rerum in quod eius voluptas animi quo. Praesentium fuga rem eum non. Hic assumenda nostrum sequi tenetur voluptas. Voluptatem odio et mollitia itaque iste voluptas ipsam.','2023-07-25 05:40:27','2023-07-25 05:40:27',13),(6,'Jolie Hauck','jolie-hauck','https://via.placeholder.com/640x480.png/00ddbb?text=porro',417200.00,NULL,'Doloremque voluptates dolores fugit laboriosam. Aperiam laboriosam eum placeat vero.','2023-07-25 05:40:27','2023-07-25 05:40:27',18),(7,'Dr. Maude Ortiz DDS','dr-maude-ortiz-dds','https://via.placeholder.com/640x480.png/007788?text=occaecati',137310.00,NULL,'Consequatur aut sit ratione. Voluptatibus eveniet enim dolores nihil deleniti unde odio. Voluptatem quis temporibus sunt ut quos consequatur perferendis.','2023-07-25 05:40:27','2023-07-25 05:40:27',16),(8,'Santino Vandervort III','santino-vandervort-iii','https://via.placeholder.com/640x480.png/00bbdd?text=ut',453569.00,121346.00,'Molestiae eos quia blanditiis. Itaque omnis enim magnam culpa sit. Aut in qui quo sunt ut eos. Non veritatis quibusdam est sit. Omnis rerum et consequuntur tempore. Velit nam non facere ex fuga.','2023-07-25 05:40:27','2023-07-25 05:40:27',1),(9,'Ben Ondricka','ben-ondricka','https://via.placeholder.com/640x480.png/005522?text=voluptas',57496.00,NULL,'Praesentium dolore sunt inventore quia maxime qui. Aspernatur officia natus quas voluptatem. Expedita quia optio dignissimos hic ex.','2023-07-25 05:40:27','2023-07-25 05:40:27',18),(10,'Joanny Mann','joanny-mann','https://via.placeholder.com/640x480.png/00bb00?text=deleniti',164626.00,183090.00,'Expedita quos quo qui quibusdam pariatur voluptate velit. Aperiam veritatis ut aliquid dolores recusandae possimus nam facere. Qui velit quibusdam iste voluptatem occaecati.','2023-07-25 05:40:27','2023-07-25 05:40:27',6),(11,'Loyal Moore','loyal-moore','https://via.placeholder.com/640x480.png/001177?text=tenetur',117963.00,172246.00,'Minus quo aut illo dolor deleniti voluptas. Ea sint voluptatem molestias minus rerum. Nulla incidunt deserunt voluptas et eaque sit voluptatem. Delectus magni expedita neque voluptates quidem in.','2023-07-25 05:40:27','2023-07-25 05:40:27',3),(12,'Jammie Schneider','jammie-schneider','https://via.placeholder.com/640x480.png/006677?text=illum',91395.00,75708.00,'Et ut sunt esse quis exercitationem ut. Sed cupiditate nulla officia beatae illo. Animi quibusdam tempora voluptas at exercitationem quibusdam.','2023-07-25 05:40:27','2023-07-25 05:40:27',21),(13,'Soledad Bashirian','soledad-bashirian','https://via.placeholder.com/640x480.png/0088cc?text=iste',289301.00,51246.00,'Aliquid facilis id inventore et modi. Possimus veniam aperiam et ut. Facilis vero maxime et pariatur sit enim. Sit qui qui ut mollitia.','2023-07-25 05:40:27','2023-07-25 05:40:27',24),(14,'Mara Purdy I','mara-purdy-i','https://via.placeholder.com/640x480.png/001166?text=consequatur',90904.00,59625.00,'Beatae temporibus explicabo doloribus nesciunt. Nam ea provident fugit sit voluptas odio. Aspernatur porro illum ratione enim. Atque consequuntur alias sit nemo nobis provident.','2023-07-25 05:40:27','2023-07-25 05:40:27',4),(15,'Miss Brenda King','miss-brenda-king','https://via.placeholder.com/640x480.png/009955?text=consequatur',416582.00,112217.00,'Aperiam ab sunt aut omnis molestiae architecto quia. Doloribus velit voluptatem eos neque vel iure. Omnis facilis recusandae sed.','2023-07-25 05:40:27','2023-07-25 05:40:27',9),(16,'Otilia Becker V','otilia-becker-v','https://via.placeholder.com/640x480.png/00dd77?text=officiis',217993.00,101980.00,'Quo assumenda nisi inventore eligendi omnis. Dignissimos vel doloribus tempora amet ratione. Dolor ab eaque blanditiis qui. Debitis est et dolorum aut asperiores.','2023-07-25 05:40:27','2023-07-25 05:40:27',14),(17,'Marguerite VonRueden','marguerite-vonrueden','https://via.placeholder.com/640x480.png/000055?text=magni',31719.00,NULL,'Eaque quia non eveniet voluptatem quia assumenda porro. Alias numquam voluptatem sunt omnis. Nemo deserunt laudantium illo praesentium debitis id autem necessitatibus.','2023-07-25 05:40:27','2023-07-25 05:40:27',20),(18,'Malcolm Turner','malcolm-turner','https://via.placeholder.com/640x480.png/0044ff?text=et',111303.00,NULL,'Esse aut ducimus enim rerum. Nemo quia maiores tempora adipisci rerum dignissimos. Vitae quae ut saepe. Ut incidunt odit quasi quis odit laboriosam.','2023-07-25 05:40:27','2023-07-25 05:40:27',24),(19,'Armando Hauck','armando-hauck','https://via.placeholder.com/640x480.png/00aa33?text=culpa',360430.00,71982.00,'Ex voluptatem nesciunt ea officia. Ipsum ipsum similique ut aut hic debitis consequatur. Non quo et ut aut sit ut est. Et aut aliquid ex dolores voluptas impedit impedit et.','2023-07-25 05:40:27','2023-07-25 05:40:27',21),(20,'Bulah Conn V','bulah-conn-v','https://via.placeholder.com/640x480.png/00cc11?text=dolorum',56174.00,104227.00,'Quae unde ut soluta optio earum harum. Eligendi quae reprehenderit iure voluptatem enim. Quae qui dignissimos sequi harum aut maiores. Quia quam ut sunt.','2023-07-25 05:40:27','2023-07-25 05:40:27',14),(21,'Sherman Leuschke','sherman-leuschke','https://via.placeholder.com/640x480.png/00bb88?text=veritatis',350404.00,91379.00,'Vel et quos dolores. Velit laborum dolores quo occaecati et a. Atque qui recusandae quo et unde quaerat.','2023-07-25 05:40:27','2023-07-25 05:40:27',17),(22,'Dewayne Kuvalis','dewayne-kuvalis','https://via.placeholder.com/640x480.png/000066?text=excepturi',42478.00,13699.00,'Explicabo fugit et blanditiis aut illum. Accusantium voluptatem maxime enim laudantium libero. Reiciendis animi ut pariatur ad rem molestias.','2023-07-25 05:40:27','2023-07-25 05:40:27',17),(23,'Melisa Sawayn','melisa-sawayn','https://via.placeholder.com/640x480.png/0033cc?text=doloribus',144962.00,NULL,'Doloribus a nemo natus asperiores ea ratione. Suscipit tempora est veniam libero quos et atque consectetur. Qui sunt voluptas quia ipsa voluptatum possimus ducimus.','2023-07-25 05:40:27','2023-07-25 05:40:27',19),(24,'Freeman Beier','freeman-beier','https://via.placeholder.com/640x480.png/0022ff?text=vel',73952.00,184433.00,'Quidem natus est sit nihil. Et laudantium consequuntur quis dolorem nihil omnis. Nostrum voluptas unde voluptatum saepe. Qui dolores cumque nam veniam eaque laborum.','2023-07-25 05:40:27','2023-07-25 05:40:27',13),(25,'Vicente Doyle IV','vicente-doyle-iv','https://via.placeholder.com/640x480.png/009955?text=voluptas',215425.00,NULL,'Et omnis asperiores veniam commodi ipsa nisi sunt. Ipsa neque est reprehenderit praesentium consequatur incidunt totam est. Sint autem sunt itaque magni qui maiores.','2023-07-25 05:40:27','2023-07-25 05:40:27',22),(26,'Silas Schowalter','silas-schowalter','https://via.placeholder.com/640x480.png/0066dd?text=quam',343003.00,NULL,'Amet nam molestias recusandae. Sint dolore cumque rerum quis. Omnis libero laborum vero officia labore. Minima at aut reiciendis consequatur.','2023-07-25 05:40:27','2023-07-25 05:40:27',5),(27,'Prof. Tillman Jerde I','prof-tillman-jerde-i','https://via.placeholder.com/640x480.png/00aa22?text=ea',437059.00,63911.00,'Possimus suscipit quidem eum assumenda qui. Voluptatem necessitatibus vel deleniti reprehenderit ab aut. Libero nisi nesciunt mollitia ipsa culpa.','2023-07-25 05:40:27','2023-07-25 05:40:27',2),(28,'Irving Koelpin Sr.','irving-koelpin-sr','https://via.placeholder.com/640x480.png/0033aa?text=cumque',128767.00,105731.00,'Molestias consectetur enim quo voluptatem sequi dolorem. Eos et possimus officiis. Maiores libero expedita laboriosam eligendi earum et eaque. Ut labore cumque nostrum aperiam ut quibusdam.','2023-07-25 05:40:27','2023-07-25 05:40:27',16),(29,'Dr. Clifford Hackett','dr-clifford-hackett','https://via.placeholder.com/640x480.png/0033dd?text=et',421251.00,102765.00,'Ab voluptate dolorem sunt odit. Voluptates earum in voluptatem consequuntur delectus hic voluptas. Pariatur quo ea sunt ut consequuntur.','2023-07-25 05:40:27','2023-07-25 05:40:27',3),(30,'Kayden Reichel','kayden-reichel','https://via.placeholder.com/640x480.png/00dd44?text=voluptatem',50762.00,NULL,'Optio nam soluta quia voluptatum beatae corporis. Dolores laboriosam rerum laboriosam voluptas placeat debitis. Ab magni facere quidem facere necessitatibus.','2023-07-25 05:40:27','2023-07-25 05:40:27',22),(31,'Marietta Deckow DVM','marietta-deckow-dvm','https://via.placeholder.com/640x480.png/001111?text=porro',107272.00,NULL,'Aspernatur odit quasi et itaque. Et perferendis molestiae atque dolor eum. Tempora veniam ut voluptatem animi asperiores est cum.','2023-07-25 05:40:27','2023-07-25 05:40:27',4),(32,'Mr. Brayan Kuvalis','mr-brayan-kuvalis','https://via.placeholder.com/640x480.png/004422?text=cum',267174.00,NULL,'Blanditiis tenetur ut adipisci repudiandae. Repellat necessitatibus sed quidem nihil vel. Eum qui et rem corporis culpa. Sapiente veritatis repellendus eligendi temporibus est adipisci omnis.','2023-07-25 05:40:27','2023-07-25 05:40:27',14),(33,'Mr. Savion Mitchell IV','mr-savion-mitchell-iv','https://via.placeholder.com/640x480.png/00eecc?text=hic',166611.00,NULL,'Facilis dolores ut sed. Perferendis consequatur et quod perspiciatis voluptas aut ipsum. Consequatur corrupti odit error quo ad.','2023-07-25 05:40:27','2023-07-25 05:40:27',18),(34,'Margaret Miller','margaret-miller','https://via.placeholder.com/640x480.png/003355?text=ut',432408.00,38630.00,'Laudantium et numquam et et in. Illo assumenda nostrum dolor odio. Distinctio nisi laudantium ut aut qui incidunt sunt. Saepe eum esse eos.','2023-07-25 05:40:27','2023-07-25 05:40:27',16),(35,'Jo O\'Kon','jo-okon','https://via.placeholder.com/640x480.png/00ffdd?text=magnam',90409.00,137185.00,'Maiores doloremque earum explicabo saepe. Expedita quisquam culpa ut beatae et dolor reiciendis facere. Sint exercitationem molestiae magnam quis qui rerum.','2023-07-25 05:40:27','2023-07-25 05:40:27',3),(36,'Mary Altenwerth','mary-altenwerth','https://via.placeholder.com/640x480.png/00aabb?text=quia',60840.00,99516.00,'Animi accusamus molestias sint maiores error atque. Vitae natus quos reprehenderit perspiciatis rerum magnam est. Cumque harum non id eum est nostrum.','2023-07-25 05:40:27','2023-07-25 05:40:27',3),(37,'Jeremie Bechtelar MD','jeremie-bechtelar-md','https://via.placeholder.com/640x480.png/005522?text=eum',87386.00,141495.00,'Voluptatem enim repellat consequatur libero dicta. Error laboriosam eum fuga reiciendis sed architecto. Voluptatem ducimus odio qui fugit adipisci vitae harum recusandae.','2023-07-25 05:40:27','2023-07-25 05:40:27',3),(38,'Mrs. Lindsay Gleason','mrs-lindsay-gleason','https://via.placeholder.com/640x480.png/0044bb?text=ipsum',165383.00,NULL,'Ut fuga sint natus quae dolor autem quasi. Eius quo cum qui perferendis. Ut ut distinctio asperiores cum. Eaque facilis explicabo perferendis culpa.','2023-07-25 05:40:27','2023-07-25 05:40:27',11),(39,'Jayce Jenkins','jayce-jenkins','https://via.placeholder.com/640x480.png/003344?text=similique',196121.00,NULL,'Voluptatibus natus eos tenetur illum provident. Autem laboriosam fugit et aliquam laboriosam aut sit earum. Recusandae explicabo ut perferendis et.','2023-07-25 05:40:27','2023-07-25 05:40:27',17),(40,'Dallas Feil','dallas-feil','https://via.placeholder.com/640x480.png/00aa99?text=qui',348677.00,59380.00,'Alias explicabo est dignissimos doloremque. Aut quia odio ut cum et. Qui laboriosam dolorem occaecati voluptas.','2023-07-25 05:40:27','2023-07-25 05:40:27',10),(41,'Mrs. Leonora Corkery DDS','mrs-leonora-corkery-dds','https://via.placeholder.com/640x480.png/00eeaa?text=neque',275758.00,73859.00,'Et pariatur iure id minus. Omnis explicabo nihil id ipsum qui laboriosam dolore. Quas ullam quos eaque fugiat. Nesciunt aut eaque praesentium id aut. Beatae aut omnis minima maiores non.','2023-07-25 05:40:27','2023-07-25 05:40:27',21),(42,'Miss Marina Jacobs MD','miss-marina-jacobs-md','https://via.placeholder.com/640x480.png/00dd77?text=totam',120582.00,NULL,'Vel consequatur pariatur blanditiis ut corporis et. Unde et expedita enim alias.','2023-07-25 05:40:27','2023-07-25 05:40:27',11),(43,'Kenyatta Shanahan','kenyatta-shanahan','https://via.placeholder.com/640x480.png/002255?text=perferendis',161553.00,NULL,'Sed dolore harum ut quo praesentium fugiat. Aut enim voluptatum voluptas aperiam atque sed. Sunt eos nihil quia doloremque tenetur.','2023-07-25 05:40:27','2023-07-25 05:40:27',23),(44,'Citlalli Gulgowski Sr.','citlalli-gulgowski-sr','https://via.placeholder.com/640x480.png/006677?text=ut',328052.00,68240.00,'Doloremque sequi et eaque et incidunt. Blanditiis nesciunt rerum aliquam voluptates asperiores et neque.','2023-07-25 05:40:27','2023-07-25 05:40:27',2),(45,'Martine Smith','martine-smith','https://via.placeholder.com/640x480.png/002288?text=ducimus',478629.00,NULL,'Hic sed reprehenderit officiis eligendi. Adipisci eligendi eos eaque veritatis. Repellat cupiditate ullam quia in esse. Occaecati consequatur in blanditiis.','2023-07-25 05:40:27','2023-07-25 05:40:27',15),(46,'Elvera Leffler','elvera-leffler','https://via.placeholder.com/640x480.png/000077?text=et',88925.00,NULL,'Autem quasi occaecati aut eius et ullam animi et. Quia quia sint sed ad rem minima. Aperiam rerum similique sed distinctio illum id consequatur. Quia ea doloribus quam.','2023-07-25 05:40:27','2023-07-25 05:40:27',14),(47,'Davon Carter','davon-carter','https://via.placeholder.com/640x480.png/00eeaa?text=autem',333029.00,170003.00,'Non vitae doloribus rerum aspernatur. Necessitatibus unde assumenda eos ut et omnis quos harum. Et qui magnam corrupti et.','2023-07-25 05:40:27','2023-07-25 05:40:27',21),(48,'Jewell Larson','jewell-larson','https://via.placeholder.com/640x480.png/00bb11?text=quaerat',429659.00,NULL,'Quasi ipsam aliquam dolore consectetur. Doloribus dicta dolorem mollitia praesentium. Vel quam facere excepturi.','2023-07-25 05:40:27','2023-07-25 05:40:27',4),(49,'Alexandro Keebler','alexandro-keebler','https://via.placeholder.com/640x480.png/004455?text=dolore',227370.00,NULL,'Aspernatur aperiam explicabo molestiae soluta non velit. Ut consectetur expedita aut incidunt. Vitae explicabo consequuntur quis et.','2023-07-25 05:40:27','2023-07-25 05:40:27',1),(50,'Prof. Brannon Yost DVM','prof-brannon-yost-dvm','https://via.placeholder.com/640x480.png/00aa11?text=in',363576.00,102197.00,'Praesentium sed temporibus nisi ut modi. Doloremque similique ratione consequuntur quia pariatur mollitia amet nostrum. Quo molestiae odit et dolores illum reiciendis velit quibusdam.','2023-07-25 05:40:27','2023-07-25 05:40:27',8);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(4,1);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Super Admin','web','2023-07-25 05:40:27','2023-07-25 05:40:27');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topics`
--

DROP TABLE IF EXISTS `topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `topics` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0: Active, 1: Disable',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `topics_title_unique` (`title`),
  UNIQUE KEY `topics_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topics`
--

LOCK TABLES `topics` WRITE;
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
INSERT INTO `topics` VALUES (1,'Quo totam voluptatem est illo minima quas.','quo-totam-voluptatem-est-illo-minima-quas','Dolor et eaque reiciendis libero. Non molestiae pariatur dolorem vel quia. Molestiae cum eveniet et voluptas veniam eos.','0','2023-07-25 05:40:27','2023-07-25 05:40:27'),(2,'Ab beatae et ut quas sunt ut nihil.','ab-beatae-et-ut-quas-sunt-ut-nihil','Rerum et quae dolor quasi quod consectetur corporis vel. Delectus laboriosam dolor explicabo exercitationem et. Aut velit qui quam magnam quas. Veniam magnam ratione dolorem ut ut veniam cum.','0','2023-07-25 05:40:27','2023-07-25 05:40:27'),(3,'Fugit id et adipisci blanditiis dicta rerum nisi.','fugit-id-et-adipisci-blanditiis-dicta-rerum-nisi','Occaecati sit ut sed est. Dolore nihil eius qui aut. Consequuntur velit consequuntur fuga recusandae voluptas voluptatem.','0','2023-07-25 05:40:27','2023-07-25 05:40:27'),(4,'Unde in laborum doloribus rem ut dolores.','unde-in-laborum-doloribus-rem-ut-dolores','Quis nemo perferendis quod architecto nostrum rerum atque soluta. Rerum quia magnam qui reprehenderit nam dolorem. Corporis commodi rerum placeat nihil.','0','2023-07-25 05:40:27','2023-07-25 05:40:27'),(5,'Mollitia aut dolorem quasi.','mollitia-aut-dolorem-quasi','Eum rem facere ducimus animi molestias quos reiciendis dolor. Sunt cumque vel laborum velit qui sit sit.','0','2023-07-25 05:40:27','2023-07-25 05:40:27'),(6,'Pariatur nobis necessitatibus dignissimos iste.','pariatur-nobis-necessitatibus-dignissimos-iste','Quis eius dolores id. Voluptas voluptatem amet nihil minus accusantium asperiores. Voluptatem eum totam ea fugiat quam laudantium tempore.','0','2023-07-25 05:40:27','2023-07-25 05:40:27'),(7,'Quasi non quo atque eius cupiditate quas velit.','quasi-non-quo-atque-eius-cupiditate-quas-velit','Pariatur minus et atque sed nisi. Et voluptatibus nostrum saepe earum illo eos ad officiis. Nostrum et debitis facere architecto. Quod reprehenderit voluptatem et sint tempora.','1','2023-07-25 05:40:27','2023-07-25 05:40:27'),(8,'Aut ipsa voluptatum aut amet consequatur et non.','aut-ipsa-voluptatum-aut-amet-consequatur-et-non','Voluptatum ipsam ratione commodi a exercitationem qui. Et numquam voluptatem saepe ut. Est rerum aliquam sequi exercitationem sint. Saepe sint aspernatur eum.','1','2023-07-25 05:40:27','2023-07-25 05:40:27'),(9,'Voluptas nostrum nemo illum sapiente molestiae.','voluptas-nostrum-nemo-illum-sapiente-molestiae','Laboriosam laudantium et est. Ab enim quis aut accusantium. Praesentium optio dolor quia velit qui. Accusamus et blanditiis facilis sit ut.','0','2023-07-25 05:40:27','2023-07-25 05:40:27'),(10,'Laudantium ut est aut reprehenderit hic placeat reiciendis.','laudantium-ut-est-aut-reprehenderit-hic-placeat-reiciendis','Eius sit ipsum eum tempora iure et. Reiciendis rem unde vel. Alias asperiores inventore non tenetur incidunt.','0','2023-07-25 05:40:27','2023-07-25 05:40:27'),(11,'Provident accusantium aut aut quas est est.','provident-accusantium-aut-aut-quas-est-est','Labore porro nemo dolor sit perferendis dicta. Dolorum eligendi repellendus nihil sequi voluptate asperiores consequatur.','0','2023-07-25 05:40:27','2023-07-25 05:40:27'),(12,'Dolorem inventore consectetur perspiciatis dolorum voluptatibus.','dolorem-inventore-consectetur-perspiciatis-dolorum-voluptatibus','Rerum est quidem quis. Et odit iusto ea hic rerum nulla. Blanditiis vitae aperiam asperiores illo doloribus rerum laboriosam.','1','2023-07-25 05:40:27','2023-07-25 05:40:27'),(13,'Minus illum totam occaecati porro.','minus-illum-totam-occaecati-porro','Nostrum fuga vel nesciunt velit. Perspiciatis beatae voluptates vel autem.','1','2023-07-25 05:40:27','2023-07-25 05:40:27'),(14,'Neque dolorum aut magnam et doloribus impedit.','neque-dolorum-aut-magnam-et-doloribus-impedit','Ex molestias sunt eligendi illo minima unde. Consectetur ratione ea nihil atque et. Eos et odio dolores explicabo voluptas. Dignissimos qui voluptatem dignissimos et repellendus delectus.','0','2023-07-25 05:40:27','2023-07-25 05:40:27'),(15,'Quas voluptas quos iste doloremque cumque.','quas-voluptas-quos-iste-doloremque-cumque','Praesentium et alias quos. Fugiat hic et corrupti doloribus qui. Odio non harum quos voluptatem. Ab odio qui sint repellat quos asperiores.','0','2023-07-25 05:40:27','2023-07-25 05:40:27'),(16,'Libero ex commodi dicta quo culpa ut.','libero-ex-commodi-dicta-quo-culpa-ut','In quia et facere error temporibus. Consequatur magnam dolore nihil illo adipisci ut. Qui ut eius deserunt inventore.','0','2023-07-25 05:40:27','2023-07-25 05:40:27'),(17,'Ea ea qui esse saepe sed consequatur totam et.','ea-ea-qui-esse-saepe-sed-consequatur-totam-et','Consequatur deleniti ut nobis est sit voluptatem dolor. Velit fugit quidem impedit suscipit sunt corrupti. Molestiae aut error omnis fuga rem alias. Iusto consequuntur aut quia sed.','1','2023-07-25 05:40:27','2023-07-25 05:40:27'),(18,'Labore est in aut qui cum.','labore-est-in-aut-qui-cum','Occaecati sed molestiae minus porro itaque nesciunt inventore. Distinctio totam repellat eum et aperiam excepturi. Quod ullam voluptas veniam placeat dolor blanditiis ducimus.','0','2023-07-25 05:40:27','2023-07-25 05:40:27'),(19,'Omnis earum debitis delectus assumenda eum natus nemo.','omnis-earum-debitis-delectus-assumenda-eum-natus-nemo','Labore voluptatem assumenda eius iusto. Aut numquam in est. Voluptas ipsum harum ab quaerat illo provident. Totam aut aut nemo ducimus. Ea eum minus cum id.','0','2023-07-25 05:40:27','2023-07-25 05:40:27'),(20,'Explicabo autem minus dolor mollitia.','explicabo-autem-minus-dolor-mollitia','A aut ut sed illo. Ut et quibusdam consequuntur est dicta quis id. Voluptatum rem saepe commodi. Non eius ullam ab et quos.','0','2023-07-25 05:40:27','2023-07-25 05:40:27'),(21,'Rerum eligendi assumenda illo et.','rerum-eligendi-assumenda-illo-et','Vel nostrum ullam quos quam. Et sed asperiores asperiores praesentium eius quis dolores laudantium. Sunt inventore aperiam deleniti praesentium eum sequi.','0','2023-07-25 05:40:27','2023-07-25 05:40:27'),(22,'Quidem et esse est quidem.','quidem-et-esse-est-quidem','Vel nostrum facilis aliquam et sapiente. Sunt animi aliquam expedita qui. Animi in praesentium et soluta eum repudiandae modi labore. Officiis voluptates cupiditate ut unde quasi.','0','2023-07-25 05:40:27','2023-07-25 05:40:27'),(23,'Sapiente placeat repellat quia et sed.','sapiente-placeat-repellat-quia-et-sed','Aperiam consequuntur magnam quo maxime enim id minus. Corporis expedita rerum autem accusamus sed. Dolore neque voluptatum facilis voluptatibus.','0','2023-07-25 05:40:27','2023-07-25 05:40:27'),(24,'Sed omnis voluptatibus voluptas.','sed-omnis-voluptatibus-voluptas','Quia hic quam quam laborum voluptatem. Non repellendus doloribus quis voluptas. Architecto architecto sit molestiae tenetur rerum. Illo eum repudiandae perspiciatis sapiente.','1','2023-07-25 05:40:27','2023-07-25 05:40:27'),(25,'Eos cum distinctio repudiandae eaque pariatur illum itaque explicabo.','eos-cum-distinctio-repudiandae-eaque-pariatur-illum-itaque-explicabo','Velit dolorum autem nihil veniam ipsum. Distinctio quos facilis molestiae perferendis. Fuga sunt et est. Iste est veritatis delectus.','0','2023-07-25 05:40:27','2023-07-25 05:40:27');
/*!40000 ALTER TABLE `topics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Keon Welch','sheldon.bosco@example.net','2023-07-25 05:40:27','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','77uwOFUpy6','2023-07-25 05:40:27','2023-07-25 05:40:27'),(2,'Lane Little','mcummerata@example.com','2023-07-25 05:40:27','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','81mQfp55iR','2023-07-25 05:40:27','2023-07-25 05:40:27'),(3,'Prof. Deonte Powlowski','vbednar@example.com','2023-07-25 05:40:27','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','IeDU8YKjog','2023-07-25 05:40:27','2023-07-25 05:40:27'),(4,'Mr. Lowell Larkin III','amara.king@example.net','2023-07-25 05:40:27','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','g5s7ncpAau','2023-07-25 05:40:27','2023-07-25 05:40:27'),(5,'Armand Emmerich','moore.hilda@example.com','2023-07-25 05:40:27','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','POTX2vIJWZ','2023-07-25 05:40:27','2023-07-25 05:40:27'),(6,'Pham Truong Xuan','admin@gmail.com','2023-07-25 05:40:27','$2y$10$uYmmJf4lc3uFfLu3NjquTOj1NgmeGe4hDYPCjke.nNRBEjxemX3tC','V9zbbMP0es','2023-07-25 05:40:27','2023-07-25 05:40:27');
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

-- Dump completed on 2023-07-25 19:43:24
