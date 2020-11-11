-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2019 at 01:36 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `birdie`
--

-- --------------------------------------------------------

--
-- Table structure for table `burung`
--

CREATE TABLE `burung` (
  `id_burung` int(11) NOT NULL,
  `nama_burung` varchar(50) NOT NULL,
  `deskripsi_burung` text DEFAULT NULL,
  `perawatan_kandang` text DEFAULT NULL,
  `perawatan_makan` text DEFAULT NULL,
  `vid_burung` varchar(50) DEFAULT NULL,
  `img_burung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `burung`
--

INSERT INTO `burung` (`id_burung`, `nama_burung`, `deskripsi_burung`, `perawatan_kandang`, `perawatan_makan`, `vid_burung`, `img_burung`) VALUES
(1, 'Burung Cucak Rowo', 'Indonesia memiliki kekayaan flora dan fauna yang begitu beragam. Ada begitu banyak jenis binatang yang mendiami setiap sudut wilayah di negeri ini. Salah satu yang terkenal dari fauna Indonesia yaitu aneka jenis burung baik burung hias maupun burung kicau.\r\n\r\nKhusus untuk burung kicau, suara merdu dari beberapa spesies bisa seketika membuat siapa saja jatuh cinta. Hal ini yang terjadi bila mendengarkan kicau burung Cucak Rowo.\r\n\r\nBurung Cucak Rowo menjadi jenis aves yang banyak dipelihara oleh kicau mania. Kemampuannya untuk berkicau yang diselingi dengan ngerol yang melengking sudah sangat diakui.', 'Tes', 'Tes', 'videoplayback.mp4', 'Pycnonotus-zeylanicus-_Bronze-Cheung-Kwok-Yee.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `detail_burung`
--

CREATE TABLE `detail_burung` (
  `id_detail_burung` int(11) NOT NULL,
  `fk_burung` int(11) NOT NULL,
  `harga_burung` int(11) NOT NULL DEFAULT 0,
  `usia_burung` int(11) NOT NULL DEFAULT 1,
  `stok_burung` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_burung`
--

INSERT INTO `detail_burung` (`id_detail_burung`, `fk_burung`, `harga_burung`, `usia_burung`, `stok_burung`) VALUES
(1, 1, 500000, 3, 50),
(2, 1, 100000, 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_burung`
--

CREATE TABLE `gallery_burung` (
  `id_gallery` int(11) NOT NULL,
  `fk_detail_burung` int(11) NOT NULL,
  `foto_gallery` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery_burung`
--

INSERT INTO `gallery_burung` (`id_gallery`, `fk_detail_burung`, `foto_gallery`) VALUES
(22, 1, '97298991.jpg'),
(23, 1, 'straw-headed_bulbul_lee_tiah_khee.jpg'),
(24, 1, 'Pycnonotus_zeylanicus,Straw-headed_Bulbul,I_LHT25501.jpg'),
(25, 1, 'Pycnonotus-zeylanicus-_Bronze-Cheung-Kwok-Yee.jpg'),
(26, 1, 'straw-headed-bulbul-140128-113eos1d-fy1x2695.jpg'),
(27, 1, 'Zebra_Dove_Background-663_(1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `password`, `email`, `role`) VALUES
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'teambirdie@polinema.ac.id', 1),
(7, 'satria', '477054c78baea7a1242f79d898a2ca46', 'satria@gmail.com', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `burung`
--
ALTER TABLE `burung`
  ADD PRIMARY KEY (`id_burung`);

--
-- Indexes for table `detail_burung`
--
ALTER TABLE `detail_burung`
  ADD PRIMARY KEY (`id_detail_burung`),
  ADD KEY `Detail_Burung` (`fk_burung`);

--
-- Indexes for table `gallery_burung`
--
ALTER TABLE `gallery_burung`
  ADD PRIMARY KEY (`id_gallery`),
  ADD KEY `fk_detail_burung` (`fk_detail_burung`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `burung`
--
ALTER TABLE `burung`
  MODIFY `id_burung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_burung`
--
ALTER TABLE `detail_burung`
  MODIFY `id_detail_burung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallery_burung`
--
ALTER TABLE `gallery_burung`
  MODIFY `id_gallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_burung`
--
ALTER TABLE `detail_burung`
  ADD CONSTRAINT `Detail_Burung` FOREIGN KEY (`fk_burung`) REFERENCES `burung` (`id_burung`);

--
-- Constraints for table `gallery_burung`
--
ALTER TABLE `gallery_burung`
  ADD CONSTRAINT `gallery_burung_ibfk_1` FOREIGN KEY (`fk_detail_burung`) REFERENCES `detail_burung` (`id_detail_burung`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
