-- Adminer 4.8.1 MySQL 8.0.37-0ubuntu0.20.04.3 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `admin_advertisments`;
CREATE TABLE `admin_advertisments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `users` int NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_advertisments_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `admin_advertisments` (`id`, `uuid`, `name`, `image`, `from`, `to`, `description`, `users`, `status`, `created_at`, `updated_at`) VALUES
(1,	'caacee53-24eb-4099-96fe-71fa377759ce',	'Divyesh',	'adminAdversit_images/1715944067_sd-removebg-preview.png',	'2024-05-03',	'2024-05-31',	'ktydghkdhgh',	6,	1,	'2024-05-17 05:37:47',	'2024-05-17 05:37:47');

DROP TABLE IF EXISTS `admin_permissions`;
CREATE TABLE `admin_permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_permissions_uuid_index` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `admin_subscriptions`;
CREATE TABLE `admin_subscriptions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `subscription_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `start_date` date NOT NULL,
  `validity` int NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_id` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_subscriptions_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `admin_subscriptions` (`id`, `uuid`, `status`, `subscription_name`, `amount`, `start_date`, `validity`, `description`, `image`, `plan_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1,	'07282a2b-5b44-4910-bf7c-fcf01997584f',	1,	'divyesh Jadav',	30,	'2024-05-26',	9,	'Divyesh Jadav',	'adminSubscription_images/1716186985_dashboard.JPG',	10,	NULL,	'2024-05-18 00:42:14',	'2024-05-21 06:16:19'),
(2,	'8767c2bf-65f7-4a05-a434-5a34db2d9bfb',	1,	'Anjali Patel fggg',	80,	'2024-07-20',	80,	'Communication hshhrt',	'adminSubscription_images/1716185520_dasboard2.JPG',	500,	NULL,	'2024-05-19 23:43:07',	'2024-05-20 01:03:56');

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gym_id` bigint unsigned NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_users_uuid_index` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `admin_users` (`id`, `uuid`, `user_type`, `gym_id`, `first_name`, `last_name`, `email`, `gender`, `phone_no`, `username`, `password`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(4,	'e21ba7f4-dc0f-4371-be4b-f0bdace1e75d',	'1',	8,	'Divyesh kwk',	'Singh',	'admin1@gmail.com',	'female',	'9978116971',	'test',	'123',	'admin_user_images/1716445645_sales report.JPG',	NULL,	'2024-05-22 03:00:33',	'2024-05-23 04:50:33'),
(5,	'49f1495b-3258-4f45-a631-e3f0dc212809',	'0',	0,	'Sonal',	'Wagh',	'sonal@gmail.com',	'female',	'7436058929',	'sonu@123',	'123',	'admin_user_images/1716445676_dashboard.JPG',	NULL,	'2024-05-22 03:01:12',	'2024-05-23 00:57:56'),
(6,	'dcb07841-da6e-40d1-a9ee-c32b3aec4c6b',	'1',	1,	'Divyesh',	'Thakor',	'admin1@gmail.com',	'male',	'7894561230',	'Divyesh',	'123',	'admin_user_images/1716445232_testing-removebg-preview.png',	NULL,	'2024-05-23 00:47:23',	'2024-05-23 00:50:32'),
(7,	'363ce388-3ee6-410b-b48d-77ff7340cee7',	'1',	2,	'Divyesh',	'Singh',	'admin1@gmail.com',	'male',	'7436058929',	'test23',	'123',	'admin_user_images/1716445629_Capture.png',	NULL,	'2024-05-23 00:48:46',	'2024-05-23 00:57:09'),
(8,	'22de98bf-0dad-493c-a1d0-ef0ab1b8012a',	'1',	3,	'Rahul',	'Patel',	'admin1@gmail.com',	'male',	'7436058929',	'rahu@123',	'123',	'admin_user_images/1716445775_360_F_358464952_b3xHBcdfnCb8kZ8T2sGsHuXaedaGzJQQ.jpg',	NULL,	'2024-05-23 00:59:35',	'2024-05-23 00:59:35'),
(9,	'e7ddfe46-a6f9-42b1-b743-ddb659bd8361',	'0',	0,	'Nanadani',	'Patel',	'nandini.wingersitservices@gmail.com',	'female',	'7436058929',	'nanu@123',	'123',	'admin_user_images/1716449846_paint.png',	NULL,	'2024-05-23 02:07:26',	'2024-05-23 02:07:26');

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_uuid_unique` (`uuid`),
  UNIQUE KEY `admins_username_unique` (`username`),
  UNIQUE KEY `admins_phone_no_unique` (`phone_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `failed_jobs`;
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


DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `gallery_id` bigint unsigned NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `images_gallery_id_foreign` (`gallery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `industries_categories`;
CREATE TABLE `industries_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gym_subscriptions_uuid_index` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `industries_categories` (`id`, `uuid`, `category_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1,	'231074de-ab01-4c9f-8247-d0ee6fa4a197',	'silver',	'2024-06-20 04:18:39',	'2024-05-18 00:43:05',	'2024-06-20 04:18:39'),
(2,	'0c323c78-b23a-40d9-859e-89fbe1f495cc',	'Gold',	'2024-06-20 04:18:41',	'2024-05-20 00:42:59',	'2024-06-20 04:18:41'),
(3,	'94fa405c-e0f5-4d4a-b40a-2f215f280d90',	'Platinum',	'2024-06-20 04:18:42',	'2024-05-29 07:29:06',	'2024-06-20 04:18:42'),
(5,	'c14c9739-d95d-4783-9322-419c1313a8ce',	'Trial',	'2024-06-20 04:18:45',	'2024-06-09 13:41:35',	'2024-06-20 04:18:45'),
(6,	'83dca89c-412c-46dc-84bb-9786b20f1625',	'One Hour',	'2024-06-20 04:18:46',	'2024-06-18 11:52:38',	'2024-06-20 04:18:46'),
(7,	'698726d0-2554-413b-86b1-7269ee853902',	'Boiler & Accessories',	NULL,	'2024-06-20 04:01:12',	'2024-06-20 04:01:12');

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'0001_01_01_000000_create_users_table',	1),
(2,	'0001_01_01_000001_create_cache_table',	1),
(3,	'0001_01_01_000002_create_jobs_table',	1);

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('o2BnQ2CD1io25tjj9plAtGKwAXtUMxhqAAlB71EZ',	NULL,	'127.0.0.1',	'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSFNqVXZlTU85QmNOaEN4ejZ6ZjBOMTFONGM3anB3OFhESnYyYVh5QSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMS9hZG1pbi9pbWFnZXMvYXZhdGFyLzEuanBnX19fL2Rpdl9fZGl2JTIwY2xhc3MlM2QuaHRtbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1719038404);

DROP TABLE IF EXISTS `user_inquiries`;
CREATE TABLE `user_inquiries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `gym_id` int NOT NULL,
  `inquiry_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inquiry` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_inquiries_uuid_index` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `user_notifications`;
CREATE TABLE `user_notifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_notifications_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `user_notifications` (`id`, `uuid`, `name`, `description`, `created_at`, `updated_at`) VALUES
(3,	'ba66a61a-17f0-4bdc-8ba9-9047b092efe4',	'Communation',	'Divyesh',	'2024-05-18 00:09:10',	'2024-05-18 00:09:10'),
(6,	'e10b804c-f3a1-4cda-86f8-17994ae7e648',	'Divyesh',	'sdfgbodfho',	'2024-05-18 04:48:16',	'2024-05-18 04:48:16');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gym_id` bigint unsigned NOT NULL,
  `trainer_id` bigint unsigned DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_gym_id_foreign` (`gym_id`),
  KEY `users_trainer_id_foreign` (`trainer_id`),
  KEY `users_uuid_index` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `uuid`, `gym_id`, `trainer_id`, `first_name`, `last_name`, `email`, `gender`, `phone_no`, `username`, `password`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(9,	'81bf9682-7c69-4931-8d4b-0a2970c4d670',	9,	NULL,	'Divyesh',	'Singh',	'admin1@gmail.com',	'male',	'7436058929',	'dj23',	'div@gmail.com',	'user_images/1716464705_testing-removebg-preview (2).png',	NULL,	'2024-05-23 06:15:05',	'2024-05-23 06:15:05'),
(10,	'46cb62c4-aac4-4025-a2f6-52b18f68271d',	9,	NULL,	'Divyesh',	'Jadav',	'admin1@gmail.com',	'male',	'9978116971',	'dj@2002',	'123',	'user_images/1716882472_black_logo_gym.png',	NULL,	'2024-05-28 02:17:52',	'2024-05-28 02:17:52'),
(11,	'115a4f68-ef91-46c4-a643-20e20255f831',	3,	NULL,	'Nandani',	'Jadav',	'admin@gmail.com',	'female',	'9978116971',	'Divya123',	'2002',	'user_images/1716882607_wbsite.jpg',	'2024-05-29 01:52:46',	'2024-05-28 02:20:07',	'2024-05-29 01:52:46'),
(12,	'8e531357-df31-4689-9bf6-c9190f3500c6',	3,	NULL,	'Sonal',	'Wagh',	'salu@gmail.com',	'female',	'9978116971',	'sonu@123',	'2002',	'user_images/1716882651_software1.png',	'2024-05-29 01:52:41',	'2024-05-28 02:20:51',	'2024-05-29 01:52:41'),
(13,	'd06fb653-5696-489d-970d-05e6c6396f34',	3,	NULL,	'Divyesh',	'Singh',	'admin1@gmail.com',	'male',	'9978116971',	'test',	'div@gmail.com',	'user_images/1717565207_Capture.JPG',	NULL,	'2024-06-04 23:56:47',	'2024-06-04 23:56:47'),
(14,	'4e8e54ab-ca62-4cba-997e-14b5df78066e',	3,	NULL,	'Sonal',	'Singh',	'admin1@gmail.com',	'female',	'8866670919',	'shiv4913',	'1234567890',	'user_images/1717565233_Untitled.png',	NULL,	'2024-06-04 23:57:13',	'2024-06-04 23:57:13'),
(15,	'81bf9682-7c69-4931-8d4b-0a2970c4d670',	9,	NULL,	'Divyesh',	'Singh',	'admin1@gmail.com',	'male',	'7436058929',	'dj23',	'div@gmail.com',	'user_images/1716464705_testing-removebg-preview (2).png',	NULL,	'2024-05-23 06:15:05',	'2024-05-23 06:15:05'),
(16,	'46cb62c4-aac4-4025-a2f6-52b18f68271d',	9,	NULL,	'Divyesh',	'Jadav',	'admin1@gmail.com',	'male',	'9978116971',	'dj@2002',	'123',	'user_images/1716882472_black_logo_gym.png',	NULL,	'2024-05-28 02:17:52',	'2024-05-28 02:17:52'),
(18,	'81bf9682-7c69-4931-8d4b-0a2970c4d670',	9,	NULL,	'Divyesh',	'Singh',	'admin1@gmail.com',	'male',	'7436058929',	'dj23',	'div@gmail.com',	'user_images/1716464705_testing-removebg-preview (2).png',	NULL,	'2024-05-23 06:15:05',	'2024-05-23 06:15:05'),
(19,	'46cb62c4-aac4-4025-a2f6-52b18f68271d',	9,	NULL,	'Divyesh',	'Jadav',	'admin1@gmail.com',	'male',	'9978116971',	'dj@2002',	'123',	'user_images/1716882472_black_logo_gym.png',	NULL,	'2024-05-28 02:17:52',	'2024-05-28 02:17:52'),
(20,	'81bf9682-7c69-4931-8d4b-0a2970c4d670',	9,	NULL,	'Divyesh',	'Singh',	'admin1@gmail.com',	'male',	'7436058929',	'dj23',	'div@gmail.com',	'user_images/1716464705_testing-removebg-preview (2).png',	NULL,	'2024-05-23 06:15:05',	'2024-05-23 06:15:05'),
(21,	'46cb62c4-aac4-4025-a2f6-52b18f68271d',	9,	NULL,	'Divyesh',	'Jadav',	'admin1@gmail.com',	'male',	'9978116971',	'dj@2002',	'123',	'user_images/1716882472_black_logo_gym.png',	NULL,	'2024-05-28 02:17:52',	'2024-05-28 02:17:52');

-- 2024-06-22 07:15:03
