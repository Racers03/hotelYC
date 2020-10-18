-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2020 at 05:43 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel gyc`
--
CREATE DATABASE IF NOT EXISTS `hotel` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hotel`;

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--
-- Creation: Jan 15, 2020 at 04:12 AM
--

DROP TABLE IF EXISTS `alamat`;
CREATE TABLE `alamat` (
  `Alamat` varchar(20) NOT NULL,
  `Negeri` varchar(20) NOT NULL,
  `Poskod` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `alamat`:
--

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`Alamat`, `Negeri`, `Poskod`) VALUES
('29, Jalan Hikmat', 'Pulau Pinang', '11600'),
('48, Jalan Batu', 'Perak', '11500'),
('67, Jalan Setia', 'Pahang', '11300'),
('69, Jalan Tunku', 'Perlis ', '11700');

-- --------------------------------------------------------

--
-- Table structure for table `bilik`
--
-- Creation: Jan 15, 2020 at 04:08 AM
--

DROP TABLE IF EXISTS `bilik`;
CREATE TABLE `bilik` (
  `IdBilik` varchar(4) NOT NULL,
  `NamaBilik` varchar(30) NOT NULL,
  `HargaBilik` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `bilik`:
--

--
-- Dumping data for table `bilik`
--

INSERT INTO `bilik` (`IdBilik`, `NamaBilik`, `HargaBilik`) VALUES
('B100', 'Single Bedroom', 'RM 50'),
('B101', 'Double Bedroom', 'RM 100'),
('B102', 'Triple Bedroom', 'RM 150'),
('B103', 'Quadruple Bedroom', 'RM 200'),
('B104', 'Double Bedroom', 'RM 100');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--
-- Creation: Jan 15, 2020 at 04:33 AM
--

DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE `pelanggan` (
  `IdPelanggan` varchar(4) NOT NULL,
  `NamaPelanggan` varchar(50) NOT NULL,
  `NoTelefon` varchar(20) NOT NULL,
  `Jantina` varchar(1) NOT NULL,
  `Alamat` varchar(20) NOT NULL,
  `IdPengguna` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `pelanggan`:
--   `Alamat`
--       `alamat` -> `Alamat`
--   `IdPengguna`
--       `pengguna` -> `IdPengguna`
--

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`IdPelanggan`, `NamaPelanggan`, `NoTelefon`, `Jantina`, `Alamat`, `IdPengguna`) VALUES
('0001', 'Chew Chao Ting', '011-69696969', 'L', '29, Jalan Hikmat', 'P0001'),
('0002', 'Goh Yong Chen', '012-45678910', 'L', '67, Jalan Setia', 'P0002'),
('0003', 'Jin Jia Eng', '016-49821989', 'P', '48, Jalan Batu', 'P0003'),
('0004', 'Cheah Zi Xu', '017-12234456', 'L', '69, Jalan Tunku', 'P0004');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--
-- Creation: Jan 15, 2020 at 04:14 AM
--

DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE `pengguna` (
  `IdPengguna` varchar(5) NOT NULL,
  `NamaPengguna` varchar(30) NOT NULL,
  `KataLaluan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `pengguna`:
--

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`IdPengguna`, `NamaPengguna`, `KataLaluan`) VALUES
('P0001', 'Chew CT', 'cct2019'),
('P0002', 'YC Goh', 'gych12'),
('P0003', 'Eng JJ', 'jjeng69'),
('P0004', 'ZX Cheah', 'czx1357');

-- --------------------------------------------------------

--
-- Table structure for table `tempahan`
--
-- Creation: Jan 15, 2020 at 03:54 AM
--

DROP TABLE IF EXISTS `tempahan`;
CREATE TABLE `tempahan` (
  `IdTempah` varchar(6) NOT NULL,
  `IdPelanggan` varchar(11) NOT NULL,
  `IdBilik` varchar(4) NOT NULL,
  `tarikh_masuk` datetime(6) NOT NULL,
  `tarikh_keluar` datetime(6) NOT NULL,
  `bayaran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `tempahan`:
--   `IdBilik`
--       `bilik` -> `IdBilik`
--   `IdPelanggan`
--       `pelanggan` -> `IdPelanggan`
--

--
-- Dumping data for table `tempahan`
--

INSERT INTO `tempahan` (`IdTempah`, `IdPelanggan`, `IdBilik`, `tarikh_masuk`, `tarikh_keluar`, `bayaran`) VALUES
('100001', '0001', 'B100', '2019-07-29 00:00:00.000000', '2019-08-05 00:00:00.000000', 'RM 400'),
('100002', '0002', 'B101', '2019-07-30 00:00:00.000000', '2019-08-07 00:00:00.000000', 'RM 420'),
('100003', '0003', 'B102', '2019-07-31 00:00:00.000000', '2019-08-06 00:00:00.000000', 'RM 440'),
('100004', '0004', 'B103', '2019-08-01 00:00:00.000000', '2019-08-08 00:00:00.000000', 'RM 480'),
('100005', '0001', 'B104', '2019-08-02 00:00:00.000000', '2019-08-09 00:00:00.000000', 'RM 500');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`Alamat`);

--
-- Indexes for table `bilik`
--
ALTER TABLE `bilik`
  ADD PRIMARY KEY (`IdBilik`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`IdPelanggan`),
  ADD KEY `Alamat` (`Alamat`),
  ADD KEY `IdPengguna` (`IdPengguna`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`IdPengguna`);

--
-- Indexes for table `tempahan`
--
ALTER TABLE `tempahan`
  ADD PRIMARY KEY (`IdTempah`),
  ADD KEY `IdBilik` (`IdBilik`),
  ADD KEY `IdPelanggan` (`IdPelanggan`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`Alamat`) REFERENCES `alamat` (`Alamat`),
  ADD CONSTRAINT `pelanggan_ibfk_2` FOREIGN KEY (`IdPengguna`) REFERENCES `pengguna` (`IdPengguna`);

--
-- Constraints for table `tempahan`
--
ALTER TABLE `tempahan`
  ADD CONSTRAINT `tempahan_ibfk_1` FOREIGN KEY (`IdBilik`) REFERENCES `bilik` (`IdBilik`),
  ADD CONSTRAINT `tempahan_ibfk_2` FOREIGN KEY (`IdPelanggan`) REFERENCES `pelanggan` (`IdPelanggan`);


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for table alamat
--

--
-- Metadata for table bilik
--

--
-- Metadata for table pelanggan
--

--
-- Metadata for table pengguna
--

--
-- Metadata for table tempahan
--

--
-- Metadata for database hotel
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
