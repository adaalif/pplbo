-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2024 at 01:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_kelas_mahasiswa`
--

CREATE TABLE `data_kelas_mahasiswa` (
  `nim` varchar(20) NOT NULL,
  `kode_kelas` varchar(20) NOT NULL,
  `nilai` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_kelas_mahasiswa`
--

INSERT INTO `data_kelas_mahasiswa` (`nim`, `kode_kelas`, `nilai`) VALUES
('1', '2', '');

-- --------------------------------------------------------

--
-- Table structure for table `data_mahasiswa`
--

CREATE TABLE `data_mahasiswa` (
  `nim` varchar(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_mahasiswa`
--

INSERT INTO `data_mahasiswa` (`nim`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`) VALUES
('1', 'alif', '', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nama`) VALUES
(1, 'alif'),
(2, 'fatan'),
(3, 'Haikal'),
(4, 'farid'),
(5, 'Budi Santoso'),
(6, 'Dewi Susanti'),
(7, 'Iwan Setiawan'),
(8, 'Lia Cahyani'),
(9, 'Hadi Prasetyo'),
(10, 'Anita Wijaya'),
(11, 'Siti Rahayu'),
(12, 'Ferry Hidayat'),
(13, 'Rina Wulandari'),
(14, 'Ahmad Syahputra');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kode_kelas` varchar(4) NOT NULL,
  `mata_kuliah` varchar(20) NOT NULL,
  `dosen` varchar(20) NOT NULL,
  `waktu` varchar(7) NOT NULL,
  `ruangan` varchar(6) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `nip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `mata_kuliah`, `dosen`, `waktu`, `ruangan`, `tipe`, `nip`) VALUES
('1', 'Pemrograman web', 'Farid', '13:00', '1.2', 'web', '3'),
('2', 'PPLBO', 'Haikal', '08:00', '1.3', 'Pemrograman dasar', '4');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `nama` varchar(20) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `kode_kelas` varchar(20) NOT NULL,
  `nilai` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`nama`, `nim`, `kode_kelas`, `nilai`) VALUES
('alif', '1', '1', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `nim`
--

CREATE TABLE `nim` (
  `nim` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nim`
--

INSERT INTO `nim` (`nim`, `nama`) VALUES
('1', 'alif'),
('2', 'farid'),
('3', 'rafli');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `password` varchar(20) NOT NULL,
  `nim` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`password`, `nim`) VALUES
('1', '1'),
('12', '12'),
('2', '2'),
('3', '3');

-- --------------------------------------------------------

--
-- Table structure for table `user_dosen`
--

CREATE TABLE `user_dosen` (
  `nip` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_dosen`
--

INSERT INTO `user_dosen` (`nip`, `password`) VALUES
('1', '1'),
('2', '2'),
('3', '3'),
('4', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD UNIQUE KEY `kode_kelas` (`kode_kelas`);

--
-- Indexes for table `nim`
--
ALTER TABLE `nim`
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `nim` (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `nip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
