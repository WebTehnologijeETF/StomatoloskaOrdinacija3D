-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2015 at 05:57 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `novosti`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `novost` int(11) NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `autor` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `vrijeme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(27) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `novost` (`novost`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `novost`, `tekst`, `autor`, `vrijeme`, `email`) VALUES
(1, 1, 'Prvi komentar', 'autor', '2015-05-28 14:32:19', ''),
(2, 1, 'Drugi komentar neki', 'Elvin Omerspahić', '2015-08-26 23:18:59', ''),
(4, 1, 'fdsfs ććšč', 'Meho Kodro', '2015-08-26 23:24:35', ''),
(5, 3, 'komentar neki sa forme', 'Elvin Ibrahimpašić', '0000-00-00 00:00:00', ''),
(6, 1, 'komentar neki sa forme', 'Elvin Ibrahimpašić', '0000-00-00 00:00:00', ''),
(7, 3, 'komentar neki sa forme', 'Elvin Ibrahimpašić', '0000-00-00 00:00:00', ''),
(8, 1, 'komentar neki sa forme', 'Elvin Ibrahimpašić', '0000-00-00 00:00:00', ''),
(9, 3, 'komentar na prvu', 'dfs', '0000-00-00 00:00:00', ''),
(10, 3, 'Novi komentar', 'dfsf', '0000-00-00 00:00:00', ''),
(11, 3, 'Novi komentar', 'dfsf', '0000-00-00 00:00:00', ''),
(12, 3, 'fddf', 'dfd', '0000-00-00 00:00:00', ''),
(13, 3, 'Novi komentar', 'dfsf', '0000-00-00 00:00:00', ''),
(14, 1, 'najnoviji', 'elvin', '0000-00-00 00:00:00', ''),
(15, 1, 'najnoviji', 'elvin', '0000-00-00 00:00:00', ''),
(19, 3, 'vrijeme malo kontrolisemo', 'fd', '2015-08-27 13:36:41', ''),
(20, 3, 'mladje vrijeme', 'df', '2015-08-27 13:37:38', '');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE IF NOT EXISTS `korisnici` (
  `username` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(15) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`username`, `password`) VALUES
('admin', 'admin'),
('user', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `novost`
--

CREATE TABLE IF NOT EXISTS `novost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `autor` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `vrijeme` timestamp NOT NULL,
  `slika` text COLLATE utf8_slovenian_ci NOT NULL,
  `detaljantekst` text COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `novost`
--

INSERT INTO `novost` (`id`, `naslov`, `tekst`, `autor`, `vrijeme`, `slika`, `detaljantekst`) VALUES
(1, 'Novost1', 'Ovo je neki tekst prve novosti', 'Elvin', '2015-05-28 14:31:23', '', ''),
(3, 'Ovo je neka novost iz baze', 'Ovo je neki osnovni tekst novosti iz baze gdje ima č', 'Elvin Valjevčić', '2015-08-26 18:53:53', 'http://ikeda-dentalcl.com/wp-content/uploads/2014/02/image3.jpg', 'Ovo je neki detaljni tekst iz baze');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`novost`) REFERENCES `novost` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
