-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2019 at 04:42 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydata`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `m_id` int(255) NOT NULL,
  `sender` int(255) NOT NULL,
  `receiver` int(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `postcomment`
--

CREATE TABLE `postcomment` (
  `comm_id` int(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `p_id` int(255) NOT NULL,
  `u_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `p_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `b_id` int(255) NOT NULL,
  `u_id` int(255) NOT NULL,
  `status` int(10) NOT NULL,
  `price` int(255) NOT NULL,
  `imgname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`p_id`, `title`, `description`, `b_id`, `u_id`, `status`, `price`, `imgname`) VALUES
(31, 'headphones', 'zdas jaherjaho8rvtq', 0, 42, 1, 40000, 'post31.jpg'),
(33, 'headphone', 'hsjdulh;j', 0, 42, 1, 4000, 'post33.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `postscomplains`
--

CREATE TABLE `postscomplains` (
  `comp_id` int(255) NOT NULL,
  `complain` varchar(255) NOT NULL,
  `u_id` int(255) NOT NULL,
  `p_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `requestcomment`
--

CREATE TABLE `requestcomment` (
  `comm_id` int(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `r_id` int(255) NOT NULL,
  `u_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `requestcomplains`
--

CREATE TABLE `requestcomplains` (
  `comm_id` int(255) NOT NULL,
  `complain` varchar(255) NOT NULL,
  `u_id` int(255) NOT NULL,
  `r_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `r_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `u_id` int(255) NOT NULL,
  `status` int(3) NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `balance` int(11) NOT NULL,
  `imgname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `uname`, `email`, `password`, `status`, `type`, `balance`, `imgname`) VALUES
(42, 'Arif Onoy', 'arifonoy05@gmail.com', '2222', 1, 'seller', 870, 'profile42.png'),
(46, 'Akib Raiyan', 'akib@gmail.com', 'aaaa', 1, 'buyer', 4130, 'profile46.jpg'),
(49, 'Sarawat', 'sara1@noob.com', '1111', 0, 'buyer', 0, 'profile49.png'),
(50, 'Akib', 'akibraiyan@gmail.com', '1111', 0, 'admin', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `sender` (`sender`,`receiver`),
  ADD KEY `receiver` (`receiver`);

--
-- Indexes for table `postcomment`
--
ALTER TABLE `postcomment`
  ADD PRIMARY KEY (`comm_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `u_id` (`u_id`) USING BTREE;

--
-- Indexes for table `postscomplains`
--
ALTER TABLE `postscomplains`
  ADD PRIMARY KEY (`comp_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `requestcomment`
--
ALTER TABLE `requestcomment`
  ADD PRIMARY KEY (`comm_id`),
  ADD KEY `r_id` (`r_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `requestcomplains`
--
ALTER TABLE `requestcomplains`
  ADD PRIMARY KEY (`comm_id`),
  ADD KEY `r_id` (`r_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `m_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postcomment`
--
ALTER TABLE `postcomment`
  MODIFY `comm_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `p_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `postscomplains`
--
ALTER TABLE `postscomplains`
  MODIFY `comp_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requestcomment`
--
ALTER TABLE `requestcomment`
  MODIFY `comm_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requestcomplains`
--
ALTER TABLE `requestcomplains`
  MODIFY `comm_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `r_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`receiver`) REFERENCES `users` (`u_id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`sender`) REFERENCES `users` (`u_id`);

--
-- Constraints for table `postcomment`
--
ALTER TABLE `postcomment`
  ADD CONSTRAINT `postcomment_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `posts` (`p_id`),
  ADD CONSTRAINT `postcomment_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`);

--
-- Constraints for table `postscomplains`
--
ALTER TABLE `postscomplains`
  ADD CONSTRAINT `postscomplains_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `posts` (`p_id`),
  ADD CONSTRAINT `postscomplains_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`);

--
-- Constraints for table `requestcomment`
--
ALTER TABLE `requestcomment`
  ADD CONSTRAINT `requestcomment_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `requests` (`r_id`),
  ADD CONSTRAINT `requestcomment_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`);

--
-- Constraints for table `requestcomplains`
--
ALTER TABLE `requestcomplains`
  ADD CONSTRAINT `requestcomplains_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `requests` (`r_id`),
  ADD CONSTRAINT `requestcomplains_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`);

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
