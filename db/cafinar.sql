-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2021 at 04:48 PM
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
  `berat` float NOT NULL,
  `tgl_beli` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emas`
--

INSERT INTO `emas` (`id`, `berat`, `tgl_beli`) VALUES
(1, 5, '2020-12-14'),
(3, 1, '2020-12-17'),
(4, 1, '2020-12-17'),
(5, 0.5, '2020-12-17');

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
(1, '2021-01-10 17:00:00', 20000, 'BLUD Air Minum Kota Cimahi', 'buat ngegantiin aksesoris perbaikan bak mixer kaporit'),
(2, '2021-01-14 17:00:00', 250000, 'PT. Tirta Anugrah Utama', 'Presentasi Jar Test IPA Universitas Pendidikan Indonesia');

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
(12, '2021-01-07 17:00:00', 20000, 'beli bensin pertamax', ''),
(14, '2021-01-07 17:00:00', 29000, 'beli pupuk cair Aqua Segar: Lebat dan Cerah', ''),
(15, '2021-01-07 17:00:00', 100000, 'untuk ummi', ''),
(16, '2021-01-09 17:00:00', 42000, 'jajan sampoerna kretek 2 bungkus, garpit 1/2 bungkus, creamy latte 2 saset', 'garpit untuk pak danu'),
(17, '2021-01-09 17:00:00', 20000, 'beli socket toren dan socket drat luar', 'untuk benerin bak mixer kaporit'),
(18, '2021-01-09 17:00:00', 15000, 'beli ikan mas kecil', 'untuk pakan arwana'),
(19, '2021-01-09 17:00:00', 20000, 'beli sampoerna kretek sebungkus dan creamy latte 2', ''),
(20, '2021-01-10 17:00:00', 38500, 'beli sampoerna kretek 2 bungkus, creamy latte 2, kapal api 2', 'kapal api untuk pak danu'),
(21, '2021-01-10 17:00:00', 10000, 'beli batagor', ''),
(22, '2021-01-11 17:00:00', 28000, 'beli sampoerna kretek 2 bungkus, garpit 1/2', 'garpit untuk pak danu'),
(23, '2021-01-11 17:00:00', 15000, 'beli baso tahu 3 bungkus @ 5000', 'bagi-bagi sama galing dan pak danu'),
(24, '2021-01-12 17:00:00', 82000, 'beli seperangkat CO2 + ongkos kirim', 'untuk aquascape'),
(25, '2021-01-13 17:00:00', 34500, 'beli sampoerna kretek 2 bungkus, creamy latte 2, kapal api 2', ''),
(26, '2021-01-14 17:00:00', 20000, 'beli bensin pertamax', ''),
(27, '2021-01-14 17:00:00', 38000, 'beli sampoerna kretek 2 bungkus, good day, basreng', ''),
(28, '2021-01-14 17:00:00', 22000, 'beli guppy 2, corydoras 2, parkir', ''),
(29, '2021-01-15 17:00:00', 38000, 'beli sampoerna kretek 2 bungkus, creamy latte 4', ''),
(30, '2021-01-15 17:00:00', 5000, 'beli baso ikan', ''),
(31, '2021-01-16 17:00:00', 42000, 'beli sampoerna kretek 2 bungkus, creamy latte 4, indomie goreng 2', ''),
(32, '2021-01-17 17:00:00', 30000, 'beli sampoerna kretek 2 bungkus', 'kembaliannya ilang, 2000 rupiah'),
(33, '2021-01-18 17:00:00', 22000, 'bayar hutang ke Viska', ''),
(34, '2021-01-18 17:00:00', 151000, 'isi saldo link aja untuk bayar kartu halo', ''),
(35, '2021-01-19 17:00:00', 30000, 'beli sampoerna kretek 2 bungkus, creamy latte 1', ''),
(36, '2021-01-19 17:00:00', 5000, 'beli filter mat', 'untuk aquascape'),
(37, '2021-01-19 17:00:00', 21000, 'beli aqua galon', ''),
(38, '2021-01-19 17:00:00', 38000, 'beli sampoerna kretek 2 bungkus, creamy latte 2, ultra coklat 1', '');

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
(3, '2021-01-07 21:26:22', 125000, 'Danny', '');

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
(1, 1386000, '2021-01-19 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tabungan`
--

CREATE TABLE `tabungan` (
  `id` int(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nabung` int(11) NOT NULL,
  `narik` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `tabungan`
--
ALTER TABLE `tabungan`
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
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hutang`
--
ALTER TABLE `hutang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `piutang`
--
ALTER TABLE `piutang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `saldo`
--
ALTER TABLE `saldo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tabungan`
--
ALTER TABLE `tabungan`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
