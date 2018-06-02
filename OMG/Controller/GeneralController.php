<?php
session_start();
require '../Model/GeneralModel.php';


$Op=$_REQUEST["Op"];
$model=new GeneralModel();


switch ($Op)
{
    
    case 'ModificarColumna':

    $resultado = $model->actualizarPorColumna($_REQUEST["TABLA"],$_REQUEST["COLUMNA"],$_REQUEST["VALOR"],$_REQUEST["ID"],$_REQUEST["ID_CONTEXTO"]);
    echo $resultado;
    break;
    
    default: echo false;
    break;
}
?>