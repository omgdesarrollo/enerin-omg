<?php

//este controlador solo atiende un requerimiento
//el requerimiento que atiende es el de inicio de sesion
session_start();
require_once '../Model/TemaModel.php';
require_once '../Pojo/TemaPojo.php';
require_once '../dao/AsignacionTemaRequisitoDAO.php';
require_once '../util/Session.php';



$Op=$_REQUEST["Op"];
$model=new TemaModel();
$pojo= new TemaPojo();
$daoAsignacionTemaRequisito= new AsignacionTemaRequisitoDAO();
switch ($Op) {
	case 'Listar':
            $Lista=$model->mostrarTemas("catalogo", Session::getSesion("s_cont"));
            foreach($Lista as $value){  
//                echo json_encode( $value);
                $existeTemasAndSubtema=$daoAsignacionTemaRequisito->verificarSiExistenTemasSubtemasandEnTemaRequisito(array("id_tema_and_subtema"=>$value[0]));
                  if($existeTemasAndSubtema[0]["cantidad"]==0){
                       $daoAsignacionTemaRequisito->insertarTemasSubtemasSiNoExitenEnTemaRequisito(array("id_tema_and_sub"=>$value[0]));
                  }
            }
            
            header('Content-type: application/json; charset=utf-8'); 
            echo json_encode($Lista);
            return $Lista;
         break;
	case 'ListarHijos':
            
            $Lista= $model->listarHijos("catalogo", Session::getSesion("s_cont"), $_REQUEST['ID']);
            header('Content-type: application/json; charset=utf-8'); 
            echo json_encode($Lista);
            return $Lista;
            
	break;
	case 'GuardarNodo':
		# code...
//                $json = json_decode($_POST['json']);//linea donde convierte el json string a objeto  proxima mejora
                $Lista= $model->insertarNodo($_REQUEST['NO'],$_REQUEST['NOMBRE'],$_REQUEST['DESCRIPCION'],$_REQUEST['PLAZO'],$_REQUEST['NODO'],$_REQUEST['ID_EMPLEADOMODAL'],"catalogo", Session::getSesion("s_cont"));
                header('Content-type: application/json; charset=utf-8'); 
                echo json_encode($Lista);
//                echo "con se ". Session::getSesion("s_cont");
                return $Lista;
                
		break;

	case 'Modificar':
		# code...
            $model->actualizarPorColumna($_REQUEST["column"],$_REQUEST["editval"],$_REQUEST["id"] );
		break;

	case 'Eliminar':
		# code...
            $Lista= $model->eliminarNodo($_REQUEST['ID']);
            header('Content-type: application/json; charset=utf-8'); 
            echo json_encode($Lista);
            return $Lista;
            
		break;	


	default:
		# code...
		break;
}
?>


