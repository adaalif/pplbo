-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 02:22 AM
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
('1', '1', ''),
('2', '1', ''),
('1', '2', '');

-- --------------------------------------------------------

--
-- Table structure for table `data_mahasiswa`
--

CREATE TABLE `data_mahasiswa` (
  `nim` varchar(11) NOT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_mahasiswa`
--

INSERT INTO `data_mahasiswa` (`nim`, `tempat_lahir`, `tanggal_lahir`, `alamat`) VALUES
('1', '', '2024-05-10', 'jdjdjddj');

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
(4, 'Farid'),
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
  `waktu` varchar(7) NOT NULL,
  `ruangan` varchar(6) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `nip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `mata_kuliah`, `waktu`, `ruangan`, `tipe`, `nip`) VALUES
('1', 'Pemrograman web', '13:00', '1.2', 'web', 3),
('2', 'PPLBO', '08:00', '1.3', 'Pemrograman dasar', 4);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `nama` varchar(20) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `kode_kelas` varchar(20) NOT NULL,
  `nilai` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`nama`, `nim`, `kode_kelas`, `nilai`) VALUES
('alif', '1', '1', 'A'),
('farid', '2', '1', 'E'),
('alif', '1', '2', NULL);

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
('3', 'rafli'),
('4', 'anissa'),
('5', 'rama'),
('6', '6'),
('7', '7');

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
('2', '2'),
('3', '3'),
('4', '4'),
('5', '5'),
('7', '7');

-- --------------------------------------------------------

--
-- Table structure for table `user_dosen`
--

CREATE TABLE `user_dosen` (
  `nip` int(11) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_dosen`
--

INSERT INTO `user_dosen` (`nip`, `password`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7'),
(8, '8'),
(9, '9'),
(10, '10'),
(11, '11'),
(12, '12'),
(13, '13'),
(14, '14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_kelas_mahasiswa`
--
ALTER TABLE `data_kelas_mahasiswa`
  ADD KEY `nim` (`nim`),
  ADD KEY `kode_kelas` (`kode_kelas`);

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
  ADD UNIQUE KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD KEY `nim` (`nim`),
  ADD KEY `kode_kelas` (`kode_kelas`);

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
-- Indexes for table `user_dosen`
--
ALTER TABLE `user_dosen`
  ADD KEY `nip` (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `nip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_kelas_mahasiswa`
--
ALTER TABLE `data_kelas_mahasiswa`
  ADD CONSTRAINT `data_kelas_mahasiswa_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `nim` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_kelas_mahasiswa_ibfk_2` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  ADD CONSTRAINT `data_mahasiswa_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `nim` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `nim` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`kode_kelas`) REFERENCES `data_kelas_mahasiswa` (`kode_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `nim` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_dosen`
--
ALTER TABLE `user_dosen`
  ADD CONSTRAINT `user_dosen_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
