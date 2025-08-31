-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 26, 2021 lúc 05:17 PM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project_chay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` tinyint(2) DEFAULT 0,
  `parent` int(11) NOT NULL DEFAULT 0,
  `ctrl` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `catalog`
--

INSERT INTO `catalog` (`id`, `name`, `slug`, `description`, `sort`, `parent`, `ctrl`) VALUES
(1, 'HOME', 'home', 'sản phẩm này siêu xịn ', 0, 0, 'home'),
(2, 'OBAGI', 'obagi', 'sản phẩm này siêu xịn ', 0, 0, 'product'),
(3, 'DIETARY SUPPLEMENT', 'dietary-supplement', 'sản phẩm này siêu xịn ', 0, 0, 'trademark'),
(4, 'CONTACT', 'contact', 'sản phẩm này siêu xịn ', 0, 6, NULL),
(6, 'Prefume', 'prefume', 'sản phẩm này siêu xịn ', 0, 2, NULL),
(7, 'Shower gel', 'shower-gel', 'sản phẩm này siêu xịn ', 0, 2, NULL),
(8, 'Scented candles', 'scented-candles', 'sản phẩm này siêu cực xịn', 0, 2, NULL),
(9, 'Lipstick', 'Lipstick', 'sản phẩm này siêu cực xịn', 0, 2, NULL),
(10, 'Miss Việt Nam', 'miss-viet-nam', 'sản phẩm này siêu cực xịn', 0, 3, NULL),
(11, 'Miss Saigon The Essence', 'miss-saigon-the-essence', 'sản phẩm này siêu cực xịn', 0, 3, NULL),
(12, 'Miss Saigon Elegance', NULL, 'sản phẩm này siêu cực xịn', 0, 3, NULL),
(13, 'Orientica', NULL, 'sản phẩm này siêu cực xịn', 0, 3, NULL),
(17, 'Notes Of Mekong', 'notes-of-mekong', 'sản phẩm này siêu cực xịn', 0, 3, NULL),
(18, 'DeAndre', 'deandre', 'sản phẩm này siêu cực xịn', 0, 3, NULL),
(19, 'Aroma Link', 'aroma-link', 'sản phẩm này siêu cực xịn', 0, 3, NULL),
(22, 'FENG SHUI BRACELETS(comming soon)', 'feng-shui-bracelets(comming-soon)', 'sản phẩm này siêu cực xịn', 0, 0, NULL),
(24, 'CONTACT', 'contact', 'sản phẩm này siêu cực xịn', 0, 0, 'contact');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` tinyint(2) DEFAULT NULL,
  `email` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `messeges` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `idsp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `name`, `subject`, `email`, `messeges`, `idsp`) VALUES
(1, 'asd', 2, 'asd', 'asd', NULL),
(2, 'asd', 2, 'zxczxczxc', 'asd', NULL),
(3, 'asd', 2, 'asd', 'asd', NULL),
(4, 'nhan', 2, 'tranquangnhan1606@gmail.com', 'dsadsadsasadsda', NULL),
(5, 'nhan', 1, 'tamtran9250@gmail.com', 'dasdasdsa', NULL),
(6, 'nhan', 1, 'tranquangnhan1606@gmail.com', 'sadad', NULL),
(7, 'nhan', 1, 'tranquangnhan1606@gmail.com', 'dsdada', NULL),
(8, 'nhan', 1, 'tranquangnhan1606@gmail.com', 'dadsdasad', NULL),
(9, 'nhan', 1, 'tranquangnhan1606@gmail.com', 'dsdaasdsad', NULL),
(10, 'nhan', 1, 'tranquangnhan1606@gmail.com', 'ddaadsasd', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` double DEFAULT NULL,
  `ngaydat` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id`, `name`, `phone`, `email`, `address`, `note`, `total`, `ngaydat`, `status`) VALUES
(5, 'Đào Nhật Anh', '0394501430', NULL, '289/12 nguyễn thái sơn phường 5 gò vấp', 'asd', 570000, '2020-10-18', 1),
(6, 'nhan', '0924698776', 'tranquangnhan1606@gmail.com', '16 tranquangnhan, hcm', 'dấda', NULL, '2021-04-26', 0),
(7, 'nhan', '0924698776', 'tranquangnhan1606@gmail.com', '16 tranquangnhan, hcm', 'dsadsadasdas', 408, '2021-04-26', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhangchitiet`
--

CREATE TABLE `donhangchitiet` (
  `id` int(11) NOT NULL,
  `donhang_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `size` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(5) DEFAULT NULL,
  `price` double DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhangchitiet`
--

INSERT INTO `donhangchitiet` (`id`, `donhang_id`, `product_id`, `size`, `color`, `quantity`, `price`) VALUES
(5, 5, 53, NULL, NULL, 1, 550000),
(6, 7, 3, 'null', 'null', 6, 63),
(7, 7, 2, 'null', '#fff', 1, 30);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `catalog_id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double(10,2) NOT NULL DEFAULT 0.00,
  `discount` int(2) DEFAULT 0,
  `image_list` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `buyed` int(11) DEFAULT NULL,
  `hot` tinyint(1) NOT NULL,
  `color` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `properties` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `catalog_id`, `name`, `slug`, `price`, `discount`, `image_list`, `view`, `buyed`, `hot`, `color`, `size`, `description`, `properties`) VALUES
(2, 6, 'obagi 360', 'obagi-360', 0.00, 0, 'XfX-C-bA.png', 5, NULL, 1, '#000,#fff,#001', 'S,L,XL', '<p>d&acirc;sd&aacute;dsa</p>\r\n', '<p>asd</p>\r\n'),
(3, 6, 'Nu derm', 'nu-derm', 90.00, 30, '8VZBApYA.jpeg,cK5yk7_A.jpeg,h9T0dZZA.jpeg,OpSvWj5Q.jpeg,TmWMbLoQ.jpeg', 56, NULL, 1, '', '', '                                        \r\n                                                                                ', '                                                                                '),
(4, 6, 'Obagi-C', 'obagi-c', 69.00, 57, '3QNpMLPA.jpeg,IxzhE3Kw.jpeg,jZRnpGXQ.jpeg,S_cQb24g.jpeg', 23, 32, 0, '', '', '                                        \r\n                                                                                \r\n                                                                                                                        ', '                                                                                                                                                                '),
(5, 6, 'Professional-C', 'professional-c', 69.00, 57, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', 3431232, NULL, 0, '', '', '', ''),
(6, 6, 'Specifics', 'specifics', 69.00, 57, '5Y2UvxFQ.jpeg,i4PRRifQ.jpeg,jDgc9KHA.jpeg,TB-XlUeQ.png,Tgo5vtOA.jpeg', 563123, NULL, 0, '', '', '', '                                                                                '),
(7, 6, 'Suzan Obagi MD', 'suzan-obagi-md', 90.00, 57, 'EjIDiQlA.png,EwEw9ObQ.png,G3GsRM5g.png,TB-XlUeQ.png', 213313, 43, 0, '', '', '                                        \r\n                                                                                ', '                                                                                '),
(8, 6, 'Combo DeAndre N5 for her', 'combo-deandre-n5-for-her', 699000.00, 57, 'brown-bear-cushion.jpg,brown-bear-vector-graphics.jpg', 12, NULL, 0, '', '', '                                        \r\n                                                                                ', '                                                                                '),
(9, 6, 'Combo DeAndre N6 for her', 'Combo-DeAndre-N6-for-her', 699000.00, 57, 'brown-bear-cushion.jpg,brown-bear-vector-graphics.jpg', 234, NULL, 0, '', '', '', ''),
(10, 6, 'DeAndre,Nước Hoa DeAndre Delicate For Her - N5', 'DeAndre,Nuoc-Hoa-DeAndre-Delicate-For-Her---N5', 600000.00, 0, 'EjIDiQlA.png,EwEw9ObQ.png,Tgo5vtOA.jpeg', 46, 45, 0, '', '', '', ''),
(11, 6, 'Nước hoa Come Back Home - Vũ Cát Tường EDP 30ml', 'Nuoc-hoa-Come-Back-Home---Vu-Cat-Tuong-EDP-30ml', 500000.00, 15, 'G3GsRM5g.png,i4PRRifQ.jpeg,jDgc9KHA.jpeg', 2121212, NULL, 0, '', '', '', ''),
(12, 6, 'Nước hoa Garden Of The Muse - Garden in the Rain', 'Nuoc-hoa-Garden-Of-The-Muse---Garden-in-the-Rain', 1500000.00, 15, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', NULL, 2, 0, '', '', '', ''),
(13, 6, 'Nước hoa Garden Of The Muse - Jasmine', 'Nuoc-hoa-Garden-Of-The-Muse---Jasmine', 1500000.00, 15, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', 23, NULL, 0, '', '', '', ''),
(14, 6, 'Nước hoa Garden Of The Muse - Lily Of The Valley', 'Nuoc-hoa-Garden-Of-The-Muse---Lily-Of-The-Valley', 1500000.00, 15, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', 1, NULL, 0, '', '', '', ''),
(15, 6, 'Nước hoa Garden Of The Muse - Rose', 'Nuoc-hoa-Garden-Of-The-Muse---Rose', 1500000.00, 15, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', 5, NULL, 0, '', '', '', ''),
(16, 6, 'Nước hoa Garden Of The Muse - Tuberose', 'Nuoc-hoa-Garden-Of-The-Muse---Tuberose', 1500000.00, 15, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', 3, NULL, 0, '', '', '', ''),
(17, 7, 'Nước Hoa nữ Miss Saigon Elegance N1 EDP 50ml', 'Nuoc-Hoa-nu-Miss-Saigon-Elegance-N1-EDP-50ml', 65.00, 30, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', 2, 23, 1, '#000,#fff,#001', 'S,M,XL', '<p>asd</p>\r\n', '<p>asd</p>\r\n'),
(18, 7, 'Nước Hoa nữ Miss Saigon Elegance N10 EDP 15ml', 'Nuoc-Hoa-nu-Miss-Saigon-Elegance-N10-EDP-15ml', 250000.00, 30, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', 12, NULL, 0, '', '', '', ''),
(19, 7, 'Nước Hoa nữ Miss Saigon Elegance N11 EDP 15ml', 'Nuoc-Hoa-nu-Miss-Saigon-Elegance-N11-EDP-15ml', 250000.00, 30, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', 56, 2, 0, '', '', '', ''),
(20, 7, 'Nước Hoa nữ Miss Saigon Elegance N12 EDP 15ml', 'Nuoc-Hoa-nu-Miss-Saigon-Elegance-N12-EDP-15ml', 250000.00, 30, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', 87, NULL, 0, '', '', '', ''),
(21, 7, 'Nước Hoa nữ Miss Saigon Elegance N2 EDP 50ml', 'Nuoc-Hoa-nu-Miss-Saigon-Elegance-N2-EDP-50ml', 650000.00, 15, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', 56, NULL, 0, '', '', '', ''),
(22, 7, 'Nước Hoa nữ Miss Saigon Elegance N3 EDP 50ml', 'Nuoc-Hoa-nu-Miss-Saigon-Elegance-N3-EDP-50ml', 650000.00, 15, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', 34, NULL, 0, '', '', '', ''),
(23, 7, 'Nước hoa nữ Miss Saigon Elegance N5 EDP 50ml', 'Nuoc-hoa-nu-Miss-Saigon-Elegance-N5-EDP-50ml', 650000.00, 15, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', 456, NULL, 0, '', '', '', ''),
(24, 7, 'Nước Hoa nữ Miss Saigon Elegance N6 EDP 50ml', 'Nuoc-Hoa-nu-Miss-Saigon-Elegance-N6-EDP-50ml', 650000.00, 15, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', 564, NULL, 0, '', '', '', ''),
(25, 7, 'Nước Hoa nữ Miss Saigon Elegance N8 EDP 15ml', 'Nuoc-Hoa-nu-Miss-Saigon-Elegance-N8-EDP-15ml', 250000.00, 30, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', 78, 1, 0, '', '', '', ''),
(26, 7, 'Nước Hoa nữ Miss Saigon Elegance N9 EDP 15ml', 'Nuoc-Hoa-nu-Miss-Saigon-Elegance-N9-EDP-15ml', 250000.00, 30, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', 234, NULL, 0, '', '', '', ''),
(27, 7, 'Nước hoa nữ Miss Saigon The Essence – Aurora Fragrance EDP 50ml', 'Nuoc-hoa-nu-Miss-Saigon-The-Essence-–-Aurora-Fragrance-EDP-50ml', 1200000.00, 15, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', 45, 1, 0, '', '', '', ''),
(28, 4, 'Nước hoa nữ Miss Saigon The Essence - Oriental Pearl Fragrance EDP 50ml', 'Nuoc-hoa-nu-Miss-Saigon-The-Essence---Oriental-Pearl-Fragrance-EDP-50ml', 1200000.00, 15, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', 5, NULL, 0, '', '', '', ''),
(29, 4, 'Nước hoa nữ Miss Saigon The Essence - The Lover EDP 50ml', 'Nuoc-hoa-nu-Miss-Saigon-The-Essence---The-Lover-EDP-50ml', 1200000.00, 15, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', 3, NULL, 0, '', '', '', ''),
(30, 4, 'Nước hoa nữ Miss Saigon The Essence Aurora EDP 10ml (green)', 'Nuoc-hoa-nu-Miss-Saigon-The-Essence-Aurora-EDP-10ml-(green)', 280000.00, 30, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', 234, NULL, 0, '', '', '', ''),
(31, 7, 'Nước hoa nữ Miss Saigon The Essence x Công Trí EDP 50ml (phiên bản giới hạn)', 'Nuoc-hoa-nu-Miss-Saigon-The-Essence-x-Cong-Tri-EDP-50ml-(phien-ban-gioi-han)', 1200000.00, 15, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', 234, 43, 0, '', '', '', ''),
(32, 4, 'Nước hoa nữ Miss Saigon The Essence- Oriental Pearl EDP 10ml (amber)', 'Nuoc-hoa-nu-Miss-Saigon-The-Essence--Oriental-Pearl-EDP-10ml-(amber)', 280000.00, 30, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', 345, NULL, 0, '', '', '', ''),
(33, 4, 'Nước hoa nữ Miss Saigon The Essence- The Lover EDP 10ml (pink)', 'Nuoc-hoa-nu-Miss-Saigon-The-Essence--The-Lover-EDP-10ml-(pink)', 280000.00, 30, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', NULL, NULL, 0, '', '', '', ''),
(34, 4, 'Nước hoa nữ Miss Vietnam - Hanoi N29 EDP 35ml (mới)', 'Nuoc-hoa-nu-Miss-Vietnam---Hanoi-N29-EDP-35ml-(moi)', 1200000.00, 15, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', 34, 23, 0, '', '', '', ''),
(35, 4, 'Nước hoa nữ Miss Vietnam - Hanoi N33 EDP 35ml (mới)', 'Nuoc-hoa-nu-Miss-Vietnam---Hanoi-N33-EDP-35ml-(moi)', 1200000.00, 15, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', NULL, NULL, 0, '', '', '', ''),
(36, 4, 'Nước hoa nữ Miss Vietnam - Hue N28 EDP 35ml (mới)', 'Nuoc-hoa-nu-Miss-Vietnam---Hue-N28-EDP-35ml-(moi)', 1200000.00, 15, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', NULL, NULL, 0, '', '', '', ''),
(37, 4, 'Nước hoa nữ Miss Vietnam - Hue N32 EDP 35ml (mới)', 'Nuoc-hoa-nu-Miss-Vietnam---Hue-N32-EDP-35ml-(moi)', 1200000.00, 15, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', NULL, NULL, 0, '', '', '', ''),
(38, 4, 'Nước hoa nữ Miss Vietnam - Saigon N27 EDP 35ml (mới)', 'Nuoc-hoa-nu-Miss-Vietnam---Saigon-N27-EDP-35ml-(moi)', 1200000.00, 15, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', NULL, NULL, 0, '', '', '', ''),
(39, 4, 'Nước hoa nữ Miss Vietnam - Saigon N31 EDP 35ml (mới)', 'Nuoc-hoa-nu-Miss-Vietnam---Saigon-N31-EDP-35ml-(moi)', 1200000.00, 15, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', NULL, NULL, 0, '', '', '', ''),
(40, 4, 'Nước hoa nữ Notes Of Mekong - The Delta EDP 30ml', 'Nuoc-hoa-nu-Notes-Of-Mekong---The-Delta-EDP-30ml', 600000.00, 15, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', NULL, NULL, 0, '', '', '', ''),
(41, 4, 'Nước hoa nữ Notes Of Mekong - The Source EDP 30ml', 'Nuoc-hoa-nu-Notes-Of-Mekong---The-Source-EDP-30ml', 600000.00, 15, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', NULL, NULL, 0, '', '', '', ''),
(42, 4, 'Nước hoa Orientica- Harmony', 'Nuoc-hoa-Orientica--Harmony', 2000000.00, 15, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', NULL, NULL, 0, '', '', '', ''),
(43, 4, 'Combo 2 Sữa tắm De Andre', 'Combo-2-Sua-tam-De-Andre', 198000.00, 50, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', NULL, NULL, 0, '', '', '', ''),
(44, 7, 'DeAndre,Sữa tắm DeAndre Gorgeous For Her N2', '', 99000.00, NULL, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', NULL, NULL, 0, '', '', '', ''),
(45, 4, 'DeAndre,Sữa tắm DeAndre Invincible For Him N3', 'DeAndre,Sua-tam-DeAndre-Invincible-For-Him-N3', 99000.00, 0, NULL, NULL, NULL, 0, '', '', '', ''),
(46, 4, 'Sữa tắm Miss Saigon The Essence - Aurora 250ml', 'Sua-tam-Miss-Saigon-The-Essence---Aurora-250ml', 280000.00, 0, NULL, NULL, NULL, 0, '', '', '', ''),
(47, 4, 'Sữa tắm Miss Saigon The Essence - Oriental Pearl 250ml', 'Sua-tam-Miss-Saigon-The-Essence---Oriental-Pearl-250ml', 280000.00, 0, NULL, NULL, NULL, 0, '', '', '', ''),
(48, 4, 'Sữa tắm Miss Saigon The Essence - The Lover 250ml', 'Sua-tam-Miss-Saigon-The-Essence---The-Lover-250ml', 280000.00, 0, NULL, NULL, NULL, 0, '', '', '', ''),
(49, 4, 'Nến thơm Miss Saigon The Essence - Aurora', 'Nen-thom-Miss-Saigon-The-Essence---Aurora', 150000.00, 0, NULL, NULL, NULL, 0, '', '', '', ''),
(50, 4, 'Nến thơm Miss Saigon The Essence - Oriental Pearl', 'Nen-thom-Miss-Saigon-The-Essence---Oriental-Pearl', 150000.00, 0, NULL, NULL, NULL, 0, '', '', '', ''),
(51, 4, 'Nến thơm Miss Saigon The Essence - The Lover', 'Nen-thom-Miss-Saigon-The-Essence---The-Lover', 150000.00, 0, NULL, NULL, NULL, 0, '', '', '', ''),
(52, 4, 'Son Miss Saigon BREATH TAKING', 'Son-Miss-Saigon-BREATH-TAKING', 550000.00, 15, 'breath_6fbbe3e7248146c4a919a66e690173ec_master.jpg,breathtaking1_f5de44148396403aa89d3bd8dff8b667_master.png', NULL, NULL, 0, '', '', '', ''),
(53, 4, 'Son Miss Saigon FASHIONISTA', 'Son-Miss-Saigon-FASHIONISTA', 550000.00, 15, 'fashion_553fdddd8f5544a38e629732dc0ef7da_master.webp,fashionista2_cbfaee8ff03b488dab90fea6dd3ed8b3_master.webp', NULL, NULL, 0, '', '', '', ''),
(54, 4, 'Son Miss Saigon GIRLS NIGHT OUT', 'Son-Miss-Saigon-GIRLS-NIGHT-OUT', 550000.00, 15, 'girls_049bba52211f4bf48d76951d3ec9ebdf_master.webp,girlsnightout2_9a8c19b73ad14d7084c8e00f0b215063_master.webp', NULL, NULL, 0, '', '', '', ''),
(55, 4, 'Son Miss Saigon LADY IN RED', 'Son-Miss-Saigon-LADY-IN-RED', 550000.00, 15, 'lady_1d4bd5d131604815b5082e6881ba80f7_master.webp,ladyinred2_f77647169c424af6b56adb6f31164c35_master.webp', NULL, NULL, 0, '', '', '', ''),
(56, 4, 'Son Miss Saigon PERFECT KISS', 'Son-Miss-Saigon-PERFECT-KISS', 550000.00, 15, 'kiss_eb4379d0cec24f52b76ae81d35b95391_master.webp,perfectkiss2_533524908a3341b392b1b2f5763c314f_master.webp', NULL, NULL, 0, '', '', '', ''),
(57, 4, 'Aroma Link, Nước Hoa Aromalink Rose N6,50ml', 'Aroma-Link,-Nuoc-Hoa-Aromalink-Rose-N6,50ml', 390000.00, 62, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', NULL, NULL, 0, '', '', '', ''),
(58, 4, 'Aroma Link,Nước Hoa Aroma Link Heaven N31,50ml', 'Aroma-Link,Nuoc-Hoa-Aroma-Link-Heaven-N31,50ml', 390000.00, 62, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', NULL, NULL, 0, '', '', '', ''),
(59, 4, 'Aroma Link,Nước Hoa Aroma Link Lotus N5,50ml', 'Aroma-Link,Nuoc-Hoa-Aroma-Link-Lotus-N5,50ml', 390000.00, 62, 'imKYi0Ew.jpeg,PaNUSzdA.jpeg,q6Vxs9lg.jpeg,S_cQb24g.jpeg', NULL, NULL, 0, '', '', '', ''),
(60, 4, 'Aroma Link,Nước Hoa Aroma Link Rice Scent For Her N4,50ml', 'Aroma-Link,Nuoc-Hoa-Aroma-Link-Rice-Scent-For-Her-N4,50ml', 390000.00, 62, 'rice_-_cung_5456f3a77da9438f9eb20e985b6fe37a_master.webp,rice_-_note_huong_f3db22e82010418e96efd45050073156_master.webp', NULL, NULL, 0, '', '', '', ''),
(61, 19, 'asd', 'asd', 123.00, 123, '78039436_128014308641971_8882173521258610688_n.png,81741817_145841556859246_3715721974664658944_n.jpg,110131888_183922583162380_2301235879477721428_n.jpg78039436_128014308641971_8882173521258610688_n.png,81741817_145841556859246_3715721974664658944_n.jpg,', NULL, NULL, 1, '#000,#fff,#001', 'S,M,XL', '', '<p>asd</p>\r\n'),
(62, 4, 'asd', 'asd', 123.55, 150, '78039436_128014308641971_8882173521258610688_n.png,81741817_145841556859246_3715721974664658944_n.jpg,110131888_183922583162380_2301235879477721428_n.jpg', NULL, NULL, 1, '#000,#fff,#001', 'S,M,XL', '', '<p>asd</p>\r\n'),
(63, 6, 'asd', 'asd', 123.00, 12, '78039436_128014308641971_8882173521258610688_n.png,81741817_145841556859246_3715721974664658944_n.jpg,110131888_183922583162380_2301235879477721428_n.jpg', NULL, NULL, 1, 'asd', 'S,M,L,XL', '', '<p>ads</p>\r\n'),
(64, 13, 'vbn', 'vbn', 123.00, 12, 'tu-ao-dep-1.jpg,thiet-ke-noi-that-phong-ngu-12m2-57-.jpg,thiet-ke-nha-cap-4-co-gac-lung-60m2-3.jpg', NULL, NULL, 0, '#000,#fff,#001', 'S,M,L,XL', '', ''),
(65, 9, 'Nu derm', 'nu-derm', 500000.00, 5, 'LFN6kslw.png', NULL, NULL, 1, '', '', '<p>addaads</p>\r\n', '<p>ấdsasdasđ</p>\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`idUser`, `name`, `email`, `pass`, `role`) VALUES
(1, 'nhat anh 1', 'daonhatanh630@gmail.com', 'asdasd', 1),
(3, 'Dao Nhat Anh', 'anhdnps12765@fpt.edu.vn', 'asdasd', 0),
(4, 'nhan', 'tranquangnhan1606@gmail.com', '111111', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `donhangchitiet`
--
ALTER TABLE `donhangchitiet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dh_dhct` (`donhang_id`),
  ADD KEY `fk_sp_dh` (`product_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cata_pro` (`catalog_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `donhangchitiet`
--
ALTER TABLE `donhangchitiet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `donhangchitiet`
--
ALTER TABLE `donhangchitiet`
  ADD CONSTRAINT `fk_dh_dhct` FOREIGN KEY (`donhang_id`) REFERENCES `donhang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sp_dh` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_cata_pro` FOREIGN KEY (`catalog_id`) REFERENCES `catalog` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
