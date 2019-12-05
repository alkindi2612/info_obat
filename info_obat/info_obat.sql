-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2019 at 09:24 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `info_obat`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(15) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`) VALUES
(3, 'alkindi', '123', 'Alkindi Syamsi'),
(4, 'admin', '123', 'Alkindi Syamsi');

-- --------------------------------------------------------

--
-- Table structure for table `apotek`
--

CREATE TABLE IF NOT EXISTS `apotek` (
  `id_apotek` int(15) NOT NULL AUTO_INCREMENT,
  `nama_apotek` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  PRIMARY KEY (`id_apotek`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE IF NOT EXISTS `obat` (
  `id_obat` int(15) NOT NULL AUTO_INCREMENT,
  `nama_obat` varchar(100) NOT NULL,
  `klasifikasi_obat` varchar(100) NOT NULL,
  `kegunaan_obat` varchar(100) NOT NULL,
  `gambar` varchar(70) NOT NULL,
  `pemakaian` varchar(100) NOT NULL,
  PRIMARY KEY (`id_obat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `klasifikasi_obat`, `kegunaan_obat`, `gambar`, `pemakaian`) VALUES
(17, 'paracetamol', 'analgesik', 'penurun demam', 'paracetamol.jpeg', '2 kali sehari setelah makan'),
(18, 'alkohol', 'analgesik', 'penghilang rasa sakit sementara', '5de77b6f15fb2.jpg', 'seperlunya'),
(19, 'antibiotik', 'beta laktam', 'mencegah penyakit', '5de77297ee263.jpg', 'bila perlu'),
(20, 'Enervon C', 'multivitamin', 'menjaga daya tahan tubuh', '5de774676096a.jpg', 'bila perlu'),
(22, 'Imboost', 'amphetamine', 'meningkatan sistem kekebalan tubuh', '5de77e672e243.jpg', '1 kali sehari'),
(23, 'ibuprofein', 'analgesik', 'meredakan nyeri dan peradangan', '5de7891135d12.jpg', 'Pada trimester 3 dan menjelang persalinan');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
