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

    default:
        echo -1;
    break;
}


?>
