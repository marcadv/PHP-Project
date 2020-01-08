-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2019 at 02:31 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fcibs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblclient`
--

CREATE TABLE `tblclient` (
  `cid` int(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brgy` varchar(50) NOT NULL,
  `mun` varchar(50) NOT NULL,
  `subdate` date NOT NULL,
  `plan` int(20) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblclient`
--

INSERT INTO `tblclient` (`cid`, `name`, `brgy`, `mun`, `subdate`, `plan`, `status`) VALUES
(3, 'Abad, Rose Joy', 'Ma. Socorro', 'St. Bernard', '2019-11-03', 369, 'Connected'),
(4, 'Cadayona, Marilyn', 'Osao', 'San Juan', '2019-11-02', 269, 'Disconnected'),
(5, 'Calimbo, Baltazar', 'Himbangan', 'St. Bernard', '2019-11-01', 369, 'Connected'),
(6, 'Francia, Dan Alexis', 'Somoje', 'San Juan', '2019-11-02', 130, 'Connected'),
(7, 'Omega, Bryan', 'Mahayag', 'St. Bernard', '2019-11-02', 130, 'Disconnected'),
(9, 'Saga, Ricardo', 'San Isidro', 'St. Bernard', '2019-11-06', 369, 'Connected'),
(10, 'Patual, Renz Ariel', 'Mahalo', 'Anahawan', '2019-11-06', 369, 'Connected'),
(11, 'Albert, Leslie', 'Minoyho', 'San Juan', '2019-11-06', 369, 'Connected'),
(12, 'Getes, Ruvy Ann', 'Catmon', 'St. Bernard', '2019-11-06', 369, 'Connected'),
(13, 'Liso, Reyna Ann', 'Bayo', 'Hinunangan', '2019-11-05', 369, 'Connected'),
(14, 'Jariol, Belyn', 'San Jose', 'San Juan', '2019-11-05', 369, 'Connected'),
(15, 'Roxas, Vienna', 'Bayo', 'Hinunangan', '2019-11-05', 369, 'Connected'),
(16, 'Gula, Razel', 'Poblacion', 'Anahawan', '2019-11-05', 369, 'Connected'),
(17, 'Omega, Ana', 'Mahayag', 'St. Bernard', '2019-11-03', 130, 'Connected'),
(18, 'Alaan, Melesa', 'San Isidro', '2', '2019-11-05', 1, '1'),
(19, 'Alaan, Melesa', 'San Isidro', '2', '2019-11-05', 1, '1'),
(21, 'Maget, Justien', 'Catmon', '2', '2019-11-05', 1, '1'),
(22, 'Mahilum, Natividad', 'Catmon', 'St.Bernard', '2019-11-03', 130, 'Connected'),
(23, 'Mahilum, Natividad', 'Catmon', 'St.Bernard', '2019-11-03', 130, 'Connected'),
(24, 'Mahilum, Natividad', 'San Jose', 'San Juan', '2019-11-03', 369, 'Disconnected'),
(25, 'Golez, Catherine', 'Tambis', 'St.Bernard', '2019-11-06', 269, 'Connected'),
(26, 'Golez, Catherine', 'Tambis', 'St.Bernard', '2019-11-06', 269, 'Connected'),
(27, 'Golez, Catherine', 'Tambis', 'St.Bernard', '2019-11-06', 269, 'Connected'),
(28, 'ghgfh', 'San Jose', 'St.Bernard', '2019-11-08', 369, 'Connected'),
(29, 'ghgfh', 'San Jose', 'St.Bernard', '2019-11-08', 369, 'Connected');

-- --------------------------------------------------------

--
-- Table structure for table `tblhistory`
--

CREATE TABLE `tblhistory` (
  `h_id` int(12) NOT NULL,
  `date` date NOT NULL,
  `recnum` varchar(50) NOT NULL,
  `charges` double NOT NULL,
  `payment` double NOT NULL,
  `balance` double NOT NULL,
  `duedate` date NOT NULL,
  `disdate` date NOT NULL,
  `remarks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `user_id` int(12) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`user_id`, `username`, `password`) VALUES
(1, 'marz', '314'),
(2, 'admin', 'bayo'),
(33, 'lyn', 'bayo'),
(70, 'jazy', 'lance'),
(78, 'ton', '312'),
(79, 'bare', 'gwapa'),
(80, '', ''),
(81, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblclient`
--
ALTER TABLE `tblclient`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tblhistory`
--
ALTER TABLE `tblhistory`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblclient`
--
ALTER TABLE `tblclient`
  MODIFY `cid` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tblhistory`
--
ALTER TABLE `tblhistory`
  MODIFY `h_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
