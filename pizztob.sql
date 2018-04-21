-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2018 at 04:00 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizztob`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(20) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `ukuran` enum('small','medium','large','') NOT NULL,
  `harga` int(11) NOT NULL,
  `status` enum('selesai','belum','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `id_product`, `id_user`, `nama`, `gambar`, `jumlah`, `ukuran`, `harga`, `status`) VALUES
(35, 15, 16, 'Pizza Selai', 'item/pizza/2.jpg', 1, 'small', 20000, 'belum'),
(36, 16, 16, 'Susu', 'item/minuman/7.jpg', 5, 'small', 25000, 'belum'),
(41, 14, 17, 'Pizza Kacang', 'item/pizza/kacang.jpg', 1, 'small', 10000, 'belum'),
(44, 12, 17, 'Pizza Sosis', 'item/pizza/9.jpg', 1, 'small', 15000, 'belum'),
(45, 15, 16, 'Pizza Selai', 'item/pizza/2.jpg', 1, 'medium', 30000, 'belum'),
(46, 15, 16, 'Pizza Selai', 'item/pizza/2.jpg', 1, 'small', 20000, 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `jenis` enum('pizza','minuman') NOT NULL,
  `nama` varchar(200) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `small` int(11) DEFAULT NULL,
  `medium` int(11) DEFAULT NULL,
  `large` int(11) DEFAULT NULL,
  `gambar` varchar(200) NOT NULL,
  `point` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `jenis`, `nama`, `keterangan`, `deskripsi`, `small`, `medium`, `large`, `gambar`, `point`) VALUES
(2, 'minuman', 'Kopi Susu', 'Manis bercampur pahit', 'Manis bercampur pahit', 5000, 0, 0, 'item/minuman/1.jpg', 4),
(9, 'minuman', 'Aneka Jus', 'Jus beragam rasa', 'Beraneka jus dengan ragam rasa yang dapat dipilih sesuka hati.', 10000, 0, 0, 'item/minuman/4.jpg', 5),
(11, 'minuman', 'Tes Manis', 'Sedia hangat dan dingin', 'Menyediakan Tes Manis yang melegakan dahaga, segar memgbuang rasa haus', 5000, 0, 0, 'item/minuman/8.jpg', 10),
(12, 'pizza', 'Pizza Sosis', 'Ready : Small, Medium, Large', 'Pizza enak dengan tambahan sozis yang lezat dan hangat dilidah', 15000, 20000, 25000, 'item/pizza/9.jpg', 8),
(14, 'pizza', 'Pizza Kacang', 'Ready : Small, Medium, Large', 'Inovasi pizza baru yang menghadirkan tambahan kacang pada topping nya dijamin ENAK', 10000, 15000, 20000, 'item/pizza/kacang.jpg', 7),
(15, 'pizza', 'Pizza Selai', 'Ready : Small, Medium, Large', 'Pizza dengan taburan selai yang manis di lidah', 20000, 30000, 40000, 'item/pizza/2.jpg', 3),
(16, 'minuman', 'Susu', 'Tersedia Hangat dan Dingin', 'Susu yang manis dan menyegarkan dahaga', 5000, 0, 0, 'item/minuman/7.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `point` int(30) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `password`, `nama_lengkap`, `email`, `alamat`, `level`, `point`) VALUES
(18, 'tuaroi', 'tuaroi', 'Tua Roy Situmorang', 'tuaroi@gmail.com', '', 'user', 10);

-- --------------------------------------------------------

--
-- Table structure for table `total_harga`
--

CREATE TABLE `total_harga` (
  `id` int(20) NOT NULL,
  `id_user` int(20) DEFAULT NULL,
  `harga` int(50) DEFAULT '0',
  `harga_diskon` int(50) NOT NULL DEFAULT '0',
  `status` enum('belum','lunas') DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `total_harga`
--

INSERT INTO `total_harga` (`id`, `id_user`, `harga`, `harga_diskon`, `status`) VALUES
(3, 16, 95000, 0, 'belum'),
(4, 17, 25000, 0, 'belum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_harga`
--
ALTER TABLE `total_harga`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `total_harga`
--
ALTER TABLE `total_harga`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
