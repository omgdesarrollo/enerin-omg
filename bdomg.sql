-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         10.1.9-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla databaseomg.gantt_notas_historico_temas
CREATE TABLE IF NOT EXISTS `gantt_notas_historico_temas` (
  `idgantt_notas_historico` int(11) NOT NULL AUTO_INCREMENT,
  `id_tarea` varchar(50) COLLATE latin1_bin NOT NULL DEFAULT '0',
  `historico_notas` text COLLATE latin1_bin,
  `quien_introdujo_el_registro` varchar(45) COLLATE latin1_bin NOT NULL,
  `fecha_creacion_nota` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idgantt_notas_historico`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- Volcando datos para la tabla databaseomg.gantt_notas_historico_temas: ~15 rows (aproximadamente)
/*!40000 ALTER TABLE `gantt_notas_historico_temas` DISABLE KEYS */;
INSERT IGNORE INTO `gantt_notas_historico_temas` (`idgantt_notas_historico`, `id_tarea`, `historico_notas`, `quien_introdujo_el_registro`, `fecha_creacion_nota`) VALUES
	(1, '1539792679933', 'esta es la primera nota ', '1', '2018-10-31 12:24:11'),
	(2, '1539792679933', 'segunda nota de la primera actividad', '1', '2018-10-31 12:24:32'),
	(3, '1539792679933', 'esta es otra nota como lo habiamos platicado el expediente que introdujiste no debe de ser esa manera ya que se presta a confusion por favor checarlo', '1', '2018-10-31 12:51:22'),
	(4, '1539792735439', 'esta es una nota de  la nota j debes cambiarla no crees para poder tener un mejor manejo de las tareas', '1', '2018-10-31 12:54:25'),
	(5, '1539792679933', 'como ultimo punto la nota mas importantes del dia es poder generar valores de ingresos que no superen a la maxima potencia del paladar', '1', '2018-10-31 13:16:32'),
	(6, '1539792679933', 'esta es otra nota para que la cheques no moviste el inmoviliario que te pedi de la focian C-GH porfa te piedo que la muevas ', '1', '2018-10-31 13:25:25'),
	(7, '1539792735439', 'nota corregida correctamente y esta aprobada tiene como aval  los documentos que se entregaron en la oficina', '3', '2018-10-31 13:57:48'),
	(8, '1539792735439', 'esta nota la puedo hacer por que soy el responsable de todo el proyecto asi que debes de realizar los sifuiente puntos que les voy a dejar \n1.crear un portafolio \n2.imprimir esa portafolio', '1', '2018-10-31 16:57:15'),
	(9, '1539792679933', 'lo que deben de hacer es crear un producto capaz de mover los parametros de las cosas como ven ustedes diganme para poder ayudarlos gracias', '1', '2018-10-31 17:00:18'),
	(10, '1539792679933', 'deberan introducir una nota ', '1', '2018-10-31 18:54:19'),
	(11, '1541000189000', 'soy su jefe de proyeco chavos que tal ', '1', '2018-10-31 18:54:45'),
	(12, '1541000189000', 'que onda jefe como esta espero que bien la nota sigiuente es hacer la redaccion de una manera sustancial que lleve mecanismo de produccion', '3', '2018-10-31 18:55:56'),
	(13, '1539792735439', 'esta es una nota donde debes generar un numero de folio y decirle a los demas como pueden mejorar porfavor', '3', '2018-10-31 20:14:21'),
	(14, '1540928646497', 'Buenas tardes se debe hacer un cambio de los libro de proyecto por favor en la sección de firma ', '1', '2018-10-31 20:33:57'),
	(15, '1541000189000', 'ya termine de redactar el producto', '3', '2018-10-31 20:36:29');
/*!40000 ALTER TABLE `gantt_notas_historico_temas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
