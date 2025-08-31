-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th5 24, 2021 lúc 04:51 PM
-- Phiên bản máy phục vụ: 10.1.45-MariaDB
-- Phiên bản PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `bannerImage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bannerStatus` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `bannerImage`, `bannerStatus`) VALUES
(1, 'bannergiay17.jpg', 1),
(2, 'bannergiay28.jpg', 1),
(3, 'bannergiay18.jpg', 1),
(4, 'bannergiay19.jpg', 1),
(5, 'bannergiay20.jpg', 1),
(6, 'bannergiay21.jpg', 1),
(7, 'bannergiay25.jpg', 1),
(8, 'bannergiay22.jpg', 1),
(9, 'bannergiay23.jpg', 1),
(10, 'bannergiay2.jpg', 1),
(11, 'bannergiay11.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_list` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `style` tinyint(2) DEFAULT '0',
  `hangcosan` tinyint(2) DEFAULT '0',
  `parent` int(11) NOT NULL DEFAULT '0',
  `ctrl` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `catalog`
--

INSERT INTO `catalog` (`id`, `name`, `slug`, `image_list`, `description`, `style`, `hangcosan`, `parent`, `ctrl`) VALUES
(1, 'TRANG CHỦ', 'trang-chu', NULL, 'sản phẩm này siêu xịn ', 0, 0, 0, 'home'),
(2, 'SẢN PHẨM', 'san-pham', NULL, 'sản phẩm này siêu xịn ', 0, 0, 0, 'product'),
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
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` tinyint(2) DEFAULT NULL,
  `email` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `messeges` text COLLATE utf8_unicode_ci,
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
  `firstname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `housenumber` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` double DEFAULT NULL,
  `ngaydat` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `payments` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postcode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id`, `firstname`, `lastname`, `phone`, `email`, `address`, `street`, `housenumber`, `city`, `country`, `note`, `total`, `ngaydat`, `status`, `payments`, `postcode`) VALUES
(28, 'Dao Anh', '', '0394501430', 'daonhatanh630@gmail.com', '289/12 nguyễn thái sơn phường 5 gò vấp', NULL, NULL, NULL, NULL, 'giao nhanh cho e', 2181292, '2021-05-11', 0, NULL, NULL),
(29, 'tran quang nhan', '', '0924698776', 'tranquangnhan1606@gmail.com', 'dasdasds', NULL, NULL, NULL, NULL, 'asddasdsas', 2600000, '2021-05-19', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhangchitiet`
--

CREATE TABLE `donhangchitiet` (
  `id` int(11) NOT NULL,
  `donhang_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `name_product` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_product` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(5) DEFAULT NULL,
  `price` double DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhangchitiet`
--

INSERT INTO `donhangchitiet` (`id`, `donhang_id`, `product_id`, `name_product`, `img_product`, `size`, `color`, `quantity`, `price`) VALUES
(121, 28, 84, 'Jean nam gucci', '../uploads/52884260_2229255920671340_6206757264942956544_n.jpg', 'null', 'null', 4, 545323),
(122, 29, 122, 'Adidas Ultraboost 6.0', '../uploads/z2495459126009_44c16671533f973973650714d678ed0b.jpg', '44.5', '#xám', 2, 1300000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `catalog_id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `discount` int(2) DEFAULT '0',
  `image_list` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `buyed` int(11) DEFAULT NULL,
  `hot` tinyint(1) NOT NULL,
  `color` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cosan` tinyint(2) NOT NULL DEFAULT '0',
  `Brand` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `properties` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `catalog_id`, `name`, `slug`, `price`, `discount`, `image_list`, `view`, `buyed`, `hot`, `color`, `size`, `cosan`, `Brand`, `description`, `properties`) VALUES
(122, 7, 'Adidas Ultraboost 6.0', 'adidas-ultraboost-60-122', 1300000, 0, 'z2495459126009_44c16671533f973973650714d678ed0b.jpg', NULL, NULL, 0, '#xám', '44.5', 0, 'adidas-ultraview-0', '', ''),
(123, 7, 'Adidas Ultraboost 6.0', 'adidas-ultraboost-60-123', 1300000, 0, 'z2495459104264_1913d2a314338c33050f0ebced18bd38.jpg', NULL, NULL, 0, '#đen', '44,45', 0, 'adidas-ultraview-0', '', ''),
(124, 6, 'Adidas Ultraboost 6.0', 'adidas-ultraboost-60-124', 1300000, 0, 'z2495459122533_542f5388b0962694536c1b7ac58de47c.jpg', NULL, NULL, 0, '#đen', '42,43', 0, 'adidas-ultraview-0', '', ''),
(125, 6, 'Adidas Ultraboost 6.0', 'adidas-ultraboost-60-125', 1300000, 0, 'z2495459119700_3098ffa1837d0d834f847b54a6996bef.jpg', NULL, NULL, 1, '#đen', '41', 1, 'adidas-ultraview-1', '', ''),
(126, 6, 'Nike Air Max 270', 'nike-air-max-270-126', 1600000, 0, 'i1587228885_5654_0.jpg', NULL, NULL, 0, '#xám', '40,42,43', 0, 'nike-air-max-0', '', ''),
(127, 6, 'Nike Air Max 270', 'nike-air-max-270-127', 1600000, 0, 'i1587922734_5457_0.jpg', NULL, NULL, 0, '#đen', '37', 0, 'nike-air-max-0', '', ''),
(128, 6, 'Nike Air Max 270', 'nike-air-max-270-128', 1600000, 0, 'i1603819817_6505_0.jpg', NULL, NULL, 0, '#đen', '39,40', 0, 'nike-air-max-0', '', ''),
(129, 6, 'Nike Air Max 270', 'nike-air-max-270-129', 1600000, 0, 'i1586885559_5338_0.jpg', NULL, NULL, 0, '#tím', '38', 0, 'nike-air-max-0', '', ''),
(130, 6, 'Nike Air Max 270', 'nike-air-max-270-130', 1600000, 0, 'i1592416629_8738_0.jpg', NULL, NULL, 0, '#xám', '38.5,39', 0, 'nike-air-max-0', '', ''),
(131, 6, 'Nike Air Max 270', 'nike-air-max-270-131', 1600000, 0, 'i1607279689_5792_0.jpg', NULL, NULL, 0, '#đen', '39,40,41,42,43', 0, 'nike-air-max-0', '', ''),
(132, 6, 'Air Max 2090', 'air-max-2090-132', 1600000, 0, 'i1576603903_3726_0 (1).jpg', NULL, NULL, 0, '#xám', '39', 0, 'nike-air-max-0', '', ''),
(133, 6, 'Air Max 2090', 'air-max-2090-133', 1600000, 0, 'i1577644937_7738_0.jpg', NULL, NULL, 0, '#cam', '37.5', 0, 'nike-air-max-0', '', ''),
(134, 6, 'Air Max 2090', 'air-max-2090-134', 1600000, 0, 'i1591547687_844_0.jpg', NULL, NULL, 0, '#đen', '40,41,42.43', 0, 'nike-air-max-0', '', ''),
(139, 6, 'Air Max 2090', 'air-max-2090-139', 1600000, 0, 'i1587572738_4262_0.jpg', NULL, NULL, 0, '', '38,40', 0, 'nike-air-max-0', '', ''),
(140, 6, 'Air Max 2090', 'air-max-2090-140', 1600000, 0, 'i1588006252_1860_0.jpg', NULL, NULL, 0, '', '36.5,37.5,38,39,40', 0, 'nike-air-max-0', '', ''),
(141, 6, 'Air Max 2090', 'air-max-2090-141', 1600000, 0, 'i1588616564_5054_0.jpg', NULL, NULL, 0, '', '36', 0, 'nike-air-max-0', '', ''),
(142, 6, 'Air Max 2090', 'air-max-2090-142', 1600000, 0, 'i1589396355_3320_0.jpg', NULL, NULL, 0, '', '37,38,39,40', 0, 'nike-air-max-0', '', ''),
(143, 6, 'Nike Air Max 270', 'nike-air-max-270-143', 1600000, 0, 'i1588616680_5617_0.jpg', NULL, NULL, 0, '', '38,39,41', 0, 'nike-air-max-0', '', ''),
(146, 6, 'Ultraboost 7.0', 'ultraboost-70-146', 1500000, 0, 'z2497817305586_c5642a0ccc1906b9434cacf93f0a6698 (1).jpg,z2497817308761_d89eb5f61400184280337a659f8bb1f9 (1).jpg,z2497817326138_62fac20f907f160edad96b8ccb877076.jpg,z2497817329202_2b68b62857a2dcb9490c110a8fcb0047.jpg,z2497817318203_070b4c8bcdf3cb5ddc63f0db0c96a879.jpg,z2497817295865_9579b5a71ba623fca62ca801a2445708.jpg,z2497817299581_eb4dc227d93b35f9caccd64c19a19af0.jpg', NULL, NULL, 0, '', '36,36.5,37.5,38,38.5,39,40,40.5,41,42,42.5,43,44,4', 1, 'cac-dong-adidas-khac-1', '', ''),
(147, 6, 'Ultraboost 7.0', 'ultraboost-70-147', 1500000, 0, 'z2497816889891_9de5475ae94b63a2b7d79a0b24b2015c.jpg,z2497816897489_a59efa5c6e2e5f6be667dbc4fcca1449.jpg,z2497816902442_7e684017ef52bae2f7f462f5b558182c.jpg,z2497816905743_aeca3b2f1a79ebb32eb9cb8145492eee.jpg,z2497816910278_e52fb021ca44093f28df10e4144ff283.jpg,z2497816913718_6d062f83070ff43226df711855e8a633.jpg,z2497816916915_53da48b583df52f366f7d0ae12f2e061.jpg,z2497816922044_bcf195730476610611173c91ae4ca363.jpg', NULL, NULL, 0, '', '36,36.5,37.5,38,38.5,39,40,40.5,41,42,42.5,43,44,4', 1, 'cac-dong-adidas-khac-1', '', ''),
(148, 6, 'Ultraboost 7.0', 'ultraboost-70-148', 1500000, 0, 'z2497816195310_9a74e9337db2e1c5326ef0b5ffeddb2d.jpg,z2497816156406_867216853dc91845396072eacceb00eb.jpg,z2497816159576_192295e03b304cc656a8de6c0bbbe5b1.jpg,z2497816180634_57ed477e0c2938c711090881c26368d5.jpg,z2497816180651_bf5912cddaefe25f4173462ce4a0826b.jpg,z2497816194141_2e7e3983b70072570132e823861292e9.jpg', NULL, NULL, 0, '', '36,36.5,37.5,38,38.5,39,40,40.5,41,42,42.5,43,44,4', 1, 'cac-dong-adidas-khac-1', '', ''),
(149, 6, 'Ultraboost 7.0', 'ultraboost-70-149', 1500000, 0, 'z2497815775178_b78b16300d3d244b983876477a78daa7.jpg,z2497815779939_867216853dc91845396072eacceb00eb.jpg,z2497815750307_48af9df3451f976622ff336de029b836.jpg,z2497815754515_84359ea27dd916dc0be7f029fb4b97d8.jpg,z2497815763416_29d6548b84c7cb4c8ed0399db49ac402.jpg,z2497815770537_8b47b14f0f27e4ccebd5d3d3b3afc227.jpg', NULL, NULL, 0, '', '36,36.5,37.5,38,38.5,39,40,40.5,41,42,42.5,43,44,4', 1, 'cac-dong-adidas-khac-1', '', ''),
(150, 6, 'Ultraboost 7.0', 'ultraboost-70-150', 1500000, 0, 'z2497815452876_47f03ce374ef92b136db467b310fb433.jpg,z2497815415582_d31392eda50a942b95b9d22731f069c4.jpg,z2497815418569_1731e96413589f9b0c46cbd5a6e95f57.jpg,z2497815426077_2dd5d01561988f797eebb76f11b24de6.jpg,z2497815435437_4ff4a1f5cc365a5bbf19fb674be16ce9.jpg,z2497815446649_a9c75c750707e256e41eaf781dbb42f2.jpg', NULL, NULL, 0, '', '36,36.5,37.5,38,38.5,39,40,40.5,41,42,42.5,43,44,4', 1, 'cac-dong-adidas-khac-1', '', ''),
(151, 6, 'Ultraboost 7.0', 'ultraboost-70-151', 1500000, 0, 'z2497814525955_6ff6a9694ec86ea1ae4760bd27d762f8.jpg,z2497814488717_b6d009eb1b6d39ea407e31e688917018.jpg,z2497814501448_c7271a707474d446dbad73390b8f357b.jpg,z2497814501454_9b2f1cae8e8c5e341bf42fcc063a4538.jpg,z2497814525918_492061710f4a77454745c1d2509d4007.jpg,z2497814525949_f650f432e7000fbce6c986d6e504d3a4.jpg', NULL, NULL, 0, '', '36,36.5,37.5,38,38.5,39,40,40.5,41,42,42.5,43,44,4', 1, 'cac-dong-adidas-khac-1', '', ''),
(152, 6, 'Ultraboost 7.0', 'ultraboost-70-152', 1500000, 0, 'z2497813915380_f05fb6995b26502869844be421ef8546.jpg,z2497813878401_92632489a568716f57dfb236e6502e08.jpg,z2497813881778_e670894eefbcb7e7d73701b979d4e02c.jpg,z2497813887895_057124a7c2b70662c0c37ede2297c95b - Copy.jpg', NULL, NULL, 0, '', '36,36.5,37.5,38,38.5,39,40,40.5,41,42,42.5,43,44,4', 1, 'cac-dong-adidas-khac-1', '', ''),
(153, 6, 'Ultraboost 7.0', 'ultraboost-70-153', 1500000, 0, 'z2497774448910_d65d2a30f55dd0aff97f9a67f8d975c2.jpg,z2497774443505_df214b63be5a10f7ea1956fbf495ebb8.jpg,z2497774446204_e8b15737b0fdd33ca1a064dde2fe6248.jpg,z2497774453610_6324ba09e4267d72c7f03e6b3022f501.jpg,z2497774456813_38af321878b8e618ff89b78ffe27e9fc.jpg,z2497774433061_e9ae33504443bf011ac9b63de4ca0986.jpg', NULL, NULL, 0, '', '36,36.5,37.5,38,38.5,39,40,40.5,41,42,42.5,43,44,4', 1, 'cac-dong-adidas-khac-1', '', ''),
(154, 6, 'Ultraboost 7.0', 'ultraboost-70-154', 1500000, 0, 'z2497849370684_b07b9efc5c0c8ed6b0a31d6e2a094129.jpg,z2497849336850_769fc374691189cbe5640cc630b3127c.jpg,z2497849341010_2a76289ce701a30bfcaea0344499dcf5.jpg,z2497849345570_cf76046f4c8c001dbc77e11a4bdd8341.jpg,z2497849357312_cc3f2f4e54324395945784303a2e0366.jpg,z2497849364583_d955420a787812148e3e5be69232a245.jpg', NULL, NULL, 0, '', '36,36.5,37.5,38,38.5,39,40,40.5,41,42,42.5,43,44,4', 1, 'cac-dong-adidas-khac-1', '', ''),
(155, 6, 'Ultraboost 7.0', 'ultraboost-70-155', 1500000, 0, 'z2497849572633_7fc44a1e1d5b140bcbd5394be66fe9d4.jpg,z2497849535764_7abad089b221fb8d005ed4f97cb9b6d9.jpg,z2497849539953_addf210035c3fbb2f5f6f82a4916253e.jpg,z2497849546478_95cf1e6b0edf849806494a9a2a6769b5.jpg,z2497849555668_0f9e9d55fddaaaf53bfa46c5d521a4b0.jpg,z2497849568555_3e4da24e085cb521a792ee033cbe66ea.jpg', NULL, NULL, 0, '', '36,36.5,37.5,38,38.5,39,40,40.5,41,42,42.5,43,44,4', 1, 'cac-dong-adidas-khac-1', '', ''),
(156, 6, 'Ultraboost 7.0', 'ultraboost-70-156', 1500000, 0, 'z2497849754599_3be28375329df191a99d124f9ed4dede.jpg,z2497849760140_5f372fb0f03514d2972735488cfc533e.jpg,z2497849764354_037d3c8c1671f3aabb10b15913362c21.jpg,z2497849730507_f84ded518e46603318ee891e01aada60.jpg,z2497849737279_581d0ae80d7d86c87ffe6f64ee158ca6.jpg,z2497849746493_ee80272124217af45542886a482fd705.jpg', NULL, NULL, 0, '', '36,36.5,37.5,38,38.5,39,40,40.5,41,42,42.5,43,44,4', 1, 'cac-dong-adidas-khac-1', '', ''),
(157, 6, 'Ultraboost 7.0', 'ultraboost-70-157', 1500000, 0, 'z2497850111253_4b40e2cb28fad44568f103c1a974cb78.jpg,z2497850114222_c12b2a99f4587b111f30323cba057cb9.jpg,z2497850135161_6343a841d3e1e4588ce8b3903b8e1869.jpg,z2497850105068_d82c82031182664fb7d78d89c23e4d63.jpg', NULL, NULL, 0, '', '36,36.5,37.5,38,38.5,39,40,40.5,41,42,42.5,43,44,4', 1, 'cac-dong-adidas-khac-1', '', ''),
(159, 6, 'Ultraboost 7.0', 'ultraboost-70-159', 1500000, 0, 'z2497851207845_536d4dfad4ff80ca1d2476ef9d31c084.jpg,z2497851176594_88328725db045db14f6aa4bc5307e7a2.jpg,z2497851181977_8e8b19d79fc5b34b2a5ec140adda2606.jpg,z2497851186890_7017b89bbe88025cf05726fa76283323.jpg,z2497851194532_4e134abf034d8da67d99033772ddbc1a.jpg,z2497851204156_f25025510ab2575eaf035a9724ea1272.jpg', NULL, NULL, 0, '', '36,36.5,37.5,38,38.5,39,40,40.5,41,42,42.5,43,44,4', 1, 'cac-dong-adidas-khac-1', '', ''),
(160, 6, 'Ultraboost 7.0', 'ultraboost-70-160', 1500000, 0, 'z2497851479437_e95c8085b78ca34f7d82457db4c95f68.jpg,z2497851487422_d05729b5c389a9399a5b141230701c7b.jpg,z2497851491078_5c702ecbd9dd4cb9f1da3021ff1afc0c.jpg,z2497851467726_f6d50c1d0eacb34650103881ad4d6cd5.jpg,z2497851471551_c309857b0dd1e4b5e9636adfdd9f1b5a.jpg', NULL, NULL, 0, '', '36,36.5,37.5,38,38.5,39,40,40.5,41,42,42.5,43,44,4', 1, 'cac-dong-adidas-khac-1', '', ''),
(161, 6, 'Ultraboost 7.0', 'ultraboost-70-161', 1500000, 0, 'z2497851743891_01d36be8fe8b9f50096a42b9a9b35c9b.jpg,z2497851721728_863a7e673a6c0fe2703ba0aa7ffab998.jpg,z2497851724619_a73ae59cc6ba4f1d1db3411710980fa8.jpg,z2497851734998_234e794d94a9bc95e4cffbfd05533ada.jpg', NULL, NULL, 0, '', '36,36.5,37.5,38,38.5,39,40,40.5,41,42,42.5,43,44,4', 1, 'cac-dong-adidas-khac-1', '', ''),
(162, 6, 'Nike Joyride CC3 Setter', 'nike-joyride-cc3-setter-162', 1500000, 0, 'z2497942886596_cb56edc583462651da583340f484dfa6.jpg,z2497942892054_c054bb5cdd3239f0d6693645b9798a70 (1).jpg,z2497942868348_3f7495472ad721f3f53e25e0d902c969.jpg,z2497942877510_e3cdc090cf41b06c649d7a7451903c37.jpg,z2497942879393_34ab3b3b6f38e5b3fc9f09c0ba54270e.jpg', NULL, NULL, 0, '', '44', 0, 'adidas-ultraview-0', '', ''),
(163, 6, 'Nike Joyride CC3 Setter', 'nike-joyride-cc3-setter-163', 1500000, 0, 'z2497942015033_76da3c2a0f38ea0d3147abbfecc2eb3e.jpg,z2497941989043_366f9ab393b2b865a8e40c56fa12f5e9.jpg,z2497941996831_bc52a280766712f1a9fd56cbdacaeafd.jpg,z2497942000372_68877dd5adb0f7957ee97010c9c537cb.jpg,z2497942004682_78e201e4c454fad5dcbc40dbaa01b5f1.jpg,z2497942010856_d35417e800ee61d4866d204acbff34c2.jpg', NULL, NULL, 0, '', '43', 0, 'adidas-ultraview-0', '', ''),
(164, 6, 'Nike Joyride CC3 Setter', 'nike-joyride-cc3-setter-164', 1500000, 0, 'z2497965619220_43c03857e34569e81187a63501b4624b.jpg,z2497965626729_2cd5cfd3f9c1ad2d11383c27215c31f5.jpg,z2497965608006_6eca8f04cebc0649d5f9f16847f89975.jpg,z2497965614186_744920f78644b03c68be1bd1d36335da.jpg', NULL, NULL, 0, '', '42,42.5,43', 0, 'adidas-ultraview-0', '', ''),
(165, 6, 'Nike Joyride', 'nike-joyride-165', 1200000, 0, 'z2497994467140_bb7460c09be8919ed61111c6ca045ead (1).jpg', NULL, NULL, 0, '', '36,37.5,40,41,42,43,44', 0, 'adidas-ultraview-0', '', ''),
(166, 6, 'Nike Joyride', 'nike-joyride-166', 1200000, 0, 'z2497994467178_6a156ab1c318998ba20034d7833d9d7a (1).jpg', NULL, NULL, 0, '', '40,41,42,43', 0, 'adidas-ultraview-0', '', ''),
(167, 6, 'Nike Joyride', 'nike-joyride-167', 1200000, 0, 'z2497994473698_e7743298a0c71a7f39bb098dc7355e43 (1).jpg', NULL, NULL, 0, '', '40,41,42,43', 0, 'adidas-ultraview-0', '', ''),
(168, 6, 'Nike Joyride', 'nike-joyride-168', 1200000, 0, 'z2497994437752_af05f5c258b3fd27ab830f1ef7458234.jpg', NULL, NULL, 0, '', '40,41,42,43', 0, 'adidas-ultraview-0', '', ''),
(169, 6, 'Nike Joyride', 'nike-joyride-169', 1200000, 0, 'z2497994442443_22eb0aa21ab3d2a6da7357359bbebc82.jpg', NULL, NULL, 0, '', '37.5,38,39', 0, 'adidas-ultraview-0', '', ''),
(170, 6, 'Nike Joyride', 'nike-joyride-170', 1200000, 0, 'z2497994448471_251c93e2e8cadb32a60bbd5a7a05be6c.jpg', NULL, NULL, 0, '', '37.5,38', 0, 'adidas-ultraview-0', '', ''),
(171, 6, 'Nike Joyride', 'nike-joyride-171', 1200000, 0, 'z2497994452883_320c92395c97464da841040ecae92bfe.jpg', NULL, NULL, 0, '', '37,38', 0, 'adidas-ultraview-0', '', ''),
(172, 6, 'Nike Joyride', 'nike-joyride-172', 1200000, 0, 'z2497994457698_cf40fd281d937912ac00af648fdf73bc (1).jpg', NULL, NULL, 0, '', '37.5,38', 0, 'adidas-ultraview-0', '', ''),
(173, 6, 'Nike Joyride', 'nike-joyride-173', 1200000, 0, 'z2498137068234_372fc0136649df06973dc806316b02d9.jpg', NULL, NULL, 0, '', '37.5,38', 0, 'adidas-ultraview-0', '', ''),
(174, 6, 'Nike Air Zoom Winflo 6', 'nike-air-zoom-winflo-6-174', 1300000, 0, 'z2498169246896_83f3557f84da01e057c019e439876f88.jpg,z2498169255605_c9ba9295041d3a55ca6c876a76068d2a.jpg,z2498169246895_5b769f8b6d344414eb78afbc1f0863e9.jpg', NULL, NULL, 0, '', '42', 0, 'adidas-ultraview-0', '', ''),
(175, 6, 'Nike Air Zoom Winflo 6', 'nike-air-zoom-winflo-6-175', 1300000, 0, 'z2498168438933_f270d7da7bad2b49f56bb6b87096ccfe.jpg,z2498168442431_a83145f3ed2bb9ca379c6c5d1b720353.jpg,z2498168447156_206e7e6c53e8c611a62d3b8e57dea560.jpg', NULL, NULL, 0, '', '37.5,42.5,43', 0, 'adidas-ultraview-0', '', ''),
(176, 6, 'Nike Air Zoom Winflo 7', 'nike-air-zoom-winflo-7-176', 1500000, 0, 'z2498162484220_1f22d1e42e175ba9b6c30aa04d390231.jpg,z2498162487129_2db51278bdfdd94ce565f2121446316a.jpg,z2498162490914_1319b19e52371bc83a40aeec447016e6.jpg,z2498162505062_167086e47c2bd932378ba3be2f672594.jpg', NULL, NULL, 0, '', '36.5,37.5,38,39', 0, 'adidas-ultraview-0', '', ''),
(177, 6, 'Nike Alpha Next %', 'nike-alpha-next-177', 1700000, 0, 'z2498162149010_ef276ac3b862f13d487ce12a15958319.jpg,z2498162121465_c349cc30e542a51f7feb060259ca9b5f.jpg,z2498162125287_7c6b74cd40b478caf1a6f7d081c47b64.jpg,z2498162129930_f4bdcffe37ca79d20f869bc58f00d3dc.jpg,z2498162135582_9d6a4746591080f2dbd29e53d239e3da.jpg,z2498162144987_cfe7dcba9773df8612eebb0a315ba255.jpg', NULL, NULL, 0, '', '39', 0, 'adidas-ultraview-0', '', ''),
(178, 6, 'Nike Air Zoom Winflo 7', 'nike-air-zoom-winflo-7-178', 1500000, 0, 'z2498161773488_23c390ca2627582f19a1f49b4e06f4f5.jpg,z2498161778230_9d376ea9097c73742ce9195e7b1d06b2.jpg,z2498161781565_74d4a7df65369bd464c0516974c29604.jpg,z2498161786670_cce86480a898fd4ed8860ed0abfa9b0a.jpg,z2498161792078_303187a9db168789f05ce305573597be.jpg', NULL, NULL, 0, '', '41,42,43', 0, 'adidas-ultraview-0', '', ''),
(179, 6, 'adidas ZX500  boost', 'adidas-zx500-boost-179', 1300000, 20, 'z2498193380332_29f5b8fd77da6385cf1616fd49ef7d2d.jpg,z2498193359557_12cd3976322c32c9c97a1520d73edbad.jpg,z2498193363039_e695d9652b87af86f0f1ea2a2f191a05.jpg,z2498193368506_f443e1c2d62b6d6bb8ac5d940c2de114.jpg,z2498193373187_d85b35b9d134ff1dd44bcdb01c49b539.jpg,z2498193377491_17169cb3bc93238b5778a29db1e0e80b.jpg', NULL, NULL, 0, '', '42.5,43', 1, 'cac-dong-adidas-khac-1', '', ''),
(180, 6, 'Adidas Senseboost Go', 'adidas-senseboost-go-180', 1300000, 10, 'z2498199282528_0892987f85846f8dddfcc4804f058815.jpg,z2498199285849_87a84876ad7480cd55947579f5592650 (1).jpg,z2498199289144_efbd05495042e4741932619c388745fd.jpg,z2498199293697_fd2d16cb2f0218e31ce09f927475e3b2 (1).jpg,z2498199273845_2e22004d8e956fe9b9f27244a1f3e948.jpg,z2498199276514_ff2a75babb6f1171f588813bb75ad73a.jpg', NULL, NULL, 0, '', '42.5,43,44', 1, 'cac-dong-adidas-khac-1', '', ''),
(181, 6, 'Ultraboost 4.0', 'ultraboost-40-181', 1200000, 0, 'z2498206680764_ca6c4faa19de1d91ef7d95527080b37b.jpg,z2498206703741_9f659d9ad0a3276771a43a3b9b17db73.jpg,z2498206703751_6d9f4ce0753a4e087671e851a057119b.jpg,z2498206703795_6cb6fb5ca24dcefe8a94761631530efe.jpg', NULL, NULL, 0, '', '41', 1, 'cac-dong-adidas-khac-1', '', ''),
(182, 6, 'Ultraboost 4.0', 'ultraboost-40-182', 1200000, 0, 'z2498206906834_6636fb2f89de71f3970d92791385ffb4.jpg,z2498206911069_85cd8c2a14104d404a246f52e9626f61.jpg,z2498206914896_ff874e0e6d7ce00ce0ea3da8af163e84.jpg,z2498206904867_26271246093c887fc3757555679070b2.jpg', NULL, NULL, 0, '', '41,42,43', 1, 'cac-dong-adidas-khac-1', '', ''),
(183, 6, 'Alphabounce beyond', 'alphabounce-beyond-183', 1000000, 0, 'z2498214369370_c45116e7d8a57e46d488702e54b666e3.jpg,z2498214197992_03baf8e5943168d7fde772e9354f3ef3.jpg,z2498214200960_d1dad05807ea35831439172cb24e677d.jpg,z2498214206100_ad7a321ceba878c3d95bed277d98a22b.jpg', NULL, NULL, 0, '', '43,44,45', 1, 'cac-dong-adidas-khac-1', '', ''),
(184, 6, 'Alphabounce beyond', 'alphabounce-beyond-184', 1000000, 0, 'z2498214773287_6be4b1b7fa3d9719363e097e092f28f5.jpg,z2498214780276_11bb3ceb661b345e6ee142c529f748d0.jpg,z2498214780278_dcdd3195b3231926e08a661e3445d53a (1).jpg,z2498214773287_6be4b1b7fa3d9719363e097e092f28f5 (1).jpg,z2498214780276_11bb3ceb661b345e6ee142c529f748d0 (1).jpg', NULL, NULL, 0, '', '43', 1, 'cac-dong-adidas-khac-1', '', ''),
(185, 6, 'Alphabounce beyond', 'alphabounce-beyond-185', 1000000, 0, 'z2498214760309_b4b4fc4f6dae5f5b04774a893fbf1379.jpg,z2498214765334_3aed8191e9b05f930af55bf7e27549fa.jpg,z2498214768960_071248f36c45875c4fba8326ff393558.jpg', NULL, NULL, 0, '', '42', 1, 'cac-dong-adidas-khac-1', '', ''),
(186, 6, 'Adidas MND R1', 'adidas-mnd-r1-186', 900000, 0, '3048d7e41acb53c9f1086d7d9853d0ad.webp', NULL, NULL, 0, '', '40,42', 1, 'cac-dong-adidas-khac-1', '', ''),
(187, 6, 'Nike Cortez', 'nike-cortez-187', 800000, 0, 'z2498236632590_6d60b09638722c324d6f03ed5a43b2e3.jpg', NULL, NULL, 0, '', '37.5,38,38.5', 0, 'adidas-ultraview-0', '', ''),
(188, 6, 'Nike Cortez', 'nike-cortez-188', 800000, 0, 'z2498236635978_37f39910f62b6964ee81aab2a3e8c948.jpg', NULL, NULL, 0, '', '42,43,44', 0, 'adidas-ultraview-0', '', ''),
(189, 6, 'Nike airmax 97', 'nike-airmax-97-189', 1300000, 0, 'z2498248160376_9975eb13865888b89e47761dfc321d5e.jpg', NULL, NULL, 0, '', '37.5,38,39', 1, 'nike-air-max-1', '', ''),
(190, 6, 'Nike airmax 97', 'nike-airmax-97-190', 1000000, 0, 'z2498248176977_604aeb5f8872f4ff5c92c9418df37fdb.jpg', NULL, NULL, 0, '', '38', 1, 'nike-air-max-1', '', ''),
(191, 8, 'MCM{5716}', 'mcm5716-191', 1500000, 0, 'z2498266646052_102d25830497529de1889184e96200b8.jpg,z2498266650035_09adb76a96fbf0387bdaca58408e2e7f.jpg,z2498266655162_c749c764d0ea482f6798b7fcf9241083.jpg,z2498266623448_47146b4a04f31d92b0fd98e55be5fb52.jpg,z2498266626534_416dfefc207e59695376d9293085d583.jpg,z2498266629445_8947309626707a971020d4f1f47559dc.jpg,z2498266632165_4d35a06ca24b29e91b4d46b01164f216.jpg,z2498266636469_9d8091db77a73dd353864eac218e7ce2.jpg,z2498266640864_cce9145fa70ff1f78a6cee837258e7e6.jpg', NULL, NULL, 0, '#000,#CCC,#FFF', 'S,L,M,XL', 1, 'adidas-ultraview-1', '<p><img alt=\"yes\" src=\"http://webofnhan.tk/lib/ckeditor/plugins/smiley/images/thumbs_up.png\" style=\"height:23px; width:23px\" title=\"yes\" />&nbsp;SIZE S - 17x21x9cm<br />\r\n<img alt=\"yes\" src=\"http://webofnhan.tk/lib/ckeditor/plugins/smiley/images/thumbs_up.png\" style=\"height:23px; width:23px\" title=\"yes\" />&nbsp;SIZE M - 21x27x10cm<br />\r\n<img alt=\"yes\" src=\"http://webofnhan.tk/lib/ckeditor/plugins/smiley/images/thumbs_up.png\" style=\"height:23px; width:23px\" title=\"yes\" />&nbsp;SIZE L - 26x33x13cm<br />\r\n<img alt=\"yes\" src=\"http://webofnhan.tk/lib/ckeditor/plugins/smiley/images/thumbs_up.png\" style=\"height:23px; width:23px\" title=\"yes\" /> SIZE XL - 33x41x15cm</p>\r\n', ''),
(192, 6, 'Yeezy Boost 350 V2 \'Yecheil-Reflective\'', 'yeezy-boost-350-v2-yecheilreflective-192', 0, 0, '73ad733e.jpg,42de518f.jpg,4d61a365.jpg,72edc675.jpg,55a9fc5e.jpg', NULL, NULL, 0, '', '36,36.5,37.5,38,38.5,39,40,40.5,41,42,42.5,43,44,4', 1, 'yeezy-350-v2-1', '', ''),
(193, 6, 'Yeezy Boost 350 V2 \'Cinder-Reflective\'', 'yeezy-boost-350-v2-cinderreflective-193', 0, 0, 'b3d0f6a1.jpg,b306948e.jpg,51bd5f91.jpg,58521045.jpg,7c3af4c0.jpg,29140abe.jpg', NULL, NULL, 0, '', '36,36.5,37.5,38,38.5,39,40,40.5,41,42,42.5,43,44,4', 1, 'yeezy-350-v2-1', '', ''),
(194, 6, 'Yeezy Boost 350 V2', 'yeezy-boost-350-v2-194', 0, 0, '31d5becb.jpg,19df30bb.jpg,65742767.jpg,29e1de3f.jpg,ed41586c.jpg', NULL, NULL, 0, '', '36,36.5,37.5,38,38.5,39,40,40.5,41,42,42.5,43,44,4', 1, 'yeezy-350-v2-1', '', ''),
(195, 6, 'Yeezy Boost 350 V2 \'Israfil\'', 'yeezy-boost-350-v2-israfil-195', 0, 0, 'a6fb460a.jpg,18562a60.jpg,fc82d9ca.jpg,4153a33e.jpg,2cfd3342.jpg', NULL, NULL, 0, '', '36,36.5,37.5,38,38.5,39,40,40.5,41,42,42.5,43,44,4', 1, 'yeezy-350-v2-1', '', ''),
(196, 6, 'Yeezy 700 V3 \'Alvah\'', 'yeezy-700-v3-alvah-196', 0, 0, 'abac8fb0.jpg,ccc4f4d0.jpg,c614b870.jpg,dca8ac61.jpg,ddd705c1.jpg', NULL, NULL, 0, '', '36,36.5,37.5,38,38.5,39,40,40.5,41,42,42.5,43,44,4', 1, 'yeezy-700-v3-1', '', ''),
(197, 6, 'Yeezy Boost 350 V2 \'Cloud White Non\'', 'yeezy-boost-350-v2-cloud-white-non-197', 0, 0, '0905e072.jpg,e43f5b8f.jpg,05cb39fd.jpg,931dd3c6.jpg,12c64977.jpg,ceb678dc.jpg,65333eff.jpg', NULL, NULL, 0, '', '36,36.5,37.5,38,38.5,39,40,40.5,41,42,42.5,43,44,4', 1, 'yeezy-350-v2-1', '', ''),
(198, 6, 'Yeezy Boost 350 V2 \'Carbon\'', 'yeezy-boost-350-v2-carbon-198', 0, 0, '1158ec99.jpeg,ee080d34.jpeg,467d0d91.jpeg,a16313af.jpeg,619c04ac.jpeg', NULL, NULL, 0, '', '36,36.5,37.5,38,38.5,39,40,40.5,41,42,42.5,43,44,4', 1, 'yeezy-350-v2-1', '', ''),
(199, 6, 'Nike Air Force 280', 'nike-air-force-280-199', 1000000, 0, '', NULL, NULL, 0, '', '', 1, 'adidas-ultraview-1', '', ''),
(201, 6, 'Nike Air Max 2020', 'nike-air-max-2020-201', 1000000, 0, '', NULL, NULL, 0, '', '', 1, 'adidas-ultraview-1', '', ''),
(205, 6, 'Nike Air Max 2021', 'nike-air-max-2021-205', 1000000, 0, '', NULL, NULL, 0, '', '', 1, 'adidas-ultraview-1', '', ''),
(206, 6, 'Nike Air Max 2022', 'nike-air-max-2022-206', 2000000, 0, '', NULL, NULL, 0, '', '', 1, 'nike-air-max-1', '', ''),
(207, 6, '\'Mismatched - Purple Magenta\' DJ4342 400', 'mismatched-purple-magenta-dj4342-400-207', 0, 0, 'z2509632485225_3e5e2e4168e19e59f6cfbf639ef9c4ec.jpg,z2509632495049_25112fe99542a0a67c4da2d9c78c3ed9.jpg,z2509632496975_0304f5a2cf6c19cbc721f99d1741f46b.jpg,z2509632502743_11a2fd89ff28517299ea6daa32eea8a5 (1).jpg,z2509632503751_c59a53e18afc67a65668c546cfaaa45b (1).jpg,z2509632512853_fef9c61bedab6ac344716d6bd6c4e09e (1).jpg,z2509632517207_fa086ccd348da2e41c55c7e7f47a3f41 (1).jpg', NULL, NULL, 0, '', '36,36.5,37.5,38,38.5,39', 1, 'air-jordan-1-low-1', '', ''),
(208, 6, '\'Smoke Grey\' 554724 092', 'smoke-grey-554724-092-208', 0, 0, 'z2509639679194_b850ac565d7d2ea5667ea9495cd432cb.jpg,z2509639685365_ed8a3d728d35e90df7db2b058cb94a16.jpg,z2509639688814_e434ae2e2eb6ba1f537491915527f046.jpg,z2509639690524_8f8dc049508c4a4d19b6018f142708f9.jpg,z2509639693371_555ff83f6c02cede78e74b82edc717e3.jpg,z2509639660586_b3edab7f0351d12f784d40b72b24ec9a.jpg,z2509639669389_03e98cbb86551fce9d672ec47e62bc63.jpg,z2509639677009_cd376dfeace7a67bf6af52e56b322816.jpg', NULL, NULL, 0, '', '36,36.5,37.5,38,38.5,39,40,40.5,41,42,42.5,43,44,4', 1, 'air-jordan-1-mid-1', '', ''),
(209, 6, '\'Shadow 2.0\' 575441 035', 'shadow-20-575441-035-209', 0, 0, 'z2509647968994_2aaba822d7e46b686507b855981063a2 (1).jpg,z2509647928592_b19ab20181512c95195b89be928d355b.jpg,z2509647933953_8d60cadf3d16419dce924d8ea96db43a.jpg,z2509647940730_155cb2768824b38090c07f94617f0450.jpg,z2509647948576_6f649e12109540c071ad294a2c9e0606.jpg,z2509647951735_e8418f56f114f6d334fe9b92e88e6973.jpg,z2509647954648_d95e0f5116d00520fd3a3dea9836357f.jpg,z2509647958266_204ff5a6fa356e127e7f3dcfd92f774c.jpg,z2509647959557_fecda8b66c341c4e7eb7bfc422648c76.jpg', NULL, NULL, 0, '', '36,36.5,37.5,38,38.5,39,40,40.5,41,42,42.5,43,44,4', 1, 'air-jordan-1-retro-high-1', '', ''),
(210, 6, '\'University Blue\' 408452 400', 'university-blue-408452-400-210', 0, 0, 'z2509652562939_c35795380689ed3c89cfd63b26e22152.jpg,z2509652571202_1b97640191aa7c9054d8b5672a39002e.jpg,z2509652526373_b445a24a85f54ae23bd8ef6a4c9f6451.jpg,z2509652529711_fe29051a5bc90d4ef0a674d45953abc5.jpg,z2509652536666_f97ec8ebc557e882f263640d75bdb977.jpg,z2509652542051_795f32f501901028e4c937850b125882.jpg,z2509652547393_410eafe1f32d97a00cf89c3bea7e3b16.jpg,z2509652548789_825c4893356ed96c19ec4d3f6ddb4595.jpg,z2509652558373_358a364393c9f866a3add004aaff1e7f.jpg', NULL, NULL, 0, '', '36,36.5,37.5,38,38.5,39,40,40.5,41,42,42.5,43,44,4', 1, 'air-jordan-456-jordan-khac-1', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`idUser`, `name`, `email`, `pass`, `role`) VALUES
(1, 'nhat anh 1', 'daonhatanh630@gmail.com', 'asdasd', 1),
(4, 'nhan', 'tranquangnhan1606@gmail.com', '111111', 1),
(10, 'Dao Nhat Anh', 'anhdnps12765@fpt.edu.vn', 'asdasd', 0),
(11, 'Dao Anh', 'chikon555@gmail.com', 'asdasd', 0),
(12, 'nguyễn thị thanh tâm', 'hongnhungnguyen28297@gmail.com', '12345q', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `donhangchitiet`
--
ALTER TABLE `donhangchitiet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
