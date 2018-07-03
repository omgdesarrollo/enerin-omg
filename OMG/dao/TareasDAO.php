<?PHP
require_once '../ds/AccesoDB.php';

class TareasDAO{
    

    public function listarTareas()
    {
        try
        {
            $query="SELECT tbtareas.id_tarea, tbtareas.contrato, tbtareas.tarea, tbtareas.fecha_creacion, tbtareas.fecha_alarma,
                           tbtareas.fecha_cumplimiento, tbtareas.observaciones, tbtareas.archivo_adjunto, tbtareas.avance_programa,		 
                           tbempleados_tareas.id_empleado, tbempleados_tareas.nombre_empleado, tbempleados_tareas.apellido_paterno, tbempleados_tareas.apellido_materno
		 
                    FROM tareas tbtareas
                    JOIN empleados_tareas tbempleados_tareas ON tbempleados_tareas.id_empleado=tbtareas.id_empleado";
            
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);

            return $lista;
            
        } catch (Exception $ex)
        {
            throw $ex;
            return $ex;
        }
    }    
    
    
}

?>