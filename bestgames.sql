-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/11/2023 às 15:22
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bestgames`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `tipoCliente` varchar(50) NOT NULL,
  `nomeCliente` varchar(100) NOT NULL,
  `emailCliente` varchar(100) NOT NULL,
  `telefoneCliente` varchar(20) DEFAULT NULL,
  `cpfCliente` varchar(20) NOT NULL,
  `senhaCliente` varchar(100) NOT NULL,
  `fotoCliente` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`idCliente`, `tipoCliente`, `nomeCliente`, `emailCliente`, `telefoneCliente`, `cpfCliente`, `senhaCliente`, `fotoCliente`) VALUES
(1, 'administrador', 'Felipe', 'f@gmail.com', '(12) 34567-8942', '346.748.637-59', '202cb962ac59075b964b07152d234b70', 'img/Clientes/ifpr_logo.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `envio`
--

CREATE TABLE `envio` (
  `idCliente` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `dataHora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `idProduto` int(11) NOT NULL,
  `fotoProduto` varchar(100) DEFAULT NULL,
  `nomeProduto` varchar(100) NOT NULL,
  `listConsole` varchar(10) NOT NULL,
  `precoProduto` varchar(20) NOT NULL,
  `descricaoProduto` varchar(200) NOT NULL,
  `statusProduto` varchar(30) NOT NULL,
  `dataProduto` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`idProduto`, `fotoProduto`, `nomeProduto`, `listConsole`, `precoProduto`, `descricaoProduto`, `statusProduto`, `dataProduto`) VALUES
(1, 'img/produtos/001.jpeg', 'God of War (2018)', 'PS4', '89,90', 'Joguinho', 'disponivel', '0000-00-00'),
(2, 'img/produtos/002.JPEG', 'Horizon Forbiden West', 'PS4', '109,90', 'Joguinho', 'disponivel', '0000-00-00'),
(3, 'img/produtos/003.jpeg', 'Ghost of Tsushima', 'PS4', '149,90', 'Joguinho', 'disponivel', '0000-00-00'),
(4, 'img/produtos/004.jpeg', 'Uncharted 4: A Thief’s End', 'PS4', '49,90', 'Joguinho', 'disponivel', '0000-00-00'),
(5, 'img/produtos/005.jpeg', 'God of War Ragnarok', 'PS4', '199,90', 'Joguinho', 'disponivel', '0000-00-00'),
(6, 'img/produtos/006.jpeg', 'Riders Republic', 'PS4', '159,90', 'Joguinho', 'disponivel', '0000-00-00'),
(7, 'img/produtos/007.jpeg', 'Guardiões da Galáxia', 'PS4', '119,90', 'Joguinho', 'disponivel', '0000-00-00');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`),
  ADD UNIQUE KEY `emailCliente` (`emailCliente`),
  ADD UNIQUE KEY `cpfCliente` (`cpfCliente`);

--
-- Índices de tabela `envio`
--
ALTER TABLE `envio`
  ADD PRIMARY KEY (`idCliente`,`idProduto`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`idProduto`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
