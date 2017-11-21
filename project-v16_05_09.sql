-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2016 at 07:30 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project-v16.05.09`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(6) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `usergroup_id` int(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('ON','OFF','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
`id` int(6) NOT NULL,
  `title` varchar(25) NOT NULL,
  `postby_id` int(6) NOT NULL,
  `verifiedby_id` int(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `verified` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `authority`
--

CREATE TABLE IF NOT EXISTS `authority` (
`id` int(6) NOT NULL,
  `usergroup_id` int(6) NOT NULL,
  `authitem_id` int(6) NOT NULL,
  `postby_id` int(6) NOT NULL,
  `verifiedby_id` int(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `verified` int(1) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
`id` int(6) NOT NULL,
  `dept_name` varchar(30) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `postby_id` int(6) NOT NULL,
  `verifiedby_id` int(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `verified` int(1) NOT NULL DEFAULT '0',
  `status` enum('ON','OFF') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE IF NOT EXISTS `designation` (
`id` int(6) NOT NULL,
  `title` varchar(30) NOT NULL,
  `postby_id` int(6) NOT NULL,
  `verifiedby_id` int(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `verified` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
`id` int(6) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `paddress` varchar(30) NOT NULL,
  `taddress` varchar(30) NOT NULL,
  `contact` int(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `usergroup_id` int(6) NOT NULL,
  `dept_id` int(6) NOT NULL,
  `designation_id` int(6) NOT NULL,
  `employeetype_id` int(6) NOT NULL,
  `appointed_at` date NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `postby_id` int(6) NOT NULL,
  `verifiedby_id` int(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `verified` int(1) NOT NULL DEFAULT '0',
  `status` enum('ON','OFF','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employeetype`
--

CREATE TABLE IF NOT EXISTS `employeetype` (
`id` int(6) NOT NULL,
  `title` varchar(15) NOT NULL,
  `postby_id` int(6) NOT NULL,
  `verifiedby_id` int(6) NOT NULL,
  `cerated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `verified` int(1) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
`id` int(6) NOT NULL,
  `employee_id` int(6) NOT NULL,
  `designation_id` int(6) NOT NULL,
  `starting_from` date NOT NULL,
  `ending_at` date NOT NULL,
  `postby_id` int(6) NOT NULL,
  `verifedby_id` int(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `verified` int(1) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usergroup`
--

CREATE TABLE IF NOT EXISTS `usergroup` (
`id` int(6) NOT NULL,
  `title` varchar(15) NOT NULL,
  `details` varchar(50) NOT NULL,
  `code` enum('Non-Register','Register','') NOT NULL,
  `postby_id` int(6) NOT NULL,
  `verifiedby_id` int(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `verified` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(6) NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `usergroup_id` int(6) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `postby_id` int(6) NOT NULL,
  `verifiedby_id` int(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `verified` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`), ADD KEY `usergroup_id` (`usergroup_id`);

--
-- Indexes for table `authitem`
--
ALTER TABLE `authitem`
 ADD PRIMARY KEY (`id`), ADD KEY `postby_id` (`postby_id`), ADD KEY `verifiedby_id` (`verifiedby_id`);

--
-- Indexes for table `authority`
--
ALTER TABLE `authority`
 ADD PRIMARY KEY (`id`), ADD KEY `usergroup_id` (`usergroup_id`), ADD KEY `authitem_id` (`authitem_id`), ADD KEY `postby_id` (`postby_id`), ADD KEY `verifiedby_id` (`verifiedby_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
 ADD PRIMARY KEY (`id`), ADD KEY `postby_id` (`postby_id`), ADD KEY `verifiedby_id` (`verifiedby_id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
 ADD PRIMARY KEY (`id`), ADD KEY `postby_id` (`postby_id`), ADD KEY `verifiedby_id` (`verifiedby_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
 ADD PRIMARY KEY (`id`), ADD KEY `usergroup_id` (`usergroup_id`), ADD KEY `verifiedby_id` (`verifiedby_id`), ADD KEY `postby_id` (`postby_id`), ADD KEY `designation_id` (`designation_id`), ADD KEY `employeetype_id` (`employeetype_id`), ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `employeetype`
--
ALTER TABLE `employeetype`
 ADD PRIMARY KEY (`id`), ADD KEY `postby_id` (`postby_id`), ADD KEY `verifiedby_id` (`verifiedby_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
 ADD PRIMARY KEY (`id`), ADD KEY `employee_id` (`employee_id`), ADD KEY `designation_id` (`designation_id`), ADD KEY `employee_id_2` (`employee_id`), ADD KEY `designation_id_2` (`designation_id`), ADD KEY `postby_id` (`postby_id`), ADD KEY `verifedby_id` (`verifedby_id`);

--
-- Indexes for table `usergroup`
--
ALTER TABLE `usergroup`
 ADD PRIMARY KEY (`id`), ADD KEY `postby_id` (`postby_id`), ADD KEY `verifiedby_id` (`verifiedby_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD KEY `usergroup_id` (`usergroup_id`), ADD KEY `postby_id` (`postby_id`), ADD KEY `verifiedby_id` (`verifiedby_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `authitem`
--
ALTER TABLE `authitem`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `authority`
--
ALTER TABLE `authority`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employeetype`
--
ALTER TABLE `employeetype`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usergroup`
--
ALTER TABLE `usergroup`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
