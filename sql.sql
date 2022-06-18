-- Adminer 4.8.1 MySQL 8.0.29-0ubuntu0.20.04.3 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `assignments`;
CREATE TABLE `assignments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `assignedBy` int NOT NULL,
  `time` int DEFAULT NULL,
  `colour` varchar(255) DEFAULT NULL,
  `priority` int DEFAULT NULL,
  `people` text,
  `deadline` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `assignments_comments`;
CREATE TABLE `assignments_comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userID` int NOT NULL,
  `desc` text NOT NULL,
  `time` int NOT NULL,
  `assignmentID` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `case_cases`;
CREATE TABLE `case_cases` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `createdDate` int NOT NULL,
  `items` text NOT NULL,
  `price` int NOT NULL,
  `creatorID` int DEFAULT NULL,
  `desc` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `case_items`;
CREATE TABLE `case_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `value` int NOT NULL,
  `desc` text NOT NULL,
  `rarity` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `case_money`;
CREATE TABLE `case_money` (
  `id` int NOT NULL AUTO_INCREMENT,
  `memberID` int NOT NULL,
  `money` int DEFAULT '500',
  `lastOpenedCaseID` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `catID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` int DEFAULT NULL,
  PRIMARY KEY (`catID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `chat`;
CREATE TABLE `chat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `forums`;
CREATE TABLE `forums` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `desc` text,
  `order` int DEFAULT '0',
  `parent` int DEFAULT '0',
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `colour` varchar(255) NOT NULL,
  `perms` text,
  `html` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

INSERT INTO `groups` (`id`, `title`, `colour`, `perms`, `html`) VALUES
(0,	'Guest',	'#3483eb',	NULL,	'<span class=\"badge badge-primary\"><strong><i class=\"fas fa-crown\"></i> Guest</strong></span> '),
(1,	'Admin',	'#ff0000',	'a:14:{i:0;a:2:{s:2:"id";i:1;s:5:"value";i:1;}i:1;a:2:{s:2:"id";i:2;s:5:"value";i:1;}i:2;a:2:{s:2:"id";i:3;s:5:"value";i:1;}i:3;a:2:{s:2:"id";i:4;s:5:"value";i:1;}i:4;a:2:{s:2:"id";i:5;s:5:"value";i:1;}i:5;a:2:{s:2:"id";i:6;s:5:"value";i:1;}i:6;a:2:{s:2:"id";i:7;s:5:"value";i:1;}i:7;a:2:{s:2:"id";i:8;s:5:"value";i:1;}i:8;a:2:{s:2:"id";i:9;s:5:"value";i:1;}i:9;a:2:{s:2:"id";i:10;s:5:"value";i:1;}i:10;a:2:{s:2:"id";i:11;s:5:"value";i:1;}i:11;a:2:{s:2:"id";i:12;s:5:"value";i:1;}i:12;a:2:{s:2:"id";i:13;s:5:"value";i:1;}i:13;a:2:{s:2:"id";i:14;s:5:"value";i:1;}}',	'<span class=\"badge badge-primary\"><strong><i class=\"fas fa-crown\"></i> Admin</strong></span> '),

DROP TABLE IF EXISTS `groups_perms`;
CREATE TABLE `groups_perms` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `groups_perms` (`id`, `name`) VALUES
(1,	'viewdashboard'),
(2,	'groups'),
(3,	'categories'),
(4,	'viewassignments'),
(5,	'manageassignments'),
(6,	'manageforum'),
(7,	'moderate'),
(8,	'plugins'),
(9,	'tickets'),
(10,	'settings'),
(11,	'managemembers'),
(12,	'pages'),
(13,	'posts\r\n'),
(14,	'managecases');

DROP TABLE IF EXISTS `img`;
CREATE TABLE `img` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` int NOT NULL,
  `fileName` varchar(255) NOT NULL,
  `added` int NOT NULL,
  `type` varchar(20) NOT NULL,
  `desc` text NOT NULL,
  `label` varchar(15) DEFAULT NULL,
  `title` varchar(25) DEFAULT NULL,
  `review` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `likent`;
CREATE TABLE `likent` (
  `id` int NOT NULL AUTO_INCREMENT,
  `imgID` int NOT NULL,
  `type` int NOT NULL,
  `date` int NOT NULL,
  `likeAID` int DEFAULT NULL,
  `form` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `memberID` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  `resetToken` varchar(255) DEFAULT NULL,
  `resetComplete` varchar(3) DEFAULT 'No',
  `avatar` varchar(255) NOT NULL,
  `joinTime` int NOT NULL,
  `descr` text,
  `groupID` int DEFAULT '0',
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender` int DEFAULT '0',
  `location` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `lang` int DEFAULT NULL,
  `skills` text,
  `backgroundprofile` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`memberID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `redirect` varchar(255) DEFAULT NULL,
  `text` text NOT NULL,
  `backgroundimg` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT 'icon-paper',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `plugins`;
CREATE TABLE `plugins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `version` int NOT NULL,
  `api` varchar(255) NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `authorID` int NOT NULL,
  `sectionID` int NOT NULL,
  `text` text,
  `date` int NOT NULL,
  `editdate` int DEFAULT NULL,
  `isallowed` int DEFAULT '0',
  `isuser` int DEFAULT '1',
  `background` varchar(255) DEFAULT NULL,
  `review` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `posts_comments`;
CREATE TABLE `posts_comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userID` int DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `time` int DEFAULT NULL,
  `postID` int DEFAULT NULL,
  `review` int DEFAULT '0',
  `quoteID` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `background` varchar(255) DEFAULT 'default.png',
  `siteTitle` varchar(255) DEFAULT NULL,
  `siteDesc` text,
  `defaultsite` varchar(255) DEFAULT 'index'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

INSERT INTO `settings` (`background`, `siteTitle`, `siteDesc`, `defaultsite`) VALUES
('1647680374.jpg',	'IG CMS',	'Innovation Gaming Content Management System',	'posts');

DROP TABLE IF EXISTS `settings_modules`;
CREATE TABLE `settings_modules` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `value` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_czech_ci;

INSERT INTO `settings_modules` (`id`, `name`, `value`) VALUES
(1,	'posts',	1),
(2,	'forum',	1),
(3,	'isregisterenabled',	1),
(4,	'assignments',	1),
(5,	'casesystem',	1),
(6,	'custompages',	1);

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `authorID` int NOT NULL,
  `date` int NOT NULL,
  `status` int DEFAULT '0',
  `catID` int DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `editdate` int DEFAULT '0',
  `editcomID` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `tickets_comments`;
CREATE TABLE `tickets_comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userID` int NOT NULL,
  `desc` text NOT NULL,
  `time` int NOT NULL,
  `ticketID` int NOT NULL,
  `quoteID` int DEFAULT '0',
  `review` int DEFAULT '0',
  `type` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `topics`;
CREATE TABLE `topics` (
  `id` int NOT NULL AUTO_INCREMENT,
  `authorID` int NOT NULL,
  `forumID` int NOT NULL,
  `date` int NOT NULL,
  `isPinned` int DEFAULT '0',
  `isLocked` int DEFAULT '0',
  `catID` int DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `editdate` int DEFAULT '0',
  `editcomID` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `topics_comments`;
CREATE TABLE `topics_comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userID` int NOT NULL,
  `desc` text NOT NULL,
  `time` int NOT NULL,
  `topicID` int NOT NULL,
  `quoteID` int DEFAULT '0',
  `review` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;


-- 2022-06-18 07:26:49
