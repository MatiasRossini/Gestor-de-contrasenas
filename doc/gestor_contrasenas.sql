-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2023 a las 22:34:48
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestor_contrasenas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrasenas`
--

CREATE TABLE `contrasenas` (
  `IDD_CONTRASENA` int(11) NOT NULL COMMENT 'ID de la contraseña ingresada.',
  `STR_CONTRASENA` varchar(512) NOT NULL COMMENT 'Contraseña con protección SHA512.',
  `STR_DESCRIPCION` varchar(512) NOT NULL COMMENT 'Descripción de la contraseña.',
  `IDD_ICONOGRAFIA` int(11) NOT NULL COMMENT 'ID del icono agregado a la contraseña.',
  `BUL_OCULTA` tinyint(1) NOT NULL COMMENT 'Valor booleano que determina si el usuario quiere (en su interfaz), mantenerla oculta.',
  `IDD_CREADOR` int(11) NOT NULL COMMENT 'ID del usuario que la creo',
  `DTE_ALTA` date NOT NULL COMMENT 'Fecha de alta de la contraseña.',
  `DTE_MOD` date NOT NULL COMMENT 'Fecha de la ultima modificación de la contraseña.',
  `DTE_BAJA` date DEFAULT NULL COMMENT 'Fecha de baja de la contraseña (Si no es NULL, la contraseña esta "borrada")'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tabla de las contraseñas que almacena el usuario en la BD';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrasenas_grupos`
--

CREATE TABLE `contrasenas_grupos` (
  `IDD_CONTRASENA_GRUPO` int(11) NOT NULL COMMENT 'ID de la contraseña en un grupo.',
  `IDD_CONTRASENA` int(11) NOT NULL COMMENT 'ID de la contraseña.',
  `IDD_GRUPO` int(11) NOT NULL COMMENT 'ID del grupo.',
  `IDD_CREADOR` int(11) NOT NULL COMMENT 'ID del usuario al que pertenece.',
  `DTE_ALTA` date NOT NULL COMMENT 'Fecha de alta de la contraseña en un grupo',
  `DTE_MOD` date NOT NULL COMMENT 'Fecha de modificación de una contraseña en un grupo.',
  `DTE_BAJA` date DEFAULT NULL COMMENT 'Fecha de baja de una contraseña en un grupo (Si no es "NULL", esta "eliminado").'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tabla de contraseñas que pertenecen a un grupo';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `IDD_GRUPO` int(11) NOT NULL COMMENT 'ID del grupo.',
  `STR_NOMBRE` varchar(100) NOT NULL COMMENT 'Nombre del grupo.',
  `STR_DESCRIPCION` varchar(512) NOT NULL COMMENT 'Descripción del grupo.',
  `IDD_ICONOGRAFIA` int(11) NOT NULL COMMENT 'Icono del grupo.',
  `IDD_CREADOR` int(11) NOT NULL COMMENT 'ID del usuario que lo creo.',
  `DTE_ALTA` date NOT NULL COMMENT 'Fecha de alta del grupo',
  `DTE_MOD` date NOT NULL COMMENT 'Fecha de modificación del grupo',
  `DTE_BAJA` date DEFAULT NULL COMMENT 'Fecha de baja del grupo (Si no es NULL, esta "eliminado")'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tabla de grupos del sistema.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iconografias`
--

CREATE TABLE `iconografias` (
  `IDD_ICONO` int(11) NOT NULL COMMENT 'ID del icono.',
  `STR_NOMBRE` varchar(251) NOT NULL COMMENT 'Nombre del icono.',
  `LNK_ICONO` varchar(512) NOT NULL COMMENT 'Link del icono en el sistema, o externo.',
  `IDD_CREADOR` int(11) DEFAULT NULL COMMENT 'ID del creador del icono (Si no es "NULL" fue creado por un usuario).',
  `IDD_TIPO` int(11) NOT NULL COMMENT 'ID del tipo de usuarios al que pertenece',
  `DTE_ALTA` date NOT NULL COMMENT 'Fecha de alta del icono',
  `DTE_MOD` date NOT NULL COMMENT 'Fecha de modificación del icono.',
  `DTE_BAJA` date DEFAULT NULL COMMENT 'Fecha de baja del icono (Si no es "NULL", esta "eliminado")'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tabla de iconos que se pueden usar en el sistema';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE `temas` (
  `IDD_TEMA` int(11) NOT NULL COMMENT 'ID del tema.',
  `STR_NOMBRE` varchar(100) NOT NULL COMMENT 'Nombre del tema.',
  `LNK_FONDO` varchar(512) NOT NULL COMMENT 'Ubicación del tema en el sistema o fuera del mismo.',
  `STR_COLOR_A` varchar(100) NOT NULL COMMENT 'Codigo de color A del tema',
  `STR_COLOR_B` varchar(100) NOT NULL COMMENT 'Codigo de color B del tema',
  `STR_COLOR_C` varchar(100) NOT NULL COMMENT 'Codigo de color C del tema',
  `IDD_CREADOR` int(11) DEFAULT NULL COMMENT 'ID del creador del tema (Si no es "NULL", lo creo un usuario).',
  `IDD_TIPO` int(11) NOT NULL COMMENT 'ID del tipo de usuario al que pertenece.',
  `DTE_ALTA` int(11) NOT NULL COMMENT 'Fecha de alta del tema.',
  `DTE_MOD` int(11) NOT NULL COMMENT 'Fecha de modificación del tema.',
  `DTE_BAJA` int(11) DEFAULT NULL COMMENT 'Fecha de baja del tema (Si no es "NULL", esta "eliminado").'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tabla de temas del sistema.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `IDD_TIPO` int(11) NOT NULL COMMENT 'ID del tipo de usuario.',
  `STR_NOMBRE` varchar(100) NOT NULL COMMENT 'Nombre del tipo de usuario.',
  `STR_DESCRIPCION` varchar(512) NOT NULL COMMENT 'Descripción del tipo de usuario.',
  `INT_NIVEL` int(11) NOT NULL COMMENT 'Categoría numérica del tipo de usuario.',
  `INT_VALOR` int(11) NOT NULL COMMENT 'Valor del tipo de usuario.',
  `DTE_ALTA` date NOT NULL COMMENT 'Fecha de alta del tipo de usuario',
  `DTE_MOD` date NOT NULL COMMENT 'Fecha de modificación del tipo de usuario',
  `DTE_BAJA` date DEFAULT NULL COMMENT 'Fecha de baja del tipo de usuario (Si no es "NULL". esta "eliminado")'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tabla de los tipos de usuarios que pueden existir.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IDD_USUARIO` int(11) NOT NULL COMMENT 'ID del usuario.',
  `STR_USUARIO` varchar(255) NOT NULL COMMENT 'Nombre de la cuenta del usuario.',
  `BUL_VERIFICADO` tinyint(1) NOT NULL COMMENT 'Booleano de usuario verificado.',
  `STR_NOMBRE` varchar(100) NOT NULL COMMENT 'Nombre real del usuario.',
  `STR_APELLIDO` varchar(100) NOT NULL COMMENT 'Apellido real del usuario.',
  `DTE_FECHA_NAC` date NOT NULL COMMENT 'Fecha de nacimiento del usuario (Si es menor de 18 no saltara pestaña comprar "premium")',
  `STR_CORREO` varchar(255) NOT NULL COMMENT 'Correo del usuario.',
  `STR_CONTRASENA_US` varchar(512) NOT NULL COMMENT 'Contraseña del usuario.',
  `IDD_TIPO` int(11) NOT NULL COMMENT 'Tipo de usuario (De base es 1 [Normal]).',
  `LNK_FOTO` varchar(512) NOT NULL COMMENT 'Link de la foto de perfil.',
  `IDD_ULT_TEMA` int(11) NOT NULL COMMENT 'Ultimo tema utilizado por el usuario.',
  `DTC_ULT_CONEXION` datetime NOT NULL COMMENT 'Fecha y hora en la que se desconecto el usuario.',
  `DTE_ALTA` date NOT NULL COMMENT 'Fecha de alta del usuario.',
  `DTE_MOD` date NOT NULL COMMENT 'Fecha de modificación del usuario.',
  `DTE_BAJA` date DEFAULT NULL COMMENT 'Fecha de baja del usuario (Si no es "NULL", esta "eliminado").'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tabla de datos de los usuarios en el sistema';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_temas`
--

CREATE TABLE `usuarios_temas` (
  `IDD_USUARIO_TEMA` int(11) NOT NULL COMMENT 'ID de la pertenencia de un tema a un usuario.',
  `IDD_USUARIO` int(11) NOT NULL COMMENT 'ID del usuario.',
  `IDD_TEMA` int(11) NOT NULL COMMENT 'ID del tema.',
  `DTE_ALTA` date NOT NULL COMMENT 'Fecha de alta.',
  `DTE_MOD` date NOT NULL COMMENT 'Fecha de modificación.',
  `DTE_BAJA` date DEFAULT NULL COMMENT 'Fecha de baja (Si no es "NULL", el registro esta eliminado).'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tabla de registro de pertenencias de temas y usuarios';

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contrasenas`
--
ALTER TABLE `contrasenas`
  ADD PRIMARY KEY (`IDD_CONTRASENA`);

--
-- Indices de la tabla `contrasenas_grupos`
--
ALTER TABLE `contrasenas_grupos`
  ADD PRIMARY KEY (`IDD_CONTRASENA_GRUPO`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`IDD_GRUPO`);

--
-- Indices de la tabla `iconografias`
--
ALTER TABLE `iconografias`
  ADD PRIMARY KEY (`IDD_ICONO`);

--
-- Indices de la tabla `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`IDD_TEMA`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`IDD_TIPO`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IDD_USUARIO`);

--
-- Indices de la tabla `usuarios_temas`
--
ALTER TABLE `usuarios_temas`
  ADD PRIMARY KEY (`IDD_USUARIO_TEMA`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contrasenas`
--
ALTER TABLE `contrasenas`
  MODIFY `IDD_CONTRASENA` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID de la contraseña ingresada.';

--
-- AUTO_INCREMENT de la tabla `contrasenas_grupos`
--
ALTER TABLE `contrasenas_grupos`
  MODIFY `IDD_CONTRASENA_GRUPO` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID de la contraseña en un grupo.';

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `IDD_GRUPO` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID del grupo.';

--
-- AUTO_INCREMENT de la tabla `iconografias`
--
ALTER TABLE `iconografias`
  MODIFY `IDD_ICONO` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID del icono.';

--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `IDD_TEMA` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID del tema.';

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `IDD_TIPO` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID del tipo de usuario.';

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IDD_USUARIO` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID del usuario.';

--
-- AUTO_INCREMENT de la tabla `usuarios_temas`
--
ALTER TABLE `usuarios_temas`
  MODIFY `IDD_USUARIO_TEMA` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID de la pertenencia de un tema a un usuario.';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
