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

        $Lista=$model->listarDocumentos(Session::getSesion("s_cont"));         
//    	Session::setSesion("listarDocumentos",$Lista);

        header('Content-type: application/json; charset=utf-8');
        echo json_encode($Lista);
        return $Lista;
                
		break;
            
        case 'mostrarcombo':
		$Lista=$model->listarDocumentosComboBox();
//    	Session::setSesion("listarDocumentosComboBox",$Lista);
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
            $contrato= Session::getSesion("s_cont");
//            echo "el contra:   ".$contrato."     |";
            $model->insertar($pojo,$contrato);
//            echo Session::getSesion("s_cont");
            
		break;

	case 'Modificar':
		# code...
            echo "el val es g de  "+ $_REQUEST['editval'];
//            htmlspecialchars($_REQUEST['editval']);
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
            header('Content-type: application/json; charset=utf-8'); 
            $ID_DOCUMENTO = json_decode($_REQUEST['ID'],true);
            $Lista= $model->eliminarDocumento($ID_DOCUMENTO['id_documento']);
            echo json_encode($Lista);

            return $Lista;
		break;	


	default:
		# code...
		break;
}
?>


