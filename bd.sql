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

-- Copiando dados para a tabela estuding.customers: ~0 rows (aproximadamente)
DELETE FROM `customers`;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`id`, `name`, `surname`, `address`, `city`, `state`, `created_at`, `updated_at`) VALUES
	(1, 'Joao', 'Cason', 'Rua Tal', 'Limeira', 'SP', NULL, NULL);
INSERT INTO `customers` (`id`, `name`, `surname`, `address`, `city`, `state`, `created_at`, `updated_at`) VALUES
	(2, 'Marty', 'McFly', 'Av. Paulista', 'São Paulo', 'SP', NULL, NULL);
INSERT INTO `customers` (`id`, `name`, `surname`, `address`, `city`, `state`, `created_at`, `updated_at`) VALUES
	(3, 'Emmet', 'Brown', 'Av. Del', 'São Paulo', 'SP', NULL, NULL);
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Copiando dados para a tabela estuding.migrations: ~7 rows (aproximadamente)
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

-- Copiando dados para a tabela estuding.password_resets: ~0 rows (aproximadamente)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Copiando dados para a tabela estuding.products: ~0 rows (aproximadamente)
DELETE FROM `products`;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `category_id`, `image`, `created_at`, `updated_at`) VALUES
	(1, 'DeLorean', 'Veículo adaptado com capacitador de fluxo, capaz de realizar viagens no tempo', 10210.00, 121, 1, 'delorean.jpg', NULL, NULL);
INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `category_id`, `image`, `created_at`, `updated_at`) VALUES
	(2, 'Patinete Voador', 'Patinete de polo negativo a terra possibilitando que o mesmo flutue', 1210.00, 3, 4, 'patinete.jpg', NULL, NULL);
INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `category_id`, `image`, `created_at`, `updated_at`) VALUES
	(3, 'Skate Voador', 'Semelhante ao patinete, porém sem o guidão de direção', 1000.00, 10, 3, 'skate.jpg', NULL, NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Copiando dados para a tabela estuding.products_categories: ~0 rows (aproximadamente)
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

-- Copiando dados para a tabela estuding.products_sells: ~0 rows (aproximadamente)
DELETE FROM `products_sells`;
/*!40000 ALTER TABLE `products_sells` DISABLE KEYS */;
INSERT INTO `products_sells` (`sell_id`, `product_id`, `created_at`, `updated_at`) VALUES
	(1, 2, NULL, NULL);
INSERT INTO `products_sells` (`sell_id`, `product_id`, `created_at`, `updated_at`) VALUES
	(1, 3, NULL, NULL);
INSERT INTO `products_sells` (`sell_id`, `product_id`, `created_at`, `updated_at`) VALUES
	(2, 1, NULL, NULL);
/*!40000 ALTER TABLE `products_sells` ENABLE KEYS */;

-- Copiando dados para a tabela estuding.sells: ~0 rows (aproximadamente)
DELETE FROM `sells`;
/*!40000 ALTER TABLE `sells` DISABLE KEYS */;
INSERT INTO `sells` (`id`, `customer_id`, `amount`, `created_at`, `updated_at`) VALUES
	(1, 2, 2210.00, NULL, NULL);
INSERT INTO `sells` (`id`, `customer_id`, `amount`, `created_at`, `updated_at`) VALUES
	(2, 3, 10210.00, NULL, NULL);
/*!40000 ALTER TABLE `sells` ENABLE KEYS */;

-- Copiando dados para a tabela estuding.users: ~0 rows (aproximadamente)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'João Cason', 'joao@cason.com.br', '$2y$10$EF4JoAiti6eZQxsVBxZ/ouprdxWkaCNnoPunI.KqLpEel6AtvV3qq', 'w7kPS8LMhKz096EtbeEc5zDD4ncR63mH4AhCKxMIjh08wPB6jjQBxs7sWVJR', '2019-02-01 11:21:19', '2019-02-01 11:21:19');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
