-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-08-2023 a las 17:46:56
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
-- Base de datos: `website`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_configuraciones`
--

CREATE TABLE `tbl_configuraciones` (
  `ID` int(11) NOT NULL,
  `nombreconfiguracion` varchar(255) NOT NULL,
  `valor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_configuraciones`
--

INSERT INTO `tbl_configuraciones` (`ID`, `nombreconfiguracion`, `valor`) VALUES
(1, 'bienvenida_principal', 'Bienvenido a la academia'),
(2, 'bienvenida_secundaria', 'APRENDE PASO A PASO'),
(3, 'boton_principal', 'EMPEZAR'),
(4, 'link_boton_principal', '#services'),
(5, 'titulo_servicios', 'SERVICIOS'),
(6, 'descripcion_servicios', 'Estos son nuestros servicios.'),
(7, 'titulo_portfolio', 'PORTAFOLIO'),
(8, 'descripcion_portfolio', 'Estos son nuestros proyectos.'),
(9, 'titulo_about', 'NOSOTROS'),
(10, 'descripcion_about', 'Conoce nuestra historia.'),
(11, 'ultima_opcion_about', 'Ahora faltas tú'),
(12, 'titulo_team', 'NUESTRO EQUIPO'),
(13, 'descripcion_team', 'Personas que vuelven realidad este proyecto.'),
(15, 'titulo_contacto', 'CONTACTANOS'),
(16, 'descripcion_contacto', 'correo@gmail.com'),
(17, 'link_twitter', 'https://twitter.com'),
(18, 'link_facebook', 'https://facebook.com'),
(19, 'link_linkedin', 'https://linkedin.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_entradas`
--

CREATE TABLE `tbl_entradas` (
  `ID` int(11) NOT NULL,
  `fecha` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_entradas`
--

INSERT INTO `tbl_entradas` (`ID`, `fecha`, `titulo`, `descripcion`, `imagen`) VALUES
(1, '2023-02-10', 'Nuestros inicios', 'En este año empezamos con el proyecto', '1689182908_1.jpg'),
(2, '2024-02-26', 'Aumentamos nuestra plantilla', 'Empezamos a contratar gente profesional para unirse al equipo', '1689186889_2.jpg'),
(3, '2026-02-10', 'Nos mudamos', 'Nos mudamos a nuestras nuevas instalaciones', '1689187087_3.jpg'),
(4, '2027-02-11', 'Nos expandimos', 'Nos expandimos a nivel mundial', '1689187324_4.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_equipo`
--

CREATE TABLE `tbl_equipo` (
  `ID` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `nombrecompleto` varchar(255) NOT NULL,
  `puesto` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_equipo`
--

INSERT INTO `tbl_equipo` (`ID`, `imagen`, `nombrecompleto`, `puesto`, `twitter`, `facebook`, `linkedin`) VALUES
(1, '1689201812_1.jpg', 'Oscar Uh Perez', 'Backend developer Sr.', 'https://twitter.com/', 'https://facebook.com/', 'https://linkedin.com/'),
(2, '1689202127_2.jpg', 'Ania kubow', 'Frontend developer Sr.', 'https://twitter.com/', 'https://facebook.com/', 'https://linkedin.com/'),
(3, '1689202396_3.jpg', 'Kevin Powell', 'UI/UX Engineer', 'https://twitter.com/', 'https://facebook.com/', 'https://linkedin.com/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_portafolio`
--

CREATE TABLE `tbl_portafolio` (
  `ID` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `subtitulo` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `cliente` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_portafolio`
--

INSERT INTO `tbl_portafolio` (`ID`, `titulo`, `subtitulo`, `imagen`, `descripcion`, `cliente`, `categoria`, `url`) VALUES
(1, 'Tienda DEVELOTECA', 'Creamos sitios web a la medida', '1689178502_Captura de pantalla 2023-07-12 a las 13.11.10.png', 'Nuestros sitios web a la medida buscan mostrar productos y venderlos a sus clientes', 'DEVELOTECA', 'VENTAS', 'https://tienda.develoteca.com'),
(2, 'Academia DEVELOTECA', 'Plataforma para aprender', '1689178993_Captura de pantalla 2023-07-12 a las 13.14.16.png', 'Configuramos sitios para publicar cursos en internet y poder venderlos a todo el mundo', 'DEVELOTECA', 'Educación', 'https://cursos.develoteca.com'),
(3, 'PROJECT NAME', 'Lorem ipsum dolor sit amet consectetur.', '1689173032_3.jpg', 'Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum', 'Finish', 'Identity', 'https://tienda.develoteca.com'),
(4, 'PROJECT NAME', 'Lorem ipsum dolor sit amet consectetur.', '1689173103_4.jpg', 'Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum', 'Lines', 'Branding', 'https://tienda.develoteca.com'),
(5, 'PROJECT NAME', 'Lorem ipsum dolor sit amet consectetur.', '1689173180_5.jpg', 'Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum', 'Southwest', 'Website Design', 'https://tienda.develoteca.com'),
(6, 'PROJECT NAME', 'Lorem ipsum dolor sit amet consectetur.', '1689173239_6.jpg', 'Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum', 'Window', 'Photography', 'https://tienda.develoteca.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_servicios`
--

CREATE TABLE `tbl_servicios` (
  `ID` int(11) NOT NULL,
  `icono` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_servicios`
--

INSERT INTO `tbl_servicios` (`ID`, `icono`, `titulo`, `descripcion`) VALUES
(1, 'fas fa-laptop', 'Cursos en línea', 'Venta de cursos de programación'),
(2, 'fas fa-address-book', 'Mentoria', 'Apoyo a creación de cursos'),
(3, 'fas fa-cart-shopping', 'Venta de software', 'Vendemos todo tipo de software');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `ID` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`ID`, `usuario`, `password`, `correo`) VALUES
(1, 'Axel Orellana', 'admin', 'correo@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_configuraciones`
--
ALTER TABLE `tbl_configuraciones`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tbl_entradas`
--
ALTER TABLE `tbl_entradas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tbl_equipo`
--
ALTER TABLE `tbl_equipo`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tbl_portafolio`
--
ALTER TABLE `tbl_portafolio`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tbl_servicios`
--
ALTER TABLE `tbl_servicios`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_configuraciones`
--
ALTER TABLE `tbl_configuraciones`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tbl_entradas`
--
ALTER TABLE `tbl_entradas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_equipo`
--
ALTER TABLE `tbl_equipo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_portafolio`
--
ALTER TABLE `tbl_portafolio`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_servicios`
--
ALTER TABLE `tbl_servicios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
