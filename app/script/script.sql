-- MySQL Script generated by MySQL Workbench
-- seg 17 dez 2018 17:28:35 -02
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema murdock
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema murdock
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `murdock2` DEFAULT CHARACTER SET utf8 ;
USE `murdock2` ;

-- -----------------------------------------------------
-- Table `murdock2`.`permission`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `murdock2`.`permission` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `level` INT NOT NULL,
  `description` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `murdock2`.`country`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `murdock2`.`country` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `initials` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `murdock2`.`state`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `murdock2`.`state` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `initials` VARCHAR(45) NOT NULL,
  `country_id` INT NOT NULL,
  PRIMARY KEY (`id`, `country_id`),
  CONSTRAINT `fk_state_country1`
    FOREIGN KEY (`country_id`)
    REFERENCES `murdock2`.`country` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `murdock2`.`city`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `murdock2`.`city` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `state_id` INT NOT NULL,
  `state_country_id` INT NOT NULL,
  PRIMARY KEY (`id`, `state_id`, `state_country_id`),
  CONSTRAINT `fk_city_state1`
    FOREIGN KEY (`state_id` , `state_country_id`)
    REFERENCES `murdock2`.`state` (`id` , `country_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `murdock2`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `murdock2`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(75) NOT NULL,
  `email` VARCHAR(75) NOT NULL,
  `pass` LONGTEXT NOT NULL,
  `permission_id` INT NOT NULL,
  `city_id` INT NOT NULL,
  `city_state_id` INT NOT NULL,
  `city_state_country_id` INT NOT NULL,
  PRIMARY KEY (`id`, `city_id`, `city_state_id`, `city_state_country_id`),
  CONSTRAINT `fk_user_permission`
    FOREIGN KEY (`permission_id`)
    REFERENCES `murdock2`.`permission` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_city1`
    FOREIGN KEY (`city_id` , `city_state_id` , `city_state_country_id`)
    REFERENCES `murdock2`.`city` (`id` , `state_id` , `state_country_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `murdock2`.`areas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `murdock2`.`areas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(75) NOT NULL,
  `icon` VARCHAR(500) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `murdock2`.`category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `murdock2`.`category` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `icon` VARCHAR(500) NOT NULL,
  `areas_id` INT NOT NULL,
  PRIMARY KEY (`id`, `areas_id`),
  CONSTRAINT `fk_category_areas1`
    FOREIGN KEY (`areas_id`)
    REFERENCES `murdock2`.`areas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `murdock2`.`sub_category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `murdock2`.`sub_category` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(115) NOT NULL,
  `icon` VARCHAR(45) NOT NULL,
  `category_id` INT NOT NULL,
  `category_areas_id` INT NOT NULL,
  PRIMARY KEY (`id`, `category_id`, `category_areas_id`),
  CONSTRAINT `fk_sub_category_category1`
    FOREIGN KEY (`category_id` , `category_areas_id`)
    REFERENCES `murdock2`.`category` (`id` , `areas_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `murdock2`.`article`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `murdock2`.`article` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `icon` VARCHAR(45) NOT NULL,
  `content` LONGTEXT NOT NULL,
  `description` LONGTEXT NOT NULL,
  `user_id` INT NOT NULL,
  `sub_category_id` INT NOT NULL,
  `sub_category_category_id` INT NOT NULL,
  `sub_category_category_areas_id` INT NOT NULL,
  PRIMARY KEY (`id`, `sub_category_id`, `sub_category_category_id`, `sub_category_category_areas_id`),
  CONSTRAINT `fk_article_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `murdock2`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_article_sub_category1`
    FOREIGN KEY (`sub_category_id` , `sub_category_category_id` , `sub_category_category_areas_id`)
    REFERENCES `murdock2`.`sub_category` (`id` , `category_id` , `category_areas_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
