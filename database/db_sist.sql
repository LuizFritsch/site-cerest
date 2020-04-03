-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 03-Abr-2020 às 09:40
-- Versão do servidor: 5.6.41-84.1
-- versão do PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vinilpub_guilherme_cerest`
--
CREATE DATABASE IF NOT EXISTS `vinilpub_guilherme_cerest` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `vinilpub_guilherme_cerest`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `conselho_gestor`
--

CREATE TABLE `conselho_gestor` (
  `ID_MEMBRO` int(4) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `FK_ID_FUNCAO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TELEFONE` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ENDERECO` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FK_ID_NUCLEO` int(11) NOT NULL,
  `FK_ID_TIPO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE `eventos` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `DESCRICAO` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `DATA_INICIO` date NOT NULL,
  `DATA_FIM` date NOT NULL,
  `STATUS_INSCRICOES` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcoes`
--

CREATE TABLE `funcoes` (
  `ID_FUNCAO` int(11) NOT NULL,
  `FUNCAO` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcoes_conselho`
--

CREATE TABLE `funcoes_conselho` (
  `ID_FUNCAO_CONSELHO` int(11) NOT NULL,
  `NOME_FUNCAO` varchar(70) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscritos_eventos`
--

CREATE TABLE `inscritos_eventos` (
  `ID` int(11) NOT NULL,
  `FK_ID_USUARIO` int(11) NOT NULL,
  `FK_ID_EVENTO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `municipio`
--

CREATE TABLE `municipio` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FK_ID_ESTADO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `nucleo`
--

CREATE TABLE `nucleo` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TELEFONE` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LOGO` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `publicacoes`
--

CREATE TABLE `publicacoes` (
  `ID_PUBLICACAO` int(11) NOT NULL,
  `NOME` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `URL` varchar(437) COLLATE utf8_unicode_ci NOT NULL,
  `DESCRICAO` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FK_TIPO_PUBLICACAO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `ID` int(11) NOT NULL,
  `TIPO` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_publicacoes`
--

CREATE TABLE `tipo_publicacoes` (
  `ID_TIPO_PUBLICACAO` int(11) NOT NULL,
  `TIPO_PUBLICACAO` varchar(400) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_USUARIO` int(11) NOT NULL,
  `NOME` varchar(40) CHARACTER SET utf8 NOT NULL,
  `SENHA` varchar(40) CHARACTER SET utf8 NOT NULL,
  `FK_ID_FUNCAO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_comum`
--

CREATE TABLE `usuario_comum` (
  `ID` int(11) NOT NULL,
  `USUARIO` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SENHA` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOME_COMPLETO` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CPF` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RG` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CELULAR` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ENDERECO` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LOCAL_TRABALHO` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FK_ID_FUNCAO` int(11) NOT NULL,
  `FK_ID_MUNICIPIO` int(11) NOT NULL,
  `FK_ID_ESTADO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_nucleo`
--

CREATE TABLE `usuario_nucleo` (
  `ID` int(11) NOT NULL,
  `USUARIO` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SENHA` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FK_ID_NUCLEO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conselho_gestor`
--
ALTER TABLE `conselho_gestor`
  ADD PRIMARY KEY (`ID_MEMBRO`),
  ADD UNIQUE KEY `FK_ID_FUNCAO_2` (`FK_ID_FUNCAO`),
  ADD KEY `FK_ID_FUNCAO` (`FK_ID_FUNCAO`);

--
-- Indexes for table `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`ID`,`FK_ID_NUCLEO`,`FK_ID_TIPO`),
  ADD KEY `fk_contato_nucleo_idx` (`FK_ID_NUCLEO`),
  ADD KEY `fk_contato_tipo1_idx` (`FK_ID_TIPO`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `NOME_UNIQUE` (`NOME`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `funcoes`
--
ALTER TABLE `funcoes`
  ADD PRIMARY KEY (`ID_FUNCAO`),
  ADD KEY `ID_FUNCAO` (`ID_FUNCAO`);

--
-- Indexes for table `funcoes_conselho`
--
ALTER TABLE `funcoes_conselho`
  ADD PRIMARY KEY (`ID_FUNCAO_CONSELHO`),
  ADD KEY `ID_FUNCAO_CONSELHO` (`ID_FUNCAO_CONSELHO`);

--
-- Indexes for table `inscritos_eventos`
--
ALTER TABLE `inscritos_eventos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_ID_USUARIO` (`FK_ID_USUARIO`),
  ADD KEY `FK_ID_EVENTO` (`FK_ID_EVENTO`);

--
-- Indexes for table `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`ID`,`FK_ID_ESTADO`),
  ADD UNIQUE KEY `NOME_UNIQUE` (`NOME`),
  ADD KEY `fk_municipio_estado1_idx` (`FK_ID_ESTADO`);

--
-- Indexes for table `nucleo`
--
ALTER TABLE `nucleo`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `ID_2` (`ID`);

--
-- Indexes for table `publicacoes`
--
ALTER TABLE `publicacoes`
  ADD PRIMARY KEY (`ID_PUBLICACAO`),
  ADD KEY `FK_TIPO_PUBLICACAO` (`FK_TIPO_PUBLICACAO`);

--
-- Indexes for table `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tipo_publicacoes`
--
ALTER TABLE `tipo_publicacoes`
  ADD PRIMARY KEY (`ID_TIPO_PUBLICACAO`),
  ADD KEY `ID_TIPO_PUBLICACAO` (`ID_TIPO_PUBLICACAO`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_USUARIO`),
  ADD KEY `FK_ID_FUNCAO` (`FK_ID_FUNCAO`);

--
-- Indexes for table `usuario_comum`
--
ALTER TABLE `usuario_comum`
  ADD PRIMARY KEY (`ID`,`FK_ID_MUNICIPIO`,`FK_ID_ESTADO`),
  ADD UNIQUE KEY `USUARIO_UNIQUE` (`USUARIO`),
  ADD UNIQUE KEY `CPF_UNIQUE` (`CPF`),
  ADD KEY `fk_usuario_comum_municipio1_idx` (`FK_ID_MUNICIPIO`,`FK_ID_ESTADO`),
  ADD KEY `FK_ID_FUNCAO` (`FK_ID_FUNCAO`),
  ADD KEY `FK_ID_FUNCAO_2` (`FK_ID_FUNCAO`);

--
-- Indexes for table `usuario_nucleo`
--
ALTER TABLE `usuario_nucleo`
  ADD PRIMARY KEY (`ID`,`FK_ID_NUCLEO`),
  ADD UNIQUE KEY `USUARIO_UNIQUE` (`USUARIO`),
  ADD KEY `fk_usuario_nucleo_nucleo1_idx` (`FK_ID_NUCLEO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conselho_gestor`
--
ALTER TABLE `conselho_gestor`
  MODIFY `ID_MEMBRO` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contato`
--
ALTER TABLE `contato`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funcoes`
--
ALTER TABLE `funcoes`
  MODIFY `ID_FUNCAO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funcoes_conselho`
--
ALTER TABLE `funcoes_conselho`
  MODIFY `ID_FUNCAO_CONSELHO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inscritos_eventos`
--
ALTER TABLE `inscritos_eventos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `municipio`
--
ALTER TABLE `municipio`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publicacoes`
--
ALTER TABLE `publicacoes`
  MODIFY `ID_PUBLICACAO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipo`
--
ALTER TABLE `tipo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipo_publicacoes`
--
ALTER TABLE `tipo_publicacoes`
  MODIFY `ID_TIPO_PUBLICACAO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario_comum`
--
ALTER TABLE `usuario_comum`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario_nucleo`
--
ALTER TABLE `usuario_nucleo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `conselho_gestor`
--
ALTER TABLE `conselho_gestor`
  ADD CONSTRAINT `conselho_gestor_ibfk_1` FOREIGN KEY (`FK_ID_FUNCAO`) REFERENCES `funcoes_conselho` (`ID_FUNCAO_CONSELHO`);

--
-- Limitadores para a tabela `contato`
--
ALTER TABLE `contato`
  ADD CONSTRAINT `fk_contato_nucleo` FOREIGN KEY (`FK_ID_NUCLEO`) REFERENCES `nucleo` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contato_tipo1` FOREIGN KEY (`FK_ID_TIPO`) REFERENCES `tipo` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `inscritos_eventos`
--
ALTER TABLE `inscritos_eventos`
  ADD CONSTRAINT `inscritos_eventos_ibfk_1` FOREIGN KEY (`FK_ID_USUARIO`) REFERENCES `usuario_comum` (`ID`),
  ADD CONSTRAINT `inscritos_eventos_ibfk_2` FOREIGN KEY (`FK_ID_EVENTO`) REFERENCES `eventos` (`ID`);

--
-- Limitadores para a tabela `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `fk_municipio_estado1` FOREIGN KEY (`FK_ID_ESTADO`) REFERENCES `estado` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `publicacoes`
--
ALTER TABLE `publicacoes`
  ADD CONSTRAINT `publicacoes_ibfk_1` FOREIGN KEY (`FK_TIPO_PUBLICACAO`) REFERENCES `tipo_publicacoes` (`ID_TIPO_PUBLICACAO`);

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`FK_ID_FUNCAO`) REFERENCES `funcoes` (`ID_FUNCAO`);

--
-- Limitadores para a tabela `usuario_comum`
--
ALTER TABLE `usuario_comum`
  ADD CONSTRAINT `fk_usuario_comum_municipio1` FOREIGN KEY (`FK_ID_MUNICIPIO`,`FK_ID_ESTADO`) REFERENCES `municipio` (`ID`, `FK_ID_ESTADO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuario_comum_ibfk_1` FOREIGN KEY (`FK_ID_FUNCAO`) REFERENCES `funcoes` (`ID_FUNCAO`);

--
-- Limitadores para a tabela `usuario_nucleo`
--
ALTER TABLE `usuario_nucleo`
  ADD CONSTRAINT `fk_usuario_nucleo_nucleo1` FOREIGN KEY (`FK_ID_NUCLEO`) REFERENCES `nucleo` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
