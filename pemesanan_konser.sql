-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2023 at 09:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemesanan_konser`
--

-- --------------------------------------------------------

--
-- Table structure for table `acara`
--

CREATE TABLE `acara` (
  `id_acara` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `artis` varchar(50) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `waktu_konser` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acara`
--

INSERT INTO `acara` (`id_acara`, `nama`, `artis`, `tempat`, `waktu_konser`) VALUES
(1, 'if-fest', 'jkt48', 'Sport Hall', '2023-11-30 18:00:00'),
(2, 'fti-fest', 'reality club', 'GOR Klebengan', '2023-12-20 18:00:00'),
(3, 'upn-fest', 'sheila on 7', 'Auditorium UPN', '2023-12-31 19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `id_acara` int(11) NOT NULL,
  `jenis_kursi` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`id_acara`, `jenis_kursi`, `harga`) VALUES
(1, 'vip', 300000),
(1, 'festival', 150000),
(1, 'regular', 100000),
(2, 'vip', 500000),
(2, 'festival', 300000),
(2, 'regular', 150000),
(3, 'vip', 600000),
(3, 'festival', 400000),
(3, 'regular', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(11) NOT NULL,
  `id_acara` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis_seat` varchar(50) NOT NULL,
  `jumlah_kursi` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `rekening` int(11) NOT NULL,
  `bukti_transfer` longblob NOT NULL,
  `waktu_transaksi` datetime NOT NULL,
  `kode_tiket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `id_acara`, `id_user`, `jenis_seat`, `jumlah_kursi`, `total_harga`, `rekening`, `bukti_transfer`, `waktu_transaksi`, `kode_tiket`) VALUES
(26, 1, 15, 'vip', 5, 1500000, 2321213, 0x54485a72626b7430636c704d516b7468614739615245746f616d644f56335932644655774b314931556c4655533167764d6b564e61564533525430364f7231774b75314d67725a3537545946576e57756a61673d, '2023-11-20 02:26:23', 'YnIyb3BGQ1dZKzFRcWh3NG9MWGVadz09Ojou/jril3kpYzIz6Rb5H2dm'),
(27, 2, 15, 'festival', 5, 1500000, 21313123, 0x536b7473545752784f454a7856456c79536b6842536c466d576a457257486f79656e4a7a555646685755746f6155644756565a756258517a627a30364f6c38536c353971396b4c4544744a30444543474b6e673d, '2023-11-20 02:41:47', 'V0FkdUU4cGYrN3kyakQxZHMvckR3UT09OjoPQCFApCgalXVk4foGgySp'),
(28, 2, 17, 'vip', 4, 2000000, 21313129, 0x5a324a4f61304e714b324576627a417a53326c79556c4e7051324e73636c55764d48706d4b3067724f584259534552735554684a59553145627a30364f6c4f7a7a7247537442596457532b35703178694c2b413d, '2023-11-20 03:41:20', 'LzNweEwyOUtKK20rajdvRGQxdjZDUT09OjrwGhF+dx/crALOpHB2y+RE');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`) VALUES
(15, 'seva', 'seva@gmail.com', 'e1a3d160a7719f812115f185144c5044c7903b955e07736cfe4b264d6cb249d6'),
(16, 'gustian', 'gustian@gmail.com', '51824dfbdfdbd64cff5c439556c9bc856fe999fee594786459f19c60441479a6'),
(17, 'refanda', 'refanda@gmail.com', 'f584273c1397a9fb14e3fe68b87459574367532a89fd0d992167011f50497e34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acara`
--
ALTER TABLE `acara`
  ADD PRIMARY KEY (`id_acara`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acara`
--
ALTER TABLE `acara`
  MODIFY `id_acara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
