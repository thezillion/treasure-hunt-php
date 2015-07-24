-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2015 at 07:24 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cyquest`
--

-- --------------------------------------------------------

--
-- Table structure for table `questionbank`
--

CREATE TABLE IF NOT EXISTS `questionbank` (
  `qno` int(11) NOT NULL,
  `question` longtext COLLATE utf8_unicode_ci NOT NULL,
  `answer` longtext COLLATE utf8_unicode_ci NOT NULL,
  `hint` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questionbank`
--

INSERT INTO `questionbank` (`qno`, `question`, `answer`, `hint`) VALUES
(0, 'You''ve got the question, I guess?', 'yeah', 'You''ve got the question, kid!'),
(1, '16', 'foursquare', 'Math');

-- --------------------------------------------------------

--
-- Table structure for table `userbase`
--

CREATE TABLE IF NOT EXISTS `userbase` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `instit` longtext NOT NULL,
  `email` varchar(100) NOT NULL,
  `admin_rights` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userbase`
--

INSERT INTO `userbase` (`id`, `username`, `password`, `instit`, `email`, `admin_rights`) VALUES
(1, 'thezillion', 'thezillion', 'MAA', '', '1'),
(2, 'mondol', 'lodnom', 'Montfort', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `userhintstaken`
--

CREATE TABLE IF NOT EXISTS `userhintstaken` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `newscore` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `userperformance`
--

CREATE TABLE IF NOT EXISTS `userperformance` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  `score` int(11) NOT NULL DEFAULT '0',
  `attempts` int(11) NOT NULL DEFAULT '0',
  `lastTaskCompleted` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `taskCompletions` longtext COLLATE utf8_unicode_ci NOT NULL,
  `hint_taken` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'n',
  `admin_rights` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userperformance`
--

INSERT INTO `userperformance` (`id`, `username`, `level`, `score`, `attempts`, `lastTaskCompleted`, `taskCompletions`, `hint_taken`, `admin_rights`) VALUES
(1, 'thezillion', 1, 15, 0, '2015-05-28 17:43:47', '\n0 : 2015-05-28 11:05:32\n1 : 2015-05-28 17:43:47', 'n', '1'),
(2, 'mondol', 1, 0, 0, '', '', 'n', '1');

-- --------------------------------------------------------

--
-- Table structure for table `userresponses`
--

CREATE TABLE IF NOT EXISTS `userresponses` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `level` int(11) NOT NULL,
  `response` longtext NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userresponses`
--

INSERT INTO `userresponses` (`id`, `username`, `level`, `response`, `time`) VALUES
(1, 'thezillion', 0, '', '2015-05-28 10:50:01'),
(2, 'thezillion', 0, '', '2015-05-28 10:52:48'),
(3, 'thezillion', 0, '', '2015-05-28 10:54:11'),
(4, 'thezillion', 0, '', '2015-05-28 10:54:13'),
(5, 'thezillion', 0, 'yeah', '2015-05-28 11:05:32'),
(6, 'thezillion', 1, '16', '2015-05-28 17:43:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questionbank`
--
ALTER TABLE `questionbank`
  ADD PRIMARY KEY (`qno`);

--
-- Indexes for table `userbase`
--
ALTER TABLE `userbase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userhintstaken`
--
ALTER TABLE `userhintstaken`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userperformance`
--
ALTER TABLE `userperformance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userresponses`
--
ALTER TABLE `userresponses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questionbank`
--
ALTER TABLE `questionbank`
  MODIFY `qno` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `userbase`
--
ALTER TABLE `userbase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `userhintstaken`
--
ALTER TABLE `userhintstaken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `userperformance`
--
ALTER TABLE `userperformance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `userresponses`
--
ALTER TABLE `userresponses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
