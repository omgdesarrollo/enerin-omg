<?php
//este controlador solo atiende un requerimiento
//el requerimiento que atiende es el de inicio de sesion
session_start();
require_once '../util/Session.php';
require_once '../Model/GeneradorReporteModel.php';
$Op=$_REQUEST["Op"];
$modelGenerador=new GeneradorReporteModel();
switch ($Op) {
	case 'GenerarReporteCalculoDeTodosLosDiariosRangoFechas':
	$Lista= $modelGenerador->listarReportesporFecha($_REQUEST['FECHA_INICIO'],$_REQUEST['FECHA_FINAL'],Session::getSesion("s_cont"));
      header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);     
	break;	
	case  'GenerarReporteTodosLosDiarios':
	    $Lista= $modelGenerador->listarReportesDiariosFechaInicioaFechaFinal($_REQUEST['FECHA_INICIO'],$_REQUEST['FECHA_FINAL'],Session::getSesion("s_cont"));
	    header('Content-type: application/json; charset=utf-8');
	    echo json_encode($Lista);
	break;
    
        case 'ListByMonthAndYear':
            $Lista= $modelGenerador->listarReportePorMonthAndYear($_REQUEST['MONTH'], $_REQUEST['YEAR'],Session::getSesion("s_cont"));
            header('Content-type: application/json; charset=utf-8');
	    echo json_encode($Lista);
            break;
        
        case 'ListByMonthAndYearCalculo':
            $Lista= $modelGenerador->sumaByMonthAndYear($_REQUEST['MONTH'], $_REQUEST['YEAR'],Session::getSesion("s_cont")); 
            header('Content-type: application/json; charset=utf-8');
	    echo json_encode($Lista);
            break;
        
        case 'ListSumaReportesDiariosCaluloMensualConAnualCombinado':
            $Lista= $modelGenerador->sumaDereportesDiariosByMonthAndYear($_REQUEST['MONTH'], $_REQUEST['YEAR'],Session::getSesion("s_cont"));
            header('Content-type: application/json; charset=utf-8');
	    echo json_encode($Lista);
            break;
        
        case 'guardarPorcentajesMolares':
            $Lista= $modelGenerador->insertarPorcentajesMolares($_REQUEST['MES'], $_REQUEST['ANO'],Session::getSesion("s_cont"));
            header('Content-type: application/json; charset=utf-8');
	    echo json_encode($Lista);
            break;
        
        
        default:
            -1;
}


?>


