-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 21-Fev-2020 às 10:56
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
-- Estrutura da tabela `publicacoes`
--

CREATE TABLE `publicacoes` (
  `ID_PUBLICACAO` int(11) NOT NULL,
  `NOME` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `URL` varchar(437) COLLATE utf8_unicode_ci NOT NULL,
  `DESCRICAO` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `publicacoes`
--

INSERT INTO `publicacoes` (`ID_PUBLICACAO`, `NOME`, `URL`, `DESCRICAO`) VALUES
(63, 'contrato social.pdf', 'https://guilherme.cerestoeste.com.br/publicacoes/Controta social.pdf', 'contrato social do jean jaqueline russo'),
(62, 'ISSO AQUI EH UM TITULO MANEIRASSO E EXCLUSIVO 1005 ATUALIZADO,  RUIM DE ATURAR.pdf', 'https://guilherme.cerestoeste.com.br/publicacoes/ISSO AQUI EH UM TITULO MANEIRASSO E EXCLUSIVO 1005 ATUALIZADO,  RUIM DE ATURAR.pdf', 'bomba patch virou moda todo mundo quer jogar, com a nossa equipe, ninguém bate de frentebomba patch virou moda todo mundo quer jogar, com a nossa equipe, ninguém bate de frentebomba patch virou moda todo mundo quer jogar, com a nossa equipe, ninguém bate de frentebomba patch virou moda todo mundo quer jogar, com a nossa equipe, ninguém bate de frentebomba patch virou moda todo mundo quer jogar, co');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `publicacoes`
--
ALTER TABLE `publicacoes`
  ADD PRIMARY KEY (`ID_PUBLICACAO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `publicacoes`
--
ALTER TABLE `publicacoes`
  MODIFY `ID_PUBLICACAO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
