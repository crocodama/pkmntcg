-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql210.epizy.com
-- Generation Time: Jan 09, 2022 at 03:30 AM
-- Server version: 5.7.36-39
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_30604121_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `user_id` bigint(20) NOT NULL,
  `card_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`user_id`, `card_id`, `amount`) VALUES
(34707, 3, 1),
(34707, 10, 4),
(34707, 13, 5),
(34707, 12, 4),
(34707, 4, 1),
(34707, 5, 1),
(34707, 7, 1),
(34707, 8, 2),
(34707, 6, 1),
(34707, 38, 1),
(34707, 11, 1),
(34707, 26, 2),
(34707, 29, 1),
(34707, 22, 1),
(34707, 30, 1),
(34707, 20, 2),
(34707, 32, 1),
(34707, 28, 2),
(34707, 43, 1),
(34707, 45, 1),
(34707, 16, 1),
(34707, 44, 2),
(34707, 47, 1),
(34707, 33, 1),
(34707, 35, 1),
(34707, 37, 1),
(34707, 40, 1),
(34707, 21, 1),
(34707, 18, 1),
(34707, 14, 1),
(181984061837971, 22, 1),
(181984061837971, 20, 2),
(181984061837971, 31, 3),
(181984061837971, 27, 2),
(181984061837971, 18, 1),
(181984061837971, 47, 3),
(181984061837971, 21, 1),
(181984061837971, 12, 2),
(181984061837971, 48, 1),
(181984061837971, 30, 1),
(181984061837971, 28, 1),
(181984061837971, 14, 1),
(34707, 46, 1),
(34707, 27, 2),
(34707, 31, 1),
(181984061837971, 2, 4),
(181984061837971, 2, 4),
(34707, 60, 1),
(34707, 2, 1),
(34707, 51, 1),
(34707, 17, 1),
(34707, 57, 1),
(34707, 34, 1),
(34707, 52, 1),
(34707, 64, 1),
(34707, 55, 1),
(34707, 42, 1),
(34707, 48, 1),
(34707, 54, 1),
(34707, 63, 1),
(34707, 56, 1),
(34707, 41, 1);

-- --------------------------------------------------------

--
-- Table structure for table `auctions`
--

CREATE TABLE `auctions` (
  `seller_id` bigint(20) NOT NULL,
  `card_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `amount` int(11) NOT NULL,
  `auction_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auctions`
--

INSERT INTO `auctions` (`seller_id`, `card_id`, `price`, `amount`, `auction_id`) VALUES
(34707, 28, 20, 1, 99456),
(181984061837971, 10, 50, 1, 19071),
(34707, 5, 2, 2, 46611);

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `card_id` bigint(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `pack_id` int(11) NOT NULL,
  `rarity` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`card_id`, `image`, `price`, `pack_id`, `rarity`, `name`, `number`) VALUES
(1, 'images/base_swsh/001_202.jpg', 1.09, 83, 4, 'Celebi V', '001/202'),
(2, 'images/base_swsh/002_202.jpg', 0.06, 83, 1, 'Roselia', '002/202'),
(3, 'images/base_swsh/003_202.jpg', 0.04, 83, 1, 'Roselia', '003/202'),
(4, 'images/base_swsh/004_202.jpg', 0.16, 83, 3, 'Roserade', '004/202'),
(5, 'images/base_swsh/005_202.jpg', 0.05, 83, 1, 'Cottonee', '005/202'),
(12, 'images/base_swsh/012_202.jpg', 0.13, 83, 2, 'Thwackey', '012/202'),
(13, 'images/base_swsh/013_202.jpg', 0.08, 83, 2, 'Thwackey', '013/202'),
(10, 'images/base_swsh/010_202.jpg', 0.05, 83, 1, 'Grookey', '010/202'),
(6, 'images/base_swsh/006_202.jpg\r\n', 0.15, 83, 3, 'Whimsicott', '006/202'),
(7, 'images/base_swsh/007_202.jpg', 0.05, 83, 1, 'Maractus', '007/202'),
(8, 'images/base_swsh/008_202.jpg', 0.1, 83, 3, 'Durant', '008/202'),
(9, 'images/base_swsh/009_202.jpg', 1, 83, 4, 'Dhelmise V', '009/202'),
(11, 'images/base_swsh/011_202.jpg', 0.11, 83, 1, 'Grookey', '011/202'),
(14, 'images/base_swsh/014_202.jpg\r\n', 0.29, 83, 3, 'Rillaboom', '014/202'),
(15, 'images/base_swsh/015_202.jpg\r\n', 0.36, 83, 3, 'Rillaboom', '015/202'),
(16, 'images/base_swsh/016_202.jpg', 0.04, 83, 1, 'Blipbug', '016/202'),
(17, 'images/base_swsh/017_202.jpg\r\n', 0.03, 83, 1, 'Blipbug', '017/202'),
(18, 'images/base_swsh/018_202.jpg\r\n', 0.03, 83, 2, 'Dottler', '018/202'),
(19, 'images/base_swsh/019_202.jpg\r\n', 0.16, 83, 3, 'Orbeetle', '019/202'),
(20, 'images/base_swsh/020_202.jpg\r\n', 0.21, 83, 1, 'Gossifleur', '020/202'),
(21, 'images/base_swsh/021_202.jpg\r\n', 0.1, 83, 2, 'Eldegoss', '021/202'),
(22, 'images/base_swsh/022_202.jpg\r\n', 0.06, 83, 1, 'Vulpix', '022/202'),
(23, 'images/base_swsh/023_202.jpg\r\n', 0.21, 83, 3, 'Ninetales', '023/202'),
(24, 'images/base_swsh/024_202.jpg\r\n', 0.95, 83, 4, 'Torkoal V', '024/202'),
(25, 'images/base_swsh/025_202.jpg\r\n', 1.28, 83, 4, 'Victini V', '025/202'),
(26, 'images/base_swsh/026_202.jpg\r\n', 0.08, 83, 2, 'Heatmor', '026/202'),
(27, 'images/base_swsh/027_202.jpg\r\n', 0.05, 83, 1, 'Salandit', '027/202'),
(28, 'images/base_swsh/028_202.jpg\r\n', 0.05, 83, 2, 'Salazzle', '028/202'),
(29, 'images/base_swsh/029_202.jpg\r\n', 0.18, 83, 3, 'Turtonator', '029/202'),
(30, 'images/base_swsh/030_202.jpg\r\n', 0.06, 83, 1, 'Scorbunny', '030/202'),
(31, 'images/base_swsh/031_202.png', 0.07, 83, 1, 'Scorbunny', '031/202'),
(32, 'images/base_swsh/032_202.jpg\r\n', 0.14, 83, 2, 'Raboot', '032/202'),
(33, 'images/base_swsh/033_202.jpg\r\n', 0.11, 83, 2, 'Raboot', '033/202'),
(34, 'images/base_swsh/034_202.jpg\r\n', 0.5, 83, 3, 'Cinderace', '034/202'),
(35, 'images/base_swsh/035_202.jpg\r\n', 0.43, 83, 3, 'Cinderace', '035/202'),
(36, 'images/base_swsh/036_202.jpg\r\n', 0.28, 83, 3, 'Cinderace', '036/202'),
(37, 'images/base_swsh/037_202.jpg\r\n', 0.05, 83, 1, 'Sizzlipede', '037/202'),
(38, 'images/base_swsh/038_202.jpg\r\n', 0.05, 83, 1, 'Sizzlipede', '038/202'),
(39, 'images/base_swsh/039_202.jpg\r\n', 0.15, 83, 3, 'Centiskorch', '039/202'),
(40, 'images/base_swsh/040_202.jpg', 0.06, 83, 1, 'Shellder', '040/202'),
(41, 'images/base_swsh/041_202.jpg\r\n', 0.13, 83, 3, 'Cloyster', '041/202'),
(42, 'images/base_swsh/042_202.jpg\r\n', 0.05, 83, 1, 'Krabby', '042/202'),
(43, 'images/base_swsh/043_202.jpg\r\n', 0.04, 83, 1, 'Krabby', '043/202'),
(44, 'images/base_swsh/044_202.jpg\r\n', 0.12, 83, 2, 'Kingler', '044/202'),
(45, 'images/base_swsh/045_202.jpg\r\n', 0.06, 83, 1, 'Goldeen', '045/202'),
(46, 'images/base_swsh/046_202.jpg\r\n', 0.04, 83, 1, 'Goldeen', '0.46'),
(47, 'images/base_swsh/047_202.jpg\r\n', 0.07, 83, 2, 'Seaking', '047/202'),
(48, 'images/base_swsh/048_202.jpg\r\n', 0.17, 83, 3, 'Lapras', '048/202'),
(49, 'images/base_swsh/049_202.jpg\r\n', 1.89, 83, 4, 'Lapras V', '049/202'),
(50, 'images/base_swsh/050_202.jpg\r\n', 3.75, 83, 4, 'Lapras VMAX', '050/202'),
(51, 'images/base_swsh/051_202.jpg\r\n', 0.06, 83, 2, 'Qwilfish', '051/202'),
(52, 'images/base_swsh/052_202.jpg\r\n', 0.09, 83, 2, 'Mantine', '052/202'),
(53, 'images/base_swsh/053_202.jpg\r\n', 1.2, 83, 4, 'Keldeo V', '053/202'),
(54, 'images/base_swsh/054_202.jpg\r\n', 0.04, 83, 1, 'Sobble', '054/202'),
(55, 'images/base_swsh/055_202.jpg\r\n', 0.12, 83, 1, 'Sobble', '055/202'),
(56, 'images/base_swsh/056_202.jpg\r\n', 3.93, 83, 2, 'Drizzile', '056/202'),
(57, 'images/base_swsh/057_202.jpg\r\n', 0.1, 83, 2, 'Drizzile', '057/202'),
(58, 'images/base_swsh/058_202.jpg\r\n', 1.78, 83, 3, 'Inteleon', '058/202'),
(59, 'images/base_swsh/059_202.jpg\r\n', 0.41, 83, 3, 'Inteleon', '059/202'),
(60, 'images/base_swsh/060_202.jpg\r\n', 0.03, 83, 1, 'Chewtle', '060/202'),
(61, 'images/base_swsh/061_202.jpg\r\n', 0.13, 83, 3, 'Drednaw', '061/202'),
(62, 'images/base_swsh/062_202.jpg\r\n', 0.23, 83, 3, 'Cramorant', '062/202'),
(63, 'images/base_swsh/063_202.jpg\r\n', 0.07, 83, 1, 'Snom', '063/202'),
(64, 'images/base_swsh/064_202.jpg\r\n', 0.45, 83, 3, 'Frosmoth', '064/202');

-- --------------------------------------------------------

--
-- Table structure for table `packs`
--

CREATE TABLE `packs` (
  `pack_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packs`
--

INSERT INTO `packs` (`pack_id`, `image`, `price`, `name`) VALUES
(83, 'images/packs/swsh_base.jpg', 0, 'Sword & Shield Base set'),
(84, 'images/packs/swsh_rebel_clash.jpg', 20, 'Sword & Shield Rebel Clash'),
(85, 'images/packs/swsh_darkness_ablaze.jpg', 40, 'Sword & Shield Darkness Ablaze'),
(86, 'images/packs/swsh_vivid_voltage.jpg', 60, 'Sword & Shield  Vivid Voltage');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `money` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_name`, `password`, `money`, `date`) VALUES
(1, 34707, 'aaa', 'aaa', 37.67, '2021-12-29 07:37:07'),
(2, 181984061837971, 'bbb', 'bbb', 15.8, '2021-12-27 06:26:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD KEY `image` (`image`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_name` (`user_name`),
  ADD KEY `date` (`date`),
  ADD KEY `money` (`money`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
