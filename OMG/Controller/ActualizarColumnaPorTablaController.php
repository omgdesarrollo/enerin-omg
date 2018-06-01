<?php
session_start();
require '../Model/ActualizarColumnaPorTablaModel.php';


$Op=$_REQUEST["Op"];
$model=new ActualizarColumnaPorTablaModel();


switch ($Op){
    
    case 'modificarColumna':
        
        $model->actualizarPorColumna($_REQUEST["TABLA"],$_REQUEST["COLUMNA"],$_REQUEST["VALOR"],$_REQUEST["ID"]);
        
        break;
    
}
?>