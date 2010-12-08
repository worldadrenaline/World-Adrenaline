-- Changes in order to migrate from 0.1 to 0.2.0

-- add which source the data is coming from
ALTER TABLE `operators` ADD COLUMN `source` VARCHAR(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'prospects'  AFTER `modified`;

-- add geocoordinate information and an operator logo and image
ALTER TABLE `operators` ADD COLUMN `latitude` VARCHAR(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL  AFTER `activity_type_id`;
ALTER TABLE `operators` ADD COLUMN `longitude` VARCHAR(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL  AFTER `latitude`;
ALTER TABLE `operators` ADD COLUMN `logoFile` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL  AFTER `longitude`;
ALTER TABLE `operators` ADD COLUMN `imageFile` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL  AFTER `logoFile`;
ALTER TABLE `operators` ADD COLUMN `shortname` VARCHAR(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL  AFTER `name`;



-- moving up countryISO to be next to country_id
ALTER TABLE `operators` CHANGE COLUMN `countryISO` `countryISO` VARCHAR(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT ''  COMMENT ''  AFTER `country_id`;

-- add 4 image files
ALTER TABLE `operators` CHANGE COLUMN `imageFile` `imageFile_1` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL  COMMENT ''  AFTER `logoFile`;
ALTER TABLE `operators` CHANGE COLUMN `logoFile` `logoFile` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL  COMMENT ''  AFTER `source`;
ALTER TABLE `operators` CHANGE COLUMN `imageFile_1` `imageFile_1` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL  COMMENT ''  AFTER `logoFile`;
ALTER TABLE `operators` ADD COLUMN `imageFile_2` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL  AFTER `imageFile_1`;
ALTER TABLE `operators` ADD COLUMN `imageFile_3` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL  AFTER `imageFile_2`;
ALTER TABLE `operators` ADD COLUMN `imageFile_4` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL   AFTER `imageFile_3`;

--Add the activities TABLE
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

ALTER TABLE `activities` ADD COLUMN `name` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL  AFTER `id`;
ALTER TABLE `activities` ADD COLUMN `description` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL  AFTER `name`;
ALTER TABLE `activities` ADD COLUMN `operator_id` VARCHAR(128) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL  AFTER `description`;
ALTER TABLE `activities` CHANGE COLUMN `operator_id` `operator_id` VARCHAR(128) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL  COMMENT ''  AFTER `id`;
ALTER TABLE `activities` ADD COLUMN `shortname` VARCHAR(128) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL  AFTER `operator_id`;
ALTER TABLE `activities` ADD COLUMN `currency` VARCHAR(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL  AFTER `description`;
ALTER TABLE `activities` ADD COLUMN `priceMin` VARCHAR(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL  AFTER `currency`;
ALTER TABLE `activities` ADD COLUMN `imageFile_1` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL  AFTER `priceMin`;
ALTER TABLE `activities` ADD COLUMN `imageFile_2` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL  AFTER `imageFile_1`;
ALTER TABLE `activities` ADD COLUMN `imageFile_3` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL  AFTER `imageFile_2`;
ALTER TABLE `activities` ADD COLUMN `imageFile_4` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL   AFTER `imageFile_3`;
ALTER TABLE `activities` ADD COLUMN `source` VARCHAR(128) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL   AFTER `imageFile_4`;
ALTER TABLE `activities` ADD COLUMN `modified` DATETIME NULL DEFAULT NULL  AFTER `source`;
ALTER TABLE `activities` ADD COLUMN `latitude` VARCHAR(45) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL  AFTER `priceMin`;
ALTER TABLE `activities` ADD COLUMN `longitude` VARCHAR(45) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL   AFTER `latitude`;
ALTER TABLE `activities` CHANGE COLUMN `name` `name` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL  COMMENT ''  AFTER `operator_id`;
ALTER TABLE `activities` CHANGE COLUMN `priceMin` `priceMin` INT(11) NULL DEFAULT 0  COMMENT ''  AFTER `currency`;
ALTER TABLE `activities` CHANGE COLUMN `latitude` `latitude` INT(45) NULL DEFAULT 0  COMMENT ''  AFTER `priceMin`;
ALTER TABLE `activities` CHANGE COLUMN `longitude` `longitude` INT(45) NULL DEFAULT 0  COMMENT ''  AFTER `latitude`;
ALTER TABLE `activities` ADD COLUMN `activityType` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL   AFTER `modified`;
ALTER TABLE `activities` ADD COLUMN `activityType_id` INT(11) NULL DEFAULT 0  AFTER `activityType`;
ALTER TABLE `activities` CHANGE COLUMN `activityType` `activityType` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL  COMMENT ''  AFTER `description`;
ALTER TABLE `activities` CHANGE COLUMN `activityType_id` `activityType_id` INT(11) NULL DEFAULT 0  COMMENT ''  AFTER `activityType`;
ALTER TABLE `adventicus`.`activities` CHANGE COLUMN `id` `id` INT(11) NOT NULL DEFAULT 0  COMMENT ''  FIRST;













