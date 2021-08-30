-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th8 30, 2021 lúc 01:49 PM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project_cc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitieu`
--

DROP TABLE IF EXISTS `chitieu`;
CREATE TABLE IF NOT EXISTS `chitieu` (
  `MaCT` int(11) NOT NULL AUTO_INCREMENT,
  `MaSP` int(11) NOT NULL,
  `GiaTienNhap` bigint(50) NOT NULL,
  `SoLuongNhap` int(11) NOT NULL,
  `NguoiNhap` varchar(50) NOT NULL,
  PRIMARY KEY (`MaCT`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chitieu`
--

INSERT INTO `chitieu` (`MaCT`, `MaSP`, `GiaTienNhap`, `SoLuongNhap`, `NguoiNhap`) VALUES
(1, 1, 700000000, 2, 'Quy'),
(2, 1, 8000000000, 8, 'Quyen'),
(3, 2, 780000000, 20, 'Quy'),
(4, 3, 560000000, 5, 'Quan');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
