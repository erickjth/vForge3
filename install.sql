CREATE  TABLE IF NOT EXISTS `mdl_vf_modules` (
  `id` INT  NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100)  NOT NULL,
  `version` BIGINT  NOT NULL,
  `hidden` int  NOT NULL,
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB;

CREATE  TABLE IF NOT EXISTS `mdl_vf_task` (
                  `id` INT NOT NULL AUTO_INCREMENT ,
                  `priority` VARCHAR(45) NOT NULL ,
                  `courseid` INT NOT NULL ,
                  `parent` INT NULL ,
                  `name` VARCHAR(100) NOT NULL ,
                  `description` MEDIUMTEXT NULL ,
                  `percent` INT NULL ,
                  `state` VARCHAR(45) NULL ,
                  `user_to` INT NOT NULL ,
                  `user_from` INT NOT NULL ,
                  `date_start` BIGINT NOT NULL ,
                  `date_end` BIGINT NULL ,
                  `created` BIGINT NOT NULL ,
                  `updated` BIGINT NULL ,
                  PRIMARY KEY (`id`) )
                ENGINE = InnoDB;

