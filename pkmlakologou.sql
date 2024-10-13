-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 8.0.30 - MySQL Community Server - GPL
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- membuang struktur untuk table pkshitungsuara.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel pkshitungsuara.failed_jobs: ~0 rows (lebih kurang)

-- membuang struktur untuk table pkshitungsuara.kabupatens
CREATE TABLE IF NOT EXISTS `kabupatens` (
  `id` bigint NOT NULL,
  `nama_kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Aktif','Non Aktif') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel pkshitungsuara.kabupatens: ~17 rows (lebih kurang)
REPLACE INTO `kabupatens` (`id`, `nama_kabupaten`, `status`, `created_at`, `updated_at`) VALUES
	(7401, 'KABUPATEN BUTON', 'Aktif', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7402, 'KABUPATEN MUNA', 'Non Aktif', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7403, 'KABUPATEN KONAWE', 'Non Aktif', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7404, 'KABUPATEN KOLAKA', 'Non Aktif', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7405, 'KABUPATEN KONAWE SELATAN', 'Non Aktif', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7406, 'KABUPATEN BOMBANA', 'Non Aktif', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7407, 'KABUPATEN WAKATOBI', 'Non Aktif', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7408, 'KABUPATEN KOLAKA UTARA', 'Non Aktif', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7409, 'KABUPATEN BUTON UTARA', 'Non Aktif', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7410, 'KABUPATEN KONAWE UTARA', NULL, '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7411, 'KABUPATEN KOLAKA TIMUR', NULL, '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7412, 'KABUPATEN KONAWE KEPULAUAN', NULL, '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7413, 'KABUPATEN MUNA BARAT', NULL, '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7414, 'KABUPATEN BUTON TENGAH', NULL, '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7415, 'KABUPATEN BUTON SELATAN', NULL, '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7471, 'KOTA KENDARI', NULL, '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7472, 'KOTA BAUBAU', NULL, '2024-10-07 06:29:58', '2024-10-07 06:29:58');

-- membuang struktur untuk table pkshitungsuara.kecamatans
CREATE TABLE IF NOT EXISTS `kecamatans` (
  `id` bigint NOT NULL,
  `kabupaten_id` bigint NOT NULL,
  `nama_kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel pkshitungsuara.kecamatans: ~7 rows (lebih kurang)
REPLACE INTO `kecamatans` (`id`, `kabupaten_id`, `nama_kecamatan`, `created_at`, `updated_at`) VALUES
	(7401050, 7401, 'LASALIMU', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401051, 7401, 'LASALIMU SELATAN', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401052, 7401, 'SIONTAPINA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401060, 7401, 'PASAR WAJO', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401061, 7401, 'WOLOWA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401062, 7401, 'WABULA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401110, 7401, 'KAPONTORI', '2024-10-07 06:29:58', '2024-10-07 06:29:58');

-- membuang struktur untuk table pkshitungsuara.kelurahans
CREATE TABLE IF NOT EXISTS `kelurahans` (
  `id` bigint NOT NULL,
  `kecamatan_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `nama_kelurahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel pkshitungsuara.kelurahans: ~94 rows (lebih kurang)
REPLACE INTO `kelurahans` (`id`, `kecamatan_id`, `nama_kelurahan`, `created_at`, `updated_at`) VALUES
	(7401050016, '7401050', 'WASUAMBA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401050019, '7401050', 'BONELALO', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401050020, '7401050', 'LASEMBANGI', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401050021, '7401050', 'KAMARU', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401050022, '7401050', 'SUANDALA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401050023, '7401050', 'LAWELE', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401050024, '7401050', 'KAKENAUWE', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401050025, '7401050', 'WAOLEONA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401050026, '7401050', 'WAGARI', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401050027, '7401050', 'SRIBATARA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401050028, '7401050', 'TOGO MANGURA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401050029, '7401050', 'WASAMBAA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401050030, '7401050', 'TALAGA BARU', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401050031, '7401050', 'NAMBO', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401051008, '7401051', 'AMBUAU INDAH', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401051009, '7401051', 'MOPAANO', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401051010, '7401051', 'UMALAOGE', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401051011, '7401051', 'KINAPANI MAKMUR', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401051012, '7401051', 'LASALIMU', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401051013, '7401051', 'SIOMANURU', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401051014, '7401051', 'SIONTAPINA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401051015, '7401051', 'WAJAH JAYA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401051016, '7401051', 'MULYA JAYA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401051017, '7401051', 'HARAPAN JAYA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401051018, '7401051', 'SANGIA ARANO', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401051019, '7401051', 'MEGA BAHARI', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401051020, '7401051', 'SUMBER AGUNG', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401051021, '7401051', 'AMBUAU TOGO', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401051022, '7401051', 'BALIMU', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401051023, '7401051', 'REJO SARI', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401052001, '7401052', 'WALOMPO', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401052002, '7401052', 'MATANAUWE', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401052003, '7401052', 'SAMPUABALO', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401052004, '7401052', 'KURAA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401052005, '7401052', 'KUMBEWAHA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401052006, '7401052', 'SUMBER SARI', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401052007, '7401052', 'LABUANDIRI', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401052008, '7401052', 'KARYA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401052009, '7401052', 'MANURU', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401052010, '7401052', 'BAHARI MAKMUR', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401052011, '7401052', 'GUNUNG JAYA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401060006, '7401060', 'KONDOWA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401060007, '7401060', 'DONGKALA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401060008, '7401060', 'HOLIMOMBO', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401060009, '7401060', 'TAKIMPO', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401060010, '7401060', 'KOMBELI', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401060011, '7401060', 'AWAINULU', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401060012, '7401060', 'LABURUNCI', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401060013, '7401060', 'BANABUNGI', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401060014, '7401060', 'KAMBULA MBULANA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401060015, '7401060', 'PASAR WAJO', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401060016, '7401060', 'SARAGI', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401060017, '7401060', 'KAONGKEOKEA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401060018, '7401060', 'WAANGU-ANGU', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401060019, '7401060', 'WARINTA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401060020, '7401060', 'LAPODI', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401060021, '7401060', 'WAKOKO', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401060022, '7401060', 'WASAGA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401060023, '7401060', 'KANCINAA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401060024, '7401060', 'WINNING', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401060029, '7401060', 'HOLIMOMBO JAYA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401060030, '7401060', 'KABAWOKOLE', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401060031, '7401060', 'MANTOWU', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401061025, '7401061', 'KAUMBU', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401061026, '7401061', 'WOLOWA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401061027, '7401061', 'MATAWIA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401061028, '7401061', 'WOLOWA BARU', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401061029, '7401061', 'SUKAMAJU', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401061030, '7401061', 'GALANTI', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401061031, '7401061', 'BUNGI', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401062001, '7401062', 'WASUEMBA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401062002, '7401062', 'WABULA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401062003, '7401062', 'WASAMPELA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401062004, '7401062', 'HOLIMOMBO', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401062005, '7401062', 'KOHOLIMOMBONA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401062006, '7401062', 'WABULA 1', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401062007, '7401062', 'BAJO BAHARI', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401110001, '7401110', 'BARANGKA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401110002, '7401110', 'WAKALAMBE', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401110003, '7401110', 'BONEATIRO', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401110004, '7401110', 'LAMBUSANGO', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401110005, '7401110', 'WATUMOTOBE', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401110006, '7401110', 'WAONDO WOLIO', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401110007, '7401110', 'WAKANGKA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401110008, '7401110', 'TUANGILA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401110009, '7401110', 'BUKIT ASRI', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401110010, '7401110', 'TODANGA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401110011, '7401110', 'LAMBUSANGO TIMUR', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401110012, '7401110', 'KAMELANTA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401110013, '7401110', 'MABULUGO', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401110014, '7401110', 'WAMBULU', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401110015, '7401110', 'WAKULI', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401110016, '7401110', 'TUMADA', '2024-10-07 06:29:58', '2024-10-07 06:29:58'),
	(7401110017, '7401110', 'BONEATIRO BARAT', '2024-10-07 06:29:58', '2024-10-07 06:29:58');

-- membuang struktur untuk table pkshitungsuara.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel pkshitungsuara.migrations: ~11 rows (lebih kurang)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(34, '2014_10_12_000000_create_users_table', 1),
	(35, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(36, '2019_08_19_000000_create_failed_jobs_table', 1),
	(37, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(38, '2024_10_07_042128_create_paslons_table', 1),
	(39, '2024_10_07_042139_create_saksis_table', 1),
	(40, '2024_10_07_042145_create_tps_table', 1),
	(41, '2024_10_07_042151_create_kabupatens_table', 1),
	(42, '2024_10_07_042156_create_kecamatans_table', 1),
	(43, '2024_10_07_042213_create_kelurahans_table', 1),
	(44, '2024_10_07_043543_create_suaras_table', 1);

-- membuang struktur untuk table pkshitungsuara.paslons
CREATE TABLE IF NOT EXISTS `paslons` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_paslon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_urut` int NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wilayah_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel pkshitungsuara.paslons: ~5 rows (lebih kurang)
REPLACE INTO `paslons` (`id`, `nama_paslon`, `no_urut`, `foto`, `wilayah_id`, `created_at`, `updated_at`) VALUES
	(5, 'Syaraswati dan Drs. H. Rasyid Mangura, M.H', 1, 'foto_paslon_1728299646.jpg', '7401', '2024-10-07 03:14:06', '2024-10-07 03:14:06'),
	(6, 'Drs La Bakry, M.Si., dan Aris Marwan Saputra, S.H', 2, 'foto_paslon_1728299691.jpg', '7401', '2024-10-07 03:14:51', '2024-10-07 03:14:51'),
	(7, 'H. La Ode Naane dan H. Akalim, S.Pd.,M.H', 3, 'foto_paslon_1728301328.jpg', '7401', '2024-10-07 03:42:08', '2024-10-07 03:42:08'),
	(8, 'Drs. Basiran, M.Si., dan La Ode Rafiun, S.Pd.,M.Si', 4, 'foto_paslon_1728301461.jpg', '7401', '2024-10-07 03:44:21', '2024-10-07 03:44:21'),
	(10, 'Dr. H. Bere Ali, M.Si., dan LM. Sumarlin B, S.E.,', 5, 'foto_paslon_1728301897.jpg', '7401', '2024-10-07 03:51:37', '2024-10-07 03:51:37'),
	(11, 'Alvin Akawijaya Putra, S.H., dan Sarifudin Saafa, S.T', 6, 'foto_paslon_1728302002.jpeg', '7401', '2024-10-07 03:53:22', '2024-10-07 03:53:22');

-- membuang struktur untuk table pkshitungsuara.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel pkshitungsuara.password_reset_tokens: ~0 rows (lebih kurang)

-- membuang struktur untuk table pkshitungsuara.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel pkshitungsuara.personal_access_tokens: ~0 rows (lebih kurang)

-- membuang struktur untuk table pkshitungsuara.saksis
CREATE TABLE IF NOT EXISTS `saksis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Aktif','Tidak Aktif') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Tidak Aktif',
  `kode_register` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tps_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel pkshitungsuara.saksis: ~1 rows (lebih kurang)
REPLACE INTO `saksis` (`id`, `nama_lengkap`, `alamat`, `no_hp`, `status`, `kode_register`, `tps_id`, `user_id`, `created_at`, `updated_at`) VALUES
	(5, 'hayatul', 'Jl. Dr. Wahidin Belakang No. 79 ', '0811231231', 'Aktif', NULL, '', 1, '2024-10-09 13:06:36', '2024-10-09 14:10:24');

-- membuang struktur untuk table pkshitungsuara.suaras
CREATE TABLE IF NOT EXISTS `suaras` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `saksi_id` bigint DEFAULT NULL,
  `paslon_id` bigint NOT NULL,
  `tps_id` bigint NOT NULL,
  `jumlah_suara` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel pkshitungsuara.suaras: ~64 rows (lebih kurang)

-- membuang struktur untuk table pkshitungsuara.tps
CREATE TABLE IF NOT EXISTS `tps` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_tps` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan_id` bigint NOT NULL,
  `kecamatan_id` bigint NOT NULL,
  `kabupaten_id` bigint NOT NULL,
  `jumlah_dpt` bigint DEFAULT NULL,
  `jumlah_surat_suara` bigint DEFAULT NULL,
  `jml_surat_suara_sah` bigint DEFAULT NULL,
  `jml_surat_suara_tidak_sah` bigint DEFAULT NULL,
  `bukti` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel pkshitungsuara.tps: ~17 rows (lebih kurang)

-- membuang struktur untuk table pkshitungsuara.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('saksi','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel pkshitungsuara.users: ~1 rows (lebih kurang)
REPLACE INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$.9C6jPktsxeCMqx13XHbzuqDVFG7EfahFaVqd2YaxyutCV2tY8uPe', 'admin', NULL, '2024-10-07 00:30:50', '2024-10-09 22:02:16');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
