-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 10, 2014 at 10:20 PM
-- Server version: 5.5.38-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cuti`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE IF NOT EXISTS `bagian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id`, `nama`) VALUES
(1, 'IT'),
(2, 'Marketting'),
(3, 'Keuangan');

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE IF NOT EXISTS `cuti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8_unicode_ci NOT NULL,
  `hak` int(11) NOT NULL,
  `masa_berlaku` int(11) NOT NULL,
  `syarat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id`, `nama`, `deskripsi`, `hak`, `masa_berlaku`, `syarat`) VALUES
(1, 'Besar', '', 21, 1825, ''),
(2, 'Tahunan', '', 12, 365, ''),
(3, 'Bonus', '', 6, 365, '');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `nik` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `tanggal_masuk_kerja` date NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jabatan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`nik`),
  KEY `id_bagian` (`id_bagian`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama`, `id_bagian`, `tanggal_masuk_kerja`, `alamat`, `jabatan`, `username`, `password`, `remember_token`) VALUES
('1', 'Slamet (Karyawan IT)', 1, '2014-01-10', 'Jln. Gatot Subroto', 'karyawan', '1', '$2y$10$5cPZzQDZYsIIbixGi6UdnOULOLLLlyYb3iwGMLPOZM8Q/K.amMZvC', ''),
('12', 'Sukijo (Karyawan Marketting)', 2, '2013-01-10', 'Jln. Markissa', 'karyawan', '12', '$2y$10$uZi/aknbTu6o6RxnUE9LOujJjo0lZNLeX2VDFXCl7aQ0yef/E1XBG', ''),
('123', 'Paijo (Karyawan Keuangan)', 3, '2013-01-01', 'Jln. Jeruk Barat', 'karyawan', '123', '$2y$10$NHX5xS5V2M44F7T6kVnU0egrSeN3ZvxYxrUS.b0pvODDdXGmWTJma', 'UjqqyVgd0LdBVlJlnrVhXK6PJXU1xn2uuNYAsX22pBF3RCGeiQfJJSzmGwpr'),
('1234', 'Priska Tiara (Admin)', 2, '2014-06-01', 'asdfa', 'admin', '1234', '$2y$10$egKO7KoYe9yw3F55mPlrROKZ5P5GxN9E3nCzxGdT3ImrGx/eYom6q', 'J3KosgfdyIk3QxHc3EJn7Le4CJMFb68gwJbgxCjwtfWpyMUNxalEhJqa74AQ'),
('12345', 'Sutarman (Pimpinan IT)', 1, '2011-01-02', 'Jln. Pisang', 'pimpinan', '12345', '$2y$10$0YhNu5PcPy5zGFAzftrFUeFCgbgwPWD4FzOl4zyp9QV.qNYKtY/B.', '798jJh7mQHFcAx6BYjDkr1J6HbGdQugYJqfDAFsAqcKf9FF0mv05R21ZMXvZ'),
('123456', 'Suteja (HR)', 1, '2010-10-10', 'Jln. Kemerdekaan', 'hr', '123456', '$2y$10$Fi4Af6EDuTEjQq7nuEn1oOs0SLKqapDdMR5n4pEKljjQRM10gWbjq', 'tQUkGNhagn7RoczGUyieZh14tLCmIuooElzm01hOI2S5IL9oGhUOXk8HJ2x5'),
('1234567', 'Inem (Pimpinan Marketting)', 2, '2013-01-11', 'Jln. Pemuda', 'pimpinan', '1234567', '$2y$10$fpWk6XmhtbuJuhdYgyQMF.DEq59/QTaDhzj9H7HTTvZaruo3mtnBu', '5OR4fRX8VP6yIV9YFpnsdTjYtwGKMynSltYnE9mdiZr8wFa8TWu5rpWz7TQi'),
('12345678', 'Suratman (Pimpinan Keuangan)', 3, '2010-10-10', 'Jln. Perintis Kemerdekaan', 'pimpinan', '12345678', '$2y$10$g5P/XLez5EZALCeMLfN7P.yKgP2OiImHkwzKDB/LxOsmDMiz74Dlq', '');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE IF NOT EXISTS `notifikasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to` varchar(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `status` varchar(6) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `to`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, '1234', 'Pengajuan Cuti Besar tanggal 3 Agustus 2014, telah disetujui', 'read', '2014-08-05 00:00:00', '2014-08-10 19:50:58'),
(2, '1234', 'Pengajuan Cuti {"id":2,"nama":"Tahunan","deskripsi":"","hak":12,"masa_berlaku":365,"syarat":""}->nama tanggal 2014-08-10 telah disetujui', 'read', '2014-08-10 20:10:19', '2014-08-10 20:14:29'),
(3, '1234', 'Pengajuan CutiTahunantanggal 2014-08-10 telah disetujui', 'read', '2014-08-10 20:13:56', '2014-08-10 20:14:27'),
(4, '1234', 'Pengajuan Cuti Tahunan tanggal 2014-08-10 telah disetujui', 'read', '2014-08-10 20:15:01', '2014-08-10 20:17:05'),
(5, '1234', 'Pengajuan Cuti Tahunan tanggal 2014-08-10 ditolak', 'read', '2014-08-10 20:16:47', '2014-08-10 20:16:58');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_cuti`
--

CREATE TABLE IF NOT EXISTS `pengajuan_cuti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) NOT NULL,
  `id_cuti` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `mulai` date NOT NULL,
  `selesai` date NOT NULL,
  `alasan` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `disetujui_pimpinan` tinyint(1) NOT NULL,
  `disetujui_hr` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nik` (`nik`,`id_cuti`),
  KEY `id_cuti` (`id_cuti`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pengajuan_cuti`
--

INSERT INTO `pengajuan_cuti` (`id`, `nik`, `id_cuti`, `tanggal`, `mulai`, `selesai`, `alasan`, `status`, `disetujui_pimpinan`, `disetujui_hr`) VALUES
(1, '123', 1, '2014-07-14', '2014-06-10', '2014-06-15', 'Pengen Ajah', '<label class=''danger''>Belum Disetujui</label>', 0, 0),
(2, '1234', 1, '2014-07-14', '2014-06-10', '2014-06-15', 'Pengen Aja', '<label class="success">Diterima</label>', 1, 1),
(3, '1234', 2, '2014-07-14', '2014-06-10', '2014-06-12', 'Mau Liburan', '<label class="success">Diterima</label>', 1, 1),
(4, '1234', 2, '2014-08-10', '2014-06-10', '2014-06-12', 'pengennn', '<label class="danger">Ditolak</label>', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `saldo_cuti`
--

CREATE TABLE IF NOT EXISTS `saldo_cuti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id_cuti` int(11) NOT NULL,
  `terpakai` int(11) NOT NULL,
  `saldo` int(11) NOT NULL,
  `expired` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nik` (`nik`),
  KEY `id_cuti` (`id_cuti`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=51 ;

--
-- Dumping data for table `saldo_cuti`
--

INSERT INTO `saldo_cuti` (`id`, `nik`, `id_cuti`, `terpakai`, `saldo`, `expired`) VALUES
(21, '1234', 1, 5, 16, '2020-01-09'),
(22, '1234', 2, 4, 8, '2016-01-10'),
(23, '1234', 3, 0, 6, '2016-01-10'),
(30, '123', 1, 5, 16, '2018-12-31'),
(31, '123', 2, 0, 12, '2015-01-01'),
(32, '123', 3, 0, 6, '2015-01-01'),
(33, '1', 1, 0, 21, '2020-01-09'),
(34, '1', 2, 0, 12, '2016-01-10'),
(35, '1', 3, 0, 6, '2016-01-10'),
(36, '12', 1, 0, 21, '2019-01-09'),
(37, '12', 2, 0, 12, '2015-01-10'),
(38, '12', 3, 0, 6, '2015-01-10'),
(39, '12345', 1, 0, 21, '2016-12-31'),
(40, '12345', 2, 0, 12, '2013-01-01'),
(41, '12345', 3, 0, 6, '2013-01-01'),
(42, '123456', 1, 0, 21, '2016-10-08'),
(43, '123456', 2, 0, 12, '2012-10-09'),
(44, '123456', 3, 0, 6, '2012-10-09'),
(45, '1234567', 1, 0, 21, '2019-01-10'),
(46, '1234567', 2, 0, 12, '2015-01-11'),
(47, '1234567', 3, 0, 6, '2015-01-11'),
(48, '12345678', 1, 0, 21, '2016-10-08'),
(49, '12345678', 2, 0, 12, '2012-10-09'),
(50, '12345678', 3, 0, 6, '2012-10-09');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `pengajuan_cuti`
--
ALTER TABLE `pengajuan_cuti`
  ADD CONSTRAINT `pengajuan_cuti_ibfk_1` FOREIGN KEY (`id_cuti`) REFERENCES `cuti` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `saldo_cuti`
--
ALTER TABLE `saldo_cuti`
  ADD CONSTRAINT `saldo_cuti_ibfk_1` FOREIGN KEY (`id_cuti`) REFERENCES `cuti` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `saldo_cuti_nik_foreign` FOREIGN KEY (`nik`) REFERENCES `karyawan` (`nik`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
