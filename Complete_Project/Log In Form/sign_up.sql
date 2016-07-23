-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2016 at 08:34 AM
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
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
`st_id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`st_id`, `email`, `pass`) VALUES
(1, 'ku@gmial.com', '123456789cseCCV'),
(2, 'hu@hotmail.com', '11111111FFVfv');

-- --------------------------------------------------------

--
-- Table structure for table `registraion`
--

CREATE TABLE IF NOT EXISTS `registraion` (
`st_id` int(11) NOT NULL,
  `fastname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `session` varchar(10) DEFAULT NULL,
  `roll` int(10) DEFAULT NULL,
  `subj` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `registraion`
--

INSERT INTO `registraion` (`st_id`, `fastname`, `lastname`, `email`, `session`, `roll`, `subj`, `pass`, `type`) VALUES
(23, 'amin', 'ruhu', 'a@gmail.com', '2011-12', 12, 'IT', 'c6f057b86584942e415435ffb1fa93d4', ''),
(24, 'arman', 'ali', 's@gmail.com', '2011-12', 110241, 'CSE', 'c6f057b86584942e415435ffb1fa93d4', ''),
(25, 'hafiz', 'rahmn', 'd@gmail.com', '2014-15', 22003, 'CSE', 'c6f057b86584942e415435ffb1fa93d4', ''),
(26, 'Ashikur', 'Rahman', 'ku.sumon.cse@gmail.com', '2011-12', 110245, 'CSE', 'c6f057b86584942e415435ffb1fa93d4', 'admin'),
(27, 'avi', 'srd', 'vj@gmail.com', '2011-12', 1102000, 'CS', 'c6f057b86584942e415435ffb1fa93d4', ''),
(28, 'palash', 'sharkar', 'p@gmail.com', '2014-15', 10202, 'CSE', 'c6f057b86584942e415435ffb1fa93d4', ''),
(29, 'mahfuz', 'khan', 'k@gmail.com', '2012-13', 1010101, 'CSE', 'c6f057b86584942e415435ffb1fa93d4', ''),
(30, 'abm', 'muhit', 'm@gmail.com', '2012-13', 1000, 'CSE', 'c6f057b86584942e415435ffb1fa93d4', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `registraion`
--
ALTER TABLE `registraion`
 ADD PRIMARY KEY (`st_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `registraion`
--
ALTER TABLE `registraion`
MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
