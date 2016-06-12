-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2016 at 05:54 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sign_up`
--

-- --------------------------------------------------------

--
-- Table structure for table `registraion`
--

CREATE TABLE IF NOT EXISTS `registraion` (
`st_id` int(11) NOT NULL,
  `fastname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `session` varchar(10) DEFAULT NULL,
  `roll` int(15) DEFAULT NULL,
  `subj` varchar(100) DEFAULT NULL,
  `pass` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL,
  `image_name` varchar(64) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `registraion`
--

INSERT INTO `registraion` (`st_id`, `fastname`, `lastname`, `email`, `session`, `roll`, `subj`, `pass`, `type`, `image_name`) VALUES
(26, 'Ashikur', 'Rahman', 'ku.sumon.cse@gmail.com', '2011-12', 110241, 'CSE', 'c6f057b86584942e415435ffb1fa93d4', '2', 'upload/128.png'),
(76, 'Md', 'Sumon', 'm.sumon@gmail.com', '2013-2014', 110245, 'CSE', 'c6f057b86584942e415435ffb1fa93d4', '', 'upload/ashik.png'),
(78, 'Mohammad', 'Shaon', 'md.shw12@gmail.com', '2012-2013', 120613, 'AT', 'c6f057b86584942e415435ffb1fa93d4', '', 'upload/fb2.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registraion`
--
ALTER TABLE `registraion`
 ADD PRIMARY KEY (`st_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registraion`
--
ALTER TABLE `registraion`
MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=79;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
