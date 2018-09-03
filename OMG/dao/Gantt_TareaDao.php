<?php
require_once '../ds/AccesoDB.php';
class Gantt_TareaDao {
    public function listarRegistrosGanttTareas($VALUE) 
    {
        try
        {
            $query="SELECT tbgantt_tareas.user,tbgantt_tareas.id, tbgantt_tareas.text, tbgantt_tareas.start_date, tbgantt_tareas.duration, tbgantt_tareas.progress, tbgantt_tareas.parent
                    
                    FROM gantt_tareas tbgantt_tareas
                    WHERE tbgantt_tareas.id_tarea= $VALUE";
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            return $lista;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }        
    }


    public function insertarGanttTareas($VALUES)
    {
        try
        {
            $query="INSERT INTO gantt_tareas (id,text,start_date,duration,progress,parent,user,id_tarea)
                    VALUES('".$VALUES["id"]."','".$VALUES["text"]."','".$VALUES["start_date"]."','".$VALUES["duration"]."',
                    '".$VALUES["progress"]."','".$VALUES["parent"]."','".$VALUES["user"]."','".$VALUES["id_tarea"]."')";
            
            $db=  AccesoDB::getInstancia();
            $lista = $db->executeQueryUpdate($query);
            
            return $lista;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
        
    }
    
    
    public function actualizarGanttTareas($QUERY)
    {
        try
        {
            $db=  AccesoDB::getInstancia();
            $update = $db->executeUpdateRowsAfected($QUERY);       

            return $update;            
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    
    public function actualizarExisteProgramaTareas($VALUES)
    {
        try
        {
            $query="UPDATE tareas SET existe_programa=".$VALUES["existeprograma"]."  WHERE id_tarea=".$VALUES["id_tarea"]."";
            
            $db=  AccesoDB::getInstancia();
            $update = $db->executeUpdateRowsAfected($query);
            return $update;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }

    
    public function actualizarAvanceProgramaTareas($VALUES)
    {
        try
        {
            $query="UPDATE tareas SET avance_programa= ".$VALUES["avance"]."  WHERE id_tarea= ".$VALUES["id_tarea"]."";
            
            $db=  AccesoDB::getInstancia();
            $update = $db->executeUpdateRowsAfected($query);
            
            return $update;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }

        public function eliminarGanttTareas($VALUES)
    {
        try
        {
            $query="DELETE FROM gantt_tareas WHERE gantt_tareas.id=$VALUES";
            
            $db=  AccesoDB::getInstancia();
            $lista = $db->executeQueryUpdate($query);
            
            return $lista;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    public function verificarTareaExiste($VALUES)
    {
        try
        {
            $query="SELECT COUNT(*) as cantidad 
                    FROM gantt_tareas tbgantt_tareas  
                    WHERE tbgantt_tareas.id= '".$VALUES["id"]."'";
            
            $db=  AccesoDB::getInstancia();
            $lista = $db->executeQuery($query);
            
            return $lista;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    public function verificarParentHijoEnTarea($VALUES)
    {
        try
        {
            $query="SELECT if(count(*)=0,'false','true') as t 
                    FROM gantt_tareas tbgantt_tareas  
                    WHERE tbgantt_tareas.parent='".$VALUES['id']."'";
            
            $db=  AccesoDB::getInstancia();
            $lista = $db->executeQuery($query);
            
            return $lista[0]["t"];
        } catch (Exception$ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    public function AvanceProgramaTareas($VALUES)
    {
        try
        {
            $query="SELECT SUM(tbgantt_tareas.progress)/COUNT(tbgantt_tareas.progress) AS total_avance
                    FROM gantt_tareas tbgantt_tareas
                    WHERE tbgantt_tareas.id_tarea= ".$VALUES['id_tarea']."";
//            AND tbgantt_tareas.parent=0
            
            $db=  AccesoDB::getInstancia();
            $lista = $db->executeQuery($query);
            
            return $lista[0]["total_avance"];
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
     
    public function verificarSiExisteIDTareaEnGanttTareas($VALUES)
    {
        try
        {
            $query="SELECT IF(COUNT(*)=0,'false','true') AS existe_tarea
                    FROM gantt_tareas tbgantt_tareas
                    WHERE tbgantt_tareas.id_tarea= '".$VALUES['id_tarea']."'";
            
            $db=  AccesoDB::getInstancia();
            $lista = $db->executeQuery($query);
            
            return $lista[0]["existe_tarea"];
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    public function listarEmpleadosNombreCompleto()
    {
        try
       {
            $query="SELECT empleados.id_empleado, CONCAT(empleados.nombre_empleado,' ',empleados.apellido_paterno,' ',empleados.apellido_materno) 
                    AS nombre_completo FROM empleados";

            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);

            return $lista;
        }  catch (Exception $ex){
<<<<<<< HEAD
=======
        }
    }
>>>>>>> be3acd9ee59699917b9e6e567ee17f6331cdf3f7
    
    public function guardarNotificacionResponsable($id_usuario,$id_para,$mensaje,$tipo,$atendido,$asunto,$CONTRATO){
        try{

            $query="INSERT INTO notificaciones  (id_de,id_para,id_contrato,tipo_mensaje,mensaje,atendido,asunto)
            VALUES($id_usuario,$id_para,$CONTRATO,$tipo,'$mensaje','$atendido','$asunto')";

            $db= AccesoDB::getInstancia($query);
            $lista=$db->executeQueryUpdate($query);

            return $lista;
        } catch (Exception $ex) {
            throw $ex;
            return false;
        }
    }
    
    
    
}

?>