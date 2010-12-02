-- Changes in order to migrate from 0.1 to 0.2.0

-- add which source the data is coming from
ALTER TABLE `operators` ADD COLUMN `source` VARCHAR(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'prospects'  AFTER `modified`;

-- add geocoordinate information and an operator logo and image
ALTER TABLE `operators` ADD COLUMN `latitude` VARCHAR(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL  AFTER `activity_type_id`;
ALTER TABLE `operators` ADD COLUMN `longitude` VARCHAR(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL  AFTER `latitude`;
ALTER TABLE `operators` ADD COLUMN `logoFile` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL  AFTER `longitude`;
ALTER TABLE `operators` ADD COLUMN `imageFile` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL  AFTER `logoFile`;

-- moving up countryISO to be next to country_id
ALTER TABLE `operators` CHANGE COLUMN `countryISO` `countryISO` VARCHAR(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT ''  COMMENT ''  AFTER `country_id`;