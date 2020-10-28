-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 28, 2020 at 02:38 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `paytab`
--

-- --------------------------------------------------------

--
-- Table structure for table `entity`
--

CREATE TABLE `entity` (
  `entity_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_sub_category` int(11) NOT NULL DEFAULT '0',
  `is_active` int(11) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `entity`
--

INSERT INTO `entity` (`entity_id`, `name`, `is_sub_category`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'A', 0, 1, '2020-10-28 10:32:21', '2020-10-28 12:56:37'),
(2, 'B', 0, 1, '2020-10-28 10:32:21', '2020-10-28 12:56:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entity`
--
ALTER TABLE `entity`
  ADD PRIMARY KEY (`entity_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entity`
--
ALTER TABLE `entity`
  MODIFY `entity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
