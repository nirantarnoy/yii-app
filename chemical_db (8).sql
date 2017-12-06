/*
Navicat MySQL Data Transfer

Source Server         : MySql
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : chemical_db

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-12-06 09:38:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for authority
-- ----------------------------
DROP TABLE IF EXISTS `authority`;
CREATE TABLE `authority` (
  `authority_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสตำแหน่งงาน',
  `authority_name` varchar(200) NOT NULL COMMENT 'ตำแหน่งงาน',
  PRIMARY KEY (`authority_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of authority
-- ----------------------------
INSERT INTO `authority` VALUES ('1', 'ผู้ดูแลห้องเก็บสารเคมี');
INSERT INTO `authority` VALUES ('2', 'นักวิทยาศาสตร์');

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `category_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสหมวดหมู่',
  `category_name` varchar(200) NOT NULL COMMENT 'ชื่อหมวดหมู่',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf16;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', 'A');
INSERT INTO `category` VALUES ('2', 'B');
INSERT INTO `category` VALUES ('3', 'C');
INSERT INTO `category` VALUES ('4', 'D');

-- ----------------------------
-- Table structure for chemical
-- ----------------------------
DROP TABLE IF EXISTS `chemical`;
CREATE TABLE `chemical` (
  `chemical_ID` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสารเคมี',
  `chemical_name` varchar(100) NOT NULL COMMENT 'ชื่อสารเคมี',
  `chemical_formula` varchar(100) NOT NULL COMMENT 'สูตรสารเคมี',
  `type_id` int(4) NOT NULL COMMENT 'รหัสประเภท',
  `category_id` int(4) NOT NULL COMMENT 'รหัสหมวดหมู่',
  PRIMARY KEY (`chemical_ID`),
  KEY `fk_chemical_type1_idx` (`type_id`),
  KEY `fk_chemical_category1_idx` (`category_id`),
  CONSTRAINT `fk_chemical_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_chemical_type1` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf16;

-- ----------------------------
-- Records of chemical
-- ----------------------------
INSERT INTO `chemical` VALUES ('1', 'Aluminium nitrate nanohydrate', 'Al(NO3)3·9H2O', '2', '1');
INSERT INTO `chemical` VALUES ('2', 'Ammonium Metavanadate', 'NH4VO3', '3', '1');
INSERT INTO `chemical` VALUES ('3', 'Ammonium Molybdate', '(NH4)6Mo7O24·4H2O', '2', '1');
INSERT INTO `chemical` VALUES ('4', 'Barium Chloride', 'BaCl2·2H2O', '3', '2');
INSERT INTO `chemical` VALUES ('5', 'Boric acid', 'H3BO3', '4', '2');
INSERT INTO `chemical` VALUES ('6', 'Brucine Sulphate', '(C12H26N2O4)2H2SO4', '2', '2');
INSERT INTO `chemical` VALUES ('7', 'Calcium Chloride', 'CaCl2·2H2O', '1', '3');
INSERT INTO `chemical` VALUES ('8', 'Copper (II) Sulphate', 'CuSO4·5H2O', '2', '3');
INSERT INTO `chemical` VALUES ('9', 'Chloroform', 'CHCL3', '2', '3');
INSERT INTO `chemical` VALUES ('10', 'D(+)Galactose', 'C6H12O6', '2', '4');
INSERT INTO `chemical` VALUES ('11', 'Deoxycholic acid', 'C24H48O4', '2', '4');
INSERT INTO `chemical` VALUES ('12', 'di-Ammonium Hydrogen Phosphate', '(NH4)2HPO4', '2', '4');
INSERT INTO `chemical` VALUES ('13', 'Boric acid2', 'hg54r', '2', '1');

-- ----------------------------
-- Table structure for grade
-- ----------------------------
DROP TABLE IF EXISTS `grade`;
CREATE TABLE `grade` (
  `grade_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสเกรด',
  `grade_name` varchar(200) CHARACTER SET utf8 NOT NULL COMMENT 'ชื่อเกรด',
  PRIMARY KEY (`grade_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf16;

-- ----------------------------
-- Records of grade
-- ----------------------------
INSERT INTO `grade` VALUES ('1', 'AR');
INSERT INTO `grade` VALUES ('2', 'LR');
INSERT INTO `grade` VALUES ('3', 'COM');
INSERT INTO `grade` VALUES ('4', 'Lab');
INSERT INTO `grade` VALUES ('5', 'Reagent');
INSERT INTO `grade` VALUES ('6', 'GC');
INSERT INTO `grade` VALUES ('7', 'ACS');
INSERT INTO `grade` VALUES ('8', 'GR');
INSERT INTO `grade` VALUES ('9', 'AR');

-- ----------------------------
-- Table structure for item
-- ----------------------------
DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `item_ID` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสไอเท็ม',
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
  `user_id` int(4) NOT NULL COMMENT 'รหัสผู้ใช้',
  PRIMARY KEY (`item_ID`),
  KEY `fk_item_room1_idx` (`room_id`),
  KEY `fk_item_chemical2_idx` (`chemical_ID`),
  KEY `fk_item_grade1_idx` (`grade_id`),
  KEY `fk_item_marker1_idx` (`marker_id`),
  KEY `fk_item_userlogin1_idx` (`user_id`),
  CONSTRAINT `item_ibfk_1` FOREIGN KEY (`chemical_ID`) REFERENCES `chemical` (`chemical_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `item_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `item_ibfk_3` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`grade_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `item_ibfk_4` FOREIGN KEY (`marker_id`) REFERENCES `marker` (`marker_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `item_ibfk_5` FOREIGN KEY (`user_id`) REFERENCES `userlogin` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf16;

-- ----------------------------
-- Records of item
-- ----------------------------
INSERT INTO `item` VALUES ('1', 'self A 01', 'มี', '500 g.', '500', '2017-09-04 00:00:00', '2017-09-12 00:00:00', '2017-09-27 00:00:00', '1', '1', '1', '1', '1');
INSERT INTO `item` VALUES ('4', 'self A19', 'มี', '500 g.', '250', '2017-09-05 00:00:00', '2017-09-21 00:00:00', '2017-10-07 00:00:00', '2', '8', '1', '2', '1');

-- ----------------------------
-- Table structure for item_has_requisition
-- ----------------------------
DROP TABLE IF EXISTS `item_has_requisition`;
CREATE TABLE `item_has_requisition` (
  `item_ID` int(4) NOT NULL COMMENT 'รหัสไอเท็ม',
  `requisition_id` int(4) NOT NULL COMMENT 'รหัสการเบิกสารเคมี',
  `volum_apply` int(11) DEFAULT NULL COMMENT 'จำนวน',
  `req_method` int(10) DEFAULT NULL COMMENT 'วิธีการเบิกสารเคมี',
  PRIMARY KEY (`item_ID`,`requisition_id`),
  KEY `fk_item_has_requisition_requisition1_idx` (`requisition_id`),
  KEY `fk_item_has_requisition_item1_idx` (`item_ID`),
  CONSTRAINT `fk_item_has_requisition_item1` FOREIGN KEY (`item_ID`) REFERENCES `item` (`item_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_item_has_requisition_requisition1` FOREIGN KEY (`requisition_id`) REFERENCES `requisition` (`requisition_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- ----------------------------
-- Records of item_has_requisition
-- ----------------------------
INSERT INTO `item_has_requisition` VALUES ('1', '18', null, '0');

-- ----------------------------
-- Table structure for journal
-- ----------------------------
DROP TABLE IF EXISTS `journal`;
CREATE TABLE `journal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `journal_no` varchar(25) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `journal_type` int(11) DEFAULT NULL,
  `issue_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of journal
-- ----------------------------
INSERT INTO `journal` VALUES ('1', 'IS17000001', 'ทดสอบ', '5', null, null, null, null, '1', null);
INSERT INTO `journal` VALUES ('2', 'IS17000001', 'ทดสอบ', '1', '1512445153', null, '1', null, '1', null);
INSERT INTO `journal` VALUES ('3', 'IS17000001', '', '1', '1512445818', '1', '1', null, '1', null);
INSERT INTO `journal` VALUES ('4', 'IS17000002', '', '1512447588', null, '1', null, null, '2', null);
INSERT INTO `journal` VALUES ('5', 'IS17000002', '', '1512447643', null, '1', null, null, '1', null);
INSERT INTO `journal` VALUES ('6', 'RT17000001', '', '1', '1512486761', '1', '1', null, '2', '3');
INSERT INTO `journal` VALUES ('7', 'IS17000003', '', '1512487350', null, '1', null, null, '1', null);
INSERT INTO `journal` VALUES ('8', 'IS17000003', '', '1512487405', null, '1', null, null, '1', null);
INSERT INTO `journal` VALUES ('9', 'RT17000001', '', '1512487430', null, '1', null, null, '2', '8');

-- ----------------------------
-- Table structure for journal_line
-- ----------------------------
DROP TABLE IF EXISTS `journal_line`;
CREATE TABLE `journal_line` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `journal_id` int(11) DEFAULT NULL,
  `chemical_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `issue_type` int(11) DEFAULT NULL,
  `return_qty` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of journal_line
-- ----------------------------
INSERT INTO `journal_line` VALUES ('19', '2', '7', '10', '1', null);
INSERT INTO `journal_line` VALUES ('20', '2', '2', '30', '1', null);
INSERT INTO `journal_line` VALUES ('21', '2', '11', '10', '1', null);
INSERT INTO `journal_line` VALUES ('23', '3', '1', '1', '1', null);
INSERT INTO `journal_line` VALUES ('24', '3', '12', '1', '2', null);
INSERT INTO `journal_line` VALUES ('25', '5', '1', '1', '1', null);
INSERT INTO `journal_line` VALUES ('34', '6', '1', '1', '1', '10');
INSERT INTO `journal_line` VALUES ('35', '6', '12', '1', '2', '1');
INSERT INTO `journal_line` VALUES ('36', '7', '1', '1', '1', null);
INSERT INTO `journal_line` VALUES ('37', '8', '1', '1', '1', null);
INSERT INTO `journal_line` VALUES ('38', '9', '1', '1', '1', null);

-- ----------------------------
-- Table structure for marker
-- ----------------------------
DROP TABLE IF EXISTS `marker`;
CREATE TABLE `marker` (
  `marker_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสMarker',
  `file_name` varchar(200) CHARACTER SET utf8 NOT NULL COMMENT 'ชื่อไฟล์ Marker',
  PRIMARY KEY (`marker_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf16;

-- ----------------------------
-- Records of marker
-- ----------------------------
INSERT INTO `marker` VALUES ('1', '18009772_1508634732489342_1876388339_n.jpg');
INSERT INTO `marker` VALUES ('2', 'chart (1).png');
INSERT INTO `marker` VALUES ('3', '4.jpg');
INSERT INTO `marker` VALUES ('4', '32.png');

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', '1502177334');
INSERT INTO `migration` VALUES ('m130524_201442_init', '1502177343');

-- ----------------------------
-- Table structure for repatriate
-- ----------------------------
DROP TABLE IF EXISTS `repatriate`;
CREATE TABLE `repatriate` (
  `repatriate_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการคืนสารเคมี',
  `repatriate_re` text COMMENT 'รายละเอียดการคืนสารเคมี',
  `repatriate_date` date DEFAULT NULL COMMENT 'วันที่คืนสารเคมี',
  `requisition_id` int(4) NOT NULL COMMENT 'รหัสการเบิกสารเคมี',
  `userlogin_user_id` int(4) NOT NULL,
  PRIMARY KEY (`repatriate_id`),
  KEY `fk_repatriate_requisition1_idx` (`requisition_id`),
  KEY `fk_repatriate_userlogin1_idx` (`userlogin_user_id`),
  CONSTRAINT `fk_repatriate_requisition1` FOREIGN KEY (`requisition_id`) REFERENCES `requisition` (`requisition_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_repatriate_userlogin1` FOREIGN KEY (`userlogin_user_id`) REFERENCES `userlogin` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of repatriate
-- ----------------------------

-- ----------------------------
-- Table structure for requisition
-- ----------------------------
DROP TABLE IF EXISTS `requisition`;
CREATE TABLE `requisition` (
  `requisition_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการเบิกสารเคมี',
  `description_re` text NOT NULL COMMENT 'รายละเอียดการเบิก',
  `requisition_date` date DEFAULT NULL COMMENT 'วันที่เบิกสารเคมี',
  `userlogin_user_id` int(4) NOT NULL,
  PRIMARY KEY (`requisition_id`),
  KEY `fk_requisition_userlogin1_idx` (`userlogin_user_id`),
  CONSTRAINT `fk_requisition_userlogin1` FOREIGN KEY (`userlogin_user_id`) REFERENCES `userlogin` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of requisition
-- ----------------------------
INSERT INTO `requisition` VALUES ('18', 'ทำแลปทดลอง', '2017-09-13', '1');

-- ----------------------------
-- Table structure for room
-- ----------------------------
DROP TABLE IF EXISTS `room`;
CREATE TABLE `room` (
  `room_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสห้อง',
  `room_name` varchar(200) CHARACTER SET utf8 NOT NULL COMMENT 'ชื่อห้อง',
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf16;

-- ----------------------------
-- Records of room
-- ----------------------------
INSERT INTO `room` VALUES ('1', 'ห้องเก็บสารเคมีรวม');
INSERT INTO `room` VALUES ('2', 'ห้องปฎิบัติการสารเคมี');

-- ----------------------------
-- Table structure for type
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `type_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภท',
  `type_name` varchar(50) NOT NULL COMMENT 'ชื่อประเภท',
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf16;

-- ----------------------------
-- Records of type
-- ----------------------------
INSERT INTO `type` VALUES ('1', 'สารเคมีไฟไว');
INSERT INTO `type` VALUES ('2', 'สารเคมีปกติ');
INSERT INTO `type` VALUES ('3', 'สารเคมีอันตราย');
INSERT INTO `type` VALUES ('4', 'สารเคมีกัดกร่อน');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin1', '_CZO5XUdIbiQ2ECj5QiRq0iBLvUShgfW', '$2y$13$sulKsvgidXXo5P64sEP6yewLouA.ROroG2EliGl/uDOl1KKxChyfS', null, 'admin1@wu.ac.th', '10', '1502177481', '1502177481');
INSERT INTO `user` VALUES ('2', 'admin2', '_lXpXGsGmJjY4yYwPlISwIFsO_Sykm-o', '$2y$13$Kk1KIFSytdx8z2T1JiAd4O5mmyqSHgu1MzJP7YmgI0lTVXu6CQMi2', null, 'admin2@wu.ac.th', '10', '1504847914', '1504847914');

-- ----------------------------
-- Table structure for userlogin
-- ----------------------------
DROP TABLE IF EXISTS `userlogin`;
CREATE TABLE `userlogin` (
  `user_id` int(4) NOT NULL COMMENT 'รหัสผู้ใช้',
  `fname` varchar(200) NOT NULL COMMENT 'ชื่อ',
  `lname` varchar(200) NOT NULL COMMENT 'นามสกุล',
  `phone` varchar(10) CHARACTER SET utf8 NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `active_flag` char(1) CHARACTER SET utf8 NOT NULL COMMENT 'สถานะผู้ใช้งานระบบ',
  `authority_id` int(4) NOT NULL COMMENT 'ตำแหน่งงาน',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  CONSTRAINT `userlogin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- ----------------------------
-- Records of userlogin
-- ----------------------------
INSERT INTO `userlogin` VALUES ('1', 'สดใส', 'สดชื่น', '0231254823', '1', '1');
INSERT INTO `userlogin` VALUES ('2', 'สายรุ้ง', 'สายฝน', '0321625342', '0', '2');

-- ----------------------------
-- View structure for item_chemical_view
-- ----------------------------
DROP VIEW IF EXISTS `item_chemical_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `item_chemical_view` AS select `i`.`item_ID` AS `item_ID`,`i`.`location` AS `location`,`i`.`status` AS `status`,`i`.`size` AS `size`,`i`.`Remaining_volume` AS `Remaining_volume`,`i`.`opendate` AS `opendate`,`i`.`worningdate` AS `worningdate`,`i`.`expireddate` AS `expireddate`,`i`.`room_id` AS `room_id`,`i`.`chemical_ID` AS `chemical_ID`,`i`.`grade_id` AS `grade_id`,`i`.`marker_id` AS `marker_id`,`i`.`user_id` AS `user_id`,`c`.`chemical_name` AS `chemical_name`,`c`.`chemical_formula` AS `chemical_formula`,`c`.`type_id` AS `type_id`,concat(convert(`i`.`item_ID` using utf16),'\0\0\0 ',`c`.`chemical_name`,'\0\0\0 ',convert(`i`.`marker_id` using utf16)) AS `itemnamelist` from (`chemical` `c` join `item` `i` on((`c`.`chemical_ID` = `i`.`chemical_ID`))) ;
