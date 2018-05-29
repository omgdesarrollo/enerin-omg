<?php


session_start();
require_once '../Model/OperacionesModel.php';
require_once '../Pojo/operacionesPojo.php';
require_once '../util/Session.php';

$Op=$_REQUEST["Op"];
$model=new DocumentoModel();
$pojo= new DocumentoPojo();


switch ($Op)
{
    case 'Listar':
    
		$Lista=$model->listarOperaciones();
    	Session::setSesion("listarOperaciones",$Lista);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
		break;
    
	case 'getClavesDocumentos':
        $Lista=$model->getClavesDocumentos();
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
		break;	

	default:
		# code...
		break;
}
?>
