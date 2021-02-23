-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Fev-2021 às 13:30
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mma`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `mma`
--

CREATE TABLE `mma` (
  `id` int(11) NOT NULL,
  `fighter_name` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `height` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `mma`
--

INSERT INTO `mma` (`id`, `fighter_name`, `gender`, `weight`, `height`) VALUES
(7, 'Roberto Texeira', 'Masculino', 75, 1.88),
(9, 'Pedro da silva', 'Masculino', 65, 1.79),
(10, 'Fabricio Werdum', 'Masculino', 85, 1.93),
(11, 'khabib nurmagomedov', 'Masculino', 70, 1.78),
(12, 'Conor McGregor', 'Masculino', 77, 1.75),
(13, 'Arnaldo ', 'Masculino', 60, 1.72);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `mma`
--
ALTER TABLE `mma`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fighter_name` (`fighter_name`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `mma`
--
ALTER TABLE `mma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
