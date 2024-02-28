-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Feb 2024 pada 07.21
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery_v2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `album`
--

CREATE TABLE `album` (
  `albumid` int(11) NOT NULL,
  `namaalbum` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggaldibuat` date NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `album`
--

INSERT INTO `album` (`albumid`, `namaalbum`, `deskripsi`, `tanggaldibuat`, `userid`) VALUES
(1, 'Otomotif', ' Foto seputar permsinan kendaraan', '2024-02-21', 1),
(2, 'Peliharaan', 'Foto seputar binatang peliharaan', '2024-02-07', 1),
(3, 'Anime', 'Foto seputar gambar kartun', '2024-02-07', 1),
(4, 'Pemandangan', 'Foto tentang keindahan dunia yang memanjakan manta', '2024-02-08', 1),
(5, 'Anime', 'Foto karakter anime', '2024-02-10', 2),
(6, 'Anime', 'Foto anime', '2024-02-12', 3),
(7, 'Anime', 'Foto anime', '2024-02-12', 5),
(8, 'Anime', 'foto karakter anime', '2024-02-12', 4),
(9, 'Hewan', 'Foto tentang berbagai macam hewan', '2024-02-18', 4),
(10, 'Game', 'Foto tentang gam pubg', '2024-02-19', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `fotoid` int(11) NOT NULL,
  `judulfoto` varchar(255) NOT NULL,
  `deskripsifoto` text NOT NULL,
  `tanggaldiunggah` date NOT NULL,
  `lokasifile` varchar(255) NOT NULL,
  `albumid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`fotoid`, `judulfoto`, `deskripsifoto`, `tanggaldiunggah`, `lokasifile`, `albumid`, `userid`) VALUES
(8, 'Gunung Fuji', 'Gunung paling indah di Jepang negri Sakura', '2024-02-21', '1266461590-Gunung Fuji.jpeg', 4, 1),
(9, 'Kucing', 'Kucing peliharaan yang paling banyak dipelihara manusia', '2024-02-08', '327918603-Kucing.webp', 2, 1),
(11, 'Lamborgini', 'Kendaraan berasal dari Indonesia yang mendunia', '2024-02-08', '1466650598-lamborghini-aventador-lp-780-4-ultimae.jpg', 1, 1),
(12, 'Violet Evergarden', 'Karakter animasi dari anime Violet Evergarden', '2024-02-09', '1106177053-image.jpg', 3, 1),
(13, 'Mikasa Ackerman', 'Karakter anime dari attack on titan', '2024-02-10', '1677354420-aot-sad-mikasa-ackerman-desktop-wallpaper-preview.jpg', 5, 2),
(14, 'Mikasa Ackerman', 'Karakter dari anime attack on titan', '2024-02-21', '860208537-Mikasa.webp', 3, 1),
(15, 'Suzuna Mizuka', 'Karakter khayalan', '2024-02-12', '972838611-image (57).jpg', 6, 3),
(16, 'Lias Sinzi', 'Karakter khayalan sedang memgang secangkir kofie', '2024-02-12', '1728941443-image (67).jpg', 7, 5),
(17, 'Mizuka Inakasayaki', 'Karakter khayalan', '2024-02-12', '268169574-image (70).jpg', 8, 4),
(19, 'Chisato Nishikigi', 'Karakter anime dari anime Lycoris Ricoil', '2024-02-18', '301747355-Chisato.png', 5, 2),
(20, 'Chisato Nishikigi', 'Karakter anime dari anime Lycoris Ricoil', '2024-02-18', '1601021458-Chisato_Nishikigi_Lycoris_HD.jpg', 5, 2),
(21, 'Tsubasa Ozora', 'Karakter anime dari anime Captain Tsubasa', '2024-02-18', '1332466239-tsubasa-games-featured-image.jpg', 5, 2),
(22, 'Hiyuga Koziro', 'Karakter anime dari anime Captain Tsubasa', '2024-02-18', '1468265906-desktop-wallpaper-captain-tsubasa-rise-of-new-champions-will-bet-on-the-most-arcade-captain-tsubasa-rise-of-new-champions.jpg', 5, 2),
(23, 'Harimau Sumatra', 'Harimau berasal dari sumatra yang langka', '2024-02-18', '693741671-Harimau Sumatra.jpeg', 9, 4),
(24, 'Naga Bonar', 'Naga berasal dari kerajaan sejak dinasti ming dan berkelana ke kerajaan majapahit', '2024-02-18', '706833215-HEROSCREEN-WALLPAPER-72523WEWE-min.png', 9, 4),
(25, 'PUBG', 'WWCD', '2024-02-19', '219145487-pubg-battlegrounds-1lbll.jpg', 10, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentarfoto`
--

CREATE TABLE `komentarfoto` (
  `komentarid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `isikomentar` text NOT NULL,
  `tanggalkomentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komentarfoto`
--

INSERT INTO `komentarfoto` (`komentarid`, `fotoid`, `userid`, `isikomentar`, `tanggalkomentar`) VALUES
(2, 8, 1, 'Destinasi yang paling saya ingin kunjungi ketika saya kejepang tuh', '2024-02-12'),
(3, 8, 1, 'Bagus pemandangannya', '2024-02-12'),
(4, 8, 1, 'Aaaa jadi pengen', '2024-02-12'),
(5, 8, 1, 'Aaaaa kasian aaa\r\n', '2024-02-12'),
(9, 11, 3, 'Cuwaww', '2024-02-12'),
(10, 9, 3, 'Neko Nekoni', '2024-02-12'),
(11, 13, 5, 'Wibuuu', '2024-02-12'),
(12, 11, 5, 'Angkot', '2024-02-12'),
(13, 15, 4, 'Lucu kaya kamu', '2024-02-12'),
(14, 14, 4, 'Gambarnya kurang HD bang', '2024-02-12'),
(15, 9, 4, 'Kucing hasil nyuri', '2024-02-12'),
(16, 12, 1, 'Hallo sayang', '2024-02-13'),
(20, 15, 4, 'kanyut', '2024-02-13'),
(21, 25, 6, 'Winner Winner Chicken Diner', '2024-02-19'),
(22, 25, 4, 'Anak PUBG bang!! \r\nMabar Bang', '2024-02-19'),
(28, 14, 1, 'nyolong dimana bang\r\n', '2024-02-20'),
(29, 14, 1, 'Hahahaha', '2024-02-20'),
(30, 14, 1, 'Hahahahah', '2024-02-20'),
(31, 9, 1, 'Hallo Sayang', '2024-02-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `likefoto`
--

CREATE TABLE `likefoto` (
  `likeid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `tanggallike` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `likefoto`
--

INSERT INTO `likefoto` (`likeid`, `fotoid`, `userid`, `tanggallike`) VALUES
(27, 12, 1, '2024-02-11'),
(34, 8, 2, '2024-02-12'),
(36, 13, 1, '2024-02-12'),
(37, 9, 2, '2024-02-12'),
(38, 11, 2, '2024-02-12'),
(39, 12, 2, '2024-02-12'),
(40, 13, 2, '2024-02-12'),
(41, 14, 2, '2024-02-12'),
(42, 8, 3, '2024-02-12'),
(43, 9, 3, '2024-02-12'),
(44, 11, 3, '2024-02-12'),
(45, 13, 3, '2024-02-12'),
(46, 14, 3, '2024-02-12'),
(47, 12, 3, '2024-02-12'),
(48, 15, 3, '2024-02-12'),
(50, 14, 5, '2024-02-12'),
(51, 15, 5, '2024-02-12'),
(52, 8, 5, '2024-02-12'),
(53, 13, 5, '2024-02-12'),
(54, 12, 5, '2024-02-12'),
(55, 11, 5, '2024-02-12'),
(57, 8, 4, '2024-02-12'),
(58, 13, 4, '2024-02-12'),
(59, 15, 4, '2024-02-12'),
(60, 12, 4, '2024-02-12'),
(61, 9, 4, '2024-02-12'),
(62, 16, 1, '2024-02-13'),
(63, 15, 1, '2024-02-13'),
(64, 17, 5, '2024-02-13'),
(66, 16, 5, '2024-02-13'),
(67, 17, 4, '2024-02-13'),
(73, 11, 1, '2024-02-13'),
(75, 9, 1, '2024-02-13'),
(76, 14, 1, '2024-02-18'),
(77, 8, 1, '2024-02-18'),
(78, 19, 2, '2024-02-18'),
(79, 20, 2, '2024-02-18'),
(80, 21, 2, '2024-02-18'),
(81, 22, 2, '2024-02-18'),
(82, 25, 6, '2024-02-19'),
(83, 23, 4, '2024-02-19'),
(84, 24, 4, '2024-02-19'),
(85, 25, 4, '2024-02-19'),
(86, 24, 1, '2024-02-20'),
(87, 20, 1, '2024-02-21'),
(88, 19, 1, '2024-02-21'),
(89, 25, 1, '2024-02-21'),
(90, 21, 1, '2024-02-21'),
(91, 22, 1, '2024-02-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `namalengkap` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `email`, `namalengkap`, `alamat`) VALUES
(1, 'putra', '123', 'putra@gmail.com', 'Putra Nanda S', 'Kp.Gombong'),
(2, 'Adrian', '123', 'adrian@gmail.com', 'Adrian Maulana Suryaddi', 'Kp.Kopri'),
(3, 'Fajar', '123', 'fajar@gmail.com', 'M Fajar Syidiq', 'Kp.Koromoy'),
(4, 'Sandi', '123', 'sandi@gmail.com', 'Sandi Herdiansyah', 'Cibeureum'),
(5, 'Riski', '123', 'riski@gmail.com', 'Riski Aditya', 'Kp.Burujul'),
(6, 'Miftah', '123', 'miftah@gmail.com', 'M Miftah Maruf', 'Ciloa'),
(7, 'abc', 'abc', 'putra@gmail.com', 'M Fajar Syidiq', 'Cibeureum');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`albumid`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`fotoid`),
  ADD KEY `albumid` (`albumid`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD PRIMARY KEY (`komentarid`),
  ADD KEY `fotoid` (`fotoid`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  ADD PRIMARY KEY (`likeid`),
  ADD KEY `fotoid` (`fotoid`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `album`
--
ALTER TABLE `album`
  MODIFY `albumid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `fotoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  MODIFY `komentarid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  MODIFY `likeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`albumid`) REFERENCES `album` (`albumid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foto_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD CONSTRAINT `komentarfoto_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentarfoto_ibfk_2` FOREIGN KEY (`fotoid`) REFERENCES `foto` (`fotoid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  ADD CONSTRAINT `likefoto_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likefoto_ibfk_2` FOREIGN KEY (`fotoid`) REFERENCES `foto` (`fotoid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
