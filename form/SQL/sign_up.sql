-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2016 at 05:53 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE IF NOT EXISTS `tbl_contact` (
`user_id` int(11) NOT NULL,
  `st_contact_id` int(11) NOT NULL,
  `firststname` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `lastname` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `address` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_date` varchar(15) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `rel_status` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='tbl_contact' AUTO_INCREMENT=44 ;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`user_id`, `st_contact_id`, `firststname`, `lastname`, `address`, `email`, `contact_date`, `phone`, `image_name`, `rel_status`) VALUES
(36, 76, 'Ali', 'Arman', 'K.J. Hall, Room# 226, KU, Khulna ', 'Arman@gmail.com', '2016-06-02', '017-5296-9278', 'upload/arman.png', ' 11 Batch '),
(37, 76, 'Palash', 'Sharkar', 'K.B. Hall, Room# 104, KU, Khulna', 'palash.cse.ku@gmail.com', '2016-06-02', '017-5296-0000', 'upload/palash.png', ' 11 Batch '),
(39, 76, 'Mahfuzur Rahman', 'Khan', 'K.J. Hall, Room# 226, KU, Khulna', 'm.khan11@gmail.com', '2016-06-02', '017-5296-0001', 'upload/mahfuz.png', ' 11 Batch '),
(40, 76, 'Tahmid', 'Nur', 'K.J. Hall, Room# 430, KU, Khulna', 'tahmid.nur11@gmail.com', '2016-06-02', '017-5296-0002', 'upload/128.png', ' Batch Mate '),
(41, 76, 'Shadat', 'Hossain', 'K.B. Hall, Room# 103, KU, Khulna', 's.hossain@gmail.com', '2016-06-02', '017-5296-0002', 'upload/shadat.png', ' Batch Mate '),
(42, 76, 'Indrajit', 'Shaha', 'Ass. Engg. At PRAN RFL. Sylhet', 'indr.s@gmail.com', '2016-06-02', '017-5296-0003', 'upload/indra.png', ' School Mate '),
(43, 76, 'Mhabub', 'Sharder', 'Dhaka', 'ms.sharder@gmail.com', '2016-06-02', '017-5296-0004', 'upload/128.png', ' School Mate ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_type`
--

CREATE TABLE IF NOT EXISTS `tbl_contact_type` (
`rel_type_id` int(11) NOT NULL,
  `rel_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `st_contact_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `tbl_contact_type`
--

INSERT INTO `tbl_contact_type` (`rel_type_id`, `rel_name`, `st_contact_id`) VALUES
(38, 'doctor', 33),
(42, '11 Batch', 33),
(43, 'doctor', 33),
(44, 'friend', 59),
(45, 'friend', 33),
(46, '11 Batch', 76),
(47, 'Batch Mate', 76),
(48, 'School Mate', 76);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registraion`
--
ALTER TABLE `registraion`
 ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_contact_type`
--
ALTER TABLE `tbl_contact_type`
 ADD PRIMARY KEY (`rel_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registraion`
--
ALTER TABLE `registraion`
MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `tbl_contact_type`
--
ALTER TABLE `tbl_contact_type`
MODIFY `rel_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
