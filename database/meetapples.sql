-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 20, 2019 at 07:01 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meetapples`
--

-- --------------------------------------------------------

--
-- Table structure for table `acessorios`
--

CREATE TABLE `acessorios` (
  `id` int(10) UNSIGNED NOT NULL,
  `fones` varchar(100) NOT NULL,
  `cabos` varchar(100) NOT NULL,
  `fontes` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cupom_descontos`
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

-- --------------------------------------------------------

--
-- Table structure for table `estoque`
--

CREATE TABLE `estoque` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_produto` int(10) UNSIGNED NOT NULL,
  `quantidade` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `faturamento`
--

CREATE TABLE `faturamento` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_transacao` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pedido`
--

CREATE TABLE `pedido` (
  `id` int(10) UNSIGNED NOT NULL,
  `data` date NOT NULL,
  `valor` int(10) UNSIGNED NOT NULL,
  `id_produto` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` enum('RE','PA','CA') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pedidos`
--

INSERT INTO `pedidos` (`id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 'RE', '2018-08-27 22:09:31', '2018-08-27 22:09:31'),
(5, 18, 'CA', '2018-08-28 19:18:03', '2018-08-28 20:55:55'),
(6, 18, 'PA', '2018-08-28 20:58:22', '2018-08-28 20:58:26'),
(7, 18, 'CA', '2018-08-28 20:58:48', '2018-08-28 21:01:48'),
(8, 18, 'PA', '2018-08-28 21:02:08', '2018-08-28 21:02:38'),
(9, 18, 'CA', '2018-08-28 21:04:17', '2018-08-28 21:40:16'),
(10, 18, 'PA', '2018-08-28 21:38:27', '2018-08-28 21:38:46'),
(11, 18, 'PA', '2018-08-28 21:46:05', '2018-08-28 23:14:09'),
(12, 18, 'RE', '2018-08-28 23:32:13', '2018-08-28 23:32:13');

-- --------------------------------------------------------

--
-- Table structure for table `pedido_produtos`
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
-- Dumping data for table `pedido_produtos`
--

INSERT INTO `pedido_produtos` (`id`, `pedido_id`, `produto_id`, `status`, `valor`, `desconto`, `cupom_desconto_id`, `created_at`, `updated_at`) VALUES
(11, 3, 1, 'RE', '6000.00', '0.00', NULL, '2018-08-27 22:09:31', '2018-08-27 22:09:31'),
(12, 3, 3, 'RE', '2000.00', '0.00', NULL, '2018-08-27 22:09:47', '2018-08-27 22:09:47'),
(15, 3, 3, 'RE', '2000.00', '0.00', NULL, '2018-08-28 16:41:14', '2018-08-28 16:41:14'),
(16, 3, 2, 'RE', '9999.99', '0.00', NULL, '2018-08-28 17:35:05', '2018-08-28 17:35:05'),
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
(37, 12, 3, 'RE', '2000.00', '0.00', NULL, '2018-08-28 23:32:13', '2018-08-28 23:32:13'),
(39, 12, 3, 'RE', '2000.00', '0.00', NULL, '2018-08-29 02:44:34', '2018-08-29 02:44:34');

-- --------------------------------------------------------

--
-- Table structure for table `produto`
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
-- Table structure for table `produtos`
--

CREATE TABLE `produtos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` decimal(6,2) NOT NULL DEFAULT '0.00',
  `imagem` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ativo` enum('S','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'S',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `valor`, `imagem`, `ativo`, `created_at`, `updated_at`) VALUES
(1, 'Iphone X', 'Apple Iphone X 256gb Original + Nota Fiscal', '6000.00', '/images/banner_product.png', 'S', '2018-08-23 03:00:00', NULL),
(2, 'Macbook', 'MacBook Pro Touch Bar e Touch ID 13,3\", Intel Core i5 quad core 2,3 GHz, 512GB SSD, 8GB, Cinza Espacial - MR9R2LL/A', '9999.99', '/images/banner_2_product.png', 'S', '2018-08-23 03:00:00', NULL),
(3, 'Apple Watch', 'Apple Watch Series 3 42mm Gps Prova D´água', '2000.00', '/images/banner_3_product.png', 'S', '2018-08-23 03:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ranking`
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
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(500) NOT NULL,
  `sobrenome` varchar(500) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `email` varchar(500) NOT NULL,
  `endereco` int(10) UNSIGNED DEFAULT NULL,
  `cpf` int(10) UNSIGNED DEFAULT NULL,
  `nasc` date NOT NULL,
  `tipo` enum('Comprador','Vendedor','Comprador e Vendedor') DEFAULT NULL,
  `id_ranking` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `sobrenome`, `senha`, `email`, `endereco`, `cpf`, `nasc`, `tipo`, `id_ranking`) VALUES
(1, 'Marcelo', 'Carvalho', '123', 'silva.marcelocarvalho@gmail.com', 0, 0, '0000-00-00', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acessorios`
--
ALTER TABLE `acessorios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cupom_descontos`
--
ALTER TABLE `cupom_descontos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cupom_descontos_localizador_unique` (`localizador`);

--
-- Indexes for table `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Indexes for table `faturamento`
--
ALTER TABLE `faturamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_transacao` (`id_transacao`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produto` (`id_produto`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pedido_produtos`
--
ALTER TABLE `pedido_produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_produtos_pedido_id_foreign` (`pedido_id`),
  ADD KEY `pedido_produtos_produto_id_foreign` (`produto_id`),
  ADD KEY `pedido_produtos_cupom_desconto_id_foreign` (`cupom_desconto_id`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_acessorio` (`id_acessorio`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ranking` (`id_ranking`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acessorios`
--
ALTER TABLE `acessorios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cupom_descontos`
--
ALTER TABLE `cupom_descontos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faturamento`
--
ALTER TABLE `faturamento`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pedido_produtos`
--
ALTER TABLE `pedido_produtos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ranking`
--
ALTER TABLE `ranking`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `estoque`
--
ALTER TABLE `estoque`
  ADD CONSTRAINT `estoque_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`);

--
-- Constraints for table `faturamento`
--
ALTER TABLE `faturamento`
  ADD CONSTRAINT `faturamento_ibfk_1` FOREIGN KEY (`id_transacao`) REFERENCES `pedido` (`id`);

--
-- Constraints for table `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id`);

--
-- Constraints for table `pedido_produtos`
--
ALTER TABLE `pedido_produtos`
  ADD CONSTRAINT `pedido_produtos_cupom_desconto_id_foreign` FOREIGN KEY (`cupom_desconto_id`) REFERENCES `cupom_descontos` (`id`),
  ADD CONSTRAINT `pedido_produtos_pedido_id_foreign` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `pedido_produtos_produto_id_foreign` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);

--
-- Constraints for table `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id_acessorio`) REFERENCES `acessorios` (`id`),
  ADD CONSTRAINT `produto_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_ranking`) REFERENCES `ranking` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
