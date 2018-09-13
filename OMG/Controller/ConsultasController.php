<?php
session_start();
require_once '../Model/ConsultasModel.php';
require_once '../util/Session.php';

$Op=$_REQUEST["Op"];
$model=new ConsultasModel();


switch ($Op) {
    case 'Listar':
        $Lista = $model->listarConsultas(Session::getSesion("s_cont"));
        $Lista = $model->calcular($Lista);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
        break;

    default:
        break;
}


?>

