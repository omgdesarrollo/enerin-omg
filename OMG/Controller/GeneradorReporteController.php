<?php
//este controlador solo atiende un requerimiento
//el requerimiento que atiende es el de inicio de sesion
session_start();
require_once '../util/Session.php';
require_once '../Model/GeneradorReporteModel.php';
$Op=$_REQUEST["Op"];
$modelGenerador=new GeneradorReporteModel();

switch ($Op) {
       
	case 'GenerarReporte':
	$Lista= $modelGenerador->listarReportesporFecha($_REQUEST['FECHA_INICIO'],$_REQUEST['FECHA_FINAL'],Session::getSesion("s_cont"));
      header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
        
	break;
        default:
            -1;
}


?>


