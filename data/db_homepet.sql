-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2021 at 12:34 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_homepet`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_chitietdathang`
--

CREATE TABLE `tb_chitietdathang` (
  `SoDonDH` int(11) NOT NULL,
  `MSHH` int(11) NOT NULL,
  `SoLuong` tinyint(4) NOT NULL,
  `GiaDatHang` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dathang`
--

CREATE TABLE `tb_dathang` (
  `SoDonDH` int(11) NOT NULL,
  `MSKH` int(11) NOT NULL,
  `MSNV` int(11) DEFAULT NULL,
  `NgayDH` datetime NOT NULL,
  `TrangThai` varchar(50) NOT NULL,
  `TongThanhToan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_hanghoa`
--

CREATE TABLE `tb_hanghoa` (
  `MSHH` int(11) NOT NULL,
  `TenHH` varchar(200) NOT NULL,
  `Gia` int(5) NOT NULL,
  `SoLuongHang` tinyint(4) NOT NULL,
  `MaNhom` int(11) NOT NULL,
  `MaTH` int(11) NOT NULL,
  `Hinh` int(11) NOT NULL,
  `MoTaHH` varchar(200) DEFAULT NULL,
  `NgayCN` date NOT NULL,
  `KhuyenMai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_khachhang`
--

CREATE TABLE `tb_khachhang` (
  `MSKH` int(11) NOT NULL,
  `HoTenKH` varchar(50) NOT NULL,
  `DiaChi` varchar(200) NOT NULL,
  `SoDienThoai` varchar(10) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_nhanvien`
--

CREATE TABLE `tb_nhanvien` (
  `MSNV` int(11) NOT NULL,
  `HoTenNV` varchar(50) NOT NULL,
  `DiaChi` varchar(200) NOT NULL,
  `SoDienThoai` varchar(10) NOT NULL,
  `ChucVu` varchar(25) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_nhomhanghoa`
--

CREATE TABLE `tb_nhomhanghoa` (
  `MaNhom` int(11) NOT NULL,
  `TenNhom` varchar(50) NOT NULL,
  `MaTC` int(11) NOT NULL,
  `NgayCapNhat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_thucung`
--

CREATE TABLE `tb_thucung` (
  `MaTC` int(11) NOT NULL,
  `TenThuCung` varchar(50) NOT NULL,
  `NgayCapNhat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_thuonghieu`
--

CREATE TABLE `tb_thuonghieu` (
  `MaTH` int(11) NOT NULL,
  `TenThuongHieu` int(11) NOT NULL,
  `NgayCapNhat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dathang`
--
ALTER TABLE `tb_dathang`
  ADD PRIMARY KEY (`SoDonDH`);

--
-- Indexes for table `tb_hanghoa`
--
ALTER TABLE `tb_hanghoa`
  ADD PRIMARY KEY (`MSHH`);

--
-- Indexes for table `tb_khachhang`
--
ALTER TABLE `tb_khachhang`
  ADD PRIMARY KEY (`MSKH`);

--
-- Indexes for table `tb_nhanvien`
--
ALTER TABLE `tb_nhanvien`
  ADD PRIMARY KEY (`MSNV`);

--
-- Indexes for table `tb_nhomhanghoa`
--
ALTER TABLE `tb_nhomhanghoa`
  ADD PRIMARY KEY (`MaNhom`);

--
-- Indexes for table `tb_thucung`
--
ALTER TABLE `tb_thucung`
  ADD PRIMARY KEY (`MaTC`);

--
-- Indexes for table `tb_thuonghieu`
--
ALTER TABLE `tb_thuonghieu`
  ADD PRIMARY KEY (`MaTH`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dathang`
--
ALTER TABLE `tb_dathang`
  MODIFY `SoDonDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_hanghoa`
--
ALTER TABLE `tb_hanghoa`
  MODIFY `MSHH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_khachhang`
--
ALTER TABLE `tb_khachhang`
  MODIFY `MSKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_nhanvien`
--
ALTER TABLE `tb_nhanvien`
  MODIFY `MSNV` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_nhomhanghoa`
--
ALTER TABLE `tb_nhomhanghoa`
  MODIFY `MaNhom` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_thucung`
--
ALTER TABLE `tb_thucung`
  MODIFY `MaTC` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_thuonghieu`
--
ALTER TABLE `tb_thuonghieu`
  MODIFY `MaTH` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
