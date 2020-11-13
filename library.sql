/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : library

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 13/11/2020 11:07:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for book_admin
-- ----------------------------
DROP TABLE IF EXISTS `book_admin`;
CREATE TABLE `book_admin`  (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `admin_pwd` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `admin_email` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`admin_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of book_admin
-- ----------------------------
INSERT INTO `book_admin` VALUES (1, 'admin', '123456', '1184805004@163.com');

-- ----------------------------
-- Table structure for book_book
-- ----------------------------
DROP TABLE IF EXISTS `book_book`;
CREATE TABLE `book_book`  (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `book_author` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `book_publish` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `book_category` int(11) NULL DEFAULT NULL,
  `book_price` double NULL DEFAULT NULL,
  `book_introduction` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `book_status` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`book_id`) USING BTREE,
  INDEX `book_category`(`book_category`) USING BTREE,
  CONSTRAINT `book_book_ibfk_1` FOREIGN KEY (`book_category`) REFERENCES `book_category` (`category_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 73 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of book_book
-- ----------------------------
INSERT INTO `book_book` VALUES (1, '巨人的陨落', '肯.福莱特', '江苏凤凰文艺出版社', 1, 129, '在第一次世界大战中发生的故事', 1);
INSERT INTO `book_book` VALUES (2, '三体', '刘慈欣', '南京大学出版社', 1, 68, '科幻小说', 1);
INSERT INTO `book_book` VALUES (3, '复活', '列夫.托尔斯泰', '上海译文出版社', 1, 19, '俄国小说', 1);
INSERT INTO `book_book` VALUES (6, '平凡的世界', '路遥', '上海文艺出版社', 1, 88, '孙少平和孙少安两兄弟...', 1);
INSERT INTO `book_book` VALUES (15, '白鹿原', '陈忠实', '南京出版社', 1, 36, '当代小说', 1);
INSERT INTO `book_book` VALUES (16, '计算机网络', '谢希仁', '电子工业出版社', 3, 49, '计算机专业书籍', 1);
INSERT INTO `book_book` VALUES (17, '霍乱时期的爱情', '加西亚·马尔克斯', '译林出版社', 9, 39, '外国小说', 1);
INSERT INTO `book_book` VALUES (18, '天才在左疯子在右', '高铭', '北京联合出版公司', 1, 39.8, '心理学', 1);
INSERT INTO `book_book` VALUES (19, '废都', '贾平凹', '商务印书馆', 8, 29, '当代小说', 1);
INSERT INTO `book_book` VALUES (20, 'jQuery', 'Ryan', '中国电力出版社', 3, 78, 'js库', 1);
INSERT INTO `book_book` VALUES (21, 'python数据爬虫', '张博文', '清华大学出版社', 3, 52, '带你走进爬虫的世界', 1);
INSERT INTO `book_book` VALUES (22, '入门python可视化', 'variation', '电子大学出版社', 8, 61, '探究数据背后的秘密', 1);
INSERT INTO `book_book` VALUES (71, 'Springboot从入门到实践', '筱威', '北京大学出版社', 3, 78, '带你走进spirngboot', 1);
INSERT INTO `book_book` VALUES (72, '人间失格', '太宰治', '人民出版社', 1, 30, '我这一生，尽是可耻之事', 1);

-- ----------------------------
-- Table structure for book_borrowingbook
-- ----------------------------
DROP TABLE IF EXISTS `book_borrowingbook`;
CREATE TABLE `book_borrowingbook`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `book_id` int(11) NULL DEFAULT NULL,
  `date` date NULL DEFAULT NULL,
  `date_end` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  INDEX `book_id`(`book_id`) USING BTREE,
  CONSTRAINT `book_borrowingbook_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book_book` (`book_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `book_borrowingbook_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `book_user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 65 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of book_borrowingbook
-- ----------------------------
INSERT INTO `book_borrowingbook` VALUES (9, 5, 1, '2020-11-11', '2022-11-11');
INSERT INTO `book_borrowingbook` VALUES (28, 5, 19, '2020-11-12', '2022-11-12');
INSERT INTO `book_borrowingbook` VALUES (31, 2, 20, '2020-11-12', '2022-11-12');
INSERT INTO `book_borrowingbook` VALUES (55, 1, 21, '2020-11-12', '2022-11-12');
INSERT INTO `book_borrowingbook` VALUES (57, 1, 17, '2020-11-12', '2022-11-12');
INSERT INTO `book_borrowingbook` VALUES (62, 1, 18, '2020-11-12', '2022-11-12');
INSERT INTO `book_borrowingbook` VALUES (63, 1, 16, '2020-11-13', '2022-11-13');
INSERT INTO `book_borrowingbook` VALUES (64, 1, 72, '2020-11-13', '2022-11-13');

-- ----------------------------
-- Table structure for book_category
-- ----------------------------
DROP TABLE IF EXISTS `book_category`;
CREATE TABLE `book_category`  (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of book_category
-- ----------------------------
INSERT INTO `book_category` VALUES (1, '小说');
INSERT INTO `book_category` VALUES (2, '历史');
INSERT INTO `book_category` VALUES (3, '计算机');
INSERT INTO `book_category` VALUES (4, '哲学');
INSERT INTO `book_category` VALUES (5, '社会科学');
INSERT INTO `book_category` VALUES (6, '政治法律');
INSERT INTO `book_category` VALUES (7, '军事科学');
INSERT INTO `book_category` VALUES (8, '中国文学');
INSERT INTO `book_category` VALUES (9, '外国文学');
INSERT INTO `book_category` VALUES (10, '外国传记');
INSERT INTO `book_category` VALUES (11, '英语');
INSERT INTO `book_category` VALUES (12, '俄国小说');
INSERT INTO `book_category` VALUES (13, '心理学');
INSERT INTO `book_category` VALUES (14, '言情小说');
INSERT INTO `book_category` VALUES (15, '武侠小说');
INSERT INTO `book_category` VALUES (16, '环境科学');
INSERT INTO `book_category` VALUES (17, '纪实文学');
INSERT INTO `book_category` VALUES (18, '123');
INSERT INTO `book_category` VALUES (19, '');

-- ----------------------------
-- Table structure for book_user
-- ----------------------------
DROP TABLE IF EXISTS `book_user`;
CREATE TABLE `book_user`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_pwd` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_email` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of book_user
-- ----------------------------
INSERT INTO `book_user` VALUES (1, 'ez', '123456', '3543e4534@163.com', 1);
INSERT INTO `book_user` VALUES (2, '卡莎', '123456', '3546576@qq.com', 1);
INSERT INTO `book_user` VALUES (5, '桐人', '123456', '75654@qq.com', 1);
INSERT INTO `book_user` VALUES (6, 'LeBronJames', '123456', '123456@qq.com', 1);
INSERT INTO `book_user` VALUES (7, '科比', '123456', 'kebi123@qq.com', 1);
INSERT INTO `book_user` VALUES (8, '林俊杰', '123456', 'linjunjie@qq.com', 1);
INSERT INTO `book_user` VALUES (9, '洛天依', '123456', '1234ere3@qq.com', 1);
INSERT INTO `book_user` VALUES (10, '欧文', '123456', 'ouernwudi@qq.com', 1);
INSERT INTO `book_user` VALUES (11, '库兹马', '123456', 'kuzima@qq.com', 1);
INSERT INTO `book_user` VALUES (13, '魔术师', '123456', 'moshushi@qq.com', 1);
INSERT INTO `book_user` VALUES (16, '周杰伦', '123456', 'zhoujielun@qq.com', 1);
INSERT INTO `book_user` VALUES (23, 'Variation', '123456', 'sfer344232@qq.com', 1);
INSERT INTO `book_user` VALUES (24, '越前龙马', '123456', 'longma@qq.com', 1);

SET FOREIGN_KEY_CHECKS = 1;
