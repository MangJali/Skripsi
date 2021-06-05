-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jun 2021 pada 07.03
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ponpes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensis`
--

CREATE TABLE `absensis` (
  `id_absensi` int(11) NOT NULL,
  `hadir` int(11) NOT NULL,
  `ijin` int(11) NOT NULL,
  `alpha` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nis` varchar(255) NOT NULL,
  `kodemapel` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `absensis`
--

INSERT INTO `absensis` (`id_absensi`, `hadir`, `ijin`, `alpha`, `created_at`, `updated_at`, `nis`, `kodemapel`) VALUES
(1, 0, 0, 0, '2021-06-04 19:59:10', '2021-06-04 19:59:10', '123456789', 'MP001'),
(2, 0, 0, 0, '2021-06-04 19:59:10', '2021-06-04 19:59:10', '123456789', 'k3001'),
(3, 0, 0, 0, '2021-06-04 19:59:10', '2021-06-04 19:59:10', '45641', 'MP001'),
(4, 0, 0, 0, '2021-06-04 19:59:10', '2021-06-04 19:59:10', '45641', 'k3001'),
(5, 0, 0, 0, '2021-06-04 19:59:10', '2021-06-04 19:59:10', '45641222', 'MP001'),
(6, 0, 0, 0, '2021-06-04 19:59:10', '2021-06-04 19:59:10', '45641222', 'k3001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelases`
--

CREATE TABLE `kelases` (
  `kodekelas` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kelases`
--

INSERT INTO `kelases` (`kodekelas`, `kelas`, `id_semester`, `created_at`, `updated_at`) VALUES
('1', 'I Sanawiyah ', 1, '2021-05-29 17:00:00', '2021-05-29 17:00:00'),
('2', 'I Sanawiyah', 2, '2021-05-29 17:00:00', '2021-05-29 17:00:00'),
('3', 'II Sanawiyah', 1, '2021-05-29 17:00:00', '2021-05-29 17:00:00'),
('4', 'II Sanawiyah', 2, '2021-05-29 17:00:00', '2021-05-29 17:00:00'),
('5', 'III Sanawiyah', 1, '2021-05-29 17:00:00', '2021-05-29 17:00:00'),
('6', 'III Sanawiyah', 2, '2021-05-29 17:00:00', '2021-05-29 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matapelajarans`
--

CREATE TABLE `matapelajarans` (
  `kodemapel` varchar(255) NOT NULL,
  `matapelajaran` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `matapelajarans`
--

INSERT INTO `matapelajarans` (`kodemapel`, `matapelajaran`, `nip`, `id_semester`, `created_at`, `updated_at`) VALUES
('MP001', 'Bahasa Arab', '111100012021', 1, '2021-05-30 06:47:12', '2021-05-30 06:47:12'),
('k3001', 'Matematika', '111100012021', 1, '2021-06-01 15:35:30', '2021-06-01 15:35:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_05_08_190124_create_nilais_table', 1),
(5, '2021_05_08_192237_create_matapelajarans_table', 1),
(6, '2021_05_08_193538_create_siswas_table', 1),
(7, '2021_05_08_193607_create_tenagapendidiks_table', 1),
(8, '2021_05_08_193854_create_absensis_table', 1),
(9, '2021_05_19_070243_create_ulanganharians_table', 1),
(10, '2021_05_19_070421_create_ujiantengahsemesters_table', 1),
(11, '2021_05_19_070441_create_ujianakhirsemesters_table', 1),
(12, '2021_05_21_081259_create_semesters_table', 1),
(13, '2021_05_22_205545_create_kelases_table', 1),
(14, '2021_05_29_162832_create_tugassiswas_table', 1),
(15, '2021_06_01_085347_add_column_role_user', 2),
(16, '2021_06_01_092356_add_column_role_user', 3),
(17, '2021_06_02_015516_add_userid_on_table_tenaga_pendidik', 4),
(18, '2021_06_02_015518_add_userid_on_table_tenaga_pendidik', 5),
(19, '2021_06_02_015521_add_userid_on_table_tenaga_pendidik', 6),
(20, '2021_06_02_055516_add_userid_on_table_siswaa', 7),
(21, '2021_06_02_055517_add_userid_on_table_siswaa', 8),
(22, '2021_06_02_055300_add_userid_on_table_siswaa', 9),
(23, '2021_06_02_060345_add_userid_on_table_siswaa', 10),
(24, '2021_06_05_015429_add_new_colum_to_absensi', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilais`
--

CREATE TABLE `nilais` (
  `id` int(11) NOT NULL,
  `kodemapel` char(5) NOT NULL,
  `namamapel` varchar(255) NOT NULL,
  `tugas1` int(11) NOT NULL,
  `tugas2` int(11) NOT NULL,
  `tugas3` int(11) NOT NULL,
  `tugas4` int(11) NOT NULL,
  `ulanganharian` int(11) NOT NULL,
  `ujiantengahsemester` int(11) NOT NULL,
  `tugas5` int(11) NOT NULL,
  `ujianakhirsemester` int(11) NOT NULL,
  `nilaiakhir` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `semesters`
--

CREATE TABLE `semesters` (
  `id_semester` int(11) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `semesters`
--

INSERT INTO `semesters` (`id_semester`, `semester`, `created_at`, `updated_at`) VALUES
(1, 'Ganjil', '2021-05-29 17:00:00', '2021-05-29 17:00:00'),
(2, 'Genap', '2021-05-29 17:00:00', '2021-05-29 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswas`
--

CREATE TABLE `siswas` (
  `nis` varchar(9) NOT NULL,
  `namalengkap` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tempatlahir` varchar(255) NOT NULL,
  `tanggallahir` varchar(255) NOT NULL,
  `jeniskelamin` varchar(255) NOT NULL,
  `sekolahumum` varchar(255) NOT NULL,
  `kodekelas` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `userid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `siswas`
--

INSERT INTO `siswas` (`nis`, `namalengkap`, `alamat`, `tempatlahir`, `tanggallahir`, `jeniskelamin`, `sekolahumum`, `kodekelas`, `created_at`, `updated_at`, `userid`) VALUES
('123456789', 'Husain Alatas', 'Jalan Raya Nganjuk', 'Pasuruan', '2006-05-05', 'Laki Laki', 'SMP AL-Hikmah', '1', '2021-05-30 06:48:15', '2021-05-30 06:48:15', 3),
('45641', 'Dedny', 'lumajang', 'lumajang', '2020-12-30', 'Laki-laki', 'a', '1', '2021-06-01 06:28:58', '2021-06-01 06:28:58', 6),
('45641222', 'bejo', 'lumajang', 'lumajang', '2021-03-31', 'Laki-laki', 'a', '1', '2021-06-02 00:17:30', '2021-06-02 00:17:30', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tenagapendidiks`
--

CREATE TABLE `tenagapendidiks` (
  `nip` bigint(20) NOT NULL,
  `namapendidik` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jeniskelamin` char(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `userid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tenagapendidiks`
--

INSERT INTO `tenagapendidiks` (`nip`, `namapendidik`, `alamat`, `jeniskelamin`, `created_at`, `updated_at`, `userid`) VALUES
(111100012021, 'Rizal Zaeny', 'Jalan Gembong Pasuruan', 'Laki laki', '2021-05-30 06:47:00', '2021-05-30 06:47:00', 2),
(112233, 'feri', 'lumj', 'Laki laki', '2021-06-01 18:46:45', '2021-06-01 18:46:45', 4),
(990099, 'suteno', 'jombang', 'Laki laki', '2021-06-01 19:07:06', '2021-06-01 19:07:06', 5),
(112233445, 'Junaedi', 'lumajang', 'Laki laki', '2021-06-04 21:16:21', '2021-06-04 21:16:21', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugassiswas`
--

CREATE TABLE `tugassiswas` (
  `id_tugas` int(11) NOT NULL,
  `kodemapel` varchar(255) NOT NULL,
  `nis` varchar(9) NOT NULL,
  `tugas1` int(11) DEFAULT NULL,
  `tugas2` int(11) DEFAULT NULL,
  `tugas3` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tugassiswas`
--

INSERT INTO `tugassiswas` (`id_tugas`, `kodemapel`, `nis`, `tugas1`, `tugas2`, `tugas3`, `created_at`, `updated_at`) VALUES
(1, 'MP001', '123456789', 30, 20, 10, '2021-06-01 18:28:30', '2021-06-04 20:54:07'),
(2, 'k3001', '123456789', 12, 14, 55, '2021-06-01 18:28:30', '2021-06-04 03:58:02'),
(3, 'MP001', '45641', 10, 9, 8, '2021-06-01 18:28:30', '2021-06-04 04:05:21'),
(4, 'k3001', '45641', 1, 2, 3, '2021-06-01 18:28:30', '2021-06-04 03:58:57'),
(5, 'MP001', '45641222', 1, 2, 3, '2021-06-03 17:08:14', '2021-06-04 03:55:45'),
(6, 'k3001', '45641222', NULL, NULL, NULL, '2021-06-03 17:08:14', '2021-06-03 17:08:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujianakhirsemesters`
--

CREATE TABLE `ujianakhirsemesters` (
  `id_uas` int(11) NOT NULL,
  `kodemapel` varchar(255) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `ujianakhirsemester` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `ujianakhirsemesters`
--

INSERT INTO `ujianakhirsemesters` (`id_uas`, `kodemapel`, `nis`, `ujianakhirsemester`, `created_at`, `updated_at`) VALUES
(1, 'MP001', '123456789', '10', '2021-06-04 03:14:33', '2021-06-04 03:20:29'),
(2, 'k3001', '123456789', NULL, '2021-06-04 03:14:33', '2021-06-04 03:14:33'),
(3, 'MP001', '45641', NULL, '2021-06-04 03:14:33', '2021-06-04 03:14:33'),
(4, 'k3001', '45641', NULL, '2021-06-04 03:14:33', '2021-06-04 03:14:33'),
(5, 'MP001', '45641222', NULL, '2021-06-04 03:14:33', '2021-06-04 03:14:33'),
(6, 'k3001', '45641222', NULL, '2021-06-04 03:14:33', '2021-06-04 03:14:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujiantengahsemesters`
--

CREATE TABLE `ujiantengahsemesters` (
  `id_uts` int(11) NOT NULL,
  `kodemapel` varchar(255) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `ujiantengahsemester` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `ujiantengahsemesters`
--

INSERT INTO `ujiantengahsemesters` (`id_uts`, `kodemapel`, `nis`, `ujiantengahsemester`, `created_at`, `updated_at`) VALUES
(1, 'MP001', '123456789', '10', '2021-06-04 03:09:34', '2021-06-04 03:10:48'),
(2, 'k3001', '123456789', '1', '2021-06-04 03:09:34', '2021-06-04 03:21:08'),
(3, 'MP001', '45641', NULL, '2021-06-04 03:09:34', '2021-06-04 03:09:34'),
(4, 'k3001', '45641', NULL, '2021-06-04 03:09:34', '2021-06-04 03:09:34'),
(5, 'MP001', '45641222', NULL, '2021-06-04 03:09:34', '2021-06-04 03:09:34'),
(6, 'k3001', '45641222', NULL, '2021-06-04 03:09:34', '2021-06-04 03:09:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulanganharians`
--

CREATE TABLE `ulanganharians` (
  `id_uh` int(11) NOT NULL,
  `kodemapel` varchar(255) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `ulanganharian1` varchar(255) DEFAULT NULL,
  `ulanganharian2` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `ulanganharians`
--

INSERT INTO `ulanganharians` (`id_uh`, `kodemapel`, `nis`, `ulanganharian1`, `ulanganharian2`, `created_at`, `updated_at`) VALUES
(1, 'MP001', '123456789', '2', '3', '2021-06-01 23:26:36', '2021-06-04 03:02:31'),
(2, 'k3001', '123456789', NULL, NULL, '2021-06-01 23:26:36', '2021-06-04 03:02:34'),
(3, 'MP001', '45641', NULL, NULL, '2021-06-01 23:26:36', '2021-06-01 23:26:36'),
(4, 'k3001', '45641', NULL, NULL, '2021-06-01 23:26:36', '2021-06-04 03:02:37'),
(5, 'MP001', '45641222', '1', '1', '2021-06-03 17:08:42', '2021-06-04 03:02:40'),
(6, 'k3001', '45641222', '29', '30', '2021-06-03 17:08:42', '2021-06-04 03:00:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'feri1', 'feri1@gmail.com', NULL, '$2y$10$AGdZtGaTrF7MrilSi8Mqx.G2MxRPkGfAR0MLzH5CcoLx/CSNqyHVi', 'gOBRgf1Txh4ctGIAAMqd93adv2CbFbdPvnhoIBTLVny3tmI0iagjCFyoxiFS', '2021-06-01 01:57:26', '2021-06-01 01:57:26', 'admin'),
(2, 'feri2', '111100012021', NULL, '$2y$10$ScOVA89Zu84Jhnknaj9WlegOt21zpYZIkoWrgHcRNzOdMcureEBku', NULL, '2021-06-01 02:32:23', '2021-06-01 02:32:23', 'guru'),
(3, 'feri3', 'feri3@gmail.com', NULL, '$2y$10$JAhlG0h6QRzkLXEvxv7dt.txQnqrPx8VbYgpdJ.a8.gTQI7zD1s1i', NULL, '2021-06-01 02:33:08', '2021-06-01 02:33:08', 'ortu'),
(4, 'feri', '112233', NULL, '$2y$10$dCIKAePCdloQe.vOOFt8v.hA6rVHDONtBC9AOa8shc91kRVnRdQK.', NULL, '2021-06-01 18:46:45', '2021-06-01 18:46:45', 'guru'),
(5, 'suteno', '990099', NULL, '$2y$10$tGRGR6zaA2rq57NjYkPNwOljgWvperKW1q8/Tc7Zorz.pG0GYW/pW', '1ot8Xy8VDGDUt72KSSQSQylulDHaRJJx9L5YmOpNN7g2RsIA3XzTISAu7vmg', '2021-06-01 19:07:06', '2021-06-01 19:07:06', 'guru'),
(6, 'Dedny', '45641', NULL, '$2y$10$6V5AQNNog535KP2eU9mMIOpMI5TfEEZHKjRekGl002lfxhb5da50y', NULL, '2021-06-01 23:09:12', '2021-06-01 23:09:12', 'ortu'),
(8, 'bejo', '45641222', NULL, '$2y$10$sXZvyv5O6.wp8PA4MJT33.S04.d1HapLmL7bjEhjXmUk.wwi2LH1y', NULL, '2021-06-02 00:17:30', '2021-06-02 00:17:30', 'ortu'),
(9, 'fe', '123456789', NULL, '$2y$10$fViwI/TNjSKbE3WqMGak9.Zn25ybLMK/qYKjZG3R/uXFf2FMXgBYS', NULL, '2021-06-04 21:01:22', '2021-06-04 21:01:22', 'ortu'),
(10, 'Junaedi', '112233445', NULL, '$2y$10$gNFwzaTThMluJAZbLdx9N.e6NL1YriGQb461ubWcbyCFbDBPoVX/.', NULL, '2021-06-04 21:16:21', '2021-06-04 21:16:21', 'guru');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensis`
--
ALTER TABLE `absensis`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kelases`
--
ALTER TABLE `kelases`
  ADD PRIMARY KEY (`kodekelas`),
  ADD KEY `kelases_id_semester_foreign` (`id_semester`);

--
-- Indeks untuk tabel `matapelajarans`
--
ALTER TABLE `matapelajarans`
  ADD PRIMARY KEY (`kodemapel`),
  ADD KEY `matapelajarans_nip_foreign` (`nip`),
  ADD KEY `matapelajarans_id_semester_foreign` (`id_semester`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilais`
--
ALTER TABLE `nilais`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indeks untuk tabel `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `siswas_kodekelas_foreign` (`kodekelas`);

--
-- Indeks untuk tabel `tenagapendidiks`
--
ALTER TABLE `tenagapendidiks`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `tugassiswas`
--
ALTER TABLE `tugassiswas`
  ADD PRIMARY KEY (`id_tugas`),
  ADD KEY `tugassiswas_kodemapel_foreign` (`kodemapel`),
  ADD KEY `tugassiswas_nis_foreign` (`nis`);

--
-- Indeks untuk tabel `ujianakhirsemesters`
--
ALTER TABLE `ujianakhirsemesters`
  ADD PRIMARY KEY (`id_uas`),
  ADD KEY `ujianakhirsemesters_kodemapel_foreign` (`kodemapel`),
  ADD KEY `ujianakhirsemesters_nis_foreign` (`nis`);

--
-- Indeks untuk tabel `ujiantengahsemesters`
--
ALTER TABLE `ujiantengahsemesters`
  ADD PRIMARY KEY (`id_uts`),
  ADD KEY `ujiantengahsemesters_kodemapel_foreign` (`kodemapel`),
  ADD KEY `ujiantengahsemesters_nis_foreign` (`nis`);

--
-- Indeks untuk tabel `ulanganharians`
--
ALTER TABLE `ulanganharians`
  ADD PRIMARY KEY (`id_uh`),
  ADD KEY `ulanganharians_kodemapel_foreign` (`kodemapel`),
  ADD KEY `ulanganharians_nis_foreign` (`nis`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensis`
--
ALTER TABLE `absensis`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `nilais`
--
ALTER TABLE `nilais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tugassiswas`
--
ALTER TABLE `tugassiswas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ujianakhirsemesters`
--
ALTER TABLE `ujianakhirsemesters`
  MODIFY `id_uas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ujiantengahsemesters`
--
ALTER TABLE `ujiantengahsemesters`
  MODIFY `id_uts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ulanganharians`
--
ALTER TABLE `ulanganharians`
  MODIFY `id_uh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
