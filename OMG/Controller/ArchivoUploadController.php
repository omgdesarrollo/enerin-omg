<?php

session_start();
require_once '../Model/ArchivoUploadModel.php';
require_once '../Model/DocumentoEntradaModel.php';
require_once '../util/Session.php';


$Op=$_REQUEST["Op"];

$model=new ArchivoUploadModel();
$modelDocumentoEntrada= new DocumentoEntradaModel();

switch ($Op) {
	case 'Guardar':
		// echo $urls;
		// foreach($urls as $url)
		// {
		// 	echo $url;
		// }
		// $urls = Session::getSesion("archivos_urls");
		// $total = Session::getSesion("archivos_urls_contador");
		// echo "total de registros: ".$total;
		$model->insertar_archivos($_REQUEST['ID_DOCUMENTO'],$urls);
		// $newArray = array();
		// Session::setSesion("archivos_urls",null);
		
		// header('Content-type: application/json; charset=utf-8');
		// echo json_encode( $Lista);
		
		// return $Lista;
		break;
		
	case 'listarUrls':
		// $todo = array();
		$url = $_REQUEST['URL'];
		// $data = $modelDocumentoEntrada->getIdCumplimiento($id_documento);
		// echo $data;
		// foreach($data as $index=>$value)
		// {
		// 	echo "\n".$index." - ".$value;
		// }
		// $lista = $model->obtener_urls($id_documento);
		$urls = Session::getSesion("URLS");
		$files = scandir($urls["fisica"].$url);//Se forma la url fisica
		$archivosNames = array();
		foreach($files as $index=>$value)
		{
			if($index>=2)
			{
				// echo "\n".$index." - ".$value;
				$archivosNames[$index-2] = $value;
			}
		}
		// echo "\n";
		// foreach($archivosNames as $index=>$value)
		// {
		// 	echo "\n".$index." - ".$value;
		// }
		$todo[0] = $archivosNames;
		$todo[1] = $urls["logica"].$url;
		// Session::setSesion("newUrl",'/'.$id_cumplimiento.'/'.$id_documento.'/');
		// Session::setSesion("getUrlsArchivos",$lista);
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($todo);
		break;
	
	case 'eliminarArchivo':
		// $data = $model->eliminar_archivo($_REQUEST['ID_DOCUMENTO'],$_REQUEST['ARCHIVO_NAME']);
		$urlTemp = Session::getSesion("URLS");
		$url = $urlTemp["fisica"].$_REQUEST["URL"];
		$data = $model->eliminar_archivoFisico($url);
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($data);
		break;

	case 'crearUrl':
		$url = $_REQUEST["Url"];
		Session::setSesion("newUrl",$url);
		header('Content-type: application/json; charset=utf-8');
		$creado=true;
		echo json_encode($creado);
		break;

	default: break;
}
?>