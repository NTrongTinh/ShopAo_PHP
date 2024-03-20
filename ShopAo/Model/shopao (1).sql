-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 20, 2024 lúc 11:36 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopao`
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
  `luotthich` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`idcomment`, `idkh`, `idhanghoa`, `content`, `luotthich`) VALUES
(1, 6, 15, 'Bình Luận', 0),
(2, 6, 15, 'Bình Luận', 0),
(3, 6, 15, 'Bình Luận', 0),
(4, 6, 15, 'Submit', 0),
(5, 6, 15, 'Submit', 0),
(6, 6, 15, '  aaaa', 0),
(7, 6, 14, 'dep qua co oi', 0),
(8, 6, 12, '  tra sua ngon lam co oi', 0),
(9, 6, 15, '  hello', 0),
(10, 6, 9, '  adsad', 0),
(11, 6, 13, '  zf', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthanghoa`
--

CREATE TABLE `cthanghoa` (
  `mamh` int(11) NOT NULL,
  `idsize` int(11) NOT NULL,
  `soluongton` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cthanghoa`
--

INSERT INTO `cthanghoa` (`mamh`, `idsize`, `soluongton`) VALUES
(1, 1, 3),
(1, 2, 0),
(1, 3, 5),
(2, 2, 3),
(3, 1, 1),
(4, 1, 5),
(5, 1, 5),
(6, 2, 5),
(7, 1, 5),
(8, 1, 3),
(9, 2, 4),
(10, 1, 3),
(11, 1, 4),
(12, 2, 3),
(13, 1, 9),
(14, 1, 10),
(15, 2, 1),
(2, 1, 3),
(2, 3, 3),
(17, 2, 9),
(17, 3, 9),
(18, 1, 4),
(18, 2, 3),
(19, 1, 8),
(19, 2, 9),
(19, 3, 10),
(21, 1, 1),
(21, 2, 2),
(21, 3, 3),
(29, 1, 2),
(29, 2, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthoadon`
--

CREATE TABLE `cthoadon` (
  `masohd` int(11) NOT NULL,
  `mahh` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `tinhtrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cthoadon`
--

INSERT INTO `cthoadon` (`masohd`, `mahh`, `soluongmua`, `size`, `thanhtien`, `tinhtrang`) VALUES
(0, 13, 1, 1, 180000, 0),
(1, 1, 6, 2, 1500000, 0),
(3, 1, 2, 2, 500000, 0),
(3, 3, 3, 1, 750000, 0),
(4, 1, 2, 2, 500000, 0),
(4, 3, 3, 1, 750000, 0),
(5, 17, 1, 3, 10000, 0),
(5, 18, 1, 1, 15000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `makh` int(11) NOT NULL,
  `mamh` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`makh`, `mamh`, `size`, `soluongmua`) VALUES
(6, 19, 2, 1),
(6, 21, 3, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `mamh` int(11) NOT NULL,
  `tenmh` varchar(60) NOT NULL,
  `idloai` int(11) NOT NULL,
  `dongia` int(11) NOT NULL,
  `giamgia` int(11) NOT NULL,
  `hinh` varchar(60) NOT NULL,
  `mota` text NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`mamh`, `tenmh`, `idloai`, `dongia`, `giamgia`, `hinh`, `mota`, `trangthai`) VALUES
(1, 'SICKO® CHORDS TEE', 1, 250000, 68, '1.jpg', 'Áo đẹp sang xịn mịn', 0),
(2, 'SICKO® CD TEE / BLACK', 1, 250000, 0, '2.jpg', 'Áo này đẹp lắm', 0),
(3, 'SICKO® CD TEE / BLACK', 1, 250000, 68, '3.jpg', 'Áo siêu đẹp', 0),
(4, 'SICKO® XYLOPHONE TEE', 1, 250000, 0, '4.jpg', 'Sản phẩm tuyệt vời', 0),
(5, 'SICKO® HOODIE / WHITE', 1, 300000, 57, '5.jpg', 'Áo sang xịn mịn', 0),
(6, 'SICKO® HAND TEE / BLACK', 1, 250000, 68, '6.jpg', 'Áo này sắp đẹp nhất thế giới', 0),
(7, 'SICKO® XYLOPHONE TEE / BLACK', 1, 250000, 0, '7.jpg', 'Áo siêu đẹp', 0),
(8, 'SICKO® ACT TEE / BLACK', 1, 250000, 68, '8.jpg', 'Áo đẹp', 0),
(9, 'SICKO® FLOW TEE / BLACK', 1, 250000, 0, '9.jpg', 'Áo rất đẹp', 0),
(10, 'SICKO® CD TEE / WHITE / WHITE', 1, 250000, 68, '10.jpg', 'Phù hợp đi chơi, thể thao', 0),
(11, 'SICKO® WAVE TEE / BLACK', 1, 250000, 68, '11.jpg', 'Áo đẹp phù hợp mọi hoạt động', 0),
(12, 'QUAVER SWEATER / BLUE COLOR', 2, 180000, 0, '12.jpg', 'Áo rất là đẹp nha', 0),
(13, 'QUAVER SWEATER / SMOKE PURPLE', 2, 180000, 73, '13.jpg', 'Siêu đẹp', 0),
(14, 'QUAVER SWEATER / BEIGE COLOR', 2, 180000, 0, '14.jpg', 'Áo đẹp tuyệt vời', 0),
(15, ' HARD MODE BASIC SWEATER / PURPLE', 2, 180000, 0, '15.jpg', 'Áo đẹp, mặc là quên nyc', 0),
(16, 'Áo thun Gâu Gâu', 1, 10000, 10, '1.jpg', 'Áo thun Gâu gâu sang xịn mịn', 1),
(17, 'Áo thun Gâu Gâu 1', 1, 10000, 10, '1.jpg', 'Áo thun Gâu gâu 1 sang xịn mịn', 1),
(18, 'Áo thun Meo meo', 1, 15000, 0, '1.jpg', 'Áo thun Meo Meo sang xịn mịn', 0),
(19, 'Áo thun Meo meo 1', 1, 15000, 1, '1.jpg', 'Áo thun Meo Meo 1 sang xịn mịn', 1),
(21, 'Áo thun ProMax', 1, 99999, 0, '3.jpg', 'Áo thun nhưng rất ProMax', 0),
(29, 'Áo thun Gâu Gâu', 1, 3000, 0, '1.jpg', 'Áo đẹp sang xịn mịn', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `masohd` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `ngaydat` varchar(10) NOT NULL,
  `tongtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`masohd`, `makh`, `ngaydat`, `tongtien`) VALUES
(0, 6, '2024-03-17', 180000),
(1, 6, '2024-03-18', 1500000),
(2, 2, '2024-03-19', 0),
(3, 2, '2024-03-19', 1250000),
(4, 2, '2024-03-19', 1250000),
(5, 2, '2024-03-19', 25000);

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
  `sdt` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`makh`, `tenkh`, `username`, `matkhau`, `email`, `diachi`, `sdt`) VALUES
(2, 'Tính Xù', 'TTINH', '13b2ee12c6abcde75b53ecd3764942d3', 'agaga@gmail.com', 'affff', '865145723'),
(3, 'hello ', 'abc', '1234', 'abc@gmail.com', 'nhà', '123123123123'),
(4, 'Tính', 'tinhxu1', '123', 'abc1@gmail.com', 'affff', '0865145723'),
(6, 'Tính', 'tinhxu', '6d67438e82657c0f2bccc0ea5f8834ca', 'trongtinh12b4lh2022@gmail.com', 'nhà', '0865145723');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `idloai` int(11) NOT NULL,
  `tenloai` varchar(200) NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`idloai`, `tenloai`, `trangthai`) VALUES
(1, 'Áo thun', 0),
(2, 'Sweater', 0),
(3, 'Áo Hoodie', 0),
(4, 'Áo 3 lỗ', 0),
(6, 'Áo Hoodie', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `idnv` int(11) NOT NULL,
  `hoten` varchar(250) NOT NULL,
  `dia` text NOT NULL,
  `username` varchar(250) NOT NULL,
  `matkhau` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`idnv`, `hoten`, `dia`, `username`, `matkhau`) VALUES
(1, 'Nguyễn Trọng Tính', 'Tây Ninh', 'tinhxu', '123123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `idsize` int(11) NOT NULL,
  `tensize` varchar(10) NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`idsize`, `tensize`, `trangthai`) VALUES
(1, 'M', 0),
(2, 'L', 0),
(3, 'XL', 0),
(7, 'S', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idcomment`);

--
-- Chỉ mục cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD PRIMARY KEY (`masohd`,`mahh`,`size`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`mamh`),
  ADD KEY `idloai` (`idloai`);

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
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`idloai`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`idnv`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`idsize`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `idcomment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `mamh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `makh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `idloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `idnv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `idsize` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `hanghoa_ibfk_1` FOREIGN KEY (`idloai`) REFERENCES `loai` (`idloai`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
