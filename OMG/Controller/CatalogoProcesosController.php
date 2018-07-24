<?php
require_once '../Model/CatalogoProcesosModel.php';
require_once '../util/Session.php';

$Op=$_REQUEST["Op"];

$model=new CatalogoProcesosModel();


switch ($Op) {
    case 'listar':
        $Lista=$model->listarCatalogoProcesos();
        header('Content-type: application/json; charset=utf-8'); 
        echo json_encode($Lista);
        return $Lista;

        break;

    default:
        break;
}


?>
