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

    public function verificarTareaExiste($value){
        try{
            $query="select count(*) as cantidad from gantt_tasks tble_gantt_task  where tble_gantt_task.id='".$value["id"]."'";
            $db= AccesoDB::getInstancia();
            $list=$db->executeQuery($query);
//            echo ($list[0]["cantidad"]);
//            echo json_encode($list[0]["cantidad"]);
            return $list;
        } catch (Exception $ex) {
            throw $ex;
        }
    }


    
}

?>