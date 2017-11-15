-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 14, 2017 at 11:28 PM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'Silver', '31368cb092d919fecd01c8c21235db14');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `staff_id` int(250) NOT NULL,
  `date` date NOT NULL,
  `time_in` time DEFAULT NULL,
  `time_out` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `staff_id`, `date`, `time_in`, `time_out`) VALUES
(1, 10, '2017-08-14', '20:52:49', '23:21:07'),
(2, 8, '2017-08-14', '22:54:06', '23:19:54'),
(3, 10, '2017-08-14', '22:56:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `married` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `image` varchar(150) NOT NULL,
  `staff_id` varchar(250) NOT NULL,
  `department` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `start` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `username`, `password`, `name`, `sex`, `phone`, `married`, `address`, `email`, `occupation`, `state`, `country`, `image`, `staff_id`, `department`, `designation`, `start`) VALUES
(2, 'peterson', '$2y$10$2/zKCHWaROC5WTYtzCHSTu7FTEWCWF4usbZX4MOtrqpWx3ZVbwpc2', 'Mike Glory Melas', 'Female', '8036530549', 'Married', '501 Mbiama, INEC Junction', 'glory.devsq@olotusoft.com', 'Graphic Designer', 'Rivers State', 'Nigeria', '5985d6a749c507.12846028.jpg', '234', 'Information Technology', 'Central Unit', '2017-08-11'),
(3, 'useme', '$2y$10$ulAMwFOPuxOjVLvF.Imq9ORNFFyLTu0lzgj1y.tiY.WXM7OpfGmcu', 'Admin Michael Domince', 'Male', '080944893344', 'Devours', '1 khana street D/line port harcourt', 'heavensgatenigeria@gmail.com', 'Graphic Designer', 'Akwa Ibom', 'Ghana', '5985d75f616342.77379913.png', '1', 'Computer', 'Central Unit F4', '1998-10-29'),
(4, 'mikedev', '$2y$10$gFbJuoHkp6fw62n34.MmAeWb/wMtY5e6.M/6GBIzrU6s8D0hkSPoa', 'Mike Osoho', 'Male', '08023758526', 'Single', 'Block A ITT Building FOT, Onne, Eleme', 'member@member.com', 'Web Devloper', 'Akwa Ibom', 'Canada', '5985ebbc14c8e2.62927188.jpg', '01', 'Web Development', 'Central Unit', '2017-07-15'),
(5, 'joemercy', '$2y$10$rX2RCtwU7ULSGp0vzV0wxO7UKjZU6Ritoz3ybiLc1FswELAPJcfFu', 'Adam Mercy Joe', 'Female', '09084883333', 'Married', '1 haba street D/line port harcourt', 'mykizz2010@gmail.com', 'Electrician', 'Cross Rivers', 'Nigeria', '5985f7aac86e48.25145101.jpg', '2', 'Electrical', 'Field Worker', '2000-04-12'),
(6, 'johngrace', '$2y$10$Pfkwkh2pyCunMAAmIOVJie6o7WaK9Iz7j4nf.P4D9WJ5mgki8G2hu', 'Grace Phil Johnson', 'Sex', '09084856666', 'Marital Status', '1 khana street D/line port harcourt', 'jo-grace@gmail.com', 'Civic Servant ', 'Enugu', 'Togo', '5985f8bb1cfd49.70485938.jpg', '3', 'Human Resources', 'Central Unit Block B', '2011-01-30'),
(7, 'adamwilli', '$2y$10$P.VUC.xUftAfZFuP9glEhO3WESFt.AZOQJmhDUkI9ZgFmAENIg0Y2', 'Adam William Paully', 'Sex', '08094893300', 'Marital Status', '1 Isokpo street D/line port harcourt', 'adam@gmail.com', 'Graphic Designer', 'Cross Rivers', 'Brazilian', '5989f18e115de8.72572868.jpg', '4', 'Electrical', 'Central Unit Main', '2000-04-10'),
(8, 'melasadmin', 'db84f1697c9979a605ca74cedba13bf5', 'Melas Olotu Square', 'Male', '08094893344', 'Single', '1 khana street D/line port harcourt', 'melas@melas.com', 'PHP, Laravel Programmer', 'Abia State', 'Nigerian', '598e25a84384d2.18207194.jpg', '5', 'Programming', 'Olotusqaure Central Unit', '2001-02-28'),
(9, 'sliver25', '$2y$10$qr5iZVmuAErOxLUaFNoeCeqP0fc1XayHedDXU55ZZtFdELbQ0A32q', 'Nwekpe Sylvester', 'Male', '080944893344', 'Single', '12 haba street D/line port harcourt', 'silver@gmail.com', 'Engineer', 'Abia State', 'Nigeria', '59904607c1a282.74035986.jpg', '25', 'IT department', 'Technical Director', '2015-02-12'),
(10, 'sylver20', '$2y$10$n2.UwOgn0HVI.1TKDhqeeunClctEIG4eDVcibYuMsVXlZWwmGJwle', 'Nwekpe Sylvester Michael', 'Male', '09084856666', 'Single', '11 Isokpo street D/line port harcourt', 'sylverlyn@gmail.com', 'Civic Engineer', 'Cross Rivers', 'Canada', '5990bfe110fd13.79930264.jpg', '20', 'Accounting', 'Supervisor ', '2001-03-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
