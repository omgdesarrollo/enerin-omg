<?php

session_start();
require_once '../Model/ArchivoUploadModel.php';
require_once '../util/Session.php';

$urls = Session::getSesion("archivos_urls");
$total = Session::getSesion("archivos_urls_contador");
$Op=$_REQUEST["Op"];

$model=new ArchivoUploadModel();

switch ($Op) {
	case 'Guardar':
		// echo $urls;
		// foreach($urls as $url)
		// {
		// 	echo $url;
		// }
		echo "total de registros: ".$total;
		$model->insertar_archivos($_REQUEST['ID_DOCUMENTO'],$urls);
		// $newArray = array();
		Session::setSesion("archivos_urls",null);
		
		// header('Content-type: application/json; charset=utf-8');
		// echo json_encode( $Lista);
		
		// return $Lista;
		break;
	
	default: break;
}
?>