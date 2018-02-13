-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2018 at 04:23 PM
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
-- Database: `planning`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_akan_dibeli`
--

CREATE TABLE `barang_akan_dibeli` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `qty` int(5) NOT NULL DEFAULT '1',
  `harga` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_akan_dibeli`
--

INSERT INTO `barang_akan_dibeli` (`id`, `nama`, `qty`, `harga`) VALUES
(56, 'RAM Team Elite Plus Red DDR4 PC19200 2400Mhz 4GB', 1, 700000),
(57, 'dsa', 1, 123);

-- --------------------------------------------------------

--
-- Table structure for table `barang_punya`
--

CREATE TABLE `barang_punya` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `qty` int(5) NOT NULL DEFAULT '1',
  `harga` bigint(20) NOT NULL,
  `spek` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_punya`
--

INSERT INTO `barang_punya` (`id`, `nama`, `qty`, `harga`, `spek`) VALUES
(1, 'Motherboard Asus Maximus IX Formula', 1, 5141000, 'CPU<br>\r\nIntel Socket 1151 for 7th/6th Generation Core i7/Core i5/Core i3/Pentium/Celeron Processors<br>\r\nSupports Intel 14 nm CPU<br>\r\nSupports Intel Turbo Boost Technology 2.0<br><br>\r\n\r\nChipset<br>\r\nIntel Z270<br><br>\r\n\r\nMemory<br>\r\n4 x DIMM, Max. 64GB, DDR4 4133(O.C.)/4000(O.C.)/3866(O.C.)/3733(O.C.)/3600(O.C.)/3466(O.C.)/3400(O.C.)/3333(O.C.)/3300(O.C.)/3200(O.C.)/3000(O.C.)/2800(O.C.)/2666(O.C.)/2400(O.C.)/2133 MHz Non-ECC, Un-buffered Memory<br>\r\nDual Channel Memory Architecture<br>\r\nSupports Intel Extreme Memory Profile (XMP)<br><br>\r\n\r\nGraphic<br>\r\nIntegrated Graphics Processor<br>\r\nMulti-VGA output support : HDMI/DisplayPort 1.2 ports<br>\r\n- Supports HDMI with max. resolution 4096 x 2160 @ 24 Hz<br>\r\n- Supports DisplayPort with max. resolution 4096 x 2304 @ 60 Hz\r\nMaximum shared memory of 1024 MB'),
(2, 'Processor Intel Core i5 7600k Kabylake 3.8GHz LGA1151', 1, 3350000, ''),
(3, 'RAM Team Elite Plus Red DDR4 PC19200 2400Mhz 4GB', 1, 700000, ''),
(4, 'Power Supply Corsair HX750 - 750W Platinum', 1, 2325000, ''),
(5, 'Digital Alarm Clock with LED Light (Black)', 1, 131000, ''),
(6, 'HDMI to HDMI Cable OD 7.3mm - 2 Meters 4k', 1, 40500, ''),
(7, 'VGA to HDMI Converter - Saintholly ST218 - White', 1, 69900, ''),
(9, 'Audio Jack 3.5 - RCA 2 (1-2)', 1, 8000, ''),
(10, 'T Up Magnetic Cable Organizer', 2, 14550, ''),
(11, 'LCD Cleaner 3 In 1', 1, 11000, ''),
(12, 'USB Male to Male Cable (1.5m)', 2, 14000, ''),
(13, 'HDD Caddy Tebal (12.7mm) SATA to SATA3', 1, 129000, ''),
(14, 'Keyboard Gaming Rexus K1-M', 1, 163000, ''),
(15, 'Rummy Cards (Plastic) 100% WSDROYAL', 1, 30000, ''),
(16, 'Mousepad Gaming Rexus KVLAR T1', 1, 68000, ''),
(17, 'Mouse Gaming Rexus X7', 1, 122000, ''),
(18, 'SIM Card Adapter 3 in 1 (Micro, Nano, Mini)', 1, 2000, ''),
(19, 'Travel Spoon (Green)', 1, 9000, ''),
(20, 'Screwdriver 8 in 1 With LED', 1, 12900, ''),
(21, 'Spinner Metal Captain America', 1, 53000, ''),
(22, 'Cooling Pad Gaming Crimson CW-7 Warwolf', 1, 157000, ''),
(23, 'Harddisk Seagate SATA 2.5\" (20gb)', 1, 72000, ''),
(24, 'Casing Fractal Design Define R5 Black', 1, 2100000, ''),
(25, 'Harddisk HGST [Hitachi] (HUA723020ALA641) Ultrastar 7K3000 2TB 64MB 7200RPM', 1, 800000, ''),
(26, 'Express Card USB 3.0 34mm', 1, 150000, ''),
(27, 'Bluetooth Reciever Audio', 1, 50000, ''),
(28, 'Fidget Cube', 1, 32000, ''),
(29, 'Screwdriver 32 in 1 Tools', 1, 25000, ''),
(30, 'Spinner Dragon', 1, 62000, ''),
(31, 'VR Shinecon Sainsonic + Gamepad Bluetooth', 1, 161000, ''),
(32, 'HDD Caddy SATA 12.7mm + DVD/RW External Case 12.7mm', 1, 169000, ''),
(33, 'SSD Samsung 500GB 850 EVO M.2 SATA', 1, 2500000, ''),
(34, 'CPU Cooler Corsair Hydro Seriesâ„¢ H115i 280mm Extreme Performance Liquid', 1, 1990000, '');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(5) NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  `namamedium` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `saldo` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `namalengkap`, `namamedium`, `username`, `password`, `saldo`) VALUES
(8, 'A. A. Bagus Sugiastika Putra', 'Sugiastika', 'GungBagus12', '9F0B8F3E3B0239C05464FAF3EDE4C35E', 500000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_akan_dibeli`
--
ALTER TABLE `barang_akan_dibeli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_punya`
--
ALTER TABLE `barang_punya`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_akan_dibeli`
--
ALTER TABLE `barang_akan_dibeli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `barang_punya`
--
ALTER TABLE `barang_punya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
