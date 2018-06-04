<?php

session_start();
require_once '../Model/NotificacionesModel.php';
require_once '../dao/ValidacionDocumentoDAO.php';
require_once '../Model/ValidacionDocumentoModel.php';

require_once '../util/Session.php';



$Op=$_REQUEST["Op"];
$model=new NotificacionesModel();

$modelValidacionDocumentos= new ValidacionDocumentoModel();
switch ($Op) {
	
            
        case 'enviarNotificacionDesviacionAResponsableContrato':
//            echo 'entraste aqui ';
            
            $lista=Session::getSesion("user");
            
            $columna=$_REQUEST["columna"];
            $chekeado=$_REQUEST["checkeado"];
            
            $id_validacion_documento=$_REQUEST["id_validacion_documento"];
            
            // datos de la sesion 
            $dataUsuarioEmpleado=$lista["usuariosyempleados_id_usuario_empleados"];
            //termina datos de la session 
            
            $listaInfValidacionDocumento=$modelValidacionDocumentos->obtenerInfoPorIdValidacionDocumento($id_validacion_documento);
 
          $resultadoInserccion= $model->enviaraResponsableCumplimiento_sobre_desviacion_mayor($dataUsuarioEmpleado,"Atender Desviacion Mayor de una validacion documento",0,'false','admin');
            echo "res:  ".$resultadoInserccion;
//            echo "trajo de usuario : ".$dataUsuarioEmpleado;
            echo "mi usuario es :".json_encode($lista); 
       
//              $cadenaclausula=$_REQUEST["check"];  
//               	header('Content-type: application/json; charset=utf-8');
//                echo json_encode($data);
            
        break;    
            
        case "mostrarNotificaciones->Responsable":
            $lista=$model->mostrarNotificacionesCompletas();
            Session::setSesion("notificacionescompletas",$lista);
            echo 'er   '. json_encode($lista);
//            Session::setSesion("notify", $);
            
        break;

            
	default:
		# code...
	break;
}

?>

