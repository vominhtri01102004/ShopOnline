-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 07, 2023 at 01:34 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopgiay`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan1`
--

CREATE TABLE `binhluan1` (
  `mabl` int(11) NOT NULL,
  `mahh` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `ngaybl` date NOT NULL,
  `noidung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `idcomment` int(11) NOT NULL,
  `idkh` int(11) NOT NULL,
  `idhanghoa` int(11) NOT NULL,
  `content` text NOT NULL,
  `luotthich` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`idcomment`, `idkh`, `idhanghoa`, `content`, `luotthich`) VALUES
(1, 3, 24, '  đẹp', 0),
(2, 3, 22, '  thấp', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cthanghoa`
--

CREATE TABLE `cthanghoa` (
  `idhanghoa` int(11) NOT NULL,
  `idmau` int(11) NOT NULL,
  `idsize` int(11) NOT NULL,
  `dongia` float NOT NULL,
  `soluongton` int(11) NOT NULL,
  `hinh` varchar(100) NOT NULL,
  `giamgia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cthanghoa`
--

INSERT INTO `cthanghoa` (`idhanghoa`, `idmau`, `idsize`, `dongia`, `soluongton`, `hinh`, `giamgia`) VALUES
(1, 1, 1, 500000, 10, '1.jpg', 450000),
(1, 2, 1, 600000, 12, '2.jpg', 500000),
(2, 2, 1, 700000, 12, '3.jpg', 0),
(3, 1, 1, 800000, 12, '4.jpg', 0),
(4, 1, 1, 500000, 12, '5.jpg', 300000),
(5, 1, 1, 500000, 12, '6.jpg', 300000),
(6, 1, 1, 500000, 12, '7.jpg', 0),
(9, 1, 1, 500000, 12, '8.jpg', 0),
(11, 1, 1, 500000, 12, '9.jpg', 0),
(12, 1, 1, 500000, 12, '10.jpg', 0),
(15, 3, 1, 450000, 12, '11.jpg', 350000),
(16, 1, 1, 500000, 12, '12.jpg', 0),
(17, 1, 1, 600000, 12, '13.jpg', 400000),
(18, 1, 1, 500000, 12, '14.jpg', 0),
(19, 1, 1, 650000, 12, '15.jpg', 0),
(20, 1, 1, 500000, 12, '16.jpg', 0),
(21, 1, 1, 500000, 12, '17.jpg', 250000),
(22, 1, 1, 500000, 12, '18.jpg', 0),
(22, 2, 2, 500000, 4, '19.jpg', 0),
(22, 3, 3, 500000, 4, '20.jpg', 0),
(24, 1, 1, 500000, 12, '21.jpg', 0),
(24, 2, 2, 500000, 5, '22.jpg', 350000);

-- --------------------------------------------------------

--
-- Table structure for table `cthoadon`
--

CREATE TABLE `cthoadon` (
  `masohd` int(11) NOT NULL,
  `mahh` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL,
  `mausac` varchar(20) NOT NULL,
  `size` int(3) NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `tinhtrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cthoadon`
--

INSERT INTO `cthoadon` (`masohd`, `mahh`, `soluongmua`, `mausac`, `size`, `thanhtien`, `tinhtrang`) VALUES
(1, 22, 1, 'Màu Xanh Navy', 36, 500000, 0),
(1, 24, 2, ' Màu Hồng', 35, 1000000, 0),
(2, 22, 1, 'Màu Xanh Navy', 36, 500000, 0),
(2, 24, 2, ' Màu Hồng', 35, 1000000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hanghoa`
--

CREATE TABLE `hanghoa` (
  `mahh` int(11) NOT NULL,
  `tenhh` varchar(60) NOT NULL,
  `maloai` int(11) NOT NULL,
  `dacbiet` bit(1) NOT NULL,
  `soluotxem` int(11) NOT NULL,
  `ngaylap` date NOT NULL,
  `mota` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hanghoa`
--

INSERT INTO `hanghoa` (`mahh`, `tenhh`, `maloai`, `dacbiet`, `soluotxem`, `ngaylap`, `mota`) VALUES
(1, 'Giày Slingback Canvas', 1, b'1', 5, '2020-08-08', 'Vải bố và da nhân tạo. Phù hợp đi làm, đi tiệc và đi chơi'),
(2, 'Giày Slingback Canvas', 1, b'1', 3, '2020-08-08', 'Vải bố và da nhân tạo. Phù hợp đi làm, đi tiệc và đi chơi'),
(3, 'Giày Slingback Canvas  ', 1, b'0', 4, '2020-08-08', 'Vải bố và da nhân tạo. Phù hợp đi làm, đi tiệc và đi chơi'),
(4, 'Giày Sandal Bệt Mũi Nhọn', 3, b'0', 1, '2020-08-08', 'Chất liệu Satin. Phù hợp đi làm, đi chơi và đi học'),
(5, 'Giày Sandal Bệt Mũi Nhọn ', 3, b'1', 0, '2020-08-08', 'Chất liệu Satin. Phù hợp đi làm, đi chơi và đi học'),
(6, 'Giày Sandal Bệt Mũi Nhọn', 3, b'0', 0, '2020-08-08', 'Chất liệu Satin. Phù hợp đi làm, đi chơi và đi học'),
(9, 'Giày Sneaker', 5, b'1', 1, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi học'),
(10, 'Giày Sneaker', 5, b'1', 1, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi học'),
(11, 'Giày Cao Gót Bít Mũi Nhọn', 1, b'0', 1, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi tiệc'),
(12, 'Giày Cao Gót ', 1, b'0', 2, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi tiệc'),
(15, 'Giày Slingback Mũi Nhọn Quai Co Giãn ', 1, b'0', 1, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi tiệc'),
(16, 'Giày Slingback Mũi Nhọn Quai Co Giãn', 1, b'0', 2, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi tiệc'),
(17, 'Giày Slingback Mũi Nhọn Quai Co Giãn ', 1, b'1', 2, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi tiệc'),
(18, 'Dép Quai Chữ V Đan Chéo Vân Cá Sấu ', 8, b'0', 1, '2020-08-08', 'Da nhân tạo, Phù hợp đi chơi'),
(19, 'Dép Quai Chữ V Đan Chéo Vân Cá Sấu', 8, b'1', 1, '2020-08-08', 'Da nhân tạo, Phù hợp đi chơi'),
(20, 'Dép Quai Chữ V Đan Chéo Vân Cá Sấu', 8, b'0', 1, '2020-08-08', 'Da nhân tạo, Phù hợp đi chơi'),
(21, 'Giày Búp Bê Đính Nơ Phối Họa Tiết Nhiệt Đới', 4, b'0', 1, '2020-08-15', 'Giày Búp Bê Đính Nơ Phối Họa Tiết Nhiệt Đới. Thích hợp đi làm, du lịch, đi dạo phố'),
(22, 'giày búp bê', 4, b'0', 1, '2020-08-04', 'Thoải mái, đẹp'),
(24, 'Giày cao gót ', 7, b'1', 1, '2020-07-04', 'Thời trang đi tiệc, đi chơi, dạ hội'),
(25, 'giày thể thao', 5, b'0', 4, '2023-10-30', 'đẹp'),
(26, 'giày lười dáng thể thao', 5, b'0', 4, '2023-10-30', 'đẹp, phong cách'),
(27, 'giày công sở', 1, b'0', 4, '2023-10-30', 'đẹp, phong cách'),
(28, 'Giày Slingback Canvas ', 1, b'0', 4, '2023-10-30', 'đẹp, phong cách'),
(29, 'giày lười dáng thể thao', 5, b'0', 5, '2023-10-30', 'đẹp, phong cách'),
(30, 'giày thể thao', 5, b'0', 3, '2023-10-30', 'đẹp, phong cách'),
(31, 'giày aab', 1, b'0', 3, '2023-10-30', 'đẹp, phong cách'),
(32, 'giày lười dáng thể thao', 4, b'0', 12, '2023-10-30', 'đẹp'),
(33, 'giày thể thao', 4, b'0', 0, '2023-10-30', 'đẹp'),
(34, 'giày thể thao', 1, b'0', 3, '2023-10-30', 'đẹp'),
(35, 'giày thể thao', 4, b'0', 5, '2023-10-09', 'đẹp'),
(36, 'giày lười dáng thể thao', 4, b'0', 2, '2023-10-30', 'đẹp'),
(37, 'giày lười dáng thể thao', 3, b'0', 0, '2023-10-30', 'đẹp'),
(39, 'giày lười dáng thể thao', 5, b'0', 0, '2023-10-30', 'đẹp'),
(40, 'giày thể thao', 1, b'0', 0, '2023-10-23', 'đẹp'),
(41, 'giày thể thao', 1, b'0', 0, '2023-10-30', 'đẹp'),
(42, 'giày công sở', 1, b'0', 14, '2023-10-30', 'đẹp, phong cách, thời trang'),
(43, 'giày thể thao', 5, b'0', 1, '2023-10-03', 'đẹp,hhhh'),
(44, 'giày thể thao', 5, b'0', 15, '2023-10-03', 'đẹp, thời trang, công sở');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `masohd` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `ngaydat` date NOT NULL,
  `tongtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`masohd`, `makh`, `ngaydat`, `tongtien`) VALUES
(1, 3, '2023-10-16', 1500000),
(2, 3, '2023-10-16', 1500000);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `makh` int(11) NOT NULL,
  `tenkh` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `diachi` text,
  `sodienthoai` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`makh`, `tenkh`, `username`, `matkhau`, `email`, `diachi`, `sodienthoai`) VALUES
(1, 'tú trần', 'tutran', '8f8e2909a8f683c31159ee51d593a642', 'tu@gmail.com', 'hcm', '9090789678'),
(2, 'minh minh', 'minhminh', '8f8e2909a8f683c31159ee51d593a642', 'minh@gmail.com', 'bình định', '90907896789'),
(3, 'teo', 'teoteo', '3ff19fad9f5844248f601ab23381cc88', 'teo123@gmail.com', 'hcm', '9090789698'),
(4, 'ý nhi', 'nhinhi', '87f038af05196e3dfa958a521f6f400e', 'ngvynhi.itc@gmail.com', 'thoại ngọc hầu', '9090789699');

-- --------------------------------------------------------

--
-- Table structure for table `loai`
--

CREATE TABLE `loai` (
  `maloai` int(11) NOT NULL,
  `tenloai` varchar(50) NOT NULL,
  `idmenu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loai`
--

INSERT INTO `loai` (`maloai`, `tenloai`, `idmenu`) VALUES
(1, 'Giày Cao Gót', 3),
(3, 'Giày Sandals', 3),
(4, 'Giày Búp Bê', 3),
(5, 'Giày Sneaker', 3),
(6, 'Giày Boots', 3),
(7, 'Giày Da Thật', 3),
(8, 'Giày Lười', 3),
(10, 'Túi da', 4),
(13, 'túi da', 4),
(14, 'Túi cá sấu', 4),
(15, 'Túi đà điểu', 4),
(16, 'Túi da bò', 4),
(17, 'Túi thường', 4);

-- --------------------------------------------------------

--
-- Table structure for table `mausac`
--

CREATE TABLE `mausac` (
  `Idmau` int(11) NOT NULL,
  `mausac` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mausac`
--

INSERT INTO `mausac` (`Idmau`, `mausac`) VALUES
(1, 'Màu Trắng'),
(2, ' Màu Hồng'),
(3, 'Màu Xanh Navy'),
(4, 'Màu Be Đậm'),
(5, 'Màu đen'),
(6, 'Màu be'),
(7, 'Màu kem'),
(8, 'Màu Xám Nhạt');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `idnv` int(11) NOT NULL,
  `hoten` varchar(250) NOT NULL,
  `dia` text NOT NULL,
  `username` varchar(250) NOT NULL,
  `matkhau` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`idnv`, `hoten`, `dia`, `username`, `matkhau`) VALUES
(1, 'nguyễn hạo vy', 'hcm', 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `sizegiay`
--

CREATE TABLE `sizegiay` (
  `Idsize` int(11) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sizegiay`
--

INSERT INTO `sizegiay` (`Idsize`, `size`) VALUES
(1, 35),
(2, 36),
(3, 37),
(4, 38);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan1`
--
ALTER TABLE `binhluan1`
  ADD PRIMARY KEY (`mabl`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idcomment`);

--
-- Indexes for table `cthanghoa`
--
ALTER TABLE `cthanghoa`
  ADD PRIMARY KEY (`idhanghoa`,`idmau`,`idsize`);

--
-- Indexes for table `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD PRIMARY KEY (`masohd`,`mahh`);

--
-- Indexes for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`mahh`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`masohd`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`makh`);

--
-- Indexes for table `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`maloai`);

--
-- Indexes for table `mausac`
--
ALTER TABLE `mausac`
  ADD PRIMARY KEY (`Idmau`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`idnv`);

--
-- Indexes for table `sizegiay`
--
ALTER TABLE `sizegiay`
  ADD PRIMARY KEY (`Idsize`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan1`
--
ALTER TABLE `binhluan1`
  MODIFY `mabl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `idcomment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `mahh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `masohd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `makh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `loai`
--
ALTER TABLE `loai`
  MODIFY `maloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `mausac`
--
ALTER TABLE `mausac`
  MODIFY `Idmau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `idnv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sizegiay`
--
ALTER TABLE `sizegiay`
  MODIFY `Idsize` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
