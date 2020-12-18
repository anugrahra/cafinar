-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2020 at 07:43 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafinar`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(2) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `username`, `password`) VALUES
(1, 'anugrahr', '$2y$10$8QxRDc6IaE2nlYWNhtT1y.A911i67sZa0UrqNZdUCgxDSyMue9IJi');

-- --------------------------------------------------------

--
-- Table structure for table `emas`
--

CREATE TABLE `emas` (
  `id` int(3) NOT NULL,
  `berat` int(3) NOT NULL,
  `tgl_beli` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emas`
--

INSERT INTO `emas` (`id`, `berat`, `tgl_beli`) VALUES
(1, 1, '2020-12-14'),
(3, 10, '2020-12-17'),
(4, 10, '2020-12-17'),
(5, 10, '2020-12-17'),
(6, 1, '2020-12-19'),
(7, 2, '2020-12-19'),
(8, 3, '2020-12-19');

-- --------------------------------------------------------

--
-- Table structure for table `hutang`
--

CREATE TABLE `hutang` (
  `id` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nominal` int(100) NOT NULL,
  `sumber` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nominal` int(100) NOT NULL,
  `sumber` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id`, `tanggal`, `nominal`, `sumber`, `keterangan`) VALUES
(1, '2020-07-02 11:46:25', 3000000, 'gaji', ''),
(6, '2020-12-09 14:35:40', 100000, 'langit', ''),
(7, '2020-12-12 17:00:00', 10000, 'Dida', 'dikasih'),
(8, '2020-12-13 17:00:00', 10000, 'dikasih', ''),
(9, '2020-12-13 17:00:00', 10000, 'dikasih', ''),
(10, '2020-12-13 17:00:00', 50000, 'bonus', ''),
(11, '2020-12-15 17:00:00', 70000, 'galing bayar hutang', ''),
(12, '2020-12-18 17:00:00', 10000000, 'jual emas 10 gram', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nominal` int(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `tanggal`, `nominal`, `tujuan`, `keterangan`) VALUES
(1, '2020-07-02 11:46:01', 200000, 'beli buku', ''),
(2, '2020-12-12 17:00:00', 5000, 'beli bensin', ''),
(3, '2020-12-13 17:00:00', 1, 'beli rokok', ''),
(4, '2020-12-15 17:00:00', 1000000, 'bayar hutang ke dani', ''),
(5, '2020-12-15 17:00:00', 2, 'bayar hutang ke abah', ''),
(6, '2020-12-15 17:00:00', 4, 'bayar hutang ke pak danu', ''),
(7, '2020-12-15 17:00:00', 6, 'bayar hutang ke babi', ''),
(8, '2020-12-15 17:00:00', 14, 'jajan', ''),
(9, '2020-12-18 17:00:00', 1000000, 'beli emas', ''),
(10, '2020-12-18 17:00:00', 2000000, 'beli emas', ''),
(11, '2020-12-18 17:00:00', 3000000, 'beli emas', '');

-- --------------------------------------------------------

--
-- Table structure for table `piutang`
--

CREATE TABLE `piutang` (
  `id` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nominal` int(100) NOT NULL,
  `kepada` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `piutang`
--

INSERT INTO `piutang` (`id`, `tanggal`, `nominal`, `kepada`, `keterangan`) VALUES
(1, '2020-06-29 15:54:21', 1000000, 'Pa Ahmad', ''),
(2, '2020-06-29 15:54:21', 15000, 'Dendy', '');

-- --------------------------------------------------------

--
-- Table structure for table `saldo`
--

CREATE TABLE `saldo` (
  `id` int(11) NOT NULL,
  `saldo` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saldo`
--

INSERT INTO `saldo` (`id`, `saldo`, `tanggal`) VALUES
(1, -3242312, '2020-12-18 17:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emas`
--
ALTER TABLE `emas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hutang`
--
ALTER TABLE `hutang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `piutang`
--
ALTER TABLE `piutang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emas`
--
ALTER TABLE `emas`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hutang`
--
ALTER TABLE `hutang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `piutang`
--
ALTER TABLE `piutang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `saldo`
--
ALTER TABLE `saldo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
