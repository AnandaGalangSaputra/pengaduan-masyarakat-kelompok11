-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2025 at 12:26 PM
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
-- Database: `pengaduan_masyarakat`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(11) NOT NULL,
  `judul_laporan` varchar(255) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `ktp` varchar(20) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `lokasi_kejadian` varchar(255) DEFAULT NULL,
  `isi_laporan` text DEFAULT NULL,
  `bukti_foto` varchar(255) DEFAULT NULL,
  `setuju` tinyint(1) DEFAULT 0,
  `status_laporan` enum('diproses','selesai','ditolak') DEFAULT 'diproses',
  `tiket_lacak` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `judul_laporan`, `nama`, `ktp`, `kategori`, `lokasi_kejadian`, `isi_laporan`, `bukti_foto`, `setuju`, `status_laporan`, `tiket_lacak`, `created_at`, `updated_at`) VALUES
(1, 'Ullam dolorem fugiat', 'Incidunt ipsa sit', 'Qui labore aut autem', 'infrastruktur', 'Quis aute eum deseru', 'Consequat Qui sunt', 'pengaduan_foto/czRn6b0dYhMo53DIJDynB5mKPX3J2BwwFSImydXE.png', 1, 'diproses', 'TIKET-Z9PWWCCKWB', '2025-06-14 02:26:09', '2025-06-14 02:26:09'),
(2, '2', '2', '1', 'asd', '1', '1', '1', 1, 'diproses', '1', '2025-06-14 09:37:30', '2025-06-14 09:37:30'),
(3, 'Sampah Menumpuk di Jalan', 'Galang Saputra', '1234567890123456', 'Lingkungan', 'Jl. Malioboro, Yogyakarta', 'Sudah seminggu sampah menumpuk dan belum diangkut oleh petugas.', 'bukti_sampah1.jpg', 1, 'diproses', 'TIKET123456', '2025-06-14 10:06:45', '2025-06-14 10:06:45'),
(4, 'Lampu Jalan Mati', 'Rina Wulandari', '9876543210987654', 'Fasilitas Umum', 'Jl. Solo KM 10', 'Lampu jalan sudah mati sejak 3 hari lalu dan membuat area gelap gulita.', 'lampu_mati.jpg', 1, 'selesai', 'TIKET654321', '2025-06-14 10:06:45', '2025-06-14 10:06:45'),
(5, 'Jalan Berlubang Parah', 'Budi Santoso', '3201987654321098', 'Infrastruktur', 'Jl. Wonosari, Gunungkidul', 'Terdapat lubang besar yang membahayakan pengendara sepeda motor.', 'jalan_berlubang.jpg', 0, 'ditolak', 'TIKET000321', '2025-06-14 10:06:45', '2025-06-14 10:06:45'),
(6, 'Voluptate ut dolorum', 'Ullam veniam aliqui', 'Consequuntur numquam', 'lingkungan', 'Debitis eaque dolor', 'Mollitia minim eu cu', 'pengaduan_foto/xOViro7x1L2GEfnTWavtCezsFy5cIYz2KOj6EcLz.png', 1, 'diproses', 'TIKET-76RJL5JOGK', '2025-06-14 03:14:33', '2025-06-14 03:14:33'),
(7, 'INi buat ngetest', 'galang', '123', 'infrastruktur', 'wonosobo', 'Perumahan Griya Asri Blok C No. 18, Kelurahan Condongcatur, Kecamatan Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta\',\r\n\'Dalam dua minggu terakhir, tidak ada aktivitas pengangkutan sampah oleh dinas terkait di lingkungan kami. Akibatnya, tumpukan sampah sudah mencapai tinggi lebih dari satu meter dan menimbulkan bau tidak sedap serta lalat yang sangat mengganggu warga sekitar. Kami berharap dinas kebersihan segera menindaklanjuti laporan ini sebelum berdampak pada kesehatan warga.', 'pengaduan_foto/MKU8ESNBmHL0t8m0Pyt7d0UHoavSBXIjgrNIeZVu.jpg', 1, 'diproses', 'TIKET-LJOS6TK6E6', '2025-06-14 03:28:07', '2025-06-14 03:28:07'),
(8, 'Dolor voluptatem qui', 'Neque fugit eius in', 'Odio dolores incidun', 'lingkungan', 'Non sapiente laborum', 'Est iure cupidatat a', 'pengaduan_foto/KKSYb4ANJL8vS3RkNNxhwR58jrJOTnCMu4qEQKam.jpg', 1, 'diproses', 'TIKET-CKKGIKJHT6', '2025-06-14 03:30:37', '2025-06-14 03:30:37'),
(9, '1', '1', '1', 'infrastruktur', '1', 'sad', 'pengaduan_foto/GG9Zwx29lccKIfgfMBpxdXzkIyxrGpYomGTsrMGy.png', 1, 'diproses', 'TIKET-1X2XIY8XZ6', '2025-06-16 01:44:23', '2025-06-16 01:44:23'),
(10, '1', '1', '1', 'infrastruktur', '1', 'sad', 'pengaduan_foto/ipcd0v0JXmY8038AQeLxjTAtOXENAuKHoU21hPYb.png', 1, 'diproses', 'TIKET-JPKSOFGACT', '2025-06-16 01:44:32', '2025-06-16 01:44:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tiket_lacak` (`tiket_lacak`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
