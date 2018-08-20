<?php
session_start();

require_once '../Model/CatalogoProduccionModel.php';
require_once '../Model/ReporteModel.php';
require_once '../util/Session.php';

$Op=$_REQUEST["Op"];
$model=new CatalogoProduccionModel();
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

    case 'listarReportesporFecha':
        $Lista= $model->listarReportesporFecha($_REQUEST['FECHA_INICIO'],$_REQUEST['FECHA_FINAL'],Session::getSesion("s_cont"));
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
        return $Lista;
        break;
    
    case 'listarDatos':
        
    break;

    case 'buscarID':
        $CONTRATO= Session::getSesion("s_cont");
        $Lista= $modelReporte->buscarID($CONTRATO, $_REQUEST['CADENA']);
                
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
        break;

    case 'buscarRegionFiscal':
        $CONTRATO= Session::getSesion("s_cont");
        $Lista= $modelReporte->buscarRegionesFiscales($CONTRATO);
        
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
        break;
    
    case 'obtenerTagPatin':
        $CONTRATO= Session::getSesion("s_cont");
        $Lista= $modelReporte->obtenerTagPatin($_REQUEST['UBICACION'], $CONTRATO);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);        
        break;
    
    case 'obtenerTagMedidor':
        $CONTRATO= Session::getSesion("s_cont");
        $Lista= $modelReporte->obtenerTagMedidor($_REQUEST['TAG_PATIN'], $CONTRATO);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
        break;
    
    case 'obtenerTipoMedidor':
        $CONTRATO= Session::getSesion("s_cont");
        $Lista= $modelReporte->obtenerTipoMedidor($_REQUEST['TAG_MEDIDOR'], $CONTRATO);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
        break;

    default:
        echo -1;
    break;
}

?>