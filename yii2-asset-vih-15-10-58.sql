-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2015 at 12:27 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

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
  `division_id` int(3) NOT NULL COMMENT 'ฝ่าย',
  `of_user` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ผู้ใช้เครื่อง',
  `serial_no` varchar(24) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ซีเรียลนัมเบอร์',
  `computer_localtion` varchar(3) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ที่ตั้งของเครื่อง',
  `computer_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `mac_address` varchar(17) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL COMMENT 'สร้างโดย',
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `computer_vih`
--

INSERT INTO `computer_vih` (`computer_id`, `asset_code`, `division_id`, `of_user`, `serial_no`, `computer_localtion`, `computer_name`, `ip`, `mac_address`, `created_by`, `updated_by`) VALUES
(2, '22', 1, '', '', '', '', '', '', 1, 1),
(3, '5330702/0406/38', 1, 'NULL', 'NULL', 'VIN', '', '', '', 1, 1),
(5, '454', 1, '', '', '', '', '', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE IF NOT EXISTS `division` (
  `division_id` int(3) NOT NULL COMMENT 'รหัสฝ่าย',
  `division_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อฝ่าย'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`division_id`, `division_name`) VALUES
(1, 'ดกด'),
(2, 'dd');

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
-- Table structure for table `software`
--

CREATE TABLE IF NOT EXISTS `software` (
  `software_id` int(3) NOT NULL COMMENT 'เลขที่ซอฟต์แวร์',
  `software_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อซอฟต์แวร์',
  `software_detail` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'รายละเอียดซอฟต์แวร์',
  `created_by` int(11) NOT NULL COMMENT 'สร้างโดย',
  `created_at` int(11) NOT NULL COMMENT 'สร้างวันที่',
  `updated_at` int(11) NOT NULL COMMENT 'วันที่แก้ไข',
  `updated_by` int(11) NOT NULL COMMENT 'แก้ไขโดย'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `software`
--

INSERT INTO `software` (`software_id`, `software_name`, `software_detail`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(1, 'Microsoft Windows 8.1 Professional', '', 1, 1442829487, 1442829487, 1),
(2, 'Microsoft Windows 8 Professional', '', 2, 1443002320, 1443002320, 2),
(3, 'Microsoft Windows 7 Professional', '', 2, 1443002333, 1443002333, 2);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  ADD PRIMARY KEY (`computer_id`), ADD KEY `division_id` (`division_id`), ADD KEY `created_by` (`created_by`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `computer_vih`
--
ALTER TABLE `computer_vih`
  MODIFY `computer_id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'รหัสคอมพิวเตอร์',AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `division_id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'รหัสฝ่าย',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `software`
--
ALTER TABLE `software`
  MODIFY `software_id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'เลขที่ซอฟต์แวร์',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `summary_on_site`
--
ALTER TABLE `summary_on_site`
  MODIFY `summary_id` int(5) NOT NULL AUTO_INCREMENT;
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
ADD CONSTRAINT `division_id_fk01` FOREIGN KEY (`division_id`) REFERENCES `division` (`division_id`),
ADD CONSTRAINT `updated_by_fk02` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`);

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
