<?php

session_start();
require_once '../Model/EmpleadoModel.php';
require_once '../Model/Gantt_TareasModel.php';
require_once '../util/Session.php';

$Op=$_REQUEST["Op"];
$model=new EmpleadoModel();

$modelGantt=new Gantt_TareasModel();
// $pojo=new GanttPojo();

switch ($Op) {
    
        case 'ListarTodasLasTareasPorId':
            
            $Lista= $modelGantt->listarRegistrosGanttTareas(Session::getSesion("dataGantt_id_tarea"));
            
            
               header('Content-type: application/json; charset=utf-8');
            echo json_encode(array("data"=>$Lista));
            break;
    
        case 'Guardar':
//            $VALUES["id"]= Session::getSesion("dataGantt_id_tarea");
//            $VALUES["text"]= $_REQUEST['TEXT'];
//            $VALUES["start_date"]= $_REQUEST['START_DATE'];
//            $VALUES["duration"]= $_REQUEST['DURATION'];
//            $VALUES["progress"]= $_REQUEST['PROGRESS'];
//            $VALUES["parent"]= $_REQUEST['PARENT'];
//            $VALUES["user"]= $_REQUEST['USER'];
//            $VALUES["id_tarea"]= $_REQUEST['ID_TAREA'];
//            
//            $Lista= $modelGantt->listarRegistrosGanttTareas($VALUES);
//            header('Content-type: application/json; charset=utf-8');
//            echo json_encode($Lista);
            
        break;
    
        case 'Eliminar':
            $Lista= $modelGantt->eliminarGanttTareas($_REQUEST['ID_GANTT_TAREAS']);
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($Lista);
            break;
        
        
        case 'Actualizar':
            break;
        
       
	case 'ListarEmpleados'://este caso no borrarlo es para traer los difrentes empleados

	$Lista=$model->listarEmpleados("");
//     	Session::setSesion("listarEmpleados",$Lista);
//    	$tarjet="../view/principalmodulos.php";
    	header('Content-type: application/json; charset=utf-8');
	echo json_encode($Lista);

		break;
//         case'obtenerFolioEntradaSeguimiento':
            
//             $Lista=$modelGantt->obtenerFolioEntradaSeguimiento($_REQUEST['ID_SEGUIMIENTO']);
//             header('Content-type: application/json; charset=utf-8');
//             echo json_encode($Lista);
//             break;
    	
        case 'MostrarTareasCompletasPorFolioDeEntrada':   
            $Lista=$modelGantt->obtenerTareasCompletasPorFolioEntrada(Session::getSesion("dataGantt"));
            header('Content-type: application/json; charset=utf-8');
            echo json_encode(array("data"=>$Lista));
//        Session::setSesion("", $value)
                break;
	case 'Nuevo':
		# code...
		break;	

        case 'EliminarTarea':
             if(isset($_REQUEST["deleteidtarea"])){
//                echo "entro ";
                 $value["id"]=$_REQUEST["deleteidtarea"];
                $modelGantt->deleteTareaajax ($value);
            }else{
                echo ":(";
            }
        break;
	case 'Modificar':
            
           
          $editing= $_REQUEST["editing"];
          $modo_gantt=$_REQUEST["gantt_mode"];
//          $server=$_SERVER["HTTP_REFERER"];
          	$numero = count($_POST);
            $tags = array_keys($_POST);// obtiene los nombres de las varibles
            $valores = array_values($_POST);// obtiene los valores de las varibles
            echo " &$##";
			// var_dump($valores);
			$arrayTransformado;
			$listaNo=0;
			$datos=0;
			$cas=0;
			foreach($tags as $key=>$value)
			{
				$cadenaKey;
				$valueKey = explode("_",$value,2);
				$tam = sizeof($valueKey);
				// echo $valueKey;
				foreach($valueKey as $ind=>$v)
				{
					if($tam!=1)
						$cadenaKey = $valueKey[1];
					else
						$cadenaKey = $valueKey[0];
				}
				$arrayTransformado[$listaNo][$cadenaKey] = $valores[$key];
				if($cadenaKey == "!nativeeditor_status")
					$listaNo++;
			}  
                        
//                        Session::setSesion("", $value);
                        //la variable de sesion del dataGant se refiere al id de seguimiento entrada que hace 
                        //referencia al folio de entrada de documento de entrada
                        $modelGantt->insertarTareasGantt($arrayTransformado,Session::getSesion("dataGantt_id_tarea"));
                        
                        
			header('Content-type: application/json; charset=utf-8');
//                        echo json_encode($arrayTransformado);
         
            
	break;
        
        case 'EliminarTarea':
             if(isset($_REQUEST["deleteidtarea"])){
                $modelGantt->eliminarGanttTareas($_REQUEST["deleteidtarea"]);
            }else{
                echo ":(";
            }
        break;

	case 'Eliminar':
		# code...
		break;	
                default:
		# code...
		break;
}


?>


