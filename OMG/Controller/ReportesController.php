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
        foreach($Lista as $key => $value)
        {
            foreach($value as $k=>$val)
            {
                $Lista[$key][$k] = utf8_encode($val);
            }
        }
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
    break;
    
    case 'listarDatos':
        
    break;

    default:
        echo -1;
    break;
}


?>
