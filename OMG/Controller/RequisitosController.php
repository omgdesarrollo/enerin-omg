<?php

//este controlador solo atiende un requerimiento
//el requerimiento que atiende es el de inicio de sesion
session_start();
require_once '../Model/RequisitoModel.php';
require_once '../util/Session.php';



$Op=$_REQUEST["Op"];
$model=new RequisitoModel();


switch ($Op) {
	case 'Listar':

		$Lista=$model->listarRequisitos();
    	Session::setSesion("listarRequisitos",$Lista);
//    	$tarjet="../view/principalmodulos.php";
    	
//		echo json_encode(array("data" => $Lista));
//		header("location: login.php");
//        header('Content-type: application/json; charset=utf-8');
//                echo json_encode(array("data" => $Lista));
//echo $json = json_encode(array("n" => "".$Lista.NOMBRE_EMPLEADO, "a" => "apellido",  "c" => "test"));
		return $Lista;
		break;
	
	case 'Nuevo':
		# code...
		break;	

	case 'Guardar':
		# code...
		break;

	case 'Modificar':
		# code...
		break;

	case 'Eliminar':
		# code...
		break;	


	default:
		# code...
		break;
}
?>


