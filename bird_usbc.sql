-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Des 2020 pada 05.27
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bird_usbc`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `burung`
--

CREATE TABLE `burung` (
  `id_burung` int(11) NOT NULL,
  `nama_burung` varchar(50) NOT NULL,
  `deskripsi_burung` text NOT NULL,
  `perawatan_kandang` text NOT NULL,
  `perawatan_makan` text NOT NULL,
  `vid_burung` varchar(50) DEFAULT NULL,
  `img_burung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `burung`
--

INSERT INTO `burung` (`id_burung`, `nama_burung`, `deskripsi_burung`, `perawatan_kandang`, `perawatan_makan`, `vid_burung`, `img_burung`) VALUES
(37, 'Jalak Bali', 'Jalak Bali adalah sejenis burung pengicau berukuran sedang, dengan panjang lebih kurang 25cm, dari suku Sturnidae. Ia turut dikenali sebagai Curik Ketimbang Jalak. Jalak Bali hanya ditemukan di hutan bagian barat Pulau Bali dan merupakan hewan endemik Indonesia.', 'Jalak bali umumnya menyukai kandang yang tinggi karena sangat suka bertengger di dahan yang letaknya tinggi. Untuk itu, tinggi ideal kandang penangkaran minimal 2,5 meter.', 'Makanan favorit burung ini di habitat aslinya yaitu berupa serangga, cacing, dan jangkrik. Selain makanan berupa hewan atau serangga-serangga kecil, burung Jalak Bali pun sangat suka mengonsumsi biji-bijian dan buah-buahan sebagai makanannya, contoh makanan tersebut di antaranya yaitu juwet, jambu, dan pisang.', 'https://www.youtube.com/embed/nq_S5rRmngY', 'news-41.jpg'),
(38, 'Cucak Rowo', 'Cucak rawa adalah sejenis burung pengicau dari suku Pycnonotidae. Burung ini juga dikenal umum sebagai krakau, nama di Kapuas Hulu, Kalbar, cucakrawa, cangkurawah, dan barau-barau. Dalam bahasa Inggris disebut Straw-headed Bulbul, mengacu pada warna kepalanya yang kuning-jerami pucat.', 'Lokasi penangkaran mudah dikenal dan dijangkau para penggemar, dekat dengan jalan serta transportasinya mudah. Kalau mungkin tidak berada dalam kota dan lebih baik lagi bila berlatar belakang pegunungan yang masih menyerupai hutan. Hal ini akan sangat mendukung keindahan suasana penangkaran. Karena, selain hasil yang akan diharapkan, kombinasi antara alam yang indah dan kicauan burung yang akan memberikan kenikmatan tersendiri.', 'Makanan favorit Pepaya, Pisang Kepok Putih, Apel, Pir, Tomat dan beberapa buah lainnya. Kemudian untuk pakan tambahan seperti angkrik, Orong-orong, Kroto, Ulat Hongkong, Ulat Bambu, Kelabang, Belalang dan lainnya.', 'https://www.youtube.com/embed/FkRMnd4zjhE', 'hq720.jpg');

--
-- Trigger `burung`
--
DELIMITER $$
CREATE TRIGGER `Burung` AFTER INSERT ON `burung` FOR EACH ROW INSERT INTO detail_burung (fk_burung) VALUES (NEW.id_burung)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_burung`
--

CREATE TABLE `detail_burung` (
  `id_detail_burung` int(11) NOT NULL,
  `fk_burung` int(11) NOT NULL,
  `harga_burung` int(11) NOT NULL DEFAULT 0,
  `usia_burung` int(11) NOT NULL DEFAULT 1,
  `stok_burung` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_burung`
--

INSERT INTO `detail_burung` (`id_detail_burung`, `fk_burung`, `harga_burung`, `usia_burung`, `stok_burung`) VALUES
(30, 37, 2000000, 12, 20),
(31, 38, 1500000, 10, 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery_burung`
--

CREATE TABLE `gallery_burung` (
  `id_gallery` int(11) NOT NULL,
  `fk_detail_burung` int(11) NOT NULL,
  `foto_gallery` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gallery_burung`
--

INSERT INTO `gallery_burung` (`id_gallery`, `fk_detail_burung`, `foto_gallery`) VALUES
(41, 30, 'Burung_Jalak_bali_Cantik.jpg'),
(42, 30, 'bali_myna_gallery1.jpg'),
(43, 30, 'bali_myna_gallery4.jpg'),
(44, 30, 'bali_myna_gallery5.jpg'),
(45, 31, 'Pycnonotus_zeylanicus,Straw-headed_Bulbul,I_LHT25501.jpg'),
(46, 31, 'Pycnonotus-zeylanicus-_Bronze-Cheung-Kwok-Yee.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `password`, `email`, `role`) VALUES
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'teambirdie@polinema.ac.id', 1),
(13, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 1),
(15, 'coba', '09e5fe239e874ac64aba812978e8f239', 'coba123@gmail.com', 2),
(16, 'test', 'cc03e747a6afbbcbf8be7668acfebee5', 'test@gmail.com', 2),
(17, 'oke123', '3c6ff13b2a3cad695783dbf94128f2aa', 'oke123@gmail.com', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `burung`
--
ALTER TABLE `burung`
  ADD PRIMARY KEY (`id_burung`);

--
-- Indeks untuk tabel `detail_burung`
--
ALTER TABLE `detail_burung`
  ADD PRIMARY KEY (`id_detail_burung`),
  ADD KEY `Detail_Burung` (`fk_burung`);

--
-- Indeks untuk tabel `gallery_burung`
--
ALTER TABLE `gallery_burung`
  ADD PRIMARY KEY (`id_gallery`),
  ADD KEY `fk_detail_burung` (`fk_detail_burung`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `burung`
--
ALTER TABLE `burung`
  MODIFY `id_burung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `detail_burung`
--
ALTER TABLE `detail_burung`
  MODIFY `id_detail_burung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `gallery_burung`
--
ALTER TABLE `gallery_burung`
  MODIFY `id_gallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_burung`
--
ALTER TABLE `detail_burung`
  ADD CONSTRAINT `Detail_Burung` FOREIGN KEY (`fk_burung`) REFERENCES `burung` (`id_burung`);

--
-- Ketidakleluasaan untuk tabel `gallery_burung`
--
ALTER TABLE `gallery_burung`
  ADD CONSTRAINT `gallery_burung_ibfk_1` FOREIGN KEY (`fk_detail_burung`) REFERENCES `detail_burung` (`id_detail_burung`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
