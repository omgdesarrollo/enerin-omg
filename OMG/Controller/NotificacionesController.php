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
	
            
        case 'EnviarNotificacionHibry':
//            echo 'entraste aqui ';
            $lista=Session::getSesion("user");
            $para = $_REQUEST["PARA"];
            $mensaje = $_REQUEST["MENSAJE"];
            $atendido = $_REQUEST["ATENDIDO"];
            $tipoM = $_REQUEST["TIPO_MENSAJE"];
            $estado = $_REQUEST["ESTADO"];
        //     $columna=$_REQUEST["columna"];
            
        //     $id_validacion_documento=$_REQUEST["id_validacion_documento"];
            // datos de la sesion 
        //     echo $lista;
            $de=$lista["usuariosyempleados_id_usuario_empleados"];
            //termina datos de la session 
            $listaInfValidacionDocumento=$modelValidacionDocumentos->obtenerInfoPorIdValidacionDocumento($id_validacion_documento);
            $resultado=$model->enviaraResponsableCumplimiento_sobre_desviacion_mayor($de,$mensaje,$estado,$atendido,$para);

            echo "res:  ".$resultado;
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

