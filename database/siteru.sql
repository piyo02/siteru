-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 10 Des 2021 pada 02.55
-- Versi Server: 5.7.36-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siteru`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `attachments`
--

CREATE TABLE `attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `violation_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `configs`
--

CREATE TABLE `configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shortcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `configs`
--

INSERT INTO `configs` (`id`, `shortcode`, `field`, `value`, `created_at`, `updated_at`) VALUES
(1, 'NM-KBD-PR', 'Nama Kabid. Penataan Ruang', 'SEKO KAIMUDDIN HARIS, ST.,M.PW', '2021-12-09 09:42:03', '2021-12-09 09:42:03'),
(2, 'NIP-KBD-PR', 'NIP Kabid. Penataan Ruang', '19791017 200604 1 016', '2021-12-09 09:42:03', '2021-12-09 09:42:03'),
(3, 'TTD-KBD-PR', 'TTD Kabid. Penataan Ruang', 'images/configs/ttd.png', '2021-12-09 09:42:03', '2021-12-09 09:42:03'),
(4, 'VS-MS', 'Visi dan Misi', 'public/uploads/configs/visi-misi.html', '2021-12-09 09:42:03', '2021-12-09 09:42:03'),
(5, 'TGS-FGS', 'Tugas dan Fungsi', 'public/uploads/configs/tugas-fungsi.html', '2021-12-09 09:42:03', '2021-12-09 09:42:03'),
(6, 'MT-LBG', 'Motto dan Lambang', 'public/uploads/configs/motto-lambang.html', '2021-12-09 09:42:03', '2021-12-09 09:42:03'),
(7, 'STR-ORG', 'Struktur Organisasi', 'images/configs//6XWGTPkxQheKBO4aYI6xk4giiWXWdCzsqLjnucuL.jpg', '2021-12-09 09:42:03', '2021-12-09 10:31:15'),
(8, 'SLD-1', 'Slide 1', 'images/configs/slide-1.png', '2021-12-09 09:42:03', '2021-12-09 09:42:03'),
(9, 'SLD-2', 'Slide 2', 'images/configs/slide-2.png', '2021-12-09 09:42:03', '2021-12-09 09:42:03'),
(10, 'SLD-3', 'Slide 3', 'images/configs/slide-3.png', '2021-12-09 09:42:03', '2021-12-09 09:42:03'),
(11, 'VD', 'Pedestrian Kota Kendari', 'uploads/videos/Pedestrian Kota Kendari.mp4', '2021-12-09 09:42:03', '2021-12-09 09:50:00'),
(12, 'VD', 'Taman Cinta Kendari', 'uploads/videos/Taman Cinta Kendari.mp4', '2021-12-09 09:42:03', '2021-12-09 09:42:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact_type`
--

CREATE TABLE `contact_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/icons/default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `contact_type`
--

INSERT INTO `contact_type` (`id`, `type`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Telepon', 'images/icons/telephone.png', '2021-12-09 09:42:03', '2021-12-09 09:42:03'),
(2, 'Instagram', 'images/icons/instagram.png', '2021-12-09 09:42:03', '2021-12-09 09:42:03'),
(3, 'Facebook', 'images/icons/facebook.png', '2021-12-09 09:42:03', '2021-12-09 09:42:03'),
(4, 'YouTube', 'images/icons/youtube.png', '2021-12-09 09:42:03', '2021-12-09 09:42:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/publish/galleries/galleries.jpg',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `sector_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `galleries`
--

INSERT INTO `galleries` (`id`, `thumbnail`, `slug`, `date`, `title`, `created_by`, `sector_id`, `created_at`, `updated_at`) VALUES
(1, 'images/publish/galleries/gAJ4LbZo4z2N3TAvztNZDqSzOlSo5VbZxDGCb2sw.jpg', 'peningkatan-sarana-dan-prasarana-pelayanan-air-minum', '2021-10-01', 'Peningkatan Sarana dan Prasarana Pelayanan Air Minum', 1, 4, '2021-12-09 10:47:02', '2021-12-09 10:47:02'),
(2, 'images/publish/galleries/XpjnYOIyCL4aBb672pzn6D5DU3hlc9THtE33C4pD.jpg', 'pemasangan-pipa-bawah-tanah', '2021-09-01', 'Pemasangan Pipa Bawah Tanah', 1, 4, '2021-12-09 10:47:38', '2021-12-09 10:47:38'),
(3, 'images/publish/galleries/E0f72fDY5rX7T9ItOJVxJPvgWI1vN5B69G71C4LW.jpg', 'pemasangan-saluran-air', '2021-08-26', 'Pemasangan Saluran Air', 1, 4, '2021-12-09 10:48:19', '2021-12-09 10:48:19'),
(4, 'images/publish/galleries/Hjzt9hGldwsX14cgz7L7e6rZUoaky2DQsKQHngj4.jpg', 'kunjungan-ke-pasar-lokal', '2021-07-22', 'Kunjungan ke Pasar Lokal', 1, 3, '2021-12-09 10:49:03', '2021-12-09 10:49:03'),
(5, 'images/publish/galleries/Gv2MZ24bV84wEPmV4IDolpe5V1DNqMgFgfnaslqX.jpg', 'perbaikan-kerusakah-jalan', '2021-12-10', 'Perbaikan Kerusakah Jalan', 1, 3, '2021-12-09 10:49:44', '2021-12-09 10:49:44'),
(6, 'images/publish/galleries/h66vqFGhsOwgGER3wJMY0zO0TvxfQV8oqDZ3AVAC.jpg', 'kunjungan-kerja', '2021-12-01', 'Kunjungan Kerja', 1, 7, '2021-12-09 10:50:31', '2021-12-09 10:50:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `infrastructures`
--

CREATE TABLE `infrastructures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sector_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `maps`
--

CREATE TABLE `maps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_30_092519_create_roles_table', 1),
(6, '2021_09_30_092553_create_sectors_table', 1),
(7, '2021_09_30_092655_create_contact_type_table', 1),
(8, '2021_09_30_092732_create_news_table', 1),
(9, '2021_09_30_092927_create_galleries_table', 1),
(10, '2021_09_30_093003_create_policies_table', 1),
(11, '2021_09_30_093029_create_sector_contact_table', 1),
(12, '2021_10_02_001620_add_role_id_to_users_table', 1),
(13, '2021_10_18_150424_create_violations_table', 1),
(14, '2021_10_20_060824_create_configs_table', 1),
(15, '2021_10_25_143612_add_sector_id_to_users_table', 1),
(16, '2021_10_28_133904_create_officials_table', 1),
(17, '2021_12_01_103936_create_maps_table', 1),
(18, '2021_12_09_133723_attachments', 1),
(19, '2021_12_09_135128_create_teams_table', 1),
(20, '2021_12_09_141441_add_team_id_to_violations_table', 1),
(21, '2021_12_09_153410_infrastructures', 1),
(22, '2021_12_09_160340_regions', 1),
(23, '2021_12_09_160619_region_coordinates', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `sector_id` bigint(20) UNSIGNED NOT NULL,
  `seen` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id`, `slug`, `date`, `description`, `file`, `thumbnail`, `title`, `created_by`, `sector_id`, `seen`, `created_at`, `updated_at`) VALUES
(1, 'suasana-pengunjung-jembatan-kuning-bungkutoko-saat-weekend-di-kota-kendari', '2021-06-20', 'Jembatan yang berlokasi di Kelurahan Bungkutoko, Kecamatan Abeli, Kota Kendari, Sulawesi Tenggara (Sultra), ini menyuguhkan pemandangan lain sudut Kota Kendari.', 'public/uploads/news/suasana-pengunjung-jembatan-kuning-bungkutoko-saat-weekend-di-kota-kendari.html', 'images/publish/news/mNoae5nBJH7eSWCarDLRSTiGl2C4CwBE0UGoJPGO.jpg', 'Suasana Pengunjung Jembatan Kuning Bungkutoko saat Weekend di Kota Kendari', 1, 5, 0, '2021-12-07 18:26:02', '2021-12-09 10:33:18'),
(2, 'wali-kota-kendari-beberkan-program-penanganan-sampah-pada-mahasiswa-uho', '2021-08-24', 'Puluhan mahasiswa Kuliah Kerja Nyata (KKN) Universitas Halu Oleo (UHO) berjumpa dengan Wali Kota Kendari Sulkarnain Kadir dalam bincang tokoh di Rumah Jabatan (Rujab) Wali Kota, Selasa (24/8/2021).', 'public/uploads/news/wali-kota-kendari-beberkan-program-penanganan-sampah-pada-mahasiswa-uho.html', 'images/publish/news/yIlzOaecALfLAKJlI8GGbFeRKi1ZwNQtUyYTQhQt.jpg', 'Wali Kota Kendari Beberkan Program Penanganan Sampah pada Mahasiswa UHO', 1, 3, 0, '2021-12-09 10:39:39', '2021-12-09 10:39:39'),
(3, '32-warga-kemaraya-dan-kendari-caddi-terima-dana-stimulan-perbaikan-rumah', '2021-08-20', '16 Kepala Keluarga (KK) kembali menerima stimulan rumah swadaya di Kelurahan Kemaraya, Jumat (20/8/2021).', 'public/uploads/news/32-warga-kemaraya-dan-kendari-caddi-terima-dana-stimulan-perbaikan-rumah.html', 'images/publish/news/n1RZswlT45fUwg7xEVmeZaEqqE6IjwBZlF4XTxg1.jpg', '32 Warga Kemaraya dan Kendari Caddi Terima Dana Stimulan Perbaikan Rumah', 1, 6, 0, '2021-12-09 10:41:35', '2021-12-09 10:41:35'),
(4, 'wali-kota-kendari-sulkarnain-kadir-sambangi-enam-keluarga-korban-kebakaran-di-andonohu', '2021-06-27', 'Kendarikota.go.id – Enam keluarga yang bermukim di rumah kos milik Ibu Roslianawati habis dilahap si jago merah pada Sabtu (14/8/2021) pekan lalu.', 'public/uploads/news/wali-kota-kendari-sulkarnain-kadir-sambangi-enam-keluarga-korban-kebakaran-di-andonohu.html', 'images/publish/news/kIkbVPGz1hXapYeQE211oMuN480U0tybkRGUps8p.jpg', 'Wali Kota Kendari Sulkarnain Kadir Sambangi Enam Keluarga Korban Kebakaran di Andonohu', 1, 6, 0, '2021-12-09 10:44:33', '2021-12-09 10:44:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `officials`
--

CREATE TABLE `officials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/officials/official.jpg',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'uploads/officials/official.html',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `officials`
--

INSERT INTO `officials` (`id`, `name`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Ketua', 'images/officials/official.jpg', 'uploads/officials/official.html', '2021-12-09 09:42:03', '2021-12-09 09:42:03'),
(2, 'Wakil Ketua', 'images/officials/official.jpg', 'uploads/officials/official.html', '2021-12-09 09:42:03', '2021-12-09 09:42:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `policies`
--

CREATE TABLE `policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `sector_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `policies`
--

INSERT INTO `policies` (`id`, `file`, `title`, `slug`, `description`, `created_by`, `sector_id`, `created_at`, `updated_at`) VALUES
(1, 'uploads/policies/KQ7m1Kcct5TNZSpghR7rKkIqHnCXel3770kxuuBO.pdf', 'Perda Kota Kendari', 'perda-kota-kendari', 'Perda Kota Kendari', 1, 1, '2021-12-09 10:51:55', '2021-12-09 10:51:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `village` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Shape_Leng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Shape_Area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_use` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `region_coordinates`
--

CREATE TABLE `region_coordinates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `long` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'role admin', '2021-12-09 09:42:03', '2021-12-09 09:42:03'),
(2, 'User Admin', 'user-admin', 'role uadmin', '2021-12-09 09:42:03', '2021-12-09 09:42:03'),
(3, 'User Sector', 'user-sector', 'role usector', '2021-12-09 09:42:03', '2021-12-09 09:42:03'),
(4, 'Satuan Tugas', 'satuan-tugas', 'role usector', '2021-12-09 09:42:03', '2021-12-09 09:42:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sectors`
--

CREATE TABLE `sectors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/configs/organization.png',
  `structure` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/structures/structures.jpg',
  `program` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sectors`
--

INSERT INTO `sectors` (`id`, `name`, `slug`, `icon`, `structure`, `program`, `job`, `purpose`, `created_at`, `updated_at`) VALUES
(1, 'Sekretariat', 'sekretariat', 'images/configs/sekretariat.png', 'images/sectors/structures/structures.png', 'public/uploads/sectors/programs/sekretariat.html', 'public/uploads/sectors/jobs/sekretariat.html', 'public/uploads/sectors/purposes/sekretariat.html', '2021-12-09 09:42:03', '2021-12-09 10:24:31'),
(2, 'Bidang Sumber Daya Air', 'bidang-sumber-daya-air', 'images/configs/sda.png', 'images/sectors/structures/structures.png', 'public/uploads/sectors/programs/bidang-sumber-daya-air.html', 'public/uploads/sectors/jobs/bidang-sumber-daya-air.html', 'public/uploads/sectors/purposes/bidang-sumber-daya-air.html', '2021-12-09 09:42:03', '2021-12-09 09:42:03'),
(3, 'Bidang Bina Marga', 'bidang-bina-marga', 'images/configs/marga.png', 'images/sectors/structures/structures.png', 'public/uploads/sectors/programs/bidang-bina-marga.html', 'public/uploads/sectors/jobs/bidang-bina-marga.html', 'public/uploads/sectors/purposes/bidang-bina-marga.html', '2021-12-04 08:40:32', '2021-12-06 16:11:04'),
(4, 'Bidang Cipta Karya', 'bidang-cipta-karya', 'images/configs/cipta-karya.png', 'images/sectors/structures/structures.png', 'public/uploads/sectors/programs/bidang-cipta-karya.html', 'public/uploads/sectors/jobs/bidang-cipta-karya.html', 'public/uploads/sectors/purposes/bidang-cipta-karya.html', '2021-12-04 08:40:32', '2021-12-06 16:15:52'),
(5, 'Bidang Penataan Ruang', 'bidang-penataan-ruang', 'images/configs/tata-ruang.png', 'images/sectors/structures/structures.png', 'public/uploads/sectors/programs/bidang-penataan-ruang.html', 'public/uploads/sectors/jobs/bidang-penataan-ruang.html', 'public/uploads/sectors/purposes/bidang-penataan-ruang.html', '2021-12-04 08:40:32', '2021-12-06 16:19:31'),
(6, 'Bidang Bina Konstruksi', 'bidang-bina-konstruksi', 'images/configs/konstruksi.png', 'images/sectors/structures/structures.png', 'public/uploads/sectors/programs/bidang-bina-konstruksi.html', 'public/uploads/sectors/jobs/bidang-bina-konstruksi.html', 'public/uploads/sectors/purposes/bidang-bina-konstruksi.html', '2021-12-04 08:40:32', '2021-12-06 16:41:09'),
(7, 'Unit Pelaksana Teknis Dinas', 'unit-pelaksanan-teknis-dinas', 'images/configs/uptd.png', 'images/sectors/structures/structures.png', 'public/uploads/sectors/programs/unit-pelaksana-teknis-dinas.html', 'public/uploads/sectors/jobs/unit-pelaksana-teknis-dinas.html', 'public/uploads/sectors/purposes/unit-pelaksana-teknis-dinas.html', '2021-12-04 08:40:32', '2021-12-06 16:43:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sector_contact`
--

CREATE TABLE `sector_contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sector_id` bigint(20) UNSIGNED NOT NULL,
  `contact_type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/users/user.jpg',
  `last_login` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `sector_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `address`, `email`, `email_verified_at`, `image`, `last_login`, `name`, `password`, `phone`, `remember_token`, `created_at`, `updated_at`, `role_id`, `sector_id`) VALUES
(1, 'BTN GRAHA MANDIRI PERMAI BLOK K/7, Punggolaka, Puuwatu, Kendari, Sulawesi Tenggara 93115', 'alzidni2000@gmail.com', NULL, 'images/users/zidni.png', NULL, 'Al Zidni Kasim', '$2y$10$iq2J/pEN/PFl8W1thpHRl.DEPllKpcJhL.NmbmSDFQ8ZbrHNlNN0G', '081232578168', NULL, '2021-12-09 09:42:03', '2021-12-09 09:42:03', 1, 1),
(2, 'Jalan', 'uadmin@gmail.com', NULL, 'images/users/user.jpg', NULL, 'User Admin', '$2y$10$rB2paUID1Dl7Ko46rx01c.HFAR9llifC2UOnvz90wJLAOdbdtCiWu', '081234567890', NULL, '2021-12-09 09:42:03', '2021-12-09 09:42:03', 2, 1),
(3, 'Jalan', 'usector@gmail.com', NULL, 'images/users/user.jpg', NULL, 'User Sector', '$2y$10$bxXX01F5I03WIYrZo8PX3.H0ArbgY.3L4WyGSl55M8yg/qV6h8ClK', '081234567890', NULL, '2021-12-09 09:42:03', '2021-12-09 09:42:03', 3, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `violations`
--

CREATE TABLE `violations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warn` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `districts` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `village` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `violations` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attachments_violation_id_foreign` (`violation_id`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_type`
--
ALTER TABLE `contact_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_created_by_foreign` (`created_by`),
  ADD KEY `galleries_sector_id_foreign` (`sector_id`);

--
-- Indexes for table `infrastructures`
--
ALTER TABLE `infrastructures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `infrastructures_sector_id_foreign` (`sector_id`);

--
-- Indexes for table `maps`
--
ALTER TABLE `maps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_created_by_foreign` (`created_by`),
  ADD KEY `news_sector_id_foreign` (`sector_id`);

--
-- Indexes for table `officials`
--
ALTER TABLE `officials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `policies_created_by_foreign` (`created_by`),
  ADD KEY `policies_sector_id_foreign` (`sector_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regions_team_id_foreign` (`team_id`);

--
-- Indexes for table `region_coordinates`
--
ALTER TABLE `region_coordinates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_coordinates_region_id_foreign` (`region_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sector_contact`
--
ALTER TABLE `sector_contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sector_contact_sector_id_foreign` (`sector_id`),
  ADD KEY `sector_contact_contact_type_id_foreign` (`contact_type_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_sector_id_foreign` (`sector_id`);

--
-- Indexes for table `violations`
--
ALTER TABLE `violations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `violations_created_by_foreign` (`created_by`),
  ADD KEY `violations_team_id_foreign` (`team_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `contact_type`
--
ALTER TABLE `contact_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `infrastructures`
--
ALTER TABLE `infrastructures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `maps`
--
ALTER TABLE `maps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `officials`
--
ALTER TABLE `officials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `region_coordinates`
--
ALTER TABLE `region_coordinates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sectors`
--
ALTER TABLE `sectors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sector_contact`
--
ALTER TABLE `sector_contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `violations`
--
ALTER TABLE `violations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `attachments`
--
ALTER TABLE `attachments`
  ADD CONSTRAINT `attachments_violation_id_foreign` FOREIGN KEY (`violation_id`) REFERENCES `violations` (`id`);

--
-- Ketidakleluasaan untuk tabel `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `galleries_sector_id_foreign` FOREIGN KEY (`sector_id`) REFERENCES `sectors` (`id`);

--
-- Ketidakleluasaan untuk tabel `infrastructures`
--
ALTER TABLE `infrastructures`
  ADD CONSTRAINT `infrastructures_sector_id_foreign` FOREIGN KEY (`sector_id`) REFERENCES `sectors` (`id`);

--
-- Ketidakleluasaan untuk tabel `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `news_sector_id_foreign` FOREIGN KEY (`sector_id`) REFERENCES `sectors` (`id`);

--
-- Ketidakleluasaan untuk tabel `policies`
--
ALTER TABLE `policies`
  ADD CONSTRAINT `policies_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `policies_sector_id_foreign` FOREIGN KEY (`sector_id`) REFERENCES `sectors` (`id`);

--
-- Ketidakleluasaan untuk tabel `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `regions_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`);

--
-- Ketidakleluasaan untuk tabel `region_coordinates`
--
ALTER TABLE `region_coordinates`
  ADD CONSTRAINT `region_coordinates_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`);

--
-- Ketidakleluasaan untuk tabel `sector_contact`
--
ALTER TABLE `sector_contact`
  ADD CONSTRAINT `sector_contact_contact_type_id_foreign` FOREIGN KEY (`contact_type_id`) REFERENCES `contact_type` (`id`),
  ADD CONSTRAINT `sector_contact_sector_id_foreign` FOREIGN KEY (`sector_id`) REFERENCES `sectors` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_sector_id_foreign` FOREIGN KEY (`sector_id`) REFERENCES `sectors` (`id`);

--
-- Ketidakleluasaan untuk tabel `violations`
--
ALTER TABLE `violations`
  ADD CONSTRAINT `violations_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `violations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
