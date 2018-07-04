<?php

session_start();
require_once '../Model/ReporteValidacionDocumentosModel.php';
require_once '../dao/ReporteValidacionDocumentosDAO.php';
require_once '../util/Session.php';

$Op=$_REQUEST["Op"];
$model=new ReporteValidacionDocumentosModel();

switch ($Op) {
    case 'Listar':
        $Lista= $model->listarValidaciones();
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
        return $Lista;        

        break;
    
    default:
        break;
}


?>