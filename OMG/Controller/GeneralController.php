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

    case 'ListarEvidencia'
    $resultado = $model->listarEvidencia($_REQUEST['ID_EVIDENCIA']);
    echo $resulto;
    default: echo false;
    break;
}
?>