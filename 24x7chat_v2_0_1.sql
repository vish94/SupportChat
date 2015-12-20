-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2014 at 07:11 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `24x7chat v2.0`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `online` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `password`, `online`) VALUES
(2, 'admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0);

-- --------------------------------------------------------

--
-- Table structure for table `allusers`
--

CREATE TABLE IF NOT EXISTS `allusers` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `new` int(2) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `allusers`
--

INSERT INTO `allusers` (`user_id`, `tbname`, `username`, `new`) VALUES
(1, 'sample@sample.com', 'Sample', 0),
(2, 'vishesh@gmail.com', 'vishesh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sample@sample.com`
--

CREATE TABLE IF NOT EXISTS `sample@sample.com` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `msg` text,
  `time` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sample@sample.com`
--

INSERT INTO `sample@sample.com` (`id`, `name`, `msg`, `time`) VALUES
(1, 'Sample', 'This is just a sample. Please do not reply.', '2014-06-17 11:28:46');

-- --------------------------------------------------------

--
-- Table structure for table `vishesh@gmail.com`
--

CREATE TABLE IF NOT EXISTS `vishesh@gmail.com` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `msg` text,
  `time` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `vishesh@gmail.com`
--

INSERT INTO `vishesh@gmail.com` (`id`, `name`, `msg`, `time`) VALUES
(1, 'vishesh', 'hello', '2014-06-17 11:58:00'),
(2, 'Admin', 'Hello vishesh! Please leave your message. We are happy to help you!', '2014-06-17 11:58:00'),
(3, 'vishesh', 'hello', '2014-06-17 12:22:32'),
(4, 'Admin', 'Sorry vishesh, we are away. But ask your questions & give your email ID - We will help you. \r\n    				   You may also check back here for the response by using the email ID', '2014-06-17 12:22:32'),
(5, 'vishesh', 'hello', '2014-06-17 12:22:34'),
(6, 'Admin', 'Sorry vishesh, we are away. But ask your questions & give your email ID - We will help you. \r\n    				   You may also check back here for the response by using the email ID', '2014-06-17 12:22:34'),
(7, 'vishesh', 'hello', '2014-06-17 12:22:35'),
(8, 'Admin', 'Sorry vishesh, we are away. But ask your questions & give your email ID - We will help you. \r\n    				   You may also check back here for the response by using the email ID', '2014-06-17 12:22:35'),
(9, 'vishesh', 'hello', '2014-06-17 12:26:12'),
(10, 'vishesh', 'hello', '2014-06-17 12:26:14'),
(11, 'vishesh', 'hello', '2014-06-17 12:26:47'),
(12, 'vishesh', 'hello', '2014-06-17 12:26:48'),
(13, 'vishesh', 'hello', '2014-06-17 12:26:53'),
(14, 'vishesh', 'hello', '2014-06-17 12:27:16'),
(15, 'vishesh', 'hello', '2014-06-17 12:27:17'),
(16, 'vishesh', 'hello', '2014-06-17 12:27:18'),
(17, 'vishesh', 'hello', '2014-06-17 12:27:18'),
(18, 'vishesh', 'hello', '2014-06-17 12:27:18'),
(19, 'vishesh', 'hello', '2014-06-17 12:27:18'),
(20, 'vishesh', 'this isnt workin', '2014-06-17 12:28:13'),
(21, 'vishesh', 'hello', '2014-06-17 12:29:29'),
(22, 'vishesh', 'hello', '2014-06-17 12:29:40'),
(23, 'vishesh', 'f', '2014-06-17 12:29:42'),
(24, 'vishes', 'hello', '2014-06-17 12:30:33'),
(25, 'vishesh', 'hello', '2014-06-17 12:31:36'),
(26, 'vishesh', 'hello', '2014-06-17 12:31:53'),
(27, 'vishesha', 'hello', '2014-06-17 12:37:05'),
(28, 'vishesh', 'hello', '2014-06-17 12:37:26'),
(29, 'Admin', '', '2014-06-17 12:37:26'),
(30, 'vishesh', 'hi', '2014-06-17 12:38:47'),
(31, 'Admin', '', '2014-06-17 12:38:47'),
(32, 'vishesh', 'hello', '2014-06-17 12:39:27'),
(33, 'vishesh', 'hi', '2014-06-17 12:39:35'),
(34, 'Admin', 'Sorry , we are away. But ask your questions & give your email ID - We will help you. \r\n    				   You may also check back here for the response by using the email ID', '2014-06-17 12:39:35');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
