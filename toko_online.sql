-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2021 at 06:49 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(120) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `kategori` varchar(80) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`) VALUES
(1, 'Novel Game Over', 'Novel Game Over by Vallerie Patkar', 'Buku', 99000, 100, 'gameover.jpg'),
(2, '4K UHD LED Smart TV', '4K UHD LED Smart TV Merk Philips', 'Elektronik', 2000000, 800, 'elektronik.jpg'),
(3, 'KAI x Gucci ', 'Kemeja KAI x Gucci Bear Navy', 'Fashion', 5425000, 900, 'fashion.jpg'),
(4, 'EXO Next The Door', 'Film EXO - EXO Next The Dor , Starring All Member EXO', 'Film & Musik', 50000, 900, 'film.jpg'),
(5, 'Apple Smart Watch', 'Jam Tangan - Smart Watch Apple', 'Fashion', 2000000, 900, 'watch21.png'),
(6, 'ZARA Blazzer', 'ZARA Blazzer Black', 'Fashion', 4500000, 900, 'bajucew.png'),
(7, 'Buah Jeruk', 'Buah Jeruk Segar asli dari Malang', 'Makanan & Minuman', 24000, 900, 'instagram-img-06.jpg'),
(10, 'Tomat', 'Tomat Sumowono', 'Buah', 30000, 999, 'img-pro-02.jpg'),
(11, 'Wortel', 'Wortel Besar', 'Buah', 8000, 999, 'img-pro-01.jpg'),
(12, 'Lemon', 'Lemon Buah Segar', 'Buah', 35000, 999, 'instagram-img-04.jpg'),
(14, 'T-Shirt Pria', 'T-Sirt Pria warna Grey', 'Fashion', 340000, 999, 'baju.png'),
(15, 'Xiaomi Redmi Note 4', 'Smartphone Xiaomi Redmi Note 4', 'Handphone', 4000000, 984, 'hp.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id_invoice` int(11) NOT NULL,
  `nama` varchar(56) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_invoice`
--

INSERT INTO `tb_invoice` (`id_invoice`, `nama`, `alamat`, `tgl_pesan`, `batas_bayar`) VALUES
(1, 'Kyungsoo', 'Seoul, South Korea', '2021-06-11 20:11:56', '2021-06-12 20:11:56'),
(2, 'NOVIA NUR ARIFAH', 'SEMARANG', '2021-06-12 20:20:56', '2021-06-13 20:20:56'),
(3, 'ASRORI', 'SEMARANG', '2021-06-12 20:21:29', '2021-06-13 20:21:29'),
(4, 'SITI ZAZIROH', 'SEMARANG', '2021-06-12 20:23:25', '2021-06-13 20:23:25'),
(5, 'NAURA PUTRI MAHIRA', 'SEMARANG', '2021-06-12 20:24:20', '2021-06-13 20:24:20'),
(6, 'NOVIA NUR ARIFAH', 'Seoul', '2021-06-12 20:32:24', '2021-06-13 20:32:24'),
(7, 'NOVIA NUR ARIFAH', 'Seoul', '2021-06-12 20:32:44', '2021-06-13 20:32:44'),
(8, 'TEES', 'Semarang', '2021-06-12 20:35:25', '2021-06-13 20:35:25'),
(9, 'NOVIA NUR ARIFAH', 'Seoul', '2021-06-12 23:47:11', '2021-06-13 23:47:11');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `Id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`Id`, `id_invoice`, `id_barang`, `nama_barang`, `jumlah`, `harga`, `pilihan`) VALUES
(1, 1, 7, '1', 7, 24000, ''),
(2, 2, 7, '1', 7, 24000, ''),
(3, 3, 7, '1', 7, 24000, ''),
(4, 4, 7, '1', 7, 24000, ''),
(5, 5, 3, '1', 3, 5425000, ''),
(7, 7, 3, '1', 3, 5425000, ''),
(8, 8, 2, '1', 2, 2000000, ''),
(9, 9, 15, '1', 15, 4000000, '');

--
-- Triggers `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN
	UPDATE tb_barang SET stok = stok-NEW.jumlah  
    where id_barang = NEW.id_barang;
  END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `role_id`) VALUES
(1, 'admin', 'admin', '123', 1),
(2, 'novia', 'novia', '123', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
