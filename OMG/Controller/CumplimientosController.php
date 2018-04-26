<?php
//este controlador solo atiende un requerimiento
//el requerimiento que atiende es el de inicio de sesion
session_start();
require_once '../Model/CumplimientoModel.php';
require_once '../Pojo/CumplimientoPojo.php';
require_once '../Pojo/UsuarioPojo.php';
require_once '../util/Session.php';



$Op=$_REQUEST["Op"];
$operacionarealizar=$_REQUEST["TipoOperacion"];
$model=new CumplimientoModel();
$cumplimientoPojo= new CumplimientoPojo();
$usuarioPojo= new UsuarioPojo();

switch ($Op) {
	case 'Listar':
//                $porcampo
            if($operacionarealizar=="ListarContratosPorUsuario"){              
//                $Lista=$model->listarCumplimientos();
                $usuarioPojo->setNombreUsuario($_REQUEST["usuario"]);
                $Lista=$model->listarCumplimientosPorUsuario($usuarioPojo);
                Session::setSesion("ListarContratosPorUsuario",$Lista);
               // $pojo->($_REQUEST['id_cumplimiento']);
        //    	$tarjet="../view/principalmodulos.php";
                header('Content-type: application/json; charset=utf-8');
                echo json_encode($Lista);
		//header("location: login.php");
//echo $json = json_encode(array("n" => "".$Lista.NOMBRE_EMPLEADO, "a" => "apellido",  "c" => "test")); 
            }
		return $Lista;
                break;
                
                
        case 'mostrarcombo':
		$Lista=$model->listarCumplimientosComboBox();
    	Session::setSesion("listarCumplimientosComboBox",$Lista);
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
		break;

	case 'Modificar':
		# code...
                  $pojo->setIdCumplimiento($_REQUEST['id_cumplimiento']);
                  $pojo->setClaveCumplimiento($_REQUEST['clave_cumplimiento']);
                  $pojo->setCumplimiento($_REQUEST['cumplimiento']);
                  $model->actualizar($pojo);
//                  $msg=$exito['mensaje'];
//                  if($exito['Error']==0){
//                      header('Content-type: application/json; charset=utf-8');
//                      echo json_encode(array("data" => $msg));
//                  }
	break;

	case 'Eliminar':
		# code...
		break;	
	default:
		# code...
		break;
}

?>


