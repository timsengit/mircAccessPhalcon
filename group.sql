/*
Navicat MySQL Data Transfer

Source Server         : UbMs
Source Server Version : 50631
Source Host           : 192.168.105.128:3306
Source Database       : ycfdb

Target Server Type    : MYSQL
Target Server Version : 50631
File Encoding         : 65001

Date: 2016-09-26 18:10:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for group
-- ----------------------------
DROP TABLE IF EXISTS `group`;
CREATE TABLE `group` (
  `id` int(11) DEFAULT NULL,
  `groupName` varchar(255) DEFAULT NULL,
  `access` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of group
-- ----------------------------
INSERT INTO `group` VALUES ('1', 'super', 'all');
INSERT INTO `group` VALUES ('2', 'admin', 'add');
INSERT INTO `group` VALUES ('3', 'user', 'edit');
