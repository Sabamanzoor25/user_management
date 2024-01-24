-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2022 at 10:25 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ums2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` smallint(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `username`, `password`) VALUES
(1, 'admin', 'test123');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `bid` int(11) NOT NULL,
  `vid` smallint(6) NOT NULL,
  `bill` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `nid` smallint(6) NOT NULL,
  `type` varchar(20) NOT NULL,
  `notification` varchar(20) NOT NULL,
  `vid` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `pid` smallint(6) NOT NULL,
  `ptype` varchar(20) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `cpu` smallint(6) NOT NULL,
  `gpu` smallint(6) DEFAULT NULL,
  `ram` smallint(6) NOT NULL,
  `os` varchar(20) NOT NULL,
  `stype` varchar(10) NOT NULL,
  `ssize` int(11) NOT NULL,
  `pricingtype` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `vname` varchar(20) NOT NULL,
  `appname` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`pid`, `ptype`, `pname`, `cpu`, `gpu`, `ram`, `os`, `stype`, `ssize`, `pricingtype`, `price`, `vname`, `appname`) VALUES
(1, 'VM', 'V-Platinum(Dr Ali)', 4, 1, 32, 'Windows', 'HDD', 100, 'M', '0', 'V-Platinum-1', ''),
(2, 'VM', 'ubuntu-VPltnm1-(Dr A', 4, 1, 32, 'Linux', 'HDD', 100, 'M', '0', 'ubntu-VPltnm1-1', ''),
(3, 'VApps', 'V-App(Office)', 4, 0, 16, 'Windows', 'HDD', 100, 'M', '0', 'VAPPS-3', 'Microsoft Office'),
(4, 'VApps', 'V-App(PDF Architect)', 4, 0, 16, 'Windows', 'HDD', 100, 'M', '0', 'VAPPS-3', 'PDF Architect'),
(5, 'VApps', 'V-App(Matlab)', 4, 0, 16, 'Windows', 'HDD', 100, 'M', '0', 'VAPPS-3', 'Matlab'),
(6, 'VApps', 'V-App(CHROME)', 4, 0, 16, 'Windows', 'HDD', 100, 'M', '0', 'VAPPS-3', 'Google Chrome'),
(7, 'VApps', 'V-App(Firefox)', 4, 0, 16, 'Windows', 'HDD', 100, 'M', '0', 'VAPPS-3', 'Firefox'),
(8, 'VApps', 'V-App(VLC)', 4, 0, 16, 'Windows', 'HDD', 100, 'M', '0', 'VAPPS-3', 'VLC'),
(9, 'VApps', 'V-App(Spyder)', 4, 0, 16, 'Windows', 'HDD', 100, 'M', '0', 'VAPPS-2', 'Spyder'),
(10, 'VApps', 'V-App(RStudio)', 4, 0, 16, 'Windows', 'HDD', 100, 'M', '0', 'VAPPS-2', 'RStudio'),
(11, 'VApps', 'V-App(UMS)', 4, 0, 16, 'Windows', 'HDD', 100, 'M', '0', 'VAPPS-2', 'UMS'),
(12, 'VApps', 'V-App(OCTAVE)', 4, 0, 16, 'Windows', 'HDD', 100, 'M', '0', 'VAPPS-1', 'OCTAVE');

-- --------------------------------------------------------

--
-- Table structure for table `registerclient`
--

CREATE TABLE `registerclient` (
  `cid` smallint(6) NOT NULL,
  `username` varchar(20) NOT NULL,
  `organ` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `cell` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registerclient`
--

INSERT INTO `registerclient` (`cid`, `username`, `organ`, `email`, `cell`, `address`, `type`) VALUES
(1, 'Dr Ali', 'NED University', 'alibaluja@gmail.com', '03002255856', 'University road ,Karachi.', 'ned');

-- --------------------------------------------------------

--
-- Table structure for table `registeruser`
--

CREATE TABLE `registeruser` (
  `uid` smallint(6) NOT NULL,
  `UserId` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registeruser`
--

INSERT INTO `registeruser` (`uid`, `UserId`, `password`) VALUES
(1, 'DrAli', 'Cise1234'),
(2, 'ncbc-k', 'P@ssw0rd');

-- --------------------------------------------------------

--
-- Table structure for table `vworlduser`
--

CREATE TABLE `vworlduser` (
  `vid` smallint(6) NOT NULL,
  `cid` smallint(11) NOT NULL,
  `uid` smallint(11) NOT NULL,
  `pid` smallint(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `assigndate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vworlduser`
--

INSERT INTO `vworlduser` (`vid`, `cid`, `uid`, `pid`, `duration`, `assigndate`) VALUES
(1, 1, 1, 1, 12, '2022-06-01 13:08:05'),
(3, 1, 1, 2, 12, '2022-06-01 13:09:27'),
(4, 1, 1, 3, 12, '2022-06-08 11:29:25'),
(5, 1, 1, 4, 12, '2022-06-08 11:29:39'),
(6, 1, 1, 5, 12, '2022-06-08 11:30:02'),
(7, 1, 1, 6, 12, '2022-06-08 11:30:58'),
(8, 1, 1, 7, 12, '2022-06-08 11:31:19'),
(9, 1, 1, 8, 12, '2022-06-08 11:32:05'),
(10, 1, 1, 9, 12, '2022-06-08 11:34:42'),
(11, 1, 1, 10, 12, '2022-06-08 11:35:33'),
(12, 1, 1, 11, 12, '2022-06-08 11:35:56'),
(13, 1, 1, 12, 12, '2022-06-08 11:36:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD KEY `bill_vworld` (`vid`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`nid`),
  ADD KEY `bill-vworld` (`vid`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `registerclient`
--
ALTER TABLE `registerclient`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `registeruser`
--
ALTER TABLE `registeruser`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `vworlduser`
--
ALTER TABLE `vworlduser`
  ADD PRIMARY KEY (`vid`),
  ADD KEY `vworld-user-client` (`cid`),
  ADD KEY `vworld-user-pack` (`pid`),
  ADD KEY `vworld-user-user` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` smallint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `nid` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `pid` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `registerclient`
--
ALTER TABLE `registerclient`
  MODIFY `cid` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registeruser`
--
ALTER TABLE `registeruser`
  MODIFY `uid` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vworlduser`
--
ALTER TABLE `vworlduser`
  MODIFY `vid` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing`
--
ALTER TABLE `billing`
  ADD CONSTRAINT `bill_vworld` FOREIGN KEY (`vid`) REFERENCES `vworlduser` (`vid`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `bill-vworld` FOREIGN KEY (`vid`) REFERENCES `vworlduser` (`vid`);

--
-- Constraints for table `vworlduser`
--
ALTER TABLE `vworlduser`
  ADD CONSTRAINT `vworld-user-client` FOREIGN KEY (`cid`) REFERENCES `registerclient` (`cid`),
  ADD CONSTRAINT `vworld-user-pack` FOREIGN KEY (`pid`) REFERENCES `package` (`pid`),
  ADD CONSTRAINT `vworld-user-user` FOREIGN KEY (`uid`) REFERENCES `registeruser` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
