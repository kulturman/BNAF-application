-- MySQL dump 10.13  Distrib 5.7.42, for Linux (x86_64)
--
-- Host: localhost    Database: core-ui
-- ------------------------------------------------------
-- Server version	5.7.42

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
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,NULL,'Qu’est qu’une opération suspecte ?','<h3><strong>Qu’est qu’une opération suspecte ?</strong></h3><p>Une opération suspecte est toute opération ou tout fait considéré comme particulièrement susceptible d’être lié au blanchiment et/ou au financement du terrorisme, et ce :<br>– En raison de la nature ou du caractère inhabituel de l’opération par rapport aux activités du client ;<br>– En raison des circonstances qui l’entourent ;<br>– En raison de la qualité des personnes impliquées dans l’opération.</p><h3><strong>Comment déclarer</strong></h3><p>Le devoirs de déclaration d’opérations suspectes et autres opérations spécifiques, incombe aux assujettis de la CENTIF cités à l’article 5 de la &nbsp;loi Ordinaire L/2021/024/AN du 17 août 2021 relative à la lutte contre le blanchiment des capitaux et le financement du terrorisme.</p><p>Selon l’article 45 de la loi Ordinaire L/2021/024/AN du 17 août 2021 relative à la lutte contre le blanchiment des capitaux et le financement du terrorisme;</p><p><strong>1-</strong> Lorsqu’une institution financière suspecte, ou a des motifs raisonnables de suspecter que des fonds et autres biens sont le produit de ou pourraient être associes a une activité criminelle ou ont un lien avec le financement du terrorisme, elle doit, immédiatement et de sa propre initiative, faire une déclaration d’opération suspecte auprès de la CENTIF.</p><p><strong>2-</strong> Les institutions financières doivent déclarer toutes les opérations suspectes, y compris les tentatives d’ opérations suspectes, quel que soit le montant de l’ opération, ainsi que les opérations qui, postérieurement a leur réalisation, ont été identifiées comme suspectes.</p><p><strong>3-</strong> Les institutions financières soumettent les déclarations d’opérations suspectes dans les conditions prévues par la présente loi et selon un modèle de déclaration fixe par la CENTIF.</p><p><strong>4-</strong> Toute information de nature a modifier l’appréciation portée par la personne physique ou morale lors de la déclaration d’opérations suspectes et tendant à renforcer le soupçon ou a l’infirmer, doit être, sans délai, portée a la<br>connaissance de la CENTIF.</p><p><strong>5-</strong> Aucune déclaration effectuée auprès d’une autorité en application d’un texte autre que la présente loi, ne peut avoir pour effet, de dispenser les institutions financières de l’ exécution de l’ obligation de la déclaration prévue par le présent article.</p>','storage/uploads/ESmr2Nphzsvh8IlJeOMHll9p5W63OBJy3hSuf5pD.jpg','2023-09-13 03:08:11','2023-09-13 16:28:59');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) unsigned NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_uuid_unique` (`uuid`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  KEY `media_order_column_index` (`order_column`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(9,'2023_09_05_235656_create_slides_table',2),(10,'2023_09_06_001225_create_site_configs_table',3),(11,'2023_09_06_004052_create_articles_table',3),(13,'2023_09_13_042806_create_stats_table',4),(14,'2023_09_13_044606_change_site_director_word',5),(20,'2023_09_13_131743_create_reports_table',6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reports` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `localite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validated` tinyint(1) NOT NULL DEFAULT '0',
  `structure` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photoInput` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `repere` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reports`
--

LOCK TABLES `reports` WRITE;
/*!40000 ALTER TABLE `reports` DISABLE KEYS */;
INSERT INTO `reports` VALUES (1,NULL,'cxxvxcvcv',1,'vxcxccccvc',NULL,'storage/uploads/acbb046df4a22bb1df0c066be3bf4600ea85ff1b.png','<p>fghfghfdghdfghdfghdfghdfghfgdhdgfhdfghfgdhdfghdgfhdfghdfghdfgh</p>','ddd',NULL,NULL,'2023-09-13 16:00:38','2023-09-14 01:26:48'),(2,NULL,'Village de Réo',1,'ABF','storage/uploads/ELREk8MQDpz1uNfQqVwUM65T2vCXcQWPy4NRfzYk.jpg','storage/uploads/9304fc613a080ccd1cec059356412438f2180e13.png','<p>J\'ai remarqué une activté suspecte</p>','A côté du marché',NULL,NULL,'2023-09-14 01:54:09','2023-09-14 01:54:51');
/*!40000 ALTER TABLE `reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_configs`
--

DROP TABLE IF EXISTS `site_configs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_configs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `director_word` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `director_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `director_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_configs`
--

LOCK TABLES `site_configs` WRITE;
/*!40000 ALTER TABLE `site_configs` DISABLE KEYS */;
INSERT INTO `site_configs` VALUES (1,'<p>Chers concitoyens, Je suis ravi de vous annoncer le lancement officiel du site web de la <strong>Brigade Anti-Fraude de l\'Or</strong>. Notre mission est de protéger l\'intégrité du marché de l\'or et de lutter contre les activités frauduleuses qui menacent notre économie et la confiance du public. Ce site web servira de ressource précieuse pour vous informer sur les dernières tendances en matière de fraude de l\'or, les alertes de sécurité, et les mesures que nous prenons pour garantir la transparence et la légitimité de l\'industrie aurifère. Nous encourageons chacun d\'entre vous à explorer notre site, à signaler toute activité suspecte et à collaborer avec nous pour éradiquer la fraude de l\'or. Ensemble, nous pouvons créer un marché de l\'or plus sûr et plus fiable pour tous. N\'hésitez pas à nous contacter si vous avez des questions ou des préoccupations. Votre participation est essentielle pour atteindre nos objectifs. Merci de votre confiance et de votre soutien continu. Cordialement</p>','storage/uploads/mBtzIFNd4Cp0Fid2fsbWN9xrbLz7Cr5mPfedUFWL.jpg','Nom et prénom du DG','72443707','admin@admin.com','Ouagadougou',NULL,NULL,NULL,NULL,NULL,'2023-09-12 11:18:19','2023-09-14 01:56:40');
/*!40000 ALTER TABLE `site_configs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slides`
--

DROP TABLE IF EXISTS `slides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slides` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slides`
--

LOCK TABLES `slides` WRITE;
/*!40000 ALTER TABLE `slides` DISABLE KEYS */;
INSERT INTO `slides` VALUES (1,'jjlmjj','storage/uploads/9wT0CrgH92KlYuz6PsUHDV5pPnolJO9GIaJO1Z4Y.jpg',1,'2023-09-14 01:40:00','2023-09-13 02:43:44','2023-09-14 01:40:00'),(2,'jjlmjj','storage/uploads/ZcFL0BKNyW7CaLPbzFTxjosd6Rm39wsu3zMemRyN.jpg',2,'2023-09-14 01:39:56','2023-09-13 03:27:45','2023-09-14 01:39:56'),(3,NULL,'storage/uploads/BQ8lfRx3TTzx3vUawkXBIvxpbbNHJfmgzSZaKXjw.jpg',2,'2023-09-14 01:42:24','2023-09-14 01:33:34','2023-09-14 01:42:24'),(4,NULL,'storage/uploads/9xMERLIOWZTP0l3nQ3ltY31GtN3IzGz1m8q8J9hw.jpg',2,'2023-09-14 01:42:41','2023-09-14 01:38:05','2023-09-14 01:42:41'),(5,NULL,'storage/uploads/Z7Lz9ks2Z1akFVJxZdANiOGamwF2DThCXTmtkBfI.jpg',4,NULL,'2023-09-14 01:39:08','2023-09-14 01:39:08'),(6,NULL,'storage/uploads/d7vNThSJqawUV9K5G7nHbfFUCglOLyrxn7xiZVmB.jpg',1,'2023-09-14 01:40:54','2023-09-14 01:40:40','2023-09-14 01:40:54'),(7,NULL,'storage/uploads/jdhtJ9OJ64BpkhEtBMK97x54n6YpckVmWfFPoHd1.jpg',1,NULL,'2023-09-14 01:41:30','2023-09-14 01:41:30'),(8,NULL,'storage/uploads/YvMWFWmxz7Xumw3brX5OqTvZv2Sp9ZDK1izcy0ax.jpg',1,'2023-09-14 01:55:20','2023-09-14 01:42:04','2023-09-14 01:55:20'),(9,NULL,'storage/uploads/vCQQdIPvL6FmJWZpR8Q6n22rgy9feDo1zIWgv2C1.jpg',1,NULL,'2023-09-14 02:05:36','2023-09-14 02:05:36');
/*!40000 ALTER TABLE `slides` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stats`
--

DROP TABLE IF EXISTS `stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stats` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `chiffres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stats`
--

LOCK TABLES `stats` WRITE;
/*!40000 ALTER TABLE `stats` DISABLE KEYS */;
INSERT INTO `stats` VALUES (1,'2023-09-14 20:48:57','95 Millions','Or récupéré','<i class=\"fas fa-umbrella-beach\"></i>','2023-09-13 04:36:14','2023-09-14 20:48:57');
/*!40000 ALTER TABLE `stats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Arnaud','admin@bnaf.com','2023-09-05 20:21:13','$2y$10$0XY9ErURFGKG8R8R321Jsuf5fJOgvUo5WPfD.g6N8ryuSwJq3cBgu',NULL,'2023-09-05 20:21:13','2023-09-05 20:21:13'),(2,'Béniadéyi Arnaud Stephane Auguste BAKYONO','arnaudbakyono@gmail.com','2023-09-06 00:53:33','$2y$10$yJ4HzGLRxWpiWBHV7UUYtOolXk5AdxNyeDUBmkRh7BNRw71GdTbM.',NULL,'2023-09-06 00:53:33','2023-09-06 00:53:33');
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

-- Dump completed on 2023-09-18  6:28:15
