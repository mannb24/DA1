/*
 Navicat Premium Data Transfer

 Source Server         : DA
 Source Server Type    : MySQL
 Source Server Version : 100432
 Source Host           : localhost:3306
 Source Schema         : da1

 Target Server Type    : MySQL
 Target Server Version : 100432
 File Encoding         : 65001

 Date: 11/03/2024 17:06:29
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for danhgia
-- ----------------------------
DROP TABLE IF EXISTS `danhgia`;
CREATE TABLE `danhgia`  (
  `IDDanhGia` int NOT NULL AUTO_INCREMENT,
  `IDNguoi` int NULL DEFAULT NULL,
  `Sao` int NULL DEFAULT NULL,
  `NoiDung` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`IDDanhGia`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of danhgia
-- ----------------------------

-- ----------------------------
-- Table structure for danhgia_sanpham
-- ----------------------------
DROP TABLE IF EXISTS `danhgia_sanpham`;
CREATE TABLE `danhgia_sanpham`  (
  `IDSanPham` int NOT NULL,
  `IDDanhGia` int NOT NULL,
  PRIMARY KEY (`IDSanPham`, `IDDanhGia`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of danhgia_sanpham
-- ----------------------------

-- ----------------------------
-- Table structure for danhmuc
-- ----------------------------
DROP TABLE IF EXISTS `danhmuc`;
CREATE TABLE `danhmuc`  (
  `IDDanhMuc` int NOT NULL AUTO_INCREMENT,
  `TenDanhMuc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`IDDanhMuc`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of danhmuc
-- ----------------------------

-- ----------------------------
-- Table structure for giohang
-- ----------------------------
DROP TABLE IF EXISTS `giohang`;
CREATE TABLE `giohang`  (
  `IDGioHang` int NOT NULL AUTO_INCREMENT,
  `IDSanPham` int NULL DEFAULT NULL,
  `SoLuong` int NULL DEFAULT NULL,
  `ThanhTien` int NULL DEFAULT NULL,
  PRIMARY KEY (`IDGioHang`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of giohang
-- ----------------------------

-- ----------------------------
-- Table structure for hoadon
-- ----------------------------
DROP TABLE IF EXISTS `hoadon`;
CREATE TABLE `hoadon`  (
  `IDHoaDon` int NOT NULL AUTO_INCREMENT,
  `ThoiGian` datetime NULL DEFAULT NULL,
  `ThanhTien` int NULL DEFAULT NULL,
  `IDNguoi` int NULL DEFAULT NULL,
  `TrangThai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`IDHoaDon`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hoadon
-- ----------------------------

-- ----------------------------
-- Table structure for kho
-- ----------------------------
DROP TABLE IF EXISTS `kho`;
CREATE TABLE `kho`  (
  `IDKho` int NOT NULL AUTO_INCREMENT,
  `TenLoai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `SoLuong` int NULL DEFAULT NULL,
  PRIMARY KEY (`IDKho`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kho
-- ----------------------------

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role`  (
  `RoleID` int NOT NULL AUTO_INCREMENT,
  `RoleName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`RoleID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role
-- ----------------------------

-- ----------------------------
-- Table structure for sanpham
-- ----------------------------
DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE `sanpham`  (
  `IDSanPham` int NOT NULL AUTO_INCREMENT,
  `TenSanPham` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `Gia` int NULL DEFAULT NULL,
  `IDDanhMuc` int NULL DEFAULT NULL,
  `Mota` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `GiamGia` int NULL DEFAULT NULL,
  `AnhBia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `IDKho` int NULL DEFAULT NULL,
  PRIMARY KEY (`IDSanPham`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sanpham
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `IDNguoi` int NOT NULL AUTO_INCREMENT,
  `Ten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `Tuoi` int NULL DEFAULT NULL,
  `DiaChi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `SoDienThoai` int NULL DEFAULT NULL,
  `GioiTinh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `AnhDaiDien` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `Email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `Role` int NULL DEFAULT NULL,
  PRIMARY KEY (`IDNguoi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
