<?php
session_start();

require_once '../Model/CatalogoProcesosModel.php';
require_once '../util/Session.php';

$Op=$_REQUEST["Op"];
$model=new CatalogoProcesosModel();

switch ($Op)
{
    case 'listar':
        $CONTRATO = Session::getSesion("s_cont");
        $Lista = $model->listarCatalogo($CONTRATO);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
    break;

    case 'Guardar':
        header('Content-type: application/json; charset=utf-8');
        $datos = json_decode($_REQUEST["DATOS"],true);
        $CONTRATO = Session::getSesion("s_cont");
        $exito = $model->guardarCatalogo($CONTRATO,$datos);
        echo $exito;
    break;

    case 'BuscarID':
        $CONTRATO = Session::getSesion("s_cont");
        $Lista = $model->buscarID($_REQUEST["CADENA"],$CONTRATO);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
    break;

    default:
        echo -1;
    break;
}


?>
