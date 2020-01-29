-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.27
-- Versão do PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `vinilpub_guilherme_cerest`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `conselho_gestor`
--

CREATE TABLE IF NOT EXISTS `conselho_gestor` (
  `ID_MEMBRO` int(4) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(50) NOT NULL,
  `FK_ID_FUNCAO` int(11) NOT NULL,
  PRIMARY KEY (`ID_MEMBRO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcoes`
--

CREATE TABLE IF NOT EXISTS `funcoes` (
  `ID_FUNCAO` int(11) NOT NULL AUTO_INCREMENT,
  `FUNCAO` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID_FUNCAO`),
  KEY `ID_FUNCAO` (`ID_FUNCAO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `funcoes`
--

INSERT INTO `funcoes` (`ID_FUNCAO`, `FUNCAO`) VALUES
(1, 'ADMIN'),
(2, 'NORMAL');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcoes_conselho`
--

CREATE TABLE IF NOT EXISTS `funcoes_conselho` (
  `ID_FUNCOES_CONSELHO` int(4) NOT NULL AUTO_INCREMENT,
  `NOME_FUNCAO` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_FUNCOES_CONSELHO`),
  KEY `ID_FUNCOES_CONSELHO` (`ID_FUNCOES_CONSELHO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `funcoes_conselho`
--

INSERT INTO `funcoes_conselho` (`ID_FUNCOES_CONSELHO`, `NOME_FUNCAO`) VALUES
(1, 'Presidente'),
(2, 'Suplente do Presidente'),
(3, 'Secretário'),
(4, 'Suplente do Secretário');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`ID_USUARIO`, `NOME`, `SENHA`, `FK_ID_FUNCAO`) VALUES
(1, 'gnome', 'batata123', 1),
(2, 'luiz', 'fritsch', 2);

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`FK_ID_FUNCAO`) REFERENCES `funcoes` (`ID_FUNCAO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
