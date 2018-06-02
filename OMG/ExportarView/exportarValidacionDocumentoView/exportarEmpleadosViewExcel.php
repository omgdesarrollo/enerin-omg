<?php
session_start();
require_once '../../util/Session.php';

date_default_timezone_set('America/Mexico_city');

$fecha = date("d-m-Y H:i:s");

header("Content-Disposition: attachment; filename=Reporte_Empleados-$fecha.xls"); //Indica el nombre del archivo resultante
header("Pragma: no-cache");
header("Expires: 0");



?>

