-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.13 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela doc88.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela doc88.customers: ~0 rows (aproximadamente)
DELETE FROM `customers`;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`id`, `name`, `surname`, `address`, `city`, `state`, `created_at`, `updated_at`) VALUES
	(1, 'Joao', 'Cason', 'Rua Tal', 'Limeira', 'SP', '2019-02-02 00:39:13', '2019-02-02 13:54:17');
INSERT INTO `customers` (`id`, `name`, `surname`, `address`, `city`, `state`, `created_at`, `updated_at`) VALUES
	(2, 'Marty', 'McFly', 'Av. Paulista', 'São Paulo', 'SP', '2019-02-02 00:39:15', NULL);
INSERT INTO `customers` (`id`, `name`, `surname`, `address`, `city`, `state`, `created_at`, `updated_at`) VALUES
	(3, 'Emmet', 'Brown', 'Av. Del', 'São Paulo', 'SP', '2019-02-02 00:39:18', NULL);
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Copiando estrutura para tabela doc88.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela doc88.migrations: ~7 rows (aproximadamente)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(3, '2019_02_01_104107_create_customers_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(4, '2019_02_01_104120_create_products_categories_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(5, '2019_02_01_104128_create_products_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(6, '2019_02_01_104209_create_sells_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(7, '2019_02_01_104247_create_products_sells_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Copiando estrutura para tabela doc88.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela doc88.password_resets: ~0 rows (aproximadamente)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Copiando estrutura para tabela doc88.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `products_categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela doc88.products: ~0 rows (aproximadamente)
DELETE FROM `products`;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `category_id`, `image`, `created_at`, `updated_at`) VALUES
	(1, 'DeLorean', 'Veículo adaptado com capacitador de fluxo, capaz de realizar viagens no tempo', 10210.00, 119, 1, 'delorean.jpg', NULL, '2019-02-04 02:41:03');
INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `category_id`, `image`, `created_at`, `updated_at`) VALUES
	(2, 'Patinete Voador', 'Patinete de polo negativo a terra possibilitando que o mesmo flutue', 1210.85, 1, 4, 'patinete.jpg', NULL, '2019-02-04 02:41:03');
INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `category_id`, `image`, `created_at`, `updated_at`) VALUES
	(3, 'Skate Voador', 'Semelhante ao patinete, porém sem o guidão de direção', 1000.00, 11, 3, 'skate.jpg', NULL, '2019-02-04 02:41:03');
INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `category_id`, `image`, `created_at`, `updated_at`) VALUES
	(7, 'DeLorean aret', 'test altered', 121000.32, 86, 1, '511a86d7f6235316c15fd114868ddf1d.jpeg', '2019-02-03 01:54:06', '2019-02-04 02:41:03');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Copiando estrutura para tabela doc88.products_categories
CREATE TABLE IF NOT EXISTS `products_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela doc88.products_categories: ~0 rows (aproximadamente)
DELETE FROM `products_categories`;
/*!40000 ALTER TABLE `products_categories` DISABLE KEYS */;
INSERT INTO `products_categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
	(1, 'Automóveis', NULL, NULL);
INSERT INTO `products_categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
	(2, 'Trens', NULL, NULL);
INSERT INTO `products_categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
	(3, 'Skates', NULL, NULL);
INSERT INTO `products_categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
	(4, 'Patinetes', NULL, NULL);
/*!40000 ALTER TABLE `products_categories` ENABLE KEYS */;

-- Copiando estrutura para tabela doc88.products_sells
CREATE TABLE IF NOT EXISTS `products_sells` (
  `sells_id` int(10) unsigned NOT NULL,
  `products_id` int(10) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  KEY `products_sells_sells_id_foreign` (`sells_id`),
  KEY `products_sells_products_id_foreign` (`products_id`),
  CONSTRAINT `products_sells_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `products_sells_sells_id_foreign` FOREIGN KEY (`sells_id`) REFERENCES `sells` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela doc88.products_sells: ~0 rows (aproximadamente)
DELETE FROM `products_sells`;
/*!40000 ALTER TABLE `products_sells` DISABLE KEYS */;
INSERT INTO `products_sells` (`sells_id`, `products_id`, `quantity`) VALUES
	(1, 2, 3);
INSERT INTO `products_sells` (`sells_id`, `products_id`, `quantity`) VALUES
	(1, 3, 2);
INSERT INTO `products_sells` (`sells_id`, `products_id`, `quantity`) VALUES
	(2, 1, 4);
INSERT INTO `products_sells` (`sells_id`, `products_id`, `quantity`) VALUES
	(8, 7, 1);
/*!40000 ALTER TABLE `products_sells` ENABLE KEYS */;

-- Copiando estrutura para tabela doc88.sells
CREATE TABLE IF NOT EXISTS `sells` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sells_customer_id_foreign` (`customer_id`),
  CONSTRAINT `sells_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela doc88.sells: ~0 rows (aproximadamente)
DELETE FROM `sells`;
/*!40000 ALTER TABLE `sells` DISABLE KEYS */;
INSERT INTO `sells` (`id`, `customer_id`, `amount`, `created_at`, `updated_at`) VALUES
	(1, 2, 2210.00, '2019-02-02 00:39:21', NULL);
INSERT INTO `sells` (`id`, `customer_id`, `amount`, `created_at`, `updated_at`) VALUES
	(2, 3, 10210.00, '2019-02-02 00:39:22', NULL);
INSERT INTO `sells` (`id`, `customer_id`, `amount`, `created_at`, `updated_at`) VALUES
	(8, 1, 125211.17, '2019-02-04 01:53:44', '2019-02-04 03:15:15');
/*!40000 ALTER TABLE `sells` ENABLE KEYS */;

-- Copiando estrutura para tabela doc88.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela doc88.users: ~0 rows (aproximadamente)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'João Cason', 'joao@cason.com.br', '$2y$10$EF4JoAiti6eZQxsVBxZ/ouprdxWkaCNnoPunI.KqLpEel6AtvV3qq', 'Gx9ajc1TcaaYFvU0TMLbrKO4OFCrh1HCEo9swMO7MK5M305Y1zwFiZiQOD1y', '2019-02-01 11:21:19', '2019-02-01 11:21:19');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
