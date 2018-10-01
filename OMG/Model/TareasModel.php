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
    
    public function listarTarea($ID_TAREA)
    {
        try 
        {
            $dao=new TareasDAO();
            $rec= $dao->listarTarea($ID_TAREA);
            
            return $rec;
        } catch (Exception $ex) 
        {
            throw $ex;
            return -1;
        }
    }


    public function empleadosConUsuario()
    {
        try 
        {
            $dao=new TareasDAO();
            $rec= $dao->empleadosConUsuario();
            
            return $rec;
        } catch (Exception $ex) 
        {
            throw $ex;
            return -1;
        }
    }
    
    
    public function responsableTarea()
    {
        try 
        {
            $dao=new TareasDAO();
            $rec= $dao->responsableTarea();
            
            return $rec;
        } catch (Exception $ex) 
        {
            throw $ex;
            return -1;
        }
    }

    
    public function datosParaGraficaTareas()
    {
        try
        {
            $dao=new TareasDAO();
            $rec= $dao->datosParaGraficaTareas();
            
            foreach ($rec as $key => $value) 
            {
                $alarm = new Datetime($value['fecha_alarma']);
                $alarm = strftime("%d-%B-%y",$alarm -> getTimestamp());
                $alarm = new Datetime($alarm);

                $flimite = new Datetime($value['fecha_cumplimiento']);// Guarda en una variable la fecha de la base de datos
                $flimite = strftime("%d-%B-%y",$flimite -> getTimestamp());// Esta da el formato: dia. mes y año, sin guardar las horas 
                $flimite = new Datetime($flimite);//Se guarda en este formato y se reinicializan las horas a 00.

                $hoy = new Datetime();
                $hoy = strftime("%d - %B - %y");
                $hoy = new Datetime($hoy);
                
                if($value['status_tarea']==1)
                {
                    if($flimite <= $hoy)
                    {
                        $rec[$key]['status'] = "Tarea vencida";
                    } else{
                        if($alarm <= $hoy)
                        {
                            $rec[$key]['status'] = "Alarma vencida";
                        } else{
                            $rec[$key]['status'] = "En tiempo";
                        }
                        
                    }
                    
                }
                
                if($value['status_tarea']==2)
                {
                    $rec[$key]['status'] = "Suspendido";
                }
                
//                if($value['status_tarea']==3)
//                {
//                    $rec[$key]['status'] = "Terminado";
//                }
                
            }
            
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
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
            
//            echo "este es model: ".json_encode($ID);
            
            if($exito[0] = 1)
            {
                $lista = $dao->listarTarea($exito['id_nuevo']);                       
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