<?php 

session_start();
require_once '../Model/TareasModel.php';
require_once '../util/Session.php';

$Op=$_REQUEST["Op"];
$model=new TareasModel();


switch ($Op) {
    case 'Listar':
        $Lista= $model->listarTareas();
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
        return $Lista;
        
        break;

    default:
        break;
}


?>