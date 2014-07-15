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
-- Banco de Dados: `bdtask`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `step`
--

CREATE TABLE IF NOT EXISTS `step` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `stepname` varchar(70) NOT NULL,
  `desc` text NOT NULL,
  `codtask` int(11) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `step`
--

INSERT INTO `step` (`cod`, `stepname`, `desc`, `codtask`) VALUES
(1, 'Criar Projeto no Netbeans', 'Criar projeto no netbeans para iniciar o desenvolvimento do taskboard. ', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `taskname` varchar(70) NOT NULL,
  `desc` varchar(250) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `task`
--

INSERT INTO `task` (`cod`, `taskname`, `desc`) VALUES
(1, 'Criar o taskboard', 'Criar o organizador de tarefas mais legal do mundo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
