<?php
//este controlador solo atiende un requerimiento
//el requerimiento que atiende es el de inicio de sesion
session_start();
require_once '../Model/EntidadReguladoraModel.php';
require_once '../Pojo/EntidadReguladoraPojo.php';
require_once '../util/Session.php';



$Op=$_REQUEST["Op"];
$model=new EntidadReguladoraModel();
$pojo= new EntidadReguladoraPojo();

switch ($Op) {
	case 'Listar':

		$Lista=$model->listarEntidadesReguladoras();
    	Session::setSesion("listarEntidadesReguladoras",$Lista);
//    	$tarjet="../view/principalmodulos.php";
        header('Content-type: application/json; charset=utf-8');
//		echo json_encode($Lista);
                echo json_encode(array("data"=>$Lista));        
		//header("location: login.php");
//echo $json = json_encode(array("n" => "".$Lista.NOMBRE_EMPLEADO, "a" => "apellido",  "c" => "test"));
		return $Lista;
		break;
            
            
        case 'mostrarcombo':
		$Lista=$model->listarEntidadesReguladorasComboBox();
    	Session::setSesion("listarEntidadesReguladorasComboBox",$Lista);
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
            
                  $pojo->setClaveEntidad($_REQUEST['CLAVE_ENTIDAD']);
                  $pojo->setDescripcion($_REQUEST['DESCRIPCION']);
                  $pojo->setDireccion($_REQUEST['DIRECCION']);
                  $pojo->setTelefono($_REQUEST['TELEFONO']);
                  $pojo->setExtension($_REQUEST['EXTENSION']);
                  $pojo->setEmail($_REQUEST['EMAIL']);
                  $pojo->setDireccionWeb($_REQUEST['DIRECCION_WEB']);
                  
                  $model->insertar($pojo);
                        
		break;

	case 'Modificar':
		# code...
                /*
                  $pojo->setIdEntidad($_REQUEST['ID_ENTIDAD']);
                  $pojo->setClaveEntidad($_REQUEST['CLAVE_ENTIDAD']);
                  $pojo->setDescripcion($_REQUEST['DESCRIPCION']);
                  $pojo->setDireccion($_REQUEST['DIRECCION']);
                  $pojo->setTelefono($_REQUEST['TELEFONO']);
                  $pojo->setExtension($_REQUEST['EXTENSION']);
                  $pojo->setEmail($_REQUEST['EMAIL']);
                  $pojo->setDireccionWeb($_REQUEST['DIRECCION_WEB']);                  
                  $model->actualizar($pojo);
                 * 
                 */
//                  $msg=$exito['mensaje'];
//                  if($exito['Error']==0){
//                      header('Content-type: application/json; charset=utf-8');
//                      echo json_encode(array("data" => $msg));
//                  }
                                  
        $model->actualizarPorColumna($_REQUEST["column"],$_REQUEST["editval"],$_REQUEST["id"] ); 
	
                break;

	case 'Eliminar':
		# code...
		break;	
	default:
		# code...
		break;
}

?>
