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
            $usuario=Session::getSesion("user");
            $id_para = $_REQUEST["PARA"];
            $mensaje = $_REQUEST["MENSAJE"];
            $atendido = $_REQUEST["ATENDIDO"];//si es leido o no
            $tipo = $_REQUEST["TIPO_MENSAJE"];//0->info, 1->alert, 2->error
            $asunto = $_REQUEST["ASUNTO"];
            // $estado = $_REQUEST["ESTADO"];//
        //     $columna=$_REQUEST["columna"];
            
            // $id_validacion_documento=$_REQUEST["id_validacion_documento"];
            // datos de la sesion 
        //     echo $lista;
            $id_usuario=$usuario["ID_USUARIO"];
            //termina datos de la session 
            // $listaInfValidacionDocumento=$modelValidacionDocumentos->obtenerInfoPorIdValidacionDocumento($id_validacion_documento);
            $resultado=$model->guardarNotificacionHibry($id_usuario,$id_para,$mensaje,$tipo,$atendido,$asunto);

            echo $resultado;
//            echo "trajo de usuario : ".$dataUsuarioEmpleado;
            // echo "mi usuario es :".json_encode($lista); 
       
//              $cadenaclausula=$_REQUEST["check"];  
//               	header('Content-type: application/json; charset=utf-8');
//                echo json_encode($data);
            
        break;    
            
        case "mostrarNotificaciones->Responsable":
            $USUARIO = Session::getSesion("user");
            $lista=$model->mostrarNotificacionesCompletas($USUARIO["ID_USUARIO"]);
            Session::setSesion("notificacionescompletas",$lista);
            echo 'er   '. json_encode($lista);
//            Session::setSesion("notify", $);
            
        break;

        case 'EliminarNotificacion':
            $eliminado = $model->eliminarNotificacion($_REQUEST["ID_NOTIFICACION"]);
            echo $eliminado;
            
	default:
		echo false;
	break;
}

?>

