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
    
    case 'listarparametros(v,nv,sd)':
    $v["param"]["v"]=$_REQUEST["validado"];
    $v["param"]["n_v"]=$_REQUEST["no_validado"];
    $v["param"]["s_d"]=$_REQUEST["sin_documento"];
    $v["param"]["contrato"]= Session::getSesion("s_cont");
        $Lista=$model->listarValidaciones($v);
         header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
//        echo $v["param"]["v"];
    break;
    
    default:
        break;
}


?>