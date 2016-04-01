-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2016 at 09:01 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yii2`
--

-- --------------------------------------------------------

--
-- Table structure for table `yii2_don_vi_tinh`
--

CREATE TABLE IF NOT EXISTS `yii2_don_vi_tinh` (
  `id` int(11) NOT NULL,
  `ten` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `yii2_hanghoa`
--

CREATE TABLE IF NOT EXISTS `yii2_hanghoa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tenhang` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `duongdan` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tinhtrang` enum('conhang','hethang') COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaban` float DEFAULT NULL,
  `giacanhtranh` float DEFAULT NULL,
  `tomtat` text COLLATE utf8_unicode_ci,
  `mota` text COLLATE utf8_unicode_ci,
  `loaihang_id` int(11) NOT NULL,
  `mahang` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuonghieu_id` int(11) NOT NULL,
  `don_vi_tinh_id` int(11) NOT NULL,
  `nha_cung_cap_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_yii2_hanghoa_yii2_loaihang_idx` (`loaihang_id`),
  KEY `fk_yii2_hanghoa_yii2_thuonghieu1_idx` (`thuonghieu_id`),
  KEY `fk_yii2_hanghoa_yii2_don_vi_tinh1_idx` (`don_vi_tinh_id`),
  KEY `fk_yii2_hanghoa_yii2_nha_cung_cap1_idx` (`nha_cung_cap_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `yii2_hanghoa`
--

INSERT INTO `yii2_hanghoa` (`id`, `tenhang`, `duongdan`, `tinhtrang`, `giaban`, `giacanhtranh`, `tomtat`, `mota`, `loaihang_id`, `mahang`, `thuonghieu_id`, `don_vi_tinh_id`, `nha_cung_cap_id`) VALUES
(1, 'Che thai', 'che-thai', 'conhang', 1200000, 1000000, 'asdfghjk', 'asdfghj', 1, '01192chethai', 1, 0, 0),
(2, 'Che thai1', 'che-thai1', 'conhang', 1200000, 1000000, 'asdfghjk', 'asdfghj', 1, '01192chethai', 1, 0, 0),
(3, 'sdvzxdsffvgsdfg', 'sdvzxdsffvgsdfg', 'conhang', 2342340, 35235400, 'ịoioiuo', 'oijoioiuoi', 1, '01192chethai', 1, 0, 0),
(4, '345345345', '345345345', 'conhang', 1200000, 1000000, 'ưerfsgsgd', 'sdsdfg', 1, '01192chethai', 1, 0, 0),
(5, 'Che O Long', 'che-o-long', 'conhang', 1200000, 1000000, 'jhgfdfghj', 'lkjhgfghjkl', 2, '', 1, 0, 0),
(8, 'upload', 'upload', 'conhang', 1200000, 1000000, 'fghfghaa', 'fghfgh', 2, '', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `yii2_hinhanh`
--

CREATE TABLE IF NOT EXISTS `yii2_hinhanh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hanghoa_id` int(11) DEFAULT NULL,
  `path` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_table1_yii2_hanghoa1_idx` (`hanghoa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `yii2_loaihang`
--

CREATE TABLE IF NOT EXISTS `yii2_loaihang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tenloai` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `duongdan` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nhomloaihang` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_yii2_loaihang_yii2_loaihang1_idx` (`nhomloaihang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `yii2_loaihang`
--

INSERT INTO `yii2_loaihang` (`id`, `tenloai`, `duongdan`, `nhomloaihang`) VALUES
(1, 'Trà nepal', 'tra-nepal', NULL),
(2, 'Ảnh Nepal', 'anh-nepal', 1),
(3, 'Trà Đào', 'tra-dao', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `yii2_nha_cung_cap`
--

CREATE TABLE IF NOT EXISTS `yii2_nha_cung_cap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dia_chi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `so_dien_thoai` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `yii2_nha_cung_cap`
--

INSERT INTO `yii2_nha_cung_cap` (`id`, `ten`, `dia_chi`, `email`, `so_dien_thoai`) VALUES
(1, 'Lam Sơn', 'Hà Nội', 'a@gmail.com', '0987432354'),
(2, 'Lam Hà ', 'Hải Phòng', 'b@gmail.com', '0984823725');

-- --------------------------------------------------------

--
-- Table structure for table `yii2_slide`
--

CREATE TABLE IF NOT EXISTS `yii2_slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tieu_de` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duong_dan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` enum('hienthi','khonghienthi') COLLATE utf8_unicode_ci DEFAULT NULL,
  `noi_dung` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `yii2_slide`
--

INSERT INTO `yii2_slide` (`id`, `tieu_de`, `duong_dan`, `active`, `noi_dung`) VALUES
(1, 'Khuyến mãi tháng 111', 'khuyen-mai-thang-111', 'hienthi', 'hàng trà Nhật'),
(2, 'Khuyến mãi tháng 11', 'khuyen-mai-thang-11', 'hienthi', 'dfgdfgdfg'),
(3, 'Khuyến mãi tháng 11', 'khuyen-mai-thang-11', 'hienthi', 'dfgdfgdfg'),
(4, 'Khuyến mãi tháng 12', 'khuyen-mai-thang-12', 'hienthi', 'ádsđsfsd');

-- --------------------------------------------------------

--
-- Table structure for table `yii2_slide_image`
--

CREATE TABLE IF NOT EXISTS `yii2_slide_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slide_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_yii2_slide_image_yii2_slide1_idx` (`slide_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Table structure for table `yii2_thuonghieu`
--

CREATE TABLE IF NOT EXISTS `yii2_thuonghieu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `duongdan` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `yii2_thuonghieu`
--

INSERT INTO `yii2_thuonghieu` (`id`, `ten`, `duongdan`) VALUES
(1, 'Thái Nguyên', 'thai-nguyen'),
(2, 'Ô Long ', 'o-long');

-- --------------------------------------------------------

--
-- Table structure for table `yii2_user`
--

CREATE TABLE IF NOT EXISTS `yii2_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Họ tên',
  `password_hash` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mật khẩu',
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Email',
  `password_reset_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT '10',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Dumping data for table `yii2_user`
--

INSERT INTO `yii2_user` (`id`, `username`, `password_hash`, `email`, `password_reset_token`, `auth_key`, `status`, `created_at`, `updated_at`) VALUES
(8, 'buitung', '$2y$13$U5Z5K65wOp.VMa.LP.AEW.8mPHeBm/y1EAn0tr.PrFvKWzz4glIcK', 'a@gmail.com', NULL, 'n1KE6HCF0tXod18ZtfhF07bNFjIlEfmx', 10, 1457455960, 1457455960),
(17, 'kkgfjfh', '$2y$13$04Cx.CWrftSpQXT55G5NveM4/.v.MUHdi8FZTIB8ak7Dz9wsCTqEq', 'b@gmail.com', NULL, NULL, 0, 1457847744, 1457925845),
(18, 'asdasd,k', 'asdflkja', 'b@gmail.com', NULL, NULL, 10, 1457848314, 1457848314),
(19, 'fasfafhhh', 'hgfhgfhgf', 'b@gmail.com', NULL, NULL, 0, 1457848950, 1457848950),
(20, 'mjmjaa', 'asdasdasd', 'b@gmail.com', NULL, NULL, 0, 1457849058, 1457850288),
(21, 'dfsggsdg', '$2y$13$NJJy7S9PsPcJ/v15xi9Cuea0U2u/UHbledNlzrtPGLidRqB72CHJK', 'b@gmail.com', NULL, '8eKYJelzztyxGIwKjwdEbSPSSWj12VyC', 10, 1457888589, 1457926068),
(22, 'kladlak', '$2y$13$NrOCYBqgpgOLbtNa43ISAOH5Ft2lF/ssoXvmEgQa92BLbmaYq6ky6', NULL, NULL, '054eOTc0iBf6V6ZN1vilnEIO6YiKUeI6', 10, 1457888620, 1457890063),
(23, 'ádad', '$2y$13$tPMdEpPxk9gpNQVj8TGg4.6IKZfxE.rrde3ZHXVp.lwqvM8eSjoOi', NULL, NULL, 'IRgF9MICWUDzA_rkBA60Mj0t6tEGIZBh', 0, 1457889497, 1457889497),
(24, 'mnbmnbs', '$2y$13$IYzsxc.WbWOUtuwtejdot.2xP7zs.pC61chgdISYJCGHctCOSODz6', NULL, NULL, '4I7hUKw8XsCMORaGRPLus3ioraN_5cya', 10, 1457925975, 1457925975),
(25, 'hhhhhaa', '$2y$13$YHeLaOt2RnY5UiWHpjUJcukMa3jjEtwdOSYd4ClvSiyfIpIMrZENm', 'b@gmail.com', NULL, '4HiLtGT7FlVBx1ucIrowCnouEtsEZZ4w', 10, 1457926030, 1457926030);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `yii2_hanghoa`
--
ALTER TABLE `yii2_hanghoa`
  ADD CONSTRAINT `fk_yii2_hanghoa_yii2_don_vi_tinh1` FOREIGN KEY (`don_vi_tinh_id`) REFERENCES `yii2_don_vi_tinh` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_yii2_hanghoa_yii2_loaihang` FOREIGN KEY (`loaihang_id`) REFERENCES `yii2_loaihang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_yii2_hanghoa_yii2_nha_cung_cap1` FOREIGN KEY (`nha_cung_cap_id`) REFERENCES `yii2_nha_cung_cap` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_yii2_hanghoa_yii2_thuonghieu1` FOREIGN KEY (`thuonghieu_id`) REFERENCES `yii2_thuonghieu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `yii2_hinhanh`
--
ALTER TABLE `yii2_hinhanh`
  ADD CONSTRAINT `fk_table1_yii2_hanghoa1` FOREIGN KEY (`hanghoa_id`) REFERENCES `yii2_hanghoa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `yii2_loaihang`
--
ALTER TABLE `yii2_loaihang`
  ADD CONSTRAINT `fk_yii2_loaihang_yii2_loaihang1` FOREIGN KEY (`nhomloaihang`) REFERENCES `yii2_loaihang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `yii2_slide_image`
--
ALTER TABLE `yii2_slide_image`
  ADD CONSTRAINT `fk_yii2_slide_image_yii2_slide1` FOREIGN KEY (`slide_id`) REFERENCES `yii2_slide` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
