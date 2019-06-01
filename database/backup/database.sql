-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.21 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.5.0.5289
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table main1.area
CREATE TABLE IF NOT EXISTS `area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `alias` varchar(400) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table main1.area: 10 rows
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
REPLACE INTO `area` (`id`, `name`, `alias`, `created_at`, `updated_at`) VALUES
	(1, 'Administración', '#Administracion#,#ADMINISTRACION PUBLICA, DEFENSA Y SEGURIDAD SOCIAL OBLIGATORIA#\r\n', NULL, NULL),
	(2, 'Agropecuario', '#agropecuario#\r\n', NULL, NULL),
	(3, 'Comercio', '#comercio#\r\n', NULL, NULL),
	(4, 'Construcción', '#construccion#\r\n', NULL, NULL),
	(5, 'Minería', '#explotacion de minas y canteras#,#Minería#,#EXPLOTACION DE MINAS Y CANTERAS#', NULL, NULL),
	(6, 'Industria', '#industria manufacturera#,#Industria#,#EXPLOTACION DE MINAS Y CANTERAS#', NULL, NULL),
	(7, 'Info y Com', '#informacion y comunicaciones#,#Info y Com#,#INFORMACION Y COMUNICACIONES#', NULL, NULL),
	(8, 'Oil & Gas', '#oil and gas#,#Oil & Gas#\r\n', NULL, NULL),
	(9, 'Servicios', '#servicios#\r\n', NULL, NULL),
	(10, 'Suministro de Servicios', '#Suministro de servicios#,#SUMINISTRO DE ELECTRICIDAD, GAS, VAPOR, AIRE ACONDICIONADO, AGUA Y GESTION DE RESIDUOS#\r\n', NULL, NULL);
/*!40000 ALTER TABLE `area` ENABLE KEYS */;

-- Dumping structure for table main1.base
CREATE TABLE IF NOT EXISTS `base` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `active` bit(1) DEFAULT b'0',
  `sidenotes` varchar(1000) DEFAULT NULL,
  `attach` varchar(200) DEFAULT NULL,
  `attach_mad` varchar(200) DEFAULT NULL,
  `attach_mediana` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table main1.base: 5 rows
/*!40000 ALTER TABLE `base` DISABLE KEYS */;
REPLACE INTO `base` (`id`, `name`, `active`, `sidenotes`, `attach`, `attach_mad`, `attach_mediana`, `created_at`, `updated_at`) VALUES
	(9, 'Enviada como Prueba para un cluster', b'1', NULL, 'bases/base-test1.xlsx-MF4FCJmT3c.xlsx', NULL, NULL, '2018-11-09 17:46:06', '2018-11-13 14:43:54'),
	(11, 'Prueba Mad y Mediana', b'1', NULL, 'bases/Forecaster Template EGO Universos.xlsx-PEpL6tWqDy.xlsx', 'bases/Simulador - MAD Histórico por empresa_f-kRs0OVuSQv.xlsx', 'bases/Simulador - Mediana de facturación Hist-MLXneJbbFT.xlsx', '2018-12-18 12:04:48', '2018-12-21 11:09:51'),
	(10, 'Ultima corrida Forecaster Full', b'1', NULL, 'bases/Master_Forecaster_12_11_18.xlsx-jNu8Qp5O6o.xlsx', NULL, NULL, '2018-11-13 17:48:32', '2018-11-13 17:48:50'),
	(12, 'Base Prueba con 3 Excels 1', b'1', NULL, 'bases/Master_Forecaster_12_11_18_v2.xlsx-CRppCGpSWE.xlsx', 'bases/Simulador - MAD Histórico por empresa_f-dmF6qUDqlV.xlsx', 'bases/Mediana Historica final v6.xlsx-XsKJxgaDIS.xlsx', '2018-12-26 11:53:33', '2019-05-06 18:02:51'),
	(16, 'Prueba Mediana', b'0', NULL, 'bases/Master_Forecaster_12_11_18_v2.xlsx-wmOIrEl6x5.xlsx', NULL, 'bases/Mediana Historica final v6.xlsx-vgECDUr0vm.xlsx', '2019-05-02 14:32:48', '2019-05-06 17:59:14');
/*!40000 ALTER TABLE `base` ENABLE KEYS */;

-- Dumping structure for table main1.base_value
CREATE TABLE IF NOT EXISTS `base_value` (
  `base_id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `zone_id` tinyint(4) NOT NULL,
  `family_id` smallint(6) NOT NULL,
  `source_id` int(11) NOT NULL,
  `area_id` int(10) unsigned NOT NULL,
  `company_size_id` int(10) unsigned NOT NULL,
  `value` double(10,2) DEFAULT '0.00',
  `table_id` varchar(50) NOT NULL,
  `row` int(10) unsigned DEFAULT '0',
  `col` int(10) unsigned DEFAULT '0',
  UNIQUE KEY `uniqqq` (`base_id`,`business_id`,`family_id`,`zone_id`,`source_id`,`area_id`,`company_size_id`),
  KEY `generator_id` (`base_id`),
  KEY `table_id` (`table_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

-- Dumping data for table main1.base_value: 0 rows
/*!40000 ALTER TABLE `base_value` DISABLE KEYS */;
/*!40000 ALTER TABLE `base_value` ENABLE KEYS */;

-- Dumping structure for table main1.base_x_user
CREATE TABLE IF NOT EXISTS `base_x_user` (
  `base_id` int(11) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `is_primary` bit(1) NOT NULL DEFAULT b'0',
  KEY `generator_id` (`base_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

-- Dumping data for table main1.base_x_user: 0 rows
/*!40000 ALTER TABLE `base_x_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `base_x_user` ENABLE KEYS */;

-- Dumping structure for table main1.business
CREATE TABLE IF NOT EXISTS `business` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `alias` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table main1.business: 4 rows
/*!40000 ALTER TABLE `business` DISABLE KEYS */;
REPLACE INTO `business` (`id`, `name`, `alias`, `created_at`, `updated_at`) VALUES
	(1, 'Alquiler', '#alq#,#Alquileres#', '2018-10-01 16:12:42', NULL),
	(2, 'Venta', '#ven#,#Ventas#', '2018-10-01 16:12:43', '2018-10-23 15:26:34'),
	(4, 'Postventa', '#pos#,#Postventa#', '2018-10-01 16:12:45', '2018-10-01 19:30:21'),
	(5, 'Respuestos', '#rep#,#Repuestos#', NULL, NULL);
/*!40000 ALTER TABLE `business` ENABLE KEYS */;

-- Dumping structure for table main1.company_size
CREATE TABLE IF NOT EXISTS `company_size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `alias` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table main1.company_size: 6 rows
/*!40000 ALTER TABLE `company_size` DISABLE KEYS */;
REPLACE INTO `company_size` (`id`, `name`, `alias`, `created_at`, `updated_at`) VALUES
	(1, '1', '#1#', '2018-10-06 15:43:48', '2018-10-16 11:44:02'),
	(2, '2', '#2#', '2018-10-06 15:43:47', '2018-10-16 11:44:02'),
	(3, '3', '#3#', '2018-10-06 15:43:46', '2018-10-16 11:44:01'),
	(4, '4', '#4#', '2018-10-06 15:43:45', '2018-10-06 19:58:49'),
	(5, '5', '#5#', '2018-10-16 11:43:57', '2018-10-16 11:44:00'),
	(6, '6', '#6#', '2018-10-16 11:43:59', '2018-10-16 11:43:59');
/*!40000 ALTER TABLE `company_size` ENABLE KEYS */;

-- Dumping structure for table main1.family
CREATE TABLE IF NOT EXISTS `family` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `alias` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table main1.family: 8 rows
/*!40000 ALTER TABLE `family` DISABLE KEYS */;
REPLACE INTO `family` (`id`, `name`, `alias`, `created_at`, `updated_at`) VALUES
	(1, 'Movimiento de Tierra', '#Tier#,#Tierra#', '2018-10-01 16:49:04', NULL),
	(2, 'Torres de Iluminación', '#Torr#,#Torres#', '2018-10-01 16:49:09', NULL),
	(3, 'Grupos Electrógenos', '#Grup#,#Grupos#', '2018-10-06 16:19:13', NULL),
	(4, 'Plataformas de Trabajo en Altura', '#Plat#,#Plataformas#', '2018-10-06 16:19:19', '2018-10-16 17:22:30'),
	(7, 'Compresores', '#Comp#,#Compresores#', '2018-12-18 12:52:04', NULL),
	(8, 'Manipuladores Telescópicos', '#Mani#,#Manipuladores#', '2018-12-18 12:52:05', NULL),
	(9, 'Repuestos multiproducto', '#Repuestos multiproducto#', '2018-12-18 15:22:57', NULL),
	(10, 'Mantenimiento', '#Mantenimiento#', '2018-12-18 15:23:11', NULL);
/*!40000 ALTER TABLE `family` ENABLE KEYS */;

-- Dumping structure for table main1.member
CREATE TABLE IF NOT EXISTS `member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table main1.member: 1 rows
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
REPLACE INTO `member` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Name 1', 'user1@gmail.com', '$2y$10$XaNSnn4pemebG3LAP.PcSOhQC33HGjmbsq.gh5J4sE49qYKFUu6oa', NULL, '2019-05-09 11:26:19', '2019-05-09 11:26:19', NULL);
/*!40000 ALTER TABLE `member` ENABLE KEYS */;

-- Dumping structure for table main1.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table main1.migrations: 6 rows
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(3, '2014_10_12_000000_create_users_table', 1),
	(4, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
	(5, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
	(6, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
	(7, '2016_06_01_000004_create_oauth_clients_table', 2),
	(8, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table main1.oauth_access_tokens
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table main1.oauth_access_tokens: 2 rows
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
REPLACE INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
	('854a00753b158466d6761aa9cf58e67197785e62fca21a7532533d67ce3eb56b2b3fc860feca303c', 1, 3, 'Personal Access Token', '[]', 1, '2019-05-09 12:37:29', '2019-05-09 12:37:29', '2019-05-16 12:37:29'),
	('07d1fd9cad964b76a657b241eb5a8851bc2e400086b6569fdf554818c2b618ef1f12c468d8840d43', 1, 3, 'Personal Access Token', '[]', 0, '2019-05-09 12:50:50', '2019-05-09 12:50:50', '2021-05-09 12:50:50');
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;

-- Dumping structure for table main1.oauth_auth_codes
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table main1.oauth_auth_codes: 0 rows
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;

-- Dumping structure for table main1.oauth_clients
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table main1.oauth_clients: 4 rows
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
REPLACE INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'Main1 Personal Access Client', 'ySfqdiRCeGIiKjrift7zD8Bpv6LQDkNk1M0VSUgL', 'http://localhost', 1, 0, 0, '2019-05-09 10:32:34', '2019-05-09 10:32:34'),
	(2, NULL, 'Main1 Password Grant Client', '6UIYkIwv0JIr7kXq1qDZnlILFAKNfQRQBZlVxDTD', 'http://localhost', 0, 1, 0, '2019-05-09 10:32:34', '2019-05-09 10:32:34'),
	(3, NULL, 'Main1 Personal Access Client', 'VPvsqmc7n6zJ19fRZVg9G8KPw8ZDA0yhLdM3YNCf', 'http://localhost', 1, 0, 0, '2019-05-09 10:32:47', '2019-05-09 10:32:47'),
	(4, NULL, 'Main1 Password Grant Client', '4gLCcayNEG8FyGmUZxu1foffQmUZNdkPViBnay9L', 'http://localhost', 0, 1, 0, '2019-05-09 10:32:47', '2019-05-09 10:32:47');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;

-- Dumping structure for table main1.oauth_personal_access_clients
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table main1.oauth_personal_access_clients: 2 rows
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
REPLACE INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
	(1, 1, '2019-05-09 10:32:34', '2019-05-09 10:32:34'),
	(2, 3, '2019-05-09 10:32:47', '2019-05-09 10:32:47');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;

-- Dumping structure for table main1.oauth_refresh_tokens
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table main1.oauth_refresh_tokens: 0 rows
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;

-- Dumping structure for table main1.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table main1.password_resets: 0 rows
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table main1.profile
CREATE TABLE IF NOT EXISTS `profile` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table main1.profile: 4 rows
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
REPLACE INTO `profile` (`id`, `code`, `name`, `description`) VALUES
	(1, 'admin', 'Configuración de Sistema', 'Acceso a las configuraciónes especificas del sistema, pudiendo alterar tablas primarias, modelo de importación del excel y manejo de otros usuarios.'),
	(2, 'bases', 'Administrar Bases', 'Acceso al modulo donde se importan las Bases (Excels) que luego se utilizan para las simulaciones.'),
	(3, 'cross-simulation', 'Simulaciones Globales', 'Acceso a las simulaciones hechas por todos los usuarios (no sólo las propias)'),
	(4, 'cluster-free', 'Todos los Clusters', 'Puede generar simulaciones para cualquier Zona, Negocio y Familia de Productos, independientemente de las que tenga asignadas.');
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;

-- Dumping structure for table main1.scenario
CREATE TABLE IF NOT EXISTS `scenario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `factor` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table main1.scenario: 3 rows
/*!40000 ALTER TABLE `scenario` DISABLE KEYS */;
REPLACE INTO `scenario` (`id`, `name`, `factor`, `created_at`, `updated_at`) VALUES
	(2, 'Pesimista', -0.5, NULL, '2018-10-16 17:37:29'),
	(1, 'Neutro', 0, NULL, '2018-10-16 17:36:24'),
	(3, 'Optimista', 0.5, NULL, '2018-10-16 17:37:17');
/*!40000 ALTER TABLE `scenario` ENABLE KEYS */;

-- Dumping structure for table main1.segment
CREATE TABLE IF NOT EXISTS `segment` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table main1.segment: ~4 rows (approximately)
/*!40000 ALTER TABLE `segment` DISABLE KEYS */;
REPLACE INTO `segment` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Clientes', NULL, NULL),
	(2, 'Recovery', NULL, NULL),
	(3, 'Cross', NULL, NULL),
	(4, 'Prospect', NULL, '2018-10-16 19:50:21');
/*!40000 ALTER TABLE `segment` ENABLE KEYS */;

-- Dumping structure for table main1.simulation
CREATE TABLE IF NOT EXISTS `simulation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `business_id` int(11) DEFAULT NULL,
  `family_id` smallint(6) DEFAULT NULL,
  `zone_id` tinyint(4) DEFAULT NULL,
  `base_id` int(11) DEFAULT NULL,
  `segment_id` tinyint(4) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `active` bit(1) DEFAULT b'0',
  `sidenotes` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table main1.simulation: 3 rows
/*!40000 ALTER TABLE `simulation` DISABLE KEYS */;
REPLACE INTO `simulation` (`id`, `name`, `business_id`, `family_id`, `zone_id`, `base_id`, `segment_id`, `user_id`, `active`, `sidenotes`, `created_at`, `updated_at`) VALUES
	(28, 'Simulación de Rodrigo 13 noviembre 2018', 1, 2, 1, 9, 2, 1, b'1', NULL, '2018-11-13 14:43:58', '2018-11-13 17:21:50'),
	(29, 'Simulación de Rodrigo 13 noviembre 2018', 1, 1, 3, 10, 2, 1, b'1', NULL, '2018-11-13 17:50:19', '2018-11-20 17:57:17'),
	(30, 'Simulación 3 Excels 1', 1, 2, 1, 12, 1, 1, b'0', NULL, '2018-12-21 10:54:59', '2019-05-06 14:40:45');
/*!40000 ALTER TABLE `simulation` ENABLE KEYS */;

-- Dumping structure for table main1.simulation_value
CREATE TABLE IF NOT EXISTS `simulation_value` (
  `simulation_id` int(11) NOT NULL,
  `company_size_id` int(10) unsigned NOT NULL,
  `area_id` int(10) unsigned NOT NULL,
  `segment_id` tinyint(3) unsigned NOT NULL,
  `value` double unsigned NOT NULL DEFAULT '0',
  KEY `generator_id` (`simulation_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

-- Dumping data for table main1.simulation_value: 53 rows
/*!40000 ALTER TABLE `simulation_value` DISABLE KEYS */;
REPLACE INTO `simulation_value` (`simulation_id`, `company_size_id`, `area_id`, `segment_id`, `value`) VALUES
	(28, 4, 1, 2, 8),
	(28, 3, 1, 2, 7),
	(28, 2, 1, 2, 6),
	(28, 1, 1, 2, 5),
	(28, 1, 1, 1, 1),
	(28, 2, 1, 1, 2),
	(28, 3, 1, 1, 3),
	(28, 4, 1, 1, 4),
	(29, 3, 2, 1, 50),
	(29, 3, 5, 1, 50),
	(29, 2, 4, 2, 30),
	(29, 3, 4, 2, 20),
	(29, 4, 4, 2, 50),
	(29, 5, 9, 2, 10),
	(30, 6, 10, 1, 50),
	(30, 5, 10, 1, 50),
	(30, 4, 10, 1, 50),
	(30, 3, 10, 1, 50),
	(30, 2, 10, 1, 50),
	(30, 1, 10, 1, 50),
	(30, 6, 9, 1, 50),
	(30, 5, 9, 1, 50),
	(30, 4, 9, 1, 50),
	(30, 3, 9, 1, 25),
	(30, 2, 9, 1, 25),
	(30, 1, 9, 1, 25),
	(30, 6, 8, 1, 50),
	(30, 5, 8, 1, 50),
	(30, 4, 8, 1, 50),
	(30, 3, 8, 1, 25),
	(30, 2, 8, 1, 25),
	(30, 1, 8, 1, 25),
	(30, 6, 7, 1, 10),
	(30, 5, 7, 1, 10),
	(30, 4, 7, 1, 10),
	(30, 3, 7, 1, 10),
	(30, 2, 7, 1, 10),
	(30, 1, 7, 1, 10),
	(30, 2, 4, 1, 25),
	(30, 1, 4, 1, 25),
	(30, 5, 3, 1, 25),
	(30, 4, 3, 1, 25),
	(30, 3, 3, 1, 25),
	(30, 1, 3, 1, 25),
	(30, 5, 2, 1, 25),
	(30, 2, 2, 1, 25),
	(30, 4, 1, 1, 25),
	(30, 3, 1, 1, 25),
	(30, 2, 1, 1, 25),
	(30, 1, 1, 1, 25),
	(30, 2, 2, 2, 25),
	(30, 1, 4, 2, 25),
	(30, 2, 4, 2, 25);
/*!40000 ALTER TABLE `simulation_value` ENABLE KEYS */;

-- Dumping structure for table main1.simulation_x_area
CREATE TABLE IF NOT EXISTS `simulation_x_area` (
  `simulation_id` int(11) NOT NULL,
  `area_id` int(10) unsigned NOT NULL,
  `scenario_id` int(11) NOT NULL,
  `sort` smallint(6) NOT NULL DEFAULT '0',
  KEY `generator_id` (`simulation_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

-- Dumping data for table main1.simulation_x_area: 30 rows
/*!40000 ALTER TABLE `simulation_x_area` DISABLE KEYS */;
REPLACE INTO `simulation_x_area` (`simulation_id`, `area_id`, `scenario_id`, `sort`) VALUES
	(28, 10, 2, 9),
	(28, 9, 2, 8),
	(28, 8, 2, 7),
	(28, 7, 2, 6),
	(28, 6, 2, 5),
	(28, 5, 2, 4),
	(28, 4, 2, 3),
	(28, 3, 2, 2),
	(28, 2, 2, 1),
	(28, 1, 2, 0),
	(29, 10, 2, 9),
	(29, 9, 2, 8),
	(29, 8, 2, 7),
	(29, 7, 2, 6),
	(29, 6, 2, 5),
	(29, 5, 2, 4),
	(29, 4, 2, 3),
	(29, 3, 2, 2),
	(29, 2, 2, 1),
	(29, 1, 2, 0),
	(30, 10, 2, 11),
	(30, 9, 2, 10),
	(30, 8, 3, 9),
	(30, 7, 2, 8),
	(30, 6, 2, 7),
	(30, 5, 2, 6),
	(30, 4, 2, 5),
	(30, 3, 3, 4),
	(30, 2, 2, 3),
	(30, 1, 2, 2);
/*!40000 ALTER TABLE `simulation_x_area` ENABLE KEYS */;

-- Dumping structure for table main1.simulation_x_company_size
CREATE TABLE IF NOT EXISTS `simulation_x_company_size` (
  `simulation_id` int(11) NOT NULL,
  `company_size_id` int(10) unsigned NOT NULL,
  `sort` smallint(6) NOT NULL DEFAULT '0',
  KEY `generator_id` (`simulation_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

-- Dumping data for table main1.simulation_x_company_size: 18 rows
/*!40000 ALTER TABLE `simulation_x_company_size` DISABLE KEYS */;
REPLACE INTO `simulation_x_company_size` (`simulation_id`, `company_size_id`, `sort`) VALUES
	(28, 6, 5),
	(28, 5, 4),
	(28, 4, 3),
	(28, 3, 2),
	(28, 2, 1),
	(28, 1, 0),
	(29, 6, 5),
	(29, 5, 4),
	(29, 4, 3),
	(29, 3, 2),
	(29, 2, 1),
	(29, 1, 0),
	(30, 6, 7),
	(30, 5, 6),
	(30, 4, 5),
	(30, 3, 4),
	(30, 2, 3),
	(30, 1, 2);
/*!40000 ALTER TABLE `simulation_x_company_size` ENABLE KEYS */;

-- Dumping structure for table main1.simulation_x_user
CREATE TABLE IF NOT EXISTS `simulation_x_user` (
  `simulation_id` int(11) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `is_primary` bit(1) NOT NULL DEFAULT b'0',
  KEY `generator_id` (`simulation_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

-- Dumping data for table main1.simulation_x_user: 3 rows
/*!40000 ALTER TABLE `simulation_x_user` DISABLE KEYS */;
REPLACE INTO `simulation_x_user` (`simulation_id`, `user_id`, `is_primary`) VALUES
	(29, 1, b'0'),
	(28, 1, b'0'),
	(30, 1, b'0');
/*!40000 ALTER TABLE `simulation_x_user` ENABLE KEYS */;

-- Dumping structure for table main1.source
CREATE TABLE IF NOT EXISTS `source` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `from_row` smallint(6) DEFAULT NULL,
  `from_col` smallint(6) DEFAULT NULL,
  `active` bit(1) DEFAULT b'0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table main1.source: 19 rows
/*!40000 ALTER TABLE `source` DISABLE KEYS */;
REPLACE INTO `source` (`id`, `name`, `code`, `from_row`, `from_col`, `active`, `created_at`, `updated_at`) VALUES
	(1, 'Clientes Ultimos 5 Años', 'clientes_ultimos_5_anos', 2, 1, b'1', NULL, NULL),
	(2, 'Total Mercado', 'total_mercado', 16, 1, b'1', NULL, NULL),
	(3, 'Clientes Históricos', 'clientes_historicos', 30, 1, b'1', NULL, NULL),
	(4, 'Pot AB', 'pot_ab', 44, 1, b'1', NULL, NULL),
	(5, 'Cross', 'cross', 59, 1, b'1', NULL, NULL),
	(6, 'Antiguedad Histórica: Mediana', 'antiguedad_historica_mediana', 74, 1, b'1', NULL, NULL),
	(7, 'Cotas Prospectos: Mediana', 'cotas_prospectos_mediana', 87, 1, b'1', NULL, NULL),
	(8, 'Cotas Clientes: Mediana', 'cotas_clientes_mediana', 100, 1, b'1', NULL, NULL),
	(9, 'Cotas Recuperados: Mediana', 'cotas_recuperados_mediana', 113, 1, b'1', NULL, NULL),
	(10, 'Clientes Ultimos 5 Años: Mediana Facturación', 'clientes_ultimos_5_anos_mediana_facturacion', 2, 10, b'1', NULL, NULL),
	(11, 'Pot AB: Mediana Facturación', 'pot_ab_mediana_facturacion', 44, 10, b'1', NULL, NULL),
	(12, 'Cotas Prospectos MAD', 'cotas_prospectos_mad', 87, 9, b'1', NULL, NULL),
	(13, 'Cotas Clientes MAD', 'cotas_clientes_mad', 100, 9, b'1', NULL, NULL),
	(14, 'Cotas Recuperados MAD', 'cotas_recuperados_mad', 113, 9, b'1', NULL, NULL),
	(15, 'Clientes Ultimos 5 Años: MAD Facturación', 'clientes_ultimos_5_anos_mad_facturacion', 2, 18, b'1', NULL, NULL),
	(16, 'Pot AB: MAD Facturación', 'pot_ab_mad_facturacion', 44, 18, b'1', NULL, NULL),
	(17, 'MAD General', 'mad_general', 0, 0, b'0', NULL, NULL),
	(18, 'Mediana General', 'mediana_general', 0, 0, b'0', NULL, NULL),
	(19, 'Prospect', 'prospect', 16, 10, b'1', NULL, NULL);
/*!40000 ALTER TABLE `source` ENABLE KEYS */;

-- Dumping structure for table main1.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_type` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `god` bit(1) NOT NULL DEFAULT b'0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table main1.user: 4 rows
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`id`, `email`, `name`, `lastname`, `phone`, `document_type`, `document_number`, `password`, `remember_token`, `god`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'rbutta@gmail.com', 'Rodrigo', 'Rodrigo', NULL, 'dni', '30566124', '$2y$10$IqoDBBU7eptdjABYR08w6.ERDDnEjIk9j//NUqyPa/Q3tBX1UKbAK', 'gfF2FiCmxlyqhENuInxpDTBioxN6gdEIzc4ZcfqpMzh725BAGmMHFqacMM0u', b'0', '2018-09-30 13:55:50', '2018-09-30 13:55:50', NULL),
	(2, 'mmendez@sullair.com.ar', 'Matías', 'Mendez', '555555555', 'dni', '12345678', '$2y$10$0HFpNPIka.hvksMBjHOfQ.J4rxyt9PDiUMRKNHgGwFhRz3uKbYGGG', NULL, b'0', '2018-09-30 14:57:02', '2018-11-14 10:54:34', NULL),
	(3, 'malopez@sullair.com.ar', 'Martín', 'López', NULL, 'dni', '11111111', '$2y$10$aj8evmF2ySNSyPBRUnNK9OOHSCUJjHvB5Ep5emBquGQz7U5ykoOEm', NULL, b'0', '2018-10-01 12:52:32', '2019-05-03 14:57:51', NULL),
	(4, 'borra@me.com', 'borra', 'me', NULL, 'dni', '1232131', '$2y$10$YKtLH663PBXUJw8MU/PwOe60Sfo7wlh9w/rQqBekqZkJuJCQw7bsS', NULL, b'0', '2018-11-13 15:23:55', '2018-11-13 15:24:17', '2018-11-13 15:24:17');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table main1.user_config
CREATE TABLE IF NOT EXISTS `user_config` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=150 DEFAULT CHARSET=utf8;

-- Dumping data for table main1.user_config: 3 rows
/*!40000 ALTER TABLE `user_config` DISABLE KEYS */;
REPLACE INTO `user_config` (`id`, `user_id`, `name`, `value`) VALUES
	(148, 1, 'sidebar-locked', '1'),
	(147, 1, 'generator-map-bounds', '{"center":{"lat":-34.58479919836337,"lng":-58.44637448364256},"zoom":13}'),
	(149, 3, 'sidebar-locked', '1');
/*!40000 ALTER TABLE `user_config` ENABLE KEYS */;

-- Dumping structure for table main1.user_x_business
CREATE TABLE IF NOT EXISTS `user_x_business` (
  `user_id` int(10) unsigned NOT NULL,
  `business_id` int(11) NOT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

-- Dumping data for table main1.user_x_business: 1 rows
/*!40000 ALTER TABLE `user_x_business` DISABLE KEYS */;
REPLACE INTO `user_x_business` (`user_id`, `business_id`) VALUES
	(1, 1);
/*!40000 ALTER TABLE `user_x_business` ENABLE KEYS */;

-- Dumping structure for table main1.user_x_family
CREATE TABLE IF NOT EXISTS `user_x_family` (
  `user_id` int(10) unsigned NOT NULL,
  `family_id` int(11) NOT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

-- Dumping data for table main1.user_x_family: 2 rows
/*!40000 ALTER TABLE `user_x_family` DISABLE KEYS */;
REPLACE INTO `user_x_family` (`user_id`, `family_id`) VALUES
	(1, 2),
	(1, 7);
/*!40000 ALTER TABLE `user_x_family` ENABLE KEYS */;

-- Dumping structure for table main1.user_x_profile
CREATE TABLE IF NOT EXISTS `user_x_profile` (
  `user_id` int(10) unsigned NOT NULL,
  `profile_id` tinyint(4) NOT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table main1.user_x_profile: 14 rows
/*!40000 ALTER TABLE `user_x_profile` DISABLE KEYS */;
REPLACE INTO `user_x_profile` (`user_id`, `profile_id`) VALUES
	(1, 1),
	(1, 4),
	(1, 2),
	(2, 1),
	(2, 2),
	(2, 3),
	(1, 3),
	(4, 1),
	(4, 3),
	(2, 4),
	(3, 1),
	(3, 2),
	(3, 3),
	(3, 4);
/*!40000 ALTER TABLE `user_x_profile` ENABLE KEYS */;

-- Dumping structure for table main1.user_x_zone
CREATE TABLE IF NOT EXISTS `user_x_zone` (
  `user_id` int(10) unsigned NOT NULL,
  `zone_id` tinyint(4) NOT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

-- Dumping data for table main1.user_x_zone: 4 rows
/*!40000 ALTER TABLE `user_x_zone` DISABLE KEYS */;
REPLACE INTO `user_x_zone` (`user_id`, `zone_id`) VALUES
	(1, 2),
	(1, 4),
	(1, 5),
	(4, 2);
/*!40000 ALTER TABLE `user_x_zone` ENABLE KEYS */;

-- Dumping structure for table main1.zone
CREATE TABLE IF NOT EXISTS `zone` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `alias` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table main1.zone: ~7 rows (approximately)
/*!40000 ALTER TABLE `zone` DISABLE KEYS */;
REPLACE INTO `zone` (`id`, `name`, `alias`, `created_at`, `updated_at`) VALUES
	(0, 'Nacional *', NULL, NULL, NULL),
	(1, 'Neuquén', '#Neu#', NULL, NULL),
	(3, 'Mendoza', '#Men#', NULL, NULL),
	(4, 'Bahía Blanca', '#Bah#', NULL, NULL),
	(5, 'Tucumán', '#Tuc#', NULL, NULL),
	(6, 'Comodoro Rivadavia', '#Com#', NULL, '2018-12-21 15:20:07'),
	(7, 'Corrientes', '#Cor#', NULL, NULL);
/*!40000 ALTER TABLE `zone` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
