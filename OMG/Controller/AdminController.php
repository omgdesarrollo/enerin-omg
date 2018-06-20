<?php


session_start();
require_once '../Model/AdminModel.php';
require_once '../Model/EmpleadoModel.php';
// require_once '../Pojo/DocumentoEntradaPojo.php';
// require_once '../Pojo/SeguimientoEntradaPojo.php';
require_once '../util/Session.php';



$Op=$_REQUEST["Op"];
$model = new AdminModel();
$modelEmpleado=new EmpleadoModel();

// $pojo= new DocumentoEntradaPojo();
// $modelSeguimientoEntrada=new SeguimientoEntradaModel();
// $pojoSeguimientoEntrada= new SeguimientoEntradaPojo();

switch ($Op)
{
    case 'Listar':
        $lista = $model->listarUsuarios();
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($lista);
    break;

	case 'BusquedaEmpleado':
		$lista=$modelEmpleado->BusquedaEmpleado($_REQUEST["CADENA"]);
    	header('Content-type: application/json; charset=utf-8');
		echo json_encode($lista);
        // return $lista;
    break;

    case 'ListarPermisos':
        $lista=$model->listarUsuarioVistas($_REQUEST["ID_USUARIO"]);
    	header('Content-type: application/json; charset=utf-8');
		echo json_encode($lista);
    break;

    case 'ListarUsuario':
        $lista = $model->listarUsuario($_REQUEST["ID_EMPLEADO"]);
        
        // header('Content-type: application/json; charset=utf-8');
		// echo json_encode($lista);
        break;

    case 'listarTemas':
        $lista = $model->listarTemas($_REQUEST["CADENA"]);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($lista);
        
        break;

    case 'listarTemasPorUsuario':
        
        $lista = $model->listarTemasPorUsuario($_REQUEST("ID_USUARIO"));
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($lista);
        
        break;
    
    case 'AgregarUsuario':
        $result = $model->InsertarUsuario($_REQUEST["ID_EMPLEADO"],$_REQUEST["NOMBRE_USUARIO"]);
        header('Content-type: application/json; charset=utf-8');
		echo json_encode($result);
    break;

    case 'CrearTablaPermisos':
        $lista = $model->listarSubmodulos();
        // foreach($lista as $key=>$datos)
        // {
        //     echo "$key \n";
        //     foreach($datos as $val)
        //     {
        //         echo "\n";
        //         echo " $val[descripcion]";
        //         // header('Content-type: application/json; charset=utf-8');
        //         // echo json_encode($val);
        //     }
        //     // echo $key."\n";
        //     // header('Content-type: application/json; charset=utf-8');
        //     // echo json_encode($datos);
        //     // echo "\n";
        // }
        
        $tempData="";
        $idEstruct=2;
        $textCheckBox = "<input type='checkbox' style='width:40px;height:40px;margin:7px 0 0;'";
        
        foreach($lista as $index=>$value)
        {
            $tempData .= "<tr>";
            $tempData2 = "";
            $tempData3 = "";
            $cont=0;
            
            foreach ($value as $ind=>$val)
            {
                $cont++;
                $vista = explode("-",$val['descripcion']);
                if($cont==1)
                {
                    //ver/consultar/editar/eliminar
                    
                    $tempData2 = "<td style='border-top: 1px solid;border-right: 1px solid;'>$vista[1]</td>";

                    $tempData2 .= "<td onClick=\"saveCheckBoxToDataBase(this,'consult','$val[id_estructura]')\" id='consult_$val[id_estructura]' style='border-top: 1px solid;border-right: 1px solid;cursor:pointer;'></td>";

                    $tempData2 .= "<td onClick=\"saveCheckBoxToDataBase(this,'new','$val[id_estructura]')\" id='new_$val[id_estructura]' style='border-top: 1px solid;cursor:pointer;border-right: 1px solid'></td>";

                    $tempData2 .= "<td onClick=\"saveCheckBoxToDataBase(this,'edit','$val[id_estructura]')\" id='edit_$val[id_estructura]' style='border-top: 1px solid;cursor:pointer;border-right: 1px solid'></td>";

                    $tempData2 .= "<td onClick=\"saveCheckBoxToDataBase(this,'delete','$val[id_estructura]')\" id='delete_$val[id_estructura]' style='border-top: 1px solid;cursor:pointer;border-right: 1px solid'></td></tr>";

                }
                else
                {
                    $tempData3 .= "<tr><td style='border-right: 1px solid'>$vista[1]</td>";
                    
                    $tempData3 .= "<td onClick=\"saveCheckBoxToDataBase(this,'consult','$val[id_estructura]')\" id='consult_$val[id_estructura]' style='cursor:pointer;border-right: 1px solid'></td>";

                    $tempData3 .= "<td onClick=\"saveCheckBoxToDataBase(this,'new','$val[id_estructura]')\" id='new_$val[id_estructura]' style='cursor:pointer;border-right: 1px solid'></td>";

                    $tempData3 .= "<td onClick=\"saveCheckBoxToDataBase(this,'edit','$val[id_estructura]')\" id='edit_$val[id_estructura]' style='cursor:pointer;border-right: 1px solid'></td>";

                    $tempData3 .= "<td onClick=\"saveCheckBoxToDataBase(this,'delete','$val[id_estructura]')\" id='delete_$val[id_estructura]' style='cursor:pointer;border-right: 1px solid'></td></tr>";
                }
                $idEstruct++;
            };
            $tempData .= "<td style='border-top: 1px solid;' rowspan='$cont'>$index</td>";
            $tempData .= $tempData2.$tempData3;
        };
        echo $tempData;

    break;
    case 'ModificarPermiso':
        $exito = $model->actualizarUsuariosVistasPorColumna($_REQUEST['COLUMNA'], $_REQUEST['VALOR'], $_REQUEST['ID_USUARIO'], $_REQUEST['ID_ESTRUCTURA']);
        echo $exito;
    break;

    default:
    return false;
    break;
}
            
