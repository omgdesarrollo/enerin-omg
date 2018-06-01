<?php


session_start();
require_once '../Model/OperacionesModel.php';
require_once '../Pojo/OperacionesPojo.php';
require_once '../Model/DocumentoModel.php';
require_once '../util/Session.php';

$Op=$_REQUEST["Op"];
$model=new OperacionesModel();
$pojo= new OperacionesPojo();

$modelDocumento=new DocumentoModel();


switch ($Op)
{
    case 'Listar':
    
		$Lista=$model->listarOperaciones();
    	Session::setSesion("listarOperaciones",$Lista);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
		break;
    
    case 'getClavesDocumentos':
        $Lista=$model->getClavesDocumentos($_REQUEST["CADENA"]);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
		break;
            
    case 'MostrarRegistrosPorDocumento':
        
        $id_documento=$_REQUEST["ID_DOCUMENTO"];
        
        $lista=$modelDocumento->obtenerRegistrosPorDocumento($id_documento);
        Session::setSesion("obtenerRegistrosPorDocumento",$lista);
        
        header('Content-type: application/json; charset=utf-8');
                echo json_encode($lista);
        
        break;
    case 'CrearEvidencia':

        $res = $model->crearEvidencia($_REQUEST["CLAVE_DOCUMENTO"]);
        echo $res;
        break;
    
    case 'Modificar':

		$data = $model->actualizarPorColumna($_REQUEST["column"],$_REQUEST["editval"],$_REQUEST["id"] );
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($data);                  
	break;
    
    
    
	default:
		echo false;
        break;
}
?>
