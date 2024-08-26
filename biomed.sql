SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
  time_zone = "+00:00";

CREATE TABLE `exames_amostras` (
  `id_exames_amostras` int(5) NOT NULL,
  'nome_exame' varchar(120) not null,
  'tipo' boolean not null,
  'data_realizado' datetime (23),
  ' id_cliente' int not null,
  'id_info_referencia' int not null,
) CREATE TABLE `resultados_exames` (
  `id_resultado_exames` int(5) NOT NULL,
  'id_cliente' int not null,
  'id_procedimentos' int(5) NOT NULL,
  'id_profissionais' int(5) NOT NULL,
  'id_referencia' int(5) NOT NULL,
  'link_do_resultado' varchar 'data_realizado' datetime (23),
) CREATE TABLE `informacoes_procedimento` (
  'id_informacoes_procedimento' int(5) not null,
  'id_procedimentos' int(5) NOT NULL,
  'id_profissional' int(5) NOT NULL,
  'id_paciente' int(5) NOT NULL,
  'id_info_referencia' int(5) not null,
) 

ALTER TABLE
  `exames_amostras`
ADD
  PRIMARY KEY (`id_exames_amostras`);

--
ALTER TABLE
  `resultados_exames`
ADD
  PRIMARY KEY (`id_resultado_exames`);

--
ALTER TABLE
  `informacoes_procedimento`
ADD
  PRIMARY KEY (`id_informacoes_procedimento`);

--  `exames_amostras`
ALTER TABLE
  `exames_amostra`
ADD
  CONSTRAINT `chave_estrangeira_info_referencia` FOREIGN KEY (`id_info_referencia`) REFERENCES `info_referencia` (`id_info_referencia`);

COMMIT;

--
--
ALTER TABLE
  `exames_amostra`
ADD
  CONSTRAINT `chave_estrageira_cliente_ea` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

COMMIT;

--
--  `exame`
ALTER TABLE
  `resultados_exames`
ADD
  CONSTRAINT `chave_estrageira_cliente_e` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

COMMIT;

ALTER TABLE
  `resultados_exames`
ADD
  CONSTRAINT `chave_estrageira_procedimentos_e` FOREIGN KEY (`id_procedimentos`) REFERENCES `procedimentos` (`id_procedimentos`);

COMMIT;

ALTER TABLE
  `resultados_exames`
ADD
  CONSTRAINT `chave_estrageira_profissionais_e` FOREIGN KEY (`id_profissionais`) REFERENCES `profissionais` (`id_profissionais`);

COMMIT;

ALTER TABLE
  `resultados_exames`
ADD
  CONSTRAINT `chave_estrageira_referencia_e` FOREIGN KEY (`id_referencia`) REFERENCES `referencia` (`id_referencia`);

COMMIT;

--  `informacoes_procedimento`
ALTER TABLE
  `informacoes_procedimento`
ADD
  CONSTRAINT `chave_estrageira_info_referencia_ip` FOREIGN KEY (`id_info_referencia`) REFERENCES `info_referencia` (`id_info_referencia`);

COMMIT;

ALTER TABLE
  `informacoes_procedimento`
ADD
  CONSTRAINT `chave_estrageira_procedimentos_ip` FOREIGN KEY (`id_procedimentos`) REFERENCES `procedimentos` (`id_procedimentos`);

COMMIT;

ALTER TABLE
  `informacoes_procedimento`
ADD
  CONSTRAINT `chave_estrageira_paciente_ip` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`);

COMMIT;

ALTER TABLE
  `informacoes_procedimento`
ADD
  CONSTRAINT `chave_estrageira_profissional_ip` FOREIGN KEY (`id_profissional`) REFERENCES `profissional` (`id_profissional`);

COMMIT;
