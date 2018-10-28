DROP DATABASE IF EXISTS `blog_db`;
CREATE DATABASE IF NOT EXISTS `blog_db`;
USE `blog_db`;

CREATE TABLE IF NOT EXISTS `blog_articles` (
  `articleId` int(12) NOT NULL AUTO_INCREMENT,
  `author_fullname` varchar(50) NOT NULL DEFAULT 'Null',
  `author_image` varchar(200) NOT NULL DEFAULT 'default.png',
  `article_title` varchar(200) NOT NULL DEFAULT 'Null',
  `article_full_text` text,
  `article_created_date` datetime DEFAULT '0000-00-00 00:00:00',
  `article_last_update` datetime DEFAULT '0000-00-00 00:00:00',
  `article_display` int(1) NOT NULL DEFAULT '0',
  `article_order` int(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (`articleId`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;