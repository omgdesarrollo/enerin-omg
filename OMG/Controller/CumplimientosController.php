<?php
//este controlador solo atiende un requerimiento
//el requerimiento que atiende es el de inicio de sesion
session_start();
require_once '../Model/CumplimientoModel.php';
require_once '../Pojo/CumplimientoPojo.php';
require_once '../Pojo/UsuarioPojo.php';
require_once '../util/Session.php';



$Op=$_REQUEST["Op"];
@$operacionarealizar=$_REQUEST["TipoOperacion"];
$model=new CumplimientoModel();
$cumplimientoPojo= new CumplimientoPojo();
$usuarioPojo= new UsuarioPojo();

switch ($Op) {
	case 'Listar':
		$lista = $model->listarCumplimientos($_REQUEST["ID_USUARIO"]);
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($lista);
		break;
                
                
        case 'mostrarcombo':
		$Lista=$model->listarCumplimientosComboBox();
    	Session::setSesion("listarCumplimientosComboBox",$Lista);
    	header('Content-type: application/json; charset=utf-8');
		echo json_encode($Lista);
		return $Lista;
		break;        
                
	case 'obtenerContrato':
            
		$Lista=$model->obtenerContratosPorUsuarioPermiso(Session::getSesion("user")["ID_USUARIO"]);
                $data;
                $cont=0;
//                foreach($Lista as $value){
//                    $data[$cont]["list"]=$value["id_cumplimiento"];
////                    $data[$cont]["list"]=$value["clave_cumplimiento"];
//                $cont++;
//                }
                header('Content-type: application/json; charset=utf-8');
                
//                echo json_encode($data);
                echo json_encode($Lista);
//      echo "d  ".   Session::getSesion("s_cont");
//		return $Lista;
            
		break;	
         
	case 'Guardar':
		# code...
		break;
        case 'contratoselec':
//            if($_REQUEST["obt"]=="false"){
//               if(isset(Session::getSesion("s_cont")))
//               {
//                  echo  Session::getSesion("s_cont");
//               }else
//               {
//                   echo "no";
//               }
//            }
//            else{if()
            if($_REQUEST["obt"]==false)
            Session::setSesion("s_cont", $_REQUEST["c"]);
            else{
              echo   Session::getSesion ("s_cont");
            }
//            }
        break;

	case 'Modificar':
		# code...
                  $pojo->setIdCumplimiento($_REQUEST['id_cumplimiento']);
                  $pojo->setClaveCumplimiento($_REQUEST['clave_cumplimiento']);
                  $pojo->setCumplimiento($_REQUEST['cumplimiento']);
                  $model->actualizar($pojo);
//                  $msg=$exito['mensaje'];
//                  if($exito['Error']==0){
//                      header('Content-type: application/json; charset=utf-8');
//                      echo json_encode(array("data" => $msg));
//                  }
	break;

	case 'Eliminar':
		# code...
		break;	
	default:
		# code...
		break;
}

?>


