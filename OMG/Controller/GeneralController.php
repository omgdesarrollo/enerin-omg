<?php
session_start();
require '../Model/GeneralModel.php';


$Op=$_REQUEST["Op"];
$model=new GeneralModel();


switch ($Op){
    
    case 'ModificarColumna':
        
        $model->actualizarPorColumna($_REQUEST["TABLA"],$_REQUEST["COLUMNA"],$_REQUEST["VALOR"],$_REQUEST["ID"]);
        
        break;
    
}
?>