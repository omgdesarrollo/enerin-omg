<?php
session_start();
require_once '../Model/RegistrosModel.php';
require_once '../util/Session.php';

$Op= $_REQUEST["Op"];
$model=new RegistrosModel();


switch ($Op){
    
    case 'ListarRegistros':
        $Lista=$model->listarRegistros();
        Session::setSesion("listarRegistros",$Lista);
        
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);    
        // return $Lista;
    break;

    case 'GenerarArbol':
        
        $Lista=$model->generarDatosArbol($_REQUEST['ID_ASIGNACION']);
        // Session::setSesion("generarDatosArbol",$Lista);
        
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
        
        // return $Lista;
    break;

    case 'guardar':
        
        $data = $model->insertarRegistros($_REQUEST["REGISTRO"]);
		echo $data;
    break;

    default:
    # code...
    break;
    
    
}
?>