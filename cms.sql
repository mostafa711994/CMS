-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2019 at 01:20 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

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
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Bootstrap5'),
(2, 'Javascript'),
(4, 'Html'),
(5, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(13, 14, 'omar ibrahem', 'example5555@gamil.com', 'hgmjvgm', 'unapproved', '2019-05-01'),
(14, 14, 'omar ibrahem', 'example5555@gamil.com', 'bhdfbndfgn', 'unapproved', '2019-05-03'),
(15, 14, 'omar ibrahem', 'example5555@gamil.com', 'ghghj', 'approved', '2019-05-04'),
(16, 14, 'hk', 'example5555@gamil.com', 'vbn v', 'unapproved', '2019-05-04'),
(17, 14, 'mostafa mahmoud', 'example@gamil.com', 'vbjm', 'unapproved', '2019-05-04'),
(18, 45, 'omar ibrahem', 'example5555@gamil.com', 'cvbn', 'unapproved', '2019-05-07'),
(19, 45, 'mostafa mahmoud', 'example@gamil.com', 'vbhn', 'unapproved', '2019-05-07'),
(20, 45, 'omar ibrahem', 'example5555@gamil.com', 'vcb', 'unapproved', '2019-05-07'),
(21, 30, 'omar ibrahem', 'example@gamil.com', 'bvgnbvgnm', 'unapproved', '2019-05-15'),
(22, 371, 'mostafa mahmoud', 'mahmoud@yahoo.com', 'p[uo', 'approved', '2019-05-21'),
(23, 371, 'mostafa nasr', 'example@gamil.com', 'gbfg', 'approved', '2019-05-21'),
(24, 380, 'omar ibrahem', 'example5555@gamil.com', 'zdthxstghxdgf', 'unapproved', '2019-07-21'),
(25, 371, 'mostafa mahmoud', 'example@gamil.com', 'xhhnmcdhfnmjdfh', 'approved', '2019-07-21');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL,
  `post_view_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_view_count`) VALUES
(371, 2, 'new project', 'Mostafa Mahmoud Nasr', '2019-05-21', 'image_4.jpg', '<p>php and javascript</p>', 'javascript , php', 0, 'published', 27),
(372, 2, 'new project', 'Mostafa Mahmoud Nasr', '2019-05-21', 'image_4.jpg', '<p>php and javascript</p>', 'javascript , php', 0, 'published', 1),
(373, 2, 'new project', 'Mostafa Mahmoud Nasr', '2019-05-21', 'image_4.jpg', '<p>php and javascript</p>', 'javascript , php', 0, 'published', 0),
(374, 2, 'new project', 'Mostafa Mahmoud Nasr', '2019-05-21', 'image_4.jpg', '<p>php and javascript</p>', 'javascript , php', 0, 'published', 0),
(375, 2, 'new project', 'Mostafa Mahmoud Nasr', '2019-05-21', 'image_4.jpg', '<p>php and javascript</p>', 'javascript , php', 0, 'published', 0),
(376, 2, 'new project', 'Mostafa Mahmoud Nasr', '2019-05-21', 'image_4.jpg', '<p>php and javascript</p>', 'javascript , php', 0, 'published', 0),
(377, 2, 'new project', 'Mostafa Mahmoud Nasr', '2019-05-21', 'image_4.jpg', '<p>php and javascript</p>', 'javascript , php', 0, 'published', 0),
(378, 2, 'new project', 'Mostafa Mahmoud Nasr', '2019-05-21', 'image_4.jpg', '<p>php and javascript</p>', 'javascript , php', 0, 'published', 0),
(379, 2, 'new project', 'Mostafa Mahmoud Nasr', '2019-05-21', 'image_4.jpg', '<p>php and javascript</p>', 'javascript , php', 0, 'published', 0),
(380, 2, 'new project5', 'Mostafa Mahmoud Nasr', '2019-07-21', 'image_4.jpg', '<p>php and javascript</p>', 'javascript , php', 0, 'published', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randsalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randsalt`) VALUES
(43, 'mosa', '$2y$10$8r1CyoNlwWXvuBZje3EEIeB3ibT16BB0nxc48ERhF.8t0NEA.ziu2', 'mosa', 'tolba', 'example@yahoo.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(44, 'mostafa', '$2y$10$uSHkfWB6kmx7rjp7QQpAUuhVMkg5svnMvoMMOiGs6GoQo7YH43JXC', '', 'bh', 'hjhvbj@gfbg.com', '', 'admin', '$2y$10$iusesomecrazystrings22'),
(69, 'hack', '$2y$12$aC3KXE8r66umhlWiG.fECuz4Zdip9wqsc4cVODHnCZ8STOICwiGB.', '', '', 'hack@yahoo.com', '', '', '$2y$10$iusesomecrazystrings22'),
(70, 'jack', '$2y$12$gN/n6RfG1adMI9jmi.t9MOblZUbKOLGM0jCRfxKvLrGCO8kDERAxO', '', '', 'jack@yahoo.com', '', '', '$2y$10$iusesomecrazystrings22'),
(71, 'mmmm', '$2y$12$rkFYj/4tymsQzpPOKczw6.B2vZiNaNwTdzT3N/X2SuhH0pUur/aJS', '', '', 'mmmm@drgdf.com', '', '', '$2y$10$iusesomecrazystrings22'),
(72, 'buby', '$2y$12$124m24BLGsIDP2u89hkRnOoRsGtdAaAj6wLU4OLEWt1Aq8soaiTsS', '', '', 'buby@yahoo.com', '', '', '$2y$10$iusesomecrazystrings22'),
(73, 'gfhjugkgykiyhik', '$2y$12$MXqnGkXavYc9PL9BpIKF5eY6cyuqBVCVgT1uwCH2SJ1LLp8ASMN02', '', '', 'mostafamahmoud1794@yahoo.com', '', '', '$2y$10$iusesomecrazystrings22'),
(74, 'axe', '$2y$12$vBUhU35cxx82h1MwVJZXr.AkNSkYEttgo8fcpEHQvb7LhtKK2PiZK', '', '', 'axe@yahoo.com', '', '', '$2y$10$iusesomecrazystrings22'),
(75, 'mansour', '$2y$12$z5JH6JDIVmlO7EdYa25Xqe2I72FH51owTQ17ibV8AN7neWzn7HAuO', '', '', 'aaaaa@yahoo.com', '', 'admin', '$2y$10$iusesomecrazystrings22'),
(76, 'mostafamahmoud1794', '$2y$12$PGwaVGXb.znS6ZFrRlZv3udzF7isP4GcABAUL9WZOICPmGBZwxb/y', '', '', 'mostafamahmoud1794erf@yahoo.com', '', '', '$2y$10$iusesomecrazystrings22'),
(77, 'mostafa8', '$2y$12$1H3nWMQpjO4D0JR8EJ6Ep.vhNZeyFGQcwaqTNM0e1deY7rz3vy/WO', '', '', 'h@yahoo.com', '', 'admin', '$2y$10$iusesomecrazystrings22'),
(78, 'fyu', '$2y$10$4rMifjk9G4d5DDXNStwUN.sUVowTDKJnFWoEQFmPidzHc6Aez4nhC', 'omar4', 'ibrahem', 'example4@yahoo.com', '', 'admin', '$2y$10$iusesomecrazystrings22'),
(79, 'mostafa7', '$2y$12$QogKYfiCG0b0mnURs.vEH.i5Os.KZjDGgd43qhEuxjocllBAbFNe.', '', '', 'm@yahoo.com', '', '', '$2y$10$iusesomecrazystrings22');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(1, '34vviibhbiv95bh7fhi1qpucdp', 1557169879),
(2, 'cupb6q55d8qni38qnog3k4tllp', 1557169438),
(3, '9r4qh34mrnv1lgjlkr95ndh5g8', 1557155289),
(4, '2edvojlvm2p6qima2l72bf2qan', 1557169485);

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
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=381;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
