/*
 Navicat Premium Data Transfer

 Source Server         : localhost73
 Source Server Type    : MySQL
 Source Server Version : 100137
 Source Host           : localhost:3373
 Source Schema         : app_lp3i

 Target Server Type    : MySQL
 Target Server Version : 100137
 File Encoding         : 65001

 Date: 07/02/2019 17:24:49
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

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
  `user_role` enum('1','2') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT '1=admin, 2=user',
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of app_user
-- ----------------------------
INSERT INTO `app_user` VALUES (1, 'admin', 'user admin', 'admin', 'admin@mail.com', '1');
INSERT INTO `app_user` VALUES (5, 'hallo', 'hallo', 'hallo', 'hallo@m.com', '1');

SET FOREIGN_KEY_CHECKS = 1;
