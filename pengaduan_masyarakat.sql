-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2025 at 06:46 PM
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
-- Table structure for table `kategori_pengaduan`
--

CREATE TABLE `kategori_pengaduan` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_pengaduan`
--

INSERT INTO `kategori_pengaduan` (`id`, `nama_kategori`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Infrastruktur Jalan', 'Keluhan terkait kerusakan jalan, lubang, atau fasilitas jalan lainnya', '2023-01-15 02:30:00', '2023-01-15 02:30:00'),
(2, 'Pengelolaan Sampah', 'Laporan tentang penumpukan sampah atau pelayanan pengangkutan sampah', '2023-02-20 07:15:00', '2023-02-20 07:15:00'),
(3, 'Air dan Drainase', 'Pengaduan masalah saluran air, banjir, atau ketersediaan air bersih', '2023-03-10 01:45:00', '2023-03-12 04:20:00'),
(4, 'Penerangan Jalan', 'Keluhan tentang lampu jalan yang mati atau kurang penerangan', '2023-04-05 09:30:00', '2023-04-07 03:15:00'),
(5, 'Fasilitas Umum', 'Laporan kerusakan fasilitas umum seperti taman, halte, atau trotoar', '2023-05-12 06:20:00', '2023-05-15 02:40:00'),
(6, 'Lingkungan Hidup', 'Pengaduan tentang pencemaran lingkungan atau perusakan alam', '2023-06-18 03:00:00', '2023-06-20 07:30:00'),
(7, 'Kesehatan Masyarakat', 'Keluhan terkait pelayanan kesehatan atau fasilitas kesehatan', '2023-07-22 04:45:00', '2023-07-25 01:15:00'),
(8, 'Transportasi Umum', 'Laporan tentang masalah angkutan umum atau halte transportasi', '2023-08-30 08:10:00', '2023-09-02 05:25:00'),
(9, 'Keamanan Lingkungan', 'Pengaduan tentang gangguan keamanan atau ketertiban umum', '2023-09-14 02:20:00', '2023-09-16 09:45:00'),
(10, 'Administrasi Publik', 'Keluhan terkait pelayanan administrasi atau dokumen kependudukan', '2023-10-05 07:00:00', '2023-10-08 03:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `log_status_pengaduan`
--

CREATE TABLE `log_status_pengaduan` (
  `id` int(11) NOT NULL,
  `pengaduan_id` int(11) NOT NULL,
  `status_laporan` enum('diproses','selesai','ditolak','diteruskan') NOT NULL,
  `catatan` text DEFAULT NULL,
  `waktu_perubahan` timestamp NOT NULL DEFAULT current_timestamp(),
  `petugas_id` int(11) DEFAULT NULL,
  `diteruskan_ke` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_status_pengaduan`
--

INSERT INTO `log_status_pengaduan` (`id`, `pengaduan_id`, `status_laporan`, `catatan`, `waktu_perubahan`, `petugas_id`, `diteruskan_ke`) VALUES
(1, 28, 'diteruskan', 'asdasd', '2025-06-20 02:16:50', NULL, 'DIshub'),
(2, 27, 'diteruskan', 'DI BAKAR  AJA BANG', '2025-06-20 03:30:59', NULL, 'DAMKAR'),
(3, 2, 'ditolak', 'OKK', '2025-06-20 03:36:03', NULL, NULL),
(4, 14, 'ditolak', 'asdasd', '2025-06-20 03:37:55', NULL, NULL),
(5, 31, 'diteruskan', 'MAKAN LAH', '2025-06-23 01:43:11', NULL, 'ASDASDasda');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(11) NOT NULL,
  `judul_laporan` varchar(255) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `ktp` varchar(20) DEFAULT NULL,
  `telegram_id` varchar(255) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `lokasi_kejadian` varchar(255) DEFAULT NULL,
  `isi_laporan` text DEFAULT NULL,
  `bukti_foto` varchar(255) DEFAULT NULL,
  `setuju` tinyint(1) DEFAULT 0,
  `status_laporan` enum('diproses','diteruskan','menunggu jawaban','selesai','ditolak') DEFAULT 'diproses',
  `tiket_lacak` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tanggapan` varchar(255) DEFAULT NULL,
  `surat_tindak` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `judul_laporan`, `nama`, `ktp`, `telegram_id`, `kategori`, `lokasi_kejadian`, `isi_laporan`, `bukti_foto`, `setuju`, `status_laporan`, `tiket_lacak`, `created_at`, `updated_at`, `tanggapan`, `surat_tindak`) VALUES
(1, 'Jalan Rusak Parah di Jl. Merdeka', 'Budi Santoso', '3275010101980001', NULL, 'infrastruktur', 'Jl. Merdeka No. 45, Jakarta Pusat', 'Terdapat lubang besar dengan diameter sekitar 1 meter dan kedalaman 30 cm di Jl. Merdeka dekat persimpangan dengan Jl. Sudirman. Lubang ini sudah ada sejak 2 minggu yang lalu dan semakin membesar akibat hujan deras. Sangat membahayakan pengendara terutama pada malam hari.', 'jalan_rusak.jpg', 1, 'selesai', 'TKT-20230001', '2023-01-15 01:30:45', '2023-01-20 07:15:22', 'Laporan sudah diterima dan ditindaklanjuti. Tim dari Dinas PUPR telah melakukan perbaikan jalan pada tanggal 18 Januari 2023. Permukaan jalan sudah rata dan aman untuk dilalui.', 0),
(2, 'Sampah Menumpuk di RW 05', 'Siti Aminah', '3275021502970002', NULL, 'sanitasi', 'Gang Flamboyan RT 03/RW 05, Kelurahan Cempaka', 'Sampah rumah tangga tidak diangkut selama 1 minggu terakhir dan sudah mulai menumpuk di depan pos RW. Bau tidak sedap mulai tercium dan dikhawatirkan akan menjadi sarang penyakit. Warga sudah mencoba menghubungi petugas kebersihan namun tidak ada respon.', 'tumpukan_sampah.jpg', 1, 'ditolak', 'TKT-20230002', '2023-02-05 07:20:33', '2025-06-20 03:33:55', 'OKK', 0),
(3, 'Kegaduhan di Lokasi Pembangunan Mall', 'Agus Wijaya', '3275032003880003', NULL, 'ketertiban_umum', 'Jl. Pemuda No. 12 (Lokasi Pembangunan Mall Central)', 'Pekerja konstruksi melakukan aktivitas hingga pukul 23.00 WIB dengan suara bising dari alat berat. Aktivitas ini sudah berlangsung selama 3 hari berturut-turut dan mengganggu istirahat warga sekitar, terutama anak-anak dan lansia yang membutuhkan ketenangan.', 'pembangunan_malam.jpg', 1, '', 'TKT-20230003', '2023-03-10 14:15:47', '2023-03-10 14:15:47', '', 0),
(4, 'Pohon Tumbang di Komplek Perumahan', 'Dewi Lestari', '3275040504900004', NULL, 'lingkungan', 'Perumahan Taman Asri Blok D2 No. 15', 'Pohon mangga besar di depan rumah saya tumbang akibat angin kencang semalam dan menutupi jalan masuk perumahan. Kendaraan tidak bisa lewat dan dikhawatirkan akan terjadi kecelakaan jika tidak segera ditangani.', 'pohon_tumbang.jpg', 0, 'ditolak', 'TKT-20230004', '2023-04-18 00:45:12', '2023-04-18 03:30:05', 'Laporan ditolak karena lokasi kejadian berada di area perumahan privat yang menjadi tanggung jawab pengelola perumahan. Silakan menghubungi pihak pengelola perumahan setempat untuk penanganan lebih lanjut.', 0),
(5, 'Banjir Setinggi 50cm di Permukiman', 'Rudi Hermawan', '3275051011850005', NULL, 'bencana', 'RT 05/RW 02 Kelurahan Suka Maju', 'Akibat hujan deras semalaman, wilayah kami tergenang air setinggi 50cm. Beberapa rumah sudah mulai kemasukan air. Warga membutuhkan bantuan pompa air dan peralatan darurat. Kondisi semakin parah karena saluran air tersumbat sampah.', 'banjir_permukiman.jpg', 1, 'diproses', 'TKT-20230005', '2023-05-21 23:30:18', '2023-05-22 01:45:30', 'Tim penanggulangan bencana sudah dikerahkan ke lokasi. Bantuan pompa air dan peralatan darurat sedang disiapkan. Warga diimbau untuk waspada dan mengungsi ke posko terdekat jika diperlukan.', 0),
(6, 'Lampu Jalan Mati di Sepanjang Jl. Kenanga', 'Linda Suryani', '3275062501910006', NULL, 'infrastruktur', 'Jl. Kenanga, dari perempatan Jl. Mawar sampai pertigaan Jl. Melati', 'Lampu jalan di sepanjang Jl. Kenanga tidak menyala selama 5 hari terakhir. Kondisi ini sangat berbahaya bagi pejalan kaki dan pengendara pada malam hari, terutama karena tidak ada penerangan alternatif. Sudah ada beberapa kasus nyaris kecelakaan.', 'lampu_mati.jpg', 1, 'selesai', 'TKT-20230006', '2023-06-07 12:20:55', '2023-06-09 09:40:12', 'Permasalahan disebabkan oleh kerusakan pada trafo listrik setempat. PLN telah memperbaiki gangguan tersebut dan semua lampu jalan sudah berfungsi normal sejak kemarin malam.', 0),
(7, 'Parkir Liar di Trotoar Depan Pasar', 'Fajar Setiawan', '3275070304840007', NULL, 'ketertiban_umum', 'Depan Pasar Indah Jaya, Jl. Pasar Baru', 'Banyak kendaraan terutama sepeda motor parkir di atas trotoar depan pasar, memaksa pejalan kaki turun ke jalan raya yang ramai kendaraan. Kondisi ini sudah berlangsung lama tetapi tidak ada tindakan dari petugas. Sangat membahayakan keselamatan pejalan kaki.', 'parkir_liar.jpg', 1, 'diproses', 'TKT-20230007', '2023-07-12 03:15:33', '2023-07-14 04:20:45', 'Kami telah berkoordinasi dengan satpol PP untuk melakukan penertiban. Akan dilakukan operasi rutin dan pemasangan rambu larangan parkir di lokasi tersebut.', 0),
(8, 'Air PDAM Keruh Sejak 3 Hari', 'Hendra Kurniawan', '3275081212870008', NULL, 'pelayanan_publik', 'Perumahan Griya Indah Blok B No. 8-15', 'Air yang mengalir dari PDAM sangat keruh dan berbau sejak 3 hari yang lalu. Warga terpaksa membeli air galon untuk kebutuhan sehari-hari. Keluhan ke call center PDAM tidak mendapatkan respon yang memadai.', 'air_keruh.jpg', 1, '', 'TKT-20230008', '2023-08-03 06:45:22', '2023-08-03 06:45:22', '', 0),
(9, 'Lingkungan Sekolah Tidak Aman', 'Nurhayati', '3275090905920009', NULL, 'pendidikan', 'SD Negeri 10, Jl. Pendidikan No. 45', 'Terdapat beberapa preman yang sering berkeliaran di sekitar gerbang sekolah pada jam pulang sekolah. Mereka mengganggu siswa dan meminta uang secara paksa. Beberapa siswa sudah menjadi korban. Dikhawatirkan akan terjadi hal yang lebih serius jika tidak ditangani.', 'lingkungan_sekolah.jpg', 1, 'diproses', 'TKT-20230009', '2023-09-01 08:30:11', '2023-09-02 02:15:40', 'Laporan telah diteruskan ke kepolisian sektor setempat. Akan dilakukan patroli rutin oleh Bhabinkamtibmas pada jam-jam rawan tersebut. Sekolah juga diimbau untuk meningkatkan pengawasan.', 0),
(10, 'Polusi Suara dari Pabrik Tekstil', 'Ahmad Fauzi', '3275100101800010', NULL, 'lingkungan', 'Kawasan Industri Jl. Raya Bekasi KM 12', 'Pabrik tekstil di kawasan industri mengoperasikan mesin-mesin berat hingga larut malam dengan tingkat kebisingan yang sangat mengganggu. Warga sekitar tidak bisa beristirahat dengan tenang. Kondisi ini sudah berlangsung selama 2 bulan terakhir.', 'pabrik_bising.jpg', 1, 'selesai', 'TKT-20230010', '2023-10-15 15:05:28', '2023-10-20 07:30:15', 'Setelah dilakukan pemeriksaan, pabrik telah diberikan sanksi administratif dan diwajibkan untuk memasang peredam suara serta membatasi jam operasi mesin berat maksimal sampai pukul 21.00 WIB.', 0),
(11, 'Bangunan Liar di Bantaran Sungai', 'Rina Marlina', '3275111811820011', NULL, 'tata_ruang', 'Bantaran Sungai Ciliwung, RT 04/RW 03', 'Ada pembangunan rumah semi permanen di bantaran sungai yang jelas-jelas melanggar peraturan tata ruang. Pembangunan ini sudah berlangsung 1 minggu dan dikhawatirkan akan mempersempit aliran sungai serta menyebabkan banjir saat musim hujan.', 'bangunan_liar.jpg', 1, 'diproses', 'TKT-20230011', '2023-11-05 02:40:17', '2023-11-07 03:25:33', 'Tim satpol PP bersama dinas tata ruang telah melakukan pemeriksaan ke lokasi. Sedang diproses penerbitan surat peringatan dan perintah pembongkaran.', 0),
(12, 'PKL Tutup Jalan Umum', 'Dedi Supriyadi', '3275122525840012', NULL, 'ketertiban_umum', 'Jl. Diponegoro depan Stasiun Kota', 'Pedagang kaki lima memenuhi badan jalan hingga menyisakan sedikit ruang untuk kendaraan lewat. Sering terjadi kemacetan panjang terutama pada jam sibuk. Sudah beberapa kali ada penertiban tetapi PKL kembali lagi keesokan harinya.', 'pkl_jalan.jpg', 1, '', 'TKT-20230012', '2023-12-10 10:50:42', '2023-12-10 10:50:42', '', 0),
(13, 'Anjing Terlantar dalam Kondisi Parah', 'Maya Fitriani', '3275130404900013', NULL, 'kesejahteraan_hewan', 'Komplek Villa Permai Blok C No. 12', 'Seekor anjing ras besar terlihat kurus dan terluka di sekitar komplek selama 3 hari terakhir. Kondisinya sangat memprihatinkan dengan luka di bagian punggung dan kesulitan berjalan. Diduga anjing ini ditinggalkan pemiliknya.', 'anjing_terlantar.jpg', 1, 'selesai', 'TKT-20230013', '2024-01-08 04:20:15', '2024-01-10 09:45:22', 'Anjing telah diselamatkan oleh tim dari organisasi perlindungan hewan setempat dan sedang menjalani perawatan di klinik hewan. Pencarian pemilik sedang dilakukan melalui media sosial.', 0),
(14, 'Angkot Tidak Beroperasi Sesuai Jadwal', 'Bambang Prasetyo', '3275140707780014', NULL, 'transportasi', 'Terminal Blok M - Rute Angkot 05', 'Angkot rute 05 sering tidak beroperasi sesuai jadwal, terutama pada pagi hari. Banyak warga yang harus menunggu hingga 1 jam lebih untuk mendapatkan angkot. Kondisi ini sangat merugikan masyarakat yang harus berangkat kerja atau sekolah tepat waktu.', 'angkot_tidak_ada.jpg', 1, 'ditolak', 'TKT-20230014', '2024-02-14 00:45:33', '2025-06-20 03:37:55', 'asdasd', 0),
(15, 'Pelayanan Puskesmas Lambat', 'Sri Wahyuni', '3275151211850015', NULL, 'kesehatan', 'Puskesmas Kelurahan Suka Damai', 'Antrian di puskesmas sangat panjang dengan pelayanan yang lambat. Banyak pasien terutama lansia harus menunggu berjam-jam. Beberapa fasilitas seperti kursi tunggu tidak memadai dan toilet tidak bersih.', 'puskesmas_ramai.jpg', 1, '', 'TKT-20230015', '2024-03-05 02:15:47', '2024-03-05 02:15:47', '', 0),
(26, 'Polusi udara tinggi', 'Sinta Dewi', '1623456789012345', NULL, '0', 'Industri Karanganyar', 'Debu pabrik masuk ke rumah warga.', 'pengaduan_foto/foto16.jpg', 1, 'diteruskan', 'TIKET-PPP678WXY6', '2025-04-02 08:20:00', '2025-06-20 02:13:13', 'asdasdasd', 0),
(27, 'Kebocoran gas', 'Gilang Ananda', '1723456789012345', NULL, '0', 'Perumahan Harapan Jaya', 'Tercium gas menyengat dari salah satu rumah.', 'pengaduan_foto/foto17.jpg', 1, 'diteruskan', 'TIKET-QQQ901ZAB7', '2025-01-26 23:50:00', '2025-06-20 03:30:59', 'DI BAKAR  AJA BANG', 0),
(28, 'Jambret berkeliaran', 'Putri Safira', '1823456789012345', NULL, '0', 'Jl. Slamet Riyadi', 'Banyak kasus penjambretan sore hari.', 'pengaduan_foto/foto18.jpg', 1, 'diteruskan', 'TIKET-RRR234CDE8', '2025-02-11 11:40:00', '2025-06-20 02:14:21', 'asdasd', 0),
(29, 'Selokan mampet', 'Rizky Hidayat', '1923456789012345', NULL, '0', 'Jl. Melur', 'Air tidak mengalir karena selokan tersumbat.', 'pengaduan_foto/foto19.jpg', 1, 'selesai', 'TIKET-SSS567FGH9', '2025-05-30 03:25:00', '2025-05-30 03:25:00', '', 0),
(30, 'Tertipu pinjaman online', 'Fajar Nugraha', '2023456789012345', NULL, '0', 'RT 06 RW 03', 'Ditagih pinjol padahal tidak pernah pinjam.', 'pengaduan_foto/foto20.jpg', 1, 'ditolak', 'TIKET-TTT890IJK0', '2025-07-14 05:10:00', '2025-07-14 05:10:00', '', 0),
(31, 'Saya Lapar', 'Galang', '1', NULL, 'Infrastruktur Jalan', 'Condongcatur', 'lorem ipsum', 'pengaduan_foto/DhMzr88A7ZAg2u0nPF66VG6yZT9pOSL8O6MUoiAy.jpg', 1, 'diteruskan', 'TIKET-A2LVTNA9VC', '2025-06-20 22:59:48', '2025-06-23 01:43:11', 'MAKAN LAH', NULL),
(32, 'Test Telegram', 'Test Telegram', '1', 'UsusBebek', 'Infrastruktur Jalan', '1', '1', 'pengaduan_foto/Yfw37QDCefNdgP7cvCNqtqI5HrgmPQo8rmqpQXuo.jpg', 1, 'diproses', 'TIKET-WZ1V8OXSPP', '2025-06-20 23:32:57', '2025-06-20 23:32:57', NULL, NULL),
(33, 'asdasd', 'asdasd', '1', '1367859837', 'Infrastruktur Jalan', '1', '1', 'pengaduan_foto/atMHQRd93EehsDi4JuvmBw81VXtnPYfEZWlgadhD.jpg', 1, 'diproses', 'TIKET-8POI2UPPZC', '2025-06-20 23:44:37', '2025-06-20 23:44:37', NULL, NULL),
(34, 'asd', '1', '1', '1367859837', 'Penerangan Jalan', 'asdasd', 'asdas', 'pengaduan_foto/OKhCmnH8JIUIWmDZLwSPkzzfgtCPWeBdsUqYYPgc.jpg', 1, 'diproses', 'TIKET-OBX2BELI9T', '2025-06-20 23:47:25', '2025-06-20 23:47:25', NULL, NULL),
(35, '1', '1', '1', '1367859837', 'Transportasi Umum', 'asd', 'asd', 'pengaduan_foto/S4I8JmJhw4Pvd0mR6c2hnE0GIt9jJrQyt2Ys87BN.jpg', 1, 'diproses', 'TIKET-F5EOBCSLTQ', '2025-06-20 23:49:43', '2025-06-20 23:49:43', NULL, NULL),
(36, 'sad', 'ANANDA GALANG SAPUTRA', '123333', '1367859837', 'Kesehatan Masyarakat', '1', '1', 'pengaduan_foto/dnnZGZalBtg1887X2TINP7zoJpc8kQb8R53XM4CZ.jpg', 1, 'diproses', 'TIKET-RWOG7NADZX', '2025-06-20 23:53:29', '2025-06-20 23:53:29', NULL, NULL),
(37, 'asdasd', 'ANANDA GALANG SAPUTRA', '123', '1367859837', 'Infrastruktur Jalan', 'asdasd', 'asdasd', 'pengaduan_foto/0uG0N5IVeb7Xj601qtREvCSv5ojapglP2tLcahZe.jpg', 1, 'diproses', 'TIKET-EAFEWQHAR8', '2025-06-21 00:47:12', '2025-06-21 00:47:12', NULL, NULL),
(38, 'Ducimus laborum ani', 'Sunt distinctio Vo', 'Velit est deleniti', '1367859837', 'Administrasi Publik', 'Officia deserunt com', 'Eligendi sit dignis', 'pengaduan_foto/OMd7gWpUqSdBGe2ZyS4WBgP0Uylpva0JpYZI9sFM.jpg', 1, 'diproses', 'TIKET-RZYCWOIHPW', '2025-06-21 00:47:56', '2025-06-21 00:47:56', NULL, NULL),
(39, 'Aliquip debitis dolo', 'ANANDA GALANG SAPUTRA', '12312874739323', '1367859837', 'Fasilitas Umum', 'WONOSOBO', 'Illo obcaecati proviasdjhajskdhjkahsdjkhasjkd', 'pengaduan_foto/vZfzagBohFoBRipK22JvjemYfLTswZOdhQdj6GD5.jpg', 1, 'diproses', 'TIKET-TO6QESJ99E', '2025-06-21 00:51:27', '2025-06-21 00:51:27', NULL, NULL),
(40, 'Totam error magna ab', 'Dolor sit similique', 'Quod placeat dolor', '1367859837', 'Keamanan Lingkungan', 'Qui obcaecati minus', 'Eum quia distinctio', 'pengaduan_foto/9sXF1ivqm60uG2xa7JEGMBPlX94wSQzzDLfRAOCX.jpg', 1, 'diproses', 'TIKET-UNFEXAK9LS', '2025-06-21 01:07:27', '2025-06-21 01:07:27', NULL, NULL),
(41, 'Praesentium mollitia', 'Libero ducimus eius', 'Quas in nemo perfere', '1367859837', 'Air dan Drainase', 'Qui saepe est in odi', 'Sed debitis dolores', 'pengaduan_foto/FUAZIysi9DMtxwHkSiXi3dm3fa9VFRLR3uIUSdEb.jpg', 1, 'diproses', 'TIKET-AMHN6CQU9P', '2025-06-21 01:16:44', '2025-06-21 01:16:44', NULL, NULL),
(42, 'awwsdasdasdasd', 'Qui provident exerc', 'Et enim reprehenderi', '1367859837', 'Fasilitas Umum', 'Unde ea ullam est c', 'Voluptate magna esse', 'pengaduan_foto/KgKcgWwRoeWIGxYuNabKEF4wHb7xRfvVLiYWuZWV.jpg', 1, 'diproses', 'TIKET-PGUMEIZGYP', '2025-06-21 01:24:26', '2025-06-21 01:24:26', NULL, NULL),
(43, 'Voluptas cillum omni', 'Earum quibusdam anim', 'Consectetur accusant', '1367859837', 'Fasilitas Umum', 'Corporis molestias m', 'Tenetur consequatur', 'pengaduan_foto/SQstwdUEys4BXFXyBzZDsLhmb5Dnu52iuMQsByrS.jpg', 1, 'diproses', 'TIKET-8OMOYDTDCF', '2025-06-21 08:17:10', '2025-06-21 08:17:10', NULL, NULL),
(44, 'Natus proident qui', 'Porro praesentium sa', 'Eveniet ut consequa', '1367859837', 'Penerangan Jalan', 'Vitae numquam dolore', 'In enim laboriosam', 'pengaduan_foto/VAZQ5cYjofSmvbLpX0tbShXKHdr2cNJQu6gTWNwC.jpg', 1, 'diproses', 'TIKET-RM5OHXJ73T', '2025-06-21 09:08:26', '2025-06-21 09:08:26', NULL, NULL),
(45, 'Natus proident qui', 'Porro praesentium sa', 'Eveniet ut consequa', '1367859837', 'Penerangan Jalan', 'Vitae numquam dolore', 'In enim laboriosam', 'pengaduan_foto/zmFQjWpXweVsSRWl03zRiMXB4ss1yojxES2RC05K.jpg', 1, 'diproses', 'TIKET-XA9CCMGACQ', '2025-06-21 09:08:29', '2025-06-21 09:08:29', NULL, NULL),
(46, 'Dolor hic totam aut', 'Harum ut fugiat lau', 'Reprehenderit facili', '1367859837', 'Kesehatan Masyarakat', 'Vel inventore soluta', 'Placeat esse quia u', 'pengaduan_foto/Q6DEtXfPbuB3mHNRbnmmfRJGFvSg6KHjRLI2KpgV.jpg', 1, 'diproses', 'TIKET-1YPIK1ETN4', '2025-06-21 09:16:54', '2025-06-21 09:16:54', NULL, NULL),
(47, 'Earum consequat Asp', 'Delectus ex et vel', 'Dolore qui tempore', '1367859837', 'Infrastruktur Jalan', 'Sit ut placeat et', 'Aliquam voluptates d', 'pengaduan_foto/8LYncrkvMb56vIrN5EGpmOpCu0RK4b58n4wQnd5R.jpg', 1, 'diproses', 'TIKET-F1HCCJ2XBK', '2025-06-21 09:17:32', '2025-06-21 09:17:32', NULL, NULL),
(48, 'Maiores impedit id', 'Fugit praesentium e', 'Fugiat est est dol', '1367859837', 'Air dan Drainase', 'Est aut quis facere', 'Qui ad asperiores ve', 'pengaduan_foto/py1LFTQfFYNowBWhtLRCwe8MdgdxZAzarUCcy2ru.jpg', 1, 'diproses', 'TIKET-OYIPOTM74Z', '2025-06-21 09:57:15', '2025-06-21 09:57:15', NULL, NULL),
(49, 'Suscipit et pariatur', 'Iusto ratione odio d', 'Necessitatibus neces', '6106963237', 'Kesehatan Masyarakat', 'Illo iure qui cupida', 'In minim quo volupta', 'pengaduan_foto/PkeABACTvRohOfQr2z0oaIMSfAuFcHrkD30ot3dw.jpg', 1, 'diproses', 'TIKET-MY5MBXABWS', '2025-06-21 10:02:09', '2025-06-21 10:02:09', NULL, NULL),
(50, 'Sunt quam eum sint d', 'Pariatur Ullam temp', 'Autem qui elit amet', '1367859837', 'Administrasi Publik', 'Debitis autem repudi', 'Ipsum numquam eius', 'pengaduan_foto/u3NiG82jGYsTulJ9zTywrD1tGkRj9Go3dOjRaEN1.jpg', 1, 'diproses', 'TIKET-IRQ6XN7X80', '2025-06-21 10:40:56', '2025-06-21 10:40:56', NULL, NULL),
(51, 'Magnam nobis non del', 'Eiusmod eu illum eo', 'Aliquid voluptatem e', '1367859837', 'Lingkungan Hidup', 'Pariatur Dolore est', 'Rerum ad inventore c', 'pengaduan_foto/whxSXb00l3MymkqWsijraOuIo0TAnxLanGAEkxWM.png', 1, 'diproses', 'TIKET-RDGVCFLDTV', '2025-06-23 01:35:36', '2025-06-23 01:35:36', NULL, NULL),
(52, 'pencabulan anak', 'rizal anggoro', '2214353252432', '1367859837', 'Lingkungan Hidup', 'maguwoharjo', 'pada malam itu ikhsan mencabuli anak di bawah umur secara brutal', 'pengaduan_foto/EuFUA0jEYx8fO3nNIy1RdBuvW5Mx1NhnDUF5LhAW.jpg', 1, 'diproses', 'TIKET-PCSDIRASFR', '2025-06-23 02:42:37', '2025-06-23 02:42:37', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `telegram_users`
--

CREATE TABLE `telegram_users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `chat_id` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `telegram_users`
--

INSERT INTO `telegram_users` (`id`, `username`, `chat_id`, `created_at`, `updated_at`) VALUES
(9, 'itsusernames', '6106963237', '2025-06-21 10:19:35', '2025-06-21 10:19:35'),
(10, 'UsusBebek', '1367859837', '2025-06-21 10:26:37', '2025-06-21 10:26:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `no_hp` varchar(15) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori_pengaduan`
--
ALTER TABLE `kategori_pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_status_pengaduan`
--
ALTER TABLE `log_status_pengaduan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengaduan_id` (`pengaduan_id`),
  ADD KEY `petugas_id` (`petugas_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tiket_lacak` (`tiket_lacak`);

--
-- Indexes for table `telegram_users`
--
ALTER TABLE `telegram_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

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
-- AUTO_INCREMENT for table `kategori_pengaduan`
--
ALTER TABLE `kategori_pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `log_status_pengaduan`
--
ALTER TABLE `log_status_pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `telegram_users`
--
ALTER TABLE `telegram_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log_status_pengaduan`
--
ALTER TABLE `log_status_pengaduan`
  ADD CONSTRAINT `log_status_pengaduan_ibfk_1` FOREIGN KEY (`pengaduan_id`) REFERENCES `pengaduan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `log_status_pengaduan_ibfk_2` FOREIGN KEY (`petugas_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
