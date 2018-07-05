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


-- Volcando estructura de base de datos para databaseomg
CREATE DATABASE IF NOT EXISTS `databaseomg` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `databaseomg`;

-- Volcando estructura para tabla databaseomg.asignacion_tema_requisito
CREATE TABLE IF NOT EXISTS `asignacion_tema_requisito` (
  `ID_ASIGNACION_TEMA_REQUISITO` int(11) NOT NULL,
  `ID_DOCUMENTO` int(11) DEFAULT NULL,
  `ID_TEMA` int(11) NOT NULL,
  PRIMARY KEY (`ID_ASIGNACION_TEMA_REQUISITO`),
  KEY `fk_asignacion_tema_requisito_documentos1_idx` (`ID_DOCUMENTO`),
  KEY `fk_asignacion_tema_requisito_TEMAS1_idx` (`ID_TEMA`),
  CONSTRAINT `fk_asignacion_tema_requisito_TEMAS1` FOREIGN KEY (`ID_TEMA`) REFERENCES `temas` (`ID_TEMA`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_asignacion_tema_requisito_documentos1` FOREIGN KEY (`ID_DOCUMENTO`) REFERENCES `documentos` (`ID_DOCUMENTO`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla databaseomg.asignacion_tema_requisito: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `asignacion_tema_requisito` DISABLE KEYS */;
INSERT INTO `asignacion_tema_requisito` (`ID_ASIGNACION_TEMA_REQUISITO`, `ID_DOCUMENTO`, `ID_TEMA`) VALUES
	(0, 0, 67),
	(1, -1, 75),
	(2, -1, 77),
	(3, -1, 78),
	(4, -1, 79);
/*!40000 ALTER TABLE `asignacion_tema_requisito` ENABLE KEYS */;

-- Volcando estructura para tabla databaseomg.asignacion_tema_requisito_requisitos
CREATE TABLE IF NOT EXISTS `asignacion_tema_requisito_requisitos` (
  `ID_ASIGNACION_TEMA_REQUISITO` int(11) NOT NULL,
  `ID_REQUISITO` int(11) NOT NULL,
  PRIMARY KEY (`ID_ASIGNACION_TEMA_REQUISITO`,`ID_REQUISITO`),
  KEY `fk_asignacion_tema_requisito_has_REQUISITOS_REQUISITOS1_idx` (`ID_REQUISITO`),
  KEY `fk_asignacion_tema_requisito_has_REQUISITOS_asignacion_tema_idx` (`ID_ASIGNACION_TEMA_REQUISITO`),
  CONSTRAINT `fk_asignacion_tema_requisito_has_REQUISITOS_REQUISITOS1` FOREIGN KEY (`ID_REQUISITO`) REFERENCES `requisitos` (`ID_REQUISITO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_asignacion_tema_requisito_has_REQUISITOS_asignacion_tema_r1` FOREIGN KEY (`ID_ASIGNACION_TEMA_REQUISITO`) REFERENCES `asignacion_tema_requisito` (`ID_ASIGNACION_TEMA_REQUISITO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla databaseomg.asignacion_tema_requisito_requisitos: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `asignacion_tema_requisito_requisitos` DISABLE KEYS */;
INSERT INTO `asignacion_tema_requisito_requisitos` (`ID_ASIGNACION_TEMA_REQUISITO`, `ID_REQUISITO`) VALUES
	(0, 64),
	(0, 66),
	(0, 71),
	(2, 65),
	(4, 67),
	(4, 68),
	(4, 69),
	(4, 70);
/*!40000 ALTER TABLE `asignacion_tema_requisito_requisitos` ENABLE KEYS */;

-- Volcando estructura para tabla databaseomg.clausulas
CREATE TABLE IF NOT EXISTS `clausulas` (
  `ID_CLAUSULA` int(11) NOT NULL,
  `CLAUSULA` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `SUB_CLAUSULA` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `DESCRIPCION_CLAUSULA` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `DESCRIPCION_SUB_CLAUSULA` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `DESCRIPCION` longtext COLLATE utf8_bin,
  `PLAZO` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `REQUISITO` varchar(1000) COLLATE utf8_bin DEFAULT NULL,
  `ID_EMPLEADO` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_CLAUSULA`),
  KEY `fk_clausulas_empleados1_idx` (`ID_EMPLEADO`),
  CONSTRAINT `fk_clausulas_empleados1` FOREIGN KEY (`ID_EMPLEADO`) REFERENCES `empleados` (`ID_EMPLEADO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla databaseomg.clausulas: ~128 rows (aproximadamente)
/*!40000 ALTER TABLE `clausulas` DISABLE KEYS */;
INSERT INTO `clausulas` (`ID_CLAUSULA`, `CLAUSULA`, `SUB_CLAUSULA`, `DESCRIPCION_CLAUSULA`, `DESCRIPCION_SUB_CLAUSULA`, `DESCRIPCION`, `PLAZO`, `REQUISITO`, `ID_EMPLEADO`, `fecha_creacion`) VALUES
	(0, '2', '2.3', 'Objeto del contrato', 'Reporte contable de beneficios', '<div>El Contratista podrÃ¡ reportar para efectos contables y financieros el presente Contrato</div>', 'N/A', NULL, 2, '2018-05-10 18:06:01'),
	(1, '2', '2.2', 'Objeto del contrato', 'No otorgamiento de Derechos de propiedad', 'En caso que durante la conducciÃ³n de Actividades Petroleras el Contratista descubra en el Ãrea Contractual recursos minerales distintos a Hidrocarburos.', ' (15) DÃ­a', NULL, 2, '2018-05-10 18:06:01'),
	(2, '1.', '1.1', 'Definiciones e interpretaciones', 'Definiciones', 'Para los efectos de este Contrato, se definen  los significados utilizados.', 'N/A', NULL, 2, '2018-05-10 18:06:01'),
	(3, '2', '2.1', 'Objeto del contrato', 'Modalidad Licencia', 'El objeto del presente Contrato es la realizaciÃ³n de las Actividades Petroleras, bajo la modalidad de contrataciÃ³n de licencia en virtud de lo cual se otorga al Contratista el derecho de extraer a su exclusivo costo y riesgo los Hidrocarburos propiedad del Estado en el Ãrea Contractual.', 'N/A', NULL, 2, '2018-05-10 18:06:01'),
	(4, '3', '3.1', 'Plazo del contrato', 'Plazo', 'Este Contrato entrarÃ¡ en vigor en la Fecha Efectiva. Sujeto a los demÃ¡s tÃ©rminos y condiciones del presente Contrato, la duraciÃ³n del presente Contrato serÃ¡ de veinticinco (25) AÃ±os a partir de la Fecha Efectiva.', 'N/A', NULL, 1, '2018-05-10 18:06:01'),
	(5, '3', '3.2', 'Plazo del contrato', 'Prorroga', 'DeberÃ¡ entregar  a la CNH una propuesta de modificaciÃ³n a los Planes de Desarrollo', '18 Meses a', NULL, 1, '2018-05-10 18:06:01'),
	(6, '3', '3.3', 'Plazo del contrato', 'Etapa de transiciÃ³n de arranque', 'A partir de la Fecha Efectiva, iniciarÃ¡ una etapa que tendrÃ¡ una duraciÃ³n de hasta noventa (90) DÃ­as en la cual se llevarÃ¡ a cabo la entrega del Ãrea Contractual al Contratista por parte de la CNH o de un tercero designado para tal efecto.', '90 DÃ­as', NULL, 1, '2018-05-10 18:06:01'),
	(7, '3', '3.4', 'Plazo del contrato', 'Renuncia del contratista', 'Sin perjuicio de lo previsto por la ClÃ¡usula 17, el Contratista podrÃ¡ en cualquier momento renunciar a la totalidad o una(s) parte(s) del Ãrea Contractual, y con ello dar por terminado este Contrato en relaciÃ³n con la(s) parte(s) del Ãrea contractual en cuestiÃ³n, mediante la entrega a la CNH de una notificaciÃ³n irrevocable por escrito con por lo menos tres (3) Meses de anticipaciÃ³n a la fecha efectiva de dicha renuncia .', '3 Meses de', NULL, 1, '2018-05-10 18:06:01'),
	(8, '4', '4.1', 'EvaluaciÃ³n', 'Plan de EvaluaciÃ³n', 'Dentro de los ciento veinte (120) DÃ­as siguientes a la Fecha Efectiva, el Contratista deberÃ¡ presentar a la CNH para su aprobaciÃ³n un Plan de EvaluaciÃ³n.', '120 dÃ­as ', NULL, 3, '2018-05-10 18:06:01'),
	(9, '4', '4.2', 'EvaluaciÃ³n', 'PerÃ­odo Inicial de EvaluaciÃ³n', 'El Contratista estarÃ¡ obligado a concluir, al menos, el Programa MÃ­nimo de Trabajo durante el PerÃ­odo Inicial de EvaluaciÃ³n . ', 'N/A', NULL, 3, '2018-05-10 18:06:01'),
	(10, '4', '4.3', 'EvaluaciÃ³n', 'PerÃ­odo Adicional de evaluaciÃ³n', 'Sujeto a lo establecido en esta ClÃ¡usula 4.3, el Contratista podrÃ¡ solicitar a la CNH, mediante notificaciÃ³n por escrito realizada con cuando menos cuarenta y cinco ( 45) DÃ­as de anticipaciÃ³n a la terminaciÃ³n del PerÃ­odo Inicial de EvaluaciÃ³n, la ampliaciÃ³n del PerÃ­odo de EvaluaciÃ³n por hasta un ( 1) AÃ±o mÃ¡s contado a partir de la terminaciÃ³n del PerÃ­odo Inicial de EvaluaciÃ³n. . ', ' 45 DÃ­as ', NULL, 3, '2018-05-10 18:06:01'),
	(11, '4', '4.4', 'EvaluaciÃ³n', 'Retraso en la presentaciÃ³n del plan de EvaluaciÃ³n.', 'En caso que el contratista presente para la aprobaciÃ³n de la CNH el Plan de EvaluaciÃ³n o el Plan de Desarrollo transcurrido el plazo establecido para su presentaciÃ³n sin causa justificada, el Contratista deberÃ¡ pagar al Fondo una pena convencional por DÃ­a de retraso equivalente a diez mil (10,000) DÃ³lares . ', 'N/A', NULL, 3, '2018-05-10 18:06:01'),
	(12, '4', '4.5', 'EvaluaciÃ³n', 'Incumplimiento del programa mÃ­nimo de trabajo o de los compromisos adicionales', 'En caso de incumplimiento del Programa MÃ­nimo de Trabajo, del Incremento en el Programa MÃ­nimo o de los compromisos adicionales que se adquirieron para el PerÃ­odo Adicional de EvaluaciÃ³n.', 'N/A', NULL, 3, '2018-05-10 18:06:01'),
	(13, '4', '4.6', 'EvaluaciÃ³n', 'Pruebas de formaciÃ³n', 'El Contratista remitirÃ¡ a la CNH toda la informaciÃ³n relevante y los estudios tÃ©cnicos relativos a cualquier prueba de formaciÃ³n, incluyendo aquellos datos que surjan directamente de la misma en los plazos establecidos en la Normatividad Aplicable. ', 'N/A', NULL, 3, '2018-05-10 18:06:01'),
	(14, '4', '4.7', 'EvaluaciÃ³n', 'Hidrocarburos extraÃ­dos durante las pruebas', 'El Contratista podrÃ¡ hacer uso comercial de los Hidrocarburos obtenidos en la producciÃ³n de cualquier prueba para determinar las caracterÃ­sticas del yacimiento. ', 'N/A', NULL, 3, '2018-05-10 18:06:01'),
	(15, '4', '4.8', 'EvaluaciÃ³n', 'Informe de EvaluaciÃ³n', 'A mÃ¡s tardar treinta (30) DÃ­as contados a partir de la terminaciÃ³n del PerÃ­odo de EvaluaciÃ³n, el Contratista deberÃ¡ entregar a la CNH un informe de todas las actividades de EvaluaciÃ³n llevadas a cabo durante dicho PerÃ­odo de EvaluaciÃ³n que Contenga cuando menos la informaciÃ³n a que se hace referencia en el Anexo 8. ', 'N/A', NULL, 3, '2018-05-10 18:06:01'),
	(16, '5', '5.1', 'Desarrollo', 'Plan provisional', 'En caso que en el Ãrea Contractual se encuentren Campos en producciÃ³n a la fecha de adjudicaciÃ³n del presente Contrato , el Contratista deberÃ¡ implementar, a partir de la Fecha Efectiva (el "Plan Provisional") previamente aprobado por la CNH de conformidad con lo establecido en las bases de LicitaciÃ³n.', 'N/A', NULL, 4, '2018-05-10 18:06:01'),
	(17, '5', '5.2', 'Desarrollo', 'NotificaciÃ³n de continuaciÃ³n de actividades', '(a) A mÃ¡s tardar treinta (30) DÃ­as despuÃ©s de la terminaciÃ³n del PerÃ­odo de EvaluaciÃ³n, el Contratista deberÃ¡ informar a la CNH si desea continuar con las Actividades Petroleras en el Ãrea de EvaluaciÃ³n (la "NotificaciÃ³n de ContinuaciÃ³n de Actividades "). (b) Una vez emitida la NotificaciÃ³n de ContinuaciÃ³n de Actividades, el Contratista deberÃ¡ presentar el Plan de Desarrollo, de conformidad con lo previsto en la ClÃ¡usula 5.3. ', '30 DÃ­as d', NULL, 4, '2018-05-10 18:06:01'),
	(18, '5', '5.3', 'Desarrollo', 'Plan de Desarrollo', 'En caso que en el Ãrea Contractual se encuentren Campos en producciÃ³n a la fecha de adjudicaciÃ³n del presente Contrato, el Contratista tendrÃ¡ la obligaciÃ³n de presentar un Plan de Desarrollo dentro de los ciento veinte (120) DÃ­as  siguientes a la Fecha Efectiva, para dar continuidad a las actividades de ExtracciÃ³n previstas en el Plan Provisional. ', '120 DÃ­as ', NULL, 4, '2018-05-10 18:06:01'),
	(19, '5', '5.4', 'Desarrollo', 'Observaciones al plan de desarrollo por parte de CNH.', 'El Contratista serÃ¡ quien proponga las soluciones operativas y los ajustes correspondientes al Plan de Desarrollo para atender las observaciones de la CNH. ', 'N/A', NULL, 4, '2018-05-10 18:06:01'),
	(21, '5', '5.5.', 'Desarrollo', 'Cumplimiento del plan de desarrollo y modificaciones', 'El Contratista deberÃ¡ desarrollar los Campos de acuerdo con el Plan de  desarrollo aprobado. El Contratista podrÃ¡ proponer modificaciones al Plan de Desarrollo, en tÃ©rminos de lo previsto en el Anexo 9 y sujeto a la aprobaciÃ³n de la CNH.', 'N/A', NULL, 4, '2018-05-10 18:06:01'),
	(22, '5', '5.6', 'Desarrollo', 'Actividades de ExploraciÃ³n', 'Si derivado de la conducciÃ³n de las Actividades Petroleras, el Contratista determina la posibilidad de realizar un descubrimiento en horizontes distintos a las Ã¡reas evaluadas , podrÃ¡ presentar una solicitud a la CNH para llevar a cabo actividades de ExploraciÃ³n de conformidad con los tÃ©rminos del Contrato. ', 'N/A', NULL, 4, '2018-05-10 18:06:01'),
	(23, '6', '6.1', 'DevoluciÃ³n de Ã¡rea', 'Reglas de reducciÃ³n y devoluciÃ³n', 'El Contratista deberÃ¡ renunciar y devolver el cien por ciento (100%) del Ãrea Contractual', 'N/A', NULL, 5, '2018-05-10 18:06:01'),
	(24, '6', '6.2', 'DevoluciÃ³n de Ã¡rea', 'No disminuciÃ³n de otras obligaciones', 'Lo previsto en la ClÃ¡usula 6 .1 no se entenderÃ¡ como una disminuciÃ³n de las obligaciones del Contratista de cumplir con los  compromisos de trabajo para el PerÃ­odo de EvaluaciÃ³n o con sus obligaciones respecto a las actividades de Abandono y demÃ¡s previstas en el Contrato. ', 'N/A', NULL, 5, '2018-05-10 18:06:01'),
	(25, '7', '7.1', 'Actividades de producciÃ³n', 'Perfil de producciÃ³n', 'A partir del AÃ±o en que se prevea el inicio de la ProducciÃ³n Comercial Regular, el Contratista incluirÃ¡ en sus programas de trabajo un pronÃ³stico de ProducciÃ³n para cada Pozo y yacimiento. ', 'N/A', NULL, 2, '2018-05-10 18:06:01'),
	(26, '7', '7.2', 'Actividades de producciÃ³n', 'Instalaciones', 'El Contratista estarÃ¡ obligado a realizar todas las actividades de construcciÃ³n, instalaciÃ³n, reparaciÃ³n y reacondicionamiento de los Pozos, Instalaciones de RecolecciÃ³n y cualesquiera otras instalaciones necesarias para las actividades de producciÃ³n, de conformidad con el Sistema de AdministraciÃ³n . ', 'N/A', NULL, 2, '2018-05-10 18:06:01'),
	(27, '8', '8.1', 'UnificaciÃ³n', 'Procedimiento de unificaciÃ³n', 'El Contratista deberÃ¡ dar aviso a la SecretarÃ­a de EnergÃ­a y a la CNH en un plazo que no excederÃ¡ los sesenta (60) DÃ­as HÃ¡biles posteriores a haber reunido los elementos suficientes que permitan inferir la existencia de un yacimiento compartido. ', '60 DÃ­as H', NULL, 2, '2018-05-10 18:06:01'),
	(28, '8', '8.2', 'UnificaciÃ³n', 'UnificaciÃ³n sin contratista o asignatario contiguo', 'De conformidad con lo previsto en la ClÃ¡usula 8.1 y en el supuesto que el yacimiento se localice parcialmente en un Ã¡rea en la que no se encuentre vigente una asignaciÃ³n o un contrato para la ExploraciÃ³n y ExtracciÃ³n', 'N/A', NULL, 2, '2018-05-10 18:06:01'),
	(29, '9', '9.1', 'Avance de las actividades petroleras', 'PerforaciÃ³n de pozos', 'Antes de iniciar la perforaciÃ³n de cualquier Pozo, el Contratista deberÃ¡ obtener los permisos y autorizaciones que correspondan conforme a la Normatividad Aplicable. ', 'N/A', NULL, 2, '2018-05-10 18:06:01'),
	(30, '9', '9.2', 'Avance de las actividades petroleras', 'Reportes de perforaciÃ³n y geofÃ­sicos', '(a) Durante la perforaciÃ³n de cualquier Pozo y hasta la terminaciÃ³n de las operaciones de perforaciÃ³n, el Contratista enviarÃ¡ a la CNH los reportes de perforaciÃ³n que requiera la Normatividad Aplicable .\n(b) A la terminaciÃ³n de cualquier Pozo, el Contratista deberÃ¡ presentar un informe final de terminaciÃ³n de Pozo que contenga cuando menos la informaciÃ³n requerida por la Normatividad Aplicable. ', 'N/A', NULL, 2, '2018-05-10 18:06:01'),
	(31, '9', '9.3', 'Avance de las actividades petroleras', 'Programas de trabajo indicativos', 'El Contratista proporcionarÃ¡ a la CNH, a mÃ¡s tardar el primer DÃ­a HÃ¡bil del cuarto Trimestre de cada AÃ±o, programas de trabajo indicativos que ', 'primer DÃ­', NULL, 2, '2018-05-10 18:06:01'),
	(32, '9', '9.4', 'Avance de las actividades petroleras', 'Informes de avance', 'El Contratista proporcionarÃ¡ a la CNH, dentro de los diez (10) DÃ­as HÃ¡biles siguientes al final de cada Trimestre, un informe detallado de avance que muestre el progreso de las Actividades Petroleras durante el trimestre inmediato anterior .', 'Dentro de ', NULL, 2, '2018-05-10 18:06:01'),
	(33, '9', '9.5', 'Avance de las actividades petroleras', 'Actividades exentas de aprobaciÃ³n', 'Salvo por lo previsto en laNormatividad Aplicable, una vez aprobado el Plan ele EvaluaciÃ³n o el Plan de Desarrollo, el Contratista no tendrÃ¡ que obtener la aprobaciÃ³n particular de la CNH de los detalles del diseÃ±o,\ningenierÃ­a y construcciÃ³n de las instalaciones contemplados, ni el detalle ele la manera en que serÃ¡n  operados.', 'N/A', NULL, 2, '2018-05-10 18:06:01'),
	(34, '10', '10.1', 'Costos', 'Contabilidad de costos del contratista', 'Toda operaciÃ³n contable del Contratista relacionada con el cumplimiento de sus obligaciones derivadas del presente Contrato, cualquiera que sea la moneda empleada y lugar de pago, deberÃ¡ ser consignada en la cuenta operativa, conforme a lo establecido en el Anexo 4 y la Normatividad Aplicable. ', 'N/A', NULL, 1, '2018-05-10 18:06:01'),
	(35, '10', '10.2', 'Costos', 'Presupuestos indicativos', 'El Contratista proporcionarÃ¡ a la CNH, a mÃ¡s tardar el primer DÃ­a HÃ¡bil del cuarto trimestre de cada aÃ±o, presupuestos indicativos que deberÃ¡n contener una lista detallada de las actividades que planea realizar y el costo estimado de cada una de estas actividades. ', 'Primer DÃ­', NULL, 1, '2018-05-10 18:06:01'),
	(36, '10', '10.3', 'Costos', 'Procura de bienes y servicios', ' Toda la procura de los bienes y servicios relacionados con las Actividades Petroleras se sujetarÃ¡ a los principios de transparencia, economÃ­a y eficiencia y deberÃ¡ cumplir con lo establecido en el Anexo 11. ', 'N/A', NULL, 1, '2018-05-10 18:06:01'),
	(37, '10', '10.4', 'Costos', 'ObligaciÃ³n de mantener registros', 'El Contratista deberÃ¡ mantener en sus oficinas en MÃ©xico todos los libros de contabilidad, documentos de soporte y otros registros relacionados con las Actividades Petroleras de conformidad con los Procedimientos de Contabilidad. ', 'N/A', NULL, 1, '2018-05-10 18:06:01'),
	(38, '10', '10.5', 'Costos', 'De las operaciones del contratista con terceros', 'El Contratista se obliga a incluir en todas sus operaciones con terceros, vinculadas con este Contrato e incluyendo entre otros, la procura de bienes y servicios y la comercializaciÃ³n de los Hidrocarburos que le correspondan como ContraprestaciÃ³n, una disposiciÃ³n que establezca que cuando asÃ­ se le solicite por el Fondo, la SecretarÃ­a de Hacienda, o la CNH.', 'N/A', NULL, 1, '2018-05-10 18:06:01'),
	(39, '11', '11.1', 'MediciÃ³n y RecepciÃ³n de los Hidrocarburos', 'Volumen y Calidad', 'El volumen y la calidad de los Hidrocarburos Netos deberÃ¡n medirse y determinarse en los Puntos de MediciÃ³n, de acuerdo con los procedimientos establecidos en la Normatividad Aplicable.', '', NULL, 4, '2018-05-10 18:06:01'),
	(40, '11', '11.2', 'MediciÃ³n y RecepciÃ³n de los Hidrocarburos', 'Procedimientos de MediciÃ³n', 'De manera simultÃ¡nea a la presentaciÃ³n del Plan de Desarrollo para aprobaciÃ³n de la CNH, el Contratista deberÃ¡ proponer los procedimientos de mediciÃ³n de los Hidrocarburos Netos', '', NULL, 4, '2018-05-10 18:06:01'),
	(41, '11', '11.3', 'MediciÃ³n y RecepciÃ³n de los Hidrocarburos', 'InstalaciÃ³n, operaciÃ³n, mantenimiento y calibraciÃ³n de los Sistemas de MediciÃ³n', 'La instalaciÃ³n, operaciÃ³n, mantenimiento y calibraciÃ³n de los sistemas de mediciÃ³n estarÃ¡ a cargo del Contratista, bajo la supervisiÃ³n de la CNH.', '', NULL, 4, '2018-05-10 18:06:01'),
	(42, '11', '11.4', 'MediciÃ³n y RecepciÃ³n de los Hidrocarburos', 'Registros', 'El Contratista deberÃ¡ llevar registros completos y exactos de todas las', '', NULL, 4, '2018-05-10 18:06:01'),
	(49, '11', '11.6', 'MediciÃ³n y RecepciÃ³n de los Hidrocarburos', 'Remplazo del Sistema de MediciÃ³n', 'Si el Contratista decide, por causas debidamente justificadas, reemplazar cualquier sistema de mediciÃ³n, elementos o software relacionado con los mismos.', '', NULL, 3, '2018-05-11 09:18:52'),
	(50, '11', '11.5', 'MediciÃ³n y RecepciÃ³n de los Hidrocarburos', 'Mal funcionamiento del Sistema de MediciÃ³n', 'Si derivado de una prueba o supervisiÃ³n se muestra de cualquiera de los componentes de los sistemas de mediciÃ³n estÃ¡ fuera de las especificaciones, descompuesto o calibrado incorrectamente .', '', NULL, 4, '2018-05-11 09:20:49'),
	(51, '11', '11.8', 'MediciÃ³n y RecepciÃ³n de los Hidrocarburos', 'Punto de MediciÃ³n Fuera del Ã¡rea contractual', 'El Contratista podrÃ¡ solicitar, o la CNH podrÃ¡ requerir, derivado del Plan de Desarrollo correspondiente, que el Punto de MediciÃ³n se ubique fuera del Ãrea Contractual. ', '', NULL, 1, '2018-05-11 09:35:25'),
	(52, '12', '12.1', 'Materiales', 'Propiedad y uso de Materiales', 'Durante la vigencia del presente Contrato, el Contratista mantendrÃ¡ la propiedad de todos los Materiales generados o adquiridos para ser utilizados en las Actividades Petroleras. ', '', NULL, 3, '2018-05-11 09:40:24'),
	(53, '12', '12.2', 'Materiales', 'Materiales exentos de transferencia', 'Se excluyen de la transferencia de Materiales prevista en la ClÃ¡usula 12.1: los Materiales Muebles; los Materiales arrendados Contratista, asÃ­ como los Materiales que sean propiedad de los Sub-contratistas, siempre que los arrendadores y Sub-contratistas no sean Filiales del Contratista. ', '', NULL, 2, '2018-05-11 09:42:06'),
	(54, '12', '12.3', 'Materiales', 'Arrendamiento', 'El Contratista podrÃ¡ arrendar activos para la realizaciÃ³n de las Actividades Petroleras, siempre que se indique expresamente en los contratos de arrendamiento que en caso de terminaciÃ³n anticipada del presente contrato por cualquier motivo.', '', NULL, 2, '2018-05-11 09:43:31'),
	(55, '12', '12.4', 'Materiales', 'OpciÃ³n de compra', 'En aquellos casos en que el Contratista tenga el derecho de adquirir activos arrendados, el Contratista deberÃ¡ ejercer la opciÃ³n de transferencia, salvo que cuente con la autorizaciÃ³n previa de la CNH. ', '', NULL, 2, '2018-05-11 09:44:47'),
	(56, '12', '12.5', 'Materiales', 'DisposiciÃ³n de activos', 'El Contratista no podrÃ¡ vender, arrendar , gravar , dar en garantÃ­a, ni de cualquier otra forma disponer de los Materiales, sin el consentimiento de la CNH y de acuerdo a los lineamientos que emita la SecretarÃ­a de Hacienda. ', '', NULL, 2, '2018-05-11 09:46:02'),
	(57, '13', '13.1', 'Obligaciones adicionales de las partes', 'Obligaciones adicionales del contratista', ' El Contratista deberÃ¡ cumplir con otras obligaciones establecidas en el Contrato, ', '', NULL, 1, '2018-05-11 09:48:39'),
	(58, '13', '13.2', 'Obligaciones adicionales de las partes', 'Aprobaciones de la CNH', 'Siempre y cuando el Contratista haya entregado oportunamente a la CNH la informaciÃ³n aplicable de forma completa, en todos los supuestos en los que conforme al presente Contrato la CNH deba revisar, proporcionar comentarios y aprobar planes.', '', NULL, 1, '2018-05-11 09:50:26'),
	(59, '13', '13.3', 'Obligaciones adicionales de las partes', 'Responsabilidad en Seguridad Industrial, Seguridad Operativa, ProtecciÃ³n al Ambiente y Salud en el Trabajo.', 'El Contratista serÃ¡ responsable del cumplimiento de todas las obligaciones, compromisos y condiciones de seguridad industrial, seguridad operativa, protecciÃ³n al ambiente y salud en el trabajo previstas en la Normatividad Aplicable.', '', NULL, 1, '2018-05-11 09:53:20'),
	(60, '13', '13.4', 'Obligaciones adicionales de las partes', 'DaÃ±os preexistentes', 'El Contratista deberÃ¡ iniciar la conducciÃ³n de los estudios para la determinaciÃ³n de la LÃ­nea Base Ambiental durante la Etapa de TransiciÃ³n de Arranque', '(180) DÃ­as \ndespuÃ©', NULL, 1, '2018-05-11 09:55:32'),
	(61, '13', '13.5', 'Obligaciones adicionales de las partes', 'Derecho de acceso de terceros al Ã¡rea contractual', 'el Contratista permitirÃ¡ a la CNH , a cualquier otro contratista de actividades de ExploraciÃ³n y ExtracciÃ³n, asignatario, autorizado o permisionario, el uso o paso sobre cualquier parte del Ãrea Contractual.', '', NULL, 1, '2018-05-11 09:58:30'),
	(62, '14', '14.1', 'DisposiciÃ³n de la producciÃ³n', 'Hidrocarburos de Autoconsumo', 'El Contratista podrÃ¡ utilizar Hidrocarburos Producidos para las Actividades Petroleras (incluyendo su uso como parte de cualquier proyecto de RecuperaciÃ³n Avanzada) , como combustible o para inyecciÃ³n o levantamiento neumÃ¡tico.', '', NULL, 3, '2018-05-11 10:01:42'),
	(63, '14', '14.2', 'DisposiciÃ³n de la producciÃ³n', 'ComercializaciÃ³n de la producciÃ³n del contratista', 'El Contratista podrÃ¡ comercializar los Hidrocarburos Netos por sÃ­ mismo o a travÃ©s de cualquier otro comercializador', '', NULL, 3, '2018-05-11 10:07:03'),
	(64, '14', '14.3', 'DisposiciÃ³n de la producciÃ³n', 'DisposiciÃ³n de los sub - productos', 'En caso que durante la realizaciÃ³n de las Actividades Petroleras en el Ãrea Contractual y como parte del proceso de separaciÃ³n de los Hidrocarburos se obtengan subproductos', '', NULL, 3, '2018-05-11 10:09:02'),
	(65, '15', '15.1', 'Contraprestaciones', 'Pagos mensuales', 'A partir de que inicie la ProducciÃ³n Comercial Regular y entregue los Hidrocarburos Netos en los Puntos de MediciÃ³n, el Fondo , de conformidad con lo establecido en los Anexos 3, 4 y 12, calcularÃ¡ las Contra prestaciones que le correspondan al Estado.', '', NULL, 3, '2018-05-11 10:12:00'),
	(66, '15', '15.2', 'Contraprestaciones', 'ContraprestaciÃ³n del Estado', 'Las Contraprestaciones del Estado estarÃ¡n integradas de conformidad con el Anexo 3.', '', NULL, 3, '2018-05-11 10:13:56'),
	(67, '15', '15.3', 'Contraprestaciones', 'ContraprestaciÃ³n del contratista', 'La ContraprestaciÃ³n del Contratista, para el Mes de que se trate corresponderÃ¡ a la transmisiÃ³n onerosa de los Hidrocarburos Netos en dicho Mes.', '', NULL, 3, '2018-05-11 10:15:53'),
	(68, '15', '15.4', 'Contraprestaciones', 'Valor contractual de los hidrocarburos', 'Para efectos del cÃ¡lculo de las Contraprestaciones, el Valor Contractual de los Hidrocarburos para cada Mes se determinarÃ¡ de conformidad con lo establecido en el Anexo 3. ', '', NULL, 3, '2018-05-11 10:17:06'),
	(69, '15', '15.5', 'Contraprestaciones', 'CÃ¡lculo de las prestaciones', 'CorresponderÃ¡ al Fondo realizar el cÃ¡lculo de la ContraprestaciÃ³n del Estado y la ContraprestaciÃ³n del Contratista que corresponda para cada Mes conforme al presente Contrato respecto de los Hidrocarburos obtenidos en la producciÃ³n', '', NULL, 3, '2018-05-11 10:18:47'),
	(70, '16', '16.1', 'GarantÃ­as', 'GarantÃ­a de Cumplimiento', 'Para garantizar el debido, adecuado y pleno cumplimiento de los compromisos por parte del Contratista durante el PerÃ­odo de EvaluaciÃ³n.', '', NULL, 2, '2018-05-11 10:20:10'),
	(71, '16', '16.2', 'GarantÃ­as', 'GarantÃ­a Corporativa', 'SimultÃ¡neamente con la suscripciÃ³n del presente Contrato, el Contratista deberÃ¡ entregar a la CNH la GarantÃ­a Corporativa debidamente suscrita por el Garante utilizando el formato incluido en el Anexo 2', '', NULL, 2, '2018-05-11 10:21:47'),
	(72, '17', '17.1', 'Abandono y entrega del Ã¡rea contractual', 'Requerimientos del programa', 'El Contratista estarÃ¡ obligado a llevar a cabo todas las operaciones relacionadas con el Abandono del Ãrea Contractual.', '', NULL, 2, '2018-05-11 10:23:12'),
	(73, '17', '17.2', 'Abandono y entrega del Ã¡rea contractual', 'NotificaciÃ³n de abandono', 'Antes de taponar algÃºn Pozo o desinstalar cualquier material, el Contratista deberÃ¡ notificarlo a la Agencia y a la CNH.', '(60) DÃ­as de antici', NULL, 2, '2018-05-11 10:25:18'),
	(74, '17', '17.3', 'Abandono y entrega del Ã¡rea contractual', 'Fideicomiso de Abandono', 'El Contratista deberÃ¡ abrir un fideicomiso de inversiÃ³n (el "Fideicomiso de Abandono "), que estÃ© bajo el control conjunto de la CNH y el Contratista, en una instituciÃ³n bancaria mexicana autorizada por la CNH. ', '', NULL, 2, '2018-05-11 10:28:23'),
	(75, '17', '17.4', 'Abandono y entrega del Ã¡rea contractual', 'Fondeo del fideicomiso de abandono', 'El Contratista deberÃ¡ depositar al Fideicomiso de Abandono un cuarto (1/4) de la AportaciÃ³n Anual al tÃ©rmino de cada Trimestre. ', 'cada 3 meses', NULL, 2, '2018-05-11 10:30:15'),
	(76, '17', '17.5', 'Abandono y entrega del Ã¡rea contractual', 'Fondos insuficientes', 'La responsabilidad del Contratista de cumplir con los trabajos de Abandono es independiente a que existan o no fondos suficientes en el Fideicomiso de Abandono. ', '', NULL, 2, '2018-05-11 10:31:11'),
	(77, '17', '17.6', 'Abandono y entrega del Ã¡rea contractual', 'SustituciÃ³n solicitada por la CNH', 'En dicho caso, el Contratista deberÃ¡ entregar, al tercero que la CNH determine, las instalaciones en buen estado de funcionamiento.', '', NULL, 2, '2018-05-11 10:32:11'),
	(78, '17', '17.7', 'Abandono y entrega del Ã¡rea contractual', 'Etapa de transiciÃ³n final', 'En caso que suceda la terminaciÃ³n del presente Contrato por cualquier motivo, o en caso que la CNH rescinda el Contrato, el Contratista y la CNH iniciarÃ¡n la Etapa de TransiciÃ³n Final para la totalidad o la parte correspondiente del Ãrea Contractual.', '', NULL, 2, '2018-05-11 10:33:54'),
	(79, '18', '18.1', 'Responsabilidad laboral; subcontratistas y Contenido Nacional', 'Responsabilidad Laboral', 'El Contratista y cada uno de sus Subcontratistas tendrÃ¡n la responsabilidad exclusiva e independiente de todo el personal y trabajadores empleados en las Actividades Petroleras.', '', NULL, 3, '2018-05-11 10:35:55'),
	(80, '18', '18.2', 'Responsabilidad laboral; subcontratistas y Contenido Nacional', 'Subcontratistas', 'El Contratista tiene el derecho a utilizar Subcontratistas para el suministro de equipos y servicios especializados, siempre que dichas subcontrataciones no impliquen la sustituciÃ³n de facto del Contratista como operador. ', '', NULL, 3, '2018-05-11 10:36:52'),
	(81, '18', '18.3', 'Responsabilidad laboral; subcontratistas y Contenido Nacional', 'Contenido Nacional', 'Obligaciones que tendrÃ¡ el Contratista  en el PerÃ­odo de EvaluaciÃ³n y en el PerÃ­odo de Desarrollo.', '', NULL, 3, '2018-05-11 10:40:35'),
	(82, '18', '18.4', 'Responsabilidad laboral; subcontratistas y Contenido Nacional', 'Preferencias de bienes  y servicios de origen nacional', 'El Contratista deberÃ¡ dar preferencia a la contrataciÃ³n de servicios de origen nacional.', '', NULL, 3, '2018-05-11 10:41:43'),
	(83, '18', '18.5', 'Responsabilidad laboral; subcontratistas y Contenido Nacional', 'CapacitaciÃ³n y transferencia tecnolÃ³gica', 'El Contratista deberÃ¡ cumplir con los programas de capacitaciÃ³n y transferencia de tecnologÃ­a aprobados por la CNH en el Plan de EvaluaciÃ³n y en el Plan de Desarrollo.', '', NULL, 3, '2018-05-11 10:43:00'),
	(84, '19', '19.1', 'Seguros', 'DisposiciÃ³n General', 'Las obligaciones, responsabilidades y riesgos del Contratista conforme al presente Contrato son independientes de la contrataciÃ³n de los seguros a que se hace referencia en esta ClÃ¡usula 19.', '', NULL, 4, '2018-05-11 10:44:25'),
	(85, '19', '19.2', 'Seguros', 'Cobertura de Seguros', 'Con el objeto de cubrir los riesgos inherentes a las Actividades Petroleras, previo al inicio de las mismas, el Contratista deberÃ¡ obtener y mantener en pleno vigor y efecto las pÃ³lizas de seguros ', '', NULL, 4, '2018-05-11 10:45:26'),
	(86, '19', '19.3', 'Seguros', 'Aseguradoras y Condiciones', 'Previo al inicio de las Actividades Petroleras, el Contratista deberÃ¡ exhibir las pÃ³lizas de seguro correspondientes a la Agencia y a la CNH.', '', NULL, 4, '2018-05-11 10:47:03'),
	(87, '19', '19.4', 'Seguros', 'ModificaciÃ³n o cancelaciÃ³n de pÃ³lizas', 'El Contratista no podrÃ¡ cancelar o modificar las pÃ³lizas de seguro vigentes en sus tÃ©rminos y condiciones sin previa aceptaciÃ³n de la CNH y la Agencia. ', '', NULL, 4, '2018-05-11 10:48:12'),
	(88, '19', '19.5', 'Seguros', 'Renuncia a la SubrogaciÃ³n', 'En todas las pÃ³lizas proporcionadas por el Contratista conforme al presente Contrato, se incluirÃ¡ una renuncia a la subrogaciÃ³n de los aseguradores en contra de la CNH, la SecretarÃ­a de EnergÃ­a, la SecretarÃ­a de Hacienda, la SecretarÃ­a de EconomÃ­a, la Agencia, la ComisiÃ³n Reguladora de EnergÃ­a y el Fondo', '', NULL, 4, '2018-05-11 10:52:28'),
	(89, '19', '19.6', 'Seguros', 'Destino de los beneficios', ' El Contratista destinarÃ¡ inmediatamente cualquier pago que reciba por concepto de cobertura de seguros para remediar el daÃ±o civil o ambiental, reparar o reemplazar cualquiera de los Materiales daÃ±ados o destruidos. ', '', NULL, 4, '2018-05-11 10:56:43'),
	(90, '19', '19.7', 'Seguros', 'Moneda de pago', 'Los beneficios a cobrar por las pÃ³lizas requeridas conforme a esta ClÃ¡usula 19 deberÃ¡n ser denominados y pagaderos en DÃ³lares. ', '', NULL, 4, '2018-05-11 10:58:14'),
	(91, '19', '19.8', 'Seguros', 'Cumplimiento con la Normatividad aplicable', 'En l a contrataciÃ³n de los seguros, el Contratista cumplirÃ¡ con la Nonmatividad Aplicable en materia de seguros y fianzas. ', '', NULL, 4, '2018-05-11 11:00:03'),
	(92, '20', '20.1', 'Obligaciones de carÃ¡cter  fiscal', 'Obligaciones de carÃ¡cter fiscal', 'El Contratista deberÃ¡ cubrir las Obligaciones de CarÃ¡cter Fiscal que le correspondan de conformidad con la Normatividad Aplicable.', '', NULL, 4, '2018-05-11 11:01:31'),
	(93, '20', '20.2', 'Obligaciones de carÃ¡cter  fiscal', 'Derechos de aprovechamiento', 'El Contratista estarÃ¡ obligado a pagar oportunamente los derechos y aprovechamientos que establezca la Normatividad Aplicable por la administraciÃ³n y supervisiÃ³n que del presente Contrato realicen la CNH y la Agencia. ', '', NULL, 4, '2018-05-11 11:02:40'),
	(94, '21', '21.1', 'Caso fortuito o fuerza mayor', 'Caso fortuito o fuerza mayor', 'Ninguna de las Partes responderÃ¡ por el incumplimiento, suspensiÃ³n o retraso en la ejecuciÃ³n de las obligaciones del presente Contrato si dicho incumplimiento, suspensiÃ³n o retraso ha siclo causado por Caso Fortuito o Fuerza Mayor. ', '', NULL, 4, '2018-05-11 11:04:20'),
	(95, '21', '21.2', 'Caso fortuito o fuerza mayor', 'Carga de la prueba', 'La prueba de Caso Fortuito o Fuerza Mayor corresponderÃ¡ a cualquiera de las Partes que la alegue.', '', NULL, 4, '2018-05-11 11:05:12'),
	(96, '21', '21.3', 'Caso fortuito o fuerza mayor', 'NotificaciÃ³n de caso fortuito o fuerza mayor', 'Si el Contratista no puede cumplir con el Plan de EvaluaciÃ³n como resultado de Caso Fortuito o Fuerza Mayor', '', NULL, 4, '2018-05-11 11:07:06'),
	(97, '21', '21.4', 'Caso fortuito o fuerza mayor', 'Derecho de terminaciÃ³n', 'En caso que como resultado de un Caso Fortuito o Fuerza Mayor, la realizaciÃ³n de las Actividades Petroleras haya sido interrumpida por un perÃ­odo continuo de dos (2) AÃ±os o mÃ¡s.', '', NULL, 4, '2018-05-11 11:09:35'),
	(98, '21', '21.5', 'Caso fortuito o fuerza mayor', 'Situaciones de emergencia o siniestro', 'n casos de emergencia o siniestros que requieran acciÃ³n inmediata, el Contratista deberÃ¡ informar inmediatamente a la CNH, a la Agencia y a la SecretarÃ­a de EnergÃ­a y tomar todas las acciones adecuadas conforme al plan de atenciÃ³n a emergencias del Sistema de AdministraciÃ³n.', '', NULL, 4, '2018-05-11 11:11:07'),
	(99, '22', '22.1', 'RescisiÃ³n administrativa y rescisiÃ³n contractual', 'RescisiÃ³n Administrativa', 'En caso de ocurrir cualquiera de las causas graves de rescisiÃ³n administrativa previstas en el artÃ­culo 20, la CNH podrÃ¡ rescindir administrativamente este Contrato previa instauraciÃ³n del  procedimiento de rescisiÃ³n administrativa ', '', NULL, 4, '2018-05-11 11:13:23'),
	(100, '22', '22.2', 'RescisiÃ³n administrativa y rescisiÃ³n contractual', 'InvestigaciÃ³n previa', 'En caso que la CNH detecte indicios de incumplimiento de alguna de las obligaciones derivadas del presente Contrato que pudieran implicar una posible causal de rescisiÃ³n administrativa.', '', NULL, 4, '2018-05-11 11:15:36'),
	(101, '22', '22.3', 'RescisiÃ³n administrativa y rescisiÃ³n contractual', 'Procedimiento de rescisiÃ³n administrativa', 'Una vez que se determine la existencia de una causal de rescisiÃ³n administrativa la CNH deberÃ¡ notificar al Contratista por escrito la causal o causales que se invoquen para dar inicio al procedimiento de rescisiÃ³n administrativa', '', NULL, 4, '2018-05-11 11:17:49'),
	(102, '22', '22.4', 'RescisiÃ³n administrativa y rescisiÃ³n contractual', 'RescisiÃ³n  contractual', 'la CNH tendrÃ¡ derecho a rescindir este Contrato en los siguientes supuestos, siempre que el Contratista omita sanear o llevar a cabo una acciÃ³n directa y continua para remediar el incumplimiento correspondiente', '(30) DÃ­as de haber ', NULL, 4, '2018-05-11 11:19:34'),
	(103, '22', '22.5', 'RescisiÃ³n administrativa y rescisiÃ³n contractual', 'Efectos de la rescisiÃ³n administrativa o rescisiÃ³n contractual', 'En caso que la CNH rescinda este Contrato conforme a lo establecido en las ClÃ¡usulas 22 .1 o 22.4', '', NULL, 4, '2018-05-11 11:20:52'),
	(104, '22', '22.6', 'RescisiÃ³n administrativa y rescisiÃ³n contractual', 'Finiquito', 'Las Partes deberÃ¡n suscribir un finiquito en el cual se harÃ¡n constar los saldos en favor y en contra res pecto de las Contraprestaciones devengadas hasta la fecha de terminaciÃ³n o rescisiÃ³n del Contrato. ', '(6) Meses despuÃ©s d', NULL, 4, '2018-05-11 11:23:03'),
	(105, '23', '23.1', 'CesiÃ³n y cambio de control', 'CesiÃ³n', 'Para poder vender, ceder, transferir, trasmitir o de cualquier otra forma disponer de todo o cualquier parte de sus derechos u obligaciones de conformidad con este Contrato', '', NULL, 4, '2018-05-11 11:24:35'),
	(106, '23', '23.2', 'CesiÃ³n y cambio de control', 'Transferencias indirectas; Cambio de control', 'El Contratista se asegurarÃ¡ de que no sufrirÃ¡, directa o indirectamente , un cambio de Control durante la vigencia de este Contrato, sin el consentimiento de la CNH. ', '', NULL, 4, '2018-05-11 11:25:47'),
	(107, '23', '23.3', 'CesiÃ³n y cambio de control', 'Solicitud a la CNH', 'El Contratista deberÃ¡ proporcionar a la CNH toda la informaciÃ³n respecto de cualquier solicitud de aprobaciÃ³n de una propuesta de cesiÃ³n de conformidad con la ClÃ¡usula 23.1 o de un cambio de Control del Contratista de conformidad con la ClÃ¡usula 23.2 . ', '', NULL, 4, '2018-05-11 11:27:48'),
	(108, '23', '23.4', 'CesiÃ³n y cambio de control', 'Efectos de la cesiÃ³n o del cambio de control', 'Como condiciÃ³n para la obtenciÃ³n de la aprobaciÃ³n de la CNH de conformidad con esta ClÃ¡usula 23.', '', NULL, 4, '2018-05-11 11:29:33'),
	(109, '23', '23.5', 'CesiÃ³n y cambio de control', 'ProhibiciÃ³n de gravÃ¡menes', 'El Contratista no impondrÃ¡ o permitirÃ¡ que se imponga ningÃºn gravamen o restricciÃ³n de dominio sobre los derechos derivados de este Contrato o sobre los Materiales sin el consentimiento de la CNH. ', '', NULL, 4, '2018-05-11 11:30:40'),
	(110, '23', '23.6', 'CesiÃ³n y cambio de control', 'Invalidez', 'Cualquier cesiÃ³n o cambio de Control del Contratista que se lleve a cabo en contravenciÃ³n de las disposiciones ele esta ClÃ¡usula 23 no tendrÃ¡ validez y no surtirÃ¡ efectos entre las Partes.', '', NULL, 4, '2018-05-11 11:31:20'),
	(111, '24', '', 'IndemnizaciÃ³n', '', 'El Contratista indemnizarÃ¡ y mantendrÃ¡ libres de toda responsabilidad a la CNH y cualquier otra Autoridad Gubernamental.', '', NULL, 4, '2018-05-11 11:32:32'),
	(112, '25', '25.1', 'Ley aplicable y soluciÃ³n de controversias ', 'Normatividad aplicable', 'El presente Contrato se regirÃ¡ e interpretarÃ¡ de conformidad con las leyes de MÃ©xico. ', '', NULL, 4, '2018-05-11 11:33:29'),
	(113, '25', '25.2', 'Ley aplicable y soluciÃ³n de controversias ', 'ConciliaciÃ³n', 'En cualquier momento las Partes podrÃ¡n optar por alcanzar un acuerdo respecto a las controversias relacionadas con el presente Contrato mediante un procedimiento de conciliaciÃ³n ante un conciliador.', '', NULL, 4, '2018-05-11 11:34:20'),
	(114, '25', '25.3', 'Ley aplicable y soluciÃ³n de controversias ', 'Requisitos del conciliador y experto independiente', 'La persona fÃ­sica que sea nombrada como conciliador de conformidad con lo establecido en la ClÃ¡usula 25.2', '', NULL, 4, '2018-05-11 11:35:35'),
	(115, '25', '25.4', 'Ley aplicable y soluciÃ³n de controversias ', 'Tribunales federales', 'Todas las controversias entre las Partes que de cualquier forma surjan o se relacionen con las causales de rescisiÃ³n administrativa deberÃ¡n ser resueltas exclusivamente ante los Tribunales Federales de MÃ©xico', '', NULL, 4, '2018-05-11 11:37:23'),
	(116, '25', '25.5', 'Ley aplicable y soluciÃ³n de controversias ', 'Arbitraje', 'cualquier otra controversia que surja del presente Contrato o que se relacione con el mismo, y que no haya podido ser superada despuÃ©s ele tres (3) Meses eberÃ¡ ser resuelta mediante arbitraje conforme al Reglamento CNUDMI. ', '', NULL, 4, '2018-05-11 11:38:44'),
	(117, '25', '25.6', 'Ley aplicable y soluciÃ³n de controversias ', 'ConsolidaciÃ³n', 'En caso que un arbitraje iniciado conforme a la ClÃ¡usula 25.5 y un arbitraje iniciado conforme a lo previsto en el Anexo 2 involucren la misma litis, dichos arbitrajes serÃ¡n, a solicitud de la CNH, consolidados y tratados como un solo arbitraje.', '', NULL, 4, '2018-05-11 11:39:36'),
	(118, '25', '25.7', 'Ley aplicable y soluciÃ³n de controversias ', 'No suspensiÃ³n a las actividades petroleras', 'Salvo que la CNH sea quien rescinda el Contrato o se cuente con el consentimiento en contrario de la CNH, el Contratista no podrÃ¡ suspender las Actividades Petroleras mientras se resuelve cualquier controversia.', '', NULL, 4, '2018-05-11 11:40:33'),
	(119, '25', '25.8', 'Ley aplicable y soluciÃ³n de controversias ', 'Renuncia vÃ­a diplomÃ¡tica', 'El Contratista renuncia expresamente, en nombre propio y de todas sus Filiales, a formular cualquier reclamo por la vÃ­a diplomÃ¡tica. ', '', NULL, 4, '2018-05-11 11:41:25'),
	(120, '25', '25.9', 'Ley aplicable y soluciÃ³n de controversias ', 'Tratados Internacionales', 'El Contratista gozarÃ¡ de los derechos reconocidos en los tratados internacionales de los que el Estado sea parte.', '', NULL, 4, '2018-05-11 11:42:16'),
	(121, '26', '', 'Modificaciones y renuncias ', '', 'Cualquier modificaciÃ³n a este Contrato deberÃ¡ hacerse mediante el acuerdo por escrito de la CNH y el Contratista, y toda renuncia a cualquier disposiciÃ³n del Contrato hecha por la CNH o el Contratista deberÃ¡ ser expresa y constar por escrito. ', '', NULL, 4, '2018-05-11 11:43:17'),
	(122, '27', '27.1', 'Capacidad y declaraciones de las partes ', 'Declaraciones y GarantÃ­as', 'Cada Parte reconoce que la otra Parte celebra este Contrato en nombre propio y en su capacidad de entidad legal facultada para contratar por sÃ­ misma, y que ninguna Persona tendrÃ¡ ninguna responsabilidad ni obligaciÃ³n de cumplimiento de las obligaciones de dicha Parte derivadas del presente Contrato, excepto por la responsabilidad del Garante en virtud de la GarantÃ­a Corporativa.', '', NULL, 4, '2018-05-11 11:44:52'),
	(123, '27', '27.2', 'Capacidad y declaraciones de las partes ', 'RelaciÃ³n de las Partes', 'Ninguna de las Partes tendrÃ¡ la autoridad o el derecho para asumir, crear o comprometer alguna obligaciÃ³n de cualquier clase expresa o implÃ­cita en representaciÃ³n o en nombre de la otra Parte. ', '', NULL, 4, '2018-05-11 11:46:58'),
	(124, '28', '28.1', 'Datos y confidencialidad ', 'Propiedad de la informaciÃ³n', 'El Contratista deberÃ¡ proporcionar a la CNH, sin costo alguno la InformaciÃ³n TÃ©cnica que serÃ¡ propiedad de la NaciÃ³n. ', '', NULL, 4, '2018-05-11 11:48:11'),
	(125, '28', '28.2', 'Datos y confidencialidad ', 'InformaciÃ³n PÃºblica', 'Sin perjuicio de lo previsto en la Nonnatividad Aplicable, salvo por la InfomaciÃ³n TÃ©cnica y la propiedad intelectual, toda la demÃ¡s informaciÃ³n y documentaciÃ³n derivada del presente Contrato, incluyendo sus tÃ©rminos y condiciones, asÃ­ como toda la informaciÃ³n relativa a los volÃºmenes de Hidrocarburos Producidos, pagos y Contraprestaciones realizadas conforme al mismo, serÃ¡n considerados informaciÃ³n pÃºblica.', '', NULL, 4, '2018-05-11 11:49:22'),
	(126, '28', '28.3', 'Datos y confidencialidad ', 'Confidencialidad', 'El Contratista no podrÃ¡ divulgar InformaciÃ³n TÃ©cnica a ningÃºn tercero sin el previo consentimiento de la CNH. ', '', NULL, 4, '2018-05-11 11:50:08'),
	(127, '28', '28.4', 'Datos y confidencialidad ', 'ExcepciÃ³n a la confidencialidad', 'No obstante lo previsto en la ClÃ¡usula 28 . 3, la obligaciÃ³n de confidencialidad no serÃ¡ aplicable en los siguientes casos.', '', NULL, 4, '2018-05-11 11:52:33'),
	(128, '29', '', 'Notificaciones', '', 'Todas las notificaciones y demÃ¡s comunicaciones hechas en virtud de este Contrato\ndeberÃ¡n ser por escrito y serÃ¡n efectivas desde la fecha en que el destinatario las reciba.', '', NULL, 4, '2018-05-11 11:53:21'),
	(129, '30', '', 'Totalidad del contrato', '', 'Este Contrato es una compilaciÃ³n completa y exclusiva de todos los tÃ©rminos y\ncondiciones que rigen el acuerdo entre las Partes con respecto al objeto del mismo y reemplaza cualquier negociaciÃ³n, discusiÃ³n, convenio o entendimiento sobre dicho objeto', '', NULL, 2, '2018-05-11 11:54:28'),
	(130, '31', '31.1', 'Disposiciones de transparencia ', 'Acceso a la informaciÃ³n', 'El Contratista estarÃ¡ obligado a entregar la informaciÃ³n que la CNH requiera con el fin de que Ã©sta cumpla con lo previsto en el artÃ­culo 89 de la Ley de Hidrocarburos, incluyendo aquella informaciÃ³n a la que se refiere la ClÃ¡usula 28.2, a travÃ©s de los medios que para tal efecto establezca la CNH.', '', NULL, 2, '2018-05-11 11:55:38'),
	(131, '31', '31.2', 'Disposiciones de transparencia ', 'Conducta del contratista y filiales', 'El Contratista declara y garantiza que los directores, funcionarios, asesores, empleados y personal del Contratista y de sus Filiales no han efectuado, ofrecido o autorizado, ni efectuarÃ¡n, ofrecerÃ¡n o autorizarÃ¡n en ningÃºn momento,ningÃºn pago, obsequio, promesa u otra ventaja, ya sea directamente o a travÃ©s de cualquier otra Persona o entidad, para el uso o beneficio de cualquier funcionario pÃºblico, algÃºn pmiido polÃ­tico,\nfuncionario de un partido polÃ­tico o candidato a algÃºn cargo polÃ­tico', '', NULL, 2, '2018-05-11 11:57:01'),
	(132, '31', '31.3', 'Disposiciones de transparencia ', 'NotificaciÃ³n de investigaciÃ³n', 'El Contratista deberÃ¡ notificar a la CNH y a cualquier otra Autoridad Gubernamental competente, que ha ocurrido cualquier acto contrario a lo previsto en la ClÃ¡usula 31.2,', ' (5) DÃ­as siguiente', NULL, 2, '2018-05-11 11:59:06'),
	(133, '31', '31.4', 'Disposiciones de transparencia ', 'Conflicto de interÃ©s', 'El Contratista se compromete a no incurrir en ningÃºn\nconflicto ele interÃ©s entre sus propios intereses (incluyendo los ele sus accionistas, Filiales y accionistas de sus Filiales) y los intereses del Estado en el trato con los Subcontratistas, clientes.', '', NULL, 2, '2018-05-11 12:00:16'),
	(134, '32', '', 'CooperaciÃ³n en materia de seguridad nacional ', '', '', 'Con el objeto de adm', NULL, 2, '2018-05-11 12:01:12');
/*!40000 ALTER TABLE `clausulas` ENABLE KEYS */;

-- Volcando estructura para tabla databaseomg.cumplimientos
CREATE TABLE IF NOT EXISTS `cumplimientos` (
  `ID_CUMPLIMIENTO` int(11) NOT NULL,
  `CLAVE_CUMPLIMIENTO` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `CUMPLIMIENTO` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `ID_USUARIO` int(10) NOT NULL,
  `idRamaPrincipal` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_CUMPLIMIENTO`),
  KEY `fk_cumplimientos_USUARIOS1_idx` (`ID_USUARIO`),
  KEY `fk_cumplimientos_RamaPrincipal1_idx` (`idRamaPrincipal`),
  CONSTRAINT `fk_cumplimientos_RamaPrincipal1` FOREIGN KEY (`idRamaPrincipal`) REFERENCES `ramaprincipal` (`idRamaPrincipal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cumplimientos_USUARIOS1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla databaseomg.cumplimientos: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `cumplimientos` DISABLE KEYS */;
INSERT INTO `cumplimientos` (`ID_CUMPLIMIENTO`, `CLAVE_CUMPLIMIENTO`, `CUMPLIMIENTO`, `ID_USUARIO`, `idRamaPrincipal`) VALUES
	(1, 'CUMPLIMIENTO 1', 'PRUEBA', 0, NULL),
	(2, 'CUMPLIMIENTO 2', 'PRUEBA1', 0, NULL),
	(3, 'CUMPLIMIENTO 3', 'PRUEBA3', 1, NULL);
/*!40000 ALTER TABLE `cumplimientos` ENABLE KEYS */;

-- Volcando estructura para tabla databaseomg.documentos
CREATE TABLE IF NOT EXISTS `documentos` (
  `ID_DOCUMENTO` int(11) NOT NULL,
  `CLAVE_DOCUMENTO` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `DOCUMENTO` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `ID_EMPLEADO` int(11) NOT NULL,
  `REGISTROS` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`ID_DOCUMENTO`),
  KEY `fk_documentos_empleados1_idx` (`ID_EMPLEADO`),
  CONSTRAINT `fk_documentos_empleados1` FOREIGN KEY (`ID_EMPLEADO`) REFERENCES `empleados` (`ID_EMPLEADO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla databaseomg.documentos: ~40 rows (aproximadamente)
/*!40000 ALTER TABLE `documentos` DISABLE KEYS */;
INSERT INTO `documentos` (`ID_DOCUMENTO`, `CLAVE_DOCUMENTO`, `DOCUMENTO`, `ID_EMPLEADO`, `REGISTROS`) VALUES
	(-1, 'SIN DOCUMENTO', '', 0, NULL),
	(0, 'Gu_reg_miner_2.2 ', 'Guia para registrar recursos minerales distintos a Hidrocarburos  ', 1, '-Oficio de notificaciÃ³n.<br>'),
	(1, 'Pr-AccesoÃrea_01', 'Procedimiento de acceso al Ã¡rea contractual o Ã¡reas de trabajo', 3, ''),
	(2, 'Pr_Conta_Costos-2.3_', 'Procedimiento de contabilidad y registro de costos', 2, '<div>-De la cuenta operativa (hasta 5 aÃ±os posteriores ala terminaciÃ³n del contrato).</div><div>-Presupuestos indicativos(lista detallada de actividades que planea realizar y sus costos).</div><div>-Los libros de contabilidad, documentos de soporte y otros registros.</div><div>-De operaciones con terceros.</div>'),
	(3, 'Gu_solic_prorr_3.2', 'GuÃ­a para solicitud de prorroga', 3, '<div>-Oficio de solicitud de prorroga 18 meses antes del plazo original.</div><div>-Propuesta de ModificaciÃ³n a los planes de desarrollo.</div>'),
	(4, 'Pr_Tran_Arranq3.3_13', 'Procedimiento de transiciÃ³n de arranque', 2, '-De inventario de activos recibidos,(documentar la existencia y estado de integridad de los Pozos y Materiales).<br>-Autorizaciones ambientales e Impactos sociales existentes a la fecha de transiciÃ³n.<br>-LÃ­nea Base Social previo al inicio de las Actividades Petroleras.<br>-LÃ­nea Base Ambiental para identificar los DaÃ±os Ambientales y DaÃ±os Preexistentes.'),
	(5, 'Gu_renuncia_area 3.4', 'GuÃ­a para elaborar renuncia del Ã¡rea contractual ', 1, '<div><div><br></div></div><div><span style="white-spac</td>\n\n			  </tr>\n					  <tr class=" table-row"="">\n				</span></div>'),
	(6, 'Pr_Elab_PEval_01', 'Procedimiento para la elaborar Plan de EvaluaciÃ³n', 2, '-Cubrir al menos el Programa MÃ­nimo de Trabajo y el incremento en el Programa MÃ­nimo.<br>-De PerforaciÃ³n, prueba y EvaluaciÃ³n.<div>- De estudios tÃ©cnicos, econÃ³micos, sociales y ambientales a realizarse para determinar factores de recuperaciÃ³n.</div><div><div>-Posible ubicaciÃ³n de los Pozos de EvaluaciÃ³n a perforar.</div><div>-Programas preliminares de perforaciÃ³n.</div></div><div><div>-Un estimado detallado de los Costos de realizar las actividades de EvaluaciÃ³n.</div><div>-Propuesta de duraciÃ³n del PerÃ­odo de EvaluaciÃ³n.</div><div>-Medidas de seguridad y protecciÃ³n ambiental.</div><div>-Programa de ejecuciÃ³n de las actividades de EvaluaciÃ³n.</div></div>'),
	(8, 'Pr_Elab_PProv_01', 'Procedimiento para elaborar el Plan provisional', 3, '-Propuesta de actividades que permitan dar continuidad operativa a las actividades de ExtracciÃ³n<br>-Procedimientos de entrega y recepciÃ³n.'),
	(9, 'Pr_Elabora_PlanDesar', 'Procedimiento para elaboraciÃ³n de Plan de Desarrollo', 2, '-Oficio de notificaciÃ³n de continuaciÃ³n de actividades.<br>-deberÃ¡ incluir,<br>-DescripciÃ³n del o los Campos que van a ser desarrollados.<br>-Presupuesto y EconomÃ­a.<br>-Programa de AdministraciÃ³n de Riesgos.<br>-SubcontrataciÃ³n.<br>-Modificaciones al Plan de Desarrollo.<br>-Contenido Nacional y Transferencia de TecnologÃ­a.<br>-InformaciÃ³n geolÃ³gica, geofÃ­sica y de ingenierÃ­a considerada.<br>-Programa de aprovechamiento de gas natural.<br>-Mecanismos de mediciÃ³n.<br>-Propuestas de soluciones operativas y ajustes al plan de desarrollo<br>'),
	(10, 'Pr_DevoluciÃ³n_6', 'Procedimiento  de devoluciÃ³n del Ã¡rea', 4, ''),
	(11, 'eliminar', 'eliminar', 7, 'eliminar'),
	(12, 'Pr_Actividades_Prod_', 'Procedimientos  para realizar actividades de ProducciÃ³n', 3, '-Programa de trabajo con PronÃ³stico de producciÃ³n para cada pozo y yacimiento.<br>-Programas de trabajo, con registros de actividades de construcciÃ³n, instalaciÃ³n, reparaciÃ³n y re acondicionamiento de los pozos, instalaciones de recolecciÃ³n y cualesquiera otras instalaciones.'),
	(14, 'Pr_Activ_Perfo_9', 'Procedimiento de actividades de perforaciÃ³n de pozos', 1, '<div>-Permisos y autorizaciones para perforaciÃ³n de pozos.</div><div>-Reportes de perforaciÃ³n y geofÃ­sicos.</div><div>-Registros de bitÃ¡cora de los pozos.</div><div>-Informe final de terminaciÃ³n de pozo.</div><div>-Programas de trabajo indicativos.</div><div>-Informe de avances de las actividades petroleras.</div><div></div>'),
	(16, 'Pr_Procura_ByServ_10', 'Procedimiento de procura de bienes y servicios', 2, '-Contrato de responsabilidad con trabajadores y'),
	(17, 'Pr_Medic_Recep_10', 'Procedimientos de mediciÃ³n  y recepciÃ³n de los hidrocarburos', 2, '-De la mediciÃ³n del volumen y la calidad de los Hidrocarburos Producidos a boca de Pozo, en baterÃ­as de separaciÃ³n o a lo largo de los sistemas de RecolecciÃ³n y Almacenamiento'),
	(18, 'Pr_Propiedad_Mater12', 'Procedimiento de propiedad y uso de materiales', 5, '<div>-Inventario de todos los materiales generados o adquiridos para ser utilizados en las Actividades Petroleras.</div><div>-De la transferencia.</div>'),
	(21, 'Pr_Ejecu_Plandesa_01', 'Procedimiento para ejecutar Plan de desarrollo', 5, '<div>-De los Campos que van a ser desarrollados.</div><div>-De las reservas de producciÃ³n.</div><div>-De las actividades propuestas.</div><div>-De los presupuestos y economÃ­a.</div><div>-Del programa de administraciÃ³n de riesgos.</div>'),
	(22, 'Pr_Perm_Perf_13', 'Procedimiento para obtener permisos/autorizaciones para perforaciÃ³n de pozos', 6, ''),
	(23, 'Pr_EntregaInfo_CNH13', 'Procedimiento de entrega de informaciÃ³n a CNH', 1, '<div>-Datos cientÃ­ficos y tÃ©cnicos obtenidos en razÃ³n de sus trabajos.</div><div>-De Perfiles elÃ©ctricos, sÃ³nicos, radiactivos, entre otros.</div><div>-De cintas y lÃ­neas sÃ­smicas.<br></div><div>-De muestras de Pozos, nÃºcleos y formaciones;</div><div>-De mapas e informes topogrÃ¡ficos, geolÃ³gicos, geofÃ­sicos, geoquÃ­micos y de perforaciÃ³n.</div><div>-De la existencia de recursos mineros, hÃ­dricos, y de otros tipos que se descubran.'),
	(25, 'Pr_UnificaciÃ³n_8', 'Procedimiento de UnificaciÃ³n', 2, '-Oficio de notificaciÃ³n de la existencia de un yacimiento compartido.<br>-AnÃ¡lisis tÃ©cnico sustentado.'),
	(26, 'Pr_Cierr_Pozo_13', 'Procedimiento de cierre/abandono de pozo', 3, '-De los Pozos taponados y su informaciÃ³n correspondiente.'),
	(27, 'Pr_Aten_Audit_01', 'Procedimientos para atenciÃ³n de auditorias externas.', 1, ''),
	(28, 'Pr_Rem_Sue_13.1', 'Procedimiento de prevenciÃ³n de derrames o remediaciÃ³n de suelos', 1, ''),
	(31, 'Pr_DisposiciÃ³n_Prod', 'Procedimiento para disposiciÃ³n de la producciÃ³n', 2, 'Del volumen estimado de los Subproductos y la forma en que Ã©stos serÃ¡n recolectados, transportados, almacenados, desechados, procesados y/o comercializados.'),
	(32, 'Pr_Contrapre_Estado_', 'Procedimiento para determinar las contraprestaciones del estado', 2, 'apegarse al Anexo 3'),
	(33, 'Pr_Garantias_001', 'Procedimiento para el uso de garantÃ­as en el contrato', 6, '<div>-GarantÃ­a de cumplimiento inicial(carta de cedito o una pÃ³liza de fianza).</div><div>-GarantÃ­a de periodo adicional.</div><div>- La constancia de cumplimiento total de las obligaciones del Periodo Adicional de EvaluaciÃ³n.</div><div>-GarantÃ­a corporativa.</div>'),
	(34, 'Pr_Abandono_01', 'Procedimiento de abandono y entrega del Ã¡rea contractual', 1, '<div>-Programa de actividades necesarias para el taponamiento definitivo de Pozos, restauraciÃ³n, remediaciÃ³n y en su caso, compensaciÃ³n ambiental del Ãrea Contractual,.</div><div>-Programa de desinstalaciÃ³n de maquinaria y equipo, y entrega ordenada y libre de escombros y desperdicios del Ãrea Contractual.</div><div>-Oficio de notificaciÃ³n de abandono,(taponeo de pozo o desinstalar cualquier material)</div><div>-Fideicomiso de abandono (fideicomiso de inversiÃ³n).</div><div>-De depÃ³sitos al fideicomiso'),
	(35, 'Pr_Polizas_seguros_0', 'Procedimiento para Polizas de seguros', 2, '<div>-PÃ³lizas de seguros por :a) Responsabilidad civil por daÃ±os a terceros en sus bienes o en sus personas. b) Control de pozos. c) DaÃ±os a los Materiales generados o adquiridos para ser utilizados en las Actividades Petroleras. d) DaÃ±os al personal</div><div>-De que estÃ¡ suscrito o forma parte de una sociedad que tenga por objeto la prestaciÃ³n del servicio de control ele Pozos;</div><div>-PÃ³lizas de seguros que amparen las actividades de todos los Subcontratistas o proveedores .</div><div>-Reporte de las inspecciones y verificaciones de riesgo.</div>'),
	(36, 'Pr_Caso_Fortuito_001', 'Procedimiento de caso fortuito o fuerza mayor', 4, '<div>-Prueba de caso fortuito o fuerza mayor.</div><div>-Oficio solicitando prorroga.</div><div><div>-ModificaciÃ³n al Plan de Desarrollo por caso fortuito o fuerza mayor.</div></div>'),
	(37, 'Pr_rescisiÃ³n_Admin_', 'Procedimiento de rescisiÃ³n administrativa', 5, ''),
	(38, 'Pr_cesiÃ³n_Cambio_00', 'Procedimiento de cesiÃ³n y cambio de control', 3, ''),
	(39, 'Pr_IndemnizaciÃ³<spa', 'Procedimiento de indemnizaciÃ³n', 3, ''),
	(40, 'Pr_SoluyControversia', 'Procedimiento para soluciÃ³n de controversias', 3, NULL),
	(41, 'eliminar', 'eliminar', 2, ''),
	(42, 'Pr_Ã©tica_conducta_0', 'Procedimiento de Ã©tica y conducta', 3, ''),
	(43, 'Pr_ObligaciÃ³n_Fisca', 'Procedimiento de CarÃ¡cter Fiscal', 2, 'El Contratista estarÃ¡ obligado a pagar oportunamente los derechos y aprovechamientos que establezca la Normatividad Aplicable por la administraciÃ³n y supervisiÃ³n que del presente Contrato realicen la CNH y la Agencia.'),
	(44, 'Pr_Ejecu_PlanEva_01', 'Procedimiento para ejecutar plan de evaluaciÃ³n', 1, '-Oficio de solicitud de periodo adicional.<br>-Programa MÃ­nimo de Trabajo durante el PerÃ­odo Inicial de EvaluaciÃ³n<br>-Unidades de Trabajo adicionales.-GarantÃ­a del Periodo Adicional dentro de 10 habiles de su aprobaciÃ³n por CNH.<br>-Acreditar el pago de la pena convenccional en caso de incumplimiento del PMT.<br>-Estudios tÃ©cnicos de pruebas de formaciÃ³n.<br>-De los Hidrocarburos obtenidos en la producciÃ³n de cualquier prueba.<br>-Informe con todas las actividades realizadas en el perÃ­odo de evaluaciÃ³n.'),
	(46, 'Lineamiento_sisteadm', 'Lineamientos del Sistema de AdministraciÃ³n', 2, '-Planes de respuesta a emergencias<br>-De explosiones, rupturas, fugas otros incidentes que causen o pudieran causar daÃ±o al ambiente o a las personas<br>-Medidas tomadas al respecto a lo antes mencionado.'),
	(48, 'Pr_SegIndust_13', 'Procedimiento de seguridad Industrial', 2, NULL);
/*!40000 ALTER TABLE `documentos` ENABLE KEYS */;

-- Volcando estructura para tabla databaseomg.documento_dir
CREATE TABLE IF NOT EXISTS `documento_dir` (
  `ID_DOCUMENTO_ENTRADA` int(11) NOT NULL,
  `DIR` varchar(200) NOT NULL,
  KEY `fk_table1_documento_entrada1_idx` (`ID_DOCUMENTO_ENTRADA`),
  CONSTRAINT `fk_table1_documento_entrada1` FOREIGN KEY (`ID_DOCUMENTO_ENTRADA`) REFERENCES `documento_entrada` (`ID_DOCUMENTO_ENTRADA`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla databaseomg.documento_dir: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `documento_dir` DISABLE KEYS */;
/*!40000 ALTER TABLE `documento_dir` ENABLE KEYS */;

-- Volcando estructura para tabla databaseomg.documento_entrada
CREATE TABLE IF NOT EXISTS `documento_entrada` (
  `ID_CUMPLIMIENTO` int(11) NOT NULL,
  `ID_DOCUMENTO_ENTRADA` int(11) NOT NULL,
  `FOLIO_REFERENCIA` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `FOLIO_ENTRADA` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `FECHA_RECEPCION` date DEFAULT NULL,
  `ASUNTO` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `REMITENTE` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `ID_ENTIDAD` int(11) NOT NULL,
  `ID_CLAUSULA` int(11) NOT NULL,
  `CLASIFICACION` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `STATUS_DOC` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `FECHA_ASIGNACION` date DEFAULT NULL,
  `FECHA_LIMITE_ATENCION` date DEFAULT NULL,
  `FECHA_ALARMA` date DEFAULT NULL,
  `DOCUMENTO` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `OBSERVACIONES` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `MENSAJE_ALERTA` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`ID_DOCUMENTO_ENTRADA`),
  KEY `fk_documentoentrada_entidad_reguladora1_idx` (`ID_ENTIDAD`),
  KEY `fk_documentoentrada_clausulas1_idx` (`ID_CLAUSULA`),
  KEY `fk_documentoentrada_cumplimientos1_idx` (`ID_CUMPLIMIENTO`),
  CONSTRAINT `fk_documentoentrada_clausulas1` FOREIGN KEY (`ID_CLAUSULA`) REFERENCES `clausulas` (`ID_CLAUSULA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_documentoentrada_cumplimientos1` FOREIGN KEY (`ID_CUMPLIMIENTO`) REFERENCES `cumplimientos` (`ID_CUMPLIMIENTO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_documentoentrada_entidad_reguladora1` FOREIGN KEY (`ID_ENTIDAD`) REFERENCES `entidad_reguladora` (`ID_ENTIDAD`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla databaseomg.documento_entrada: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `documento_entrada` DISABLE KEYS */;
INSERT INTO `documento_entrada` (`ID_CUMPLIMIENTO`, `ID_DOCUMENTO_ENTRADA`, `FOLIO_REFERENCIA`, `FOLIO_ENTRADA`, `FECHA_RECEPCION`, `ASUNTO`, `REMITENTE`, `ID_ENTIDAD`, `ID_CLAUSULA`, `CLASIFICACION`, `STATUS_DOC`, `FECHA_ASIGNACION`, `FECHA_LIMITE_ATENCION`, `FECHA_ALARMA`, `DOCUMENTO`, `OBSERVACIONES`, `MENSAJE_ALERTA`) VALUES
	(1, -1, NULL, 'SIN FOLIO DE ENTRADA', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(1, 0, '', 'ASEA-201-18', '2018-05-18', 'Ambiental', 'Frank Rivers', 1, 94, 'Con tiempo LÃ­mite', '3', '2018-05-10', '2018-05-29', '2018-05-15', '../View/', 'PRUEBA', 'PRUEBA'),
	(1, 1, '', 'CNH-MED-123-18', '2018-05-18', 'MediciÃ³n', 'Jose HernÃ¡ndez', 0, 15, 'Sin LÃ­mite de tiempo', '1', '2018-05-18', '2018-05-24', '2018-05-20', '../View/', '', ''),
	(2, 2, '', 'CNH-PROC-0102', '2018-05-15', 'Abandono', 'Pedro Cuevas A', 0, 72, 'Informativo', '1', '2018-05-17', '2018-05-28', '2018-05-20', '../View/', '', ''),
	(2, 3, '', 'fmp-0001', '2018-06-15', 'kmm', 'juan perez', 4, 84, '1', '1', '2018-05-11', '2018-05-30', '2018-05-11', '../View/', '', ''),
	(1, 4, '', 'SHCP-01-M', '2018-05-28', 'COBROS', 'JUAN HERNANDEZ MARTINEZ', 3, 16, '1', '1', '2018-06-05', '2018-06-05', '2018-06-04', '../View/', '', 'ENTREGAR PERSONALMENTE');
/*!40000 ALTER TABLE `documento_entrada` ENABLE KEYS */;

-- Volcando estructura para tabla databaseomg.documento_salida
CREATE TABLE IF NOT EXISTS `documento_salida` (
  `ID_DOCUMENTO_SALIDA` int(11) NOT NULL,
  `ID_DOCUMENTO_ENTRADA` int(11) NOT NULL,
  `FOLIO_SALIDA` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `FECHA_ENVIO` date DEFAULT NULL,
  `ASUNTO` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `DESTINATARIO` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `DOCUMENTO` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `OBSERVACIONES` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`ID_DOCUMENTO_SALIDA`),
  KEY `fk_documento_salida_documento_entrada1_idx` (`ID_DOCUMENTO_ENTRADA`),
  CONSTRAINT `fk_documento_salida_documento_entrada1` FOREIGN KEY (`ID_DOCUMENTO_ENTRADA`) REFERENCES `documento_entrada` (`ID_DOCUMENTO_ENTRADA`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla databaseomg.documento_salida: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `documento_salida` DISABLE KEYS */;
INSERT INTO `documento_salida` (`ID_DOCUMENTO_SALIDA`, `ID_DOCUMENTO_ENTRADA`, `FOLIO_SALIDA`, `FECHA_ENVIO`, `ASUNTO`, `DESTINATARIO`, `DOCUMENTO`, `OBSERVACIONES`) VALUES
	(0, 0, 'OP-PETRO-88', '2018-05-18', 'Ambiental', 'Juan HernÃ¡ndez', '', ''),
	(1, 3, 'wedd-1123', '2018-05-25', 'enlace comercial', 'juan perez', '', 'notas de mas'),
	(2, -1, 'wedd-1123', '2018-05-25', 'enlace comercial', 'juan perez', '', 'notas de mas'),
	(3, -1, 'op-091892', '2018-05-29', 'medicion de hidrocarburos', 'hugo', '', 'debe llevarse en folder color manila');
/*!40000 ALTER TABLE `documento_salida` ENABLE KEYS */;

-- Volcando estructura para tabla databaseomg.empleados
CREATE TABLE IF NOT EXISTS `empleados` (
  `ID_EMPLEADO` int(11) NOT NULL,
  `NOMBRE_EMPLEADO` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `CATEGORIA` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `APELLIDO_PATERNO` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `APELLIDO_MATERNO` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `CORREO` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `FECHA_CREACION` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `IDENTIFICADOR` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`ID_EMPLEADO`),
  UNIQUE KEY `XPKEMPLEADOS` (`ID_EMPLEADO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla databaseomg.empleados: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
INSERT INTO `empleados` (`ID_EMPLEADO`, `NOMBRE_EMPLEADO`, `CATEGORIA`, `APELLIDO_PATERNO`, `APELLIDO_MATERNO`, `CORREO`, `FECHA_CREACION`, `IDENTIFICADOR`) VALUES
	(0, 'SIN RESPONSABLE', '', '', '', '', '2018-05-09 12:50:17', 'catalogo'),
	(1, 'Francisco Modesto', 'ing. Civil', 'Alvarez', 'Espinoza', 'aalvarez@enerin.mx', '2018-05-09 18:45:16', 'catalogo'),
	(2, 'Hugo Salvador', 'ing.MÃ©canico', 'Del Angel ', 'GÃ¡mez', 'hdelangel@enerin.mx', '2018-05-09 18:46:01', 'catalogo'),
	(3, 'Daniel Alberto.', 'ing. QuÃ­mico.', 'Clemente.', 'FigueroaÃ‘.', 'dclemente@enerin.mx.', '2018-05-09 18:47:00', 'catalogo'),
	(4, 'Edgar', 'Ejecutivo Comercial', 'Bernal', 'DiÃ¡z de Vivar', 'ebernal@hotmail.com', '2018-05-09 18:48:35', 'oficios'),
	(5, 'Javier', 'Director', 'DÃ¡vila', 'Bartoluchi', 'jdavila@enerin.mx', '2018-05-10 10:37:01', 'oficios'),
	(6, 'Federico', 'Programador Jr<br>', 'Nah', 'Cahuich', 'fnah@enerin.mx', '2018-05-11 17:19:16', 'oficios'),
	(7, 'Francisco', 'Programador Master', 'Reyes', 'Vazconcelos', 'fvazconcelos@enerin.mx', '2018-06-22 12:42:51', 'oficios'),
	(8, 'b', 'b', 'b', 'b', 'b@hot.com', '2018-06-29 12:02:05', 'catalogo-oficios');
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;

-- Volcando estructura para tabla databaseomg.empleados_tareas
CREATE TABLE IF NOT EXISTS `empleados_tareas` (
  `ID_EMPLEADO` int(11) NOT NULL,
  `NOMBRE_EMPLEADO` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `APELLIDO_PATERNO` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `APELLIDO_MATERNO` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `CATEGORIA` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `CORREO` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `FECHA_CREACION` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_EMPLEADO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla databaseomg.empleados_tareas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `empleados_tareas` DISABLE KEYS */;
/*!40000 ALTER TABLE `empleados_tareas` ENABLE KEYS */;

-- Volcando estructura para tabla databaseomg.entidad_reguladora
CREATE TABLE IF NOT EXISTS `entidad_reguladora` (
  `ID_ENTIDAD` int(11) NOT NULL,
  `CLAVE_ENTIDAD` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `DESCRIPCION` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `DIRECCION` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `TELEFONO` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `EXTENSION` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `EMAIL` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `DIRECCION_WEB` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`ID_ENTIDAD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla databaseomg.entidad_reguladora: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `entidad_reguladora` DISABLE KEYS */;
INSERT INTO `entidad_reguladora` (`ID_ENTIDAD`, `CLAVE_ENTIDAD`, `DESCRIPCION`, `DIRECCION`, `TELEFONO`, `EXTENSION`, `EMAIL`, `DIRECCION_WEB`) VALUES
	(0, 'CNH', 'ComisiÃ³n Nacional de Hidrocarburos', 'Cd. De MÃ©xico', '52(55) 4774-6500', '', 'contacto@cnh.gob.mx', 'https://www.gob.mx/cnh'),
	(1, 'ASEA', 'Agencia de Seguridad, EnergÃ­a y Ambiente', 'Cd. De MÃ©xico', '52(55) 91260109', '', 'contacto.opeasea@asea.gob.mx', 'www.asea.gob.mx'),
	(2, 'SENER', 'SecretarÃ­a de EnergÃ­a', 'Insurgentes Sur 890, del Valle, CDMX', '555-000-6000', '', 'calidad@energia.gob.mx', 'https://www.gob.mx/sener'),
	(3, 'SHCP', 'SecretarÃ­a de Hacienda y CrÃ©dito PÃºblico', 'Palacio Nacional, calle correo mayor, esq.calle soledad, centro. Cdmx.', '3688-1100', '', 'consultas@hacienda.gob.mx', 'www.shcp.gob.mx'),
	(4, 'FMP', 'Fondo Mexicano del PetrÃ³leo', 'Isabel la CatÃ³lica, DelegaciÃ³n CuauhtÃ©moc. Cdmx.', '5237-2000', '', '', 'http://www.fmped.org.mx/');
/*!40000 ALTER TABLE `entidad_reguladora` ENABLE KEYS */;

-- Volcando estructura para tabla databaseomg.estructura
CREATE TABLE IF NOT EXISTS `estructura` (
  `ID_ESTRUCTURA` int(11) NOT NULL,
  `ID_SUBMODULOS` int(11) NOT NULL,
  `ID_VISTAS` int(11) NOT NULL,
  `DESCRIPCION` varchar(95) COLLATE utf8_bin DEFAULT NULL,
  `AYUDATRIGGER` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `VISTA_NOMBRE_LOGICO` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `NOMBRE_CONTENIDO_DENTRO_SUBMODULOS` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `IMAGEN_SECCION_UP` enum('catalogo.png','undefined') COLLATE utf8_bin DEFAULT NULL,
  `IMAGEN_SECCION_IZQUIERDA` enum('empleados.png','undefined') COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`ID_ESTRUCTURA`),
  KEY `fk_ESTRUCTURA_ID_SUBMODULOS1_idx` (`ID_SUBMODULOS`),
  KEY `fk_ESTRUCTURA_VISTAS1_idx` (`ID_VISTAS`),
  CONSTRAINT `fk_ESTRUCTURA_ID_SUBMODULOS1` FOREIGN KEY (`ID_SUBMODULOS`) REFERENCES `submodulos` (`ID_SUBMODULOS`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_ESTRUCTURA_VISTAS1` FOREIGN KEY (`ID_VISTAS`) REFERENCES `vistas` (`ID_VISTAS`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla databaseomg.estructura: ~16 rows (aproximadamente)
/*!40000 ALTER TABLE `estructura` DISABLE KEYS */;
INSERT INTO `estructura` (`ID_ESTRUCTURA`, `ID_SUBMODULOS`, `ID_VISTAS`, `DESCRIPCION`, `AYUDATRIGGER`, `VISTA_NOMBRE_LOGICO`, `NOMBRE_CONTENIDO_DENTRO_SUBMODULOS`, `IMAGEN_SECCION_UP`, `IMAGEN_SECCION_IZQUIERDA`) VALUES
	(2, 2, 6, 'Catalogo-Empleados', '4', 'Empleados', 'Informacion', 'catalogo.png', 'empleados.png'),
	(3, 2, 2, 'Catalogo-Temas', '4', 'Temas', 'Informacion', NULL, NULL),
	(4, 2, 5, 'Catalogo-Documentos', '4', 'Documentos', 'Informacion', NULL, NULL),
	(5, 2, 1, 'Catalogo-Asignacion Tema Requisito', '4', 'Asignacion Tema Requisito', 'Informacion', NULL, NULL),
	(6, 3, 13, 'Cumplimientos-Validacion', '4', 'Validacion', 'undefined', NULL, NULL),
	(7, 3, 11, 'Cumplimientos-Evidencias', '4', 'Evidencias', 'undefined', NULL, NULL),
	(8, 4, 0, 'Informes gerenciales-Informe', '4', 'Informe', 'undefined', NULL, NULL),
	(9, 5, 6, 'Oficios-Empleados', '4', 'Empleados', 'Catalogos', NULL, NULL),
	(10, 5, 7, 'Oficios-Autoridad Remitente', '4', 'Autoridad Remitente', 'Catalogos', NULL, NULL),
	(11, 5, 2, 'Oficios-Temas', '4', 'Temas', 'Catalogos', NULL, NULL),
	(12, 5, 3, 'Oficios-Documento Entrada', '4', 'Documento Entrada', 'Documentacion', NULL, NULL),
	(13, 5, 4, 'Oficios-Documento Salida', '4', 'Documento Salida', 'Documentacion', NULL, NULL),
	(14, 5, 12, 'Oficios-Seguimiento Entrada', '4', 'Seguimiento Entrada', 'undefined', NULL, NULL),
	(15, 5, 9, 'Oficios-Informe Gerencial', '4', 'Informe Gerencial', 'undefined', NULL, NULL),
	(16, 6, 14, 'Usuario-Permisos', '4', 'Permisos', NULL, NULL, NULL),
	(17, 7, 15, 'Tareas-Carga Programa Gantt', NULL, 'Carga Programa Gantt', 'undefined', NULL, NULL);
/*!40000 ALTER TABLE `estructura` ENABLE KEYS */;

-- Volcando estructura para tabla databaseomg.estructura_responsable_contrato
CREATE TABLE IF NOT EXISTS `estructura_responsable_contrato` (
  `ID_USUARIO_EMPLEADO` int(11) NOT NULL,
  `ID_CUMPLIMIENTO` int(11) NOT NULL,
  KEY `fk_estructura_usuarios_y_empleados1_idx` (`ID_USUARIO_EMPLEADO`),
  KEY `fk_estructura_responsable_contrato_cumplimientos1_idx` (`ID_CUMPLIMIENTO`),
  CONSTRAINT `fk_estructura_responsable_contrato_cumplimientos1` FOREIGN KEY (`ID_CUMPLIMIENTO`) REFERENCES `cumplimientos` (`ID_CUMPLIMIENTO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_estructura_usuarios_y_empleados1` FOREIGN KEY (`ID_USUARIO_EMPLEADO`) REFERENCES `usuarios_y_empleados` (`ID_USUARIO_EMPLEADO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla databaseomg.estructura_responsable_contrato: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `estructura_responsable_contrato` DISABLE KEYS */;
/*!40000 ALTER TABLE `estructura_responsable_contrato` ENABLE KEYS */;

-- Volcando estructura para tabla databaseomg.evidencias
CREATE TABLE IF NOT EXISTS `evidencias` (
  `ID_EVIDENCIAS` int(11) NOT NULL AUTO_INCREMENT,
  `ID_REGISTRO` int(11) NOT NULL,
  `ID_USUARIO` int(10) NOT NULL,
  `FECHA_DOCUMENTO` date DEFAULT NULL,
  `DESVIACION` varchar(500) DEFAULT 'false',
  `ACCION_CORRECTIVA` varchar(500) DEFAULT NULL,
  `VALIDACION_SUPERVISOR` varchar(50) DEFAULT 'false',
  `PLAN_ACCION` varchar(50) DEFAULT '0',
  PRIMARY KEY (`ID_EVIDENCIAS`),
  KEY `fk_evidencias_registros1_idx` (`ID_REGISTRO`),
  KEY `fk_evidencias_usuarios1_idx` (`ID_USUARIO`),
  CONSTRAINT `fk_evidencias_registros1` FOREIGN KEY (`ID_REGISTRO`) REFERENCES `registros` (`ID_REGISTRO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_evidencias_usuarios1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla databaseomg.evidencias: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `evidencias` DISABLE KEYS */;
INSERT INTO `evidencias` (`ID_EVIDENCIAS`, `ID_REGISTRO`, `ID_USUARIO`, `FECHA_DOCUMENTO`, `DESVIACION`, `ACCION_CORRECTIVA`, `VALIDACION_SUPERVISOR`, `PLAN_ACCION`) VALUES
	(21, 31, 2, NULL, 'false', '', 'false', '0'),
	(22, 32, 3, NULL, 'false', '', 'false', '0'),
	(23, 28, 3, NULL, 'false', '', 'false', '0'),
	(24, 33, 3, NULL, 'false', '', 'false', '0'),
	(25, 33, 1, NULL, 'false', '', 'false', '0');
/*!40000 ALTER TABLE `evidencias` ENABLE KEYS */;

-- Volcando estructura para tabla databaseomg.gantt_seguimiento_entrada
CREATE TABLE IF NOT EXISTS `gantt_seguimiento_entrada` (
  `ID_GANTT` varchar(50) NOT NULL,
  `ID_SEGUIMIENTO_ENTRADA` int(11) NOT NULL,
  `ID_EMPLEADO` int(11) NOT NULL,
  PRIMARY KEY (`ID_GANTT`,`ID_SEGUIMIENTO_ENTRADA`),
  KEY `fk_gantt_tasks_has_seguimiento_entrada_seguimiento_entrada1_idx` (`ID_SEGUIMIENTO_ENTRADA`),
  KEY `fk_gantt_tasks_has_seguimiento_entrada_gantt_tasks1_idx` (`ID_GANTT`),
  KEY `fk_gantt_seguimiento_entrada_empleados1_idx` (`ID_EMPLEADO`),
  CONSTRAINT `FK_gantt_seguimiento_entrada_empleados` FOREIGN KEY (`ID_EMPLEADO`) REFERENCES `empleados` (`ID_EMPLEADO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_gantt_seguimiento_entrada_gantt_tasks` FOREIGN KEY (`ID_GANTT`) REFERENCES `gantt_tasks` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_gantt_seguimiento_entrada_seguimiento_entrada` FOREIGN KEY (`ID_SEGUIMIENTO_ENTRADA`) REFERENCES `seguimiento_entrada` (`ID_SEGUIMIENTO_ENTRADA`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla databaseomg.gantt_seguimiento_entrada: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `gantt_seguimiento_entrada` DISABLE KEYS */;
INSERT INTO `gantt_seguimiento_entrada` (`ID_GANTT`, `ID_SEGUIMIENTO_ENTRADA`, `ID_EMPLEADO`) VALUES
	('1529086810477', 1, 3),
	('1529086810484', 1, 3),
	('1529086810485', 1, 3),
	('1529087248936', 2, 3),
	('1529088655323', 1, 3),
	('1529106045846', 1, 3),
	('1529337218437', 0, 3),
	('1529337218444', 0, 3);
/*!40000 ALTER TABLE `gantt_seguimiento_entrada` ENABLE KEYS */;

-- Volcando estructura para tabla databaseomg.gantt_tasks
CREATE TABLE IF NOT EXISTS `gantt_tasks` (
  `id` varchar(50) NOT NULL,
  `text` varchar(255) NOT NULL,
  `start_date` datetime NOT NULL,
  `duration` int(11) NOT NULL,
  `progress` float NOT NULL,
  `parent` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla databaseomg.gantt_tasks: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `gantt_tasks` DISABLE KEYS */;
INSERT INTO `gantt_tasks` (`id`, `text`, `start_date`, `duration`, `progress`, `parent`) VALUES
	('1529086810477', 'Nueva tarea', '2018-06-14 00:00:00', 3, 0.75, '0'),
	('1529086810484', 'act1', '2018-06-14 00:00:00', 2, 1, '1529086810477'),
	('1529086810485', 'Nueva tarea2', '2018-06-14 00:00:00', 3, 1, '0'),
	('1529087248936', 'tarea CNH-PROCC', '2018-06-14 00:00:00', 1, 0.726708, '0'),
	('1529088655323', 't', '2018-06-16 00:00:00', 1, 1, '1529086810477'),
	('1529106045846', 'g', '2018-06-14 00:00:00', 1, 0, '1529086810477'),
	('1529337218437', 'Nueva tareahh', '2018-06-15 00:00:00', 1, 0.639752, '0'),
	('1529337218444', 'm', '2018-06-15 00:00:00', 1, 0.639752, '1529337218437');
/*!40000 ALTER TABLE `gantt_tasks` ENABLE KEYS */;

-- Volcando estructura para tabla databaseomg.informe_gerencial
CREATE TABLE IF NOT EXISTS `informe_gerencial` (
  `ID_INFORME_GERENCIAL` int(11) NOT NULL,
  `ID_DOCUMENTO_ENTRADA` int(11) NOT NULL,
  PRIMARY KEY (`ID_INFORME_GERENCIAL`),
  KEY `fk_INFORME_GERENCIAL_documento_entrada1_idx` (`ID_DOCUMENTO_ENTRADA`),
  CONSTRAINT `fk_INFORME_GERENCIAL_documento_entrada1` FOREIGN KEY (`ID_DOCUMENTO_ENTRADA`) REFERENCES `documento_entrada` (`ID_DOCUMENTO_ENTRADA`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla databaseomg.informe_gerencial: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `informe_gerencial` DISABLE KEYS */;
/*!40000 ALTER TABLE `informe_gerencial` ENABLE KEYS */;

-- Volcando estructura para procedimiento databaseomg.iniciarSesion
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `iniciarSesion`(IN `_paramUsuario` VARCHAR(20), IN `_paramPassword` VARCHAR(20))
    NO SQL
SELECT tbusuarios.NOMBRE_USUARIO ,tbusuarios.CONTRA,tbusuarios.ID_USUARIO
   
from usuarios tbusuarios  

WHERE 
tbusuarios.NOMBRE_USUARIO=_paramUsuario
AND 
tbusuarios.CONTRA=_paramPassword//
DELIMITER ;

-- Volcando estructura para procedimiento databaseomg.insertartemas_requisitos
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertartemas_requisitos`(
	IN `id_tema` INT








)
BEGIN
declare id_padrev int;

set id_padrev=0;
select temas.PADRE from temas  where temas.ID_TEMA=id_tema
into id_padrev;

if id_padrev=0 then 
set id_padrev=0;
 
insert into asignacion_tema_requisito set asignacion_tema_requisito.ID_ASIGNACION_TEMA_REQUISITO=
(select  IFNULL(MAX(tbasig.ID_ASIGNACION_TEMA_REQUISITO)+1,0)   from asignacion_tema_requisito tbasig), asignacion_tema_requisito.ID_DOCUMENTO=-1
,asignacion_tema_requisito.ID_TEMA=id_tema;
else
set id_padrev=1;
end if;

END//
DELIMITER ;

-- Volcando estructura para tabla databaseomg.modulos
CREATE TABLE IF NOT EXISTS `modulos` (
  `ID_MODULOS` int(11) NOT NULL,
  `NOMBRE` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`ID_MODULOS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla databaseomg.modulos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `modulos` DISABLE KEYS */;
INSERT INTO `modulos` (`ID_MODULOS`, `NOMBRE`) VALUES
	(1, 'OMG');
/*!40000 ALTER TABLE `modulos` ENABLE KEYS */;

-- Volcando estructura para tabla databaseomg.notificaciones
CREATE TABLE IF NOT EXISTS `notificaciones` (
  `IDNOTIFICACIONES` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO_EMPLEADO` int(11) NOT NULL,
  `MENSAJE` text,
  `TIPO_MENSAJE` int(11) NOT NULL,
  `ATENDIDO` varchar(45) DEFAULT 'false',
  `PARA` varchar(45) DEFAULT NULL,
  `fecha_envio` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`IDNOTIFICACIONES`),
  KEY `fk_notificaciones_usuarios_y_empleados1_idx` (`ID_USUARIO_EMPLEADO`),
  KEY `fk_notificaciones_tipo_mensaje1_idx` (`TIPO_MENSAJE`),
  CONSTRAINT `fk_notificaciones_tipo_mensaje1` FOREIGN KEY (`TIPO_MENSAJE`) REFERENCES `tipo_mensaje` (`idtipo_mensaje`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_notificaciones_usuarios_y_empleados1` FOREIGN KEY (`ID_USUARIO_EMPLEADO`) REFERENCES `usuarios_y_empleados` (`ID_USUARIO_EMPLEADO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla databaseomg.notificaciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `notificaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `notificaciones` ENABLE KEYS */;

-- Volcando estructura para tabla databaseomg.permisos
CREATE TABLE IF NOT EXISTS `permisos` (
  `idpermisos` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  `Agregar` varchar(45) DEFAULT '0',
  `Eliminar` varchar(45) DEFAULT '0',
  `Modificar` varchar(45) DEFAULT '0',
  `Consultar` varchar(45) DEFAULT '0',
  PRIMARY KEY (`idpermisos`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla databaseomg.permisos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
INSERT INTO `permisos` (`idpermisos`, `descripcion`, `Agregar`, `Eliminar`, `Modificar`, `Consultar`) VALUES
	(5, 'SuperAdministrador', '0', '0', '0', '0');
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;

-- Volcando estructura para tabla databaseomg.ramaprincipal
CREATE TABLE IF NOT EXISTS `ramaprincipal` (
  `idRamaPrincipal` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idRamaPrincipal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla databaseomg.ramaprincipal: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ramaprincipal` DISABLE KEYS */;
/*!40000 ALTER TABLE `ramaprincipal` ENABLE KEYS */;

-- Volcando estructura para tabla databaseomg.registros
CREATE TABLE IF NOT EXISTS `registros` (
  `ID_REGISTRO` int(11) NOT NULL AUTO_INCREMENT,
  `REGISTRO` text,
  `ID_DOCUMENTO` int(11) NOT NULL,
  `FRECUENCIA` text,
  PRIMARY KEY (`ID_REGISTRO`),
  KEY `fk_registros_documentos1_idx` (`ID_DOCUMENTO`),
  CONSTRAINT `fk_registros_documentos1` FOREIGN KEY (`ID_DOCUMENTO`) REFERENCES `documentos` (`ID_DOCUMENTO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla databaseomg.registros: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `registros` DISABLE KEYS */;
INSERT INTO `registros` (`ID_REGISTRO`, `REGISTRO`, `ID_DOCUMENTO`, `FRECUENCIA`) VALUES
	(28, 'Prueba1', 5, 'MENSUAL'),
	(29, 'Prueba2', 5, 'MENSUAL'),
	(30, 'hoja', 0, 'BIMESTRAL'),
	(31, 'reg', 14, 'ANUAL'),
	(32, 'Prueba3', 14, 'MENSUAL'),
	(33, 'Prueba4', 22, 'BIMESTRAL'),
	(34, 'reh', 25, 'DIARIO'),
	(35, 'reh1', 25, 'DIARIO');
/*!40000 ALTER TABLE `registros` ENABLE KEYS */;

-- Volcando estructura para tabla databaseomg.requisitos
CREATE TABLE IF NOT EXISTS `requisitos` (
  `ID_REQUISITO` int(11) NOT NULL AUTO_INCREMENT,
  `REQUISITO` text,
  PRIMARY KEY (`ID_REQUISITO`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla databaseomg.requisitos: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `requisitos` DISABLE KEYS */;
INSERT INTO `requisitos` (`ID_REQUISITO`, `REQUISITO`) VALUES
	(64, 'Prueba1'),
	(65, 'documento'),
	(66, 's'),
	(67, 'buena vida67'),
	(68, 'buena vida68'),
	(69, 'buena vida69'),
	(70, 'buena vida70'),
	(71, 'r');
/*!40000 ALTER TABLE `requisitos` ENABLE KEYS */;

-- Volcando estructura para tabla databaseomg.requisitos_registros
CREATE TABLE IF NOT EXISTS `requisitos_registros` (
  `ID_REQUISITO` int(11) NOT NULL,
  `ID_REGISTRO` int(11) NOT NULL,
  PRIMARY KEY (`ID_REQUISITO`,`ID_REGISTRO`),
  KEY `fk_REQUISITOS_has_REGISTROS_REGISTROS1_idx` (`ID_REGISTRO`),
  KEY `fk_REQUISITOS_has_REGISTROS_REQUISITOS1_idx` (`ID_REQUISITO`),
  CONSTRAINT `fk_REQUISITOS_has_REGISTROS_REGISTROS1` FOREIGN KEY (`ID_REGISTRO`) REFERENCES `registros` (`ID_REGISTRO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_REQUISITOS_has_REGISTROS_REQUISITOS1` FOREIGN KEY (`ID_REQUISITO`) REFERENCES `requisitos` (`ID_REQUISITO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla databaseomg.requisitos_registros: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `requisitos_registros` DISABLE KEYS */;
INSERT INTO `requisitos_registros` (`ID_REQUISITO`, `ID_REGISTRO`) VALUES
	(64, 28),
	(64, 29),
	(64, 32),
	(65, 30),
	(67, 33),
	(68, 31),
	(71, 34),
	(71, 35);
/*!40000 ALTER TABLE `requisitos_registros` ENABLE KEYS */;

-- Volcando estructura para tabla databaseomg.seguimiento_entrada
CREATE TABLE IF NOT EXISTS `seguimiento_entrada` (
  `ID_SEGUIMIENTO_ENTRADA` int(11) NOT NULL,
  `ID_DOCUMENTO_ENTRADA` int(11) NOT NULL,
  `ID_EMPLEADO` int(11) NOT NULL,
  `AVANCE_PROGRAMA` varchar(45) COLLATE utf8_bin DEFAULT '0',
  PRIMARY KEY (`ID_SEGUIMIENTO_ENTRADA`),
  KEY `fk_SEGUIMIENTO_ENTRADA_documento_entrada1_idx` (`ID_DOCUMENTO_ENTRADA`),
  KEY `fk_SEGUIMIENTO_ENTRADA_empleados1_idx` (`ID_EMPLEADO`),
  CONSTRAINT `fk_SEGUIMIENTO_ENTRADA_documento_entrada1` FOREIGN KEY (`ID_DOCUMENTO_ENTRADA`) REFERENCES `documento_entrada` (`ID_DOCUMENTO_ENTRADA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_SEGUIMIENTO_ENTRADA_empleados1` FOREIGN KEY (`ID_EMPLEADO`) REFERENCES `empleados` (`ID_EMPLEADO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla databaseomg.seguimiento_entrada: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `seguimiento_entrada` DISABLE KEYS */;
INSERT INTO `seguimiento_entrada` (`ID_SEGUIMIENTO_ENTRADA`, `ID_DOCUMENTO_ENTRADA`, `ID_EMPLEADO`, `AVANCE_PROGRAMA`) VALUES
	(0, 0, 3, '0.6397515535354614'),
	(1, 1, 0, '0.875'),
	(2, 2, 2, '0.7267080545425415'),
	(3, 3, 2, '0'),
	(4, 4, 0, '0');
/*!40000 ALTER TABLE `seguimiento_entrada` ENABLE KEYS */;

-- Volcando estructura para tabla databaseomg.submodulos
CREATE TABLE IF NOT EXISTS `submodulos` (
  `ID_SUBMODULOS` int(11) NOT NULL,
  `ID_MODULOS` int(11) NOT NULL,
  `NOMBRE` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`ID_SUBMODULOS`),
  KEY `fk_ID_SUBMODULOS_MODULOS1_idx` (`ID_MODULOS`),
  CONSTRAINT `fk_ID_SUBMODULOS_MODULOS1` FOREIGN KEY (`ID_MODULOS`) REFERENCES `modulos` (`ID_MODULOS`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla databaseomg.submodulos: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `submodulos` DISABLE KEYS */;
INSERT INTO `submodulos` (`ID_SUBMODULOS`, `ID_MODULOS`, `NOMBRE`) VALUES
	(1, 1, 'Principal'),
	(2, 1, 'Catalogo'),
	(3, 1, 'Cumplimientos'),
	(4, 1, 'Informes Gerenciales'),
	(5, 1, 'Oficios'),
	(6, 1, 'Usuario'),
	(7, 1, 'Tareas');
/*!40000 ALTER TABLE `submodulos` ENABLE KEYS */;

-- Volcando estructura para tabla databaseomg.tareas
CREATE TABLE IF NOT EXISTS `tareas` (
  `ID_TAREAS` int(11) NOT NULL,
  `CONTRATO` varchar(45) DEFAULT NULL,
  `TAREA` varchar(45) DEFAULT NULL,
  `FECHA_CREACION` timestamp NULL DEFAULT NULL,
  `FECHA_ALARMA` date DEFAULT NULL,
  `FECHA_CUMPLIMIENTO` date DEFAULT NULL,
  `OBSERVACIONES` varchar(500) DEFAULT NULL,
  `ARCHIVO_ADJUNTO` varchar(200) DEFAULT NULL,
  `AVANCE_PROGRAMA` varchar(45) DEFAULT NULL,
  `ID_EMPLEADO` int(11) NOT NULL,
  PRIMARY KEY (`ID_TAREAS`),
  KEY `fk_TAREAS_EMPLEADOS_TAREAS1_idx` (`ID_EMPLEADO`),
  CONSTRAINT `fk_TAREAS_EMPLEADOS_TAREAS1` FOREIGN KEY (`ID_EMPLEADO`) REFERENCES `empleados_tareas` (`ID_EMPLEADO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla databaseomg.tareas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tareas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tareas` ENABLE KEYS */;

-- Volcando estructura para tabla databaseomg.temas
CREATE TABLE IF NOT EXISTS `temas` (
  `ID_TEMA` int(11) NOT NULL AUTO_INCREMENT,
  `NO` text CHARACTER SET utf8 COLLATE utf8_bin,
  `NOMBRE` text CHARACTER SET utf8 COLLATE utf8_bin,
  `DESCRIPCION` text CHARACTER SET utf8 COLLATE utf8_bin,
  `PLAZO` text CHARACTER SET utf8 COLLATE utf8_bin,
  `PADRE` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT '0',
  `ID_EMPLEADO` int(11) NOT NULL,
  `IDENTIFICADOR` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID_TEMA`),
  KEY `fk_TEMAS_empleados1_idx` (`ID_EMPLEADO`),
  CONSTRAINT `fk_TEMAS_empleados1` FOREIGN KEY (`ID_EMPLEADO`) REFERENCES `empleados` (`ID_EMPLEADO`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla databaseomg.temas: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `temas` DISABLE KEYS */;
INSERT INTO `temas` (`ID_TEMA`, `NO`, `NOMBRE`, `DESCRIPCION`, `PLAZO`, `PADRE`, `ID_EMPLEADO`, `IDENTIFICADOR`) VALUES
	(67, '1', 'tema de programacion ', 'descripcion ', '4', '0', 2, 'catalogo'),
	(75, '5', 'tema', 'des', '4', '0', 2, 'catalogo'),
	(76, '1.1', 'p ', 'p ', 'p ', '75', 0, 'catalogo'),
	(77, '6', 'Otro', 'Otro', '2', '0', 5, 'catalogo'),
	(78, '1 ', 'tema ', 'de3 ', '3', '0', 3, 'oficios'),
	(79, '2 ', 'tema ', 'Algo', 'no se', '0', 1, 'oficios'),
	(80, '1.1', 'a', 'a', '1', '78', 0, 'oficios'),
	(81, '1.1', 'b', 'b', '1', '79', 0, 'oficios');
/*!40000 ALTER TABLE `temas` ENABLE KEYS */;

-- Volcando estructura para tabla databaseomg.tipo_mensaje
CREATE TABLE IF NOT EXISTS `tipo_mensaje` (
  `idtipo_mensaje` int(11) NOT NULL,
  `TEXTO` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtipo_mensaje`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla databaseomg.tipo_mensaje: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_mensaje` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_mensaje` ENABLE KEYS */;

-- Volcando estructura para tabla databaseomg.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `ID_USUARIO` int(10) NOT NULL,
  `NOMBRE_USUARIO` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `CONTRA` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `ID_EMPLEADO` int(11) NOT NULL,
  PRIMARY KEY (`ID_USUARIO`),
  UNIQUE KEY `XPKUSUARIOS` (`ID_USUARIO`),
  KEY `fk_usuarios_empleados1_idx` (`ID_EMPLEADO`),
  CONSTRAINT `fk_usuarios_empleados1` FOREIGN KEY (`ID_EMPLEADO`) REFERENCES `empleados` (`ID_EMPLEADO`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla databaseomg.usuarios: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`ID_USUARIO`, `NOMBRE_USUARIO`, `CONTRA`, `ID_EMPLEADO`) VALUES
	(0, 'admin', '123', 0),
	(1, 'fnah@enerin.mx', '123', 6),
	(2, 'legend', 'legend', 1),
	(3, 'fvazconcelos@enerin.', '123', 7),
	(4, 'r', '1234', 7);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Volcando estructura para tabla databaseomg.usuarios_temas
CREATE TABLE IF NOT EXISTS `usuarios_temas` (
  `ID_USUARIO` int(10) NOT NULL,
  `ID_TEMA` int(11) NOT NULL,
  PRIMARY KEY (`ID_USUARIO`,`ID_TEMA`),
  KEY `fk_usuarios_has_clausulas_usuarios1_idx` (`ID_USUARIO`),
  KEY `fk_usuarios_clausulas_temas1_idx` (`ID_TEMA`),
  CONSTRAINT `fk_usuarios_clausulas_temas1` FOREIGN KEY (`ID_TEMA`) REFERENCES `temas` (`ID_TEMA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_has_clausulas_usuarios1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla databaseomg.usuarios_temas: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios_temas` DISABLE KEYS */;
INSERT INTO `usuarios_temas` (`ID_USUARIO`, `ID_TEMA`) VALUES
	(1, 79),
	(2, 67),
	(2, 79),
	(3, 67),
	(3, 79);
/*!40000 ALTER TABLE `usuarios_temas` ENABLE KEYS */;

-- Volcando estructura para tabla databaseomg.usuarios_vistas
CREATE TABLE IF NOT EXISTS `usuarios_vistas` (
  `ID_USUARIO` int(10) DEFAULT NULL,
  `ID_ESTRUCTURA` int(11) NOT NULL,
  `EDIT` varchar(45) COLLATE utf8_bin DEFAULT 'false',
  `DELETE` varchar(45) COLLATE utf8_bin DEFAULT 'false',
  `NEW` varchar(45) COLLATE utf8_bin DEFAULT 'false',
  `CONSULT` varchar(45) COLLATE utf8_bin DEFAULT 'false',
  KEY `fk_usuarios_vistas_usuarios1_idx` (`ID_USUARIO`),
  KEY `fk_usuarios_vistas_estructura1_idx` (`ID_ESTRUCTURA`),
  CONSTRAINT `fk_usuarios_vistas_estructura1` FOREIGN KEY (`ID_ESTRUCTURA`) REFERENCES `estructura` (`ID_ESTRUCTURA`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_vistas_usuarios1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID_USUARIO`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla databaseomg.usuarios_vistas: ~61 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios_vistas` DISABLE KEYS */;
INSERT INTO `usuarios_vistas` (`ID_USUARIO`, `ID_ESTRUCTURA`, `EDIT`, `DELETE`, `NEW`, `CONSULT`) VALUES
	(1, 2, 'true', 'false', 'false', 'false'),
	(1, 3, 'false', 'false', 'false', 'true'),
	(1, 4, 'false', 'false', 'false', 'false'),
	(1, 5, 'false', 'false', 'false', 'false'),
	(1, 6, 'false', 'false', 'false', 'false'),
	(1, 7, 'false', 'false', 'false', 'false'),
	(1, 8, 'true', 'false', 'false', 'true'),
	(1, 9, 'false', 'false', 'false', 'false'),
	(1, 10, 'false', 'false', 'false', 'false'),
	(1, 11, 'false', 'false', 'false', 'false'),
	(1, 12, 'false', 'false', 'false', 'false'),
	(1, 13, 'false', 'false', 'false', 'false'),
	(1, 14, 'false', 'false', 'false', 'false'),
	(1, 15, 'false', 'false', 'false', 'false'),
	(1, 16, 'false', 'false', 'false', 'false'),
	(2, 2, 'false', 'false', 'false', 'false'),
	(2, 3, 'false', 'false', 'false', 'false'),
	(2, 4, 'false', 'false', 'false', 'false'),
	(2, 5, 'false', 'false', 'false', 'false'),
	(2, 6, 'false', 'false', 'false', 'false'),
	(2, 7, 'false', 'false', 'false', 'false'),
	(2, 8, 'false', 'false', 'false', 'false'),
	(2, 9, 'false', 'false', 'false', 'false'),
	(2, 10, 'false', 'false', 'false', 'false'),
	(2, 11, 'false', 'false', 'false', 'false'),
	(2, 12, 'false', 'false', 'false', 'false'),
	(2, 13, 'false', 'false', 'false', 'false'),
	(2, 14, 'false', 'false', 'false', 'false'),
	(2, 15, 'false', 'false', 'false', 'false'),
	(2, 16, 'true', 'true', 'true', 'true'),
	(3, 2, 'true', 'false', 'false', 'false'),
	(3, 3, 'false', 'false', 'false', 'false'),
	(3, 4, 'false', 'false', 'false', 'false'),
	(3, 6, 'false', 'false', 'false', 'false'),
	(3, 7, 'false', 'false', 'false', 'false'),
	(3, 9, 'false', 'false', 'false', 'false'),
	(3, 10, 'false', 'false', 'false', 'false'),
	(3, 11, 'false', 'false', 'false', 'false'),
	(3, 5, 'false', 'false', 'false', 'false'),
	(3, 8, 'false', 'false', 'false', 'false'),
	(3, 12, 'false', 'false', 'false', 'false'),
	(3, 13, 'false', 'false', 'false', 'false'),
	(3, 14, 'false', 'false', 'false', 'false'),
	(3, 15, 'false', 'false', 'false', 'false'),
	(3, 17, 'false', 'false', 'false', 'false'),
	(4, 16, 'false', 'false', 'false', 'false'),
	(4, 5, 'false', 'false', 'false', 'false'),
	(4, 9, 'false', 'false', 'false', 'false'),
	(4, 10, 'false', 'false', 'false', 'false'),
	(4, 11, 'false', 'false', 'false', 'false'),
	(4, 12, 'false', 'false', 'false', 'false'),
	(4, 13, 'false', 'false', 'false', 'false'),
	(4, 6, 'false', 'false', 'false', 'false'),
	(4, 7, 'false', 'false', 'false', 'false'),
	(4, 8, 'false', 'false', 'false', 'false'),
	(4, 15, 'false', 'false', 'false', 'false'),
	(4, 14, 'false', 'false', 'false', 'false'),
	(4, 17, 'false', 'false', 'false', 'false'),
	(3, 16, 'false', 'false', 'false', 'false'),
	(1, 17, 'false', 'false', 'false', 'true'),
	(2, 17, 'false', 'false', 'false', 'false');
/*!40000 ALTER TABLE `usuarios_vistas` ENABLE KEYS */;

-- Volcando estructura para tabla databaseomg.usuarios_y_empleados
CREATE TABLE IF NOT EXISTS `usuarios_y_empleados` (
  `ID_USUARIO_EMPLEADO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(10) NOT NULL,
  `ID_EMPLEADO` int(11) NOT NULL,
  `idpermisos` int(11) NOT NULL,
  PRIMARY KEY (`ID_USUARIO_EMPLEADO`),
  UNIQUE KEY `ID_USUARIO_UNIQUE` (`ID_USUARIO`),
  UNIQUE KEY `ID_EMPLEADO_UNIQUE` (`ID_EMPLEADO`),
  KEY `fk_USUARIOS_Y_EMPLEADOS_usuarios1_idx` (`ID_USUARIO`),
  KEY `fk_USUARIOS_Y_EMPLEADOS_empleados1_idx` (`ID_EMPLEADO`),
  KEY `fk_usuarios_y_empleados_permisos1_idx` (`idpermisos`),
  CONSTRAINT `fk_USUARIOS_Y_EMPLEADOS_empleados1` FOREIGN KEY (`ID_EMPLEADO`) REFERENCES `empleados` (`ID_EMPLEADO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_USUARIOS_Y_EMPLEADOS_usuarios1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_y_empleados_permisos1` FOREIGN KEY (`idpermisos`) REFERENCES `permisos` (`idpermisos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla databaseomg.usuarios_y_empleados: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios_y_empleados` DISABLE KEYS */;
INSERT INTO `usuarios_y_empleados` (`ID_USUARIO_EMPLEADO`, `ID_USUARIO`, `ID_EMPLEADO`, `idpermisos`) VALUES
	(3, 0, 1, 5);
/*!40000 ALTER TABLE `usuarios_y_empleados` ENABLE KEYS */;

-- Volcando estructura para tabla databaseomg.validacion_documento
CREATE TABLE IF NOT EXISTS `validacion_documento` (
  `ID_VALIDACION_DOCUMENTO` int(11) NOT NULL,
  `DOCUMENTO_ARCHIVO` varchar(45) DEFAULT NULL,
  `VALIDACION_DOCUMENTO_RESPONSABLE` varchar(45) DEFAULT NULL,
  `OBSERVACION_DOCUMENTO` varchar(200) DEFAULT NULL,
  `VALIDACION_TEMA_RESPONSABLE` varchar(45) DEFAULT NULL,
  `OBSERVACION_TEMA` varchar(200) DEFAULT NULL,
  `PLAN_ACCION` varchar(45) DEFAULT NULL,
  `DESVIACION_MAYOR` varchar(45) DEFAULT NULL,
  `ID_DOCUMENTO` int(11) NOT NULL,
  PRIMARY KEY (`ID_VALIDACION_DOCUMENTO`),
  KEY `fk_validacion_documento_documentos1_idx` (`ID_DOCUMENTO`),
  CONSTRAINT `fk_validacion_documento_documentos1` FOREIGN KEY (`ID_DOCUMENTO`) REFERENCES `documentos` (`ID_DOCUMENTO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla databaseomg.validacion_documento: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `validacion_documento` DISABLE KEYS */;
INSERT INTO `validacion_documento` (`ID_VALIDACION_DOCUMENTO`, `DOCUMENTO_ARCHIVO`, `VALIDACION_DOCUMENTO_RESPONSABLE`, `OBSERVACION_DOCUMENTO`, `VALIDACION_TEMA_RESPONSABLE`, `OBSERVACION_TEMA`, `PLAN_ACCION`, `DESVIACION_MAYOR`, `ID_DOCUMENTO`) VALUES
	(1, 'documento', 'true', NULL, 'true', NULL, NULL, 'false', 5),
	(2, 'd', NULL, '', 'false', NULL, NULL, NULL, 1);
/*!40000 ALTER TABLE `validacion_documento` ENABLE KEYS */;

-- Volcando estructura para tabla databaseomg.vistas
CREATE TABLE IF NOT EXISTS `vistas` (
  `ID_VISTAS` int(11) NOT NULL,
  `NOMBRE` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `AYUDATRIGGER` varchar(45) COLLATE utf8_bin DEFAULT NULL COMMENT 'PARA PODER PASAR LAS VISTAS ACTUALES ',
  PRIMARY KEY (`ID_VISTAS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla databaseomg.vistas: ~16 rows (aproximadamente)
/*!40000 ALTER TABLE `vistas` DISABLE KEYS */;
INSERT INTO `vistas` (`ID_VISTAS`, `NOMBRE`, `AYUDATRIGGER`) VALUES
	(0, 'InformeView.php', '6'),
	(1, 'AsignacionTemasRequisitosView.php', '6'),
	(2, 'TemasView.php', '6'),
	(3, 'DocumentoEntradaView.php', '6'),
	(4, 'DocumentoSalidaView.php', '6'),
	(5, 'DocumentosView.php', '6'),
	(6, 'EmpleadosView.php', '6'),
	(7, 'EntidadesReguladorasView.php', '6'),
	(8, 'GanttView.php', '6'),
	(9, 'InformeGerencialView.php', '6'),
	(10, 'InyectarVistasView.php', '6'),
	(11, 'EvidenciasView.php', '6'),
	(12, 'SeguimientoEntradaView.php', '6'),
	(13, 'ValidacionDocumentosView.php', '6'),
	(14, 'AdminView.php', '6'),
	(15, 'TareasView.php', NULL);
/*!40000 ALTER TABLE `vistas` ENABLE KEYS */;

-- Volcando estructura para disparador databaseomg.documentos_after_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `documentos_after_insert` AFTER INSERT ON `documentos` FOR EACH ROW BEGIN
 INSERT INTO validacion_documento SET validacion_documento.id_validacion_documento =(SELECT max(tbvalidacion.id_validacion_documento)+1 
 as aliasid_validacion_documento 
 from  validacion_documento tbvalidacion),
 validacion_documento.id_documento=(new.ID_DOCUMENTO);


END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador databaseomg.documento_entrada_before_delete
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `documento_entrada_before_delete` BEFORE DELETE ON `documento_entrada` FOR EACH ROW BEGIN

delete from seguimiento_entrada where seguimiento_entrada.ID_DOCUMENTO_ENTRADA=(old.ID_DOCUMENTO_ENTRADA);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador databaseomg.estructura_after_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `estructura_after_insert` AFTER UPDATE ON `estructura` FOR EACH ROW BEGIN

INSERT INTO usuarios_vistas set usuarios_vistas.ID_ESTRUCTURA=(new.ID_ESTRUCTURA),
 usuarios_vistas.ID_USUARIO=(new.AYUDATRIGGER);


END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador databaseomg.temas_after_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `temas_after_insert` AFTER INSERT ON `temas` FOR EACH ROW BEGIN
CALL `insertartemas_requisitos`(NEW.ID_TEMA);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador databaseomg.usuarios_after_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `usuarios_after_insert` AFTER INSERT ON `usuarios` FOR EACH ROW BEGIN
UPDATE estructura set estructura.AYUDATRIGGER=(new.ID_USUARIO);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
