-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2024 at 10:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `woodify`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'adr3822@gmail.com', '1234567');

-- --------------------------------------------------------

--
-- Table structure for table `cart_table`
--

CREATE TABLE `cart_table` (
  `id` int(11) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_price` decimal(10,2) NOT NULL,
  `prod_image` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `tax` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_table`
--

INSERT INTO `cart_table` (`id`, `session_id`, `prod_name`, `prod_price`, `prod_image`, `qty`, `tax`) VALUES
(1, 'vlc9722nhgiqi0osllmspbc9lc', 'Bed4 ', 16000.00, 'pic/bd4.jpg', 1, 2.5),
(2, 'vlc9722nhgiqi0osllmspbc9lc', 'Cup holder ', 13000.00, 'pic/product4.jpg', 1, 2.5),
(3, 'hde3nam3p91ik2mo3287bdrebe', 'White Vase ', 15000.00, 'pic/product1.jpg', 2, 2.5),
(4, 'hde3nam3p91ik2mo3287bdrebe', 'Arm chair3 ', 10000.00, 'pic/am3.jpg', 2, 2.5),
(5, 'j62u1p7ste8d9r7oneo536b312', 'Bed2 ', 18000.00, 'pic/bd2.jpg', 1, 2.5),
(6, 'j62u1p7ste8d9r7oneo536b312', 'Read Chair ', 17000.00, 'pic/product8.jpg', 2, 2.5),
(7, 'm0mgqs4isdsdfs949lgit2htrr', 'White Vase ', 8000.00, 'pic/product5.jpg', 1, 2.5),
(8, 'm0mgqs4isdsdfs949lgit2htrr', 'Bed2 ', 18000.00, 'pic/bd2.jpg', 2, 2.5),
(9, 'ud92uh0o3884ha0og91hei2b7k', 'White Vase ', 8000.00, 'pic/product5.jpg', 2, 2.5),
(10, 'ud92uh0o3884ha0og91hei2b7k', 'Read Chair ', 17000.00, 'pic/product8.jpg', 2, 2.5),
(11, 'hde3nam3p91ik2mo3287bdrebe', 'Neon light ', 5000.00, 'pic/product2.jpg', 1, 2.5),
(12, 'cg1s2q4b2p70oavg04najuql9b', 'Gray Sofa ', 18000.00, 'pic/product6.jpg', 2, 2.5),
(13, 'cg1s2q4b2p70oavg04najuql9b', 'Bed3 ', 10000.00, 'pic/bd3.jpg', 2, 2.5),
(14, 'l96duok09he8bg20lqk2jn4duk', 'White Vase ', 15000.00, 'pic/product1.jpg', 2, 2.5),
(15, 'l96duok09he8bg20lqk2jn4duk', 'Arm chair3 ', 10000.00, 'pic/am3.jpg', 2, 2.5),
(16, '7s6aapa5ecups7m6m3edmkc1s5', 'White Vase ', 15000.00, 'pic/product1.jpg', 1, 2.5),
(17, 'dpjho4mvgv2jv3u5j9t1id86q4', 'White Vase ', 8000.00, 'pic/product5.jpg', 1, 2.5),
(18, '7s6aapa5ecups7m6m3edmkc1s5', 'Bed2 ', 18000.00, 'pic/bd2.jpg', 1, 2.5),
(19, '7s6aapa5ecups7m6m3edmkc1s5', 'Read Chair ', 17000.00, 'pic/product8.jpg', 1, 2.5),
(20, '7s6aapa5ecups7m6m3edmkc1s5', 'Arm chair3 ', 10000.00, 'pic/am3.jpg', 1, 2.5),
(21, 'i7kc9l7s0g88m01j84dt31clai', 'Cup holder ', 13000.00, 'pic/product4.jpg', 1, 2.5),
(22, 'c31j27o8lq5i4ks2k1aasji0ph', 'White Vase ', 15000.00, 'pic/product1.jpg', 1, 2.5),
(23, 'hcoru2vmj4ad3tc31mqbrg3q72', 'Gray Sofa ', 18000.00, 'pic/product6.jpg', 2, 2.5),
(24, '73ar9j5soo84qe3b0dbda86k2t', 'Gray chair ', 12000.00, 'pic/product3.jpg', 1, 2.5),
(25, '73ar9j5soo84qe3b0dbda86k2t', 'Read Chair ', 17000.00, 'pic/product8.jpg', 2, 2.5),
(26, '73ar9j5soo84qe3b0dbda86k2t', 'Baby Chair ', 12000.00, 'pic/product7.jpg', 2, 2.5),
(27, '29q8vl143lat7i2ruu5l71pdir', 'Read Chair ', 17000.00, 'pic/product8.jpg', 1, 2.5),
(28, '29q8vl143lat7i2ruu5l71pdir', 'Cup holder ', 13000.00, 'pic/product4.jpg', 1, 2.5),
(29, '80qip4nvsfie6ru8lifnjqkd4o', 'Read Chair ', 17000.00, 'pic/product8.jpg', 1, 2.5),
(30, '185rl3ql80ctm7fjr92198bl9d', 'Read Chair ', 17000.00, 'pic/product8.jpg', 1, 2.5),
(31, '9sferggnpvpnhn0vi49gunjgjk', 'Cup holder ', 13000.00, 'pic/product4.jpg', 1, 2.5),
(32, '9sferggnpvpnhn0vi49gunjgjk', 'White Vase ', 8000.00, 'pic/product5.jpg', 2, 2.5),
(33, '9v70ocijbkv446jmnhusur983p', 'Cup holder ', 13000.00, 'pic/product4.jpg', 1, 2.5),
(34, 'taf61n12h5pa0l3fjoltoqmku1', 'Baby Chair ', 12000.00, 'pic/product7.jpg', 1, 2.5),
(35, 'taf61n12h5pa0l3fjoltoqmku1', 'White Vase ', 8000.00, 'pic/product5.jpg', 1, 2.5),
(36, 'bvt2j98ka5og0q8mrjb27d5csp', 'Read Chair ', 17000.00, 'pic/product8.jpg', 1, 2.5),
(37, 'bvt2j98ka5og0q8mrjb27d5csp', 'White Vase ', 8000.00, 'pic/product5.jpg', 1, 2.5),
(38, '0e3hi37k6ac5nl9hhp7cnigcqd', 'Read Chair ', 17000.00, 'pic/product8.jpg', 1, 2.5),
(39, '5o8l91ttbi6fbe0kif5hqmnb5q', 'White Vase ', 8000.00, 'pic/product5.jpg', 1, 2.5),
(40, '5o8l91ttbi6fbe0kif5hqmnb5q', 'Cup holder ', 13000.00, 'pic/product4.jpg', 1, 2.5),
(41, 'tdat29i84l6c294pvoap6knv0f', 'Cup holder ', 13000.00, 'pic/product4.jpg', 1, 2.5),
(42, 'tdat29i84l6c294pvoap6knv0f', 'Read Chair ', 17000.00, 'pic/product8.jpg', 1, 2.5),
(43, 'l7quesae9u0v6oqqcd96l43g01', 'Bed6 ', 16000.00, 'pic/cr6.jpg', 1, 2.5);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_slug` varchar(255) NOT NULL,
  `cat_image` varchar(255) NOT NULL,
  `cat_desc` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_slug`, `cat_image`, `cat_desc`) VALUES
(1, 'Chair', 'chairs.php', 'pic/chair4.jpg', 'Chair category'),
(2, 'Bed', 'beds.php', 'pic/bedd.jpg', 'beds category'),
(3, 'Arm chair', 'armchair.php', 'pic/chair2.jpg', 'Arm chair category'),
(4, 'Couch', 'couches.php', 'pic/couch.jpg', 'couch category'),
(5, 'Decoration', 'index.php', 'No Image', ''),
(6, 'Lightning', 'index.php', 'No Image', ''),
(7, 'Furniture', 'index.php', 'No Image', ''),
(8, 'New Stock', 'newstock.php', 'No Image', 'new stock');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`) VALUES
(1, 'raza', 'raza@gmail.com', 'order not deliver yet'),
(2, 'ayesha', 'ayesha@gmail.com', 'password not change after reset');

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_price` varchar(255) NOT NULL,
  `prod_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`id`, `prod_id`, `session_id`, `prod_name`, `prod_price`, `prod_image`) VALUES
(1, 25, '', 'White Vase', '15000', 'pic/product1.jpg'),
(2, 26, '', 'Neon light', '5000', 'pic/product2.jpg'),
(4, 29, '', 'White Vase', '8000', 'pic/product5.jpg'),
(5, 28, 'p6a8j9364vfhv4267plhi2e2i1', 'Cup holder', '13000', 'pic/product4.jpg'),
(6, 7, 'p6a8j9364vfhv4267plhi2e2i1', 'Bed3', '10000', 'pic/bd3.jpg'),
(7, 32, 'p6a8j9364vfhv4267plhi2e2i1', 'Read Chair', '17000', 'pic/product8.jpg'),
(8, 25, '40blk2g10nabva71s0q5uiosem', 'White Vase', '15000', 'pic/product1.jpg'),
(9, 28, '40blk2g10nabva71s0q5uiosem', 'Cup holder', '13000', 'pic/product4.jpg'),
(10, 32, 'ml83sv7vpvct28s2gaaenek8vl', 'Read Chair', '17000', 'pic/product8.jpg'),
(11, 30, 'ml83sv7vpvct28s2gaaenek8vl', 'Gray Sofa', '18000', 'pic/product6.jpg'),
(12, 25, 'lqub634g8knvl3cirfu7799a3v', 'White Vase', '15000', 'pic/product1.jpg'),
(13, 32, 'lqub634g8knvl3cirfu7799a3v', 'Read Chair', '17000', 'pic/product8.jpg'),
(14, 28, 's9ugo5kjv2lothte0noiclmg6o', 'Cup holder', '13000', 'pic/product4.jpg'),
(15, 31, 's9ugo5kjv2lothte0noiclmg6o', 'Baby Chair', '12000', 'pic/product7.jpg'),
(16, 31, 's9ugo5kjv2lothte0noiclmg6o', 'Baby Chair', '12000', 'pic/product7.jpg'),
(17, 30, '7nd46ovs9rp264nralis7sfl2n', 'Gray Sofa', '18000', 'pic/product6.jpg'),
(18, 7, '7nd46ovs9rp264nralis7sfl2n', 'Bed3', '10000', 'pic/bd3.jpg'),
(19, 28, '7nd46ovs9rp264nralis7sfl2n', 'Cup holder', '13000', 'pic/product4.jpg'),
(20, 28, '7nd46ovs9rp264nralis7sfl2n', 'Cup holder', '13000', 'pic/product4.jpg'),
(21, 6, '5mj21tacnsju8rvsh4uvhitms9', 'Bed2', '18000', 'pic/bd2.jpg'),
(22, 29, '5mj21tacnsju8rvsh4uvhitms9', 'White Vase', '8000', 'pic/product5.jpg'),
(23, 25, '5ehps6237tj0g242uva7l9s55e', 'White Vase', '15000', 'pic/product1.jpg'),
(24, 28, 'ics6ktn8vagh7iemds4bl234a2', 'Cup holder', '13000', 'pic/product4.jpg'),
(25, 32, 'ics6ktn8vagh7iemds4bl234a2', 'Read Chair', '17000', 'pic/product8.jpg'),
(26, 28, 'h8phci8jv80jn4bhnia0m7u442', 'Cup holder', '13000', 'pic/product4.jpg'),
(27, 6, 'h8phci8jv80jn4bhnia0m7u442', 'Bed2', '18000', 'pic/bd2.jpg'),
(28, 30, 'h8phci8jv80jn4bhnia0m7u442', 'Gray Sofa', '18000', 'pic/product6.jpg'),
(29, 26, 'gen4g17el8qgmvp6tr70qopjge', 'Neon light', '5000', 'pic/product2.jpg'),
(30, 26, 'gen4g17el8qgmvp6tr70qopjge', 'Neon light', '5000', 'pic/product2.jpg'),
(31, 28, 'u62amdhit3cc3jbtf5php7sfs7', 'Cup holder', '13000', 'pic/product4.jpg'),
(32, 4, 'u62amdhit3cc3jbtf5php7sfs7', 'chair3', '10000', 'pic/cr3.jpg'),
(33, 30, '3saf19rtq2peoruemufuai877u', 'Gray Sofa', '18000', 'pic/product6.jpg'),
(34, 25, 'vqcbd544us6veqsg53rdsa4ahk', 'White Vase', '15000', 'pic/product1.jpg'),
(35, 26, 'gg2iv506dvb8hr9kjcoo7oa9rc', 'Neon light', '5000', 'pic/product2.jpg'),
(36, 28, '2qcsr9d9p84ngq67cmp9m7jvn2', 'Cup holder', '13000', 'pic/product4.jpg'),
(37, 25, 'hde3nam3p91ik2mo3287bdrebe', 'White Vase', '15000', 'pic/product1.jpg'),
(38, 32, 'hde3nam3p91ik2mo3287bdrebe', 'Read Chair', '17000', 'pic/product8.jpg'),
(39, 6, 'hde3nam3p91ik2mo3287bdrebe', 'Bed2', '18000', 'pic/bd2.jpg'),
(40, 25, 'j62u1p7ste8d9r7oneo536b312', 'White Vase', '15000', 'pic/product1.jpg'),
(41, 6, 'j62u1p7ste8d9r7oneo536b312', 'Bed2', '18000', 'pic/bd2.jpg'),
(42, 29, 'j62u1p7ste8d9r7oneo536b312', 'White Vase', '8000', 'pic/product5.jpg'),
(43, 25, 'm0mgqs4isdsdfs949lgit2htrr', 'White Vase', '15000', 'pic/product1.jpg'),
(44, 29, 'm0mgqs4isdsdfs949lgit2htrr', 'White Vase', '8000', 'pic/product5.jpg'),
(45, 30, 'm0mgqs4isdsdfs949lgit2htrr', 'Gray Sofa', '18000', 'pic/product6.jpg'),
(46, 25, 'ud92uh0o3884ha0og91hei2b7k', 'White Vase', '15000', 'pic/product1.jpg'),
(47, 25, 'cg1s2q4b2p70oavg04najuql9b', 'White Vase', '15000', 'pic/product1.jpg'),
(48, 25, 'l96duok09he8bg20lqk2jn4duk', 'White Vase', '15000', 'pic/product1.jpg'),
(49, 28, 'l96duok09he8bg20lqk2jn4duk', 'Cup holder', '13000', 'pic/product4.jpg'),
(50, 14, 'l96duok09he8bg20lqk2jn4duk', 'Couch 2', '18000', 'pic/ch2.jpg'),
(51, 25, 'a89b64qlfd3qu6ilijcm0p45c4', 'White Vase', '15000', 'pic/product1.jpg'),
(52, 28, 'a89b64qlfd3qu6ilijcm0p45c4', 'Cup holder', '13000', 'pic/product4.jpg'),
(53, 25, '7s6aapa5ecups7m6m3edmkc1s5', 'White Vase', '15000', 'pic/product1.jpg'),
(54, 30, 'u3sfco21kpegt7fpnjea25fi1v', 'Gray Sofa', '18000', 'pic/product6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `logged_user`
--

CREATE TABLE `logged_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logged_user`
--

INSERT INTO `logged_user` (`id`, `username`, `password`) VALUES
(1, 'tahawaseem043@gmail.com', 'Taha@3192');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_video` varchar(255) DEFAULT NULL,
  `prod_image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `prod_slug` varchar(255) NOT NULL,
  `prod_price` decimal(65,0) NOT NULL,
  `prod_desc` mediumtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `prod_video`, `prod_image`, `category_id`, `prod_slug`, `prod_price`, `prod_desc`, `created_at`) VALUES
(1, 'chair1', '', 'pic/cr1.jpg', 1, 'chairs.php', 15000, '', '2024-09-25 07:09:55'),
(2, 'Bed1', '', 'pic/bd1.jpg', 2, 'beds.php', 16000, 'bed', '2024-09-25 07:09:55'),
(3, 'chair2', '', 'pic/cr2.jpg', 1, 'chairs.php', 8000, '', '2024-09-25 07:09:55'),
(4, 'chair3', '', 'pic/cr3.jpg', 1, 'chairs.php', 10000, '', '2024-09-25 07:09:55'),
(5, 'chair4', '', 'pic/cr4.jpg', 1, 'chairs.php', 6000, '', '2024-09-25 07:09:55'),
(6, 'Bed2', '', 'pic/bd2.jpg', 2, 'beds.php', 18000, '', '2024-09-25 07:09:55'),
(7, 'Bed3', '', 'pic/bd3.jpg', 2, 'beds.php', 10000, '', '2024-09-25 07:09:55'),
(8, 'Bed4', '', 'pic/bd4.jpg', 2, 'beds.php', 16000, '', '2024-09-25 07:09:55'),
(9, 'Arm chair1', '', 'pic/am1.jpg', 3, 'armchair.php', 15000, '', '2024-09-25 07:09:55'),
(10, 'Arm chair2', '', 'pic/am2.jpg', 3, 'armchair.php', 18000, '', '2024-09-25 07:09:55'),
(11, 'Arm chair3', '', 'pic/am3.jpg', 3, 'armchair.php', 10000, '', '2024-09-25 07:09:55'),
(12, 'Arm Chair 4', '', 'pic/am4.jpg', 3, 'armchair.php', 12000, '', '2024-09-25 07:09:55'),
(13, 'Couch 1', '', 'pic/ch1.jpg', 4, 'couches.php', 15000, '', '2024-09-25 07:09:55'),
(14, 'Couch 2', '', 'pic/ch2.jpg', 4, 'couches.php', 18000, '', '2024-09-25 07:09:55'),
(15, 'Couch 3', '', 'pic/ch3.jpg', 4, 'couches.php', 10000, '', '2024-09-25 07:09:55'),
(16, 'Couch 4', '', 'pic/ch4.jpg', 4, 'couches.php', 16000, '', '2024-09-25 07:09:55'),
(25, 'White Vase', '', 'pic/product1.jpg', 5, 'index.php', 15000, 'Decoration', '2024-09-25 07:09:55'),
(26, 'Neon light', '', 'pic/product2.jpg', 6, 'index.php', 5000, 'Lightning', '2024-09-25 07:09:55'),
(27, 'Gray chair', '', 'pic/product3.jpg', 7, 'index.php', 12000, 'Furniture', '2024-09-25 07:09:55'),
(28, 'Cup holder', '', 'pic/product4.jpg', 5, 'index.php', 13000, 'Decoration', '2024-09-25 07:09:55'),
(29, 'White Vase', '', 'pic/product5.jpg', 6, 'index.php', 8000, 'Decoration', '2024-09-25 07:09:55'),
(30, 'Gray Sofa', '', 'pic/product6.jpg', 7, 'index.php', 18000, 'Furniture', '2024-09-25 07:09:55'),
(31, 'Baby Chair', '', 'pic/product7.jpg', 7, 'index.php', 12000, 'Furniture', '2024-09-25 07:09:55'),
(32, 'Read Chair', '', 'pic/product8.jpg', 7, 'index.php', 17000, 'Furniture', '2024-09-25 07:09:55'),
(54, 'Classy Chairs', '', 'pic/ch5.jpg', 8, 'newstock.php', 12000, '', '2024-09-26 09:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `signupuser`
--

CREATE TABLE `signupuser` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signupuser`
--

INSERT INTO `signupuser` (`id`, `name`, `email`, `password`) VALUES
(1, '', 'tahawaseem043@gmail.com', 'Taha@31923');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(14) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_name`, `email`, `phone`, `city`, `address`, `payment_method`, `subtotal`, `created_at`) VALUES
(1, 'ayesha', 'ayesha@gmail.com', 2147483647, 'Lahore', 'thokar ', 'Bank Deposit', 0.00, '0000-00-00 00:00:00.000000'),
(2, 'ahad', 'ahad123@gmail.com', 312357897, 'Lahore', 'johar town', 'cod', 0.00, '2024-09-23 09:34:34.038289'),
(3, 'salman', 'salman@gmail.com', 312357897, 'Lahore', 'dha phase 3', 'Bank Deposit', 49200.00, '2024-10-23 09:53:34.629526'),
(4, 'salman', 'salman@gmail.com', 2147483647, 'Lahore', 'asdfghjkl;jhgjhl', 'Bank Deposit', 76875.00, '2024-09-25 10:37:01.653033'),
(5, 'rayaz', 'rayaz@gmail.com', 312357897, 'Lahore', 'dfghjkhgjhmn,', 'cod', 82000.00, '2024-09-25 10:48:47.492684'),
(6, 'faraz', 'faraz@gmail.com', 312456765, 'Lahore', 'Johar town', 'Bank Deposit', 61500.00, '2024-09-25 16:56:05.462099'),
(7, 'salman', 'salman@gmail.com', 2147483647, 'Lahore', 'Johar town', 'Bank Deposit', 55350.00, '2024-09-25 17:13:17.770789'),
(8, 'fahad', 'mutafa@gmail.com', 2147483647, 'Lahore', 'Johar Town', 'Bank Deposit', 24600.00, '2024-09-25 17:30:51.379470'),
(10, 'ahmed', 'ahmed@gmail.com', 2147483647, 'Lahore', 'Johar Town', 'Bank Deposit', 61500.00, '2024-09-25 17:59:31.811339'),
(11, 'fahad', 'ahad123@gmail.com', 312456765, 'Lahore', 'jjjj', 'cod', 15375.00, '2024-09-26 06:37:12.410630'),
(12, 'shehzad', 'shehzad@gmail.com', 312456765, 'Lahore', 'johar town', 'cod', 18450.00, '2024-09-26 10:00:18.918551'),
(13, 'sadaqat', 'sado@gmail.com', 323145647, 'Lahore', 'johar town', 'Bank Deposit', 17425.00, '2024-09-30 09:40:52.158538'),
(14, 'ayesha', 'mobilemarkettinggurus@gmail.com', 312456765, 'Lahore', 'johar town', 'Bank Deposit', 8200.00, '2024-10-08 07:32:40.303445');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_table`
--
ALTER TABLE `cart_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logged_user`
--
ALTER TABLE `logged_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `signupuser`
--
ALTER TABLE `signupuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_table`
--
ALTER TABLE `cart_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `logged_user`
--
ALTER TABLE `logged_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `signupuser`
--
ALTER TABLE `signupuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
