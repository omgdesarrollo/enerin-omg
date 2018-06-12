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
    	
        case 'MostrarTareasCompletasPorFolioDeEntrada':
        $Lista=$modelGantt->obtenerTareasCompletasPorFolioEntrada("123");
            header('Content-type: application/json; charset=utf-8');
            echo json_encode(array("data"=>$Lista));
//        Session::setSesion("", $value)
            
        break;
    
    
	case 'Nuevo':
		# code...
		break;	

	case 'Guardar':
               
 
		# code...
		break;

	case 'Modificar':

            
            
          $editing= $_REQUEST["editing"];
          $modo_gantt=$_REQUEST["gantt_mode"];
//          $server=$_SERVER["HTTP_REFERER"];
          $numero = count($_POST);
            $tags = array_keys($_POST);// obtiene los nombres de las varibles
            $valores = array_values($_POST);// obtiene los valores de las varibles
//            echo "nombre variables: ".$tags;
            var_dump($tags);
            echo "valores de variables ";
            var_dump($valores);
            
            
            
            
//echo "ca:   ".$numero;
//echo "valores:  ".$valores."  ---";
            // crea las variables y les asigna el valor
//            for($i=0;$i<$numero;$i++){
//                
//           echo "d:  ". $tags[$i]=$valores[$i]."<br>";
//}

//echo "posicon :  ".$tags[35];



//          echo '<pre>';
//          
////          echo ($_POST,true);
//    echo htmlspecialchars(print_r($_POST, true));
//    echo '</pre>';
//gantt_mode: tasks
            
            
//            echo "estas en modificar  ".$editing."      mg   ".$modo_gantt."    ";
            
            
            
	break;

	case 'Eliminar':
		# code...
		break;	
	default:
		# code...
		break;
}


?>


