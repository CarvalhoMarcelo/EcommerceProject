-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Nov-2019 às 21:42
-- Versão do servidor: 10.1.32-MariaDB
-- versão do PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `meetapples`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acessorios`
--

CREATE TABLE `acessorios` (
  `id` int(10) UNSIGNED NOT NULL,
  `fones` varchar(100) NOT NULL,
  `cabos` varchar(100) NOT NULL,
  `fontes` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cupom_descontos`
--

CREATE TABLE `cupom_descontos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localizador` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desconto` decimal(6,2) NOT NULL DEFAULT '0.00',
  `modo_desconto` enum('valor','porc') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'porc',
  `limite` decimal(6,2) NOT NULL DEFAULT '0.00',
  `modo_limite` enum('valor','qtd') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'qtd',
  `dthr_validade` datetime NOT NULL,
  `ativo` enum('S','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'S',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `cupom_descontos`
--

INSERT INTO `cupom_descontos` (`id`, `nome`, `localizador`, `desconto`, `modo_desconto`, `limite`, `modo_limite`, `dthr_validade`, `ativo`, `created_at`, `updated_at`) VALUES
(1, 'Cupom de Teste', 'codecom', '10.00', 'valor', '1.00', 'valor', '2018-12-31 23:59:59', 'S', '2018-08-30 17:43:15', '2018-08-30 18:09:07'),
(2, 'teste2', 'codecom2', '15.00', 'porc', '3.00', 'qtd', '2018-12-31 23:59:59', 'S', '2018-09-06 21:45:14', '2018-09-06 21:45:14'),
(3, 'MEET', 'CLAUDIO', '20.00', 'valor', '100.00', 'valor', '2018-12-31 23:59:59', 'S', '2018-09-21 03:11:06', '2018-09-21 03:11:06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_produto` int(10) UNSIGNED NOT NULL,
  `quantidade` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_08_20_113820_add_column_to_usuario_in_meetapples', 1),
(4, '2018_08_21_194215_create_produtos_table', 2),
(5, '2018_08_21_194339_create_cupom_descontos_table', 2),
(6, '2018_08_21_194408_create_pedidos_table', 3),
(7, '2018_08_21_194431_create_pedido_produtos_table', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` enum('RE','PA','CA') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 'PA', '2018-08-27 22:09:31', '2018-08-30 17:16:59'),
(5, 18, 'CA', '2018-08-28 19:18:03', '2018-08-28 20:55:55'),
(6, 18, 'PA', '2018-08-28 20:58:22', '2018-08-28 20:58:26'),
(7, 18, 'CA', '2018-08-28 20:58:48', '2018-08-28 21:01:48'),
(8, 18, 'PA', '2018-08-28 21:02:08', '2018-08-28 21:02:38'),
(9, 18, 'CA', '2018-08-28 21:04:17', '2018-08-28 21:40:16'),
(10, 18, 'PA', '2018-08-28 21:38:27', '2018-08-28 21:38:46'),
(11, 18, 'PA', '2018-08-28 21:46:05', '2018-08-28 23:14:09'),
(12, 18, 'PA', '2018-08-28 23:32:13', '2018-09-04 00:59:31'),
(13, 1, 'PA', '2018-08-30 17:18:45', '2018-09-11 15:06:03'),
(15, 18, 'PA', '2018-09-11 01:57:41', '2018-09-11 01:58:12'),
(16, 18, 'CA', '2018-09-11 02:14:21', '2018-09-11 03:23:01'),
(17, 18, 'PA', '2018-09-11 03:23:32', '2018-09-11 03:23:36'),
(18, 18, 'PA', '2018-09-11 03:39:15', '2018-09-11 03:39:25'),
(19, 18, 'PA', '2018-09-11 03:55:38', '2018-09-11 03:55:47'),
(20, 1, 'CA', '2018-09-11 15:09:27', '2018-09-11 20:18:16'),
(21, 1, 'CA', '2018-09-11 15:12:24', '2018-09-11 20:18:08'),
(22, 1, 'PA', '2018-09-11 21:41:08', '2018-09-11 22:05:14'),
(23, 1, 'PA', '2018-09-11 22:19:19', '2018-09-11 22:33:01'),
(24, 1, 'PA', '2018-09-11 22:33:16', '2018-09-11 22:33:32'),
(27, 1, 'PA', '2018-09-14 03:01:25', '2019-11-20 23:39:56'),
(28, 24, 'CA', '2018-09-18 21:18:42', '2018-09-18 21:21:24'),
(29, 26, 'PA', '2018-09-19 03:00:13', '2018-09-19 03:03:44'),
(30, 27, 'CA', '2018-09-21 02:57:38', '2018-09-21 03:01:59'),
(31, 27, 'RE', '2018-09-21 03:08:48', '2018-09-21 03:08:48');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_produtos`
--

CREATE TABLE `pedido_produtos` (
  `id` int(10) UNSIGNED NOT NULL,
  `pedido_id` int(10) UNSIGNED NOT NULL,
  `produto_id` int(10) UNSIGNED NOT NULL,
  `status` enum('RE','PA','CA') COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` decimal(6,2) NOT NULL DEFAULT '0.00',
  `desconto` decimal(6,2) NOT NULL DEFAULT '0.00',
  `cupom_desconto_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pedido_produtos`
--

INSERT INTO `pedido_produtos` (`id`, `pedido_id`, `produto_id`, `status`, `valor`, `desconto`, `cupom_desconto_id`, `created_at`, `updated_at`) VALUES
(11, 3, 1, 'PA', '6000.00', '0.00', NULL, '2018-08-27 22:09:31', '2018-08-30 17:16:59'),
(12, 3, 3, 'CA', '2000.00', '0.00', NULL, '2018-08-27 22:09:47', '2018-08-30 17:17:10'),
(15, 3, 3, 'PA', '2000.00', '0.00', NULL, '2018-08-28 16:41:14', '2018-08-30 17:16:59'),
(16, 3, 2, 'CA', '9999.99', '0.00', NULL, '2018-08-28 17:35:05', '2018-09-04 00:57:58'),
(19, 5, 3, 'CA', '2000.00', '0.00', NULL, '2018-08-28 19:18:03', '2018-08-28 20:55:55'),
(20, 6, 2, 'PA', '9999.99', '0.00', NULL, '2018-08-28 20:58:22', '2018-08-28 20:58:26'),
(21, 7, 2, 'CA', '9999.99', '0.00', NULL, '2018-08-28 20:58:48', '2018-08-28 21:01:48'),
(22, 7, 3, 'CA', '2000.00', '0.00', NULL, '2018-08-28 20:59:02', '2018-08-28 21:01:48'),
(23, 8, 1, 'PA', '6000.00', '0.00', NULL, '2018-08-28 21:02:08', '2018-08-28 21:02:38'),
(24, 8, 2, 'CA', '9999.99', '0.00', NULL, '2018-08-28 21:02:14', '2018-08-28 21:02:48'),
(25, 8, 3, 'PA', '2000.00', '0.00', NULL, '2018-08-28 21:02:21', '2018-08-28 21:02:38'),
(26, 9, 1, 'CA', '6000.00', '0.00', NULL, '2018-08-28 21:04:17', '2018-08-28 21:04:42'),
(27, 9, 1, 'CA', '6000.00', '0.00', NULL, '2018-08-28 21:04:20', '2018-08-28 21:40:16'),
(28, 9, 1, 'CA', '6000.00', '0.00', NULL, '2018-08-28 21:04:22', '2018-08-28 21:40:16'),
(29, 10, 3, 'PA', '2000.00', '0.00', NULL, '2018-08-28 21:38:27', '2018-08-28 21:38:46'),
(30, 10, 3, 'CA', '2000.00', '0.00', NULL, '2018-08-28 21:38:31', '2018-08-28 21:39:00'),
(31, 10, 3, 'PA', '2000.00', '0.00', NULL, '2018-08-28 21:38:33', '2018-08-28 21:38:46'),
(32, 10, 3, 'CA', '2000.00', '0.00', NULL, '2018-08-28 21:38:37', '2018-08-28 21:39:00'),
(33, 11, 3, 'PA', '2000.00', '0.00', NULL, '2018-08-28 21:46:05', '2018-08-28 23:14:09'),
(34, 11, 3, 'PA', '2000.00', '0.00', NULL, '2018-08-28 22:44:54', '2018-08-28 23:14:09'),
(36, 11, 1, 'PA', '6000.00', '0.00', NULL, '2018-08-28 22:45:07', '2018-08-28 23:14:09'),
(37, 12, 3, 'PA', '2000.00', '0.00', NULL, '2018-08-28 23:32:13', '2018-09-04 00:59:31'),
(39, 12, 3, 'PA', '2000.00', '0.00', NULL, '2018-08-29 02:44:34', '2018-09-04 00:59:31'),
(40, 3, 1, 'PA', '6000.00', '0.00', NULL, '2018-08-30 17:16:41', '2018-08-30 17:16:59'),
(41, 13, 1, 'PA', '6000.00', '10.00', 1, '2018-08-30 17:18:45', '2018-09-11 15:06:03'),
(42, 13, 1, 'PA', '6000.00', '10.00', 1, '2018-08-30 17:59:50', '2018-09-11 15:06:03'),
(43, 13, 1, 'PA', '6000.00', '10.00', 1, '2018-08-30 18:05:39', '2018-09-11 15:06:03'),
(44, 13, 1, 'PA', '6000.00', '10.00', 1, '2018-08-30 18:09:11', '2018-09-11 15:06:03'),
(45, 13, 3, 'PA', '2000.00', '10.00', 1, '2018-08-30 18:24:42', '2018-09-11 15:06:03'),
(46, 13, 4, 'PA', '3299.00', '10.00', 1, '2018-08-30 20:58:06', '2018-09-11 15:06:03'),
(47, 13, 5, 'PA', '3578.00', '10.00', 1, '2018-08-30 21:02:39', '2018-09-11 15:06:03'),
(48, 13, 1, 'PA', '6000.00', '10.00', 1, '2018-09-02 18:46:03', '2018-09-11 15:06:03'),
(50, 13, 5, 'PA', '3578.00', '10.00', 1, '2018-09-04 00:56:36', '2018-09-11 15:06:03'),
(53, 13, 6, 'PA', '1230.10', '0.00', NULL, '2018-09-10 02:07:22', '2018-09-11 15:06:03'),
(55, 15, 5, 'PA', '3578.00', '0.00', NULL, '2018-09-11 01:57:41', '2018-09-11 01:58:12'),
(57, 16, 5, 'CA', '3578.00', '0.00', NULL, '2018-09-11 03:21:59', '2018-09-11 03:23:01'),
(58, 17, 5, 'PA', '3578.00', '0.00', NULL, '2018-09-11 03:23:32', '2018-09-11 03:23:36'),
(59, 18, 5, 'PA', '3578.00', '0.00', NULL, '2018-09-11 03:39:15', '2018-09-11 03:39:25'),
(60, 19, 5, 'PA', '3578.00', '0.00', NULL, '2018-09-11 03:55:38', '2018-09-11 03:55:47'),
(61, 20, 5, 'CA', '3578.00', '0.00', NULL, '2018-09-11 15:09:27', '2018-09-11 20:18:16'),
(62, 21, 3, 'CA', '2000.00', '0.00', NULL, '2018-09-11 15:12:24', '2018-09-11 20:18:08'),
(63, 22, 3, 'PA', '2000.00', '10.00', 1, '2018-09-11 21:41:08', '2018-09-11 22:05:14'),
(64, 22, 2, 'PA', '9999.99', '10.00', 1, '2018-09-11 21:43:27', '2018-09-11 22:05:14'),
(65, 22, 5, 'PA', '3578.00', '10.00', 1, '2018-09-11 21:45:56', '2018-09-11 22:05:14'),
(66, 22, 1, 'PA', '6000.00', '10.00', 1, '2018-09-11 21:49:50', '2018-09-11 22:05:14'),
(67, 22, 3, 'PA', '2000.00', '10.00', 1, '2018-09-11 22:04:53', '2018-09-11 22:05:14'),
(68, 23, 4, 'PA', '3299.00', '10.00', 1, '2018-09-11 22:19:19', '2018-09-11 22:33:01'),
(69, 23, 4, 'PA', '3299.00', '10.00', 1, '2018-09-11 22:21:38', '2018-09-11 22:33:01'),
(70, 23, 4, 'PA', '3299.00', '10.00', 1, '2018-09-11 22:23:59', '2018-09-11 22:33:01'),
(71, 23, 3, 'PA', '2000.00', '10.00', 1, '2018-09-11 22:24:16', '2018-09-11 22:33:01'),
(72, 24, 2, 'PA', '9999.99', '0.00', NULL, '2018-09-11 22:33:16', '2018-09-11 22:33:32'),
(75, 27, 4, 'PA', '3299.00', '10.00', 1, '2018-09-14 03:01:25', '2019-11-20 23:39:56'),
(76, 28, 3, 'CA', '2000.00', '10.00', 1, '2018-09-18 21:18:42', '2018-09-18 21:20:53'),
(79, 28, 2, 'CA', '9999.99', '0.00', NULL, '2018-09-18 21:19:33', '2018-09-18 21:21:24'),
(80, 28, 3, 'CA', '2000.00', '0.00', NULL, '2018-09-18 21:19:39', '2018-09-18 21:21:24'),
(81, 29, 3, 'CA', '2000.00', '10.00', 1, '2018-09-19 03:00:13', '2018-09-19 03:04:10'),
(82, 29, 3, 'PA', '2000.00', '10.00', 1, '2018-09-19 03:00:50', '2018-09-19 03:03:44'),
(83, 29, 1, 'PA', '6000.00', '0.00', NULL, '2018-09-19 03:01:34', '2018-09-19 03:03:44'),
(84, 30, 1, 'CA', '6000.00', '10.00', 1, '2018-09-21 02:57:38', '2018-09-21 03:01:44'),
(86, 30, 1, 'CA', '6000.00', '10.00', 1, '2018-09-21 02:58:21', '2018-09-21 03:01:59'),
(87, 30, 2, 'CA', '9999.99', '0.00', NULL, '2018-09-21 02:59:06', '2018-09-21 03:01:59'),
(88, 31, 6, 'RE', '1230.10', '184.52', 2, '2018-09-21 03:08:48', '2018-09-21 03:11:47'),
(89, 31, 5, 'RE', '3578.00', '536.70', 2, '2018-09-21 03:11:27', '2018-09-21 03:11:47'),
(90, 27, 4, 'PA', '3299.00', '0.00', NULL, '2019-11-20 23:37:38', '2019-11-20 23:39:56'),
(91, 27, 4, 'PA', '3299.00', '0.00', NULL, '2019-11-20 23:37:47', '2019-11-20 23:39:56');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` int(10) UNSIGNED NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `hd` int(6) UNSIGNED NOT NULL,
  `memoria` int(6) UNSIGNED NOT NULL,
  `processador` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `ios` varchar(60) NOT NULL,
  `sn` varchar(100) NOT NULL,
  `id_acessorio` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` decimal(6,2) NOT NULL DEFAULT '0.00',
  `imagem` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ativo` enum('S','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'S',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tipo_produto` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `valor`, `imagem`, `ativo`, `created_at`, `updated_at`, `tipo_produto`) VALUES
(1, 'Iphone X', '<p>Apple Iphone X 256gb Original + Nota Fiscal</p>', '6000.00', '/images/banner_product.png', 'S', '2018-08-23 03:00:00', '2018-08-30 18:49:20', 'i'),
(2, 'Macbook', 'MacBook Pro Touch Bar e Touch ID 13,3\", Intel Core i5 quad core 2,3 GHz, 512GB SSD, 8GB, Cinza Espacial - MR9R2LL/A', '9999.99', '/images/banner_2_product.png', 'S', '2018-08-23 03:00:00', NULL, 'm'),
(3, 'Apple Watch', 'Apple Watch Series 3 42mm Gps Prova D´água', '2000.00', '/images/banner_3_product.png', 'S', '2018-08-23 03:00:00', NULL, 'w'),
(4, 'iPhone 7 Plus', '<p>iPhone 7 Plus 32GB Ouro Rosa Tela Retina HD 5,5\" 3D Touch C&acirc;mera Dupla de 12MP</p>', '3299.00', '/images/iPhone7Plus.jpg', 'S', '2018-08-30 20:57:34', '2018-08-30 20:57:34', 'i'),
(5, 'iPhone 8', '<h1 class=\"item-title__primary \" style=\"box-sizing: border-box; margin: 0px; padding: 0px 40px 0px 0px; border: 0px; outline: 0px; vertical-align: baseline; font-size: 26px; line-height: 1.05; overflow: hidden; text-overflow: ellipsis; max-width: inherit; color: #333333; font-family: \'Proxima Nova\', -apple-system, \'Helvetica Neue\', Helvetica, Roboto, Arial, sans-serif;\">Apple Iphone 8 64gb Vermelho Edi&ccedil;&atilde;o Especial - Lacrado + Nf</h1>', '3578.00', '/images/iPhone8.png', 'S', '2018-08-30 21:01:45', '2018-08-30 21:11:22', 'i'),
(6, 'iPhone 6', '<p>iPhone 6 usado. Otimos estado. 16 GB de memoria.</p>', '1230.10', '/images/iPhone7Plus.jpg', 'S', '2018-09-04 01:06:28', '2018-09-04 01:06:28', NULL),
(7, 'iPhone de Teste', '<p>Nenhuma descri&ccedil;&atilde;o que possa&nbsp;ser feita. Produto de teste.</p>', '2300.00', NULL, 'S', '2018-09-04 20:40:42', '2018-09-04 20:40:42', NULL),
(8, 'qq coisa', '<p>qq coisa</p>', '1.00', NULL, 'S', '2018-09-11 03:20:42', '2018-09-11 03:20:42', NULL),
(9, 'Iphone X', '<p>Produto novo</p>', '1000.00', NULL, 'S', '2018-09-11 03:38:08', '2018-09-11 03:38:08', NULL),
(10, 'Computador', '<p>Computador MacBook Pro Usado</p>', '10.00', NULL, 'N', '2018-09-11 03:54:58', '2018-09-11 03:55:10', NULL),
(11, 'ddddddd', '<p>dfasdfasdfasdfasdf</p>', '1000.00', '/images/iPhone7Plus.jpg', 'S', '2018-09-19 03:07:23', '2018-09-19 03:07:23', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ranking`
--

CREATE TABLE `ranking` (
  `id` int(10) UNSIGNED NOT NULL,
  `avaliacao` varchar(100) DEFAULT NULL,
  `rating` decimal(3,1) UNSIGNED NOT NULL,
  `comprou` int(10) UNSIGNED NOT NULL,
  `vendeu` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(500) NOT NULL,
  `sobrenome` varchar(500) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `email` varchar(500) NOT NULL,
  `cpf` bigint(11) UNSIGNED DEFAULT NULL,
  `nasc` date DEFAULT NULL,
  `tipo` enum('Comprador','Vendedor','Comprador e Vendedor') DEFAULT NULL,
  `id_ranking` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `sobrenome`, `senha`, `email`, `cpf`, `nasc`, `tipo`, `id_ranking`, `remember_token`, `created_at`, `updated_at`, `endereco`) VALUES
(1, 'Marcelo', 'Carvalho', '$2y$10$EXdXBQyb1tqVITmjwLN1dubLesPwMdRtekVRlJ/CvicD3fFv9sBli', 'silva.marcelocarvalho@gmail.com', NULL, '0000-00-00', NULL, NULL, 'c0xv92WHp7G99DbFoAcrTudNdhxPFTxei9sCtsHWX4iukWvpy6nOGjvYg6Yr', NULL, NULL, NULL),
(9, 'Jose', 'Maria', '$2y$10$EXdXBQyb1tqVITmjwLN1dubLesPwMdRtekVRlJ/CvicD3fFv9sBli', '', NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Juca', 'Kfuri', '$2y$10$EXdXBQyb1tqVITmjwLN1dubLesPwMdRtekVRlJ/CvicD3fFv9sBli', '', NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Juca', 'Kfuri', '$2y$10$EXdXBQyb1tqVITmjwLN1dubLesPwMdRtekVRlJ/CvicD3fFv9sBli', '', NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Joaquim', 'Miguel', '$2y$10$EXdXBQyb1tqVITmjwLN1dubLesPwMdRtekVRlJ/CvicD3fFv9sBli', 'joaquim.miguel@akzo.com', NULL, '0000-00-00', NULL, NULL, 'E5kkfB43pSKywkBsB4olk1ZrDZninXHK6uJcP2wGRitKYylgS7KjCwy3xnGn', NULL, NULL, NULL),
(13, 'fer', 'fer', '$2y$10$EXdXBQyb1tqVITmjwLN1dubLesPwMdRtekVRlJ/CvicD3fFv9sBli', 'fer.fer@fer.com', NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Joaquim', 'Xavier', '$2y$10$EXdXBQyb1tqVITmjwLN1dubLesPwMdRtekVRlJ/CvicD3fFv9sBli', 'joaquim.xavier@joaquim.com', NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'joao', 'zeca', '$2y$10$lob4WyHqdTX.TR2Qd64XXem6JPoOciFbFXDY1j8UZXFMRlxwaGXsi', 'zeca.zeca@zeca.com', NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'tiago', 'tiago', '$2y$10$EXdXBQyb1tqVITmjwLN1dubLesPwMdRtekVRlJ/CvicD3fFv9sBli', 'tiago@tiago.com', NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'joao', 'joao', '$2y$10$lnEHtiVlJ0OeXY0LNbATUuQakwcFMxCug6aGiYQr8w.Ib3gniaXca', 'joao@joao.com', NULL, NULL, NULL, NULL, 'rnpLdx6nsfxXlYGdL7ThjNvihXfOCgrGXWuzCysgQgPypf8KCF2C1S6qnVTV', '2018-08-20 16:08:09', '2018-08-20 16:08:09', NULL),
(18, 'jose', 'jose', '$2y$10$qBF7KMo2Q2csAmWKemzbdeFv6M3HUm9g2nT91xFk.doOBg2ZsYgAm', 'jose@jose.com', NULL, NULL, NULL, NULL, '0p48odswpSCgX63RgvasI6KhtmFW89uXDsrYJ6xolD15N34AcE6LcimE3KPI', '2018-08-20 16:25:18', '2018-08-20 16:25:18', NULL),
(19, 'pedro', 'Pedro', '123', 'pedro.pedro@pedro.com', 11111111111, '2018-09-19', NULL, NULL, NULL, '2018-09-17 16:12:22', '2018-09-17 16:12:22', 'sdfdsfgdsafdsafsad'),
(20, 'pedro', 'Pedro', '$2y$10$qIg40P5o1SUlRKLKGZgNB.fHWFNJCwvhq51OXm4zyrlxf.8n2sD7S', 'pedro.pedro@pedro.com', 65656565656, '2018-09-06', NULL, NULL, NULL, '2018-09-17 16:50:27', '2018-09-17 16:50:27', 'RUA MAGARINOS TORRES'),
(21, 'pedro', 'Pedro', '$2y$10$OTHcXAxqfBMdznHa8HzPkeaE2/pea8ILF32daDYhkl5ZqGBclN8yG', 'jose.jose@jose.com', 65656565656, '2018-09-13', NULL, NULL, NULL, '2018-09-17 16:56:31', '2018-09-17 16:56:31', 'asdfsadfsadfsadf'),
(22, 'Fabricio de Oliveira', 'marcelo', '$2y$10$74TwdwSt8ZDpcgr0HV18u.XzFFY/.bRN.7e4mrVAWjdlXX0XpdyB6', 'teste.teste@teste.com', 22222222222, '2018-09-12', NULL, NULL, NULL, '2018-09-17 16:59:25', '2018-09-17 16:59:25', 'RUA MAGARINOS TORRES'),
(23, 'Fabricio de Oliveira', 'kkkkk', '$2y$10$ckrlzPcoZk3EODPhB2FKheLvowGX.UCPDE2CuquMlc4YjYkhD9VYO', 'joca.joca@joca.com', 22222222222, '2018-09-13', NULL, NULL, 'LEREdj2IBdmVCMGbRMIOBKeqHFhLCZ4iQt6JwbcNvE4wDtfl4N8U9fWRBmvq', '2018-09-17 17:04:37', '2018-09-17 17:04:37', 'adsfsafsafsadf'),
(24, 'Thiago', 'Thomaz', '$2y$10$Sv.xWKbJQ19Q0ZKzsEpMcu/CTdQDiBlnnlYEIAFaQk2FjwUrQhiXu', 'thiago.thomaz@digitalhouse.com', 11111111111, '1910-10-10', NULL, NULL, 'dKSmmfXn9KdEmAVmmzAA5RMokVf4iJaMWgeCnqXq0teHF0B7GlBhOBWnwJBo', '2018-09-18 21:16:53', '2018-09-18 21:16:53', 'Digital House'),
(25, 'Lika', 'Lika', '$2y$10$CEYnBozRE7CpHdmRIZE3VezVJRTZhKq6RVKylHpSDH4wcBgjGFYPy', 'lika.lika@lika.com', 55555555555, '1910-10-10', NULL, NULL, 'YVQIiAATJDI45hsKckFsgFZ9m1fR2LijhjPlJoxXIKomWwl34s7yBoq411Oj', '2018-09-19 00:57:13', '2018-09-19 00:57:13', 'Avenida Nove de Julho - Bela Vista - São Paulo - SP'),
(26, 'Thomaz', 'Thiago', '$2y$10$chZ1nEgGtrXOTCVhm94OYuZKEaVHiAQW7wGo7YP1S7Rn3UewEB4VS', 'thomaz@digital.com', 11111111111, '1910-10-10', NULL, NULL, '7lYaTFefHvPNacs2HA39y5EwC24xoTzpeo7v6CqxVHbbxNCytN5SJ2qJOufY', '2018-09-19 02:58:53', '2018-09-19 02:58:53', 'Avenida Nove de Julho - Bela Vista - São Paulo - SP'),
(27, 'Claudio', 'Souza', '$2y$10$UbME4A9wN1dqSJYHgIwKOu5mvMvTVIiVWA397tfIVhn5T1fIiot3W', 'claudio.souza@codecom.com', 11111111111, '1927-12-04', NULL, NULL, 'm0RnUW40yvsrocfEVpHfpG5EfgEZI6XtREsOJEOc9wHpPb4YyrRahWvbCX1H', '2018-09-21 02:56:00', '2018-09-21 02:56:00', 'Rua Jiparaná - Parada XV de Novembro - São Paulo - SP');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `acessorios`
--
ALTER TABLE `acessorios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cupom_descontos`
--
ALTER TABLE `cupom_descontos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cupom_descontos_localizador_unique` (`localizador`);

--
-- Índices para tabela `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pedido_produtos`
--
ALTER TABLE `pedido_produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_produtos_pedido_id_foreign` (`pedido_id`),
  ADD KEY `pedido_produtos_produto_id_foreign` (`produto_id`),
  ADD KEY `pedido_produtos_cupom_desconto_id_foreign` (`cupom_desconto_id`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_acessorio` (`id_acessorio`),
  ADD KEY `id_user` (`id_user`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ranking` (`id_ranking`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acessorios`
--
ALTER TABLE `acessorios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cupom_descontos`
--
ALTER TABLE `cupom_descontos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `pedido_produtos`
--
ALTER TABLE `pedido_produtos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `ranking`
--
ALTER TABLE `ranking`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `estoque`
--
ALTER TABLE `estoque`
  ADD CONSTRAINT `estoque_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`);

--
-- Limitadores para a tabela `pedido_produtos`
--
ALTER TABLE `pedido_produtos`
  ADD CONSTRAINT `pedido_produtos_cupom_desconto_id_foreign` FOREIGN KEY (`cupom_desconto_id`) REFERENCES `cupom_descontos` (`id`),
  ADD CONSTRAINT `pedido_produtos_pedido_id_foreign` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `pedido_produtos_produto_id_foreign` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id_acessorio`) REFERENCES `acessorios` (`id`),
  ADD CONSTRAINT `produto_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_ranking`) REFERENCES `ranking` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
