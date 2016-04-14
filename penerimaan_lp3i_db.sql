-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2016 at 03:29 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penerimaan_lp3i_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun_admin`
--

CREATE TABLE `akun_admin` (
  `ID_ADMIN` varchar(5) NOT NULL,
  `NAMA_ADMIN` varchar(50) DEFAULT NULL,
  `PASS_ADMIN` varchar(50) DEFAULT NULL,
  `ROLE_ADMIN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun_admin`
--

INSERT INTO `akun_admin` (`ID_ADMIN`, `NAMA_ADMIN`, `PASS_ADMIN`, `ROLE_ADMIN`) VALUES
('ADM01', 'Admin Online', '202cb962ac59075b964b07152d234b70', 3),
('ADM02', 'Admin', '202cb962ac59075b964b07152d234b70', 1),
('ADM03', 'Admin Master', '202cb962ac59075b964b07152d234b70', 2),
('ADM04', 'Admin Informan', '202cb962ac59075b964b07152d234b70', 3);

-- --------------------------------------------------------

--
-- Table structure for table `anggota_keluarga`
--

CREATE TABLE `anggota_keluarga` (
  `ID` int(11) NOT NULL,
  `NO_PENDAFTARAN` varchar(10) DEFAULT NULL,
  `NAMA` varchar(50) DEFAULT NULL,
  `HUBUNGAN_KELUARGA` varchar(50) DEFAULT NULL,
  `USIA` int(11) DEFAULT NULL,
  `PEKERJAAN` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bidang_soal_akademik`
--

CREATE TABLE `bidang_soal_akademik` (
  `ID_BIDANG_SOAL` int(11) NOT NULL,
  `NAMA_BIDANG_SOAL` varchar(50) DEFAULT NULL,
  `BOBOT_BIDANG_SOAL` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang_soal_akademik`
--

INSERT INTO `bidang_soal_akademik` (`ID_BIDANG_SOAL`, `NAMA_BIDANG_SOAL`, `BOBOT_BIDANG_SOAL`) VALUES
(1, 'Komputer', '25'),
(2, 'Bahasa Inggris', '25'),
(3, 'Bahasa Indonesia', '20'),
(4, 'Ilmu Pengetahuan Sosial', '15'),
(5, 'Matematika', '15');

-- --------------------------------------------------------

--
-- Table structure for table `bukti_pembayaran`
--

CREATE TABLE `bukti_pembayaran` (
  `ID_BUKTI` int(11) NOT NULL,
  `NO_PENDAFTARAN` varchar(10) DEFAULT NULL,
  `TANGGAL_UPLOAD` date DEFAULT NULL,
  `KETERANGAN` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detil_tes_akademik`
--

CREATE TABLE `detil_tes_akademik` (
  `NO_PENDAFTARAN` varchar(10) NOT NULL,
  `ID` int(11) NOT NULL,
  `ID_SOAL` int(11) NOT NULL,
  `ID_JAWABAN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detil_tes_minat_bakat`
--

CREATE TABLE `detil_tes_minat_bakat` (
  `NO_PENDAFTARAN` varchar(10) NOT NULL,
  `ID` int(11) NOT NULL,
  `ID_SOAL` int(11) NOT NULL,
  `ID_JAWABAN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_tes`
--

CREATE TABLE `jadwal_tes` (
  `ID` int(11) NOT NULL,
  `TAHAP` varchar(15) DEFAULT NULL,
  `TANGGAL` date DEFAULT NULL,
  `TEMPAT` varchar(30) DEFAULT NULL,
  `RUANG` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_akademik`
--

CREATE TABLE `jawaban_akademik` (
  `ID_JAWABAN` int(11) NOT NULL,
  `ID_SOAL` int(11) DEFAULT NULL,
  `JAWABAN` varchar(255) DEFAULT NULL,
  `NILAI` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban_akademik`
--

INSERT INTO `jawaban_akademik` (`ID_JAWABAN`, `ID_SOAL`, `JAWABAN`, `NILAI`) VALUES
(5, 2, 'Apa yang dilakukan murid tidak ada hubungannya dengan guru', 0),
(6, 2, 'Murid harus berbakti kepada guru', 0),
(7, 2, 'Apa yang diajarkan seorang guru akan ditiru oleh muridnya', 1),
(8, 2, 'Murid harus menuruti apa yang diinginkan seorang guru', 0),
(9, 3, 'Ir. Habibie', 0),
(10, 3, 'Megawati Soekarno Putri', 0),
(11, 3, 'Jend. Soeharto', 0),
(12, 3, 'Ir. Soekarno', 1),
(13, 4, 'Universal Serial Bus', 1),
(14, 4, 'Universal Sosial Bus', 0),
(15, 4, 'University Study Bus', 0),
(16, 4, 'Unit Service Bridge', 0),
(17, 5, 'Bill Gates', 1),
(18, 5, 'Steve Job', 0),
(19, 5, 'Mark Zuckerberk', 0),
(20, 5, 'Wiz Khalifah', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_minat_bakat`
--

CREATE TABLE `jawaban_minat_bakat` (
  `ID_JAWABAN` int(11) NOT NULL,
  `ID_SOAL` int(11) DEFAULT NULL,
  `JAWABAN` varchar(255) DEFAULT NULL,
  `KARAKTER` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban_minat_bakat`
--

INSERT INTO `jawaban_minat_bakat` (`ID_JAWABAN`, `ID_SOAL`, `JAWABAN`, `KARAKTER`) VALUES
(1, 1, 'Pemabuk', 'Sanguin'),
(2, 1, 'Peminum', 'Koleris'),
(3, 1, 'Pelaksana', 'Melankolis'),
(4, 1, 'Pemarah', 'Phlegmatis');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `ID_JURUSAN` varchar(10) NOT NULL,
  `NAMA_JURUSAN` varchar(50) DEFAULT NULL,
  `SARAN_KARAKTER` varchar(100) DEFAULT NULL,
  `KETERANGAN` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`ID_JURUSAN`, `NAMA_JURUSAN`, `SARAN_KARAKTER`, `KETERANGAN`) VALUES
('1', 'Informatics Computer', 'Sanguins;Koleris;Phlegmatis;', 'EDP, Junior Programmer, Web Programmer, IT Support'),
('2', 'Computer Design & Multimedia', 'Sanguins;Melankolis;', 'Web Designer, Design Graphics, Photographer, Web Animator, Editor Video, Flash Animator'),
('3', 'Office Management', 'Koleris;', 'Staff Personalia, Customer Service, Staff Administrasi: Personalia, Keuangan, Penjualan, Pembelian, Umum/Kesekretariatan'),
('4', 'Bussiness Administration', '', 'Staff Marketing, Staff Administrasi Keuangan, Staff Ekspor impor, Staff Pajak, Wirausaha'),
('5', 'Computerized Accounting', '', 'Staff Akuntansi, Staff Pajak, Kasir/Bendahara, Staff Audit, Junior Auditor'),
('6', 'Public Relations', '', 'Frontliner, GRO, Customer Service, Staff Layanan, Pelanggan, Sekretaris, Staff Humas/PR, Praktisi Media');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE `pendaftar` (
  `NO_PENDAFTARAN` varchar(10) NOT NULL,
  `ID_ADMIN` varchar(5) DEFAULT NULL,
  `NAMA` varchar(50) DEFAULT NULL,
  `TEMPAT_LAHIR` varchar(50) DEFAULT NULL,
  `TANGGAL_LAHIR` date DEFAULT NULL,
  `AGAMA` varchar(30) DEFAULT NULL,
  `STATUS_PERNIKAHAN` tinyint(1) DEFAULT NULL,
  `PEKERJAAN` varchar(50) DEFAULT NULL,
  `KEWARGANEGARAAN` varchar(50) DEFAULT NULL,
  `NO_IDENTITAS` varchar(30) DEFAULT NULL,
  `ALAMAT_TETAP` varchar(255) DEFAULT NULL,
  `ALAMAT_SEKARANG` varchar(255) DEFAULT NULL,
  `ALAMAT_KANTOR` varchar(255) DEFAULT NULL,
  `NO_HANDPHONE` varchar(15) DEFAULT NULL,
  `NO_TELEPON` varchar(15) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `EVALUASI_DIRI` text,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `VALID` tinyint(1) DEFAULT NULL,
  `TANGGAL_DAFTAR` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `ID` int(11) NOT NULL,
  `NO_PENDAFTARAN` varchar(10) NOT NULL,
  `TOTAL_NILAI` int(11) DEFAULT NULL,
  `KETERANGAN` varchar(20) DEFAULT NULL,
  `KEPUTUSAN` int(11) DEFAULT NULL,
  `CATATAN` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pewawancara`
--

CREATE TABLE `pewawancara` (
  `ID_PEWAWANCARA` varchar(10) NOT NULL,
  `NAMA` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `KETERANGAN` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pewawancara`
--

INSERT INTO `pewawancara` (`ID_PEWAWANCARA`, `NAMA`, `PASSWORD`, `KETERANGAN`) VALUES
('INT001', 'Yusuf Bagus Anggara, S.Kom.', '202cb962ac59075b964b07152d234b70', 'Arek wage'),
('INT002', 'Yusron Ihza Mahendra', '202cb962ac59075b964b07152d234b70', 'Manusia');

-- --------------------------------------------------------

--
-- Table structure for table `pilihan_jurusan`
--

CREATE TABLE `pilihan_jurusan` (
  `NO_PENDAFTARAN` varchar(10) NOT NULL,
  `ID_JURUSAN` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_kerja`
--

CREATE TABLE `riwayat_kerja` (
  `ID` int(11) NOT NULL,
  `NO_PENDAFTARAN` varchar(10) DEFAULT NULL,
  `NAMA_PERUSAHAAN` varchar(50) DEFAULT NULL,
  `TANGGAL_MULAI` date DEFAULT NULL,
  `TANGGAL_SELESAI` date DEFAULT NULL,
  `JABATAN_AKHIR` varchar(50) DEFAULT NULL,
  `GAJI_PERBULAN` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pendidikan`
--

CREATE TABLE `riwayat_pendidikan` (
  `ID` int(11) NOT NULL,
  `NO_PENDAFTARAN` varchar(10) DEFAULT NULL,
  `JENIS` varchar(10) DEFAULT NULL,
  `NAMA_LEMBAGA` varchar(50) DEFAULT NULL,
  `ALAMAT_LEMBAGA` varchar(255) DEFAULT NULL,
  `TANGGAL_MULAI` date DEFAULT NULL,
  `TANGGAL_SELESAI` date DEFAULT NULL,
  `SERTIFIKAT` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `soal_akademik`
--

CREATE TABLE `soal_akademik` (
  `ID_SOAL` int(11) NOT NULL,
  `ID_BIDANG_SOAL` int(11) DEFAULT NULL,
  `TEKS_SOAL` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal_akademik`
--

INSERT INTO `soal_akademik` (`ID_SOAL`, `ID_BIDANG_SOAL`, `TEKS_SOAL`) VALUES
(2, 3, 'Makna dari pribahasa ''Guru kencing berdiri, murid kencing berlari'' adalah...'),
(3, 4, 'Siapakah Presidan pertama Negara Republik Indonesi'),
(4, 1, 'Apa kepanjangan dari USB?'),
(5, 1, 'Siapa pendiri Microsoft');

-- --------------------------------------------------------

--
-- Table structure for table `soal_minat_bakat`
--

CREATE TABLE `soal_minat_bakat` (
  `ID_SOAL` int(11) NOT NULL,
  `TEKS_SOAL` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal_minat_bakat`
--

INSERT INTO `soal_minat_bakat` (`ID_SOAL`, `TEKS_SOAL`) VALUES
(1, 'Jika seseorang selalu marah, itu artinya orang tersebut adalah...');

-- --------------------------------------------------------

--
-- Table structure for table `tes_akademik`
--

CREATE TABLE `tes_akademik` (
  `NO_PENDAFTARAN` varchar(10) NOT NULL,
  `ID` int(11) NOT NULL,
  `TANGGAL_TES` date DEFAULT NULL,
  `TOTAL_NILAI` int(11) DEFAULT NULL,
  `KETERANGAN` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tes_minat_bakat`
--

CREATE TABLE `tes_minat_bakat` (
  `NO_PENDAFTARAN` varchar(10) NOT NULL,
  `ID` int(11) NOT NULL,
  `TANGGAL_TES` date DEFAULT NULL,
  `KARAKTER_DOMINAN` varchar(30) DEFAULT NULL,
  `KARAKTER_SEKUNDER` varchar(30) DEFAULT NULL,
  `KETERANGAN` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tes_wawancara`
--

CREATE TABLE `tes_wawancara` (
  `NO_PENDAFTARAN` varchar(10) NOT NULL,
  `ID` int(11) NOT NULL,
  `ID_PEWAWANCARA` varchar(10) DEFAULT NULL,
  `TANGGAL_TES` date DEFAULT NULL,
  `SKOR_KOMUNIKASI` int(11) DEFAULT NULL,
  `SKOR_INTELEKTUAL` int(11) DEFAULT NULL,
  `SKOR_MOTIVASI` int(11) DEFAULT NULL,
  `SKOR_KEDEWASAAN` int(11) DEFAULT NULL,
  `SKOR_KERJASAMA` int(11) DEFAULT NULL,
  `SKOR_PERCAYA_DIRI` int(11) DEFAULT NULL,
  `SKOR_PEMAHAMAN_LP3I` int(11) DEFAULT NULL,
  `SKOR_BAHASA_INGGRIS` int(11) DEFAULT NULL,
  `KETERANGAN` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun_admin`
--
ALTER TABLE `akun_admin`
  ADD PRIMARY KEY (`ID_ADMIN`);

--
-- Indexes for table `anggota_keluarga`
--
ALTER TABLE `anggota_keluarga`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_ANGGOTA_KELUARGA_PENDAFTAR` (`NO_PENDAFTARAN`);

--
-- Indexes for table `bidang_soal_akademik`
--
ALTER TABLE `bidang_soal_akademik`
  ADD PRIMARY KEY (`ID_BIDANG_SOAL`);

--
-- Indexes for table `bukti_pembayaran`
--
ALTER TABLE `bukti_pembayaran`
  ADD PRIMARY KEY (`ID_BUKTI`),
  ADD KEY `FK_PEMBAYARAN` (`NO_PENDAFTARAN`);

--
-- Indexes for table `detil_tes_akademik`
--
ALTER TABLE `detil_tes_akademik`
  ADD PRIMARY KEY (`NO_PENDAFTARAN`,`ID`,`ID_SOAL`,`ID_JAWABAN`),
  ADD KEY `FK_DETIL_TES_SOAL` (`ID_SOAL`),
  ADD KEY `FK_NILAI_JAWABAN_AKADEMIK` (`ID_JAWABAN`);

--
-- Indexes for table `detil_tes_minat_bakat`
--
ALTER TABLE `detil_tes_minat_bakat`
  ADD PRIMARY KEY (`NO_PENDAFTARAN`,`ID`,`ID_SOAL`,`ID_JAWABAN`),
  ADD KEY `FK_DETIL_TES_SOAL_MINAT_BAKAT` (`ID_SOAL`),
  ADD KEY `FK_NILAI_SOAL_JAWABAN` (`ID_JAWABAN`);

--
-- Indexes for table `jadwal_tes`
--
ALTER TABLE `jadwal_tes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `jawaban_akademik`
--
ALTER TABLE `jawaban_akademik`
  ADD PRIMARY KEY (`ID_JAWABAN`),
  ADD KEY `FK_JAWABAN_SOAL` (`ID_SOAL`);

--
-- Indexes for table `jawaban_minat_bakat`
--
ALTER TABLE `jawaban_minat_bakat`
  ADD PRIMARY KEY (`ID_JAWABAN`),
  ADD KEY `FK_JAWABAN_SOAL_MINAT` (`ID_SOAL`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`ID_JURUSAN`);

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`NO_PENDAFTARAN`),
  ADD KEY `FK_VALIDASI` (`ID_ADMIN`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`NO_PENDAFTARAN`,`ID`),
  ADD KEY `FK_JADWAL_TES_PESERTA` (`ID`);

--
-- Indexes for table `pewawancara`
--
ALTER TABLE `pewawancara`
  ADD PRIMARY KEY (`ID_PEWAWANCARA`);

--
-- Indexes for table `pilihan_jurusan`
--
ALTER TABLE `pilihan_jurusan`
  ADD PRIMARY KEY (`NO_PENDAFTARAN`,`ID_JURUSAN`),
  ADD KEY `FK_JURUSAN_PILIHAN` (`ID_JURUSAN`);

--
-- Indexes for table `riwayat_kerja`
--
ALTER TABLE `riwayat_kerja`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_RIWAYAT_KERJA_PENDAFTAR` (`NO_PENDAFTARAN`);

--
-- Indexes for table `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_RIWAYAT_PENDIDIKAN_PENDAFTAR` (`NO_PENDAFTARAN`);

--
-- Indexes for table `soal_akademik`
--
ALTER TABLE `soal_akademik`
  ADD PRIMARY KEY (`ID_SOAL`),
  ADD KEY `FK_BIDANG_SOAL` (`ID_BIDANG_SOAL`);

--
-- Indexes for table `soal_minat_bakat`
--
ALTER TABLE `soal_minat_bakat`
  ADD PRIMARY KEY (`ID_SOAL`);

--
-- Indexes for table `tes_akademik`
--
ALTER TABLE `tes_akademik`
  ADD PRIMARY KEY (`NO_PENDAFTARAN`,`ID`);

--
-- Indexes for table `tes_minat_bakat`
--
ALTER TABLE `tes_minat_bakat`
  ADD PRIMARY KEY (`NO_PENDAFTARAN`,`ID`);

--
-- Indexes for table `tes_wawancara`
--
ALTER TABLE `tes_wawancara`
  ADD PRIMARY KEY (`NO_PENDAFTARAN`,`ID`),
  ADD KEY `FK_PEWAWANCARA` (`ID_PEWAWANCARA`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota_keluarga`
--
ALTER TABLE `anggota_keluarga`
  ADD CONSTRAINT `FK_ANGGOTA_KELUARGA_PENDAFTAR` FOREIGN KEY (`NO_PENDAFTARAN`) REFERENCES `pendaftar` (`NO_PENDAFTARAN`);

--
-- Constraints for table `bukti_pembayaran`
--
ALTER TABLE `bukti_pembayaran`
  ADD CONSTRAINT `FK_PEMBAYARAN` FOREIGN KEY (`NO_PENDAFTARAN`) REFERENCES `pendaftar` (`NO_PENDAFTARAN`);

--
-- Constraints for table `detil_tes_akademik`
--
ALTER TABLE `detil_tes_akademik`
  ADD CONSTRAINT `FK_DETIL_TES_SOAL` FOREIGN KEY (`ID_SOAL`) REFERENCES `soal_akademik` (`ID_SOAL`),
  ADD CONSTRAINT `FK_DETIL_TES_TPA` FOREIGN KEY (`NO_PENDAFTARAN`,`ID`) REFERENCES `tes_akademik` (`NO_PENDAFTARAN`, `ID`),
  ADD CONSTRAINT `FK_NILAI_JAWABAN_AKADEMIK` FOREIGN KEY (`ID_JAWABAN`) REFERENCES `jawaban_akademik` (`ID_JAWABAN`);

--
-- Constraints for table `detil_tes_minat_bakat`
--
ALTER TABLE `detil_tes_minat_bakat`
  ADD CONSTRAINT `FK_DETIL_TES_MINAT_BAKAT` FOREIGN KEY (`NO_PENDAFTARAN`,`ID`) REFERENCES `tes_minat_bakat` (`NO_PENDAFTARAN`, `ID`),
  ADD CONSTRAINT `FK_DETIL_TES_SOAL_MINAT_BAKAT` FOREIGN KEY (`ID_SOAL`) REFERENCES `soal_minat_bakat` (`ID_SOAL`),
  ADD CONSTRAINT `FK_NILAI_SOAL_JAWABAN` FOREIGN KEY (`ID_JAWABAN`) REFERENCES `jawaban_minat_bakat` (`ID_JAWABAN`);

--
-- Constraints for table `jawaban_akademik`
--
ALTER TABLE `jawaban_akademik`
  ADD CONSTRAINT `FK_JAWABAN_SOAL` FOREIGN KEY (`ID_SOAL`) REFERENCES `soal_akademik` (`ID_SOAL`);

--
-- Constraints for table `jawaban_minat_bakat`
--
ALTER TABLE `jawaban_minat_bakat`
  ADD CONSTRAINT `FK_JAWABAN_SOAL_MINAT` FOREIGN KEY (`ID_SOAL`) REFERENCES `soal_minat_bakat` (`ID_SOAL`);

--
-- Constraints for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD CONSTRAINT `FK_VALIDASI` FOREIGN KEY (`ID_ADMIN`) REFERENCES `akun_admin` (`ID_ADMIN`);

--
-- Constraints for table `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `FK_JADWAL_TES_PESERTA` FOREIGN KEY (`ID`) REFERENCES `jadwal_tes` (`ID`),
  ADD CONSTRAINT `FK_PESERTA_PENDAFTAR` FOREIGN KEY (`NO_PENDAFTARAN`) REFERENCES `pendaftar` (`NO_PENDAFTARAN`);

--
-- Constraints for table `pilihan_jurusan`
--
ALTER TABLE `pilihan_jurusan`
  ADD CONSTRAINT `FK_JURUSAN_PILIHAN` FOREIGN KEY (`ID_JURUSAN`) REFERENCES `jurusan` (`ID_JURUSAN`),
  ADD CONSTRAINT `FK_PILIHAN_JURUSAN_PENDAFTAR` FOREIGN KEY (`NO_PENDAFTARAN`) REFERENCES `pendaftar` (`NO_PENDAFTARAN`);

--
-- Constraints for table `riwayat_kerja`
--
ALTER TABLE `riwayat_kerja`
  ADD CONSTRAINT `FK_RIWAYAT_KERJA_PENDAFTAR` FOREIGN KEY (`NO_PENDAFTARAN`) REFERENCES `pendaftar` (`NO_PENDAFTARAN`);

--
-- Constraints for table `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  ADD CONSTRAINT `FK_RIWAYAT_PENDIDIKAN_PENDAFTAR` FOREIGN KEY (`NO_PENDAFTARAN`) REFERENCES `pendaftar` (`NO_PENDAFTARAN`);

--
-- Constraints for table `soal_akademik`
--
ALTER TABLE `soal_akademik`
  ADD CONSTRAINT `FK_BIDANG_SOAL` FOREIGN KEY (`ID_BIDANG_SOAL`) REFERENCES `bidang_soal_akademik` (`ID_BIDANG_SOAL`);

--
-- Constraints for table `tes_akademik`
--
ALTER TABLE `tes_akademik`
  ADD CONSTRAINT `FK_TPA_PESERTA` FOREIGN KEY (`NO_PENDAFTARAN`,`ID`) REFERENCES `peserta` (`NO_PENDAFTARAN`, `ID`);

--
-- Constraints for table `tes_minat_bakat`
--
ALTER TABLE `tes_minat_bakat`
  ADD CONSTRAINT `FK_MINAT_BAKAT_PESERTA` FOREIGN KEY (`NO_PENDAFTARAN`,`ID`) REFERENCES `peserta` (`NO_PENDAFTARAN`, `ID`);

--
-- Constraints for table `tes_wawancara`
--
ALTER TABLE `tes_wawancara`
  ADD CONSTRAINT `FK_PEWAWANCARA` FOREIGN KEY (`ID_PEWAWANCARA`) REFERENCES `pewawancara` (`ID_PEWAWANCARA`),
  ADD CONSTRAINT `FK_WAWANCARA_PESERTA` FOREIGN KEY (`NO_PENDAFTARAN`,`ID`) REFERENCES `peserta` (`NO_PENDAFTARAN`, `ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
