-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 24, 2026 at 01:10 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sociolog`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int NOT NULL,
  `activity` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `goal` varchar(255) NOT NULL,
  `event` varchar(255) NOT NULL,
  `quota` int NOT NULL,
  `documentation-1` varchar(255) NOT NULL,
  `documentation-2` varchar(255) NOT NULL,
  `documentation-3` varchar(255) NOT NULL,
  `documentation-4` varchar(255) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `activity`, `thumbnail`, `date`, `time`, `location`, `description`, `goal`, `event`, `quota`, `documentation-1`, `documentation-2`, `documentation-3`, `documentation-4`, `status`) VALUES
(1, 'Bakti Sosial di Panti Asuhan Kasih Ibu', '/assets/activity1/thumbnail.jpeg', '2026-02-15', '12:30 – 17:00', 'jl. Hassanuddin No. 9', 'Kegiatan ini untuk membantu anak-anak yang berada di panti asuhan, dengan membagi sembako dan kebutuhan untuk anak-anak di sana.', 'Membantu anak-anak yang berada di panti asuhan\r\nMencukupi kebutuhan anak-anak di panti asuhan\r\nMempererat hubungan dengan orang-orang di sana', 'Pembukaan Kegiatan\r\nSambutan dari panitia\r\nPembagian bantuan sembako\r\nDokumentasi dan penutup', 50, '/assets/activity1/dok1.jpeg', '/assets/activity1/dok2.jpeg', '/assets/uploads/activities/activity_6a126857724499.19090470.png', '/assets/activity1/dok4.jpeg', 'active'),
(2, 'Gotong Royong di Desa Tebang Kacang', '/assets/activity2/thumbnail.jpeg', '2026-02-15', '08:00 – 12:00', 'Desa Tebang Kacang', 'Kegiatan gotong royong bersama warga desa untuk membersihkan lingkungan dan memperbaiki fasilitas umum yang ada di desa.', 'Membersihkan lingkungan desa\r\nMemperbaiki fasilitas umum\r\nMempererat tali persaudaraan antar warga', 'Pembukaan dan doa bersama\r\nPembagian kelompok kerja\r\nGotong royong bersama warga\r\nDokumentasi dan penutup', 75, '/assets/activity2/dok1.jpeg', '/assets/activity2/dok2.jpeg', '/assets/activity2/dok3.jpeg', '/assets/activity2/dok4.jpeg', 'active'),
(3, 'Membagi Takjil di Daerah Sungai Raya', '/assets/activity3/thumbnail.jpeg', '2026-02-20', '16:00 – 18:00', 'Jl. Merdeka No. 3, Sungai Raya', 'Kegiatan berbagi takjil gratis kepada masyarakat yang melintas di jalan raya selama bulan Ramadan sebagai bentuk kepedulian sosial.', 'Berbagi kebaikan kepada sesama\r\nMembantu masyarakat yang berpuasa\r\nMenumbuhkan semangat berbagi di kalangan siswa', 'Persiapan dan pengemasan takjil\r\nPembagian tugas relawan\r\nPembagian takjil kepada masyarakat\r\nDokumentasi dan penutup', 40, '/assets/activity3/dok1.jpeg', '/assets/activity3/dok2.jpeg', '/assets/activity3/dok3.jpeg', '/assets/activity3/dok4.jpeg', 'active'),
(4, 'Penanaman Pohon Mangrove Pesisir', '/assets/activity4/thumbnail.jpeg', '2026-02-22', '07:00 – 11:00', 'Pantai Kijing, Mempawah', 'Kegiatan penanaman pohon mangrove di pesisir pantai untuk mencegah abrasi dan menjaga ekosistem laut yang ada di wilayah Kalimantan Barat.', 'Mencegah abrasi pantai\r\nMenjaga ekosistem pesisir\r\nMeningkatkan kesadaran lingkungan pada siswa', 'Pembukaan dan pengarahan\r\nPembagian bibit mangrove\r\nPenanaman bersama di pesisir\r\nDokumentasi dan penutup', 60, '/assets/activity4/dok1.jpeg', '/assets/activity4/dok2.jpeg', '/assets/activity4/dok3.jpeg', '/assets/activity4/dok4.jpeg', 'active'),
(5, 'Donor Darah PMI Kota Pontianak', '/assets/activity5/thumbnail.jpeg', '2026-02-25', '09:00 – 14:00', 'Gedung PMI Pontianak', 'Kegiatan donor darah bekerja sama dengan PMI Kota Pontianak untuk memenuhi kebutuhan stok darah di rumah sakit dan membantu masyarakat yang membutuhkan.', 'Memenuhi kebutuhan stok darah PMI\r\nMembantu masyarakat yang membutuhkan transfusi darah\r\nMenumbuhkan kesadaran donor darah pada siswa', 'Registrasi dan pemeriksaan kesehatan\r\nPelaksanaan donor darah\r\nIstirahat dan konsumsi peserta\r\nDokumentasi dan penutup', 100, '/assets/activity5/dok1.jpeg', '/assets/activity5/dok2.jpeg', '/assets/activity5/dok3.jpeg', '/assets/activity5/dok4.jpeg', 'active'),
(6, 'Membagikan Sarapan Gratis di Jalan', '/assets/activity6/thumbnail.jpeg', '2026-03-01', '06:00 – 08:00', 'Jl. Hassanuddin No. 9, Pontianak', 'Kegiatan membagikan sarapan gratis kepada masyarakat kurang mampu dan pekerja informal yang melintas di jalan raya pada pagi hari.', 'Membantu masyarakat kurang mampu\r\nMemberikan energi bagi pekerja informal di pagi hari\r\nMenumbuhkan rasa empati dan kepedulian pada siswa', 'Persiapan dan pengemasan makanan\r\nPembagian tugas relawan\r\nPembagian sarapan kepada masyarakat\r\nDokumentasi dan penutup', 30, '/assets/activity6/dok1.jpeg', '/assets/activity6/dok2.jpeg', '/assets/activity6/dok3.jpeg', '/assets/activity6/dok4.jpeg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `activity_id` int NOT NULL,
  `registered_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('menunggu','terverifikasi','ditolak') DEFAULT 'menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `user_id`, `activity_id`, `registered_at`, `status`) VALUES
(3, 3, 2, '2026-05-18 12:41:46', 'terverifikasi'),
(4, 3, 1, '2026-05-18 14:38:51', 'terverifikasi'),
(5, 8, 1, '2026-05-19 00:17:50', 'terverifikasi'),
(7, 3, 3, '2026-05-21 10:51:09', 'terverifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','volunteer') NOT NULL DEFAULT 'volunteer',
  `class` varchar(50) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `class`, `profile_picture`) VALUES
(3, 'ShroChromE', 'owenchristian973@gmail.com', '$2y$10$NkBJUJcBAfR5VL7kBkQrNuelKFe2edNPM/RUohTXO6vHEnGiLSU1e', 'volunteer', 'XI TKJ 3', '/assets/profiles/profile-user3.webp'),
(8, 'Kenzo', 'kenzo@gmail.com', '$2y$10$CiSftyux8bMxmDxAoMvhR./HTXeje5yfbSsT1bea6i1Q4CdHKzl8K', 'volunteer', 'XI TKJ 3', '/assets/profiles/profile-user8.webp'),
(12, 'admin', 'admin@gmail.com', '$2y$10$Lv2NOuAYVVNiHUUJ4ZjwfOZdFmD7H6wHmwc.DcLc1muERC2Ul1Pl.', 'admin', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `activity` (`activity`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_registration` (`user_id`,`activity_id`),
  ADD KEY `activity_id` (`activity_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `registrations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `registrations_ibfk_2` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
