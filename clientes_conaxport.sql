-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-07-2015 a las 16:56:46
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `clientes_conaxport`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abonob`
--

CREATE TABLE IF NOT EXISTS `abonob` (
`id_abono` int(3) unsigned zerofill NOT NULL,
  `fecha_abono` date DEFAULT NULL,
  `id_plan_sg` int(11) DEFAULT NULL,
  `clien_abono` int(11) DEFAULT NULL,
  `valor_abono` double DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `abonob`
--

INSERT INTO `abonob` (`id_abono`, `fecha_abono`, `id_plan_sg`, `clien_abono`, `valor_abono`) VALUES
(001, '2014-12-01', 9, 4, 100000),
(002, '2014-12-15', 2, 2, 10000),
(003, '2014-12-01', 2, 2, 500),
(004, '2014-12-02', 7, 1, 800),
(005, '2021-02-02', 6, 1, 50000),
(006, '2014-12-02', 11, 4, 2000),
(008, '2014-12-02', 14, 1, 950000),
(009, '2014-12-29', 17, 4, 20000),
(010, '2014-12-30', 19, 2, 20500),
(011, '2014-12-30', 20, 2, 20000),
(012, '2015-03-02', 25, 1, 25000),
(013, '2015-03-02', 26, 1, 8500),
(014, '2015-03-02', 27, 3, 150000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abonoc`
--

CREATE TABLE IF NOT EXISTS `abonoc` (
`id_indirecto` int(3) unsigned zerofill NOT NULL,
  `fecha_indirecto` date DEFAULT NULL,
  `terceros_indirecto` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descrip_indirecto` text COLLATE utf8_spanish_ci NOT NULL,
  `valor_indirecto` double DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `abonoc`
--

INSERT INTO `abonoc` (`id_indirecto`, `fecha_indirecto`, `terceros_indirecto`, `descrip_indirecto`, `valor_indirecto`) VALUES
(001, '2015-02-25', 'tex', 'hjkhkjhkjh', 0),
(002, '2014-12-16', 'tercero', 'esto es una descripciÃ³n', 20500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
`id_admin` int(11) NOT NULL,
  `usuadmin` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `correo_adm` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `password_adm` varchar(800) COLLATE utf8_spanish_ci NOT NULL,
  `avatar_adm` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `tip_adm` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `color_adm` varchar(150) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_admin`, `usuadmin`, `correo_adm`, `password_adm`, `avatar_adm`, `tip_adm`, `color_adm`) VALUES
(1, 'albert925', 'albertarias925@gmail.com', 'dragon123', 'imagenes/usuario/an42.jpg', '1', ''),
(2, 'fabian', 'f.morales@conaxport.com', 'proinco123.', 'imagenes/default.png', '2', ''),
(3, 'juan', 'juan@dominio.com', 'dragon', '', '1', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE IF NOT EXISTS `caja` (
`id_caja` int(11) NOT NULL,
  `fec_caja` date NOT NULL,
  `mes_caja` decimal(10,0) NOT NULL,
  `pago_caja` decimal(10,0) NOT NULL,
  `total_caja` decimal(10,0) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `caja`
--

INSERT INTO `caja` (`id_caja`, `fec_caja`, `mes_caja`, `pago_caja`, `total_caja`) VALUES
(4, '2015-03-01', '183500', '40000', '144500'),
(6, '2015-02-01', '0', '0', '-850000'),
(7, '2015-01-01', '0', '850000', '-850000'),
(8, '2015-06-01', '0', '0', '0'),
(9, '2014-02-01', '0', '23444', '-23444'),
(10, '2014-08-01', '0', '0', '0'),
(11, '2015-08-01', '0', '0', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cartera_indicador`
--

CREATE TABLE IF NOT EXISTS `cartera_indicador` (
`id_cart` int(11) NOT NULL,
  `fec_cart` date NOT NULL,
  `numero_cart` float NOT NULL,
  `numerb_cart` float NOT NULL,
  `numerc_cart` float NOT NULL,
  `numerd_cart` float NOT NULL,
  `numere_cart` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cartera_indicador`
--

INSERT INTO `cartera_indicador` (`id_cart`, `fec_cart`, `numero_cart`, `numerb_cart`, `numerc_cart`, `numerd_cart`, `numere_cart`) VALUES
(1, '2015-04-01', 50000, 50000, 0, 0, -1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE IF NOT EXISTS `ciudad` (
`id_ciudad` int(11) NOT NULL,
  `nam_ciudad` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id_ciudad`, `nam_ciudad`) VALUES
(3, 'BogotÃ¡'),
(4, 'CÃºcuta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
`id_usuario` int(11) NOT NULL,
  `nombre_us` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_us` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `correo_us` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_us` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `diaNcl` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `mesNcl` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_usuario`, `nombre_us`, `apellido_us`, `correo_us`, `telefono_us`, `diaNcl`, `mesNcl`) VALUES
(1, 'Miler', 'Dukkkvan', 'divmil@dominio.com', '5768508', '7', '11'),
(3, 'site', 'dove', 'der_f@dominio.com', '', '', ''),
(4, 'nombre nac', 'apellic}do nac', '', '', '19', '8'),
(5, 'dos', 'dos', '', '', '5', '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario_evento`
--

CREATE TABLE IF NOT EXISTS `comentario_evento` (
`id_cm` int(11) NOT NULL,
  `aut_id` int(11) NOT NULL,
  `text_cm` text COLLATE utf8_spanish_ci NOT NULL,
  `fec_cm` date NOT NULL,
  `evet_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comentario_evento`
--

INSERT INTO `comentario_evento` (`id_cm`, `aut_id`, `text_cm`, `fec_cm`, `evet_id`) VALUES
(14, 1, 'comentario 3', '2015-05-27', 1),
(15, 1, 'comentario5', '2015-05-27', 1),
(16, 1, 'comentario 6', '2015-05-27', 1),
(18, 1, 'prueba', '2015-05-27', 1),
(19, 2, 'mensaje 2 users', '2015-05-27', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `corr_corp`
--

CREATE TABLE IF NOT EXISTS `corr_corp` (
`id_corp` int(11) NOT NULL,
  `empre_id` int(11) NOT NULL,
  `corr_corp` varchar(450) COLLATE utf8_spanish_ci NOT NULL,
  `pass_corp` varchar(550) COLLATE utf8_spanish_ci NOT NULL,
  `pop3_imat` varchar(550) COLLATE utf8_spanish_ci NOT NULL,
  `smpt` varchar(550) COLLATE utf8_spanish_ci NOT NULL,
  `puerto_pop3` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `puerto_imat` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `corr_corp`
--

INSERT INTO `corr_corp` (`id_corp`, `empre_id`, `corr_corp`, `pass_corp`, `pop3_imat`, `smpt`, `puerto_pop3`, `puerto_imat`) VALUES
(1, 1, 'admin2@conaxport.com', 'dragon666', 'mail.conaxport.com', 'mail.conaxport.com', '140', '180');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costos`
--

CREATE TABLE IF NOT EXISTS `costos` (
`id_cos` int(11) NOT NULL,
  `nam_blanc` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `terc_prov_id` int(11) NOT NULL,
  `fecha_cos` date NOT NULL,
  `valor_cos` decimal(10,0) NOT NULL,
  `estad_cost` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `idadP_cost` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `costos`
--

INSERT INTO `costos` (`id_cos`, `nam_blanc`, `terc_prov_id`, `fecha_cos`, `valor_cos`, `estad_cost`, `idadP_cost`) VALUES
(1, '', 3, '2014-12-29', '126324', '2', 1),
(2, '', 3, '2014-12-29', '126324', '2', 1),
(3, 'si', 3, '2014-12-30', '126324', '1', 2),
(4, '', 1, '2014-12-30', '220', '2', 1),
(5, '', 3, '2015-01-19', '126324', '1', 2),
(6, 'der', 3, '2015-01-22', '850000', '2', 1),
(7, '', 3, '2015-02-09', '126324', '1', 2),
(8, '', 3, '2015-02-09', '126324', '1', 2),
(9, '', 3, '2015-03-02', '126324', '1', 2),
(10, '', 1, '2015-03-02', '220', '1', 2),
(11, '', 4, '2015-03-02', '550000', '1', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
`id_depart` int(11) NOT NULL,
  `nam_depart` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_depart`, `nam_depart`) VALUES
(2, 'Cundinamarca'),
(3, 'Norte de Santander'),
(4, 'Santander'),
(5, 'Meta'),
(6, 'Magdalena'),
(7, 'Cesar'),
(8, 'Antioquia'),
(9, 'Choco'),
(10, 'AtlÃ¡ntico'),
(11, 'San Andres y Providencia'),
(12, 'Vichada'),
(13, 'Amazonas'),
(14, 'Aracua'),
(15, 'BoyacÃ¡');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `depart_ciudad`
--

CREATE TABLE IF NOT EXISTS `depart_ciudad` (
`id_depart_ciud` int(11) NOT NULL,
  `Dpart_id` int(11) NOT NULL,
  `ciudad_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `depart_ciudad`
--

INSERT INTO `depart_ciudad` (`id_depart_ciud`, `Dpart_id`, `ciudad_id`) VALUES
(2, 2, 3),
(3, 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcionador`
--

CREATE TABLE IF NOT EXISTS `direcionador` (
`id_direcion` int(11) NOT NULL,
  `nam_direcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `precio_dire` double NOT NULL,
  `estado_dire` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `del_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `direcionador`
--

INSERT INTO `direcionador` (`id_direcion`, `nam_direcion`, `precio_dire`, `estado_dire`, `del_admin`) VALUES
(1, 'nombre director A', 0, '1', NULL),
(2, 'nombre director b', 0, '2', NULL),
(3, 'nombre director z', 0, '1', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE IF NOT EXISTS `empresas` (
`id_empresa` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `name_empr` varchar(455) COLLATE utf8_spanish_ci NOT NULL,
  `nit_emp` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tel_emp` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `direc_emp` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `texto_empr` text COLLATE utf8_spanish_ci NOT NULL,
  `pais_emp` int(11) NOT NULL,
  `depart_emp` int(11) NOT NULL,
  `ciudad_emp` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `usuario_id`, `name_empr`, `nit_emp`, `tel_emp`, `direc_emp`, `texto_empr`, `pais_emp`, `depart_emp`, `ciudad_emp`) VALUES
(1, 3, 'empres', '234448', '1234567', '', '', 1, 2, 3),
(2, 1, 'empresa2', '1234567890', '', 'cll 25 NÂ° 2-25', '', 1, 3, 4),
(3, 1, 'empresa tel', '012346789789', '654789', 'call ', '', 1, 2, 3),
(4, 5, 'empresa cucuta', '', '5768508', '', '', 1, 3, 4),
(5, 4, 'ert', '', '1234567890', '', '', 1, 2, 3),
(6, 1, 'provase', '0123456789', '1234567', 'cll 15', '', 1, 2, 3),
(7, 1, 'provaseb', '0123456789', '1234567', 'cll 15', '', 1, 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
`event_id` int(11) NOT NULL,
  `nam_ev` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `desc_ev` text COLLATE utf8_spanish_ci NOT NULL,
  `fec_ev` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`event_id`, `nam_ev`, `desc_ev`, `fec_ev`) VALUES
(1, 'prueba1', 'asdasdas', '2015-05-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_event`
--

CREATE TABLE IF NOT EXISTS `imagenes_event` (
`id_img_evet` int(11) NOT NULL,
  `rut_ev` varchar(455) COLLATE utf8_spanish_ci NOT NULL,
  `evet_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `imagenes_event`
--

INSERT INTO `imagenes_event` (`id_img_evet`, `rut_ev`, `evet_id`) VALUES
(7, 'imagenes/eventos/p4.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicador`
--

CREATE TABLE IF NOT EXISTS `indicador` (
`id_ind` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `tot_tareas` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ejecutadas_tareas` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `proceso_tareas` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `pendiente_tareas` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `porc_cada` float NOT NULL,
  `porc_area` float NOT NULL,
  `tipo_area` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fec_ind` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `indicador`
--

INSERT INTO `indicador` (`id_ind`, `admin_id`, `tot_tareas`, `ejecutadas_tareas`, `proceso_tareas`, `pendiente_tareas`, `porc_cada`, `porc_area`, `tipo_area`, `fec_ind`) VALUES
(2, 1, '2', '1', '1', '0', 0.5, 0.5, '5', '2015-04-01'),
(3, 2, '1', '0', '1', '0', 0, 0, '3', '2015-05-01'),
(4, 1, '1', '0', '1', '0', 0, 0, '1', '2015-06-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metab`
--

CREATE TABLE IF NOT EXISTS `metab` (
`id_metB` int(11) NOT NULL,
  `precio_mtB` decimal(10,0) NOT NULL,
  `restante_mtB` decimal(10,0) NOT NULL,
  `estado_mtB` int(11) NOT NULL,
  `mes_mtB` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `year_mtB` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `direc_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `metab`
--

INSERT INTO `metab` (`id_metB`, `precio_mtB`, `restante_mtB`, `estado_mtB`, `mes_mtB`, `year_mtB`, `direc_id`) VALUES
(2, '15000000', '14805250', 0, '2', '2015', 1),
(3, '50000000', '49805250', 0, '2', '2015', 3),
(4, '150000000', '0', 0, '3', '2015', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metas`
--

CREATE TABLE IF NOT EXISTS `metas` (
`id_meta` int(11) NOT NULL,
  `precio_meta` double NOT NULL,
  `restante_meta` double NOT NULL,
  `estado_mt` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `mes_mt` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `year_mt` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `depart_metas` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `metas`
--

INSERT INTO `metas` (`id_meta`, `precio_meta`, `restante_meta`, `estado_mt`, `mes_mt`, `year_mt`, `depart_metas`) VALUES
(5, 25, 25, '', '12', '2014', 7),
(6, 15000000, 14805250, '', '2', '2015', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE IF NOT EXISTS `pagos` (
`id_pago` int(11) NOT NULL,
  `terceros_id` int(11) NOT NULL,
  `fecha_p` date NOT NULL,
  `valor_p` double NOT NULL,
  `concepto_p` text COLLATE utf8_spanish_ci NOT NULL,
  `estado_p` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_pago` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `idadP` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id_pago`, `terceros_id`, `fecha_p`, `valor_p`, `concepto_p`, `estado_p`, `tipo_pago`, `idadP`) VALUES
(4, 3, '2014-01-02', 23455, '', '2', '1', 1),
(5, 1, '2014-02-01', 23444, 'dsddd', '2', '1', 1),
(6, 3, '2020-12-19', 1500, 'El pÃ¡rrafo es la exposiciÃ³n coherente y por escrito de una idea completa. Es unidad de pensamiento y sentimiento, forma la unidad de expresiÃ³n en el lenguaje escrito. Dicha unidad estÃ¡ integrada por dos elementos: el enunciado principal y los enunciados secundarios, los cuales complementan al principal.  sdfsd4456456', '1', '1', 1),
(7, 3, '2014-12-30', 500000, 'pago prueba', '1', '1', 1),
(8, 1, '2014-12-11', 20000, 'ss', '2', '1', 1),
(9, 1, '2014-12-03', 203666, 'aser', '2', '2', 3),
(10, 1, '2014-12-30', 500000, 'serere', '1', '2', 1),
(11, 1, '2015-01-30', 500000, 'serere', '1', '2', 1),
(12, 1, '0000-00-00', 500000, 'serere', '1', '2', 1),
(13, 3, '2015-03-02', 10000, '', '2', '1', 1),
(14, 4, '2015-03-02', 10000, '', '2', '1', 1),
(15, 5, '2015-03-03', 20000, '', '2', '2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
`id_pais` int(11) NOT NULL,
  `nam_pais` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id_pais`, `nam_pais`) VALUES
(1, 'Colombia'),
(2, 'Ecuador'),
(3, 'PanamÃ¡'),
(5, 'Brasil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais_depart`
--

CREATE TABLE IF NOT EXISTS `pais_depart` (
`id_pais_depart` int(11) NOT NULL,
  `pais_id` int(11) NOT NULL,
  `depart_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pais_depart`
--

INSERT INTO `pais_depart` (`id_pais_depart`, `pais_id`, `depart_id`) VALUES
(3, 1, 2),
(4, 1, 3),
(1, 1, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE IF NOT EXISTS `planes` (
`id_plan` int(11) NOT NULL,
  `nombre_plan` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `espacio_plan` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `transferencia_plan` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cuentas_correo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `precio_plan` double NOT NULL,
  `precio_direcion` double NOT NULL,
  `insumos_pl` double NOT NULL,
  `proveedor_idpl` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `planes`
--

INSERT INTO `planes` (`id_plan`, `nombre_plan`, `espacio_plan`, `transferencia_plan`, `cuentas_correo`, `precio_plan`, `precio_direcion`, `insumos_pl`, `proveedor_idpl`) VALUES
(3, 'plan 2', '200 MB', '2GB', 'ilimitado', 20000, 325000, 850, 1),
(4, 'plan 3', '25', '1', 'ilimitado', 205000, 30000, 2500, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
`id_proveedor` int(11) NOT NULL,
  `name_prove` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `precio` double NOT NULL,
  `estado_prove` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `name_prove`, `precio`, `estado_prove`) VALUES
(1, 'nameproveC', 220, ''),
(3, 'winkhosting', 126324, ''),
(4, 'prove 6', 550000, ''),
(5, 'prove 8', 550000, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibo`
--

CREATE TABLE IF NOT EXISTS `recibo` (
`n_rec` int(3) unsigned zerofill NOT NULL,
  `fecha_rc` date NOT NULL,
  `lug_rc` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `empre_id` int(11) NOT NULL,
  `text_rc` text COLLATE utf8_spanish_ci NOT NULL,
  `num_letras` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `vaor_T` decimal(10,0) NOT NULL,
  `cheke_rc` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `banco_rc` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `efect_rc` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `estad_rc` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `recibo`
--

INSERT INTO `recibo` (`n_rec`, `fecha_rc`, `lug_rc`, `empre_id`, `text_rc`, `num_letras`, `vaor_T`, `cheke_rc`, `banco_rc`, `efect_rc`, `estad_rc`) VALUES
(001, '0000-00-00', 'a', 2, 'd', '', '0', 'e', 'f', '0', '1'),
(002, '0000-00-00', 'a', 2, 'd', '', '0', 'e', 'f', '1', '1'),
(003, '2014-12-30', 'BogotÃ¡', 2, 'plan 2-plan 3-', '', '40500', '', '', '0', '1'),
(004, '2014-12-30', 'empresa', 4, 'plan 2-', '', '2000', '', '', '0', '1'),
(005, '2014-12-30', 'BogotÃ¡', 1, 'plan 3-', '', '50000', '', '', '', '1'),
(006, '2014-12-30', 'CÃºcuta', 2, 'plan 2-plan 3-', 'cuarenta mil quinientos', '40500', '', '', '0', '1'),
(007, '2014-12-30', 'CÃºcuta', 4, 'plan 2-', '', '2000', '', '', '0', '1'),
(008, '2014-12-30', 'CÃºcuta', 4, 'plan 3-', '', '100000', '', '', '', '1'),
(009, '2014-12-30', 'CÃºcuta', 4, 'plan 2-', '', '2000', '', '', '', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE IF NOT EXISTS `seguimiento` (
`id_seguimineto` int(11) NOT NULL,
  `empre_id_seg` int(11) NOT NULL,
  `plan_id_seg` int(11) NOT NULL,
  `descuento` double NOT NULL,
  `abono1` double NOT NULL,
  `fecabA` date NOT NULL,
  `estdA` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `abono2` double NOT NULL,
  `fecabB` date NOT NULL,
  `estdB` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `abono3` double NOT NULL,
  `fecabC` date NOT NULL,
  `estdC` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `saldo` double NOT NULL,
  `en_caja` double NOT NULL,
  `fi_plan` date NOT NULL,
  `ff_plan` date NOT NULL,
  `estad_plan` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `redirec_id` int(11) NOT NULL,
  `valor_p_dire` double NOT NULL,
  `estado_pag_dire` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `insumos` double NOT NULL,
  `estado_insumo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `id_provee` int(11) NOT NULL,
  `precio_t_prove` double NOT NULL,
  `estad_prove` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `dominio` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `ftp` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `pass_usuario_dm` varchar(800) COLLATE utf8_spanish_ci NOT NULL,
  `fech_r` date NOT NULL,
  `estado_servidor` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `id_servi` int(11) NOT NULL,
  `correo_correo` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `pass_correo` varchar(800) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_face` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `pass_face` varchar(800) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_inst` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `pass_inst` varchar(800) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_pinters` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `pass_pinters` varchar(800) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_likind` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `pass_likind` varchar(800) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_twitter` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `pass_twitter` varchar(800) COLLATE utf8_spanish_ci NOT NULL,
  `link_adm` varchar(800) COLLATE utf8_spanish_ci NOT NULL,
  `us_adm` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `pass_adm` varchar(800) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `mes_in` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `year_in` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `seguimiento`
--

INSERT INTO `seguimiento` (`id_seguimineto`, `empre_id_seg`, `plan_id_seg`, `descuento`, `abono1`, `fecabA`, `estdA`, `abono2`, `fecabB`, `estdB`, `abono3`, `fecabC`, `estdC`, `saldo`, `en_caja`, `fi_plan`, `ff_plan`, `estad_plan`, `redirec_id`, `valor_p_dire`, `estado_pag_dire`, `insumos`, `estado_insumo`, `id_provee`, `precio_t_prove`, `estad_prove`, `dominio`, `ftp`, `usuario`, `pass_usuario_dm`, `fech_r`, `estado_servidor`, `id_servi`, `correo_correo`, `pass_correo`, `usuario_face`, `pass_face`, `usuario_inst`, `pass_inst`, `usuario_pinters`, `pass_pinters`, `usuario_likind`, `pass_likind`, `usuario_twitter`, `pass_twitter`, `link_adm`, `us_adm`, `pass_adm`, `fecha_ingreso`, `mes_in`, `year_in`) VALUES
(1, 1, 4, 10250, 11, '0000-00-00', '1', 22, '0000-00-00', '1', 33, '0000-00-00', '1', 194684, 10, '2014-02-16', '2014-08-15', '2', 2, 30000, '2', 2500, '1', 3, 126324, '2', 'dominio.com', '102.562.02.2:32', 'root', 'rootpass', '2014-02-04', '1', 1, 'correo.com', 'passcorreo', 'usface', 'passface', 'usist', 'passist', 'cmabio fin', 'passpints', 'usslikinf', 'passlikind', 'ustwiter', 'passtwiter', 'http://conaxport.com/angeles/angadm/', 'admin', 'ang123.', '2015-03-28', '3', '2015'),
(2, 2, 3, 1000, 800, '0000-00-00', '2', 500, '2014-12-01', '0', 0, '0000-00-00', '1', 7200, 10, '2015-12-18', '2050-12-19', '2', 2, 325000, '2', 850, '1', 1, 220, '2', 'https://www.google.com.co/?gws_rd=ssl#q=seleccionar+un+select+jquery&spell=1', '92.023.55:85', 'rootsbb', 'pasddcc', '2080-09-17', '1', 1, '', '', '', '', 'serewre', 'passist', '', '', '', 'sadsads', '', '', '', '', '', '2014-02-15', '2', '2014'),
(3, 1, 4, 10250, 0, '0201-02-05', '2', 0, '2020-02-05', '2', 0, '0000-00-00', '1', 0, 10, '2014-05-02', '2014-02-01', '1', 2, 30000, '1', 2500, '2', 3, 126324, '2', '', '', '', '', '0000-00-00', '1', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2014-09-30', '9', '2014'),
(4, 2, 4, 10250, 0, '0000-00-00', '0', 0, '0000-00-00', '0', 0, '0000-00-00', '0', 0, 10, '2014-03-02', '2014-03-03', '1', 1, 30000, '2', 2500, '1', 3, 126324, '1', 'dominio2', '', '', '', '0000-00-00', '1', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2014-10-02', '10', '2014'),
(5, 1, 4, 10250, 0, '0000-00-00', '0', 0, '0000-00-00', '0', 0, '0000-00-00', '0', 0, 10, '2014-02-03', '2014-05-04', '2', 1, 30000, '1', 2500, '1', 3, 126324, '1', '', '', '', '', '0000-00-00', '1', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2014-10-02', '10', '2014'),
(6, 1, 4, 10250, 5000, '2014-11-01', '1', 50000, '2021-02-02', '2', 5000, '2014-11-03', '1', 129750, 143824, '2014-11-04', '2015-01-01', '2', 1, 30000, '1', 2500, '1', 3, 126324, '1', '', '', '', '', '2014-11-06', '1', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2014-11-07', '11', '2014'),
(7, 1, 3, 1000, 0, '0000-00-00', '0', 800, '2014-12-02', '0', 0, '0000-00-00', '0', -800, 0, '0000-00-00', '0000-00-00', '1', 1, 325000, '1', 850, '1', 1, 220, '0', '', '', '', '', '0000-00-00', '1', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2014-11-21', '11', '2014'),
(8, 3, 3, 1000, 0, '0000-00-00', '0', 0, '0000-00-00', '0', 0, '0000-00-00', '0', 0, 0, '0000-00-00', '0000-00-00', '1', 2, 325000, '1', 850, '1', 1, 220, '0', '', '', '', '', '0000-00-00', '1', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2014-11-21', '11', '2014'),
(9, 4, 4, 10250, 0, '0000-00-00', '0', 100000, '2014-12-01', '0', 0, '0000-00-00', '0', -100000, 0, '0000-00-00', '0000-00-00', '1', 1, 30000, '1', 2500, '1', 3, 126324, '0', '', '', '', '', '0000-00-00', '1', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2014-11-21', '11', '2014'),
(10, 1, 3, 1000, 0, '0000-00-00', '0', 0, '0000-00-00', '0', 0, '0000-00-00', '0', 0, 0, '0000-00-00', '0000-00-00', '1', 3, 325000, '1', 850, '1', 1, 220, '0', '', '', '', '', '0000-00-00', '1', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2014-12-02', '12', '2014'),
(11, 4, 3, 1000, 2000, '0000-00-00', '0', 0, '0000-00-00', '0', 0, '0000-00-00', '0', 17000, 324070, '0000-00-00', '0000-00-00', '1', 2, 325000, '1', 850, '1', 1, 220, '0', '', '', '', '', '0000-00-00', '1', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2014-12-02', '12', '2014'),
(12, 4, 4, 10250, 0, '0000-00-00', '0', 0, '0000-00-00', '0', 0, '0000-00-00', '0', 0, 0, '0000-00-00', '0000-00-00', '1', 1, 30000, '1', 2500, '1', 3, 126324, '0', '', '', '', '', '0000-00-00', '1', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2014-12-02', '12', '2014'),
(13, 5, 3, 1000, 0, '0000-00-00', '0', 0, '0000-00-00', '0', 0, '0000-00-00', '0', 0, 0, '0000-00-00', '0000-00-00', '1', 3, 325000, '2', 850, '1', 1, 220, '0', '', '', '', '', '0000-00-00', '1', 1, '', '', 'usuairo face', '123456789', '', '', '', '', '', '', '', '', '', '', '', '2014-12-02', '12', '2014'),
(14, 1, 3, 1000, 950000, '0000-00-00', '0', 0, '0000-00-00', '0', 0, '0000-00-00', '0', -931000, 623930, '0000-00-00', '0000-00-00', '1', 3, 325000, '1', 850, '1', 1, 220, '0', '', '', '', '', '0000-00-00', '1', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2014-12-02', '12', '2014'),
(15, 3, 4, 10250, 0, '0000-00-00', '0', 0, '0000-00-00', '0', 0, '0000-00-00', '0', 0, 0, '0000-00-00', '0000-00-00', '1', 1, 30000, '1', 2500, '1', 3, 126324, '0', '', '', '', '', '0000-00-00', '1', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2014-12-29', '12', '2014'),
(16, 4, 3, 1000, 0, '0000-00-00', '0', 0, '0000-00-00', '0', 0, '0000-00-00', '0', 0, 0, '0000-00-00', '0000-00-00', '1', 2, 325000, '1', 850, '1', 1, 220, '0', '', '', '', '', '0000-00-00', '1', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2014-12-29', '12', '2014'),
(17, 4, 4, 10250, 20000, '0000-00-00', '0', 0, '0000-00-00', '0', 0, '0000-00-00', '0', 174750, 138824, '0000-00-00', '0000-00-00', '1', 1, 30000, '2', 2500, '1', 3, 126324, '0', '', '', '', '', '0000-00-00', '1', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2014-12-29', '12', '2014'),
(18, 4, 4, 10250, 0, '0000-00-00', '0', 0, '0000-00-00', '0', 0, '0000-00-00', '0', 0, 0, '0000-00-00', '0000-00-00', '1', 1, 30000, '2', 2500, '1', 3, 126324, '0', '', '', '', '', '0000-00-00', '1', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2014-12-29', '12', '2014'),
(19, 2, 4, 10250, 20500, '0000-00-00', '0', 0, '0000-00-00', '0', 0, '0000-00-00', '0', 174250, 138324, '0000-00-00', '0000-00-00', '1', 2, 30000, '3', 2500, '1', 3, 126324, '0', '', '', '', '', '0000-00-00', '1', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2014-12-30', '12', '2014'),
(20, 2, 3, 1000, 20000, '0000-00-00', '0', 0, '0000-00-00', '0', 0, '0000-00-00', '0', -1000, 306070, '0000-00-00', '0000-00-00', '1', 2, 325000, '3', 850, '1', 1, 220, '0', '', '', '', '', '0000-00-00', '1', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2014-12-30', '12', '2014'),
(21, 7, 4, 10250, 0, '0000-00-00', '0', 0, '0000-00-00', '0', 0, '0000-00-00', '0', 0, 0, '0000-00-00', '0000-00-00', '1', 2, 30000, '2', 2500, '1', 3, 126324, '0', '', '', '', '', '0000-00-00', '1', 1, '', '', '', '', '', '', '', '', '', '', '', '', 'http://conaxport.com/angeles/angadm/', 'admin', 'inqui123.', '2015-01-19', '01', '2015'),
(22, 7, 4, 10250, 0, '0000-00-00', '0', 0, '0000-00-00', '0', 0, '0000-00-00', '0', 0, 0, '0000-00-00', '0000-00-00', '1', 1, 30000, '2', 2500, '1', 3, 126324, '0', '', '', '', '', '0000-00-00', '1', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2015-01-22', '01', '2015'),
(23, 1, 4, 10250, 0, '0000-00-00', '0', 0, '0000-00-00', '0', 0, '0000-00-00', '0', 500000, 0, '0000-00-00', '0000-00-00', '1', 1, 30000, '3', 2500, '1', 3, 126324, '0', '', '', '', '', '0000-00-00', '1', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2015-02-09', '02', '2015'),
(24, 4, 4, 10250, 0, '0000-00-00', '0', 0, '0000-00-00', '0', 0, '0000-00-00', '0', 5000000, 0, '0000-00-00', '0000-00-00', '1', 3, 30000, '2', 2500, '1', 3, 126324, '0', '', '', '', '', '0000-00-00', '1', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2015-02-09', '02', '2015'),
(25, 1, 4, 10250, 25000, '0000-00-00', '0', 0, '0000-00-00', '0', 0, '0000-00-00', '0', 169750, 133824, '0000-00-00', '0000-00-00', '1', 1, 30000, '2', 2500, '1', 3, 126324, '0', '', '', '', '', '0000-00-00', '1', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2015-03-02', '03', '2015'),
(26, 1, 3, 1000, 8500, '0000-00-00', '0', 0, '0000-00-00', '0', 0, '0000-00-00', '0', 10500, 317570, '0000-00-00', '0000-00-00', '1', 1, 325000, '2', 850, '1', 1, 220, '0', '', '', '', '', '0000-00-00', '1', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2015-03-02', '03', '2015'),
(27, 3, 4, 10250, 150000, '0000-00-00', '0', 0, '0000-00-00', '0', 0, '0000-00-00', '0', 44750, 8824, '0000-00-00', '0000-00-00', '1', 1, 30000, '2', 2500, '1', 4, 126324, '0', '', '', '', '', '0000-00-00', '1', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2015-03-02', '03', '2015');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servidores`
--

CREATE TABLE IF NOT EXISTS `servidores` (
`id_servidor` int(11) NOT NULL,
  `proveedor_id` int(11) NOT NULL,
  `dominio` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `ftp` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_renov` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE IF NOT EXISTS `tareas` (
`id_tarea` int(11) NOT NULL,
  `segui_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `tare_nam` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `DI` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `MI` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `AI` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fechain_tar` date NOT NULL,
  `DF` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `MF` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `AF` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fechafin_tar` date NOT NULL,
  `area_tarea` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_ing` date NOT NULL,
  `descrip_tarea` text COLLATE utf8_spanish_ci NOT NULL,
  `esta_tar` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id_tarea`, `segui_id`, `admin_id`, `tare_nam`, `DI`, `MI`, `AI`, `fechain_tar`, `DF`, `MF`, `AF`, `fechafin_tar`, `area_tarea`, `fecha_ing`, `descrip_tarea`, `esta_tar`) VALUES
(3, 2, 1, 'sere2', '1', '3', '2014', '2014-03-01', '0', '0', '', '0000-00-00', '', '0000-00-00', '', '3'),
(5, 2, 2, 'tarea', '5', '3', '2014', '2014-03-05', '0', '0', '', '0000-00-00', '', '0000-00-00', '', '2'),
(6, 5, 2, 'dcdsfdsf', '3', '4', '2014', '2014-04-03', '0', '0', '', '0000-00-00', '5', '0000-00-00', '', '1'),
(7, 4, 2, 'asdsadsad', '3', '2', '2014', '2014-02-03', '0', '0', '', '2015-02-03', '', '0000-00-00', '', '1'),
(8, 9, 1, 'dos', '1', '1', '2015', '2015-06-06', '1', '1', '2015', '2015-04-08', '5', '0000-00-00', 'asdasdasdasdasdasd 5', '2'),
(9, 13, 3, 'diseÃ±ar personajes', '1', '1', '2015', '2015-06-07', '1', '1', '2015', '2015-04-30', '2', '0000-00-00', 'presnajes 2D', '1'),
(10, 22, 1, 'tres', '1', '1', '2015', '2015-04-08', '1', '1', '2015', '2015-06-27', '5', '2015-04-09', 'asdasdae bien o', '3'),
(11, 22, 1, 'pruebauses', '1', '1', '2015', '2015-06-02', '1', '1', '2015', '2015-06-06', '1', '2015-05-11', 'asdasdasdasd', '1'),
(12, 22, 1, 'pruebauses', '1', '1', '2015', '2015-06-02', '1', '1', '2015', '2015-06-06', '1', '2015-05-11', 'asdasdasdasd', '1'),
(13, 22, 2, 'trytry', '1', '1', '2015', '2015-05-12', '1', '1', '2015', '2015-05-20', '3', '2015-05-11', '.', '3'),
(14, 11, 3, 'hyjk', '1', '1', '2015', '2015-06-12', '1', '1', '2015', '0000-00-00', '6', '2015-05-25', 'vnvb', '1'),
(15, 11, 3, 'hyjk', '1', '1', '2015', '2015-06-12', '1', '1', '2015', '0000-00-00', '6', '2015-05-25', 'vnvb', '1'),
(16, 7, 1, '324234', '1', '1', '2015', '2015-06-06', '1', '1', '2015', '0000-00-00', '1', '2015-06-02', 'sdasdasdasd', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terceros`
--

CREATE TABLE IF NOT EXISTS `terceros` (
`id_tercer` int(11) NOT NULL,
  `nomb_terc` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ced_nit_terc` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `telf_terc` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `dire_terc` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_terc` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `terceros`
--

INSERT INTO `terceros` (`id_tercer`, `nomb_terc`, `ced_nit_terc`, `telf_terc`, `dire_terc`, `tipo_terc`) VALUES
(1, 'tercx12', '1234564', '1234564', 'cll', '4'),
(3, 'as', '123456', '123456', '', '2'),
(4, 'bs', '23443556', '23443556', '', '2'),
(5, 'provaseb', '0123456789', '1234567', 'cll 15', '2'),
(6, 'prove 8', '', '', '', '4');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abonob`
--
ALTER TABLE `abonob`
 ADD PRIMARY KEY (`id_abono`), ADD KEY `id_plan_sg` (`id_plan_sg`), ADD KEY `clien_abono` (`clien_abono`);

--
-- Indices de la tabla `abonoc`
--
ALTER TABLE `abonoc`
 ADD PRIMARY KEY (`id_indirecto`);

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
 ADD PRIMARY KEY (`id_caja`);

--
-- Indices de la tabla `cartera_indicador`
--
ALTER TABLE `cartera_indicador`
 ADD PRIMARY KEY (`id_cart`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
 ADD PRIMARY KEY (`id_ciudad`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
 ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `comentario_evento`
--
ALTER TABLE `comentario_evento`
 ADD PRIMARY KEY (`id_cm`), ADD KEY `evet_id` (`evet_id`), ADD KEY `aut_id` (`aut_id`);

--
-- Indices de la tabla `corr_corp`
--
ALTER TABLE `corr_corp`
 ADD PRIMARY KEY (`id_corp`), ADD KEY `empre_id` (`empre_id`);

--
-- Indices de la tabla `costos`
--
ALTER TABLE `costos`
 ADD PRIMARY KEY (`id_cos`), ADD KEY `terc_seg_id` (`terc_prov_id`,`idadP_cost`), ADD KEY `idadP_cost` (`idadP_cost`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
 ADD PRIMARY KEY (`id_depart`);

--
-- Indices de la tabla `depart_ciudad`
--
ALTER TABLE `depart_ciudad`
 ADD PRIMARY KEY (`id_depart_ciud`), ADD KEY `Dpart_id` (`Dpart_id`,`ciudad_id`), ADD KEY `ciudad_id` (`ciudad_id`);

--
-- Indices de la tabla `direcionador`
--
ALTER TABLE `direcionador`
 ADD PRIMARY KEY (`id_direcion`), ADD KEY `del_admin` (`del_admin`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
 ADD PRIMARY KEY (`id_empresa`), ADD KEY `usuario_id` (`usuario_id`), ADD KEY `pais_emp` (`pais_emp`,`depart_emp`,`ciudad_emp`), ADD KEY `depart_emp` (`depart_emp`), ADD KEY `ciudad_emp` (`ciudad_emp`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
 ADD PRIMARY KEY (`event_id`);

--
-- Indices de la tabla `imagenes_event`
--
ALTER TABLE `imagenes_event`
 ADD PRIMARY KEY (`id_img_evet`), ADD KEY `evet_id` (`evet_id`);

--
-- Indices de la tabla `indicador`
--
ALTER TABLE `indicador`
 ADD PRIMARY KEY (`id_ind`), ADD KEY `admin_id` (`admin_id`);

--
-- Indices de la tabla `metab`
--
ALTER TABLE `metab`
 ADD PRIMARY KEY (`id_metB`), ADD KEY `direc_id` (`direc_id`);

--
-- Indices de la tabla `metas`
--
ALTER TABLE `metas`
 ADD PRIMARY KEY (`id_meta`), ADD KEY `depart_metas` (`depart_metas`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
 ADD PRIMARY KEY (`id_pago`), ADD KEY `terceros_id` (`terceros_id`), ADD KEY `idadP` (`idadP`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
 ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `pais_depart`
--
ALTER TABLE `pais_depart`
 ADD PRIMARY KEY (`id_pais_depart`), ADD KEY `pais_id` (`pais_id`,`depart_id`), ADD KEY `depart_id` (`depart_id`);

--
-- Indices de la tabla `planes`
--
ALTER TABLE `planes`
 ADD PRIMARY KEY (`id_plan`), ADD KEY `proveedor_idpl` (`proveedor_idpl`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
 ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `recibo`
--
ALTER TABLE `recibo`
 ADD PRIMARY KEY (`n_rec`), ADD KEY `empre_id` (`empre_id`);

--
-- Indices de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
 ADD PRIMARY KEY (`id_seguimineto`), ADD KEY `usuario_id_seg` (`empre_id_seg`,`plan_id_seg`,`redirec_id`,`id_provee`,`id_servi`), ADD KEY `plan_id_seg` (`plan_id_seg`), ADD KEY `redirec_id` (`redirec_id`), ADD KEY `id_servi` (`id_servi`), ADD KEY `id_provee` (`id_provee`);

--
-- Indices de la tabla `servidores`
--
ALTER TABLE `servidores`
 ADD PRIMARY KEY (`id_servidor`), ADD KEY `proveedor_id` (`proveedor_id`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
 ADD PRIMARY KEY (`id_tarea`), ADD KEY `plan_id` (`segui_id`,`admin_id`), ADD KEY `admin_id` (`admin_id`);

--
-- Indices de la tabla `terceros`
--
ALTER TABLE `terceros`
 ADD PRIMARY KEY (`id_tercer`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abonob`
--
ALTER TABLE `abonob`
MODIFY `id_abono` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `abonoc`
--
ALTER TABLE `abonoc`
MODIFY `id_indirecto` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
MODIFY `id_caja` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `cartera_indicador`
--
ALTER TABLE `cartera_indicador`
MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `comentario_evento`
--
ALTER TABLE `comentario_evento`
MODIFY `id_cm` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `corr_corp`
--
ALTER TABLE `corr_corp`
MODIFY `id_corp` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `costos`
--
ALTER TABLE `costos`
MODIFY `id_cos` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
MODIFY `id_depart` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `depart_ciudad`
--
ALTER TABLE `depart_ciudad`
MODIFY `id_depart_ciud` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `direcionador`
--
ALTER TABLE `direcionador`
MODIFY `id_direcion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `imagenes_event`
--
ALTER TABLE `imagenes_event`
MODIFY `id_img_evet` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `indicador`
--
ALTER TABLE `indicador`
MODIFY `id_ind` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `metab`
--
ALTER TABLE `metab`
MODIFY `id_metB` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `metas`
--
ALTER TABLE `metas`
MODIFY `id_meta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `pais_depart`
--
ALTER TABLE `pais_depart`
MODIFY `id_pais_depart` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
MODIFY `id_plan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `recibo`
--
ALTER TABLE `recibo`
MODIFY `n_rec` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
MODIFY `id_seguimineto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `servidores`
--
ALTER TABLE `servidores`
MODIFY `id_servidor` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
MODIFY `id_tarea` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `terceros`
--
ALTER TABLE `terceros`
MODIFY `id_tercer` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `abonob`
--
ALTER TABLE `abonob`
ADD CONSTRAINT `abonob_ibfk_1` FOREIGN KEY (`id_plan_sg`) REFERENCES `seguimiento` (`id_seguimineto`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `abonob_ibfk_2` FOREIGN KEY (`clien_abono`) REFERENCES `empresas` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentario_evento`
--
ALTER TABLE `comentario_evento`
ADD CONSTRAINT `comentario_evento_ibfk_1` FOREIGN KEY (`evet_id`) REFERENCES `evento` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `comentario_evento_ibfk_2` FOREIGN KEY (`aut_id`) REFERENCES `administrador` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `corr_corp`
--
ALTER TABLE `corr_corp`
ADD CONSTRAINT `corr_corp_ibfk_1` FOREIGN KEY (`empre_id`) REFERENCES `empresas` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `costos`
--
ALTER TABLE `costos`
ADD CONSTRAINT `costos_ibfk_1` FOREIGN KEY (`terc_prov_id`) REFERENCES `proveedores` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `costos_ibfk_2` FOREIGN KEY (`idadP_cost`) REFERENCES `administrador` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `depart_ciudad`
--
ALTER TABLE `depart_ciudad`
ADD CONSTRAINT `depart_ciudad_ibfk_1` FOREIGN KEY (`Dpart_id`) REFERENCES `departamento` (`id_depart`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `depart_ciudad_ibfk_2` FOREIGN KEY (`ciudad_id`) REFERENCES `ciudad` (`id_ciudad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empresas`
--
ALTER TABLE `empresas`
ADD CONSTRAINT `empresas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `clientes` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `empresas_ibfk_2` FOREIGN KEY (`pais_emp`) REFERENCES `pais` (`id_pais`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `empresas_ibfk_3` FOREIGN KEY (`depart_emp`) REFERENCES `departamento` (`id_depart`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `empresas_ibfk_4` FOREIGN KEY (`ciudad_emp`) REFERENCES `ciudad` (`id_ciudad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagenes_event`
--
ALTER TABLE `imagenes_event`
ADD CONSTRAINT `imagenes_event_ibfk_1` FOREIGN KEY (`evet_id`) REFERENCES `evento` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `indicador`
--
ALTER TABLE `indicador`
ADD CONSTRAINT `indicador_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `administrador` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `metab`
--
ALTER TABLE `metab`
ADD CONSTRAINT `metab_ibfk_1` FOREIGN KEY (`direc_id`) REFERENCES `direcionador` (`id_direcion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `metas`
--
ALTER TABLE `metas`
ADD CONSTRAINT `metas_ibfk_1` FOREIGN KEY (`depart_metas`) REFERENCES `departamento` (`id_depart`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`terceros_id`) REFERENCES `terceros` (`id_tercer`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `pagos_ibfk_2` FOREIGN KEY (`idadP`) REFERENCES `administrador` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pais_depart`
--
ALTER TABLE `pais_depart`
ADD CONSTRAINT `pais_depart_ibfk_1` FOREIGN KEY (`pais_id`) REFERENCES `pais` (`id_pais`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `pais_depart_ibfk_2` FOREIGN KEY (`depart_id`) REFERENCES `departamento` (`id_depart`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `planes`
--
ALTER TABLE `planes`
ADD CONSTRAINT `planes_ibfk_1` FOREIGN KEY (`proveedor_idpl`) REFERENCES `proveedores` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recibo`
--
ALTER TABLE `recibo`
ADD CONSTRAINT `recibo_ibfk_1` FOREIGN KEY (`empre_id`) REFERENCES `empresas` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
ADD CONSTRAINT `seguimiento_ibfk_1` FOREIGN KEY (`empre_id_seg`) REFERENCES `empresas` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `seguimiento_ibfk_5` FOREIGN KEY (`plan_id_seg`) REFERENCES `planes` (`id_plan`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `seguimiento_ibfk_6` FOREIGN KEY (`redirec_id`) REFERENCES `direcionador` (`id_direcion`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `seguimiento_ibfk_7` FOREIGN KEY (`id_provee`) REFERENCES `proveedores` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tareas`
--
ALTER TABLE `tareas`
ADD CONSTRAINT `tareas_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `administrador` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tareas_ibfk_2` FOREIGN KEY (`segui_id`) REFERENCES `seguimiento` (`id_seguimineto`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
