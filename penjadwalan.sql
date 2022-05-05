-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2021 at 06:21 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `penjadwalan`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE IF NOT EXISTS `akun` (
  `uname` varchar(10) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `level` set('Admin','Asisten','Programmer','') NOT NULL,
  `npm` varchar(8) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `login_terakhir` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`uname`, `nama`, `level`, `npm`, `pass`, `login_terakhir`) VALUES
('admin', 'admin', 'Admin', '11111111', '21232f297a57a5a743894a0e4a801fc3', '2021-01-24 00:00:00'),
('alfianw', 'Alfian Wahyu', 'Asisten', '20216566', '0130e8d32032931dba162b3a8b4b91cc', '2021-01-24 00:00:00'),
('asist', 'asisten', 'Asisten', '22222222', 'a7b0c33ee7a5a7f25cf0d96947f9ac62', '2021-01-16 00:00:00'),
('bungar', 'Bunga Rosa M', 'Asisten', '26217623', 'fc3a68fb6beeae78be337e5ac95c4b4c', '2021-03-03 00:00:00'),
('choirula', 'Choirul Andi F', 'Asisten', '21217344', '9252a78db2fc657df2a3d3a30f98b80d', '2021-03-03 00:00:00'),
('diaza', 'Diaz Ayu F', 'Asisten', '26217845', '59a4c5607cf2054f5cec1d4411b629f8', '2021-03-03 00:00:00'),
('dinaf', 'Dina Fitri', 'Asisten', '22216074', 'c50a38933cdcd7a03aa7f0acc7fc2394', '2021-02-21 00:00:00'),
('dindag', 'Dinda Ghassani', 'Asisten', '21217746', 'ebaf0a0f90a1664fa92086968208e4b5', '2021-03-03 00:00:00'),
('hanim', 'Hani Mardiati', 'Admin', '23216186', '22955b84f285d694c09154d1ad8e747a', '2021-09-16 11:19:59'),
('hannyh', 'Hanny Hermilia', 'Asisten', '22217662', '79a7e1106e2510cf797a752160fc5d6c', '2021-03-03 00:00:00'),
('karinar', 'Karina Rusma', 'Admin', '23216822', 'e1438f5631ecec9a3f819d1b6c90c931', '2021-03-06 18:35:05'),
('mayao', 'Maya Oktavia', 'Asisten', '23217510', '21e8a507562babee2ffa3dd045294994', '2021-03-03 00:00:00'),
('milham', 'M Ilham S', 'Programmer', '54417077', '10dcf76933ce6f38f97914db89b5c98d', '2021-06-08 00:24:46'),
('mrizki', 'M Rizki Tj', 'Asisten', '24217233', 'b4ad7ba560966f3ec657edf78f6fed2f', '2021-03-03 00:00:00'),
('msaad', 'M Sa''ad A', 'Asisten', '23217399', '340edc97b72e310115eb8768039573e0', '2021-03-03 00:00:00'),
('progr', 'programmer', 'Programmer', '33333333', '8a47a61e26cf0145fe3f5a226ca9573b', '2020-08-04 00:00:00'),
('rahayua', 'Rahayu Agriani', 'Asisten', '24217885', 'eacf14b5ee8761b458aad913eff12572', '2021-03-03 00:00:00'),
('sondangd', 'Sondang Desriana', 'Asisten', '25217748', '2a12cd40856238d9804616a03c4e1489', '2021-03-03 00:00:00'),
('yunid', 'Yuni Dwiastuti', 'Programmer', '57416860', '729e41bec581be2924f6cf7cc801505c', '2021-01-19 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kuliah`
--

CREATE TABLE IF NOT EXISTS `jadwal_kuliah` (
  `npm` varchar(8) NOT NULL,
  `senin_s1` tinyint(1) DEFAULT NULL,
  `senin_s2` tinyint(1) DEFAULT NULL,
  `senin_s3` tinyint(1) DEFAULT NULL,
  `senin_s4` tinyint(1) DEFAULT NULL,
  `selasa_s1` tinyint(1) DEFAULT NULL,
  `selasa_s2` tinyint(1) DEFAULT NULL,
  `selasa_s3` tinyint(1) DEFAULT NULL,
  `selasa_s4` tinyint(1) DEFAULT NULL,
  `rabu_s1` tinyint(1) DEFAULT NULL,
  `rabu_s2` tinyint(1) DEFAULT NULL,
  `rabu_s3` tinyint(1) DEFAULT NULL,
  `rabu_s4` tinyint(1) DEFAULT NULL,
  `kamis_s1` tinyint(1) DEFAULT NULL,
  `kamis_s2` tinyint(1) DEFAULT NULL,
  `kamis_s3` tinyint(1) DEFAULT NULL,
  `kamis_s4` tinyint(1) DEFAULT NULL,
  `jumat_s1` tinyint(1) DEFAULT NULL,
  `jumat_s2` tinyint(1) DEFAULT NULL,
  `jumat_s3` tinyint(1) DEFAULT NULL,
  `jumat_s4` tinyint(1) DEFAULT NULL,
  `waktu_input` datetime DEFAULT NULL,
  `waktu_edit` datetime DEFAULT NULL,
  `validasi` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_kuliah`
--

INSERT INTO `jadwal_kuliah` (`npm`, `senin_s1`, `senin_s2`, `senin_s3`, `senin_s4`, `selasa_s1`, `selasa_s2`, `selasa_s3`, `selasa_s4`, `rabu_s1`, `rabu_s2`, `rabu_s3`, `rabu_s4`, `kamis_s1`, `kamis_s2`, `kamis_s3`, `kamis_s4`, `jumat_s1`, `jumat_s2`, `jumat_s3`, `jumat_s4`, `waktu_input`, `waktu_edit`, `validasi`) VALUES
('20216566', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, 1, 1, NULL, NULL, NULL, 1, 1, 1, 1, '2021-01-19 23:33:33', NULL, 0),
('21217344', NULL, NULL, 1, NULL, 1, NULL, 1, NULL, NULL, 1, 1, NULL, 1, 1, NULL, NULL, NULL, NULL, 1, 1, '2021-03-03 18:32:02', NULL, 0),
('21217746', NULL, 1, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, NULL, 1, NULL, NULL, NULL, '2021-03-03 18:33:09', NULL, 0),
('22216074', 1, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, NULL, '2021-01-19 23:34:12', NULL, 0),
('22217662', 1, NULL, NULL, 1, NULL, 1, NULL, NULL, 1, NULL, NULL, 1, NULL, 1, NULL, NULL, 1, NULL, NULL, 1, '2021-03-03 18:33:37', NULL, 0),
('23216186', 1, 1, 1, 1, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-01-18 16:32:20', NULL, 0),
('23216822', NULL, 1, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 1, 1, 1, 1, NULL, NULL, 1, 1, NULL, '2021-01-24 18:16:14', NULL, 0),
('23217399', 1, NULL, NULL, 1, NULL, 1, NULL, 1, 1, NULL, NULL, 1, NULL, 1, NULL, 1, 1, NULL, NULL, 1, '2021-03-03 18:37:15', NULL, 0),
('23217510', NULL, 1, NULL, 1, NULL, 1, NULL, 1, NULL, 1, NULL, 1, NULL, 1, NULL, 1, NULL, 1, NULL, 1, '2021-03-03 18:34:19', NULL, 0),
('24217233', 1, NULL, 1, NULL, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, NULL, 1, NULL, '2021-03-03 18:36:22', NULL, 0),
('24217885', NULL, NULL, NULL, 1, 1, NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, NULL, 1, NULL, NULL, '2021-03-03 18:37:56', NULL, 0),
('25217748', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, 1, '2021-03-03 18:38:28', NULL, 0),
('26217623', NULL, NULL, NULL, 1, NULL, 1, 1, NULL, 1, 1, NULL, 1, NULL, NULL, 1, NULL, 1, NULL, 1, 1, '2021-03-03 18:31:00', NULL, 0),
('26217845', 1, NULL, 1, NULL, NULL, 1, NULL, 1, NULL, NULL, 1, NULL, NULL, 1, NULL, 1, 1, NULL, 1, NULL, '2021-03-03 18:32:37', NULL, 0),
('57416860', 1, NULL, 1, NULL, 1, 1, 1, 1, NULL, NULL, 1, NULL, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, '2021-01-19 23:32:51', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_praktik`
--

CREATE TABLE IF NOT EXISTS `jadwal_praktik` (
  `validasi` tinyint(1) NOT NULL DEFAULT '0',
  `senin_s1` tinyint(1) DEFAULT NULL,
  `senin_s2` tinyint(1) DEFAULT NULL,
  `senin_s3` tinyint(1) DEFAULT NULL,
  `senin_s4` tinyint(1) DEFAULT NULL,
  `selasa_s1` tinyint(1) DEFAULT NULL,
  `selasa_s2` tinyint(1) DEFAULT NULL,
  `selasa_s3` tinyint(1) DEFAULT NULL,
  `selasa_s4` tinyint(1) DEFAULT NULL,
  `rabu_s1` tinyint(1) DEFAULT NULL,
  `rabu_s2` tinyint(1) DEFAULT NULL,
  `rabu_s3` tinyint(1) DEFAULT NULL,
  `rabu_s4` tinyint(1) DEFAULT NULL,
  `kamis_s1` tinyint(1) DEFAULT NULL,
  `kamis_s2` tinyint(1) DEFAULT NULL,
  `kamis_s3` tinyint(1) DEFAULT NULL,
  `kamis_s4` tinyint(1) DEFAULT NULL,
  `jumat_s1` tinyint(1) DEFAULT NULL,
  `jumat_s2` tinyint(1) DEFAULT NULL,
  `jumat_s3` tinyint(1) DEFAULT NULL,
  `jumat_s4` tinyint(1) DEFAULT NULL,
  `waktu_input` datetime DEFAULT NULL,
  `waktu_edit` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_praktik`
--

INSERT INTO `jadwal_praktik` (`validasi`, `senin_s1`, `senin_s2`, `senin_s3`, `senin_s4`, `selasa_s1`, `selasa_s2`, `selasa_s3`, `selasa_s4`, `rabu_s1`, `rabu_s2`, `rabu_s3`, `rabu_s4`, `kamis_s1`, `kamis_s2`, `kamis_s3`, `kamis_s4`, `jumat_s1`, `jumat_s2`, `jumat_s3`, `jumat_s4`, `waktu_input`, `waktu_edit`) VALUES
(1, 1, 1, 1, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, 1, 1, 1, 1, NULL, 1, 1, NULL, '2021-03-04 11:56:37', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`uname`);

--
-- Indexes for table `jadwal_kuliah`
--
ALTER TABLE `jadwal_kuliah`
  ADD PRIMARY KEY (`npm`);

--
-- Indexes for table `jadwal_praktik`
--
ALTER TABLE `jadwal_praktik`
  ADD PRIMARY KEY (`validasi`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
