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

                    $tempData2 .= "<td onClick=\"saveCheckBoxToDataBase(this,'view','$val[id_submodulos]')\" id='view_$val[id_submodulos]' style='border-top: 1px solid;border-right: 1px solid;cursor:pointer;'></td>";

                    $tempData2 .= "<td onClick=\"saveCheckBoxToDataBase(this,'new','$val[id_submodulos]')\" id='new_$val[id_submodulos]' style='border-top: 1px solid;cursor:pointer;border-right: 1px solid'></td>";

                    $tempData2 .= "<td onClick=\"saveCheckBoxToDataBase(this,'edit','$val[id_submodulos]')\" id='edit_$val[id_submodulos]' style='border-top: 1px solid;cursor:pointer;border-right: 1px solid'></td>";

                    $tempData2 .= "<td onClick=\"saveCheckBoxToDataBase(this,'delete','$val[id_submodulos]')\" id='delet_$val[id_submodulos]' style='border-top: 1px solid;cursor:pointer;border-right: 1px solid'></td></tr>";

                    // $tempData2 .= "<td id='view_$idEstruct' style='border-top: 1px solid;'>$textCheckBox ";
                    // $tempData2 .= "onchange=\"saveCheckBoxToDataBase(this,'view','$idEstruct')\" ></td>";

                    // $tempData2 .= "<td id='consult_$idEstruct' style='border-top: 1px solid;'>$textCheckBox ";
                    // $tempData2 .= "onchange=\"saveCheckBoxToDataBase(this,'consult','$idEstruct')\" ></td>";

                    // $tempData2 .= "<td id='edit_$idEstruct' style='border-top: 1px solid;'>$textCheckBox ";
                    // $tempData2 .= "onchange=\"saveCheckBoxToDataBase(this,'edit','$idEstruct')\" ></td>";

                    // $tempData2 .= "<td id='delet_$idEstruct' style='border-top: 1px solid;'>$textCheckBoxb ";
                    // $tempData2 .= "onchange=\"saveCheckBoxToDataBase(this,'delete','$idEstruct')\" ></td></tr>";
                    
                    
                }
                else
                {
                    $tempData3 .= "<tr><td style='border-right: 1px solid'>$vista[1]</td>";
                    // $tempData3 .= "<td id='view_$idEstruct'>$textCheckBox ";
                    // $tempData3 .= "onchange=\"saveCheckBoxToDataBase(this,'view','$idEstruct')\" ></td>";

                    // $tempData3 .= "<td id='consult_$idEstruct'> $textCheckBox ";
                    // $tempData3 .= "onchange=\"saveCheckBoxToDataBase(this,'consult','$idEstruct')\" ></td>";

                    // $tempData3 .= "<td id='edit_$idEstruct'>$textCheckBox ";
                    // $tempData3 .= "onchange=\"saveCheckBoxToDataBase(this,'edit','$idEstruct')\" ></td>";

                    // $tempData3 .= "<td id='delet_$idEstruct'> $textCheckBox ";
                    // $tempData3 .= "onchange=\"saveCheckBoxToDataBase(this,'delete','$idEstruct')\" ></td></tr>";

                    
                    $tempData3 .= "<td onClick=\"saveCheckBoxToDataBase(this,'view','$val[id_submodulos]')\" id='view_$val[id_submodulos]' style='cursor:pointer;border-right: 1px solid'></td>";

                    $tempData3 .= "<td onClick=\"saveCheckBoxToDataBase(this,'new','$val[id_submodulos]')\" id='new_$val[id_submodulos]' style='cursor:pointer;border-right: 1px solid'></td>";

                    $tempData3 .= "<td onClick=\"saveCheckBoxToDataBase(this,'edit','$val[id_submodulos]')\" id='edit_$val[id_submodulos]' style='cursor:pointer;border-right: 1px solid'></td>";

                    $tempData3 .= "<td onClick=\"saveCheckBoxToDataBase(this,'delete','$val[id_submodulos]')\" id='delet_$val[id_submodulos]' style='cursor:pointer;border-right: 1px solid'></td></tr>";
                }
                $idEstruct++;
            };
            $tempData .= "<td style='border-top: 1px solid;' rowspan='$cont'>$index</td>";
            $tempData .= $tempData2.$tempData3;
        };
        echo $tempData;

    break;

    default:
    return false;
    break;
}
            
