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

$modelGantt=new GanttModel();
$pojo=new GanttPojo();

$modelGantt= new GanttModel();

switch ($Op) {
       
	case 'ListarEmpleados':

	$Lista=$model->listarEmpleados();
    	Session::setSesion("listarEmpleados",$Lista);
//    	$tarjet="../view/principalmodulos.php";
    	header('Content-type: application/json; charset=utf-8');
	echo json_encode($Lista);
        
                
                
		break;
            
            
        case'obtenerFolioEntradaSeguimiento':
            
            $Lista=$modelGantt->obtenerFolioEntradaSeguimiento($_REQUEST['ID_SEGUIMIENTO']);
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($Lista);
            break;
    	
        case 'MostrarTareasCompletasPorFolioDeEntrada':   
            $Lista=$modelGantt->obtenerTareasCompletasPorFolioEntrada(Session::getSesion("dataGantt"));
            header('Content-type: application/json; charset=utf-8');
            echo json_encode(array("data"=>$Lista));
//        Session::setSesion("", $value)
            
                break;
    
    
	case 'Nuevo':
		# code...
		break;	

	case 'Guardar':
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
            echo " g";
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
                        $modelGantt->insertarTareasGantt($arrayTransformado,Session::getSesion("dataGantt"));
                        $value["id_seguimiento"]=Session::getSesion("dataGantt");
                        $resultAvanceProgramaGeneral=$modelGantt->calculoAvanceProgramaGeneral($value)[0]["total_avance_programa"];
                        
                       
//                        $modelGantt->calculoSumaParents($value);
//                        echo "f  ".json_encode($resultAvanceProgramaGeneral);
                        $value["avance_programa"]=$resultAvanceProgramaGeneral;
                        $modelGantt->updateAvanceProgramaGeneral($value);
//                        var_dump($resExito);
//                        echo "d   ".json_encode($res);
			header('Content-type: application/json; charset=utf-8');
                        echo json_encode($arrayTransformado);
			// foreach($valores as $key=>$value)
			// {
			// 	echo "\n".$key." : ".$value;
			// 	$arrayTransformado;
			// }
            
            
            
            
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


