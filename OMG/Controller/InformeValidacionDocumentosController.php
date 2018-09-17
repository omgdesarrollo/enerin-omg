<?php

session_start();
require_once '../Model/InformeValidacionDocumentosModel.php';
require_once '../dao/InformeValidacionDocumentosDAO.php';
require_once '../util/Session.php';

$Op=$_REQUEST["Op"];
$model=new InformeValidacionDocumentosModel();

switch ($Op) {

    
        case 'listarparametros(v,nv,sd)':
        $v["param"]["contrato"]= Session::getSesion("s_cont");
        $Lista=$model->listarValidaciones($v);
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($Lista);
        //        echo $v["param"]["v"];
        break;
        
        case 'obtenerResponsablesDocumentos':
            $Lista=$model->obtenerTodosLosEmpleadosQueSonResponsableDelDocumento();
            header("Content-type:application/json;charset=utf-8");
            echo json_encode($Lista);
            
        break;
    
    
        case 'MostrarTemayResponsable':

                    $Lista=$model->obtenerTemayResponsable($_REQUEST['ID_DOCUMENTO']);

    //                Session::setSesion("obtenerTemayResponsable", $lista);                        
                    header('Content-type: application/json; charset=utf-8');
                    echo json_encode($Lista);
                    return $Lista;
        break;
            
        case 'MostrarRequisitosPorDocumento':


                $Lista= $model->obtenerRequisitosporDocumento($_REQUEST['ID_DOCUMENTO']);
//                Session::setSesion("obtenerRequisitosporDocumento",$Lista);        
                header('Content-type: application/json; charset=utf-8');
                echo json_encode( $Lista);
                return $Lista;
                break;	


        case 'MostrarRegistrosPorDocumento':
                  
                $Lista= $model->obtenerRegistrosPorDocumento($_REQUEST['ID_DOCUMENTO']);
//                Session::setSesion("obtenerRegistrosPorDocumento",$Lista);                 
                header('Content-type: application/json; charset=utf-8');
                echo json_encode($Lista);
                return $Lista;
            
		break;
    
    default:
        break;
}

?>