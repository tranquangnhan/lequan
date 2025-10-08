-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 08, 2025 lúc 05:46 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tytbblab_projectchay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `bannerImage` varchar(255) DEFAULT NULL,
  `bannerStatus` int(1) NOT NULL DEFAULT 1,
  `bannerLink` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `bannerImage`, `bannerStatus`, `bannerLink`) VALUES
(1, 'ChatGPT Image 15_27_27 26 thg 9, 2025.png', 1, 'http://localhost/lequan/san-pham-chi-tiet/nike-cortez-187'),
(2, 'ChatGPT Image 10_44_44 18 thg 9, 2025.png', 1, NULL),
(3, 'mwc 2.jpg', 1, NULL),
(4, '2-19-900x900.jpg', 1, 'http://localhost/lequan/san-pham-chi-tiet/giay-nike-235'),
(5, 'custom-sneaker-af1.jpg', 1, NULL),
(6, '20-1.jpg.webp', 1, NULL),
(7, 'giay-nike-16-9.jpg', 1, NULL),
(8, 'bannergiay22.jpg', 1, NULL),
(9, 'bannergiay23.jpg', 1, NULL),
(10, 'bannergiay2.jpg', 1, NULL),
(11, 'bannergiay11.jpg', 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image_list` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `style` tinyint(2) DEFAULT 0,
  `hangcosan` tinyint(2) DEFAULT 0,
  `parent` int(11) NOT NULL DEFAULT 0,
  `ctrl` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `catalog`
--

INSERT INTO `catalog` (`id`, `name`, `slug`, `image_list`, `description`, `style`, `hangcosan`, `parent`, `ctrl`) VALUES
(1, 'TRANG CHỦ', 'trang-chu', NULL, 'sản phẩm này siêu xịn ', 0, 0, 0, 'home'),
(2, 'SẢN PHẨM', 'san-pham', NULL, '<p>Lequansneaker mang đến đa dạng gi&agrave;y cho nam giới, từ thể thao đến thời trang hằng ng&agrave;y, đảm bảo thoải m&aacute;i v&agrave; phong c&aacute;ch hiện đại.</p>\r\n', 0, 0, 0, 'product'),
(3, 'CHÍNH SÁCH VẬN CHUYỂN', 'chinh-sach-van-chuyen', NULL, '<p>sản phẩm n&agrave;y si&ecirc;u xịn</p>\r\n', 0, 1, 0, 'dietary-supplement'),
(4, 'LIÊN HỆ', 'lien-he', NULL, 'sản phẩm này siêu cực xịn', 0, 0, 0, 'contact'),
(6, 'Giày', 'giay', 'z2509652562939_c35795380689ed3c89cfd63b26e22152.jpg', '<p>sản phẩm n&agrave;y si&ecirc;u xịn</p>\r\n', 0, 0, 2, NULL),
(7, 'Quần áo', 'quan-ao', 'z2509677983129_4c1ada7b5c9fffadb0cd651513e5a5d5.jpg', '<p>sản phẩm n&agrave;y si&ecirc;u xịn</p>\r\n', 0, 0, 2, NULL),
(8, 'Phụ kiện', 'phu-kien', NULL, 'sản phẩm này siêu cực xịn', 0, 0, 2, NULL),
(124, 'Hàng có sẵn', 'hang-co-san', '', '', 0, 0, 6, NULL),
(125, 'Hàng order', 'hang-order', '', '', 0, 1, 6, NULL),
(126, 'Hàng order', 'hang-order', '', '', 0, 1, 7, NULL),
(127, 'Hàng order', 'hang-order', '', '', 0, 1, 8, NULL),
(128, 'Hàng có sẵn', 'hang-co-san', '', '', 0, 0, 7, NULL),
(129, 'Hàng có sẵn', 'hang-co-san', '', '', 1, 0, 0, NULL),
(130, 'Hàng order', 'hang-order', '', '', 1, 1, 0, NULL),
(131, 'Adidas', 'adidas', '', '', 1, 0, 129, NULL),
(132, 'Nike', 'nike', '', '', 1, 0, 129, NULL),
(133, 'Nike', 'nike', '', '', 1, 1, 130, NULL),
(134, 'Luxury', 'luxury', '', '', 1, 0, 129, NULL),
(135, 'Adidas', 'adidas', '', '', 1, 1, 130, NULL),
(136, 'Gucci', 'gucci', '', '', 1, 1, 130, NULL),
(137, 'Dior', 'dior', '', '', 1, 1, 130, NULL),
(138, 'Louis Vuitton', 'louis-vuitton', '', '', 1, 1, 130, NULL),
(139, 'Chanel', 'chanel', '', '', 1, 1, 130, NULL),
(140, 'Prada', 'prada', '', '', 1, 1, 130, NULL),
(153, 'Vans-Converse', 'vansconverse', '', '', 1, 0, 129, NULL),
(154, 'BẢO HÀNH', 'bao-hanh', '', '', 0, 1, 0, NULL),
(158, 'MCM', 'mcm', '', '', 0, 1, 8, NULL),
(159, 'MCM', 'mcm', '', '', 1, 1, 127, NULL),
(163, 'Nike Air Force', 'nike-air-force', '', '', 1, 1, 133, NULL),
(164, 'Nike Air Force 2', 'nike-air-force-2', '', '', 1, 0, 132, NULL),
(165, 'Nike Air Force 3', 'nike-air-force-3', '', '', 1, 0, 132, NULL),
(166, 'Nike Air Force 3', 'nike-air-force-3', '', '', 1, 1, 133, NULL),
(167, 'Nike Air Max', 'nike-air-max', '', '', 1, 1, 133, NULL),
(168, 'Nike Air Max', 'nike-air-max', '', '', 1, 0, 132, NULL),
(170, 'AIR JORDAN 1 LOW ', 'air-jordan-1-low', '', '', 1, 1, 133, NULL),
(171, 'AIR JORDAN 1 RETRO HIGH', 'air-jordan-1-retro-high', '', '', 1, 1, 133, NULL),
(172, 'AIR JORDAN 1 MID', 'air-jordan-1-mid', '', '', 1, 1, 133, NULL),
(173, 'AIR JORDAN 4-5-6 & JORDAN KHÁC', 'air-jordan-456-jordan-khac', '', '', 1, 1, 133, NULL),
(174, 'NIKE DUNK LOW SB', 'nike-dunk-low-sb', '', '', 1, 1, 133, NULL),
(175, 'NIKE AIR FEAL OF GOD', 'nike-air-feal-of-god', '', '', 1, 1, 133, NULL),
(176, 'NIKE SCAI x VAPORWAFFLE', 'nike-scai-x-vaporwaffle', '', '', 1, 1, 133, NULL),
(177, 'AIR FORCE ONE', 'air-force-one', '', '', 1, 1, 133, NULL),
(178, 'AIR MAX 270', 'air-max-270', '', '', 1, 1, 133, NULL),
(179, 'AIR MAX 90-95-97', 'air-max-909597', '', '', 1, 1, 133, NULL),
(180, 'ZOOM-PEGASUS', 'zoompegasus', '', '', 1, 1, 133, NULL),
(181, 'YEEZY 350 V2', 'yeezy-350-v2', '', '', 1, 1, 135, NULL),
(182, 'YEEZY 380 V3', 'yeezy-380-v3', '', '', 1, 1, 135, NULL),
(183, 'YEEZY 500', 'yeezy-500', '', '', 1, 1, 135, NULL),
(184, 'YEEZY 700 V2', 'yeezy-700-v2', '', '', 1, 1, 135, NULL),
(185, 'YEEZY 700 V3', 'yeezy-700-v3', '', '', 1, 1, 135, NULL),
(186, 'YEEZY 700 MNVN', 'yeezy-700-mnvn', '', '', 1, 1, 135, NULL),
(187, 'CÁC DÒNG ADIDAS KHÁC', 'cac-dong-adidas-khac', '', '', 1, 1, 135, NULL),
(188, 'GUCCI ACE', 'gucci-ace', '', '', 1, 1, 136, NULL),
(189, 'GUCCI RHYTON', 'gucci-rhyton', '', '', 1, 1, 136, NULL),
(190, 'adidas ultraview', 'adidas-ultraview', NULL, '', 1, 0, 131, NULL),
(191, 'BALENCIAGA TRIPLE S - TRACH -  SPEED', 'balenciaga-triple-s-trach-speed', NULL, '', 1, 1, 130, NULL),
(193, 'McQueen-XVESSL', 'mcqueenxvessl', NULL, '', 1, 1, 130, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `subject` tinyint(2) DEFAULT NULL,
  `email` varchar(155) DEFAULT NULL,
  `messeges` text DEFAULT NULL,
  `idsp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `name`, `phone`, `subject`, `email`, `messeges`, `idsp`) VALUES
(1, 'asd', NULL, 2, 'asd', 'asd', NULL),
(2, 'asd', NULL, 2, 'zxczxczxc', 'asd', NULL),
(3, 'asd', NULL, 2, 'asd', 'asd', NULL),
(4, 'nhan', NULL, 2, 'tranquangnhan1606@gmail.com', 'dsadsadsasadsda', NULL),
(5, 'nhan', NULL, 1, 'tamtran9250@gmail.com', 'dasdasdsa', NULL),
(6, 'nhan', NULL, 1, 'tranquangnhan1606@gmail.com', 'sadad', NULL),
(7, 'nhan', NULL, 1, 'tranquangnhan1606@gmail.com', 'dsdada', NULL),
(8, 'nhan', NULL, 1, 'tranquangnhan1606@gmail.com', 'dadsdasad', NULL),
(9, 'nhan', NULL, 1, 'tranquangnhan1606@gmail.com', 'dsdaasdsad', NULL),
(10, 'nhan', NULL, 1, 'tranquangnhan1606@gmail.com', 'ddaadsasd', 2),
(11, 'okelaa', '123123a', 2, NULL, 'sdasd', 80),
(12, 'cu', '123', 2, NULL, 'asd', 80);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) NOT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `housenumber` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `ngaydat` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `payments` varchar(255) DEFAULT NULL,
  `postcode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id`, `firstname`, `lastname`, `phone`, `email`, `address`, `street`, `housenumber`, `city`, `country`, `note`, `total`, `ngaydat`, `status`, `payments`, `postcode`) VALUES
(28, 'Dao Anh', '', '0394501430', 'daonhatanh630@gmail.com', '289/12 nguyễn thái sơn phường 5 gò vấp', NULL, NULL, NULL, NULL, 'giao nhanh cho e', 2181292, '2021-05-11', 0, NULL, NULL),
(29, 'tran quang nhan', '', '0924698776', 'tranquangnhan1606@gmail.com', 'dasdasds', NULL, NULL, NULL, NULL, 'asddasdsas', 2600000, '2021-05-19', 1, NULL, NULL),
(30, 'Tú', '', '0815172779', 'tranquangnhan1606@gmail.com', 'test', NULL, NULL, NULL, NULL, '', 10000, '2025-09-22', 0, NULL, NULL),
(31, 'Tú', '', '0815172779', 'tudoi1540@gmail.com', 'Thôn 86', NULL, NULL, NULL, NULL, '', 20, '2025-10-04', 0, NULL, NULL),
(32, 'lequan', '', '0815172779', 'tranquangnhan1606@gmail.com', 'Thôn 86', NULL, NULL, NULL, NULL, '', 20, '2025-10-04', 0, NULL, NULL),
(33, 'lequan', '', '0815172779', 'tranquangnhan1606@gmail.com', 'Thôn 86', NULL, NULL, NULL, NULL, '', 10, '2025-10-04', 0, NULL, NULL),
(34, 'lequan', '', '0815172779', 'tranquangnhan1606@gmail.com', 'Thôn 86', NULL, NULL, NULL, NULL, '', 45000, '2025-10-05', 0, NULL, NULL),
(35, 'lequan', '', '0815172779', 'tranquangnhan1606@gmail.com', 'Thôn 86', NULL, NULL, NULL, NULL, '', 10, '2025-10-05', 0, NULL, NULL),
(36, 'lequan', '', '0815172779', 'tranquangnhan1606@gmail.com', 'Thôn 86', NULL, NULL, NULL, NULL, '', 10, '2025-10-05', 0, NULL, NULL),
(37, 'lequan', '', '0815172779', 'tranquangnhan1606@gmail.com', 'Thôn 86', NULL, NULL, NULL, NULL, '', 10, '2025-10-07', 0, NULL, NULL),
(38, 'lequan', '', '0815172779', 'tranquangnhan1606@gmail.com', 'Thôn 86', NULL, NULL, NULL, NULL, '', 111, '2025-10-07', 0, NULL, NULL),
(39, 'lequan', '', '0815172779', 'tranquangnhan1606@gmail.com', 'Thôn 86', NULL, NULL, NULL, NULL, '', 121, '2025-10-07', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhangchitiet`
--

CREATE TABLE `donhangchitiet` (
  `id` int(11) NOT NULL,
  `donhang_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `name_product` varchar(255) DEFAULT NULL,
  `img_product` varchar(255) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `quantity` int(5) DEFAULT NULL,
  `price` double DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhangchitiet`
--

INSERT INTO `donhangchitiet` (`id`, `donhang_id`, `product_id`, `name_product`, `img_product`, `size`, `color`, `quantity`, `price`) VALUES
(121, 28, 84, 'Jean nam gucci', '../uploads/52884260_2229255920671340_6206757264942956544_n.jpg', 'null', 'null', 4, 545323),
(122, 29, 122, 'Adidas Ultraboost 6.0', '../uploads/z2495459126009_44c16671533f973973650714d678ed0b.jpg', '44.5', '#xám', 2, 1300000),
(124, 30, 238, 'Giày nike 1111', '../uploads/2-19-900x900.jpg', 'null', 'null', 1, 10000),
(131, 31, 256, 'Video cả 2 link', '../uploads/1-18-900x900.jpg', 'null', 'null', 1, 20),
(147, 32, 256, 'Video cả 2 link', '../uploads/1-18-900x900.jpg', 'null', 'null', 1, 20),
(150, 33, 237, 'Trần Đại Quang', '../uploads/17-3.jpg.webp', 'null', 'null', 1, 10),
(153, 34, 251, 'test link', '../uploads/16-1.jpg', 'null', 'null', 1, 45000),
(168, 35, 237, 'Trần Đại Quang', '../uploads/17-3.jpg.webp', 'null', 'null', 1, 10),
(169, 36, 237, 'Trần Đại Quang', '../uploads/17-3.jpg.webp', 'null', 'null', 1, 10),
(170, 37, 237, 'Trần Đại Quang', '../uploads/17-3.jpg.webp', 'null', 'null', 1, 10),
(171, 38, 236, 'test', '../uploads/18-2.jpg.webp', 'null', 'null', 1, 111),
(185, 39, 237, 'Trần Đại Quang', '../uploads/17-3.jpg.webp', 'null', 'null', 1, 10),
(186, 39, 236, 'test', '../uploads/18-2.jpg.webp', 'null', 'null', 1, 111);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `catalog_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `discount` int(2) DEFAULT 0,
  `image_list` varchar(500) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `buyed` int(11) DEFAULT NULL,
  `hot` tinyint(1) NOT NULL,
  `color` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `cosan` tinyint(2) NOT NULL DEFAULT 0,
  `Brand` varchar(100) DEFAULT NULL,
  `description` text NOT NULL,
  `properties` text NOT NULL,
  `videoLinks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `catalog_id`, `name`, `slug`, `price`, `discount`, `image_list`, `view`, `buyed`, `hot`, `color`, `size`, `cosan`, `Brand`, `description`, `properties`, `videoLinks`) VALUES
(134, 6, 'Air Max 2090', 'air-max-2090-134', 1600000, 0, 'i1591547687_844_0.jpg', NULL, NULL, 0, '#đen', '40,41,42.43', 0, 'nike-air-max-0', '', '', NULL),
(139, 6, 'Air Max 2090', 'air-max-2090-139', 1600000, 0, 'i1587572738_4262_0.jpg', NULL, NULL, 0, '', '38,40', 0, 'nike-air-max-0', '', '', NULL),
(140, 6, 'Air Max 2090', 'air-max-2090-140', 1600000, 0, 'i1588006252_1860_0.jpg', NULL, NULL, 0, '', '36.5,37.5,38,39,40', 0, 'nike-air-max-0', '', '', NULL),
(141, 6, 'Air Max 2090', 'air-max-2090-141', 1600000, 0, 'i1588616564_5054_0.jpg', NULL, NULL, 0, '', '36', 0, 'nike-air-max-0', '', '', NULL),
(142, 6, 'Air Max 2090', 'air-max-2090-142', 1600000, 0, 'i1589396355_3320_0.jpg', NULL, NULL, 0, '', '37,38,39,40', 0, 'nike-air-max-0', '', '', NULL),
(143, 6, 'Nike Air Max 270', 'nike-air-max-270-143', 1600000, 0, 'i1588616680_5617_0.jpg', NULL, NULL, 0, '', '38,39,41', 0, 'nike-air-max-0', '', '', NULL),
(162, 6, 'Nike Joyride CC3 Setter', 'nike-joyride-cc3-setter-162', 1500000, 0, 'z2497942886596_cb56edc583462651da583340f484dfa6.jpg,z2497942892054_c054bb5cdd3239f0d6693645b9798a70 (1).jpg,z2497942868348_3f7495472ad721f3f53e25e0d902c969.jpg,z2497942877510_e3cdc090cf41b06c649d7a7451903c37.jpg,z2497942879393_34ab3b3b6f38e5b3fc9f09c0ba54270e.jpg', NULL, NULL, 0, '', '44', 0, 'adidas-ultraview-0', '', '', NULL),
(163, 6, 'Nike Joyride CC3 Setter', 'nike-joyride-cc3-setter-163', 1500000, 0, 'z2497942015033_76da3c2a0f38ea0d3147abbfecc2eb3e.jpg,z2497941989043_366f9ab393b2b865a8e40c56fa12f5e9.jpg,z2497941996831_bc52a280766712f1a9fd56cbdacaeafd.jpg,z2497942000372_68877dd5adb0f7957ee97010c9c537cb.jpg,z2497942004682_78e201e4c454fad5dcbc40dbaa01b5f1.jpg,z2497942010856_d35417e800ee61d4866d204acbff34c2.jpg', NULL, NULL, 0, '', '43', 0, 'adidas-ultraview-0', '', '', NULL),
(164, 6, 'Nike Joyride CC3 Setter', 'nike-joyride-cc3-setter-164', 1500000, 0, 'z2497965619220_43c03857e34569e81187a63501b4624b.jpg,z2497965626729_2cd5cfd3f9c1ad2d11383c27215c31f5.jpg,z2497965608006_6eca8f04cebc0649d5f9f16847f89975.jpg,z2497965614186_744920f78644b03c68be1bd1d36335da.jpg', NULL, NULL, 0, '', '42,42.5,43', 0, 'adidas-ultraview-0', '', '', NULL),
(165, 6, 'Nike Joyride', 'nike-joyride-165', 1200000, 0, 'z2497994467140_bb7460c09be8919ed61111c6ca045ead (1).jpg', NULL, NULL, 0, '', '36,37.5,40,41,42,43,44', 0, 'adidas-ultraview-0', '', '', NULL),
(166, 6, 'Nike Joyride', 'nike-joyride-166', 1200000, 0, 'z2497994467178_6a156ab1c318998ba20034d7833d9d7a (1).jpg', NULL, NULL, 0, '', '40,41,42,43', 0, 'adidas-ultraview-0', '', '', NULL),
(167, 6, 'Nike Joyride', 'nike-joyride-167', 1200000, 0, 'z2497994473698_e7743298a0c71a7f39bb098dc7355e43 (1).jpg', NULL, NULL, 0, '', '40,41,42,43', 0, 'adidas-ultraview-0', '', '', NULL),
(168, 6, 'Nike Joyride', 'nike-joyride-168', 1200000, 0, 'z2497994437752_af05f5c258b3fd27ab830f1ef7458234.jpg', NULL, NULL, 0, '', '40,41,42,43', 0, 'adidas-ultraview-0', '', '', NULL),
(169, 6, 'Nike Joyride', 'nike-joyride-169', 1200000, 0, 'z2497994442443_22eb0aa21ab3d2a6da7357359bbebc82.jpg', NULL, NULL, 0, '', '37.5,38,39', 0, 'adidas-ultraview-0', '', '', NULL),
(170, 6, 'Nike Joyride', 'nike-joyride-170', 1200000, 0, 'z2497994448471_251c93e2e8cadb32a60bbd5a7a05be6c.jpg', NULL, NULL, 0, '', '37.5,38', 0, 'adidas-ultraview-0', '', '', NULL),
(171, 6, 'Nike Joyride', 'nike-joyride-171', 1200000, 0, 'z2497994452883_320c92395c97464da841040ecae92bfe.jpg', NULL, NULL, 0, '', '37,38', 0, 'adidas-ultraview-0', '', '', NULL),
(172, 6, 'Nike Joyride', 'nike-joyride-172', 1200000, 0, 'z2497994457698_cf40fd281d937912ac00af648fdf73bc (1).jpg', NULL, NULL, 0, '', '37.5,38', 0, 'adidas-ultraview-0', '', '', NULL),
(173, 6, 'Nike Joyride', 'nike-joyride-173', 1200000, 0, 'z2498137068234_372fc0136649df06973dc806316b02d9.jpg', NULL, NULL, 0, '', '37.5,38', 0, 'adidas-ultraview-0', '', '', NULL),
(174, 6, 'Nike Air Zoom Winflo 6', 'nike-air-zoom-winflo-6-174', 1300000, 0, 'z2498169246896_83f3557f84da01e057c019e439876f88.jpg,z2498169255605_c9ba9295041d3a55ca6c876a76068d2a.jpg,z2498169246895_5b769f8b6d344414eb78afbc1f0863e9.jpg', NULL, NULL, 0, '', '42', 0, 'adidas-ultraview-0', '', '', NULL),
(175, 6, 'Nike Air Zoom Winflo 6', 'nike-air-zoom-winflo-6-175', 1300000, 0, 'z2498168438933_f270d7da7bad2b49f56bb6b87096ccfe.jpg,z2498168442431_a83145f3ed2bb9ca379c6c5d1b720353.jpg,z2498168447156_206e7e6c53e8c611a62d3b8e57dea560.jpg', NULL, NULL, 0, '', '37.5,42.5,43', 0, 'adidas-ultraview-0', '', '', NULL),
(176, 6, 'Nike Air Zoom Winflo 7', 'nike-air-zoom-winflo-7-176', 1500000, 0, 'z2498162484220_1f22d1e42e175ba9b6c30aa04d390231.jpg,z2498162487129_2db51278bdfdd94ce565f2121446316a.jpg,z2498162490914_1319b19e52371bc83a40aeec447016e6.jpg,z2498162505062_167086e47c2bd932378ba3be2f672594.jpg', NULL, NULL, 0, '', '36.5,37.5,38,39', 0, 'adidas-ultraview-0', '', '', NULL),
(177, 6, 'Nike Alpha Next %', 'nike-alpha-next-177', 1700000, 0, 'z2498162149010_ef276ac3b862f13d487ce12a15958319.jpg,z2498162121465_c349cc30e542a51f7feb060259ca9b5f.jpg,z2498162125287_7c6b74cd40b478caf1a6f7d081c47b64.jpg,z2498162129930_f4bdcffe37ca79d20f869bc58f00d3dc.jpg,z2498162135582_9d6a4746591080f2dbd29e53d239e3da.jpg,z2498162144987_cfe7dcba9773df8612eebb0a315ba255.jpg', NULL, NULL, 0, '', '39', 0, 'adidas-ultraview-0', '', '', NULL),
(178, 6, 'Nike Air Zoom Winflo 7', 'nike-air-zoom-winflo-7-178', 1500000, 0, 'z2498161778230_9d376ea9097c73742ce9195e7b1d06b2.jpg,z2498161786670_cce86480a898fd4ed8860ed0abfa9b0a.jpg,19-1.jpg.webp', NULL, NULL, 0, '', '41,42,43', 0, 'adidas-ultraview-0', '', '', NULL),
(187, 6, 'Nike Cortez', 'nike-cortez-187', 800000, 0, '18-1.jpg.webp,19.jpg.webp', 4, NULL, 0, '', '37.5,38,38.5', 0, 'adidas-ultraview-0', '', '', NULL),
(188, 6, 'Nike Cortez', 'nike-cortez-188', 800000, 0, '15-4.jpg.webp', NULL, NULL, 0, '', '42,43,44', 0, 'adidas-ultraview-0', '', '', NULL),
(191, 6, 'MCM{5716}', 'mcm5716-191', 1500000, 0, '1-13.jpg.webp', 3, NULL, 0, '#000,#CCC,#FFF', 'S,L,M,XL', 1, 'adidas-ultraview-1', '<p><img alt=\"yes\" src=\"http://webofnhan.tk/lib/ckeditor/plugins/smiley/images/thumbs_up.png\" style=\"height:23px; width:23px\" title=\"yes\" />&nbsp;SIZE S - 17x21x9cm<br />\r\n<img alt=\"yes\" src=\"http://webofnhan.tk/lib/ckeditor/plugins/smiley/images/thumbs_up.png\" style=\"height:23px; width:23px\" title=\"yes\" />&nbsp;SIZE M - 21x27x10cm<br />\r\n<img alt=\"yes\" src=\"http://webofnhan.tk/lib/ckeditor/plugins/smiley/images/thumbs_up.png\" style=\"height:23px; width:23px\" title=\"yes\" />&nbsp;SIZE L - 26x33x13cm<br />\r\n<img alt=\"yes\" src=\"http://webofnhan.tk/lib/ckeditor/plugins/smiley/images/thumbs_up.png\" style=\"height:23px; width:23px\" title=\"yes\" /> SIZE XL - 33x41x15cm</p>\r\n', '', NULL),
(201, 6, 'Nike Air Max 2020', 'nike-air-max-2020-201', 1000000, 0, '1-18-900x900.jpg,2-19-900x900.jpg,3-19-900x900.jpg,17-3.jpg.webp,18-2.jpg.webp,19-1.jpg.webp,20-1.jpg.webp', NULL, NULL, 0, '', '', 1, 'adidas-ultraview-1', '', '', NULL),
(205, 6, 'Nike Air Max 2021', 'nike-air-max-2021-205', 1000000, 0, '3-19-900x900.jpg,17-3.jpg.webp', NULL, NULL, 0, '', '', 1, 'adidas-ultraview-1', '', '', NULL),
(206, 6, 'Nike Air Max 2022', 'nike-air-max-2022-206', 2000000, 0, '17-3.jpg.webp,18-2.jpg.webp', 1, NULL, 0, '', '', 0, 'nike-air-max-0', '', '', NULL),
(207, 6, '\'Mismatched - Purple Magenta\' DJ4342 400', 'mismatched-purple-magenta-dj4342-400-207', 0, 0, '2-19-900x900.jpg', NULL, NULL, 0, '', '36,36.5,37.5,38,38.5,39', 0, 'air-jordan-1-low-0', '', '', NULL),
(208, 6, '\'Smoke Grey\' 554724 092', 'smoke-grey-554724-092-208', 0, 0, '20-1.jpg.webp', 3, NULL, 0, '', '36,36.5,37.5,38,38.5,39,40,40.5,41,42,42.5,43,44,4', 0, 'adidas-ultraview-0', '', '', NULL),
(209, 6, '\'Shadow 2.0\' 575441 035', 'shadow-20-575441-035-209', 0, 0, '19-1.jpg.webp', 1, NULL, 0, '', '36,36.5,37.5,38,38.5,39,40,40.5,41,42,42.5,43,44,4', 0, 'air-jordan-1-retro-high-0', '', '', NULL),
(210, 6, '\'University Blue\' 408452 400', 'university-blue-408452-400-210', 0, 0, '17-3.jpg.webp,20-1.jpg.webp', NULL, NULL, 0, '', '36,36.5,37.5,38,38.5,39,40,40.5,41,42,42.5,43,44,4', 1, 'air-jordan-456-jordan-khac-1', '', '', NULL),
(231, 6, 'Nén Ảnh', 'nen-anh-231', 100000, 10, '2-19-900x900.jpg,3-19-900x900.jpg', 1, NULL, 0, '#fff', 'S,M,X,L', 0, 'adidas-ultraview-0', '<p>test</p>\r\n', '', NULL),
(234, 6, 'test', 'test-234', 0, 0, '18-2.jpg.webp', NULL, NULL, 1, '', '', 1, 'adidas-ultraview-1', '', '', NULL),
(235, 6, 'Giày nike', 'giay-nike-235', 100000, 10, '2-19-900x900.jpg', 4, NULL, 1, '#000', 'S,M,X,L', 0, 'adidas-ultraview-0', '', '', NULL),
(236, 6, 'test', 'test-236', 111, 0, '18-2.jpg.webp', 6, NULL, 1, '', '', 1, 'adidas-ultraview-1', '', '', NULL),
(237, 6, 'Trần Đại Quang', 'tran-dai-quang-237', 10, 0, '17-3.jpg.webp', 11, NULL, 1, '', '', 0, 'adidas-ultraview-0', '', '', NULL),
(238, 6, 'Giày nike 1111', 'giay-nike-1111-238', 10000, 0, '2-19-900x900.jpg,17-3.jpg.webp,3-19-900x900.jpg,1-18-900x900.jpg,1-18-900x900.jpg,2-19-900x900.jpg,3-19-900x900.jpg,17-3.jpg.webp,18-2.jpg.webp,19-1.jpg.webp,20-1.jpg.webp,1-18-900x900.jpg,2-19-900x900.jpg,3-19-900x900.jpg', 1, NULL, 1, '', '', 1, 'adidas-ultraview-1', '', '', NULL),
(239, 8, 'alo Basic Nhiều Ngăn Khóa Kéo Phù Hợp Cho Nam,', 'alo-basic-nhieu-ngan-khoa-keo-phu-hop-cho-nam-239', 100000, 0, 'mwc (1).jpg,mwc (2).jpg', 3, NULL, 0, '', 'S,M,X,L', 0, 'nike-air-max-0', '', '', NULL),
(240, 8, 'Balo Unisex Du Lịch Thời Trang Chống Sốc', 'balo-unisex-du-lich-thoi-trang-chong-soc-240', 200000, 0, 'mwc (2).jpg,mwc (3).jpg', 3, NULL, 0, '', '', 0, 'adidas-ultraview-0', '', '', NULL),
(241, 8, 'Túi Đeo Chéo Vải Canvas Phối Lưới', 'tui-deo-cheo-vai-canvas-phoi-luoi-241', 200000, 0, 'mwc (3).jpg,mwc (4).jpg', 3, NULL, 0, '', '', 1, 'gucci-rhyton-1', '', '', NULL),
(242, 8, 'Balo Unisex Full Họa Tiết Gấu', 'balo-unisex-full-hoa-tiet-gau-242', 300000, 0, 'mwc (4).jpg,mwc.jpg', 2, NULL, 0, '', '', 1, 'gucci-ace-1', '', '', NULL),
(243, 8, 'Balo Unisex Thời Trang Chống Sốc', 'balo-unisex-thoi-trang-chong-soc-243', 300000, 0, 'mwc (1).jpg,mwc.jpg', NULL, NULL, 0, '', '', 0, 'adidas-ultraview-0', '', '', NULL),
(244, 7, 'Áo Thun Nữ Relax Typo Now WTS 2450', 'ao-thun-nu-relax-typo-now-wts-2450-244', 200000, 0, 'women_hong__2__4c1277b900d64437bacb11b3e771fe16_master.jpg', NULL, NULL, 0, '', '', 1, 'adidas-ultraview-1', '', '', NULL),
(245, 7, 'Áo Thun Nữ Relax Typo Now WTS', 'ao-thun-nu-relax-typo-now-wts-245', 350000, 0, 'women_xanh-infinity__2__7844022c8cfc4a8dbc32f888b4d7fa1a_master.jpg', NULL, NULL, 0, '', '', 1, 'adidas-ultraview-1', '', '', NULL),
(246, 7, 'Áo thun nữ', 'ao-thun-nu-246', 500000, 10, 'women_trang__29__f648598a96994548a5fe3ae297f68666_2048x2048.jpg', 3, NULL, 0, '', '', 1, 'adidas-ultraview-1', '', '', NULL),
(247, 7, 'Áo thun nữ 2', 'ao-thun-nu-2-247', 0, 0, 'women_hong__3__61e48859dda045aaa1d531795465d591_master.jpg,women_trang__29__f648598a96994548a5fe3ae297f68666_2048x2048.jpg,women_trang__53__c5434796cc0a4f538eba6e5f5d2bfd06_2048x2048.jpg,women_xanh-infinity__2__7844022c8cfc4a8dbc32f888b4d7fa1a_master.jpg', 1, NULL, 0, '', '', 1, 'adidas-ultraview-1', '', '', NULL),
(248, 7, 'Áo Thun Nam Cổ Tròn Slim', 'ao-thun-nam-co-tron-slim-248', 500000, 0, 'men_trang__64__5b0cf69756264110862b646d263dfbd6_master.jpg,women_hong__2__4c1277b900d64437bacb11b3e771fe16_master.jpg', 3, NULL, 0, '', '', 1, 'adidas-ultraview-1', '', '', NULL),
(249, 6, 'Thử màu', 'thu-mau-249', 200000, 0, '2-19-900x900.jpg,16-1.jpg,giay-nike-16-9.jpg', 1, NULL, 0, '#a64a06,#b3c4da,#B1C2D4,#E9DCCB', '36,36.5,37.5,38,38.5,39,40,40.5,41,42,42.5,43,44', 0, 'adidas-ultraview-0', '', '', NULL),
(250, 6, 'Sản phẩm có link youtube', 'san-pham-co-link-youtube-250', 200000, 0, '17-1.jpg.webp', 11, NULL, 0, '', '', 1, 'adidas-ultraview-1', '', '', NULL),
(251, 6, 'test link', 'test-link-251', 50000, 10, '16-1.jpg', 8, NULL, 0, '', '', 1, 'adidas-ultraview-1', '', '', NULL),
(253, 6, 'Thử link', 'thu-link-252', 5000, 0, 'giay-nike-court-vision-mid-smoke-grey-dn3577-002.jpg', 3, NULL, 0, '', '', 1, 'adidas-ultraview-1', '', '', ''),
(254, 6, 'thử link 2', 'thu-link-2-254', 100, 0, '16-1.jpg', 6, NULL, 0, '', '', 1, 'adidas-ultraview-1', '', '', '[\"https://youtu.be/CVrP7b_bwME?si=fvTjrgjDSMjpRPbW\"]'),
(255, 6, 'Giày nike 9999', 'giay-nike-9999-255', 500000, 0, '3-14.jpg.webp', 2, NULL, 0, '', '', 1, 'adidas-ultraview-1', '', '', '[\"https://youtu.be/4OFXMR9dj1k?si=6dyyP2Ce5EqhbEht\"]'),
(256, 6, 'Video cả 2 link', 'video-ca-2-link-256', 20, 0, '1-18-900x900.jpg', 6, NULL, 0, '', '', 1, 'adidas-ultraview-1', '', '', '[\"<blockquote class=\\\"tiktok-embed\\\" cite=\\\"https://www.tiktok.com/@lqsneaker/video/7526023043139800328\\\" data-video-id=\\\"7526023043139800328\\\" style=\\\"max-width: 605px;min-width: 325px;\\\" > <section> <a target=\\\"_blank\\\" title=\\\"@lqsneaker\\\" href=\\\"https://www.tiktok.com/@lqsneaker?refer=embed\\\">@lqsneaker</a> <a title=\\\"lqsneaker\\\" target=\\\"_blank\\\" href=\\\"https://www.tiktok.com/tag/lqsneaker?refer=embed\\\">#LQSNEAKER</a> <a title=\\\"jordan\\\" target=\\\"_blank\\\" href=\\\"https://www.tiktok.com/tag/jordan?refer=embed\\\">#jordan</a> <a target=\\\"_blank\\\" title=\\\"♬ original sound - bachyard ghost\\\" href=\\\"https://www.tiktok.com/music/original-sound-7498498921023507231?refer=embed\\\">♬ original sound - bachyard ghost</a> </section> </blockquote> <script async src=\\\"https://www.tiktok.com/embed.js\\\"></script>\",\"https://www.youtube.com/watch?v=4OFXMR9dj1k\"]'),
(257, 6, 'Thử link tiktok 2', 'thu-link-tiktok-2-257', 50000, 0, 'custom-sneaker-af1.jpg', 5, NULL, 0, '', '', 1, 'adidas-ultraview-1', '', '', '[\"https://www.tiktok.com/@lqsneaker/video/7556084219391315218\"]'),
(260, 6, 'Thử link mới', 'thu-link-moi-260', 20, 0, '16-1.jpg', 3, NULL, 0, '#BD0000,#862828,#F87272', '', 1, 'adidas-ultraview-1', '', '', '[\"https://www.tiktok.com/@pthg108/video/7537273413740662024?is_from_webapp=1&sender_device=pc\",\"https://www.youtube.com/watch?v=wbt0kfJVmfg\"]'),
(261, 6, 'Video có link tóp tóp', 'video-co-link-top-top-261', 500000, 0, '14-6.jpg.webp', 30, NULL, 0, '#BF2222,#34BF22', '', 1, 'adidas-ultraview-1', '', '', '[\"https://www.tiktok.com/@lqsneaker/video/7526023043139800328\",\"https://www.youtube.com/watch?v=wbt0kfJVmfg\"]');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `role` int(1) NOT NULL DEFAULT 0,
  `fcm_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`idUser`, `name`, `email`, `pass`, `role`, `fcm_token`) VALUES
(1, 'nhat anh 1', 'daonhatanh630@gmail.com', 'asdasd', 1, NULL),
(4, 'nhan', 'tranquangnhan1606@gmail.com', '111111', 1, ''),
(10, 'Dao Nhat Anh', 'anhdnps12765@fpt.edu.vn', 'asdasd', 0, NULL),
(11, 'Dao Anh', 'chikon555@gmail.com', 'asdasd', 0, NULL),
(12, 'nguyễn thị thanh tâm', 'hongnhungnguyen28297@gmail.com', '12345q', 0, NULL),
(13, 'Tú', 'tudoi1540@gmail.com', 'Quangdai', 0, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `fk_dh_dhct` (`donhang_id`);

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
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `donhangchitiet`
--
ALTER TABLE `donhangchitiet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `donhangchitiet`
--
ALTER TABLE `donhangchitiet`
  ADD CONSTRAINT `fk_dh_dhct` FOREIGN KEY (`donhang_id`) REFERENCES `donhang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_cata_pro` FOREIGN KEY (`catalog_id`) REFERENCES `catalog` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
