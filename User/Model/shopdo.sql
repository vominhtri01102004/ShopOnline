-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 11, 2024 lúc 11:46 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `test2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `idcomment` int(11) NOT NULL,
  `idkh` int(11) NOT NULL,
  `idhanghoa` int(11) NOT NULL,
  `content` text NOT NULL,
  `diem` int(10) NOT NULL,
  `thoigian` datetime NOT NULL,
  `thich` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`idcomment`, `idkh`, `idhanghoa`, `content`, `diem`, `thoigian`, `thich`) VALUES
(1, 3, 19, '  đẹp', 5, '2024-05-21 09:13:16', 2),
(2, 3, 19, '  thấp', 3, '2024-05-01 09:13:24', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `commentthich`
--

CREATE TABLE `commentthich` (
  `idcomment` int(11) NOT NULL,
  `makh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `commentthich`
--

INSERT INTO `commentthich` (`idcomment`, `makh`) VALUES
(1, 2),
(2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthanghoa`
--

CREATE TABLE `cthanghoa` (
  `idhanghoa` int(11) NOT NULL,
  `idmau` int(11) NOT NULL,
  `idsize` int(11) NOT NULL,
  `dongia` float NOT NULL,
  `soluongton` int(11) NOT NULL,
  `hinh` varchar(100) NOT NULL,
  `giamgia` float NOT NULL,
  `hienthi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cthanghoa`
--

INSERT INTO `cthanghoa` (`idhanghoa`, `idmau`, `idsize`, `dongia`, `soluongton`, `hinh`, `giamgia`, `hienthi`) VALUES
(1, 1, 1, 140000, 12, '3.jpg', 0, 0),
(1, 1, 2, 140000, 12, '3.jpg', 0, 0),
(1, 1, 3, 140000, 12, '3.jpg', 0, 0),
(1, 5, 1, 140000, 12, '2.jpg', 0, 0),
(1, 5, 2, 140000, 12, '2.jpg', 0, 0),
(1, 5, 3, 140000, 12, '2.jpg', 0, 0),
(1, 7, 1, 150000, 10, '1.jpg', 95000, 0),
(1, 7, 2, 150000, 9, '1.jpg', 95000, 0),
(1, 7, 3, 150000, 10, '1.jpg', 95000, 0),
(2, 1, 2, 220000, 12, '5.jpg', 170000, 0),
(2, 1, 3, 220000, 12, '5.jpg', 170000, 0),
(2, 1, 4, 220000, 12, '5.jpg', 170000, 0),
(2, 2, 2, 190000, 12, '6.jpg', 170000, 0),
(2, 2, 3, 190000, 12, '6.jpg', 170000, 0),
(2, 2, 4, 190000, 12, '6.jpg', 170000, 0),
(2, 3, 2, 200000, 12, '4.jpg', 180000, 0),
(2, 3, 3, 200000, 12, '4.jpg', 180000, 0),
(2, 3, 4, 200000, 12, '4.jpg', 180000, 0),
(3, 1, 1, 250000, 12, '9.jpg', 240000, 0),
(3, 1, 2, 250000, 12, '9.jpg', 240000, 0),
(3, 1, 3, 250000, 12, '9.jpg', 240000, 0),
(3, 3, 1, 240000, 12, '7.jpg', 0, 0),
(3, 3, 2, 240000, 12, '7.jpg', 0, 0),
(3, 3, 3, 240000, 12, '7.jpg', 0, 0),
(3, 6, 1, 250000, 12, '10.jpg', 240000, 0),
(3, 6, 2, 250000, 12, '10.jpg', 240000, 0),
(3, 6, 3, 250000, 12, '10.jpg', 240000, 0),
(4, 1, 1, 90000, 12, '12.jpg', 85000, 0),
(4, 1, 2, 90000, 12, '12.jpg', 85000, 0),
(4, 1, 3, 90000, 12, '12.jpg', 85000, 0),
(4, 2, 1, 90000, 12, '11.jpg', 0, 0),
(4, 2, 2, 90000, 12, '11.jpg', 0, 0),
(4, 2, 3, 90000, 12, '11.jpg', 0, 0),
(4, 6, 1, 90000, 12, '13.jpg', 80000, 0),
(4, 6, 2, 90000, 12, '13.jpg', 80000, 0),
(4, 6, 3, 90000, 12, '13.jpg', 80000, 0),
(5, 1, 1, 100000, 12, '14.jpg', 0, 0),
(5, 1, 2, 100000, 12, '17.jpg', 0, 0),
(5, 2, 1, 100000, 12, '15.jpg', 9000, 0),
(5, 2, 2, 100000, 12, '16.jpg', 90000, 0),
(6, 1, 1, 140000, 12, '19.jpg', 130000, 0),
(6, 1, 2, 140000, 12, '19.jpg', 130000, 0),
(6, 1, 3, 140000, 12, '19.jpg', 130000, 0),
(6, 2, 1, 140000, 12, '18.jpg', 0, 0),
(6, 2, 2, 140000, 12, '18.jpg', 0, 0),
(6, 2, 3, 140000, 12, '18.jpg', 0, 0),
(6, 6, 1, 140000, 12, '20.jpg', 0, 0),
(6, 6, 2, 140000, 12, '20.jpg', 0, 0),
(6, 6, 3, 140000, 12, '20.jpg', 0, 0),
(7, 2, 1, 115000, 12, '24.jpg', 0, 0),
(7, 2, 2, 115000, 12, '24.jpg', 0, 0),
(7, 2, 3, 115000, 12, '24.jpg', 0, 0),
(7, 5, 1, 125000, 12, '23.jpg', 0, 0),
(7, 5, 2, 125000, 12, '23.jpg', 0, 0),
(7, 5, 3, 125000, 12, '23.jpg', 0, 0),
(7, 6, 1, 125000, 12, '21.jpg', 110000, 0),
(7, 6, 2, 125000, 12, '21.jpg', 110000, 0),
(7, 6, 3, 125000, 12, '21.jpg', 110000, 0),
(8, 2, 1, 125000, 12, '26.jpg', 0, 0),
(8, 2, 2, 125000, 12, '26.jpg', 0, 0),
(8, 2, 3, 125000, 12, '26.jpg', 0, 0),
(8, 6, 1, 125000, 12, '22.jpg', 110000, 0),
(8, 6, 2, 125000, 12, '22.jpg', 110000, 0),
(8, 6, 3, 125000, 12, '22.jpg', 110000, 0),
(8, 7, 1, 115000, 12, '25.jpg', 0, 0),
(8, 7, 2, 115000, 12, '25.jpg', 0, 0),
(8, 7, 3, 115000, 12, '25.jpg', 0, 0),
(9, 2, 1, 145000, 12, '29.jpg', 130000, 0),
(9, 2, 2, 145000, 12, '29.jpg', 130000, 0),
(9, 2, 3, 145000, 12, '29.jpg', 130000, 0),
(9, 5, 1, 140000, 12, '28.jpg', 0, 0),
(9, 5, 2, 140000, 12, '28.jpg', 0, 0),
(9, 5, 3, 145000, 12, '27.jpg', 125000, 0),
(10, 2, 1, 115000, 12, '54.jpg', 100000, 0),
(10, 2, 2, 115000, 12, '54.jpg', 100000, 0),
(10, 2, 3, 115000, 12, '54.jpg', 100000, 0),
(10, 2, 4, 115000, 12, '54.jpg', 100000, 0),
(10, 4, 1, 100000, 11, '58.jpg', 90000, 0),
(10, 4, 2, 100000, 11, '58.jpg', 90000, 0),
(10, 4, 3, 100000, 12, '58.jpg', 90000, 0),
(10, 4, 4, 100000, 12, '57.jpg', 90000, 0),
(10, 5, 1, 100000, 12, '56.jpg', 90000, 0),
(10, 5, 2, 100000, 12, '56.jpg', 90000, 0),
(10, 5, 3, 100000, 11, '56.jpg', 90000, 0),
(10, 5, 4, 115000, 12, '55.jpg', 100000, 0),
(11, 1, 2, 125000, 12, '53.jpg', 0, 0),
(11, 1, 3, 125000, 12, '53.jpg', 0, 0),
(11, 2, 2, 125000, 12, '51.jpg', 0, 0),
(11, 2, 3, 125000, 12, '51.jpg', 0, 0),
(12, 5, 1, 150000, 12, '59.jpg', 0, 0),
(12, 5, 2, 150000, 12, '59.jpg', 0, 0),
(12, 5, 3, 155000, 12, '61.jpg', 0, 0),
(12, 6, 1, 155000, 12, '60.jpg', 145000, 0),
(12, 6, 2, 155000, 12, '60.jpg', 145000, 0),
(12, 6, 3, 155000, 12, '60.jpg', 145000, 0),
(13, 1, 1, 120000, 12, '65.jpg', 0, 0),
(13, 1, 2, 120000, 12, '65.jpg', 0, 0),
(13, 1, 3, 120000, 12, '65.jpg', 0, 0),
(13, 1, 4, 120000, 12, '65.jpg', 0, 0),
(13, 2, 1, 120000, 12, '62.jpg', 110000, 0),
(13, 2, 2, 120000, 12, '62.jpg', 110000, 0),
(13, 2, 3, 120000, 12, '62.jpg', 110000, 0),
(13, 2, 4, 120000, 12, '62.jpg', 110000, 0),
(13, 4, 1, 125000, 12, '63.jpg', 0, 0),
(13, 4, 2, 125000, 12, '63.jpg', 0, 0),
(13, 4, 3, 125000, 12, '63.jpg', 0, 0),
(13, 4, 4, 125000, 12, '63.jpg', 0, 0),
(13, 5, 1, 125000, 12, '64.jpg', 0, 0),
(13, 5, 2, 125000, 12, '64.jpg', 0, 0),
(13, 5, 3, 125000, 12, '64.jpg', 0, 0),
(13, 5, 4, 125000, 12, '64.jpg', 0, 0),
(14, 3, 1, 100000, 12, '68.jpg', 0, 0),
(14, 3, 2, 100000, 12, '68.jpg', 0, 0),
(14, 3, 3, 100000, 12, '68.jpg', 0, 0),
(14, 3, 4, 100000, 12, '68.jpg', 0, 0),
(14, 4, 1, 100000, 12, '66.jpg', 0, 0),
(14, 4, 2, 100000, 12, '66.jpg', 0, 0),
(14, 4, 3, 100000, 12, '66.jpg', 0, 0),
(14, 4, 4, 100000, 12, '66.jpg', 0, 0),
(14, 5, 1, 100000, 12, '70.jpg', 0, 0),
(14, 5, 2, 100000, 12, '70.jpg', 0, 0),
(14, 5, 3, 100000, 12, '70.jpg', 0, 0),
(14, 5, 4, 100000, 12, '70.jpg', 0, 0),
(14, 8, 1, 100000, 12, '67.jpg', 0, 0),
(14, 8, 2, 100000, 12, '67.jpg', 0, 0),
(14, 8, 3, 100000, 12, '67.jpg', 0, 0),
(14, 8, 4, 100000, 12, '67.jpg', 0, 0),
(15, 1, 1, 220000, 12, '72.jpg', 210000, 0),
(15, 1, 2, 220000, 12, '72.jpg', 210000, 0),
(15, 1, 3, 220000, 12, '72.jpg', 210000, 0),
(15, 3, 1, 220000, 12, '71.jpg', 200000, 0),
(15, 3, 2, 220000, 12, '71.jpg', 200000, 0),
(15, 3, 3, 220000, 12, '71.jpg', 200000, 0),
(15, 6, 1, 220000, 12, '73.jpg', 0, 0),
(15, 6, 2, 220000, 12, '73.jpg', 0, 0),
(15, 6, 3, 220000, 12, '73.jpg', 0, 0),
(16, 1, 2, 100000, 12, '75.jpg', 0, 0),
(16, 1, 3, 100000, 12, '75.jpg', 0, 0),
(16, 1, 4, 100000, 12, '75.jpg', 0, 0),
(16, 2, 2, 100000, 12, '74.jpg', 0, 0),
(16, 2, 3, 100000, 12, '74.jpg', 0, 0),
(16, 2, 4, 100000, 12, '74.jpg', 0, 0),
(16, 9, 2, 100000, 12, '76.jpg', 0, 0),
(16, 9, 3, 100000, 12, '76.jpg', 0, 0),
(16, 9, 4, 100000, 12, '76.jpg', 0, 0),
(17, 1, 1, 200000, 12, '77.jpg', 190000, 0),
(17, 1, 2, 200000, 12, '77.jpg', 190000, 0),
(17, 1, 3, 200000, 12, '77.jpg', 190000, 0),
(17, 1, 4, 200000, 12, '78.jpg', 190000, 0),
(17, 2, 1, 200000, 12, '80.jpg', 185000, 0),
(17, 2, 2, 200000, 12, '80.jpg', 185000, 0),
(17, 2, 3, 200000, 12, '80.jpg', 185000, 0),
(17, 2, 4, 200000, 12, '79.jpg', 185000, 0),
(18, 1, 1, 125000, 12, '81.jpg', 110000, 0),
(18, 1, 2, 125000, 12, '81.jpg', 110000, 0),
(18, 2, 1, 125000, 12, '82.jpg', 110000, 0),
(18, 2, 2, 125000, 12, '82.jpg', 110000, 0),
(19, 1, 1, 250000, 12, '86.jpg', 0, 0),
(19, 1, 2, 250000, 12, '86.jpg', 0, 0),
(19, 1, 3, 250000, 12, '86.jpg', 0, 0),
(19, 1, 4, 250000, 12, '86.jpg', 0, 0),
(19, 2, 1, 250000, 12, '84.jpg', 0, 0),
(19, 2, 2, 250000, 12, '84.jpg', 0, 0),
(19, 2, 3, 250000, 12, '84.jpg', 0, 0),
(19, 2, 4, 250000, 12, '84.jpg', 0, 0),
(19, 3, 1, 250000, 12, '85.jpg', 235000, 0),
(19, 3, 2, 250000, 12, '85.jpg', 235000, 0),
(19, 3, 3, 250000, 12, '85.jpg', 235000, 0),
(19, 3, 4, 250000, 12, '85.jpg', 235000, 0),
(19, 4, 1, 250000, 12, '87.jpg', 235000, 0),
(19, 4, 2, 250000, 12, '87.jpg', 235000, 0),
(19, 4, 3, 250000, 12, '87.jpg', 235000, 0),
(19, 4, 4, 250000, 12, '87.jpg', 235000, 0),
(20, 1, 1, 75000, 12, '88.jpg', 0, 0),
(20, 1, 2, 75000, 12, '88.jpg', 0, 0),
(20, 2, 1, 75000, 12, '90.jpg', 0, 0),
(20, 2, 2, 75000, 12, '90.jpg', 0, 0),
(20, 8, 1, 75000, 12, '89.jpg', 0, 0),
(20, 8, 2, 75000, 12, '89.jpg', 0, 0),
(21, 2, 1, 140000, 12, '39.jpg', 0, 0),
(21, 2, 2, 140000, 12, '39.jpg', 0, 0),
(21, 2, 3, 140000, 12, '39.jpg', 0, 0),
(21, 8, 1, 185000, 12, '41.jpg', 170000, 0),
(21, 8, 2, 185000, 12, '41.jpg', 170000, 0),
(21, 8, 3, 185000, 12, '41.jpg', 170000, 0),
(22, 1, 1, 175000, 20, '42.jpg', 0, 0),
(22, 1, 2, 175000, 20, '42.jpg', 0, 0),
(22, 2, 1, 185000, 12, '37.jpg', 0, 0),
(22, 2, 2, 185000, 11, '37.jpg', 0, 0),
(23, 3, 3, 175000, 12, '38.jpg', 165000, 0),
(23, 3, 4, 175000, 12, '38.jpg', 165000, 0),
(23, 6, 3, 185000, 12, '40.jpg', 0, 0),
(23, 6, 4, 185000, 12, '40.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthoadon`
--

CREATE TABLE `cthoadon` (
  `masohd` int(11) NOT NULL,
  `mahh` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL,
  `mausac` varchar(20) NOT NULL,
  `size` varchar(11) NOT NULL,
  `dongia` float NOT NULL,
  `giamgia` float NOT NULL,
  `loai` varchar(111) NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `hinh` varchar(120) NOT NULL,
  `tenhh` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cthoadon`
--

INSERT INTO `cthoadon` (`masohd`, `mahh`, `soluongmua`, `mausac`, `size`, `dongia`, `giamgia`, `loai`, `thanhtien`, `trangthai`, `hinh`, `tenhh`) VALUES
(1, 22, 2, 'Trắng', 'M', 200000, 190000, 'Quần Dài Ống Rộng', 380000, 5, '77.jpg', 'Quần dài ống rộng có dây rút gấu mặc 2 kiểu ống suông và jogger siêu hot'),
(2, 22, 1, 'Đen', 'M', 200000, 190000, 'Quần Dài Ống Rộng', 190000, 5, '77.jpg', 'Quần dài ống rộng có dây rút gấu mặc 2 kiểu ống suông và jogger siêu hot'),
(3, 22, 1, 'Đen', 'L', 200000, 190000, 'Quần Dài Ống Rộng', 190000, 5, '77.jpg', 'Quần dài ống rộng có dây rút gấu mặc 2 kiểu ống suông và jogger siêu hot'),
(4, 22, 1, 'Đen', 'S', 90000, 85000, 'Áo Thun Phông', 85000, 2, '11.jpg', 'Áo thun phông nam nữ form rộng tay lỡ unisex ATL 221'),
(5, 22, 1, 'Đen', 'L', 140000, 0, 'Áo Sweater', 170000, 2, '39.jpg', 'Áo Swearter Hình Thú Vui Nhộn, Đẹp Mắt, Sinh Động A709'),
(6, 22, 1, 'Xanh Dương\r\n', 'Xl', 175000, 165000, 'Áo Sweater', 185000, 2, '40.jpg', 'Áo Swearter Hình Thú Vui Nhộn, Đẹp Mắt, Sinh Động A107\r\n'),
(7, 4, 1, 'Đen', 'L', 90000, 85000, 'Áo Thun Phông', 80000, 3, '11.jpg', 'Áo thun phông nam nữ form rộng tay lỡ unisex ATL 221'),
(8, 18, 1, 'Trắng', 'S', 125000, 110000, 'Quần Short', 110000, 3, '81.jpg', 'Quần short unisex Dây+Túi bên ngoài, chất mát mền và không nhắn, phong cách '),
(9, 19, 1, 'Xám\r\n', 'M', 250000, 0, 'Quần Dài Ống Rộng', 235000, 3, '85.jpg', 'Quần nam ống rộng màu trơn bằng thun lạnh thời trang hè Hàn Quốc \r\n'),
(10, 19, 1, 'Trắng', 'L', 250000, 0, 'Quần Dài Ống Rộng', 250000, 3, '86.jpg', 'Quần nam ống rộng màu trơn bằng thun lạnh thời trang hè Hàn Quốc \r\n'),
(11, 4, 1, 'Đen', 'L', 90000, 0, 'Áo Thun Phông', 80000, 2, '11.jpg', 'Áo thun phông nam nữ form rộng tay lỡ unisex ATL 221'),
(12, 17, 1, 'Trắng', 'M', 200000, 190000, 'Quần Dài Ống Rộng', 190000, 2, '77.jpg', 'Quần dài ống rộng có dây rút gấu mặc 2 kiểu ống suông và jogger siêu hot'),
(13, 18, 1, 'Trắng', 'S', 125000, 110000, 'Quần Short', 110000, 2, '81.jpg', 'Quần short unisex Dây+Túi bên ngoài, chất mát mền và không nhắn, phong cách '),
(14, 19, 1, 'Xám\r\n', 'M', 250000, 235000, 'Quần Dài Ống Rộng', 235000, 2, '85.jpg', 'Quần nam ống rộng màu trơn bằng thun lạnh thời trang hè Hàn Quốc \r\n'),
(15, 19, 1, 'Trắng', 'L', 250000, 0, 'Quần Dài Ống Rộng', 250000, 2, '86.jpg', 'Quần nam ống rộng màu trơn bằng thun lạnh thời trang hè Hàn Quốc \r\n'),
(16, 10, 1, 'Be', 'S', 100000, 90000, 'Quần Túi Hộp', 90000, 0, '58.jpg', 'Quần Túi Hộp Kaki Đen Unisex Dáng Rộng Bo Gấu Ống Suông Nam Nữ'),
(16, 10, 1, 'Be', 'M', 100000, 90000, 'Quần Túi Hộp', 90000, 0, '58.jpg', 'Quần Túi Hộp Kaki Đen Unisex Dáng Rộng Bo Gấu Ống Suông Nam Nữ'),
(16, 10, 1, 'Xanh Lá\r\n', 'L', 100000, 90000, 'Quần Túi Hộp', 90000, 0, '56.jpg', 'Quần Túi Hộp Kaki Đen Unisex Dáng Rộng Bo Gấu Ống Suông Nam Nữ'),
(16, 22, 1, 'Đen', 'M', 185000, 0, 'Áo Sweater', 185000, 0, '37.jpg', 'Áo Swearter Hình Thú Vui Nhộn, Đẹp Mắt, Sinh Động A607\r\n'),
(17, 1, 1, 'Hồng', 'M', 150000, 95000, 'Áo Polo', 95000, 0, '1.jpg', 'Áo sweater nỉ bông thu đông unisex dáng rộng Y');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `makh` int(11) NOT NULL,
  `mahh` int(11) NOT NULL,
  `idsize` int(11) NOT NULL,
  `idmau` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL,
  `mavoucher` int(11) NOT NULL,
  `idship` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `mahh` int(11) NOT NULL,
  `tenhh` varchar(90) NOT NULL,
  `maloai` int(11) NOT NULL,
  `soluotxem` int(11) NOT NULL,
  `ngaylap` date NOT NULL,
  `mota` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`mahh`, `tenhh`, `maloai`, `soluotxem`, `ngaylap`, `mota`) VALUES
(1, 'Áo sweater nỉ bông thu đông unisex dáng rộng Y', 3, 116, '2020-08-08', '<p>H&agrave;ng chuẩn đẹp như m&ocirc; tả, ảnh thật 100%. M&agrave;u sắc c&oacute; thể đậm hoặc nhạt 1-5% do hiệu ứng &aacute;nh s&aacute;ng (c&oacute; thể do b&oacute;ng r&acirc;m, đ&egrave;n s&aacute;ng hoặc tối, độ ph&acirc;n giải của m&aacute;y, &hellip;).Giao h&agrave;ng to&agrave;n quốc từ 1 &ndash; 4 ng&agrave;y sau khi đặt h&agrave;ng.Cam kết đổi trả nếu sản phẩm lỗi v&agrave; kh&ocirc;ng giống h&igrave;nh ản<img src=\"Content/imagetourdien/2.jpg\" alt=\"\" width=\"260\" height=\"260\">hChất liệu &aacute;o sweater (d&agrave;i tay): 100% Nỉ b&ocirc;ng gi&uacute;p &aacute;o d&agrave;y dặn, giữ ấm tốt- Form sweater: Unisex ph&ugrave; hợp cho cả nam v&agrave; nữ-Đường may sweater (d&agrave;i tay) nam nữ tinh tế, tỉ mỉ trong từng chi tiết Sweater (d&agrave;i tay) thiết kế hiện đại, trẻ trung, năng động. Dễ phối đồĐặc biệt sweater (d&agrave;i tay) c&oacute; sợi Nỉ b&ocirc;ng được xử l&iacute; gi&uacute;p chống tia UV v&agrave; kh&aacute;ng khuẩn.</p>'),
(2, 'Áo sweater nỉ bông thu đông unisex dáng rộng Y3', 7, 30, '2020-08-08', 'Hàng chuẩn đẹp như mô tả, ảnh thật 100%. Màu sắc có thể đậm hoặc nhạt 1-5% do hiệu ứng ánh sáng (có thể do bóng râm, đèn sáng hoặc tối, độ phân giải của máy, …).Giao hàng toàn quốc từ 1 – 4 ngày sau khi đặt hàng.Cam kết đổi trả nếu sản phẩm lỗi và không giống hình ảnhChất liệu áo sweater (dài tay): 100% Nỉ bông giúp áo dày dặn, giữ ấm tốt- Form sweater: Unisex phù hợp cho cả nam và nữ-Đường may sweater (dài tay) nam nữ tinh tế, tỉ mỉ trong từng chi tiết Sweater (dài tay) thiết kế hiện đại, trẻ trung, năng động. Dễ phối đồĐặc biệt sweater (dài tay) có sợi Nỉ bông được xử lí giúp chống tia UV và kháng khuẩn.'),
(3, 'Áo len lông cừu nam thời trang Hong Kong size M-5XL', 8, 45, '2020-08-08', 'Vải bố và da nhân tạo. Phù hợp đi làm, đi tiệc và đi chơi'),
(4, 'Áo thun phông nam nữ form rộng tay lỡ unisex ATL 221', 5, 26, '2020-08-08', 'Chất liệu: thun cotton khô co giãn, vải mềm thoáng mát, không xù lông.\r\n\r\nĐường may chuẩn chỉnh, tỉ mỉ, chắc chắn.\r\n\r\nMặc ở nhà, mặc đi chơi hoặc khi vận động thể thao. Phù hợp khi mix đồ với nhiều loại.\r\n\r\nThiết kế hiện đại, trẻ trung, năng động. Dễ phối đồ.\r\n\r\nĐảm bảo vải chuẩn thun cotton khô chất lượng loại 1\r\n\r\nHàng có sẵn, giao hàng ngay khi nhận được đơn đặt hàng .\r\n\r\nHoàn tiền 100% nếu sản phẩm lỗi, nhầm hoặc không giống với mô tả.\r\n\r\nChấp nhận đổi hàng khi size không vừa (vui lòng nhắn tin riêng cho shop).\r\n\r\nGiao hàng toàn quốc, thanh toán khi nhận hàng.'),
(5, 'Áo thun phông nam nữ form rộng tay lỡ unisex ATL 222', 5, 20, '2020-08-08', 'Chất liệu: thun cotton khô co giãn, vải mềm thoáng mát, không xù lông.\r\n\r\nĐường may chuẩn chỉnh, tỉ mỉ, chắc chắn.\r\n\r\nMặc ở nhà, mặc đi chơi hoặc khi vận động thể thao. Phù hợp khi mix đồ với nhiều loại.\r\n\r\nThiết kế hiện đại, trẻ trung, năng động. Dễ phối đồ.\r\n\r\nĐảm bảo vải chuẩn thun cotton khô chất lượng loại 1\r\n\r\nHàng có sẵn, giao hàng ngay khi nhận được đơn đặt hàng .\r\n\r\nHoàn tiền 100% nếu sản phẩm lỗi, nhầm hoặc không giống với mô tả.\r\n\r\nChấp nhận đổi hàng khi size không vừa (vui lòng nhắn tin riêng cho shop).\r\n\r\nGiao hàng toàn quốc, thanh toán khi nhận hàng.'),
(6, 'Áo thun phông nam nữ unisex tay lỡ form rộng chất mềm mịn ATL 238', 5, 14, '2020-08-08', 'Áo thun form rộng Tay Lỡ Unisex Nam Nữ với chất cotton thoáng mát với đường may kỹ, thấm hút mồ hôi tốt, thích hợp với cả nam và nữ ( áo thun nam, áo thun nữ)\r\n\r\nÁo thun form rộng Unisex Nam Nữ có thể phối cùng nhiều loại trang phục khác như: short, váy, quần dài kết hợp với giày thể thao, giày búp bê, đồ Street wear... đều rất đẹp, các bạn thoải mái mặc áo đôi, áo nhóm, lớp. Áo thun tay cộc, tay lỡ form suông với hình in sắc nét 3D có độ bền lên đến 20 năm.\r\nMàu sắc đa dạng, đảm bảo vải chất lượng, giá cả cạnh tranh. \r\n\r\n- Áo được kiểm tra kĩ càng, cẩn thận và tư vấn nhiệt tình trước khi gói hàng giao cho Quý Khách. \r\n\r\n- Hàng có sẵn, giao hàng ngay khi nhận \r\nđược đơn \r\n Chất liệu: Cotton, vải mềm, mịn, thoáng mát, không xù lông, đường may chuẩn chỉnh. tỉ mỉ, chắc chắn.\r\n\r\nThiết kế: Hiện đại, trẻ trung, năng động, dễ phối đồ. \r\n\r\nPhù hợp: Áo dành cho cả nam và nữ, ở nhà, đi học, di du lịch, dạo phố, hẹn hò,...'),
(7, 'Áo thun phông nam nữ unisex tay lỡ form rộng chất mềm mịn ATL 231', 5, 17, '2020-08-08', 'Áo thun form rộng Tay Lỡ Unisex Nam Nữ với chất cotton thoáng mát với đường may kỹ, thấm hút mồ hôi tốt, thích hợp với cả nam và nữ.\r\n\r\nCó thể phối cùng nhiều loại trang phục khác như: short, váy, quần dài kết hợp với giày thể thao, giày búp bê, đồ Street wear... đều rất đẹp, các bạn thoải mái mặc áo đôi, áo nhóm, lớp. Áo thun tay cộc, tay lỡ form suông với hình in sắc nét 3D có độ bền lên đến 20 năm.\r\n\r\nMàu sắc đa dạng, đảm bảo vải chất lượng, giá cả cạnh tranh. \r\n\r\nHàng có sẵn, giao hàng ngay khi nhận được đơn \r\n\r\nChất liệu: Cotton, vải mềm, mịn, thoáng mát, không xù lông, đường may chuẩn chỉnh. tỉ mỉ, chắc chắn.\r\n\r\nThiết kế: Hiện đại, trẻ trung, năng động, dễ phối đồ. \r\n\r\nPhù hợp: Áo dành cho cả nam và nữ, ở nhà, đi học, di du lịch, dạo phố, hẹn hò,...'),
(8, 'Áo thun phông nam nữ unisex tay lỡ form rộng chất mềm mịn ATL 237\n', 5, 20, '2020-08-08', 'Áo thun form rộng Tay Lỡ Unisex Nam Nữ với chất cotton thoáng mát với đường may kỹ, thấm hút mồ hôi tốt, thích hợp với cả nam và nữ.\r\n\r\nCó thể phối cùng nhiều loại trang phục khác như: short, váy, quần dài kết hợp với giày thể thao, giày búp bê, đồ Street wear... đều rất đẹp, các bạn thoải mái mặc áo đôi, áo nhóm, lớp. Áo thun tay cộc, tay lỡ form suông với hình in sắc nét 3D có độ bền lên đến 20 năm.\r\n\r\nMàu sắc đa dạng, đảm bảo vải chất lượng, giá cả cạnh tranh. \r\n\r\nHàng có sẵn, giao hàng ngay khi nhận được đơn \r\n\r\nChất liệu: Cotton, vải mềm, mịn, thoáng mát, không xù lông, đường may chuẩn chỉnh. tỉ mỉ, chắc chắn.\r\n\r\nThiết kế: Hiện đại, trẻ trung, năng động, dễ phối đồ. \r\n\r\nPhù hợp: Áo dành cho cả nam và nữ, ở nhà, đi học, di du lịch, dạo phố, hẹn hò,...'),
(9, 'Áo Thun Tay Lỡ Unisex Nam Nữ, Áo Phông Cotton Oversize Form Rộng Giá Rẻ ', 6, 15, '2020-08-08', 'Áo thun form rộng Tay Lỡ Unisex Nam Nữ với chất cotton thoáng mát với đường may kỹ, thấm hút mồ hôi tốt, thích hợp với cả nam và nữ.\r\n\r\nCó thể phối cùng nhiều loại trang phục khác như: short, váy, quần dài kết hợp với giày thể thao, giày búp bê, đồ Street wear... đều rất đẹp, các bạn thoải mái mặc áo đôi, áo nhóm, lớp. Áo thun tay cộc, tay lỡ form suông với hình in sắc nét 3D có độ bền lên đến 20 năm.\r\n\r\nMàu sắc đa dạng, đảm bảo vải chất lượng, giá cả cạnh tranh. \r\n\r\nHàng có sẵn, giao hàng ngay khi nhận được đơn \r\n\r\nChất liệu: Cotton, vải mềm, mịn, thoáng mát, không xù lông, đường may chuẩn chỉnh. tỉ mỉ, chắc chắn.\r\n\r\nThiết kế: Hiện đại, trẻ trung, năng động, dễ phối đồ. \r\n\r\nPhù hợp: Áo dành cho cả nam và nữ, ở nhà, đi học, di du lịch, dạo phố, hẹn hò,...'),
(10, 'Quần Túi Hộp Kaki Đen Unisex Dáng Rộng Bo Gấu Ống Suông Nam Nữ', 12, 47, '2023-10-30', 'Chúng tôi chỉ muốn mang đến cho bạn những sản phẩm tốt nhất, hợp thời trang nhất, chất lượng tốt nhất và rẻ nhất.\r\n\r\nThời trang là một phần của không khí hàng ngày và nó luôn thay đổi theo mọi sự kiện.!\r\n\r\nHãy bắt đầu mua sắm vui vẻ!\r\n\r\nCửa hàng chúng tôi tập trung vào hướng phát triển và xu hướng quần áo thời trang, có khả năng thiết kế và phong cách thiết kế riêng, thế mạnh xưởng sản xuất mạnh mẽ, được khách hàng vô cùng yêu thích ~ ~\r\n\r\nCửa hàng muốn mang đến cho bạn màu sắc của thế giới, dịch vụ trước và sau bán hàng hoàn hảo, để tất cả những ai biết đến chúng tôi đều cảm động và thu hoạch ~ ~'),
(11, 'Quần Thể Thao Nam Thời Trang Năng Động Hot - QTT_002', 13, 21, '2020-08-08', 'Kích thước và mô hình của sản phẩm được thể hiện trong hình. Vui lòng đọc kỹ.\r\n\r\nDo đo lường thủ công, lỗi có thể là 1-2 cm\r\n\r\nTheo dõi cửa hàng của chúng tôi để nhận phiếu giảm giá cửa hàng.\r\n\r\nNếu bạn có bất kỳ câu hỏi nào về việc mua sắm, xin vui lòng liên hệ với chúng tôi. Chúng tôi sẽ cung cấp cho bạn những câu trả lời thỏa đáng nhất.\r\n\r\nChúng tôi có nhiều kinh nghiệm và sản phẩm chất lượng cao. Chúng tôi sẽ cung cấp cho bạn trải nghiệm tốt nhất.\r\n\r\nSản phẩm của chúng tôi là 100% mới.\r\n\r\nChúng tôi theo đuổi chất lượng cao và giá cả thấp.\r\n\r\nChúng tôi luôn có sản phẩm mới. Vui lòng tiếp tục theo dõi tin tức mới nhất trong cửa hàng của chúng tôi. Chúng tôi sẽ gửi cho bạn phiếu giảm giá và giảm giá.\r\n\r\nNếu bạn thích sản phẩm của chúng tôi, vui lòng cho chúng vào giỏ hàng và mang đi.\r\n\r\nChúng tôi mong đợi đánh giá năm sao của bạn.\r\n\r\nDo thiết bị hiển thị và ánh sáng khác nhau, hình ảnh có thể không phản ánh màu sắc trung thực của tất cả các sản phẩm. Cảm ơn bạn cho sự hiểu biết của bạn.\r\n\r\nNếu bạn có bất kỳ câu hỏi nào, xin vui lòng liên hệ với chúng tôi. Chúng tôi sẽ trả lời câu hỏi của bạn càng sớm càng tốt và cố gắng hết sức để giải quyết vấn đề của bạn.'),
(13, 'Áo Polo Nam Local Brand, ÁO Polo CỘC TAY CÓ CỔ FORM RỘNG NAM NỮ', 3, 2, '2020-08-08', 'Không chỉ là thời trang, chúng tôi còn là “phòng thí nghiệm” của tuổi trẻ - nơi nghiên cứu và cho ra đời nguồn năng lượng mang tên “Youth”. Chúng mình luôn muốn tạo nên những trải nghiệm vui vẻ, năng động và trẻ trung. \r\n\r\nLấy cảm hứng từ giới trẻ, sáng tạo liên tục, bắt kịp xu hướng và phát triển đa dạng các dòng sản phẩm là cách mà chúng mình hoạt động để tạo nên phong cách sống hằng ngày của bạn. Mục tiêu của chúng tôi là cung cấp các sản phẩm thời trang chất lượng cao với giá thành hợp lý. \r\n\r\nChẳng còn thời gian để loay hoay nữa đâu youngers ơi! Hãy nhanh chân bắt lấy những những khoảnh khắc tuyệt vời của tuổi trẻ.\r\n\r\nMiễn phí đổi hàng cho khách mua trong trường hợp bị lỗi từ nhà sản xuất, giao nhầm hàng, bị hư hỏng trong quá trình vận chuyển hàng.\r\n\r\nSản phẩm đổi trong thời gian 3 ngày kể từ ngày nhận hàng\r\n\r\nSản phẩm còn mới nguyên tem, tags và mang theo hoá đơn mua hàng, sản phẩm chưa giặt và không dơ bẩn, hư hỏng bởi những tác nhân bên ngoài cửa hàng sau khi mua hàng.'),
(14, 'Áo sơ mi nam nữ tay ngắn, dáng form rộng, unisex, basic mặc cực đẹp', 2, 20, '2020-08-08', 'Áo sơ mi nam nữ kiểu Hàn Quốc form rộng tay ngắn unisex\r\n\r\nDáng áo suông vừa, lên form thoải mái nhưng vẫn vừa vặn với người mặc.\r\n\r\nThiết kế, trẻ trung, dễ dàng kết hợp cùng quần Jeans, Kaki hoặc Short. Đi tiệc, du lịch hay dạo phố cùng bạn bè đều phù hợp.\r\n\r\n\r\n\r\nChất liệu: Lụa MANGO CAO CẤP , mềm mịn, Không nhăn, thấm hút  mồ hôi tốt. Giúp người mặc thoáng mát, không gò bó hay hầm bí. Cam kết không ra màu không bai nhão.\r\n\r\nSản phẩm của chúng tôi là thương hiệu mới 100%.\r\n\r\nHy vọng sẽ mang lại cho bạn trải nghiệm mua sắm tốt nhất.\r\n\r\nChúng tôi có kinh nghiệm phong phú và sản phẩm chất lượng cao.\r\n\r\nChúng tôi tập trung vào chất lượng tốt và giá rẻ!\r\n\r\nSản phẩm mới mọi lúc. Hãy tiếp tục chú ý đến những tin tức mới nhất của cửa hàng chúng tôi. Chúng tôi sẽ gửi cho bạn phiếu giảm giá và giảm giá sản phẩm.'),
(15, 'Quần jean nam ống đứng rộng phong cách cổ điển kiểu Mỹ', 10, 15, '2020-08-08', ' Nếu bạn có thắc mắc về việc mua hàng, vui lòng liên hệ với chúng tôi và chúng tôi sẽ giải đáp thỏa đáng nhất cho bạn. \r\n\r\nChúng tôi có kinh nghiệm phong phú và sản phẩm chất lượng cao. \r\n\r\nMang đến cho bạn trải nghiệm mua sắm tốt nhất,sản phẩm của chúng tôi hoàn toàn mới 100%. \r\n\r\nChúng tôi tập trung vào chất lượng và giá thành thấp! \r\n\r\nChúng tôi sẽ luôn có sản phẩm mới . Hãy tiếp tục theo dõi tin tức mới nhất của chúng tôi. \r\n\r\nNếu bạn thích sản phẩm của chúng tôi, vui lòng thêm vào giỏ hàng, cảm ơn bạn rất nhiều!! \r\n\r\nChúng tôi mong nhận được đánh giá năm sao của bạn. \r\n\r\nSản phẩm thật cam kết 100% như mô tả\r\n\r\nTư vấn nhiệt tình, chu đáo luôn lắng nghe khách hàng\r\n\r\nSản phẩm được kiểm tra kỹ càng, cẩn thận trước khi gói giao hàng cho Quý khách.\r\n\r\nCam kết 100% đổi size nếu sản phẩm khách đặt không vừa (hỗ trợ đổi size trong vòng 7 ngày).\r\n\r\nGiao hàng toàn quốc, nhận hàng thanh toán.'),
(16, 'Quần short Essential chất cotton dệt tổ ong, quần đùi thể thao mặc thoáng mát', 14, 10, '2020-08-08', 'Chất liệu: Vải nỉ da cá, dày dặn nhưng vẫn tạo cảm giác thoáng mát.  Tại sao ư?  Vải nỉ da cá được dệt với các sợi đan chéo nhau, tạo nên những lỗ thoáng khí giúp người mặc cảm thấy thoải mái, ấm áp, nhưng vẫn không gây khó chịu cho làn da.\r\n\r\nPhân loại: được may và gia công kĩ lưỡng bởi những người thợ có kinh nghiệm trong nghề, vừa đẹp mắt vừa bảo đảm được độ bền với thời gian.\r\n\r\nThiết kế túi 2 bên bên tiện lợi, lưng thun, dây rút. Kiểu dáng trên gối, ôm nhẹ tạo cảm giác thoải mái khi sử dụng. \r\n\r\nMặc đi tập gym, café, du lịch, mặc nhà đều ổn \r\n\r\nMàu sắc: ĐA DẠNG  cực dễ phối đồ, không sợ gây nóng bức, khó chịu.   '),
(17, 'Quần dài ống rộng có dây rút gấu mặc 2 kiểu ống suông và jogger siêu hot', 11, 120, '2020-08-08', 'Quần được thiết kế theo đúng form chuẩn của nam,nữ giới Việt Nam\r\n\r\nSản phẩm chính là mẫu thiết kế mới nhất cho 4 mùa ạ\r\n\r\nChất liệu cực mềm mịn, thoáng mát (chất nỉ da cá thể thao)\r\n\r\nĐem lại sự thoải mái tiện lợi nhất cho người mặc.\r\n\r\nChất vải co giãn, đẹp, không phai\r\n\r\nĐường may tinh tế, chỉnh chu, khéo léo\r\n\r\nMàu sắc đa dạng, trẻ trung\r\n\r\nChất lượng sản phẩm tốt, giá cả hợp lý\r\n\r\nHướng dẫn sử dụng:\r\n\r\nĐối với sản phẩm quần áo mới mua về, nên giặt tay lần đâu tiên để tránh phai màu sang quần áo khác\r\n\r\nKhi giặt nên lộn mặt trái ra để đảm bảo độ bền của hình in/decal\r\n\r\nSản phẩm phù hợp cho giặt máy/giặt tay'),
(18, 'Quần short unisex Dây+Túi bên ngoài, chất mát mền và không nhắn, phong cách ', 14, 47, '2020-08-08', 'Tên sản phẩm: Quần short nỉ cao cấp phong cách unisex có lai và dây rút dễ phối đồ \r\n\r\nChất liệu: Vải nỉ da cá, dày dặn nhưng vẫn tạo cảm giác thoáng mát.  Tại sao ư?  Vải nỉ da cá được dệt với các sợi đan chéo nhau, tạo nên những lỗ thoáng khí giúp người mặc cảm thấy thoải mái, ấm áp, nhưng vẫn không gây khó chịu cho làn da.\r\n\r\nPhân loại: được may và gia công kĩ lưỡng bởi những người thợ có kinh nghiệm trong nghề, vừa đẹp mắt vừa bảo đảm được độ bền với thời gian.\r\n\r\nkế túi 2 bên bên tiện lợi, lưng thun, dây rút. Kiểu dáng trên gối, ôm nhẹ tạo cảm giác thoải mái khi sử dụng. \r\n\r\nMặc đi tập gym, café, du lịch, mặc nhà đều ổn \r\n\r\nMàu sắc: ĐA DẠNG  cực dễ phối đồ, không sợ gây nóng bức, khó chịu.   \r\n\r\nChất liệu cực mềm mịn, thoáng mát (chất nỉ da cá thể thao)\r\n\r\nĐem lại sự thoải mái tiện lợi nhất cho người mặc.\r\n\r\nChất vải co giãn, đẹp, không phai\r\n\r\nĐường may tinh tế, chỉnh chu, khéo léo\r\n\r\nMàu sắc đa dạng, trẻ trung\r\n\r\nChất lượng sản phẩm tốt, giá cả hợp lý\r\n\r\nHướng dẫn sử dụng:\r\n\r\nĐối với sản phẩm quần áo mới mua về, nên giặt tay lần đâu tiên để tránh phai màu sang quần áo khác\r\n\r\nKhi giặt nên lộn mặt trái ra để đảm bảo độ bền của hình in/decal\r\n\r\nSản phẩm phù hợp cho giặt máy/giặt tay'),
(19, 'Quần nam ống rộng màu trơn bằng thun lạnh thời trang hè Hàn Quốc \r\n', 11, 187, '2020-08-15', ' Nếu bạn có thắc mắc về việc mua hàng, vui lòng liên hệ với chúng tôi và chúng tôi sẽ giải đáp thỏa đáng nhất cho bạn. \r\n\r\nChúng tôi có kinh nghiệm phong phú và sản phẩm chất lượng cao. \r\n\r\nMang đến cho bạn trải nghiệm mua sắm tốt nhất,sản phẩm của chúng tôi hoàn toàn mới 100%. \r\n\r\nChúng tôi tập trung vào chất lượng và giá thành thấp! \r\n\r\nChúng tôi sẽ luôn có sản phẩm mới . Hãy tiếp tục theo dõi tin tức mới nhất của chúng tôi. \r\n\r\nNếu bạn thích sản phẩm của chúng tôi, vui lòng thêm vào giỏ hàng, cảm ơn bạn rất nhiều!! \r\n\r\nChúng tôi mong nhận được đánh giá năm sao của bạn. \r\n\r\nSản phẩm thật cam kết 100% như mô tả\r\n\r\nTư vấn nhiệt tình, chu đáo luôn lắng nghe khách hàng\r\n\r\nSản phẩm được kiểm tra kỹ càng, cẩn thận trước khi gói giao hàng cho Quý khách.\r\n\r\nCam kết 100% đổi size nếu sản phẩm khách đặt không vừa (hỗ trợ đổi size trong vòng 7 ngày).\r\n\r\nGiao hàng toàn quốc, nhận hàng thanh toán.'),
(20, 'Quần short nam nữ chất cotton, quần đùi Unisex thể thao mặc thoáng mát', 14, 1, '2020-08-04', 'Chất liệu: Vải nỉ da cá, dày dặn nhưng vẫn tạo cảm giác thoáng mát.  Tại sao ư?  Vải nỉ da cá được dệt với các sợi đan chéo nhau, tạo nên những lỗ thoáng khí giúp người mặc cảm thấy thoải mái, ấm áp, nhưng vẫn không gây khó chịu cho làn da.\r\n\r\nPhân loại: được may và gia công kĩ lưỡng bởi những người thợ có kinh nghiệm trong nghề, vừa đẹp mắt vừa bảo đảm được độ bền với thời gian.\r\n\r\nThiết kế túi 2 bên bên tiện lợi, lưng thun, dây rút. Kiểu dáng trên gối, ôm nhẹ tạo cảm giác thoải mái khi sử dụng. \r\n\r\nMặc đi tập gym, café, du lịch, mặc nhà đều ổn \r\n\r\nMàu sắc: ĐA DẠNG  cực dễ phối đồ, không sợ gây nóng bức, khó chịu.   '),
(21, 'Áo Swearter Hình Thú Vui Nhộn, Đẹp Mắt, Sinh Động A709', 7, 17, '2020-07-04', 'Hàng chuẩn sản xuất, tem mác chuẩn chính hãng.\r\n\r\nChất Liệu: 100 - Chất Liệu: 100% cotton, vải mềm, chất vải mịn, thoáng mát, không xù.\r\n\r\nĐường may chuẩn, tỉ mỉ, chắc chắn.\r\n\r\nMặc ở nhà, đi chơi hoặc khi tập thể thao. Thích hợp để trộn quần áo với nhiều loại.\r\n\r\nKiểu dáng hiện đại, trẻ trung, năng động. Dễ dàng để kết hợp.\r\n\r\nNếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ với bộ phận chăm sóc khách hàng. Đôi khi, đại diện dịch vụ chăm sóc khách hàng có thể phản hồi chậm do số lượng tin nhắn tìm kiếm thông tin. Hãy đợi. Chúng tôi sẽ tích cực giải quyết mối quan tâm của bạn.\r\n\r\nNếu bạn có bất kỳ vấn đề nào với sản phẩm bạn nhận được, bạn có thể liên hệ với bộ phận chăm sóc khách hàng. Chúng tôi rất vui khi giải quyết vấn đề của bạn.\r\n\r\nXin đừng vội đưa ra những đánh giá tiêu cực,chúng tôi sẽ cung cấp cho bạn dịch vụ sau bán hàng.'),
(22, 'Áo Swearter Hình Thú Vui Nhộn, Đẹp Mắt, Sinh Động A607\r\n', 7, 4, '2020-07-04', 'Hàng chuẩn sản xuất, tem mác chuẩn chính hãng.\r\n\r\nChất Liệu: 100 - Chất Liệu: 100% cotton, vải mềm, chất vải mịn, thoáng mát, không xù.\r\n\r\nĐường may chuẩn, tỉ mỉ, chắc chắn.\r\n\r\nMặc ở nhà, đi chơi hoặc khi tập thể thao. Thích hợp để trộn quần áo với nhiều loại.\r\n\r\nKiểu dáng hiện đại, trẻ trung, năng động. Dễ dàng để kết hợp.\r\n\r\nNếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ với bộ phận chăm sóc khách hàng. Đôi khi, đại diện dịch vụ chăm sóc khách hàng có thể phản hồi chậm do số lượng tin nhắn tìm kiếm thông tin. Hãy đợi. Chúng tôi sẽ tích cực giải quyết mối quan tâm của bạn.\r\n\r\nNếu bạn có bất kỳ vấn đề nào với sản phẩm bạn nhận được, bạn có thể liên hệ với bộ phận chăm sóc khách hàng. Chúng tôi rất vui khi giải quyết vấn đề của bạn.\r\n\r\nXin đừng vội đưa ra những đánh giá tiêu cực,chúng tôi sẽ cung cấp cho bạn dịch vụ sau bán hàng.'),
(23, 'Áo Swearter Hình Thú Vui Nhộn, Đẹp Mắt, Sinh Động A107\r\n', 7, 60, '2020-07-04', 'Hàng chuẩn sản xuất, tem mác chuẩn chính hãng.\r\n\r\nChất Liệu: 100 - Chất Liệu: 100% cotton, vải mềm, chất vải mịn, thoáng mát, không xù.\r\n\r\nĐường may chuẩn, tỉ mỉ, chắc chắn.\r\n\r\nMặc ở nhà, đi chơi hoặc khi tập thể thao. Thích hợp để trộn quần áo với nhiều loại.\r\n\r\nKiểu dáng hiện đại, trẻ trung, năng động. Dễ dàng để kết hợp.\r\n\r\nNếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ với bộ phận chăm sóc khách hàng. Đôi khi, đại diện dịch vụ chăm sóc khách hàng có thể phản hồi chậm do số lượng tin nhắn tìm kiếm thông tin. Hãy đợi. Chúng tôi sẽ tích cực giải quyết mối quan tâm của bạn.\r\n\r\nNếu bạn có bất kỳ vấn đề nào với sản phẩm bạn nhận được, bạn có thể liên hệ với bộ phận chăm sóc khách hàng. Chúng tôi rất vui khi giải quyết vấn đề của bạn.\r\n\r\nXin đừng vội đưa ra những đánh giá tiêu cực,chúng tôi sẽ cung cấp cho bạn dịch vụ sau bán hàng.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `masohd` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `ngaydat` date NOT NULL,
  `tongtien` int(11) NOT NULL,
  `tienship` float NOT NULL,
  `vouchership` float NOT NULL,
  `voucherhanghoa` float NOT NULL,
  `ghichu` varchar(120) NOT NULL,
  `tenkh` varchar(110) NOT NULL,
  `diachi` text NOT NULL,
  `sodienthoai` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`masohd`, `makh`, `ngaydat`, `tongtien`, `tienship`, `vouchership`, `voucherhanghoa`, `ghichu`, `tenkh`, `diachi`, `sodienthoai`) VALUES
(1, 1, '2024-05-31', 777000, 30000, 14000, 0, 'dưa', '', '', ''),
(2, 1, '2024-05-31', 328000, 20000, 0, 132000, 'ăd', '', '', ''),
(3, 2, '2024-05-31', 695000, 20000, 0, 0, 'd', '', '', ''),
(4, 2, '2023-06-07', 715000, 50000, 0, 200000, '', '', '', ''),
(5, 2, '2024-06-07', 715000, 50000, 0, 200000, '', '', '', ''),
(6, 2, '2024-06-07', 915000, 50000, 0, 0, '', '', '', ''),
(7, 3, '2024-06-07', 915000, 50000, 0, 0, '', '', '', ''),
(8, 3, '2024-06-07', 370000, 30000, 30000, 0, '', '', '', ''),
(9, 3, '2024-06-08', 590000, 50000, 15000, 0, '', '', '', ''),
(10, 3, '2024-06-08', 790000, 30000, 0, 0, '', '', '', ''),
(11, 3, '2024-06-10', 221000, 30000, 0, 90000, 'fsef', 'd', 'd', '0123456789'),
(12, 1, '2022-05-10', 220000, 30000, 0, 0, 'dưa', 'tri1', 'd', '0112222222'),
(13, 1, '2021-06-10', 31000, 30000, 0, 0, 'hiii', 'tri', 'c', '0123456788'),
(14, 1, '2024-06-10', 31000, 30000, 0, 0, 'hi1', 'tri12', 'aaaaaaa', '0716247164'),
(15, 1, '2024-06-10', 31000, 30000, 0, 0, '', 'tri12', 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', '0716247164'),
(16, 1, '2024-06-11', 483000, 50000, 22000, 0, '', 'tri12', 'aaaaaaa', '0716247164'),
(17, 1, '2024-06-11', 125000, 30000, 0, 0, 'hi', 'tri12', 'aaaaaaa', '0716247164');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `makh` int(11) NOT NULL,
  `tenkh` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `diachi` text NOT NULL,
  `sodienthoai` varchar(12) NOT NULL,
  `online` int(11) NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `datho` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`makh`, `tenkh`, `username`, `matkhau`, `email`, `diachi`, `sodienthoai`, `online`, `avatar`, `datho`) VALUES
(1, 'tri12', 'tri', '4969d83e2903dbeecd10c0d5185392e6', 'vominhtri01102004@gmail.com', 'aaaaaaa', '0716247164', 1, 'z5489795657316_161525e052d1b3b0b27c2fe1e0f3e5ed.jpg', 0),
(2, 'tri1', 'tri1', '4969d83e2903dbeecd10c0d5185392e6', 'v@gmail.com', 'd', '0112222222', 0, 'z5463296894081_3f487a1ced26eacebf1531504afc5c96.jpg', 0),
(3, 'tri2', 'tri2', '4969d83e2903dbeecd10c0d5185392e6', 'f@gmail.com', '1', '0123456789', 0, 'admin2.jpg', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhangdatho`
--

CREATE TABLE `khachhangdatho` (
  `stt` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `tenkh` varchar(110) NOT NULL,
  `diachi` text NOT NULL,
  `sodienthoai` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhangdatho`
--

INSERT INTO `khachhangdatho` (`stt`, `makh`, `tenkh`, `diachi`, `sodienthoai`) VALUES
(1, 1, '', 'diachi 1', ''),
(2, 1, '', 'diachi 2', ''),
(3, 1, 'tri', 'c', '0123456788'),
(4, 1, 'tri2', 'ưdưa', '0123456789'),
(5, 1, '', 'diachi3', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `maloai` int(11) NOT NULL,
  `tenloai` varchar(50) NOT NULL,
  `idmenu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`maloai`, `tenloai`, `idmenu`) VALUES
(1, 'Áo Phông', 3),
(2, 'Áo Sơ Mi', 4),
(3, 'Áo Polo', 3),
(4, 'Áo Thun', 3),
(5, 'Áo Thun Phông', 3),
(6, 'Áo Thun Tay Lỡ', 3),
(7, 'Áo Sweater', 4),
(8, 'Áo Len', 4),
(9, 'Quần Thun Ống Rộng', 4),
(10, 'Quần Jean Ống Rộng', 3),
(11, 'Quần Dài Ống Rộng', 3),
(12, 'Quần Túi Hộp', 4),
(13, 'Quần Thể Thao', 4),
(14, 'Quần Short', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaiship`
--

CREATE TABLE `loaiship` (
  `idship` int(11) NOT NULL,
  `tenship` varchar(110) NOT NULL,
  `gia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaiship`
--

INSERT INTO `loaiship` (`idship`, `tenship`, `gia`) VALUES
(1, 'Ship Chậm', 30000),
(2, 'Ship Thường', 40000),
(3, 'Ship Hỏa Tốc', 50000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mausac`
--

CREATE TABLE `mausac` (
  `Idmau` int(11) NOT NULL,
  `mausac` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `mausac`
--

INSERT INTO `mausac` (`Idmau`, `mausac`) VALUES
(1, 'Trắng'),
(2, 'Đen'),
(3, 'Xám\r\n'),
(4, 'Be'),
(5, 'Xanh Lá\r\n'),
(6, 'Xanh Dương\r\n'),
(7, 'Hồng'),
(8, 'Nâu\r\n'),
(9, 'Đỏ\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `idnv` int(11) NOT NULL,
  `tennv` varchar(250) NOT NULL,
  `diachi` text NOT NULL,
  `username` varchar(250) NOT NULL,
  `matkhau` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `sodienthoai` varchar(12) NOT NULL,
  `chucvu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`idnv`, `tennv`, `diachi`, `username`, `matkhau`, `email`, `sodienthoai`, `chucvu`) VALUES
(1, 'Võ Minh Trí', 'hcm', 'admin', '8d1ed8d27f2f95ec71e1ad750ab4597f', 'tri@gmail.com', '0123456789', 'Admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sizegiay`
--

CREATE TABLE `sizegiay` (
  `Idsize` int(11) NOT NULL,
  `size` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sizegiay`
--

INSERT INTO `sizegiay` (`Idsize`, `size`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'Xl');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinnhan`
--

CREATE TABLE `tinnhan` (
  `idtinnhan` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `idnv` int(11) NOT NULL,
  `thoigian1` datetime NOT NULL,
  `thoigian2` datetime NOT NULL,
  `noidung` varchar(200) NOT NULL,
  `hinh` varchar(200) NOT NULL,
  `daxem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tinnhan`
--

INSERT INTO `tinnhan` (`idtinnhan`, `makh`, `idnv`, `thoigian1`, `thoigian2`, `noidung`, `hinh`, `daxem`) VALUES
(1, 1, 0, '2024-06-05 14:32:15', '2024-06-04 16:55:04', 'hi', '', 1),
(2, 1, 0, '2024-06-05 14:32:15', '2024-06-04 16:55:04', 'hi', '', 1),
(3, 1, 0, '2024-06-04 16:55:04', '2024-06-04 16:59:54', 'chào', '', 1),
(4, 2, 0, '0000-00-00 00:00:00', '2024-06-04 17:12:06', 'chào', '', 1),
(5, 1, 1, '2024-06-04 16:59:54', '2024-06-05 09:28:16', 'hi', '', 1),
(6, 1, 1, '2024-06-05 09:28:16', '2024-06-05 09:28:49', 'hi1', '', 1),
(7, 1, 1, '2024-06-05 09:28:49', '2024-06-05 09:37:07', 'chào', '', 1),
(8, 2, 1, '2024-06-04 17:12:06', '2024-06-05 10:16:57', 'hi', '', 1),
(9, 1, 0, '2024-06-05 09:37:07', '2024-06-04 10:18:44', 'd', '', 1),
(10, 2, 1, '2024-06-05 10:16:57', '2024-06-05 15:23:59', '/////', 'z5463296894081_3f487a1ced26eacebf1531504afc5c96.jpg', 1),
(11, 2, 1, '2024-06-05 15:23:59', '2024-06-05 15:31:31', '/////', 'z5489795657316_161525e052d1b3b0b27c2fe1e0f3e5ed.jpg', 1),
(12, 2, 1, '2024-06-05 15:31:31', '2024-06-05 15:31:56', '/////', 'z5489795657316_161525e052d1b3b0b27c2fe1e0f3e5ed.jpg', 1),
(13, 1, 1, '2024-06-04 10:18:44', '2024-06-05 15:52:08', '/////', 'z5463296894081_3f487a1ced26eacebf1531504afc5c96.jpg', 1),
(14, 1, 0, '2024-06-05 15:52:08', '2024-06-05 16:23:16', '/////', 'z5489795657316_161525e052d1b3b0b27c2fe1e0f3e5ed.jpg', 1),
(15, 0, 1, '2024-06-05 14:31:47', '2024-06-06 10:47:24', 'd', '', 1),
(16, 0, 1, '2024-06-05 14:32:00', '2024-06-06 10:52:44', '', '', 1),
(17, 1, 1, '2024-06-05 16:23:16', '2024-06-06 11:26:25', 'hi', '', 1),
(18, 1, 1, '2024-06-06 11:26:25', '2024-06-06 11:27:51', 'chào', '', 1),
(19, 1, 1, '2024-06-06 11:27:51', '2024-06-06 11:40:53', 'hi', '', 1),
(20, 1, 1, '2024-06-06 11:40:53', '2024-06-06 11:54:49', 'd', '', 1),
(21, 1, 0, '2024-06-06 11:54:49', '2024-06-06 14:04:44', 'd', '', 1),
(22, 1, 1, '2024-06-06 14:04:44', '2024-06-06 14:05:07', 'd', '', 1),
(23, 1, 1, '2024-06-06 14:05:07', '2024-06-06 17:03:17', 'hi', '', 1),
(24, 1, 0, '2024-06-06 17:03:17', '2024-06-06 17:04:44', 'hi', '', 1),
(25, 1, 1, '2024-06-06 17:04:44', '2024-06-06 17:05:02', 'hi', '', 1),
(26, 1, 0, '2024-06-06 17:05:02', '2024-06-07 09:07:12', 'hi1', '', 1),
(27, 3, 0, '0000-00-00 00:00:00', '2024-06-07 09:13:14', '/////', 'z4404406535872_ecdc81be99fcf3efe2bddf1a43887f97.jpg', 1),
(28, 3, 0, '2024-06-07 09:13:14', '2024-06-07 09:18:04', 'hi', '', 1),
(29, 3, 0, '2024-06-07 09:18:04', '2024-06-07 09:18:15', 'hi2', '', 1),
(30, 3, 1, '2024-06-07 09:18:15', '2024-06-07 09:42:53', 'hi', '', 1),
(31, 3, 0, '2024-06-07 09:42:53', '2024-06-07 09:50:44', 'a', '', 1),
(32, 3, 0, '2024-06-07 09:50:44', '2024-06-07 09:54:44', 'a', '', 1),
(33, 3, 0, '2024-06-07 09:54:44', '2024-06-07 09:54:59', 'h', '', 1),
(34, 3, 1, '2024-06-07 09:54:59', '2024-06-07 10:25:52', '/////', 'z5489795657316_161525e052d1b3b0b27c2fe1e0f3e5ed.jpg', 1),
(35, 1, 1, '2024-06-07 09:07:12', '2024-06-07 10:40:47', 'hi2', '', 1),
(36, 1, 0, '2024-06-07 10:40:47', '2024-06-08 11:46:01', 'hi', '', 1),
(37, 1, 1, '2024-06-08 11:46:01', '2024-06-08 11:46:12', 'hi', '', 1),
(38, 1, 0, '2024-06-08 11:46:12', '2024-06-08 11:46:16', 'hi', '', 1),
(39, 1, 1, '2024-06-08 11:46:16', '2024-06-08 11:46:32', 'hi', '', 1),
(40, 1, 0, '2024-06-08 11:46:32', '2024-06-08 16:06:09', '/////', 'z5516478089337_21e1d340137544df0a23981d991132d1.jpg', 1),
(41, 1, 0, '2024-06-08 16:06:09', '2024-06-08 16:06:24', '/////', 'z5489795657316_161525e052d1b3b0b27c2fe1e0f3e5ed.jpg', 1),
(42, 1, 1, '2024-06-08 16:06:24', '2024-06-08 16:08:33', '/////', 'z5516478089337_21e1d340137544df0a23981d991132d1.jpg', 1),
(43, 1, 1, '2024-06-08 16:08:33', '2024-06-08 16:08:36', '/////', 'z5489795657316_161525e052d1b3b0b27c2fe1e0f3e5ed.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `voucher`
--

CREATE TABLE `voucher` (
  `mavoucher` int(11) NOT NULL,
  `loaivoucher` varchar(11) NOT NULL,
  `dungcho` varchar(11) NOT NULL,
  `soluongvoucher` int(11) NOT NULL,
  `toithieu` float NOT NULL,
  `toida` float NOT NULL,
  `batdau` date NOT NULL,
  `ketthuc` date NOT NULL,
  `giatri` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `voucher`
--

INSERT INTO `voucher` (`mavoucher`, `loaivoucher`, `dungcho`, `soluongvoucher`, `toithieu`, `toida`, `batdau`, `ketthuc`, `giatri`) VALUES
(1, 'VND', 'Hàng Hóa', 3, 190000, 90000, '2024-05-03', '2024-06-19', 90000),
(2, 'Phần Trăm', 'Ship Hàng', 4, 50000, 100000, '2024-05-01', '2024-06-26', 44),
(3, 'Phần Trăm', 'Ship Hàng', 4, 200000, 200000, '2024-05-03', '2024-06-28', 30),
(4, 'VND', 'Ship Hàng', 1, 200000, 90000, '2024-05-18', '2024-06-09', 90000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `voucherdaluu`
--

CREATE TABLE `voucherdaluu` (
  `mavoucher` int(11) NOT NULL,
  `makh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `voucherdaluu`
--

INSERT INTO `voucherdaluu` (`mavoucher`, `makh`) VALUES
(5, 1),
(3, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idcomment`);

--
-- Chỉ mục cho bảng `cthanghoa`
--
ALTER TABLE `cthanghoa`
  ADD PRIMARY KEY (`idhanghoa`,`idmau`,`idsize`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`mahh`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`masohd`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`makh`);

--
-- Chỉ mục cho bảng `khachhangdatho`
--
ALTER TABLE `khachhangdatho`
  ADD PRIMARY KEY (`stt`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`maloai`);

--
-- Chỉ mục cho bảng `loaiship`
--
ALTER TABLE `loaiship`
  ADD PRIMARY KEY (`idship`);

--
-- Chỉ mục cho bảng `mausac`
--
ALTER TABLE `mausac`
  ADD PRIMARY KEY (`Idmau`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`idnv`);

--
-- Chỉ mục cho bảng `sizegiay`
--
ALTER TABLE `sizegiay`
  ADD PRIMARY KEY (`Idsize`);

--
-- Chỉ mục cho bảng `tinnhan`
--
ALTER TABLE `tinnhan`
  ADD PRIMARY KEY (`idtinnhan`);

--
-- Chỉ mục cho bảng `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`mavoucher`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `idcomment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `mahh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `masohd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `makh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `khachhangdatho`
--
ALTER TABLE `khachhangdatho`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `maloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `loaiship`
--
ALTER TABLE `loaiship`
  MODIFY `idship` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `mausac`
--
ALTER TABLE `mausac`
  MODIFY `Idmau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `idnv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `sizegiay`
--
ALTER TABLE `sizegiay`
  MODIFY `Idsize` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tinnhan`
--
ALTER TABLE `tinnhan`
  MODIFY `idtinnhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `voucher`
--
ALTER TABLE `voucher`
  MODIFY `mavoucher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
