
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- apartment_feature
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `apartment_feature`;


CREATE TABLE `apartment_feature`
(
	`id` INTEGER(10)  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) default '' NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- community_feature
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `community_feature`;


CREATE TABLE `community_feature`
(
	`id` INTEGER(10)  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) default '' NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- contact
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `contact`;


CREATE TABLE `contact`
(
	`id` INTEGER(10)  NOT NULL AUTO_INCREMENT,
	`first_name` VARCHAR(128),
	`last_name` VARCHAR(128),
	`employer` VARCHAR(255),
	`email` VARCHAR(255),
	`created_at` DATETIME,
	`updated_at` DATETIME,
	`property_id` INTEGER(10) default  NOT NULL,
	`occupants` VARCHAR(48),
	`pets` VARCHAR(48),
	`when` VARCHAR(128),
	`bedrooms` VARCHAR(48),
	`howhear` VARCHAR(48),
	`howcontact` VARCHAR(48),
	`notes` TEXT,
	`phone` VARCHAR(48),
	`fax` VARCHAR(48),
	`corporate_group_id` INTEGER(10) default 1 NOT NULL,
	PRIMARY KEY (`id`),
	KEY `property_id`(`property_id`),
	KEY `corporate_group_id`(`corporate_group_id`),
	CONSTRAINT `contact_FK_1`
		FOREIGN KEY (`property_id`)
		REFERENCES `property` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `contact_FK_2`
		FOREIGN KEY (`corporate_group_id`)
		REFERENCES `corporate_group` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- corporate_group
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `corporate_group`;


CREATE TABLE `corporate_group`
(
	`id` INTEGER(10)  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(30) default '' NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- other_feature
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `other_feature`;


CREATE TABLE `other_feature`
(
	`id` INTEGER(10)  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) default '' NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- photo_type
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `photo_type`;


CREATE TABLE `photo_type`
(
	`id` INTEGER(10)  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(30) default '' NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- property
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `property`;


CREATE TABLE `property`
(
	`id` INTEGER(10)  NOT NULL AUTO_INCREMENT,
	`code` VARCHAR(50) default '' NOT NULL,
	`name` VARCHAR(50) default '' NOT NULL,
	`address` VARCHAR(128) default '' NOT NULL,
	`city` VARCHAR(50) default '' NOT NULL,
	`state_id` INTEGER(10) default  NOT NULL,
	`zip` VARCHAR(20) default '' NOT NULL,
	`phone` VARCHAR(20) default '' NOT NULL,
	`fax` VARCHAR(20) default '' NOT NULL,
	`email` VARCHAR(128) default '' NOT NULL,
	`image` VARCHAR(50) default '' NOT NULL,
	`url` VARCHAR(150) default '' NOT NULL,
	`price_range` VARCHAR(50) default '' NOT NULL,
	`unit_type` VARCHAR(50) default '' NOT NULL,
	`special` VARCHAR(100) default '' NOT NULL,
	`mercial` VARCHAR(150) default '' NOT NULL,
	`description` TEXT  NOT NULL,
	`hours` TEXT  NOT NULL,
	`pet_policy` TEXT  NOT NULL,
	`directions` TEXT  NOT NULL,
	`featured` TINYINT(1) default 0 NOT NULL,
	`status_id` INTEGER(10) default  NOT NULL,
	`corporate_group_id` INTEGER(10) default 1 NOT NULL,
	PRIMARY KEY (`id`),
	KEY `state_id`(`state_id`),
	KEY `city`(`city`),
	KEY `url`(`url`),
	KEY `status_id`(`status_id`),
	KEY `corporate_group_id`(`corporate_group_id`),
	CONSTRAINT `property_FK_1`
		FOREIGN KEY (`state_id`)
		REFERENCES `state` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	CONSTRAINT `property_FK_2`
		FOREIGN KEY (`status_id`)
		REFERENCES `status` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	CONSTRAINT `property_FK_3`
		FOREIGN KEY (`corporate_group_id`)
		REFERENCES `corporate_group` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- property_apartment_feature
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `property_apartment_feature`;


CREATE TABLE `property_apartment_feature`
(
	`id` INTEGER(10)  NOT NULL AUTO_INCREMENT,
	`property_id` INTEGER(10) default  NOT NULL,
	`apartment_feature_id` INTEGER(10) default  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `property_id`(`property_id`),
	KEY `apartment_feature_id`(`apartment_feature_id`),
	CONSTRAINT `property_apartment_feature_FK_1`
		FOREIGN KEY (`property_id`)
		REFERENCES `property` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	CONSTRAINT `property_apartment_feature_FK_2`
		FOREIGN KEY (`apartment_feature_id`)
		REFERENCES `apartment_feature` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- property_community_feature
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `property_community_feature`;


CREATE TABLE `property_community_feature`
(
	`id` INTEGER(10)  NOT NULL AUTO_INCREMENT,
	`property_id` INTEGER(10) default  NOT NULL,
	`community_feature_id` INTEGER(10) default  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `property_id`(`property_id`),
	KEY `community_feature_id`(`community_feature_id`),
	CONSTRAINT `property_community_feature_FK_1`
		FOREIGN KEY (`property_id`)
		REFERENCES `property` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	CONSTRAINT `property_community_feature_FK_2`
		FOREIGN KEY (`community_feature_id`)
		REFERENCES `community_feature` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- property_community_map
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `property_community_map`;


CREATE TABLE `property_community_map`
(
	`id` INTEGER(10)  NOT NULL AUTO_INCREMENT,
	`property_id` INTEGER(10)  NOT NULL,
	`type` CHAR default 'entertainment' NOT NULL,
	`name` VARCHAR(128),
	`latitude` DECIMAL(10,6),
	`longitude` DECIMAL(10,6),
	`url` VARCHAR(255),
	PRIMARY KEY (`id`),
	KEY `property_id`(`property_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- property_floorplan
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `property_floorplan`;


CREATE TABLE `property_floorplan`
(
	`id` INTEGER(10)  NOT NULL AUTO_INCREMENT,
	`property_id` INTEGER(10) default  NOT NULL,
	`name` VARCHAR(50) default '' NOT NULL,
	`bedrooms` INTEGER(10) default  NOT NULL,
	`bathrooms` VARCHAR(16) default '0' NOT NULL,
	`square_feet` VARCHAR(50) default '' NOT NULL,
	`price` VARCHAR(50) default '' NOT NULL,
	`lease_term` VARCHAR(50) default '' NOT NULL,
	`deposit` VARCHAR(50) default '' NOT NULL,
	`image` VARCHAR(50) default '' NOT NULL,
	`availability_link` VARCHAR(255) default '' NOT NULL,
	`display_order` INTEGER(10) default 0 NOT NULL,
	PRIMARY KEY (`id`),
	KEY `property_id`(`property_id`),
	CONSTRAINT `property_floorplan_FK_1`
		FOREIGN KEY (`property_id`)
		REFERENCES `property` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- property_neighborhood
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `property_neighborhood`;


CREATE TABLE `property_neighborhood`
(
	`id` INTEGER(10)  NOT NULL AUTO_INCREMENT,
	`property_id` INTEGER(10)  NOT NULL,
	`name` VARCHAR(128) default '' NOT NULL,
	`description` TEXT  NOT NULL,
	`url` VARCHAR(255),
	`image` VARCHAR(50) default '' NOT NULL,
	PRIMARY KEY (`id`),
	KEY `property_id`(`property_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- property_other_feature
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `property_other_feature`;


CREATE TABLE `property_other_feature`
(
	`id` INTEGER(10)  NOT NULL AUTO_INCREMENT,
	`property_id` INTEGER(10) default  NOT NULL,
	`other_feature_id` INTEGER(10) default  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `property_id`(`property_id`),
	KEY `community_feature_id`(`other_feature_id`),
	CONSTRAINT `property_other_feature_FK_1`
		FOREIGN KEY (`property_id`)
		REFERENCES `property` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	CONSTRAINT `property_other_feature_FK_2`
		FOREIGN KEY (`other_feature_id`)
		REFERENCES `other_feature` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- property_photo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `property_photo`;


CREATE TABLE `property_photo`
(
	`id` INTEGER(10)  NOT NULL AUTO_INCREMENT,
	`property_id` INTEGER(10) default  NOT NULL,
	`name` VARCHAR(50) default '' NOT NULL,
	`image` VARCHAR(50) default '' NOT NULL,
	`photo_type_id` INTEGER(10) default  NOT NULL,
	`display_order` INTEGER(10) default 0 NOT NULL,
	PRIMARY KEY (`id`),
	KEY `property_id`(`property_id`),
	KEY `photo_type_id`(`photo_type_id`),
	CONSTRAINT `property_photo_FK_1`
		FOREIGN KEY (`property_id`)
		REFERENCES `property` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	CONSTRAINT `property_photo_FK_2`
		FOREIGN KEY (`photo_type_id`)
		REFERENCES `photo_type` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- property_blogarticle
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `property_blogarticle`;


CREATE TABLE `property_blogarticle`
(
	`id` INTEGER(10)  NOT NULL AUTO_INCREMENT,
	`property_id` INTEGER(10) default  NOT NULL,
	`title` VARCHAR(255),
	`perma_link` VARCHAR(255),
	`article_image1` VARCHAR(50),
	`article_image2` VARCHAR(50),
	`article_content` TEXT,
	PRIMARY KEY (`id`),
	KEY `property_id`(`property_id`),
	CONSTRAINT `property_blogarticle_FK_1`
		FOREIGN KEY (`property_id`)
		REFERENCES `property` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- property_template
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `property_template`;


CREATE TABLE `property_template`
(
	`id` INTEGER(10)  NOT NULL AUTO_INCREMENT,
	`property_id` INTEGER(10) default  NOT NULL,
	`logo_image` VARCHAR(50),
	`home_image` VARCHAR(50),
	`welcome` VARCHAR(255),
	`description` TEXT,
	`announcements` TEXT,
	`style_color` VARCHAR(10),
	`background_color` VARCHAR(10),
	`chat` TEXT,
	`rentalapp_file` VARCHAR(50),
	`map_html` TEXT,
	`map_frame_src` TEXT,
	`community_image` VARCHAR(50),
	`community_description` TEXT,
	`community_attractions_list` TEXT,
	`custom_page_name` VARCHAR(128),
	`custom_page_perma_link` VARCHAR(255),
	`custom_page_content` TEXT,
	`home_flash` VARCHAR(50),
	`tracking_code` TEXT,
	`contact_email_text` TEXT,
	`show_walkscore` TINYINT(1) default 1 NOT NULL,
	`email` TEXT,
	`facebook_url` TEXT,
	`acacia_home1_desc` VARCHAR(64),
	`acacia_features_desc` TEXT,
	`acacia_home2_desc` VARCHAR(64),
	`acacia_home3_desc` VARCHAR(64),
	`acacia_floorplan_desc` TEXT,
	`acacia_ebrochure_desc` TEXT,
	`latitude` DECIMAL(10,6),
	`longitude` DECIMAL(10,6),
	`online_application_url` TEXT,
	`e_brochure` VARCHAR(50),
	`src_3dtour` TEXT,
	`home_photo_desc` TEXT,
	`gmap_key` TEXT,
	PRIMARY KEY (`id`),
	KEY `property_id`(`property_id`),
	CONSTRAINT `property_template_FK_1`
		FOREIGN KEY (`property_id`)
		REFERENCES `property` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- resident
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `resident`;


CREATE TABLE `resident`
(
	`id` INTEGER(10)  NOT NULL AUTO_INCREMENT,
	`first_name` VARCHAR(128) default '' NOT NULL,
	`last_name` VARCHAR(128) default '' NOT NULL,
	`password` VARCHAR(255) default '' NOT NULL,
	`email` VARCHAR(255) default '' NOT NULL,
	`tenantid` VARCHAR(24) default '' NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	`property_id` INTEGER(10) default  NOT NULL,
	`status_id` INTEGER(10) default  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `property_id`(`property_id`),
	KEY `status_id`(`status_id`),
	CONSTRAINT `resident_FK_1`
		FOREIGN KEY (`property_id`)
		REFERENCES `property` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	CONSTRAINT `resident_FK_2`
		FOREIGN KEY (`status_id`)
		REFERENCES `status` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- state
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `state`;


CREATE TABLE `state`
(
	`id` INTEGER(10)  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) default '' NOT NULL,
	`code` VARCHAR(2) default '' NOT NULL,
	`country` VARCHAR(3) default '' NOT NULL,
	`order_by` INTEGER(11) default  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `code`(`code`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- status
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `status`;


CREATE TABLE `status`
(
	`id` INTEGER(10)  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(30) default '' NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;


CREATE TABLE `user`
(
	`id` INTEGER(10)  NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(30) default '' NOT NULL,
	`password` VARCHAR(255) default '' NOT NULL,
	`email` VARCHAR(255) default '' NOT NULL,
	`name` VARCHAR(255),
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `username` (`username`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- user_property
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `user_property`;


CREATE TABLE `user_property`
(
	`id` INTEGER(10)  NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER(10) default  NOT NULL,
	`property_id` INTEGER(10) default  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `user_id`(`user_id`),
	KEY `property_id`(`property_id`),
	CONSTRAINT `user_property_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `user` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	CONSTRAINT `user_property_FK_2`
		FOREIGN KEY (`property_id`)
		REFERENCES `property` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- user_role
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `user_role`;


CREATE TABLE `user_role`
(
	`id` INTEGER(10)  NOT NULL AUTO_INCREMENT,
	`role_name` VARCHAR(30) default '' NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `role_name` (`role_name`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- user_user_role
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `user_user_role`;


CREATE TABLE `user_user_role`
(
	`id` INTEGER(10)  NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER(10) default  NOT NULL,
	`user_role_id` INTEGER(10) default  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `user_id`(`user_id`),
	KEY `user_role_id`(`user_role_id`),
	CONSTRAINT `user_user_role_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `user` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	CONSTRAINT `user_user_role_FK_2`
		FOREIGN KEY (`user_role_id`)
		REFERENCES `user_role` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
