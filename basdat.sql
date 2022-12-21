-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2022 at 10:06 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basdat`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertmobil` (IN `in_idmobil` INT, IN `in_merk` VARCHAR(50), IN `in_harga` INT, IN `in_warna` VARCHAR(50), IN `in_tahunpembuatan` DATE, IN `in_pajakberakhir` DATE, IN `in_gambar` VARCHAR(50), IN `in_terjual` VARCHAR(50))  BEGIN
		INSERT INTO mobil (idmobil,merk,harga, warna, tahunpembuatan, pajakberakhir, gambar, terjual)
		VALUES (in_idmobil, in_merk, in_harga, in_warna, in_tahunpembuatan, in_pajakberakhir, in_gambar, in_terjual);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertpembeli` (IN `in_noktp` VARCHAR(50), IN `in_nama` VARCHAR(50), IN `in_ttl` VARCHAR(50), IN `in_gender` VARCHAR(10), IN `in_alamat` VARCHAR(100), IN `in_nohp` VARCHAR(13), IN `in_pembayaran` VARCHAR(20), `in_idmobil` INT)  BEGIN
		INSERT INTO pembeli(noktp, nama, ttl, gender, alamat, nohp, pembayaran, idmobil)
		VALUES (in_noktp, in_nama, in_ttl, in_gender, in_alamat, in_nohp, in_pembayaran, in_idmobil);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambahmobil` (IN `in_idmobil` INT, IN `in_merk` VARCHAR(50), IN `in_harga` INT, IN `in_warna` VARCHAR(50), IN `in_tahunpembuatan` DATE, IN `in_pajakberakhir` DATE, IN `in_gambar` VARCHAR(50))  BEGIN
		INSERT INTO mobil (idmobil,merk,harga, warna, tahunpembuatan, pajakberakhir, gambar)
		VALUES (in_idmobil, in_merk, in_harga, in_warna, in_tahunpembuatan, in_pajakberakhir, in_gambar);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updatemobil` (IN `up_idmobil` INT, IN `up_merk` VARCHAR(50), IN `up_harga` INT, IN `up_warna` VARCHAR(50), IN `up_tahunpembuatan` DATE, IN `up_pajakberakhir` DATE, IN `up_gambar` VARCHAR(50))  BEGIN
		UPDATE mobil SET idmobil = up_idmobil, merk = up_merk, harga = up_harga, warna = up_warna, 
        							tahunpembuatan = up_tahunpembuatan, pajakberakhir = up_pajakberakhir, 
								gambar = up_gambar
		WHERE idmobil = up_idmobil;
		 
	END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detailbeli`
--

CREATE TABLE `detailbeli` (
  `idbeli` int(11) NOT NULL,
  `tanggalpembelian` date NOT NULL,
  `idmobil` int(11) NOT NULL,
  `idpembeli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailbeli`
--

INSERT INTO `detailbeli` (`idbeli`, `tanggalpembelian`, `idmobil`, `idpembeli`) VALUES
(48, '2022-04-11', 111, 67);

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `idmobil` int(11) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `tahunpembuatan` date NOT NULL,
  `pajakberakhir` date NOT NULL,
  `statuspajak` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `terjual` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`idmobil`, `merk`, `harga`, `warna`, `tahunpembuatan`, `pajakberakhir`, `statuspajak`, `gambar`, `terjual`) VALUES
(111, 'honda', 2214234, 'fghd', '2021-11-13', '2022-12-12', 'Aktif', 'mobil5.jpeg', 'soldout.png'),
(1001, 'Honda', 100000000, 'Hitam', '2012-10-31', '2022-10-31', 'Aktif', 'mobil1.jpg', 'tersedia.jpg'),
(1002, 'Daihatsu', 34000000, 'Silver', '2012-02-14', '2022-05-12', 'Aktif', 'mobil2.jpeg', 'tersedia.jpg'),
(1003, 'Toyota', 30000000, 'Biru', '2014-02-14', '2024-11-10', 'Aktif', 'mobil3.jpeg', 'tersedia.jpg'),
(1004, 'Suzuki', 25000000, 'Putih', '2020-03-12', '2021-12-14', 'Tidak Aktif', 'mobil4.jpeg', 'tersedia.jpg');

--
-- Triggers `mobil`
--
DELIMITER $$
CREATE TRIGGER `insertstatus` BEFORE UPDATE ON `mobil` FOR EACH ROW BEGIN
    IF new.pajakberakhir < CURRENT_DATE() THEN
    SET new.statuspajak = "Tidak Aktif";
     ELSE SET new.statuspajak = "Aktif";
END IF;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `statpajak` BEFORE INSERT ON `mobil` FOR EACH ROW BEGIN
    IF new.pajakberakhir < CURRENT_DATE() THEN
    set new.statuspajak = "Tidak Aktif";
     ELSE set new.statuspajak = "Aktif";
END IF;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `idpembeli` int(11) NOT NULL,
  `noktp` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `pembayaran` varchar(20) NOT NULL,
  `idmobil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`idpembeli`, `noktp`, `nama`, `ttl`, `gender`, `alamat`, `nohp`, `pembayaran`, `idmobil`) VALUES
(67, '1234', 'sadsa', 'kapuas, 14-12-1999', 'Perempuan', 'affg', '12314', 'Cash', 111);

--
-- Triggers `pembeli`
--
DELIMITER $$
CREATE TRIGGER `tambahdetailpembeli` AFTER INSERT ON `pembeli` FOR EACH ROW BEGIN
    insert into detailbeli (idpembeli, idmobil, tanggalpembelian) values (new.idpembeli, new.idmobil, current_date()); 

    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `terjual` AFTER INSERT ON `pembeli` FOR EACH ROW begin
    update mobil
    set terjual = "soldout.png"
    where idmobil = new.idmobil;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tersedia` AFTER DELETE ON `pembeli` FOR EACH ROW BEGIN
    UPDATE mobil
    SET terjual = "tersedia.jpg"
    WHERE idmobil = old.idmobil;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `namauser` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `namauser`, `username`, `password`) VALUES
(2, 'Admin', 'admin', '123'),
(3, 'Zeina', 'zeze', '123zeze');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detailbeli`
--
ALTER TABLE `detailbeli`
  ADD PRIMARY KEY (`idbeli`),
  ADD KEY `idmobil` (`idmobil`),
  ADD KEY `idpembeli` (`idpembeli`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`idmobil`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`idpembeli`),
  ADD KEY `idmobil` (`idmobil`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detailbeli`
--
ALTER TABLE `detailbeli`
  MODIFY `idbeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `idpembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detailbeli`
--
ALTER TABLE `detailbeli`
  ADD CONSTRAINT `detailbeli_ibfk_1` FOREIGN KEY (`idmobil`) REFERENCES `mobil` (`idmobil`),
  ADD CONSTRAINT `detailbeli_ibfk_2` FOREIGN KEY (`idpembeli`) REFERENCES `pembeli` (`idpembeli`);

--
-- Constraints for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD CONSTRAINT `pembeli_ibfk_1` FOREIGN KEY (`idmobil`) REFERENCES `mobil` (`idmobil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
