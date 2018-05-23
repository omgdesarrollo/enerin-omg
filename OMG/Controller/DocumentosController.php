<?php


session_start();
require_once '../Model/DocumentoModel.php';
require_once '../Pojo/DocumentoPojo.php';
require_once '../util/Session.php';



$Op=$_REQUEST["Op"];
$model=new DocumentoModel();
$pojo= new DocumentoPojo();


switch ($Op) {
	case 'Listar':

		$Lista=$model->listarDocumentos();         
    	Session::setSesion("listarDocumentos",$Lista);
//    	$tarjet="../view/principalmodulos.php";
    	
//		echo json_encode(array("data" => $Lista));
//		header("location: login.php");
        header('Content-type: application/json; charset=utf-8');
                echo json_encode($Lista);
//        echo json_encode(array("data" => $Lista));
//echo $json = json_encode(array("n" => "".$Lista.NOMBRE_EMPLEADO, "a" => "apellido",  "c" => "test"));
//		return $Lista;
		break;
            
        case 'mostrarcombo':
		$Lista=$model->listarDocumentosComboBox();
    	Session::setSesion("listarDocumentosComboBox",$Lista);
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
            $pojo->setClave_documento($_REQUEST['CLAVE_DOCUMENTO']);
            $pojo->setDocumento($_REQUEST['DOCUMENTO']);
            $pojo->setId_empleado($_REQUEST['ID_EMPLEADO']);
            $pojo->setRegistros($_REQUEST['REGISTROS']);
            $model->insertar($pojo);
            
            
		break;

	case 'Modificar':
		# code...
        $model->actualizarPorColumna($_REQUEST["column"],$_REQUEST["editval"],$_REQUEST["id"] );    
		break;
            
        
        case 'verificacionexisteregistro':
            
              $registro=$_REQUEST["registro"];
              $cualverificar=$_REQUEST["cualverificar"];
              
              $data= $model->verificacionExisteClaveandDocumento($registro,$cualverificar);
              
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


