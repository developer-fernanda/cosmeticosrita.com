-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Maio-2021 às 02:48
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `rita_presentes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id_carrinho` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`id_carrinho`, `id_produto`, `id_cliente`) VALUES
(59, 1, 2),
(93, 1, 1),
(94, 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(100) NOT NULL,
  `email_cliente` varchar(100) NOT NULL,
  `senha_cliente` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome_cliente`, `email_cliente`, `senha_cliente`) VALUES
(1, 'Maria Nunes de Almeida', 'maria@gmail.com', '1234'),
(2, 'Lucas Moraes', 'lucas@gmail.com', '1234'),
(3, 'Fernanda', 'fernanda@gmail.com', '1234'),
(5, 'Rita', 'rita@gmail.com', '1234'),
(6, 'Geraldo', 'geraldo@gmail.com', '1234'),
(7, 'Joaquim', 'joaquim@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_venda`
--

CREATE TABLE `item_venda` (
  `id_item_venda` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_venda` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `total_item_venda` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `nome_produto` varchar(100) NOT NULL,
  `descricao_produto` varchar(150) NOT NULL,
  `preco_produto` decimal(6,2) NOT NULL,
  `foto_produto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome_produto`, `descricao_produto`, `preco_produto`, `foto_produto`) VALUES
(1, 'Florata Blue\r\n', 'Desodorante colônia 75ml', '110.90', 'Floratablue.png'),
(2, 'Florata Rose\r\n', 'Desodorante Colônia 75ml', '105.00', 'FlorataRose.png\r\n'),
(3, 'Florata Red\r\n\r\n', 'Desodorante Colônia 75ml', '105.20', 'Floratared.png\r\n'),
(5, 'Coffee Seduction', 'Desodorante Colônia 100ml', '116.90', 'CoffeeSeduction.png'),
(6, 'Coffee Paradiso', 'Desodorante Colônia 100ml', '146.90', 'CoffeeParadiso.png'),
(7, 'Coffee Lucky', 'Desodorante Colônia 100ml', '146.90', 'CoffeeParadiso.png'),
(8, 'Intense', 'Desodorante Colônia 100ml', '154.00', 'Intense.png'),
(9, 'Lily Eau de Parfum', 'Válvula 75ml', '239.90', 'LilyEau.png'),
(10, 'Batom Capricho Connecting', 'Batom Cremoso Connecting 3,6 g', '15.90', 'BatomCaprichoConnecting.png'),
(11, 'Batom Capricho Loving', 'Batom Cremoso Capricho Loving 3,6 g', '146.90', 'BatomCaprichoLoving.png'),
(12, 'Lily Hidratante', 'Creme Acetinado Hidratante Desodorante Corporal Lily', '99.90', 'Lily.png'),
(13, 'Coffee Paradiso', 'Desodorante Colônia 100ml', '146.90', 'CoffeeParadiso.png'),
(14, 'Sombra Mate Rose', 'Sombra Mate Compacta Rose Intense 1,5g', '23.90', 'SombraRose.png'),
(15, 'Sombra Mate Azul', 'Sombra Mate Compacta Azul pra meditar Intense', '37.90', 'SombraAzul.png'),
(16, 'Batom Líquido Rose', 'Batom Líquido Cushion Rose Make B. Sun Hit 6ml', '49.90', 'BatomLiquidoRose.png'),
(17, 'Batom Intense TOP', ' Batom Líquido Mate Top Intense', '29.00', 'BatomIntenseTop.png'),
(18, 'Lily Absolu Eau De Parfum ', 'Válvula 75ml', '239.90', 'LilyAbsoluEau.png'),
(19, 'Test', ' ', '0.00', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(100) NOT NULL,
  `senha_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `senha_usuario`) VALUES
(1, 'Fernanda Ingrid', '1234');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `id_venda` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `data_venda` datetime NOT NULL,
  `total_venda` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id_carrinho`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `email` (`email_cliente`);

--
-- Índices para tabela `item_venda`
--
ALTER TABLE `item_venda`
  ADD PRIMARY KEY (`id_item_venda`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `nome_usuario` (`nome_usuario`);

--
-- Índices para tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id_venda`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id_carrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `item_venda`
--
ALTER TABLE `item_venda`
  MODIFY `id_item_venda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
