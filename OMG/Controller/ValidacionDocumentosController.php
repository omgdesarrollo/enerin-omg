<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
require_once '../Model/ValidacionDocumentoModel.php';
require_once '../Pojo/ValidacionDocumentoPojo.php';

require_once '../Model/AsignacionTemaRequisitoModel.php';
require_once '../Model/DocumentoModel.php';


require_once '../util/Session.php';



$Op=$_REQUEST["Op"];
$model=new ValidacionDocumentoModel();
$modelAsignacionTemaRequisito=new AsignacionTemaRequisitoModel();
$modelDocumento=new DocumentoModel();

$pojo= new ValidacionDocumentoPojo();

switch ($Op) {
	case 'Listar':

		$Lista=$model->listarValidacionDocumentos();
    	Session::setSesion("listarValidacionDocumentos",$Lista);
//    	$tarjet="../view/principalmodulos.php";
    	header('Content-type: application/json; charset=utf-8');
		echo json_encode( $Lista);
		//header("location: login.php");
//echo $json = json_encode(array("n" => "".$Lista.NOMBRE_EMPLEADO, "a" => "apellido",  "c" => "test"));
		return $Lista;
		break;
        
            
        case 'Listar1':

		$Lista=$model->listarValidacionDocumentos();
    	Session::setSesion("listarValidacionDocumentos",$Lista);
//    	$tarjet="../view/principalmodulos.php";
    	header('Content-type: application/json; charset=utf-8');
		echo json_encode( $Lista);
		//header("location: login.php");
//echo $json = json_encode(array("n" => "".$Lista.NOMBRE_EMPLEADO, "a" => "apellido",  "c" => "test"));
		return $Lista;
		break;    
 
            
            
	case 'MostrarRequisitosPorDocumento':
            
                $id_documento=$_REQUEST["ID_DOCUMENTO"];
            
		$Lista=$modelAsignacionTemaRequisito->obtenerRequisitosporDocumento($id_documento);
    	Session::setSesion("obtenerRequisitosporDocumento",$Lista);
//    	$tarjet="../view/principalmodulos.php";
        
    	header('Content-type: application/json; charset=utf-8');
		echo json_encode( $Lista);
		break;	

	
            
        case 'MostrarRegistrosPorDocumento':
                  
                $id_documento=$_REQUEST["ID_DOCUMENTO"];
                
                $lista=$modelDocumento->obtenerRegistrosPorDocumento($id_documento);
                Session::setSesion("obtenerRegistrosPorDocumento",$lista); 
                
                header('Content-type: application/json; charset=utf-8');
                echo json_encode($lista);
            
		break;
         
            
            
        case 'MostrarTemayResponsable':
                  
                $id_documento=$_REQUEST["ID_DOCUMENTO"];
            
                $lista=$modelAsignacionTemaRequisito->obtenerTemayResponsable($id_documento);
                Session::setSesion("obtenerTemayResponsable", $lista);
                        
                header('Content-type: application/json; charset=utf-8');
                echo json_encode($lista);
                        
		break;    

	case 'Modificar':

                $model->actualizarPorColumna($_REQUEST["column"],$_REQUEST["editval"],$_REQUEST["id"] );  
                  
                  
	break;

	case 'Eliminar':
		# code...
		break;
	
	case "AlmacenarArchivosServer":
		// echo "le ";
					 
//         $traerultimoinsertado=$model->traer_ultimo_insertado();
//         $cumplimiento=$model->listarCumplimientoPorId_Entrada($traerultimoinsertado);
//         $data = $model->getIdCumplimiento($traerultimoinsertado);
			$existe=false;
			$id_validacion=$_REQUEST["ID_VALIDACION"];
			if($_FILES["imagen"]["name"][0])
			{        
				$carpetaDestino = "../../archivos/filesValidacionDocumento/".$id_validacion;
				if(!file_exists($carpetaDestino))
				{
					mkdir($carpetaDestino,0777,true);
				}
			// echo "carpeta:  ".$carpetaDestino;
				for($i=0;$i<count($_FILES["imagen"]["name"]);$i++)
				{
					$origen = $_FILES["imagen"]["tmp_name"][$i];
					$destino = $carpetaDestino."/".$_FILES["imagen"]["name"][$i];
					move_uploaded_file($origen,$destino);
					$existe=file_exists($destino);
				}
			}
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($existe);
	break;
	case "ObtenerArchivos":
		$todo = array();
		$id_validacion = $_REQUEST['ID_VALIDACION'];
		// $data = $modelDocumentoEntrada->getIdCumplimiento($id_documento);
		// echo $data;
		// foreach($data as $index=>$value)
		// {
		// 	echo "\n".$index." - ".$value;
		// }
		// $lista = $model->obtener_urls($id_documento);
		$archivosNames = array();
		$existe=file_exists("C:xampp/htdocs/enerin-omg/archivos/filesValidacionDocumento/".$id_validacion);
		if($existe)
		{
			$files = scandir("C:xampp/htdocs/enerin-omg/archivos/filesValidacionDocumento/".$id_validacion);//C:\xampp\htdocs\enerin-omg\archivos\files\1\10
			foreach($files as $index=>$value)
			{
				if($index>=2)
				{
					// echo "\n".$index." - ".$value;
					$archivosNames[$index-2] = $value;
				}
			}
		}
		// echo "\n";
		// foreach($archivosNames as $index=>$value)
		// {
		// 	echo "\n".$index." - ".$value;
		// }
		// Session::setSesion("newUrl",'/'.$id_cumplimiento.'/'.$id_documento.'/');
		// Session::setSesion("getUrlsArchivos",$lista);
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($archivosNames);
	break;
	default:
		# code...
		break;
}

?>


