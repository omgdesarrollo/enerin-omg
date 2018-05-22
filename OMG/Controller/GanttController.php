<?php
//este controlador solo atiende un requerimiento
//el requerimiento que atiende es el de inicio de sesion
session_start();
require_once '../Model/EmpleadoModel.php';
require_once '../Pojo/EmpleadoPojo.php';
require_once '../Model/GanttModel.php';



require_once '../util/Session.php';



$Op=$_REQUEST["Op"];
$model=new EmpleadoModel();
$pojo= new EmpleadoPojo();

$modelGantt= new GanttModel();

switch ($Op) {
       
	case 'ListarEmpleados':

	$Lista=$model->listarEmpleados();
    	Session::setSesion("listarEmpleados",$Lista);
//    	$tarjet="../view/principalmodulos.php";
    	header('Content-type: application/json; charset=utf-8');
		echo json_encode($Lista);
                
		break;
    	
        case "MostrarTareasCompletasPorFolioDeEntrada":
        $Lista=$modelGantt->obtenerTareasCompletasPorFolioEntrada("123");
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($Lista);
//        Session::setSesion("", $value)
            
        break;
    
	case 'Nuevo':
		# code...
		break;	

	case 'Guardar':
               
 
		# code...
		break;

	case 'Modificar':
	
	break;

	case 'Eliminar':
		# code...
		break;	
	default:
		# code...
		break;
}


?>


