-- World Adrenaline empty database schema

#
# Encoding: Unicode (UTF-8)
#


DROP TABLE IF EXISTS `acos`;
DROP TABLE IF EXISTS `activities`;
DROP TABLE IF EXISTS `activity_types`;
DROP TABLE IF EXISTS `aros`;
DROP TABLE IF EXISTS `aros_acos`;
DROP TABLE IF EXISTS `countries`;
DROP TABLE IF EXISTS `groups`;
DROP TABLE IF EXISTS `operators`;
DROP TABLE IF EXISTS `requests`;
DROP TABLE IF EXISTS `users`;


CREATE TABLE `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=146 DEFAULT CHARSET=latin1;


CREATE TABLE `activities` (
  `id` int(11) NOT NULL DEFAULT '0',
  `operator_id` varchar(128) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `shortname` varchar(128) DEFAULT NULL,
  `description` text,
  `activityType` text,
  `activityType_id` int(11) DEFAULT '0',
  `currency` varchar(5) DEFAULT NULL,
  `priceMin` int(11) DEFAULT '0',
  `latitude` int(45) DEFAULT '0',
  `longitude` int(45) DEFAULT '0',
  `imageFile_1` varchar(255) DEFAULT NULL,
  `imageFile_2` varchar(255) DEFAULT NULL,
  `imageFile_3` varchar(255) DEFAULT NULL,
  `imageFile_4` varchar(255) DEFAULT NULL,
  `source` varchar(128) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


CREATE TABLE `activity_types` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `shortname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `slug` (`shortname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;


CREATE TABLE `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;


CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iso` char(2) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ISO 3166-1 2 characters',
  `shortname` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'For URL.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;


CREATE TABLE `operators` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shortname` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_id` int(11) NOT NULL,
  `countryISO` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `stateProvince` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `activityType` text COLLATE utf8_unicode_ci,
  `activity_type_id` int(11) NOT NULL,
  `latitude` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hasEmail` tinyint(1) NOT NULL,
  `modified` datetime NOT NULL,
  `source` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'prospects',
  `logoFile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imageFile_1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imageFile_2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imageFile_3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imageFile_4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `CountryID` (`countryISO`),
  KEY `country_id` (`country_id`),
  KEY `country_id_2` (`country_id`),
  KEY `country_id_3` (`country_id`),
  KEY `country_id_4` (`country_id`),
  KEY `activity_type_id` (`activity_type_id`),
  CONSTRAINT `fk_operators_activity_types` FOREIGN KEY (`activity_type_id`) REFERENCES `activity_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_operators_countries` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `date` date DEFAULT NULL,
  `participantsNumber` int(255) DEFAULT NULL,
  `isTerm` varchar(1) COLLATE utf8_unicode_ci DEFAULT '',
  `message` text COLLATE utf8_unicode_ci,
  `subject` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `operator_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `operator_id` (`operator_id`),
  CONSTRAINT `fk_requests_operators` FOREIGN KEY (`operator_id`) REFERENCES `operators` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` char(40) NOT NULL,
  `group_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;