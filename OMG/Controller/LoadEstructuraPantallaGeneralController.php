<?php
session_start();
require_once '../Pojo/UsuarioPojo.php';
require_once '../util/Session.php';
$Op=$_REQUEST["Op"];

switch ($Op) {
	case 'Listar':
                $lista= Session::getSesion("userAcceso");
                header('Content-type: application/json; charset=utf-8');
                echo json_encode($lista);
                break;
                default:
		# code...
		break;
}
?>


