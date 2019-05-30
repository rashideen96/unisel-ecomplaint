-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2019 at 05:29 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomplaint`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `admin_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `role`, `admin_id`, `email`, `password`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_tbl`
--

CREATE TABLE `complaint_tbl` (
  `id` int(11) NOT NULL,
  `complainer_id` int(11) NOT NULL,
  `technician_id` int(11) NOT NULL,
  `no_bilik` varchar(255) NOT NULL,
  `jenis_complaint` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `tarikh` varchar(255) NOT NULL,
  `masa` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint_tbl`
--

INSERT INTO `complaint_tbl` (`id`, `complainer_id`, `technician_id`, `no_bilik`, `jenis_complaint`, `detail`, `tarikh`, `masa`, `status`) VALUES
(20, 0, 0, 'A3-2F-U4', 'electrical', 'rosak', '05/29/2019', '10:30am - 10:30am', NULL),
(21, 0, 0, 'A3-3F-U2', 'electrical', 'lampu rosak', '05/29/2019', '11:00am - 12:30pm', NULL),
(22, 0, 0, 'A3-3F-U2', 'electrical', 'kipas rosak', '05/29/2019', '10:00am - 11:00am', NULL),
(23, 0, 0, 'B3-3F-U4', 'wifi', 'wifi terputus', '29/05/2019', '9:00am - 11:00am', NULL),
(24, 0, 0, 'A3-4F-U2', 'furniture', 'almari tiada tombol', '29/05/2019', '9:30am - 11:00am', NULL),
(25, 8, 1, 'B2-4F-U2', 'wifi', 'wifi selalu terputus', '28/05/2019', '9:30am - 11:00am', 'Closed'),
(26, 1, 2, 'C3-3F-U4', 'furniture', 'perabot rosak', '26/05/2019', '9:00am - 12:30pm', 'Pending'),
(27, 8, 1, 'A3-2F-U2', 'wifi', 'Wifi sentiasa terputus....', '31/05/2019', '10:00am - 1:30pm', 'KIV'),
(28, 8, 1, 'A3-F3-U3', 'electrical', '', '12/05/2019', '10:30am - 11:00am', 'KIV');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `comment` varchar(250) DEFAULT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contractor`
--

CREATE TABLE `contractor` (
  `userId` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `username` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `category` varchar(250) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `staffId` varchar(250) DEFAULT NULL,
  `phoneNum` varchar(250) DEFAULT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contractor`
--

INSERT INTO `contractor` (`userId`, `name`, `username`, `email`, `password`, `category`, `location`, `staffId`, `phoneNum`, `CreatedDate`) VALUES
(1, 'user', 'user', 'user@gmail.com', '123', 'cict', 'bj', '5666', '01222546785', '2018-11-11 20:24:40'),
(2, 'user', 'userbs', 'bs@gmail.com', '123', 'baktisuci', 'sa', '3334', '22213333', '2018-11-12 09:48:42');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_tbl`
--

CREATE TABLE `feedback_tbl` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `maklumbalas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_tbl`
--

INSERT INTO `feedback_tbl` (`id`, `nama`, `email`, `maklumbalas`) VALUES
(1, 'unisel', 'funstudy10@gmail.com', 'testetst');

-- --------------------------------------------------------

--
-- Table structure for table `matric_tbl`
--

CREATE TABLE `matric_tbl` (
  `id` int(11) NOT NULL,
  `matric_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matric_tbl`
--

INSERT INTO `matric_tbl` (`id`, `matric_no`) VALUES
(1, '3164004561');

-- --------------------------------------------------------

--
-- Table structure for table `message_tbl`
--

CREATE TABLE `message_tbl` (
  `id` int(11) NOT NULL,
  `complaint_id` int(11) NOT NULL,
  `mesej` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_tbl`
--

INSERT INTO `message_tbl` (`id`, `complaint_id`, `mesej`) VALUES
(74, 25, 'test'),
(75, 25, 'test'),
(76, 25, 'test'),
(77, 26, 'test1'),
(78, 26, 'mesej dari technician'),
(79, 27, 'mesej dari admin'),
(80, 27, 'farah hensem'),
(81, 27, 'admin prob');

-- --------------------------------------------------------

--
-- Table structure for table `technician`
--

CREATE TABLE `technician` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `staff_id` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `technician`
--

INSERT INTO `technician` (`id`, `role`, `staff_id`, `department`, `name`, `phone_number`, `email`, `password`) VALUES
(1, 'technician', '4444', 'cict', 'cict', '0122222222', 'cict@unisel.edu.my', '123'),
(2, 'technician', '5555', 'ausa', 'ausa', '3445432424', 'ausa@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `upload_img`
--

CREATE TABLE `upload_img` (
  `id` int(11) NOT NULL,
  `complaint_id` int(11) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `img_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload_img`
--

INSERT INTO `upload_img` (`id`, `complaint_id`, `img_name`, `img_path`, `img_type`) VALUES
(22, 20, '1.jpg', 'photo/1.jpg', 'image/jpeg'),
(23, 20, '3d-radiation-sign.jpg', 'photo/3d-radiation-sign.jpg', 'image/jpeg'),
(24, 21, '891256-solid-black-wallpaper.jpg', 'photo/891256-solid-black-wallpaper.jpg', 'image/jpeg'),
(25, 21, '39370611-highway-wallpapers.jpeg', 'photo/39370611-highway-wallpapers.jpeg', 'image/jpeg'),
(26, 22, 'chibi_boboiboy_solar_by_natiasewid-da2bldt.png', 'photo/chibi_boboiboy_solar_by_natiasewid-da2bldt.png', 'image/png'),
(27, 22, 'df.png', 'photo/df.png', 'image/png'),
(28, 23, '415523.jpg', 'photo/415523.jpg', 'image/jpeg'),
(29, 23, '891256-solid-black-wallpaper.jpg', 'photo/891256-solid-black-wallpaper.jpg', 'image/jpeg'),
(30, 24, '39370611-highway-wallpapers.jpeg', 'photo/39370611-highway-wallpapers.jpeg', 'image/jpeg'),
(31, 24, 'df.png', 'photo/df.png', 'image/png'),
(32, 25, 'chibi_boboiboy_solar_by_natiasewid-da2bldt.png', 'photo/chibi_boboiboy_solar_by_natiasewid-da2bldt.png', 'image/png'),
(33, 25, 'df.png', 'photo/df.png', 'image/png'),
(34, 26, '3d-radiation-sign.jpg', 'photo/3d-radiation-sign.jpg', 'image/jpeg'),
(35, 26, '48d836dc98f85c8f85a797ded1e7c869.jpg', 'photo/48d836dc98f85c8f85a797ded1e7c869.jpg', 'image/jpeg'),
(36, 27, '891256-solid-black-wallpaper.jpg', 'photo/891256-solid-black-wallpaper.jpg', 'image/jpeg'),
(37, 27, '39370611-highway-wallpapers.jpeg', 'photo/39370611-highway-wallpapers.jpeg', 'image/jpeg'),
(38, 28, '', 'photo/', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(10) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `username` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `icNum` varchar(250) DEFAULT NULL,
  `matricNum` varchar(250) DEFAULT NULL,
  `phoneNum` varchar(250) DEFAULT NULL,
  `faculty` varchar(250) DEFAULT NULL,
  `location` varchar(250) DEFAULT NULL,
  `programe` varchar(250) DEFAULT NULL,
  `staffPosition` varchar(255) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `role`, `name`, `username`, `email`, `password`, `icNum`, `matricNum`, `phoneNum`, `faculty`, `location`, `programe`, `staffPosition`, `CreatedDate`) VALUES
(1, 'student', 'hafiz che hamid', 'hafiz', 'hafiz@gmail.com', '1', '960407105823', '4164004561', '0133634357', 'fab', 'sa', 'information technology', '', '2018-11-08 08:29:16'),
(2, 'student', 'mirul', 'et', 'et@123', '123', '33', '22', '22', 'fcvac', 'bj', 'it cs', '', '2018-11-08 08:29:27'),
(4, 'staff', 'hafizuddin', 'hafizzuddin', 'hafizzuddin@gmail.com', '123', NULL, '33343', '0122009642', 'fels', 'bj', NULL, 'lecturer', '2018-11-08 08:29:03'),
(5, 'admin', 'admin', 'admin', 'admin@gmail.com', '123', '34434', '3164004561', '0122236014', 'cvac', 'sa', 'it', 'staff', '2019-05-22 20:55:02'),
(6, 'student', 'mirul', 'mirul', 'hafiz@gmail.com', '123', '32223334', '3164004561', '0122236014', 'Faculty Communication Visual Arts & Computing', 'BJ', 'DIT', '', '2019-05-26 10:35:08'),
(8, 'student', 'mirul', 'mirul', 'mirul@gmail.com', '123', '32223334', '3164004561', '0133634357', 'Faculty Communication Visual Arts & Computing', 'BJ', 'it', '', '2019-05-26 12:25:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint_tbl`
--
ALTER TABLE `complaint_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contractor`
--
ALTER TABLE `contractor`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `feedback_tbl`
--
ALTER TABLE `feedback_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matric_tbl`
--
ALTER TABLE `matric_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_tbl`
--
ALTER TABLE `message_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technician`
--
ALTER TABLE `technician`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_img`
--
ALTER TABLE `upload_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaint_tbl`
--
ALTER TABLE `complaint_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contractor`
--
ALTER TABLE `contractor`
  MODIFY `userId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback_tbl`
--
ALTER TABLE `feedback_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `matric_tbl`
--
ALTER TABLE `matric_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message_tbl`
--
ALTER TABLE `message_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `technician`
--
ALTER TABLE `technician`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `upload_img`
--
ALTER TABLE `upload_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
