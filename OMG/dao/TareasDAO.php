<?PHP
require_once '../ds/AccesoDB.php';

class TareasDAO{
    

    public function listarTareas()
    {
        try
        {
            $query="SELECT tbtareas.id_tarea, tbtareas.contrato, tbtareas.tarea, tbtareas.fecha_creacion, tbtareas.fecha_alarma,
                           tbtareas.fecha_cumplimiento, tbtareas.observaciones, tbtareas.archivo_adjunto, tbtareas.avance_programa,		 
                           tbempleados.id_empleado, tbempleados.nombre_empleado, tbempleados.apellido_paterno, tbempleados.apellido_materno
		 
                    FROM tareas tbtareas
                    JOIN empleados tbempleados ON tbempleados.id_empleado=tbtareas.id_empleado";
            
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