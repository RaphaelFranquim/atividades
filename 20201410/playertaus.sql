-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 23-Out-2020 às 23:45
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `playertaus`
--
CREATE DATABASE IF NOT EXISTS `playertaus` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `playertaus`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `banda`
--

CREATE TABLE IF NOT EXISTS `banda` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(255) DEFAULT NULL,
  `ID_GENERO` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_GENERO_BANDA` (`ID_GENERO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

CREATE TABLE IF NOT EXISTS `genero` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `musica`
--

CREATE TABLE IF NOT EXISTS `musica` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(255) DEFAULT NULL,
  `ID_BANDA` int(11) DEFAULT NULL,
  `DESCRICAO` text,
  PRIMARY KEY (`ID`),
  KEY `FK_BANDA_MUSICA` (`ID_BANDA`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `playlist`
--

CREATE TABLE IF NOT EXISTS `playlist` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `playlist_musica`
--

CREATE TABLE IF NOT EXISTS `playlist_musica` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_MUSICA` int(11) DEFAULT NULL,
  `ID_PLAYLIST` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_MUSICA_PLAYLISTMUSICA` (`ID_MUSICA`),
  KEY `FK_PLAYLIST_PLAYLISTMUSICA` (`ID_PLAYLIST`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `banda`
--
ALTER TABLE `banda`
  ADD CONSTRAINT `FK_GENERO_BANDA` FOREIGN KEY (`ID_GENERO`) REFERENCES `genero` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `musica`
--
ALTER TABLE `musica`
  ADD CONSTRAINT `FK_BANDA_MUSICA` FOREIGN KEY (`ID_BANDA`) REFERENCES `banda` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `playlist_musica`
--
ALTER TABLE `playlist_musica`
  ADD CONSTRAINT `FK_MUSICA_PLAYLISTMUSICA` FOREIGN KEY (`ID_MUSICA`) REFERENCES `musica` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PLAYLIST_PLAYLISTMUSICA` FOREIGN KEY (`ID_PLAYLIST`) REFERENCES `playlist` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
