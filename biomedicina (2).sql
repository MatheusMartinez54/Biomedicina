

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
  `sample_id` varchar(50) NOT NULL,
  `sample_type` varchar(50) NOT NULL,
  `collection_datetime` datetime NOT NULL,
  `collection_location` varchar(100) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` enum('Masculino','Feminino','Outro') NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `requester_name` varchar(100) NOT NULL,
  `requester_council` varchar(20) NOT NULL,
  `requester_council_number` varchar(20) NOT NULL,
  `requester_institution` varchar(100) NOT NULL,
  `analysis_type` varchar(100) NOT NULL,
  `request_datetime` datetime NOT NULL,
  `responsible_lab` varchar(100) NOT NULL,
  `analysis_status` enum('Pendente','Em andamento','Concluída','Cancelada') NOT NULL,
  `additional_notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `amostras`
--

INSERT INTO `amostras` (`id`, `sample_id`, `sample_type`, `collection_datetime`, `collection_location`, `patient_name`, `birthdate`, `gender`, `contact_info`, `requester_name`, `requester_council`, `requester_council_number`, `requester_institution`, `analysis_type`, `request_datetime`, `responsible_lab`, `analysis_status`, `additional_notes`, `created_at`) VALUES
(1, '10365', 'Sangue', '2024-07-19 20:19:00', 'hospital', 'Matheus ', '2024-07-24', 'Masculino', 'iifgy3', 'fwf3', 'CRM', 'çkf33', 'jhc wjh', 'eve', '2024-07-24 01:52:00', 'reer', '', '', '2024-07-12 02:53:02'),
(2, '10365', 'Sangue', '2024-07-19 20:19:00', 'hospital', 'Matheus ', '2024-07-24', 'Masculino', 'iifgy3', 'fwf3', 'CRM', 'çkf33', 'jhc wjh', 'eve', '2024-07-24 01:52:00', 'reer', '', '', '2024-07-12 02:55:33'),
(3, 'gh', 'Tecido', '2024-07-11 23:36:00', 'erh ', 'jkf jw ', '2024-07-18', 'Feminino', 'grwre', 'weger', 'COREN', 'grvs', 'svvs', 'svdvs', '2024-07-11 23:40:00', 'svdvs', 'Em andamento', 'svdvsv', '2024-07-12 03:36:54');

-- --------------------------------------------------------

--
-- Estrutura para tabela `perfil`
--

CREATE TABLE `perfil` (
  `PERFIL_ID` int(11) NOT NULL,
  `PERFIL_NOME` varchar(50) NOT NULL,
  `PERMISSOES_ID` int(11) NOT NULL,
  `USUARIO_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `perfil`
--

INSERT INTO `perfil` (`PERFIL_ID`, `PERFIL_NOME`, `PERMISSOES_ID`, `USUARIO_ID`) VALUES
(1, 'MÉDICA', 0, 1),
(2, 'PACIENTE', 0, 4),
(3, 'SUPERVISOR', 0, 2),
(4, 'COORDENADOR', 0, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `perfil_permissoes`
--

CREATE TABLE `perfil_permissoes` (
  `PP_ID` int(11) NOT NULL,
  `PERFIL_ID` int(11) NOT NULL,
  `PERMISSOES_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `perfil_permissoes`
--

INSERT INTO `perfil_permissoes` (`PP_ID`, `PERFIL_ID`, `PERMISSOES_ID`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 1, 4),
(4, 2, 1),
(5, 2, 5),
(6, 3, 1),
(7, 3, 2),
(8, 4, 1),
(9, 4, 3),
(10, 4, 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `permissoes`
--

CREATE TABLE `permissoes` (
  `PERMISSOES_ID` int(11) NOT NULL,
  `PERMISSOES_NOME` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `permissoes`
--

INSERT INTO `permissoes` (`PERMISSOES_ID`, `PERMISSOES_NOME`) VALUES
(1, 'RESULTADOS'),
(2, 'APROVAÇÃO'),
(3, 'INCLUSÃO DE RESULTADOS'),
(4, 'CADASTRO DE AMOSTRA'),
(5, 'SEGUNDA VIA DOS RESULTADOS');

-- --------------------------------------------------------

--
-- Estrutura para tabela `senha`
--

CREATE TABLE `senha` (
  `USUARIO_ID` int(11) NOT NULL,
  `SENHA_HASH` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `senha`
--

INSERT INTO `senha` (`USUARIO_ID`, `SENHA_HASH`) VALUES
(1, '123'),
(2, '123'),
(3, '123'),
(4, '123');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `USUARIO_NOME` varchar(50) NOT NULL,
  `USUARIO_TIPO` varchar(2) NOT NULL,
  `USUARIO_MATRICULA` int(11) NOT NULL,
  `USUARIO_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`USUARIO_NOME`, `USUARIO_TIPO`, `USUARIO_MATRICULA`, `USUARIO_ID`) VALUES
('JULIA', 'I', 93166, 1),
('MATHEUS', 'I', 94198, 2),
('CRISDAYANE', 'I', 50702, 3),
('BORBA', 'E', 11111, 4);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `amostras`
--
ALTER TABLE `amostras`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`PERFIL_ID`);

--
-- Índices de tabela `perfil_permissoes`
--
ALTER TABLE `perfil_permissoes`
  ADD PRIMARY KEY (`PP_ID`);

--
-- Índices de tabela `permissoes`
--
ALTER TABLE `permissoes`
  ADD PRIMARY KEY (`PERMISSOES_ID`);

--
-- Índices de tabela `senha`
--
ALTER TABLE `senha`
  ADD PRIMARY KEY (`USUARIO_ID`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`USUARIO_ID`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `amostras`
--
ALTER TABLE `amostras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `PERFIL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `perfil_permissoes`
--
ALTER TABLE `perfil_permissoes`
  MODIFY `PP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `permissoes`
--
ALTER TABLE `permissoes`
  MODIFY `PERMISSOES_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `USUARIO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `senha`
--
ALTER TABLE `senha`
  ADD CONSTRAINT `senha_ibfk_1` FOREIGN KEY (`USUARIO_ID`) REFERENCES `usuario` (`USUARIO_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
