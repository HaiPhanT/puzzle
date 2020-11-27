-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 26, 2020 at 03:52 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scriptdb-puzzle-1988004`
--

-- --------------------------------------------------------

--
-- Table structure for table `hinhghep`
--

DROP TABLE IF EXISTS `hinhghep`;
CREATE TABLE IF NOT EXISTS `hinhghep` (
  `PID` int(11) NOT NULL AUTO_INCREMENT,
  `TenHinhGhep` varchar(100) COLLATE utf8_bin NOT NULL,
  `URL` varchar(100) COLLATE utf8_bin NOT NULL,
  `Cot` int(11) NOT NULL,
  `Dong` int(11) NOT NULL,
  PRIMARY KEY (`PID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `hinhghep`
--

INSERT INTO `hinhghep` (`PID`, `TenHinhGhep`, `URL`, `Cot`, `Dong`) VALUES
(1, 'Ảnh thiên nhiên', 'https://dean2020.edu.vn/wp-content/uploads/2019/03/anh-thien-nhien-dep-3.jpeg', 2, 2),
(2, 'Ảnh động vật', 'https://giaydantuonganhtuan.vn/upload_images/images/ANI%20-%20073.jpg', 2, 2),
(3, 'Ảnh xe hơi', 'https://tophinhnen.com/wp-content/uploads/2018/01/hinh-nen-xe-oto-dep-1.jpg', 2, 2),
(4, 'Ảnh biển', 'https://wiki-travel.com.vn/Uploads/picture/Thaophuongnguyen-180910020926-hlong-2a.jpg', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `luotchoi`
--

DROP TABLE IF EXISTS `luotchoi`;
CREATE TABLE IF NOT EXISTS `luotchoi` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PID` int(11) NOT NULL,
  `ThoiGianBD` datetime NOT NULL,
  `ThoiGianKT` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `luotchoi`
--

INSERT INTO `luotchoi` (`ID`, `PID`, `ThoiGianBD`, `ThoiGianKT`) VALUES
(1, 1, '2020-11-24 23:16:06', '2020-11-24 23:19:06'),
(24, 1, '2020-11-26 15:49:30', '2020-11-26 15:49:54');

-- --------------------------------------------------------

--
-- Table structure for table `manhghep`
--

DROP TABLE IF EXISTS `manhghep`;
CREATE TABLE IF NOT EXISTS `manhghep` (
  `MID` int(11) NOT NULL AUTO_INCREMENT,
  `ThuocPID` int(11) NOT NULL,
  `URL` varchar(100) COLLATE utf8_bin NOT NULL,
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  PRIMARY KEY (`MID`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `manhghep`
--

INSERT INTO `manhghep` (`MID`, `ThuocPID`, `URL`, `x`, `y`) VALUES
(1, 1, 'puzzle/anh1-row-1-col-1.jpg', 1, 1),
(2, 1, 'puzzle/anh1-row-1-col-2.jpg', 1, 2),
(3, 1, 'puzzle/anh1-row-2-col-1.jpg', 2, 1),
(4, 1, 'puzzle/anh1-row-2-col-2.jpg', 2, 2),
(5, 2, 'puzzle/anh2-row-1-col-1.jpg', 1, 1),
(6, 2, 'puzzle/anh2-row-1-col-2.jpg', 1, 2),
(7, 2, 'puzzle/anh2-row-2-col-1.jpg', 2, 1),
(8, 2, 'puzzle/anh2-row-2-col-2.jpg', 2, 2),
(9, 3, 'puzzle/anh3-row-1-col-1.jpg', 1, 1),
(10, 3, 'puzzle/anh3-row-1-col-2.jpg', 1, 2),
(11, 3, 'puzzle/anh3-row-2-col-1.jpg', 2, 1),
(12, 3, 'puzzle/anh3-row-2-col-2.jpg', 2, 2),
(13, 4, 'puzzle/anh4-row-1-col-1.jpg', 1, 1),
(14, 4, 'puzzle/anh4-row-1-col-2.jpg', 1, 2),
(15, 4, 'puzzle/anh4-row-2-col-1.jpg', 2, 1),
(16, 4, 'puzzle/anh4-row-2-col-2.jpg', 2, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
