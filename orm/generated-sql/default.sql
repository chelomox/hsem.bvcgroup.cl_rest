
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- actividad
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `actividad`;

CREATE TABLE `actividad`
(
    `acti_codigo` INTEGER NOT NULL AUTO_INCREMENT,
    `acti_nombre` VARCHAR(255),
    `acti_imagen` VARCHAR(255) NOT NULL,
    `acti_t_actividad` INTEGER,
    `acti_hora` INTEGER(3),
    `acti_hora_teorica` INTEGER(2),
    `acti_hora_practica` INTEGER(2),
    `acti_t_hora` INTEGER,
    `acti_e_actividad` INTEGER,
    `acti_t_modalidad` INTEGER,
    `acti_observacion` VARCHAR(255),
    `acti_vigente` INTEGER(1),
    `acti_r_fecha_creacion` DATETIME,
    `acti_r_fecha_modificacion` DATETIME,
    `acti_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`acti_codigo`),
    INDEX `actividad_t_actividad` (`acti_t_actividad`),
    INDEX `actividad_t_hora` (`acti_t_hora`),
    INDEX `actividad_e_actividad` (`acti_e_actividad`),
    INDEX `actividad_t_modalidad` (`acti_t_modalidad`),
    CONSTRAINT `actividad_e_actividad_fk`
        FOREIGN KEY (`acti_e_actividad`)
        REFERENCES `e_actividad` (`eac_estado`)
        ON UPDATE CASCADE,
    CONSTRAINT `actividad_t_actividad_fk`
        FOREIGN KEY (`acti_t_actividad`)
        REFERENCES `t_actividad` (`tac_tipo`)
        ON UPDATE CASCADE,
    CONSTRAINT `actividad_t_hora_fk`
        FOREIGN KEY (`acti_t_hora`)
        REFERENCES `t_hora` (`tho_tipo`)
        ON UPDATE CASCADE,
    CONSTRAINT `actividad_t_modalidad_fk`
        FOREIGN KEY (`acti_t_modalidad`)
        REFERENCES `t_modalidad` (`tmo_tipo`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- actividad_cargo
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `actividad_cargo`;

CREATE TABLE `actividad_cargo`
(
    `acca_c_actividad` INTEGER NOT NULL,
    `acca_c_cargo` INTEGER NOT NULL,
    `acca_vigente` INTEGER(1),
    `acca_r_fecha_creacion` DATETIME,
    `acca_r_fecha_modificacion` DATETIME,
    `acca_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`acca_c_actividad`,`acca_c_cargo`),
    INDEX `actividad_cargo_actividad` (`acca_c_actividad`),
    INDEX `actividad_cargo_cargo` (`acca_c_cargo`),
    CONSTRAINT `actividad_cargo_actividad_fk`
        FOREIGN KEY (`acca_c_actividad`)
        REFERENCES `actividad` (`acti_codigo`)
        ON UPDATE CASCADE,
    CONSTRAINT `actividad_cargo_cargo_fk`
        FOREIGN KEY (`acca_c_cargo`)
        REFERENCES `cargo` (`carg_codigo`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- actividad_objetivo
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `actividad_objetivo`;

CREATE TABLE `actividad_objetivo`
(
    `acob_c_actividad` INTEGER NOT NULL,
    `acob_c_objetivo` INTEGER NOT NULL,
    `acob_cantidad_preguntas` INTEGER NOT NULL,
    `acob_vigente` INTEGER(1),
    `acob_r_fecha_creacion` DATETIME,
    `acob_r_fecha_modificacion` DATETIME,
    `acob_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`acob_c_actividad`,`acob_c_objetivo`),
    INDEX `actividad_objetivo_actividad_fk` (`acob_c_actividad`),
    INDEX `actividad_objetivo_objetivo_fk` (`acob_c_objetivo`),
    CONSTRAINT `actividad_objetivo_actividad_fk`
        FOREIGN KEY (`acob_c_actividad`)
        REFERENCES `actividad` (`acti_codigo`)
        ON UPDATE CASCADE,
    CONSTRAINT `actividad_objetivo_objetivo_fk`
        FOREIGN KEY (`acob_c_objetivo`)
        REFERENCES `objetivo` (`obje_codigo`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- anios_experiencia_cargo
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `anios_experiencia_cargo`;

CREATE TABLE `anios_experiencia_cargo`
(
    `anexca_codigo` INTEGER NOT NULL AUTO_INCREMENT,
    `anexca_descripcion` VARCHAR(255),
    `anexca_vigente` INTEGER(1),
    `anexca_r_fecha_creacion` DATETIME,
    `anexca_r_fecha_modificacion` DATETIME,
    `anexca_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`anexca_codigo`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- area
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `area`;

CREATE TABLE `area`
(
    `area_codigo` INTEGER NOT NULL AUTO_INCREMENT,
    `area_c_institucion` INTEGER NOT NULL,
    `area_sigla` VARCHAR(10),
    `area_descripcion` VARCHAR(255),
    `area_r_fecha_creacion` DATETIME,
    `area_r_fecha_modificacion` DATETIME,
    `area_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`area_codigo`),
    INDEX `area_actividad_fk` (`area_c_institucion`),
    CONSTRAINT `area_institucion_fk`
        FOREIGN KEY (`area_c_institucion`)
        REFERENCES `institucion` (`inst_codigo`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- cargo
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cargo`;

CREATE TABLE `cargo`
(
    `carg_codigo` INTEGER NOT NULL AUTO_INCREMENT,
    `carg_c_especialidad` INTEGER,
    `carg_t_relacion_faena` INTEGER,
    `carg_sigla` VARCHAR(10),
    `carg_descripcion` VARCHAR(255),
    `carg_vigente` INTEGER(1),
    `carg_r_fecha_creacion` DATETIME,
    `carg_r_fecha_modificacion` DATETIME,
    `carg_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`carg_codigo`),
    INDEX `cargo_especialidad_fk` (`carg_c_especialidad`),
    INDEX `cargo_t_relacion_faena_fk` (`carg_t_relacion_faena`),
    CONSTRAINT `cargo_especialidad_fk`
        FOREIGN KEY (`carg_c_especialidad`)
        REFERENCES `especialidad` (`espe_codigo`)
        ON UPDATE CASCADE,
    CONSTRAINT `cargo_t_relacion_faena_fk`
        FOREIGN KEY (`carg_t_relacion_faena`)
        REFERENCES `t_relacion_faena` (`trefa_tipo`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- cargo_grupo_sence
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cargo_grupo_sence`;

CREATE TABLE `cargo_grupo_sence`
(
    `cagrse_c_cargo` INTEGER NOT NULL,
    `cagrse_g_grupo_sence` INTEGER NOT NULL,
    `cagrse_vigente` INTEGER(1),
    `cagrse_r_fecha_creacion` DATETIME,
    `cagrse_r_fecha_modificacion` DATETIME,
    `cagrse_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`cagrse_c_cargo`,`cagrse_g_grupo_sence`),
    INDEX `cargo_grupo_sence_cargo` (`cagrse_c_cargo`),
    INDEX `cargo_grupo_sence_grupo_sence` (`cagrse_g_grupo_sence`),
    CONSTRAINT `cargo_grupo_sence_cargo_fk`
        FOREIGN KEY (`cagrse_c_cargo`)
        REFERENCES `cargo` (`carg_codigo`)
        ON UPDATE CASCADE,
    CONSTRAINT `cargo_grupo_sence_grupo_sence_fk`
        FOREIGN KEY (`cagrse_g_grupo_sence`)
        REFERENCES `grupo_sence` (`grse_grupo`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- comuna
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `comuna`;

CREATE TABLE `comuna`
(
    `comu_codigo` INTEGER NOT NULL AUTO_INCREMENT,
    `comu_nombre` VARCHAR(55),
    `comu_c_provincia` INTEGER,
    `comu_r_fecha_creacion` DATETIME,
    `comu_r_fecha_modificacion` DATETIME,
    `comu_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`comu_codigo`),
    INDEX `comuna_provincia` (`comu_c_provincia`),
    CONSTRAINT `comuna_provincia_fk`
        FOREIGN KEY (`comu_c_provincia`)
        REFERENCES `provincia` (`prov_codigo`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- detalle_pregunta
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `detalle_pregunta`;

CREATE TABLE `detalle_pregunta`
(
    `depr_c_pregunta` INTEGER NOT NULL,
    `depr_c_opcion_pregunta` INTEGER NOT NULL,
    `depr_es_correcta` INTEGER(1),
    `depr_orden` INTEGER(2),
    `depr_vigente` INTEGER(1),
    `depr_r_fecha_creacion` DATETIME,
    `depr_r_fecha_modificacion` DATETIME,
    `depr_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`depr_c_pregunta`,`depr_c_opcion_pregunta`),
    INDEX `detalle_pregunta_pregunta` (`depr_c_pregunta`),
    INDEX `detalle_pregunta_opcion_pregunta` (`depr_c_opcion_pregunta`),
    CONSTRAINT `detalle_pregunta_opcion_pregunta_fk`
        FOREIGN KEY (`depr_c_opcion_pregunta`)
        REFERENCES `opcion_pregunta` (`oppr_codigo`)
        ON UPDATE CASCADE,
    CONSTRAINT `detalle_pregunta_pregunta_fk`
        FOREIGN KEY (`depr_c_pregunta`)
        REFERENCES `pregunta` (`preg_codigo`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dictacion
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dictacion`;

CREATE TABLE `dictacion`
(
    `dict_c_actividad` INTEGER NOT NULL,
    `dict_numero` INTEGER NOT NULL,
    `dict_fecha_inicio` VARCHAR(20),
    `dict_fecha_termino` VARCHAR(20),
    `dict_e_dictacion` INTEGER,
    `dict_c_resolucion` INTEGER,
    `dict_t_certificado` INTEGER,
    `dict_certificado_participacion` INTEGER(1),
    `dict_t_calificacion` INTEGER,
    `dict_asistencia_minima` INTEGER(3),
    `dict_nota_minima` INTEGER(3),
    `dict_cobertura` VARCHAR(1),
    `dict_valor` VARCHAR(10),
    `dict_t_moneda` INTEGER,
    `dict_c_comuna` INTEGER,
    `dict_direccion` VARCHAR(10),
    `dict_telefono` VARCHAR(10),
    `dict_fax` VARCHAR(10),
    `dict_email` VARCHAR(19),
    `dict_cupo` INTEGER(2),
    `dict_t_evaluacion` INTEGER,
    `dict_t_capacitacion` INTEGER,
    `dict_observacion` VARCHAR(255),
    `dict_vigente` INTEGER(1),
    `dict_r_fecha_creacion` DATETIME,
    `dict_r_fecha_modificacion` DATETIME,
    `dict_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`dict_c_actividad`,`dict_numero`),
    INDEX `dictacion_e_dictacion` (`dict_e_dictacion`),
    INDEX `dictacion_resolucion` (`dict_c_resolucion`),
    INDEX `dictacion_t_certificado` (`dict_t_certificado`),
    INDEX `dictacion_t_calificacion` (`dict_t_calificacion`),
    INDEX `dictacion_t_moneda` (`dict_t_moneda`),
    INDEX `dictacion_comuna` (`dict_c_comuna`),
    INDEX `dictacion_t_evaluacion` (`dict_t_evaluacion`),
    INDEX `dictacion_t_capacitacion` (`dict_t_capacitacion`),
    CONSTRAINT `dictacion_actividad_fk`
        FOREIGN KEY (`dict_c_actividad`)
        REFERENCES `actividad` (`acti_codigo`)
        ON UPDATE CASCADE,
    CONSTRAINT `dictacion_comuna_fk`
        FOREIGN KEY (`dict_c_comuna`)
        REFERENCES `comuna` (`comu_codigo`)
        ON UPDATE CASCADE,
    CONSTRAINT `dictacion_e_dictacion_fk`
        FOREIGN KEY (`dict_e_dictacion`)
        REFERENCES `e_dictacion` (`edi_estado`)
        ON UPDATE CASCADE,
    CONSTRAINT `dictacion_t_calificacion_fk`
        FOREIGN KEY (`dict_t_calificacion`)
        REFERENCES `t_calificacion` (`tcal_tipo`),
    CONSTRAINT `dictacion_t_certificado_fk`
        FOREIGN KEY (`dict_t_certificado`)
        REFERENCES `t_certificado` (`tce_tipo`)
        ON UPDATE CASCADE,
    CONSTRAINT `dictacion_t_evaluacion_fk`
        FOREIGN KEY (`dict_t_evaluacion`)
        REFERENCES `t_evaluacion` (`tev_tipo`)
        ON UPDATE CASCADE,
    CONSTRAINT `dictacion_t_moneda_fk`
        FOREIGN KEY (`dict_t_moneda`)
        REFERENCES `t_moneda` (`tmon_tipo`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- direccion
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `direccion`;

CREATE TABLE `direccion`
(
    `dire_c_persona` INTEGER NOT NULL,
    `dire_t_direccion` INTEGER NOT NULL,
    `dire_c_comuna` INTEGER,
    `dire_c_pais` INTEGER,
    `dire_detalle` VARCHAR(255),
    `dire_codigo_postal` VARCHAR(10),
    `dire_telefono` VARCHAR(15),
    `dire_r_fecha_creacion` DATETIME,
    `dire_r_fecha_modificacion` DATETIME,
    `dire_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`dire_c_persona`,`dire_t_direccion`),
    INDEX `direccion_persona` (`dire_c_persona`),
    INDEX `direccion_t_direccion` (`dire_t_direccion`),
    INDEX `direccion_comuna` (`dire_c_comuna`),
    INDEX `direccion_pais` (`dire_c_pais`),
    CONSTRAINT `direccion_comuna_fk`
        FOREIGN KEY (`dire_c_comuna`)
        REFERENCES `comuna` (`comu_codigo`)
        ON UPDATE CASCADE,
    CONSTRAINT `direccion_pais_fk`
        FOREIGN KEY (`dire_c_pais`)
        REFERENCES `pais` (`pais_codigo`)
        ON UPDATE CASCADE,
    CONSTRAINT `direccion_persona_fk`
        FOREIGN KEY (`dire_c_persona`)
        REFERENCES `persona` (`pers_codigo`)
        ON UPDATE CASCADE,
    CONSTRAINT `direccion_t_direccion_fk`
        FOREIGN KEY (`dire_t_direccion`)
        REFERENCES `t_direccion` (`tdir_tipo`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- e_actividad
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `e_actividad`;

CREATE TABLE `e_actividad`
(
    `eac_estado` INTEGER NOT NULL AUTO_INCREMENT,
    `eac_descripcion` VARCHAR(255),
    `eac_r_fecha_creacion` DATETIME,
    `eac_r_fecha_modificacion` DATETIME,
    `eac_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`eac_estado`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- e_dictacion
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `e_dictacion`;

CREATE TABLE `e_dictacion`
(
    `edi_estado` INTEGER NOT NULL AUTO_INCREMENT,
    `edi_descripcion` VARCHAR(255),
    `edi_r_fecha_creacion` DATETIME,
    `edi_r_fecha_modificacion` DATETIME,
    `edi_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`edi_estado`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- e_evaluacion_aplicada
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `e_evaluacion_aplicada`;

CREATE TABLE `e_evaluacion_aplicada`
(
    `eeva_estado` INTEGER NOT NULL AUTO_INCREMENT,
    `eeva_descripcion` VARCHAR(255),
    `eeva_vigente` INTEGER(1),
    `eeva_r_fecha_creacion` DATETIME,
    `eeva_r_fecha_modificacion` DATETIME,
    `eeva_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`eeva_estado`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- e_finalizacion
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `e_finalizacion`;

CREATE TABLE `e_finalizacion`
(
    `efin_estado` INTEGER NOT NULL AUTO_INCREMENT,
    `efin_t_calificacion` INTEGER,
    `efin_resultado` VARCHAR(1),
    `efin_descripcion` VARCHAR(255),
    `efin_cota_inferior` INTEGER(2),
    `efin_cota_superior` VARCHAR(3),
    `efin_r_fecha_creacion` DATETIME,
    `efin_r_fecha_modificacion` DATETIME,
    `efin_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`efin_estado`),
    INDEX `e_finalizacion_t_calificacion` (`efin_t_calificacion`),
    CONSTRAINT `e_finalizacion_t_calificacion`
        FOREIGN KEY (`efin_t_calificacion`)
        REFERENCES `t_calificacion` (`tcal_tipo`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- e_inscripcion
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `e_inscripcion`;

CREATE TABLE `e_inscripcion`
(
    `eins_estado` INTEGER NOT NULL AUTO_INCREMENT,
    `eins_descripcion` VARCHAR(255),
    `eins_r_fecha_creacion` DATETIME,
    `eins_r_fecha_modificacion` DATETIME,
    `eins_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`eins_estado`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- e_inscripcion_evaluacion_aplicada
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `e_inscripcion_evaluacion_aplicada`;

CREATE TABLE `e_inscripcion_evaluacion_aplicada`
(
    `eiea_estado` INTEGER NOT NULL AUTO_INCREMENT,
    `eiea_descripcion` VARCHAR(255),
    `eiea_r_fecha_creacion` DATETIME,
    `eiea_r_fecha_modificacion` DATETIME,
    `eiea_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`eiea_estado`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- e_respuesta_aplicada
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `e_respuesta_aplicada`;

CREATE TABLE `e_respuesta_aplicada`
(
    `erea_estado` INTEGER NOT NULL AUTO_INCREMENT,
    `erea_descripcion` VARCHAR(255),
    `erea_r_fecha_creacion` DATETIME,
    `erea_r_fecha_modificacion` DATETIME,
    `erea_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`erea_estado`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- escolaridad
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `escolaridad`;

CREATE TABLE `escolaridad`
(
    `esco_codigo` INTEGER NOT NULL AUTO_INCREMENT,
    `esco_descripcion` VARCHAR(255),
    `esco_vigente` INTEGER(1),
    `esco_r_fecha_creacion` DATETIME,
    `esco_r_fecha_modificacion` DATETIME,
    `esco_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`esco_codigo`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- especialidad
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `especialidad`;

CREATE TABLE `especialidad`
(
    `espe_codigo` INTEGER NOT NULL AUTO_INCREMENT,
    `espe_c_institucion` INTEGER,
    `espe_sigla` VARCHAR(15),
    `espe_descripcion` VARCHAR(255),
    `espe_vigente` INTEGER(1),
    `espe_r_fecha_creacion` DATETIME,
    `espe_r_fecha_modificacion` DATETIME,
    `espe_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`espe_codigo`),
    INDEX `especialidad_institucion` (`espe_c_institucion`),
    CONSTRAINT `especialidad_institucion_fk`
        FOREIGN KEY (`espe_c_institucion`)
        REFERENCES `institucion` (`inst_codigo`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- estado_civil
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `estado_civil`;

CREATE TABLE `estado_civil`
(
    `esci_codigo` INTEGER NOT NULL AUTO_INCREMENT,
    `esci_descripcion` VARCHAR(255),
    `esci_r_fecha_creacion` DATETIME,
    `esci_r_fecha_modificacion` DATETIME,
    `esci_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`esci_codigo`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- evaluacion
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `evaluacion`;

CREATE TABLE `evaluacion`
(
    `eval_codigo` INTEGER NOT NULL AUTO_INCREMENT,
    `eval_t_evaluacion` INTEGER,
    `eval_titulo` VARCHAR(255),
    `eval_descripcion` VARCHAR(255),
    `eval_vigente` INTEGER(1),
    `eval_r_fecha_creacion` DATETIME,
    `eval_r_fecha_modificacion` DATETIME,
    `eval_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`eval_codigo`),
    INDEX `evaluacion_t_evaluacion` (`eval_t_evaluacion`),
    CONSTRAINT `evaluacion_t_evaluacion_fk`
        FOREIGN KEY (`eval_t_evaluacion`)
        REFERENCES `t_evaluacion` (`tev_tipo`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- evaluacion_aplicada
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `evaluacion_aplicada`;

CREATE TABLE `evaluacion_aplicada`
(
    `evap_c_actividad` INTEGER NOT NULL,
    `evap_numero_dictacion` INTEGER NOT NULL,
    `evap_c_evaluacion` INTEGER NOT NULL,
    `evap_numero_evaluacion` INTEGER NOT NULL,
    `evap_titulo` VARCHAR(255) NOT NULL,
    `evap_descripcion` VARCHAR(255) NOT NULL,
    `evap_orden` INTEGER,
    `evap_e_evaluacion_aplicada` INTEGER,
    `evap_t_evaluacion_aplicada` INTEGER,
    `evap_vigente` INTEGER(1),
    `evap_r_fecha_creacion` DATETIME,
    `evap_r_fecha_modificacion` DATETIME,
    `evap_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`evap_c_actividad`,`evap_numero_dictacion`,`evap_c_evaluacion`,`evap_numero_evaluacion`),
    INDEX `evaluacion_aplicada_dictacion` (`evap_c_actividad`, `evap_numero_dictacion`),
    INDEX `evaluacion_aplicada_evaluacion` (`evap_c_evaluacion`),
    INDEX `evaluacion_aplicada_e_evaluacion_aplicada` (`evap_e_evaluacion_aplicada`),
    INDEX `evaluacion_aplicada_t_evaluacion_aplicada` (`evap_t_evaluacion_aplicada`),
    CONSTRAINT `evaluacion_aplicada_dictacion_fk`
        FOREIGN KEY (`evap_c_actividad`,`evap_numero_dictacion`)
        REFERENCES `dictacion` (`dict_c_actividad`,`dict_numero`)
        ON UPDATE CASCADE,
    CONSTRAINT `evaluacion_aplicada_e_evaluacion_aplicada_fk`
        FOREIGN KEY (`evap_e_evaluacion_aplicada`)
        REFERENCES `e_evaluacion_aplicada` (`eeva_estado`)
        ON UPDATE CASCADE,
    CONSTRAINT `evaluacion_aplicada_evaluacion_fk`
        FOREIGN KEY (`evap_c_evaluacion`)
        REFERENCES `evaluacion` (`eval_codigo`)
        ON UPDATE CASCADE,
    CONSTRAINT `evaluacion_aplicada_t_evaluacion_aplicada_fk`
        FOREIGN KEY (`evap_t_evaluacion_aplicada`)
        REFERENCES `t_evaluacion_aplicada` (`teva_tipo`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- evaluacion_marcador
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `evaluacion_marcador`;

CREATE TABLE `evaluacion_marcador`
(
    `evma_c_evaluacion` INTEGER NOT NULL,
    `evma_c_marcador` INTEGER NOT NULL,
    `evma_vigente` INTEGER(1),
    `evma_r_fecha_creacion` DATETIME,
    `evma_r_fecha_modificacion` DATETIME,
    `evma_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`evma_c_evaluacion`,`evma_c_marcador`),
    INDEX `evaluacion_marcador_evaluacion` (`evma_c_evaluacion`),
    INDEX `evaluacion_marcador_marcador` (`evma_c_marcador`),
    CONSTRAINT `evaluacion_marcador_evaluacion_fk`
        FOREIGN KEY (`evma_c_evaluacion`)
        REFERENCES `evaluacion` (`eval_codigo`)
        ON UPDATE CASCADE,
    CONSTRAINT `evaluacion_marcador_marcador_fk`
        FOREIGN KEY (`evma_c_marcador`)
        REFERENCES `marcador` (`marc_codigo`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- evaluacion_pregunta
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `evaluacion_pregunta`;

CREATE TABLE `evaluacion_pregunta`
(
    `evpr_codigo` INTEGER NOT NULL AUTO_INCREMENT,
    `evpr_c_evaluacion` INTEGER NOT NULL,
    `evpr_c_pregunta` INTEGER NOT NULL,
    `evpr_c_objetivo` INTEGER NOT NULL,
    `evpr_c_seccion` INTEGER NOT NULL,
    `evpr_orden` INTEGER(1),
    `evpr_r_fecha_creacion` DATETIME,
    `evpr_r_fecha_modificacion` DATETIME,
    `evpr_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`evpr_codigo`),
    INDEX `evaluacion_pregunta_evaluacion` (`evpr_c_evaluacion`),
    INDEX `evaluacion_pregunta_pregunta` (`evpr_c_pregunta`),
    INDEX `evaluacion_pregunta_objetivo` (`evpr_c_objetivo`),
    INDEX `evaluacion_pregunta_seccion` (`evpr_c_seccion`),
    CONSTRAINT `evaluacion_pregunta_evaluacion_fk`
        FOREIGN KEY (`evpr_c_evaluacion`)
        REFERENCES `evaluacion` (`eval_codigo`)
        ON UPDATE CASCADE,
    CONSTRAINT `evaluacion_pregunta_objetivo_fk`
        FOREIGN KEY (`evpr_c_objetivo`)
        REFERENCES `objetivo` (`obje_codigo`)
        ON UPDATE CASCADE,
    CONSTRAINT `evaluacion_pregunta_pregunta_fk`
        FOREIGN KEY (`evpr_c_pregunta`)
        REFERENCES `pregunta` (`preg_codigo`)
        ON UPDATE CASCADE,
    CONSTRAINT `evaluacion_pregunta_seccion_fk`
        FOREIGN KEY (`evpr_c_seccion`)
        REFERENCES `seccion` (`secc_codigo`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- facilitador
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `facilitador`;

CREATE TABLE `facilitador`
(
    `faci_c_actividad` INTEGER NOT NULL,
    `faci_numero_dictacion` INTEGER NOT NULL,
    `faci_c_persona` INTEGER NOT NULL,
    `faci_r_fecha_creacion` DATETIME,
    `faci_r_fecha_modificacion` DATETIME,
    `faci_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`faci_c_actividad`,`faci_numero_dictacion`,`faci_c_persona`),
    INDEX `facilitador_dictacion` (`faci_c_actividad`, `faci_numero_dictacion`),
    INDEX `facilitador_persona` (`faci_c_persona`),
    CONSTRAINT `facilitador_dictacion_fk`
        FOREIGN KEY (`faci_c_actividad`,`faci_numero_dictacion`)
        REFERENCES `dictacion` (`dict_c_actividad`,`dict_numero`)
        ON UPDATE CASCADE,
    CONSTRAINT `facilitador_persona_fk`
        FOREIGN KEY (`faci_c_persona`)
        REFERENCES `persona` (`pers_codigo`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- gerencia
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `gerencia`;

CREATE TABLE `gerencia`
(
    `gere_codigo` INTEGER NOT NULL AUTO_INCREMENT,
    `gere_c_institucion` INTEGER,
    `gere_sigla` VARCHAR(10),
    `gere_descripcion` VARCHAR(255),
    `gere_r_fecha_creacion` DATETIME,
    `gere_r_fecha_modificacion` DATETIME,
    `gere_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`gere_codigo`),
    INDEX `gerencia_institucion` (`gere_c_institucion`),
    CONSTRAINT `gerencia_institucion_fk`
        FOREIGN KEY (`gere_c_institucion`)
        REFERENCES `institucion` (`inst_codigo`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- grupo_sence
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `grupo_sence`;

CREATE TABLE `grupo_sence`
(
    `grse_grupo` INTEGER NOT NULL AUTO_INCREMENT,
    `grse_codigo_sence` VARCHAR(25),
    `grse_nombre_grupo` VARCHAR(255),
    `grse_vigente` INTEGER(1),
    `cagrse_r_fecha_creacion` DATETIME,
    `cagrse_r_fecha_modificacion` DATETIME,
    `cagrse_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`grse_grupo`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- inscripcion
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `inscripcion`;

CREATE TABLE `inscripcion`
(
    `insc_c_actividad` INTEGER NOT NULL,
    `insc_numero_dictacion` INTEGER NOT NULL,
    `insc_c_trabajador` INTEGER NOT NULL,
    `insc_e_inscripcion` INTEGER,
    `insc_e_finalizacion` INTEGER,
    `insc_grupo` INTEGER,
    `insc_asistencia` INTEGER(3),
    `insc_nota` VARCHAR(10),
    `insc_resultado` VARCHAR(10),
    `insc_r_fecha_creacion` DATETIME,
    `insc_r_fecha_modificacion` DATETIME,
    `insc_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`insc_c_actividad`,`insc_numero_dictacion`,`insc_c_trabajador`),
    INDEX `inscripcion_dictacion` (`insc_c_actividad`, `insc_numero_dictacion`),
    INDEX `inscripcion_trabajador` (`insc_c_trabajador`),
    INDEX `inscripcion_e_inscripcion` (`insc_e_inscripcion`),
    INDEX `inscripcion_e_finalizacion` (`insc_e_finalizacion`),
    CONSTRAINT `inscripcion_dictacion_fk`
        FOREIGN KEY (`insc_c_actividad`,`insc_numero_dictacion`)
        REFERENCES `dictacion` (`dict_c_actividad`,`dict_numero`),
    CONSTRAINT `inscripcion_e_finalizacion_fk`
        FOREIGN KEY (`insc_e_finalizacion`)
        REFERENCES `e_finalizacion` (`efin_estado`)
        ON UPDATE CASCADE,
    CONSTRAINT `inscripcion_e_inscripcion_fk`
        FOREIGN KEY (`insc_e_inscripcion`)
        REFERENCES `e_inscripcion` (`eins_estado`)
        ON UPDATE CASCADE,
    CONSTRAINT `inscripcion_trabajador_fk`
        FOREIGN KEY (`insc_c_trabajador`)
        REFERENCES `trabajador` (`trab_codigo`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- inscripcion_evaluacion_aplicada
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `inscripcion_evaluacion_aplicada`;

CREATE TABLE `inscripcion_evaluacion_aplicada`
(
    `inevap_c_actividad` INTEGER NOT NULL,
    `inevap_numero_dictacion` INTEGER NOT NULL,
    `inevap_c_evaluacion` INTEGER NOT NULL,
    `inevap_numero_evaluacion` INTEGER NOT NULL,
    `inevap_c_trabajador` INTEGER NOT NULL,
    `inevap_e_inscripcion_evaluacion_aplicada` INTEGER,
    `inevap_vigente` INTEGER(1),
    `inevap_r_fecha_creacion` DATETIME,
    `inevap_r_fecha_modificacion` DATETIME,
    `inevap_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`inevap_c_actividad`,`inevap_numero_dictacion`,`inevap_c_evaluacion`,`inevap_numero_evaluacion`,`inevap_c_trabajador`),
    INDEX `inscripcion_evaluacion_aplicada_evaluacion_aplicada` (`inevap_c_actividad`, `inevap_numero_dictacion`, `inevap_c_evaluacion`, `inevap_numero_evaluacion`),
    INDEX `inscripcion_evaluacion_aplicada_inscripcion` (`inevap_c_actividad`, `inevap_numero_dictacion`, `inevap_c_trabajador`),
    INDEX `inscripcion_evaluacion_aplicada_eiea` (`inevap_e_inscripcion_evaluacion_aplicada`),
    CONSTRAINT `inscripcion_evaluacion_aplicada_eiea_fk`
        FOREIGN KEY (`inevap_e_inscripcion_evaluacion_aplicada`)
        REFERENCES `e_inscripcion_evaluacion_aplicada` (`eiea_estado`)
        ON UPDATE CASCADE,
    CONSTRAINT `inscripcion_evaluacion_aplicada_evaluacion_aplicada_fk`
        FOREIGN KEY (`inevap_c_actividad`,`inevap_numero_dictacion`,`inevap_c_evaluacion`,`inevap_numero_evaluacion`)
        REFERENCES `evaluacion_aplicada` (`evap_c_actividad`,`evap_numero_dictacion`,`evap_c_evaluacion`,`evap_numero_evaluacion`)
        ON UPDATE CASCADE,
    CONSTRAINT `inscripcion_evaluacion_aplicada_inscripcion_fk`
        FOREIGN KEY (`inevap_c_actividad`,`inevap_numero_dictacion`,`inevap_c_trabajador`)
        REFERENCES `inscripcion` (`insc_c_actividad`,`insc_numero_dictacion`,`insc_c_trabajador`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- institucion
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `institucion`;

CREATE TABLE `institucion`
(
    `inst_codigo` INTEGER NOT NULL AUTO_INCREMENT,
    `inst_identificador` INTEGER(15),
    `inst_dv` VARCHAR(1),
    `inst_nombre` VARCHAR(255),
    `inst_t_institucion` INTEGER,
    `inst_c_comuna` VARCHAR(11),
    `inst_c_pais` VARCHAR(11),
    `inst_telefono` VARCHAR(25),
    `inst_email` VARCHAR(255),
    `inst_tratamiento` VARCHAR(1),
    `inst_direccion` VARCHAR(255),
    `inst_giro` VARCHAR(55),
    `inst_r_fecha_creacion` DATETIME,
    `inst_r_fecha_modificacion` DATETIME,
    `inst_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`inst_codigo`),
    INDEX `institucion_t_institucion` (`inst_t_institucion`),
    INDEX `institucion_comuna` (`inst_c_comuna`),
    INDEX `institucion_pais` (`inst_c_pais`),
    CONSTRAINT `institucion_t_institucion_fk`
        FOREIGN KEY (`inst_t_institucion`)
        REFERENCES `t_institucion` (`tins_tipo`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- login_confirm
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `login_confirm`;

CREATE TABLE `login_confirm`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `data` VARCHAR(255) NOT NULL,
    `username` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `key` VARCHAR(255) NOT NULL,
    `type` VARCHAR(25) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- login_integration
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `login_integration`;

CREATE TABLE `login_integration`
(
    `user_id` INTEGER(255) NOT NULL,
    `facebook` VARCHAR(255) NOT NULL,
    `twitter` VARCHAR(255) NOT NULL,
    `google` VARCHAR(255) NOT NULL,
    `yahoo` VARCHAR(255) NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`user_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- login_levels
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `login_levels`;

CREATE TABLE `login_levels`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `level_name` VARCHAR(255) NOT NULL,
    `level_disabled` TINYINT(1) DEFAULT 0 NOT NULL,
    `redirect` VARCHAR(255),
    `welcome_email` TINYINT(1) DEFAULT 0 NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- login_profile_fields
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `login_profile_fields`;

CREATE TABLE `login_profile_fields`
(
    `id` INTEGER(255) NOT NULL AUTO_INCREMENT,
    `section` VARCHAR(255) NOT NULL,
    `type` VARCHAR(25) NOT NULL,
    `label` VARCHAR(255) NOT NULL,
    `public` TINYINT NOT NULL,
    `signup` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- login_profiles
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `login_profiles`;

CREATE TABLE `login_profiles`
(
    `p_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `pfield_id` int(255) unsigned NOT NULL,
    `user_id` bigint(20) unsigned DEFAULT 0 NOT NULL,
    `profile_value` LONGTEXT,
    PRIMARY KEY (`p_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- login_settings
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `login_settings`;

CREATE TABLE `login_settings`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `option_name` VARCHAR(255) NOT NULL,
    `option_value` LONGTEXT NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `id` (`id`),
    UNIQUE INDEX `option_name` (`option_name`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- login_timestamps
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `login_timestamps`;

CREATE TABLE `login_timestamps`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `user_id` INTEGER NOT NULL,
    `ip` VARCHAR(255) NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- login_users
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `login_users`;

CREATE TABLE `login_users`
(
    `user_id` INTEGER(8) NOT NULL AUTO_INCREMENT,
    `user_level` LONGTEXT NOT NULL,
    `persona_id` INTEGER NOT NULL,
    `restricted` INTEGER(1) DEFAULT 0 NOT NULL,
    `username` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(128) NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`user_id`),
    UNIQUE INDEX `user_id` (`user_id`),
    UNIQUE INDEX `username` (`username`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- marcador
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `marcador`;

CREATE TABLE `marcador`
(
    `marc_codigo` INTEGER NOT NULL AUTO_INCREMENT,
    `marc_codigo_marcador` VARCHAR(255),
    `marc_descripcion` VARCHAR(255),
    `marc_imagen` VARCHAR(255) NOT NULL,
    `marc_vigente` INTEGER(1),
    `marc_r_fecha_creacion` DATETIME,
    `marc_r_fecha_modificacion` DATETIME,
    `marc_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`marc_codigo`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- objetivo
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `objetivo`;

CREATE TABLE `objetivo`
(
    `obje_codigo` INTEGER NOT NULL AUTO_INCREMENT,
    `obje_sigla` VARCHAR(15),
    `obje_descripcion` VARCHAR(255),
    `obje_r_fecha_creacion` DATETIME,
    `obje_r_fecha_modificacion` DATETIME,
    `obje_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`obje_codigo`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- opcion_pregunta
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `opcion_pregunta`;

CREATE TABLE `opcion_pregunta`
(
    `oppr_codigo` INTEGER NOT NULL AUTO_INCREMENT,
    `oppr_valor` VARCHAR(255),
    `oppr_no_procesa_promedio` INTEGER(1),
    `oppr_r_fecha_creacion` VARCHAR(14),
    `oppr_r_fecha_modificacion` DATETIME,
    `oppr_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`oppr_codigo`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- pais
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `pais`;

CREATE TABLE `pais`
(
    `pais_codigo` INTEGER NOT NULL AUTO_INCREMENT,
    `nombre_comun` VARCHAR(155),
    `nombre_iso` VARCHAR(100),
    `codigo_alfa2` VARCHAR(3),
    `codigo_alfa3` VARCHAR(4),
    `codigo_numerico` INTEGER(3),
    `observaciones` VARCHAR(455),
    `pais_r_fecha_creacion` DATETIME,
    `pais_r_fecha_modificacion` DATETIME NOT NULL,
    `pais_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`pais_codigo`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- persona
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `persona`;

CREATE TABLE `persona`
(
    `pers_codigo` INTEGER NOT NULL AUTO_INCREMENT,
    `pers_t_identificador` INTEGER,
    `pers_identificador` INTEGER(15),
    `pers_dv` VARCHAR(1),
    `pers_nombre1` VARCHAR(70),
    `pers_nombre2` VARCHAR(70),
    `pers_apellido_paterno` VARCHAR(79),
    `pers_apellido_materno` VARCHAR(79),
    `pers_sexo` VARCHAR(1),
    `pers_fecha_nacimiento` VARCHAR(19),
    `pers_c_estado_civil` INTEGER,
    `pers_c_escolaridad` INTEGER,
    `pers_c_pais_origen` INTEGER,
    `pers_email` VARCHAR(255),
    `pers_movil` VARCHAR(55),
    `pers_titulo` VARCHAR(55),
    `pers_grado` VARCHAR(55),
    `pers_r_fecha_creacion` DATETIME,
    `pers_r_fecha_modificacion` DATETIME,
    `pers_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`pers_codigo`),
    INDEX `persona_t_identificador` (`pers_t_identificador`),
    INDEX `persona_estado_civil` (`pers_c_estado_civil`),
    INDEX `persona_c_escolaridad` (`pers_c_escolaridad`),
    INDEX `persona_c_pais` (`pers_c_pais_origen`),
    CONSTRAINT `persona_escolaridad_fk`
        FOREIGN KEY (`pers_c_escolaridad`)
        REFERENCES `escolaridad` (`esco_codigo`)
        ON UPDATE CASCADE,
    CONSTRAINT `persona_estado_civil_fk`
        FOREIGN KEY (`pers_c_estado_civil`)
        REFERENCES `estado_civil` (`esci_codigo`)
        ON UPDATE CASCADE,
    CONSTRAINT `persona_pais_fk`
        FOREIGN KEY (`pers_c_pais_origen`)
        REFERENCES `pais` (`pais_codigo`)
        ON UPDATE CASCADE,
    CONSTRAINT `persona_t_identificador_fk`
        FOREIGN KEY (`pers_t_identificador`)
        REFERENCES `t_identificador` (`tide_tipo`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- pregunta
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `pregunta`;

CREATE TABLE `pregunta`
(
    `preg_codigo` INTEGER NOT NULL AUTO_INCREMENT,
    `preg_t_pregunta` INTEGER,
    `preg_contexto` VARCHAR(255),
    `preg_descripcion` VARCHAR(255),
    `preg_r_fecha_creacion` DATETIME,
    `preg_r_fecha_modificacion` DATETIME,
    `preg_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`preg_codigo`),
    INDEX `pregunta_t_pregunta` (`preg_t_pregunta`),
    CONSTRAINT `pregunta_t_pregunta_fk`
        FOREIGN KEY (`preg_t_pregunta`)
        REFERENCES `t_pregunta` (`tpre_tipo`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- provincia
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `provincia`;

CREATE TABLE `provincia`
(
    `prov_codigo` INTEGER DEFAULT 0 NOT NULL,
    `prov_nombre` VARCHAR(55),
    `prov_c_region` INTEGER,
    `prov_r_fecha_creacion` DATETIME,
    `prov_r_fecha_modificacion` DATETIME,
    `prov_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`prov_codigo`),
    INDEX `provincia_region` (`prov_c_region`),
    CONSTRAINT `provincia_region_fk`
        FOREIGN KEY (`prov_c_region`)
        REFERENCES `region` (`regi_codigo`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- region
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `region`;

CREATE TABLE `region`
(
    `regi_codigo` INTEGER DEFAULT 0 NOT NULL,
    `regi_nombre` VARCHAR(55),
    `regi_iso_3166_2_cl` VARCHAR(10),
    `regi_r_fecha_creacion` DATETIME,
    `regi_r_fecha_modificacion` DATETIME,
    `regi_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`regi_codigo`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- respuesta_aplicada
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `respuesta_aplicada`;

CREATE TABLE `respuesta_aplicada`
(
    `reap_c_actividad` INTEGER NOT NULL,
    `reap_numero_dictacion` INTEGER NOT NULL,
    `reap_c_evaluacion` INTEGER NOT NULL,
    `reap_numero_evaluacion` INTEGER NOT NULL,
    `reap_c_trabajador` INTEGER NOT NULL,
    `reap_c_pregunta` INTEGER NOT NULL,
    `reap_c_opcion_pregunta` INTEGER NOT NULL,
    `reap_e_respuesta_aplicada` INTEGER,
    `reap_vigente` INTEGER(1),
    `reap_r_fecha_creacion` DATETIME,
    `reap_r_fecha_modificacion` DATETIME,
    `reap_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`reap_c_actividad`,`reap_numero_dictacion`,`reap_c_evaluacion`,`reap_numero_evaluacion`,`reap_c_trabajador`,`reap_c_pregunta`,`reap_c_opcion_pregunta`),
    INDEX `respuesta_aplicada_inscripcion_evaluacion_aplicada` (`reap_c_actividad`, `reap_numero_dictacion`, `reap_c_evaluacion`, `reap_numero_evaluacion`, `reap_c_trabajador`),
    INDEX `respuesta_aplicada_detalle_pregunta` (`reap_c_pregunta`, `reap_c_opcion_pregunta`),
    INDEX `respuesta_aplicada_e_respuesta_aplicada` (`reap_e_respuesta_aplicada`),
    CONSTRAINT `respuesta_aplicada_detalle_pregunta_fk`
        FOREIGN KEY (`reap_c_pregunta`,`reap_c_opcion_pregunta`)
        REFERENCES `detalle_pregunta` (`depr_c_pregunta`,`depr_c_opcion_pregunta`)
        ON UPDATE CASCADE,
    CONSTRAINT `respuesta_aplicada_e_respuesta_aplicada_fk`
        FOREIGN KEY (`reap_e_respuesta_aplicada`)
        REFERENCES `e_respuesta_aplicada` (`erea_estado`)
        ON UPDATE CASCADE,
    CONSTRAINT `respuesta_aplicada_inscripcion_evaluacion_aplicada_fk`
        FOREIGN KEY (`reap_c_actividad`,`reap_numero_dictacion`,`reap_c_evaluacion`,`reap_numero_evaluacion`,`reap_c_trabajador`)
        REFERENCES `inscripcion_evaluacion_aplicada` (`inevap_c_actividad`,`inevap_numero_dictacion`,`inevap_c_evaluacion`,`inevap_numero_evaluacion`,`inevap_c_trabajador`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- seccion
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `seccion`;

CREATE TABLE `seccion`
(
    `secc_codigo` INTEGER NOT NULL,
    `secc_descripcion` VARCHAR(255),
    `secc_vigente` INTEGER(1),
    `secc_r_fecha_creacion` DATETIME,
    `secc_r_fecha_modificacion` DATETIME,
    `secc_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`secc_codigo`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- t_actividad
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `t_actividad`;

CREATE TABLE `t_actividad`
(
    `tac_tipo` INTEGER NOT NULL AUTO_INCREMENT,
    `tac_descripcion` VARCHAR(255),
    `tac_tratamiento` VARCHAR(1),
    `tac_r_fecha_creacion` DATETIME,
    `tac_r_fecha_modificacion` DATETIME,
    `tac_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`tac_tipo`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- t_calificacion
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `t_calificacion`;

CREATE TABLE `t_calificacion`
(
    `tcal_tipo` INTEGER NOT NULL AUTO_INCREMENT,
    `tcal_descripcion` VARCHAR(255),
    `tcal_r_fecha_modificacion` DATETIME,
    `tcal_r_fecha_creacion` DATETIME,
    `tcal_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`tcal_tipo`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- t_certificado
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `t_certificado`;

CREATE TABLE `t_certificado`
(
    `tce_tipo` INTEGER NOT NULL AUTO_INCREMENT,
    `tce_descripcion` VARCHAR(255),
    `tce_r_fecha_creacion` DATETIME,
    `tce_r_fecha_modificacion` DATETIME,
    `tce_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`tce_tipo`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- t_direccion
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `t_direccion`;

CREATE TABLE `t_direccion`
(
    `tdir_tipo` INTEGER NOT NULL AUTO_INCREMENT,
    `tdir_descripcion` VARCHAR(255),
    `tdir_r_fecha_creacion` DATETIME,
    `tdir_r_fecha_modificacion` DATETIME,
    `tdir_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`tdir_tipo`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- t_evaluacion
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `t_evaluacion`;

CREATE TABLE `t_evaluacion`
(
    `tev_tipo` INTEGER NOT NULL AUTO_INCREMENT,
    `tev_descripcion` VARCHAR(255),
    `tev_r_fecha_creacion` DATETIME,
    `tev_r_fecha_modificacion` DATETIME,
    `tev_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`tev_tipo`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- t_evaluacion_aplicada
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `t_evaluacion_aplicada`;

CREATE TABLE `t_evaluacion_aplicada`
(
    `teva_tipo` INTEGER NOT NULL AUTO_INCREMENT,
    `teva_descripcion` VARCHAR(255),
    `teva_r_fecha_modificacion` DATETIME,
    `teva_r_fecha_creacion` DATETIME,
    `teva_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`teva_tipo`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- t_hora
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `t_hora`;

CREATE TABLE `t_hora`
(
    `tho_tipo` INTEGER NOT NULL AUTO_INCREMENT,
    `tho_descripcion` VARCHAR(255),
    `tho_r_fecha_creacion` DATETIME,
    `tho_r_fecha_modificacion` DATETIME,
    `tho_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`tho_tipo`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- t_identificador
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `t_identificador`;

CREATE TABLE `t_identificador`
(
    `tide_tipo` INTEGER NOT NULL,
    `tide_descripcion` VARCHAR(255),
    `tide_r_fecha_creacion` DATETIME,
    `tide_r_fecha_modificacion` DATETIME,
    `tide_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`tide_tipo`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- t_institucion
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `t_institucion`;

CREATE TABLE `t_institucion`
(
    `tins_tipo` INTEGER NOT NULL AUTO_INCREMENT,
    `tins_descripcion` VARCHAR(255),
    `tins_r_fecha_creacion` DATETIME,
    `tins_r_fecha_modificacion` DATETIME,
    `tins_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`tins_tipo`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- t_modalidad
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `t_modalidad`;

CREATE TABLE `t_modalidad`
(
    `tmo_tipo` INTEGER NOT NULL AUTO_INCREMENT,
    `tmo_descripcion` VARCHAR(255),
    `tmo_r_fecha_creacion` DATETIME,
    `tmo_r_fecha_modificacion` DATETIME,
    `tmo_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`tmo_tipo`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- t_moneda
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `t_moneda`;

CREATE TABLE `t_moneda`
(
    `tmon_tipo` INTEGER NOT NULL,
    `tmon_descripcion` VARCHAR(255),
    `tmon_r_fecha_creacion` DATETIME,
    `tmon_r_fecha_modificacion` DATETIME,
    `tmon_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`tmon_tipo`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- t_pregunta
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `t_pregunta`;

CREATE TABLE `t_pregunta`
(
    `tpre_tipo` INTEGER NOT NULL AUTO_INCREMENT,
    `tpre_descripcion` VARCHAR(255),
    `tpre_r_fecha_creacion` DATETIME,
    `tpre_r_fecha_modificacion` DATETIME,
    `tpre_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`tpre_tipo`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- t_relacion_faena
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `t_relacion_faena`;

CREATE TABLE `t_relacion_faena`
(
    `trefa_tipo` INTEGER NOT NULL AUTO_INCREMENT,
    `trefa_sigla` VARCHAR(25),
    `trefa_descripcion` VARCHAR(255),
    `trefa_vigente` INTEGER(1),
    `trefa_r_fecha_creacion` DATETIME,
    `trefa_r_fecha_modificacion` DATETIME,
    `trefa_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`trefa_tipo`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- trabajador
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `trabajador`;

CREATE TABLE `trabajador`
(
    `trab_codigo` INTEGER NOT NULL AUTO_INCREMENT,
    `trab_c_persona` INTEGER NOT NULL,
    `trab_c_cargo` INTEGER NOT NULL,
    `trab_c_gerencia` INTEGER NOT NULL,
    `trab_c_area` INTEGER NOT NULL,
    `trab_c_anios_experiencia_cargo` INTEGER NOT NULL,
    `trab_fecha_inicio` VARCHAR(20),
    `trab_fecha_termino` VARCHAR(20),
    `trab_vigente` INTEGER(1),
    `trab_r_fecha_creacion` DATETIME,
    `trab_r_fecha_modificacion` DATETIME,
    `trab_r_usuario` INTEGER DEFAULT 1,
    PRIMARY KEY (`trab_codigo`),
    INDEX `trabajador_persona` (`trab_c_persona`),
    INDEX `trabajador_cargo` (`trab_c_cargo`),
    INDEX `trabajador_gerencia` (`trab_c_gerencia`),
    INDEX `trabajador_area` (`trab_c_area`),
    INDEX `trabajador_anios_experiencia_cargo` (`trab_c_anios_experiencia_cargo`),
    CONSTRAINT `trabajador_anios_experiencia_cargo_fk`
        FOREIGN KEY (`trab_c_anios_experiencia_cargo`)
        REFERENCES `anios_experiencia_cargo` (`anexca_codigo`)
        ON UPDATE CASCADE,
    CONSTRAINT `trabajador_area_fk`
        FOREIGN KEY (`trab_c_area`)
        REFERENCES `area` (`area_codigo`)
        ON UPDATE CASCADE,
    CONSTRAINT `trabajador_cargo_fk`
        FOREIGN KEY (`trab_c_cargo`)
        REFERENCES `cargo` (`carg_codigo`)
        ON UPDATE CASCADE,
    CONSTRAINT `trabajador_gerencia_fk`
        FOREIGN KEY (`trab_c_gerencia`)
        REFERENCES `gerencia` (`gere_codigo`)
        ON UPDATE CASCADE,
    CONSTRAINT `trabajador_persona_fk`
        FOREIGN KEY (`trab_c_persona`)
        REFERENCES `persona` (`pers_codigo`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
