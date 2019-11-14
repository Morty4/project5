use gtuck;

#
# TABLE STRUCTURE FOR: content
#

DROP TABLE IF EXISTS `content`;

CREATE TABLE `content` (
  `content_id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(9) unsigned NOT NULL,
  `content_title` varchar(255) NOT NULL,
  `content_description` text NOT NULL,
  `content_release_date` date NOT NULL,
  `content_avg_rating` int(11) NOT NULL,
  `content_created` datetime NOT NULL,
  `content_updated` datetime NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: ratings
#

DROP TABLE IF EXISTS `ratings`;

CREATE TABLE `ratings` (
  `rating_id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(9) unsigned NOT NULL,
  `rating` int(9) unsigned NOT NULL,
  `rating_created` datetime NOT NULL,
  PRIMARY KEY (`rating_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: users
#

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `user_firstname` varchar(100) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_bday` date NOT NULL,
  `user_postal_code` int(11) DEFAULT NULL,
  `user_pwd` varchar(255) NOT NULL,
  `user_gravatar` varchar(255) DEFAULT NULL,
  `user_bio` text DEFAULT NULL,
  `user_last_login` datetime NOT NULL,
  `user_created` datetime NOT NULL,
  `user_role` int(11) NOT NULL,
  `user_location` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  KEY `username` (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

