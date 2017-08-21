-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 21, 2017 at 11:14 AM
-- Server version: 5.6.31-0ubuntu0.15.10.1
-- PHP Version: 5.6.11-1ubuntu3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `instagram`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `photo_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `event_name` varchar(80) DEFAULT NULL,
  `event_description` varchar(255) DEFAULT NULL,
  `event_img_name` varchar(255) DEFAULT NULL,
  `event_img_org` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `photo_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(10) NOT NULL,
  `role` varchar(55) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `salt` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `role`, `username`, `password`, `created`, `modified`, `salt`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2017-07-20 16:44:16', '2017-07-20 16:44:16', NULL),
(2, 'checker', 'checker', '9bcf0edc75944b260de8279d7a6d8174', '2017-07-20 16:44:40', '2017-07-20 16:44:40', NULL),
(3, 'maker', 'maker', '35977a76fc8a3239867a67a62cf45f0d', '2017-07-20 16:44:51', '2017-07-20 16:44:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `hash_name` varchar(255) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `type` varchar(15) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `title` varchar(100) DEFAULT NULL,
  `cover_pic` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3993 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `user_id`, `event_id`, `name`, `hash_name`, `size`, `type`, `created`, `status`, `title`, `cover_pic`) VALUES
(2, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-19 04:54:54', 0, NULL, 0),
(3986, NULL, NULL, 'payment_successfull.png', '2e3c31756ad9a343fdea567e787cbded_payment_successfull.png', '233527', 'image/png', '2017-08-19 08:57:49', 0, '', 0),
(3987, NULL, NULL, 'payment_successfull.png', '089a2e9bb25fac04680fb2983848564f_payment_successfull.png', '233527', 'image/png', '2017-08-19 09:02:07', 0, 'bbbbbbbb', 1),
(3988, NULL, NULL, 'payment_successfull.png', 'cc6e60aaf8e4326a2f5501ea28e12525_payment_successfull.png', '233527', 'image/png', '2017-08-19 09:03:43', 0, 'cccccc', 0),
(3989, NULL, NULL, 'payment_successfull.png', 'cb828595fa6eb9cb16669692b4cd5d57_payment_successfull.png', '233527', 'image/png', '2017-08-19 09:05:11', 0, 'bbbbbbbbb', 1),
(3990, NULL, NULL, 'payment_successfull.png', 'eeffec4295fe02bf025a14d6e9af0b51_payment_successfull.png', '233527', 'image/png', '2017-08-19 09:06:35', 0, 'bbbbbbbbb', 1),
(3991, NULL, NULL, 'payment_successfull (3rd copy).png', '1ee937b2d523700012bd66275a1d0ae7_payment_successfull (3rd copy).png', '233527', 'image/png', '2017-08-19 09:10:33', 0, 'ddddd', 0),
(3992, NULL, NULL, 'payment_successfull.png', '4b38c6bc0a9fed38ac8cd17d5b72c862_payment_successfull.png', '233527', 'image/png', '2017-08-19 09:12:01', 0, 'ddd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `photos_old`
--

CREATE TABLE IF NOT EXISTS `photos_old` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `photos_img` varchar(255) DEFAULT NULL,
  `photo_img_org` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0',
  `title` text,
  `cover_pic` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL,
  `candidate_number` varchar(500) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `marital_status` tinyint(1) NOT NULL DEFAULT '0',
  `number_child` int(11) NOT NULL,
  `dob` date NOT NULL,
  `aniversary_date` date NOT NULL,
  `fchilddob` date NOT NULL,
  `mobile_no` bigint(11) NOT NULL,
  `pan_number` varchar(20) NOT NULL,
  `address` varchar(60) NOT NULL,
  `other_address` varchar(60) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `view`
--

CREATE TABLE IF NOT EXISTS `view` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `photo_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos_old`
--
ALTER TABLE `photos_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `view`
--
ALTER TABLE `view`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3993;
--
-- AUTO_INCREMENT for table `photos_old`
--
ALTER TABLE `photos_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `view`
--
ALTER TABLE `view`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;--
-- Database: `tejora`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `id` int(10) NOT NULL DEFAULT '0',
  `candidate_number` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `marital_status` tinyint(1) NOT NULL DEFAULT '0',
  `number_child` int(11) NOT NULL,
  `dob` date NOT NULL,
  `aniversary_date` date NOT NULL,
  `fchilddob` date NOT NULL,
  `mobile_no` bigint(15) NOT NULL,
  `pan_number` varchar(20) NOT NULL,
  `address` varchar(60) NOT NULL,
  `other_address` varchar(60) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `created_by` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `candidate_number`, `first_name`, `last_name`, `marital_status`, `number_child`, `dob`, `aniversary_date`, `fchilddob`, `mobile_no`, `pan_number`, `address`, `other_address`, `profile_picture`, `created_by`) VALUES
(0, 1, 'AKsha_robert_2_ward', 'Raut', 1, 1, '0000-00-00', '0000-00-00', '0000-00-00', 0, '1231231231', '123123123123123', '', '', NULL),
(0, 17, 'Maya', 'More', 1, 1, '2017-07-28', '2017-07-28', '0000-00-00', 20170728000000, '1231231231', 'zsd2', 'Vashi', NULL, NULL),
(0, 24, 'qqqqqqq', 'qqqqq', 1, 1, '2017-07-26', '2017-07-20', '0000-00-00', 20170720000000, '1231231231', 'ass2', 'dadadad', NULL, NULL),
(0, 3, 'aaa', 'aaa', 1, 1, '2017-07-28', '2017-07-28', '0000-00-00', 20170728000000, '1231231231', 'qweqwe1', 'dadar', NULL, NULL),
(0, 15, 'ccc', 'ccc', 1, 1, '2017-07-28', '2017-07-28', '0000-00-00', 20170728000000, '1231231231', 'sdfsd3', 'xdv', NULL, NULL),
(0, 15, 'ccc', 'ccc', 1, 1, '2017-07-28', '2017-07-28', '0000-00-00', 20170728000000, '1231231231', 'sdfsd3', 'xdv', NULL, NULL),
(0, 60, 'dasd', 'asd', 1, 1, '2017-07-31', '2017-07-31', '0000-00-00', 20170731000000, '1231231231', 'asdasd', 'asd', NULL, NULL),
(0, 60, 'dasd', 'asd', 1, 1, '2017-07-31', '2017-07-31', '0000-00-00', 20170731000000, '1231231231', 'asdasd', 'asd', NULL, NULL),
(0, 4234, 'dddddg', 'ddddd', 1, 1, '2017-07-31', '2017-07-31', '0000-00-00', 20170731000000, '1231231231', 'sdf', 'sdf', NULL, NULL),
(0, 4234, 'dddddg', 'ddddd', 1, 1, '2017-07-31', '2017-07-31', '0000-00-00', 20170731000000, '1231231231', 'sdf', 'sdf', NULL, NULL),
(0, 82, 'bbb', 'bbb', 1, 1, '2017-07-31', '2017-07-31', '0000-00-00', 20170731000000, '1231231231', '123asdasd', 'sdfs', NULL, NULL),
(0, 82, 'bbb', 'bbb', 1, 1, '2017-07-31', '2017-07-31', '0000-00-00', 20170731000000, '1231231231', '123asdasd', 'sdfs', NULL, NULL),
(0, 83, 'ccc', 'bbb', 1, 1, '2017-07-31', '2017-07-31', '0000-00-00', 20170731000000, '1231231231', '123asdasd', 'sdfs', NULL, NULL),
(0, 83, 'ccc', 'bbb', 1, 1, '2017-07-31', '2017-07-31', '0000-00-00', 20170731000000, '1231231231', '123asdasd', 'sdfs', NULL, NULL),
(0, 85, 'eee', 'eee', 1, 1, '2017-07-31', '2017-07-31', '0000-00-00', 20170731000000, '1231231231', 'asdfasdasd', 'dfasdasdasd', NULL, NULL),
(0, 85, 'eee', 'eee', 1, 1, '2017-07-31', '2017-07-31', '0000-00-00', 20170731000000, '1231231231', 'asdfasdasd', 'dfasdasdasd', NULL, NULL),
(0, 87, 'ggg', 'ggg', 1, 1, '2017-07-31', '2017-07-31', '0000-00-00', 20170731000000, '1231231231', 'dfsdf', 'dfsdfs', NULL, NULL),
(0, 87, 'ggg', 'ggg', 1, 1, '2017-07-31', '2017-07-31', '0000-00-00', 20170731000000, '1231231231', 'dfsdf', 'dfsdfs', NULL, NULL),
(0, 87, 'ggg', 'ggg', 1, 1, '2017-07-31', '2017-07-31', '0000-00-00', 20170731000000, '1231231231', 'dfsdf', 'dfsdfs', NULL, NULL),
(0, 87, 'ggg', 'ggg', 1, 1, '2017-07-31', '2017-07-31', '0000-00-00', 20170731000000, '1231231231', 'dfsdf', 'dfsdfs', NULL, NULL),
(0, 87, 'ggg', 'ggg', 1, 1, '2017-07-31', '2017-07-31', '0000-00-00', 20170731000000, '1231231231', 'dfsdf', 'dfsdfs', NULL, NULL),
(0, 87, 'ggg', 'ggg', 1, 1, '2017-07-31', '2017-07-31', '0000-00-00', 20170731000000, '1231231231', 'dfsdf', 'dfsdfs', NULL, NULL),
(0, 88, 'hhh', 'hhh', 1, 1, '2017-07-31', '2017-07-31', '0000-00-00', 20170731000000, '1231231231', 'wsdasd', 'sdfsdf', NULL, NULL),
(0, 88, 'hhh', 'hhh', 1, 1, '2017-07-31', '2017-07-31', '0000-00-00', 20170731000000, '1231231231', 'wsdasd', 'sdfsdf', NULL, NULL),
(0, 88, 'hhh', 'hhh', 1, 1, '2017-07-31', '2017-07-31', '0000-00-00', 20170731000000, '1231231231', 'wsdasd', 'sdfsdf', NULL, NULL),
(0, 88, 'hhh', 'hhh', 1, 1, '2017-07-31', '2017-07-31', '0000-00-00', 20170731000000, '1231231231', 'wsdasd', 'sdfsdf', NULL, NULL),
(0, 88, 'hhh', 'hhh', 1, 1, '2017-07-31', '2017-07-31', '0000-00-00', 20170731000000, '1231231231', 'wsdasd', 'sdfsdf', NULL, NULL),
(0, 88, 'hhh', 'hhh', 1, 1, '2017-07-31', '2017-07-31', '0000-00-00', 20170731000000, '1231231231', 'wsdasd', 'sdfsdf', NULL, NULL),
(0, 88, 'hhh', 'hhh', 1, 1, '2017-07-31', '2017-07-31', '0000-00-00', 20170731000000, '1231231231', 'wsdasd', 'sdfsdf', NULL, NULL),
(0, 88, 'hhh', 'hhh', 1, 1, '2017-07-31', '2017-07-31', '0000-00-00', 20170731000000, '1231231231', 'wsdasd', 'sdfsdf', NULL, NULL),
(0, 89, 'iii', 'i', 1, 1, '2017-07-31', '2017-07-31', '0000-00-00', 20170731000000, '1231231231', 'ewdad', 'sdfsdf', NULL, NULL),
(0, 89, 'iii', 'i', 1, 1, '2017-07-31', '2017-07-31', '0000-00-00', 20170731000000, '1231231231', 'ewdad', 'sdfsdf', NULL, NULL),
(0, 3, 'aaa', 'aaa', 1, 1, '2017-08-31', '2017-08-31', '0000-00-00', 20170831000000, '1231231231', 'sdasd23', 'asda', NULL, NULL),
(0, 3, 'aaa', 'aaa', 1, 1, '2017-08-31', '2017-08-31', '0000-00-00', 20170831000000, '1231231231', 'sdasd23', 'asda', NULL, NULL),
(0, 3, 'aaa', 'aaa', 1, 1, '2017-08-31', '2017-08-31', '0000-00-00', 20170831000000, '1231231231', 'sdasd23', 'asda', NULL, NULL),
(0, 3, 'aaa', 'aaa', 1, 1, '2017-08-31', '2017-08-31', '0000-00-00', 20170831000000, '1231231231', 'sdasd23', 'asda', NULL, NULL),
(0, 4, 'bbb', 'bbb', 1, 1, '2017-08-01', '2017-08-01', '0000-00-00', 20170801000000, '1231231231', 'FDSDFSD', 'wdasd', NULL, NULL),
(0, 4, 'bbb', 'bbb', 1, 1, '2017-08-01', '2017-08-01', '0000-00-00', 20170801000000, '1231231231', 'FDSDFSD', 'wdasd', NULL, NULL),
(0, 4, 'bbb', 'bbb', 1, 1, '2017-08-01', '2017-08-01', '0000-00-00', 20170801000000, '1231231231', 'FDSDFSD', 'wdasd', NULL, NULL),
(0, 4, 'bbb', 'bbb', 1, 1, '2017-08-01', '2017-08-01', '0000-00-00', 20170801000000, '1231231231', 'FDSDFSD', 'wdasd', NULL, NULL),
(0, 4, 'bbb', 'bbb', 1, 1, '2017-08-01', '2017-08-01', '0000-00-00', 20170801000000, '1231231231', 'FDSDFSD', 'wdasd', NULL, NULL),
(0, 4, 'bbb', 'bbb', 1, 1, '2017-08-01', '2017-08-01', '0000-00-00', 20170801000000, '1231231231', 'FDSDFSD', 'wdasd', NULL, NULL),
(0, 4, 'bbb', 'bbb', 1, 1, '2017-08-01', '2017-08-01', '0000-00-00', 20170801000000, '1231231231', 'FDSDFSD', 'wdasd', NULL, NULL),
(0, 4, 'bbb', 'bbb', 1, 1, '2017-08-01', '2017-08-01', '0000-00-00', 20170801000000, '1231231231', 'FDSDFSD', 'wdasd', NULL, NULL),
(0, 5, 'ccc', 'ccc', 1, 1, '2017-08-01', '2017-08-01', '0000-00-00', 20170801000000, '1231231231', 'fsdfsdf', 'dfsdf', NULL, NULL),
(0, 5, 'ccc', 'ccc', 1, 1, '2017-08-01', '2017-08-01', '0000-00-00', 20170801000000, '1231231231', 'fsdfsdf', 'dfsdf', NULL, NULL),
(0, 5, 'ccc', 'ccc', 1, 1, '2017-08-01', '2017-08-01', '0000-00-00', 20170801000000, '1231231231', 'fsdfsdf', 'dfsdf', 'e285e2d46e4f211bdb20a3904b182e7d_Screenshot from 2016-12-27 18-54-34.png', NULL),
(0, 5, 'ccc', 'ccc', 1, 1, '2017-08-01', '2017-08-01', '0000-00-00', 20170801000000, '1231231231', 'fsdfsdf', 'dfsdf', 'e285e2d46e4f211bdb20a3904b182e7d_Screenshot from 2016-12-27 18-54-34.png', NULL),
(0, 5, 'ccc', 'ccc', 1, 1, '2017-08-01', '2017-08-01', '0000-00-00', 20170801000000, '1231231231', 'fsdfsdf', 'dfsdf', 'e285e2d46e4f211bdb20a3904b182e7d_Screenshot from 2016-12-27 18-54-34.png', NULL),
(0, 4, 'bbb', 'bbb', 1, 1, '2017-08-01', '2017-08-01', '0000-00-00', 20170801000000, '1231231231', 'FDSDFSD', 'wdasd', 'f39337cec44ab4c15c5b30fdd941ebc2_Screenshot from 2016-12-27 18-54-34.png', '2017-08-01 10:02:47'),
(0, 5, 'ccc', 'ccc', 1, 1, '2017-08-01', '2017-08-01', '0000-00-00', 20170801000000, '1231231231', 'fsdfsdf', 'dfsdf', 'e285e2d46e4f211bdb20a3904b182e7d_Screenshot from 2016-12-27 18-54-34.png', '2017-08-01 10:04:29'),
(0, 5, 'ccc', 'ccc', 1, 1, '2017-08-01', '2017-08-01', '0000-00-00', 20170801000000, '1231231231', 'fsdfsdf', 'dfsdf', 'e285e2d46e4f211bdb20a3904b182e7d_Screenshot from 2016-12-27 18-54-34.png', '2017-08-01 11:41:47'),
(0, 5, 'ccc', 'ccc', 1, 1, '2017-08-01', '2017-08-01', '0000-00-00', 20170801000000, '1231231231', 'fsdfsdf', 'dfsdf', 'e285e2d46e4f211bdb20a3904b182e7d_Screenshot from 2016-12-27 18-54-34.png', '2017-08-01 11:41:48'),
(0, 5, 'ccc', 'ccc', 1, 1, '2017-08-01', '2017-08-01', '0000-00-00', 20170801000000, '1231231231', 'fsdfsdf', 'dfsdf', 'e285e2d46e4f211bdb20a3904b182e7d_Screenshot from 2016-12-27 18-54-34.png', '2017-08-01 11:41:49'),
(0, 5, 'ccc', 'ccc', 1, 1, '2017-08-01', '2017-08-01', '0000-00-00', 20170801000000, '1231231231', 'fsdfsdf', 'dfsdf', 'e285e2d46e4f211bdb20a3904b182e7d_Screenshot from 2016-12-27 18-54-34.png', '2017-08-01 11:41:49'),
(0, 5, 'ccc', 'ccc', 1, 1, '2017-08-01', '2017-08-01', '0000-00-00', 20170801000000, '1231231231', 'fsdfsdf', 'dfsdf', 'e285e2d46e4f211bdb20a3904b182e7d_Screenshot from 2016-12-27 18-54-34.png', '2017-08-01 11:41:50'),
(0, 5, 'ccc', 'ccc', 1, 1, '2017-08-01', '2017-08-01', '0000-00-00', 20170801000000, '1231231231', 'fsdfsdf', 'dfsdf', 'e285e2d46e4f211bdb20a3904b182e7d_Screenshot from 2016-12-27 18-54-34.png', '2017-08-01 11:41:51'),
(0, 3, 'aaa', 'aaa', 1, 1, '2017-08-31', '2017-08-31', '0000-00-00', 20170831000000, '1231231231', 'sdasd23', 'asda', 'f714db35c5ab37b5b7889f1f36e244f0_Screenshot from 2016-12-27 18-54-34.png', '2017-08-01 11:45:31'),
(0, 6, 'ddd', 'ddd', 1, 1, '2017-08-01', '0000-00-00', '0000-00-00', 0, '1231231231', 'fsdfs', 'sdfsdf', NULL, '2017-08-01 12:36:56'),
(0, 6, 'ddd', 'ddd', 1, 1, '2017-08-01', '0000-00-00', '0000-00-00', 0, '1231231231', 'fsdfs', 'sdfsdf', NULL, '2017-08-01 12:36:56'),
(0, 7, 'eee', 'eee', 1, 1, '2017-08-01', '0000-00-00', '0000-00-00', 0, '1231231231', 'dasdasd', 'asdasd', NULL, '2017-08-01 12:39:06'),
(0, 7, 'eee', 'eee', 1, 1, '2017-08-01', '0000-00-00', '0000-00-00', 0, '1231231231', 'dasdasd', 'asdasd', NULL, '2017-08-01 12:39:06'),
(0, 8, 'fff', 'fff', 1, 1, '2017-08-01', '0000-00-00', '0000-00-00', 0, '1231231231', 'sdasd', 'sdasd', NULL, '2017-08-01 12:41:22'),
(0, 8, 'fff', 'fff', 1, 1, '2017-08-01', '0000-00-00', '0000-00-00', 0, '1231231231', 'sdasd', 'sdasd', NULL, '2017-08-01 12:41:22'),
(0, 9, 'ggg', 'ggg', 1, 1, '2017-08-01', '0000-00-00', '0000-00-00', 0, '1231231231', 'asdasd', 'sdvs', NULL, '2017-08-01 12:46:26'),
(0, 9, 'ggg', 'ggg', 1, 1, '2017-08-01', '0000-00-00', '0000-00-00', 0, '1231231231', 'asdasd', 'sdvs', NULL, '2017-08-01 12:46:26'),
(0, 9, 'ggg', 'ggg', 1, 1, '2017-08-01', '0000-00-00', '0000-00-00', 0, '1231231231', 'asdasd', 'sdvs', NULL, '2017-08-01 12:49:43'),
(0, 9, 'ggg', 'ggg', 1, 1, '2017-08-01', '0000-00-00', '0000-00-00', 0, '1231231231', 'asdasd', 'sdvs', NULL, '2017-08-01 12:49:43'),
(0, 18, 'ddw', 'ddw', 1, 1, '2017-08-01', '0000-00-00', '0000-00-00', 0, '1231231231', 'fsdf', 'sdfsdf', NULL, '2017-08-01 13:22:06'),
(0, 18, 'ddw', 'ddw', 1, 1, '2017-08-01', '0000-00-00', '0000-00-00', 0, '1231231231', 'fsdf', 'sdfsdf', NULL, '2017-08-01 13:22:06'),
(0, 1, 'AKsha_robert_2_ward_2', 'Raut', 1, 1, '0000-00-00', '0000-00-00', '0000-00-00', 0, '1231231231', '1231', '', '', '2017-08-02 04:41:47'),
(0, 1, 'AKsha_robert_2_ward_2', 'Raut', 1, 1, '0000-00-00', '0000-00-00', '0000-00-00', 0, '1231231231', '1231', '', '', '2017-08-02 04:41:49'),
(0, 13, 'wd', 'jhg', 0, 0, '2017-08-01', '0000-00-00', '0000-00-00', 0, '123123123', 'cvxdf', '', NULL, '2017-08-02 04:42:26'),
(0, 13, 'wd', 'jhg', 0, 0, '2017-08-01', '0000-00-00', '0000-00-00', 0, '123123123', 'cvxdf', '', NULL, '2017-08-02 04:42:27'),
(0, 13, 'wd', 'jhg', 0, 0, '2017-08-01', '0000-00-00', '0000-00-00', 0, '123123123', 'cvxdf', '', NULL, '2017-08-02 04:42:27'),
(0, 13, 'wd', 'jhg', 0, 0, '2017-08-01', '0000-00-00', '0000-00-00', 0, '123123123', 'cvxdf', '', NULL, '2017-08-02 04:42:28'),
(0, 13, 'wd', 'jhg', 0, 0, '2017-08-01', '0000-00-00', '0000-00-00', 0, '123123123', 'cvxdf', '', NULL, '2017-08-02 04:42:28'),
(0, 13, 'wd', 'jhg', 0, 0, '2017-08-01', '0000-00-00', '0000-00-00', 0, '123123123', 'cvxdf', '', NULL, '2017-08-02 04:42:30'),
(0, 1, 'AKsha_robert_2_ward_2', 'Raut', 1, 1, '0000-00-00', '0000-00-00', '0000-00-00', 0, '1231231231', '1231', '', '', '2017-08-02 04:57:20'),
(0, 1, 'AKsha_robert_2_ward_2', 'Raut', 1, 1, '0000-00-00', '0000-00-00', '0000-00-00', 0, '1231231231', '1231', '', '', '2017-08-02 04:57:21'),
(0, 1, 'AKsha_robert_2_ward_2', 'Raut', 1, 1, '0000-00-00', '0000-00-00', '0000-00-00', 0, '1231231231', '1231', '', '', '2017-08-02 04:57:22'),
(0, 0, 'aaa', 'aaa', 1, 1, '2017-08-02', '0000-00-00', '0000-00-00', 0, '1231231231', 'sdasdas', 'asdas', NULL, '2017-08-02 06:23:14'),
(0, 0, 'aaa', 'aaa', 1, 1, '2017-08-02', '0000-00-00', '0000-00-00', 0, '1231231231', 'sdasdas', 'asdas', NULL, '2017-08-02 06:23:14'),
(0, 0, 'ccc', 'ccc', 1, 1, '2017-08-02', '0000-00-00', '0000-00-00', 0, '123123121', 'sdasd', '', NULL, '2017-08-02 06:52:22'),
(0, 0, 'ccc', 'ccc', 1, 1, '2017-08-02', '0000-00-00', '0000-00-00', 0, '123123121', 'sdasd', '', NULL, '2017-08-02 06:54:04'),
(0, 0, 'ccc', 'ccc', 1, 1, '2017-08-02', '0000-00-00', '0000-00-00', 0, '123123121', 'sdasd', '', NULL, '2017-08-02 06:57:11'),
(0, 0, 'ccc', 'ccc', 1, 1, '2017-08-02', '0000-00-00', '0000-00-00', 0, '123123121', 'sdasd', '', NULL, '2017-08-02 06:57:51'),
(0, 0, 'aaa', 'aaa', 1, 1, '2017-08-02', '0000-00-00', '0000-00-00', 0, '12312312312', 'SDASD', 'asd', NULL, '2017-08-02 07:08:45'),
(0, 0, 'aaa', 'aaa', 1, 1, '2017-08-02', '0000-00-00', '0000-00-00', 0, '12312312312', 'SDASD', 'asd', NULL, '2017-08-02 07:09:14'),
(0, 0, 'aaa', 'aaa', 1, 1, '2017-08-02', '0000-00-00', '0000-00-00', 0, '1231231231', 'sdasd', '', NULL, '2017-08-02 12:09:08'),
(0, 0, 'bbb', 'bbb', 1, 1, '2017-08-02', '0000-00-00', '0000-00-00', 0, '1231231231', 'sdasd', 'dfsd', '7814bacc9b23a05de0b669157b8eabee_Screenshot from 2016-12-27 18-54-34.png', '2017-08-02 12:41:44'),
(0, 1, 'AKsha_robert_2_ward_2', 'Raut', 1, 1, '0000-00-00', '0000-00-00', '0000-00-00', 0, '1231231231', '1231', '', '', '2017-08-03 04:58:49'),
(0, 1, 'AKsha_robert_2_ward_4', 'Raut', 1, 1, '0000-00-00', '0000-00-00', '0000-00-00', 0, '1231231231', '1231', '', '', '2017-08-03 04:58:53'),
(0, 1, 'AKsha_robert_2_ward_4', 'Raut', 1, 1, '0000-00-00', '0000-00-00', '0000-00-00', 0, '1231231231', '1231', '', '', '2017-08-03 04:58:55'),
(0, 1, 'AKsha_robert_2_ward_4', 'Raut', 1, 1, '0000-00-00', '0000-00-00', '0000-00-00', 0, '1231231231', '1231', '', '', '2017-08-03 04:58:56'),
(0, 1, 'AKsha_robert_2_ward_4', 'Raut', 1, 1, '0000-00-00', '0000-00-00', '0000-00-00', 0, '1231231231', '1231', '', '', '2017-08-03 04:58:57'),
(0, 1, 'AKsha_robert_2_ward_4', 'Raut', 1, 1, '0000-00-00', '0000-00-00', '0000-00-00', 0, '1231231231', '1231', '', '', '2017-08-03 04:58:57'),
(0, 0, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', NULL, '2017-08-03 05:01:01'),
(0, 0, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', NULL, '2017-08-03 05:01:01'),
(0, 0, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', 'd32cbd43ab007131d44ebae445e8f627_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 05:01:01'),
(0, 2147483647, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', 'd32cbd43ab007131d44ebae445e8f627_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 05:04:29'),
(0, 2147483647, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', 'd32cbd43ab007131d44ebae445e8f627_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 05:04:29'),
(0, 2147483647, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', 'd32cbd43ab007131d44ebae445e8f627_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 05:05:29'),
(0, 2147483647, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', 'd32cbd43ab007131d44ebae445e8f627_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 05:05:29'),
(0, 2147483647, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', 'd32cbd43ab007131d44ebae445e8f627_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 05:05:55'),
(0, 2147483647, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', 'd32cbd43ab007131d44ebae445e8f627_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 05:05:55'),
(0, 2147483647, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', 'd32cbd43ab007131d44ebae445e8f627_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 05:06:22'),
(0, 2147483647, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', 'd32cbd43ab007131d44ebae445e8f627_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 05:06:22'),
(0, 2147483647, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', 'd32cbd43ab007131d44ebae445e8f627_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 05:21:07'),
(0, 2147483647, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', 'd32cbd43ab007131d44ebae445e8f627_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 05:21:07'),
(0, 2147483647, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', 'd32cbd43ab007131d44ebae445e8f627_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 05:32:21'),
(0, 2147483647, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', 'd32cbd43ab007131d44ebae445e8f627_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 05:32:21'),
(0, 2147483647, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', 'd32cbd43ab007131d44ebae445e8f627_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 05:34:32'),
(0, 2147483647, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', 'd32cbd43ab007131d44ebae445e8f627_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 05:34:32'),
(0, 2147483647, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', 'd32cbd43ab007131d44ebae445e8f627_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 05:42:59'),
(0, 2147483647, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', 'd32cbd43ab007131d44ebae445e8f627_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 05:42:59'),
(0, 2147483647, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', 'd32cbd43ab007131d44ebae445e8f627_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 05:42:59'),
(0, 2147483647, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', 'd32cbd43ab007131d44ebae445e8f627_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 05:43:36'),
(0, 2147483647, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', 'd32cbd43ab007131d44ebae445e8f627_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 05:43:36'),
(0, 2147483647, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', 'd32cbd43ab007131d44ebae445e8f627_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 05:44:17'),
(0, 2147483647, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', 'd32cbd43ab007131d44ebae445e8f627_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 05:44:17'),
(0, 2147483647, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', 'd32cbd43ab007131d44ebae445e8f627_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 05:44:17'),
(0, 2147483647, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', 'd32cbd43ab007131d44ebae445e8f627_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 05:45:54'),
(0, 2147483647, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', 'd32cbd43ab007131d44ebae445e8f627_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 05:45:54'),
(0, 2147483647, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', 'd32cbd43ab007131d44ebae445e8f627_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 05:46:26'),
(0, 2147483647, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', 'd32cbd43ab007131d44ebae445e8f627_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 05:46:26'),
(0, 2147483647, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', 'd32cbd43ab007131d44ebae445e8f627_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 05:46:26'),
(0, 2147483647, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', 'd32cbd43ab007131d44ebae445e8f627_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 05:48:58'),
(0, 2147483647, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', 'd32cbd43ab007131d44ebae445e8f627_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 05:48:59'),
(0, 2147483647, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', 'd32cbd43ab007131d44ebae445e8f627_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 05:48:59'),
(0, 2147483647, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', 'd32cbd43ab007131d44ebae445e8f627_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 05:49:15'),
(0, 2147483647, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', 'd32cbd43ab007131d44ebae445e8f627_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 05:49:15'),
(0, 2147483647, 'ccc', 'ccc', 1, 1, '2017-08-03', '0000-00-00', '0000-00-00', 0, '123123123', '1223123', 'asd', 'd32cbd43ab007131d44ebae445e8f627_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 05:49:15'),
(0, 0, 'ddd', 'ddd', 2, 0, '2017-08-03', '0000-00-00', '0000-00-00', 0, '1231231231', 'asdasdasf34234', 'asdasd', NULL, '2017-08-03 11:52:33'),
(0, 0, 'ddd', 'ddd', 2, 0, '2017-08-03', '0000-00-00', '0000-00-00', 0, '1231231231', 'asdasdasf34234', 'asdasd', NULL, '2017-08-03 11:52:33'),
(0, 0, 'ddd', 'ddd', 2, 0, '2017-08-03', '0000-00-00', '0000-00-00', 0, '1231231231', 'asdasdasf34234', 'asdasd', '0e362407a1227f5d8a6d36a5e7e56067_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 11:52:33'),
(0, 2147483647, 'ddd', 'ddd', 2, 0, '2017-08-03', '0000-00-00', '0000-00-00', 0, '1231231231', 'asdasdasf34234', 'asdasd', '0e362407a1227f5d8a6d36a5e7e56067_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 11:53:24'),
(0, 2147483647, 'ddd', 'ddd', 2, 0, '2017-08-03', '0000-00-00', '0000-00-00', 0, '1231231231', 'asdasdasf34234', 'asdasd', '0e362407a1227f5d8a6d36a5e7e56067_Screenshot from 2016-12-27 18-54-34.png', '2017-08-03 11:53:45'),
(0, 2147483647, 'aaa', 'aaa', 1, 1, '2017-08-02', '0000-00-00', '0000-00-00', 0, '1231231231', 'sdasd', '', NULL, '2017-08-04 07:18:02'),
(0, 2147483647, 'ddd', 'ddd', 2, 0, '2017-08-03', '0000-00-00', '0000-00-00', 0, '1231231231', 'asdasdasf34234', 'asdasd', '0e362407a1227f5d8a6d36a5e7e56067_Screenshot from 2016-12-27 18-54-34.png', '2017-08-07 07:03:35'),
(0, 2147483647, 'ddd', 'ddd', 2, 0, '2017-08-03', '0000-00-00', '0000-00-00', 0, '1231231231', 'asdasdasf34234', 'asdasd', '0e362407a1227f5d8a6d36a5e7e56067_Screenshot from 2016-12-27 18-54-34.png', '2017-08-07 07:03:37'),
(0, 2147483647, 'ddd', 'ddd', 2, 0, '2017-08-03', '0000-00-00', '0000-00-00', 0, '1231231231', 'asdasdasf34234', 'asdasd', '0e362407a1227f5d8a6d36a5e7e56067_Screenshot from 2016-12-27 18-54-34.png', '2017-08-07 07:03:39'),
(0, 2147483647, 'ddd', 'ddd', 2, 0, '2017-08-03', '0000-00-00', '0000-00-00', 0, '1231231231', 'asdasdasf34234', 'asdasd', '0e362407a1227f5d8a6d36a5e7e56067_Screenshot from 2016-12-27 18-54-34.png', '2017-08-07 07:03:43'),
(0, 1, 'AKsha_robert_2_ward_4', 'Raut', 1, 1, '0000-00-00', '0000-00-00', '0000-00-00', 0, '1231231231', '1231', '', '', '2017-08-08 05:01:08'),
(0, 1, 'AKsha_robert_2_ward_4', 'Raut', 1, 1, '0000-00-00', '0000-00-00', '0000-00-00', 0, '1231231231', '1231', '', '', '2017-08-08 05:01:09'),
(0, 1, 'AKsha_robert_2_ward_4', 'Raut', 1, 1, '0000-00-00', '0000-00-00', '0000-00-00', 0, '1231231231', '1231', '', '', '2017-08-08 05:01:10'),
(0, 1, 'AKsha_robert_2_ward_4', 'Raut', 1, 1, '0000-00-00', '0000-00-00', '0000-00-00', 0, '1231231231', '1231', '', '', '2017-08-08 05:01:11'),
(0, 2147483647, 'aaa', 'aaa', 1, 1, '2017-08-02', '0000-00-00', '0000-00-00', 0, '1231231231', 'sdasd', '', NULL, '2017-08-08 12:43:19'),
(0, 2147483647, 'aaa', 'aaa', 1, 1, '2017-08-02', '0000-00-00', '0000-00-00', 0, '1231231231', 'sdasd', '', NULL, '2017-08-08 12:43:22'),
(0, 1, 'AKsha_robert_2_ward_4', 'Raut', 1, 1, '0000-00-00', '0000-00-00', '0000-00-00', 0, '1231231231', '1231', '', '', '2017-08-10 13:16:58');

--
-- Triggers `history`
--
DELIMITER $$
CREATE TRIGGER `history2` AFTER UPDATE ON `history`
 FOR EACH ROW insert INTO history
   ( candidate_number,
     first_name,
    last_name,
    marital_status,
    number_child,
    dob,
    aniversary_date,
    fchilddob,
    mobile_no,
    pan_number,
    address,
    other_address,
    profile_picture
   )
   VALUES
   ( NEW.candidate_number,
     NEW.first_name,
     NEW.last_name,
     NEW.marital_status,
     NEW.number_child,
     NEW.dob,
     NEW.aniversary_date,
    NEW.fchilddob,
    NEW.aniversary_date,
    NEW.mobile_no,
    NEW.pan_number,
    NEW.other_address,
    NEW.profile_picture
     )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(10) NOT NULL,
  `role` varchar(55) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `salt` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `role`, `username`, `password`, `created`, `modified`, `salt`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2017-07-20 16:44:16', '2017-07-20 16:44:16', NULL),
(2, 'checker', 'checker', '9bcf0edc75944b260de8279d7a6d8174', '2017-07-20 16:44:40', '2017-07-20 16:44:40', NULL),
(3, 'maker', 'maker', '35977a76fc8a3239867a67a62cf45f0d', '2017-07-20 16:44:51', '2017-07-20 16:44:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `photos_img` varchar(255) DEFAULT NULL,
  `photo_img_org` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0',
  `title` text,
  `cover_pic` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `event_id`, `user_id`, `photos_img`, `photo_img_org`, `created`, `status`, `title`, `cover_pic`) VALUES
(7, 46, NULL, 'b3e7b398528ba7f41fac62e78ffd3eed_payment_successfull.png', 'payment_successfull.png', '2017-08-18 12:11:08', 0, 'Sanket', 0),
(8, 46, NULL, '879e6acc27e1c0c2f2383e691ed7447b_payment_successfull (3rd copy).png', 'payment_successfull (3rd copy).png', '2017-08-18 12:11:09', 0, 'Akshay', 1),
(9, 46, NULL, 'bbbcf57c53b26c2b09ac52c277b8ed1d_payment_successfull (3rd copy).png', 'payment_successfull (3rd copy).png', '2017-08-18 12:24:02', 0, 'asdasdasd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE IF NOT EXISTS `qualification` (
  `id` int(11) NOT NULL,
  `type` varchar(60) DEFAULT NULL,
  `university` varchar(100) DEFAULT NULL,
  `percentage` varchar(10) DEFAULT NULL,
  `passing_year` varchar(10) DEFAULT NULL,
  `class` varchar(30) DEFAULT NULL,
  `registration_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`id`, `type`, `university`, `percentage`, `passing_year`, `class`, `registration_id`) VALUES
(13, 'MCA', 'Mumbai', '92.00', '2017', '1', 82),
(14, 'BCA', 'Pune', '82.00', '2015', '1', 82),
(15, 'MCA', 'Mumbai', '92.00', '2017', '1', 83),
(16, 'BCA', 'Pune', '82.00', '2015', '1', 83),
(17, 'MMCA', 'dadae', '43.00', '2017', '1', 85),
(18, 'MMTS', 'US', '98.00', '2015', '1', 87),
(19, 'MMTS', 'US', '98.00', '2015', '1', 88),
(20, 'MMTS', 'US', '98.00', '2015', '1', 89),
(21, 'TTSC', 'Mumb', '43.00', '2020', '1', 90),
(22, 'TTSC', 'Mumb', '43.00', '2020', '1', 91),
(23, 'TTSC', 'Mumb', '43.00', '2020', '1', 92),
(24, 'TTSC', 'Mumb', '43.00', '2020', '1', 93),
(25, 'TTTT', 'asd', '999.99', '234', '234', 94),
(26, 'NCA', 'Mumbai', '93.00', '2014', '1', 95),
(27, 'NCA', 'Mumbai', '93.00', '2014', '1', 96),
(28, 'bbb', 'bbb', '222.00', '2017', '1', 97),
(29, 'bbb', 'bbb', '222.00', '2017', '1', 98),
(30, 'bbb', 'bbb', '222.00', '2017', '1', 99),
(31, 'bbb', 'bbb', '222.00', '2017', '1', 100),
(32, 'CCC', 'ccc', '555.00', '5555', '5', 101),
(33, 'DDLJ', 'London', '99.00', '2018', '1', 102),
(34, 'eee', 'eee', '889.00', '234', '23', 103),
(35, 'fff', 'fff', '22.00', '22', '2', 104),
(36, 'ggg', 'ggg', '112.00', '2123', '1', 105),
(37, 'ggg', 'ggg', '112.00', '2123', '1', 106),
(38, '', '', '0.00', '', '', 113),
(39, 'ddw', 'ddw', '12.00', '123', '1', 116),
(40, 'AAA', 'aaa', '123.00', '123123', '1', 117),
(46, 'CCDE', 'CCZZ', '22', '2016', '2', 146),
(47, 'MCA', 'Mumbai', '99', '2017', '1', 147),
(48, 'BCA', 'Mumbai', '80', '2013', '2', 147);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `id` int(10) NOT NULL,
  `candidate_number` varchar(500) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `marital_status` tinyint(1) NOT NULL DEFAULT '0',
  `number_child` int(11) NOT NULL,
  `dob` date NOT NULL,
  `aniversary_date` date NOT NULL,
  `fchilddob` date NOT NULL,
  `mobile_no` bigint(11) NOT NULL,
  `pan_number` varchar(20) NOT NULL,
  `address` varchar(60) NOT NULL,
  `other_address` varchar(60) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `candidate_number`, `first_name`, `last_name`, `marital_status`, `number_child`, `dob`, `aniversary_date`, `fchilddob`, `mobile_no`, `pan_number`, `address`, `other_address`, `profile_picture`, `status`) VALUES
(48, '', 'testakki', 'testraut', 0, 0, '2017-08-15', '0000-00-00', '0000-00-00', 1231231234, '123erd', 'sdf234', NULL, '59a849d7be1457227f42ad51443a4f13_payment_successfull.png', 0),
(49, '', 'testakki', 'testraut', 0, 0, '2017-08-15', '0000-00-00', '0000-00-00', 1231231234, '123erd', 'sdf234', NULL, '9a06daae7ac6d2db94219e2d1502253d_payment_successfull (3rd copy).png', 0),
(51, '', 'testakki', 'testraut', 0, 0, '2017-08-15', '0000-00-00', '0000-00-00', 1231231234, '123erd', 'sdf234', NULL, 'e825d1beaa50bf4b6f1806fcf718ca3c_payment_successfull (4th copy).png', 0);

--
-- Triggers `registration`
--
DELIMITER $$
CREATE TRIGGER `history` BEFORE UPDATE ON `registration`
 FOR EACH ROW INSERT INTO history
   ( candidate_number,
     first_name,
    last_name,
    marital_status,
    number_child,
    dob,
    aniversary_date,
    fchilddob,
    mobile_no,
    pan_number,
    address,
    other_address,
    profile_picture
   )
   VALUES
   ( old.candidate_number,
     old.first_name,
     old.last_name,
     old.marital_status,
     old.number_child,
     old.dob,
     old.aniversary_date,
    old.fchilddob,
    old.aniversary_date,
    old.mobile_no,
    old.pan_number,
    old.other_address,
    old.profile_picture
     )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `scan_document`
--

CREATE TABLE IF NOT EXISTS `scan_document` (
  `id` int(11) NOT NULL,
  `upload_filename` varchar(255) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `registration_id` int(11) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scan_document`
--

INSERT INTO `scan_document` (`id`, `upload_filename`, `name`, `registration_id`, `created`) VALUES
(10, '17965671cd2aa6d1d420f5e2e2057c6a_Screenshot from 2017-03-08 12-05-45.png', NULL, 82, '2017-07-31 14:24:40'),
(11, '55801e6cfb8f07ba927dd9b9bd148511_Screenshot from 2017-03-08 12-05-45.png', NULL, 83, '2017-07-31 14:26:16'),
(12, '89349a3720657bc0abc8326975124db9_Screenshot from 2017-03-08 12-05-45.png', NULL, 84, '2017-07-31 14:29:35'),
(13, '18fc1e683ca70f57c29823911c7ae417_Screenshot from 2017-03-08 12-05-45.png', NULL, 85, '2017-07-31 14:31:56'),
(14, '71211552c7c8885194abf88b9882005f_Screenshot from 2017-03-08 12-05-45.png', NULL, 86, '2017-07-31 14:34:16'),
(15, '655739e5c5c47a4a361f6d6690529f37_Screenshot from 2017-03-08 12-05-45.png', NULL, 87, '2017-07-31 14:35:30'),
(16, 'a5adbd332992e4314e8f6fb27e32259a_Screenshot from 2017-03-08 12-05-45.png', NULL, 88, '2017-07-31 14:36:50'),
(17, '18c9ae94fda01bb60cd44b027b810d90_Screenshot from 2017-03-08 12-05-45.png', NULL, 89, '2017-07-31 14:37:40'),
(18, '795245ee84bee4c5cd9340be637c9c7c_Screenshot from 2017-03-08 12-05-45.png', NULL, 90, '2017-07-31 14:40:12'),
(19, 'f29133e03820a9eb1fc02665f919b675_Screenshot from 2017-03-08 12-05-45.png', NULL, 91, '2017-07-31 14:42:41'),
(20, '1f499964050eb3e9abf7169cf7b735b0_Screenshot from 2017-03-08 12-05-45.png', NULL, 92, '2017-07-31 14:46:19'),
(21, '6b88f3bb817ae7b6b2139d1255ad06c0_Screenshot from 2017-03-08 12-05-45.png', NULL, 93, '2017-07-31 14:46:31'),
(22, '9976ff1e48532248ee393fb69ea5ed7b_Screenshot from 2017-03-08 12-05-45.png', NULL, 94, '2017-07-31 14:58:54'),
(23, 'fc1bdf6fd00429f2957f2ad71c005cb9_Screenshot from 2017-03-08 12-05-45.png', NULL, 95, '2017-08-01 05:58:56'),
(24, 'c9b22cfb528283e5f012ea3052783dba_Screenshot from 2017-03-08 12-05-45.png', NULL, 96, '2017-08-01 06:02:44'),
(25, 'd2aa87259773142a03665a5cc699128d_Screenshot from 2017-03-08 12-05-45.png', NULL, 97, '2017-08-01 06:06:43'),
(26, '07572e047026709dd0c40adead62074a_Screenshot from 2017-03-08 12-05-45.png', NULL, 98, '2017-08-01 06:07:09'),
(27, 'a51d78e2a25875674db7a79fe88bc6b1_Screenshot from 2017-03-08 12-05-45.png', NULL, 99, '2017-08-01 06:08:59'),
(28, 'a284ca0120ea87841185fd6cbd6374d4_Screenshot from 2017-03-08 12-05-45.png', NULL, 100, '2017-08-01 06:13:31'),
(29, '073faf07adf15c2c8da590a12434ea3b_Screenshot from 2017-03-08 12-05-45.png', NULL, 101, '2017-08-01 07:02:36'),
(30, '14d17b4f5d777dc93dade8a87fb4180d_Screenshot from 2016-12-27 18-54-34.png', NULL, 102, '2017-08-01 12:36:56'),
(31, '4299abe85939e5b6da78606f7fe3d3af_Screenshot from 2017-03-08 12-05-45.png', NULL, 102, '2017-08-01 12:36:56'),
(32, 'ed822d080717e993d52ef19f9cbee57c_Screenshot from 2016-12-27 18-54-34.png', NULL, 103, '2017-08-01 12:39:06'),
(33, 'b3a753352325df9d0e8032cfa242b1c5_Screenshot from 2017-03-08 12-05-45.png', NULL, 103, '2017-08-01 12:39:06'),
(34, '5bee4f6a77c01c630c046a071375a47e_Screenshot from 2016-12-27 18-54-34.png', NULL, 105, '2017-08-01 12:46:26'),
(35, 'c68e60f46a36700994f5df4d5facc384_Screenshot from 2017-03-08 12-05-45.png', NULL, 105, '2017-08-01 12:46:26'),
(36, '10fa8d46a539f052bb1f072a366fe327_Screenshot from 2016-12-27 18-54-34.png', NULL, 106, '2017-08-01 12:49:43'),
(37, '8cbcdacb73c3d21a40806393bcce3cae_Screenshot from 2017-03-08 12-05-45.png', NULL, 106, '2017-08-01 12:49:43'),
(38, '91419522dbcf06848a37e988901b1cd4_Screenshot from 2016-12-27 18-54-34.png', NULL, 108, '2017-08-01 13:09:15'),
(39, '567ad0c954916ca4c2d797dbfb047548_Screenshot from 2017-03-08 12-05-45.png', NULL, 108, '2017-08-01 13:09:15'),
(40, 'aebc8e77133cfb8ba185d7e21220ff12_Screenshot from 2016-12-27 18-54-34.png', NULL, 109, '2017-08-01 13:11:05'),
(41, '0719b383d3be2679232bea83c1e40c1b_Screenshot from 2017-03-08 12-05-45.png', NULL, 109, '2017-08-01 13:11:05'),
(42, '172fd354be4568d93bcaea5937b78a0d_Screenshot from 2016-12-27 18-54-34.png', NULL, 110, '2017-08-01 13:12:15'),
(43, '10ffa3099948a1c6efecb9960e401e13_Screenshot from 2017-03-08 12-05-45.png', NULL, 110, '2017-08-01 13:12:15'),
(44, 'e9e18e448bad1fbfea7de183d25bef65_Screenshot from 2016-12-27 18-54-34.png', NULL, 111, '2017-08-01 13:15:13'),
(45, 'e5cb5dffce33fa65475f17cfeb318338_Screenshot from 2017-03-08 12-05-45.png', NULL, 111, '2017-08-01 13:15:13'),
(46, 'a7446aaea80f492357c68653080744f9_Screenshot from 2016-12-27 18-54-34.png', NULL, 112, '2017-08-01 13:16:34'),
(47, 'e0bda04f5d4ba8edbab6d93ac0e88b8e_Screenshot from 2017-03-08 12-05-45.png', NULL, 112, '2017-08-01 13:16:34'),
(48, '861f6cc27ab04a2c92e2313a37a33b0a_Screenshot from 2016-12-27 18-54-34.png', NULL, 114, '2017-08-01 13:19:39'),
(49, '5a9f5c28ff32f4087ca85a6ac16304be_Screenshot from 2017-03-08 12-05-45.png', NULL, 114, '2017-08-01 13:19:39'),
(50, 'e9fb54b05f37b0c1da4ddd83fbd7c95c_Screenshot from 2016-12-27 18-54-34.png', NULL, 115, '2017-08-01 13:21:08'),
(51, 'c44b10846f12f0702c629aa72ae45d98_Screenshot from 2017-03-08 12-05-45.png', NULL, 115, '2017-08-01 13:21:08'),
(52, '04d54e7cdadff2a3c36a109ceacb9ac8_Screenshot from 2016-12-27 18-54-34.png', NULL, 116, '2017-08-01 13:22:06'),
(53, 'ca82c2927e3cdb94ce7fa1526dc1deb2_Screenshot from 2017-03-08 12-05-45.png', NULL, 116, '2017-08-01 13:22:06'),
(54, '68d955a95a7b79c01e3d67af48b149d4_Screenshot from 2017-03-08 12-05-45.png', NULL, 117, '2017-08-02 06:23:14'),
(55, 'b1b1dce7b0aaa95e7fdfdac4d47a0fe0_Screenshot from 2017-03-08 12-05-45.png', NULL, 145, '2017-08-02 12:41:44'),
(56, '7c2d85c593b1800322238d822e50f60a_Screenshot from 2016-12-27 18-54-34.png', NULL, 146, '2017-08-03 05:01:01'),
(57, '955445e4ed0b03bd20098e857fa3877e_Screenshot from 2017-03-08 12-05-45.png', NULL, 146, '2017-08-03 05:01:01'),
(58, 'c86f7eeb09c9d822352798db159e026c_Screenshot from 2016-12-27 18-54-34.png', NULL, 147, '2017-08-03 11:52:33'),
(59, 'fe32a9af12dc7dfa0a52aca3d9a7db0e_Screenshot from 2017-03-08 12-05-45.png', NULL, 147, '2017-08-03 11:52:33');

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE IF NOT EXISTS `skill` (
  `id` int(11) NOT NULL,
  `skill` varchar(40) DEFAULT NULL,
  `proficiency` varchar(25) DEFAULT NULL,
  `registration_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`id`, `skill`, `proficiency`, `registration_id`) VALUES
(11, 'PHP', 'dasd', 82),
(12, 'JAva', 'sdasdasd', 82),
(13, 'PHP', 'dasd', 83),
(14, 'JAva', 'sdasdasd', 83),
(15, 'MMCA', 'dadae', 85),
(16, 'C##', 'dfs', 87),
(17, 'C##', 'dfs', 88),
(18, 'C##', 'dfs', 89),
(19, 'TTSC', 'fsdf', 90),
(20, 'TTSC', 'fsdf', 91),
(21, 'TTSC', 'fsdf', 92),
(22, 'TTSC', 'fsdf', 93),
(23, 'sdfs', 'sdf', 94),
(24, 'C++', 'Good', 95),
(25, 'C++', 'Good', 96),
(26, 'bbb', 'bbb', 97),
(27, 'bbb', 'bbb', 98),
(28, 'bbb', 'bbb', 99),
(29, 'bbb', 'bbb', 100),
(30, '', '', 100),
(31, 'ccc', 'ccc', 101),
(32, 'C', 'Begginer', 102),
(33, 'eee', 'sfsd', 103),
(34, 'fff', 'fff', 104),
(35, 'ggg', 'ggg', 105),
(36, 'ggg', 'ggg', 106),
(37, 'ddw', 'ddw', 116),
(38, 'aaa', 'aaa', 117),
(53, 'CCDD', 'CCDD', 146),
(54, 'C#', 'Abc', 147),
(55, 'PHP', 'bbb', 147);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scan_document`
--
ALTER TABLE `scan_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `scan_document`
--
ALTER TABLE `scan_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
