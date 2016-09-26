/*
Navicat MySQL Data Transfer

Source Server         : UbMs
Source Server Version : 50631
Source Host           : 192.168.105.128:3306
Source Database       : ycfdb

Target Server Type    : MYSQL
Target Server Version : 50631
File Encoding         : 65001

Date: 2016-09-26 18:10:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `qq` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `addTime` int(255) DEFAULT NULL,
  `groupId` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'admin', '男', '1547777777', '18888887799', '1111111111', '1');
INSERT INTO `user` VALUES (null, 'pppppppppppp', 'nanananna', 'sssssss', '12212121212', 'mmmmmmmmmmmmmm', null, 'gggggggg');
INSERT INTO `user` VALUES (null, 'dddddddddddddddd', 'ssdfsdfs', '男', null, '4444444444444444', null, '3');
INSERT INTO `user` VALUES (null, 'dddddddddddddddd', 'ssdfsdfs', '男', null, '4444444444444444', null, '3');
INSERT INTO `user` VALUES (null, '', '', null, null, '', null, '3');
