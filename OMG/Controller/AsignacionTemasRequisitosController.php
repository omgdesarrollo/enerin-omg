<?php
//este controlador solo atiende un requerimiento
//el requerimiento que atiende es el de inicio de sesion
session_start();
require_once '../Model/AsignacionTemaRequisitoModel.php';
require_once '../Pojo/AsignacionTemaRequisitoPojo.php';
require_once '../util/Session.php';



$Op=$_REQUEST["Op"];
$model=new AsignacionTemaRequisitoModel();
$pojo= new AsignacionTemaRequisitoPojo();

switch ($Op) {
	case 'Listar':

	$Lista=$model->listarAsignacionTemasRequisitos("catalogo", Session::getSesion("s_cont"));
    	// Session::setSesion("listarAsignacionTemasRequisitos",$Lista);
//    	$tarjet="../view/principalmodulos.php";
                
        header('Content-type: application/json; charset=utf-8');
//               echo json_encode(array("data" => $Lista)); 
		echo json_encode($Lista);           
		//header("location: login.php");
//echo $json = json_encode(array("n" => "".$Lista.NOMBRE_EMPLEADO, "a" => "apellido",  "c" => "test"));
		// return $Lista;
		break;
            
        
        case 'mostrarcombo':
		$Lista=$model->listarAsignacionTemasRequisitosComboBox();
    	Session::setSesion("listarAsignacionTemasRequisitosComboBox",$Lista);
//    	$tarjet="../view/principalmodulos.php";
    	header('Content-type: application/json; charset=utf-8');
//		echo json_encode($Lista);
                echo json_encode($Lista);
//	$filas=array();	
//        foreach ($Lista as $filas)
//            //$sentencia="SELECT * FROM empleados";
//            //$resultado=mysql_query($sentencia);
//            //while($filas=mysql_fetch_assoc($resultado))
//              
//            {
//            echo json_encode($filas['ID_EMPLEADO']);	
//            }
		//header("location: login.php");
//echo $json = json_encode(array("n" => "".$Lista.NOMBRE_EMPLEADO, "a" => "apellido",  "c" => "test"));
		return $Lista;
		break;    
            
	
	case 'Nuevo':
		# code...
		break;	

	case 'Guardar':
                  
		# code...
            
                $pojo->setId_clausula($_REQUEST['ID_CLAUSULA']);
                $pojo->setRequisito($_REQUEST['REQUISITO']);
                $pojo->setId_Documento($_REQUEST['ID_DOCUMENTO']);
                
            

                $model->insertar($pojo);    
		break;
            
        case'GuardarNodo':
            $Lista= $model->insertarRequisitos($_REQUEST['ID_ASIGNACION_TEMA_REQUISITO'],$_REQUEST['REQUISITO'],$_REQUEST['PENALIZACION']);
            header('Content-type: application/json; charset=utf-8'); 
            echo json_encode($Lista);
            return $Lista;
            break;
        
        case'GuardarSubNodo':
            $Lista= $model->insertarRegistros($_REQUEST['ID_REQUISITO'],$_REQUEST['REGISTRO'],$_REQUEST['FRECUENCIA'], $_REQUEST['ID_DOCUMENTO']);
            header('Content-type: application/json; charset=utf-8'); 
            echo json_encode($Lista);
            
            return $Lista;
            
            break;
        case 'detalles':
           $id= $_REQUEST["id"];
           $tipo=$_REQUEST["tipo"];
//           if($tipo=="reg" ){
//               echo "entro en reg";
                
               $lista=$model->obtenerDetallesHidrid($id,$tipo);
//               echo "d";
//           }
//           else{
//               if($tipo=="req"){
//                   echo "entro en req";
                  
//               }
//           }
        break;

	case 'Modificar':
		# code...

            $model->actualizarPorColumna($_REQUEST["column"],$_REQUEST["editval"],$_REQUEST["id"] );

                break;

	case 'EliminarRegistro':
		# code...
            
            $Lista= $model->eliminarNodoRegistro($_REQUEST['ID_REGISTRO']);
//            header('Content-type: application/json; charset=utf-8'); 
            echo $Lista;
		break;
            
        case 'EliminarRequisito':
		# code...
            
            $Lista= $model->eliminarNodoRequisito($_REQUEST['ID_REQUISITO']);
            echo $Lista;
		break;    
            
	default:
		# code...
		break;
}

?>


