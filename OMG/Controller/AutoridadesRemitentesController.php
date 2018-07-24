<?php
//este controlador solo atiende un requerimiento
//el requerimiento que atiende es el de inicio de sesion
session_start();
require_once '../Model/AutoridadRemitenteModel.php';
require_once '../Pojo/AutoridadRemitentePojo.php';
require_once '../util/Session.php';



$Op=$_REQUEST["Op"];
$model=new AutoridadRemitenteModel();
$pojo= new AutoridadRemitentePojo();

switch ($Op) {
	case 'Listar':

		$Lista=$model->listarAutoridadesRemitentes();
//    	Session::setSesion("listarAutoridadesRemitentes",$Lista);
                header('Content-type: application/json; charset=utf-8');
//                echo json_encode(array("data"=>$Lista));        
                echo json_encode($Lista);        

		return $Lista;
		break;
            
        case 'listarAutoridad':
            
                $Lista=$model->listarAutoridadRemitente($_REQUEST['ID_AUTORIDAD']);
                header('Content-type: application/json; charset=utf-8');
                echo json_encode($Lista);
            
            break;
            
            
        case 'mostrarCombo':
		$Lista=$model->listarAutoridadesRemitentesComboBox();
    	Session::setSesion("listarAutoridadesRemitentesComboBox",$Lista);
    	header('Content-type: application/json; charset=utf-8');
                echo json_encode($Lista);
                
		return $Lista;
		break;    
            
            
	
	case 'Nuevo':
		# code...
		break;	

	case 'Guardar':
                  
		# code...
            
                  $pojo->setClave_autoridad($_REQUEST['CLAVE_AUTORIDAD']);
                  $pojo->setDescripcion($_REQUEST['DESCRIPCION']);
                  $pojo->setDireccion($_REQUEST['DIRECCION']);
                  $pojo->setTelefono($_REQUEST['TELEFONO']);
                  $pojo->setExtension($_REQUEST['EXTENSION']);
                  $pojo->setEmail($_REQUEST['EMAIL']);
                  $pojo->setDireccion_web($_REQUEST['DIRECCION_WEB']);
                  
                  $model->insertar($pojo);
                        
		break;

	case 'Modificar':
		# code...
                                  
        $model->actualizarPorColumna($_REQUEST["column"],$_REQUEST["editval"],$_REQUEST["id"] ); 
	
                break;

	case 'Eliminar':
		# code...
                $Lista= $model->eliminar($_REQUEST['ID_AUTORIDAD']);
                header('Content-type: application/json; charset=utf-8'); 
                echo json_encode($Lista);
                return $Lista;
            
		break;	
	default:
		# code...
		break;
}

?>
