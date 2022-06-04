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


ALTER TABLE `mosaico`   
  ADD COLUMN `detalle` TEXT NULL AFTER `categoria`;


CREATE TABLE `cotizacion`(  
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre_apellido` VARCHAR(100),
  `telefono` VARCHAR(25),
  `email` VARCHAR(50),
  `estado` TINYINT DEFAULT 1 COMMENT '1-recibida, 2-cotizada, 3-respondida',
  PRIMARY KEY (`id`) 
);

CREATE TABLE `cotizacion_detalle`(  
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_cotizacion` INT,
  `producto` INT,
  `cantidad` VARCHAR(20),
  `unidad` VARCHAR(20),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_cotizacion` FOREIGN KEY (`id_cotizacion`) REFERENCES `cotizacion`(`id`)
);
ALTER TABLE `cotizacion_detalle`   
  ADD COLUMN `cantidad_cotizada` VARCHAR(20) NULL AFTER `unidad`,
  ADD COLUMN `precio_cotizado` VARCHAR(20) NULL AFTER `cantidad_cotizada`,
  ADD COLUMN `unidad_cotizada` VARCHAR(20) NULL AFTER `precio_cotizado`;

  ALTER TABLE `cotizacion_detalle`   
  CHANGE `cantidad_cotizada` `cantidad_cotizada` VARCHAR(20) CHARSET utf8 COLLATE utf8_general_ci DEFAULT '0'   NULL,
  CHANGE `precio_cotizado` `precio_cotizado` VARCHAR(20) CHARSET utf8 COLLATE utf8_general_ci DEFAULT '0'   NULL,
  CHANGE `unidad_cotizada` `unidad_cotizada` VARCHAR(20) CHARSET utf8 COLLATE utf8_general_ci DEFAULT '0'   NULL;
