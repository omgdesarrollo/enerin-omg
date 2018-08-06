<?php
session_start();
require_once '../Model/ConsultasModel.php';
require_once '../util/Session.php';

$Op=$_REQUEST["Op"];
$model=new ConsultasModel();


switch ($Op) {
    case 'Listar':
        $Lista= $model->ListarConsultas(Session::getSesion("s_cont"));
        
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
        return $Lista;

        break;

    default:
        break;
}


?>

