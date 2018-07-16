<?php
//este controlador solo atiende un requerimiento
//el requerimiento que atiende es el de inicio de sesion
session_start();
require_once '../Model/ClausulaModel.php';
require_once '../Pojo/ClausulaPojo.php';
require_once '../util/Session.php';



$Op=$_REQUEST["Op"];
$model=new ClausulaModel();
$pojo= new ClausulaPojo();

switch ($Op) {
	case 'Listar':

		$Lista=$model->listarClausulas();
    	        Session::setSesion("listarClausulas",$Lista);
//    	$tarjet="../view/principalmodulos.php";
                
                header('Content-type: application/json; charset=utf-8');
//               echo json_encode(array("data" => $Lista));
                echo json_encode($Lista);
                
                
                
		//header("location: login.php");
//echo $json = json_encode(array("n" => "".$Lista.NOMBRE_EMPLEADO, "a" => "apellido",  "c" => "test"));
		// return $Lista;
		break;


	case 'mostrarcombo':
		$Lista=$model->listarClausulasComboBox();
    	Session::setSesion("listarClausulasComboBox",$Lista);
    	header('Content-type: application/json; charset=utf-8');
                echo json_encode($Lista);

		return $Lista;
		break;	
	

	case 'Nuevo':
		# code...
		break;	

	case 'Guardar':
                  
		# code...
         
                $pojo->setClausula($_REQUEST['CLAUSULA']);
                $pojo->setSubClausula($_REQUEST['SUB_CLAUSULA']);
                $pojo->setDescripcionClausula($_REQUEST['DESCRIPCION_CLAUSULA']);
                $pojo->setDescripcionSubClausula($_REQUEST['DESCRIPCION_SUB_CLAUSULA']);
                $pojo->setDescripcion($_REQUEST['DESCRIPCION']);
                $pojo->setPlazo($_REQUEST['PLAZO']);
                $pojo->setIdEmpleado($_REQUEST['ID_EMPLEADO']);
            

                $model->insertar($pojo);
		break;

	case 'Modificar':
		# code...

            $model->actualizarPorColumna($_REQUEST["column"],$_REQUEST["editval"],$_REQUEST["id"] );
            
                break;

            
        case 'loadAutoComplete':
            
              $cadenaclausula=$_REQUEST["cadenaclausula"];  
              $data= $model->loadAutoComplete($cadenaclausula);
               	header('Content-type: application/json; charset=utf-8');
                echo json_encode($data);
            
        break;    
            
            
	case 'Eliminar':
		# code...
		break;	
            
            
            
	default:
		# code...
		break;
}

?>
