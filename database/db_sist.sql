-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 04-Mar-2020 às 11:06
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `conselho_gestor`
--

CREATE TABLE IF NOT EXISTS `conselho_gestor` (
  `ID_MEMBRO` int(4) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(50) NOT NULL,
  `FK_ID_FUNCAO` int(11) NOT NULL,
  PRIMARY KEY (`ID_MEMBRO`),
  UNIQUE KEY `FK_ID_FUNCAO_2` (`FK_ID_FUNCAO`),
  KEY `FK_ID_FUNCAO` (`FK_ID_FUNCAO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE IF NOT EXISTS `contato` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TELEFONE` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ENDERECO` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FK_ID_NUCLEO` int(11) NOT NULL,
  `FK_ID_TIPO` int(11) NOT NULL,
  PRIMARY KEY (`ID`,`FK_ID_NUCLEO`,`FK_ID_TIPO`),
  KEY `fk_contato_nucleo_idx` (`FK_ID_NUCLEO`),
  KEY `fk_contato_tipo1_idx` (`FK_ID_TIPO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `NOME_UNIQUE` (`NOME`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcoes`
--

CREATE TABLE IF NOT EXISTS `funcoes` (
  `ID_FUNCAO` int(11) NOT NULL AUTO_INCREMENT,
  `FUNCAO` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID_FUNCAO`),
  KEY `ID_FUNCAO` (`ID_FUNCAO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcoes_conselho`
--

CREATE TABLE IF NOT EXISTS `funcoes_conselho` (
  `ID_FUNCAO_CONSELHO` int(11) NOT NULL AUTO_INCREMENT,
  `NOME_FUNCAO` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID_FUNCAO_CONSELHO`),
  KEY `ID_FUNCAO_CONSELHO` (`ID_FUNCAO_CONSELHO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `municipio`
--

CREATE TABLE IF NOT EXISTS `municipio` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FK_ID_ESTADO` int(11) NOT NULL,
  PRIMARY KEY (`ID`,`FK_ID_ESTADO`),
  UNIQUE KEY `NOME_UNIQUE` (`NOME`),
  KEY `fk_municipio_estado1_idx` (`FK_ID_ESTADO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `nucleo`
--

CREATE TABLE IF NOT EXISTS `nucleo` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TELEFONE` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LOGO` blob,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`),
  KEY `ID_2` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `publicacoes`
--

CREATE TABLE IF NOT EXISTS `publicacoes` (
  `ID_PUBLICACAO` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `URL` varchar(437) COLLATE utf8_unicode_ci NOT NULL,
  `DESCRICAO` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FK_TIPO_PUBLICACAO` int(11) NOT NULL,
  PRIMARY KEY (`ID_PUBLICACAO`),
  KEY `FK_TIPO_PUBLICACAO` (`FK_TIPO_PUBLICACAO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TIPO` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_publicacoes`
--

CREATE TABLE IF NOT EXISTS `tipo_publicacoes` (
  `ID_TIPO_PUBLICACAO` int(11) NOT NULL AUTO_INCREMENT,
  `TIPO_PUBLICACAO` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID_TIPO_PUBLICACAO`),
  KEY `ID_TIPO_PUBLICACAO` (`ID_TIPO_PUBLICACAO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(40) CHARACTER SET utf8 NOT NULL,
  `SENHA` varchar(40) CHARACTER SET utf8 NOT NULL,
  `FK_ID_FUNCAO` int(11) NOT NULL,
  PRIMARY KEY (`ID_USUARIO`),
  KEY `FK_ID_FUNCAO` (`FK_ID_FUNCAO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_comum`
--

CREATE TABLE IF NOT EXISTS `usuario_comum` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USUARIO` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SENHA` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOME_COMPLETO` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CPF` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RG` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TELEFONE` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ENDERECO` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LOCAL_TRABALHO` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FK_ID_MUNICIPIO` int(11) NOT NULL,
  `FK_ID_ESTADO` int(11) NOT NULL,
  PRIMARY KEY (`ID`,`FK_ID_MUNICIPIO`,`FK_ID_ESTADO`),
  UNIQUE KEY `USUARIO_UNIQUE` (`USUARIO`),
  UNIQUE KEY `CPF_UNIQUE` (`CPF`),
  UNIQUE KEY `RG_UNIQUE` (`RG`),
  KEY `fk_usuario_comum_municipio1_idx` (`FK_ID_MUNICIPIO`,`FK_ID_ESTADO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_nucleo`
--

CREATE TABLE IF NOT EXISTS `usuario_nucleo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USUARIO` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SENHA` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FK_ID_NUCLEO` int(11) NOT NULL,
  PRIMARY KEY (`ID`,`FK_ID_NUCLEO`),
  UNIQUE KEY `USUARIO_UNIQUE` (`USUARIO`),
  KEY `fk_usuario_nucleo_nucleo1_idx` (`FK_ID_NUCLEO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  ADD CONSTRAINT `fk_usuario_comum_municipio1` FOREIGN KEY (`FK_ID_MUNICIPIO`,`FK_ID_ESTADO`) REFERENCES `municipio` (`ID`, `FK_ID_ESTADO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario_nucleo`
--
ALTER TABLE `usuario_nucleo`
  ADD CONSTRAINT `fk_usuario_nucleo_nucleo1` FOREIGN KEY (`FK_ID_NUCLEO`) REFERENCES `nucleo` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
