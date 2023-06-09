-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 12-Maio-2023 às 16:50
-- Versão do servidor: 8.0.33-0ubuntu0.22.04.1
-- versão do PHP: 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `domingue_gnsystem`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `id_category` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dataUpload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id_category`, `name`, `dataUpload`) VALUES
(1, 'Funko Pop', '2023-05-03'),
(2, 'Figure', '2023-05-03'),
(3, 'Q Posket', '2023-05-03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clients`
--

CREATE TABLE `clients` (
  `id_client` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `images`
--

CREATE TABLE `images` (
  `id_image` int NOT NULL,
  `id_category` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dataUpload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `methods_payment`
--

CREATE TABLE `methods_payment` (
  `id_method` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `methods_payment`
--

INSERT INTO `methods_payment` (`id_method`, `name`) VALUES
(1, 'Saldo'),
(2, 'Cartão de Crédito'),
(3, 'Cheque');

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` int UNSIGNED NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_category` int DEFAULT NULL,
  `ean` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `franchise` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manufacturer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `description`, `id_category`, `ean`, `franchise`, `manufacturer`) VALUES
(6, 'Funko John Wick 580', 2, '889698472388', '', ''),
(5, 'Funko Ronan 75', 1, '849803051761', NULL, NULL),
(7, 'Funko Itachi 578', 3, '889698404532', NULL, NULL),
(18, 'Funko azog 48', 2, '849803037413', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `purchases`
--

CREATE TABLE `purchases` (
  `id_purchase` int NOT NULL,
  `date_purchase` date NOT NULL,
  `id_vendor` int NOT NULL,
  `total_purchase` float NOT NULL,
  `id_method` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `purchases`
--

INSERT INTO `purchases` (`id_purchase`, `date_purchase`, `id_vendor`, `total_purchase`, `id_method`) VALUES
(1, '2023-05-01', 1, 159.8, 0),
(2, '2023-05-08', 2, 100, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `purchases_items`
--

CREATE TABLE `purchases_items` (
  `id_item_purchase` int NOT NULL,
  `id_purchase` int NOT NULL,
  `id_product` int NOT NULL,
  `quantity` int NOT NULL,
  `price` float NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `purchases_items`
--

INSERT INTO `purchases_items` (`id_item_purchase`, `id_purchase`, `id_product`, `quantity`, `price`, `status`) VALUES
(1, 1, 5, 1, 79.9, 'Finalizado'),
(2, 1, 6, 2, 79.9, 'Finalizado'),
(3, 2, 7, 5, 100, 'Em trânsito');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sales`
--

CREATE TABLE `sales` (
  `id_sale` int NOT NULL,
  `date_sale` date NOT NULL,
  `id_client` int NOT NULL,
  `amount` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sales_items`
--

CREATE TABLE `sales_items` (
  `id_item_sale` int NOT NULL,
  `id_sale` int NOT NULL,
  `id_product` int NOT NULL,
  `quantity` int NOT NULL,
  `price_sale` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `user`, `email`, `level`, `password`) VALUES
(1, 'laelramos', 'laelrf@gmail.com', 'administrador', 'eda5786e8c180c0b347d1c288ff8c1ff504ec363856b5b9a55424f1e16e07e78'),
(6, 'renatogomes', 'renatokakashi0109@gmail.com', 'administrador', 'd2413bec8eacaa99151cdffeb86858f793c2ba3c827c4fa10a2224dfad9b107d'),
(404, 'admin', 'admin@admin.com', 'dev', '8C6976E5B5410415BDE908BD4DEE15DFB167A9C873FC4BB8A81F6F2AB448A918');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendors`
--

CREATE TABLE `vendors` (
  `id_vendor` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `vendors`
--

INSERT INTO `vendors` (`id_vendor`, `name`) VALUES
(1, 'Shopee'),
(2, 'Aliexpress'),
(3, 'outro');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Índices para tabela `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`);

--
-- Índices para tabela `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_image`);

--
-- Índices para tabela `methods_payment`
--
ALTER TABLE `methods_payment`
  ADD PRIMARY KEY (`id_method`);

--
-- Índices para tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categorie` (`id_category`);

--
-- Índices para tabela `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id_purchase`);

--
-- Índices para tabela `purchases_items`
--
ALTER TABLE `purchases_items`
  ADD PRIMARY KEY (`id_item_purchase`);

--
-- Índices para tabela `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id_sale`);

--
-- Índices para tabela `sales_items`
--
ALTER TABLE `sales_items`
  ADD PRIMARY KEY (`id_item_sale`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id_vendor`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `images`
--
ALTER TABLE `images`
  MODIFY `id_image` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `methods_payment`
--
ALTER TABLE `methods_payment`
  MODIFY `id_method` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de tabela `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id_purchase` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `purchases_items`
--
ALTER TABLE `purchases_items`
  MODIFY `id_item_purchase` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `sales`
--
ALTER TABLE `sales`
  MODIFY `id_sale` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `sales_items`
--
ALTER TABLE `sales_items`
  MODIFY `id_item_sale` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=405;

--
-- AUTO_INCREMENT de tabela `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id_vendor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;