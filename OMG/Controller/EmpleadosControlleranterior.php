<?php
//este controlador solo atiende un requerimiento
//el requerimiento que atiende es el de inicio de sesion
session_start();
require_once '../Model/EmpleadoModel.php';
require_once '../util/Session.php';



$Op=$_REQUEST["Op"];
$model=new EmpleadoModel();
$pojo= new EmpleadoPojo();

switch ($Op) {
	case 'Listar':

		$Lista=$model->listarEmpleados();
    	Session::setSesion("listarEmpleados",$Lista);
//    	$tarjet="../view/principalmodulos.php";
//    	header('Content-type: application/json; charset=utf-8');
//    	
        $filas=array();
    	foreach ($Lista as $filas) {
            
        }
        echo ""+json_encode(array($filas["ID_EMPLEADO"]));
//		echo json_encode(array("data" => $Lista));
		//header("location: login.php");
// $array = array("foo", "bar", "hello", "world");
 
 
//        echo ""+var_dump($array);
//        
//                echo $json = json_encode(array("data"=>$Lista));
     
// echo $json = json_encode(array("data"=>$array));
 
//echo $json = json_encode(array("ID_EMPLEADO" => "".$Lista.NOMBRE_EMPLEADO, "a" => "apellido",  "c" => "test"));
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
//                  $pojo->setNombreEmpleado($_REQUEST['Nombre']);
//                  $pojo->setApellidoPaterno($_REQUEST['Apellido_Paterno']);
//                  $pojo->setCategoria($_REQUEST['Apellido_Materno']);
                  $pojo->setIdEmpleado($_REQUEST['Id_Empleado']);
                  $pojo->setCorreo($_REQUEST['Correo']);
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











/*
try {

    //datos
    $usuario=$_REQUEST["usuario"];
    $clave=$_REQUEST["pass"];
   
    //proceso
    $model=new LoginModel();
    $recUser=$model->validar($usuario,$clave);
//    echo "dato";
    Session::setSesion("user",$recUser);
    
    $jsondata['success']=true;
    $jsondata['message']='Correcto';
    //para redireccionar se guarda en una variable el link
//    $target="../View/main.php";

}  catch (Exception $e){
    Session::setSesion("error",$e->getMessage());
    Session::setSesion("usuario", $usuario);
//    $target="../View/panelprincipal.php";
//     $target="../View/main.php";
   
    $jsondata['success']=false;
    $jsondata['message']='Incorrecto';
}
header('Content-type: application/json; charset=utf-8');
echo json_encode($jsondata);
//header("location: $target");
*/


?>


