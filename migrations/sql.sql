CREATE TABLE `mosaico`(  
  `id` INT NOT NULL AUTO_INCREMENT,
  `codigo` VARCHAR(45),
  `formato` VARCHAR(45),
  `espesor` VARCHAR(45),
  `dimension_hoja` VARCHAR(45),
  `peso` VARCHAR(45),
  `m2_por_caja` VARCHAR(45),
  `junta` VARCHAR(45),
  `color` VARCHAR(45),
  `estado` TINYINT,
  PRIMARY KEY (`id`)
) ENGINE=INNODB CHARSET=utf8 COLLATE=utf8_general_ci;


CREATE TABLE `visuales_mosaico`(  
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_mosaico` INT,
  `path` VARCHAR(255),
  `es_destacada` TINYINT,
  `orden` TINYINT,
  PRIMARY KEY (`id`)
) ENGINE=INNODB CHARSET=utf8 COLLATE=utf8_general_ci;

ALTER TABLE `mosaico`   
  ADD COLUMN `categoria` TINYINT NULL  COMMENT '1-Colores, 2-Degrade, 3-Guardas, 4-Mezclas' AFTER `estado`;


ALTER TABLE `visuales`   
  ADD COLUMN `es_destacada_cuadrada` TINYINT NULL AFTER `orden`;
