-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Mar-2023 às 00:38
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bstech`
--
CREATE DATABASE IF NOT EXISTS `bstech` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bstech`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `arquivo` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `quantidade`, `valor`, `arquivo`) VALUES
(1, 'HD SEAGATE BARRACUDA, 6TB, 3.5, 5400 RPM, SATA III 6GB/S, CACHE 256MB', 20, 1000, 'st6000dm003.jpg'),
(3, 'HD WD GOLD, 16TB, 3.5, 7200RPM, SATA III 6GB/S, CACHE 512MB, WD161KRYZ', 20, 3800, 'wd141kryz.jpg'),
(6, 'HD WD RED NAS PLUS, 4TB, 3.5, 5400 RPM, SATA III 6GB/S, CACHE 128MB, WD40EFZX', 20, 949, 'wd40efzx.jpg'),
(8, 'HD WD BLACK, 6TB, 3.5, 7200 RPM, SATA III 6GB/S, CACHE 256MB, WD6003FZBX', 20, 1899, 'wd6003fzbx2.jpg'),
(9, 'COMPUTADOR PICHAU GAMER, INTEL I7-10700KF, GEFORCE RTX 3070 8GB, 16GB DDR4, SSD 480GB', 20, 7800, 'erion-rgb-tgt-intel-gtx-0011_12.jpg'),
(10, 'COMPUTADOR MANCER GAMER SOMNUS, INTEL I7-10700KF, GEFORCE GTX 1660 SUPER 6GB, 8GB DDR4, SSD 240GB', 20, 5000, 'apus-black-intel-rtx-001_4_24.jpg'),
(14, 'COMPUTADOR PICHAU GAMER, INTEL I5-8400, GEFORCE RTX 3050 8GB, 8GB DDR4, SSD 240GB + MOUSE E TECLADO', 20, 4300, 'narok-mancer-intel-rtx-0001_6_1_1_1.jpg'),
(16, 'COMPUTADOR PICHAU GAMER SHAX II, INTEL I5-11400F, GEFORCE GTX 1650 4GB, 16GB DDR4, SSD M.2 240GB', 20, 3900, 'frost-intel-gtx-0001_8.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `sobrenome` varchar(250) NOT NULL,
  `cpf` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(250) NOT NULL,
  `produtos_comprados` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `sobrenome`, `cpf`, `email`, `senha`, `produtos_comprados`) VALUES
(1, 'bruno', 'santos', '05088138083', 'brunogsantoss@outlook.com', '123456', 14),
(3, 'Rafael', 'Jesus', '05088138083', 'rafael@gmail.com', '123456A', 15),
(4, 'Bruno', 'Guimaraes dos Santos', '250.404.408-98', 'brunogsantoss@outlook.com.br', '12345AF', 0),
(5, 'Bruno', 'Guimaraes dos Santos', '007.521.038-06', 'teste@gmail.com', '12345BG', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
