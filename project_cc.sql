-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2021 at 05:48 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_cc`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitieu`
--

CREATE TABLE `chitieu` (
  `MaCT` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `GiaTienNhap` bigint(50) NOT NULL,
  `SoLuongNhap` int(11) NOT NULL,
  `NguoiNhap` varchar(50) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chitieu`
--

INSERT INTO `chitieu` (`MaCT`, `MaSP`, `GiaTienNhap`, `SoLuongNhap`, `NguoiNhap`) VALUES
(1, 1, 6700000000, 15, 'Quan'),
(2, 1, 6800000000, 5, 'Quy'),
(3, 2, 7000000000, 20, 'Quyen'),
(4, 2, 7100000000, 10, 'Quy'),
(5, 3, 8000000000, 30, 'Quyen'),
(6, 4, 500000000, 10, 'Quân');

-- --------------------------------------------------------

--
-- Table structure for table `doanhthu`
--

CREATE TABLE `doanhthu` (
  `madt` int(11) NOT NULL,
  `ngay` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doanhthu`
--

INSERT INTO `doanhthu` (`madt`, `ngay`) VALUES
(4, '2021-08-04');

-- --------------------------------------------------------

--
-- Table structure for table `hangton`
--

CREATE TABLE `hangton` (
  `MaHT` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `SoLuongTon` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hangton`
--

INSERT INTO `hangton` (`MaHT`, `MaSP`, `SoLuongTon`) VALUES
(1, 1, 20),
(2, 2, 30),
(3, 3, 30),
(4, 4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHD` int(11) NOT NULL,
  `NgayGioTao` date NOT NULL,
  `NhanVien` varchar(50) NOT NULL,
  `TenKhachHang` varchar(50) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `SoLuongMua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`MaHD`, `NgayGioTao`, `NhanVien`, `TenKhachHang`, `MaSP`, `SoLuongMua`) VALUES
(1, '0000-00-00', 'Tiến', 'Nguyễn Ngọc Quân', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `makh` int(11) NOT NULL,
  `tenkh` varchar(500) NOT NULL,
  `diachi` varchar(500) NOT NULL,
  `sdt` varchar(500) NOT NULL,
  `sinhnhat` varchar(500) NOT NULL,
  `sothich` varchar(500) NOT NULL,
  `ngaythem` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`makh`, `tenkh`, `diachi`, `sdt`, `sinhnhat`, `sothich`, `ngaythem`) VALUES
(1, 'Nguyễn Văn A', 'Hà Nội', '0386255531', '12/6/1990', 'Cá hát, hội họa', '2021-08-29'),
(2, 'Nguyễn Hữu Quý', 'Hà Nội', '092392342', '12/12/2000', 'Code', '2021-08-30'),
(3, 'Nguyễn Ngọc Quân', 'Somewhere', '093424734', '04/04/2000', 'Code', '2021-08-30');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int(11) NOT NULL,
  `TenSP` varchar(50) NOT NULL,
  `Hang` varchar(30) NOT NULL,
  `MauHienCo` varchar(50) NOT NULL,
  `SoGhe` int(11) NOT NULL,
  `GiaTien` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `Hang`, `MauHienCo`, `SoGhe`, `GiaTien`) VALUES
(1, 'MAZDA6', 'Mazda', 'Soul Red, Deep Blue, White, Machine Grey', 4, 899000000),
(2, 'MAZDA CX-8', 'Mazda', 'Soul Red, Deep Blue, White, Machine Grey', 4, 999000000),
(3, 'ALL-NEW MAZDA3 SPORT', 'Mazda', 'Soul Red, Deep Blue, White, Machine Grey', 2, 699000000),
(4, 'Mazda 3 Sport', 'Mazda', 'Ghi xám', 4, 799000000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL COMMENT 'Tên đăng nhập',
  `password` varchar(100) DEFAULT NULL COMMENT 'Mật khẩu đăng nhập',
  `first_name` varchar(100) DEFAULT NULL COMMENT 'Fist name',
  `last_name` varchar(100) DEFAULT NULL COMMENT 'Last name',
  `phone` int(11) DEFAULT NULL COMMENT 'SĐT user',
  `address` varchar(100) DEFAULT NULL COMMENT 'Địa chỉ user',
  `email` varchar(100) DEFAULT NULL COMMENT 'Email của user',
  `avatar` varchar(100) DEFAULT NULL COMMENT 'File ảnh đại diện',
  `jobs` varchar(100) DEFAULT NULL COMMENT 'Nghề nghiệp',
  `last_login` datetime DEFAULT NULL COMMENT 'Lần đăng nhập gần đây nhất',
  `facebook` varchar(100) DEFAULT NULL COMMENT 'Link facebook',
  `status` tinyint(3) DEFAULT 0 COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `phone`, `address`, `email`, `avatar`, `jobs`, `last_login`, `facebook`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-08-29 09:20:57', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitieu`
--
ALTER TABLE `chitieu`
  ADD PRIMARY KEY (`MaCT`);

--
-- Indexes for table `doanhthu`
--
ALTER TABLE `doanhthu`
  ADD PRIMARY KEY (`madt`);

--
-- Indexes for table `hangton`
--
ALTER TABLE `hangton`
  ADD PRIMARY KEY (`MaHT`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHD`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`makh`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitieu`
--
ALTER TABLE `chitieu`
  MODIFY `MaCT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doanhthu`
--
ALTER TABLE `doanhthu`
  MODIFY `madt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hangton`
--
ALTER TABLE `hangton`
  MODIFY `MaHT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `makh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
