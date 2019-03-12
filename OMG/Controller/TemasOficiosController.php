<?php

//este controlador solo atiende un requerimiento
//el requerimiento que atiende es el de inicio de sesion
session_start();
require_once '../Model/TemaModel.php';
require_once '../Pojo/TemaPojo.php';
require_once '../util/Session.php';



$Op=$_REQUEST["Op"];
$model=new TemaModel();
$pojo= new TemaPojo();

switch ($Op) {
	case 'Listar':
            $Lista=$model->mostrarTemas("oficios", Session::getSesion("s_cont"));                  
            header('Content-type: application/json; charset=utf-8'); 
            echo json_encode($Lista);
            return $Lista;
    break;
     
    //  lista temas pertenecientes a oficios
    case 'mostrarCombo':
            $Lista=$model->listarTemasComboBox("oficios", Session::getSesion("s_cont"));
            // Session::setSesion("listarTemasComboBox",$Lista);
            header('Content-type: application/json; charset=utf-8'); 
            echo json_encode($Lista);
            return $Lista;
    break;
	
	case 'ListarHijos':
            
            $Lista= $model->listarHijos("oficios", Session::getSesion("s_cont"), $_REQUEST['ID']);
            header('Content-type: application/json; charset=utf-8'); 
            echo json_encode($Lista);
            return $Lista;
            
		break;
            
        case'ListarDetalles':
            
            $Lista= $model->listarDetallesSeleccionados($_REQUEST['ID_TEMA']);
            header('Content-type: application/json; charset=utf-8'); 
            echo json_encode($Lista);
            return $Lista;
            
            break;
        

	case 'GuardarNodo':
		# code...
                header('Content-type: application/json; charset=utf-8'); 
                $ES_TEMA_OR_SUBTEMA="";
                $Lista;
               $DATOS_GENERALES=array("padre_general"=>"NO EXISTE","reponsable_general"=>"NO EXISTE");
                 if(isset($_REQUEST["ES_TEMA_PRINCIPAL"])){
                      if($_REQUEST["ES_TEMA_PRINCIPAL"]=="SI"){
                            $ES_TEMA_OR_SUBTEMA="TEMA";
                        }else{
                           if($_REQUEST["ES_TEMA_PRINCIPAL"]=="NO"){
                            $ES_TEMA_OR_SUBTEMA="SUBTEMA";
//                           $DATOS_PADRE_GENERAL= json_decode($_REQUEST["datos_generales"]);
                            $DATOS_GENERALES= json_decode($_REQUEST["datos_generales"]);
                            
                            
                        } 
                        }
                }else{
                    $ES_TEMA_OR_SUBTEMA="NO EXISTE";
                }
                
                 $Lista= $model->insertarNodo($_REQUEST['NO'],$_REQUEST['NOMBRE'],$_REQUEST['DESCRIPCION'],$_REQUEST['PLAZO'],$_REQUEST['NODO'],$_REQUEST['ID_EMPLEADOMODAL'],"oficios",Session::getSesion("s_cont"),$ES_TEMA_OR_SUBTEMA,$DATOS_GENERALES);
                
                echo json_encode($Lista);
                
		break;

	case 'Modificar':
		# code...
            $model->actualizarPorColumna($_REQUEST["column"],$_REQUEST["editval"],$_REQUEST["id"] );
		break;

	case 'Eliminar':
		# code...
            $Lista= $model->eliminarNodoParaOficios($_REQUEST['ID']);
            header('Content-type: application/json; charset=utf-8'); 
            echo json_encode($Lista);
            return $Lista;
            
		break;
            
        case'verificarSiExisteTema':
            $Lista= $model->verificarSiTemaEstaEnDocumentoDeEntrada($ID_TEMA);
            break;


	default:
		# code...
		break;
}
?>


