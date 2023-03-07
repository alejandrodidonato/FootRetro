-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.33 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para dw3_di_donato_alejandro
DROP DATABASE IF EXISTS `dw3_di_donato_alejandro`;
CREATE DATABASE IF NOT EXISTS `dw3_di_donato_alejandro` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `dw3_di_donato_alejandro`;

-- Volcando estructura para tabla dw3_di_donato_alejandro.camisetas
DROP TABLE IF EXISTS `camisetas`;
CREATE TABLE IF NOT EXISTS `camisetas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `temporada` year(4) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `alt_imagen` varchar(255) NOT NULL,
  `fk_equipos` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_camisetas_equipos1_idx` (`fk_equipos`),
  CONSTRAINT `fk_camisetas_equipos1` FOREIGN KEY (`fk_equipos`) REFERENCES `equipos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dw3_di_donato_alejandro.camisetas: ~15 rows (aproximadamente)
/*!40000 ALTER TABLE `camisetas` DISABLE KEYS */;
INSERT INTO `camisetas` (`id`, `descripcion`, `temporada`, `precio`, `imagen`, `alt_imagen`, `fk_equipos`) VALUES
	(1, 'En 1986 River Plate ganó su primera CONMEBOL Libertadores e inauguró su primer grito de ¡dale campeón! Luego de perder las finales de 1966 y 1976, finalmente lo consiguió tras ganar ante América de Cali. Detrás de este logro, aparece Héctor Veira.', '1986', 7500.00, 'river-1986-1.png', 'Camiseta retro de River Plate del año 1986', 1),
	(2, 'El 20 de diciembre de 1992, Boca Juniors empata con gol de Benetti 1 a 1 con San Martin de Tucumán y se consagra campeón del Torneo Apertura 1992. Hacía once años que no daba la vuelta.', '1992', 7500.00, 'boca-1992-1.png', 'Camiseta retro de Boca Juniors del año 1992', 2),
	(3, 'En 1988, el San Lorenzo de Veira juega la Libertadores y llega a semifinales.', '1988', 5000.00, 'san-lorenzo-1988-1.png', 'Camiseta retro de San Lorenzo del año 1988', 5),
	(4, 'El 25 de enero de 1978 quedó marcado a fuego en la historia de los diablos rojos de Avellaneda cuando el conjunto dirigido por José Omar Pastoriza se consagraba campeón del Nacional en un partido épico.', '1978', 5000.00, 'independiente-1978-1.png', 'Camiseta retro de Independiente del año 1978', 3),
	(5, 'El 18 de junio de 1988 Racing se consagró campeón de la Supercopa. Aquel equipo de Alfio Basile fue el primer campeón Sudamericano.', '1988', 5000.00, 'racing-1988-1.png', 'Camiseta retro de Racing del año 1988', 4),
	(6, 'Por quinta vez consecutiva, el Real Madrid se proclamó campeón de la Copa de Campeones de Europa tras derrotar en Glasgow al Eintracht Fráncfort alemán. La final fue décadas después considerada como la mejor de todas las disputadas a lo largo de su historia, merced no solo al resultado por 7-3 —récord anotador de todas las finales—, sino por la superioridad mostrada por el conjunto español que le valió elogios y un gran reconocimiento por parte de medios, aficionados y equipos rivales alrededor de toda Europa.', '1960', 10000.00, 'real-madrid-1960-1.png', 'Camiseta retro de Real Madrid del año 1960', 6),
	(7, 'Se ficha a jugadores como Ronaldinho, Eto´o y Deco y el equipo, entrenado por Frank Rijkaard, consigue ganar dos ligas españolas consecutivas y una Liga de Campeones, y la masa social del club supera por primera vez en la historia la cifra de los 140.000 socios.', '2002', 10000.00, 'barcelona-2002-1.png', 'Camiseta retro de Barcelona del año 2002', 7),
	(8, 'En la temporada del 85, la Juventus obtuvo la Supercopa de Europa en Turín, con marcador de 2:0 frente al Liverpool (16 de enero de 1985),39​ y la Copa de Europa en Bruselas el 29 de mayo, por 1:0 ante el mismo rival,40​ con el cual el club se consagró como el primero en la historia del fútbol europeo en conquistar las tres principales competiciones organizadas por la UEFA.', '1985', 10000.00, 'juventus-1985-1.png', 'Camiseta retro de Juventus del año 1985', 8),
	(9, 'Si en el caso del FC Barcelona de Pep Guardiola hablábamos de que se distinguió por su juego y en el del Real Madrid por sus estelares incorporaciones, en el Milan de Sacchi encontramos una mezcla de ambos. En San Siro se concentraron una pléyade de enormes futbolistas, en su mayoría llegados de fuera del club, dirigidos por un técnico que imprimió una forma de jugar muy peculiar y extraña en Italia.', '1987', 10000.00, 'milan-1987-1.png', 'Camiseta retro de Milan del año 1987', 9),
	(10, 'El 12 de mayo de 1976, el Bayern entró en el privilegiado círculo de los tricampeones de Europa. Este mismo día, con una victoria por 1-0 en la final contra el St. Etienne, el FCB se hacía con el título más importante a nivel de clubes por tercera vez de forma consecutiva.', '1976', 10000.00, 'bayern-munich-1976-1.png', 'Camiseta retro de Bayern Munich del año 1976', 10),
	(11, 'El partido decisivo entre Argentina y los Países Bajos se disputó en Buenos Aires en el Estadio Monumental, el 25 de junio de 1978. A los 38 de juego Mario Kempes ponía el 1-0, pero a pocos minutos de que la final terminara Dick Nanninga marcó el tanto neerlandés lo que hizo que se disputara un tiempo suplementario. Al minuto 105 volvió a marcar Mario Kempes y selló el resultado Daniel Bertoni a los 116. La Selección de fútbol de Argentina consiguió de esta manera su primera Copa Mundial de fútbol.', '1978', 12500.00, 'argentina-1978-1.png', 'Camiseta retro de Argentina del año 1978', 11),
	(12, 'Alemania salió campeón de la Copa del Mundo por tercera vez en 1990. Se cobró la revancha al ganarle en la final a Argentina de Diego Armando Maradona.', '1990', 12500.00, 'alemania-1990-1.png', 'Camiseta retro de Alemania del año 1990', 12),
	(13, 'En el verano europeo de 1974 arrancó el Mundial de Alemania, pero este sería un mundial que marcaría un nuevo concepto de “fútbol total” y quedaría en la memoria de los aficionados del fútbol para siempre. La famosa Naranja Mecánica fue pionera de un sistema de juego que consistía en que ningún jugador tenía una posición definida, sino que estas se ocupaban por otro compañero, dependiendo las circunstancias del partido.', '1974', 12500.00, 'holanda-1974-1.png', 'Camiseta retro de Holanda del año 1974', 13),
	(14, 'La URSS contaba en sus filas a un equipo que hubiera enorgullecido al mismísimo Valeri Lobanovski. Las estrellas eran Mostovói, que ya era titular en el Spartak; Andréi Kanchelskis, que ficharía poco después por el Manchester United; e Ígor Shalímov, que acabaría recalando en el Inter de Milán.', '1990', 12500.00, 'urss-1990-1.png', 'Camiseta retro de URSS del año 1990', 14),
	(15, 'Aquel Brasil campeón mundial de 1970 fue mucho más que la mejor selección de todos los tiempos. También resultó la consagración de la fabulosa cultura brasileña de los años ‘60. Vinicius, Tom Jobim, Joao Gilberto, Chico Buarque y Caetano, la bossa, el samba y el Cinema Novo dieron la vuelta olímpica del brazo de Pelé aquella imborrable tarde del 21 de junio de 1970.', '1970', 15000.00, 'brasil-1970-1.png', 'Camiseta retro de Brasil del año 1970', 15);
/*!40000 ALTER TABLE `camisetas` ENABLE KEYS */;

-- Volcando estructura para tabla dw3_di_donato_alejandro.compras
DROP TABLE IF EXISTS `compras`;
CREATE TABLE IF NOT EXISTS `compras` (
  `camisetas_id` int(10) unsigned NOT NULL,
  `usuarios_id` int(10) unsigned NOT NULL,
  `cantidad` tinyint(3) unsigned NOT NULL,
  `fecha` datetime DEFAULT NULL,
  KEY `fk_camisetas_has_usuarios_usuarios1_idx` (`usuarios_id`),
  KEY `fk_camisetas_has_usuarios_camisetas_idx` (`camisetas_id`),
  CONSTRAINT `fk_camisetas_has_usuarios_camisetas` FOREIGN KEY (`camisetas_id`) REFERENCES `camisetas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_camisetas_has_usuarios_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dw3_di_donato_alejandro.compras: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT INTO `compras` (`camisetas_id`, `usuarios_id`, `cantidad`, `fecha`) VALUES
	(1, 1, 1, '2023-03-06 15:10:47'),
	(2, 1, 1, '2023-03-06 15:09:59'),
	(2, 2, 1, '2023-03-06 13:17:36'),
	(3, 1, 1, '2023-03-06 18:04:02'),
	(5, 1, 2, '2023-03-06 15:10:47'),
	(6, 1, 1, '2023-03-06 15:10:47'),
	(1, 1, 1, '2023-03-06 18:08:59');
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;

-- Volcando estructura para tabla dw3_di_donato_alejandro.equipos
DROP TABLE IF EXISTS `equipos`;
CREATE TABLE IF NOT EXISTS `equipos` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dw3_di_donato_alejandro.equipos: ~15 rows (aproximadamente)
/*!40000 ALTER TABLE `equipos` DISABLE KEYS */;
INSERT INTO `equipos` (`id`, `nombre`) VALUES
	(12, 'Alemania'),
	(11, 'Argentina'),
	(7, 'Barcelona'),
	(10, 'Bayern Munich'),
	(2, 'Boca Juniors'),
	(15, 'Brasil'),
	(13, 'Holanda'),
	(3, 'Independiente'),
	(8, 'Juventus'),
	(9, 'Milan'),
	(4, 'Racing'),
	(6, 'Real Madrid'),
	(1, 'River Plate'),
	(5, 'San Lorenzo'),
	(14, 'URSS');
/*!40000 ALTER TABLE `equipos` ENABLE KEYS */;

-- Volcando estructura para tabla dw3_di_donato_alejandro.roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_usuario` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tipo_usuario_UNIQUE` (`tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dw3_di_donato_alejandro.roles: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `tipo_usuario`) VALUES
	(1, 'Admin'),
	(2, 'Usuario');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Volcando estructura para tabla dw3_di_donato_alejandro.usuarios
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `domicilio` varchar(100) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `fk_roles` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_usuarios_roles1_idx` (`fk_roles`),
  CONSTRAINT `fk_usuarios_roles1` FOREIGN KEY (`fk_roles`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dw3_di_donato_alejandro.usuarios: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `email`, `password`, `nombre`, `apellido`, `domicilio`, `ciudad`, `fk_roles`) VALUES
	(1, 'alejandro.didonato@davinci.edu.ar', '$2y$10$2l.sxttiZBhMW7kvj9e8P.Wdm1nA2l6/KvoNMY24Hu8Dop4oAbJAa', 'Alejandro', 'Di Donato', 'Juan Florio 2687', 'San Justo', 1),
	(2, 'carlos.perez@gmail.com', '$2y$10$2l.sxttiZBhMW7kvj9e8P.Wdm1nA2l6/KvoNMY24Hu8Dop4oAbJAa', 'Carlos', 'Pérez', 'Av. Rivadavia 7500', 'CABA', 2),
	(3, 'juan.cito@gmail.com', '$2y$10$2l.sxttiZBhMW7kvj9e8P.Wdm1nA2l6/KvoNMY24Hu8Dop4oAbJAa', 'Juan', 'Cito', 'Av. San Martin 756', 'Ramos Mejia', 2);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
