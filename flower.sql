-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015-04-20 00:17:16
-- 服务器版本: 5.5.41-0ubuntu0.14.04.1
-- PHP 版本: 5.5.9-1ubuntu4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `flower`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `user` varchar(25) CHARACTER SET utf16 NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `artist`
--

CREATE TABLE IF NOT EXISTS `artist` (
  `artist_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` varchar(25) NOT NULL DEFAULT '初级',
  `is_sure` smallint(1) DEFAULT '0',
  `city` int(11) DEFAULT NULL,
  `id_photo` int(11) DEFAULT NULL,
  `photo` varchar(30) DEFAULT 'default_photo.jpg',
  `phone` char(12) NOT NULL,
  PRIMARY KEY (`artist_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `work` int(10) NOT NULL,
  `user` int(11) NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text CHARACTER SET utf16 NOT NULL,
  `comment_id` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `error_message`
--

CREATE TABLE IF NOT EXISTS `error_message` (
  `error_id` int(10) NOT NULL AUTO_INCREMENT,
  `error_page` varchar(80) NOT NULL,
  `error_message` varchar(80) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`error_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=84 ;

--
-- 转存表中的数据 `error_message`
--

INSERT INTO `error_message` (`error_id`, `error_page`, `error_message`, `time`) VALUES
(1, '/var/www/html/flower', '', '2015-04-19 12:41:58'),
(2, '/var/www/html/flower', '12345', '2015-04-19 12:43:53'),
(3, '/var/www/html/flower', 'flower', '2015-04-19 12:44:22'),
(4, '/var/www/html/flower', 'SELECT * FROM `user` WHERE `phone` = ''13559855005'' LIMIT 1  ', '2015-04-19 13:28:31'),
(5, '/var/www/html/flower', 'SELECT * FROM `user` WHERE `phone` = ''13559855001'' LIMIT 1  ', '2015-04-19 13:28:46'),
(6, '/var/www/html/flower', 'SELECT * FROM `user` WHERE `phone` = ''13559855001'' LIMIT 1  ', '2015-04-19 13:28:47'),
(7, '/var/www/html/flower', 'mark', '2015-04-19 13:37:48'),
(8, '/var/www/html/flower', 'mark1', '2015-04-19 13:38:32'),
(9, '/var/www/html/flower', 'mark2', '2015-04-19 13:40:16'),
(10, '/var/www/html/flower', 'mark3', '2015-04-19 13:41:09'),
(11, '/var/www/html/flower', 'SELECT * FROM `user` WHERE `user_name` = null AND `password` = ''807dbc6d05b26b57', '2015-04-19 13:44:43'),
(12, '/var/www/html/flower', 'SELECT * FROM `user` WHERE `user_name` = '''' AND `password` = ''807dbc6d05b26b57f2', '2015-04-19 13:45:31'),
(13, '/var/www/html/flower', 'mark4', '2015-04-19 13:45:31'),
(14, '/var/www/html/flower', 'SELECT * FROM `user` WHERE `phone` = ''13550056273'' LIMIT 1  ', '2015-04-19 13:46:38'),
(15, '/var/www/html/flower', 'SELECT * FROM `user` WHERE `user_name` = '''' AND `password` = ''e8248cbe79a288ffec', '2015-04-19 13:46:55'),
(16, '/var/www/html/flower', 'mark4', '2015-04-19 13:46:55'),
(17, '/var/www/html/flower', 'SELECT * FROM `user` WHERE `phone` = ''18328455337'' LIMIT 1  ', '2015-04-19 13:49:47'),
(18, '/var/www/html/flower', 'SELECT * FROM `user` WHERE `user_name` = '''' AND `password` = ''e8248cbe79a288ffec', '2015-04-19 13:49:57'),
(19, '/var/www/html/flower', 'mark4', '2015-04-19 13:49:57'),
(20, '/var/www/html/flower', 'SELECT * FROM `user` WHERE `phone` = ''15105132885'' LIMIT 1  ', '2015-04-19 13:59:53'),
(21, '/var/www/html/flower', 'SELECT * FROM `user` WHERE `user_name` = '''' AND `password` = ''603e6907398c7e74e2', '2015-04-19 14:00:04'),
(22, '/var/www/html/flower', 'd', '2015-04-19 14:00:04'),
(23, '/var/www/html/flower', 'SELECT * FROM `user` WHERE `phone` = ''15105017337'' LIMIT 1  ', '2015-04-19 14:01:24'),
(24, '/var/www/html/flower', 'd', '2015-04-19 14:01:36'),
(25, '/var/www/html/flower', 'SELECT * FROM `user` WHERE `user_name` = '''' AND `password` = ''f638e2789006da9bb3', '2015-04-19 14:01:36'),
(26, '/var/www/html/flower', 'SELECT * FROM `user` WHERE `phone` = ''15133551221'' LIMIT 1  ', '2015-04-19 14:02:56'),
(27, '/var/www/html/flower', 'd', '2015-04-19 14:03:06'),
(28, '/var/www/html/flower', 'SELECT * FROM `user` WHERE `user_name` = '''' AND `password` = ''3495ff69d34671d1e1', '2015-04-19 14:03:07'),
(29, '/var/www/html/flower', 'SELECT * FROM `user` WHERE `phone` = ''15133221444'' LIMIT 1  ', '2015-04-19 14:04:11'),
(30, '/var/www/html/flower', '下下d', '2015-04-19 14:04:20'),
(31, '/var/www/html/flower', 'SELECT * FROM `user` WHERE `user_name` = ''下下'' AND `password` = ''70374248fd712908', '2015-04-19 14:04:20'),
(32, '/var/www/html/flower', '下下d', '2015-04-19 14:04:23'),
(33, '/var/www/html/flower', 'SELECT * FROM `user` WHERE `user_name` = ''下下'' AND `password` = ''70374248fd712908', '2015-04-19 14:04:23'),
(34, '/var/www/html/flower', '下下d', '2015-04-19 14:04:37'),
(35, '/var/www/html/flower', 'SELECT * FROM `user` WHERE `user_name` = ''下下'' AND `password` = ''70374248fd712908', '2015-04-19 14:04:37'),
(36, '/var/www/html/flower', 'SELECT * FROM `user` WHERE `user_name` = ''GRSDVAG'' LIMIT 1  ', '2015-04-19 15:50:24'),
(37, '/var/www/html/flower', 'mark01', '2015-04-19 15:52:04'),
(38, '/var/www/html/flower', 'mark05', '2015-04-19 15:52:04'),
(39, '/var/www/html/flower', 'mark0c2', '2015-04-19 15:52:55'),
(40, '/var/www/html/flower', 'mark01', '2015-04-19 15:52:55'),
(41, '/var/www/html/flower', 'mark05', '2015-04-19 15:52:55'),
(42, '/var/www/html/flower', 'sss', '2015-04-19 15:53:27'),
(43, '/var/www/html/flower', 'mark0c2', '2015-04-19 15:53:27'),
(44, '/var/www/html/flower', 'mark01', '2015-04-19 15:53:27'),
(45, '/var/www/html/flower', 'mark05', '2015-04-19 15:53:27'),
(46, '/var/www/html/flower', 'sss', '2015-04-19 15:53:29'),
(47, '/var/www/html/flower', 'mark0c2', '2015-04-19 15:53:29'),
(48, '/var/www/html/flower', 'sss', '2015-04-19 15:53:35'),
(49, '/var/www/html/flower', 'mark0c2', '2015-04-19 15:53:35'),
(50, '/var/www/html/flower', 'mark01', '2015-04-19 15:53:35'),
(51, '/var/www/html/flower', 'sss', '2015-04-19 15:53:43'),
(52, '/var/www/html/flower', 'mark0c2', '2015-04-19 15:53:43'),
(53, '/var/www/html/flower', 'mark01', '2015-04-19 15:53:43'),
(54, '/var/www/html/flower', 'sss', '2015-04-19 15:53:47'),
(55, '/var/www/html/flower', 'mark0c2', '2015-04-19 15:53:47'),
(56, '/var/www/html/flower', 'mark01', '2015-04-19 15:53:47'),
(57, '/var/www/html/flower', 'ssdddds', '2015-04-19 15:54:35'),
(58, '/var/www/html/flower', 'sss', '2015-04-19 15:54:35'),
(59, '/var/www/html/flower', 'mark0c2', '2015-04-19 15:54:35'),
(60, '/var/www/html/flower', 'ssdddds', '2015-04-19 15:54:39'),
(61, '/var/www/html/flower', 'sss', '2015-04-19 15:54:39'),
(62, '/var/www/html/flower', 'mark0c2', '2015-04-19 15:54:39'),
(63, '/var/www/html/flower', 'mark01', '2015-04-19 15:54:39'),
(64, '/var/www/html/flower', 'ssdddds', '2015-04-19 15:55:25'),
(65, '/var/www/html/flower', 'sss', '2015-04-19 15:55:25'),
(66, '/var/www/html/flower', 'mark0c2', '2015-04-19 15:55:25'),
(67, '/var/www/html/flower', 'sss', '2015-04-19 15:57:35'),
(68, '/var/www/html/flower', 'mark0c2', '2015-04-19 15:57:35'),
(69, '/var/www/html/flower', 'mark01', '2015-04-19 15:57:35'),
(70, '/var/www/html/flower', 'mark05', '2015-04-19 15:57:35'),
(71, '/var/www/html/flower', 'sss', '2015-04-19 15:58:18'),
(72, '/var/www/html/flower', 'mark0c2', '2015-04-19 15:58:18'),
(73, '/var/www/html/flower', 'mark01', '2015-04-19 15:58:18'),
(74, '/var/www/html/flower', 'mark05', '2015-04-19 15:58:18'),
(75, '/var/www/html/flower', 'sss', '2015-04-19 15:59:40'),
(76, '/var/www/html/flower', 'mark0c2', '2015-04-19 15:59:41'),
(77, '/var/www/html/flower', 'mark01', '2015-04-19 15:59:41'),
(78, '/var/www/html/flower', 'mark05', '2015-04-19 15:59:41'),
(79, '/var/www/html/flower', 'sss', '2015-04-19 15:59:44'),
(80, '/var/www/html/flower', 'mark0c2', '2015-04-19 15:59:44'),
(81, '/var/www/html/flower', 'mark01', '2015-04-19 16:05:43'),
(82, '/var/www/html/flower', 'mark01', '2015-04-19 16:07:38'),
(83, '/var/www/html/flower', 'mark01', '2015-04-19 16:09:12');

-- --------------------------------------------------------

--
-- 表的结构 `flori_life`
--

CREATE TABLE IF NOT EXISTS `flori_life` (
  `blog_id` int(10) NOT NULL AUTO_INCREMENT,
  `author_type` smallint(4) NOT NULL,
  `author_id` int(10) NOT NULL,
  `blog_title` varchar(30) NOT NULL,
  `cover` varchar(25) NOT NULL,
  `type` char(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` longtext NOT NULL,
  PRIMARY KEY (`blog_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `focus`
--

CREATE TABLE IF NOT EXISTS `focus` (
  `artist` int(10) NOT NULL,
  `user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `focus_work`
--

CREATE TABLE IF NOT EXISTS `focus_work` (
  `work` int(10) NOT NULL,
  `user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `message_id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `artist` int(10) NOT NULL,
  `message` text CHARACTER SET utf16 NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `user` int(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `address` varchar(50) DEFAULT NULL,
  `phone` char(12) NOT NULL,
  `work_id` int(10) DEFAULT '-1',
  `artist_id` int(10) NOT NULL DEFAULT '-1',
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `personal_data`
--

CREATE TABLE IF NOT EXISTS `personal_data` (
  `artist` int(10) NOT NULL,
  `content` longtext CHARACTER SET utf16 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `personal_data`
--

INSERT INTO `personal_data` (`artist`, `content`) VALUES
(3, ' '),
(18, ' '),
(18, ' '),
(20, ' '),
(21, ' '),
(22, ' '),
(23, ' '),
(23, ' '),
(23, ' ');

-- --------------------------------------------------------

--
-- 表的结构 `service_area`
--

CREATE TABLE IF NOT EXISTS `service_area` (
  `artist` int(10) NOT NULL,
  `area` longtext CHARACTER SET utf16 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `service_area`
--

INSERT INTO `service_area` (`artist`, `area`) VALUES
(3, ' '),
(18, ' '),
(18, ' '),
(20, ' '),
(21, ' '),
(22, ' '),
(23, ' '),
(23, ' '),
(23, ' ');

-- --------------------------------------------------------

--
-- 表的结构 `upvote`
--

CREATE TABLE IF NOT EXISTS `upvote` (
  `work` int(10) NOT NULL,
  `user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `phone` char(12) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` smallint(3) NOT NULL DEFAULT '0',
  `level` varchar(20) NOT NULL DEFAULT '初级',
  `is_sure` smallint(3) NOT NULL DEFAULT '0',
  `id_photo` varchar(50) DEFAULT NULL,
  `photo` varchar(50) NOT NULL DEFAULT 'default_photo.jpg	',
  `city` varchar(20) DEFAULT NULL,
  `hot` int(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`user_id`, `phone`, `user_name`, `password`, `user_type`, `level`, `is_sure`, `id_photo`, `photo`, `city`, `hot`) VALUES
(1, '11111', 'flower', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', 0, '初级', 0, '6622622', 'default_photo.jpg	', NULL, NULL),
(2, '1111111111', '111', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', 1, '初级', 0, NULL, 'default_photo.jpg	', NULL, NULL),
(3, '13559855005', '', '807dbc6d05b26b57f20df280f00e517c87e96d0f', 1, '初级', 0, NULL, 'default_photo.jpg	', '成都', NULL),
(4, '13559855001', '', '807dbc6d05b26b57f20df280f00e517c87e96d0f', 1, '初级', 0, NULL, 'default_photo.jpg	', '成都', NULL),
(5, '13559855001', '', '807dbc6d05b26b57f20df280f00e517c87e96d0f', 1, '初级', 0, NULL, 'default_photo.jpg	', '成都', NULL),
(6, '13559855001', '', '807dbc6d05b26b57f20df280f00e517c87e96d0f', 1, '初级', 0, NULL, 'default_photo.jpg	', '成都', NULL),
(7, '13559855001', '', '807dbc6d05b26b57f20df280f00e517c87e96d0f', 1, '初级', 0, NULL, 'default_photo.jpg	', '成都', NULL),
(8, '13559855001', '', '807dbc6d05b26b57f20df280f00e517c87e96d0f', 1, '初级', 0, NULL, 'default_photo.jpg	', '成都', NULL),
(9, '13559855001', '', '807dbc6d05b26b57f20df280f00e517c87e96d0f', 1, '初级', 0, NULL, 'default_photo.jpg	', '成都', NULL),
(10, '13559855001', '', '807dbc6d05b26b57f20df280f00e517c87e96d0f', 1, '初级', 0, NULL, 'default_photo.jpg	', '成都', NULL),
(11, '13559855001', '', '807dbc6d05b26b57f20df280f00e517c87e96d0f', 1, '初级', 0, NULL, 'default_photo.jpg	', '成都', NULL),
(12, '13559855001', '', '807dbc6d05b26b57f20df280f00e517c87e96d0f', 1, '初级', 0, NULL, 'default_photo.jpg	', '成都', NULL),
(13, '13559855001', '', '807dbc6d05b26b57f20df280f00e517c87e96d0f', 1, '初级', 0, NULL, 'default_photo.jpg	', '成都', NULL),
(14, '13559855001', '', '807dbc6d05b26b57f20df280f00e517c87e96d0f', 1, '初级', 0, NULL, 'default_photo.jpg	', '成都', NULL),
(15, '13559855001', '', '807dbc6d05b26b57f20df280f00e517c87e96d0f', 1, '初级', 0, NULL, 'default_photo.jpg	', '成都', NULL),
(16, '13559855001', '', '807dbc6d05b26b57f20df280f00e517c87e96d0f', 1, '初级', 0, NULL, 'default_photo.jpg	', '成都', NULL),
(17, '13559855001', '', '807dbc6d05b26b57f20df280f00e517c87e96d0f', 1, '初级', 0, NULL, 'default_photo.jpg	', '成都', NULL),
(18, '13550056273', '', 'e8248cbe79a288ffec75d7300ad2e07172f487f6', 1, '初级', 0, NULL, 'default_photo.jpg	', '成都', NULL),
(19, '18328455337', '', 'e8248cbe79a288ffec75d7300ad2e07172f487f6', 1, '初级', 0, NULL, 'default_photo.jpg	', '成都', NULL),
(20, '15105132885', '', '603e6907398c7e74e25c0ae8ec3a03ffac7c9bb4', 1, '初级', 0, NULL, 'default_photo.jpg	', '成都', NULL),
(21, '15105017337', '', 'f638e2789006da9bb337fd5689e37a265a70f359', 1, '初级', 0, NULL, 'default_photo.jpg	', '成都', NULL),
(22, '15133551221', '', '3495ff69d34671d1e15b33a63c1379fdedd3a32a', 1, '初级', 0, NULL, 'default_photo.jpg	', '成都', NULL),
(23, '15133221444', '下下', '70374248fd7129088fef42b8f568443f6dce3a48', 1, '初级', 0, NULL, 'default_photo.jpg	', '成都', NULL),
(24, '15133221444', '下下', '70374248fd7129088fef42b8f568443f6dce3a48', 1, '初级', 0, NULL, 'default_photo.jpg	', '成都', NULL),
(25, '15133221444', '下下', '70374248fd7129088fef42b8f568443f6dce3a48', 1, '初级', 0, NULL, 'default_photo.jpg	', '成都', NULL),
(26, '15105105778', 'wwwwwwwwwwww', 'd215773c2c1f9abba0b67d6bdccdc139f9d6fbe0', 0, '初级', 0, NULL, 'default_photo.jpg	', NULL, NULL),
(27, '15105105776', 'XWQD', '55c100ba37d2df35ec1e5f5d6302f060387df6cc', 0, '初级', 0, NULL, 'default_photo.jpg	', NULL, NULL),
(28, '15103105777', 'GRSDVA', '200747f8066dab8437ca50a1d9a28ee95ee34a98', 0, '初级', 0, NULL, 'default_photo.jpg	', NULL, NULL),
(29, '15103105777', 'GRSDVAG', '200747f8066dab8437ca50a1d9a28ee95ee34a98', 0, '初级', 0, NULL, 'default_photo.jpg	', NULL, NULL),
(30, '15103105777', 'GRSDVAGj', '200747f8066dab8437ca50a1d9a28ee95ee34a98', 0, '初级', 0, NULL, 'default_photo.jpg	', NULL, NULL),
(31, '15103105777', 'GRSDVAGje', '200747f8066dab8437ca50a1d9a28ee95ee34a98', 0, '初级', 0, NULL, 'default_photo.jpg	', NULL, NULL),
(32, '15103105777', 'GRSDVAGjess', '200747f8066dab8437ca50a1d9a28ee95ee34a98', 0, '初级', 0, NULL, 'default_photo.jpg	', NULL, NULL),
(33, '15103105727', 'GRSDVAGjdess', '200747f8066dab8437ca50a1d9a28ee95ee34a98', 0, '初级', 0, NULL, 'default_photo.jpg	', NULL, NULL),
(34, '15103105721', 'GRSDVAGjdessd', '200747f8066dab8437ca50a1d9a28ee95ee34a98', 0, '初级', 0, NULL, 'default_photo.jpg	', NULL, NULL),
(35, '15102105777', 'ddddddddas', 'd36da3e6884f6d1e9e7983ff13e99cf5c8f5745a', 0, '初级', 0, NULL, 'default_photo.jpg	', NULL, NULL),
(36, '15105105766', 'w3c', '2ffdde7cba519de544b1695554aad855a897f0a1', 0, '初级', 0, NULL, 'default_photo.jpg	', NULL, NULL),
(37, '15105205777', 'wesdzf', 'f37e4088a61274141b9307f91a5bdcd15cb7bafe', 0, '初级', 0, NULL, 'default_photo.jpg	', NULL, NULL),
(38, '15115105777', '21313', 'cd79480c7bc8fd44fa15d329d43c7bba29aff44b', 0, '初级', 0, NULL, 'default_photo.jpg	', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `work`
--

CREATE TABLE IF NOT EXISTS `work` (
  `work_id` int(10) NOT NULL AUTO_INCREMENT,
  `artist_id` int(11) NOT NULL,
  `type` char(15) NOT NULL,
  `cover` varchar(50) CHARACTER SET latin1 NOT NULL,
  `picture1` varchar(50) DEFAULT NULL,
  `picture2` varchar(50) DEFAULT NULL,
  `click_count` int(10) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `blog` longtext CHARACTER SET utf16 NOT NULL,
  `name` varchar(50) NOT NULL,
  `default` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`work_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
