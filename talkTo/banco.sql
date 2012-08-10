SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `talkto` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `talkto` ;

-- -----------------------------------------------------
-- Table `talkto`.`dialogo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `talkto`.`dialogo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `horaData` BIGINT(20) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 0
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `talkto`.`mensagem`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `talkto`.`mensagem` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `idDialogo` INT(11) NOT NULL ,
  `texto` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  `dataHora` BIGINT(20) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `fk_mensagem_dialogo` (`idDialogo` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 1260
DEFAULT CHARACTER SET = utf8;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
