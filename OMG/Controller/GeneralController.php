<?php
session_start();
require '../Model/GeneralModel.php';


$Op=$_REQUEST["Op"];
$model=new GeneralModel();


switch ($Op)
{
    
    case 'ModificarColumna':

    echo $model->actualizarPorColumna($_REQUEST["TABLA"],$_REQUEST["COLUMNA"],$_REQUEST["VALOR"],$_REQUEST["ID"],$_REQUEST["ID_CONTEXTO"]);
    break;

    default: echo false;
    break;
}
?>