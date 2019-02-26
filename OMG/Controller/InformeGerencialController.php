<?php

session_start();
require_once '../Model/InformeGerencialModel.php';
require_once '../Pojo/InformeGerencialPojo.php';
require_once '../util/Session.php';

$Op=$_REQUEST["Op"];
$model=new InformeGerencialModel();
$pojo= new InformeGerencialPojo();

switch ($Op)
{
	case 'Listar':
		$Lista=$model->listarInformeGerencial();
		Session::setSesion("listarInformeGerencial",$Lista);
		header('Content-type: application/json; charset=utf-8');
		echo json_encode( $Lista);        
	break;

	default:
		# code...
	break;
}

?>


