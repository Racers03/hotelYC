-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2020 at 12:05 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `Alamat` varchar(20) NOT NULL,
  `Negeri` varchar(20) NOT NULL,
  `Poskod` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `bilik` (
  `IdBilik` varchar(4) NOT NULL,
  `NamaBilik` varchar(30) NOT NULL,
  `HargaBilik` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bilik`
--

INSERT INTO `bilik` (`IdBilik`, `NamaBilik`, `HargaBilik`) VALUES
('B100', 'Single Bedroom', 50),
('B101', 'Double Bedroom', 100),
('B102', 'Triple Bedroom', 150),
('B103', 'Quadruple Bedroom', 200),
('B104', 'Double Bedroom', 100);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `IdPelanggan` varchar(4) NOT NULL,
  `NamaPelanggan` varchar(50) NOT NULL,
  `NoTelefon` varchar(20) NOT NULL,
  `Jantina` varchar(1) NOT NULL,
  `Alamat` varchar(20) NOT NULL,
  `IdPengguna` varchar(10) NOT NULL,
  `IcPelanggan` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`IdPelanggan`, `NamaPelanggan`, `NoTelefon`, `Jantina`, `Alamat`, `IdPengguna`, `IcPelanggan`) VALUES
('0001', 'Chew Chao Ting', '011-69696969', 'L', '29, Jalan Hikmat', 'P0001', ''),
('0002', 'Goh Yong Chen', '012-45678910', 'L', '67, Jalan Setia', 'P0002', ''),
('0003', 'Jin Jia Eng', '016-49821989', 'P', '48, Jalan Batu', 'P0003', ''),
('0004', 'Cheah Zi Xu', '017-12234456', 'L', '69, Jalan Tunku', 'P0004', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `IdPengguna` varchar(5) NOT NULL,
  `NamaPengguna` varchar(30) NOT NULL,
  `KataLaluan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tempahan` (
  `IdTempah` varchar(6) NOT NULL,
  `IdPelanggan` varchar(11) NOT NULL,
  `IdBilik` varchar(4) NOT NULL,
  `tarikh_masuk` datetime(6) NOT NULL,
  `tarikh_keluar` datetime(6) NOT NULL,
  `bayaran` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempahan`
--

INSERT INTO `tempahan` (`IdTempah`, `IdPelanggan`, `IdBilik`, `tarikh_masuk`, `tarikh_keluar`, `bayaran`) VALUES
('100001', '0001', 'B100', '2019-07-29 00:00:00.000000', '2019-08-05 00:00:00.000000', 400),
('100002', '0002', 'B101', '2019-07-30 00:00:00.000000', '2019-08-07 00:00:00.000000', 420),
('100003', '0003', 'B102', '2019-07-31 00:00:00.000000', '2019-08-06 00:00:00.000000', 440),
('100004', '0004', 'B103', '2019-08-01 00:00:00.000000', '2019-08-08 00:00:00.000000', 480),
('100005', '0001', 'B104', '2019-08-02 00:00:00.000000', '2019-08-09 00:00:00.000000', 500);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
