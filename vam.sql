-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2022 at 06:08 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vam`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id`, `name`, `username`, `password`) VALUES
(1, 'team software', 'admin', '1234'),
(2, 'tester', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `t_visitor`
--

CREATE TABLE `t_visitor` (
  `id` int(11) NOT NULL,
  `number` varchar(15) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL,
  `toVisit` varchar(50) DEFAULT NULL,
  `purposeVisit` varchar(50) DEFAULT NULL,
  `visitDate` date DEFAULT NULL,
  `vaccineDose1` varchar(50) DEFAULT NULL,
  `vaccineDose2` varchar(50) DEFAULT NULL,
  `vaccineDose3` varchar(50) DEFAULT NULL,
  `vaccineDose4` varchar(50) DEFAULT NULL,
  `vaccineDose5` varchar(50) DEFAULT NULL,
  `doseDate1` date DEFAULT NULL,
  `doseDate2` date DEFAULT NULL,
  `doseDate3` date DEFAULT NULL,
  `doseDate4` date DEFAULT NULL,
  `doseDate5` date DEFAULT NULL,
  `vaccine` varchar(50) DEFAULT NULL,
  `atk` varchar(50) DEFAULT NULL,
  `atkDate` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `question` longtext DEFAULT NULL,
  `timeline` longtext DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_visitor`
--

INSERT INTO `t_visitor` (`id`, `number`, `name`, `company`, `toVisit`, `purposeVisit`, `visitDate`, `vaccineDose1`, `vaccineDose2`, `doseDate1`, `doseDate2`, `atk`, `atkDate`, `status`, `timeline`, `datetime`, `note`) VALUES
(11, '2022012502', 'สุขสบายสุดสุด', 'IPC', 'สุดยอด โชคดี', 'ไม่รู้', '2022-02-05', 'Sinovac', 'Sinovac', '2022-01-01', '2022-01-23', 'negative', '2022-01-25', 'disapproved', '[{\"date\":\"2022-01-24\",\"location\":\"ระยอง - เชียงใหม่\",\"vehicle\":\"รถส่วนตัว\"},{\"date\":\"2022-01-23\",\"location\":\"ระยอง - เชียงใหม่\",\"vehicle\":\"รถบริษัท\"},{\"date\":\"2022-01-22\",\"location\":\"ระยอง - เชียงใหม่\",\"vehicle\":\"รถยนต์/รถไฟฟ้าขนส่งสาธารณะ\"},{\"date\":\"2022-01-21\",\"location\":\"ระยอง - เชียงใหม่\",\"vehicle\":\"รถบริษัท\"},{\"date\":\"2022-01-20\",\"location\":\"ระยอง - เชียงใหม่\",\"vehicle\":\"อื่นๆ\"},{\"date\":\"2022-01-19\",\"location\":\"ระยอง - เชียงใหม่\",\"vehicle\":\"รถยนต์/รถไฟฟ้าขนส่งสาธารณะ\"},{\"date\":\"2022-01-18\",\"location\":\"ระยอง - เชียงใหม่\",\"vehicle\":\"รถส่วนตัว\"},{\"date\":\"2022-01-17\",\"location\":\"ระยอง - เชียงใหม่\",\"vehicle\":\"รถส่วนตัว\"},{\"date\":\"2022-01-16\",\"location\":\"ระยอง - เชียงใหม่\",\"vehicle\":\"รถส่วนตัว\"},{\"date\":\"2022-01-15\",\"location\":\"ระยอง - เชียงใหม่\",\"vehicle\":\"รถบริษัท\"},{\"date\":\"2022-01-14\",\"location\":\"ระยอง - เชียงใหม่\",\"vehicle\":\"รถส่วนตัว\"},{\"date\":\"2022-01-13\",\"location\":\"ระยอง - เชียงใหม่\",\"vehicle\":\"รถส่วนตัว\"},{\"date\":\"2022-01-12\",\"location\":\"ระยอง - เชียงใหม่\",\"vehicle\":\"รถส่วนตัว\"},{\"date\":\"2022-01-11\",\"location\":\"ระยอง - เชียงใหม่\",\"vehicle\":\"รถส่วนตัว\"}]', '2022-01-25 13:37:49', 'ข้อมูลไม่เพียงพอ'),
(12, '2022012503', 'ดีดีมาก', 'คสช.', 'บัลดาล นอนน้อย', 'ย้ายข้อมูล', '2022-02-01', 'Johnson', 'Other', '2021-12-30', '2022-01-23', 'negative', '2022-01-25', 'approve', '[{\"date\":\"2022-01-24\",\"location\":\"พัทยา - ระยอง\",\"vehicle\":\"รถส่วนตัว\"},{\"date\":\"2022-01-23\",\"location\":\"พัทยา - ระยอง\",\"vehicle\":\"รถบริษัท\"},{\"date\":\"2022-01-22\",\"location\":\"พัทยา - ระยอง\",\"vehicle\":\"รถบริษัท\"},{\"date\":\"2022-01-21\",\"location\":\"พัทยา - ระยอง\",\"vehicle\":\"รถส่วนตัว\"},{\"date\":\"2022-01-20\",\"location\":\"พัทยา - ระยอง\",\"vehicle\":\"อื่นๆ\"},{\"date\":\"2022-01-19\",\"location\":\"พัทยา - ระยอง\",\"vehicle\":\"อื่นๆ\"},{\"date\":\"2022-01-18\",\"location\":\"พัทยา - ระยอง\",\"vehicle\":\"รถยนต์/รถไฟฟ้าขนส่งสาธารณะ\"},{\"date\":\"2022-01-17\",\"location\":\"พัทยา - ระยอง\",\"vehicle\":\"รถยนต์/รถไฟฟ้าขนส่งสาธารณะ\"},{\"date\":\"2022-01-16\",\"location\":\"พัทยา - ระยอง\",\"vehicle\":\"รถบริษัท\"},{\"date\":\"2022-01-15\",\"location\":\"พัทยา - ระยอง\",\"vehicle\":\"อื่นๆ\"},{\"date\":\"2022-01-14\",\"location\":\"พัทยา - ระยอง\",\"vehicle\":\"รถบริษัท\"},{\"date\":\"2022-01-13\",\"location\":\"พัทยา - ระยอง\",\"vehicle\":\"รถยนต์/รถไฟฟ้าขนส่งสาธารณะ\"},{\"date\":\"2022-01-12\",\"location\":\"พัทยา - ระยอง\",\"vehicle\":\"รถยนต์/รถไฟฟ้าขนส่งสาธารณะ\"},{\"date\":\"2022-01-11\",\"location\":\"พัทยา - ระยอง\",\"vehicle\":\"รถยนต์/รถไฟฟ้าขนส่งสาธารณะ\"}]', '2022-01-25 13:43:16', ''),
(13, '2022012503', 'โชคดี เสมอ', 'คสช.', 'บัลดาล นอนน้อย', 'ย้ายข้อมูล', '2022-02-01', 'Pfizer', 'Pfizer', '2021-09-28', '2021-11-30', 'Negative', '2022-01-25', 'approve', '[{\"date\":\"2022-01-24\",\"location\":\"เชียงใหม่ - ระยอง\",\"vehicle\":\"รถส่วนตัว\"},{\"date\":\"2022-01-23\",\"location\":\"เชียงใหม่ - ระยอง\",\"vehicle\":\"รถบริษัท\"},{\"date\":\"2022-01-22\",\"location\":\"เชียงใหม่ - ระยอง\",\"vehicle\":\"รถยนต์/รถไฟฟ้าขนส่งสาธารณะ\"},{\"date\":\"2022-01-21\",\"location\":\"เชียงใหม่ - ระยอง\",\"vehicle\":\"รถบริษัท\"},{\"date\":\"2022-01-20\",\"location\":\"เชียงใหม่ - ระยอง\",\"vehicle\":\"รถบริษัท\"},{\"date\":\"2022-01-19\",\"location\":\"เชียงใหม่ - ระยอง\",\"vehicle\":\"รถส่วนตัว\"},{\"date\":\"2022-01-18\",\"location\":\"เชียงใหม่ - ระยอง\",\"vehicle\":\"รถยนต์/รถไฟฟ้าขนส่งสาธารณะ\"},{\"date\":\"2022-01-17\",\"location\":\"เชียงใหม่ - ระยอง\",\"vehicle\":\"รถบริษัท\"},{\"date\":\"2022-01-16\",\"location\":\"เชียงใหม่ - ระยอง\",\"vehicle\":\"รถบริษัท\"},{\"date\":\"2022-01-15\",\"location\":\"เชียงใหม่ - ระยอง\",\"vehicle\":\"รถบริษัท\"},{\"date\":\"2022-01-14\",\"location\":\"เชียงใหม่ - ระยอง\",\"vehicle\":\"รถบริษัท\"},{\"date\":\"2022-01-13\",\"location\":\"เชียงใหม่ - ระยอง\",\"vehicle\":\"รถบริษัท\"},{\"date\":\"2022-01-12\",\"location\":\"เชียงใหม่ - ระยอง\",\"vehicle\":\"รถบริษัท\"},{\"date\":\"2022-01-11\",\"location\":\"เชียงใหม่ - ระยอง\",\"vehicle\":\"รถบริษัท\"}]', '2022-01-25 13:43:16', ''),
(14, '2022012503', 'กวินท์ ศรีสมภาร', 'SNC - SUT', 'โชคดี เสมอ', 'แก้ไขข้อมูล', '2022-02-01', 'AstraZeneca', 'Sinopharm', '2021-12-26', '2022-01-22', 'Negative', '2022-01-25', 'pending', '[{\"date\":\"2022-01-24\",\"location\":\"ระยอง - โคราช\",\"vehicle\":\"รถส่วนตัว\"},{\"date\":\"2022-01-23\",\"location\":\"ระยอง - โคราช\",\"vehicle\":\"รถส่วนตัว\"},{\"date\":\"2022-01-22\",\"location\":\"ระยอง - โคราช\",\"vehicle\":\"รถบริษัท\"},{\"date\":\"2022-01-21\",\"location\":\"ระยอง - โคราช\",\"vehicle\":\"รถบริษัท\"},{\"date\":\"2022-01-20\",\"location\":\"ระยอง - โคราช\",\"vehicle\":\"รถยนต์/รถไฟฟ้าขนส่งสาธารณะ\"},{\"date\":\"2022-01-19\",\"location\":\"ระยอง - โคราช\",\"vehicle\":\"รถส่วนตัว\"},{\"date\":\"2022-01-18\",\"location\":\"ระยอง - โคราช\",\"vehicle\":\"รถยนต์/รถไฟฟ้าขนส่งสาธารณะ\"},{\"date\":\"2022-01-17\",\"location\":\"ระยอง - โคราช\",\"vehicle\":\"อื่นๆ\"},{\"date\":\"2022-01-16\",\"location\":\"ระยอง - โคราช\",\"vehicle\":\"อื่นๆ\"},{\"date\":\"2022-01-15\",\"location\":\"ระยอง - โคราช\",\"vehicle\":\"รถส่วนตัว\"},{\"date\":\"2022-01-14\",\"location\":\"ระยอง - โคราช\",\"vehicle\":\"รถส่วนตัว\"},{\"date\":\"2022-01-13\",\"location\":\"ระยอง - โคราช\",\"vehicle\":\"รถยนต์/รถไฟฟ้าขนส่งสาธารณะ\"},{\"date\":\"2022-01-12\",\"location\":\"ระยอง - โคราช\",\"vehicle\":\"รถบริษัท\"},{\"date\":\"2022-01-11\",\"location\":\"ระยอง - โคราช\",\"vehicle\":\"รถส่วนตัว\"}]', '2022-01-25 16:10:44', ''),
(15, '2022012503', 'โชคดี สุดสุด', 'SNC - SUT', 'โชคดี เสมอ', 'แก้ไขข้อมูล', '2022-02-01', 'Johnson', 'Moderna', '2021-12-01', '2022-01-01', 'Negative', '2022-01-24', 'pending', '[{\"date\":\"2022-01-24\",\"location\":\"กรุงเทพ - ระยอง\",\"vehicle\":\"รถส่วนตัว\"},{\"date\":\"2022-01-23\",\"location\":\"กรุงเทพ - ระยอง\",\"vehicle\":\"รถบริษัท\"},{\"date\":\"2022-01-22\",\"location\":\"กรุงเทพ - ระยอง\",\"vehicle\":\"รถยนต์/รถไฟฟ้าขนส่งสาธารณะ\"},{\"date\":\"2022-01-21\",\"location\":\"กรุงเทพ - ระยอง\",\"vehicle\":\"รถส่วนตัว\"},{\"date\":\"2022-01-20\",\"location\":\"กรุงเทพ - ระยอง\",\"vehicle\":\"รถบริษัท\"},{\"date\":\"2022-01-19\",\"location\":\"กรุงเทพ - ระยอง\",\"vehicle\":\"รถยนต์/รถไฟฟ้าขนส่งสาธารณะ\"},{\"date\":\"2022-01-18\",\"location\":\"กรุงเทพ - ระยอง\",\"vehicle\":\"รถส่วนตัว\"},{\"date\":\"2022-01-17\",\"location\":\"กรุงเทพ - ระยอง\",\"vehicle\":\"อื่นๆ\"},{\"date\":\"2022-01-16\",\"location\":\"กรุงเทพ - ระยอง\",\"vehicle\":\"อื่นๆ\"},{\"date\":\"2022-01-15\",\"location\":\"กรุงเทพ - ระยอง\",\"vehicle\":\"อื่นๆ\"},{\"date\":\"2022-01-14\",\"location\":\"กรุงเทพ - ระยอง\",\"vehicle\":\"รถบริษัท\"},{\"date\":\"2022-01-13\",\"location\":\"กรุงเทพ - ระยอง\",\"vehicle\":\"รถยนต์/รถไฟฟ้าขนส่งสาธารณะ\"},{\"date\":\"2022-01-12\",\"location\":\"กรุงเทพ - ระยอง\",\"vehicle\":\"รถยนต์/รถไฟฟ้าขนส่งสาธารณะ\"},{\"date\":\"2022-01-11\",\"location\":\"กรุงเทพ - ระยอง\",\"vehicle\":\"รถยนต์/รถไฟฟ้าขนส่งสาธารณะ\"}]', '2022-01-25 16:10:44', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_visitor`
--
ALTER TABLE `t_visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_visitor`
--
ALTER TABLE `t_visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
