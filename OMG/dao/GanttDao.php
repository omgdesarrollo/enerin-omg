<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GanttDao
 *
 * @author usuario
 */
require_once '../ds/AccesoDB.php';
class GanttDao {
    //put your code here
    
    
    
    public function obtenerTareasCompletasPorFolioEntrada($folio_entrada){
        try{
            
        
         $query="SElECT tbgantt_task.id,tbgantt_task.text,tbgantt_task.start_date,tbgantt_task.duration,
             tbgantt_task.progress,tbgantt_task.parent
             FROM gantt_tasks tbgantt_task"; 
           $db=  AccesoDB::getInstancia();
          $lista=$db->executeQuery($query);
          return $lista;
          } catch (Exception $ex) {
              throw $ex;
            
        }
    }
    
    
    public function insertarTareasGantt($value){
        try{
//            $query="INSERT INTO gantt_tasks(gantt_tasks.id,gantt_tasks.text,gantt_tasks.start_date,gantt_tasks.duration,gantt_tasks.progress,gantt_tasks.parent)
            $query="INSERT INTO gantt_tasks(gantt_tasks.id,gantt_tasks.text,gantt_tasks.start_date,duration,progress,parent) "
                    . "VALUES('".$value["id"]."','".$value["text"]."','".$value["start_date"]."','".$value["duration"]."','".$value["progress"]."','".$value["parent"]."');";
            echo "d  ".$query;
            $db= AccesoDB::getInstancia();
            $exito=$db->executeQueryUpdate($query);
            
            
        } catch (Exception $ex) {
            throw $ex;
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
    
    public function updateTareas($value){
        try{
        $query="UPDATE gantt_tasks set gantt_tasks.text='".$value["text"]."',gantt_tasks.start_date='".$value["start_date"]."',gantt_tasks.duration='".$value["duration"]."',gantt_tasks.progress='".$value["progress"]."',gantt_tasks.parent='".$value["parent"]."' where gantt_tasks.id='".$value['id']."'";
            $db= AccesoDB::getInstancia();
            $list=$db->executeQueryUpdate($query);
//            echo "s  ".$list;
            return $list;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
    
    public function deleteTareas($value){
        try{
            $query="delete from  gantt_tasks  where gantt_tasks.id='".$value["id"]."'";
            $db= AccesoDB::getInstancia();
            $list=$db->executeQueryUpdate($query);
            return $list;
        } catch (Exception $ex) {
            throw  $ex;
        }
    }
    
    
    
}
