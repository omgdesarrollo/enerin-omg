<?php
//este controlador solo atiende un requerimiento
//el requerimiento que atiende es el de inicio de sesion
session_start();
require_once '../Model/EmpleadoModel.php';
require_once '../Pojo/EmpleadoPojo.php';
require_once '../Model/GanttEvidenciaModel.php';
require_once '../util/Session.php';

$Op=$_REQUEST["Op"];
$model=new EmpleadoModel();
$modelGantt= new GanttEvidenciaModel();

switch ($Op) {
       
	case 'ListarEmpleados':

	$Lista=$model->listarEmpleados("");
//    	Session::setSesion("listarEmpleadosEvid",$Lista);
//    	$tarjet="../view/principalmodulos.php";
    	header('Content-type: application/json; charset=utf-8');
	echo json_encode($Lista);
        
        break;
            
            
//        case'obtenerFolioEntradaSeguimiento':
//            
//            $Lista=$modelGantt->obtenerFolioEntradaSeguimiento($_REQUEST['ID_SEGUIMIENTO']);
//            header('Content-type: application/json; charset=utf-8');
//            echo json_encode($Lista);
//        break;
    	
        case 'Mostrar_Plan':   
            $v["id_evidencia"]=Session::getSesion("dataGanttEvidencia");
//            $v["param"][""]="";
            $Lista=$modelGantt->obtenerT($v);
//            
//            
//            
            header('Content-type: application/json; charset=utf-8');
            echo json_encode(array("data"=>$Lista));
//        Session::setSesion("", $value)
            
        break;
        case "verificar_valid":
            
            $v["id_evidencias"]=$_REQUEST['id_evid'];
            $Lista= $modelGantt->obtenerValidacionSupervisorEvidencias($v);     
            
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($Lista);
            return $Lista;
        break;
    
	case 'Nuevo':
		# code...
	break;	

	case 'Guardar':
	break;
        case 'EliminarTarea':
//             if(isset($_REQUEST["deleteidtarea"])){
////                echo "entro ";
//                 $value["id"]=$_REQUEST["deleteidtarea"];
//                $modelGantt->deleteTareaajax ($value);
//            }else{
//                echo ":(";
//            }
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
                        
                        
//                        $modelGantt->insertarTareasGantt($arrayTransformado,Session::getSesion("dataGantt"));
                        
                        
			header('Content-type: application/json; charset=utf-8');
                        echo json_encode($arrayTransformado);
         
            
	break;
        
	case 'Eliminar':
		# code...
		break;	
                default:
		# code...
		break;
}


?>


