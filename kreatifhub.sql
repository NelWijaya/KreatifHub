-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2022 at 09:52 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kreatifhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `fotoprofile`
--

CREATE TABLE `fotoprofile` (
  `id` int(11) NOT NULL,
  `foto_profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fotoprofile`
--

INSERT INTO `fotoprofile` (`id`, `foto_profile`) VALUES
(7, 'Screenshot_341.png'),
(8, '9954.jpg'),
(9, 'unnamed.png'),
(10, 'Gambar_kucing_kartun.png'),
(11, 'FJ-QrA8VIAIKHsU.jpg'),
(12, '7171403.png'),
(13, '021401c24185e0c85384d1b80da3d6b4.png'),
(14, 'Twibbon_Obscura_Exhibition_2022.png'),
(15, 'xaa.png'),
(16, 'xaa1.png'),
(17, 'Indonesian_Student.png'),
(18, 'calum-lewis-8Nc_oQsc2qQ-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'Photograph'),
(2, 'Musician'),
(3, 'Videograph'),
(4, 'Designer'),
(5, 'Video Editor'),
(16, 'Design Grafis'),
(17, 'NFT art');

-- --------------------------------------------------------

--
-- Table structure for table `talent`
--

CREATE TABLE `talent` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  `age` int(11) NOT NULL,
  `id_foto_profile` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `aboutme` longtext NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `talent`
--

INSERT INTO `talent` (`id`, `email`, `phone_number`, `age`, `id_foto_profile`, `name`, `gender`, `skills`, `location`, `aboutme`, `id_kategori`) VALUES
(1, 'didi@gmail.com', '089529537884', 32, 7, 'Didi', 'Man', '1sadsa', 'dgfd', 'asdasf', 4),
(2, 'neldy.wijaya@gmail.com', '089529537884', 452, 8, 'Neldy Wijaya', 'Woman', '1sadsa', 'dfdfb', 'sdfsdg', 5),
(3, 'achai@gmail.com', '089529537823', 53, 9, 'Xavier', 'Man', '45', 'Dimention', 'asdasfas', 16),
(4, 'gugu@gmail.com', '089229537884', 24, 10, 'Gugu', 'Man', 'fdg', 'Dimentionx', 'asfagsdg', 17),
(5, 'asd@gmail.com', '089529537884', 354325, 11, 'asd asd', 'Man', 'Canon', 'asdasd', 'sdfsdb', 3),
(6, 'afong@gmail.com', '089529537884', 64, 12, 'Afong', 'Man', 'Piano', 'Dimentionxy', 'asfsavxcv', 2),
(7, 'admin@kibble.com', '089529537884', 24, 13, 'a', 'Man', 'Piano', 'gfh', 'sdfs', 5),
(8, 'afeng@gmail.com', '089529537884', 435, 14, 'asd asd', 'Man', 'dsfds', 'cxsd', 'dfbdfb', 4),
(10, 'admi3n@kibble.com', '089529537884', 345, 16, 'asd asd', 'Man', 'Piano', 'fhfg', 'fghgf', 4),
(11, 'aschai@gmail.com', '089529537884', 35, 17, 'asd asd', 'Man', 'Canon2', 'Dimention', 'sdf', 2),
(12, 'ameng@gmail.com', '089529537884', 23, 18, 'asd asd', 'Man', 'Piano', 'sdf', 'sfds', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fotoprofile`
--
ALTER TABLE `fotoprofile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `talent`
--
ALTER TABLE `talent`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fotoprofile`
--
ALTER TABLE `fotoprofile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `talent`
--
ALTER TABLE `talent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
