<?php
session_start();
require_once '../Model/RequisitosModel.php';
require_once '../util/Session.php';

$Op= $_REQUEST["Op"];
$model=new RequisitosModel();


switch ($Op){
    
    case 'ListarRegistros':
        $Lista=$model->listarRegistros();
        Session::setSesion("listarRegistros",$Lista);
        
        header('Content-type: application/json; charset=utf-8');
                echo json_encode($Lista);
                
                return $Lista;        
    break;

    default:
    # code...
    break;
    
    
}


?>