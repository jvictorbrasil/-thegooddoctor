-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 11/09/2020 às 16:28
-- Versão do servidor: 10.4.13-MariaDB
-- Versão do PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u105885554_gd`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `medicos`
--

CREATE TABLE `medicos` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `crm` varchar(45) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `sobrenome` varchar(45) DEFAULT NULL,
  `avatar` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `medicos`
--

INSERT INTO `medicos` (`id`, `nome`, `crm`, `login`, `senha`, `sobrenome`, `avatar`) VALUES
(1, 'Dr.° Shaun', 'CRM/AL 2143', 'shaun', '123', 'murphy', 'avatarcrm123.png'),
(2, 'Dr.ª Claire', 'CRM/AL 4596', 'claire', '1234', 'Browne', 'avatarcrmal2415.png'),
(3, 'Dr.° Neil', 'CRM/AL 3589', 'neil', '12345', 'Melendez', 'avatarcrmal0666.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `cpf` varchar(250) NOT NULL,
  `telefone` varchar(250) NOT NULL,
  `dataatendimento` date NOT NULL,
  `sintomas` varchar(250) NOT NULL,
  `observacoes` varchar(250) NOT NULL,
  `medico_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `pacientes`
--

INSERT INTO `pacientes` (`id`, `nome`, `cpf`, `telefone`, `dataatendimento`, `sintomas`, `observacoes`, `medico_id`) VALUES
(29, 'rambo', '111.111.111-11', '(11) 11111-1111', '2021-06-18', 'Pressão Alta', 'o omi é caçado por todos os lados', 2),
(28, 'stalonne cobra', '000.000.000-00', '(00) 00000-0000', '2020-09-21', 'Pressão Alta', 'alto estresse por conta de suas atividades', 2),
(27, 'joão victor brasil', '054.512.814-59', '(82) 99663-3721', '2020-09-09', 'Diarréia, Outros', 'dores na barriga', 1),
(26, 'cicero calazans', '066.176.685-37', '(82) 12312-315', '2020-09-11', 'Diarréia, Outros', 'Dores fortes no abdome, irritação, inchaço.', 1),
(31, 'mariana', '066.176.685-37', '(82) 99938-4018', '2020-09-26', 'Febre, Diarréia', 'asdasdasd', 1),
(33, 'Sybelle Araujo', '025.410.500-51', '(82) 99338-0825', '2020-09-10', 'Pressão Alta, Diarréia, Outros', 'paciente apresenta vários problemas', 3),
(34, 'Sybelle Araujo', '111.111.111-11', '(11) 11111-1111', '2020-09-10', 'Diarréia, Outros', 'paciente reclama de dores lombares', 2),
(35, 'Deyvis', '518.451.554-61', '(18) 26298-2125', '2020-09-19', 'Resfriado', 'rapaz encontra-se com gripe bovina', 3);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
