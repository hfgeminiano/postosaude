-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Ago-2021 às 19:57
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
-- Estrutura da tabela `assistencia`
--

CREATE TABLE `assistencia` (
  `id` int(11) NOT NULL,
  `dia` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `estado` varchar(10) NOT NULL,
  `motivo` varchar(100) DEFAULT NULL,
  `medico` varchar(45) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `posto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta`
--

CREATE TABLE `consulta` (
  `id` int(11) NOT NULL,
  `dia` date NOT NULL,
  `horario` time DEFAULT NULL,
  `estado` varchar(12) NOT NULL,
  `motivo` varchar(100) DEFAULT NULL,
  `observacao` varchar(100) DEFAULT NULL,
  `tipo_paciente` int(11) NOT NULL,
  `posto_id` int(11) NOT NULL,
  `dependentes_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `medico_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dependentes`
--

CREATE TABLE `dependentes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `nascimento` date NOT NULL,
  `sexo` varchar(9) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `exame`
--

CREATE TABLE `exame` (
  `id` int(11) NOT NULL,
  `dia` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `tipo` varchar(20) NOT NULL,
  `estado` varchar(14) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `posto_id` int(11) NOT NULL,
  `laboratorio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `laboratorio`
--

CREATE TABLE `laboratorio` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `laboratorio`
--

INSERT INTO `laboratorio` (`id`, `nome`) VALUES
(6, 'LAB 1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `medico`
--

CREATE TABLE `medico` (
  `id` int(11) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `crm` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `receita`
--

CREATE TABLE `receita` (
  `id` int(11) NOT NULL,
  `prescricao` varchar(45) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `posto_id` int(11) NOT NULL,
  `medico_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `nascimento` date NOT NULL,
  `nivel` int(11) DEFAULT 0,
  `cpf` varchar(15) DEFAULT NULL,
  `posto_id` int(11) NOT NULL,
  `logradouro` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `telefone`, `sexo`, `nascimento`, `nivel`, `cpf`, `posto_id`, `logradouro`, `bairro`, `numero`) VALUES
(14, 'admin', 'admin@admin.com', '$2y$10$iBrf4O.XwkAwRT.KGnuVruRABJvpddwsjp8x7N4QtZ9weHY0zcmjC', '(38) 99205-', 'Masculino', '2001-01-01', 1, '012345678999', 1, 'RUA SÃO VICENTE DE PAULO', 'SÃO JOÃO BATISTA', 84);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `assistencia`
--
ALTER TABLE `assistencia`
  ADD PRIMARY KEY (`id`,`usuario_id`,`posto_id`),
  ADD KEY `fk_assistencia_usuario1_idx` (`usuario_id`),
  ADD KEY `fk_assistencia_posto1_idx` (`posto_id`);

--
-- Índices para tabela `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id`,`posto_id`,`usuario_id`),
  ADD KEY `fk_consulta_posto1_idx` (`posto_id`),
  ADD KEY `fk_consulta_dependentes1_idx` (`dependentes_id`),
  ADD KEY `fk_consulta_usuario1_idx` (`usuario_id`),
  ADD KEY `fk_consulta_medico1_idx` (`medico_id`);

--
-- Índices para tabela `dependentes`
--
ALTER TABLE `dependentes`
  ADD PRIMARY KEY (`id`,`usuario_id`),
  ADD KEY `fk_dependentes_usuario1_idx` (`usuario_id`);

--
-- Índices para tabela `exame`
--
ALTER TABLE `exame`
  ADD PRIMARY KEY (`id`,`usuario_id`,`posto_id`,`laboratorio_id`),
  ADD KEY `fk_exame_usuario1_idx` (`usuario_id`),
  ADD KEY `fk_exame_posto1_idx` (`posto_id`),
  ADD KEY `fk_exame_laboratorio1_idx` (`laboratorio_id`);

--
-- Índices para tabela `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `posto`
--
ALTER TABLE `posto`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `receita`
--
ALTER TABLE `receita`
  ADD PRIMARY KEY (`id`,`usuario_id`,`posto_id`,`medico_id`),
  ADD KEY `fk_receita_usuario1_idx` (`usuario_id`),
  ADD KEY `fk_receita_posto1_idx` (`posto_id`),
  ADD KEY `fk_receita_medico1_idx` (`medico_id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`,`posto_id`),
  ADD KEY `fk_usuario_posto1_idx` (`posto_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `assistencia`
--
ALTER TABLE `assistencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `dependentes`
--
ALTER TABLE `dependentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `exame`
--
ALTER TABLE `exame`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `laboratorio`
--
ALTER TABLE `laboratorio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `medico`
--
ALTER TABLE `medico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de tabela `posto`
--
ALTER TABLE `posto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `receita`
--
ALTER TABLE `receita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `assistencia`
--
ALTER TABLE `assistencia`
  ADD CONSTRAINT `fk_assistencia_posto1` FOREIGN KEY (`posto_id`) REFERENCES `posto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_assistencia_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `fk_consulta_dependentes1` FOREIGN KEY (`dependentes_id`) REFERENCES `dependentes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_consulta_medico1` FOREIGN KEY (`medico_id`) REFERENCES `medico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_consulta_posto1` FOREIGN KEY (`posto_id`) REFERENCES `posto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_consulta_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `dependentes`
--
ALTER TABLE `dependentes`
  ADD CONSTRAINT `fk_dependentes_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `exame`
--
ALTER TABLE `exame`
  ADD CONSTRAINT `fk_exame_laboratorio1` FOREIGN KEY (`laboratorio_id`) REFERENCES `laboratorio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_exame_posto1` FOREIGN KEY (`posto_id`) REFERENCES `posto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_exame_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `receita`
--
ALTER TABLE `receita`
  ADD CONSTRAINT `fk_receita_medico1` FOREIGN KEY (`medico_id`) REFERENCES `medico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_receita_posto1` FOREIGN KEY (`posto_id`) REFERENCES `posto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_receita_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_posto1` FOREIGN KEY (`posto_id`) REFERENCES `posto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
