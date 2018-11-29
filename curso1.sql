-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 29-Nov-2018 às 16:28
-- Versão do servidor: 5.7.23
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `curso1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_alunos`
--

DROP TABLE IF EXISTS `tb_alunos`;
CREATE TABLE IF NOT EXISTS `tb_alunos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `modalidade` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `modalidade` (`modalidade`),
  KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_alunos`
--

INSERT INTO `tb_alunos` (`id`, `nome`, `tel`, `email`, `modalidade`) VALUES
(1, 'Maria Julia', '11 91010-1010', 'maria@hotmail.com', 3),
(2, 'Marcos Eduardo', '11 91111-1111', 'marcos@hotmail.com', 2),
(3, 'Paulo da Silva', '11 91212-1212', 'paulo@hotmail.com', 2),
(4, 'Fabio Costa', '11 91313-1313', 'fabio@hotmail.com', 2),
(5, 'Ricardo Santos', '11 91414-1414', 'ricardo@hotmail.com', 2),
(6, 'Fernanda Maria', '11 91515-1515', 'fernada@hotmail.com', 3),
(14, 'Maria silva ', '1191616-1616', 'maria@hotmail.com', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_modalidades`
--

DROP TABLE IF EXISTS `tb_modalidades`;
CREATE TABLE IF NOT EXISTS `tb_modalidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modalidade` varchar(255) NOT NULL,
  `mensalidade` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `modalidade` (`modalidade`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_modalidades`
--

INSERT INTO `tb_modalidades` (`id`, `modalidade`, `mensalidade`) VALUES
(1, 'Zumba', '80.00'),
(2, 'Musculação', '100.00'),
(3, 'Aeróbica', '79.90'),
(4, 'MMA', '120.00'),
(5, 'Muay-thai', '99.90'),
(34, 'Karatê', '80.10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
