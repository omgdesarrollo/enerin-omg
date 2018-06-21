<?php

//este controlador solo atiende un requerimiento
//el requerimiento que atiende es el de inicio de sesion
session_start();
require_once '../Model/TemaModel.php';
require_once '../Pojo/TemaPojo.php';
require_once '../util/Session.php';



$Op=$_REQUEST["Op"];
$model=new TemaModel();
$pojo= new TemaPojo();

switch ($Op) {
	case 'Listar':

            $Lista=$model->mostrarTemas();
                               
            header('Content-type: application/json; charset=utf-8'); 
            echo json_encode($Lista);
             return $Lista;

         break;
	
	case 'ListarHijos':
            
            $Lista= $model->listarHijos($_REQUEST['ID']);
            header('Content-type: application/json; charset=utf-8'); 
            echo json_encode($Lista);
            return $Lista;
            
		break;	
        

	case 'Guardar':
		# code...
		break;

	case 'Modificar':
		# code...
            $model->actualizarPorColumna($_REQUEST["column"],$_REQUEST["editval"],$_REQUEST["id"] );
		break;

	case 'Eliminar':
		# code...
		break;	


	default:
		# code...
		break;
}
?>


