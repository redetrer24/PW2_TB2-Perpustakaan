-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2020 at 04:58 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan2`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `Id_Anggota` int(3) NOT NULL,
  `Nim` varchar(11) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Prodi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`Id_Anggota`, `Nim`, `Nama`, `Prodi`) VALUES
(1, '41518010160', 'Hafi Daminudin', 'Informatika'),
(2, '41518010001', 'testing', 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `Kd_Buku` int(3) NOT NULL,
  `Judul` varchar(30) NOT NULL,
  `Jenis_Buku` varchar(20) DEFAULT NULL,
  `Pengarang` varchar(50) NOT NULL,
  `Penerbit` varchar(20) NOT NULL,
  `Tahun_Terbit` char(4) DEFAULT NULL,
  `Cover` varchar(50) NOT NULL,
  `Stok` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`Kd_Buku`, `Judul`, `Jenis_Buku`, `Pengarang`, `Penerbit`, `Tahun_Terbit`, `Cover`, `Stok`) VALUES
(1, 'Pemrograman Web 5', 'Programming', 'ngarang', 'Elex Media', '2000', 'java-development-500x5002.png', '15'),
(2, 'testes', 'testes', 'testes', 'testes', '1992', 'smoke_criminal5.PNG', '10'),
(3, 'MySql', 'buku 2', 'siapa', 'siapa', '2008', 'gusta2.PNG', '8'),
(4, 'Pemrograman', 'Programming', 'asal', 'asal', '2010', 'sticker-CTPS3.jpg', '10');

-- --------------------------------------------------------

--
-- Table structure for table `data_peminjam`
--

CREATE TABLE `data_peminjam` (
  `Kd_Peminjam` int(11) NOT NULL,
  `Id_Anggota` int(3) NOT NULL,
  `Id_Petugas` int(3) DEFAULT NULL,
  `Kd_Buku` int(3) NOT NULL,
  `Tgl_Peminjam` date NOT NULL,
  `Batas_Tgl_Pengembalian` date NOT NULL,
  `Kd_Transaksi_Pengembalian` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_peminjam`
--

INSERT INTO `data_peminjam` (`Kd_Peminjam`, `Id_Anggota`, `Id_Petugas`, `Kd_Buku`, `Tgl_Peminjam`, `Batas_Tgl_Pengembalian`, `Kd_Transaksi_Pengembalian`) VALUES
(1, 1, 1, 1, '2020-05-20', '2020-05-27', 1),
(2, 2, 1, 2, '2020-05-01', '2020-05-02', NULL),
(3, 1, NULL, 2, '2020-06-10', '2020-06-21', NULL),
(4, 2, NULL, 1, '2020-06-18', '2020-06-02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `Kd_Denda` varchar(3) NOT NULL,
  `Kd_Kerusakan` varchar(2) DEFAULT NULL,
  `Total_Denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `denda`
--

INSERT INTO `denda` (`Kd_Denda`, `Kd_Kerusakan`, `Total_Denda`) VALUES
('d1', 'k1', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `kerusakan`
--

CREATE TABLE `kerusakan` (
  `Kd_Kerusakan` varchar(2) NOT NULL,
  `Jenis_Kerusakan` varchar(20) NOT NULL,
  `Tarif_Kerusakan` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kerusakan`
--

INSERT INTO `kerusakan` (`Kd_Kerusakan`, `Jenis_Kerusakan`, `Tarif_Kerusakan`) VALUES
('k1', 'Hilang/Tidak Lengkap', 100000),
('k2', 'Rusak/Cacat', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `Nim` varchar(11) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Fakultas` varchar(30) NOT NULL,
  `Jenis_Kelamin` varchar(10) NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `No_Telp` varchar(15) NOT NULL,
  `Email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`Nim`, `Nama`, `Fakultas`, `Jenis_Kelamin`, `Alamat`, `No_Telp`, `Email`) VALUES
('41518010160', 'Hafi Daminudin Fadilah', 'Ilmu Komputer', 'Laki-Laki', 'Jl Jauh Banget', '123456', 'hafidaminudin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `Id_Petugas` int(3) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Jenis_Kelamin` varchar(10) NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `No_Telp` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`Id_Petugas`, `Nama`, `Jenis_Kelamin`, `Alamat`, `No_Telp`) VALUES
(1, 'Munaroh', 'Perempuan', 'Jl Deket', 555555),
(2, 'tes', 'Laki-laki', 'banyak', 21);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pengembalian`
--

CREATE TABLE `transaksi_pengembalian` (
  `Kd_Transaksi_Pengembalian` int(11) NOT NULL,
  `Kd_Peminjam` int(11) NOT NULL,
  `Tgl_Pengembalian` date NOT NULL,
  `Kd_Denda` varchar(3) DEFAULT NULL,
  `Total_Bayar` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_pengembalian`
--

INSERT INTO `transaksi_pengembalian` (`Kd_Transaksi_Pengembalian`, `Kd_Peminjam`, `Tgl_Pengembalian`, `Kd_Denda`, `Total_Bayar`) VALUES
(1, 1, '2020-05-26', 'd1', 100000),
(2, 2, '2020-05-15', 'd2', 50000),
(3, 3, '2020-06-15', 'd1', 19000),
(4, 4, '2020-06-08', 'd2', 20000),
(5, 5, '2020-06-03', 'd1', 12000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`Id_Anggota`),
  ADD UNIQUE KEY `Nim` (`Nim`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`Kd_Buku`);

--
-- Indexes for table `data_peminjam`
--
ALTER TABLE `data_peminjam`
  ADD PRIMARY KEY (`Kd_Peminjam`),
  ADD UNIQUE KEY `Kd_Transaksi_Pengembalian` (`Kd_Transaksi_Pengembalian`),
  ADD KEY `Id_Anggota` (`Id_Anggota`),
  ADD KEY `Kd_Buku` (`Kd_Buku`) USING BTREE,
  ADD KEY `Id_Petugas` (`Id_Petugas`) USING BTREE;

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`Kd_Denda`),
  ADD UNIQUE KEY `Kd_Kerusakan` (`Kd_Kerusakan`);

--
-- Indexes for table `kerusakan`
--
ALTER TABLE `kerusakan`
  ADD PRIMARY KEY (`Kd_Kerusakan`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`Nim`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`Id_Petugas`);

--
-- Indexes for table `transaksi_pengembalian`
--
ALTER TABLE `transaksi_pengembalian`
  ADD PRIMARY KEY (`Kd_Transaksi_Pengembalian`),
  ADD KEY `Kd_Peminjam` (`Kd_Peminjam`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `Id_Anggota` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `Kd_Buku` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `data_peminjam`
--
ALTER TABLE `data_peminjam`
  MODIFY `Kd_Peminjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `Id_Petugas` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi_pengembalian`
--
ALTER TABLE `transaksi_pengembalian`
  MODIFY `Kd_Transaksi_Pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
