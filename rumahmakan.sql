-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2023 at 09:06 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumahmakan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pgw` int(11) NOT NULL,
  `noi_pgw` varchar(15) NOT NULL,
  `nama_pgw` varchar(40) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `jabatan_pgw` varchar(80) NOT NULL,
  `alamat_pgw` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pgw`, `noi_pgw`, `nama_pgw`, `jenis_kelamin`, `jabatan_pgw`, `alamat_pgw`) VALUES
(11, '1111', 'Lukman Hakim', 'Laki-laki', 'Direktur', 'Lampung                                                '),
(12, '2121', 'Ardian', 'Laki-laki', 'Cleaning Service', 'Aceh                                    '),
(13, '2222', 'Wawa', 'Perempuan', 'Cleaning Service', 'jambi                                    '),
(18, '2323', 'Johan', 'Laki-laki', 'Keamanan', 'Jakarta                        '),
(22, '3131', 'Arep', 'Laki-laki', 'Keamanan', 'Bali'),
(23, '3131', 'Joko', 'Laki-laki', 'Pilih Jabatan', 'Jakarta            '),
(24, '1212', 'Erni', 'Perempuan', 'Cleaning Service', 'Palembang'),
(25, '1313', 'Parid', 'Laki-laki', 'Satpam', 'Riau'),
(26, '1414', 'Rani', 'Perempuan', 'Sekretaris', 'Lampung'),
(27, '1515', 'Diky', 'Laki-laki', 'Satpam', 'Kalimantan'),
(28, '1616', 'Rayyan', 'Laki-laki', 'Keamanan', 'Padang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_pgw`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id_pgw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
