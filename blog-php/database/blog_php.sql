-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 07, 2019 at 07:23 AM
-- Server version: 5.7.27-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `body` text,
  `published` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `slug`, `views`, `image`, `body`, `published`, `created_at`, `updated_at`) VALUES
(1, 1, 'Steps to improve your Cyber Security Skills!', 'steps-to-improve-your-cyber-security-skills-', 0, '', '<p>Read every day &amp;&amp; Practice Everyday</p>\r\n\r\n<p>Click</p>\r\n', 0, '2019-08-24 15:23:31', '2019-08-24 08:23:31'),
(NULL, 1, 'Hello', 'hello', NULL, 'banner.jpg', '&lt;p&gt;Hello&lt;/p&gt;\r\n\r\n&lt;p&gt;\\r\\n\\r\\n&lt;/p&gt;\r\n\r\n&lt;p&gt;\\\\r\\\\n\\\\r\\\\n&lt;/p&gt;\r\n\r\n&lt;p&gt;\\r\\n\\r\\n&lt;/p&gt;\r\n\r\n&lt;p&gt;\\\\\\\\r\\\\\\\\n\\\\\\\\r\\\\\\\\n&lt;/p&gt;\r\n\r\n&lt;p&gt;\\r\\n\\r\\n&lt;/p&gt;\r\n\r\n&lt;p&gt;\\\\r\\\\n\\\\r\\\\n&lt;/p&gt;\r\n\r\n&lt;p&gt;\\r\\n\\r\\n&lt;/p&gt;\r\n\r\n&lt;p&gt;\\\\\\\\\\\\\\\\r\\\\\\\\\\\\\\\\n&lt;/p&gt;\r\n\r\n&lt;p&gt;\\r\\n\\r\\n&lt;/p&gt;\r\n\r\n&lt;p&gt;\\\\r\\\\n\\\\r\\\\n&lt;/p&gt;\r\n\r\n&lt;p&gt;\\r\\n\\r\\n&lt;/p&gt;\r\n\r\n&lt;p&gt;\\\\\\\\r\\\\\\\\n&lt;/p&gt;\r\n\r\n&lt;p&gt;\\r\\n\\r\\n&lt;/p&gt;\r\n\r\n&lt;p&gt;\\\\r\\\\n&lt;/p&gt;\r\n\r\n&lt;p&gt;\\r\\n&lt;/p&gt;\r\n', 1, '2019-08-24 15:22:49', '2019-08-24 08:22:49');

-- --------------------------------------------------------

--
-- Table structure for table `post_topics`
--

CREATE TABLE `post_topics` (
  `id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_topics`
--

INSERT INTO `post_topics` (`id`, `post_id`, `topic_id`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `slug`) VALUES
(1, 'Vulnerabilities', 'vulnerabilities'),
(2, 'Motivation', 'motivation'),
(3, 'Practice', 'practice');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('Author','Admin') DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `role`, `password`, `created_at`, `updated_at`) VALUES
(2, 'test', 'test@mail.com', 'Author', '098f6bcd4621d373cade4e832627b4f6', '2019-08-23 02:48:18', '2019-08-23 02:48:18'),
(3, 'John', 'john@example.com', 'Admin', '6579e96f76baa00787a28653876c6127', '2019-08-23 16:46:01', '2019-08-23 16:46:01'),
(4, 'frank', 'frank@example.com', 'Author', '26253c50741faa9c2e2b836773c69fe6', '2019-08-24 01:07:57', '2019-08-24 01:07:57'),
(5, 'Joey', 'joey@example.com', NULL, 'd6ba0682d75eb986237fb6b594f8a31f', '2019-08-24 02:08:46', '2019-08-24 02:08:46'),
(6, 'Ryan', 'Ryan@example.com', 'Admin', '5f4dcc3b5aa765d61d8327deb882cf99', '2019-08-24 15:20:08', '2019-08-24 15:20:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `post_topics`
--
ALTER TABLE `post_topics`
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
