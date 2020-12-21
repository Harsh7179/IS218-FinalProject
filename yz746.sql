-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2020 at 01:27 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yz746`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(60) DEFAULT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=353 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `email`, `fname`, `lname`, `birthday`, `password`) VALUES
(1, 'mjlee@njit.edu', 'Mike', 'Lee', '2000-05-05', '1234'),
(2, 'janedoe@njit.edu', 'John', 'Doe', '1950-07-07', '1234'),
(4, 'ml24q73@njit.edu', '1', '1', '2000-01-01', '2'),
(5, 'ml241q73@njit.edu', '1', '1', '1991-01-01', '1'),
(7, 'test@njit.edu', 'yong', 'zhao', '2000-02-02', '1234'),
(8, 'Rebecca@gmail.com', 'Rebecca', 'cortes', '1900-03-03', 'cortes'),
(10, 'test@gmail.com', 'test', 'test', '1980-12-05', 'test'),
(11, 'test2@gmail.com', 'test', 'test', '1980-12-05', 'test'),
(12, 'mjlee@njit.edu0', 'yong', 'yong', '1980-12-05', '1234'),
(329, 'george02@gmail.com', 'George', 'Mayor', '1960-12-12', '1234'),
(330, 'robkago3030@gmail.com', 'Geo', 'Kago', '2000-12-10', '1234'),
(334, 'robkago303033@gmail.com', 'Geo', 'gew', '1960-12-10', '12345'),
(336, 'jhhf@fddd.bfff', 'egrrr', 'rhgf', '1960-12-10', 'aaaa'),
(338, 'george01@gmail.com', 'Geo', 'Kago', '1960-12-10', '1234'),
(339, 'dd@gmail.com', 'Geo', 'Kago', '1960-12-10', '1234'),
(340, 'dwd@gmail.com', 'Geod', 'Kagod', '1960-12-12', '1234'),
(341, 'robkago303030@gmail.com', 'Rod', 'gew', '2000-12-10', '1234'),
(342, 'robkago30030@gmail.com', 'Danie', 'Davi', '2000-12-10', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `questionid` int(11) DEFAULT NULL,
  `answer` varchar(200) DEFAULT NULL,
  `answerscore` int(11) NOT NULL DEFAULT '0',
  `answerdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`aid`, `questionid`, `answer`, `answerscore`, `answerdate`) VALUES
(1, 1, 'Answered', 17, '2020-12-21 00:07:02'),
(2, 10, 'This question is Answered', -3, '2020-12-21 00:25:25'),
(3, 1, 'Answered Again', 0, '2020-12-21 00:06:33'),
(4, 10, 'Checked', 1, '2020-12-21 00:25:22'),
(6, 3, 'This is a new Answer', 1, '2020-12-21 00:09:57'),
(8, 3, 'New', 0, '2020-12-21 00:09:53'),
(9, 10, 'Noted', 2, '2020-12-21 00:25:26'),
(10, 54, 'Correct the body, Not Clear!', 1, '2020-12-21 00:18:54'),
(11, 55, 'Yes, it is.', 0, '2020-12-20 20:55:44'),
(12, 54, 'Add Body again', 1, '2020-12-21 00:18:49'),
(13, 3, 'This is New to me', 0, '2020-12-21 00:09:49'),
(14, 3, 'To me', 0, '2020-12-21 00:09:46'),
(17, 3, 'Score Upvote is working, Waoh', 5, '2020-12-21 00:09:40'),
(18, 54, 'Good Question', 3, '2020-12-21 00:23:10'),
(19, 10, 'New User', 1, '2020-12-21 00:25:06');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `owneremail` varchar(60) DEFAULT NULL,
  `ownerid` int(11) DEFAULT NULL,
  `createddate` datetime DEFAULT NULL,
  `title` text NOT NULL,
  `body` text NOT NULL,
  `skills` text NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `owneremail`, `ownerid`, `createddate`, `title`, `body`, `skills`, `score`) VALUES
(1, 'janedoe@njit.edu', 2, '2017-01-01 00:00:00', 'This is test #B', 'Question Text Here', 'PHP', 0),
(3, 'janedoe@njit.edu', 2, '2017-01-01 00:00:00', 'This is test #A', 'How to HTML?', 'HTML, CSS', 0),
(10, 'dd@gmail.com', 14, '2020-11-28 03:37:36', 'Double checking', 'No errors', 'PHP, CSS', 0),
(47, 'george02@gmail.com', 329, '2020-12-12 05:11:39', 'resubmit', 'weryhjlkkjhgfdsa', 'PHP', 4),
(54, 'george02@gmail.com', 329, '2020-12-12 05:16:56', 'Waooooh', 'WYAEUSRIDTOFIYULU', 'great skills', 65),
(55, 'george02@gmail.com', 329, '2020-12-20 09:40:19', 'What is new', 'Java is it Updated?', 'PHP, CSS, Java', 2),
(56, 'george02@gmail.com', 329, '2020-12-20 09:51:04', 'Is the final project working?', 'PHP yah, Css, Yah, PDO perfect', 'PHP, CSS, PDO', 0),
(57, 'george01@gmail.com', 338, '2020-12-20 09:53:17', 'My question is? Que', 'I do not have a question. Testing New Question class.', 'PHP, CSS, Java, PDO', 12),
(58, 'george01@gmail.com', 338, '2020-12-20 10:10:53', 'It is still working?', 'New Body here#', 'PHP, CSS', 0),
(59, 'george02@gmail.com', 329, '2020-12-21 12:12:38', 'How is the code', 'sfdsb fdv', 'bill', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
