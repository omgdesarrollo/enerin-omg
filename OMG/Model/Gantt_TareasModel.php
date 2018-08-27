<?php

require_once '../dao/Gantt_TareaDao.php';
// require_once '../Pojo/GanttPojo.php';
class Gantt_TareasModel{
    //put your code here
    
    public function listarRegistrosGanttTareas($VALUE)
    {
        try
        {
            $dao=new Gantt_TareaDao();
            $rec= $dao->listarRegistrosGanttTareas($VALUE);
            
            return $rec;
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
            $dao=new Gantt_TareaDao();
            $rec= $dao->insertarGanttTareas($VALUES);
            
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    
    
    public static function actualizarGanttTareas($COLUMNAS,$ID)
    {
        try
        {
            $dao=new Gantt_TareaDao();
            $query= "UPDATE gantt_tareas SET";
            $index=0;
            foreach ($COLUMNAS as $key => $value) 
            { 
                if($index!=0)
                {
                    $query.=" , ";
                }
                
                $query .= " $key = '$value'";
                $index++;
            }
            
            $query.= "WHERE id = $ID";
            $update= $dao->actualizarGanttTareas($query);
            return ($update!=0)?1:0;            
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    public static function actualizarExisteProgramaTareas($VALUES)
    {
        try
        {            
            $dao=new Gantt_TareaDao();
            $rec= $dao->actualizarExisteProgramaTareas($VALUES);        
            return $rec;
        } catch (Exception $ex)
        {
            throw $xe; 
            return -1;
        }
    }

    
    
    public function eliminarGanttTareas($VALUES)
    {
        try
        {
            $dao=new Gantt_TareaDao();
            $rec= $dao->eliminarGanttTareas($VALUES);
            
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    
    public  static function verificarParentHijoEnTarea($VALUES)
    {
        try
        {
            $dao=new Gantt_TareaDao();
            $rec= $dao->verificarParentHijoEnTarea($VALUES);
            
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    
    public static function AvanceProgramaTareas($VALUES)
    {
        try
        {
            $dao=new Gantt_TareaDao();
            $rec= $dao->AvanceProgramaTareas($VALUES);
            
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    
    public static function verificarSiExisteIDTareaEnGanttTareas()
    {
        try
        {
            $dao=new Gantt_TareaDao();
            $rec= $dao->verificarSiExisteIDTareaEnGanttTareas($VALUES);
            
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }

//    public function obtenerTareasCompletasPorFolioEntrada($folio_entrada){
//        try{
//            $dao= new Gantt_TareaDao();
//            $rec=$dao->obtenerTareasCompletasPorFolioEntrada($folio_entrada);
//            
//            return $rec;
//            
//        } catch (Exception $ex) {
//            throw $ex;
//            return false;
//        }
//    }
    
    public function insertarTareasGantt($data,$id_tarea){
       
        try{
            $inserccion;
            $lista_tareas_verificadas;
            $dao= new Gantt_TareaDao();
            $modelGantt= new Gantt_TareasModel();
            $lista_tareas_verificadas=self::verificarTareasExiste($data);
            foreach ($data as $value) {
                if (isset($value["id"])) {
                   foreach ($lista_tareas_verificadas as $value2) {
                        if($value["id"]==$value2["id"]){
                                if($value2["cantidad"]==0){
                                    if($value["parent"]!=""){
                                         $value["progress"]=0;
//                                          $value["user"];
                                         echo "entro en insertas;";
                                         $value["id_tarea"]=$id_tarea;
                                         $value["existeprograma"]=1;
                                         $dao->insertarGanttTareas($value);
                                         self:: actualizarExisteProgramaTareas($value);
                                    }
                                }
                                else{
                                     if($value["!nativeeditor_status"]=='deleted'){
                                         echo "entro a eliminar la tarea";
                                         $dao->eliminarGanttTareas($value["id"]);
//                                         $dao->deleteTareasDe_Gantt_Seguimiento_Entrada($value);    
                                    }else{
                                        echo "entro en actualizar";
//                                         $dao->updateTareas($value); 
                                        
                                         if (!isset($value["progress"])) {
                                             $value["progress"]=0;
                                         }
                                         self::actualizarGanttTareas(array("text"=>$value["text"],"start_date"=>$value["start_date"],"duration"=>$value["duration"],"progress"=>$value["progress"],"parent"=>$value["parent"],"user"=>$value["user"]), $value["id"]);
                                         
//                                         $model->actualizarGanttTareas
//                                         $dao->updateTareasId_EmpleadoXIdGantt_En_Tabla_Seguimiento_entrada($value);
                                    }
                                }
                        }
                    }
                }
            }
         
         
//          $modelGantt->calculoAvanceProgramaGeneral($id_seguimiento_que_lleva_al_folio_de_entrada);
            
        } catch (Exception $ex) {
            throw $ex;
        }
        
    }
    
    
    public static function verificarTareasExiste($array){
        try{
            $dao= new Gantt_TareaDao();
            $numeroenlistaposicion=0;
            $lista_tarea_verificada_si_existe;
            foreach ($array as $value) {
                if (isset($value["id"])) {
                    $lista_tarea_verificada_si_existe[$numeroenlistaposicion]["id"]= $value["id"];
                    $lista_tarea_verificada_si_existe[$numeroenlistaposicion]["cantidad"]=$dao->verificarTareaExiste($value)[0]["cantidad"];
                    $numeroenlistaposicion++;
                }
            }
            return $lista_tarea_verificada_si_existe;
        } catch (Exception $ex) {
            throw  $ex;
        }
    }
    
    
    public function obtenerFolioEntradaSeguimiento($ID_SEGUIMIENTO)
    {
        try
        {
            $dao=new GanttDao();
            $rec= $dao->obtenerFolioEntradaSeguimiento($ID_SEGUIMIENTO);
            
            return $rec;
            
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
    public  function calculoAvanceProgramaGeneral($id_seguimiento_que_lleva_al_folio_de_entrada)
    {
        try
        {
            $dao=new GanttDao();
             $rec= $dao->calculoAvanceProgramaGeneral($id_seguimiento_que_lleva_al_folio_de_entrada);
             echo "s  : ".$rec[0]["total_avance_programa"];
             $value["id_seguimiento"]=$id_seguimiento_que_lleva_al_folio_de_entrada;
             $value["avance_programa"]=$rec[0]["total_avance_programa"];
            $dao->updateAvanceProgramaGeneral($value);
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
    
    public function updateAvanceProgramaGeneral($value){
        try{
            
            $dao= new GanttDao();
//            $dao= 
            
            
        } catch (Exception $ex) {
            throw  $ex;
        }
    }
}
