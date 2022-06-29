-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2022 at 07:40 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hris_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id` int(11) NOT NULL,
  `nama_cuti` varchar(25) NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id`, `nama_cuti`, `keterangan`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(5, 'Cuti Tahunan', 'cuti-tahunan', '2022-04-04 10:20:20', NULL, NULL, NULL),
(6, 'Cuti Khusus', 'cuti-khusus', '2022-04-04 10:20:28', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE `dept` (
  `id` int(11) NOT NULL,
  `nama_dept` varchar(25) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`id`, `nama_dept`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Warehouse', '2022-03-31 08:48:02', '2022-03-31 08:59:42', NULL, NULL),
(2, 'Production', '2022-03-31 08:48:10', '2022-03-31 08:55:35', NULL, NULL),
(5, 'HRD', '2022-04-02 11:16:24', NULL, NULL, NULL),
(6, 'Management', '2022-04-02 11:16:39', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `atasan_1` int(11) DEFAULT NULL,
  `atasan_2` int(11) DEFAULT NULL,
  `atasan_3` int(11) DEFAULT NULL,
  `atasan_4` int(11) DEFAULT NULL,
  `atasan_5` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `karyawan_id`, `dept_id`, `jabatan_id`, `atasan_1`, `atasan_2`, `atasan_3`, `atasan_4`, `atasan_5`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(8, 6, 5, 5, NULL, NULL, NULL, NULL, NULL, '2022-04-12 07:23:16', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `nama_jabatan` varchar(25) NOT NULL,
  `jobdesc` varchar(150) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama_jabatan`, `jobdesc`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Helper', 'Membantu orang lain', '2022-03-31 09:06:09', '2022-03-31 09:08:55', NULL, NULL),
(3, 'Operator', 'Mengoperasikan pesawat tempur rusia', '2022-03-31 09:08:04', '2022-03-31 09:08:43', NULL, NULL),
(4, 'Leader', 'Memimpin pasukan romawi', '2022-03-31 09:08:13', NULL, NULL, NULL),
(5, 'Supervisor', 'Memastikan kinerja leader sesuai dengan tugasnya', '2022-04-02 10:46:16', NULL, NULL, NULL),
(6, 'Manager', 'Mengatur orang banyak', '2022-04-02 10:46:34', NULL, NULL, NULL),
(7, 'Factory Manager', 'Mengatur pabrik', '2022-04-02 10:47:07', NULL, NULL, NULL),
(8, 'Staff', 'Mengurus administrasi', '2022-04-02 10:47:21', '2022-04-02 10:48:10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama_jurusan`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Teknik Otomotif', '2022-03-31 09:38:05', NULL, NULL, NULL),
(2, 'Teknik Komputer Jaringan', '2022-03-31 09:38:12', NULL, NULL, NULL),
(3, 'Teknik Industri', '2022-03-31 09:38:21', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `pendidikan_id` int(11) NOT NULL,
  `jurusan_id` int(11) NOT NULL,
  `nrp` varchar(15) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenkel` enum('L','P') NOT NULL,
  `agama` enum('Islam','Katolik','Protestan','Hindu','Buddha','Konghucu') NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `status_perkawinan` enum('0','1') NOT NULL,
  `no_kk` varchar(20) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  `ibu_kandung` varchar(20) NOT NULL,
  `ayah_kandung` varchar(20) NOT NULL,
  `bpjs_tk` varchar(20) DEFAULT NULL,
  `bpjs_ks` varchar(20) DEFAULT NULL,
  `npwp` varchar(20) DEFAULT NULL,
  `hak_cuti_tahunan` decimal(10,0) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `pendidikan_id`, `jurusan_id`, `nrp`, `nik`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenkel`, `agama`, `alamat`, `status_perkawinan`, `no_kk`, `no_hp`, `email`, `ibu_kandung`, `ayah_kandung`, `bpjs_tk`, `bpjs_ks`, `npwp`, `hak_cuti_tahunan`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(6, 1, 1, '6', '006', 'Natanael', 'Karawang', '1945-08-17', 'L', 'Katolik', 'Dengklok', '0', '6', '6', 'nael@gmail.com', 'Hawa', 'Adam', '', '', '', '12', '2022-04-11 09:35:18', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int(11) NOT NULL,
  `nama_pendidikan` varchar(25) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `nama_pendidikan`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'SMA', '2022-03-31 09:21:50', '2022-03-31 09:22:04', NULL, NULL),
(2, 'SMK', '2022-03-31 09:21:54', NULL, NULL, NULL),
(3, 'STM', '2022-03-31 09:22:09', NULL, NULL, NULL),
(4, 'SMU', '2022-03-31 09:22:14', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transcuti`
--

CREATE TABLE `transcuti` (
  `id` int(11) NOT NULL,
  `cuti_id` int(11) NOT NULL,
  `karyawan_id` int(11) DEFAULT NULL,
  `bukti_cuti` varchar(255) DEFAULT NULL,
  `mulai_cuti` date DEFAULT NULL,
  `selesai_cuti` date DEFAULT NULL,
  `cuti_in` decimal(2,1) DEFAULT NULL,
  `cuti_out` decimal(2,1) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `approval_1` int(11) DEFAULT NULL,
  `approval_2` int(11) DEFAULT NULL,
  `approval_3` int(11) DEFAULT NULL,
  `approval_4` int(11) DEFAULT NULL,
  `approval_5` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `karyawan_id`, `username`, `password`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(6, 6, 'natanael', '$2y$10$/rCccFK2Xy0R8x0NxKRG/ethwYZzQKRlQNM3OiH7LKmI1ImXlWobW', '2022-04-13 12:34:01', '2022-04-13 12:34:01', 6, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_karyawan_cuti` (`karyawan_id`),
  ADD KEY `fk_dept` (`dept_id`),
  ADD KEY `fk_jabatan` (`jabatan_id`),
  ADD KEY `fk_atasan1` (`atasan_1`),
  ADD KEY `fk_atasan2` (`atasan_2`),
  ADD KEY `fk_atasan3` (`atasan_3`),
  ADD KEY `fk_atasan4` (`atasan_4`),
  ADD KEY `fk_atasan5` (`atasan_5`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pendidikan` (`pendidikan_id`),
  ADD KEY `fk_jurusan` (`jurusan_id`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transcuti`
--
ALTER TABLE `transcuti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_karyawan_transcuti` (`karyawan_id`),
  ADD KEY `fk_cuti` (`cuti_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_karyawan_user` (`karyawan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dept`
--
ALTER TABLE `dept`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transcuti`
--
ALTER TABLE `transcuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `group`
--
ALTER TABLE `group`
  ADD CONSTRAINT `fk_atasan1` FOREIGN KEY (`atasan_1`) REFERENCES `karyawan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_atasan2` FOREIGN KEY (`atasan_2`) REFERENCES `karyawan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_atasan3` FOREIGN KEY (`atasan_3`) REFERENCES `karyawan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_atasan4` FOREIGN KEY (`atasan_4`) REFERENCES `karyawan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_atasan5` FOREIGN KEY (`atasan_5`) REFERENCES `karyawan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_dept` FOREIGN KEY (`dept_id`) REFERENCES `dept` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jabatan` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_karyawan_cuti` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `fk_jurusan` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id`),
  ADD CONSTRAINT `fk_pendidikan` FOREIGN KEY (`pendidikan_id`) REFERENCES `pendidikan` (`id`);

--
-- Constraints for table `transcuti`
--
ALTER TABLE `transcuti`
  ADD CONSTRAINT `fk_cuti` FOREIGN KEY (`cuti_id`) REFERENCES `cuti` (`id`),
  ADD CONSTRAINT `fk_karyawan_transcuti` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_karyawan_user` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
