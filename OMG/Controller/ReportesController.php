<?php
session_start();

require_once '../Model/CatalogoProcesosModel.php';
require_once '../Model/ReporteModel.php';
require_once '../util/Session.php';

$Op=$_REQUEST["Op"];
$model=new CatalogoProcesosModel();
$modelReporte= new ReporteModel();


switch($Op)
{
    case 'listar':   
        $CONTRATO = Session::getSesion("s_cont");
        $Lista = $modelReporte->listarReportes($CONTRATO);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
    break;   
    case 'listarDatos':       
    break;
<<<<<<< HEAD
=======

    case 'listarReportesporFecha':
        $Lista= $model->listarReportesporFecha($_REQUEST['FECHA_INICIO'],$_REQUEST['FECHA_FINAL'],Session::getSesion("s_cont"));
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
        return $Lista;
        break;
    
    case 'listarDatos':
        
    break;

>>>>>>> 8a4b53adb18f60018450ea9d75b3040e8d658773
    default:
        echo -1;
    break;
}

 



?>
