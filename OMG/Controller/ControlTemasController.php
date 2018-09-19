<?php
session_start();
require_once '../Model/ControlTemasModel.php';
require_once '../util/Session.php';

$Op=$_REQUEST['Op'];
$model=new ControlTemasModel();

switch ($Op) {
    case 'Listar':
        break;

    
    default:
        break;
}

?>
