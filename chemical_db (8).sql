-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2017 at 07:23 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chemical_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `authority`
--

CREATE TABLE `authority` (
  `authority_id` int(4) NOT NULL COMMENT 'รหัสตำแหน่งงาน',
  `authority_name` varchar(200) NOT NULL COMMENT 'ตำแหน่งงาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authority`
--

INSERT INTO `authority` (`authority_id`, `authority_name`) VALUES
(1, 'ผู้ดูแลห้องเก็บสารเคมี'),
(2, 'นักวิทยาศาสตร์');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(4) NOT NULL COMMENT 'รหัสหมวดหมู่',
  `category_name` varchar(200) NOT NULL COMMENT 'ชื่อหมวดหมู่'
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `chemical`
--

CREATE TABLE `chemical` (
  `chemical_ID` int(4) NOT NULL COMMENT 'รหัสสารเคมี',
  `chemical_name` varchar(100) NOT NULL COMMENT 'ชื่อสารเคมี',
  `chemical_formula` varchar(100) NOT NULL COMMENT 'สูตรสารเคมี',
  `type_id` int(4) NOT NULL COMMENT 'รหัสประเภท',
  `category_id` int(4) NOT NULL COMMENT 'รหัสหมวดหมู่'
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `chemical`
--

INSERT INTO `chemical` (`chemical_ID`, `chemical_name`, `chemical_formula`, `type_id`, `category_id`) VALUES
(1, 'Aluminium nitrate nanohydrate', 'Al(NO3)3·9H2O', 2, 1),
(2, 'Ammonium Metavanadate', 'NH4VO3', 3, 1),
(3, 'Ammonium Molybdate', '(NH4)6Mo7O24·4H2O', 2, 1),
(4, 'Barium Chloride', 'BaCl2·2H2O', 3, 2),
(5, 'Boric acid', 'H3BO3', 4, 2),
(6, 'Brucine Sulphate', '(C12H26N2O4)2H2SO4', 2, 2),
(7, 'Calcium Chloride', 'CaCl2·2H2O', 1, 3),
(8, 'Copper (II) Sulphate', 'CuSO4·5H2O', 2, 3),
(9, 'Chloroform', 'CHCL3', 2, 3),
(10, 'D(+)Galactose', 'C6H12O6', 2, 4),
(11, 'Deoxycholic acid', 'C24H48O4', 2, 4),
(12, 'di-Ammonium Hydrogen Phosphate', '(NH4)2HPO4', 2, 4),
(13, 'Boric acid2', 'hg54r', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `grade_id` int(4) NOT NULL COMMENT 'รหัสเกรด',
  `grade_name` varchar(200) CHARACTER SET utf8 NOT NULL COMMENT 'ชื่อเกรด'
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`grade_id`, `grade_name`) VALUES
(1, 'AR'),
(2, 'LR'),
(3, 'COM'),
(4, 'Lab'),
(5, 'Reagent'),
(6, 'GC'),
(7, 'ACS'),
(8, 'GR'),
(9, 'AR');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_ID` int(4) NOT NULL COMMENT 'รหัสไอเท็ม',
  `location` varchar(200) CHARACTER SET utf8 NOT NULL COMMENT 'จุดวางสารเคมี',
  `status` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT 'สถานะสารเคมี',
  `size` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT 'ขนาดบรรจุภัณฑ์',
  `Remaining_volume` int(11) NOT NULL COMMENT 'ปริมาณคงเหลือ',
  `opendate` datetime NOT NULL COMMENT 'วันที่เปิดสารเคมี',
  `worningdate` datetime NOT NULL COMMENT ' วันใกล้หมดอายุสารเคมี',
  `expireddate` datetime NOT NULL COMMENT 'วันหมดอายุสารเคมี',
  `room_id` int(4) NOT NULL COMMENT 'รหัสห้อง',
  `chemical_ID` int(4) NOT NULL COMMENT 'รหัสสารเคมี',
  `grade_id` int(4) NOT NULL COMMENT 'รหัสเกรด',
  `marker_id` int(4) NOT NULL COMMENT 'รหัสMarker',
  `user_id` int(4) NOT NULL COMMENT 'รหัสผู้ใช้'
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_ID`, `location`, `status`, `size`, `Remaining_volume`, `opendate`, `worningdate`, `expireddate`, `room_id`, `chemical_ID`, `grade_id`, `marker_id`, `user_id`) VALUES
(1, 'self A 01', 'มี', '500 g.', 500, '2017-09-04 00:00:00', '2017-09-12 00:00:00', '2017-09-27 00:00:00', 1, 1, 1, 1, 1),
(4, 'self A19', 'มี', '500 g.', 250, '2017-09-05 00:00:00', '2017-09-21 00:00:00', '2017-10-07 00:00:00', 2, 8, 1, 2, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `item_chemical_view`
-- (See below for the actual view)
--
CREATE TABLE `item_chemical_view` (
`item_ID` int(4)
,`location` varchar(200)
,`status` varchar(100)
,`size` varchar(20)
,`Remaining_volume` int(11)
,`opendate` datetime
,`worningdate` datetime
,`expireddate` datetime
,`room_id` int(4)
,`chemical_ID` int(4)
,`grade_id` int(4)
,`marker_id` int(4)
,`user_id` int(4)
,`chemical_name` varchar(100)
,`chemical_formula` varchar(100)
,`type_id` int(4)
,`itemnamelist` varchar(126)
);

-- --------------------------------------------------------

--
-- Table structure for table `item_has_requisition`
--

CREATE TABLE `item_has_requisition` (
  `item_ID` int(4) NOT NULL COMMENT 'รหัสไอเท็ม',
  `requisition_id` int(4) NOT NULL COMMENT 'รหัสการเบิกสารเคมี',
  `volum_apply` int(11) DEFAULT NULL COMMENT 'จำนวน',
  `req_method` int(10) DEFAULT NULL COMMENT 'วิธีการเบิกสารเคมี'
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `item_has_requisition`
--

INSERT INTO `item_has_requisition` (`item_ID`, `requisition_id`, `volum_apply`, `req_method`) VALUES
(1, 18, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `marker`
--

CREATE TABLE `marker` (
  `marker_id` int(4) NOT NULL COMMENT 'รหัสMarker',
  `file_name` varchar(200) CHARACTER SET utf8 NOT NULL COMMENT 'ชื่อไฟล์ Marker'
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `marker`
--

INSERT INTO `marker` (`marker_id`, `file_name`) VALUES
(1, '18009772_1508634732489342_1876388339_n.jpg'),
(2, 'chart (1).png'),
(3, '4.jpg'),
(4, '32.png');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1502177334),
('m130524_201442_init', 1502177343);

-- --------------------------------------------------------

--
-- Table structure for table `repatriate`
--

CREATE TABLE `repatriate` (
  `repatriate_id` int(4) NOT NULL COMMENT 'รหัสการคืนสารเคมี',
  `repatriate_re` text COMMENT 'รายละเอียดการคืนสารเคมี',
  `repatriate_date` date DEFAULT NULL COMMENT 'วันที่คืนสารเคมี',
  `requisition_id` int(4) NOT NULL COMMENT 'รหัสการเบิกสารเคมี',
  `userlogin_user_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `requisition`
--

CREATE TABLE `requisition` (
  `requisition_id` int(4) NOT NULL COMMENT 'รหัสการเบิกสารเคมี',
  `description_re` text NOT NULL COMMENT 'รายละเอียดการเบิก',
  `requisition_date` date DEFAULT NULL COMMENT 'วันที่เบิกสารเคมี',
  `userlogin_user_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `requisition`
--

INSERT INTO `requisition` (`requisition_id`, `description_re`, `requisition_date`, `userlogin_user_id`) VALUES
(18, 'ทำแลปทดลอง', '2017-09-13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(4) NOT NULL COMMENT 'รหัสห้อง',
  `room_name` varchar(200) CHARACTER SET utf8 NOT NULL COMMENT 'ชื่อห้อง'
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_name`) VALUES
(1, 'ห้องเก็บสารเคมีรวม'),
(2, 'ห้องปฎิบัติการสารเคมี');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(4) NOT NULL COMMENT 'รหัสประเภท',
  `type_name` varchar(50) NOT NULL COMMENT 'ชื่อประเภท'
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type_name`) VALUES
(1, 'สารเคมีไฟไว'),
(2, 'สารเคมีปกติ'),
(3, 'สารเคมีอันตราย'),
(4, 'สารเคมีกัดกร่อน');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin1', '_CZO5XUdIbiQ2ECj5QiRq0iBLvUShgfW', '$2y$13$sulKsvgidXXo5P64sEP6yewLouA.ROroG2EliGl/uDOl1KKxChyfS', NULL, 'admin1@wu.ac.th', 10, 1502177481, 1502177481),
(2, 'admin2', '_lXpXGsGmJjY4yYwPlISwIFsO_Sykm-o', '$2y$13$Kk1KIFSytdx8z2T1JiAd4O5mmyqSHgu1MzJP7YmgI0lTVXu6CQMi2', NULL, 'admin2@wu.ac.th', 10, 1504847914, 1504847914);

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `user_id` int(4) NOT NULL COMMENT 'รหัสผู้ใช้',
  `fname` varchar(200) NOT NULL COMMENT 'ชื่อ',
  `lname` varchar(200) NOT NULL COMMENT 'นามสกุล',
  `phone` varchar(10) CHARACTER SET utf8 NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `active_flag` char(1) CHARACTER SET utf8 NOT NULL COMMENT 'สถานะผู้ใช้งานระบบ',
  `authority_id` int(4) NOT NULL COMMENT 'ตำแหน่งงาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`user_id`, `fname`, `lname`, `phone`, `active_flag`, `authority_id`) VALUES
(1, 'สดใส', 'สดชื่น', '0231254823', '1', 1),
(2, 'สายรุ้ง', 'สายฝน', '0321625342', '0', 2);

-- --------------------------------------------------------

--
-- Structure for view `item_chemical_view`
--
DROP TABLE IF EXISTS `item_chemical_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `item_chemical_view`  AS  select `i`.`item_ID` AS `item_ID`,`i`.`location` AS `location`,`i`.`status` AS `status`,`i`.`size` AS `size`,`i`.`Remaining_volume` AS `Remaining_volume`,`i`.`opendate` AS `opendate`,`i`.`worningdate` AS `worningdate`,`i`.`expireddate` AS `expireddate`,`i`.`room_id` AS `room_id`,`i`.`chemical_ID` AS `chemical_ID`,`i`.`grade_id` AS `grade_id`,`i`.`marker_id` AS `marker_id`,`i`.`user_id` AS `user_id`,`c`.`chemical_name` AS `chemical_name`,`c`.`chemical_formula` AS `chemical_formula`,`c`.`type_id` AS `type_id`,concat(convert(`i`.`item_ID` using utf16),'\0\0\0 ',`c`.`chemical_name`,'\0\0\0 ',convert(`i`.`marker_id` using utf16)) AS `itemnamelist` from (`chemical` `c` join `item` `i` on((`c`.`chemical_ID` = `i`.`chemical_ID`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authority`
--
ALTER TABLE `authority`
  ADD PRIMARY KEY (`authority_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `chemical`
--
ALTER TABLE `chemical`
  ADD PRIMARY KEY (`chemical_ID`),
  ADD KEY `fk_chemical_type1_idx` (`type_id`),
  ADD KEY `fk_chemical_category1_idx` (`category_id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_ID`),
  ADD KEY `fk_item_room1_idx` (`room_id`),
  ADD KEY `fk_item_chemical2_idx` (`chemical_ID`),
  ADD KEY `fk_item_grade1_idx` (`grade_id`),
  ADD KEY `fk_item_marker1_idx` (`marker_id`),
  ADD KEY `fk_item_userlogin1_idx` (`user_id`);

--
-- Indexes for table `item_has_requisition`
--
ALTER TABLE `item_has_requisition`
  ADD PRIMARY KEY (`item_ID`,`requisition_id`),
  ADD KEY `fk_item_has_requisition_requisition1_idx` (`requisition_id`),
  ADD KEY `fk_item_has_requisition_item1_idx` (`item_ID`);

--
-- Indexes for table `marker`
--
ALTER TABLE `marker`
  ADD PRIMARY KEY (`marker_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `repatriate`
--
ALTER TABLE `repatriate`
  ADD PRIMARY KEY (`repatriate_id`),
  ADD KEY `fk_repatriate_requisition1_idx` (`requisition_id`),
  ADD KEY `fk_repatriate_userlogin1_idx` (`userlogin_user_id`);

--
-- Indexes for table `requisition`
--
ALTER TABLE `requisition`
  ADD PRIMARY KEY (`requisition_id`),
  ADD KEY `fk_requisition_userlogin1_idx` (`userlogin_user_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id_UNIQUE` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authority`
--
ALTER TABLE `authority`
  MODIFY `authority_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสตำแหน่งงาน', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสหมวดหมู่', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `chemical`
--
ALTER TABLE `chemical`
  MODIFY `chemical_ID` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสารเคมี', AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `grade_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสเกรด', AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_ID` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสไอเท็ม', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `marker`
--
ALTER TABLE `marker`
  MODIFY `marker_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสMarker', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `repatriate`
--
ALTER TABLE `repatriate`
  MODIFY `repatriate_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการคืนสารเคมี';
--
-- AUTO_INCREMENT for table `requisition`
--
ALTER TABLE `requisition`
  MODIFY `requisition_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการเบิกสารเคมี', AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสห้อง', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภท', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `chemical`
--
ALTER TABLE `chemical`
  ADD CONSTRAINT `fk_chemical_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_chemical_type1` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`chemical_ID`) REFERENCES `chemical` (`chemical_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_ibfk_3` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`grade_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_ibfk_4` FOREIGN KEY (`marker_id`) REFERENCES `marker` (`marker_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_ibfk_5` FOREIGN KEY (`user_id`) REFERENCES `userlogin` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_has_requisition`
--
ALTER TABLE `item_has_requisition`
  ADD CONSTRAINT `fk_item_has_requisition_item1` FOREIGN KEY (`item_ID`) REFERENCES `item` (`item_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_item_has_requisition_requisition1` FOREIGN KEY (`requisition_id`) REFERENCES `requisition` (`requisition_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `repatriate`
--
ALTER TABLE `repatriate`
  ADD CONSTRAINT `fk_repatriate_requisition1` FOREIGN KEY (`requisition_id`) REFERENCES `requisition` (`requisition_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_repatriate_userlogin1` FOREIGN KEY (`userlogin_user_id`) REFERENCES `userlogin` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `requisition`
--
ALTER TABLE `requisition`
  ADD CONSTRAINT `fk_requisition_userlogin1` FOREIGN KEY (`userlogin_user_id`) REFERENCES `userlogin` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD CONSTRAINT `userlogin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
