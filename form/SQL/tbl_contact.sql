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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
