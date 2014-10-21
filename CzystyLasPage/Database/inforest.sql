-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21 Paź 2014, 22:59
-- Server version: 5.6.17-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `czysty-las-database`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `inforest`
--

CREATE TABLE IF NOT EXISTS `inforest` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Photo` int(11) DEFAULT NULL,
  `Title` text COLLATE utf8_polish_ci NOT NULL,
  `Description` text COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=18 ;

--
-- Zrzut danych tabeli `inforest`
--

INSERT INTO `inforest` (`Id`, `Photo`, `Title`, `Description`) VALUES
(13, 6, 'Ciekawy las', '<p>Bardzo, bardzo Ciekawy las</p>\r\n'),
(17, 10, 'Jesienna bryza', '<p>BArdzo przyjemny las! Polecam!&nbsp;</p>\r\n');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
