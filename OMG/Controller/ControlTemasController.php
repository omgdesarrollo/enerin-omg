<?php
session_start();
require_once '../Model/ControlTemasModel.php';
require_once '../util/Session.php';

$Op=$_REQUEST['Op'];
$model=new ControlTemasModel();

switch ($Op) {
    case 'Listar':
        $CONTRATO= Session::getSesion("s_cont");
        $CADENA= "catalogo";    
        $Lista= $model->listarTemas($CONTRATO, $CADENA);
        header('Content-type: application/json; charset=utf-8'); 
        echo json_encode($Lista);
        return $Lista;
        break;

    
    default:
        break;
}

?>
