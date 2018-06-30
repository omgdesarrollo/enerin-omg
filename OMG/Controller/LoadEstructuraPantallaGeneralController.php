<?php
//este controlador solo atiende un requerimiento
//el requerimiento que atiende es el de inicio de sesion
session_start();
require_once '../Pojo/UsuarioPojo.php';
require_once '../util/Session.php';



$Op=$_REQUEST["Op"];

switch ($Op) {
	case 'Listar':
           $lista= Session::getSesion("userAcceso");
            $resultado;
            $resultado= array($lista['id_estructura']);
            
//           $resultado; 
//           foreach($lista as $value)
//           {
//               array($value['id_estructura']);
//               $resultado;
//           }
                                                          
                header('Content-type: application/json; charset=utf-8');
                
                
                
                echo json_encode($resultado);
                break;
 
	default:
		# code...
		break;
}

?>


