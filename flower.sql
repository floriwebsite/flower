-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015-04-12 23:10:01
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

-- --------------------------------------------------------

--
-- 表的结构 `service_area`
--

CREATE TABLE IF NOT EXISTS `service_area` (
  `artist` int(10) NOT NULL,
  `area` longtext CHARACTER SET utf16 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `password` varchar(25) NOT NULL,
  `user_type` smallint(3) NOT NULL DEFAULT '0',
  `level` varchar(20) NOT NULL DEFAULT '初级',
  `is_sure` smallint(3) NOT NULL DEFAULT '0',
  `id_photo` varchar(50) DEFAULT NULL,
  `photo` varchar(50) NOT NULL DEFAULT 'default_photo.jpg	',
  `city` varchar(20) DEFAULT NULL,
  `hot` int(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
