-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2016 at 05:55 AM
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
-- Indexes for table `tbl_contact_type`
--
ALTER TABLE `tbl_contact_type`
 ADD PRIMARY KEY (`rel_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_contact_type`
--
ALTER TABLE `tbl_contact_type`
MODIFY `rel_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
