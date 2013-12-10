-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 10, 2013 at 10:21 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `live_traffic`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_id` int(11) NOT NULL,
  `c_date` datetime NOT NULL,
  `c_details` text NOT NULL,
  `c_status` int(11) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE IF NOT EXISTS `membership` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `Cell No` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `text`) VALUES
(1, 'Masande', 'Masa', 'Masanda testing data application in codeIginater'),
(2, 'Asande', 'asande', 'Asande Mzansi ');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `controller` varchar(50) DEFAULT NULL,
  `view` varchar(50) DEFAULT '',
  `url` varchar(50) DEFAULT NULL,
  `menu` varchar(50) DEFAULT NULL,
  `order` int(2) unsigned DEFAULT NULL,
  `require_login` int(1) unsigned DEFAULT '0',
  `group_id` int(10) unsigned DEFAULT '0',
  `parent_id` int(10) unsigned DEFAULT NULL,
  `active` int(1) unsigned DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `controller`, `view`, `url`, `menu`, `order`, `require_login`, `group_id`, `parent_id`, `active`) VALUES
(1, 'Home', 'welcome', '', NULL, 'main', 1, 0, 0, NULL, 1),
(16, 'Admin Control Panel', 'auth', '', NULL, NULL, NULL, 0, 1, NULL, 1),
(9, 'Home', 'welcome', '', NULL, 'bottom', 0, 1, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE IF NOT EXISTS `reg` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `surname` varchar(60) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone_number` varchar(16) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  `confirmcode` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=173 ;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`id_user`, `name`, `surname`, `email`, `phone_number`, `username`, `password`, `confirmcode`) VALUES
(164, 'asanda', 'soga', '0781590122@mtnloaded.co.za', '0767998077', 'asanda', 'd41d8cd98f00b204e9800998ecf8427e', 'y'),
(168, 'sikhulule', 'Mbondwana', 'mmbondwana@gmail.com', '0767998077', 'skuja', '65eb113cfec87042f9a4bf2aff6ddda5', 'y'),
(169, 'asanda', 'soga', 'mmbondwana@gmail.com', '0767998077', 'asanda', '65eb113cfec87042f9a4bf2aff6ddda5', 'y'),
(170, ''' or ''1''=''1'' -- ''', ' '' or ''1''=''1'' -- ''', 'test@gamail.com', '0760998077', ' '' or ''1''=''1'' --', 'd41d8cd98f00b204e9800998ecf8427e', 'b24d0589bfcb1cfa0f7bda2c9af7f681'),
(171, ''' or ''1''=''1'' -- ''', ' '' or ''1''=''1'' -- ''', 'testr@gmail.com', '0760998077', ' '' or ''1''=''1'' --', 'd41d8cd98f00b204e9800998ecf8427e', '48c65a1ecd46b93ca60c15d5589a1a7e'),
(172, 'Masande', 'Mbondwana', 'mmbondwana@gmail.com', '0760998077', 'masa', '65eb113cfec87042f9a4bf2aff6ddda5', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_date` datetime NOT NULL,
  `r_subject` varchar(200) NOT NULL,
  `r_location` varchar(200) NOT NULL,
  `r_details` text NOT NULL,
  `username` varchar(60) NOT NULL,
  `r_status` int(11) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`r_id`, `r_date`, `r_subject`, `r_location`, `r_details`, `username`, `r_status`) VALUES
(1, '2013-02-11 00:00:00', 'Accident', 'Owen', 'The is a light accident at the corner of owen street', '', 0),
(2, '0000-00-00 00:00:00', 'Masande', 'Maththa', 'Masande testing', '', 0),
(3, '2013-02-14 00:00:00', 'Masande', 'Mbondwa', 'Masabdembondwa\r\nasdsadasdas\r\ndadsa', '', 0),
(4, '2013-02-14 00:00:00', 'Traffic Jam', 'North Crest', 'The is a heavy traffic jam in N2 on the way to town', '', 0),
(5, '2013-02-14 00:00:00', 'testing 1', 'testing', 'Zuma national assembly', '', 0),
(6, '2013-02-15 00:00:00', 'Testing Model', 'Model', 'This is model test', '', 0),
(7, '2013-02-15 00:00:00', 'Traffic lights', 'Long Streert', 'The traffic lights are not working at Coen Steytler Avenue', '', 0),
(8, '2013-02-15 00:00:00', 'Data', 'Data', 'Data', '', 0),
(9, '2013-02-15 09:43:42', 'Time', 'Testing time', 'Testing the date time', '', 0),
(10, '2013-02-15 09:49:12', 'Time', 'Testing time', 'Testing the date time', '', 0),
(11, '2013-02-15 09:58:50', 'ddddd', 'ddddd', 'ddddd', '', 0),
(12, '2013-02-15 09:59:05', 'ddddd', 'ddddd', 'ddddd', '', 0),
(13, '2013-02-15 10:01:06', 'Css', 'Csss', 'Csss', '', 0),
(14, '2013-02-15 10:05:47', 'Css', 'Csss', 'Csss', '', 0),
(15, '2013-02-15 10:09:00', 'colorl', 'colo', 'color', '', 0),
(16, '2013-02-15 10:09:16', 'colorl', 'colo', 'color', '', 0),
(17, '2013-02-15 10:14:13', 'Another color', 'Another coler', 'Another green color', '', 0),
(18, '2013-02-15 10:15:11', 'ds', 'sds', 'sds', '', 0),
(19, '2013-02-17 20:12:36', 'nnnn', 'jjjjj', 'jjkjkjk', '', 0),
(20, '2013-02-17 20:14:59', 'mmmmmmmmm', 'mkmmmmmm', 'mkmmmmmmmmmmmmmmm', '', 0),
(21, '2013-02-19 00:00:00', 'sasas', 'sasas', 'asasa', '', 0),
(22, '2013-02-19 00:00:00', 'iPhone', 'iPhone', 'iPhone', '', 0),
(23, '2013-02-19 00:00:00', 'htc', 'windows', 'nsndsd nsdsdsdsdsd sdsdsdsd sdsdsdsds sdsdsds sdsdsd sdsdsds   sdsddddddddddddd sdsdsds  sdsdsd dsds', '', 0),
(24, '2013-02-19 00:00:00', 'nnnnnnnnnnn', 'mmmmmmmmmmmmmmm', 'nnnnnnnnnnnnnnnnnnnnnnnnnn', '', 0),
(25, '2013-02-26 08:04:40', 'Queuing', 'Port Elizabeth', 'Queuing N2 in Port Elizabeth', '', 0),
(26, '2013-02-26 08:24:38', 'xxxx', 'xxxx', 'xxxx', '', 0),
(27, '2013-02-26 08:24:43', 'xxxx', 'xxxx', 'xxxx', '', 0),
(28, '2013-02-26 08:45:55', 'xxxx', 'xxxx', 'xxxx', '', 0),
(29, '2013-02-26 08:46:22', 'xxxx', 'xxxx', 'xxxx', '', 0),
(30, '2013-02-26 08:47:12', 'xxxx', 'xxxx', 'xxxx', '', 0),
(31, '2013-02-26 00:00:00', 'Hello', 'Helo', 'Helo', '', 0),
(32, '2013-02-27 18:28:54', 'mmmmmmmmm', 'mmmmmmmmmmmmmmm', 'mmmmmmmmm', '', 0),
(33, '2013-03-01 00:00:00', 'Masande', 'Masande', 'Masande', '', 0),
(34, '2013-03-11 00:00:00', 'queuing traffic ', 'Lindile Road Mthatha', 'queuing traffic\r\nFrom:Lindile Road\r\nTo:Botha Sigcau Drive', '', 0),
(35, '2013-03-12 00:00:00', 'Can you endorse me?', 'mmmmmmmmmmmmmmm', 'sdasdasdasda', '', 0),
(36, '2013-03-22 09:16:52', 'Test', 'Test', 'TEst again', 'Masande', 0),
(37, '2013-03-25 17:43:05', 'Masande', 'Masande', 'Masande', '', 0),
(38, '2013-04-06 20:40:12', 'roadworks', 'cape town', 'masande', '', 0),
(39, '2013-04-16 18:39:03', 'Masande', 'masa', 'masande', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` int(10) unsigned NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, 2130706433, 'administrator', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'mmbondwana@gmail.com', '', 'fb033fb86a03c1b6fe60472c7ed8f8e24a5edd65', NULL, 1268889823, 1268889823, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(3, 0, 'asanda mtambeka', 'e793d8ec235fb2b14d64bc92d7f5880632118ad8', NULL, 'masande@globalimsa.com', NULL, 'efa7c1e39492027a17d6a79e3b5e038a73dbd860', NULL, 1365686936, 1365686936, 1, 'asanda', 'mtambeka', 'mapapa', '080-809-9889'),
(4, 0, 'masande mbondwana', 'b49656ec8b8b5bd4418fb280c0667bb1815d9e15', NULL, 'admin@gmims.co.za', NULL, 'fd1ad189f0bf788ce00634da470e2a7f473b1d75', NULL, 1381214475, 1381220650, 1, 'Masande', 'Mbondwana', 'GLOBAL MIGRATION SA', '078-159-0122');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 3, 2),
(5, 4, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
