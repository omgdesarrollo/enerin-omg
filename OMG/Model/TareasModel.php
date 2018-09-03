<?php
require_once '../dao/TareasDAO.php';
require_once '../Model/NotificacionesModel.php';

class TareasModel{
    
    public function listarTareas()
    {
        try
        {
            $dao=new TareasDAO();
            $rec= $dao->listarTareas();
            
//            foreach ($rec as $key => $value)
//            {
//                if($value["status_tarea"]== 1)
//                {
//                    $rec[$key]["status_tarea"]="En proceso";
//                }
//                
//                if($value["status_tarea"]== 2)
//                {
//                    $rec[$key]["status_tarea"]="Suspendido";
//                }
//                
//                if($value["status_tarea"]== 3)
//                {
//                    $rec[$key]["status_tarea"]="Terminado";
//                }
//            }

            return $rec;            
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
    public function insertarTarea($referencia,$tarea,$fecha_creacion,$fecha_alarma,$fecha_cumplimiento,$status_tarea,$observaciones,$id_empleado,$mensaje,
                                  $responsable_plan,$tipo_mensaje,$atendido)
    {
        try
        {
            $contrato= Session::getSesion("s_cont");
            $id_usuario=Session::getSesion("user");
            $asunto="";
            $dao=new TareasDAO();
            $ID= $dao->obtenerUsuarioPorIdEmpleado($responsable_plan);
            $model=new NotificacionesModel();
            $exito= $dao->insertarTarea($referencia, $tarea, $fecha_creacion, $fecha_alarma, $fecha_cumplimiento,$status_tarea,$observaciones,$id_empleado);
            $model->guardarNotificacionHibry($id_usuario['ID_USUARIO'], $ID, $mensaje, $tipo_mensaje, $atendido,$asunto,$contrato);
            
//            echo "este es model: ".json_encode($model);
            if($exito[0] = 1)
            {
                $lista = $dao->listarTarea($exito['id_nuevo']);
                
                foreach ($lista as $key => $value)
            {
                if($value["status_tarea"]== 1)
                {
                    $lista[$key]["status_tarea"]="En proceso";
                }
                
                if($value["status_tarea"]== 2)
                {
                    $lista[$key]["status_tarea"]="Suspendido";
                }
                
                if($value["status_tarea"]== 3)
                {
                    $lista[$key]["status_tarea"]="Terminado";
                }
            }
            }
            else
                return $exito[0];
            return $lista;

        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }        
    }
    
    
    public function enviarNotificacionWhenUpdate($ID_EMPLEADO,$TAREA)
    {
        try
        {
            $contrato= Session::getSesion("s_cont");
            $id_usuario=Session::getSesion("user");
            $mensaje= "Se ha actualizado la tarea: ".$TAREA." por el Usuario: ";
            $tipo_mensaje=0;
            $atendido= 'false';
            $asunto="";
            $dao=new TareasDAO();
            $ID= $dao->obtenerUsuarioPorIdEmpleado($ID_EMPLEADO);
            $model=new NotificacionesModel();
            $rec= $model->guardarNotificacionHibry($id_usuario['ID_USUARIO'], $ID, $mensaje, $tipo_mensaje, $atendido,$asunto,$contrato);
            
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }        
    }
    
    public function enviarNotificacionWhenRemoveTarea($ID_EMPLEADO,$TAREA)
    {
        try
        {
            $contrato= Session::getSesion("s_cont");
            $id_usuario=Session::getSesion("user");
            $mensaje= "Se asigno a otro usuario la tarea: ".$TAREA." por el Usuario: ";
            $tipo_mensaje=0;
            $atendido= 'false';
            $asunto="";
            $dao=new TareasDAO();
            $ID= $dao->obtenerUsuarioPorIdEmpleado($ID_EMPLEADO);
            $model=new NotificacionesModel();
            $rec= $model->guardarNotificacionHibry($id_usuario['ID_USUARIO'], $ID, $mensaje, $tipo_mensaje, $atendido,$asunto,$contrato);
            
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }        
    }


    public function enviarNotificacionWhenRemoveTareaAlNuevoUsuario($ID_EMPLEADO,$TAREA)
    {
        try
        {
            $contrato= Session::getSesion("s_cont");
            $id_usuario=Session::getSesion("user");
            $mensaje= "Se le asigno la tarea: ".$TAREA." por el Usuario: ";
            $tipo_mensaje=0;
            $atendido= 'false';
            $asunto="";
            $dao=new TareasDAO();
            $ID= $dao->obtenerUsuarioPorIdEmpleado($ID_EMPLEADO);
            $model=new NotificacionesModel();
            $rec= $model->guardarNotificacionHibry($id_usuario['ID_USUARIO'], $ID, $mensaje, $tipo_mensaje, $atendido,$asunto,$contrato);
            
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }        
    }
    
    
    public function enviarNotificacionWhenDeleteTarea($ID_EMPLEADO,$TAREA)
    {
        try
        {
            $contrato= Session::getSesion("s_cont");
            $id_usuario=Session::getSesion("user");
            $mensaje= "La Tarea: ".$TAREA." ha sido Eliminada por el Usuario: ";
            $tipo_mensaje=0;
            $atendido= 'false';
            $asunto="";
            $dao=new TareasDAO();
            $ID= $dao->obtenerUsuarioPorIdEmpleado($ID_EMPLEADO);
            $model=new NotificacionesModel();
            $rec= $model->guardarNotificacionHibry($id_usuario['ID_USUARIO'], $ID, $mensaje, $tipo_mensaje, $atendido,$asunto,$contrato);
            
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }        
    }


    public function eliminarTarea($ID_TAREA)
    {
        try
        {
            $dao= new TareasDAO();
            $rec= $dao->eliminarTarea($ID_TAREA);
            
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    
    public function verificarSiYaExisteLaTarea($cualverificar, $cadena)
    {
        try
        {
            $dao=new TareasDAO();
            $rec= $dao->verificarSiYaExisteLaTarea($cualverificar, $cadena);
            
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
            
}


?>