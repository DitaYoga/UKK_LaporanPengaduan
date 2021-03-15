-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2021 at 02:46 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pengaduan`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getPengaduan` (IN `id` INT)  BEGIN
	SELECT * FROM pengaduan WHERE id_pengaduan=id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getPengaduanByStatus` (IN `sts` VARCHAR(10))  BEGIN
	SELECT * FROM pengaduan WHERE status=sts;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `cetaklaporan`
-- (See below for the actual view)
--
CREATE TABLE `cetaklaporan` (
`nik` char(16)
,`tgl_pengaduan` date
,`judul_laporan` varchar(35)
,`isi_laporan` text
,`nama_petugas` varchar(35)
,`tgl_tanggapan` date
,`tanggapan` text
);

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` char(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `telp`, `level`) VALUES
('081212', 'Dita Yoga Radisa', 'dita', 'cc181feb9b44acf4b15c459efec4119a', '0865432624', 'user'),
('091223', 'sukiawann', 'sukiawan', '827ccb0eea8a706c4c34a16891f84e7b', '0934834', 'user'),
('121212', 'Rama M', 'rama', '36226b453eb255f672f118a1ecc1e4ec', '0812435423', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` char(16) NOT NULL,
  `judul_laporan` varchar(35) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('0','proses','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `judul_laporan`, `isi_laporan`, `foto`, `status`) VALUES
(1, '2021-03-08', '081212', 'Pohon Tumbang', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'dustin-belt-unsplash.jpg', 'selesai'),
(2, '2020-02-06', '081212', 'Banjir', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2021-03-06_selada.jpg', 'selesai'),
(3, '2021-03-06', '081212', 'Cabai', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2021-03-06_cabai.jpg', 'selesai'),
(4, '2021-03-08', '121212', 'Fasilitas Umum rusak', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2021-03-06_sawi.jpg', '0'),
(6, '2021-03-12', '091223', 'tes judul', 'isi judul', '2021-03-12_gabrielle-mustapich-IrETCrYmokI-unsplash.jpg', 'selesai'),
(9, '2021-03-15', '121212', 'Banjir di jalan blabla', 'banjir di jalan blabla sudah berlalu sangat lama blabla', '2021-03-15_chris-gallagher-0PHUAtg_2CQ-unsplash.jpg', 'proses'),
(10, '2021-03-15', '121212', 'Fasilitas Rusak', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2021-03-15_paco-s-QgxHQamnkrk-unsplash.jpg', '0');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`) VALUES
(1, 'admin ganteng', 'admin', '0192023a7bbd73250516f069df18b500', '0852728472', 'admin'),
(2, 'petugas 1', 'petugas1', '570c396b3fc856eceb8aa7357f32af1a', '083436465762', 'petugas'),
(10, 'petugas 2', 'petugas2', '1f32aa4c9a1d2ea010adcf2348166a04', '093994', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`) VALUES
(12, 1, '2021-03-06', 'Terimakasih atas laporannya, akan segera kami tanganii', 1),
(14, 2, '2021-03-06', 'Terimakasih atas laporannya, akan segera kami tangani', 1),
(15, 6, '2021-03-12', 'terimakasi atas laporannya', 1),
(16, 3, '2021-03-14', 'Terimakasih atas laporannya, akan segera kami tangani :)', 2);

-- --------------------------------------------------------

--
-- Structure for view `cetaklaporan`
--
DROP TABLE IF EXISTS `cetaklaporan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cetaklaporan`  AS  select `pengaduan`.`nik` AS `nik`,`pengaduan`.`tgl_pengaduan` AS `tgl_pengaduan`,`pengaduan`.`judul_laporan` AS `judul_laporan`,`pengaduan`.`isi_laporan` AS `isi_laporan`,`petugas`.`nama_petugas` AS `nama_petugas`,`tanggapan`.`tgl_tanggapan` AS `tgl_tanggapan`,`tanggapan`.`tanggapan` AS `tanggapan` from ((`pengaduan` join `tanggapan`) join `petugas`) where `pengaduan`.`id_pengaduan` = `tanggapan`.`id_pengaduan` and `tanggapan`.`id_petugas` = `petugas`.`id_petugas` order by `pengaduan`.`tgl_pengaduan` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `nik` (`nik`) USING BTREE;

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD UNIQUE KEY `id_pengaduan` (`id_pengaduan`),
  ADD KEY `tanggapan_ibfk_2` (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `masyarakat` (`nik`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `tanggapan_ibfk_1` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tanggapan_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
