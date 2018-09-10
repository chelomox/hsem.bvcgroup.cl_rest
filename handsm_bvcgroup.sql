-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-08-2018 a las 21:29:12
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `servidor_bvcgroup`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

DROP TABLE IF EXISTS `actividad`;
CREATE TABLE `actividad` (
  `acti_codigo` int(11) NOT NULL,
  `acti_nombre` varchar(255) DEFAULT NULL,
  `acti_imagen` varchar(255) NOT NULL,
  `acti_t_actividad` int(11) DEFAULT NULL,
  `acti_hora` int(3) DEFAULT NULL,
  `acti_hora_teorica` int(2) DEFAULT NULL,
  `acti_hora_practica` int(2) DEFAULT NULL,
  `acti_t_hora` int(11) DEFAULT NULL,
  `acti_e_actividad` int(11) DEFAULT NULL,
  `acti_t_modalidad` int(11) DEFAULT NULL,
  `acti_observacion` varchar(255) DEFAULT NULL,
  `acti_vigente` int(1) DEFAULT NULL,
  `acti_r_fecha_creacion` datetime DEFAULT NULL,
  `acti_r_fecha_modificacion` datetime DEFAULT NULL,
  `acti_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` VALUES(1, 'INDUCCIÓN HSE PROYECTO ', '', 2, 2, 1, 1, 1, 1, 1, NULL, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad` VALUES(2, 'MANIOBRAS DE IZAJE - 109', '', 1, 2, 1, 1, 1, 1, 1, NULL, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad` VALUES(3, 'ACCIDENTE VEHICULAR - 105', '', 1, 2, 1, 1, 1, 1, 1, NULL, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad` VALUES(4, 'IMPACTO VEHÍCULO PERSONA EQUIPO', '', 1, 2, 1, 1, 1, 1, 1, NULL, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad` VALUES(5, 'TRABAJO EN ALTURA 110', '', 1, 2, 1, 1, 1, 1, 1, NULL, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad` VALUES(6, 'CAÍDA DE OBJETOS 110', '', 1, 2, 1, 1, 1, 1, 1, NULL, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad` VALUES(7, 'CONTACTO CON ENERGÍA ELÉCTRICA / ARCO ELÉCTRICO - 104', '', 1, 2, 1, 1, 1, 1, 1, NULL, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad` VALUES(8, 'AISLAMIENTO Y BLOQUEO', '', 1, 2, 1, 1, 1, 1, 1, NULL, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad` VALUES(9, 'FALLA DE TERRENO', '', 1, 2, 1, 1, 1, 1, 1, NULL, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad` VALUES(10, 'EXPLOSIVOS', '', 1, 2, 1, 1, 1, 1, 1, NULL, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad` VALUES(11, 'ATRAPAMIENTO', '', 1, 2, 1, 1, 1, 1, 1, NULL, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad` VALUES(12, 'LIBERACIÓN DESCONTROLADA DE ENERGÍA (HIDRÁULICA- NEUMÁTICA) 800 Y 801 TITULO, NO LOAD COMMISSIONING, LOAD COMMISSIONING EN PERIODO DE PRUEBA ', '', 1, 2, 1, 1, 1, 1, 1, NULL, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad` VALUES(13, 'MANIPULACIÓN, INHALACIÓN Y CONTACTO SUSTANCIAS PELIGROSAS', '', 1, 2, 1, 1, 1, 1, 1, NULL, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad` VALUES(14, 'FUEGO – LLAMA ABIERTA TRABAJOS CON ELEMENTOS DE ALTA TEMPERATURA. FUEGO O SUPERFICIES ', '', 1, 2, 1, 1, 1, 1, 1, NULL, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad` VALUES(15, 'VOLCAMIENTO EN PILA, O EMPRÉSTITO BOTADERO Y STOCK', '', 1, 2, 1, 1, 1, 1, 1, NULL, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad` VALUES(16, 'INGRESO A ESPACIOS CONFINADOS', '', 1, 2, 1, 1, 1, 1, 1, NULL, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad` VALUES(17, 'USO DE HERRAMIENTA CORTANTE (PICOLORO)', '', 1, 2, 1, 1, 1, 1, 1, NULL, 1, '2018-08-01 05:19:50', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_cargo`
--

DROP TABLE IF EXISTS `actividad_cargo`;
CREATE TABLE `actividad_cargo` (
  `acca_c_actividad` int(11) NOT NULL,
  `acca_c_cargo` int(11) NOT NULL,
  `acca_vigente` int(1) DEFAULT NULL,
  `acca_r_fecha_creacion` datetime DEFAULT NULL,
  `acca_r_fecha_modificacion` datetime DEFAULT NULL,
  `acca_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividad_cargo`
--

INSERT INTO `actividad_cargo` VALUES(1, 1, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 2, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 3, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 4, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 5, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 6, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 7, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 8, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 9, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 10, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 11, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 12, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 13, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 14, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 15, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 16, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 17, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 18, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 19, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 20, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 21, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 22, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 23, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 24, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 25, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 26, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 27, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 28, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 29, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 30, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 31, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 32, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 33, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 34, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 35, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 36, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 37, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 38, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 39, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 40, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 41, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 42, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 43, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 44, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 45, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 46, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 47, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 48, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 49, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 50, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 51, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 52, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 53, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 54, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 55, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 56, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 57, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 58, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 59, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 60, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 61, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 62, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 63, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 64, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 65, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 66, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 67, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 68, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 69, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 70, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(1, 71, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 2, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 3, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 4, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 5, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 6, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 7, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 8, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 9, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 10, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 11, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 12, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 13, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 14, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 15, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 16, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 17, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 18, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 19, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 20, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 21, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 22, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 23, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 24, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 25, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 26, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 27, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 28, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 29, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 30, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 31, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 32, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 33, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 34, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 35, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 36, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 44, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 45, 1, '2018-08-01 05:19:50', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 46, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 47, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 48, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 49, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 50, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 51, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 52, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 53, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 54, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 55, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(2, 67, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 1, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 2, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 3, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 4, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 5, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 6, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 7, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 8, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 9, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 10, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 11, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 12, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 13, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 14, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 15, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 16, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 17, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 18, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 19, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 20, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 21, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 22, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 23, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 24, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 25, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 26, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 27, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 28, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 29, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 30, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 31, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 32, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 33, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 34, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 35, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 36, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 37, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 38, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 39, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 40, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 41, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 42, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 43, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 44, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 45, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 46, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 47, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 48, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 49, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 50, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 51, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 52, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 53, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 54, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 55, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 56, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 57, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 58, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 59, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 60, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 61, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 62, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 63, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 64, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 65, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 66, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 67, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 68, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 69, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(3, 70, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 1, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 2, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 3, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 4, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 5, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 6, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 7, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 8, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 9, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 10, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 11, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 12, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 13, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 14, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 15, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 16, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 17, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 18, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 19, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 20, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 21, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 22, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 23, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 24, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 25, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 26, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 27, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 28, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 29, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 30, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 31, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 32, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 33, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 34, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 35, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 36, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 37, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 38, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 39, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 40, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 41, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 42, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 43, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 44, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 45, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 46, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 47, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 48, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 49, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 50, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 51, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 52, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 53, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 54, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 55, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 56, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 57, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 58, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 59, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 60, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 61, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 62, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 63, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 64, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 65, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 66, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 67, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 68, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 69, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 70, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(4, 71, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 2, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 3, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 4, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 5, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 6, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 7, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 8, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 9, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 10, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 11, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 12, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 13, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 14, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 15, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 16, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 17, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 18, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 19, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 20, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 21, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 22, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 23, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 24, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 25, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 26, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 27, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 28, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 29, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 30, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 31, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 32, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 33, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 34, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 35, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 36, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 37, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 38, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 39, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 40, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 41, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 42, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 43, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 44, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 45, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 46, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 47, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 48, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 49, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 50, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 51, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 52, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 53, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 54, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 55, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 63, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 64, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 65, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 66, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 67, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(5, 71, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 1, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 2, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 3, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 4, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 5, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 6, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 7, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 8, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 9, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 10, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 11, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 12, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 13, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 14, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 15, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 16, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 17, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 18, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 19, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 20, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 21, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 22, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 23, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 24, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 25, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 26, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 27, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 28, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 29, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 30, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 31, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 32, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 33, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 34, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 35, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 36, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 37, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 38, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 39, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 40, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 41, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 42, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 43, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 44, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 45, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 46, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 47, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 48, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 49, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 50, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 51, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 52, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 53, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 54, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 55, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(6, 67, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 2, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 3, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 4, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 5, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 6, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 7, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 8, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 9, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 10, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 11, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 12, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 13, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 14, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 15, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 16, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 17, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 18, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 19, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 20, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 21, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 22, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 23, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 24, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 25, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 26, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 27, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 28, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 29, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 30, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 31, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 32, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 33, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 34, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 35, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 36, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 37, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 38, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 39, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 40, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 41, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 42, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 43, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 44, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 45, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 46, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 47, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 48, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 49, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 67, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(7, 71, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 2, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 3, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 4, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 5, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 6, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 7, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 8, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 9, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 10, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 11, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 12, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 13, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 14, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 15, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 16, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 17, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 18, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 19, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 20, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 21, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 22, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 23, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 24, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 25, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 26, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 27, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 28, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 29, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 30, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 31, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 32, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 33, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 34, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 35, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 36, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 37, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 38, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 39, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 40, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 41, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 42, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 43, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 44, 1, '2018-08-01 05:19:51', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 45, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 46, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 47, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 48, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 49, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 67, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(8, 71, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 2, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 3, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 4, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 5, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 6, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 7, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 8, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 9, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 10, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 11, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 12, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 13, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 14, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 15, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 23, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 24, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 25, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 26, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 27, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 28, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 29, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 30, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 31, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 32, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 33, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 34, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 35, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 36, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 44, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 45, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 46, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 47, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 48, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 49, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 63, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 64, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 65, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 66, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(9, 67, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(10, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(10, 2, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(10, 3, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(10, 4, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(10, 5, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(10, 6, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(10, 7, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(10, 8, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(10, 9, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(10, 10, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(10, 11, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(10, 12, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(10, 13, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(10, 14, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(10, 15, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(10, 30, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(10, 31, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(10, 32, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(10, 33, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(10, 34, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(10, 35, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(10, 36, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 2, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 3, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 4, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 5, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 6, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 7, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 8, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 9, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 10, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 11, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 12, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 13, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 14, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 15, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 16, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 17, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 18, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 19, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 20, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 21, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 22, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 23, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 24, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 25, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 26, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 27, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 28, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 29, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 30, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 31, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 32, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 33, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 34, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 35, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 36, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 37, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 38, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 39, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 40, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 41, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 42, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 43, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 63, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 64, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 65, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 66, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 67, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(11, 71, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(12, 2, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(12, 3, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(12, 4, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(12, 5, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(12, 6, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(12, 7, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(12, 8, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(12, 23, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(12, 24, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(12, 25, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(12, 26, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(12, 27, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(12, 28, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(12, 29, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(12, 44, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(12, 45, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(12, 46, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(12, 47, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(12, 48, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(12, 49, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(12, 67, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(12, 71, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(13, 2, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(13, 3, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(13, 4, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(13, 5, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(13, 6, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(13, 7, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(13, 8, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(13, 23, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(13, 24, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(13, 25, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(13, 26, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(13, 27, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(13, 28, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(13, 29, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(13, 44, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(13, 45, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(13, 46, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(13, 47, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(13, 48, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(13, 49, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(13, 67, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(14, 2, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(14, 3, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(14, 4, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(14, 5, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(14, 6, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(14, 7, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(14, 8, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(14, 16, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(14, 17, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(14, 18, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(14, 19, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(14, 20, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(14, 21, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(14, 22, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(14, 23, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(14, 24, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(14, 25, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(14, 26, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(14, 27, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(14, 28, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(14, 29, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(14, 30, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(14, 31, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(14, 32, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(14, 33, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(14, 34, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(14, 35, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(14, 36, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(14, 44, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(14, 45, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(14, 46, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(14, 47, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(14, 48, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(14, 49, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(14, 67, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(15, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(15, 2, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(15, 3, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(15, 4, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(15, 5, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(15, 6, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(15, 7, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(15, 8, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(15, 9, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(15, 10, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(15, 11, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(15, 12, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(15, 13, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(15, 14, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(15, 15, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(15, 68, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(15, 69, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(15, 70, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 2, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 3, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 4, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 5, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 6, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 7, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 8, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 16, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 17, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 18, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 19, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 20, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 21, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 22, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 23, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 24, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 25, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 26, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 27, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 28, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 29, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 30, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 31, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 32, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 33, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 34, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 35, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 36, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 44, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 45, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 46, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 47, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 48, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 49, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 67, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(16, 71, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(17, 2, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(17, 3, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(17, 4, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(17, 5, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(17, 6, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(17, 7, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(17, 8, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(17, 23, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(17, 24, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(17, 25, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(17, 26, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(17, 27, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(17, 28, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(17, 29, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `actividad_cargo` VALUES(17, 67, 1, '2018-08-01 05:19:52', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_objetivo`
--

DROP TABLE IF EXISTS `actividad_objetivo`;
CREATE TABLE `actividad_objetivo` (
  `acob_c_actividad` int(11) NOT NULL,
  `acob_c_objetivo` int(11) NOT NULL,
  `acob_cantidad_preguntas` int(11) NOT NULL,
  `acob_vigente` int(1) DEFAULT NULL,
  `acob_r_fecha_creacion` datetime DEFAULT NULL,
  `acob_r_fecha_modificacion` datetime DEFAULT NULL,
  `acob_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividad_objetivo`
--

INSERT INTO `actividad_objetivo` VALUES(4, 4, 5, 1, '2018-08-10 02:04:22', NULL, 1);
INSERT INTO `actividad_objetivo` VALUES(4, 5, 5, 1, '2018-08-10 02:04:22', NULL, 1);
INSERT INTO `actividad_objetivo` VALUES(4, 6, 4, 1, '2018-08-10 02:04:33', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anios_experiencia_cargo`
--

DROP TABLE IF EXISTS `anios_experiencia_cargo`;
CREATE TABLE `anios_experiencia_cargo` (
  `anexca_codigo` int(11) NOT NULL,
  `anexca_descripcion` varchar(255) DEFAULT NULL,
  `anexca_vigente` int(1) DEFAULT NULL,
  `anexca_r_fecha_creacion` datetime DEFAULT NULL,
  `anexca_r_fecha_modificacion` datetime DEFAULT NULL,
  `anexca_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `anios_experiencia_cargo`
--

INSERT INTO `anios_experiencia_cargo` VALUES(1, 'SIN EXPERIENCIA ANTERIOR', 1, '2018-07-10 15:46:34', NULL, 1);
INSERT INTO `anios_experiencia_cargo` VALUES(2, 'ENTRE 3 Y 6 MESES', 1, '2018-07-10 15:46:34', NULL, 1);
INSERT INTO `anios_experiencia_cargo` VALUES(3, 'ENTRE 6 MESES Y 1 AÑO', 1, '2018-07-10 15:46:34', NULL, 1);
INSERT INTO `anios_experiencia_cargo` VALUES(4, 'ENTRE 1 Y 2 AÑOS', 1, '2018-07-10 15:46:34', NULL, 1);
INSERT INTO `anios_experiencia_cargo` VALUES(5, 'ENTRE 2 Y 3 AÑOS', 1, '2018-07-10 15:46:34', NULL, 1);
INSERT INTO `anios_experiencia_cargo` VALUES(6, '3 AÑOS O MÁS', 1, '2018-07-10 15:46:34', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

DROP TABLE IF EXISTS `area`;
CREATE TABLE `area` (
  `area_codigo` int(11) NOT NULL,
  `area_c_institucion` int(11) NOT NULL,
  `area_sigla` varchar(10) DEFAULT NULL,
  `area_descripcion` varchar(255) DEFAULT NULL,
  `area_r_fecha_creacion` datetime DEFAULT NULL,
  `area_r_fecha_modificacion` datetime DEFAULT NULL,
  `area_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` VALUES(1, 1, NULL, 'GENERAL', '2018-07-04 02:33:27', NULL, 1);
INSERT INTO `area` VALUES(2, 1, NULL, 'OBRAS TEMPRANAS Y CAMINOS ', '2018-07-04 02:33:27', NULL, 1);
INSERT INTO `area` VALUES(3, 1, NULL, 'PLATAFORMAS ', '2018-07-04 02:33:27', NULL, 1);
INSERT INTO `area` VALUES(4, 1, NULL, 'OBRAS CIVILES ', '2018-07-04 02:33:27', NULL, 1);
INSERT INTO `area` VALUES(5, 1, NULL, 'TUBERÍAS PRINCIPALES ', '2018-07-04 02:33:27', NULL, 1);
INSERT INTO `area` VALUES(6, 1, NULL, 'MURO PRINCIPAL NOROESTE', '2018-07-04 02:33:27', NULL, 1);
INSERT INTO `area` VALUES(7, 1, NULL, 'MURO PRINCIPAL NORESTE', '2018-07-04 02:33:27', NULL, 1);
INSERT INTO `area` VALUES(8, 1, NULL, 'DIQUE DE PROTECCIÓN ', '2018-07-04 02:33:27', NULL, 1);
INSERT INTO `area` VALUES(9, 1, NULL, 'CANTERAS', '2018-07-04 02:33:27', NULL, 1);
INSERT INTO `area` VALUES(10, 1, NULL, 'PRETILES DIVISORIOS ', '2018-07-04 02:33:27', NULL, 1);
INSERT INTO `area` VALUES(11, 1, NULL, 'GEOMEMBRANAS ', '2018-07-04 02:33:27', NULL, 1);
INSERT INTO `area` VALUES(12, 1, NULL, 'OBRAS CIVILES ', '2018-07-04 02:33:27', NULL, 1);
INSERT INTO `area` VALUES(13, 1, NULL, 'MONTAJES ', '2018-07-04 02:33:27', NULL, 1);
INSERT INTO `area` VALUES(14, 1, NULL, 'RECEPCION FINAL ', '2018-07-04 02:33:27', NULL, 1);
INSERT INTO `area` VALUES(15, 1, NULL, 'PRUEBAS', '2018-07-04 02:33:27', NULL, 1);
INSERT INTO `area` VALUES(16, 1, NULL, 'MANTENCIÓN DE EQUIPOS ', '2018-07-04 02:33:27', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

DROP TABLE IF EXISTS `cargo`;
CREATE TABLE `cargo` (
  `carg_codigo` int(11) NOT NULL,
  `carg_c_especialidad` int(11) DEFAULT NULL,
  `carg_t_relacion_faena` int(11) DEFAULT NULL,
  `carg_sigla` varchar(10) DEFAULT NULL,
  `carg_descripcion` varchar(255) DEFAULT NULL,
  `carg_vigente` int(1) DEFAULT NULL,
  `carg_r_fecha_creacion` datetime DEFAULT NULL,
  `carg_r_fecha_modificacion` datetime DEFAULT NULL,
  `carg_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` VALUES(1, 1, 1, NULL, 'GERENTE DE PROYECTO', 1, '2018-07-10 02:33:27', NULL, 1);
INSERT INTO `cargo` VALUES(2, 1, 1, NULL, 'GERENTE DE CONSTRUCCIÓN', 1, '2018-07-10 02:33:28', NULL, 1);
INSERT INTO `cargo` VALUES(3, 2, 1, NULL, 'GERENTE HSE', 1, '2018-07-10 02:33:29', NULL, 1);
INSERT INTO `cargo` VALUES(4, 2, 1, NULL, 'LÍDER HSE SNGM B', 1, '2018-07-10 02:33:30', NULL, 1);
INSERT INTO `cargo` VALUES(5, 2, 1, NULL, 'LÍDER CONDUCTUAL', 1, '2018-07-10 02:33:31', NULL, 1);
INSERT INTO `cargo` VALUES(6, 2, 1, NULL, 'PREVENCIONISTA SNS', 1, '2018-07-10 02:33:32', NULL, 1);
INSERT INTO `cargo` VALUES(7, 2, 1, NULL, 'LÍDER AMBIENTAL', 1, '2018-07-10 02:33:33', NULL, 1);
INSERT INTO `cargo` VALUES(8, 2, 1, NULL, 'LÍDER ENTRENAMIENTO', 1, '2018-07-10 02:33:34', NULL, 1);
INSERT INTO `cargo` VALUES(9, 3, 1, NULL, 'GERENTE DE ÁREA/ESPECIALIDAD MOVIMIENTO DE TIERRA', 1, '2018-07-10 02:33:35', NULL, 1);
INSERT INTO `cargo` VALUES(10, 3, 1, NULL, 'JEFE DE ÁREA/ESPECIALIDAD MOVIMIENTO DE TIERRA', 1, '2018-07-10 02:33:36', NULL, 1);
INSERT INTO `cargo` VALUES(11, 3, 1, NULL, 'SUPERVISOR DE ÁREA/ESPECIALIDAD MOVIMIENTO DE TIERRA', 1, '2018-07-10 02:33:37', NULL, 1);
INSERT INTO `cargo` VALUES(12, 3, 1, NULL, 'MAESTRO MAYOR MOVIMIENTO DE TIERRA', 1, '2018-07-10 02:33:38', NULL, 1);
INSERT INTO `cargo` VALUES(13, 3, 1, NULL, 'MAESTRO PRIMERA MOVIMIENTO DE TIERRA', 1, '2018-07-10 02:33:39', NULL, 1);
INSERT INTO `cargo` VALUES(14, 3, 1, NULL, 'MAESTRO SEGUNDA MOVIMIENTO DE TIERRA', 1, '2018-07-10 02:33:40', NULL, 1);
INSERT INTO `cargo` VALUES(15, 3, 3, NULL, 'AYUDANTE MOVIMIENTO DE TIERRA', 1, '2018-07-10 02:33:41', NULL, 1);
INSERT INTO `cargo` VALUES(16, 4, 2, NULL, 'GERENTE DE ÁREA/ESPECIALIDAD OO.CC Y ESTRUCTURAS', 1, '2018-07-10 02:33:42', NULL, 1);
INSERT INTO `cargo` VALUES(17, 4, 2, NULL, 'JEFE DE ÁREA/ESPECIALIDAD OO.CC Y ESTRUCTURAS', 1, '2018-07-10 02:33:43', NULL, 1);
INSERT INTO `cargo` VALUES(18, 4, 2, NULL, 'SUPERVISOR DE ÁREA/ESPECIALIDAD OO.CC Y ESTRUCTURAS', 1, '2018-07-10 02:33:44', NULL, 1);
INSERT INTO `cargo` VALUES(19, 4, 2, NULL, 'MAESTRO MAYOR OO.CC Y ESTRUCTURAS', 1, '2018-07-10 02:33:45', NULL, 1);
INSERT INTO `cargo` VALUES(20, 4, 1, NULL, 'MAESTRO PRIMERA OO.CC Y ESTRUCTURAS', 1, '2018-07-10 02:33:46', NULL, 1);
INSERT INTO `cargo` VALUES(21, 4, 1, NULL, 'MAESTRO SEGUNDA OO.CC Y ESTRUCTURAS', 1, '2018-07-10 02:33:47', NULL, 1);
INSERT INTO `cargo` VALUES(22, 4, 3, NULL, 'AYUDANTE OO.CC Y ESTRUCTURAS', 1, '2018-07-10 02:33:48', NULL, 1);
INSERT INTO `cargo` VALUES(23, 5, 2, NULL, 'GERENTE DE ÁREA/ESPECIALIDAD PIPING Y GEO-SINTÉTICOS', 1, '2018-07-10 02:33:49', NULL, 1);
INSERT INTO `cargo` VALUES(24, 5, 2, NULL, 'JEFE DE ÁREA/ESPECIALIDAD PIPING Y GEO-SINTÉTICOS', 1, '2018-07-10 02:33:50', NULL, 1);
INSERT INTO `cargo` VALUES(25, 5, 2, NULL, 'SUPERVISOR DE ÁREA/ESPECIALIDAD PIPING Y GEO-SINTÉTICOS', 1, '2018-07-10 02:33:51', NULL, 1);
INSERT INTO `cargo` VALUES(26, 5, 2, NULL, 'MAESTRO MAYOR PIPING Y GEO-SINTÉTICOS', 1, '2018-07-10 02:33:52', NULL, 1);
INSERT INTO `cargo` VALUES(27, 5, 1, NULL, 'MAESTRO PRIMERA PIPING Y GEO-SINTÉTICOS', 1, '2018-07-10 02:33:53', NULL, 1);
INSERT INTO `cargo` VALUES(28, 5, 1, NULL, 'MAESTRO SEGUNDA PIPING Y GEO-SINTÉTICOS', 1, '2018-07-10 02:33:54', NULL, 1);
INSERT INTO `cargo` VALUES(29, 5, 2, NULL, 'AYUDANTE PIPING Y GEO-SINTÉTICOS', 1, '2018-07-10 02:33:55', NULL, 1);
INSERT INTO `cargo` VALUES(30, 6, 2, NULL, 'GERENTE DE ÁREA/ESPECIALIDAD MINERÍA Y PLANTAS', 1, '2018-07-10 02:33:56', NULL, 1);
INSERT INTO `cargo` VALUES(31, 6, 2, NULL, 'JEFE DE ÁREA/ESPECIALIDAD MINERÍA Y PLANTAS', 1, '2018-07-10 02:33:57', NULL, 1);
INSERT INTO `cargo` VALUES(32, 6, 2, NULL, 'SUPERVISOR DE ÁREA/ESPECIALIDAD MINERÍA Y PLANTAS', 1, '2018-07-10 02:33:58', NULL, 1);
INSERT INTO `cargo` VALUES(33, 6, 2, NULL, 'MAESTRO MAYOR MINERÍA Y PLANTAS', 1, '2018-07-10 02:33:59', NULL, 1);
INSERT INTO `cargo` VALUES(34, 6, 1, NULL, 'MAESTRO PRIMERA MINERÍA Y PLANTAS', 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `cargo` VALUES(35, 6, 1, NULL, 'MAESTRO SEGUNDA MINERÍA Y PLANTAS', 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `cargo` VALUES(36, 6, 3, NULL, 'AYUDANTE MINERÍA Y PLANTAS', 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `cargo` VALUES(37, 7, 2, NULL, 'GERENTE DE ÁREA/ESPECIALIDAD ELECTRICIDAD E INSTRUMENTACIÓN', 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `cargo` VALUES(38, 7, 2, NULL, 'JEFE DE ÁREA/ESPECIALIDAD ELECTRICIDAD E INSTRUMENTACIÓN', 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `cargo` VALUES(39, 7, 2, NULL, 'SUPERVISOR DE ÁREA/ESPECIALIDAD ELECTRICIDAD E INSTRUMENTACIÓN', 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `cargo` VALUES(40, 7, 2, NULL, 'MAESTRO MAYOR ELECTRICIDAD E INSTRUMENTACIÓN', 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `cargo` VALUES(41, 7, 1, NULL, 'MAESTRO PRIMERA ELECTRICIDAD E INSTRUMENTACIÓN', 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `cargo` VALUES(42, 7, 1, NULL, 'MAESTRO SEGUNDA ELECTRICIDAD E INSTRUMENTACIÓN', 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `cargo` VALUES(43, 7, 3, NULL, 'AYUDANTE ELECTRICIDAD E INSTRUMENTACIÓN', 1, '0000-00-00 00:00:00', NULL, 2);
INSERT INTO `cargo` VALUES(44, 8, 2, NULL, 'JEFE DE ÁREA/ESPECIALIDAD MAQUINARIAS', 1, '0000-00-00 00:00:00', NULL, 2);
INSERT INTO `cargo` VALUES(45, 8, 2, NULL, 'SUPERVISOR DE ÁREA/ESPECIALIDAD MAQUINARIAS', 1, '0000-00-00 00:00:00', NULL, 3);
INSERT INTO `cargo` VALUES(46, 8, 2, NULL, 'MAESTRO MAYOR MAQUINARIAS - MECÁNICO MANTENCIÓN', 1, '0000-00-00 00:00:00', NULL, 3);
INSERT INTO `cargo` VALUES(47, 8, 2, NULL, 'MAESTRO PRIMERA MAQUINARIAS - MECÁNICO MANTENCIÓN', 1, '0000-00-00 00:00:00', NULL, 4);
INSERT INTO `cargo` VALUES(48, 8, 1, NULL, 'MAESTRO SEGUNDA MAQUINARIAS - MECÁNICO MANTENCIÓN', 1, '0000-00-00 00:00:00', NULL, 4);
INSERT INTO `cargo` VALUES(49, 8, 3, NULL, 'AYUDANTE MAQUINARIAS - MECÁNICO MANTENCIÓN', 1, '0000-00-00 00:00:00', NULL, 5);
INSERT INTO `cargo` VALUES(50, 9, 2, NULL, 'JEFE ADQUISICIÓN Y BODEGA', 1, '0000-00-00 00:00:00', NULL, 5);
INSERT INTO `cargo` VALUES(51, 9, 2, NULL, 'JEFE BODEGA MAQUINARIAS', 1, '0000-00-00 00:00:00', NULL, 6);
INSERT INTO `cargo` VALUES(52, 9, 2, NULL, 'JEFE DE BODEGA', 1, '0000-00-00 00:00:00', NULL, 6);
INSERT INTO `cargo` VALUES(53, 9, 2, NULL, 'BODEGUERO', 1, '0000-00-00 00:00:00', NULL, 7);
INSERT INTO `cargo` VALUES(54, 9, 1, NULL, 'AYUDANTES PATIO GRÚA', 1, '0000-00-00 00:00:00', NULL, 7);
INSERT INTO `cargo` VALUES(55, 9, 1, NULL, 'PAÑOLERO', 1, '0000-00-00 00:00:00', NULL, 8);
INSERT INTO `cargo` VALUES(56, 10, 1, NULL, 'JEFE RR.LL', 1, '0000-00-00 00:00:00', NULL, 8);
INSERT INTO `cargo` VALUES(57, 10, 2, NULL, 'GERENTE CONTROL DE PROYECTO', 1, '0000-00-00 00:00:00', NULL, 9);
INSERT INTO `cargo` VALUES(58, 10, 2, NULL, 'INTEGRADOR DE PROYECTO', 1, '0000-00-00 00:00:00', NULL, 9);
INSERT INTO `cargo` VALUES(59, 10, 2, NULL, 'SUBGERENTE DE PROYECTO', 1, '0000-00-00 00:00:00', NULL, 10);
INSERT INTO `cargo` VALUES(60, 10, 1, NULL, 'ENCARGADO DE PASAJES', 1, '0000-00-00 00:00:00', NULL, 10);
INSERT INTO `cargo` VALUES(61, 10, 1, NULL, 'SERVICIOS GENERALES', 1, '0000-00-00 00:00:00', NULL, 11);
INSERT INTO `cargo` VALUES(62, 10, 2, NULL, 'AYUDANTE ADMINISTRATIVO', 1, '0000-00-00 00:00:00', NULL, 11);
INSERT INTO `cargo` VALUES(63, 11, 2, NULL, 'TOPÓGRAFO', 1, '0000-00-00 00:00:00', NULL, 12);
INSERT INTO `cargo` VALUES(64, 11, 2, NULL, 'ALARIFE', 1, '0000-00-00 00:00:00', NULL, 12);
INSERT INTO `cargo` VALUES(65, 11, 2, NULL, 'LABORATORISTA DE SUELOS', 1, '0000-00-00 00:00:00', NULL, 13);
INSERT INTO `cargo` VALUES(66, 11, 2, NULL, 'SECRETARIO TÉCNICO', 1, '0000-00-00 00:00:00', NULL, 13);
INSERT INTO `cargo` VALUES(67, 12, 2, NULL, 'INSPECTORES DE CALIDAD', 1, '0000-00-00 00:00:00', NULL, 14);
INSERT INTO `cargo` VALUES(68, 13, 2, NULL, 'EXPEDITOR / ESCOLTA (CONDUCTOR DE VEHÍCULOS)', 1, '0000-00-00 00:00:00', NULL, 14);
INSERT INTO `cargo` VALUES(69, 13, 2, NULL, 'CONDUCTORES DE VEHÍCULOS DE CARRETERA', 1, '0000-00-00 00:00:00', NULL, 15);
INSERT INTO `cargo` VALUES(70, 13, 2, NULL, 'OPERADORES DE EQUIPO MÓVIL', 1, '0000-00-00 00:00:00', NULL, 15);
INSERT INTO `cargo` VALUES(71, 14, 2, NULL, 'VISITA - VENDOR (REVISAR ÁREAS DE EXPOSICIÓN VENDOR CON EMIN)', 1, '0000-00-00 00:00:00', NULL, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo_grupo_sence`
--

DROP TABLE IF EXISTS `cargo_grupo_sence`;
CREATE TABLE `cargo_grupo_sence` (
  `cagrse_c_cargo` int(11) NOT NULL,
  `cagrse_g_grupo_sence` int(11) NOT NULL,
  `cagrse_vigente` int(1) DEFAULT NULL,
  `cagrse_r_fecha_creacion` datetime DEFAULT NULL,
  `cagrse_r_fecha_modificacion` datetime DEFAULT NULL,
  `cagrse_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cargo_grupo_sence`
--

INSERT INTO `cargo_grupo_sence` VALUES(1, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(2, 2, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(3, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(4, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(5, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(6, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(7, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(8, 3, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(9, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(10, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(11, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(12, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(13, 4, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(14, 5, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(15, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(16, 6, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(17, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(18, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(19, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(20, 7, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(21, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(22, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(23, 8, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(24, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(25, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(26, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(27, 9, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(28, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(29, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(30, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(31, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(32, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(33, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(34, 10, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(35, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(36, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(37, 11, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(38, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(39, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(40, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(41, 12, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(42, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(43, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(44, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(45, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(46, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(47, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(48, 13, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(49, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(50, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(51, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(52, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(53, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(54, 14, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(55, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(56, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(57, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(58, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(59, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(60, 15, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(61, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(62, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(63, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(64, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(65, 16, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(66, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(67, 17, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(68, 1, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(69, 18, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(70, 19, 1, '2018-08-01 05:19:52', NULL, 1);
INSERT INTO `cargo_grupo_sence` VALUES(71, 1, 1, '2018-08-01 05:19:52', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comuna`
--

DROP TABLE IF EXISTS `comuna`;
CREATE TABLE `comuna` (
  `comu_codigo` int(11) NOT NULL,
  `comu_nombre` varchar(55) DEFAULT NULL,
  `comu_c_provincia` int(11) DEFAULT NULL,
  `comu_r_fecha_creacion` datetime DEFAULT NULL,
  `comu_r_fecha_modificacion` datetime DEFAULT NULL,
  `comu_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comuna`
--

INSERT INTO `comuna` VALUES(1, 'Iquique', 3, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(2, 'Alto Hospicio', 3, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(3, 'Pozo Almonte', 4, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(4, 'Camiña', 4, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(5, 'Colchane', 4, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(6, 'Huara', 4, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(7, 'Pica', 4, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(8, 'Antofagasta', 5, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(9, 'Mejillones', 5, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(10, 'Sierra Gorda', 5, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(11, 'Taltal', 5, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(12, 'Calama', 6, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(13, 'Ollagüe', 6, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(14, 'San Pedro de Atacama', 6, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(15, 'Tocopilla', 7, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(16, 'María Elena', 7, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(17, 'Copiapó', 8, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(18, 'Caldera', 8, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(19, 'Tierra Amarilla', 8, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(20, 'Chañaral', 9, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(21, 'Diego de Almagro', 9, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(22, 'Vallenar', 10, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(23, 'Alto del Carmen', 10, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(24, 'Freirina', 10, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(25, 'Huasco', 10, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(26, 'La Serena', 11, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(27, 'Coquimbo', 11, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(28, 'Andacollo', 11, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(29, 'La Higuera', 11, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(30, 'Paihuano', 11, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(31, 'Vicuña', 11, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(32, 'Illapel', 12, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(33, 'Canela', 12, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(34, 'Los Vilos', 12, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(35, 'Salamanca', 12, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(36, 'Ovalle', 13, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(37, 'Combarbalá', 13, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(38, 'Monte Patria', 13, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(39, 'Punitaqui', 13, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(40, 'Río Hurtado', 13, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(41, 'Valparaíso', 14, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(42, 'Casablanca', 14, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(43, 'Concón', 14, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(44, 'Juan Fernández', 14, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(45, 'Puchuncaví', 14, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(46, 'Quintero', 14, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(47, 'Viña del Mar', 14, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(48, 'Isla de Pascua', 15, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(49, 'Los Andes', 16, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(50, 'Calle Larga', 16, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(51, 'Rinconada', 16, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(52, 'San Esteban', 16, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(53, 'La Ligua', 17, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(54, 'Cabildo', 17, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(55, 'Papudo', 17, '2018-08-01 04:01:13', NULL, 1);
INSERT INTO `comuna` VALUES(56, 'Petorca', 17, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(57, 'Zapallar', 17, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(58, 'Quillota', 18, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(59, 'La Calera', 18, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(60, 'Hijuelas', 18, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(61, 'La Cruz', 18, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(62, 'Nogales', 18, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(63, 'San Antonio', 19, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(64, 'Algarrobo', 19, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(65, 'Cartagena', 19, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(66, 'El Quisco', 19, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(67, 'El Tabo', 19, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(68, 'Santo Domingo', 19, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(69, 'San Felipe', 20, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(70, 'Catemu', 20, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(71, 'Llay Llay', 20, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(72, 'Panquehue', 20, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(73, 'Putaendo', 20, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(74, 'Santa María', 20, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(75, 'Quilpué', 21, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(76, 'Limache', 21, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(77, 'Olmué', 21, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(78, 'Villa Alemana', 21, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(79, 'Rancagua', 22, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(80, 'Codegua', 22, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(81, 'Coinco', 22, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(82, 'Coltauco', 22, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(83, 'Doñihue', 22, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(84, 'Graneros', 22, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(85, 'Las Cabras', 22, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(86, 'Machalí', 22, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(87, 'Malloa', 22, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(88, 'Mostazal', 22, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(89, 'Olivar', 22, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(90, 'Peumo', 22, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(91, 'Pichidegua', 22, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(92, 'Quinta de Tilcoco', 22, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(93, 'Rengo', 22, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(94, 'Requínoa', 22, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(95, 'San Vicente', 22, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(96, 'Pichilemu', 23, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(97, 'La Estrella', 23, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(98, 'Litueche', 23, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(99, 'Marchihue', 23, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(100, 'Navidad', 23, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(101, 'Paredones', 23, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(102, 'San Fernando', 24, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(103, 'Chépica', 24, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(104, 'Chimbarongo', 24, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(105, 'Lolol', 24, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(106, 'Nancagua', 24, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(107, 'Palmilla', 24, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(108, 'Peralillo', 24, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(109, 'Placilla', 24, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(110, 'Pumanque', 24, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(111, 'Santa Cruz', 24, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(112, 'Talca', 25, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(113, 'Constitución', 25, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(114, 'Curepto', 25, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(115, 'Empedrado', 25, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(116, 'Maule', 25, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(117, 'Pelarco', 25, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(118, 'Pencahue', 25, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(119, 'Río Claro', 25, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(120, 'San Clemente', 25, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(121, 'San Rafael', 25, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(122, 'Cauquenes', 26, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(123, 'Chanco', 26, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(124, 'Pelluhue', 26, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(125, 'Curicó', 27, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(126, 'Hualañé', 27, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(127, 'Licantén', 27, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(128, 'Molina', 27, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(129, 'Rauco', 27, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(130, 'Romeral', 27, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(131, 'Sagrada Familia', 27, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(132, 'Teno', 27, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(133, 'Vichuquén', 27, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(134, 'Linares', 28, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(135, 'Colbún', 28, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(136, 'Longaví', 28, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(137, 'Parral', 28, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(138, 'Retiro', 28, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(139, 'San Javier', 28, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(140, 'Villa Alegre', 28, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(141, 'Yerbas Buenas', 28, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(142, 'Concepción', 29, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(143, 'Coronel', 29, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(144, 'Chiguayante', 29, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(145, 'Florida', 29, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(146, 'Hualqui', 29, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(147, 'Lota', 29, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(148, 'Penco', 29, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(149, 'San Pedro de la Paz', 29, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(150, 'Santa Juana', 29, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(151, 'Talcahuano', 29, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(152, 'Tomé', 29, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(153, 'Hualpén', 29, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(154, 'Lebu', 30, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(155, 'Arauco', 30, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(156, 'Cañete', 30, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(157, 'Contulmo', 30, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(158, 'Curanilahue', 30, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(159, 'Los Álamos', 30, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(160, 'Tirúa', 30, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(161, 'Los Ángeles', 31, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(162, 'Antuco', 31, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(163, 'Cabrero', 31, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(164, 'Laja', 31, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(165, 'Mulchén', 31, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(166, 'Nacimiento', 31, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(167, 'Negrete', 31, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(168, 'Quilaco', 31, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(169, 'Quilleco', 31, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(170, 'San Rosendo', 31, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(171, 'Santa Bárbara', 31, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(172, 'Tucapel', 31, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(173, 'Yumbel', 31, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(174, 'Alto Biobío', 31, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(175, 'Chillán', 32, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(176, 'Bulnes', 32, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(177, 'Cobquecura', 32, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(178, 'Coelemu', 32, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(179, 'Coihueco', 32, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(180, 'Chillán Viejo', 32, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(181, 'El Carmen', 32, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(182, 'Ninhue', 32, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(183, 'Ñiquén', 32, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(184, 'Pemuco', 32, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(185, 'Pinto', 32, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(186, 'Portezuelo', 32, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(187, 'Quillón', 32, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(188, 'Quirihue', 32, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(189, 'Ránquil', 32, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(190, 'San Carlos', 32, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(191, 'San Fabián', 32, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(192, 'San Ignacio', 32, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(193, 'San Nicolás', 32, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(194, 'Treguaco', 32, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(195, 'Yungay', 32, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(196, 'Temuco', 33, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(197, 'Carahue', 33, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(198, 'Cunco', 33, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(199, 'Curarrehue', 33, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(200, 'Freire', 33, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(201, 'Galvarino', 33, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(202, 'Gorbea', 33, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(203, 'Lautaro', 33, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(204, 'Loncoche', 33, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(205, 'Melipeuco', 33, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(206, 'Nueva Imperial', 33, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(207, 'Padre las Casas', 33, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(208, 'Perquenco', 33, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(209, 'Pitrufquén', 33, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(210, 'Pucón', 33, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(211, 'Saavedra', 33, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(212, 'Teodoro Schmidt', 33, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(213, 'Toltén', 33, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(214, 'Vilcún', 33, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(215, 'Villarrica', 33, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(216, 'Cholchol', 33, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(217, 'Angol', 34, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(218, 'Collipulli', 34, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(219, 'Curacautín', 34, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(220, 'Ercilla', 34, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(221, 'Lonquimay', 34, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(222, 'Los Sauces', 34, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(223, 'Lumaco', 34, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(224, 'Purén', 34, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(225, 'Renaico', 34, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(226, 'Traiguén', 34, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(227, 'Victoria', 34, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(228, 'Puerto Montt', 37, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(229, 'Calbuco', 37, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(230, 'Cochamó', 37, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(231, 'Fresia', 37, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(232, 'Frutillar', 37, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(233, 'Los Muermos', 37, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(234, 'Llanquihue', 37, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(235, 'Maullín', 37, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(236, 'Puerto Varas', 37, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(237, 'Castro', 38, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(238, 'Ancud', 38, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(239, 'Chonchi', 38, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(240, 'Curaco de Vélez', 38, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(241, 'Dalcahue', 38, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(242, 'Puqueldón', 38, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(243, 'Queilén', 38, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(244, 'Quellón', 38, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(245, 'Quemchi', 38, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(246, 'Quinchao', 38, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(247, 'Osorno', 39, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(248, 'Puerto Octay', 39, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(249, 'Purranque', 39, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(250, 'Puyehue', 39, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(251, 'Río Negro', 39, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(252, 'San Juan de la Costa', 39, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(253, 'San Pablo', 39, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(254, 'Chaitén', 40, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(255, 'Futaleufú', 40, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(256, 'Hualaihué', 40, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(257, 'Palena', 40, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(258, 'Coyhaique', 41, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(259, 'Lago Verde', 41, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(260, 'Aysén', 42, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(261, 'Cisnes', 42, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(262, 'Guaitecas', 42, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(263, 'Cochrane', 43, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(264, 'O''Higgins', 43, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(265, 'Tortel', 43, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(266, 'Chile Chico', 44, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(267, 'Río Ibáñez', 44, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(268, 'Punta Arenas', 45, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(269, 'Laguna Blanca', 45, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(270, 'Río Verde', 45, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(271, 'San Gregorio', 45, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(272, 'Cabo de Hornos', 46, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(273, 'Antártica', 46, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(274, 'Porvenir', 47, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(275, 'Primavera', 47, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(276, 'Timaukel', 47, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(277, 'Natales', 48, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(278, 'Torres del Paine', 48, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(279, 'Santiago', 49, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(280, 'Cerrillos', 49, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(281, 'Cerro Navia', 49, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(282, 'Conchalí', 49, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(283, 'El Bosque', 49, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(284, 'Estación Central', 49, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(285, 'Huechuraba', 49, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(286, 'Independencia', 49, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(287, 'La Cisterna', 49, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(288, 'La Florida', 49, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(289, 'La Granja', 49, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(290, 'La Pintana', 49, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(291, 'La Reina', 49, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(292, 'Las Condes', 49, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(293, 'Lo Barnechea', 49, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(294, 'Lo Espejo', 49, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(295, 'Lo Prado', 49, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(296, 'Macul', 49, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(297, 'Maipú', 49, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(298, 'Ñuñoa', 49, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(299, 'Pedro Aguirre Cerda', 49, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(300, 'Peñalolén', 49, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(301, 'Providencia', 49, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(302, 'Pudahuel', 49, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(303, 'Quilicura', 49, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(304, 'Quinta Normal', 49, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(305, 'Recoleta', 49, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(306, 'Renca', 49, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(307, 'San Joaquín', 49, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(308, 'San Miguel', 49, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(309, 'San Ramón', 49, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(310, 'Vitacura', 49, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(311, 'Puente Alto', 50, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(312, 'Pirque', 50, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(313, 'San José de Maipo', 50, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(314, 'Colina', 51, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(315, 'Lampa', 51, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(316, 'Tiltil', 51, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(317, 'San Bernardo', 52, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(318, 'Buin', 52, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(319, 'Calera de Tango', 52, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(320, 'Paine', 52, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(321, 'Melipilla', 53, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(322, 'Alhué', 53, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(323, 'Curacaví', 53, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(324, 'María Pinto', 53, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(325, 'San Pedro', 53, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(326, 'Talagante', 54, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(327, 'El Monte', 54, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(328, 'Isla de Maipo', 54, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(329, 'Padre Hurtado', 54, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(330, 'Peñaflor', 54, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(331, 'Valdivia', 35, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(332, 'Corral', 35, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(333, 'Lanco', 35, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(334, 'Los Lagos', 35, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(335, 'Máfil', 35, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(336, 'Mariquina', 35, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(337, 'Paillaco', 35, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(338, 'Panguipulli', 35, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(339, 'La Unión', 36, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(340, 'Futrono', 36, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(341, 'Lago Ranco', 36, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(342, 'Río Bueno', 36, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(343, 'Arica', 1, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(344, 'Camarones', 1, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(345, 'Putre', 2, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `comuna` VALUES(346, 'General Lagos', 2, '2018-08-01 04:01:14', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pregunta`
--

DROP TABLE IF EXISTS `detalle_pregunta`;
CREATE TABLE `detalle_pregunta` (
  `depr_c_pregunta` int(11) NOT NULL,
  `depr_c_opcion_pregunta` int(11) NOT NULL,
  `depr_es_correcta` int(1) DEFAULT NULL,
  `depr_orden` int(2) DEFAULT NULL,
  `depr_vigente` int(1) DEFAULT NULL,
  `depr_r_fecha_creacion` datetime DEFAULT NULL,
  `depr_r_fecha_modificacion` datetime DEFAULT NULL,
  `depr_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_pregunta`
--

INSERT INTO `detalle_pregunta` VALUES(1, 2, 1, 1, 1, '2018-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(1, 3, 0, 2, 1, '2018-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(2, 2, 0, 1, 1, '2018-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(2, 3, 1, 2, 1, '2018-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(3, 2, 0, 1, 1, '2018-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(3, 3, 1, 2, 1, '2018-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(4, 2, 0, 1, 1, '2018-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(4, 3, 1, 2, 1, '2018-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(5, 2, 1, 1, 1, '2018-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(5, 3, 0, 2, 1, '2018-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(6, 2, 1, 1, 1, '2018-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(6, 3, 0, 2, 1, '2018-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(7, 2, 0, 1, 1, '2018-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(7, 3, 1, 2, 1, '2018-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(8, 2, 1, 1, 1, '2018-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(8, 3, 0, 2, 1, '2018-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(9, 2, 1, 1, 1, '2018-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(9, 3, 0, 2, 1, '2018-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(10, 2, 1, 1, 1, '2018-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(10, 3, 0, 2, 1, '2018-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(11, 2, 0, 1, 1, '2018-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(11, 3, 1, 2, 1, '2018-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(12, 2, 1, 1, 1, '2018-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(12, 3, 0, 2, 1, '2018-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(13, 2, 0, 1, 1, '2018-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(13, 3, 1, 2, 1, '2018-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(14, 2, 1, 1, 1, '2018-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(14, 3, 0, 2, 1, '2018-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(15, 2, 1, 1, 1, '2018-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(15, 3, 0, 2, 1, '2018-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(16, 2, 0, 1, 1, '2018-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(16, 3, 1, 2, 1, '2018-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(17, 2, 1, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(17, 3, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(18, 2, 1, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(18, 3, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(19, 2, 1, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(19, 3, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(20, 2, 0, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(20, 3, 1, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(21, 2, 1, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(21, 3, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(22, 2, 0, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(22, 3, 1, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(23, 2, 1, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(23, 3, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(24, 2, 1, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(24, 3, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(25, 2, 1, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(25, 3, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(26, 2, 1, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(26, 3, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(27, 2, 1, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(27, 3, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(28, 2, 1, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(28, 3, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(29, 2, 0, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(29, 3, 1, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(30, 2, 0, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(30, 3, 1, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(31, 2, 0, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(31, 3, 1, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(32, 2, 1, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(32, 3, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(33, 2, 0, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(33, 3, 1, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(34, 2, 1, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(34, 3, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(35, 4, 0, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(35, 5, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(35, 6, 0, 3, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(35, 7, 1, 4, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(36, 8, 0, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(36, 9, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(36, 10, 0, 3, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(36, 11, 1, 4, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(37, 12, 0, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(37, 13, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(37, 14, 0, 3, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(37, 15, 1, 4, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(38, 16, 0, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(38, 17, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(38, 18, 0, 3, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(38, 19, 1, 4, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(39, 20, 0, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(39, 21, 1, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(39, 22, 0, 3, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(39, 23, 0, 4, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(40, 24, 0, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(40, 25, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(40, 26, 0, 3, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(40, 27, 1, 4, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(41, 2, 1, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(41, 3, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(42, 2, 0, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(42, 3, 1, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(43, 2, 1, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(43, 3, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(44, 2, 1, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(44, 3, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(45, 2, 0, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(45, 3, 1, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(46, 2, 0, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(46, 3, 1, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(47, 2, 1, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(47, 3, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(48, 2, 0, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(48, 3, 1, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(49, 2, 1, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(49, 3, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(50, 2, 1, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(50, 3, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(51, 2, 0, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(51, 3, 1, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(52, 2, 1, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(52, 3, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(53, 2, 1, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(53, 3, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(54, 2, 0, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(54, 3, 1, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(55, 2, 1, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(55, 3, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(56, 2, 1, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(56, 3, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(57, 2, 0, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(57, 3, 1, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(58, 2, 1, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(58, 3, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(59, 2, 0, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(59, 3, 1, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(60, 2, 0, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(60, 3, 1, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(61, 2, 1, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(61, 3, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(62, 2, 0, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(62, 3, 1, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(63, 2, 1, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(63, 3, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(64, 2, 1, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(64, 3, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(65, 2, 1, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(65, 3, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(66, 2, 1, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(66, 3, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(67, 28, 0, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(67, 29, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(67, 30, 1, 3, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(67, 31, 0, 4, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(68, 32, 0, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(68, 33, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(68, 34, 1, 3, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(68, 35, 0, 4, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(69, 36, 1, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(69, 37, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(69, 38, 0, 3, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(69, 39, 0, 4, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(70, 40, 0, 1, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(70, 41, 0, 2, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(70, 42, 1, 3, 1, '2019-07-04 10:04:00', NULL, 1);
INSERT INTO `detalle_pregunta` VALUES(70, 43, 0, 4, 1, '2019-07-04 10:04:00', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dictacion`
--

DROP TABLE IF EXISTS `dictacion`;
CREATE TABLE `dictacion` (
  `dict_c_actividad` int(11) NOT NULL,
  `dict_numero` int(11) NOT NULL,
  `dict_fecha_inicio` varchar(20) DEFAULT NULL,
  `dict_fecha_termino` varchar(20) DEFAULT NULL,
  `dict_e_dictacion` int(11) DEFAULT NULL,
  `dict_c_resolucion` int(11) DEFAULT NULL,
  `dict_t_certificado` int(11) DEFAULT NULL,
  `dict_certificado_participacion` int(1) DEFAULT NULL,
  `dict_t_calificacion` int(11) DEFAULT NULL,
  `dict_asistencia_minima` int(3) DEFAULT NULL,
  `dict_nota_minima` int(3) DEFAULT NULL,
  `dict_cobertura` varchar(1) DEFAULT NULL,
  `dict_valor` varchar(10) DEFAULT NULL,
  `dict_t_moneda` int(11) DEFAULT NULL,
  `dict_c_comuna` int(11) DEFAULT NULL,
  `dict_direccion` varchar(10) DEFAULT NULL,
  `dict_telefono` varchar(10) DEFAULT NULL,
  `dict_fax` varchar(10) DEFAULT NULL,
  `dict_email` varchar(19) DEFAULT NULL,
  `dict_cupo` int(2) DEFAULT NULL,
  `dict_t_evaluacion` int(11) DEFAULT NULL,
  `dict_t_capacitacion` int(11) DEFAULT NULL,
  `dict_observacion` varchar(255) DEFAULT NULL,
  `dict_vigente` int(1) DEFAULT NULL,
  `dict_r_fecha_creacion` datetime DEFAULT NULL,
  `dict_r_fecha_modificacion` datetime DEFAULT NULL,
  `dict_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `dictacion`
--

INSERT INTO `dictacion` VALUES(4, 1, '2018-09-05 08:00:00', '2018-09-05 09:00:00', 4, NULL, 6, 1, 1, 100, 7, 'A', NULL, NULL, NULL, NULL, NULL, NULL, 'dictacion1@email.cl', 20, 2, NULL, NULL, 1, '2018-08-09 13:04:48', NULL, 1);
INSERT INTO `dictacion` VALUES(4, 2, '2018-09-05 10:00:00', '2018-09-05 11:00:00', 4, NULL, 6, 1, 1, 100, 7, 'A', NULL, NULL, NULL, NULL, NULL, NULL, 'dictacion2@email.cl', 20, 2, NULL, NULL, 1, '2018-08-09 13:04:48', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

DROP TABLE IF EXISTS `direccion`;
CREATE TABLE `direccion` (
  `dire_c_persona` int(11) NOT NULL,
  `dire_t_direccion` int(11) NOT NULL,
  `dire_c_comuna` int(11) DEFAULT NULL,
  `dire_c_pais` int(11) DEFAULT NULL,
  `dire_detalle` varchar(255) DEFAULT NULL,
  `dire_codigo_postal` varchar(10) DEFAULT NULL,
  `dire_telefono` varchar(15) DEFAULT NULL,
  `dire_r_fecha_creacion` datetime DEFAULT NULL,
  `dire_r_fecha_modificacion` datetime DEFAULT NULL,
  `dire_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` VALUES(1, 1, NULL, 46, 'VALPARAISO', NULL, NULL, '2018-07-10 02:33:27', NULL, 1);
INSERT INTO `direccion` VALUES(2, 1, NULL, 46, 'LAS CONDES', NULL, NULL, '2018-07-10 02:33:27', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escolaridad`
--

DROP TABLE IF EXISTS `escolaridad`;
CREATE TABLE `escolaridad` (
  `esco_codigo` int(11) NOT NULL,
  `esco_descripcion` varchar(255) DEFAULT NULL,
  `esco_vigente` int(1) DEFAULT NULL,
  `esco_r_fecha_creacion` datetime DEFAULT NULL,
  `esco_r_fecha_modificacion` datetime DEFAULT NULL,
  `esco_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `escolaridad`
--

INSERT INTO `escolaridad` VALUES(1, 'SIN INFORMACIÓN', 1, '2018-08-01 03:33:53', NULL, 1);
INSERT INTO `escolaridad` VALUES(2, 'SIN ESTUDIOS FORMALES', 1, '2018-08-01 03:33:53', NULL, 1);
INSERT INTO `escolaridad` VALUES(3, 'BÁSICA INCOMPLETA', 1, '2018-08-01 03:33:53', NULL, 1);
INSERT INTO `escolaridad` VALUES(4, 'BÁSICA COMPLETA', 1, '2018-08-01 03:33:53', NULL, 1);
INSERT INTO `escolaridad` VALUES(5, 'MEDIA INCOMPLETA', 1, '2018-08-01 03:33:53', NULL, 1);
INSERT INTO `escolaridad` VALUES(6, 'MEDIA COMPLETA', 1, '2018-08-01 03:33:53', NULL, 1);
INSERT INTO `escolaridad` VALUES(7, 'TÉCNICO PROFESIONAL INCOMPLETA', 1, '2018-08-01 03:33:53', NULL, 1);
INSERT INTO `escolaridad` VALUES(8, 'TÉCNICO PROFESIONAL COMPLETA', 1, '2018-08-01 03:33:53', NULL, 1);
INSERT INTO `escolaridad` VALUES(9, 'UNIVERSITARIA INCOMPLETA', 1, '2018-08-01 03:33:53', NULL, 1);
INSERT INTO `escolaridad` VALUES(10, 'UNIVERSITARIA COMPLETA', 1, '2018-08-01 03:33:53', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

DROP TABLE IF EXISTS `especialidad`;
CREATE TABLE `especialidad` (
  `espe_codigo` int(11) NOT NULL,
  `espe_c_institucion` int(11) DEFAULT NULL,
  `espe_sigla` varchar(15) DEFAULT NULL,
  `espe_descripcion` varchar(255) DEFAULT NULL,
  `espe_vigente` int(1) DEFAULT NULL,
  `espe_r_fecha_creacion` datetime DEFAULT NULL,
  `espe_r_fecha_modificacion` datetime DEFAULT NULL,
  `espe_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` VALUES(1, 1, 'ADM', 'ADMINISTRATIVO', 1, '2018-07-04 02:33:27', NULL, 1);
INSERT INTO `especialidad` VALUES(2, 1, 'BOD', 'BODEGA', 1, '2018-07-04 02:33:27', NULL, 1);
INSERT INTO `especialidad` VALUES(3, 1, 'ELIN', 'ELECTRICIDAD E INSTRUMENTACIÓN', 1, '2018-07-04 02:33:27', NULL, 1);
INSERT INTO `especialidad` VALUES(4, 1, 'GER', 'GERENCIA', 1, '2018-07-04 02:33:27', NULL, 1);
INSERT INTO `especialidad` VALUES(5, 1, 'HSE', 'HSE', 1, '2018-07-04 02:33:27', NULL, 1);
INSERT INTO `especialidad` VALUES(6, 1, 'MAQ', 'MAQUINARIAS', 1, '2018-07-04 02:33:27', NULL, 1);
INSERT INTO `especialidad` VALUES(7, 1, 'MYP', 'MINERÍA Y PLANTAS', 1, '2018-07-04 02:33:27', NULL, 1);
INSERT INTO `especialidad` VALUES(8, 1, 'MDT', 'MOVIMIENTO DE TIERRA', 1, '2018-07-04 02:33:27', NULL, 1);
INSERT INTO `especialidad` VALUES(9, 1, 'OCYE', 'OO.CC Y ESTRUCTURAS', 1, '2018-07-04 02:33:27', NULL, 1);
INSERT INTO `especialidad` VALUES(10, 1, 'PYGS', 'PIPING Y GEO-SINTÉTICOS', 1, '2018-07-04 02:33:27', NULL, 1);
INSERT INTO `especialidad` VALUES(11, 1, 'QAQC', 'QA-QC', 1, '2018-07-04 02:33:27', NULL, 1);
INSERT INTO `especialidad` VALUES(12, 1, 'TYLS', 'TOPOGRAFÍA Y LABORATORIO SUELOS', 1, '2018-07-04 02:33:27', NULL, 1);
INSERT INTO `especialidad` VALUES(13, 1, 'VYEM', 'VEHÍCULOS Y EQUIPOS MÓVILES', 1, '2018-07-04 02:33:27', NULL, 1);
INSERT INTO `especialidad` VALUES(14, 1, 'VEND', 'VENDOR', 1, '2018-07-04 02:33:27', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_civil`
--

DROP TABLE IF EXISTS `estado_civil`;
CREATE TABLE `estado_civil` (
  `esci_codigo` int(11) NOT NULL,
  `esci_descripcion` varchar(255) DEFAULT NULL,
  `esci_r_fecha_creacion` datetime DEFAULT NULL,
  `esci_r_fecha_modificacion` datetime DEFAULT NULL,
  `esci_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado_civil`
--

INSERT INTO `estado_civil` VALUES(1, 'SIN INFORMACIÓN', '2018-08-01 03:39:05', NULL, 1);
INSERT INTO `estado_civil` VALUES(2, 'CASADO(A)', '2018-08-01 03:39:05', NULL, 1);
INSERT INTO `estado_civil` VALUES(3, 'SOLTERO(A)', '2018-08-01 03:39:05', NULL, 1);
INSERT INTO `estado_civil` VALUES(4, 'VIUDO(A)', '2018-08-01 03:39:05', NULL, 1);
INSERT INTO `estado_civil` VALUES(5, 'SEPARADO(A)', '2018-08-01 03:39:05', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion`
--

DROP TABLE IF EXISTS `evaluacion`;
CREATE TABLE `evaluacion` (
  `eval_codigo` int(11) NOT NULL,
  `eval_t_evaluacion` int(11) DEFAULT NULL,
  `eval_titulo` varchar(255) DEFAULT NULL,
  `eval_descripcion` varchar(255) DEFAULT NULL,
  `eval_vigente` int(1) DEFAULT NULL,
  `eval_r_fecha_creacion` datetime DEFAULT NULL,
  `eval_r_fecha_modificacion` datetime DEFAULT NULL,
  `eval_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `evaluacion`
--

INSERT INTO `evaluacion` VALUES(1, 6, 'ENCUESTA 1', 'ENCUESTA SATISFACCIÓN DE PARTICIPANTES', 1, '2018-08-02 05:33:08', NULL, 1);
INSERT INTO `evaluacion` VALUES(2, 2, 'EVALUACIÓN TEÒRICA IMPACTO VEHÍCULO PERSONA EQUIPO', 'EVALUACIÓN TEÒRICA IMPACTO VEHÍCULO PERSONA EQUIPO', 1, '2018-08-10 03:20:03', NULL, 1);
INSERT INTO `evaluacion` VALUES(3, 3, 'EVALUACIÓN PRÁCTICA IMPACTO VEHÍCULO PERSONA EQUIPO', 'EVALUACIÓN PRÁCTICA IMPACTO VEHÍCULO PERSONA EQUIPO', 1, '2018-08-16 02:27:52', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_aplicada`
--

DROP TABLE IF EXISTS `evaluacion_aplicada`;
CREATE TABLE `evaluacion_aplicada` (
  `evap_c_actividad` int(11) NOT NULL,
  `evap_numero_dictacion` int(11) NOT NULL,
  `evap_c_evaluacion` int(11) NOT NULL,
  `evap_numero_evaluacion` int(11) NOT NULL,
  `evap_titulo` varchar(255) NOT NULL,
  `evap_descripcion` varchar(255) NOT NULL,
  `evap_orden` int(11) DEFAULT NULL,
  `evap_e_evaluacion_aplicada` int(11) DEFAULT NULL,
  `evap_t_evaluacion_aplicada` int(11) DEFAULT NULL,
  `evap_vigente` int(1) DEFAULT NULL,
  `evap_r_fecha_creacion` datetime DEFAULT NULL,
  `evap_r_fecha_modificacion` datetime DEFAULT NULL,
  `evap_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `evaluacion_aplicada`
--

INSERT INTO `evaluacion_aplicada` VALUES(4, 1, 2, 1, 'QUE SE QUE RECUERDO', 'EVALUACION DIAGNÓSTICA', 1, 1, 2, 1, '2001-08-18 05:19:00', NULL, 1);
INSERT INTO `evaluacion_aplicada` VALUES(4, 1, 2, 2, 'QUE APRENDÍ?', 'EVALUACIÓN FINAL', 2, 1, 3, 1, '2001-08-18 05:19:00', NULL, 1);
INSERT INTO `evaluacion_aplicada` VALUES(4, 1, 2, 3, 'QUE APRENDÍ? 2DA OPORTUNIDAD', 'EVALUACIÓN FINAL SEGUNDA OPORTUNIDAD', 3, 1, 4, 1, '2001-08-18 05:19:00', NULL, 1);
INSERT INTO `evaluacion_aplicada` VALUES(4, 1, 3, 2, 'QUE APRENDÍ?', 'EVALUACIÓN FINAL', 3, 1, 3, 1, '2001-08-18 05:19:00', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_marcador`
--

DROP TABLE IF EXISTS `evaluacion_marcador`;
CREATE TABLE `evaluacion_marcador` (
  `evma_c_evaluacion` int(11) NOT NULL,
  `evma_c_marcador` int(11) NOT NULL,
  `evma_vigente` int(1) DEFAULT NULL,
  `evma_r_fecha_creacion` datetime DEFAULT NULL,
  `evma_r_fecha_modificacion` datetime DEFAULT NULL,
  `evma_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_pregunta`
--

DROP TABLE IF EXISTS `evaluacion_pregunta`;
CREATE TABLE `evaluacion_pregunta` (
  `evpr_codigo` int(11) NOT NULL,
  `evpr_c_evaluacion` int(11) NOT NULL,
  `evpr_c_pregunta` int(11) NOT NULL,
  `evpr_c_objetivo` int(11) NOT NULL,
  `evpr_c_seccion` int(11) NOT NULL,
  `evpr_orden` int(1) DEFAULT NULL,
  `evpr_r_fecha_creacion` datetime DEFAULT NULL,
  `evpr_r_fecha_modificacion` datetime DEFAULT NULL,
  `evpr_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `evaluacion_pregunta`
--

INSERT INTO `evaluacion_pregunta` VALUES(1, 2, 1, 4, 1, 1, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(2, 2, 2, 4, 1, 2, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(3, 2, 3, 4, 1, 3, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(4, 2, 4, 4, 1, 4, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(5, 2, 5, 4, 1, 5, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(6, 2, 6, 4, 1, 6, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(7, 2, 7, 4, 1, 7, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(8, 2, 8, 4, 1, 8, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(9, 2, 9, 4, 1, 9, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(10, 2, 10, 4, 1, 10, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(11, 2, 11, 4, 1, 11, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(12, 2, 12, 4, 1, 12, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(13, 2, 13, 4, 1, 13, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(14, 2, 14, 4, 1, 14, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(15, 2, 15, 4, 1, 15, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(16, 2, 16, 4, 1, 16, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(17, 2, 17, 5, 1, 17, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(18, 2, 18, 5, 1, 18, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(19, 2, 19, 5, 1, 19, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(20, 2, 20, 5, 1, 20, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(21, 2, 21, 5, 1, 21, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(22, 2, 22, 5, 1, 22, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(23, 2, 23, 5, 1, 23, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(24, 2, 24, 5, 1, 24, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(25, 2, 25, 5, 1, 25, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(26, 2, 26, 5, 1, 26, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(27, 2, 27, 5, 1, 27, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(28, 2, 28, 5, 1, 28, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(29, 2, 29, 5, 1, 29, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(30, 2, 30, 5, 1, 30, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(31, 2, 31, 5, 1, 31, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(32, 2, 32, 5, 1, 32, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(33, 2, 33, 5, 1, 33, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(34, 2, 34, 5, 1, 34, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(35, 2, 35, 5, 1, 35, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(36, 2, 36, 5, 1, 36, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(37, 2, 37, 5, 1, 37, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(38, 2, 38, 5, 1, 38, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(39, 2, 39, 5, 1, 39, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(40, 2, 40, 5, 1, 40, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(41, 2, 41, 6, 1, 41, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(42, 2, 42, 6, 1, 42, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(43, 2, 43, 6, 1, 43, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(44, 2, 44, 6, 1, 44, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(45, 2, 45, 6, 1, 45, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(46, 2, 46, 6, 1, 46, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(47, 2, 47, 6, 1, 47, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(48, 2, 48, 6, 1, 48, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(49, 2, 49, 6, 1, 49, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(50, 2, 50, 6, 1, 50, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(51, 2, 51, 6, 1, 51, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(52, 2, 52, 6, 1, 52, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(53, 2, 53, 6, 1, 53, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(54, 2, 54, 6, 1, 54, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(55, 2, 55, 6, 1, 55, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(56, 2, 56, 6, 1, 56, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(57, 2, 57, 6, 1, 57, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(58, 2, 58, 6, 1, 58, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(59, 2, 59, 6, 1, 59, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(60, 2, 60, 6, 1, 60, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(61, 2, 61, 6, 1, 61, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(62, 2, 62, 6, 1, 62, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(63, 2, 63, 6, 1, 63, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(64, 2, 64, 6, 1, 64, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(65, 2, 65, 6, 1, 65, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(66, 2, 66, 6, 1, 66, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(67, 2, 67, 6, 1, 67, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(68, 2, 68, 6, 1, 68, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(69, 2, 69, 6, 1, 69, '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `evaluacion_pregunta` VALUES(70, 2, 70, 6, 1, 70, '2010-08-18 01:16:00', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `e_actividad`
--

DROP TABLE IF EXISTS `e_actividad`;
CREATE TABLE `e_actividad` (
  `eac_estado` int(11) NOT NULL,
  `eac_descripcion` varchar(255) DEFAULT NULL,
  `eac_r_fecha_creacion` datetime DEFAULT NULL,
  `eac_r_fecha_modificacion` datetime DEFAULT NULL,
  `eac_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `e_actividad`
--

INSERT INTO `e_actividad` VALUES(1, 'SOLICITADA', '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `e_actividad` VALUES(2, 'ACEPTADA', '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `e_actividad` VALUES(3, 'RECHAZADA', '2018-08-01 05:19:53', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `e_dictacion`
--

DROP TABLE IF EXISTS `e_dictacion`;
CREATE TABLE `e_dictacion` (
  `edi_estado` int(11) NOT NULL,
  `edi_descripcion` varchar(255) DEFAULT NULL,
  `edi_r_fecha_creacion` datetime DEFAULT NULL,
  `edi_r_fecha_modificacion` datetime DEFAULT NULL,
  `edi_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `e_dictacion`
--

INSERT INTO `e_dictacion` VALUES(1, 'SOLICITADA', '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `e_dictacion` VALUES(2, 'ACEPTADA', '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `e_dictacion` VALUES(3, 'RECHAZADA', '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `e_dictacion` VALUES(4, 'EN CURSO', '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `e_dictacion` VALUES(5, 'CERRADA EN UA', '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `e_dictacion` VALUES(6, 'FINALIZADA', '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `e_dictacion` VALUES(7, 'ANULADA', '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `e_dictacion` VALUES(8, 'EN INGRESO', '2018-08-01 05:19:53', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `e_evaluacion_aplicada`
--

DROP TABLE IF EXISTS `e_evaluacion_aplicada`;
CREATE TABLE `e_evaluacion_aplicada` (
  `eeva_estado` int(11) NOT NULL,
  `eeva_descripcion` varchar(255) DEFAULT NULL,
  `eeva_vigente` int(1) DEFAULT NULL,
  `eeva_r_fecha_creacion` datetime DEFAULT NULL,
  `eeva_r_fecha_modificacion` datetime DEFAULT NULL,
  `eeva_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `e_evaluacion_aplicada`
--

INSERT INTO `e_evaluacion_aplicada` VALUES(1, 'ESTADO EVALUACION APLICADA', NULL, '2018-08-10 03:25:34', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `e_finalizacion`
--

DROP TABLE IF EXISTS `e_finalizacion`;
CREATE TABLE `e_finalizacion` (
  `efin_estado` int(11) NOT NULL,
  `efin_t_calificacion` int(11) DEFAULT NULL,
  `efin_resultado` varchar(1) DEFAULT NULL,
  `efin_descripcion` varchar(255) DEFAULT NULL,
  `efin_cota_inferior` int(2) DEFAULT NULL,
  `efin_cota_superior` varchar(3) DEFAULT NULL,
  `efin_r_fecha_creacion` datetime DEFAULT NULL,
  `efin_r_fecha_modificacion` datetime DEFAULT NULL,
  `efin_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `e_finalizacion`
--

INSERT INTO `e_finalizacion` VALUES(1, 1, 'A', 'Aprobado', 4, '7', '2018-08-02 14:56:00', NULL, 1);
INSERT INTO `e_finalizacion` VALUES(2, 1, 'R', 'Reprobado', 1, '3,9', '2018-08-02 14:56:00', NULL, 1);
INSERT INTO `e_finalizacion` VALUES(3, 3, 'R', 'Reprobado', NULL, NULL, '2018-08-02 14:56:00', NULL, 1);
INSERT INTO `e_finalizacion` VALUES(6, 3, 'A', 'Distinguido', NULL, NULL, '2018-08-02 14:56:00', NULL, 1);
INSERT INTO `e_finalizacion` VALUES(7, 2, 'A', 'Aprobado', 51, '100', '2018-08-02 14:56:00', NULL, 1);
INSERT INTO `e_finalizacion` VALUES(8, 2, 'R', 'Reprobado', 0, '50', '2018-08-02 14:56:00', NULL, 1);
INSERT INTO `e_finalizacion` VALUES(11, 3, 'A', 'Aprobado', NULL, NULL, '2018-08-02 14:56:00', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `e_inscripcion`
--

DROP TABLE IF EXISTS `e_inscripcion`;
CREATE TABLE `e_inscripcion` (
  `eins_estado` int(11) NOT NULL,
  `eins_descripcion` varchar(255) DEFAULT NULL,
  `eins_r_fecha_creacion` datetime DEFAULT NULL,
  `eins_r_fecha_modificacion` datetime DEFAULT NULL,
  `eins_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `e_inscripcion`
--

INSERT INTO `e_inscripcion` VALUES(1, 'VÁLIDA', '2018-08-02 14:55:59', NULL, 1);
INSERT INTO `e_inscripcion` VALUES(2, 'RETIRO', '2018-08-02 14:55:59', NULL, 1);
INSERT INTO `e_inscripcion` VALUES(3, 'ANULADA', '2018-08-02 14:55:59', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `e_inscripcion_evaluacion_aplicada`
--

DROP TABLE IF EXISTS `e_inscripcion_evaluacion_aplicada`;
CREATE TABLE `e_inscripcion_evaluacion_aplicada` (
  `eiea_estado` int(11) NOT NULL,
  `eiea_descripcion` varchar(255) DEFAULT NULL,
  `eiea_r_fecha_creacion` datetime DEFAULT NULL,
  `eiea_r_fecha_modificacion` datetime DEFAULT NULL,
  `eiea_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `e_inscripcion_evaluacion_aplicada`
--

INSERT INTO `e_inscripcion_evaluacion_aplicada` VALUES(1, 'ESTADO INSCRIPCION EVALUACIÓN APLICADA', '2018-08-10 04:51:59', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `e_respuesta_aplicada`
--

DROP TABLE IF EXISTS `e_respuesta_aplicada`;
CREATE TABLE `e_respuesta_aplicada` (
  `erea_estado` int(11) NOT NULL,
  `erea_descripcion` varchar(255) DEFAULT NULL,
  `erea_r_fecha_creacion` datetime DEFAULT NULL,
  `erea_r_fecha_modificacion` datetime DEFAULT NULL,
  `erea_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `e_respuesta_aplicada`
--

INSERT INTO `e_respuesta_aplicada` VALUES(1, 'INICIADA', '2018-08-10 05:45:25', NULL, 1);
INSERT INTO `e_respuesta_aplicada` VALUES(2, 'RESPONDIDA', '2018-08-10 05:46:07', NULL, 1);
INSERT INTO `e_respuesta_aplicada` VALUES(3, 'MODIFICADA', '2018-08-10 05:46:07', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facilitador`
--

DROP TABLE IF EXISTS `facilitador`;
CREATE TABLE `facilitador` (
  `faci_c_actividad` int(11) NOT NULL,
  `faci_numero_dictacion` int(11) NOT NULL,
  `faci_c_persona` int(11) NOT NULL,
  `faci_r_fecha_creacion` datetime DEFAULT NULL,
  `faci_r_fecha_modificacion` datetime DEFAULT NULL,
  `faci_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `facilitador`
--

INSERT INTO `facilitador` VALUES(4, 1, 3, '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `facilitador` VALUES(4, 2, 3, '2018-08-01 05:19:53', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gerencia`
--

DROP TABLE IF EXISTS `gerencia`;
CREATE TABLE `gerencia` (
  `gere_codigo` int(11) NOT NULL,
  `gere_c_institucion` int(11) DEFAULT NULL,
  `gere_sigla` varchar(10) DEFAULT NULL,
  `gere_descripcion` varchar(255) DEFAULT NULL,
  `gere_r_fecha_creacion` datetime DEFAULT NULL,
  `gere_r_fecha_modificacion` datetime DEFAULT NULL,
  `gere_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `gerencia`
--

INSERT INTO `gerencia` VALUES(1, 1, NULL, 'GENERAL', '2018-07-04 02:33:27', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_sence`
--

DROP TABLE IF EXISTS `grupo_sence`;
CREATE TABLE `grupo_sence` (
  `grse_grupo` int(11) NOT NULL,
  `grse_codigo_sence` varchar(25) DEFAULT NULL,
  `grse_nombre_grupo` varchar(255) DEFAULT NULL,
  `grse_vigente` int(1) DEFAULT NULL,
  `cagrse_r_fecha_creacion` datetime DEFAULT NULL,
  `cagrse_r_fecha_modificacion` datetime DEFAULT NULL,
  `cagrse_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grupo_sence`
--

INSERT INTO `grupo_sence` VALUES(1, '123', 'GERENCIA GENERAL', 1, '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `grupo_sence` VALUES(2, '246', 'GERENTES', 1, '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `grupo_sence` VALUES(3, '369', 'HSE', 1, '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `grupo_sence` VALUES(4, '492', 'VENDOR - VISITAS', 1, '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `grupo_sence` VALUES(5, '615', 'SUPERVISIÓN MOVIMIENTO DE TIERRA', 1, '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `grupo_sence` VALUES(6, '738', 'MAESTROS Y AYUDANTE MOVIMIENTO DE TIERRA', 1, '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `grupo_sence` VALUES(7, '861', 'SUPERVISIÓN OO.CC Y ESTRUCTURAS', 1, '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `grupo_sence` VALUES(8, '984', 'MAESTROS Y AYUDANTE OO.CC Y ESTRUCTURAS', 1, '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `grupo_sence` VALUES(9, '1107', 'PIPING Y GEO-SINTÉTICOS', 1, '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `grupo_sence` VALUES(10, '1230', 'SUPERVISIÓN MINERÍA Y PLANTAS', 1, '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `grupo_sence` VALUES(11, '1353', 'MAESTROS Y AYUDANTES MINERÍA Y PLANTAS', 1, '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `grupo_sence` VALUES(12, '1476', 'ELECTRICIDAD E INSTRUMENTACIÓN', 1, '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `grupo_sence` VALUES(13, '1599', 'MAQUINARIAS', 1, '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `grupo_sence` VALUES(14, '1722', 'BODEGA', 1, '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `grupo_sence` VALUES(15, '1845', 'ADMINISTRATIVO', 1, '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `grupo_sence` VALUES(16, '1968', 'TOPOGRAFÍA', 1, '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `grupo_sence` VALUES(17, '2091', 'LABORATORIO SUELOS', 1, '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `grupo_sence` VALUES(18, '2214', 'QA-QC', 1, '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `grupo_sence` VALUES(19, '2337', 'VEHÍCULOS Y EQUIPOS MÓVILES', 1, '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `grupo_sence` VALUES(20, '2460', 'EQUIPOS MÓVILES E IZAJE', 1, '2018-08-01 05:19:53', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

DROP TABLE IF EXISTS `inscripcion`;
CREATE TABLE `inscripcion` (
  `insc_c_actividad` int(11) NOT NULL,
  `insc_numero_dictacion` int(11) NOT NULL,
  `insc_c_trabajador` int(11) NOT NULL,
  `insc_e_inscripcion` int(11) DEFAULT NULL,
  `insc_e_finalizacion` int(11) DEFAULT NULL,
  `insc_grupo` int(11) DEFAULT NULL,
  `insc_asistencia` int(3) DEFAULT NULL,
  `insc_nota` varchar(10) DEFAULT NULL,
  `insc_resultado` varchar(10) DEFAULT NULL,
  `insc_r_fecha_creacion` datetime DEFAULT NULL,
  `insc_r_fecha_modificacion` datetime DEFAULT NULL,
  `insc_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` VALUES(4, 1, 44, 1, NULL, 1, NULL, NULL, NULL, '2018-08-07 23:11:24', NULL, 1);
INSERT INTO `inscripcion` VALUES(4, 1, 45, 1, NULL, 1, NULL, NULL, NULL, '2018-08-07 23:11:24', NULL, 1);
INSERT INTO `inscripcion` VALUES(4, 1, 46, 1, NULL, 1, NULL, NULL, NULL, '2018-08-07 23:11:24', NULL, 1);
INSERT INTO `inscripcion` VALUES(4, 2, 47, 1, NULL, 1, NULL, NULL, NULL, '2018-08-07 23:11:24', NULL, 1);
INSERT INTO `inscripcion` VALUES(4, 2, 48, 1, NULL, 1, NULL, NULL, NULL, '2018-08-07 23:11:24', NULL, 1);
INSERT INTO `inscripcion` VALUES(4, 2, 49, 1, NULL, 1, NULL, NULL, NULL, '2018-08-07 23:11:24', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion_evaluacion_aplicada`
--

DROP TABLE IF EXISTS `inscripcion_evaluacion_aplicada`;
CREATE TABLE `inscripcion_evaluacion_aplicada` (
  `inevap_c_actividad` int(11) NOT NULL,
  `inevap_numero_dictacion` int(11) NOT NULL,
  `inevap_c_evaluacion` int(11) NOT NULL,
  `inevap_numero_evaluacion` int(11) NOT NULL,
  `inevap_c_trabajador` int(11) NOT NULL,
  `inevap_e_inscripcion_evaluacion_aplicada` int(11) DEFAULT NULL,
  `inevap_vigente` int(1) DEFAULT NULL,
  `inevap_r_fecha_creacion` datetime DEFAULT NULL,
  `inevap_r_fecha_modificacion` datetime DEFAULT NULL,
  `inevap_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inscripcion_evaluacion_aplicada`
--

INSERT INTO `inscripcion_evaluacion_aplicada` VALUES(4, 1, 2, 1, 44, 1, 1, '2018-08-10 04:52:20', NULL, 1);
INSERT INTO `inscripcion_evaluacion_aplicada` VALUES(4, 1, 2, 2, 44, 1, 1, '2018-08-10 04:53:02', NULL, 1);
INSERT INTO `inscripcion_evaluacion_aplicada` VALUES(4, 1, 2, 3, 44, 1, 1, '2018-08-10 04:53:02', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion`
--

DROP TABLE IF EXISTS `institucion`;
CREATE TABLE `institucion` (
  `inst_codigo` int(11) NOT NULL,
  `inst_identificador` int(15) DEFAULT NULL,
  `inst_dv` varchar(1) DEFAULT NULL,
  `inst_nombre` varchar(255) DEFAULT NULL,
  `inst_t_institucion` int(11) DEFAULT NULL,
  `inst_c_comuna` varchar(11) DEFAULT NULL,
  `inst_c_pais` varchar(11) DEFAULT NULL,
  `inst_telefono` varchar(25) DEFAULT NULL,
  `inst_email` varchar(255) DEFAULT NULL,
  `inst_tratamiento` varchar(1) DEFAULT NULL,
  `inst_direccion` varchar(255) DEFAULT NULL,
  `inst_giro` varchar(55) DEFAULT NULL,
  `inst_r_fecha_creacion` datetime DEFAULT NULL,
  `inst_r_fecha_modificacion` datetime DEFAULT NULL,
  `inst_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `institucion`
--

INSERT INTO `institucion` VALUES(1, 11111111, '1', 'CONSORCIO EMEXCO', 1, '292', '43', NULL, NULL, 'M', NULL, NULL, '2018-07-04 01:08:31', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_confirm`
--

DROP TABLE IF EXISTS `login_confirm`;
CREATE TABLE `login_confirm` (
  `id` int(11) NOT NULL,
  `data` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_integration`
--

DROP TABLE IF EXISTS `login_integration`;
CREATE TABLE `login_integration` (
  `user_id` int(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `google` varchar(255) NOT NULL,
  `yahoo` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_levels`
--

DROP TABLE IF EXISTS `login_levels`;
CREATE TABLE `login_levels` (
  `id` int(11) NOT NULL,
  `level_name` varchar(255) NOT NULL,
  `level_disabled` tinyint(1) NOT NULL DEFAULT '0',
  `redirect` varchar(255) DEFAULT NULL,
  `welcome_email` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `login_levels`
--

INSERT INTO `login_levels` VALUES(1, 'Admin', 0, NULL, 0);
INSERT INTO `login_levels` VALUES(2, 'Special', 0, NULL, 0);
INSERT INTO `login_levels` VALUES(3, 'User', 0, '', 0);
INSERT INTO `login_levels` VALUES(4, 'Facilitador', 0, 'http://localhost:401/hsem.bvcgroup.cl/private/facilitador/dashboard.php', 0);
INSERT INTO `login_levels` VALUES(5, 'Participante', 0, 'http://localhost:401/hsem.bvcgroup.cl/private/participante/welcome.php', 0);
INSERT INTO `login_levels` VALUES(6, 'Cliente', 0, 'http://localhost:401/hsem.bvcgroup.cl/private/cliente/dashboard.php', 0);
INSERT INTO `login_levels` VALUES(7, 'Administrador', 0, 'http://localhost:401/hsem.bvcgroup.cl/home.php', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_profiles`
--

DROP TABLE IF EXISTS `login_profiles`;
CREATE TABLE `login_profiles` (
  `p_id` bigint(20) UNSIGNED NOT NULL,
  `pfield_id` int(255) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `profile_value` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_profile_fields`
--

DROP TABLE IF EXISTS `login_profile_fields`;
CREATE TABLE `login_profile_fields` (
  `id` int(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `type` varchar(25) NOT NULL,
  `label` varchar(255) NOT NULL,
  `public` tinyint(4) NOT NULL,
  `signup` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_settings`
--

DROP TABLE IF EXISTS `login_settings`;
CREATE TABLE `login_settings` (
  `id` int(11) NOT NULL,
  `option_name` varchar(255) NOT NULL,
  `option_value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `login_settings`
--

INSERT INTO `login_settings` VALUES(1, 'site_address', 'http://localhost:401/hsem.bvcgroup.cl/');
INSERT INTO `login_settings` VALUES(2, 'default_session', '0');
INSERT INTO `login_settings` VALUES(3, 'admin_email', 'rmunozcatalan@gmail.com');
INSERT INTO `login_settings` VALUES(4, 'block-msg-enable', '1');
INSERT INTO `login_settings` VALUES(5, 'block-msg', '<h1>Sorry.</h1>\r\n\r\n<p>We have detected that your user level does not entitle you to view the page requested.</p>\r\n\r\n<p>Please contact the website administrator if you feel this is in error.</p>\r\n\r\n<h5>What to do now?</h5>\r\n<p>To see this page you must <a href=''logout.php''>logout</a> and login with sufficiant privileges.</p>');
INSERT INTO `login_settings` VALUES(6, 'block-msg-out', 'You need to login to do that.');
INSERT INTO `login_settings` VALUES(7, 'block-msg-out-enable', '1');
INSERT INTO `login_settings` VALUES(8, 'email-welcome-msg', 'Hello {{full_name}} !\r\n\r\nThanks for registering at {{site_address}}. Here are your account details:\r\n\r\nName: {{full_name}}\r\nUsername: {{username}}\r\nEmail: {{email}}\r\nPassword: *hidden*\r\n\r\nYou will first have to activate your account by clicking on the following link:\r\n\r\n{{activate}}');
INSERT INTO `login_settings` VALUES(9, 'email-activate-msg', 'Hi there {{full_name}} !\r\n\r\nYour account at {{site_address}} has been successfully activated :). \r\n\r\nFor your reference, your username is <strong>{{username}}</strong>. \r\n\r\nSee you soon!');
INSERT INTO `login_settings` VALUES(10, 'email-activate-subj', 'You''ve activated your account at Jigowatt !');
INSERT INTO `login_settings` VALUES(11, 'email-activate-resend-subj', 'Here''s your activation link again for Jigowatt');
INSERT INTO `login_settings` VALUES(12, 'email-activate-resend-msg', 'Why hello, {{full_name}}. \r\n\r\nI believe you requested this:\r\n{{activate}}\r\n\r\nClick the link above to activate your account :)');
INSERT INTO `login_settings` VALUES(13, 'email-welcome-subj', 'Thanks for signing up with Jigowatt :)');
INSERT INTO `login_settings` VALUES(14, 'email-forgot-success-subj', 'Your password has been reset at Jigowatt');
INSERT INTO `login_settings` VALUES(15, 'email-forgot-success-msg', 'Welcome back, {{full_name}} !\r\n\r\nI''m just letting you know your password at {{site_address}} has been successfully changed. \r\n\r\nHopefully you were the one that requested this password reset !\r\n\r\nCheers');
INSERT INTO `login_settings` VALUES(16, 'email-forgot-subj', 'Lost your password at Jigowatt?');
INSERT INTO `login_settings` VALUES(17, 'email-forgot-msg', 'Hi {{full_name}},\r\n\r\nYour username is <strong>{{username}}</strong>.\r\n\r\nTo reset your password at Jigowatt, please click the following password reset link:\r\n{{reset}}\r\n\r\nSee you soon!');
INSERT INTO `login_settings` VALUES(18, 'email-add-user-subj', 'You''re registered with Jigowatt !');
INSERT INTO `login_settings` VALUES(19, 'email-add-user-msg', 'Hello {{full_name}} !\r\n\r\nYou''re now registered at {{site_address}}. Here are your account details:\r\n\r\nName: {{full_name}}\r\nUsername: {{username}}\r\nEmail: {{email}}\r\nPassword: {{password}}');
INSERT INTO `login_settings` VALUES(20, 'pw-encrypt-force-enable', '0');
INSERT INTO `login_settings` VALUES(21, 'pw-encryption', 'MD5');
INSERT INTO `login_settings` VALUES(22, 'phplogin_db_version', '1503250');
INSERT INTO `login_settings` VALUES(23, 'email-acct-update-subj', 'Confirm your account changes');
INSERT INTO `login_settings` VALUES(24, 'email-acct-update-msg', 'Hi {{full_name}} !\r\n\r\nYou ( {{username}} ) requested a change to update your password or email. Click the link below to confirm this change.\r\n\r\n{{confirm}}\r\n\r\nThanks!\r\n{{site_address}}');
INSERT INTO `login_settings` VALUES(25, 'email-acct-update-success-subj', 'Your account has been updated');
INSERT INTO `login_settings` VALUES(26, 'email-acct-update-success-msg', 'Hello {{full_name}},\r\n\r\nYour account details at {{site_address}} has been updated. \r\n\r\nYour username: {{username}}\r\n\r\nSee you around!');
INSERT INTO `login_settings` VALUES(27, 'guest-redirect', 'http://localhost:401/hsem.bvcgroup.cl');
INSERT INTO `login_settings` VALUES(28, 'signout-redirect-referrer-enable', '1');
INSERT INTO `login_settings` VALUES(29, 'signin-redirect-referrer-enable', '1');
INSERT INTO `login_settings` VALUES(30, 'default-level', 'a:1:{i:0;s:1:"3";}');
INSERT INTO `login_settings` VALUES(31, 'new-user-redirect', 'http://localhost:401/hsem.bvcgroup.cl/profile.php');
INSERT INTO `login_settings` VALUES(32, 'user-activation-enable', '1');
INSERT INTO `login_settings` VALUES(33, 'email-new-user-subj', 'A new user has registered !');
INSERT INTO `login_settings` VALUES(34, 'email-new-user-msg', 'Hello,\r\n\r\nThere''s been a new registration at &lt;a href=&quot;{{site_address}}&quot;&gt;your site&lt;/a&gt;.\r\n\r\nHere''s the user''s details:\r\n\r\nName: {{full_name}}\r\nUsername: {{username}}\r\nEmail: {{email}}');
INSERT INTO `login_settings` VALUES(99, 'rest-endpoint', 'http://localhost:401/hsem.bvcgroup.cl_rest/index.php/WL0101KY/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_timestamps`
--

DROP TABLE IF EXISTS `login_timestamps`;
CREATE TABLE `login_timestamps` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_users`
--

DROP TABLE IF EXISTS `login_users`;
CREATE TABLE `login_users` (
  `user_id` int(8) NOT NULL,
  `user_level` longtext NOT NULL,
  `persona_id` int(11) NOT NULL,
  `restricted` int(1) NOT NULL DEFAULT '0',
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(128) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `login_users`
--

INSERT INTO `login_users` VALUES(1, 'a:3:{i:0;s:1:"3";i:1;s:1:"1";i:2;s:1:"2";}', 0, 0, 'admin', 'Demo Admin', 'rmunozcatalan@gmail.com', '0bd6506986ec42e732ffb866d33bb14e', '2016-09-07 03:57:17');
INSERT INTO `login_users` VALUES(2, 'a:3:{i:0;s:1:"2";i:1;s:1:"3";i:2;s:1:"4";}', 0, 0, 'special', 'Demo Special', 'test.special@jigowatt.co.uk', '0bd6506986ec42e732ffb866d33bb14e', '2016-09-07 03:57:17');
INSERT INTO `login_users` VALUES(3, 'a:1:{i:0;s:1:"5";}', 6, 0, 'participante', 'Participante BVC Group', 'participante@bvcgroup.cl', '99ac05264e7c7a69a800755bb72972d8', '2016-09-07 03:57:17');
INSERT INTO `login_users` VALUES(57, 'a:1:{i:0;s:1:"4";}', 3, 0, 'facilitador', 'Facilitador BVC Group', 'facilitador@bvcgroup.cl', '2978e89a4c9ff4a86a4d8b4e05b5ead6', '2016-09-07 03:57:17');
INSERT INTO `login_users` VALUES(58, 'a:1:{i:0;s:1:"4";}', 1, 0, 'cliente', 'Cliente BVC Group', 'cliente@bvcgroup.cl', '4983a0ab83ed86e0e7213c8783940193', '2016-09-07 03:57:17');
INSERT INTO `login_users` VALUES(59, 'a:1:{i:0;s:1:"7";}', 2, 0, 'adminbvc', 'Admin BVC Group', 'admin@bvcgroup.cl', '21232f297a57a5a743894a0e4a801fc3', '2016-09-07 03:57:17');
INSERT INTO `login_users` VALUES(60, 'a:1:{i:0;s:1:"5";}', 47, 0, 'jose.munoz', 'José Muñoz', 'participante@bvcgroup.cl', '99ac05264e7c7a69a800755bb72972d8', '2016-09-07 03:57:17');
INSERT INTO `login_users` VALUES(61, 'a:1:{i:0;s:1:"5";}', 48, 0, 'daniela.martinez', 'daniela.martinez', 'daniela.martinez@bvcgroup.cl', '99ac05264e7c7a69a800755bb72972d8', '2016-09-07 03:57:17');
INSERT INTO `login_users` VALUES(62, 'a:1:{i:0;s:1:"5";}', 49, 0, 'patricio.reyes', 'patricio.reyes', 'patricio.reyes@bvcgroup.cl', '99ac05264e7c7a69a800755bb72972d8', '2016-09-07 03:57:17');
INSERT INTO `login_users` VALUES(63, 'a:1:{i:0;s:1:"5";}', 50, 0, 'fernando.vallejos', 'fernando.vallejos', 'fernando.vallejos@bvcgroup.cl', '99ac05264e7c7a69a800755bb72972d8', '2016-09-07 03:57:17');
INSERT INTO `login_users` VALUES(64, 'a:1:{i:0;s:1:"5";}', 51, 0, 'matias.aguilera', 'matias.aguilera', 'matias.aguilera@bvcgroup.cl', '99ac05264e7c7a69a800755bb72972d8', '2016-09-07 03:57:17');
INSERT INTO `login_users` VALUES(65, 'a:1:{i:0;s:1:"5";}', 52, 0, 'alonso.barria', 'alonso.barria', 'alonso.barria@bvcgroup.cl', '99ac05264e7c7a69a800755bb72972d8', '2016-09-07 03:57:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcador`
--

DROP TABLE IF EXISTS `marcador`;
CREATE TABLE `marcador` (
  `marc_codigo` int(11) NOT NULL,
  `marc_codigo_marcador` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `marc_descripcion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `marc_imagen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `marc_vigente` int(1) DEFAULT NULL,
  `marc_r_fecha_creacion` datetime DEFAULT NULL,
  `marc_r_fecha_modificacion` datetime DEFAULT NULL,
  `marc_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetivo`
--

DROP TABLE IF EXISTS `objetivo`;
CREATE TABLE `objetivo` (
  `obje_codigo` int(11) NOT NULL,
  `obje_sigla` varchar(15) DEFAULT NULL,
  `obje_descripcion` varchar(255) DEFAULT NULL,
  `obje_r_fecha_creacion` datetime DEFAULT NULL,
  `obje_r_fecha_modificacion` datetime DEFAULT NULL,
  `obje_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `objetivo`
--

INSERT INTO `objetivo` VALUES(1, 'obj1', 'Objetivo 1', '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `objetivo` VALUES(2, 'obj2', 'Objetivo 2', '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `objetivo` VALUES(3, 'obj3', 'Objetivo 3', '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `objetivo` VALUES(4, NULL, 'RECONOCER ACTIVIDADES Y LABORES HABITUALES, EN LAS CUALES SE ENCUENTRA EL RIESGO DE FATALIDAD “IMPACTO VEHÍCULO PERSONA EQUIPO”.', '2018-08-10 01:10:50', NULL, 1);
INSERT INTO `objetivo` VALUES(5, NULL, 'APRENDER LAS FALLAS Y ERRORES HABITUALES EN LA IMPLEMENTACIÓN DE CONTROLES DE SEGURIDAD EN LABORES CON EL RIESGO DE IMPACTO VEHÍCULO PERSONA EQUIPO.', '2018-08-10 01:12:23', NULL, 1);
INSERT INTO `objetivo` VALUES(6, NULL, 'ADOPTAR HÁBITOS PARA IMPLEMENTAR CONTROLES DE SEGURIDAD EFECTIVOS PARA EVITAR ACCIDENTES, EN LABORES “IMPACTO VEHÍCULO PERSONA EQUIPO”.', '2018-08-10 01:12:23', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opcion_pregunta`
--

DROP TABLE IF EXISTS `opcion_pregunta`;
CREATE TABLE `opcion_pregunta` (
  `oppr_codigo` int(11) NOT NULL,
  `oppr_valor` varchar(255) DEFAULT NULL,
  `oppr_no_procesa_promedio` int(1) DEFAULT NULL,
  `oppr_r_fecha_creacion` varchar(14) DEFAULT NULL,
  `oppr_r_fecha_modificacion` datetime DEFAULT NULL,
  `oppr_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `opcion_pregunta`
--

INSERT INTO `opcion_pregunta` VALUES(1, 'EN BLANCO', 0, '04/07/18 10:04', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(2, 'VERDADERO', 0, '04/07/18 10:04', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(3, 'FALSO', 0, '04/07/18 10:04', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(4, 'ACOPIO TRANSITORIO DE MATERIALES.', 0, '11/07/18 10:04', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(5, 'CIERRE TEMPORAL DE CAMINOS.', 0, '11/07/18 10:05', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(6, 'DESVÍOS TEMPORAL EN CAMINOS.', 0, '11/07/18 10:05', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(7, 'A, B Y C SON CORRECTAS.', 0, '11/07/18 10:06', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(8, 'EXCAVACIONES ABIERTAS O PROCESO DE CONSTRUCCIÓN.', 0, '11/07/18 10:06', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(9, 'ESTACIONAMIENTOS DE VEHÍCULOS Y EQUIPOS MÓVILES.', 0, '11/07/18 10:07', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(10, 'BAÑOS QUÍMICOS DE TERRENO.', 0, '11/07/18 10:07', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(11, 'A, B Y C SON CORRECTAS.', 0, '11/07/18 10:08', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(12, 'NO COMUNICARSE CON OPERADOR DE EQUIPO MÓVIL PARA ADVERTIR SU PRESENCIA.', 0, '11/07/18 10:08', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(13, 'POSICIONARSE EN PUNTO CIEGO DE VEHÍCULO O EQUIPO MÓVIL EN MOVIMIENTO.', 0, '11/07/18 10:09', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(14, 'TRABAJAR EN ALTURA SIN ARNÉS DE SEGURIDAD.', 0, '11/07/18 10:09', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(15, 'A Y B SON CORRECTAS.', 0, '11/07/18 10:10', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(16, 'NO USAR LENTES DE SEGURIDAD.', 0, '11/07/18 10:10', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(17, 'DESCONOCER LOS PUNTOS CIEGOS DE VEHÍCULO O EQUIPO MÓVIL EN MOVIMIENTO.', 0, '11/07/18 10:11', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(18, 'NO BLOQUEAR O TRABAR MOVIMIENTOS INESPERADOS DE EQUIPOS MÓVILES DETENIDOS O EN MANTENCIÓN (EJ: NO USAR CUÑAS PARA TRABAR NEUMÁTICOS).', 0, '11/07/18 10:11', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(19, 'B Y C SON CORRECTAS.', 0, '11/07/18 10:12', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(20, 'ELECTROCUCIÓN.', 0, '11/07/18 10:12', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(21, 'POLI-CONTUSIONES Y MUERTE.', 0, '11/07/18 10:13', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(22, 'CORTE.', 0, '11/07/18 10:13', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(23, 'TORCEDURA.', 0, '11/07/18 10:14', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(24, 'INFLAMACIÓN.', 0, '11/07/18 10:14', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(25, 'ALTERACIÓN DEL RITMO CARDIACO (INFARTO, TAQUICARDIA) Y MUERTE.', 0, '11/07/18 10:15', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(26, 'PERDIDA DE UNA EXTREMIDAD.', 0, '11/07/18 10:15', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(27, 'FRACTURAS MÚLTIPLES Y MUERTE.', 0, '11/07/18 10:16', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(28, 'CHARLA DE 5 MINUTOS SEGURIDAD.', 0, '11/07/18 10:16', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(29, 'SEÑALÉTICA INFORMATIVA.', 0, '11/07/18 10:16', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(30, 'SEGREGACIÓN/DELIMITACIÓN ENTRE PEATONES Y VEHÍCULOS/EQUIPOS.', 0, '11/07/18 10:16', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(31, 'CONOS REFLECTANTES.', 0, '11/07/18 10:17', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(32, 'SEÑALÉTICA INFORMATIVA.', 0, '11/07/18 10:17', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(33, 'CHARLA DE 5 MINUTOS SEGURIDAD.', 0, '11/07/18 10:17', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(34, 'COMUNICACIÓN EFECTIVA.', 0, '11/07/18 10:18', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(35, 'CONOS REFLECTANTES.', 0, '11/07/18 10:18', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(36, 'DISEÑO (LAYOUT) PARA ÁREAS/ZONAS DE TRABAJO.', 0, '11/07/18 10:18', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(37, 'CHARLA DE 5 MINUTOS SEGURIDAD.', 0, '11/07/18 10:19', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(38, 'CONOS REFLECTANTES.', 0, '11/07/18 10:19', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(39, 'SEÑALÉTICA INFORMATIVA.', 0, '11/07/18 10:19', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(40, 'CONOS REFLECTANTES.', 0, '11/07/18 10:20', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(41, 'SEÑALÉTICA INFORMATIVA.', 0, '11/07/18 10:20', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(42, 'BLOQUEO DE EQUIPOS MÓVILES EN MANTENIMIENTO / PARQUEO PARA EVITAR MOVIMIENTOS INESPERADOS.', 0, '11/07/18 10:20', NULL, 1);
INSERT INTO `opcion_pregunta` VALUES(43, 'CHARLA INICIO DE FAENA.', 0, '11/07/18 10:21', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

DROP TABLE IF EXISTS `pais`;
CREATE TABLE `pais` (
  `pais_codigo` int(11) NOT NULL,
  `nombre_comun` varchar(155) DEFAULT NULL,
  `nombre_iso` varchar(100) DEFAULT NULL,
  `codigo_alfa2` varchar(3) DEFAULT NULL,
  `codigo_alfa3` varchar(4) DEFAULT NULL,
  `codigo_numerico` int(3) DEFAULT NULL,
  `observaciones` varchar(455) DEFAULT NULL,
  `pais_r_fecha_creacion` datetime DEFAULT NULL,
  `pais_r_fecha_modificacion` datetime NOT NULL,
  `pais_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` VALUES(1, 'Afganistán', 'Afganistán ', 'AF ', 'AFG ', 4, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(2, 'Åland', 'Åland, Islas ', 'AX ', 'ALA ', 248, 'Es una provincia autónoma de Finlandia.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(3, 'Albania', 'Albania ', 'AL ', 'ALB ', 8, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(4, 'Alemania', 'Alemania ', 'DE ', 'DEU ', 276, 'Códigos obtenidos del idioma nativo (alemán): Deutschland Códigos alfa usados por Alemania Occidental antes de la reunificación alemana en 1990.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(5, 'Andorra', 'Andorra ', 'AD ', 'AND ', 20, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(6, 'Angola', 'Angola ', 'AO ', 'AGO ', 24, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(7, 'Anguila', 'Anguila ', 'AI ', 'AIA ', 660, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(8, 'Antártida', 'Antártida ', 'AQ ', 'ATA ', 10, 'Cubre el territorio al sur del paralelo 60º sur. Códigos obtenidos del nombre en francés: Antarctique', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(9, 'Antigua ', 'Antigua y Barbuda ', 'AG ', 'ATG ', 28, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(10, 'Arabia Saudita', 'Arabia Saudita ', 'SA ', 'SAU ', 682, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(11, 'Argelia', 'Argelia ', 'DZ ', 'DZA ', 12, 'Códigos obtenidos del idioma nativo (cabilio): Dzayer', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(12, 'Argentina', 'Argentina ', 'AR ', 'ARG ', 32, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(13, 'Armenia', 'Armenia ', 'AM ', 'ARM ', 51, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(14, 'Aruba', 'Aruba ', 'AW ', 'ABW ', 533, 'Forma parte del Reino de los Países Bajos.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(15, 'Australia', 'Australia ', 'AU ', 'AUS ', 36, 'Incluye las Islas Ashmore y Cartier y las Islas del Mar del Coral.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(16, 'Austria', 'Austria ', 'AT ', 'AUT ', 40, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(17, 'Azerbaiyán', 'Azerbaiyán ', 'AZ ', 'AZE ', 31, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(18, 'Bahamas', 'Bahamas (las) ', 'BS ', 'BHS ', 44, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(19, 'Bangladés', 'Bangladesh ', 'BD ', 'BGD ', 50, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(20, 'Barbados', 'Barbados ', 'BB ', 'BRB ', 52, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(21, 'Baréin', 'Bahrein ', 'BH ', 'BHR ', 48, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(22, 'Bélgica', 'Bélgica ', 'BE ', 'BEL ', 56, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(23, 'Belice', 'Belice ', 'BZ ', 'BLZ ', 84, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(24, 'Benín', 'Benin ', 'BJ ', 'BEN ', 204, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(25, 'Bermudas', 'Bermudas ', 'BM ', 'BMU ', 60, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(26, 'Bielorrusia', 'Belarús ', 'BY ', 'BLR ', 112, 'El nombre oficial del país es Belarús, aunque tradicionalmente se le sigue denominando Bielorrusia.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(27, 'Bolivia', 'Bolivia (Estado Plurinacional de) ', 'BO ', 'BOL ', 68, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(28, 'Bonaire, San Eustaquio y Saba', 'Bonaire, San Eustaquio y Saba ', 'BQ ', 'BES ', 535, 'Son tres municipios especiales que forman parte de los Países Bajos.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(29, 'Bosnia y Herzegovina', 'Bosnia y Herzegovina ', 'BA ', 'BIH ', 70, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(30, 'Botsuana', 'Botswana ', 'BW ', 'BWA ', 72, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(31, 'Brazil', 'Brasil ', 'BR ', 'BRA ', 76, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(32, 'Brunéi', 'Brunei Darussalam ', 'BN ', 'BRN ', 96, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(33, 'Bulgaria', 'Bulgaria ', 'BG ', 'BGR ', 100, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(34, 'Burkina Faso', 'Burkina Faso ', 'BF ', 'BFA ', 854, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(35, 'Burundi', 'Burundi ', 'BI ', 'BDI ', 108, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(36, 'Bután', 'Bhután ', 'BT ', 'BTN ', 64, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(37, 'Cabo Verde', 'Cabo Verde ', 'CV ', 'CPV ', 132, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(38, 'Camboya', 'Camboya ', 'KH ', 'KHM ', 116, 'Códigos obtenidos del anterior nombre: Khmer Republic (República Jemer)', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(39, 'Camerún', 'Camerún ', 'CM ', 'CMR ', 120, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(40, 'Canada', 'Canadá ', 'CA ', 'CAN ', 124, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(41, 'Catar', 'Qatar ', 'QA ', 'QAT ', 634, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(42, 'Chad', 'Chad ', 'TD ', 'TCD ', 148, 'Códigos obtenidos del nombre en francés: Tchad', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(43, 'Chile', 'Chile ', 'CL ', 'CHL ', 152, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(44, 'China', 'China ', 'CN ', 'CHN ', 156, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(45, 'Chipre', 'Chipre ', 'CY ', 'CYP ', 196, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(46, 'Colombia', 'Colombia ', 'CO ', 'COL ', 170, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(47, 'Comoras', 'Comoras (las) ', 'KM ', 'COM ', 174, 'Códigos obtenidos del idioma nativo (comorense): Komori', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(48, 'Corea del Norte', 'Corea (la República Popular Democrática de) ', 'KP ', 'PRK ', 408, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(49, 'Corea del Sur', 'Corea (la República de) ', 'KR ', 'KOR ', 410, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(50, 'Costa de Marfil', 'Côte d''Ivoire ', 'CI ', 'CIV ', 384, 'Nombre oficial en la ISO en francés.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(51, 'Costa Rica', 'Costa Rica ', 'CR ', 'CRI ', 188, 'Nombre oficial en la ISO en español.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(52, 'Croacia', 'Croacia ', 'HR ', 'HRV ', 191, 'Códigos obtenidos del idioma nativo (croata): Hrvatska', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(53, 'Cuba', 'Cuba ', 'CU ', 'CUB ', 192, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(54, 'Curazao', 'Curaçao ', 'CW ', 'CUW ', 531, 'Forma parte del Reino de los Países Bajos.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(55, 'Dinamarca', 'Dinamarca ', 'DK ', 'DNK ', 208, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(56, 'Dominica', 'Dominica ', 'DM ', 'DMA ', 212, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(57, 'Ecuador', 'Ecuador ', 'EC ', 'ECU ', 218, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(58, 'Egipto', 'Egipto ', 'EG ', 'EGY ', 818, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(59, 'El Salvador', 'El Salvador ', 'SV ', 'SLV ', 222, 'Nombre oficial en la ISO en español.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(60, 'Emiratos Árabes Unidos', 'Emiratos Árabes Unidos (los) ', 'AE ', 'ARE ', 784, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(61, 'Eritrea', 'Eritrea ', 'ER ', 'ERI ', 232, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(62, 'Eslovaquia', 'Eslovaquia ', 'SK ', 'SVK ', 703, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(63, 'Eslovenia', 'Eslovenia ', 'SI ', 'SVN ', 705, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(64, 'España', 'España ', 'ES ', 'ESP ', 724, 'Códigos obtenidos del idioma nativo (español): España', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(65, 'Estados Unidos', 'Estados Unidos de América (los) ', 'US ', 'USA ', 840, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(66, 'Estonia', 'Estonia ', 'EE ', 'EST ', 233, 'Códigos obtenidos del idioma nativo (estonio): Eesti', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(67, 'Etiopía', 'Etiopía ', 'ET ', 'ETH ', 231, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(68, 'Filipinas', 'Filipinas (las) ', 'PH ', 'PHL ', 608, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(69, 'Finlandia', 'Finlandia ', 'FI ', 'FIN ', 246, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(70, 'Fiyi', 'Fiji ', 'FJ ', 'FJI ', 242, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(71, 'Francia', 'Francia ', 'FR ', 'FRA ', 250, 'Incluye la Isla Clipperton.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(72, 'Gabón', 'Gabón ', 'GA ', 'GAB ', 266, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(73, 'Gambia', 'Gambia (la) ', 'GM ', 'GMB ', 270, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(74, 'Georgia', 'Georgia ', 'GE ', 'GEO ', 268, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(75, 'Ghana', 'Ghana ', 'GH ', 'GHA ', 288, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(76, 'Gibraltar', 'Gibraltar ', 'GI ', 'GIB ', 292, 'Pertenece al Reino Unido.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(77, 'Granada', 'Granada ', 'GD ', 'GRD ', 308, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(78, 'Grecia', 'Grecia ', 'GR ', 'GRC ', 300, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(79, 'Groenlandia', 'Groenlandia ', 'GL ', 'GRL ', 304, 'Pertenece al Reino de Dinamarca.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(80, 'Guadalupe', 'Guadeloupe ', 'GP ', 'GLP ', 312, 'Departamento de ultramar francés. Nombre oficial en la ISO en francés.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(81, 'Guam', 'Guam ', 'GU ', 'GUM ', 316, 'Territorio no incorporado de los Estados Unidos.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(82, 'Guatemala', 'Guatemala ', 'GT ', 'GTM ', 320, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(83, 'Guayana Francesa', 'Guayana Francesa ', 'GF ', 'GUF ', 254, 'Departamento de ultramar francés. Códigos obtenidos del nombre en francés: Guyane française', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(84, 'Guernsey', 'Guernsey ', 'GG ', 'GGY ', 831, 'Una dependencia de la Corona británica.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(85, 'Guinea', 'Guinea ', 'GN ', 'GIN ', 324, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(86, 'Guinea-Bisáu', 'Guinea Bissau ', 'GW ', 'GNB ', 624, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(87, 'Guinea Ecuatorial', 'Guinea Ecuatorial ', 'GQ ', 'GNQ ', 226, 'Códigos obtenidos del nombre en francés: Guinée équatoriale', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(88, 'Guyana', 'Guyana ', 'GY ', 'GUY ', 328, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(89, 'Haití', 'Haití ', 'HT ', 'HTI ', 332, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(90, 'Honduras', 'Honduras ', 'HN ', 'HND ', 340, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(91, 'Hong Kong', 'Hong Kong ', 'HK ', 'HKG ', 344, 'Región administrativa especial de China.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(92, 'Hungría', 'Hungría ', 'HU ', 'HUN ', 348, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(93, 'India', 'India ', 'IN ', 'IND ', 356, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(94, 'Indonesia', 'Indonesia ', 'ID ', 'IDN ', 360, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(95, 'Irak', 'Iraq ', 'IQ ', 'IRQ ', 368, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(96, 'Irán', 'Irán (República Islámica de) ', 'IR ', 'IRN ', 364, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(97, 'Irlanda', 'Irlanda ', 'IE ', 'IRL ', 372, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(98, 'Isla Bouvet', 'Bouvet, Isla ', 'BV ', 'BVT ', 74, 'Pertenece a Noruega.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(99, 'Isla de Man', 'Isla de Man ', 'IM ', 'IMN ', 833, 'Una dependencia de la Corona británica.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(100, 'Isla de Navidad', 'Navidad, Isla de ', 'CX ', 'CXR ', 162, 'Pertenece a Australia.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(101, 'Islandia', 'Islandia ', 'IS ', 'ISL ', 352, 'Códigos obtenidos del idioma nativo (islandés): Ísland', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(102, 'Islas Caimán', 'Caimán, (las) Islas ', 'KY ', 'CYM ', 136, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(103, 'Islas Cocos', 'Cocos / Keeling, (las) Islas ', 'CC ', 'CCK ', 166, 'Pertenecen a Australia.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(104, 'Islas Cook', 'Cook, (las) Islas ', 'CK ', 'COK ', 184, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(105, 'Islas Feroe', 'Feroe, (las) Islas ', 'FO ', 'FRO ', 234, 'Pertenecen al Reino de Dinamarca.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(106, 'Islas Georgias del Sur y Sandwich del Sur', 'Georgia del Sur (la) y las Islas Sandwich del Sur ', 'GS ', 'SGS ', 239, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(107, 'Islas Heard y McDonald', 'Heard (Isla) e Islas McDonald ', 'HM ', 'HMD ', 334, 'Pertenecen a Australia.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(108, 'Islas Malvinas', 'Malvinas [Falkland], (las) Islas ', 'FK ', 'FLK ', 238, 'Códigos obtenidos del nombre en (inglés): Falkland', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(109, 'Islas Marianas del Norte', 'Marianas del Norte, (las) Islas ', 'MP ', 'MNP ', 580, 'Territorio no incorporado de los Estados Unidos.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(110, 'Islas Marshall', 'Marshall, (las) Islas ', 'MH ', 'MHL ', 584, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(111, 'Islas Pitcairn', 'Pitcairn ', 'PN ', 'PCN ', 612, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(112, 'Islas Salomón', 'Salomón, Islas ', 'SB ', 'SLB ', 90, 'Códigos obtenidos de su anterior nombre: British Solomon Islands', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(113, 'Islas Turcas y Caicos', 'Turcas y Caicos, (las) Islas ', 'TC ', 'TCA ', 796, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(114, 'Islas ultramarinas de Estados Unidos', 'Islas Ultramarinas Menores de los Estados Unidos (las) ', 'UM ', 'UMI ', 581, 'Comprende nueve áreas insulares menores de los Estados Unidos: Arrecife Kingman, Atolón Johnston, Atolón Palmyra, Isla Baker, Isla Howland, Isla Jarvis, Islas Midway, Isla de Navaza e Isla Wake.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(115, 'Islas Vírgenes Británicas ', 'Vírgenes británicas, Islas ', 'VG ', 'VGB ', 92, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(116, 'Islas Vírgenes de los Estados Unidos', 'Vírgenes de los Estados Unidos, Islas ', 'VI ', 'VIR ', 850, 'Territorio no incorporado de los Estados Unidos.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(117, 'Israel', 'Israel ', 'IL ', 'ISR ', 376, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(118, 'Italia', 'Italia ', 'IT ', 'ITA ', 380, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(119, 'Jamaica', 'Jamaica ', 'JM ', 'JAM ', 388, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(120, 'Japón', 'Japón ', 'JP ', 'JPN ', 392, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(121, 'Jersey', 'Jersey ', 'JE ', 'JEY ', 832, 'Una dependencia de la Corona británica.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(122, 'Jordania', 'Jordania ', 'JO ', 'JOR ', 400, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(123, 'Kazajistán', 'Kazajstán ', 'KZ ', 'KAZ ', 398, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(124, 'Kenia', 'Kenya ', 'KE ', 'KEN ', 404, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(125, 'Kirguistán', 'Kirguistán ', 'KG ', 'KGZ ', 417, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(126, 'Kiribati', 'Kiribati ', 'KI ', 'KIR ', 296, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(127, 'Kuwait', 'Kuwait ', 'KW ', 'KWT ', 414, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(128, 'Laos', 'Lao, (la) República Democrática Popular ', 'LA ', 'LAO ', 418, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(129, 'Lesoto', 'Lesotho ', 'LS ', 'LSO ', 426, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(130, 'Letonia', 'Letonia ', 'LV ', 'LVA ', 428, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(131, 'Líbano', 'Líbano ', 'LB ', 'LBN ', 422, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(132, 'Liberia', 'Liberia ', 'LR ', 'LBR ', 430, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(133, 'Libia', 'Libia ', 'LY ', 'LBY ', 434, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(134, 'Liechtenstein', 'Liechtenstein ', 'LI ', 'LIE ', 438, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(135, 'Lituania', 'Lituania ', 'LT ', 'LTU ', 440, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(136, 'Luxemburgo', 'Luxemburgo ', 'LU ', 'LUX ', 442, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(137, 'Macao', 'Macao ', 'MO ', 'MAC ', 446, 'Región administrativa especial de China.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(138, 'Macedonia', 'Macedonia (la ex República Yugoslava de) ', 'MK ', 'MKD ', 807, 'Ver: Disputa sobre el nombre de Macedonia Códigos obtenidos del idioma nativo (macedonio): Makedonija', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(139, 'Madagascar', 'Madagascar ', 'MG ', 'MDG ', 450, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(140, 'Malasia', 'Malasia ', 'MY ', 'MYS ', 458, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(141, 'Malaui', 'Malawi ', 'MW ', 'MWI ', 454, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(142, 'Maldivas', 'Maldivas ', 'MV ', 'MDV ', 462, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(143, 'Malí', 'Malí ', 'ML ', 'MLI ', 466, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(144, 'Malta', 'Malta ', 'MT ', 'MLT ', 470, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(145, 'Marruecos', 'Marruecos ', 'MA ', 'MAR ', 504, 'Códigos obtenidos del nombre en francés: Maroc', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(146, 'Martinica', 'Martinique ', 'MQ ', 'MTQ ', 474, 'Departamento de ultramar francés. Nombre oficial en la ISO en francés.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(147, 'Mauricio', 'Mauricio ', 'MU ', 'MUS ', 480, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(148, 'Mauritania', 'Mauritania ', 'MR ', 'MRT ', 478, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(149, 'Mayotte', 'Mayotte ', 'YT ', 'MYT ', 175, 'Departamento de ultramar francés.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(150, 'México', 'México ', 'MX ', 'MEX ', 484, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(151, 'Micronesia', 'Micronesia (Estados Federados de) ', 'FM ', 'FSM ', 583, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(152, 'Moldavia', 'Moldova (la República de) ', 'MD ', 'MDA ', 498, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(153, 'Mónaco', 'Mónaco ', 'MC ', 'MCO ', 492, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(154, 'Mongolia', 'Mongolia ', 'MN ', 'MNG ', 496, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(155, 'Montenegro', 'Montenegro ', 'ME ', 'MNE ', 499, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(156, 'Montserrat', 'Montserrat ', 'MS ', 'MSR ', 500, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(157, 'Mozambique', 'Mozambique ', 'MZ ', 'MOZ ', 508, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(158, 'Myanmar', 'Myanmar ', 'MM ', 'MMR ', 104, 'Anteriormente conocida como Birmania.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(159, 'Namibia', 'Namibia ', 'NA ', 'NAM ', 516, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(160, 'Nauru', 'Nauru ', 'NR ', 'NRU ', 520, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(161, 'Nepal', 'Nepal ', 'NP ', 'NPL ', 524, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(162, 'Nicaragua', 'Nicaragua ', 'NI ', 'NIC ', 558, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(163, 'Níger', 'Níger (el) ', 'NE ', 'NER ', 562, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(164, 'Nigeria', 'Nigeria ', 'NG ', 'NGA ', 566, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(165, 'Niue', 'Niue ', 'NU ', 'NIU ', 570, 'Asociado a Nueva Zelanda.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(166, 'Norfolk', 'Norfolk, Isla ', 'NF ', 'NFK ', 574, 'Pertenece a Australia.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(167, 'Noruega', 'Noruega ', 'NO ', 'NOR ', 578, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(168, 'Nueva Caledonia', 'Nueva Caledonia ', 'NC ', 'NCL ', 540, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(169, 'Nueva Zelanda', 'Nueva Zelandia ', 'NZ ', 'NZL ', 554, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(170, 'Omán', 'Omán ', 'OM ', 'OMN ', 512, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(171, 'Países Bajos', 'Países Bajos (los) ', 'NL ', 'NLD ', 528, 'Forma parte del Reino de los Países Bajos.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(172, 'Pakistán', 'Pakistán ', 'PK ', 'PAK ', 586, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(173, 'Palaos', 'Palau ', 'PW ', 'PLW ', 585, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(174, 'Palestina', 'Palestina, Estado de ', 'PS ', 'PSE ', 275, 'Comprende los territorios de Cisjordania y Franja de Gaza.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(175, 'Panamá', 'Panamá ', 'PA ', 'PAN ', 591, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(176, 'Nueva Guinea', 'Papua Nueva Guinea ', 'PG ', 'PNG ', 598, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(177, 'Paraguay', 'Paraguay ', 'PY ', 'PRY ', 600, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(178, 'Perú', 'Perú ', 'PE ', 'PER ', 604, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(179, 'Polinesia', 'Polinesia Francesa ', 'PF ', 'PYF ', 258, 'Códigos obtenidos del nombre en francés: Polynésie française', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(180, 'Polonia', 'Polonia ', 'PL ', 'POL ', 616, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(181, 'Portugal', 'Portugal ', 'PT ', 'PRT ', 620, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(182, 'Puerto Rico', 'Puerto Rico ', 'PR ', 'PRI ', 630, 'Territorio no incorporado de los Estados Unidos. Nombre oficial en la ISO en español.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(183, 'Reino Unido', 'Reino Unido de Gran Bretaña e Irlanda del Norte (el) ', 'GB ', 'GBR ', 826, 'Debido a que para obtener los códigos ISO no se utilizan las palabras comunes de Reino y Unido, los códigos se han obtenido a partir del resto del nombre oficial.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(184, 'República Árabe Saharaui Democrática', 'Sahara Occidental ', 'EH ', 'ESH ', 732, 'Nombre provisional. Anterior nombre en la ISO: Sahara español Códigos obtenidos del anterior nombre en español', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(185, 'República Centroafricana', 'República Centroafricana (la) ', 'CF ', 'CAF ', 140, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(186, 'República Checa', 'Chequia ', 'CZ ', 'CZE ', 203, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(187, 'República del Congo', 'Congo (el) ', 'CG ', 'COG ', 178, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(188, 'República Democrática del Congo', 'Congo (la República Democrática del) ', 'CD ', 'COD ', 180, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(189, 'República Dominicana', 'Dominicana, (la) República ', 'DO ', 'DOM ', 214, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(190, 'Reunión', 'Reunión ', 'RE ', 'REU ', 638, 'Departamento de ultramar francés.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(191, 'Ruanda', 'Rwanda ', 'RW ', 'RWA ', 646, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(192, 'Rumania', 'Rumania ', 'RO ', 'ROU ', 642, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(193, 'Rusia', 'Rusia, (la) Federación de ', 'RU ', 'RUS ', 643, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(194, 'Samoa', 'Samoa ', 'WS ', 'WSM ', 882, 'Códigos obtenidos del anterior nombre: Western Samoa (Samoa Occidental)', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(195, 'Samoa Americana', 'Samoa Americana ', 'AS ', 'ASM ', 16, 'Territorio no incorporado de los Estados Unidos.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(196, 'San Bartolomé', 'Saint Barthélemy ', 'BL ', 'BLM ', 652, 'Colectividad de ultramar francesa. Nombre oficial en la ISO en francés.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(197, 'San Cristóbal y Nieves', 'Saint Kitts y Nevis ', 'KN ', 'KNA ', 659, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(198, 'San Marino', 'San Marino ', 'SM ', 'SMR ', 674, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(199, 'San Martín', 'Saint Martin (parte francesa) ', 'MF ', 'MAF ', 663, 'Colectividad de ultramar francesa. Nombre oficial en la ISO en francés.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(200, 'France', 'San Pedro y Miquelón ', 'PM ', 'SPM ', 666, 'Colectividad de ultramar francesa.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(201, 'San Vicente y las Granadinas', 'San Vicente y las Granadinas ', 'VC ', 'VCT ', 670, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(202, 'Santa Elena, Ascensión y Tristán de Acuña', 'Santa Helena, Ascensión y Tristán de Acuña ', 'SH ', 'SHN ', 654, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(203, 'Santa Lucía', 'Santa Lucía ', 'LC ', 'LCA ', 662, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(204, 'Santo Tomé y Príncipe', 'Santo Tomé y Príncipe ', 'ST ', 'STP ', 678, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(205, 'Senegal', 'Senegal ', 'SN ', 'SEN ', 686, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(206, 'Serbia', 'Serbia ', 'RS ', 'SRB ', 688, 'Códigos obtenidos de su nombre oficial: República de Serbia, en inglés.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(207, 'Seychelles', 'Seychelles ', 'SC ', 'SYC ', 690, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(208, 'Sierra Leona', 'Sierra leona ', 'SL ', 'SLE ', 694, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(209, 'Singapur', 'Singapur ', 'SG ', 'SGP ', 702, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(210, 'Sint Maarten', 'Sint Maarten (parte neerlandesa) ', 'SX ', 'SXM ', 534, 'Forma parte del Reino de los Países Bajos. Nombre oficial en neerlandés.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(211, 'Siria', 'República Árabe Siria ', 'SY ', 'SYR ', 760, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(212, 'Somalia', 'Somalia ', 'SO ', 'SOM ', 706, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(213, 'Sri Lanka', 'Sri Lanka ', 'LK ', 'LKA ', 144, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(214, 'Suazilandia', 'Swazilandia ', 'SZ ', 'SWZ ', 748, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(215, 'South', 'Sudáfrica ', 'ZA ', 'ZAF ', 710, 'Códigos obtenidos del nombre en neerlandés: Zuid-Afrika', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(216, 'Sudán del Sur', 'Sudán (el) ', 'SD ', 'SDN ', 729, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(217, 'South', 'Sudán del Sur ', 'SS ', 'SSD ', 728, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(218, 'Suecia', 'Suecia ', 'SE ', 'SWE ', 752, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(219, 'Suiza', 'Suiza ', 'CH ', 'CHE ', 756, 'Códigos obtenidos del nombre en latín: Confoederatio Helvetica', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(220, 'Surinam', 'Suriname ', 'SR ', 'SUR ', 740, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(221, 'Svalbard y Jan Mayen', 'Svalbard y Jan Mayen ', 'SJ ', 'SJM ', 744, 'Comprende dos territorios árticos de Noruega: Svalbard y Jan Mayen.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(222, 'Tailandia', 'Tailandia ', 'TH ', 'THA ', 764, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(223, 'Taiwán (República de China)', 'Taiwán (Provincia de China) ', 'TW ', 'TWN ', 158, 'Cubre la jurisdicción actual de la República de China (Taiwán), excepto Kinmen e Islas Matsu. La ONU considera a Taiwán como una provincia de China, debido a su estatus político.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(224, 'Tanzania', 'Tanzania, República Unida de ', 'TZ ', 'TZA ', 834, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(225, 'Tayikistán', 'Tayikistán ', 'TJ ', 'TJK ', 762, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(226, 'Territorio Británico del Océano Índico', 'Territorio Británico del Océano Índico (el) ', 'IO ', 'IOT ', 86, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(227, 'Tierras Australes y Antárticas Francesas', 'Tierras Australes Francesas (las) ', 'TF ', 'ATF ', 260, 'Comprende las tierras australes y antárticas francesas excepto la parte incluida en la Antártida conocida como Tierra Adelia. Códigos obtenidos del nombre en francés: Terres australes françaises.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(228, 'Timor Oriental', 'Timor-Leste ', 'TL ', 'TLS ', 626, 'Nombre oficial en la ISO en portugués.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(229, 'Togo', 'Togo ', 'TG ', 'TGO ', 768, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(230, 'Tokelau', 'Tokelau ', 'TK ', 'TKL ', 772, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(231, 'Tonga', 'Tonga ', 'TO ', 'TON ', 776, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(232, 'Trinidad y Tobago', 'Trinidad y Tobago ', 'TT ', 'TTO ', 780, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(233, 'Túnez', 'Túnez ', 'TN ', 'TUN ', 788, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(234, 'Turkmenistán', 'Turkmenistán ', 'TM ', 'TKM ', 795, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(235, 'Turquía', 'Turquía ', 'TR ', 'TUR ', 792, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(236, 'Tuvalu', 'Tuvalu ', 'TV ', 'TUV ', 798, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(237, 'Ucrania', 'Ucrania ', 'UA ', 'UKR ', 804, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(238, 'Uganda', 'Uganda ', 'UG ', 'UGA ', 800, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(239, 'Uruguay', 'Uruguay ', 'UY ', 'URY ', 858, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(240, 'Uzbekistán', 'Uzbekistán ', 'UZ ', 'UZB ', 860, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(241, 'Vanuatu', 'Vanuatu ', 'VU ', 'VUT ', 548, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(242, 'Vaticano, Ciudad del', 'Santa Sede (la) ', 'VA ', 'VAT ', 336, 'La Santa Sede es la representante diplomática del Estado de la Ciudad del Vaticano ante la ONU y otros países y organismos internacionales, aunque jurídicamente se trata de entes distintos. Los códigos ISO se asignan a la Santa Sede como representante de este Estado, pero se refieren al territorio del Estado de la Ciudad del Vaticano.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(243, 'Venezuela', 'Venezuela (República Bolivariana de) ', 'VE ', 'VEN ', 862, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(244, 'Vietnam', 'Viet Nam ', 'VN ', 'VNM ', 704, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(245, 'Wallis y Futuna', 'Wallis y Futuna ', 'WF ', 'WLF ', 876, 'Colectividad de ultramar francesa.', '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(246, 'Yemen', 'Yemen ', 'YE ', 'YEM ', 887, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(247, 'Yibuti', 'Djibouti ', 'DJ ', 'DJI ', 262, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(248, 'Zambia', 'Zambia ', 'ZM ', 'ZMB ', 894, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);
INSERT INTO `pais` VALUES(249, 'Zimbabue', 'Zimbabwe ', 'ZW ', 'ZWE ', 716, NULL, '2018-08-01 03:10:19', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona` (
  `pers_codigo` int(11) NOT NULL,
  `pers_t_identificador` int(11) DEFAULT NULL,
  `pers_identificador` int(15) DEFAULT NULL,
  `pers_dv` varchar(1) DEFAULT NULL,
  `pers_nombre1` varchar(70) DEFAULT NULL,
  `pers_nombre2` varchar(70) DEFAULT NULL,
  `pers_apellido_paterno` varchar(79) DEFAULT NULL,
  `pers_apellido_materno` varchar(79) DEFAULT NULL,
  `pers_sexo` varchar(1) DEFAULT NULL,
  `pers_fecha_nacimiento` varchar(19) DEFAULT NULL,
  `pers_c_estado_civil` int(11) DEFAULT NULL,
  `pers_c_escolaridad` int(11) DEFAULT NULL,
  `pers_c_pais_origen` int(11) DEFAULT NULL,
  `pers_email` varchar(255) DEFAULT NULL,
  `pers_movil` varchar(55) DEFAULT NULL,
  `pers_titulo` varchar(55) DEFAULT NULL,
  `pers_grado` varchar(55) DEFAULT NULL,
  `pers_r_fecha_creacion` datetime DEFAULT NULL,
  `pers_r_fecha_modificacion` datetime DEFAULT NULL,
  `pers_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` VALUES(1, 1, 22222221, '1', 'CLIENTE 1', 'CLIENTE 1', 'CLIENTE 1', 'CLIENTE 1', 'M', '2018-07-04 01:23:27', 1, 1, 43, NULL, NULL, NULL, NULL, '2018-07-04 01:23:27', NULL, 1);
INSERT INTO `persona` VALUES(2, 1, 33333331, '1', 'ADMINISTRADOR 1', 'ADMINISTRADOR 1', 'ADMINISTRADOR 1', 'ADMINISTRADOR 1', 'M', '2018-07-04 01:23:27', 1, 1, 43, NULL, NULL, NULL, NULL, '2018-07-04 01:23:27', NULL, 1);
INSERT INTO `persona` VALUES(3, 1, 44444441, '1', 'ROBERTO', NULL, 'LEMA', NULL, 'M', '2018-07-04 01:23:27', 1, 1, 43, NULL, NULL, NULL, NULL, '2018-07-04 01:23:27', NULL, 1);
INSERT INTO `persona` VALUES(4, 1, 12345678, '1', 'NOMBRE1 GERENTE DE PROYECTO', 'NOMBRE2 GERENTE DE PROYECTO', 'APELLIDO PATERNO GERENTE DE PROYECTO', 'APELLIDO MATERNO GERENTE DE PROYECTO', 'M', '2018-07-04 01:23:28', 1, 1, 43, NULL, NULL, NULL, NULL, '2018-07-04 01:23:28', NULL, 1);
INSERT INTO `persona` VALUES(5, 1, 12345679, '1', 'NOMBRE1 GERENTE DE CONSTRUCCIÓN', 'NOMBRE2 GERENTE DE CONSTRUCCIÓN', 'APELLIDO PATERNO GERENTE DE CONSTRUCCIÓN', 'APELLIDO MATERNO GERENTE DE CONSTRUCCIÓN', 'M', '2018-07-04 01:23:29', 1, 1, 43, NULL, NULL, NULL, NULL, '2018-07-04 01:23:29', NULL, 1);
INSERT INTO `persona` VALUES(6, 1, 12345680, '1', 'NOMBRE1 GERENTE HSE', 'NOMBRE2 GERENTE HSE', 'APELLIDO PATERNO GERENTE HSE', 'APELLIDO MATERNO GERENTE HSE', 'M', '2018-07-04 01:23:30', 1, 1, 43, NULL, NULL, NULL, NULL, '2018-07-04 01:23:30', NULL, 1);
INSERT INTO `persona` VALUES(7, 1, 12345681, '1', 'NOMBRE1 LÍDER HSE SNGM B', 'NOMBRE2 LÍDER HSE SNGM B', 'APELLIDO PATERNO LÍDER HSE SNGM B', 'APELLIDO MATERNO LÍDER HSE SNGM B', 'M', '2018-07-04 01:23:31', 1, 1, 43, NULL, NULL, NULL, NULL, '2018-07-04 01:23:31', NULL, 1);
INSERT INTO `persona` VALUES(8, 1, 12345682, '1', 'NOMBRE1 LÍDER CONDUCTUAL', 'NOMBRE2 LÍDER CONDUCTUAL', 'APELLIDO PATERNO LÍDER CONDUCTUAL', 'APELLIDO MATERNO LÍDER CONDUCTUAL', 'M', '2018-07-04 01:23:32', 1, 1, 43, NULL, NULL, NULL, NULL, '2018-07-04 01:23:32', NULL, 1);
INSERT INTO `persona` VALUES(9, 1, 12345683, '1', 'NOMBRE1 PREVENCIONISTA SNS', 'NOMBRE2 PREVENCIONISTA SNS', 'APELLIDO PATERNO PREVENCIONISTA SNS', 'APELLIDO MATERNO PREVENCIONISTA SNS', 'M', '2018-07-04 01:23:33', 1, 1, 43, NULL, NULL, NULL, NULL, '2018-07-04 01:23:33', NULL, 1);
INSERT INTO `persona` VALUES(10, 1, 12345684, '1', 'NOMBRE1 LÍDER AMBIENTAL', 'NOMBRE2 LÍDER AMBIENTAL', 'APELLIDO PATERNO LÍDER AMBIENTAL', 'APELLIDO MATERNO LÍDER AMBIENTAL', 'M', '2018-07-04 01:23:34', 1, 1, 43, NULL, NULL, NULL, NULL, '2018-07-04 01:23:34', NULL, 1);
INSERT INTO `persona` VALUES(11, 1, 12345685, '1', 'NOMBRE1 LÍDER ENTRENAMIENTO', 'NOMBRE2 LÍDER ENTRENAMIENTO', 'APELLIDO PATERNO LÍDER ENTRENAMIENTO', 'APELLIDO MATERNO LÍDER ENTRENAMIENTO', 'M', '2018-07-04 01:23:35', 1, 1, 43, NULL, NULL, NULL, NULL, '2018-07-04 01:23:35', NULL, 1);
INSERT INTO `persona` VALUES(12, 1, 12345686, '1', 'NOMBRE1 GERENTE DE ÁREA/ESPECIALIDAD MOVIMIENTO DE TIERRA', 'NOMBRE2 GERENTE DE ÁREA/ESPECIALIDAD MOVIMIENTO DE TIERRA', 'APELLIDO PATERNO GERENTE DE ÁREA/ESPECIALIDAD MOVIMIENTO DE TIERRA', 'APELLIDO MATERNO GERENTE DE ÁREA/ESPECIALIDAD MOVIMIENTO DE TIERRA', 'M', '2018-07-04 01:23:36', 1, 1, 43, NULL, NULL, NULL, NULL, '2018-07-04 01:23:36', NULL, 1);
INSERT INTO `persona` VALUES(13, 1, 12345687, '1', 'NOMBRE1 JEFE DE ÁREA/ESPECIALIDAD MOVIMIENTO DE TIERRA', 'NOMBRE2 JEFE DE ÁREA/ESPECIALIDAD MOVIMIENTO DE TIERRA', 'APELLIDO PATERNO JEFE DE ÁREA/ESPECIALIDAD MOVIMIENTO DE TIERRA', 'APELLIDO MATERNO JEFE DE ÁREA/ESPECIALIDAD MOVIMIENTO DE TIERRA', 'M', '2018-07-04 01:23:37', 1, 1, 43, NULL, NULL, NULL, NULL, '2018-07-04 01:23:37', NULL, 1);
INSERT INTO `persona` VALUES(14, 1, 12345688, '1', 'NOMBRE1 SUPERVISOR DE ÁREA/ESPECIALIDAD MOVIMIENTO DE TIERRA', 'NOMBRE2 SUPERVISOR DE ÁREA/ESPECIALIDAD MOVIMIENTO DE TIERRA', 'APELLIDO PATERNO SUPERVISOR DE ÁREA/ESPECIALIDAD MOVIMIENTO DE TIERRA', 'APELLIDO MATERNO SUPERVISOR DE ÁREA/ESPECIALIDAD MOVIMIENTO DE TIERRA', 'M', '2018-07-04 01:23:38', 1, 1, 43, NULL, NULL, NULL, NULL, '2018-07-04 01:23:38', NULL, 1);
INSERT INTO `persona` VALUES(15, 1, 12345689, '1', 'NOMBRE1 MAESTRO MAYOR MOVIMIENTO DE TIERRA', 'NOMBRE2 MAESTRO MAYOR MOVIMIENTO DE TIERRA', 'APELLIDO PATERNO MAESTRO MAYOR MOVIMIENTO DE TIERRA', 'APELLIDO MATERNO MAESTRO MAYOR MOVIMIENTO DE TIERRA', 'M', '2018-07-04 01:23:39', 1, 1, 43, NULL, NULL, NULL, NULL, '2018-07-04 01:23:39', NULL, 1);
INSERT INTO `persona` VALUES(16, 1, 12345690, '1', 'NOMBRE1 MAESTRO PRIMERA MOVIMIENTO DE TIERRA', 'NOMBRE2 MAESTRO PRIMERA MOVIMIENTO DE TIERRA', 'APELLIDO PATERNO MAESTRO PRIMERA MOVIMIENTO DE TIERRA', 'APELLIDO MATERNO MAESTRO PRIMERA MOVIMIENTO DE TIERRA', 'M', '2018-07-04 01:23:40', 1, 1, 43, NULL, NULL, NULL, NULL, '2018-07-04 01:23:40', NULL, 1);
INSERT INTO `persona` VALUES(17, 1, 12345691, '1', 'NOMBRE1 MAESTRO SEGUNDA MOVIMIENTO DE TIERRA', 'NOMBRE2 MAESTRO SEGUNDA MOVIMIENTO DE TIERRA', 'APELLIDO PATERNO MAESTRO SEGUNDA MOVIMIENTO DE TIERRA', 'APELLIDO MATERNO MAESTRO SEGUNDA MOVIMIENTO DE TIERRA', 'M', '2018-07-04 01:23:41', 1, 1, 43, NULL, NULL, NULL, NULL, '2018-07-04 01:23:41', NULL, 1);
INSERT INTO `persona` VALUES(18, 1, 12345692, '1', 'NOMBRE1 AYUDANTE MOVIMIENTO DE TIERRA', 'NOMBRE2 AYUDANTE MOVIMIENTO DE TIERRA', 'APELLIDO PATERNO AYUDANTE MOVIMIENTO DE TIERRA', 'APELLIDO MATERNO AYUDANTE MOVIMIENTO DE TIERRA', 'M', '2018-07-04 01:23:42', 1, 1, 43, NULL, NULL, NULL, NULL, '2018-07-04 01:23:42', NULL, 1);
INSERT INTO `persona` VALUES(19, 1, 12345693, '1', 'NOMBRE1 GERENTE DE ÁREA/ESPECIALIDAD OO.CC Y ESTRUCTURAS', 'NOMBRE2 GERENTE DE ÁREA/ESPECIALIDAD OO.CC Y ESTRUCTURAS', 'APELLIDO PATERNO GERENTE DE ÁREA/ESPECIALIDAD OO.CC Y ESTRUCTURAS', 'APELLIDO MATERNO GERENTE DE ÁREA/ESPECIALIDAD OO.CC Y ESTRUCTURAS', 'M', '2018-07-04 01:23:43', 1, 1, 43, NULL, NULL, NULL, NULL, '2018-07-04 01:23:43', NULL, 1);
INSERT INTO `persona` VALUES(20, 1, 12345694, '1', 'NOMBRE1 JEFE DE ÁREA/ESPECIALIDAD OO.CC Y ESTRUCTURAS', 'NOMBRE2 JEFE DE ÁREA/ESPECIALIDAD OO.CC Y ESTRUCTURAS', 'APELLIDO PATERNO JEFE DE ÁREA/ESPECIALIDAD OO.CC Y ESTRUCTURAS', 'APELLIDO MATERNO JEFE DE ÁREA/ESPECIALIDAD OO.CC Y ESTRUCTURAS', 'M', '2018-07-04 01:23:44', 1, 1, 43, NULL, NULL, NULL, NULL, '2018-07-04 01:23:44', NULL, 1);
INSERT INTO `persona` VALUES(21, 1, 12345695, '1', 'NOMBRE1 SUPERVISOR DE ÁREA/ESPECIALIDAD OO.CC Y ESTRUCTURAS', 'NOMBRE2 SUPERVISOR DE ÁREA/ESPECIALIDAD OO.CC Y ESTRUCTURAS', 'APELLIDO PATERNO SUPERVISOR DE ÁREA/ESPECIALIDAD OO.CC Y ESTRUCTURAS', 'APELLIDO MATERNO SUPERVISOR DE ÁREA/ESPECIALIDAD OO.CC Y ESTRUCTURAS', 'M', '2018-07-04 01:23:45', 1, 1, 43, NULL, NULL, NULL, NULL, '2018-07-04 01:23:45', NULL, 1);
INSERT INTO `persona` VALUES(22, 1, 12345696, '1', 'NOMBRE1 MAESTRO MAYOR OO.CC Y ESTRUCTURAS', 'NOMBRE2 MAESTRO MAYOR OO.CC Y ESTRUCTURAS', 'APELLIDO PATERNO MAESTRO MAYOR OO.CC Y ESTRUCTURAS', 'APELLIDO MATERNO MAESTRO MAYOR OO.CC Y ESTRUCTURAS', 'M', '2018-07-04 01:23:46', 1, 1, 43, NULL, NULL, NULL, NULL, '2018-07-04 01:23:46', NULL, 1);
INSERT INTO `persona` VALUES(23, 1, 12345697, '1', 'NOMBRE1 MAESTRO PRIMERA OO.CC Y ESTRUCTURAS', 'NOMBRE2 MAESTRO PRIMERA OO.CC Y ESTRUCTURAS', 'APELLIDO PATERNO MAESTRO PRIMERA OO.CC Y ESTRUCTURAS', 'APELLIDO MATERNO MAESTRO PRIMERA OO.CC Y ESTRUCTURAS', 'M', '2018-07-04 01:23:47', 1, 1, 43, NULL, NULL, NULL, NULL, '2018-07-04 01:23:47', NULL, 1);
INSERT INTO `persona` VALUES(24, 1, 12345698, '1', 'NOMBRE1 MAESTRO SEGUNDA OO.CC Y ESTRUCTURAS', 'NOMBRE2 MAESTRO SEGUNDA OO.CC Y ESTRUCTURAS', 'APELLIDO PATERNO MAESTRO SEGUNDA OO.CC Y ESTRUCTURAS', 'APELLIDO MATERNO MAESTRO SEGUNDA OO.CC Y ESTRUCTURAS', 'M', '2018-07-04 01:23:48', 1, 1, 43, NULL, NULL, NULL, NULL, '2018-07-04 01:23:48', NULL, 1);
INSERT INTO `persona` VALUES(25, 1, 12345699, '1', 'NOMBRE1 AYUDANTE OO.CC Y ESTRUCTURAS', 'NOMBRE2 AYUDANTE OO.CC Y ESTRUCTURAS', 'APELLIDO PATERNO AYUDANTE OO.CC Y ESTRUCTURAS', 'APELLIDO MATERNO AYUDANTE OO.CC Y ESTRUCTURAS', 'M', '2018-07-04 01:23:49', 1, 1, 43, NULL, NULL, NULL, NULL, '2018-07-04 01:23:49', NULL, 1);
INSERT INTO `persona` VALUES(26, 1, 12345700, '1', 'NOMBRE1 GERENTE DE ÁREA/ESPECIALIDAD PIPING Y GEO-SINTÉTICOS', 'NOMBRE2 GERENTE DE ÁREA/ESPECIALIDAD PIPING Y GEO-SINTÉTICOS', 'APELLIDO PATERNO GERENTE DE ÁREA/ESPECIALIDAD PIPING Y GEO-SINTÉTICOS', 'APELLIDO MATERNO GERENTE DE ÁREA/ESPECIALIDAD PIPING Y GEO-SINTÉTICOS', 'M', '2018-07-04 01:23:50', 1, 1, 43, NULL, NULL, NULL, NULL, '2018-07-04 01:23:50', NULL, 1);
INSERT INTO `persona` VALUES(27, 1, 12345701, '1', 'NOMBRE1 JEFE DE ÁREA/ESPECIALIDAD PIPING Y GEO-SINTÉTICOS', 'NOMBRE2 JEFE DE ÁREA/ESPECIALIDAD PIPING Y GEO-SINTÉTICOS', 'APELLIDO PATERNO JEFE DE ÁREA/ESPECIALIDAD PIPING Y GEO-SINTÉTICOS', 'APELLIDO MATERNO JEFE DE ÁREA/ESPECIALIDAD PIPING Y GEO-SINTÉTICOS', 'M', '2018-07-04 01:23:51', 1, 1, 43, NULL, NULL, NULL, NULL, '2018-07-04 01:23:51', NULL, 1);
INSERT INTO `persona` VALUES(28, 1, 12345702, '1', 'NOMBRE1 SUPERVISOR DE ÁREA/ESPECIALIDAD PIPING Y GEO-SINTÉTICOS', 'NOMBRE2 SUPERVISOR DE ÁREA/ESPECIALIDAD PIPING Y GEO-SINTÉTICOS', 'APELLIDO PATERNO SUPERVISOR DE ÁREA/ESPECIALIDAD PIPING Y GEO-SINTÉTICOS', 'APELLIDO MATERNO SUPERVISOR DE ÁREA/ESPECIALIDAD PIPING Y GEO-SINTÉTICOS', 'M', '2018-07-04 01:23:52', 1, 1, 43, NULL, NULL, NULL, NULL, '2018-07-04 01:23:52', NULL, 1);
INSERT INTO `persona` VALUES(29, 1, 12345703, '1', 'NOMBRE1 MAESTRO MAYOR PIPING Y GEO-SINTÉTICOS', 'NOMBRE2 MAESTRO MAYOR PIPING Y GEO-SINTÉTICOS', 'APELLIDO PATERNO MAESTRO MAYOR PIPING Y GEO-SINTÉTICOS', 'APELLIDO MATERNO MAESTRO MAYOR PIPING Y GEO-SINTÉTICOS', 'M', '2018-07-04 01:23:53', 1, 1, 43, NULL, NULL, NULL, NULL, '2018-07-04 01:23:53', NULL, 1);
INSERT INTO `persona` VALUES(30, 1, 12345704, '1', 'NOMBRE1 MAESTRO PRIMERA PIPING Y GEO-SINTÉTICOS', 'NOMBRE2 MAESTRO PRIMERA PIPING Y GEO-SINTÉTICOS', 'APELLIDO PATERNO MAESTRO PRIMERA PIPING Y GEO-SINTÉTICOS', 'APELLIDO MATERNO MAESTRO PRIMERA PIPING Y GEO-SINTÉTICOS', 'M', '2018-07-04 01:23:54', 1, 1, 43, NULL, NULL, NULL, NULL, '2018-07-04 01:23:54', NULL, 1);
INSERT INTO `persona` VALUES(31, 1, 12345705, '1', 'NOMBRE1 MAESTRO SEGUNDA PIPING Y GEO-SINTÉTICOS', 'NOMBRE2 MAESTRO SEGUNDA PIPING Y GEO-SINTÉTICOS', 'APELLIDO PATERNO MAESTRO SEGUNDA PIPING Y GEO-SINTÉTICOS', 'APELLIDO MATERNO MAESTRO SEGUNDA PIPING Y GEO-SINTÉTICOS', 'M', '2018-07-04 01:23:55', 1, 1, 43, NULL, NULL, NULL, NULL, '2018-07-04 01:23:55', NULL, 1);
INSERT INTO `persona` VALUES(32, 1, 12345706, '1', 'NOMBRE1 AYUDANTE PIPING Y GEO-SINTÉTICOS', 'NOMBRE2 AYUDANTE PIPING Y GEO-SINTÉTICOS', 'APELLIDO PATERNO AYUDANTE PIPING Y GEO-SINTÉTICOS', 'APELLIDO MATERNO AYUDANTE PIPING Y GEO-SINTÉTICOS', 'M', '2018-07-04 01:23:56', 1, 1, 43, NULL, NULL, NULL, NULL, '2018-07-04 01:23:56', NULL, 1);
INSERT INTO `persona` VALUES(33, 1, 12345707, '1', 'NOMBRE1 GERENTE DE ÁREA/ESPECIALIDAD MINERÍA Y PLANTAS', 'NOMBRE2 GERENTE DE ÁREA/ESPECIALIDAD MINERÍA Y PLANTAS', 'APELLIDO PATERNO GERENTE DE ÁREA/ESPECIALIDAD MINERÍA Y PLANTAS', 'APELLIDO MATERNO GERENTE DE ÁREA/ESPECIALIDAD MINERÍA Y PLANTAS', 'M', '2018-07-04 01:23:57', 1, 1, 43, NULL, NULL, NULL, NULL, '2018-07-04 01:23:57', NULL, 1);
INSERT INTO `persona` VALUES(34, 1, 12345708, '1', 'NOMBRE1 JEFE DE ÁREA/ESPECIALIDAD MINERÍA Y PLANTAS', 'NOMBRE2 JEFE DE ÁREA/ESPECIALIDAD MINERÍA Y PLANTAS', 'APELLIDO PATERNO JEFE DE ÁREA/ESPECIALIDAD MINERÍA Y PLANTAS', 'APELLIDO MATERNO JEFE DE ÁREA/ESPECIALIDAD MINERÍA Y PLANTAS', 'M', '2018-07-04 01:23:58', 1, 1, 43, NULL, NULL, NULL, NULL, '2018-07-04 01:23:58', NULL, 1);
INSERT INTO `persona` VALUES(35, 1, 12345709, '1', 'NOMBRE1 SUPERVISOR DE ÁREA/ESPECIALIDAD MINERÍA Y PLANTAS', 'NOMBRE2 SUPERVISOR DE ÁREA/ESPECIALIDAD MINERÍA Y PLANTAS', 'APELLIDO PATERNO SUPERVISOR DE ÁREA/ESPECIALIDAD MINERÍA Y PLANTAS', 'APELLIDO MATERNO SUPERVISOR DE ÁREA/ESPECIALIDAD MINERÍA Y PLANTAS', 'M', '2018-07-04 01:23:59', 1, 1, 43, NULL, NULL, NULL, NULL, '2018-07-04 01:23:59', NULL, 1);
INSERT INTO `persona` VALUES(36, 1, 12345710, '1', 'NOMBRE1 MAESTRO MAYOR MINERÍA Y PLANTAS', 'NOMBRE2 MAESTRO MAYOR MINERÍA Y PLANTAS', 'APELLIDO PATERNO MAESTRO MAYOR MINERÍA Y PLANTAS', 'APELLIDO MATERNO MAESTRO MAYOR MINERÍA Y PLANTAS', 'M', '2018-07-04 01:23:60', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(37, 1, 12345711, '1', 'NOMBRE1 MAESTRO PRIMERA MINERÍA Y PLANTAS', 'NOMBRE2 MAESTRO PRIMERA MINERÍA Y PLANTAS', 'APELLIDO PATERNO MAESTRO PRIMERA MINERÍA Y PLANTAS', 'APELLIDO MATERNO MAESTRO PRIMERA MINERÍA Y PLANTAS', 'M', '2018-07-04 01:23:61', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(38, 1, 12345712, '1', 'NOMBRE1 MAESTRO SEGUNDA MINERÍA Y PLANTAS', 'NOMBRE2 MAESTRO SEGUNDA MINERÍA Y PLANTAS', 'APELLIDO PATERNO MAESTRO SEGUNDA MINERÍA Y PLANTAS', 'APELLIDO MATERNO MAESTRO SEGUNDA MINERÍA Y PLANTAS', 'M', '2018-07-04 01:23:62', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(39, 1, 12345713, '1', 'NOMBRE1 AYUDANTE MINERÍA Y PLANTAS', 'NOMBRE2 AYUDANTE MINERÍA Y PLANTAS', 'APELLIDO PATERNO AYUDANTE MINERÍA Y PLANTAS', 'APELLIDO MATERNO AYUDANTE MINERÍA Y PLANTAS', 'M', '2018-07-04 01:23:63', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(40, 1, 12345714, '1', 'NOMBRE1 GERENTE DE ÁREA/ESPECIALIDAD ELECTRICIDAD E INSTRUMENTACIÓN', 'NOMBRE2 GERENTE DE ÁREA/ESPECIALIDAD ELECTRICIDAD E INSTRUMENTACIÓN', 'APELLIDO PATERNO GERENTE DE ÁREA/ESPECIALIDAD ELECTRICIDAD E INSTRUMENTACIÓN', 'APELLIDO MATERNO GERENTE DE ÁREA/ESPECIALIDAD ELECTRICIDAD E INSTRUMENTACIÓN', 'M', '2018-07-04 01:23:64', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(41, 1, 12345715, '1', 'NOMBRE1 JEFE DE ÁREA/ESPECIALIDAD ELECTRICIDAD E INSTRUMENTACIÓN', 'NOMBRE2 JEFE DE ÁREA/ESPECIALIDAD ELECTRICIDAD E INSTRUMENTACIÓN', 'APELLIDO PATERNO JEFE DE ÁREA/ESPECIALIDAD ELECTRICIDAD E INSTRUMENTACIÓN', 'APELLIDO MATERNO JEFE DE ÁREA/ESPECIALIDAD ELECTRICIDAD E INSTRUMENTACIÓN', 'M', '2018-07-04 01:23:65', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(42, 1, 12345716, '1', 'NOMBRE1 SUPERVISOR DE ÁREA/ESPECIALIDAD ELECTRICIDAD E INSTRUMENTACIÓN', 'NOMBRE2 SUPERVISOR DE ÁREA/ESPECIALIDAD ELECTRICIDAD E INSTRUMENTACIÓN', 'APELLIDO PATERNO SUPERVISOR DE ÁREA/ESPECIALIDAD ELECTRICIDAD E INSTRUMENTACIÓN', 'APELLIDO MATERNO SUPERVISOR DE ÁREA/ESPECIALIDAD ELECTRICIDAD E INSTRUMENTACIÓN', 'M', '2018-07-04 01:23:66', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(43, 1, 12345717, '1', 'NOMBRE1 MAESTRO MAYOR ELECTRICIDAD E INSTRUMENTACIÓN', 'NOMBRE2 MAESTRO MAYOR ELECTRICIDAD E INSTRUMENTACIÓN', 'APELLIDO PATERNO MAESTRO MAYOR ELECTRICIDAD E INSTRUMENTACIÓN', 'APELLIDO MATERNO MAESTRO MAYOR ELECTRICIDAD E INSTRUMENTACIÓN', 'M', '2018-07-04 01:23:67', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(44, 1, 12345718, '1', 'NOMBRE1 MAESTRO PRIMERA ELECTRICIDAD E INSTRUMENTACIÓN', 'NOMBRE2 MAESTRO PRIMERA ELECTRICIDAD E INSTRUMENTACIÓN', 'APELLIDO PATERNO MAESTRO PRIMERA ELECTRICIDAD E INSTRUMENTACIÓN', 'APELLIDO MATERNO MAESTRO PRIMERA ELECTRICIDAD E INSTRUMENTACIÓN', 'M', '2018-07-04 01:23:68', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(45, 1, 12345719, '1', 'NOMBRE1 MAESTRO SEGUNDA ELECTRICIDAD E INSTRUMENTACIÓN', 'NOMBRE2 MAESTRO SEGUNDA ELECTRICIDAD E INSTRUMENTACIÓN', 'APELLIDO PATERNO MAESTRO SEGUNDA ELECTRICIDAD E INSTRUMENTACIÓN', 'APELLIDO MATERNO MAESTRO SEGUNDA ELECTRICIDAD E INSTRUMENTACIÓN', 'M', '2018-07-04 01:23:69', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(46, 1, 12345720, '1', 'NOMBRE1 AYUDANTE ELECTRICIDAD E INSTRUMENTACIÓN', 'NOMBRE2 AYUDANTE ELECTRICIDAD E INSTRUMENTACIÓN', 'APELLIDO PATERNO AYUDANTE ELECTRICIDAD E INSTRUMENTACIÓN', 'APELLIDO MATERNO AYUDANTE ELECTRICIDAD E INSTRUMENTACIÓN', 'M', '2018-07-04 01:23:70', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(47, 1, 13140700, '9', 'José', 'NOMBRE2 JEFE DE ÁREA/ESPECIALIDAD MAQUINARIAS', 'Muñoz', 'APELLIDO MATERNO JEFE DE ÁREA/ESPECIALIDAD MAQUINARIAS', 'M', '2018-07-04 01:23:71', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(48, 1, 12345722, '1', 'Daniela', 'NOMBRE2 SUPERVISOR DE ÁREA/ESPECIALIDAD MAQUINARIAS', 'Martínez', 'APELLIDO MATERNO SUPERVISOR DE ÁREA/ESPECIALIDAD MAQUINARIAS', 'M', '2018-07-04 01:23:72', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(49, 1, 12345723, '1', 'NOMBRE1 MAESTRO MAYOR MAQUINARIAS - MECÁNICO MANTENCIÓN', 'NOMBRE2 MAESTRO MAYOR MAQUINARIAS - MECÁNICO MANTENCIÓN', 'APELLIDO PATERNO MAESTRO MAYOR MAQUINARIAS - MECÁNICO MANTENCIÓN', 'APELLIDO MATERNO MAESTRO MAYOR MAQUINARIAS - MECÁNICO MANTENCIÓN', 'M', '2018-07-04 01:23:73', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(50, 1, 12345724, '1', 'NOMBRE1 MAESTRO PRIMERA MAQUINARIAS - MECÁNICO MANTENCIÓN', 'NOMBRE2 MAESTRO PRIMERA MAQUINARIAS - MECÁNICO MANTENCIÓN', 'APELLIDO PATERNO MAESTRO PRIMERA MAQUINARIAS - MECÁNICO MANTENCIÓN', 'APELLIDO MATERNO MAESTRO PRIMERA MAQUINARIAS - MECÁNICO MANTENCIÓN', 'M', '2018-07-04 01:23:74', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(51, 1, 12345725, '1', 'NOMBRE1 MAESTRO SEGUNDA MAQUINARIAS - MECÁNICO MANTENCIÓN', 'NOMBRE2 MAESTRO SEGUNDA MAQUINARIAS - MECÁNICO MANTENCIÓN', 'APELLIDO PATERNO MAESTRO SEGUNDA MAQUINARIAS - MECÁNICO MANTENCIÓN', 'APELLIDO MATERNO MAESTRO SEGUNDA MAQUINARIAS - MECÁNICO MANTENCIÓN', 'M', '2018-07-04 01:23:75', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(52, 1, 12345726, '1', 'NOMBRE1 AYUDANTE MAQUINARIAS - MECÁNICO MANTENCIÓN', 'NOMBRE2 AYUDANTE MAQUINARIAS - MECÁNICO MANTENCIÓN', 'APELLIDO PATERNO AYUDANTE MAQUINARIAS - MECÁNICO MANTENCIÓN', 'APELLIDO MATERNO AYUDANTE MAQUINARIAS - MECÁNICO MANTENCIÓN', 'M', '2018-07-04 01:23:76', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(53, 1, 12345727, '1', 'NOMBRE1 JEFE ADQUISICIÓN Y BODEGA', 'NOMBRE2 JEFE ADQUISICIÓN Y BODEGA', 'APELLIDO PATERNO JEFE ADQUISICIÓN Y BODEGA', 'APELLIDO MATERNO JEFE ADQUISICIÓN Y BODEGA', 'M', '2018-07-04 01:23:77', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(54, 1, 12345728, '1', 'NOMBRE1 JEFE BODEGA MAQUINARIAS', 'NOMBRE2 JEFE BODEGA MAQUINARIAS', 'APELLIDO PATERNO JEFE BODEGA MAQUINARIAS', 'APELLIDO MATERNO JEFE BODEGA MAQUINARIAS', 'M', '2018-07-04 01:23:78', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(55, 1, 12345729, '1', 'NOMBRE1 JEFE DE BODEGA', 'NOMBRE2 JEFE DE BODEGA', 'APELLIDO PATERNO JEFE DE BODEGA', 'APELLIDO MATERNO JEFE DE BODEGA', 'M', '2018-07-04 01:23:79', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(56, 1, 12345730, '1', 'NOMBRE1 BODEGUERO', 'NOMBRE2 BODEGUERO', 'APELLIDO PATERNO BODEGUERO', 'APELLIDO MATERNO BODEGUERO', 'M', '2018-07-04 01:23:80', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(57, 1, 12345731, '1', 'NOMBRE1 AYUDANTES PATIO GRÚA', 'NOMBRE2 AYUDANTES PATIO GRÚA', 'APELLIDO PATERNO AYUDANTES PATIO GRÚA', 'APELLIDO MATERNO AYUDANTES PATIO GRÚA', 'M', '2018-07-04 01:23:81', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(58, 1, 12345732, '1', 'NOMBRE1 PAÑOLERO', 'NOMBRE2 PAÑOLERO', 'APELLIDO PATERNO PAÑOLERO', 'APELLIDO MATERNO PAÑOLERO', 'M', '2018-07-04 01:23:82', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(59, 1, 12345733, '1', 'NOMBRE1 JEFE RR.LL', 'NOMBRE2 JEFE RR.LL', 'APELLIDO PATERNO JEFE RR.LL', 'APELLIDO MATERNO JEFE RR.LL', 'M', '2018-07-04 01:23:83', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(60, 1, 12345734, '1', 'NOMBRE1 GERENTE CONTROL DE PROYECTO', 'NOMBRE2 GERENTE CONTROL DE PROYECTO', 'APELLIDO PATERNO GERENTE CONTROL DE PROYECTO', 'APELLIDO MATERNO GERENTE CONTROL DE PROYECTO', 'M', '2018-07-04 01:23:84', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(61, 1, 12345735, '1', 'NOMBRE1 INTEGRADOR DE PROYECTO', 'NOMBRE2 INTEGRADOR DE PROYECTO', 'APELLIDO PATERNO INTEGRADOR DE PROYECTO', 'APELLIDO MATERNO INTEGRADOR DE PROYECTO', 'M', '2018-07-04 01:23:85', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(62, 1, 12345736, '1', 'NOMBRE1 SUBGERENTE DE PROYECTO', 'NOMBRE2 SUBGERENTE DE PROYECTO', 'APELLIDO PATERNO SUBGERENTE DE PROYECTO', 'APELLIDO MATERNO SUBGERENTE DE PROYECTO', 'M', '2018-07-04 01:23:86', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(63, 1, 12345737, '1', 'NOMBRE1 ENCARGADO DE PASAJES', 'NOMBRE2 ENCARGADO DE PASAJES', 'APELLIDO PATERNO ENCARGADO DE PASAJES', 'APELLIDO MATERNO ENCARGADO DE PASAJES', 'M', '2018-07-04 01:23:87', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(64, 1, 12345738, '1', 'NOMBRE1 SERVICIOS GENERALES', 'NOMBRE2 SERVICIOS GENERALES', 'APELLIDO PATERNO SERVICIOS GENERALES', 'APELLIDO MATERNO SERVICIOS GENERALES', 'M', '2018-07-04 01:23:88', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(65, 1, 12345739, '1', 'NOMBRE1 AYUDANTE ADMINISTRATIVO', 'NOMBRE2 AYUDANTE ADMINISTRATIVO', 'APELLIDO PATERNO AYUDANTE ADMINISTRATIVO', 'APELLIDO MATERNO AYUDANTE ADMINISTRATIVO', 'M', '2018-07-04 01:23:89', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(66, 1, 12345740, '1', 'NOMBRE1 TOPÓGRAFO', 'NOMBRE2 TOPÓGRAFO', 'APELLIDO PATERNO TOPÓGRAFO', 'APELLIDO MATERNO TOPÓGRAFO', 'M', '2018-07-04 01:23:90', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(67, 1, 12345741, '1', 'NOMBRE1 ALARIFE', 'NOMBRE2 ALARIFE', 'APELLIDO PATERNO ALARIFE', 'APELLIDO MATERNO ALARIFE', 'M', '2018-07-04 01:23:91', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(68, 1, 12345742, '1', 'NOMBRE1 LABORATORISTA DE SUELOS', 'NOMBRE2 LABORATORISTA DE SUELOS', 'APELLIDO PATERNO LABORATORISTA DE SUELOS', 'APELLIDO MATERNO LABORATORISTA DE SUELOS', 'M', '2018-07-04 01:23:92', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(69, 1, 12345743, '1', 'NOMBRE1 SECRETARIO TÉCNICO', 'NOMBRE2 SECRETARIO TÉCNICO', 'APELLIDO PATERNO SECRETARIO TÉCNICO', 'APELLIDO MATERNO SECRETARIO TÉCNICO', 'M', '2018-07-04 01:23:93', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(70, 1, 12345744, '1', 'NOMBRE1 INSPECTORES DE CALIDAD', 'NOMBRE2 INSPECTORES DE CALIDAD', 'APELLIDO PATERNO INSPECTORES DE CALIDAD', 'APELLIDO MATERNO INSPECTORES DE CALIDAD', 'M', '2018-07-04 01:23:94', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(71, 1, 12345745, '1', 'NOMBRE1 EXPEDITOR / ESCOLTA (CONDUCTOR DE VEHÍCULOS)', 'NOMBRE2 EXPEDITOR / ESCOLTA (CONDUCTOR DE VEHÍCULOS)', 'APELLIDO PATERNO EXPEDITOR / ESCOLTA (CONDUCTOR DE VEHÍCULOS)', 'APELLIDO MATERNO EXPEDITOR / ESCOLTA (CONDUCTOR DE VEHÍCULOS)', 'M', '2018-07-04 01:23:95', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(72, 1, 12345746, '1', 'NOMBRE1 CONDUCTORES DE VEHÍCULOS DE CARRETERA', 'NOMBRE2 CONDUCTORES DE VEHÍCULOS DE CARRETERA', 'APELLIDO PATERNO CONDUCTORES DE VEHÍCULOS DE CARRETERA', 'APELLIDO MATERNO CONDUCTORES DE VEHÍCULOS DE CARRETERA', 'M', '2018-07-04 01:23:96', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(73, 1, 12345747, '1', 'NOMBRE1 OPERADORES DE EQUIPO MÓVIL', 'NOMBRE2 OPERADORES DE EQUIPO MÓVIL', 'APELLIDO PATERNO OPERADORES DE EQUIPO MÓVIL', 'APELLIDO MATERNO OPERADORES DE EQUIPO MÓVIL', 'M', '2018-07-04 01:23:97', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `persona` VALUES(74, 1, 12345748, '1', 'NOMBRE1 VISITA - VENDOR (REVISAR ÁREAS DE EXPOSICIÓN VENDOR CON EMIN)', 'NOMBRE2 VISITA - VENDOR (REVISAR ÁREAS DE EXPOSICIÓN VENDOR CON EMIN)', 'APELLIDO PATERNO VISITA - VENDOR (REVISAR ÁREAS DE EXPOSICIÓN VENDOR CON EMIN)', 'APELLIDO MATERNO VISITA - VENDOR (REVISAR ÁREAS DE EXPOSICIÓN VENDOR CON EMIN)', 'M', '2018-07-04 01:23:98', 1, 1, 43, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

DROP TABLE IF EXISTS `pregunta`;
CREATE TABLE `pregunta` (
  `preg_codigo` int(11) NOT NULL,
  `preg_t_pregunta` int(11) DEFAULT NULL,
  `preg_contexto` varchar(255) DEFAULT NULL,
  `preg_descripcion` varchar(255) DEFAULT NULL,
  `preg_r_fecha_creacion` datetime DEFAULT NULL,
  `preg_r_fecha_modificacion` datetime DEFAULT NULL,
  `preg_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` VALUES(1, 1, NULL, 'CRUZAR CALLES Y VÍAS DE CIRCULACIÓN DE VEHÍCULOS POR PASOS NO AUTORIZADOS, ES UN ACTO RIESGOSO.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(2, 1, NULL, 'CRUZAR LA CALLE MIRANDO EL TELÉFONO CELULAR ES UN ACTO SEGURO.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(3, 1, NULL, 'CRUZAR LA CALLE POR PASOS PEATONALES HABILITADOS (EJ, PASO CEBRA) EVITA QUE PEATONES SEAN ATROPELLADOS .', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(4, 1, NULL, 'EL USO DE TELÉFONOS CELULARES AL MOMENTO DE CAMINAR Y CRUZAR CALLES ES UN ACTO SEGURO.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(5, 1, NULL, 'ANTES DE CRUZAR UNA CALLE POR PASO CEBRA, USTED DEBE ASEGURARSE VISUALMENTE DE QUE NO SE ACERCAN VEHÍCULOS.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(6, 1, NULL, 'PUNTO CIEGO DE UN VEHÍCULO O EQUIPO MÓVIL, SON SECTORES ALREDEDOR DEL EQUIPO EN LOS CUALES NO ES VISIBLE LA PRESENCIA DE PERSONAS, VEHÍCULOS Y OTROS EQUIPOS.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(7, 1, NULL, 'CRUZAR CORRIENDO CALLES Y VÍAS DE CIRCULACIÓN DE VEHÍCULOS, ES UN ACTO SEGURO.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(8, 1, NULL, 'TODO VEHÍCULO Y EQUIPO MÓVIL POSEEN PUNTOS CIEGOS.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(9, 1, NULL, 'USO DE ROPA DE SEGURIDAD CON COLORES LLAMATIVOS (EJ: NARANJO, ROJO O AMARILLO – VERDE FLUORESCENTE) CON CINTAS REFLECTANTES, FACILITA LA VISIBILIDAD DE LOS TRABAJADORES EN TERRENO PARA LOS OPERADORES DE EQUIPOS MÓVILES.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(10, 1, NULL, 'LA PRESENCIA DE PERSONAS CERCA DE EQUIPOS MÓVILES EN MOVIMIENTO GENERA RIESGO DE ACCIDENTE POR IMPACTO PERSONA EQUIPO.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(11, 1, NULL, 'TODO EQUIPO MÓVIL CUENTA CON DISPOSITIVOS QUE DETECTEN LA PRESENCIA DE PERSONAS CERCA DE PUNTOS CIEGOS.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(12, 1, NULL, 'ES BUENA PRÁCTICA SEGREGAR CADA SECTOR DE APARCAMIENTO DE EQUIPOS MÓVILES .', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(13, 1, NULL, 'LAS CONSECUENCIAS ACCIDENTES POR INTERACCIÓN DE TRABAJADORES CON EQUIPOS MÓVILES EN MOVIMIENTO, SON LESIONES LEVES.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(14, 1, NULL, 'CONOCER LAS CONSECUENCIAS DEL RIESGO DE IMPACTO VEHÍCULO PERSONA EQUIPO, CONTRIBUYE A EVITAR ACCIDENTES.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(15, 1, NULL, 'RIESGO DE IMPACTO VEHÍCULO PERSONA EQUIPO EXISTE SIEMPRE PARA LAS PERSONAS QUE ESTÁN CERCA O INTERACTÚAN CON VEHÍCULOS Y EQUIPOS MÓVILES EN MOVIMIENTO. .', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(16, 1, NULL, 'LOS SONIDOS Y ALARMAS DE EQUIPOS MÓVILES SON SIEMPRE AUDIBLES (PERCIBIDOS POR OÍDO HUMANO).', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(17, 1, NULL, 'ESTABLECER COMUNICACIÓN VISUAL ENTRE PEATÓN Y CONDUCTOR DE VEHÍCULO, ES UNA BUENA PRÁCTICA QUE EVITARA ACCIDENTES AL CRUZAR LA CALLE.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(18, 1, NULL, 'SEGREGAR ÁREAS EN LAS CUALES EXISTEN VEHÍCULOS O EQUIPOS MÓVILES EN MOVIMIENTO Y PERSONAS CERCANAS EVITARA ACCIDENTES.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(19, 1, NULL, 'EXPOSICIÓN DE PERSONAS A LA “LÍNEA DE FUEGO” ES EXPONERSE A LA TRAYECTORIA DE MOVIMIENTO DE ALGÚN VEHÍCULO O EQUIPO MÓVIL.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(20, 1, NULL, 'EXPOSICIÓN A LÍNEA DE FUEGO ES EXPONERSE A QUEMADURAS.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(21, 1, NULL, 'EXPONERSE A LA TRAYECTORIA DE MOVIMIENTO DE ALGÚN VEHÍCULO O EQUIPO MÓVIL, ES “EXPOSICIÓN A LÍNEA DE FUEGO”.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(22, 1, NULL, 'USTED PUEDE INGRESAR A UN ÁREA SEGREGADA EN LA CUAL EXISTEN EQUIPOS MÓVILES EN OPERACIÓN.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(23, 1, NULL, 'LETREROS O SEÑALÉTICA INFORMATIVA “SOLICITE AUTORIZACIÓN PARA INGRESAR ESTA ÁREA”, AYUDA A EVITAR ACCIDENTE POR IMPACTO VEHÍCULO PERSONA EQUIPO.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(24, 1, NULL, 'LA SEÑALÉTICA INFORMATIVA DE RIESGOS EN LAS DISTINTAS ÁREAS DE INSTALACIONES DE FAENA Y LAY OUT, AYUDA A EVITAR ACCIDENTES.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(25, 1, NULL, 'AYUDA A EVITAR ACCIDENTES IDENTIFICAR LAS ÁREAS TRABAJO DONDE EXISTE EL RIESGO DE IMPACTO VEHÍCULO PERSONA EQUIPO.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(26, 1, NULL, 'LAS VÍAS PEATONALES DEBEN ESTAR IDENTIFICADAS, SEÑALIZADAS Y SEGREGADAS.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(27, 1, NULL, 'CONOCER LOS PUNTOS CIEGOS DE EQUIPOS MÓVILES EVITA EXPONERSE A LÍNEA DE FUEGO.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(28, 1, NULL, 'PUNTO CIEGO DE VEHÍCULOS Y EQUIPOS MÓVILES SON LUGARES ALREDEDOR EN LOS CUALES LAS PERSONAS NO SON VISIBLES PARA LOS CONDUCTORES Y OPERADORES DE ESTOS EQUIPOS.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(29, 1, NULL, 'TODOS LOS EQUIPOS MÓVILES CUENTAN CON DISPOSITIVOS DE SEGURIDAD QUE DETECTEN LA PRESENCIA DE PERSONAS EN PUNTOS CIEGOS.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(30, 1, NULL, 'LAS GRÚAS HORQUILLA SIRVA PARA TRASLADAR TRABAJADORES.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(31, 1, NULL, 'CUALQUIER TRABAJADOR PUEDE OPERAR EQUIPOS MÓVILES.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(32, 1, NULL, 'ES OBLIGACIÓN CONTAR CON EXPERIENCIA, ENTRENAMIENTO PREVIO Y CERTIFICACIÓN POR ENTE COMPETENTE PARA OPERAR EQUIPO MÓVIL.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(33, 1, NULL, 'LOS EQUIPOS MÓVILES ESTÁN DISEÑADOS PARA CARGAR, TRASLADAR E IZAR TRABAJADORES.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(34, 1, NULL, 'TODO OPERADOR DE EQUIPO MÓVIL DEBE CONTAR CON CERTIFICACIÓN POR ENTE COMPETENTE QUE ACREDITE SU IDONEIDAD PARA OPERAR EQUIPO MÓVIL ESPECIFICO.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(35, 2, NULL, 'EN QUÉ SITUACIONES SE DELIMITA EL ÁREA DE TRABAJO, MEDIANTE CONOS REFLECTANTES:', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(36, 2, NULL, 'EN QUÉ SITUACIONES SE SEGREGA EL ÁREA DE TRABAJO, MEDIANTE PRETILES DE SEGURIDAD O BARRERAS NEW JERSEY DE HORMIGÓN:', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(37, 2, NULL, '¿CUÁLES SON CAUSAS DE ACCIDENTE POR IMPACTO VEHÍCULO PERSONA EQUIPO?', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(38, 2, NULL, '¿CUÁLES SON CAUSAS DE ACCIDENTE POR IMPACTO VEHÍCULO PERSONA EQUIPO?', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(39, 2, NULL, '¿CUÁL ES CONSECUENCIA (DAÑO A PERSONA) A CAUSA DE ACCIDENTE POR IMPACTO VEHÍCULO PERSONA EQUIPO? ', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(40, 2, NULL, '¿CUÁL ES CONSECUENCIA (DAÑO A PERSONA) A CAUSA DE ACCIDENTE POR INTERACCIÓN HOMBRE - MÁQUINA?', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(41, 1, NULL, 'SEGREGAR ÁREAS EN LAS CUALES EXISTEN VEHÍCULOS O EQUIPOS MÓVILES, MEDIANTE PRETILES DE SEGURIDAD, ES UNA BUENA PRÁCTICA PARA EVITAR ACCIDENTES.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(42, 1, NULL, 'SEGREGAR ES LO MISMO QUE DELIMITAR.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(43, 1, NULL, 'SEGREGAR ES IMPLEMENTAR BARRERAS DURAS COMO PRETILES DE SEGURIDAD O BARRERAS NEW JERSEY DE HORMIGÓN.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(44, 1, NULL, 'DELIMITAR ES IMPLEMENTAR BARRERAS BLANDAS COMO CONOS CON CADENAS O LÍNEAS EN EL SUELO.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(45, 1, NULL, 'DELIMITAR ES IMPLEMENTAR BARRERAS DURAS COMO PRETILES DE SEGURIDAD O BARRERAS NEW JERSEY DE HORMIGÓN.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(46, 1, NULL, 'SEGREGAR ES IMPLEMENTAR BARRERAS BLANDAS COMO CONOS CON CADENAS O LÍNEAS EN EL SUELO.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(47, 1, NULL, 'SEÑALIZAR Y DEMARCAR LAS VÍAS DE TRÁNSITO Y CRUCES PEATONALES ES UNA BUENA PRÁCTICA.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(48, 1, NULL, 'LOS ESTACIONAMIENTOS DE EQUIPOS MÓVILES Y VEHÍCULOS DEBEN ESTAR DELIMITADOS MEDIANTE BARRERAS BLANDAS COMO CONOS Y CADENAS PLÁSTICAS.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(49, 1, NULL, 'LOS ESTACIONAMIENTOS DE EQUIPOS MÓVILES Y VEHÍCULOS DEBEN ESTAR SEGREGADOS MEDIANTE BARRERAS DURAS COMO PRETILES DE SEGURIDAD O BARRERAS NEW JERSEY DE HORMIGÓN.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(50, 1, NULL, 'SEGREGAR BAÑOS QUÍMICOS Y GARITAS MEDIANTE PRETILES DE SEGURIDAD, ES UNA BUENA PRACTICA PARA EVITAR ACCIDENTES POR IMPACTOEHÍCULO PERSONA EQUIPO.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(51, 1, NULL, 'DELIMITAR BAÑOS QUÍMICOS Y GARITAS MEDIANTE CONOS Y CADENAS PLÁSTICAS, ES UNA BUENA PRÁCTICA PARA EVITAR ACCIDENTES POR IMPACTOEHÍCULO PERSONA EQUIPO.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(52, 1, NULL, 'USAR RADIO PARA COMUNICARSE ENTRE EQUIPOS MÓVILES, ES UNA BUENA PRÁCTICA PARA EVITAR ACCIDENTES.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(53, 1, NULL, 'CONTAR CON MEDIOS DE COMUNICACIÓN EFECTIVOS “RADIOS” PARA CONDUCTORES DE VEHÍCULOS Y OPERADORES DE EQUIPOS MÓVILES, ES UNA BUENA PRÁCTICA PARA EVITAR ACCIDENTES.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(54, 1, NULL, 'SOLICITAR AUTORIZACIÓN PARA INGRESAR A UN ÁREA SEGREGADA EN LA CUAL OPERAN EQUIPOS MÓVILES, ES UNA MALA PRÁCTICA.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(55, 1, NULL, 'LAS VÍAS DE TRÁNSITO PEATONAL, CRUCES, ZONAS DE ESTACIONAMIENTO DE VEHÍCULOS Y EQUIPOS MÓVILES, BAÑOS QUÍMICOS, OFICINAS, PEE Y PEA, SE IDENTIFICAN PLANOS DE INSTALACIONES DEAENA Y LAY OUT.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(56, 1, NULL, 'ES ÚTIL CONOCER LA UBICACIÓN DE VÍAS DE TRÁNSITO PEATONAL, CRUCES, ZONAS DE ESTACIONAMIENTO DE VEHÍCULOS Y EQUIPOS MÓVILES, BAÑOS QUÍMICOS, OFICINAS, PEE Y PEA REPRESENTADOS EN PLANOS DE INSTALACIONES DEAENA Y LAY OUT.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(57, 1, NULL, 'ES UNA MALA PRÁCTICA IDENTIFICAR, SEÑALIZAR Y SEGREGADAS LAS VÍAS PEATONALES.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(58, 1, NULL, 'ES UNA BUENA PRÁCTICA DEMARCAR Y SEGREGAR LAS VÍAS PEATONALES EN TALLERES DE MANTENCIÓN PARA EVITAR ACCIDENTES POR IMPACTO CON EQUIPOS MÓVILES.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(59, 1, NULL, 'ES UNA MALA PRÁCTICA DEMARCAR Y SEGREGAR LAS VÍAS PEATONALES EN TALLERES DE MANTENCIÓN PARA EVITAR ACCIDENTES POR IMPACTO CON EQUIPOS MÓVILES.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(60, 1, NULL, 'ES UNA BUENA PRÁCTICA SUBIR A UN EQUIPO MÓVIL EN MOVIMIENTO.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(61, 1, NULL, 'ANTES DE OPERAR UN EQUIPO MÓVIL, ES NECESARIO CONOCER SUS RANGOS DE MOVIMIENTO Y PUNTOS CIEGOS, PARA EVITAR EXPONERSE A RIESGO DE IMPACTO EQUIPO PERSONA.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(62, 1, NULL, 'ES UNA MALA PRÁCTICA IDENTIFICAR Y EVALUAR LOS RIESGOS DE LOS PUNTOS CIEGOS DE EQUIPOS Y MAQUINARIAS, PREVIO A INICIAR LABORES.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(63, 1, NULL, 'SABER DÓNDE ESTÁN Y PROBAR SI ESTÁN OPERATIVAS LAS PARADAS DE EMERGENCIA DE EQUIPOS Y MÁQUINAS, ES UNA BUENA PRÁCTICA.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(64, 1, NULL, 'ES UNA BUENA PRACTICA INSTALAR DISPOSITIVOS DE SEGURIDAD EN MÁQUINAS Y EQUIPOS MÓVILES (EJ: SENSORES DE MOVIMIENTO Y BLOQUEO DE RADIOS DE GIRO) PARA EVITAR RIESGOS DE IMPACTO PERSONA EQUIPO.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(65, 1, NULL, 'ES UNA BUENA PRÁCTICA DEMARCAR Y SEÑALIZAR PASOS PEATONALES CON TACHAS, LUCES, CINTAS REFLECTANTES Y SEÑALÉTICAS PARE DE COLORES DE ALTAISIBILIDAD, PARA SER RECONOCIDOS POR CONDUCTORES Y PARA PEATONES.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(66, 1, NULL, 'UTILIZAR CHALECO REFLECTANTE DE COLORES DE ALTAISIBILIDAD, ES UNA BUENA PRÁCTICA PARA SERISIBLE PARA CONDUCTORES DE VEHÍCULOS Y OPERADORES DE EQUIPOS MÓVILES EN TERRENO.', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(67, 2, NULL, '¿CUÁL ES UN CONTROL CRÍTICO PARA PREVENIR ACCIDENTES POR IMPACTO VEHÍCULO PERSONA EQUIPO?', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(68, 2, NULL, '¿CUÁL ES UN CONTROL CRÍTICO PARA PREVENIR ACCIDENTES POR IMPACTO VEHÍCULO PERSONA EQUIPO?', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(69, 2, NULL, '¿CUÁL ES UN CONTROL CRÍTICO PARA PREVENIR ACCIDENTES POR IMPACTO VEHÍCULO PERSONA EQUIPO?', '2010-08-18 01:16:00', NULL, 1);
INSERT INTO `pregunta` VALUES(70, 2, NULL, '¿CUÁL ES UN CONTROL CRÍTICO PARA PREVENIR ACCIDENTES POR INTERACCIÓN HOMBRE- MÁQUINA?', '2010-08-18 01:16:00', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propel_migration`
--

DROP TABLE IF EXISTS `propel_migration`;
CREATE TABLE `propel_migration` (
  `version` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `propel_migration`
--

INSERT INTO `propel_migration` VALUES(1534482650);
INSERT INTO `propel_migration` VALUES(1534483555);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

DROP TABLE IF EXISTS `provincia`;
CREATE TABLE `provincia` (
  `prov_codigo` int(11) NOT NULL DEFAULT '0',
  `prov_nombre` varchar(55) DEFAULT NULL,
  `prov_c_region` int(11) DEFAULT NULL,
  `prov_r_fecha_creacion` datetime DEFAULT NULL,
  `prov_r_fecha_modificacion` datetime DEFAULT NULL,
  `prov_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` VALUES(1, 'Arica', 15, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(2, 'Parinacota', 15, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(3, 'Iquique', 1, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(4, 'Tamarugal', 1, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(5, 'Antofagasta', 2, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(6, 'El Loa', 2, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(7, 'Tocopilla', 2, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(8, 'Copiapó', 3, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(9, 'Chañaral', 3, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(10, 'Huasco', 3, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(11, 'Elqui', 4, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(12, 'Choapa', 4, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(13, 'Limarí', 4, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(14, 'Valparaíso', 5, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(15, 'Isla de Pascua', 5, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(16, 'Los Andes', 5, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(17, 'Petorca', 5, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(18, 'Quillota', 5, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(19, 'San Antonio', 5, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(20, 'San Felipe de Aconcagua', 5, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(21, 'Marga Marga', 5, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(22, 'Cachapoal', 6, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(23, 'Cardenal Caro', 6, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(24, 'Colchagua', 6, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(25, 'Talca', 7, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(26, 'Cauquenes', 7, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(27, 'Curicó', 7, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(28, 'Linares', 7, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(29, 'Concepción', 8, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(30, 'Arauco', 8, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(31, 'Biobío', 8, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(32, 'Ñuble', 8, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(33, 'Cautín', 9, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(34, 'Malleco', 9, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(35, 'Valdivia', 14, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(36, 'Ranco', 14, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(37, 'Llanquihue', 10, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(38, 'Chiloé', 10, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(39, 'Osorno', 10, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(40, 'Palena', 10, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(41, 'Coihaique', 11, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(42, 'Aisén', 11, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(43, 'Capitán Prat', 11, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(44, 'General Carrera', 11, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(45, 'Magallanes', 12, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(46, 'Antártica Chilena', 12, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(47, 'Tierra del Fuego', 12, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(48, 'Última Esperanza', 12, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(49, 'Santiago', 13, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(50, 'Cordillera', 13, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(51, 'Chacabuco', 13, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(52, 'Maipo', 13, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(53, 'Melipilla', 13, '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `provincia` VALUES(54, 'Talagante', 13, '2018-08-01 04:01:14', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `region`
--

DROP TABLE IF EXISTS `region`;
CREATE TABLE `region` (
  `regi_codigo` int(11) NOT NULL DEFAULT '0',
  `regi_nombre` varchar(55) DEFAULT NULL,
  `regi_iso_3166_2_cl` varchar(10) DEFAULT NULL,
  `regi_r_fecha_creacion` datetime DEFAULT NULL,
  `regi_r_fecha_modificacion` datetime DEFAULT NULL,
  `regi_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `region`
--

INSERT INTO `region` VALUES(1, 'Tarapacá', 'CL-TA', '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `region` VALUES(2, 'Antofagasta', 'CL-AN', '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `region` VALUES(3, 'Atacama', 'CL-AT', '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `region` VALUES(4, 'Coquimbo', 'CL-CO', '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `region` VALUES(5, 'Valparaíso', 'CL-VS', '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `region` VALUES(6, 'Región del Libertador Gral. Bernardo O’Higgins', 'CL-LI', '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `region` VALUES(7, 'Región del Maule', 'CL-ML', '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `region` VALUES(8, 'Región del Biobío', 'CL-BI', '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `region` VALUES(9, 'Región de la Araucanía', 'CL-AR', '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `region` VALUES(10, 'Región de Los Lagos', 'CL-LL', '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `region` VALUES(11, 'Región Aisén del Gral. Carlos Ibáñez del Campo', 'CL-AI', '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `region` VALUES(12, 'Región de Magallanes y de la Antártica Chilena', 'CL-MA', '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `region` VALUES(13, 'Región Metropolitana de Santiago', 'CL-RM', '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `region` VALUES(14, 'Región de Los Ríos', 'CL-LR', '2018-08-01 04:01:14', NULL, 1);
INSERT INTO `region` VALUES(15, 'Arica y Parinacota', 'CL-AP', '2018-08-01 04:01:14', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta_aplicada`
--

DROP TABLE IF EXISTS `respuesta_aplicada`;
CREATE TABLE `respuesta_aplicada` (
  `reap_c_actividad` int(11) NOT NULL,
  `reap_numero_dictacion` int(11) NOT NULL,
  `reap_c_evaluacion` int(11) NOT NULL,
  `reap_numero_evaluacion` int(11) NOT NULL,
  `reap_c_trabajador` int(11) NOT NULL,
  `reap_c_pregunta` int(11) NOT NULL,
  `reap_c_opcion_pregunta` int(11) NOT NULL,
  `reap_e_respuesta_aplicada` int(11) DEFAULT NULL,
  `reap_vigente` int(1) DEFAULT NULL,
  `reap_r_fecha_creacion` datetime DEFAULT NULL,
  `reap_r_fecha_modificacion` datetime DEFAULT NULL,
  `reap_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `respuesta_aplicada`
--

-- INSERT INTO `respuesta_aplicada` VALUES(4, 1, 2, 1, 44, 1, 0, 1, 1, '2018-08-15 05:26:10', NULL, 1);
-- INSERT INTO `respuesta_aplicada` VALUES(4, 1, 2, 1, 44, 2, 0, 1, 1, '2018-08-15 05:27:32', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

DROP TABLE IF EXISTS `seccion`;
CREATE TABLE `seccion` (
  `secc_codigo` int(11) NOT NULL,
  `secc_descripcion` varchar(255) DEFAULT NULL,
  `secc_vigente` int(1) DEFAULT NULL,
  `secc_r_fecha_creacion` datetime DEFAULT NULL,
  `secc_r_fecha_modificacion` datetime DEFAULT NULL,
  `secc_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` VALUES(1, 'GENERAL', 1, '2018-08-02 05:59:12', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

DROP TABLE IF EXISTS `trabajador`;
CREATE TABLE `trabajador` (
  `trab_codigo` int(11) NOT NULL,
  `trab_c_persona` int(11) NOT NULL,
  `trab_c_cargo` int(11) NOT NULL,
  `trab_c_gerencia` int(11) NOT NULL,
  `trab_c_area` int(11) NOT NULL,
  `trab_c_anios_experiencia_cargo` int(11) NOT NULL,
  `trab_fecha_inicio` varchar(20) DEFAULT NULL,
  `trab_fecha_termino` varchar(20) DEFAULT NULL,
  `trab_vigente` int(1) DEFAULT NULL,
  `trab_r_fecha_creacion` datetime DEFAULT NULL,
  `trab_r_fecha_modificacion` datetime DEFAULT NULL,
  `trab_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` VALUES(1, 4, 1, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '2004-07-18 01:23:00', NULL, 1);
INSERT INTO `trabajador` VALUES(2, 5, 2, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '2004-07-18 01:23:00', NULL, 1);
INSERT INTO `trabajador` VALUES(3, 6, 3, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '2004-07-18 01:23:00', NULL, 1);
INSERT INTO `trabajador` VALUES(4, 7, 4, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '2004-07-18 01:23:00', NULL, 1);
INSERT INTO `trabajador` VALUES(5, 8, 5, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '2004-07-18 01:23:00', NULL, 1);
INSERT INTO `trabajador` VALUES(6, 9, 6, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '2004-07-18 01:23:00', NULL, 1);
INSERT INTO `trabajador` VALUES(7, 10, 7, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '2004-07-18 01:23:00', NULL, 1);
INSERT INTO `trabajador` VALUES(8, 11, 8, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '2004-07-18 01:23:00', NULL, 1);
INSERT INTO `trabajador` VALUES(9, 12, 9, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '2004-07-18 01:23:00', NULL, 1);
INSERT INTO `trabajador` VALUES(10, 13, 10, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '2004-07-18 01:23:00', NULL, 1);
INSERT INTO `trabajador` VALUES(11, 14, 11, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '2004-07-18 01:23:00', NULL, 1);
INSERT INTO `trabajador` VALUES(12, 15, 12, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '2004-07-18 01:23:00', NULL, 1);
INSERT INTO `trabajador` VALUES(13, 16, 13, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '2004-07-18 01:23:00', NULL, 1);
INSERT INTO `trabajador` VALUES(14, 17, 14, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '2004-07-18 01:23:00', NULL, 1);
INSERT INTO `trabajador` VALUES(15, 18, 15, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '2004-07-18 01:23:00', NULL, 1);
INSERT INTO `trabajador` VALUES(16, 19, 16, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '2004-07-18 01:23:00', NULL, 1);
INSERT INTO `trabajador` VALUES(17, 20, 17, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '2004-07-18 01:23:00', NULL, 1);
INSERT INTO `trabajador` VALUES(18, 21, 18, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '2004-07-18 01:23:00', NULL, 1);
INSERT INTO `trabajador` VALUES(19, 22, 19, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '2004-07-18 01:23:00', NULL, 1);
INSERT INTO `trabajador` VALUES(20, 23, 20, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '2004-07-18 01:23:00', NULL, 1);
INSERT INTO `trabajador` VALUES(21, 24, 21, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '2004-07-18 01:23:00', NULL, 1);
INSERT INTO `trabajador` VALUES(22, 25, 22, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '2004-07-18 01:23:00', NULL, 1);
INSERT INTO `trabajador` VALUES(23, 26, 23, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '2004-07-18 01:23:00', NULL, 1);
INSERT INTO `trabajador` VALUES(24, 27, 24, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '2004-07-18 01:23:00', NULL, 1);
INSERT INTO `trabajador` VALUES(25, 28, 25, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '2004-07-18 01:23:00', NULL, 1);
INSERT INTO `trabajador` VALUES(26, 29, 26, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '2004-07-18 01:23:00', NULL, 1);
INSERT INTO `trabajador` VALUES(27, 30, 27, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '2004-07-18 01:23:00', NULL, 1);
INSERT INTO `trabajador` VALUES(28, 31, 28, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '2004-07-18 01:23:00', NULL, 1);
INSERT INTO `trabajador` VALUES(29, 32, 29, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '2004-07-18 01:23:00', NULL, 1);
INSERT INTO `trabajador` VALUES(30, 33, 30, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '2004-07-18 01:23:00', NULL, 1);
INSERT INTO `trabajador` VALUES(31, 34, 31, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '2004-07-18 01:23:00', NULL, 1);
INSERT INTO `trabajador` VALUES(32, 35, 32, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '2004-07-18 01:23:00', NULL, 1);
INSERT INTO `trabajador` VALUES(33, 36, 33, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '2004-07-18 01:23:00', NULL, 1);
INSERT INTO `trabajador` VALUES(34, 37, 34, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '2004-07-18 01:23:00', NULL, 1);
INSERT INTO `trabajador` VALUES(35, 38, 35, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '2004-07-18 01:23:00', NULL, 1);
INSERT INTO `trabajador` VALUES(36, 39, 36, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `trabajador` VALUES(37, 40, 37, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `trabajador` VALUES(38, 41, 38, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `trabajador` VALUES(39, 42, 39, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `trabajador` VALUES(40, 43, 40, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `trabajador` VALUES(41, 44, 41, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `trabajador` VALUES(42, 45, 42, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `trabajador` VALUES(43, 46, 43, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `trabajador` VALUES(44, 47, 44, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `trabajador` VALUES(45, 48, 45, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `trabajador` VALUES(46, 49, 46, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `trabajador` VALUES(47, 50, 47, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `trabajador` VALUES(48, 51, 48, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `trabajador` VALUES(49, 52, 49, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `trabajador` VALUES(50, 53, 50, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `trabajador` VALUES(51, 54, 51, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `trabajador` VALUES(52, 55, 52, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `trabajador` VALUES(53, 56, 53, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `trabajador` VALUES(54, 57, 54, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `trabajador` VALUES(55, 58, 55, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `trabajador` VALUES(56, 59, 56, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `trabajador` VALUES(57, 60, 57, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `trabajador` VALUES(58, 61, 58, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `trabajador` VALUES(59, 62, 59, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `trabajador` VALUES(60, 63, 60, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `trabajador` VALUES(61, 64, 61, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `trabajador` VALUES(62, 65, 62, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `trabajador` VALUES(63, 66, 63, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `trabajador` VALUES(64, 67, 64, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `trabajador` VALUES(65, 68, 65, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `trabajador` VALUES(66, 69, 66, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `trabajador` VALUES(67, 70, 67, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `trabajador` VALUES(68, 71, 68, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `trabajador` VALUES(69, 72, 69, 1, 1, 1, '2018-07-14 02:25:32', NULL, 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `trabajador` VALUES(70, 73, 70, 1, 1, 1, '2018-07-14 02:25:33', NULL, 1, '0000-00-00 00:00:00', NULL, 1);
INSERT INTO `trabajador` VALUES(71, 74, 71, 1, 1, 1, '2018-07-14 02:25:33', NULL, 1, '0000-00-00 00:00:00', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_actividad`
--

DROP TABLE IF EXISTS `t_actividad`;
CREATE TABLE `t_actividad` (
  `tac_tipo` int(11) NOT NULL,
  `tac_descripcion` varchar(255) DEFAULT NULL,
  `tac_tratamiento` varchar(1) DEFAULT NULL,
  `tac_r_fecha_creacion` datetime DEFAULT NULL,
  `tac_r_fecha_modificacion` datetime DEFAULT NULL,
  `tac_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_actividad`
--

INSERT INTO `t_actividad` VALUES(1, 'SIN INFORMACIÓN', 'M', '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `t_actividad` VALUES(2, 'CURSO', 'M', '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `t_actividad` VALUES(3, 'DIPLOMADO', 'M', '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `t_actividad` VALUES(4, 'SEMINARIO', 'M', '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `t_actividad` VALUES(5, 'SIMPOSIO', 'M', '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `t_actividad` VALUES(6, 'CONGRESO', 'M', '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `t_actividad` VALUES(7, 'TALLER', 'M', '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `t_actividad` VALUES(8, 'JORNADA', 'F', '2018-08-01 05:19:53', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_calificacion`
--

DROP TABLE IF EXISTS `t_calificacion`;
CREATE TABLE `t_calificacion` (
  `tcal_tipo` int(11) NOT NULL,
  `tcal_descripcion` varchar(255) DEFAULT NULL,
  `tcal_r_fecha_modificacion` datetime DEFAULT NULL,
  `tcal_r_fecha_creacion` datetime DEFAULT NULL,
  `tcal_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_calificacion`
--

INSERT INTO `t_calificacion` VALUES(1, '1,0 - 7,0', '2018-08-02 14:55:59', NULL, 1);
INSERT INTO `t_calificacion` VALUES(2, '1 - 100', '2018-08-02 14:55:59', NULL, 1);
INSERT INTO `t_calificacion` VALUES(3, 'Conceptual', '2018-08-02 14:55:59', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_certificado`
--

DROP TABLE IF EXISTS `t_certificado`;
CREATE TABLE `t_certificado` (
  `tce_tipo` int(11) NOT NULL,
  `tce_descripcion` varchar(255) DEFAULT NULL,
  `tce_r_fecha_creacion` datetime DEFAULT NULL,
  `tce_r_fecha_modificacion` datetime DEFAULT NULL,
  `tce_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_certificado`
--

INSERT INTO `t_certificado` VALUES(1, 'SIN INFORMACIÓN', '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `t_certificado` VALUES(2, 'PARTICIPACIÓN', '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `t_certificado` VALUES(3, 'APROBACIÓN SIN REGISTRO % ASISTENCIA', '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `t_certificado` VALUES(4, 'APROBACIÓN CON REGISTRO % ASISTENCIA', '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `t_certificado` VALUES(5, 'APROBACIÓN SIN REGISTRO DE CALIFICACIÓN NI % ASIST', '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `t_certificado` VALUES(6, 'APROBACIÓN CON REGISTRO DE CALIFICACIÓN Y SIN %', '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `t_certificado` VALUES(7, 'APROBACIÓN CON REGISTRO DE CALIFICACIÓN Y % ASIST', '2018-08-01 05:19:53', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_direccion`
--

DROP TABLE IF EXISTS `t_direccion`;
CREATE TABLE `t_direccion` (
  `tdir_tipo` int(11) NOT NULL,
  `tdir_descripcion` varchar(255) DEFAULT NULL,
  `tdir_r_fecha_creacion` datetime DEFAULT NULL,
  `tdir_r_fecha_modificacion` datetime DEFAULT NULL,
  `tdir_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_direccion`
--

INSERT INTO `t_direccion` VALUES(1, 'Permanente', '2018-07-04 01:47:45', NULL, 1);
INSERT INTO `t_direccion` VALUES(2, 'Comercial', '2018-07-04 01:48:11', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_evaluacion`
--

DROP TABLE IF EXISTS `t_evaluacion`;
CREATE TABLE `t_evaluacion` (
  `tev_tipo` int(11) NOT NULL,
  `tev_descripcion` varchar(255) DEFAULT NULL,
  `tev_r_fecha_creacion` datetime DEFAULT NULL,
  `tev_r_fecha_modificacion` datetime DEFAULT NULL,
  `tev_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_evaluacion`
--

INSERT INTO `t_evaluacion` VALUES(1, 'SIN INFORMACIÓN', '2018-08-02 05:34:45', NULL, 1);
INSERT INTO `t_evaluacion` VALUES(2, 'TEÓRICA', '2018-08-02 05:34:45', NULL, 1);
INSERT INTO `t_evaluacion` VALUES(3, 'PRÁCTICA', '2018-08-02 05:34:45', NULL, 1);
INSERT INTO `t_evaluacion` VALUES(4, 'SIN INFO', '2018-08-02 05:34:45', NULL, 1);
INSERT INTO `t_evaluacion` VALUES(5, 'SIN INFO 3', '2018-08-02 05:34:45', NULL, 1);
INSERT INTO `t_evaluacion` VALUES(6, 'ENCUESTA', '2018-08-02 05:34:45', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_evaluacion_aplicada`
--

DROP TABLE IF EXISTS `t_evaluacion_aplicada`;
CREATE TABLE `t_evaluacion_aplicada` (
  `teva_tipo` int(11) NOT NULL,
  `teva_descripcion` varchar(255) DEFAULT NULL,
  `teva_r_fecha_modificacion` datetime DEFAULT NULL,
  `teva_r_fecha_creacion` datetime DEFAULT NULL,
  `teva_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_evaluacion_aplicada`
--

INSERT INTO `t_evaluacion_aplicada` VALUES(1, 'SIN INFORMACIÓN', '2018-08-12 14:55:59', NULL, 1);
INSERT INTO `t_evaluacion_aplicada` VALUES(2, 'DIAGNÓSTICA', '2018-08-12 14:55:59', NULL, 1);
INSERT INTO `t_evaluacion_aplicada` VALUES(3, 'FINAL', '2018-08-12 14:55:59', NULL, 1);
INSERT INTO `t_evaluacion_aplicada` VALUES(4, 'FINAL SEGUNDA OPORTUNIDAD', '2018-08-12 14:55:59', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_hora`
--

DROP TABLE IF EXISTS `t_hora`;
CREATE TABLE `t_hora` (
  `tho_tipo` int(11) NOT NULL,
  `tho_descripcion` varchar(255) DEFAULT NULL,
  `tho_r_fecha_creacion` datetime DEFAULT NULL,
  `tho_r_fecha_modificacion` datetime DEFAULT NULL,
  `tho_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_hora`
--

INSERT INTO `t_hora` VALUES(1, 'SIN INFORMACIÓN', '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `t_hora` VALUES(2, 'CRONOLÓGICAS', '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `t_hora` VALUES(3, 'PEDAGÓGICAS', '2018-08-01 05:19:53', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_identificador`
--

DROP TABLE IF EXISTS `t_identificador`;
CREATE TABLE `t_identificador` (
  `tide_tipo` int(11) NOT NULL,
  `tide_descripcion` varchar(255) DEFAULT NULL,
  `tide_r_fecha_creacion` datetime DEFAULT NULL,
  `tide_r_fecha_modificacion` datetime DEFAULT NULL,
  `tide_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_identificador`
--

INSERT INTO `t_identificador` VALUES(1, 'RUT', '2018-07-04 10:22:42', NULL, 1);
INSERT INTO `t_identificador` VALUES(2, 'PASAPORTE', '2018-07-04 10:22:42', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_institucion`
--

DROP TABLE IF EXISTS `t_institucion`;
CREATE TABLE `t_institucion` (
  `tins_tipo` int(11) NOT NULL,
  `tins_descripcion` varchar(255) DEFAULT NULL,
  `tins_r_fecha_creacion` datetime DEFAULT NULL,
  `tins_r_fecha_modificacion` datetime DEFAULT NULL,
  `tins_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_institucion`
--

INSERT INTO `t_institucion` VALUES(1, 'EMPRESA PARTICULAR', '2018-07-04 10:22:42', NULL, 1);
INSERT INTO `t_institucion` VALUES(2, 'ORGANISMO ESTATAL', '2018-07-04 10:22:42', NULL, 1);
INSERT INTO `t_institucion` VALUES(3, 'UNIVERSIDAD', '2018-07-04 10:22:42', NULL, 1);
INSERT INTO `t_institucion` VALUES(4, 'ENTIDAD ACADÉMICA', '2018-07-04 10:22:42', NULL, 1);
INSERT INTO `t_institucion` VALUES(5, 'FICTICIA', '2018-07-04 10:22:42', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_modalidad`
--

DROP TABLE IF EXISTS `t_modalidad`;
CREATE TABLE `t_modalidad` (
  `tmo_tipo` int(11) NOT NULL,
  `tmo_descripcion` varchar(255) DEFAULT NULL,
  `tmo_r_fecha_creacion` datetime DEFAULT NULL,
  `tmo_r_fecha_modificacion` datetime DEFAULT NULL,
  `tmo_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_modalidad`
--

INSERT INTO `t_modalidad` VALUES(1, 'SIN INFORMACIÓN', '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `t_modalidad` VALUES(2, 'PRESENCIAL', '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `t_modalidad` VALUES(3, 'SEMIPRESENCIAL', '2018-08-01 05:19:53', NULL, 1);
INSERT INTO `t_modalidad` VALUES(4, 'A DISTANCIA', '2018-08-01 05:19:53', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_moneda`
--

DROP TABLE IF EXISTS `t_moneda`;
CREATE TABLE `t_moneda` (
  `tmon_tipo` int(11) NOT NULL,
  `tmon_descripcion` varchar(255) DEFAULT NULL,
  `tmon_r_fecha_creacion` datetime DEFAULT NULL,
  `tmon_r_fecha_modificacion` datetime DEFAULT NULL,
  `tmon_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_pregunta`
--

DROP TABLE IF EXISTS `t_pregunta`;
CREATE TABLE `t_pregunta` (
  `tpre_tipo` int(11) NOT NULL,
  `tpre_descripcion` varchar(255) DEFAULT NULL,
  `tpre_r_fecha_creacion` datetime DEFAULT NULL,
  `tpre_r_fecha_modificacion` datetime DEFAULT NULL,
  `tpre_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_pregunta`
--

INSERT INTO `t_pregunta` VALUES(1, 'VERDADERO/FALSO', '2018-07-04 05:51:06', NULL, 1);
INSERT INTO `t_pregunta` VALUES(2, 'ALTERNATIVAS', '2018-07-04 05:51:06', NULL, 1);
INSERT INTO `t_pregunta` VALUES(3, 'SI/NO', '2018-07-04 05:51:06', NULL, 1);
INSERT INTO `t_pregunta` VALUES(4, 'ENCUESTA ', '2018-07-04 05:51:06', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_relacion_faena`
--

DROP TABLE IF EXISTS `t_relacion_faena`;
CREATE TABLE `t_relacion_faena` (
  `trefa_tipo` int(11) NOT NULL,
  `trefa_sigla` varchar(25) DEFAULT NULL,
  `trefa_descripcion` varchar(255) DEFAULT NULL,
  `trefa_vigente` int(1) DEFAULT NULL,
  `trefa_r_fecha_creacion` datetime DEFAULT NULL,
  `trefa_r_fecha_modificacion` datetime DEFAULT NULL,
  `trefa_r_usuario` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_relacion_faena`
--

INSERT INTO `t_relacion_faena` VALUES(1, 'DIR', 'DIRECTA', 1, '2018-07-14 01:53:13', NULL, 1);
INSERT INTO `t_relacion_faena` VALUES(2, 'IND', 'INDIRECTA', 1, '2018-07-14 01:53:13', NULL, 1);
INSERT INTO `t_relacion_faena` VALUES(3, 'DIR/IND', 'DIRECTA/INDIRECTA', 1, '2018-07-14 01:53:37', NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`acti_codigo`),
  ADD KEY `actividad_t_actividad` (`acti_t_actividad`),
  ADD KEY `actividad_t_hora` (`acti_t_hora`),
  ADD KEY `actividad_e_actividad` (`acti_e_actividad`),
  ADD KEY `actividad_t_modalidad` (`acti_t_modalidad`);

--
-- Indices de la tabla `actividad_cargo`
--
ALTER TABLE `actividad_cargo`
  ADD PRIMARY KEY (`acca_c_actividad`,`acca_c_cargo`),
  ADD KEY `actividad_cargo_actividad` (`acca_c_actividad`),
  ADD KEY `actividad_cargo_cargo` (`acca_c_cargo`);

--
-- Indices de la tabla `actividad_objetivo`
--
ALTER TABLE `actividad_objetivo`
  ADD PRIMARY KEY (`acob_c_actividad`,`acob_c_objetivo`),
  ADD KEY `actividad_objetivo_actividad_fk` (`acob_c_actividad`),
  ADD KEY `actividad_objetivo_objetivo_fk` (`acob_c_objetivo`);

--
-- Indices de la tabla `anios_experiencia_cargo`
--
ALTER TABLE `anios_experiencia_cargo`
  ADD PRIMARY KEY (`anexca_codigo`);

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`area_codigo`),
  ADD KEY `area_actividad_fk` (`area_c_institucion`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`carg_codigo`),
  ADD KEY `cargo_especialidad_fk` (`carg_c_especialidad`),
  ADD KEY `cargo_t_relacion_faena_fk` (`carg_t_relacion_faena`);

--
-- Indices de la tabla `cargo_grupo_sence`
--
ALTER TABLE `cargo_grupo_sence`
  ADD PRIMARY KEY (`cagrse_c_cargo`,`cagrse_g_grupo_sence`),
  ADD KEY `cargo_grupo_sence_cargo` (`cagrse_c_cargo`),
  ADD KEY `cargo_grupo_sence_grupo_sence` (`cagrse_g_grupo_sence`);

--
-- Indices de la tabla `comuna`
--
ALTER TABLE `comuna`
  ADD PRIMARY KEY (`comu_codigo`),
  ADD KEY `comuna_provincia` (`comu_c_provincia`);

--
-- Indices de la tabla `detalle_pregunta`
--
ALTER TABLE `detalle_pregunta`
  ADD PRIMARY KEY (`depr_c_pregunta`,`depr_c_opcion_pregunta`),
  ADD KEY `detalle_pregunta_pregunta` (`depr_c_pregunta`),
  ADD KEY `detalle_pregunta_opcion_pregunta` (`depr_c_opcion_pregunta`);

--
-- Indices de la tabla `dictacion`
--
ALTER TABLE `dictacion`
  ADD PRIMARY KEY (`dict_c_actividad`,`dict_numero`),
  ADD KEY `dictacion_e_dictacion` (`dict_e_dictacion`),
  ADD KEY `dictacion_resolucion` (`dict_c_resolucion`),
  ADD KEY `dictacion_t_certificado` (`dict_t_certificado`),
  ADD KEY `dictacion_t_calificacion` (`dict_t_calificacion`),
  ADD KEY `dictacion_t_moneda` (`dict_t_moneda`),
  ADD KEY `dictacion_comuna` (`dict_c_comuna`),
  ADD KEY `dictacion_t_evaluacion` (`dict_t_evaluacion`),
  ADD KEY `dictacion_t_capacitacion` (`dict_t_capacitacion`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`dire_c_persona`,`dire_t_direccion`),
  ADD KEY `direccion_persona` (`dire_c_persona`),
  ADD KEY `direccion_t_direccion` (`dire_t_direccion`),
  ADD KEY `direccion_comuna` (`dire_c_comuna`),
  ADD KEY `direccion_pais` (`dire_c_pais`);

--
-- Indices de la tabla `escolaridad`
--
ALTER TABLE `escolaridad`
  ADD PRIMARY KEY (`esco_codigo`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`espe_codigo`),
  ADD KEY `especialidad_institucion` (`espe_c_institucion`);

--
-- Indices de la tabla `estado_civil`
--
ALTER TABLE `estado_civil`
  ADD PRIMARY KEY (`esci_codigo`);

--
-- Indices de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD PRIMARY KEY (`eval_codigo`),
  ADD KEY `evaluacion_t_evaluacion` (`eval_t_evaluacion`);

--
-- Indices de la tabla `evaluacion_aplicada`
--
ALTER TABLE `evaluacion_aplicada`
  ADD PRIMARY KEY (`evap_c_actividad`,`evap_numero_dictacion`,`evap_c_evaluacion`,`evap_numero_evaluacion`),
  ADD KEY `evaluacion_aplicada_dictacion` (`evap_c_actividad`,`evap_numero_dictacion`),
  ADD KEY `evaluacion_aplicada_evaluacion` (`evap_c_evaluacion`),
  ADD KEY `evaluacion_aplicada_e_evaluacion_aplicada` (`evap_e_evaluacion_aplicada`),
  ADD KEY `evaluacion_aplicada_t_evaluacion_aplicada` (`evap_t_evaluacion_aplicada`);

--
-- Indices de la tabla `evaluacion_marcador`
--
ALTER TABLE `evaluacion_marcador`
  ADD PRIMARY KEY (`evma_c_evaluacion`,`evma_c_marcador`),
  ADD KEY `evaluacion_marcador_evaluacion` (`evma_c_evaluacion`),
  ADD KEY `evaluacion_marcador_marcador` (`evma_c_marcador`);

--
-- Indices de la tabla `evaluacion_pregunta`
--
ALTER TABLE `evaluacion_pregunta`
  ADD PRIMARY KEY (`evpr_codigo`),
  ADD KEY `evaluacion_pregunta_evaluacion` (`evpr_c_evaluacion`),
  ADD KEY `evaluacion_pregunta_pregunta` (`evpr_c_pregunta`),
  ADD KEY `evaluacion_pregunta_objetivo` (`evpr_c_objetivo`),
  ADD KEY `evaluacion_pregunta_seccion` (`evpr_c_seccion`);

--
-- Indices de la tabla `e_actividad`
--
ALTER TABLE `e_actividad`
  ADD PRIMARY KEY (`eac_estado`);

--
-- Indices de la tabla `e_dictacion`
--
ALTER TABLE `e_dictacion`
  ADD PRIMARY KEY (`edi_estado`);

--
-- Indices de la tabla `e_evaluacion_aplicada`
--
ALTER TABLE `e_evaluacion_aplicada`
  ADD PRIMARY KEY (`eeva_estado`);

--
-- Indices de la tabla `e_finalizacion`
--
ALTER TABLE `e_finalizacion`
  ADD PRIMARY KEY (`efin_estado`),
  ADD KEY `e_finalizacion_t_calificacion` (`efin_t_calificacion`);

--
-- Indices de la tabla `e_inscripcion`
--
ALTER TABLE `e_inscripcion`
  ADD PRIMARY KEY (`eins_estado`);

--
-- Indices de la tabla `e_inscripcion_evaluacion_aplicada`
--
ALTER TABLE `e_inscripcion_evaluacion_aplicada`
  ADD PRIMARY KEY (`eiea_estado`);

--
-- Indices de la tabla `e_respuesta_aplicada`
--
ALTER TABLE `e_respuesta_aplicada`
  ADD PRIMARY KEY (`erea_estado`);

--
-- Indices de la tabla `facilitador`
--
ALTER TABLE `facilitador`
  ADD PRIMARY KEY (`faci_c_actividad`,`faci_numero_dictacion`,`faci_c_persona`),
  ADD KEY `facilitador_dictacion` (`faci_c_actividad`,`faci_numero_dictacion`),
  ADD KEY `facilitador_persona` (`faci_c_persona`);

--
-- Indices de la tabla `gerencia`
--
ALTER TABLE `gerencia`
  ADD PRIMARY KEY (`gere_codigo`),
  ADD KEY `gerencia_institucion` (`gere_c_institucion`);

--
-- Indices de la tabla `grupo_sence`
--
ALTER TABLE `grupo_sence`
  ADD PRIMARY KEY (`grse_grupo`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`insc_c_actividad`,`insc_numero_dictacion`,`insc_c_trabajador`),
  ADD KEY `inscripcion_dictacion` (`insc_c_actividad`,`insc_numero_dictacion`),
  ADD KEY `inscripcion_trabajador` (`insc_c_trabajador`),
  ADD KEY `inscripcion_e_inscripcion` (`insc_e_inscripcion`),
  ADD KEY `inscripcion_e_finalizacion` (`insc_e_finalizacion`);

--
-- Indices de la tabla `inscripcion_evaluacion_aplicada`
--
ALTER TABLE `inscripcion_evaluacion_aplicada`
  ADD PRIMARY KEY (`inevap_c_actividad`,`inevap_numero_dictacion`,`inevap_c_evaluacion`,`inevap_numero_evaluacion`,`inevap_c_trabajador`),
  ADD KEY `inscripcion_evaluacion_aplicada_evaluacion_aplicada` (`inevap_c_actividad`,`inevap_numero_dictacion`,`inevap_c_evaluacion`,`inevap_numero_evaluacion`),
  ADD KEY `inscripcion_evaluacion_aplicada_inscripcion` (`inevap_c_actividad`,`inevap_numero_dictacion`,`inevap_c_trabajador`),
  ADD KEY `inscripcion_evaluacion_aplicada_eiea` (`inevap_e_inscripcion_evaluacion_aplicada`);

--
-- Indices de la tabla `institucion`
--
ALTER TABLE `institucion`
  ADD PRIMARY KEY (`inst_codigo`),
  ADD KEY `institucion_t_institucion` (`inst_t_institucion`),
  ADD KEY `institucion_comuna` (`inst_c_comuna`),
  ADD KEY `institucion_pais` (`inst_c_pais`);

--
-- Indices de la tabla `login_confirm`
--
ALTER TABLE `login_confirm`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `login_integration`
--
ALTER TABLE `login_integration`
  ADD PRIMARY KEY (`user_id`);

--
-- Indices de la tabla `login_levels`
--
ALTER TABLE `login_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `login_profiles`
--
ALTER TABLE `login_profiles`
  ADD PRIMARY KEY (`p_id`);

--
-- Indices de la tabla `login_profile_fields`
--
ALTER TABLE `login_profile_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `login_settings`
--
ALTER TABLE `login_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `option_name` (`option_name`);

--
-- Indices de la tabla `login_timestamps`
--
ALTER TABLE `login_timestamps`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `login_users`
--
ALTER TABLE `login_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indices de la tabla `marcador`
--
ALTER TABLE `marcador`
  ADD PRIMARY KEY (`marc_codigo`);

--
-- Indices de la tabla `objetivo`
--
ALTER TABLE `objetivo`
  ADD PRIMARY KEY (`obje_codigo`);

--
-- Indices de la tabla `opcion_pregunta`
--
ALTER TABLE `opcion_pregunta`
  ADD PRIMARY KEY (`oppr_codigo`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`pais_codigo`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`pers_codigo`),
  ADD KEY `persona_t_identificador` (`pers_t_identificador`),
  ADD KEY `persona_estado_civil` (`pers_c_estado_civil`),
  ADD KEY `persona_c_escolaridad` (`pers_c_escolaridad`),
  ADD KEY `persona_c_pais` (`pers_c_pais_origen`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`preg_codigo`),
  ADD KEY `pregunta_t_pregunta` (`preg_t_pregunta`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`prov_codigo`),
  ADD KEY `provincia_region` (`prov_c_region`);

--
-- Indices de la tabla `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`regi_codigo`);

--
-- Indices de la tabla `respuesta_aplicada`
--
ALTER TABLE `respuesta_aplicada`
  ADD PRIMARY KEY (`reap_c_actividad`,`reap_numero_dictacion`,`reap_c_evaluacion`,`reap_numero_evaluacion`,`reap_c_trabajador`,`reap_c_pregunta`),
  ADD KEY `respuesta_aplicada_inscripcion_evaluacion_aplicada` (`reap_c_actividad`,`reap_numero_dictacion`,`reap_c_evaluacion`,`reap_numero_evaluacion`,`reap_c_trabajador`),
  ADD KEY `respuesta_aplicada_detalle_pregunta` (`reap_c_pregunta`),
  ADD KEY `respuesta_aplicada_e_respuesta_aplicada` (`reap_e_respuesta_aplicada`);

--
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`secc_codigo`);

--
-- Indices de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD PRIMARY KEY (`trab_codigo`),
  ADD KEY `trabajador_persona` (`trab_c_persona`),
  ADD KEY `trabajador_cargo` (`trab_c_cargo`),
  ADD KEY `trabajador_gerencia` (`trab_c_gerencia`),
  ADD KEY `trabajador_area` (`trab_c_area`),
  ADD KEY `trabajador_anios_experiencia_cargo` (`trab_c_anios_experiencia_cargo`);

--
-- Indices de la tabla `t_actividad`
--
ALTER TABLE `t_actividad`
  ADD PRIMARY KEY (`tac_tipo`);

--
-- Indices de la tabla `t_calificacion`
--
ALTER TABLE `t_calificacion`
  ADD PRIMARY KEY (`tcal_tipo`);

--
-- Indices de la tabla `t_certificado`
--
ALTER TABLE `t_certificado`
  ADD PRIMARY KEY (`tce_tipo`);

--
-- Indices de la tabla `t_direccion`
--
ALTER TABLE `t_direccion`
  ADD PRIMARY KEY (`tdir_tipo`);

--
-- Indices de la tabla `t_evaluacion`
--
ALTER TABLE `t_evaluacion`
  ADD PRIMARY KEY (`tev_tipo`);

--
-- Indices de la tabla `t_evaluacion_aplicada`
--
ALTER TABLE `t_evaluacion_aplicada`
  ADD PRIMARY KEY (`teva_tipo`);

--
-- Indices de la tabla `t_hora`
--
ALTER TABLE `t_hora`
  ADD PRIMARY KEY (`tho_tipo`);

--
-- Indices de la tabla `t_identificador`
--
ALTER TABLE `t_identificador`
  ADD PRIMARY KEY (`tide_tipo`);

--
-- Indices de la tabla `t_institucion`
--
ALTER TABLE `t_institucion`
  ADD PRIMARY KEY (`tins_tipo`);

--
-- Indices de la tabla `t_modalidad`
--
ALTER TABLE `t_modalidad`
  ADD PRIMARY KEY (`tmo_tipo`);

--
-- Indices de la tabla `t_moneda`
--
ALTER TABLE `t_moneda`
  ADD PRIMARY KEY (`tmon_tipo`);

--
-- Indices de la tabla `t_pregunta`
--
ALTER TABLE `t_pregunta`
  ADD PRIMARY KEY (`tpre_tipo`);

--
-- Indices de la tabla `t_relacion_faena`
--
ALTER TABLE `t_relacion_faena`
  ADD PRIMARY KEY (`trefa_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `acti_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `anios_experiencia_cargo`
--
ALTER TABLE `anios_experiencia_cargo`
  MODIFY `anexca_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `area_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `carg_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT de la tabla `comuna`
--
ALTER TABLE `comuna`
  MODIFY `comu_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=347;
--
-- AUTO_INCREMENT de la tabla `escolaridad`
--
ALTER TABLE `escolaridad`
  MODIFY `esco_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `espe_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `estado_civil`
--
ALTER TABLE `estado_civil`
  MODIFY `esci_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  MODIFY `eval_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `evaluacion_pregunta`
--
ALTER TABLE `evaluacion_pregunta`
  MODIFY `evpr_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT de la tabla `e_actividad`
--
ALTER TABLE `e_actividad`
  MODIFY `eac_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `e_dictacion`
--
ALTER TABLE `e_dictacion`
  MODIFY `edi_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `e_evaluacion_aplicada`
--
ALTER TABLE `e_evaluacion_aplicada`
  MODIFY `eeva_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `e_finalizacion`
--
ALTER TABLE `e_finalizacion`
  MODIFY `efin_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `e_inscripcion`
--
ALTER TABLE `e_inscripcion`
  MODIFY `eins_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `e_inscripcion_evaluacion_aplicada`
--
ALTER TABLE `e_inscripcion_evaluacion_aplicada`
  MODIFY `eiea_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `e_respuesta_aplicada`
--
ALTER TABLE `e_respuesta_aplicada`
  MODIFY `erea_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `gerencia`
--
ALTER TABLE `gerencia`
  MODIFY `gere_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `grupo_sence`
--
ALTER TABLE `grupo_sence`
  MODIFY `grse_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `institucion`
--
ALTER TABLE `institucion`
  MODIFY `inst_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `login_confirm`
--
ALTER TABLE `login_confirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `login_levels`
--
ALTER TABLE `login_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `login_profiles`
--
ALTER TABLE `login_profiles`
  MODIFY `p_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `login_profile_fields`
--
ALTER TABLE `login_profile_fields`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `login_settings`
--
ALTER TABLE `login_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT de la tabla `login_timestamps`
--
ALTER TABLE `login_timestamps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `login_users`
--
ALTER TABLE `login_users`
  MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT de la tabla `marcador`
--
ALTER TABLE `marcador`
  MODIFY `marc_codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `objetivo`
--
ALTER TABLE `objetivo`
  MODIFY `obje_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `opcion_pregunta`
--
ALTER TABLE `opcion_pregunta`
  MODIFY `oppr_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `pais_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `pers_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `preg_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  MODIFY `trab_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT de la tabla `t_actividad`
--
ALTER TABLE `t_actividad`
  MODIFY `tac_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `t_calificacion`
--
ALTER TABLE `t_calificacion`
  MODIFY `tcal_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `t_certificado`
--
ALTER TABLE `t_certificado`
  MODIFY `tce_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `t_direccion`
--
ALTER TABLE `t_direccion`
  MODIFY `tdir_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `t_evaluacion`
--
ALTER TABLE `t_evaluacion`
  MODIFY `tev_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `t_evaluacion_aplicada`
--
ALTER TABLE `t_evaluacion_aplicada`
  MODIFY `teva_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `t_hora`
--
ALTER TABLE `t_hora`
  MODIFY `tho_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `t_institucion`
--
ALTER TABLE `t_institucion`
  MODIFY `tins_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `t_modalidad`
--
ALTER TABLE `t_modalidad`
  MODIFY `tmo_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `t_pregunta`
--
ALTER TABLE `t_pregunta`
  MODIFY `tpre_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `t_relacion_faena`
--
ALTER TABLE `t_relacion_faena`
  MODIFY `trefa_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `actividad_e_actividad_fk` FOREIGN KEY (`acti_e_actividad`) REFERENCES `e_actividad` (`eac_estado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `actividad_t_actividad_fk` FOREIGN KEY (`acti_t_actividad`) REFERENCES `t_actividad` (`tac_tipo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `actividad_t_hora_fk` FOREIGN KEY (`acti_t_hora`) REFERENCES `t_hora` (`tho_tipo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `actividad_t_modalidad_fk` FOREIGN KEY (`acti_t_modalidad`) REFERENCES `t_modalidad` (`tmo_tipo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `actividad_cargo`
--
ALTER TABLE `actividad_cargo`
  ADD CONSTRAINT `actividad_cargo_actividad_fk` FOREIGN KEY (`acca_c_actividad`) REFERENCES `actividad` (`acti_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `actividad_cargo_cargo_fk` FOREIGN KEY (`acca_c_cargo`) REFERENCES `cargo` (`carg_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `actividad_objetivo`
--
ALTER TABLE `actividad_objetivo`
  ADD CONSTRAINT `actividad_objetivo_actividad_fk` FOREIGN KEY (`acob_c_actividad`) REFERENCES `actividad` (`acti_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `actividad_objetivo_objetivo_fk` FOREIGN KEY (`acob_c_objetivo`) REFERENCES `objetivo` (`obje_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `area_institucion_fk` FOREIGN KEY (`area_c_institucion`) REFERENCES `institucion` (`inst_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD CONSTRAINT `cargo_especialidad_fk` FOREIGN KEY (`carg_c_especialidad`) REFERENCES `especialidad` (`espe_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cargo_t_relacion_faena_fk` FOREIGN KEY (`carg_t_relacion_faena`) REFERENCES `t_relacion_faena` (`trefa_tipo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cargo_grupo_sence`
--
ALTER TABLE `cargo_grupo_sence`
  ADD CONSTRAINT `cargo_grupo_sence_cargo_fk` FOREIGN KEY (`cagrse_c_cargo`) REFERENCES `cargo` (`carg_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cargo_grupo_sence_grupo_sence_fk` FOREIGN KEY (`cagrse_g_grupo_sence`) REFERENCES `grupo_sence` (`grse_grupo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `comuna`
--
ALTER TABLE `comuna`
  ADD CONSTRAINT `comuna_provincia_fk` FOREIGN KEY (`comu_c_provincia`) REFERENCES `provincia` (`prov_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_pregunta`
--
ALTER TABLE `detalle_pregunta`
  ADD CONSTRAINT `detalle_pregunta_opcion_pregunta_fk` FOREIGN KEY (`depr_c_opcion_pregunta`) REFERENCES `opcion_pregunta` (`oppr_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_pregunta_pregunta_fk` FOREIGN KEY (`depr_c_pregunta`) REFERENCES `pregunta` (`preg_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `dictacion`
--
ALTER TABLE `dictacion`
  ADD CONSTRAINT `dictacion_actividad_fk` FOREIGN KEY (`dict_c_actividad`) REFERENCES `actividad` (`acti_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `dictacion_comuna_fk` FOREIGN KEY (`dict_c_comuna`) REFERENCES `comuna` (`comu_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `dictacion_e_dictacion_fk` FOREIGN KEY (`dict_e_dictacion`) REFERENCES `e_dictacion` (`edi_estado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `dictacion_t_calificacion_fk` FOREIGN KEY (`dict_t_calificacion`) REFERENCES `t_calificacion` (`tcal_tipo`),
  ADD CONSTRAINT `dictacion_t_certificado_fk` FOREIGN KEY (`dict_t_certificado`) REFERENCES `t_certificado` (`tce_tipo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `dictacion_t_evaluacion_fk` FOREIGN KEY (`dict_t_evaluacion`) REFERENCES `t_evaluacion` (`tev_tipo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `dictacion_t_moneda_fk` FOREIGN KEY (`dict_t_moneda`) REFERENCES `t_moneda` (`tmon_tipo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `direccion_comuna_fk` FOREIGN KEY (`dire_c_comuna`) REFERENCES `comuna` (`comu_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `direccion_pais_fk` FOREIGN KEY (`dire_c_pais`) REFERENCES `pais` (`pais_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `direccion_persona_fk` FOREIGN KEY (`dire_c_persona`) REFERENCES `persona` (`pers_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `direccion_t_direccion_fk` FOREIGN KEY (`dire_t_direccion`) REFERENCES `t_direccion` (`tdir_tipo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD CONSTRAINT `especialidad_institucion_fk` FOREIGN KEY (`espe_c_institucion`) REFERENCES `institucion` (`inst_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD CONSTRAINT `evaluacion_t_evaluacion_fk` FOREIGN KEY (`eval_t_evaluacion`) REFERENCES `t_evaluacion` (`tev_tipo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `evaluacion_aplicada`
--
ALTER TABLE `evaluacion_aplicada`
  ADD CONSTRAINT `evaluacion_aplicada_dictacion_fk` FOREIGN KEY (`evap_c_actividad`,`evap_numero_dictacion`) REFERENCES `dictacion` (`dict_c_actividad`, `dict_numero`) ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluacion_aplicada_e_evaluacion_aplicada_fk` FOREIGN KEY (`evap_e_evaluacion_aplicada`) REFERENCES `e_evaluacion_aplicada` (`eeva_estado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluacion_aplicada_evaluacion_fk` FOREIGN KEY (`evap_c_evaluacion`) REFERENCES `evaluacion` (`eval_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluacion_aplicada_t_evaluacion_aplicada_fk` FOREIGN KEY (`evap_t_evaluacion_aplicada`) REFERENCES `t_evaluacion_aplicada` (`teva_tipo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `evaluacion_marcador`
--
ALTER TABLE `evaluacion_marcador`
  ADD CONSTRAINT `evaluacion_marcador_evaluacion_fk` FOREIGN KEY (`evma_c_evaluacion`) REFERENCES `evaluacion` (`eval_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluacion_marcador_marcador_fk` FOREIGN KEY (`evma_c_marcador`) REFERENCES `marcador` (`marc_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `evaluacion_pregunta`
--
ALTER TABLE `evaluacion_pregunta`
  ADD CONSTRAINT `evaluacion_pregunta_evaluacion_fk` FOREIGN KEY (`evpr_c_evaluacion`) REFERENCES `evaluacion` (`eval_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluacion_pregunta_objetivo_fk` FOREIGN KEY (`evpr_c_objetivo`) REFERENCES `objetivo` (`obje_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluacion_pregunta_pregunta_fk` FOREIGN KEY (`evpr_c_pregunta`) REFERENCES `pregunta` (`preg_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluacion_pregunta_seccion_fk` FOREIGN KEY (`evpr_c_seccion`) REFERENCES `seccion` (`secc_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `e_finalizacion`
--
ALTER TABLE `e_finalizacion`
  ADD CONSTRAINT `e_finalizacion_t_calificacion` FOREIGN KEY (`efin_t_calificacion`) REFERENCES `t_calificacion` (`tcal_tipo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `facilitador`
--
ALTER TABLE `facilitador`
  ADD CONSTRAINT `facilitador_dictacion_fk` FOREIGN KEY (`faci_c_actividad`,`faci_numero_dictacion`) REFERENCES `dictacion` (`dict_c_actividad`, `dict_numero`) ON UPDATE CASCADE,
  ADD CONSTRAINT `facilitador_persona_fk` FOREIGN KEY (`faci_c_persona`) REFERENCES `persona` (`pers_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `gerencia`
--
ALTER TABLE `gerencia`
  ADD CONSTRAINT `gerencia_institucion_fk` FOREIGN KEY (`gere_c_institucion`) REFERENCES `institucion` (`inst_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `inscripcion_dictacion_fk` FOREIGN KEY (`insc_c_actividad`,`insc_numero_dictacion`) REFERENCES `dictacion` (`dict_c_actividad`, `dict_numero`),
  ADD CONSTRAINT `inscripcion_e_finalizacion_fk` FOREIGN KEY (`insc_e_finalizacion`) REFERENCES `e_finalizacion` (`efin_estado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `inscripcion_e_inscripcion_fk` FOREIGN KEY (`insc_e_inscripcion`) REFERENCES `e_inscripcion` (`eins_estado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `inscripcion_trabajador_fk` FOREIGN KEY (`insc_c_trabajador`) REFERENCES `trabajador` (`trab_codigo`);

--
-- Filtros para la tabla `inscripcion_evaluacion_aplicada`
--
ALTER TABLE `inscripcion_evaluacion_aplicada`
  ADD CONSTRAINT `inscripcion_evaluacion_aplicada_eiea_fk` FOREIGN KEY (`inevap_e_inscripcion_evaluacion_aplicada`) REFERENCES `e_inscripcion_evaluacion_aplicada` (`eiea_estado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `inscripcion_evaluacion_aplicada_evaluacion_aplicada_fk` FOREIGN KEY (`inevap_c_actividad`,`inevap_numero_dictacion`,`inevap_c_evaluacion`,`inevap_numero_evaluacion`) REFERENCES `evaluacion_aplicada` (`evap_c_actividad`, `evap_numero_dictacion`, `evap_c_evaluacion`, `evap_numero_evaluacion`) ON UPDATE CASCADE,
  ADD CONSTRAINT `inscripcion_evaluacion_aplicada_inscripcion_fk` FOREIGN KEY (`inevap_c_actividad`,`inevap_numero_dictacion`,`inevap_c_trabajador`) REFERENCES `inscripcion` (`insc_c_actividad`, `insc_numero_dictacion`, `insc_c_trabajador`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `institucion`
--
ALTER TABLE `institucion`
  ADD CONSTRAINT `institucion_t_institucion_fk` FOREIGN KEY (`inst_t_institucion`) REFERENCES `t_institucion` (`tins_tipo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_escolaridad_fk` FOREIGN KEY (`pers_c_escolaridad`) REFERENCES `escolaridad` (`esco_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `persona_estado_civil_fk` FOREIGN KEY (`pers_c_estado_civil`) REFERENCES `estado_civil` (`esci_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `persona_pais_fk` FOREIGN KEY (`pers_c_pais_origen`) REFERENCES `pais` (`pais_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `persona_t_identificador_fk` FOREIGN KEY (`pers_t_identificador`) REFERENCES `t_identificador` (`tide_tipo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `pregunta_t_pregunta_fk` FOREIGN KEY (`preg_t_pregunta`) REFERENCES `t_pregunta` (`tpre_tipo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD CONSTRAINT `provincia_region_fk` FOREIGN KEY (`prov_c_region`) REFERENCES `region` (`regi_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuesta_aplicada`
--
ALTER TABLE `respuesta_aplicada`
  ADD CONSTRAINT `respuesta_aplicada_detalle_pregunta_fk` FOREIGN KEY (`reap_c_pregunta`,`reap_c_opcion_pregunta`) REFERENCES `detalle_pregunta` (`depr_c_pregunta`, `depr_c_opcion_pregunta`) ON UPDATE CASCADE,
  ADD CONSTRAINT `respuesta_aplicada_e_respuesta_aplicada_fk` FOREIGN KEY (`reap_e_respuesta_aplicada`) REFERENCES `e_respuesta_aplicada` (`erea_estado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `respuesta_aplicada_inscripcion_evaluacion_aplicada_fk` FOREIGN KEY (`reap_c_actividad`,`reap_numero_dictacion`,`reap_c_evaluacion`,`reap_numero_evaluacion`,`reap_c_trabajador`) REFERENCES `inscripcion_evaluacion_aplicada` (`inevap_c_actividad`, `inevap_numero_dictacion`, `inevap_c_evaluacion`, `inevap_numero_evaluacion`, `inevap_c_trabajador`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD CONSTRAINT `trabajador_anios_experiencia_cargo_fk` FOREIGN KEY (`trab_c_anios_experiencia_cargo`) REFERENCES `anios_experiencia_cargo` (`anexca_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `trabajador_area_fk` FOREIGN KEY (`trab_c_area`) REFERENCES `area` (`area_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `trabajador_cargo_fk` FOREIGN KEY (`trab_c_cargo`) REFERENCES `cargo` (`carg_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `trabajador_gerencia_fk` FOREIGN KEY (`trab_c_gerencia`) REFERENCES `gerencia` (`gere_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `trabajador_persona_fk` FOREIGN KEY (`trab_c_persona`) REFERENCES `persona` (`pers_codigo`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
