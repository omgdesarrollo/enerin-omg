<?php

require_once '../dao/Gantt_TareaDao.php';
// require_once '../Pojo/GanttPojo.php';
class Gantt_TareasModel {
    //put your code here
    
    public function obtenerTareasCompletasPorFolioEntrada($folio_entrada){
        try{
            $dao= new Gantt_TareaDao();
            $rec=$dao->obtenerTareasCompletasPorFolioEntrada($folio_entrada);
            
            return $rec;
            
        } catch (Exception $ex) {
            throw $ex;
            return false;
        }
    }
    
    public function insertarTareasGantt($data,$id_seguimiento_que_lleva_al_folio_de_entrada){
       
        try{
            $inserccion;
            $lista_tareas_verificadas;
            $dao= new GanttDao();
            $modelGantt= new GanttModel();
            $lista_tareas_verificadas=self::verificarTareasExiste($data);
            foreach ($data as $value) {
                if (isset($value["id"])) {
                   foreach ($lista_tareas_verificadas as $value2) {
                        if($value["id"]==$value2["id"]){
                            
                                if($value2["cantidad"]==0){
                                    if($value["parent"]!=""){
                                         $value["progress"]=0;
                                         $value["id_empleado"]=$value["user"];
                                         $value["id_seguimiento_entrada"]=$id_seguimiento_que_lleva_al_folio_de_entrada;
                                         $dao->insertarTareasGantt($value);
                                         $dao->insertarTareasConFolioEntrada_de_seguimiento_entrada($value);
                                    }
                                }
                                else{
                                    
                                     if($value["!nativeeditor_status"]=='deleted'){
                                         echo "entro a eliminar la tarea";
                                         $dao->deleteTareas($value);
                                         $dao->deleteTareasDe_Gantt_Seguimiento_Entrada($value);
                                            
                                    }else{
                                         $dao->updateTareas($value); 
                                         $dao->updateTareasId_EmpleadoXIdGantt_En_Tabla_Seguimiento_entrada($value);
                                    }
                                }
                        }
                    }
                }
            }
         
         
          $modelGantt->calculoAvanceProgramaGeneral($id_seguimiento_que_lleva_al_folio_de_entrada);
            
        } catch (Exception $ex) {
            throw $ex;
        }
        
    }
    
    
    public static function verificarTareasExiste($array){
        try{
            $dao= new GanttDao();
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
    
    
    public function deleteTareaajax($value)
    {
        try{
            $dao= new GanttDao();
            $dao->deleteTareasAjax($value);
            
        } catch (Exception $ex) {

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
