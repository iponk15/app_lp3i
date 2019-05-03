/*
 Navicat Premium Data Transfer

 Source Server         : CDN DO 7
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : 128.199.165.95:3306
 Source Schema         : app

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 03/05/2019 16:27:13
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for app_role
-- ----------------------------
DROP TABLE IF EXISTS `app_role`;
CREATE TABLE `app_role`  (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_kode` char(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `role_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `role_desk` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `role_status` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`role_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of app_role
-- ----------------------------
INSERT INTO `app_role` VALUES (2, 'ADM', 'Admin', 'ini role admin', '1');
INSERT INTO `app_role` VALUES (3, 'SUP', 'Superadmin', 'Ini role superadmin', '1');
INSERT INTO `app_role` VALUES (4, 'MMB', 'Member', 'Ini role member', '1');
INSERT INTO `app_role` VALUES (5, '1', '1', '1', '0');
INSERT INTO `app_role` VALUES (6, 'a', 'a', 'a', '0');
INSERT INTO `app_role` VALUES (7, '2', '2', '2', '0');
INSERT INTO `app_role` VALUES (8, 's', 's', 's', '0');
INSERT INTO `app_role` VALUES (9, 'n', 'n', 'n', '0');
INSERT INTO `app_role` VALUES (10, 'j', 'j', 'j', '0');
INSERT INTO `app_role` VALUES (11, 'b', 'b', 'b', '0');
INSERT INTO `app_role` VALUES (12, 'l', 'l', 'l', '0');
INSERT INTO `app_role` VALUES (13, 'll', 'll', 'll', '0');

-- ----------------------------
-- Table structure for app_user
-- ----------------------------
DROP TABLE IF EXISTS `app_user`;
CREATE TABLE `app_user`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_roleid` int(11) DEFAULT NULL,
  `user_file` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of app_user
-- ----------------------------
INSERT INTO `app_user` VALUES (1, 'admin', 'user admin baru', 'admin', 'admin@mail.commmm', 2, 'assets/media/Gambar/Capture.PNG');
INSERT INTO `app_user` VALUES (3, 'jingga', 'Jingga biru', 'jingga', 'jing@m.com', 4, NULL);
INSERT INTO `app_user` VALUES (4, 'imamms', 'Irfan Isma Somantri', '11', 'irfan.isma@gmail.com', 3, NULL);
INSERT INTO `app_user` VALUES (19, 'hasan', 'hasan', 'a', 'hasan@mail.com', 3, NULL);

-- ----------------------------
-- Table structure for siswa
-- ----------------------------
DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa`  (
  `nis` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jenis_kelamin` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `telp` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`nis`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of siswa
-- ----------------------------
INSERT INTO `siswa` VALUES ('N002', 'aman', 'l', '123', 'jakarta');
INSERT INTO `siswa` VALUES ('N003', 'aman', 'l', '123', 'jakarta');
INSERT INTO `siswa` VALUES ('N004', 'aman', 'l', '123', 'jakarta');
INSERT INTO `siswa` VALUES ('N005', 'aman', 'l', '123', 'jakarta');
INSERT INTO `siswa` VALUES ('N006', 'aman', 'l', '123', 'jakarta');
INSERT INTO `siswa` VALUES ('N007', 'aman', 'l', '123', 'jakarta');

SET FOREIGN_KEY_CHECKS = 1;
