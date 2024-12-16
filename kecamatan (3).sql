-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Des 2024 pada 05.18
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kecamatan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `arsip_bpjs`
--

CREATE TABLE `arsip_bpjs` (
  `id_arsip_bpjs` int(25) NOT NULL,
  `nik` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(300) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `telpon` int(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `formulir` varchar(255) DEFAULT NULL,
  `verifikasi` varchar(50) DEFAULT NULL,
  `nama_verifikator` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `arsip_bpjs`
--

INSERT INTO `arsip_bpjs` (`id_arsip_bpjs`, `nik`, `tanggal`, `nama`, `alamat`, `telpon`, `status`, `formulir`, `verifikasi`, `nama_verifikator`) VALUES
(1, '8279323918', '2024-11-20', 'test1', 'lpl;po;l', 4534535, 'uikul', NULL, 'Terverifikasi', 'wdwd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `arsip_skck`
--

CREATE TABLE `arsip_skck` (
  `id_arsip_skck` int(20) NOT NULL,
  `nama_ttl` varchar(200) NOT NULL,
  `pendidikan` varchar(500) NOT NULL,
  `agama` varchar(200) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `tanggal` date NOT NULL,
  `formulir` varchar(255) DEFAULT NULL,
  `verifikasi` varchar(50) DEFAULT NULL,
  `nama_verifikator` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `arsip_skck`
--

INSERT INTO `arsip_skck` (`id_arsip_skck`, `nama_ttl`, `pendidikan`, `agama`, `alamat`, `keterangan`, `tanggal`, `formulir`, `verifikasi`, `nama_verifikator`) VALUES
(1, '222233', '33333', '33333333', '33333333', '333333', '2024-11-05', '', '', ''),
(4, '4T4T4T4T', '4T4T4T', '4T4T4T4', 'T4T4TT', '4T4T4T4', '2024-11-05', '', 'Terverifikasi', NULL),
(222, '1222', '22222', '222', '22', '22222222', '2024-11-05', '', NULL, NULL),
(223, 'Ygguuh', 'Vbhh', 'Hh', 'Hai', 'Vvvb', '2024-11-07', '', 'Terverifikasi', '7'),
(224, 'Hendriansyah', 'wdwdw', 'dwdwdw', 'wdwdwdwd', 'wdwdwd', '2024-11-20', '673dd489e0a1a_Struktur Organisasi BTIKP.jpg', NULL, NULL),
(225, 'ascfsc', 'cscwfscfwf', 'wfdwfw', 'dwsdwdws', 'wdwdw', '2024-11-20', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `arsip_umum`
--

CREATE TABLE `arsip_umum` (
  `id_arsip_umum` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_ttl` varchar(500) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `ket` varchar(500) NOT NULL,
  `formulir` varchar(255) DEFAULT NULL,
  `verifikasi` varchar(50) DEFAULT NULL,
  `nama_verifikator` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `arsip_umum`
--

INSERT INTO `arsip_umum` (`id_arsip_umum`, `tanggal`, `nama_ttl`, `alamat`, `ket`, `formulir`, `verifikasi`, `nama_verifikator`) VALUES
(1, '2024-11-05', '22222222', '2222222222', '222222222', NULL, 'Terverifikasi', 'najwa'),
(2, '2024-11-07', 'Hajwjwj', 'Hai', 'Jsjsj', NULL, 'Terverifikasi', 'najwa'),
(3, '2024-11-20', 'wdwacd', 'adwedaw', 'wdadwa', '673dd5086af07_pngwing.com.png', NULL, NULL),
(4, '2024-11-20', 'adawd', 'awdwadaw', 'awddawd', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen_sktm`
--

CREATE TABLE `dokumen_sktm` (
  `id` int(11) NOT NULL,
  `sktm_path` varchar(255) DEFAULT NULL,
  `kk_path` varchar(255) DEFAULT NULL,
  `ktp_path` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dokumen_sktm`
--

INSERT INTO `dokumen_sktm` (`id`, `sktm_path`, `kk_path`, `ktp_path`, `user_id`) VALUES
(3, 'uploads/sktm/sktm_1734001730_Agus-Buntung-1.png', 'uploads/kk/kk_1734001730_WhatsApp Image 2024-12-10 at 11.54.12.jpeg', 'uploads/ktp/ktp_1734001730_WhatsApp Image 2024-12-10 at 11.54.42.jpeg', 7),
(4, 'uploads/sktm/sktm_1734002421_code.png', 'uploads/kk/kk_1734002421_code.png', 'uploads/ktp/ktp_1734002421_code.png', 1),
(5, 'uploads/sktm/675ba8579deea_WhatsApp Image 2024-11-28 at 10.39.45 (3).jpeg', '', '', 9),
(6, 'uploads/sktm/675babc0457a9_WhatsApp Image 2024-12-10 at 11.54.12.jpeg', 'uploads/kk/kk_1734061371_code.png', 'uploads/ktp/ktp_1734061371_code.png', 12),
(8, NULL, NULL, NULL, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_admin` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_admin`, `nama`, `username`, `password`, `level`) VALUES
(7, 'hendriansyah', 'hendri', '$2y$10$wlArgpCIgfK/7PsMv9CW5uMQdYJbGLekKSxAfjZLTNDouWlADlE9y', 'admin'),
(8, 'najwa', 'najwa', '$2y$10$1Axbg4ItV1YvlBYmmWqweOF7C5V.Fi.MrfvOK8GmJtn0noQPHKY3S', 'pegawai'),
(9, 'Lisa2', 'Lisa', '$2y$10$Y9Lki2X/q2fIHhTHBi9wdeFLMOR90.4uXUdXBHoOFD5UhDHE/Gutm', 'pegawai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sktm_berobat`
--

CREATE TABLE `sktm_berobat` (
  `id_sktm_berobat` int(100) NOT NULL,
  `no_KK` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_ttl` varchar(500) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `ket` varchar(500) NOT NULL,
  `formulir` varchar(255) DEFAULT NULL,
  `verifikasi` varchar(50) DEFAULT NULL,
  `nama_verifikator` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sktm_berobat`
--

INSERT INTO `sktm_berobat` (`id_sktm_berobat`, `no_KK`, `tanggal`, `nama_ttl`, `alamat`, `ket`, `formulir`, `verifikasi`, `nama_verifikator`) VALUES
(1, '6488494', '2024-11-07', 'Hai', 'Hshs', 'Bsbsb', NULL, 'Terverifikasi', 'najwa'),
(2, '8719237289792', '2024-11-20', 'rgergeg', 'fwfef', 'efefe', '673dcf18cca7d_WhatsApp Image 2024-11-18 at 15.54.50.jpeg', 'Terverifikasi', 'najwa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sktm_pend`
--

CREATE TABLE `sktm_pend` (
  `id_sktm_pendidikan` int(10) NOT NULL,
  `no_KK` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_ttl` varchar(500) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `ket` varchar(500) NOT NULL,
  `verifikasi` varchar(50) DEFAULT NULL,
  `nama_verifikator` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sktm_pend`
--

INSERT INTO `sktm_pend` (`id_sktm_pendidikan`, `no_KK`, `tanggal`, `nama_ttl`, `alamat`, `ket`, `verifikasi`, `nama_verifikator`) VALUES
(1, '9949844', '2024-11-07', 'Vvvv', 'Gggghai', 'Vvvv', 'Terverifikasi', '8'),
(2, '6464646', '2024-11-07', 'Clau', 'Dddd', 'Xxccx', 'Terverifikasi', 'eee'),
(3, '9494643', '2024-11-08', 'Test', 'Bdb d', 'Bsbsb', '', ''),
(7, '3423424234', '2024-12-12', 'najwa', 'pinus', 'untuk beasiswa tabe', NULL, NULL),
(8, '32343424', '2024-12-21', 'lisa', 'adcawdwq', 'qqrq3rq3r', NULL, NULL),
(9, '43453543', '2024-12-13', 'regregreg', 'eregeg', 'ergeer', NULL, NULL),
(10, '22232312313', '2024-12-18', 'lala', 'lala', 'lala', NULL, NULL),
(11, '53453453', '2024-12-13', 'lala', 'lala', 'lala', 'Terverifikasi', 'najwa1'),
(12, '55553252423', '2024-12-09', 'lala', 'lala', 'lala', 'Terverifikasi', 'najwa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `arsip_bpjs`
--
ALTER TABLE `arsip_bpjs`
  ADD PRIMARY KEY (`id_arsip_bpjs`);

--
-- Indeks untuk tabel `arsip_skck`
--
ALTER TABLE `arsip_skck`
  ADD PRIMARY KEY (`id_arsip_skck`);

--
-- Indeks untuk tabel `arsip_umum`
--
ALTER TABLE `arsip_umum`
  ADD PRIMARY KEY (`id_arsip_umum`);

--
-- Indeks untuk tabel `dokumen_sktm`
--
ALTER TABLE `dokumen_sktm`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id_2` (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `sktm_berobat`
--
ALTER TABLE `sktm_berobat`
  ADD PRIMARY KEY (`id_sktm_berobat`);

--
-- Indeks untuk tabel `sktm_pend`
--
ALTER TABLE `sktm_pend`
  ADD PRIMARY KEY (`id_sktm_pendidikan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `arsip_bpjs`
--
ALTER TABLE `arsip_bpjs`
  MODIFY `id_arsip_bpjs` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `arsip_skck`
--
ALTER TABLE `arsip_skck`
  MODIFY `id_arsip_skck` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT untuk tabel `arsip_umum`
--
ALTER TABLE `arsip_umum`
  MODIFY `id_arsip_umum` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `dokumen_sktm`
--
ALTER TABLE `dokumen_sktm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `sktm_berobat`
--
ALTER TABLE `sktm_berobat`
  MODIFY `id_sktm_berobat` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sktm_pend`
--
ALTER TABLE `sktm_pend`
  MODIFY `id_sktm_pendidikan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dokumen_sktm`
--
ALTER TABLE `dokumen_sktm`
  ADD CONSTRAINT `dokumen_sktm_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `sktm_pend` (`id_sktm_pendidikan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
