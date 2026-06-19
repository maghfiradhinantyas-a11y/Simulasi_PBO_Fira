-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 19, 2026 at 02:38 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simulasi_pbo_trpl1a_fira`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `nama_calon` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` decimal(10,2) NOT NULL,
  `jalur_pendaftaran` enum('Reguler','Prestasi','Kedinasan') NOT NULL,
  `pilihan_prodi` varchar(50) DEFAULT NULL,
  `lokasi_kampus` varchar(50) DEFAULT NULL,
  `jenis_prestasi` varchar(50) DEFAULT NULL,
  `tingkat_prestasi` varchar(50) DEFAULT NULL,
  `sk_ikatan_dinas` varchar(50) DEFAULT NULL,
  `instansi_sponsor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
(1, 'Ahmad Fauzi', 'SMAN 1 Jakarta', 85.50, 250000.00, 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(2, 'Budi Santoso', 'SMAN 3 Bandung', 78.00, 250000.00, 'Reguler', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(3, 'Citra Lestari', 'SMK 2 Surabaya', 92.25, 250000.00, 'Reguler', 'Ilmu Komputer', 'Kampus B', NULL, NULL, NULL, NULL),
(4, 'Dedi Wijaya', 'SMAN 5 Yogyakarta', 80.00, 250000.00, 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(5, 'Eka Putri', 'SMAN 1 Medan', 88.75, 250000.00, 'Reguler', 'Sistem Informasi', 'Kampus B', NULL, NULL, NULL, NULL),
(6, 'Fajar Ramadhan', 'SMKN 1 Semarang', 75.50, 250000.00, 'Reguler', 'Teknik Elektro', 'Kampus Utama', NULL, NULL, NULL, NULL),
(7, 'Gita Gutawa', 'SMAN 8 Jakarta', 95.00, 250000.00, 'Reguler', 'Ilmu Komputer', 'Kampus Utama', NULL, NULL, NULL, NULL),
(8, 'Hendra Setiawan', 'SMAN 1 Solo', 88.00, 150000.00, 'Prestasi', 'Teknik Informatika', 'Kampus Utama', 'Sains/Olimpiade', 'Nasional', NULL, NULL),
(9, 'Indah Permata', 'SMAN 2 Padang', 84.50, 150000.00, 'Prestasi', 'Sistem Informasi', 'Kampus B', 'Olahraga Basket', 'Provinsi', NULL, NULL),
(10, 'Joko Widodo', 'SMAN 4 Surakarta', 90.00, 150000.00, 'Prestasi', 'Ilmu Komputer', 'Kampus Utama', 'Fisika', 'Nasional', NULL, NULL),
(11, 'Kurniawan Hari', 'SMK 1 Malang', 82.00, 150000.00, 'Prestasi', 'Teknik Informatika', 'Kampus Utama', 'LKS Web Design', 'Provinsi', NULL, NULL),
(12, 'Larasati Putri', 'SMAN 3 Denpasar', 93.50, 150000.00, 'Prestasi', 'Sistem Informasi', 'Kampus Utama', 'Musik Piano', 'Internasional', NULL, NULL),
(13, 'Muhammad Rizky', 'SMAN 1 Makassar', 86.00, 150000.00, 'Prestasi', 'Teknik Elektro', 'Kampus B', 'Karya Ilmiah', 'Nasional', NULL, NULL),
(14, 'Nanda Saputra', 'SMAN 1 Palembang', 89.00, 300000.00, 'Kedinasan', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, 'SK-DISKOMINFO-2026', 'Dinas Komunikasi dan Informatika'),
(15, 'Olivia Olivia', 'SMAN 70 Jakarta', 81.50, 300000.00, 'Kedinasan', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, 'SK-PERHUB-0992', 'Kementerian Perhubungan'),
(16, 'Putra Pratama', 'SMAN 2 Balikpapan', 87.20, 300000.00, 'Kedinasan', 'Ilmu Komputer', 'Kampus B', NULL, NULL, 'SK-BKN-8812', 'Badan Kepegawaian Negara'),
(17, 'Qori Sandria', 'SMAN 1 Aceh', 83.00, 300000.00, 'Kedinasan', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, 'SK-SETDA-042', 'Sekretariat Daerah Provinsi'),
(18, 'Rian Hidayat', 'SMAN 3 Pontianak', 91.00, 300000.00, 'Kedinasan', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, 'SK-BAPENDA-11', 'Badan Pendapatan Daerah'),
(19, 'Siti Aminah', 'SMAN 1 Manado', 85.40, 300000.00, 'Kedinasan', 'Teknik Elektro', 'Kampus B', NULL, NULL, 'SK-PUPR-772', 'Kementerian PUPR'),
(20, 'Taufik Hidayat', 'SMKN 26 Jakarta', 88.10, 300000.00, 'Kedinasan', 'Ilmu Komputer', 'Kampus Utama', NULL, NULL, 'SK-SABER-990', 'Lembaga Sandi Negara');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
