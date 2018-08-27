<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
require_once '../Model/SeguimientoEntradaModel.php';
require_once '../Pojo/SeguimientoEntradaPojo.php';
require_once '../util/Session.php';
//require_once '../Model/GanttModel.php';


$Op=$_REQUEST["Op"];
$model=new SeguimientoEntradaModel();
$pojo= new SeguimientoEntradaPojo();
//$modelGantt=new GanttModel();

switch ($Op) {
	case 'Listar':
//                $_REQUEST[""];
                $Lista=$model->listarSeguimientoEntradas();
//                $Lista["avanceprograma"]=$model->calculoSumaParents($value);
               Session::setSesion("listarSeguimientoEntradas",$Lista);
                
        //    	$tarjet="../view/principalmodulos.php";
                header('Content-type: application/json; charset=utf-8');
		echo json_encode( $Lista);
		//header("location: login.php");
//echo $json = json_encode(array("n" => "".$Lista.NOMBRE_EMPLEADO, "a" => "apellido",  "c" => "test"));
		return $Lista;
		break;
            
	case 'Nuevo':
		# code...
		break;	

	case 'Guardar':
                  
		# code...
		break;

	case 'Modificar':
		# code...
   					

                $model->actualizarPorColumna($_REQUEST["column"],$_REQUEST["editval"],$_REQUEST["id"] );  
                  
                  
	break;

	case 'Eliminar':
		# code...
		break;	
	default:
		# code...
		break;
}

?>


