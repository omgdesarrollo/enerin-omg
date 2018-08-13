<?PHP
require_once '../ds/AccesoDB.php';

class TareasDAO{
    

    public function listarTareas()
    {
        try
        {
            $query="SELECT tbtareas.id_tarea, tbtareas.contrato, tbtareas.tarea, tbtareas.fecha_creacion, tbtareas.fecha_alarma,
                    tbtareas.fecha_cumplimiento, tbtareas.observaciones, tbtareas.existe_programa, tbtareas.avance_programa,		 
                    tbempleados.id_empleado, tbempleados.nombre_empleado, tbempleados.apellido_paterno, tbempleados.apellido_materno
                    FROM tareas tbtareas
                    JOIN empleados tbempleados ON tbempleados.id_empleado=tbtareas.id_empleado";
            
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);

            return $lista;
            
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    public function listarTarea($ID_TAREA)
    {
        try
        {
            $query="SELECT tbtareas.id_tarea, tbtareas.contrato, tbtareas.tarea, tbtareas.fecha_creacion, tbtareas.fecha_alarma,
                    tbtareas.fecha_cumplimiento, tbtareas.observaciones, tbtareas.existe_programa, tbtareas.avance_programa,		 
                    tbempleados.id_empleado, tbempleados.nombre_empleado, tbempleados.apellido_paterno, tbempleados.apellido_materno
                    FROM tareas tbtareas
                    JOIN empleados tbempleados ON tbempleados.id_empleado=tbtareas.id_empleado
                    WHERE tbtareas.id_tarea=$ID_TAREA";
            
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);

            return $lista;
            
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }

    public function insertarTarea($contrato,$tarea,$fecha_creacion,$fecha_alarma,$fecha_cumplimiento,$observaciones,$id_empleado)
    {
        try
        {
            $query_obtenerMaximo_mas_uno="SELECT max(id_tarea)+1 as id_tarea FROM tareas";
            $db_obtenerMaximo_mas_uno=AccesoDB::getInstancia();
            $lista_id_nuevo_autoincrementado=$db_obtenerMaximo_mas_uno->executeQuery($query_obtenerMaximo_mas_uno);
            $id_nuevo=0;
            
            foreach ($lista_id_nuevo_autoincrementado as $value) {
               $id_nuevo= $value["id_tarea"];
            }
             if($id_nuevo==NULL){
                $id_nuevo=0;
            }
            
            $query="INSERT INTO tareas(id_tarea,contrato,tarea,fecha_creacion,fecha_alarma,fecha_cumplimiento,observaciones,id_empleado)
				values($id_nuevo,'$contrato','$tarea','$fecha_creacion','$fecha_alarma','$fecha_cumplimiento','$observaciones',$id_empleado)";
            
            $db=  AccesoDB::getInstancia();
            $exito = $db->executeUpdateRowsAfected($query);
            return ($exito != 0)?[0=>1,"id_nuevo"=>$id_nuevo]:[0=>0,"id_nuevo"=>$id_nuevo ];
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
            $query="DELETE FROM tareas
                    WHERE tareas.existe_programa=0 AND tareas.id_tarea=$ID_TAREA";
            
            $db=  AccesoDB::getInstancia();
            $lista= $db->executeQueryUpdate($query);
            
            return $lista;            
        } catch (Exception $ex)
        {
            throw $ex;
            return-1;
        }
    }
    
}

?>