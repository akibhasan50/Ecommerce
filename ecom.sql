-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 11, 2020 at 05:52 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

DROP TABLE IF EXISTS `tbl_cart`;
CREATE TABLE IF NOT EXISTS `tbl_cart` (
  `cartid` int(11) NOT NULL AUTO_INCREMENT,
  `sesid` varchar(255) COLLATE utf8_bin NOT NULL,
  `proid` int(11) NOT NULL,
  `pname` varchar(255) COLLATE utf8_bin NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `image` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`cartid`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartid`, `sesid`, `proid`, `pname`, `quantity`, `price`, `image`) VALUES
(18, 'ktfsm45su6v0c9aom8rbe96pb9', 1, 'canon 700D', 1, 500.00, 'upload/553326c885.jpg'),
(19, 'ktfsm45su6v0c9aom8rbe96pb9', 2, 'realme xt', 1, 800.00, 'upload/fa598244d6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_catagory`
--

DROP TABLE IF EXISTS `tbl_catagory`;
CREATE TABLE IF NOT EXISTS `tbl_catagory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catname` varchar(55) COLLATE utf8_bin NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_catagory`
--

INSERT INTO `tbl_catagory` (`id`, `catname`, `status`) VALUES
(13, 'Mobile Phones', 1),
(5, 'Sports &amp; Fitness', 1),
(12, 'Desktop', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

DROP TABLE IF EXISTS `tbl_contact`;
CREATE TABLE IF NOT EXISTS `tbl_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `phone` bigint(20) NOT NULL,
  `message` text COLLATE utf8_bin NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `name`, `email`, `phone`, `message`, `date`) VALUES
(1, 'akib', 'tonu@gmail.com', 934543, 'i have some problem in a product', '2020-07-01 09:44:17'),
(2, 'fariya nusrat', 'admin@gmail.com', 1859487474, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium deleniti error cumque adipisci aliquam', '2020-07-04 00:56:03'),
(7, 'MARUF UDDIN', 'bub@gmail.com', 188301002, 'lllllllllllorem', '2020-07-04 22:07:16'),
(8, 'MARUF UDDIN', 'bub@gmail.com', 1859487474, 'fffffffffff', '2020-07-04 23:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catid` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(50) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `meta_title` text COLLATE utf8_bin NOT NULL,
  `meta_key` varchar(255) COLLATE utf8_bin NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `catid`, `name`, `mrp`, `price`, `quantity`, `image`, `description`, `meta_title`, `meta_key`, `status`) VALUES
(1, 13, 'canon 700D', 600, 500, 3, 'upload/553326c885.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, labore. Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, labore. Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, labore. Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, labore.', 'lorem', '2', 1),
(2, 13, 'realme xt', 900, 800, 3, 'upload/fa598244d6.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, labore. Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, labore. Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, labore. Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, labore.', 'lorem', 'el2', 1),
(6, 12, 'blender', 600, 500, 3, 'upload/1313ad9f20.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem tempore dolore magnam aliquam, nemo dolorum! Laborum distinctio iusto facere optio corrupti cupiditate aliquam! Nam, deserunt placeat ipsum eum hic cumque?', 'lorem', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `phone` bigint(20) NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `added_on` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `phone`, `password`, `added_on`) VALUES
(1, 'akib hasan', 'akib@gmail.com', 934543, '1234', '2020-07-01'),
(2, 'fariya nusrat', 'bub@gmail.com', 1759453031, '1234', '2020-07-07');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
