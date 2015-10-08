-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2015 at 12:41 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yii2-asset-vih`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Admin', '1', 1442824467),
('SupportVIO', '2', 1442824976);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('Admin', 1, 'สำหรับการดูแลระบบ', NULL, NULL, 1442566066, 1442566066),
('loginToBackend', 2, 'ล็อกอินเข้าใช้งานส่วน backend', NULL, NULL, 1442566066, 1442566066),
('Management', 1, 'สำหรับจัดการข้อมูลผู้ใช้งานและบทความ', NULL, NULL, 1442566066, 1442566066),
('ManagerUser', 1, 'สำหรับจัดการผู้ใช้งาน', NULL, NULL, 1442566066, 1442566066),
('Support', 1, 'จัดการซอฟต์แวร์', NULL, NULL, 1442566066, 1442566066),
('SupportVIN', 1, 'จัดการซอฟต์แวร์ Vin', NULL, NULL, 1442566066, 1442566066),
('SupportVIO', 1, 'จัดการซอฟต์แวร์ Vio', NULL, NULL, 1442566066, 1442566066),
('SupportVIS', 1, 'จัดการซอฟต์แวร์ Vis', NULL, NULL, 1442566066, 1442566066);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('ManagerUser', 'loginToBackend'),
('Admin', 'Management'),
('Management', 'ManagerUser'),
('Management', 'Support'),
('Support', 'SupportVIN'),
('Support', 'SupportVIO'),
('Support', 'SupportVIS');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL COMMENT 'ชื่อเรื่อง',
  `content` text COMMENT 'เนื้อหา',
  `category` int(11) DEFAULT NULL COMMENT 'หมวดหมู่',
  `tag` varchar(255) DEFAULT NULL COMMENT 'คำค้น',
  `created_at` int(11) DEFAULT NULL COMMENT 'สร้างวันที่',
  `created_by` int(11) DEFAULT NULL COMMENT 'สร้างโดย',
  `updated_at` int(11) DEFAULT NULL COMMENT 'แก้ไขวันที่',
  `updated_by` int(11) DEFAULT NULL COMMENT 'แก้ไขโดย'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `content`, `category`, `tag`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(4, 'สร้าง Rule เพื่อตรวจสอบก่อนแก้ไขบทความ', 'เราจะทำการสร้าง Rule ขึ้นมา 1 ตัว ชื่อ AuthorRule เอาไว้ตรวจสอบว่าบทความที่เรากำลังจะแก้ไขเป็นของเราจริงหรือไม่ ถ้าใช่ก็จะอนุญาติให้แก้ไขบทความ ถ้าไม่ใช่ก็จะ error forbidden แจ้งให้ทราบว่าไม่มีสิทธิ์เข้าใช้งาน\r\n\r\nให้ทำการสร้างไฟล์ ชื่อ AuthorRule.php ไว้ที่ common/rbac/AuthorRule.php หากไม่มีโฟลเดอร์ rbac ให้สร้างได้เลย\r\n\r\nจากนั้นทำการสร้าง Rule ตามโค้ดด้านล่าง', 1, 'rbac,role,rule', 1440465487, 1, 1440605682, 1),
(5, 'test สร้าง blog', 'test เนื้อหา', 2, 'test', 1441601585, 1, 1441601585, 1),
(6, 'user-c สร้าง', 'ทดสอบๆ', 12, '', 1442216381, 3, 1442216381, 3);

-- --------------------------------------------------------

--
-- Table structure for table `computer_vih`
--

CREATE TABLE IF NOT EXISTS `computer_vih` (
  `computer_id` int(3) NOT NULL COMMENT 'รหัสคอมพิวเตอร์',
  `asset_code` varchar(17) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสทรพย์สิน',
  `party_id` int(3) NOT NULL COMMENT 'ฝ่าย',
  `department_id` int(3) NOT NULL COMMENT 'แผนก',
  `of_user` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ผู้ใช้เครื่อง',
  `serial_no` varchar(24) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ซีเรียลนัมเบอร์',
  `computer_localtion` varchar(3) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ที่ตั้งของเครื่อง',
  `computer_name` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mac_address` varchar(17) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL COMMENT 'สร้างโดย',
  `updated_by` int(11) NOT NULL COMMENT 'แก้ไขโดย',
  `is_status` int(1) NOT NULL DEFAULT '0' COMMENT 'สถานะเครื่อง'
) ENGINE=InnoDB AUTO_INCREMENT=239 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `computer_vih`
--

INSERT INTO `computer_vih` (`computer_id`, `asset_code`, `party_id`, `department_id`, `of_user`, `serial_no`, `computer_localtion`, `computer_name`, `ip`, `mac_address`, `created_by`, `updated_by`, `is_status`) VALUES
(1, '5330702/0406/38', 14, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(2, '9720119/0607/49', 14, 0, 'ฝ้าย', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(3, '9720124/0704/53', 18, 0, 'server', 'SGH71131W9', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(4, '9720134/0707/50', 14, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(5, '9720103/0802/54', 19, 0, 'อยู่ห้อง อ.พงษ์ศักด์', '5P9DT1S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(6, '9720104/0802/54', 5, 0, 'พี่นุ้ย', '6P9DT1S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(7, '9720117/0805/54', 14, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(8, '9720118/0806/54', 22, 0, 'พี่วิ', '41YBW1S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(9, '9720104/0903/67', 18, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(10, '9720105/0903/67', 18, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(11, '9720103/0903/34', 11, 0, 'ก้อย', 'HMKLZ1S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(12, '9720111/0903/34', 11, 0, 'พี่แหม่ม', 'SGH850001MS', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(13, '9720112/0903/33', 11, 0, 'ขวัญ', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(14, '9720110/0903/54', 18, 0, 'คอม', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(15, '9720122/0904/43', 27, 0, 'ด้านหลัง', 'BBBK12S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(16, '9720123/0904/43', 27, 0, 'ด้านหลัง', '9BBK12S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(17, '9720124/0904/17', 5, 0, 'minihome', '7BBK12S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(18, '9720125/0904/17', 18, 0, 'NULL', '4BBK12S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(19, '9720133/0906/08', 5, 0, 'ด้านใน', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(20, '9720134/0906/30', 18, 0, 'นุกูล', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(21, '9720136/0906/52', 3, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(22, '9720143/0906/07', 5, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(23, '9720144/0906/13', 5, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(24, '9720146/0906/29', 24, 0, 'พี่พร', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(25, '9720147/0906/29', 24, 0, 'พี่พร', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(26, '9720149/0906/31', 11, 0, 'อ้อม', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(27, '9720162/0907/02', 10, 0, 'คลังยา', 'C2W722S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(28, '9720163/0907/31', 11, 0, 'พิม', 'B2W722S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(29, '9720164/0907/56', 2, 0, 'อัญชลี', 'D2W722S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(30, '9720165/0907/01', 11, 0, 'การเงินใน', 'CMBF22S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(31, '9720166/0907/02', 11, 0, 'ทิพ', 'BMBF22S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(32, '9720167/0907/49', 14, 0, 'หมี', 'DMBF22S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(33, '9720171/0908/31', 11, 0, 'ตั๊ก', 'DCSL22C', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(34, '9720172/0908/18', 5, 0, 'เคาเตอร์', 'FCSL22S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(35, '9720173/0908/27', 19, 0, 'คุณหมอฟา', 'GCSL22S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(36, '9720180/0909/19', 21, 0, 'เคาเตอร์', '1KVX22S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(37, '9720187/0910/64', 2, 0, 'ห้องอ.สุณี ชั้น 4', 'D3P432S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(38, '9720188/0910/38', 23, 0, 'เหมียว', '4YJ732S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(39, '9720191/0911/55', 10, 0, 'พี่หน่อย', '8QKB32S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(40, '9720194/0911/47', 5, 0, 'พี่น้อง', '38KH32S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(41, '97201100/0912/34', 11, 0, 'โบว์', '7H6V32S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(42, '11010102001/5301', 11, 0, 'พี่จ๋า', '74Z142S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(43, '11010102002/5302', 11, 0, 'ซิว', '9FD942S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(44, '11010102003/5303', 10, 0, 'คุณสุริยะ', 'SGH005PDW2', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(45, '11010102004/5303', 2, 0, 'ห้องเบรคแพทย์', '7KZN42S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(46, '11010102005/5304', 21, 0, 'Philos', '82B2528', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(47, '11010102006/5305', 11, 0, 'กุ้ง', 'CJCF52S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(48, '11010102007/5305', 11, 0, 'หนุ่ย', 'DJCF52S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(49, '11010102008/5306', 4, 0, 'NULL', '3 HHK52S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(50, '11010102009/5306', 5, 0, 'NULL', '56JT52S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(51, '11010102010/5307', 10, 0, 'NULL', '7V5362S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(52, '11010102011/5307', 19, 0, 'พี่อุ๊', '8V5362S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(53, '11010102012/5307', 4, 0, 'NULL', 'DRB862S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(54, '11010102013/5307', 11, 0, 'การเงินใน', '8RK8625', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(55, '11010102014/5307', 14, 0, 'ห้องศิลป์ชั้น7', '9RK8625', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(56, '11010102015/5307', 14, 0, 'ปุย', 'BRK8625', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(57, '11010102016/5308', 4, 0, 'NULL', '9PMB62S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(58, '11010102017/5308', 23, 0, 'คุณพลภัทร', '39LG62S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(59, '11010102018/5308', 5, 0, 'อุ้ม', '49LG62S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(60, '11010102019/5309', 18, 0, 'ศิริพร', '7WWM62S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(61, '11010102020/5309', 5, 0, 'NULL', '4DVN62S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(62, '11010102021/5309', 2, 0, 'NULL', '3DVN62S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(63, '11010102022/5309', 5, 0, 'เคาร์เตอร์', '1XJS62S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(64, '11010102023/5309', 26, 0, 'พี่เอ๊าะ', 'BD9T62S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(65, '11010102023/5310', 14, 0, 'อิ๋ว', 'GVV372S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(66, '11010102025/5310', 5, 0, 'NULL', 'FVV372S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(67, '11010102026/5311', 19, 0, 'พี่เอ๋', '6W49X2S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(68, '11010102027/5311', 19, 0, 'ธุรการ รร.', '7W4972S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(69, '11010102028/5311', 4, 0, 'อยู่ที่แผนก X-RAY', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(70, '11010102029/5311', 5, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(71, '11010102030/5312', 23, 0, 'พี่อุ้ย', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(72, '11010102031/5312', 11, 0, 'หมู', 'BTRK72S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(73, '11010102032/5312', 14, 0, 'NULL', '9TRK72S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(74, '11010102001/5401', 14, 0, 'สนง.รอง ผอ', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(75, '11010102002/5401', 3, 0, 'NULL', '52YT72S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(76, '11010102005/5401', 19, 0, 'NULL', '7XGT72G', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(77, '11010102004/5401', 21, 0, 'ห้องตรวจ', 'BZHT72S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(78, '11010102003/5401', 12, 0, 'NULL', '5XGT72S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(79, '11010102006/5402', 10, 0, 'ต๋อย', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(80, '11010102007/5403', 11, 0, 'น้องอ้อม', 'CM1B82S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(81, '11010102010/5403', 11, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(82, '11010102009/5403', 4, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(83, '11010102012/5404', 23, 0, 'NULL', '2GYJ82S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(84, '11010102011/5404', 14, 0, 'สนง.รอง.ผอ', '3Y9L82S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(85, '11010102013/5404', 26, 0, 'อุ้ม', 'DM9M82S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(86, '11010102016/5404', 2, 0, 'NULL', 'D45P82S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(87, '11010102015/5404', 11, 0, 'การเงิน G', 'B45P82S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(88, '11010102014/5404', 5, 0, 'เคาน์เตอร์', 'C45P82S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(89, '11010102017/5405', 18, 0, 'เวณิกา', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(90, '11010102018/5405', 12, 0, 'พี่อ้อย', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(91, '11010102020/5405', 11, 0, 'การเงินใน', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(92, '11010102019/5405', 5, 0, 'NULL', '8B5292S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(93, '11010102022/5406', 18, 0, 'เอ', '6HH692S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(94, '11010102021/5406', 5, 0, 'ห้องพี่ไร', '7HH692S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(95, '11010102023/5406', 5, 0, 'ห้องตรวจ 3', '3Q1C92S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(96, '11010102027/5406', 5, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(97, '11010102026/5406', 5, 0, 'ห้องตรวจ 8', '6Q1C92S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(98, '11010102025/5406', 5, 0, 'ห้องตรวจ 6', '5Q1C92S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(99, '11010102024/5406', 5, 0, 'ห้องตรวจ 2', '4Q1C92S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(100, '11010102028/5407', 3, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(101, '11010102029/5407', 22, 0, 'พี่วิ', 'A008817', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(102, '11010102030/5407', 22, 0, 'แอน', 'A008818', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(103, '11010102031/5407', 5, 0, 'เคาเตอร์', 'CN-01R9VD-72872-164-JYYI', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(104, '11010102032/5407', 2, 0, 'วีรยา', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(105, '11010102033/5407', 17, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(106, '11010102034/5408', 2, 0, 'คฑาวุธ', '885P92S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(107, '11010102035/5408', 5, 0, 'นุ้ย', '785P92S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(108, '11010102036/5408', 14, 0, 'NULL', '685P92S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(109, '11010102037/5408', 3, 0, 'NULL', '6C2P92S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(110, '11010102038/5408', 17, 0, 'NULL', '4C2P92S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(111, '11010102039/5408', 27, 0, 'NULL', '5C2P92S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(112, '11010102040/5408', 14, 0, 'NULL', 'C.081006', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(113, '11010102041/5409', 24, 0, 'พี่อั๋น', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(114, '11010102042/5409', 2, 0, 'นฤทัย', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(115, '11010102043/5409', 18, 0, 'พี่สุนทร', '64XX92S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(116, '11010102044/5409', 18, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(117, '11010102045/5409', 18, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(118, '11010102046/5409', 5, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(119, '11010102047/5409', 18, 0, 'พี่เจี๊ยบ', '24XX92S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(120, '11010102048/5409', 18, 0, 'พี่มด', '84XX92S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(121, '11010102049/5409', 18, 0, 'คุณอาทิตย์', '54XX92S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(122, '11010102050/5409', 5, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(123, '11010102051/5409', 26, 0, 'มิ้ง', 'BD3292S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(124, '11010102052/5409', 5, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(125, '11010102053/5409', 5, 0, 'OPD เด็ก', '4H3Z92S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(126, '11010102054/5409', 23, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(127, '11010102055/5409', 3, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(128, '11010102056/5409', 12, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(129, '11010102057/5410', 5, 0, 'เคาน์เตอร์ MED', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(130, '11010102005/5501', 19, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(131, '11010102004/5501', 5, 0, 'ห้องตรวจ 5', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(132, '11010102003/5501', 5, 0, 'ห้องตรวจ 9', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(133, '11010102002/5501', 2, 0, 'มยุรี', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(134, '11010102001/5501', 11, 0, 'การใน', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(135, '11010102001/5502', 5, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(136, '11010102002/5502', 5, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(137, '11010102003/5502', 5, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(138, '11010102004/5502', 5, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(139, '11010102005/5502', 5, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(140, '11010102006/5502', 4, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(141, '11010102011/5502', 24, 0, 'พี่บุ๋ม', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(142, '11010102009/5502', 11, 0, 'ตา', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(143, '11010102010/5502', 11, 0, 'จิ๊บ', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(144, '11010102007/5502', 10, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(145, '11010102008/5502', 23, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(146, '11010103001/5503', 23, 0, 'NULL', '5R1HC2S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(147, '11010103002/5503', 5, 0, 'NULL', '1R1HC2S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(148, '11010103003/5503', 5, 0, 'NULL', '9R1HC2S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(149, '11010103004/5503', 5, 0, 'NULL', 'FQ1HC2S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(150, '11010103005/5503', 5, 0, 'NULL', 'HQ1HC2S', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(151, '11010102001/5506', 4, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(152, '11010102002/5506', 11, 0, 'พี่อ้อย', 'SGH134RPMN', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(153, '11010102003/5506', 4, 0, 'NULL', 'SGH134RPML', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(154, '11010102003/5508', 11, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(155, '11010102004/5508', 5, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(156, '11010102002/5508', 3, 0, 'กลางห้องจ่ายยา', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(157, '11010102001/5508', 26, 0, 'พี่เต๋อ', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(158, '11010102001/5509', 14, 0, 'อ้น', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(159, '11010102002/5509', 14, 0, 'ปุก', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(160, '11010102004/5509', 11, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(161, '11010102003/5509', 24, 0, 'พี่ตุ๊ก', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(162, '11010102001/5512', 14, 0, 'ฝ้าย', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(163, '11010102002/5601', 14, 0, 'ปุ๋ย', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(164, '11010102004/5601', 14, 0, 'ปอ', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(165, '11010102003/5606', 27, 0, 'โซน G', 'G96YWX1', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(166, '11010102002/5606', 2, 0, 'ฐิติรัตน์', 'J96YWX1', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(167, '11010102001/5606', 5, 0, 'ห้องรอตรวจ', '3B6YWX1', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(168, '11010102001/5609', 19, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(169, '11010102002/5609', 18, 0, 'กรชนก', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(170, '11010102002/5611', 3, 0, 'NULL', 'G6D1ZY1', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(171, '11010102001/5611', 27, 0, 'NULL', '3XC1ZY1', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(172, '11010102003/5612', 11, 0, 'การเงิน G', '5YT66Z1', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(173, '11010102004/5612', 11, 0, 'การเงิน S', '1KT68Z1', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(174, '11010102006/5612', 4, 0, 'x-ray', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(175, '11010102005/5612', 5, 0, 'ER', '71W66Z1', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(176, '11010102008/5612', 3, 0, 'ห้องจ่ายยา', 'JZV66Z1', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(177, '11010102007/5612', 19, 0, 'NULL', '3YT66Z1', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(178, '11010102009/5612', 11, 0, 'การเงิน ER', '7WR66Z1', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(179, '11010102001/5701', 4, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(180, '11010102001/5702', 4, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(181, '11010102001/5704', 5, 0, 'เคาเตอร์', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(182, '11010102001/5706', 27, 0, 'โซน S', '5MTSQ12', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(183, '11010102002/5706', 3, 0, 'NULL', '340TQ12', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(184, '11010102002/5708', 4, 0, 'NULL', '20Z6F22', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(185, '11010102001/5708', 5, 0, 'หน้าห้องตรอจ 5', 'B0ZGF22', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(186, '11010102001/5709', 5, 0, 'เคาเตอร์', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(187, '11010102002/5709', 27, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(188, '11010102003/5709', 4, 0, 'LAB', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(189, '11010102003/5712', 12, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(190, '11010102002/5712', 27, 0, 'ประกันสัง', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(191, '11010102001/5712', 10, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(192, '11010102001/5801', 4, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(193, '11010102002/5801', 26, 0, 'หัวหน้าช่าง', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(194, '11010102003/5801', 19, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(195, '11010102005/5801', 10, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(196, '11010102004/5801', 19, 0, 'พี่น้อย ชั้น 7', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(197, '11010102006/5801', 18, 0, 'สำหรับอาคาร3', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(198, '11010102009/5801', 18, 0, 'สำหรับอาคาร3', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(199, '11010102010/5801', 18, 0, 'สำหรับอาคาร3', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(200, '11010102007/5801', 18, 0, 'สำหรับอาคาร3', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(201, '11010102008/5801', 18, 0, 'สำหรับอาคาร3', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(202, '11010102011/5801', 18, 0, 'สำหรับอาคาร3', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(203, '11010102013/5801', 18, 0, 'สำหรับอาคาร3', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(204, '11010102012/5801', 18, 0, 'สำหรับอาคาร3', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(205, '11010102017/5801', 18, 0, 'สำหรับอาคาร 3', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(206, '11010102016/5801', 18, 0, 'สำหรับอาคาร3', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(207, '11010102014/5801', 18, 0, 'สำหรับอาคาร3', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(208, '11010102015/5801', 18, 0, 'สำหรับอาคาร3', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(209, '11010102024/5801', 18, 0, 'สำหรับอาคาร3', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(210, '11010102023/5801', 18, 0, 'สำหรับอาคาร3', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(211, '11010102021/5801', 18, 0, 'สำหรับอาคาร3', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(212, '11010102022/5801', 18, 0, 'สำหรับอาคาร3', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(213, '11010102019/5801', 18, 0, 'สำหรับอาคาร3', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(214, '11010102020/5801', 18, 0, 'สำหรับอาคาร3', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(215, '11010102018/5801', 18, 0, 'สำหรับอาคาร3', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(216, '11010102025/5801', 4, 0, 'ห้อง LAB', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(217, '11010102026/5801', 19, 0, 'สนง.รอง ผอ.พี่เล็ก', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(218, '11010102018/5802', 18, 0, 'สำหรับอาคาร 3', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(219, '11010102008/5802', 18, 0, 'สำหรับอาคาร 3', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(220, '11010102007/5802', 18, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(221, '11010102009/5802', 18, 0, 'สำหรับอาคาร 3', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(222, '11010102006/5802', 18, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(223, '11010102005/5802', 18, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(224, '11010102004/5802', 18, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(225, '11010102003/5802', 18, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(226, '110101020010/5802', 18, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(227, '110101020011/5802', 18, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(228, '110101020012/5802', 18, 0, 'สำหรับอาคาร 3', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(229, '110101020013/5802', 18, 0, 'สำหรับอาคาร 3', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(230, '110101020014/5802', 18, 0, 'สำหรับอาคาร 3', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(231, '110101020015/5802', 18, 0, 'สำหรับอาคาร 3', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(232, '110101020016/5802', 18, 0, 'สำหรับอาคาร 3', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(233, '110101020017/5802', 18, 0, 'สำหรับอาคาร 3', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(234, '11010102002/5802', 18, 0, 'สำหรับอาคาร 3', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(235, '11010102001/5802', 18, 0, 'สำหรับอาคาร 3', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(236, '11010102001/5803', 5, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(237, '11010102002/5803', 14, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0),
(238, '11010102003/5803', 5, 0, 'NULL', 'NULL', 'VIO', NULL, NULL, NULL, 2, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int(3) DEFAULT NULL,
  `department_name` varchar(38) CHARACTER SET utf8 DEFAULT NULL,
  `party_id` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `party_id`) VALUES
(0, 'องค์กรแพทย์', 1),
(0, 'ส่วนกลางฝ่ายแพทย์', 2),
(1, 'เวชสถิติ', 2),
(2, 'ทันตกรรม', 2),
(0, 'ส่วนกลางฝ่ายเภสัชกรรม', 3),
(1, 'ห้องจ่ายยาและเวชภัณฑ์', 3),
(2, 'คลังเวชภัณฑ์และพัสดุ (ยกเลิก)', 3),
(0, 'ส่วนกลางฝ่ายเทคนิคการแพทย์', 4),
(1, 'รังสีวินิจฉัย', 4),
(2, 'กายภาพบำบัด', 4),
(3, 'ห้องปฏิบัติการเทคนิคการแพทย์', 4),
(4, 'ช่างซ่อมเครื่องมือแพทย์', 4),
(0, 'ส่วนกลางฝ่ายการพยาบาล', 5),
(1, 'ผู้ป่วยนอก(S)', 5),
(2, 'ห้องฉุกเฉิน', 5),
(3, 'หน่วยจ่ายกลาง', 5),
(4, 'ทันตกรรม', 5),
(5, 'ห้องผ่าตัด', 5),
(6, 'ห้องคลอด', 5),
(7, 'หอผู้ป่วย2', 5),
(8, 'หอผู้ป่วย3', 5),
(9, 'หอผู้ป่วย4', 5),
(10, 'หอผู้ป่วย5', 5),
(11, 'หอผู้ป่วย6', 5),
(12, 'หออภิบาลผู้ป่วยหนัก', 5),
(13, 'บริหารฝ่ายการพยาบาล', 5),
(14, 'หอผู้ป่วยอาคาร 2 ชั้น 3', 5),
(15, 'หอผู้ป่วย อาคาร 2 ชั้น 2', 5),
(16, 'ศูนย์ไตเทียม', 5),
(17, 'พยาบาลตรวจการณ์', 5),
(18, 'ห้องเด็กอ่อน', 5),
(19, 'ผู้ป่วยนอก (G)', 5),
(20, 'หอผู้ป่วย อาคาร 3 ชั้น 3', 5),
(21, 'หอผู้ป่วย อาคาร 3 ชั้น 4', 5),
(1, 'ฝ่ายบริหาร', 10),
(2, 'สำนักงานคณะกรรมการ', 10),
(3, 'EXCOM', 10),
(4, 'งบประมาณและต้นทุน', 10),
(5, 'สำนักงาน CFO', 10),
(6, 'สำนักงานคณะกรรมการบริหาร(ExCom)', 10),
(7, 'สำนักงานเลขานุการบริษัท', 10),
(8, 'ผลิตน้ำดื่มบริสุทธิ์', 10),
(9, 'ศูนย์กู้ชีพ', 10),
(10, 'กรรมการ - VIN', 10),
(11, 'กรรมการ - VIS', 10),
(0, 'ส่วนกลางบัญชี', 11),
(1, 'บัญชีทั่วไป', 11),
(2, 'บัญชีตรวจสอบ', 11),
(4, 'บัญชีการเงิน', 11),
(5, 'บัญชีการทรัพย์สิน', 11),
(6, 'คลังเวชภัณฑ์และพัสดุ', 11),
(7, 'จัดซื้อ', 11),
(8, 'งานระหว่างทำ', 11),
(9, 'บัญชีสินค้าคงเหลือ', 11),
(10, 'บัญชีค่าแพทย์', 11),
(11, 'บัญชีลูกหนี้', 11),
(12, 'การเงิน', 11),
(13, 'บริหารสินเชื่อ', 11),
(14, 'พรบ.', 11),
(15, 'งบประมาณและต้นทุน', 11),
(0, 'ฝ่ายการเงิน', 12),
(1, 'ศูนย์รับผู้ป่วยใน', 12),
(2, 'การเงิน', 12),
(3, 'พ.ร.บ. (ยกเลิก)', 12),
(4, 'การเงินลูกหนี้', 12),
(5, 'บัญชีลูกหนี้(เก่า)', 12),
(6, 'สนง.CFO', 12),
(7, 'สนง.รองCEO', 12),
(8, 'บริหารสินเชื่อ', 12),
(0, 'ส่วนกลางฝ่ายพัฒนาธุรกิจ', 14),
(1, 'การตลาด', 14),
(2, 'ประชาสัมพันธ์(ยกเลิก)', 14),
(3, 'ส่งเสริมสุขภาพ', 14),
(4, 'ลูกค้าสัมพันธ์', 14),
(5, 'ศิลป์(ยกเลิก)', 14),
(6, 'ศูนย์โทรศัพท์(ยกเลิก)', 14),
(7, 'พัฒนาผลิตภัณฑ์', 14),
(8, 'Multimedia', 14),
(9, 'หน่วยแพทย์เคลื่อนที่', 14),
(0, 'ส่วนกลางฝ่ายพัฒนาคุณภาพ', 17),
(1, 'ศูนย์ควบคุมเอกสาร', 17),
(2, 'ศูนย์เครื่องมือแพทย์(ยกเลิก)', 17),
(3, 'สำนักคุณภาพ', 17),
(4, 'ควบคุมและป้องกันการติดเชื้อในโรงพยาบาล', 17),
(0, 'กลุ่มโรงพยาบาลวิชัยเวชฯ', 18),
(1, 'ประกันสังคมเครือข่าย', 18),
(2, 'สหกรณ์ออมทรัพย์วิชัยเวชฯ', 18),
(3, 'ขายยาศรีวิชัย 1', 18),
(4, 'ขายยาศรีวิชัย 2', 18),
(5, 'ขายยาศรีวิชัย 5', 18),
(6, 'ตรวจสอบภายในกลุ่ม', 18),
(7, 'บริหารสารสนเทศ', 18),
(8, 'บริหารอาคารสถานที่', 18),
(9, 'บริหารพัฒนาธุรกิจ', 18),
(10, 'จัดซื้อจัดจ้าง', 18),
(11, 'สำนักเทคโนโลยีสารสนเทศ', 18),
(0, 'ส่วนกลางสนง.ผู้อำนวยการ', 19),
(1, 'สนง.ผอ.', 19),
(2, 'ศิลป์ (ยกเลิก)', 19),
(4, 'บริหารทั่วไป', 19),
(5, 'การศึกษา', 19),
(6, 'ศูนย์ลูกค้าสัมพันธ์และตรวจสุขภาพ', 19),
(7, 'Utilization Management', 19),
(8, 'ศูนย์รับผู้ป่วยใน', 19),
(9, 'พรบ.และกองทุน', 19),
(10, 'ประกันสัมพันธ์(UR)', 19),
(1, 'การตลาด', 20),
(2, 'พรบ.', 20),
(3, 'กองทุน + ปกส.', 20),
(4, 'บัญชีลูกหนี้', 20),
(5, 'พัฒนาคุณภาพ', 20),
(6, 'ศูนย์ไตเทียม', 20),
(7, 'ส่วนกลางโรงพยาบาล', 20),
(8, 'อุทกภัย', 20),
(1, 'ศูนย์สุขภาพไทยฟิลอส', 21),
(1, 'พัฒนา Website', 22),
(0, 'ส่วนกลางฝ่ายทรัพยากรบุคคล', 23),
(1, 'สรรหาบุคลากร', 23),
(2, 'ฝึกอบรม', 23),
(3, 'เงินเดือนค่าจ้าง', 23),
(4, 'สวัสดิการและแรงงานสัมพันธ์', 23),
(0, 'ส่วนกลางฝ่ายคลังเวชภัณฑ์และพัสดุ', 24),
(1, 'คลังเวชภัณฑ์', 24),
(2, 'คลังพัสดุ', 24),
(0, 'ส่วนกลางฝ่ายอาคารสถานที่', 26),
(1, 'ยานพาหนะ', 26),
(2, 'ซ่อมบำรุง', 26),
(3, 'บัญชีทรัพย์สิน', 26),
(4, 'สวนสนามและรปภ.', 26),
(0, 'ส่วนกลางฝ่ายปฏิบัติการ', 27),
(1, 'เวชระเบียน', 27),
(2, 'โภชนาการ', 27),
(3, 'แม่บ้าน', 27),
(4, 'ซักรีด', 27),
(5, 'นำส่ง', 27),
(6, 'สวนสนามและรปภ.', 27);

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE IF NOT EXISTS `division` (
  `division_id` int(3) NOT NULL COMMENT 'รหัสฝ่าย',
  `division_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อฝ่าย'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`division_id`, `division_name`) VALUES
(1, 'ss');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1440129630),
('m130524_201442_init', 1440141419),
('m140506_102106_rbac_init', 1440129925),
('m150824_122129_rbac', 1441170443);

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE IF NOT EXISTS `party` (
  `party_id` int(3) NOT NULL,
  `party_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`party_id`, `party_name`) VALUES
(1, 'ฝ่ายบริหารทางการแพทย์'),
(2, 'ฝ่ายแพทย์'),
(3, 'ฝ่ายเภสัชกรรม'),
(4, 'ฝ่ายเทคนิคการแพทย์'),
(5, 'ฝ่ายการพยาบาล'),
(10, 'ฝ่ายบริหารทั่วไป'),
(11, 'ฝ่ายบัญชี'),
(12, 'ฝ่ายการเงิน'),
(14, 'ฝ่ายพัฒนาธุรกิจ'),
(17, 'ฝ่ายพัฒนาคุณภาพ'),
(18, 'กลุ่ม โรงพยาบาลวิชัยเวชฯ'),
(19, 'สนง.ผู้อำนวยการ'),
(20, 'ส่วนกลางโรงพยาบาล'),
(21, 'ฝ่ายบริหารและปฏิบัติการ'),
(22, 'ฝ่ายสำนักพัฒนาธุรกิจ เครือร.พ.'),
(23, 'ฝ่ายทรัพยากรบุคคล'),
(24, 'ฝ่ายคลังเวชภัณฑ์และพัสดุ'),
(26, 'ฝ่ายอาคารและสถานที่'),
(27, 'ฝ่ายปฏิบัติการ');

-- --------------------------------------------------------

--
-- Table structure for table `software`
--

CREATE TABLE IF NOT EXISTS `software` (
  `software_id` int(3) NOT NULL COMMENT 'เลขที่ซอฟต์แวร์',
  `software_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อซอฟต์แวร์',
  `software_detail` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'รายละเอียดซอฟต์แวร์',
  `created_by` int(11) NOT NULL COMMENT 'สร้างโดย',
  `created_at` int(11) NOT NULL COMMENT 'สร้างวันที่',
  `updated_at` int(11) NOT NULL COMMENT 'วันที่แก้ไข',
  `updated_by` int(11) NOT NULL COMMENT 'แก้ไขโดย',
  `is_status` int(1) NOT NULL DEFAULT '0' COMMENT 'สถานะซอฟต์แวร์'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `software`
--

INSERT INTO `software` (`software_id`, `software_name`, `software_detail`, `created_by`, `created_at`, `updated_at`, `updated_by`, `is_status`) VALUES
(1, 'Microsoft Windows 8.1 Professional', '', 1, 1442829487, 1442829487, 1, 0),
(2, 'Microsoft Windows 8 Professional', 'Detail\r\n', 2, 1443002320, 1444300024, 1, 0),
(3, 'Microsoft Windows 7 Professional', '', 2, 1443002333, 1443002333, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `summary_on_site`
--

CREATE TABLE IF NOT EXISTS `summary_on_site` (
  `summary_id` int(5) NOT NULL,
  `software_id` int(3) NOT NULL COMMENT 'รหัสซอฟต์แวร์',
  `computer_id` int(3) NOT NULL COMMENT 'รหัสคอมพิวเตอร์',
  `created_by` int(11) NOT NULL COMMENT 'สร้างโดย',
  `updated_by` int(11) NOT NULL COMMENT 'แก้ไขโดย',
  `created_at` int(11) NOT NULL COMMENT 'สร้างวันที่',
  `updated_at` int(11) NOT NULL COMMENT 'แก้ไขวันที่'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `summary_on_site`
--

INSERT INTO `summary_on_site` (`summary_id`, `software_id`, `computer_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, 101, 1, 1, 1444297011, 1444297011),
(2, 2, 105, 1, 1, 1444297011, 1444297011);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `location` varchar(5) COLLATE utf8_unicode_ci NOT NULL COMMENT 'สถานที่',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `location`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'NIPmpXyVcnOXJ0FF-s4edkiTJPFwFfST', '$2y$13$CsxdzIlXnQsj6d.dFkBblejkEmJOhYA.bq0/Da5Qvvbn6rwDU/4BW', NULL, 'adminvih@mail.com', 10, '', 1442824467, 1442824467),
(2, 'supportvio', 't3rzBan4JPbmMv9htYmMQPVtg3AFGHiv', '$2y$13$qR64UKvWShCmKYvB27Kew.mh9Lq01UdF3nvppKxatr93eNfZx4FAG', NULL, 'supportvio@mail.com', 10, '', 1442824975, 1442824975);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`), ADD KEY `rule_name` (`rule_name`), ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`), ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`), ADD KEY `title` (`title`), ADD FULLTEXT KEY `content` (`content`);

--
-- Indexes for table `computer_vih`
--
ALTER TABLE `computer_vih`
  ADD PRIMARY KEY (`computer_id`), ADD KEY `division_id` (`party_id`), ADD KEY `created_by` (`created_by`), ADD KEY `party_id` (`party_id`,`department_id`), ADD KEY `department_id_fk01` (`department_id`), ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD KEY `party_id` (`party_id`), ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`division_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`party_id`);

--
-- Indexes for table `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`software_id`), ADD KEY `created_by` (`created_by`,`updated_by`), ADD KEY `updated_by_fk01` (`updated_by`);

--
-- Indexes for table `summary_on_site`
--
ALTER TABLE `summary_on_site`
  ADD PRIMARY KEY (`summary_id`), ADD KEY `software_id` (`software_id`), ADD KEY `computer_id` (`computer_id`), ADD KEY `created_by` (`created_by`,`updated_by`), ADD KEY `summary_updated_by_fk01` (`updated_by`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `created_at` (`created_at`), ADD UNIQUE KEY `password_reset_token` (`password_reset_token`), ADD KEY `created_at_2` (`created_at`), ADD KEY `updated_at` (`updated_at`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `computer_vih`
--
ALTER TABLE `computer_vih`
  MODIFY `computer_id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'รหัสคอมพิวเตอร์',AUTO_INCREMENT=239;
--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `division_id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'รหัสฝ่าย',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `party_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `software`
--
ALTER TABLE `software`
  MODIFY `software_id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'เลขที่ซอฟต์แวร์',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `summary_on_site`
--
ALTER TABLE `summary_on_site`
  MODIFY `summary_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `computer_vih`
--
ALTER TABLE `computer_vih`
ADD CONSTRAINT `created_by_fk02` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
ADD CONSTRAINT `department_id_fk01` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
ADD CONSTRAINT `party_idfk_02` FOREIGN KEY (`party_id`) REFERENCES `party` (`party_id`),
ADD CONSTRAINT `update_by_fk03` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
ADD CONSTRAINT `party_idfk_01` FOREIGN KEY (`party_id`) REFERENCES `party` (`party_id`);

--
-- Constraints for table `software`
--
ALTER TABLE `software`
ADD CONSTRAINT `created_by_fk01` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
ADD CONSTRAINT `updated_by_fk01` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `summary_on_site`
--
ALTER TABLE `summary_on_site`
ADD CONSTRAINT `summary_computer_id_fk01` FOREIGN KEY (`computer_id`) REFERENCES `computer_vih` (`computer_id`),
ADD CONSTRAINT `summary_created_by_fk01` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
ADD CONSTRAINT `summary_software_id_fk01` FOREIGN KEY (`software_id`) REFERENCES `software` (`software_id`),
ADD CONSTRAINT `summary_updated_by_fk01` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
