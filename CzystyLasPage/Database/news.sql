-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19 Paź 2014, 11:27
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
-- Struktura tabeli dla tabeli `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) NOT NULL,
  `Topic` text CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `Content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=20 ;

--
-- Zrzut danych tabeli `news`
--

INSERT INTO `news` (`Id`, `UserId`, `Topic`, `Content`, `Date`) VALUES
(15, 31, 'Lorem ipsum dolor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dignissim tincidunt erat. Pellentesque aliquam neque vel volutpat finibus. Aenean imperdiet dictum odio, lacinia varius sem fermentum ac. Aenean pharetra nulla enim, id vehicula elit tincidunt nec. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed ullamcorper mauris eget metus tempus commodo vel eu nisl. Nullam ut lobortis elit. Nam ut orci scelerisque, malesuada mauris eu, viverra sapien. Sed et felis nec augue ultrices sodales. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', '2014-10-18'),
(16, 31, 'Lorem ipsum dolor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dignissim tincidunt erat. Pellentesque aliquam neque vel volutpat finibus. Aenean imperdiet dictum odio, lacinia varius sem fermentum ac. Aenean pharetra nulla enim, id vehicula elit tincidunt nec. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed ullamcorper mauris eget metus tempus commodo vel eu nisl. Nullam ut lobortis elit. Nam ut orci scelerisque, malesuada mauris eu, viverra sapien. Sed et felis nec augue ultrices sodales. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', '2014-10-18'),
(17, 0, '', '', '2018-10-20'),
(18, 0, '', '', '2018-10-20'),
(19, 0, '', '', '2018-10-20');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
