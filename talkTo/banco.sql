SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

-- CREATE SCHEMA IF NOT EXISTS `linkurbano_3` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `linkurbano_3` ;

-- -----------------------------------------------------
-- Table `linkurbano_3`.`dialogo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `linkurbano_3`.`dialogo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `horaData` BIGINT(20)  NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 0
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `linkurbano_3`.`mensagem`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `linkurbano_3`.`mensagem` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `idDialogo` INT(11) NOT NULL ,
  `texto` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  `dataHora` BIGINT(20)  NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 0
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;