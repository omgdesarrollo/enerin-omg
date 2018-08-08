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

    public function insertarTarea($contrato,$tarea,$fecha_creacion,$fecha_alarma,$fecha_cumplimiento,$observaciones,$archivo_adjunto,$id_empleado)
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
            
            $query="INSERT INTO tareas(id_tarea,contrato,tarea,fecha_creacion,fecha_alarma,fecha_cumplimiento,observaciones,archivo_adjunto,id_empleado)
				values($id_nuevo,'$contrato','$tarea','$fecha_creacion','$fecha_alarma','$fecha_cumplimiento','$observaciones','$archivo_adjunto',$id_empleado)";
            
            $db=  AccesoDB::getInstancia();
            $lista= $db->executeQueryUpdate($query);
            
            echo json_encode($query);
            return $lista;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    
}

?>