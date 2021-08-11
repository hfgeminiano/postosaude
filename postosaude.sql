-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Ago-2021 às 03:08
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `postosaude2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `posto`
--

CREATE TABLE `posto` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `logradouro` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `posto`
--

INSERT INTO `posto` (`id`, `nome`, `logradouro`, `email`, `telefone`, `bairro`, `numero`) VALUES
(1, 'São João', 'Rua 22', 'jj@jj.com', '00000000', 'São João', 22),
(2, 'Nova Pirapora', 'Rua Newton José Lopes', '12@12.com', '00000000', 'Nova Pirapora', 2),
(3, 'São geraldo', '12457892', 'psf@psf.com', '123456749', '1234256', 789);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `posto`
--
ALTER TABLE `posto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `posto`
--
ALTER TABLE `posto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
