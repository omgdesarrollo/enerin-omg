<?php
session_start();
require_once '../Model/InformeEvidenciasModel.php';
require_once '../dao/InformeEvidenciasDAO.php';
require_once '../util/Session.php';


$Op=$_REQUEST["Op"];
$model=new InformeEvidenciasModel();

switch ($Op) {
    case 'listarparametros(v,nv,sd)':
        
        $v["param"]["v"]=$_REQUEST["validado"];
        $v["param"]["n_v"]=$_REQUEST["no_validado"];
        $v["param"]["s_d"]=$_REQUEST["sin_documento"];
        $v["param"]["contrato"]= Session::getSesion("s_cont");
        $Lista=$model->listarEvidencias($v);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
        
        break;
    
    case 'MostrarTemayResponsable':
        $Lista=$model->obtenerTemayResponsable($_REQUEST['ID_DOCUMENTO'],Session::getSesion("s_cont"));
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
        return $Lista;
        
        break;

    default:
        break;
}


?>

