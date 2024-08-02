-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/07/2024 às 08:08
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
-- Banco de dados: `biomedicina`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `amostras`
--

CREATE TABLE `amostras` (
  `id` int(11) NOT NULL,
  `sample_id` int(11) NOT NULL,
  `sample_type` varchar(50) NOT NULL,
  `collection_datetime` datetime NOT NULL,
  `collection_location` varchar(100) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `contact_telefone` varchar(20) NOT NULL,
  `contact_email` varchar(100) DEFAULT NULL,
  `requester_name` varchar(100) NOT NULL,
  `requester_council` varchar(100) NOT NULL,
  `requester_council_number` int(11) NOT NULL,
  `requester_institution` varchar(100) NOT NULL,
  `analysis_type` varchar(100) NOT NULL,
  `request_datetime` datetime NOT NULL,
  `responsible_lab` varchar(100) NOT NULL,
  `analysis_status` varchar(50) NOT NULL,
  `additional_notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `amostras`
--
ALTER TABLE `amostras`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `amostras`
--
ALTER TABLE `amostras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
