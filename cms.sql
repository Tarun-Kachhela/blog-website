-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2019 at 09:03 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'java'),
(2, 'ui'),
(3, 'php'),
(4, 'os'),
(5, 'python');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_post_id` int(11) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_context` text NOT NULL,
  `comment_status` varchar(255) NOT NULL DEFAULT 'unapproved',
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_context`, `comment_status`, `comment_date`) VALUES
(1, 1, 'tarun', 'tar@gmail.com', 'helloertyuiop\r\ndtyujkl;\r\nfghj', 'approved', '2019-01-03'),
(12, 1, 'ta', 'ta', 'tatttatatatattt\r\nayahahhahahah\r\n', 'approved', '2019-01-03'),
(13, 1, 'ta', 'ta', 'tatttatatatattt\r\nayahahhahahah\r\n', 'approved', '2019-01-03'),
(14, 1, 'tarun', 'tar@gmail.com', 't', 'approved', '2019-02-04'),
(15, 1, 'tarun', 'tar@gmail.com', 't', 'unapproved', '2019-02-04'),
(16, 1, 'tarun', 'tar@gmail.com', 't', 'unapproved', '2019-02-04'),
(17, 1, 'tarun1', 't', 't', 'approved', '2019-02-04'),
(18, 1, 'tarun', 't', 't', 'unapproved', '2019-02-04'),
(19, 2, 'tarun1', 'tar@gmail.com', 't', 'approved', '2019-02-04');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_cat_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL DEFAULT '0',
  `post_status` varchar(255) NOT NULL,
  `post_views_count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_cat_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(1, 1, 'multithreading', '1', '2019-01-03', 'java.jpeg', 'it is ability of the os to deal with the multiple thread in the single process ', 'multithreading , tarun', 0, 'published', 0),
(2, 2, 'color', '4', '2019-01-01', 'colors.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur fugit iure natus repellat veniam veritatis voluptas! Ab, assumenda beatae dolorum, eius harum iusto officia pariatur provident qui repellat rerum, sapiente!', 'color,shailu', 0, 'draft ', 0),
(3, 4, 'preemption', '4', '2019-02-03', 'php.jpg', '<h1>preemption</h1>', 'os,preemption', 0, 'Published', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `email`, `image`, `role`) VALUES
(1, 'Tarun', '$2y$10$2c4vN9Yep17WOHLCUjWcMOBMXeVabsZD71dG6SdoU5OAhcecn6I9m', 'Tarun', 'kachhela', 'tarun.kachhela2000@gmail.com', 'colors.jpeg', 'subscriber'),
(2, 'Tarun', '$2y$10$THv6VLiRKcasYalNAk/uWu0fnxbbB.pBgiw4wBNtkYaGLWuFhQfqS', 'Tarun', 'kachhela', 'tarun.kachhela2000@gmail.com', 'php.jpg', 'subscriber'),
(3, 'tarun', '$2y$10$fi2zOKQVN/ejGdbTdVgcEeJKYJDmzyoZo2QXJWNNBDXCXWTCYvYju', 'tarun', 'ka', 'tarun.kachhela2000@gmail.com', 'php.jpg', 'super_admin'),
(4, 'rohi', '$2y$10$nVhy4Z84l.xfOdQhKEEglOn2xDvNAVOSst8kuQ5jdogTy8XjAu0Qy', 'rohi', 'met', 'tarun.kachhela2000@gmail.com', 'os.jpg', 'admin'),
(5, 'tarun12', '$2y$10$5pkACvqFVXSMsDzgrzLV5eq1VvLR.bO6Co5QMFW1Q5VPwjjQg6bw6', 'tarun12', 't', 't@gmail.com', 'os.jpg', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
