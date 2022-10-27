-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 28-Set-2022 às 00:55
-- Versão do servidor: 8.0.27
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_categorias`
--

DROP TABLE IF EXISTS `tab_categorias`;
CREATE TABLE IF NOT EXISTS `tab_categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(60) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_clientes`
--

DROP TABLE IF EXISTS `tab_clientes`;
CREATE TABLE IF NOT EXISTS `tab_clientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cpf` varchar(14) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `senha` varchar(32) COLLATE utf8mb4_bin NOT NULL,
  `estado` varchar(2) COLLATE utf8mb4_bin NOT NULL,
  `cidade` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `bairro` varchar(60) COLLATE utf8mb4_bin NOT NULL,
  `endereco` varchar(60) COLLATE utf8mb4_bin NOT NULL,
  `numero` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `cep` varchar(9) COLLATE utf8mb4_bin NOT NULL,
  `nome` varchar(60) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_pedidos`
--

DROP TABLE IF EXISTS `tab_pedidos`;
CREATE TABLE IF NOT EXISTS `tab_pedidos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cliente` int NOT NULL,
  `data` date NOT NULL,
  `total` decimal(8,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_pedidos_itens`
--

DROP TABLE IF EXISTS `tab_pedidos_itens`;
CREATE TABLE IF NOT EXISTS `tab_pedidos_itens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_pedido` int NOT NULL,
  `id_produto` int NOT NULL,
  `qtd` int NOT NULL,
  `valor_un` decimal(8,2) NOT NULL,
  `valor_total` decimal(8,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_produtos`
--

DROP TABLE IF EXISTS `tab_produtos`;
CREATE TABLE IF NOT EXISTS `tab_produtos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_subcategoria` int NOT NULL,
  `descricao` varchar(60) COLLATE utf8mb4_bin NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `estoque` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_subcategorias`
--

DROP TABLE IF EXISTS `tab_subcategorias`;
CREATE TABLE IF NOT EXISTS `tab_subcategorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_categoria` int NOT NULL,
  `descricao` varchar(60) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_usuarios`
--

DROP TABLE IF EXISTS `tab_usuarios`;
CREATE TABLE IF NOT EXISTS `tab_usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `senha` varchar(32) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
