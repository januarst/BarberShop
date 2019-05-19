-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2018 at 02:52 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyekpsw`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `message` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`ID`, `User_ID`, `message`, `status`) VALUES
(1, 2, 'Saya ingin memesan 2 tempat duduk, dan saya a', 'TERIMA');

-- --------------------------------------------------------

--
-- Table structure for table `belanjaku`
--

CREATE TABLE `belanjaku` (
  `ID` int(11) NOT NULL,
  `Produk_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Transaksi_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Produk_ID` int(11) NOT NULL,
  `Harga` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Diskon` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jasa`
--

CREATE TABLE `jasa` (
  `ID` int(11) NOT NULL,
  `nama_Jasa` varchar(45) DEFAULT NULL,
  `harga_Jasa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jasa`
--

INSERT INTO `jasa` (`ID`, `nama_Jasa`, `harga_Jasa`) VALUES
(1, 'Botak Licin', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `ID` int(11) NOT NULL,
  `Pembelian_ID` int(11) NOT NULL,
  `Pembelian_User_ID` int(11) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `totalHarga` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`ID`, `Pembelian_ID`, `Pembelian_User_ID`, `status`, `totalHarga`, `quantity`) VALUES
(4, 1, 2, 'PENDING', 7500, 1),
(5, 2, 2, 'PENDING', 7500, 1),
(6, 3, 2, 'PENDING', 7500, 1),
(7, 4, 2, 'PENDING', 7500, 1),
(8, 5, 2, 'PENDING', 7500, 1),
(9, 1, 2, 'PENDING', 7500, 1),
(10, 2, 2, 'PENDING', 7500, 1),
(11, 3, 2, 'PENDING', 7500, 1),
(12, 4, 2, 'PENDING', 7500, 1),
(13, 5, 2, 'PENDING', 7500, 1),
(14, 6, 2, 'PENDING', 7500, 1),
(15, 1, 2, 'PENDING', 7500, 1),
(16, 2, 2, 'PENDING', 7500, 1),
(17, 3, 2, 'PENDING', 7500, 1),
(18, 4, 2, 'PENDING', 7500, 1),
(19, 5, 2, 'PENDING', 7500, 1),
(20, 6, 2, 'PENDING', 7500, 1),
(21, 7, 2, 'PENDING', 7500, 1),
(22, 1, 2, 'PENDING', 15000, 1),
(23, 2, 2, 'PENDING', 15000, 1),
(24, 3, 2, 'PENDING', 15000, 1),
(25, 4, 2, 'PENDING', 15000, 1),
(26, 5, 2, 'PENDING', 15000, 1),
(27, 6, 2, 'PENDING', 15000, 1),
(28, 7, 2, 'PENDING', 15000, 1),
(29, 8, 2, 'PENDING', 15000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kupon`
--

CREATE TABLE `kupon` (
  `ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `cupon_code` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kupon`
--

INSERT INTO `kupon` (`ID`, `User_ID`, `cupon_code`, `status`) VALUES
(1, 1, 'if318029sk', 'BELUM');

-- --------------------------------------------------------

--
-- Table structure for table `manual`
--

CREATE TABLE `manual` (
  `ID` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `produk` varchar(45) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manual`
--

INSERT INTO `manual` (`ID`, `nama`, `produk`, `quantity`, `harga`) VALUES
(0, 'Boy Hutagaol', 'Kacang Atom', 1, 4500);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Produk_ID` int(11) NOT NULL,
  `Harga` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Diskon` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`ID`, `User_ID`, `Produk_ID`, `Harga`, `Quantity`, `Diskon`) VALUES
(1, 2, 1, 10000, 1, 25),
(2, 2, 1, 10000, 1, 25),
(3, 2, 1, 10000, 1, 25),
(4, 2, 1, 10000, 1, 25),
(5, 2, 1, 10000, 1, 25),
(6, 2, 1, 10000, 1, 25),
(7, 2, 1, 10000, 1, 25),
(8, 2, 1, 20000, 2, 25);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `ID` int(11) NOT NULL,
  `nama_Produk` varchar(45) DEFAULT NULL,
  `harga_Produk` int(11) DEFAULT NULL,
  `code_Produk` varchar(45) DEFAULT NULL,
  `image_Produk` text,
  `diskon` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`ID`, `nama_Produk`, `harga_Produk`, `code_Produk`, `image_Produk`, `diskon`) VALUES
(1, 'Kacang Atom', 10000, 'If317028', '../produk-images/download (3).jpg', 25);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `ID` int(11) NOT NULL,
  `bukti` text,
  `status` varchar(45) DEFAULT NULL,
  `Konfirmasi_ID` int(11) NOT NULL,
  `totalHarga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`ID`, `bukti`, `status`, `Konfirmasi_ID`, `totalHarga`) VALUES
(1, '../bukti/download (5).jpg', 'DIKIRIM', 4, 7500);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `username` varbinary(45) DEFAULT NULL,
  `password` varbinary(45) DEFAULT NULL,
  `peran` int(10) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `password`, `peran`) VALUES
(1, 0x61646d696e, 0x61646d696e, 0000000001),
(2, 0x626f79, 0x626f79, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userdetail`
--

CREATE TABLE `userdetail` (
  `ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Nama` varchar(201) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetail`
--

INSERT INTO `userdetail` (`ID`, `User_ID`, `Nama`, `Email`) VALUES
(1, 2, 'Boy Hutagaol', 'andikahutagaol@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`ID`,`User_ID`),
  ADD KEY `fk_Appointment_User1` (`User_ID`);

--
-- Indexes for table `belanjaku`
--
ALTER TABLE `belanjaku`
  ADD PRIMARY KEY (`ID`,`Produk_ID`,`User_ID`,`Transaksi_ID`),
  ADD KEY `fk_Belanjaku_Produk1` (`Produk_ID`),
  ADD KEY `fk_Belanjaku_User1` (`User_ID`),
  ADD KEY `fk_Belanjaku_Transaksi1` (`Transaksi_ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`,`User_ID`,`Produk_ID`),
  ADD KEY `fk_Cart_User1` (`User_ID`),
  ADD KEY `fk_Cart_Produk1` (`Produk_ID`);

--
-- Indexes for table `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`ID`,`Pembelian_ID`,`Pembelian_User_ID`),
  ADD KEY `fk_Konfirmasi_Pembelian1` (`Pembelian_ID`,`Pembelian_User_ID`);

--
-- Indexes for table `kupon`
--
ALTER TABLE `kupon`
  ADD PRIMARY KEY (`ID`,`User_ID`),
  ADD KEY `fk_Kupon_User1` (`User_ID`);

--
-- Indexes for table `manual`
--
ALTER TABLE `manual`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`ID`,`User_ID`,`Produk_ID`),
  ADD KEY `fk_User_has_Produk_Produk1` (`Produk_ID`),
  ADD KEY `fk_User_has_Produk_User1` (`User_ID`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`ID`,`Konfirmasi_ID`),
  ADD KEY `fk_Transaksi_Konfirmasi1` (`Konfirmasi_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userdetail`
--
ALTER TABLE `userdetail`
  ADD PRIMARY KEY (`ID`,`User_ID`),
  ADD KEY `fk_UserDetail_User1` (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `belanjaku`
--
ALTER TABLE `belanjaku`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jasa`
--
ALTER TABLE `jasa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `kupon`
--
ALTER TABLE `kupon`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userdetail`
--
ALTER TABLE `userdetail`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `fk_Appointment_User1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `belanjaku`
--
ALTER TABLE `belanjaku`
  ADD CONSTRAINT `fk_Belanjaku_Produk1` FOREIGN KEY (`Produk_ID`) REFERENCES `produk` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Belanjaku_Transaksi1` FOREIGN KEY (`Transaksi_ID`) REFERENCES `transaksi` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Belanjaku_User1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_Cart_Produk1` FOREIGN KEY (`Produk_ID`) REFERENCES `produk` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Cart_User1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD CONSTRAINT `fk_Konfirmasi_Pembelian1` FOREIGN KEY (`Pembelian_ID`,`Pembelian_User_ID`) REFERENCES `pembelian` (`ID`, `User_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `kupon`
--
ALTER TABLE `kupon`
  ADD CONSTRAINT `fk_Kupon_User1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `fk_User_has_Produk_Produk1` FOREIGN KEY (`Produk_ID`) REFERENCES `produk` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_User_has_Produk_User1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_Transaksi_Konfirmasi1` FOREIGN KEY (`Konfirmasi_ID`) REFERENCES `konfirmasi` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `userdetail`
--
ALTER TABLE `userdetail`
  ADD CONSTRAINT `fk_UserDetail_User1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
