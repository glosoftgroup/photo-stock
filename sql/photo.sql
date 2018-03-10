-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 10, 2018 at 06:57 AM
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
-- Table structure for table `aauth_categories`
--

CREATE TABLE `aauth_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(119) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aauth_categories`
--

INSERT INTO `aauth_categories` (`id`, `name`) VALUES
(2, 'Religion'),
(4, 'Miscellaneous'),
(5, 'Abstract'),
(6, 'Backgrounds/Textures'),
(7, '3D'),
(8, 'Pattern'),
(9, 'Art'),
(10, 'Logo'),
(11, 'Flower'),
(12, 'Food'),
(13, 'Inforgraphics '),
(14, 'Illustrations'),
(15, 'Love'),
(16, 'Cultural'),
(17, 'Sports/Recreation'),
(18, 'People'),
(19, 'Nature'),
(20, 'Education'),
(21, 'Animals/Wildlife'),
(22, 'Buildings/Landmarks'),
(23, 'Business/Finance'),
(24, 'Beauty/Fashion'),
(25, 'Editorial'),
(26, 'HealthCare/Medical'),
(27, 'Science');

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
  `thumbnail` varchar(130) NOT NULL,
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

INSERT INTO `aauth_posts` (`id`, `title`, `body`, `file_name`, `file_type`, `file_size`, `full_path`, `thumbnail`, `server_path`, `media`, `category`, `featured`, `media_type`, `timestamp`) VALUES
(84, 'Old Tools', '<p>Very often when dealing with responsive design you’ll want to render elements conditionally. For instance, display a specific menu for mobile device only.</p>', 'old-tools-58897_1920(1).jpg', 'image/jpeg', 896.58, 'uploads/2018_Mar/old-tools-58897_1920(1).jpg', 'uploads/2018_Mar/old-tools-58897_1920(1)_580_700.jpg', '/home/sky/lampstack-7.0.26-1/apache2/htdocs/photo-stock/uploads/2018_Mar/old-tools-58897_1920(1).jpg', 0, 0, 0, 0, '2018-03-10 14:32:44'),
(85, 'Man', '<p>Very often when dealing with responsive design you’ll want to render elements conditionally. For instance, display a specific menu for mobile device only.</p>', 'man-1595370_1920.png', 'image/png', 595.14, 'uploads/2018_Mar/man-1595370_1920.png', 'uploads/2018_Mar/man-1595370_1920_580_700.png', '/home/sky/lampstack-7.0.26-1/apache2/htdocs/photo-stock/uploads/2018_Mar/man-1595370_1920.png', 0, 0, 0, 0, '2018-03-10 14:35:01'),
(86, 'Karnak', '<p>Very often when dealing with responsive design you’ll want to render elements conditionally. For instance, display a specific menu for mobile device only.</p>', 'karnak-2303629_1920.jpg', 'image/jpeg', 1214.67, 'uploads/2018_Mar/karnak-2303629_1920.jpg', 'uploads/2018_Mar/karnak-2303629_1920_580_700.jpg', '/home/sky/lampstack-7.0.26-1/apache2/htdocs/photo-stock/uploads/2018_Mar/karnak-2303629_1920.jpg', 0, 0, 0, 0, '2018-03-10 14:36:54'),
(87, 'Soap Bubble', '<p>Very often when dealing with responsive design you’ll want to render elements conditionally. For instance, display a specific menu for mobile device only.</p>', 'soap-bubble-2258904_1920.jpg', 'image/jpeg', 548.02, 'uploads/2018_Mar/soap-bubble-2258904_1920.jpg', 'uploads/2018_Mar/soap-bubble-2258904_1920_580_700.jpg', '/home/sky/lampstack-7.0.26-1/apache2/htdocs/photo-stock/uploads/2018_Mar/soap-bubble-2258904_1920.jpg', 0, 0, 0, 0, '2018-03-10 14:37:50'),
(88, 'Woman', '<p>Very often when dealing with responsive design you’ll want to render elements conditionally. For instance, display a specific menu for mobile device only.</p>', 'woman-1595367_1920.jpg', 'image/jpeg', 653.64, 'uploads/2018_Mar/woman-1595367_1920.jpg', 'uploads/2018_Mar/woman-1595367_1920_580_700.jpg', '/home/sky/lampstack-7.0.26-1/apache2/htdocs/photo-stock/uploads/2018_Mar/woman-1595367_1920.jpg', 0, 0, 0, 0, '2018-03-10 14:38:44'),
(89, 'Woman', '<p>Very often when dealing with responsive design you’ll want to render elements conditionally. For instance, display a specific menu for mobile device only.</p>', 'woman-2151017_1920.jpg', 'image/jpeg', 947.22, 'uploads/2018_Mar/woman-2151017_1920.jpg', 'uploads/2018_Mar/woman-2151017_1920_580_700.jpg', '/home/sky/lampstack-7.0.26-1/apache2/htdocs/photo-stock/uploads/2018_Mar/woman-2151017_1920.jpg', 0, 0, 0, 0, '2018-03-10 14:39:29'),
(90, 'Lions', '<p>Very often when dealing with responsive design you’ll want to render elements conditionally. For instance, display a specific menu for mobile device only.</p>', 'lions-2702828_1920.jpg', 'image/jpeg', 393.93, 'uploads/2018_Mar/lions-2702828_1920.jpg', 'uploads/2018_Mar/lions-2702828_1920_580_700.jpg', '/home/sky/lampstack-7.0.26-1/apache2/htdocs/photo-stock/uploads/2018_Mar/lions-2702828_1920.jpg', 0, 0, 0, 0, '2018-03-10 14:40:15'),
(91, 'Elephant', '<p>Very often when dealing with responsive design you’ll want to render elements conditionally. For instance, display a specific menu for mobile device only.</p>', 'elephant-2870777_1920.jpg', 'image/jpeg', 450.29, 'uploads/2018_Mar/elephant-2870777_1920.jpg', 'uploads/2018_Mar/elephant-2870777_1920_580_700.jpg', '/home/sky/lampstack-7.0.26-1/apache2/htdocs/photo-stock/uploads/2018_Mar/elephant-2870777_1920.jpg', 0, 0, 0, 0, '2018-03-10 14:41:11'),
(92, 'Bird', '<p>Very often when dealing with responsive design you’ll want to render elements conditionally. For instance, display a specific menu for mobile device only.</p>', 'bird-3183441_1920.jpg', 'image/jpeg', 390.93, 'uploads/2018_Mar/bird-3183441_1920.jpg', 'uploads/2018_Mar/bird-3183441_1920_580_700.jpg', '/home/sky/lampstack-7.0.26-1/apache2/htdocs/photo-stock/uploads/2018_Mar/bird-3183441_1920.jpg', 0, 0, 0, 0, '2018-03-10 14:42:03'),
(93, 'Cyprus', '<p>Very often when dealing with responsive design you’ll want to render elements conditionally. For instance, display a specific menu for mobile device only.</p>', 'cyprus-3184019_1920.jpg', 'image/jpeg', 703.78, 'uploads/2018_Mar/cyprus-3184019_1920.jpg', 'uploads/2018_Mar/cyprus-3184019_1920_580_700.jpg', '/home/sky/lampstack-7.0.26-1/apache2/htdocs/photo-stock/uploads/2018_Mar/cyprus-3184019_1920.jpg', 0, 0, 0, 0, '2018-03-10 14:43:37'),
(94, 'Vegetables', '<p>Very often when dealing with responsive design you’ll want to render elements conditionally. For instance, display a specific menu for mobile device only.</p>', 'mediterranean-cuisine-2378758_1920.jpg', 'image/jpeg', 778.23, 'uploads/2018_Mar/mediterranean-cuisine-2378758_1920.jpg', 'uploads/2018_Mar/mediterranean-cuisine-2378758_1920_580_700.jpg', '/home/sky/lampstack-7.0.26-1/apache2/htdocs/photo-stock/uploads/2018_Mar/mediterranean-cuisine-2378758_1920.jpg', 0, 0, 0, 0, '2018-03-10 14:44:36');

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
(1, 'Africa Stock Images', 'Just another website', 'cms site', '', '0', 'Africa Stock Images', '');

-- --------------------------------------------------------

--
-- Table structure for table `aauth_taxonomy_metas`
--

CREATE TABLE `aauth_taxonomy_metas` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_name` varchar(70) NOT NULL,
  `type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aauth_taxonomy_metas`
--

INSERT INTO `aauth_taxonomy_metas` (`id`, `post_id`, `category_id`, `category_name`, `type`) VALUES
(16, 80, 2, 'christian', ''),
(17, 80, 3, 'muslim', ''),
(22, 81, 9, 'Art', ''),
(23, 81, 15, 'Love', ''),
(24, 76, 19, 'Nature', ''),
(25, 82, 8, 'Pattern', ''),
(26, 83, 2, 'Religion', ''),
(27, 83, 4, 'Miscellaneous', ''),
(28, 83, 5, 'Abstract', ''),
(29, 83, 6, 'Backgrounds/Textures', ''),
(30, 83, 7, '3D', ''),
(31, 83, 9, 'Art', ''),
(32, 83, 11, 'Flower', ''),
(33, 84, 16, 'Cultural', ''),
(34, 85, 16, 'Cultural', ''),
(35, 86, 2, 'Religion', ''),
(36, 87, 19, 'Nature', ''),
(37, 88, 18, 'People', ''),
(38, 89, 18, 'People', ''),
(39, 90, 21, 'Animals/Wildlife', ''),
(40, 91, 21, 'Animals/Wildlife', ''),
(41, 92, 21, 'Animals/Wildlife', ''),
(42, 93, 19, 'Nature', ''),
(43, 94, 12, 'Food', '');

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
(1, 'admin@example.com', 'dd5073c93fb477a167fd69072e95455834acd93df8fed41a2c468c45b394bfe3', 'Admin', 0, '2018-03-10 03:36:47', '2018-03-10 03:36:47', NULL, NULL, '2018-03-13 00:00:00', 'mRlj1T5pX3MzuDCE', NULL, NULL, '127.0.0.1', '', '', '', '', '', ''),
(2, 'admin2@example.com', 'b778efd029a720b8d2121d2714d693ec68e614cb3c913de71e249774ed6a8aaf', 'admin2examplecom', 0, '2018-03-07 04:00:20', '2018-03-07 04:00:20', '2018-03-07 04:00:20', NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '', '', '', '', '', ''),
(3, 'admin3@example.com', 'c5c0b6b20e10c41552499077c813362080f9ecb62e884d85164fa0e5a061e6c9', 'admin3examplecom', 0, '2018-03-07 21:19:35', '2018-03-07 21:19:36', '2018-03-07 21:19:35', NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '', '', '', '', '', '');

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
(1, 3),
(2, 3),
(3, 3);

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
-- Indexes for table `aauth_categories`
--
ALTER TABLE `aauth_categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `aauth_taxonomy_metas`
--
ALTER TABLE `aauth_taxonomy_metas`
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
-- AUTO_INCREMENT for table `aauth_categories`
--
ALTER TABLE `aauth_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `aauth_groups`
--
ALTER TABLE `aauth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `aauth_login_attempts`
--
ALTER TABLE `aauth_login_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `aauth_site_info`
--
ALTER TABLE `aauth_site_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aauth_taxonomy_metas`
--
ALTER TABLE `aauth_taxonomy_metas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `aauth_users`
--
ALTER TABLE `aauth_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `aauth_user_variables`
--
ALTER TABLE `aauth_user_variables`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
