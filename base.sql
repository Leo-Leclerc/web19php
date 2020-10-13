CREATE TABLE `articles` (
	`Id` BIGINT(20) NOT NULL AUTO_INCREMENT,
	`Titre` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`Description` TEXT NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`DateAjout` DATE NULL DEFAULT NULL,
	`Auteur` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`ImageRepository` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`ImageFilename` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`IdCategorie` INT(11) NULL DEFAULT NULL,
	PRIMARY KEY (`Id`) USING BTREE,
	INDEX `FK_categorie` (`IdCategorie`) USING BTREE,
	CONSTRAINT `FK_categorie` FOREIGN KEY (`IdCategorie`) REFERENCES `cesiblog`.`categories` (`Id`) ON UPDATE RESTRICT ON DELETE RESTRICT
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=232
;

CREATE TABLE `categories` (
	`Id` INT(11) NOT NULL AUTO_INCREMENT,
	`Icone` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`Nom` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`Id`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=6
;
