-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2016 at 11:29 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `to_do_lists`
--

CREATE TABLE IF NOT EXISTS `to_do_lists` (
`task_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `task_title` varchar(100) NOT NULL,
  `task_description` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `task_status` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `to_do_lists`
--

INSERT INTO `to_do_lists` (`task_id`, `user_id`, `task_title`, `task_description`, `date`, `task_status`) VALUES
(7, 39, 'Return Home', 'Return home after completing the task of college', '2016/05/25 13:00', 'Completed'),
(8, 39, 'College', 'College', '2016/05/21 10:00', 'New'),
(9, 39, 'Study', 'Study on Serveying-3', '2016/05/19 15:50', 'New'),
(10, 37, 'Writing Codes', 'Write down the code from W3 Schools.', '2016/05/20 20:00', 'In Progress'),
(12, 37, 'Refresh', 'Evening Coffee Break', '2016/05/21 11:00', 'Completed'),
(14, 37, 'Breakfast', 'Breakfast at outside Hotel near Hall', '2016/05/21 08:00', 'Completed'),
(15, 41, 'reading', 'Coffee Break', '2016/05/11 15:57', 'Completed'),
(16, 0, 'Office Job', 'Contact List Project', '2016/05/28 14:40', 'In Progress'),
(17, 43, 'Office Job', 'It start from 10:00 am  and continue to 5:00 pm', '2016/04/01 15:20', 'Completed'),
(18, 43, 'Office Home Work', 'When there have more task in hand, need to recover them', '2016/06/05 15:31', 'New'),
(19, 43, 'Study', 'Study php,php_pdo,js,laravel', '2016/0/20 15:26', 'In Progress'),
(20, 43, 'Prayer', 'Continue my prayer with attention', '2016/06/09 15:31', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(100) NOT NULL,
  `user_fname` varchar(100) NOT NULL,
  `user_lname` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_session` varchar(100) NOT NULL,
  `user_roll` int(100) NOT NULL,
  `user_subject` varchar(100) NOT NULL,
  `user_pwd` varchar(255) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `token` varchar(500) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_session`, `user_roll`, `user_subject`, `user_pwd`, `user_type`, `token`) VALUES
(42, 'bapon', 'sharkar', 'cseku.palash2011@gmail.com', '2014-2015', 1102020, 'CSE', '84d25de6bff6f0860fafc0a6c4eb9f89', 'admin', 'hHtj9ECxVXsjFVTBpKXRXleGM7EQ4fTx'),
(43, 'Palash', 'Sharkar', 'abm00@gmail.com', '2011-2012', 100000, 'CS02', '84d25de6bff6f0860fafc0a6c4eb9f89', 'user', '5ocxKinMjF7W3eDeJB8Up2rdT3gFt4Pp'),
(66, 'ashikur', 'rahman', 'abm@yahoo.com', '2012-2013', 110245, 'CSE', '84d25de6bff6f0860fafc0a6c4eb9f89', 'user', NULL),
(69, 'ashikur', 'rahman', 'kucse@gmail.com', '2013-2014', 110245, 'CSE', '84d25de6bff6f0860fafc0a6c4eb9f89', 'user', NULL),
(75, 'Arman', 'Ali', 'arman.ku@gmail.com', '2013-2014', 110241, 'CSE', '84d25de6bff6f0860fafc0a6c4eb9f89', 'user', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `to_do_lists`
--
ALTER TABLE `to_do_lists`
 ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `user_email` (`user_email`), ADD KEY `user_email_2` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `to_do_lists`
--
ALTER TABLE `to_do_lists`
MODIFY `task_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=76;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
