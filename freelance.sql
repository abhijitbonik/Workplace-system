-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 25, 2016 at 09:22 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `freelance`
--
CREATE DATABASE IF NOT EXISTS `freelance` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `freelance`;

-- --------------------------------------------------------

--
-- Table structure for table `company_user`
--

CREATE TABLE IF NOT EXISTS `company_user` (
  `cname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `location` varchar(10) NOT NULL,
  `cdate` datetime NOT NULL,
  `phno` int(10) NOT NULL,
  `web` varchar(20) NOT NULL,
  `descrp` varchar(200) NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`phno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_user`
--

INSERT INTO `company_user` (`cname`, `email`, `password`, `address`, `location`, `cdate`, `phno`, `web`, `descrp`, `image`) VALUES
('Infosys', 'info@mail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Banglore', 'India', '2016-10-19 14:39:48', 9876, 'www.infosys.com', 'Infosys is an it giant.', ''),
('Google', 'google@mail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Hydrabad', 'India', '2016-10-05 12:58:51', 98765432, 'www.google.com', 'asssaaaaa', '98765432.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `job_apply`
--

CREATE TABLE IF NOT EXISTS `job_apply` (
  `job_id` int(20) DEFAULT NULL,
  `user_id` int(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  KEY `job_id` (`job_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_apply`
--

INSERT INTO `job_apply` (`job_id`, `user_id`, `status`) VALUES
(26, 23, 'Request'),
(25, 23, 'Request'),
(13, 23, 'Request');

-- --------------------------------------------------------

--
-- Table structure for table `job_approved`
--

CREATE TABLE IF NOT EXISTS `job_approved` (
  `job_id` int(5) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `approved_date` date DEFAULT NULL,
  `completion_date` date DEFAULT NULL,
  KEY `job_id` (`job_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_approved`
--

INSERT INTO `job_approved` (`job_id`, `user_id`, `approved_date`, `completion_date`) VALUES
(11, 1, '2016-10-23', '0000-00-00'),
(12, 1, '2016-10-23', '0000-00-00'),
(13, 23, '2016-10-23', NULL),
(10, 1, '2016-10-23', NULL),
(8, 1, '2016-10-23', NULL),
(9, 23, '2016-10-23', NULL),
(14, 23, '2016-10-24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_posts`
--

CREATE TABLE IF NOT EXISTS `job_posts` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_name` varchar(30) DEFAULT NULL,
  `job_descrp` varchar(50) DEFAULT NULL,
  `post_date` datetime DEFAULT NULL,
  `job_rate` varchar(10) DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `company_id` int(10) DEFAULT NULL,
  `job_status` varchar(10) NOT NULL,
  `submited_data` text NOT NULL,
  PRIMARY KEY (`job_id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `job_posts`
--

INSERT INTO `job_posts` (`job_id`, `job_name`, `job_descrp`, `post_date`, `job_rate`, `expire_date`, `company_id`, `job_status`, `submited_data`) VALUES
(8, 'User panel entry', 'blog research', '2016-10-19 18:30:43', '10$ and hr', '2023-10-16', 9876, 'Approved', ''),
(9, 'Admin entry', 'Daily task', '2016-10-19 18:36:02', '10$ and hr', '2023-10-16', 9876, 'Completed', '<p>ssssssssssssssssss</p>\r\n'),
(10, 'Web developing', 'Php developer', '2016-10-19 18:36:22', '10$ and hr', '0003-10-16', 9876, 'Approved', ''),
(11, 'Salesforce entry task', 'company details', '2016-10-19 19:04:15', '10$ and hr', '2023-10-16', 98765432, 'Approved', ''),
(12, 'Java web task', 'Spring framework', '2016-10-19 19:05:18', '10$ and hr', '2023-10-16', 98765432, 'Approved', ''),
(13, 'Salesforce2', 'xyz', '2016-10-22 17:40:04', '10$ and hr', '2023-10-16', 98765432, 'Completed', '<p>hello there how are u</p>\r\n'),
(14, 'ASP', 'qwery', '2016-10-24 11:12:46', '10$', '0000-00-00', 98765432, 'Completed', '<p>sssss</p>\r\n'),
(20, 'Javascript Developer needed', 'Hourly basis.. for 10 days', '2016-11-17 18:52:53', '10$ per hr', '2016-11-29', 98765432, '', ''),
(21, 'Python scripting in django', 'single page web  40 hrs work', '2016-11-17 18:54:06', '7$ an hr', '2016-11-28', 98765432, '', ''),
(22, 'Mac os system handler', 'weekly basis . Long term assistance needed.', '2016-11-17 18:55:22', '5$ hr', '2016-11-29', 98765432, '', ''),
(23, 'Rasbery Pi and javascript deve', '6 months working days', '2016-11-17 19:00:24', '10$ per hr', '2016-11-28', 9876, '', ''),
(24, 'ASP.net MVC managemt ', 'need two hrs of daily work for 30 days', '2016-11-17 19:02:02', '20$ per hr', '2016-11-30', 9876, '', ''),
(25, 'Linux web host management ', 'server side login will be provided and the details', '2016-11-17 19:03:41', '5$ hr', '2016-11-20', 9876, '', ''),
(26, 'Android developer', 'needed a android developed for developing a online', '2016-11-17 19:05:16', '100$ on co', '2016-11-20', 9876, '', ''),
(27, 'AngularJS development ', 'forming a single page application ', '2016-12-05 20:08:57', '100$ an hr', '2016-12-10', 9876, '', ''),
(28, 'UI & UX dvelopment task', 'angular, node, restful etc', '2016-12-05 20:10:46', '20$ an hr', '2016-12-10', 9876, '', ''),
(29, 'Python and Django framwork dev', 'Serverside development and deployment', '2016-12-05 20:14:18', '10$ an hr', '2016-12-06', 98765432, '', ''),
(30, 'Technical writer needed for do', 'web reseach and seo', '2016-12-05 20:16:49', '5$ an hr', '2016-12-07', 98765432, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `writer_user`
--

CREATE TABLE IF NOT EXISTS `writer_user` (
  `wname` varchar(20) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `country` varchar(10) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `bio` varchar(1000) NOT NULL,
  `phno` int(10) NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`phno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `writer_user`
--

INSERT INTO `writer_user` (`wname`, `email`, `password`, `address`, `country`, `gender`, `date`, `bio`, `phno`, `image`) VALUES
('Shon', 'shon@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Guwahati', 'India', 'male', '2016-09-12 18:09:30', '', 1, ''),
('Abhijit', 'banik@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'guwahati', 'India', 'male', '2016-09-06 14:21:46', ' klefpjrfepfe[kf[kefkefefe', 23, '23.jpg'),
('Alex', 'alex@g.c', '827ccb0eea8a706c4c34a16891f84e7b', 'NLP', 'India', 'male', '2016-09-25 14:12:23', '', 9876, ''),
('Biswa Phukan', 'biswa@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Nagaon', 'India', 'male', '2016-12-16 17:47:25', '', 56432356, ''),
('Afzal Lashkar', 'afzal@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Silchar', 'India', 'male', '2016-12-16 17:46:17', '', 78675432, ''),
('Kaushik Talukdar', 'kaushik@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Bombay', 'India', 'male', '2016-12-16 17:49:18', '', 87654321, ''),
('sam', 'sam@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'qwe', 'India', 'male', '2016-10-22 19:07:28', '', 89786543, ''),
('Himangshu Deka', 'himagshu@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Guwahati', 'India', 'male', '2016-12-16 17:45:19', '', 97864534, '');

-- --------------------------------------------------------

--
-- Table structure for table `w_exp`
--

CREATE TABLE IF NOT EXISTS `w_exp` (
  `wid` int(10) DEFAULT NULL,
  `title` varchar(20) DEFAULT NULL,
  `des` varchar(200) DEFAULT NULL,
  `company_name` varchar(20) DEFAULT NULL,
  `duration` varchar(20) DEFAULT NULL,
  KEY `wid` (`wid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `w_exp`
--

INSERT INTO `w_exp` (`wid`, `title`, `des`, `company_name`, `duration`) VALUES
(23, 'Programmer', 'Handled 100s of projects', 'Google', '2005 -06'),
(23, 'MAnager', 'Manage 50 members team', 'IBM', '2007-16'),
(23, 'CEO', 'Leadership work', 'Infosys', '2 years'),
(23, 'CFO', 'FInanacial management', 'Infosys', '2005 -06'),
(23, 'CTO', 'Program development task', 'Microsoft', '2015 - 16'),
(23, 'Programmer', 'Program development', 'TCS', '6 months'),
(23, 'Analyst', 'programmer team', 'SAP', '200708');

-- --------------------------------------------------------

--
-- Table structure for table `w_skills`
--

CREATE TABLE IF NOT EXISTS `w_skills` (
  `wid` int(10) NOT NULL,
  `p_skills` int(11) NOT NULL,
  `l_skills` int(11) NOT NULL,
  `s_skills` int(11) NOT NULL,
  `c_skills` int(11) NOT NULL,
  `cf_skills` int(11) NOT NULL,
  `sp_skills` int(11) NOT NULL,
  UNIQUE KEY `wid` (`wid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `w_skills`
--

INSERT INTO `w_skills` (`wid`, `p_skills`, `l_skills`, `s_skills`, `c_skills`, `cf_skills`, `sp_skills`) VALUES
(23, 50, 40, 35, 70, 90, 100);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `job_apply`
--
ALTER TABLE `job_apply`
  ADD CONSTRAINT `job_apply_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `job_posts` (`job_id`),
  ADD CONSTRAINT `job_apply_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `writer_user` (`phno`);

--
-- Constraints for table `job_approved`
--
ALTER TABLE `job_approved`
  ADD CONSTRAINT `job_approved_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `job_posts` (`job_id`),
  ADD CONSTRAINT `job_approved_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `writer_user` (`phno`);

--
-- Constraints for table `job_posts`
--
ALTER TABLE `job_posts`
  ADD CONSTRAINT `job_posts_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company_user` (`phno`);

--
-- Constraints for table `w_exp`
--
ALTER TABLE `w_exp`
  ADD CONSTRAINT `w_exp_ibfk_1` FOREIGN KEY (`wid`) REFERENCES `writer_user` (`phno`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
