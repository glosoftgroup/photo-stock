-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 06, 2018 at 06:20 AM
-- Server version: 5.7.20
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `photo`
--

-- --------------------------------------------------------

--
-- Table structure for table `aauth_groups`
--

CREATE TABLE `aauth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `definition` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aauth_groups`
--

INSERT INTO `aauth_groups` (`id`, `name`, `definition`) VALUES
(1, 'Admin', 'Super Admin Group'),
(2, 'Public', 'Public Access Group'),
(3, 'Default', 'Default Access Group');

-- --------------------------------------------------------

--
-- Table structure for table `aauth_group_to_group`
--

CREATE TABLE `aauth_group_to_group` (
  `group_id` int(11) UNSIGNED NOT NULL,
  `subgroup_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `aauth_login_attempts`
--

CREATE TABLE `aauth_login_attempts` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(39) DEFAULT '0',
  `timestamp` datetime DEFAULT NULL,
  `login_attempts` tinyint(2) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `aauth_perms`
--

CREATE TABLE `aauth_perms` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `definition` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `aauth_perm_to_group`
--

CREATE TABLE `aauth_perm_to_group` (
  `perm_id` int(11) UNSIGNED NOT NULL,
  `group_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `aauth_perm_to_user`
--

CREATE TABLE `aauth_perm_to_user` (
  `perm_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `aauth_pms`
--

CREATE TABLE `aauth_pms` (
  `id` int(11) UNSIGNED NOT NULL,
  `sender_id` int(11) UNSIGNED NOT NULL,
  `receiver_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text,
  `date_sent` datetime DEFAULT NULL,
  `date_read` datetime DEFAULT NULL,
  `pm_deleted_sender` int(1) DEFAULT NULL,
  `pm_deleted_receiver` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `aauth_posts`
--

CREATE TABLE `aauth_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(120) NOT NULL,
  `body` text NOT NULL,
  `file_name` varchar(120) NOT NULL,
  `file_type` varchar(10) NOT NULL,
  `file_size` float NOT NULL,
  `full_path` varchar(200) NOT NULL,
  `server_path` varchar(140) NOT NULL,
  `media` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `featured` int(11) NOT NULL,
  `media_type` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aauth_posts`
--

INSERT INTO `aauth_posts` (`id`, `title`, `body`, `file_name`, `file_type`, `file_size`, `full_path`, `server_path`, `media`, `category`, `featured`, `media_type`, `timestamp`) VALUES
(8, 'sdsdfsdf', '<p>dsfsdfsf</p>', 'index.jpeg', 'image/jpeg', 5.56, 'uploads//2018_Mar/index.jpeg', '', 0, 0, 0, 0, '2018-03-03 11:46:45'),
(10, 'aaaaaaaaaaaaaazzzzzzzzzzz', '<ol><li>ajajajjaakakaka <sup>aaaa</sup>aaaaa<sub>aaaaa</sub>aaaaaaa</li></ol><p>aa</p><p>a</p><h1>aaaa.jjk<img src=\"data:image/jpeg;base64,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\">jkjk</h1><p>jkjkjkjjjjkaaaaa<s>aaaa</s>aaaaaaa<span class=\"ql-font-monospace\">aaaaaaaaaaaaaaaaaaaaaa</span><span class=\"ql-font-serif\">aaaaaaaaaaaaaa</span></p>', 'female_cartoon_avatar_by_ahninniah-d6fo72f1.png', 'image/png', 82.57, 'uploads/2018_Mar/female_cartoon_avatar_by_ahninniah-d6fo72f.png', '', 0, 0, 0, 0, '2018-03-04 18:08:00'),
(15, 'Title goes here', '<p>Losem rem</p>', 'Screenshot_from_2018-02-27_19-10-19.png', 'image/png', 306.52, 'uploads/2018_Mar/Screenshot_from_2018-02-27_19-10-19.png', '', 0, 0, 0, 0, '2018-03-06 09:37:50'),
(17, 'Hello', '<p>There</p>', 'Lipa-na-mpesa1.jpg', 'image/jpeg', 68.98, 'uploads/2018_Mar/Lipa-na-mpesa.jpg', '/home/sky/lampstack-7.0.26-1/apache2/htdocs/photo-stock/uploads/2018_Mar/Lipa-na-mpesa1.jpg', 0, 0, 0, 0, '2018-03-06 10:39:59'),
(18, 'Mobile interface', '<ol><li class=\"ql-indent-1\"><strong style=\"color: rgb(255, 255, 0); background-color: rgb(102, 61, 0);\"><span class=\"ql-cursor\">﻿</span></strong><strong style=\"color: rgb(255, 255, 0); background-color: rgb(92, 0, 0);\">Mobile interface ....</strong></li></ol>', 'preview.png', 'image/png', 333.01, 'uploads/2018_Mar/preview.png', '/home/sky/lampstack-7.0.26-1/apache2/htdocs/photo-stock/uploads/2018_Mar/preview.png', 0, 0, 0, 0, '2018-03-06 12:03:58'),
(19, '', '', 'design-business-cards-with-stationary.jpg', 'image/jpeg', 30.34, 'uploads/2018_Mar/design-business-cards-with-stationary.jpg', '/home/sky/lampstack-7.0.26-1/apache2/htdocs/photo-stock/uploads/2018_Mar/design-business-cards-with-stationary.jpg', 0, 0, 0, 0, '2018-03-06 13:06:28'),
(20, '', '', 'Lipa-na-mpesa.jpg', 'image/jpeg', 68.98, 'uploads/2018_Mar/Lipa-na-mpesa.jpg', '/home/sky/lampstack-7.0.26-1/apache2/htdocs/photo-stock/uploads/2018_Mar/Lipa-na-mpesa.jpg', 0, 0, 0, 0, '2018-03-06 13:08:48');

-- --------------------------------------------------------

--
-- Table structure for table `aauth_site_info`
--

CREATE TABLE `aauth_site_info` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `title` varchar(120) NOT NULL,
  `description` text NOT NULL,
  `logo` varchar(140) NOT NULL,
  `email` varchar(120) NOT NULL,
  `company` varchar(120) NOT NULL,
  `phone` varchar(29) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aauth_site_info`
--

INSERT INTO `aauth_site_info` (`id`, `name`, `title`, `description`, `logo`, `email`, `company`, `phone`) VALUES
(1, 'Photo Stock', 'Just another website', 'cms site', '', '0', 'Photo stock', '');

-- --------------------------------------------------------

--
-- Table structure for table `aauth_users`
--

CREATE TABLE `aauth_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `banned` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `forgot_exp` text,
  `remember_time` datetime DEFAULT NULL,
  `remember_exp` text,
  `verification_code` text,
  `totp_secret` varchar(16) DEFAULT NULL,
  `ip_address` text,
  `fullname` varchar(120) NOT NULL,
  `address` varchar(120) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(120) NOT NULL,
  `postal_code` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aauth_users`
--

INSERT INTO `aauth_users` (`id`, `email`, `pass`, `username`, `banned`, `last_login`, `last_activity`, `date_created`, `forgot_exp`, `remember_time`, `remember_exp`, `verification_code`, `totp_secret`, `ip_address`, `fullname`, `address`, `city`, `country`, `postal_code`, `phone`) VALUES
(1, 'admin@example.com', 'dd5073c93fb477a167fd69072e95455834acd93df8fed41a2c468c45b394bfe3', 'Admin', 0, '2018-03-06 06:19:02', '2018-03-06 06:19:02', NULL, NULL, '2018-03-09 00:00:00', 'GscwAHuoBbj1zOeE', NULL, NULL, '127.0.0.1', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `aauth_user_to_group`
--

CREATE TABLE `aauth_user_to_group` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aauth_user_to_group`
--

INSERT INTO `aauth_user_to_group` (`user_id`, `group_id`) VALUES
(1, 1),
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `aauth_user_variables`
--

CREATE TABLE `aauth_user_variables` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `data_key` varchar(100) NOT NULL,
  `value` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aauth_groups`
--
ALTER TABLE `aauth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aauth_group_to_group`
--
ALTER TABLE `aauth_group_to_group`
  ADD PRIMARY KEY (`group_id`,`subgroup_id`);

--
-- Indexes for table `aauth_login_attempts`
--
ALTER TABLE `aauth_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aauth_perms`
--
ALTER TABLE `aauth_perms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aauth_perm_to_group`
--
ALTER TABLE `aauth_perm_to_group`
  ADD PRIMARY KEY (`perm_id`,`group_id`);

--
-- Indexes for table `aauth_perm_to_user`
--
ALTER TABLE `aauth_perm_to_user`
  ADD PRIMARY KEY (`perm_id`,`user_id`);

--
-- Indexes for table `aauth_pms`
--
ALTER TABLE `aauth_pms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `full_index` (`id`,`sender_id`,`receiver_id`,`date_read`);

--
-- Indexes for table `aauth_posts`
--
ALTER TABLE `aauth_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aauth_site_info`
--
ALTER TABLE `aauth_site_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aauth_users`
--
ALTER TABLE `aauth_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aauth_user_to_group`
--
ALTER TABLE `aauth_user_to_group`
  ADD PRIMARY KEY (`user_id`,`group_id`);

--
-- Indexes for table `aauth_user_variables`
--
ALTER TABLE `aauth_user_variables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_index` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aauth_groups`
--
ALTER TABLE `aauth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `aauth_login_attempts`
--
ALTER TABLE `aauth_login_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aauth_perms`
--
ALTER TABLE `aauth_perms`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aauth_pms`
--
ALTER TABLE `aauth_pms`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aauth_posts`
--
ALTER TABLE `aauth_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `aauth_site_info`
--
ALTER TABLE `aauth_site_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aauth_users`
--
ALTER TABLE `aauth_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aauth_user_variables`
--
ALTER TABLE `aauth_user_variables`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
