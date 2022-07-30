-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2022 at 06:14 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `traffic_cell`
--

-- --------------------------------------------------------

--
-- Table structure for table `dummy_status`
--

CREATE TABLE `dummy_status` (
  `id` int(11) NOT NULL,
  `signal_id` varchar(11) NOT NULL,
  `status_time` varchar(50) NOT NULL,
  `date1` varchar(20) DEFAULT NULL,
  `time1` varchar(20) DEFAULT NULL,
  `density1` int(11) NOT NULL,
  `density2` int(11) NOT NULL,
  `density3` int(11) NOT NULL,
  `density4` int(11) NOT NULL,
  `sensor_fault` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dummy_status`
--

INSERT INTO `dummy_status` (`id`, `signal_id`, `status_time`, `date1`, `time1`, `density1`, `density2`, `density3`, `density4`, `sensor_fault`) VALUES
(1, 'S2', '2018-04-03T14:16:32.913Z', '2018-04-01', '12:01:40pm', 39, 26, 16, 21, 0),
(2, 'S2', '2018-04-03T14:16:32.913Z', '2018-04-01', '12:12:04pm', 15, 23, 47, 30, 0),
(3, 'S2', '2018-04-03T14:16:32.913Z', '2018-04-02', '11:12:40am', 9, 21, 11, 26, 0),
(4, 'S2', '2018-04-03T14:16:32.913Z', '2018-04-02', '12:11:25pm', 15, 21, 20, 35, 0),
(5, 'S2', '2018-04-03T14:16:32.913Z', '2018-04-03', '01:01:20pm', 40, 22, 5, 35, 0),
(6, 'S2', '2018-04-03T14:16:32.913Z', '2018-04-03', '11:01:40am', 42, 25, 35, 22, 0),
(7, 'S2', '2018-04-03T14:16:32.913Z', '2018-04-04', '12:01:40am', 9, 22, 16, 32, 0),
(8, 'S2', '2018-04-03T14:16:32.913Z', '2018-04-05', '11:37:40am', 10, 22, 15, 35, 0),
(9, 'S2', '2018-04-03T14:16:32.913Z', '2018-04-06', '12:45:40pm', 11, 12, 13, 27, 0),
(10, 'S2', '2018-04-03T14:16:32.913Z', '2018-04-06', '09:19:40am', 41, 25, 17, 29, 0),
(11, 'S2', '2018-04-03T14:16:32.913Z', '2018-04-07', '02:01:40am', 25, 24, 35, 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback_mst`
--

CREATE TABLE `feedback_mst` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `comment` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_mst`
--

INSERT INTO `feedback_mst` (`id`, `user_name`, `email`, `subject`, `comment`) VALUES
(1, 'dhara', 'dhara@gmail.com', 'Abc', 'abcdefgh');

-- --------------------------------------------------------

--
-- Table structure for table `graph_status`
--

CREATE TABLE `graph_status` (
  `id` int(11) NOT NULL,
  `signal_id` varchar(11) NOT NULL,
  `date1` varchar(20) NOT NULL,
  `time1` varchar(20) NOT NULL,
  `density1` int(11) NOT NULL,
  `density2` int(11) NOT NULL,
  `density3` int(11) NOT NULL,
  `density4` int(11) NOT NULL,
  `sensor_fault` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `graph_status`
--

INSERT INTO `graph_status` (`id`, `signal_id`, `date1`, `time1`, `density1`, `density2`, `density3`, `density4`, `sensor_fault`) VALUES
(1, 'S2', '2018-04-01', '12:01:40pm', 39, 26, 16, 21, 0),
(2, 'S2', '2018-04-01', '12:12:04pm', 15, 23, 47, 30, 0),
(3, 'S2', '2018-04-02', '11:12:40am', 9, 21, 11, 26, 0),
(4, 'S2', '2018-04-02', '12:11:40pm', 15, 21, 20, 35, 0),
(5, 'S2', '2018-04-03', '01:01:40pm', 40, 22, 5, 35, 0),
(6, 'S2', '2018-04-03', '11:01:40am', 42, 25, 35, 22, 0),
(7, 'S2', '2018-04-04', '12:15:30pm', 9, 22, 16, 32, 0),
(8, 'S2', '2018-04-05', '12:01:40pm', 10, 22, 15, 35, 0),
(9, 'S2', '2018-04-06', '11:37:40am', 11, 12, 13, 27, 0),
(10, 'S2', '2018-04-06', '12:45:40pm', 41, 25, 17, 29, 0),
(11, 'S2', '2018-04-07', '09:19:40am', 25, 24, 35, 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sensor_mst`
--

CREATE TABLE `sensor_mst` (
  `id` int(11) NOT NULL,
  `signal_id` varchar(11) NOT NULL,
  `sensor_id` varchar(11) NOT NULL,
  `sensor_type` varchar(30) NOT NULL,
  `sensor_status` varchar(11) NOT NULL DEFAULT 'ON'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sensor_mst`
--

INSERT INTO `sensor_mst` (`id`, `signal_id`, `sensor_id`, `sensor_type`, `sensor_status`) VALUES
(1, 'S2', '1', 'Laser', 'ON'),
(2, 'S2', '2', 'Laser', 'ON'),
(3, 'S2', '3', 'Laser', 'ON'),
(4, 'S2', '4', 'Laser', 'ON'),
(5, 'S2', '5', 'Laser', 'ON'),
(6, 'S2', '6', 'Laser', 'ON'),
(7, 'S2', '7', 'Laser', 'ON'),
(8, 'S2', '8', 'Laser', 'ON'),
(9, 'S2', '9', 'Laser', 'ON'),
(10, 'S2', '10', 'Laser', 'ON'),
(11, 'S2', '11', 'Laser', 'ON'),
(12, 'S2', '12', 'Laser', 'ON'),
(13, 'S2', '13', 'Laser', 'ON'),
(14, 'S2', '14', 'Laser', 'ON'),
(15, 'S2', '15', 'Laser', 'ON'),
(16, 'S2', '16', 'Laser', 'ON'),
(19, 'S1', '3', 'Laser', 'ON'),
(17, 'S1', '1', 'Laser', 'ON'),
(30, 'S1', '14', 'Laser', 'ON'),
(29, 'S1', '13', 'Laser', 'ON'),
(18, 'S1', '2', 'Laser', 'ON'),
(20, 'S1', '4', 'Laser', 'ON'),
(21, 'S1', '5', 'Laser', 'ON'),
(22, 'S1', '6', 'Laser', 'ON'),
(23, 'S1', '7', 'Laser', 'ON'),
(24, 'S1', '8', 'Laser', 'ON'),
(25, 'S1', '9', 'Laser', 'ON'),
(26, 'S1', '10', 'Laser', 'ON'),
(27, 'S1', '11', 'Laser', 'ON'),
(28, 'S1', '12', 'Laser', 'ON'),
(31, 'S1', '15', 'Laser', 'ON');

-- --------------------------------------------------------

--
-- Table structure for table `signal_mst`
--

CREATE TABLE `signal_mst` (
  `id` int(11) NOT NULL,
  `signal_id` varchar(11) NOT NULL,
  `area` varchar(200) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `density1` int(11) NOT NULL DEFAULT 1,
  `density2` int(11) NOT NULL DEFAULT 1,
  `density3` int(11) NOT NULL DEFAULT 1,
  `density4` int(11) NOT NULL DEFAULT 1,
  `sensor_fault` int(11) NOT NULL DEFAULT 0,
  `signal_status` varchar(11) NOT NULL DEFAULT 'ON'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signal_mst`
--

INSERT INTO `signal_mst` (`id`, `signal_id`, `area`, `latitude`, `longitude`, `density1`, `density2`, `density3`, `density4`, `sensor_fault`, `signal_status`) VALUES
(2, 'S2', 'Shree Swami Atmanand Saraswati Institute of Technology', 21.2230849, 72.8789325, 3, 2, 1, 1, 0, 'OFF'),
(3, 'S3', 'Athwa Gate Circle, Athwa Gate, Surat, Gujarat', 21.1858486, 72.8108681, 1, 3, 2, 2, 0, 'ON'),
(1, 'S1', 'Kapodra X Roads, Surat, Gujarat ', 21.2173294, 72.8665092, 3, 1, 1, 1, 0, 'ON'),
(4, 'S4', 'Hirabaug Circle, Surat, Gujarat', 21.21579495, 72.86306836, 2, 1, 3, 1, 0, 'ON'),
(5, 'S5', 'Nana Varachha Circle, Surat, Gujarat', 21.22806395, 72.89496433, 1, 1, 1, 1, 0, 'ON'),
(6, 'S6', 'Udhana Darwaja,Surat, Gujarat', 21.1834491, 72.83059735, 2, 1, 4, 2, 0, 'ON'),
(7, 'S7', 'Kargil Chowk, Punagam, Varachha, Surat, Gujarat', 21.21079859, 72.8757661, 1, 1, 1, 1, 0, 'OFF'),
(8, 'S8', 'Majuragate junction, Surat, Gujarat', 21.180773, 72.8184351, 1, 1, 1, 1, 0, 'ON'),
(9, 'S9', 'Sahara Darwaja, New Textile Market, Surat, Gujarat', 21.1880834, 72.8400925, 1, 1, 1, 1, 0, 'ON'),
(10, 'S10', 'Shri Shivaji Maharaj Smarak(Statue) Surat, Gujarat', 21.1941689, 72.8484197, 1, 1, 1, 1, 0, 'OFF');

-- --------------------------------------------------------

--
-- Table structure for table `traffic_brigade`
--

CREATE TABLE `traffic_brigade` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phonenumber` bigint(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `signal_id` varchar(11) NOT NULL,
  `city` varchar(30) NOT NULL,
  `area` varchar(200) NOT NULL,
  `pincode` bigint(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `traffic_brigade`
--

INSERT INTO `traffic_brigade` (`id`, `name`, `email`, `phonenumber`, `address`, `signal_id`, `city`, `area`, `pincode`) VALUES
(1, 'Tiya Sharma', 'Tiya@gmail.com', 8469549545, '58,Akshardham Soc., Motavrachha, Surat', 'S2', 'Surat', 'Shree Swami Atmanand Saraswati Institute of technology', 395006),
(2, 'Dhara Patel', 'dhara.pipaliya25@gmail.com', 9574084239, '39,Shreeji Nagar V2, Dabholi,Surat.', 'S4', 'Surat', 'Hirabaug Circle, Surat, Gujarat', 395006),
(3, 'Aayushi Patel', 'iuc@gmail.com', 9099426804, '19,Bhaktivihar Soc., Hanipark road , Adajan Surat', 'S3', 'Surat', 'Athwa Gate Circle, Athwa Gate, Surat, Gujarat', 395001),
(4, 'Harshita Patel', 'jasoliyaharshita96@gmail.com', 9104645044, 'A-3, Ramkrushna Soc.,L H road,Surat Gujarat', 'S1', 'Surat', 'Kapodra X Roads, Surat, Gujarat', 395006),
(5, 'Aarav patel', 'aaravpatel@gmail.com', 7698099468, '73, Harikrishna Soc., Katargam, Surat', 'S2', 'Surat', 'Shree Swami Atmanand Saraswati Institute of Technology', 395006),
(6, 'Meera Shah', 'meerashah1@gmail.com', 7572805808, 'F-102, Rushikesh Soc., Katargam , Surat', 'S3', 'Surat', 'Athwa Gate Circle, Athwa Gate, Surat, Gujarat', 395001),
(7, 'Test', 'test@gmail.com', 12345678912, '3/843,abc', 'S10', 'surat', 'Shri Shivaji Maharaj Smarak(Statue) Surat, Gujarat', 395004);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dummy_status`
--
ALTER TABLE `dummy_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_mst`
--
ALTER TABLE `feedback_mst`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `graph_status`
--
ALTER TABLE `graph_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sensor_mst`
--
ALTER TABLE `sensor_mst`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signal_mst`
--
ALTER TABLE `signal_mst`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `signal_id` (`signal_id`);

--
-- Indexes for table `traffic_brigade`
--
ALTER TABLE `traffic_brigade`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dummy_status`
--
ALTER TABLE `dummy_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `feedback_mst`
--
ALTER TABLE `feedback_mst`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `graph_status`
--
ALTER TABLE `graph_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sensor_mst`
--
ALTER TABLE `sensor_mst`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `signal_mst`
--
ALTER TABLE `signal_mst`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `traffic_brigade`
--
ALTER TABLE `traffic_brigade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
