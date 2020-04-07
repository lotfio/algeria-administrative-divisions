-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.12-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping data for table mlc.states: ~48 rows (approximately)
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
INSERT INTO `states` (`id`, `code`, `name`, `ar_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 'Adrar', 'أدرار', '2020-03-02 18:25:16', NULL, NULL),
	(2, 2, 'Chlef', 'الشلف', '2020-03-02 18:25:16', NULL, NULL),
	(3, 3, 'Laghouat', 'الأغواط', '2020-03-02 18:25:16', NULL, NULL),
	(4, 4, 'Oum el bouaghi', 'أم البواقي', '2020-03-02 18:25:16', NULL, NULL),
	(5, 5, 'Batna', 'باتنة', '2020-03-02 18:25:16', NULL, NULL),
	(6, 6, 'Béjaïa', 'بجاية', '2020-03-02 18:25:16', NULL, NULL),
	(7, 7, 'Biskra', 'بسكرة', '2020-03-02 18:25:16', NULL, NULL),
	(8, 8, 'Bechar', 'بشار', '2020-03-02 18:25:16', NULL, NULL),
	(9, 9, 'Blida', 'البليدة', '2020-03-02 18:25:16', NULL, NULL),
	(10, 10, 'Bouira', 'البويرة', '2020-03-02 18:25:16', NULL, NULL),
	(11, 11, 'Tamanrasset', 'تمنراست', '2020-03-02 18:25:16', NULL, NULL),
	(12, 12, 'Tbessa', 'تبسة', '2020-03-02 18:25:16', NULL, NULL),
	(13, 13, 'Tlemcen', 'تلمسان', '2020-03-02 18:25:17', NULL, NULL),
	(14, 14, 'Tiaret', 'تيارت', '2020-03-02 18:25:17', NULL, NULL),
	(15, 15, 'Tizi ouzou', 'تيزي وزو', '2020-03-02 18:25:17', NULL, NULL),
	(16, 16, 'Alger', 'الجزائر', '2020-03-02 18:25:17', NULL, NULL),
	(17, 17, 'Djelfa', 'الجلفة', '2020-03-02 18:25:17', NULL, NULL),
	(18, 18, 'Jijel', 'جيجل', '2020-03-02 18:25:17', NULL, NULL),
	(19, 19, 'Sétif', 'سطيف', '2020-03-02 18:25:17', NULL, NULL),
	(20, 20, 'Saefda', 'سعيدة', '2020-03-02 18:25:17', NULL, NULL),
	(21, 21, 'Skikda', 'سكيكدة', '2020-03-02 18:25:17', NULL, NULL),
	(22, 22, 'Sidi bel abbes', 'سيدي بلعباس', '2020-03-02 18:25:17', NULL, NULL),
	(23, 23, 'Annaba', 'عنابة', '2020-03-02 18:25:17', NULL, NULL),
	(24, 24, 'Guelma', 'قالمة', '2020-03-02 18:25:17', NULL, NULL),
	(25, 25, 'Constantine', 'قسنطينة', '2020-03-02 18:25:17', NULL, NULL),
	(26, 26, 'Medea', 'المدية', '2020-03-02 18:25:17', NULL, NULL),
	(27, 27, 'Mostaganem', 'مستغانم', '2020-03-02 18:25:17', NULL, NULL),
	(28, 28, 'M\'sila', 'المسيلة', '2020-03-02 18:25:17', NULL, NULL),
	(29, 29, 'Mascara', 'معسكر', '2020-03-02 18:25:17', NULL, NULL),
	(30, 30, 'Ouargla', 'ورقلة', '2020-03-02 18:25:17', NULL, NULL),
	(31, 31, 'Oran', 'وهران', '2020-03-02 18:25:17', NULL, NULL),
	(32, 32, 'El bayadh', 'البيض', '2020-03-02 18:25:17', NULL, NULL),
	(33, 33, 'Illizi', 'إليزي', '2020-03-02 18:25:17', NULL, NULL),
	(34, 34, 'Bordj bou arreridj', 'برج بوعريريج', '2020-03-02 18:25:17', NULL, NULL),
	(35, 35, 'Boumerdes', 'بومرداس', '2020-03-02 18:25:17', NULL, NULL),
	(36, 36, 'El tarf', 'الطارف', '2020-03-02 18:25:17', NULL, NULL),
	(37, 37, 'Tindouf', 'تندوف', '2020-03-02 18:25:17', NULL, NULL),
	(38, 38, 'Tissemsilt', 'تيسمسيلت', '2020-03-02 18:25:17', NULL, NULL),
	(39, 39, 'El oued', 'الوادي', '2020-03-02 18:25:17', NULL, NULL),
	(40, 40, 'Khenchela', 'خنشلة', '2020-03-02 18:25:17', NULL, NULL),
	(41, 41, 'Souk ahras', 'سوق أهراس', '2020-03-02 18:25:17', NULL, NULL),
	(42, 42, 'Tipaza', 'تيبازة', '2020-03-02 18:25:17', NULL, NULL),
	(43, 43, 'Mila', 'ميلة', '2020-03-02 18:25:17', NULL, NULL),
	(44, 44, 'Ain defla', 'عين الدفلى', '2020-03-02 18:25:17', NULL, NULL),
	(45, 45, 'Naama', 'النعامة', '2020-03-02 18:25:17', NULL, NULL),
	(46, 46, 'Ain temouchent', 'عين تموشنت', '2020-03-02 18:25:17', NULL, NULL),
	(47, 47, 'Ghardaïa', 'غرداية', '2020-03-02 18:25:17', NULL, NULL),
	(48, 48, 'Relizane', 'غليزان', '2020-03-02 18:25:17', NULL, NULL);
/*!40000 ALTER TABLE `states` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
